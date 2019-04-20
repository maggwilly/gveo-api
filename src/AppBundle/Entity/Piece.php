<?php

namespace AppBundle\Entity;
use AppBundle\Form\PieceType;
use Doctrine\ORM\Mapping as ORM;

/**
 * Piece
 *
 * @ORM\Table(name="piece")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PieceRepository")
 */
class Piece implements InfoInterface
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
     * @ORM\ManyToOne(targetEntity="Systeme")
     * @var Vehicule
     */
    private $systeme;
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
     * Set nom
     *
     * @param string $nom
     * @return Marque
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
     * Get virifiedAt
     *
     * @return class 
     */
    public function getClassType()
    {
        return PieceType::class;
    }   
}

