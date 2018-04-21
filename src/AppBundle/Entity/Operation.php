<?php

namespace AppBundle\Entity;
use AppBundle\Form\OperationType;
use Doctrine\ORM\Mapping as ORM;

/**
 * Operation
 *
 * @ORM\Table(name="operation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OperationRepository")
 */
class Operation implements InfoInterface
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
     * @ORM\Column(name="numroOrdre", type="integer")
     */
    private $numroOrdre;

    /**
     * @var int
     *
     * @ORM\Column(name="km_alerte", type="integer")
     */
    private $km_alerte;

    /**
     * @var int
     *
     * @ORM\Column(name="km_previsionnel_default", type="integer")
     */
    private $km_previsionnel_default;

    /**
     * @var string
     *
     * @ORM\Column(name="libele", type="string", length=255)
     */
    private $libele;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="thumburl", type="string", length=255, nullable=true)
     */
    private $thumburl;
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="operation", type="string", length=255)
     */
    private $operation;

    /**
     * @var string
     *
     * @ORM\Column(name="conseil", type="string", length=255)
     */
    private $conseil;

    private $todo;

    /**
     * @var string
     *
     * @ORM\Column(name="shortConseil", type="string", length=255)
     */
    private $shortConseil;

        /**
     * Constructor
     */
    public function __construct($numroOrdre=0)
    {
        $this->numroOrdre=$numroOrdre;

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
     * Set numroOrdre
     *
     * @param integer $numroOrdre
     * @return Operation
     */
    public function setTodo($todo)
    {
        $this->todo = $todo;

        return $this;
    }

    /**
     * Get numroOrdre
     *
     * @return integer 
     */
    public function getTodo()
    {
        return $this->todo;
    }
    /**
     * Set numroOrdre
     *
     * @param integer $numroOrdre
     * @return Operation
     */
    public function setNumroOrdre($numroOrdre)
    {
        $this->numroOrdre = $numroOrdre;

        return $this;
    }

    /**
     * Get numroOrdre
     *
     * @return integer 
     */
    public function getNumroOrdre()
    {
        return $this->numroOrdre;
    }

    /**
     * Set libele
     *
     * @param string $libele
     * @return Operation
     */
    public function setLibele($libele)
    {
        $this->libele = $libele;

        return $this;
    }

    /**
     * Get libele
     *
     * @return string 
     */
    public function getLibele()
    {
        return $this->libele;
    }

    /**
     * Set reference
     *
     * @param string $reference
     * @return Operation
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Operation
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
     * Set operation
     *
     * @param string $operation
     * @return Operation
     */
    public function setOperation($operation)
    {
        $this->operation = $operation;

        return $this;
    }

    /**
     * Get operation
     *
     * @return string 
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * Set conseil
     *
     * @param string $conseil
     * @return Operation
     */
    public function setConseil($conseil)
    {
        $this->conseil = $conseil;

        return $this;
    }

    /**
     * Get conseil
     *
     * @return string 
     */
    public function getConseil()
    {
        return $this->conseil;
    }

    /**
     * Set shortConseil
     *
     * @param string $shortConseil
     * @return Operation
     */
    public function setShortConseil($shortConseil)
    {
        $this->shortConseil = $shortConseil;

        return $this;
    }

    /**
     * Get shortConseil
     *
     * @return string 
     */
    public function getShortConseil()
    {
        return $this->shortConseil;
    }

    /**
     * Set km_alerte
     *
     * @param integer $kmAlerte
     * @return Operation
     */
    public function setKmAlerte($kmAlerte)
    {
        $this->km_alerte = $kmAlerte;

        return $this;
    }

    /**
     * Get km_alerte
     *
     * @return integer 
     */
    public function getKmAlerte()
    {
        return $this->km_alerte;
    }

    /**
     * Set thumburl
     *
     * @param string $thumburl
     * @return Operation
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
        return OperationType::class;
    } 

    /**
     * Set km_previsionnel_default
     *
     * @param integer $kmPrevisionnelDefault
     * @return Operation
     */
    public function setKmPrevisionnelDefault($kmPrevisionnelDefault)
    {
        $this->km_previsionnel_default = $kmPrevisionnelDefault;

        return $this;
    }

    /**
     * Get km_previsionnel_default
     *
     * @return integer 
     */
    public function getKmPrevisionnelDefault()
    {
        return $this->km_previsionnel_default;
    }
}
