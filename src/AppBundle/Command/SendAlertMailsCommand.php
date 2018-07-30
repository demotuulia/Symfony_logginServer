<?php
/**
 * This script sends the mail alerts for the newly inserted log (if needed)
 *
 * Execution: bin/console app:send-mail-alerts logId
 *                                                      logId = id of the newly inserted log
 *
 */
namespace AppBundle\Command;


use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class SendAlertMailsCommand extends ContainerAwareCommand
{

    /**
     * configure
     */
    protected function configure()
    {
        $this
            ->setName('app:send-mail-alerts')
            ->setDescription('Send mail alerts after insertign a new log')
            ->setHelp("This command should be executed after inseting a new log. As parameter the logid should be given.")
            ->addArgument('logId', InputArgument::REQUIRED, 'logId of the newly inserted log.');
    }

    /**
     * execute
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $logId = $input->getArgument('logId');
        $mailAlertManager = $this->getContainer()->get('AppBundle.MailAlert');
        $mailAlertManager->sendMails($logId);
    }
}