<?php

namespace minsal\academicaAnBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estudiante
 *
 * @ORM\Table(name="estudiante", uniqueConstraints={@ORM\UniqueConstraint(name="carnet", columns={"carnet"})}, indexes={@ORM\Index(name="id_asignatura_inscrita", columns={"id_asignatura_inscrita"})})
 * @ORM\Entity
 */
class Estudiante
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
     * @ORM\Column(name="carnet", type="string", length=15, nullable=false)
     */
    private $carnet;

    /**
     * @var string
     *
     * @ORM\Column(name="nombres", type="string", length=100, nullable=false)
     */
    private $nombres;

    /**
     * @var string
     *
     * @ORM\Column(name="apellidos", type="string", length=100, nullable=false)
     */
    private $apellidos;

    /**
     * @var \Asignatura
     *
     * @ORM\ManyToOne(targetEntity="Asignatura")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_asignatura_inscrita", referencedColumnName="id")
     * })
     */
    private $idAsignaturaInscrita;



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
     * Set carnet
     *
     * @param string $carnet
     * @return Estudiante
     */
    public function setCarnet($carnet)
    {
        $this->carnet = $carnet;

        return $this;
    }

    /**
     * Get carnet
     *
     * @return string 
     */
    public function getCarnet()
    {
        return $this->carnet;
    }

    /**
     * Set nombres
     *
     * @param string $nombres
     * @return Estudiante
     */
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;

        return $this;
    }

    /**
     * Get nombres
     *
     * @return string 
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     * @return Estudiante
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string 
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set idAsignaturaInscrita
     *
     * @param \minsal\academicaAnBundle\Entity\Asignatura $idAsignaturaInscrita
     * @return Estudiante
     */
    public function setIdAsignaturaInscrita(\minsal\academicaAnBundle\Entity\Asignatura $idAsignaturaInscrita = null)
    {
        $this->idAsignaturaInscrita = $idAsignaturaInscrita;

        return $this;
    }

    /**
     * Get idAsignaturaInscrita
     *
     * @return \minsal\academicaAnBundle\Entity\Asignatura 
     */
    public function getIdAsignaturaInscrita()
    {
        return $this->idAsignaturaInscrita;
    }
}
