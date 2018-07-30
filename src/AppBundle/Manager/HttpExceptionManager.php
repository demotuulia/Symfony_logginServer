<?php
/**
 * A class to throw http exceptions
 *
 */
namespace AppBundle\Manager;

use Symfony\Component\HttpKernel\Exception\HttpException;
use AppBundle\Manager\Manager;


final class HttpExceptionManager {
    
    /**
     * @var int
     */
    public static $SUCCESS = 200;


    /**
     * @var int
     */
    public static $CREATED = 201;


    /**
     * @var int
     */
    public static $BAD_REQUEST = 400;

    /**
     * @var int
     */
    public static $UNAUTHORIZED = 401;


    /**
     * @var int
     */
    public static $FORBIDDEN = 403;

    /**
     * @var int
     */
    public static $NOT_FOUND = 404;

    /**
     * $defaultMessages
     *
     * @var array
     */
    private $defaultMessages = [];



    /**
     * HttpExceptionManager constructor.
     */
    public function __construct()
    {
        $this->setDefaultMessages();
    }


    /**
     *  Set default messages
     */
    private function setDefaultMessages() {
        $this->defaultMessages = [
            self::$BAD_REQUEST      => 'Bad Request',
            self::$NOT_FOUND        => 'Not Found',
            self::$UNAUTHORIZED     => 'Unauthorized',
            self::$FORBIDDEN        => 'Forbidden',
            self::$SUCCESS          => 'Success',
            self::$CREATED          => 'Created'
        ];
    }


    /**
     * Throw exception after the http request standards
     *
     *
     * @param integer $number
     * @param string $message
     */
    public function throwException($number, $message = '') {
        $message = ($message) ? $message : $this->defaultMessages[$number];
        throw new HttpException($number, $message);
    }
}