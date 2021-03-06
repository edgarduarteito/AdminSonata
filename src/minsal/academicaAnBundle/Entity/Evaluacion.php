<?php

namespace minsal\academicaAnBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluacion
 *
 * @ORM\Table(name="evaluacion")
 * @ORM\Entity(repositoryClass="minsal\academicaAnBundle\Repositorio\EvaluacionRepository")
 */
class Evaluacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

     /**
     * @var float $porcentaje
     *
     * @ORM\Column(name="porcentaje", type="decimal", nullable=false)
     * @Assert\Range(
     *      min = "0",
     *      max = "1",
     *      minMessage = "El menor número a ingresar es 0",
     *      maxMessage = "El mayor número a ingresar es 1"
     * )
     * 
     */
    private $porcentaje;

    /**
     * @var float $nota
     *
     * @ORM\Column(name="nota", type="decimal", nullable=false)
     * @Assert\Range(
     *      min = "0",
     *      max = "10",
     *      minMessage = "El menor número a ingresar es 0",
     *      maxMessage = "El mayor número a ingresar es 10"
     * )
     */
    private $nota;



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
     * Set porcentaje
     *
     * @param string $porcentaje
     * @return Evaluacion
     */
    public function setPorcentaje($porcentaje)
    {
        $this->porcentaje = $porcentaje;

        return $this;
    }

    /**
     * Get porcentaje
     *
     * @return string 
     */
    public function getPorcentaje()
    {
        return $this->porcentaje;
    }

    /**
     * Set nota
     *
     * @param string $nota
     * @return Evaluacion
     */
    public function setNota($nota)
    {
        $this->nota = $nota;

        return $this;
    }

    /**
     * Get nota
     *
     * @return string 
     */
    public function getNota()
    {
        return $this->nota;
    }
    
  public function __toString() {
  return $this->porcentaje;
}
}
