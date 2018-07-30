<?php
/**
 * Entity for table mail_alert
 *
 */
namespace AppBundle\Entity;
use AppBundle\Entity\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity
 * @ORM\Table(name="mail_alert")
 */
class MailAlert extends Entity
{
    /**
     * @ORM\Column(
     *     type="integer",
     *     name="mail_alert_id"
     *  )
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $mailAlertId;
    

    /**
     *
     * @ORM\Column( type="boolean")
     */
    protected $active;

    
    /**
     * @ORM\Column(type="integer",
     *     name="app_user_id"
     *  )
     */
    protected $appUserId;



}