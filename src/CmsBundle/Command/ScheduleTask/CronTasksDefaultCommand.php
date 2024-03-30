<?php

namespace App\CmsBundle\Command\ScheduleTask;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CronTasksDefaultCommand extends Command {

    protected function configure() {

        $this->setName('crontasks:default')->setDescription('Creates the commands by default in database.');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {

        set_time_limit(0);
        ini_set('memory_limit', '-1');
        $container = $this->getContainer();
        $defaultCommands = array(
            array("name" => "Example asset symlinking task",
                "interval" => 2 /* Run once every 2 minutes */,
                "range" => 'minutes',
                "commands" => 'assets:install --symlink web',
                "enabled" => true
            ),
            array("name" => "Example asset  task",
                "interval" => 2 /* Run once every 2 hour */,
                "range" => 'hours',
                "commands" => 'cache:clear',
                "enabled" => false
            ),
        );

        $container->get('trinity.crontask_default')->setArrayCommands($defaultCommands);

        return Command::SUCCESS;
    }

}
