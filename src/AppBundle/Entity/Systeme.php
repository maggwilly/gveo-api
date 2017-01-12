<?php

namespace AppBundle\Entity;
use AppBundle\Form\SystemeType;
use Doctrine\ORM\Mapping as ORM;

/**
 * Systeme
 *
 * @ORM\Table(name="systeme")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SystemeRepository")
 */
class Systeme implements InfoInterface
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="dscription", type="string", length=255)
     */
    private $dscription;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="thumburl", type="string", length=255)
     */
    private $thumburl;


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
     * Set nom
     *
     * @param string $nom
     * @return Systeme
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set dscription
     *
     * @param string $dscription
     * @return Systeme
     */
    public function setDscription($dscription)
    {
        $this->dscription = $dscription;

        return $this;
    }

    /**
     * Get dscription
     *
     * @return string 
     */
    public function getDscription()
    {
        return $this->dscription;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Systeme
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set thumburl
     *
     * @param string $thumburl
     * @return Systeme
     */
    public function setThumburl($thumburl)
    {
        $this->thumburl = $thumburl;

        return $this;
    }

    /**
     * Get thumburl
     *
     * @return string 
     */
    public function getThumburl()
    {
        return $this->thumburl;
    }

                      /**
     * Get virifiedAt
     *
     * @return class 
     */
    public function getClassType()
    {
        return SystemeType::class;
    }
}
