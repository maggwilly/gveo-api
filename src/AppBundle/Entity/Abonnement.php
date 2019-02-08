<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Abonnement
 *
 * @ORM\Table(name="abonnement")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AbonnementRepository")
  * @ORM\HasLifecycleCallbacks
 */
class Abonnement
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="datetime")
     */
    private $endDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="datetime")
     */
    private $startDate;

    /**
     * @var int
     *
     * @ORM\Column(name="nbervehicule", type="integer")
     */
    private $nbervehicule;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="plan", type="string", length=255)
     */
    private $plan;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", length=255)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
   * @ORM\OneToOne(targetEntity="Info" ,inversedBy="abonnement", cascade={"persist","remove"})
    * @ORM\JoinColumn(name="uid",referencedColumnName="uid" )
   */
    private $info;

         /**
     * Constructor
     */
    public function __construct($plan=null)
    {
        $this->date=new \DateTime();
         $this->startDate=new \DateTime();
         $this->plan=$plan;
         $this->price=0;
          $this->status='ACTIVE';
    }
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     *
     * @return Abonnement
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     *
     * @return Abonnement
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set nbervehicule
     *
     * @param integer $nbervehicule
     *
     * @return Abonnement
     */
    public function setNbervehicule($nbervehicule)
    {
        $this->nbervehicule = $nbervehicule;

        return $this;
    }

     /**
    * @ORM\PrePersist()
    */
    public function PrePersist(){
          $this->endDate=new \DateTime();
           switch ($this->plan) {
               case 'STARTER':
                 $this->endDate->modify('+1 year');
                 $this->nbervehicule=2;
                   break;
               case 'STANDARD':
                     $this->nbervehicule=10;
                     $this->endDate->modify('+1 year');
                   break;               
               default:
                    $this->nbervehicule=150;
                    $this->endDate->modify('+1 year');
                   break;
           }
    }
    /**
     * Get nbervehicule
     *
     * @return int
     */
    public function getNbervehicule()
    {
        return $this->nbervehicule;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Abonnement
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set plan
     *
     * @param string $plan
     *
     * @return Abonnement
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;

        return $this;
    }

    /**
     * Get plan
     *
     * @return string
     */
    public function getPlan()
    {
        return $this->plan;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Abonnement
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Abonnement
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set info
     *
     * @param \Pwm\AdminBundle\Entity\Info $info
     *
     * @return Abonnement
     */
    public function setInfo(\AppBundle\Entity\Info $info = null)
    {
       $info->setAbonnement( $this);
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return \Pwm\AdminBundle\Entity\Info
     */
    public function getInfo()
    {
        return $this->info;
    }
      
}

