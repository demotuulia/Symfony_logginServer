<?php
/**
 * A generic class to send emails
 * 
 *
 */
namespace AppBundle\Manager\Manager;

use AppBundle\Manager\Manager;



class Email extends Manager {


    /**
     * Array of recipients
     *
     * @var array
     */
    private $to = [];

    /**
     * Subject
     *
     * @var
     */
    private $subject;


    /**
     *
     * @var string
     */
    private $body;


    /**
     * @var string
     */
    private $from;


    /**
     * set subject
     *
     * @param $subject
     */
    public function setSubject($subject) {
        $this->subject = $subject;
    }


    /**
     * set body
     *
     * @param $body
     */
    public function setBody($body) {
        $this->body = $body;
    }


    /**
     * set from
     *
     * @param $from
     */
    public function setFrom($from) {
        $this->from = $from;
    }


    /**
     * setTo
     *
     * @param $email
     */
    public function setTo($email) {
        $this->to[] = $email;
    }


    /**
     * Send mail
     *
     */
    public function send() {
        
        $message = \Swift_Message::newInstance(
            $this->subject,
            $this->body,
            'text/html',
            'UTF8'
        );

        $from = $this->getContainer()->getParameter('alert_from_mail');
        $to = current($this->to);
        $message->setFrom($from );
        $message->setTo($to);
        $mailer = $this->getContainer()->get('swiftmailer.mailer.default');
        $mailer->send($message);
        $this->sendFromSpool();

    }

    /**
     * Send from spool
     *
     * Excute console command:
     * >php bin/console swiftmailer:spool:send
     *
     * If amount of emails grows this commando should be excuted with Crontab.
     *
     * (To debug manually do: >php bin/console swiftmailer:spool:send --env=dev )
     *
     *
     *
     * @return Response
     */
    private function sendFromSpool() {

        $command = 'swiftmailer:spool:send';
        $commandClass ='SendEmailCommand';
        $params = [
            '--mailer' => 'default'
        ];

        $this->getContainer()
            ->get('AppBundle.consoleCommandManager')
            ->excecute($command, $commandClass, $params);
    }

}