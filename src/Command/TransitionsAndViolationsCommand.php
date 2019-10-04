<?php

namespace App\Command;

use Monolog\Logger;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\LockableTrait;

class TransitionsAndViolationsCommand extends BaseCommand
{
    use LockableTrait;

    protected static $defaultName = 'transitionsandviolations';

    protected function configure() {
        $this
            ->addArgument('type', InputArgument::REQUIRED, 'Geçerli bir type değeri giriniz. gecis | pttIhlal | pttOnayli | pttKmo | pttAvrasya | masterCard')
            ->addArgument('group', InputArgument::OPTIONAL, 'Bir group değeri giriniz.')
            ->setDescription('HGS geçiş ve ihlal cronu.')
            ->setHelp('[-h] [--type] [--group]');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $args = $input->getArguments();
        $indexerGroup = isset($args['group']) ? (int)$args['group'] : null;
        $cronName = $indexerGroup.'_'.$args['type'];

        if (!$this->lock()) {
            $output->writeln('The command is already running in another process.');
            return 0;
        }
        $this->logger->error('Hakan Test Error');
        $this->logger->debug('Hakan Test Error Debug');

        /*$tasks = [];
        switch ($args['type']) {
            case 'gecis':
                $tasks[] = new TransitionsSave($bash);
                $tasks[] = new MasterCardTransit($bash);
                break;
            case 'pttIhlal':
                $tasks[] = new ViolationsSave($bash);
                break;
            case 'pttOnayli';
                $tasks[] = new ApprovedViolationsSave($bash);
                break;
            case 'pttKmo';
                //$tasks[] = new KmoViolationsSave($bash); // TODO İhlal servisi 500 hatası veriyor bu sebepten kapatıldı.
                break;
            case 'pttAvrasya':
                $tasks[] = new AvrasyaViolationsSave($bash);
                break;
            default:
                $bash->getBashLogger()->error('Geçerli bir type giriniz. gecis | pttIhlal | pttOnayli | pttKmo | pttAvrasya | masterCard');
                exit;
        }

        if(!is_array($tasks) && empty($tasks) && count($tasks) == 0){
            $bash->getBashLogger()->error('Task oluşamadı',['name' =>$cronName ]);
            exit;
        }

        foreach($tasks as $task){
            $task->setGroup($indexerGroup);
            $task->run();
        }*/

        $this->release();
        $output->writeln(['test execute']);
    }

}