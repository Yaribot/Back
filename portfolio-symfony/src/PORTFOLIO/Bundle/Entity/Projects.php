<?php

namespace PORTFOLIO\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projects
 *
 * @ORM\Table(name="projects")
 * @ORM\Entity(repositoryClass="PORTFOLIO\Bundle\Repository\ProjectsRepository")
 */
class Projects
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idproject", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idproject;

    /**
     * @var string
     *
     * @ORM\Column(name="pjtitle", type="string", length=50, nullable=false)
     */
    private $pjtitle;

    /**
     * @var string
     *
     * @ORM\Column(name="pjlink", type="string", length=255, nullable=false)
     */
    private $pjlink;



    /**
     * Get idproject
     *
     * @return integer
     */
    public function getIdproject()
    {
        return $this->idproject;
    }

    /**
     * Set pjtitle
     *
     * @param string $pjtitle
     *
     * @return Projects
     */
    public function setPjtitle($pjtitle)
    {
        $this->pjtitle = $pjtitle;

        return $this;
    }

    /**
     * Get pjtitle
     *
     * @return string
     */
    public function getPjtitle()
    {
        return $this->pjtitle;
    }

    /**
     * Set pjlink
     *
     * @param string $pjlink
     *
     * @return Projects
     */
    public function setPjlink($pjlink)
    {
        $this->pjlink = $pjlink;

        return $this;
    }

    /**
     * Get pjlink
     *
     * @return string
     */
    public function getPjlink()
    {
        return $this->pjlink;
    }
}
