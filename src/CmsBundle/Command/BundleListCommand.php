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

class BundleListCommand extends Command
{
    const GITLAB_KEY = 'KMxyG67dpkD8DqPztieR';

    private $output;
    private $Container;

    public function __construct(ContainerInterface $Container){
        $this->Container = $Container;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('trinity:bundle:repo')
            ->setDescription('Update list of bundles available in repo')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $list = file_get_contents('https://gitlab.com/api/v4/groups/2170826/projects?private_token=' . self::GITLAB_KEY . '&per_page=50');
        $list = json_decode($list, true);

        $output->writeln('Fetch bundles from git........');
        $output->writeln('');

        $data = [
            'updated' => new \DateTime(),
            'bundles' => []
        ];
        $parsed_list = [];
        foreach($list as $index => $entry){
            $tagList = file_get_contents('https://gitlab.com/api/v4/projects/' . $entry['id'] . '/repository/tags?private_token=' . self::GITLAB_KEY);
            $entry['tags'] = json_decode($tagList, true);

            if(!empty($entry['tags'])){
                $tag = $entry['tags'][0];
                $output->writeln('Found: <info>' . $entry['name'] . '</info>' . "\t" . $tag['name']);

                $branchList = file_get_contents('https://gitlab.com/api/v4/projects/' . $entry['id'] . '/repository/branches?private_token=' . self::GITLAB_KEY . '&per_page=50');

                $parsed_list[$entry['name']] = [
                    'id'           => $entry['id'],
                    'bundle'       => $entry['name'],
                    'description'  => $entry['description'],
                    'created'      => new \DateTime($entry['created_at']),
                    'changed'      => new \DateTime($entry['last_activity_at']),
                    'ssh_url'      => $entry['ssh_url_to_repo'],
                    'http_url'     => $entry['http_url_to_repo'],
                    'web_url'      => $entry['web_url'],
                    'image_url'    => $entry['avatar_url'],
                    'wiki'         => $entry['wiki_enabled'],
                    'tag'          => $tag['name'],
                    'message'      => $tag['message'],
                    'branches'     => json_decode($branchList, true),
                    'commit'       => $tag['commit']['id'],
                    'commit_date'  => $tag['commit']['created_at'],
                    'commit_short' => $tag['commit']['short_id'],
                ];

                if(!empty($entry['avatar_url'])){
                    $avatarData = @file_get_contents($entry['avatar_url'] . '?private_token=' . self::GITLAB_KEY);
                    if ($avatarData) {
                        $parsed_list[$entry['name']]['image'] = 'data:image/png;base64,' . base64_encode($avatarData);
                    }
                }
            }
        }

        $output->writeln('');
        $output->writeln('Done!');

        $data['bundles'] = $parsed_list;

        $cacheFile = __DIR__ . '/../../../bundles.cache';
        file_put_contents($cacheFile, json_encode($data));

        // dump($data);

        return Command::SUCCESS;
    }

    private function runCommand($string)
    {
        // Split namespace and arguments
        $namespace = split(' ', $string)[0];

        // Set input
        $command = $this->getApplication()->find($namespace);
        $input = new StringInput($string);

        // Send all output to the console
        $returnCode = $command->run($input, $this->output);

        return $returnCode != 0;
    }
}
