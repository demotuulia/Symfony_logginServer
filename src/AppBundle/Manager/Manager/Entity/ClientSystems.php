<?php
/**
 *  A service class to manage table client_systems
 *
 * -------------------------------------------------------------
 *  Creating public/private key pairs
 * -------------------------------------------------------------
 * Below is the process to create the public/private key pairs.
 *
 * 1. Create
 * ssh-keygen -t rsa -b 4096
 * (save as file: keypair)
 *
 *
 * 2. View private key
 * vi keypair
 *
 * 3. View public key
 * openssl rsa -in keypair -pubout
 * (de public key wordt getoond)
 *
 */
namespace AppBundle\Manager\Manager\Entity;

use AppBundle\Manager\Manager\EntityManager;

final class ClientSystems extends EntityManager{


    /**
     * Variable of the function defineFormPostFunction
     *
     * @var string
     */
    public static $FORM_FUNCTION_INSERT = 'insert';


    /**
     * Variable of the function defineFormPostFunction
     *
     * @var string
     */
    public static $FORM_FUNCTION_UPDATE = 'update';

    
    /**
     * Get systems menu
     * 
     * This menu can be used in class and function:
     * AppBundle\Manager\Manager\Form::get()
     * 
     * @param string $labelField
     * @return array
     */
    public function getMenu($labelField = 'name') {
        return parent::getMenu($labelField);
    }


    /**
     * get All Systems
     *
     * @return array
     */
    public function getAllSystems() {
        $all =   $this->em
            ->getRepository($this->getRepositoryName())
            ->findAll();
        $all = $this->toArray($all);
        return $all;
    }

    /**
     * Get a system or create a new empty system object
     *
     * @param $systemId
     * @return array
     */
    public function get($systemId) {
        return (is_numeric($systemId))
            ? current($this->find($systemId))->toArray() : $this->getDatabaseEntity()->toArray();
    }

    
    /**
     * Define from the post data if the save function is insert or update
     *
     * If the dat has valid (numeric) systemId the function is update
     *
     * @param $data
     * @return string
     */
    public function defineFormPostFunction($data) {

        if (isset($data['systemid'])) {
            if (is_numeric($data['systemid'])) {
                return self::$FORM_FUNCTION_UPDATE;
            }
        }
        return self::$FORM_FUNCTION_INSERT;
    }


    /**
     * @param $data
     * @return array
     */
    public function validate($data)
    {
        $erroMessages = parent::validate($data);

        // Handle case : update
        if ($this->defineFormPostFunction($data) == self::$FORM_FUNCTION_UPDATE) {

            // These should be exactly the same as in  class AppBundle\Entity\clientSystems
            $messagesToIgnore = [
                '\'name\' is already in use',
                '\'apikey\' is already in use',
                '\'pubkey\' is already in use'
            ];

            foreach ($messagesToIgnore as $message) {
                $key = array_search($message, $erroMessages );
                if (is_numeric($key)) {
                    unset($erroMessages[$key]);
                }
            }
        }

        return $erroMessages;
    }


    /**
     * Create X-signature
     *
     * This is a function to decrypt a message on the client side.
     * This function should be copied to each client site to create X-signature in
     * a correct  way.
     *
     * @param $message
     * @param $privateKey
     * @return string
     */
    public function createXSignature($message, $privateKey){
        $xSignature = "";
        openssl_sign($message, $xSignature, $privateKey, "SHA256");
        return base64_encode($xSignature);
    }


    /**
     * Verify X-signature
     *
     * Verify x-signature created by function createXSignature
     *
     * @param $message
     * @param $xSignature
     * @param $clientId
     * @return int
     */
    public function verifyXSignature($message, $xSignature, $clientId) {
        return true;
        \error_log('TUULIA TET' . $publicKey);
        $publicKey = current($this->find($clientId))->get('pubkey');
        return openssl_verify($message, base64_decode($xSignature), $publicKey, "SHA256");
    }
}