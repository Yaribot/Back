<?php

namespace PORTFOLIO\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Competences
 *
 * @ORM\Table(name="competences")
 * @ORM\Entity(repositoryClass="PORTFOLIO\Bundle\Repository\CompetencesRepository")
 */
class Competences
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idcompetence", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcompetence;

    /**
     * @var string
     *
     * @ORM\Column(name="cptechnology", type="string", length=255, nullable=false)
     */
    private $cptechnology;

    /**
     * @var integer
     *
     * @ORM\Column(name="cplevel", type="integer", nullable=false)
     */
    private $cplevel;



    /**
     * Get idcompetence
     *
     * @return integer
     */
    public function getIdcompetence()
    {
        return $this->idcompetence;
    }

    /**
     * Set cptechnology
     *
     * @param string $cptechnology
     *
     * @return Competences
     */
    public function setCptechnology($cptechnology)
    {
        $this->cptechnology = $cptechnology;

        return $this;
    }

    /**
     * Get cptechnology
     *
     * @return string
     */
    public function getCptechnology()
    {
        return $this->cptechnology;
    }

    /**
     * Set cplevel
     *
     * @param integer $cplevel
     *
     * @return Competences
     */
    public function setCplevel($cplevel)
    {
        $this->cplevel = $cplevel;

        return $this;
    }

    /**
     * Get cplevel
     *
     * @return integer
     */
    public function getCplevel()
    {
        return $this->cplevel;
    }
}
