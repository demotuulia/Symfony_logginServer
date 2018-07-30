<?php
/**
 * This class is used to test manager and entity for table 'mail_alert'
 *
 */
namespace Tests\AppBundle\UnitTests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use AppBundle\Manager\Manager\UnitTests;

class SendAlertMailsCommandTest extends WebTestCase
{
    /**
     * @var AppBundle\Manager\UnitTests
     */
    private $unitTests;


    /**
     * Initialize tests
     */
    protected function setUp()
    {
        $kernel = static::createKernel();
        $this->unitTests = new UnitTests($kernel);
        $this->unitTests->resetDatabase();
    }




    /**
     * testSendMailAlerts
     *
     * Here we can only test that the correct mails are sent with the correct log.
     * The function $mailAlertManager->sendMails($logId) should be called every time a new log
     * is inserted.
     *
     * You should manually check that he mails are sent.
     *
     */
    public function testSendMailAlerts() {

        $mailAlertManager = $this->unitTests->getContainer()->get('AppBundle.MailAlert');
        $logId = 43;
        $sentMails = $mailAlertManager->sendMails($logId);

        $expectedSentMails = [
            0 =>
                [
                    'email' => 'tuulia@imotions.nl',
                    'logId' => $logId,
                ],
            1 =>
                [
                    'email' => 'admin_@imotions.nl',
                    'logId' => $logId,
                ],
        ];
        
        $this->assertEquals(
            $expectedSentMails,
            $sentMails
        );

    }





}
