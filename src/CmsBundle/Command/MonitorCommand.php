<?php
namespace App\CmsBundle\Command;

// Injection
use Symfony\Component\DependencyInjection\ContainerInterface;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\NullOutput;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Console\Output\Output;
use Symfony\Component\Console\Input\InputOption;

class MonitorCommand extends Command
{
    private $output;
    private $Container;

    public function __construct(ContainerInterface $Container){
        $this->Container = $Container;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('trinity:monitor')
            ->setDescription('Monitor uptime for activated domains')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->Container->get('doctrine.orm.entity_manager');

        $output->writeln('Going through available domains...');
        $output->writeln('');

        $sorted = [];
        $foundDomains = [];
        $doubles = [];
        $domains = $em->getRepository('CmsBundle:Clientdomain')->findByMonitor(true);

        foreach($domains as $domain){
            $sorted[$domain->getDomain()] = $domain;
        }

        ksort($sorted);

        $count = count($sorted);

        $output->writeln('Checking domains uptime...');

        $i = 1;
        foreach($sorted as $domain){
            // if(!preg_match('/\.local$/', $domain->getDomain()) && !preg_match('/\.beyonitdemo\.nl$/', $domain->getDomain()) && !preg_match('/\.beyonitdev\.nl$/', $domain->getDomain())){
                $parsedDomain = str_replace('www.', '', $domain->getDomain());
                $output->writeln('');
                $output->writeln("\t" . $i . ' / ' . $count . "\t" . '<info>' . $parsedDomain . '</info>');

                $realUrl = $domain->getUrl();

                if(!$realUrl || !is_string($realUrl) || ! preg_match('/^http(s)?:\/\/[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(\/.*)?$/i', $realUrl)){
                    $output->writeln("\t\t" . '<error>Invalid URL</error>');
                    return false;
                }


                // Fetch URL
                $ch = curl_init($realUrl);
                curl_setopt($ch, CURLOPT_HEADER, true);
                curl_setopt($ch, CURLOPT_NOBODY, true);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
                curl_setopt($ch, CURLOPT_TIMEOUT,10);
                $curl_output = curl_exec($ch);
                $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
                curl_close($ch);

                if($httpcode == 200){
                    $output->writeln("\t\t" . '<info>SUCCESS: 200</info>');
                }else{
                    $output->writeln("\t\t" . '<info>ERROR: ' . $httpcode . '</info>');
                }

                $domain->setStatus(($httpcode == 200 ? 'up' : 'down'));
                $domain->setMonitorStatus($httpcode);
                $domain->setMonitorDate(new \DateTime());
                // $domain->setMonitorHistory();

                $em->persist($domain);
                $em->flush();

                /*$records = dns_get_record($parsedDomain);

                $warnings = [];

                $dns = [];

                foreach($records as $record){
                    $str = '';

                    $dns_record = [
                        'type' => $record['type'],
                        'pri' => (isset($record['pri']) ? $record['pri'] : ''),
                        'ttl' => (isset($record['ttl']) ? $record['ttl'] : ''),
                        'rule' => (isset($record['txt']) ? $record['txt'] : (isset($record['target']) ? $record['target'] : (isset($record['ip']) ? $record['ip'] : '' ) ) ),
                    ];

                    if($dns_record['type'] == 'TXT'){
                        $str = str_pad($dns_record['ttl'], 9, ' ') . ' ' . $dns_record['rule'];

                        $lastServerIp = $domain->getRequests()->first()->getServerIp();
                        if($lastServerIp && strpos($dns_record['rule'], 'spf') !== false && strpos($dns_record['rule'], $lastServerIp) === false){
                            $warnings[] = 'SPF record bevat niet het server IP (' . $lastServerIp . '):' . "\n\n" . '"' . $dns_record['rule'] . '"';
                        }
                    }elseif($dns_record['type'] == 'MX'){
                        $str = str_pad($dns_record['ttl'], 9, ' ') . ' ' . str_pad($dns_record['pri'], 5) . ' ' . $dns_record['rule'];
                    }elseif($dns_record['type'] == 'NS'){
                        $str = str_pad($dns_record['ttl'], 9, ' ') . ' ' . $dns_record['rule'];
                    }elseif($dns_record['type'] == 'A'){
                        $str = str_pad($dns_record['ttl'], 9, ' ') . ' ' . $dns_record['rule'];
                    }else{
                        // dump($record);
                    }
                    // if($str) $output->writeln("\t\t<info>" . str_pad($dns_record['type'], 5, ' ') . $str . '</info>');

                    $dns[] = $dns_record;
                }

                $domain->setWarnings($warnings);

                if(!empty($warnings)){
                    $output->writeln("\t\t<error>Found warnings...</error>");
                }*/

                // $domain->setDns($dns);
                // $em->persist($domain);
                // $em->flush();
            // }
            $output->writeln('');
            $i++;
        }

        return Command::SUCCESS;
    }

    private function findRealUrl($base_url){
        if(!preg_match('/http/', $base_url)){
            $url = 'http://' . $base_url;
        }else{
            $url = $base_url;
        }

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (X11; Linux x86_64; rv:21.0) Gecko/20100101 Firefox/21.0"); // Necessary. The server checks for a valid User-Agent.
        curl_exec($ch);

        $response = curl_exec($ch);
        preg_match('/^Location:(.*)$/mi', $response, $matches);
        curl_close($ch);

        if(!empty($matches[1])){
            $tmp_url = trim($matches[1]);
            if(strpos($tmp_url, preg_replace('/(https?:\/\/)/', '', $base_url)) !== false){
                if(preg_match('/https/', $tmp_url)){
                    return $tmp_url;
                }
                return $this->findRealUrl($tmp_url);
            }else{
            }
        }

        return $url;
    }
}
