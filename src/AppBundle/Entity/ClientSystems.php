<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity
 * @ORM\Table(name="client_systems")
 * @UniqueEntity("name", message="'name' is already in use")
 * @UniqueEntity("apikey", message="'apikey' is already in use")
 * @UniqueEntity("pubkey", message="'pubkey' is already in use")
 */
class ClientSystems extends Entity
{
    /**
     * @ORM\Column(
     *     type="integer",
     *     name ="client_systems_id"
     * )
     * 
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $systemid;


    /**
     * @ORM\Column(type="text")
     *
     * @Assert\NotBlank(
     *     message = "'name' is required"
     *  )
     */
    protected $name;
    
    /**
     * @ORM\Column(type="text")
     *
     *
     * @Assert\NotBlank(
     *     message = "'apikey' is required"
     *  )
     * 
     */
    protected $apikey;
    
    
   /**
    * @ORM\Column(type="text")
    *
    * @Assert\NotBlank(
    *     message = "'pubkey' is required"
    *  )
    */
    protected $pubkey;

}