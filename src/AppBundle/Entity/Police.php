<?php

namespace AppBundle\Entity;
use AppBundle\Form\PoliceType;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Accessor;
/**
 * Police
 *
 * @ORM\Table(name="police")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PoliceRepository")
 */
class Police implements InfoInterface
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

   /** @Accessor(getter="isExpired") 
   */
     private $expired;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateSave", type="datetime")
     */
    private $dateSave;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="datetime")
     */
    private $startDate;
   /**
     * @var int
     *
     * @ORM\Column(name="cout", type="integer")
     */
    private $cout;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="datetime")
     */
    private $endDate;

    /**
     * @ORM\ManyToOne(targetEntity="Vehicule")
     * @var Vehicule
     */
    private $vehicule;

        /**
     * Constructor
     */
    public function __construct()
    {
        $this->dateSave=new \DateTime();

    } 
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateSave
     *
     * @param string $dateSave
     * @return Police
     */
    public function setDateSave($dateSave)
    {
        $this->dateSave = $dateSave;

        return $this;
    }

    /**
     * Get dateSave
     *
     * @return string 
     */
    public function getDateSave()
    {
        return $this->dateSave;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Police
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
     * Set endDate
     *
     * @param string $endDate
     * @return Police
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }
    /**
     * Set cout
     *
     * @param string $cout
     * @return Reparation
     */
    public function setCout($cout)
    {
        $this->cout = $cout;

        return $this;
    }

    /**
     * Get cout
     *
     * @return string 
     */
    public function getCout()
    {
        return $this->cout;
    }
    /**
     * Get endDate
     *
     * @return string 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set vehicule
     *
     * @param \AppBundle\Entity\Vehicule $vehicule
     * @return Police
     */
    public function setVehicule(\AppBundle\Entity\Vehicule $vehicule = null)
    {
        $this->vehicule = $vehicule;

        return $this;
    }

    /**
     * Get vehicule
     *
     * @return \AppBundle\Entity\Vehicule 
     */
    public function getVehicule()
    {
        return $this->vehicule;
    }

                  /**
     * Get virifiedAt
     *
     * @return class 
     */
    public function getClassType()
    {
        return PoliceType::class;
    }

         /**
     * Get vehicule
     *
     * @return \AppBundle\Entity\Vehicule 
     */
    public function isExpired()
    {
        $this->expired=($this->startDate>=$this->endDate);
        return $this->expired;
    }
}
