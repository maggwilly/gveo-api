<?php

namespace AppBundle\Entity;
use AppBundle\Form\VehiculeType;
use Doctrine\ORM\Mapping as ORM;

/**
 * Vehicule
 *
 * @ORM\Table(name="vehicule")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VehiculeRepository")
 *@ORM\HasLifecycleCallbacks()
 */
class Vehicule implements InfoInterface
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
     * @ORM\Column(name="matricule", type="string", length=255)
     */
    private $matricule;

       /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;
    /**
     * @var string
     *
     * @ORM\Column(name="chauffeur", type="string", length=255)
     */
    private $chauffeur;
 

    /**
     * @var int
     *
     * @ORM\Column(name="index0", type="integer")
     */
    private $index0;


    private $lastIndex;

    private $lastReleve;

    private $couts;
    /**
     * @var int
     *
     * @ORM\Column(name="coutAchat", type="integer")
     */
    private $coutAchat;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateMiseEnCirculation", type="datetime")
     */
    private $dateMiseEnCirculation;

    /**
     * @ORM\ManyToOne(targetEntity="Marque")
     * @var Vehicule
     */
    private $marque;
  /**
     * @ORM\ManyToOne(targetEntity="User")
     * @var User
     */
    protected $user;

   /**
   * @ORM\OneToMany(targetEntity="AppBundle\Entity\Releve", mappedBy="vehicule", cascade={"persist","remove"})
   */
    private $releves;   

        /**
     * Constructor
     */
    public function __construct()
    {
        $this->releves = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set matricule
     *
     * @param string $matricule
     * @return Vehicule
     */
    public function setMatricule($matricule)
    {
        $this->matricule = $matricule;

        return $this;
    }
/**
* @ORM\PrePersist
*/
public function prePersist(){
    $this->index0=$this->lastIndex;
    $releve= new Releve($this->index0);
   $this->addRelefe($releve);  
}

/**
* 
 @ORM\PreUpdate()
*/
public function preUpdate(){

    $releve= new Releve($this->lastIndex);
     $this->addRelefe($releve);  
}
    /**
     * Get matricule
     *
     * @return string 
     */
    public function getMatricule()
    {
        return $this->matricule;
    }

    /**
     * Set index0
     *
     * @param integer $index0
     * @return Vehicule
     */
    public function setIndex0($index0)
    {
        $this->index0 = $index0;

        return $this;
    }

    /**
     * Get index0
     *
     * @return integer 
     */
    public function getIndex0()
    {
        return $this->index0;
    }

    /**
     * Set coutAchat
     *
     * @param integer $coutAchat
     * @return Vehicule
     */
    public function setCoutAchat($coutAchat)
    {
        $this->coutAchat = $coutAchat;

        return $this;
    }

    /**
     * Get coutAchat
     *
     * @return integer 
     */
    public function getCoutAchat()
    {
        return $this->coutAchat;
    }

    /**
     * Set dateMiseEnCirculation
     *
     * @param string $dateMiseEnCirculation
     * @return Vehicule
     */
    public function setDateMiseEnCirculation($dateMiseEnCirculation)
    {
        $this->dateMiseEnCirculation = $dateMiseEnCirculation;

        return $this;
    }

    /**
     * Get dateMiseEnCirculation
     *
     * @return string 
     */
    public function getDateMiseEnCirculation()
    {
        return $this->dateMiseEnCirculation;
    }

    /**
     * Set marque
     *
     * @param \AppBundle\Entity\Marque $marque
     * @return Vehicule
     */
    public function setMarque(\AppBundle\Entity\Marque $marque = null)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return \AppBundle\Entity\Marque 
     */
    public function getMarque()
    {
        return $this->marque;
    }

     /**
     * Get marque
     *
     * @return \AppBundle\Entity\Marque 
     */
    public function getLastReleve()
    {
        return $this->lastReleve;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return Vehicule
     */
    public function setLastReleve(\AppBundle\Entity\Releve $lastReleve = null)
    {
        $this->lastReleve = $lastReleve;

        return $this;
    }

         /**
     * Get marque
     *
     * @return array
     */
    public function getCouts()
    {
        return $this->couts;
    }

    /**
     * Set user
     *
     * @param array
     * @return Vehicule
     */
    public function setCouts($couts = array())
    {
        $this->couts = $couts;

        return $this;
    }
    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return Vehicule
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }
    /**
     * Get user
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

                      /**
     * Get virifiedAt
     *
     * @return class 
     */
    public function getClassType()
    {
        return VehiculeType::class;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Vehicule
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
     * Set chauffeur
     *
     * @param string $chauffeur
     * @return Vehicule
     */
    public function setChauffeur($chauffeur)
    {
        $this->chauffeur = $chauffeur;

        return $this;
    }

    /**
     * Get chauffeur
     *
     * @return string 
     */
    public function getChauffeur()
    {
        return $this->chauffeur;
    }


    /**
     * Add releves
     *
     * @param \AppBundle\Entity\Releve $releves
     * @return Vehicule
     */
    public function addRelefe(\AppBundle\Entity\Releve $releve)
    {
        $releve->setVehicule($this);
        $this->releves[] = $releve;
        
        return $this;
    }

    /**
     * Remove releves
     *
     * @param \AppBundle\Entity\Releve $releves
     */
    public function removeRelefe(\AppBundle\Entity\Releve $releves)
    {
        $this->releves->removeElement($releves);
    }

    /**
     * Get releves
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReleves()
    {
        return $this->releves;
    }

    /**
     * Set lastIndex
     *
     * @param integer $lastIndex
     * @return Vehicule
     */
    public function setLastIndex($lastIndex)
    {
        $this->lastIndex = $lastIndex;

        return $this;
    }

    /**
     * Get lastIndex
     *
     * @return integer 
     */
    public function getLastIndex()
    {
        return $this->lastIndex;
    }
}