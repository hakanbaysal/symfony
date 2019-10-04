<?php


namespace App\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TransitionsAndViolationsCommand extends Command
{
    protected static $defaultName = 'transitionsandviolations';

    protected function configure() {
        $this
            ->setDescription('list')
            ->setHelp('test girin');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $args = $input->getArguments();

        $output->writeln([
            'test execute'
        ]);
    }

}