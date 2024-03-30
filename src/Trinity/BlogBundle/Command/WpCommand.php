<?php

namespace App\Trinity\BlogBundle\Command;

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

use App\Trinity\BlogBundle\Entity\Entry;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\CmsBundle\Entity\Media;

/**
 * Description of ImportDgvCommand
 *
 * @author kwm
 */
class WpCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('trinity:blog:wp')
            ->setDescription('Migrate existing data from wordpress')
            ->addArgument('type', InputArgument::OPTIONAL, 'Type like "posts", "readcount" and "replies".')
            ->addArgument('file', InputArgument::OPTIONAL, 'The input file (.csv)')
        ;
    }


    public function nl2p($string, $line_breaks = false, $xml = false)
    {
        // Remove existing HTML formatting to avoid double-wrapping things
        $string = str_replace(array('<p>', '</p>', '<br>', '<br />'), '', $string);
     
        // It is conceivable that people might still want single line-breaks
        // without breaking into a new paragraph.
        if ($line_breaks == true)
            return '<p>'.preg_replace(array("/([\n]{2,})/i", "/([^>])\n([^<])/i"), array("</p>\n<p>", '<br'.($xml == true ? ' /' : '').'>'), trim($string)).'</p>';
        else 
            return '<p>'.preg_replace("/([\n]{1,})/i", "</p>\n<p>", trim($string)).'</p>';
    }



    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->em = $this->getContainer()->get('doctrine.orm.entity_manager');

        $this->type    = $input->getArgument('type');
        $this->file    = $input->getArgument('file');

        if(is_null($this->type) || empty($this->file)){
            $output->writeln('');
            $output->writeln('The following options are required:');
            $output->writeln('');
            if(empty($this->type)) $output->writeln('- type:' . "\t\t" . 'posts, readcount, replies');
            if(empty($this->file)) $output->writeln('- file:' . "\t\t" . '/path/to/file.csv');

            $output->writeln('');
            die();
        }

        $output->writeln('Importing <info>' . $this->type . '</info>...');
        $output->writeln('');
        $output->writeln('File: <info>' . $this->file . '</info>');
        $output->writeln('------------------------------------------------------------------------------------------------');
        $output->writeln('');

        if(!empty($this->file)){
            $stats = ['add' => 0, 'edit' => 0];



            // Prepare images
            $images = [];
            if($this->type == 'posts'){
                if (($handle = fopen($this->file, "r")) !== FALSE) {
                    while (($data = fgetcsv($handle, 1000000, ";")) !== FALSE) {
                        if($data[20] == 'attachment' && !empty((int)$data[17])){
                            $images[(int)$data[17]] = $data[18];
                        }
                    }
                }
            }


            if (($handle = fopen($this->file, "r")) !== FALSE) {
                $i = 0;
                $labels = [];
                while (($data = fgetcsv($handle, 1000000, ";")) !== FALSE) {
                    if($i == 0){
                        foreach($data as $k => $v){$labels[$k] = $v;}
                    }else{

                        if($this->type == 'posts'){
                            /*
                                POSTS
                             */
                            if($data[20] == 'post'){
                                $preview = []; foreach($data as $k => $v){ $preview[$k . ' | ' . $labels[$k]] = $v; }
                                // dump($preview);die();

                                $id        = $data[0];
                                $title     = $data[5];
                                $content   = $data[4];
                                $slug      = $data[11];
                                $date_add  = $data[2];
                                $date_edit = $data[14];

                                // if((int)$id == 19112){
                                    $content = $this->nl2p($content);
                                    $content = preg_replace("/<p[^>]*><\\/p[^>]*>/", '', $content);
                                    $content = str_replace("<p></p>", '', $content);
                                    $content = str_replace("<p>&nbsp;</p>", '', $content);
                                    $content = preg_replace("/<p[^>]*>(&nbsp;)?(\\r|\\n|\\r\\n)(&nbsp;)?<\\/p[^>]*>/", '', $content);
                                    $content = str_replace("<p>
</p>", '', $content);

                                    // dump($content);
                                    // die($content);
                                // }else{
                                //     continue;
                                // }

                                $add = false;
                                $Entry = $this->em->getRepository('TrinityBlogBundle:Entry')->findOneBy(['old_id' => $id]);
                                if(empty($Entry)){
                                    $Entry = new \App\Trinity\BlogBundle\Entity\Entry();
                                    $Entry->setOldId($id);
                                    $Entry->setBlog($Blog);
                                    $add = true;
                                    $stats['add']++;
                                }else{
                                    $stats['edit']++;
                                }

                                $Entry->setDateAdd(new \DateTime($date_add));
                                $Entry->setDatePublish(new \DateTime($date_add));
                                $Entry->setDateEdit(new \DateTime($date_edit));
                                $Entry->setLabel($title);
                                $Entry->setSlug($slug);
                                $Entry->setBody($content);
                                $Entry->setConcept($data[7] != 'publish');

                                $this->em->persist($Entry);

                                if(!empty($images[$id])){
                                    $im = $this->uploadMedia($images[$id], $Entry);
                                    $Entry->setImage($im);

                                    if(!$Entry->getMedia()->contains($im)){
                                        $Entry->addMedia($im);
                                    }
                                    $this->em->persist($Entry);
                                }

                                $this->em->flush();
                            }
                        }else if($this->type == 'readcount'){
                            /*
                                COUNTS
                             */
                            $preview = []; foreach($data as $k => $v){ $preview[$k . ' | ' . $labels[$k]] = $v; }
                            // dump($preview);die();

                            $id        = $data[0];
                            $date_last = $data[2];
                            $count     = $data[3];

                            $Entry = $this->em->getRepository('TrinityBlogBundle:Entry')->findOneBy(['old_id' => $id]);
                            if(!empty($Entry)){
                                $Entry->setReadcount($count);

                                $this->em->persist($Entry);
                                $this->em->flush();
                                $stats['edit']++;
                            }
                        }else if($this->type == 'replies'){
                            /*
                                REPLIES
                             */
                            if($data[12] == '' && $data[10] != 'spam'){
                                $preview = []; foreach($data as $k => $v){ $preview[$k . ' | ' . $labels[$k]] = $v; }
                                // dump($preview);die();

                                $comment_id = (int)$data[0];
                                $post_id    = (int)$data[1];
                                $author     = $data[2];
                                $email      = $data[3];
                                $avatar     = $data[4];
                                $ip         = $data[5];
                                $date       = $data[6];
                                $comment    = $data[8];
                                $approved   = $data[10];
                                $parent     = (int)$data[13];

                                $Entry = $this->em->getRepository('TrinityBlogBundle:Entry')->findOneBy(['old_id' => $post_id]);
                                if(!empty($Entry)){

                                    $Reply = $this->em->getRepository('TrinityBlogBundle:Reply')->findOneBy(['old_id' => $comment_id]);
                                    if(empty($Reply)){
                                        $Reply = new \App\Trinity\BlogBundle\Entity\Reply();
                                        $Reply->setOldId($comment_id);
                                        $Reply->setEntry($Entry);
                                        $stats['add']++;
                                    }else{
                                        $stats['edit']++;
                                    }

                                    $Reply->setFirstname($author);
                                    $Reply->setLastname('');
                                    $Reply->setEmail($email);
                                    $Reply->setIp($ip);
                                    $Reply->setComment($comment);
                                    $Reply->setDate(new \DateTime($date));
                                    $Reply->setApproved((int)$approved === 1);



                                    $output->writeln($comment_id . ' | ' . $author);

                                    if(!empty($parent)){
                                        $ParentReply = $this->em->getRepository('TrinityBlogBundle:Reply')->findOneBy(['old_id' => $parent]);
                                        $Reply->setReply($ParentReply);
                                    }

                                    $this->em->persist($Reply);
                                    $this->em->flush();
                                }
                            }
                        }else{
                            die('Unknown command: ' . $this->type);
                        }
                    }

                    $i++;
                }
                fclose($handle);

                dump($stats);die();
            }
        }


        $output->writeln('');
        $output->writeln('Done!');

        return Command::SUCCESS;
    }

    function uploadMedia($url, $Entry){
        $tmpFile = '/tmp/importedImage';
        try{
            $tmp_data = file_get_contents($url);
            file_put_contents($tmpFile, $tmp_data);
            $media_info = getimagesize($tmpFile);

            $ext = preg_replace('/^.*?\.(\w+)$/', '$1', $url);
            $filename = $Entry->getSlug() . '.' . $ext;

            $Mediadir = $this->em->getRepository('CmsBundle:Mediadir')->findPathByName($this->em, 'Blog/' . $Entry->getBlog()->getLabel() . '/' . $Entry->getLabel() . '/' . $filename);

            $Media = $this->em->getRepository('CmsBundle:Media')->findOneBy(['parent' => $Mediadir, 'label' => $filename]);
            if(empty($Media)){
                // Create UploadedFile-object
                $UploadedFile = new UploadedFile( $tmpFile, $filename, $media_info['mime'], 0, true );

                // dump($UploadedFile);die();

                $Media = new \App\CmsBundle\Entity\Media();
                $Media->setParent($Mediadir);
                $Media->setLabel($filename);
                $Media->setDateAdd();
                $Media->setFile($UploadedFile); // Link UploadedFile to the media entity
                $Media->preUpload(); // Prepare file and path
                $Media->upload(); // Upload actual file

                $this->em->persist($Media);
                $this->em->flush();

                return $Media;
            }else{
                return $Media;
            }
        }catch(\Exception $e){
            dump($e->getMessage());die();
        }

        return null;
        /*$Parent = $this->getDoctrine()->getRepository('CmsBundle:Mediadir')->findPathByName($this->em, 'Blog/' . $Entry->getBlog()->getLabel() . '/' . $Entry->getLabel());
        $files = $_FILES['media'];

        foreach($files['name'] as $index => $filename){
            // Create UploadedFile-object
            $UploadedFile = new UploadedFile( $files['tmp_name'][$index], $filename, $files['type'][$index], (int)$files['error'][$index], true );

            $Media = new \App\CmsBundle\Entity\Media();
            $Media->setParent($Parent);
            $Media->setLabel($filename);
            $Media->setDateAdd();
            $Media->setFile($UploadedFile); // Link UploadedFile to the media entity
            $Media->preUpload(); // Prepare file and path
            $Media->upload(); // Upload actual file

            $this->em->persist($Media);

            if($Entry){
                $Entry->addMedia($Media);
            }

            $Media->webPath = $Media->getWebPath();

            $result[] = $Media;
        }*/
    }
}
