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

    /**
     * @var int
     *
     * @ORM\Column(name="coutAchat", type="integer")
     */
    private $coutAchat;

    /**
     * @var string
     *
     * @ORM\Column(name="dateMiseEnCirculation", type="string", length=255)
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
    $releve= new Releve($this->index0);
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
     * Constructor
     */
    public function __construct()
    {
        $this->releves = new \Doctrine\Common\Collections\ArrayCollection();
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
}
