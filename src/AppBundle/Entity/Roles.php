<?php


namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="roles")
 */
class Roles extends Entity {

    /**
     * @ORM\Column(type="string", length=20,  name="roles_id")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\Column(type="string", length=20)
     */
    protected $name;

}