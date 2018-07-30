<?php
/**
 *  A service class to manage table app_users
 *
 */
namespace AppBundle\Manager\Manager\Entity;

use AppBundle\Manager\Manager\EntityManager;

final class User extends EntityManager{

    /**
     * @var string
     */
    public static $ROLE_GUEST = 'ROLE_GUEST';

    /**
     * @var string
     */
    public static $ROLE_USER = 'ROLE_USER';

    /**
     * @var string
     */
    public static $ROLE_ADMIN = 'ROLE_ADMIN';


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
     * currentUser
     *
     * @varobject
     */
    private $currentUser;


    /**
     * getCurrentUser
     *
     * @return object
     */
    public function getCurrentUser() {

        if (!$this->currentUser) {

            $guestUser = (object)[
                'role' => self::$ROLE_GUEST,
                'username' => '',
            ];

            $token = $this->getContainer()->get('security.token_storage')->getToken();
            
            if (!$token) {
                $this->currentUser = $guestUser;
            } else {
                $user = $this->getContainer()->get('security.token_storage')->getToken()->getUser();

                $this->currentUser = (is_object($user))
                    ? (object) [
                        'id' => $user->get('id'),
                        'username' => $user->get('username'),
                        'role' => $user->get('role')
                    ]
                    : $guestUser;
            }
        }

        return $this->currentUser;
    }


    /**
     * get AllUsers
     * 
     * @return array   indexed by app_user.id
     */
    public function getAllUsers() {
        $all =   $this->em
           ->getRepository($this->getRepositoryName())
           ->findAll();
        $all = $this->toArray($all);
       return $all;
    }


    /**
     * Get a user or create a new empty user object
     * 
     * @param $userId
     * @return array
     */
    public function get($userId) {
       return (is_numeric($userId))
        ? current($this->find($userId))->toArray() : $this->getDatabaseEntity()->toArray();
    }


    /**
     * encryptPassword
     * 
     * @param $password
     * @return string
     */
    public function encryptPassword($password) {
        $user =  $this->getDatabaseEntity();
        $encoder = $this->getContainer()->get('security.password_encoder');
        $encoded = $encoder->encodePassword($user, $password);
        return $encoded;
    }


    /**
     * Define from the post data if the save function is insert or update
     * 
     * If the dat has valid (numeric) userId the function is update
     * 
     * @param $data
     * @return string
     */
    public function defineFormPostFunction($data) {
        if (isset($data['id'])) {
            if (is_numeric($data['id'])) {
                return self::$FORM_FUNCTION_UPDATE;
            }
        }
        return self::$FORM_FUNCTION_INSERT;
    }


    /**
     * Save
     *
     * Before calling standard save wee need to format some fields
     *
     * @param array $formParams
     * @return integer  id of the item
     */
    public function save($formParams) {

        // Format password
        if (isset($formParams['password'] )) {
            if (!$formParams['password'] ) {
                // if password is empty delete it
                unset($formParams['password']);
            } else {
                // if password is given, encrypt it
                $formParams['password'] =  $this->encryptPassword($formParams['password']);
            }
        }

        return parent::save($formParams);
    }

    /**
     * Generic validate function
     *
     * We need to add some corrections to the Symfony standard validation for the
     * case: update user.
     *
     * ... This is not the most elegant solution.
     * 
     * @param $data
     * @return array
     */
    public function validate($data) {

        $erroMessages = parent::validate($data);
        
        // Handle case : update
        if ($this->defineFormPostFunction($data) == self::$FORM_FUNCTION_UPDATE) {
            
            // These should be exactly the same as in  class AppBundle\Entity\user
            $messagesToIgnore = [
                'Username is already in use',
                'Email is already in use' ,
                '\'password\' is required'
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
    
    
}