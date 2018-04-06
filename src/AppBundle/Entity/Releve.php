<?php

namespace AppBundle\Entity;
use AppBundle\Form\ReleveType;
use Doctrine\ORM\Mapping as ORM;

/**
 * Releve
 *
 * @ORM\Table(name="releve")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReleveRepository")
 */
class Releve implements InfoInterface
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
     * @var int
     *
     * @ORM\Column(name="km", type="integer")
     */
    private $km;

    /**
     * @var string
     *
     * @ORM\Column(name="dateSave", type="datetime", length=255)
     */
    private $dateSave;

    /**
     * @ORM\ManyToOne(targetEntity="Vehicule",inversedBy="releves")
     * @var Vehicule
     */
    private $vehicule;

        /**
     * Constructor
     */
    public function __construct($index=0)
    {
        $this->dateSave=new \DateTime();
        $this->km=$index;

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
     * Set km
     *
     * @param integer $km
     * @return Releve
     */
    public function setKm($km)
    {
        $this->km = $km;

        return $this;
    }

    /**
     * Get km
     *
     * @return integer 
     */
    public function getKm()
    {
        return $this->km;
    }

    /**
     * Set dateSave
     *
     * @param string $dateSave
     * @return Releve
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
     * Set vehicule
     *
     * @param \AppBundle\Entity\Vehicule $vehicule
     * @return Releve
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
        return ReleveType::class;
    }
}
