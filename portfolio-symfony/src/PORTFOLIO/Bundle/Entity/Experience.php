<?php

namespace PORTFOLIO\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Experience
 *
 * @ORM\Table(name="experience")
 * @ORM\Entity(repositoryClass="PORTFOLIO\Bundle\Repository\ExperienceRepository")
 */
class Experience
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idxp", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idxp;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="xpyear1", type="date", nullable=false)
     */
    private $xpyear1;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="xpyear2", type="date", nullable=false)
     */
    private $xpyear2;

    /**
     * @var string
     *
     * @ORM\Column(name="xpfunction", type="string", length=100, nullable=false)
     */
    private $xpfunction;

    /**
     * @var string
     *
     * @ORM\Column(name="xpemployer", type="string", length=100, nullable=false)
     */
    private $xpemployer;

    /**
     * @var string
     *
     * @ORM\Column(name="xpresume", type="string", length=250, nullable=false)
     */
    private $xpresume;



    /**
     * Get idxp
     *
     * @return integer
     */
    public function getIdxp()
    {
        return $this->idxp;
    }

    /**
     * Set xpyear1
     *
     * @param \DateTime $xpyear1
     *
     * @return Experience
     */
    public function setXpyear1($xpyear1)
    {
        $this->xpyear1 = $xpyear1;

        return $this;
    }

    /**
     * Get xpyear1
     *
     * @return \DateTime
     */
    public function getXpyear1()
    {
        return $this->xpyear1;
    }

    /**
     * Set xpyear2
     *
     * @param \DateTime $xpyear2
     *
     * @return Experience
     */
    public function setXpyear2($xpyear2)
    {
        $this->xpyear2 = $xpyear2;

        return $this;
    }

    /**
     * Get xpyear2
     *
     * @return \DateTime
     */
    public function getXpyear2()
    {
        return $this->xpyear2;
    }

    /**
     * Set xpfunction
     *
     * @param string $xpfunction
     *
     * @return Experience
     */
    public function setXpfunction($xpfunction)
    {
        $this->xpfunction = $xpfunction;

        return $this;
    }

    /**
     * Get xpfunction
     *
     * @return string
     */
    public function getXpfunction()
    {
        return $this->xpfunction;
    }

    /**
     * Set xpemployer
     *
     * @param string $xpemployer
     *
     * @return Experience
     */
    public function setXpemployer($xpemployer)
    {
        $this->xpemployer = $xpemployer;

        return $this;
    }

    /**
     * Get xpemployer
     *
     * @return string
     */
    public function getXpemployer()
    {
        return $this->xpemployer;
    }

    /**
     * Set xpresume
     *
     * @param string $xpresume
     *
     * @return Experience
     */
    public function setXpresume($xpresume)
    {
        $this->xpresume = $xpresume;

        return $this;
    }

    /**
     * Get xpresume
     *
     * @return string
     */
    public function getXpresume()
    {
        return $this->xpresume;
    }
}
