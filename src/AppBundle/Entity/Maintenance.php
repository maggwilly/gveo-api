<?php

namespace AppBundle\Entity;
use AppBundle\Form\MaintenanceType;
use Doctrine\ORM\Mapping as ORM;

/**
 * Maintenance
 *
 * @ORM\Table(name="maintenance")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MaintenanceRepository")
 */
class Maintenance implements InfoInterface
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
     * @ORM\Column(name="dateSave", type="date")
     */
    private $dateSave;

    /**
     * @var string
     *
     * @ORM\Column(name="cout", type="integer")
     */
    private $cout;

    /**
     * @var int
     *
     * @ORM\Column(name="coutMainOeuvre", type="integer")
     */
    private $coutMainOeuvre;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;
  /**
     * @ORM\ManyToOne(targetEntity="Systeme")
     * @var Vehicule
     */
    private $systeme;
  /**
     * @ORM\ManyToOne(targetEntity="Vehicule")
     * @var Vehicule
     */
    private $vehicule;
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
     * @param \DateTime $dateSave
     * @return Maintenance
     */
    public function setDateSave($dateSave)
    {
        $this->dateSave = $dateSave;

        return $this;
    }

    /**
     * Get dateSave
     *
     * @return \DateTime 
     */
    public function getDateSave()
    {
        return $this->dateSave;
    }

    /**
     * Set cout
     *
     * @param string $cout
     * @return Maintenance
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
     * Set coutMainOeuvre
     *
     * @param integer $coutMainOeuvre
     * @return Maintenance
     */
    public function setCoutMainOeuvre($coutMainOeuvre)
    {
        $this->coutMainOeuvre = $coutMainOeuvre;

        return $this;
    }

    /**
     * Get coutMainOeuvre
     *
     * @return integer 
     */
    public function getCoutMainOeuvre()
    {
        return $this->coutMainOeuvre;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Maintenance
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set systeme
     *
     * @param \AppBundle\Entity\Systeme $systeme
     * @return Maintenance
     */
    public function setSysteme(\AppBundle\Entity\Systeme $systeme = null)
    {
        $this->systeme = $systeme;

        return $this;
    }

    /**
     * Get systeme
     *
     * @return \AppBundle\Entity\Systeme 
     */
    public function getSysteme()
    {
        return $this->systeme;
    }

    /**
     * Set vehicule
     *
     * @param \AppBundle\Entity\Vehicule $vehicule
     * @return Maintenance
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
        return MaintenanceType::class;
    }
}
