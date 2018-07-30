<?php
/**
 * A class to manage log statments to the log files with monolog
 *
 */
namespace AppBundle\Manager;
use AppBundle\Manager\Manager;

final class MonoLog  {
    /**
     * @var Symfony\Bridge\Monolog\Logger
     */
    protected $logger;


    /**
     * LogManager constructor.
     *
     * @param Symfony\Bridge\Monolog\Logger $logger
     */
    public function __construct( $logger)
    {
        $this->logger = $logger;
    }


    /**
     * Set log statement
     *
     * @param string $message
     * @param string $type
     */
    public function log($message , $type = 'debug') {
        switch ($type) {
            case 'debug':
                $this->logger->info('IMOTIONS DEBUG: ' . $message);
                break;
        }
    }
}