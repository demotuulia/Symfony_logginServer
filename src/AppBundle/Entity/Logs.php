<?php
/**
 * Entity for table logs
 *
 */
namespace AppBundle\Entity;
use AppBundle\Entity\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity
 * @ORM\Table(name="logs")
 */
class Logs extends Entity
{
    /**
     * @ORM\Column(
     *     type="integer",
     *     name="logid"
     *  )
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $logid;

    /**
     * @ORM\Column(
     *     type="integer"
     *  )
     * @Assert\NotBlank(
     *     message = "'level' is required"
     *  )
     * @Assert\Range(
     *      min = 1,
     *      max = 3,
     *      minMessage = "Level must be 1,2 or 3 ( 1 = 'Error', 2 =  'Warn', 3 = 'Notice' )",
     *      maxMessage = "Level must be 1,2 or 3 ( 1 = 'Error', 2 =  'Warn', 3 = 'Notice' )"
     * )
     */
    protected $level;

    
    /**
     * @ORM\Column(
     *     type="integer"
     * )
     *  @Assert\NotBlank(
     *     message = "'type' is required"
     *  )
     *
     *
     * @Assert\Range(
     *      min = 1,
     *      max = 3,
     *      minMessage = "Type must be 1,2 or 3 ( 1 = 'Application', 2 =  'Security', 3 = 'System' )",
     *      maxMessage =  "Type must be 1,2 or 3 ( 1 = 'Application', 2 =  'Security', 3 = 'System' )"
     *
     * )
     */
    protected $type;
    
    /**
     * @ORM\Column(
     *     type="integer",
     *     name="client_systems_id"
     *  )
     *  @Assert\NotBlank(
     *     message = "'clientSystemsId' is required"
     *  )
     */
    protected $clientSystemsId;


    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank(
     *     message = "'message' is required"
     *  )
     */
    protected $message;

    /**
     * @ORM\Column(type="string", length=20)
     *
     */
    protected $timestamp;



}