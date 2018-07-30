<?php
/**
 * Entity for table mail_alert_filter
 * 
 *  This table has the filters for the table 'mail_alert'
 * 
 *
 */
namespace AppBundle\Entity;
use AppBundle\Entity\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity
 * @ORM\Table(name="mail_alert_filter")
 */
class MailAlertFilter extends Entity
{
    /**
     * @ORM\Column(
     *     type="integer",
     *     name="mail_alert_filter_id"
     *  )
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $mailAlertFilterId;

    
    /**
     * @ORM\Column(
     *     type="integer",
     *     name="mail_alert_id"
     *  )
     */
    protected $mailAlertId;
    
    
    /**
     * @ORM\Column(
     *      type="string", 
     *      length=100,
     *      name="filter_field"
     * )
     *
     */
    protected $filterField;
    

    /**
     * @ORM\Column(type="string", length=10)
     *
     */
    protected $operator;
    

    /**
     * @ORM\Column(type="string", length=100)
     *
     */
    protected $value;

    
}