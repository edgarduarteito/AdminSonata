<?php

namespace minsal\academicaAnBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Asignatura
 *
 * @ORM\Table(name="asignatura", uniqueConstraints={@ORM\UniqueConstraint(name="nombre", columns={"nombre"})}, indexes={@ORM\Index(name="fkEval", columns={"id_evaluacion_realizada"})})
 * @ORM\Entity
 */
class Asignatura
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
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @var \Evaluacion
     *
     * @ORM\ManyToOne(targetEntity="Evaluacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_evaluacion_realizada", referencedColumnName="id")
     * })
     */
    private $idEvaluacionRealizada;



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
     * Set nombre
     *
     * @param string $nombre
     * @return Asignatura
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set idEvaluacionRealizada
     *
     * @param \minsal\academicaAnBundle\Entity\Evaluacion $idEvaluacionRealizada
     * @return Asignatura
     */
    public function setIdEvaluacionRealizada(\minsal\academicaAnBundle\Entity\Evaluacion $idEvaluacionRealizada = null)
    {
        $this->idEvaluacionRealizada = $idEvaluacionRealizada;

        return $this;
    }

    /**
     * Get idEvaluacionRealizada
     *
     * @return \minsal\academicaAnBundle\Entity\Evaluacion 
     */
    public function getIdEvaluacionRealizada()
    {
        return $this->idEvaluacionRealizada;
    }
    public function __toString() {
   return $this->nombre;
}
}
