<?php

namespace PORTFOLIO\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table(name="formation")
 * @ORM\Entity(repositoryClass="PORTFOLIO\Bundle\Repository\FormationRepository")
 */
class Formation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idformation", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idformation;

    /**
     * @var string
     *
     * @ORM\Column(name="formtitre", type="string", length=100, nullable=false)
     */
    private $formtitre;

    /**
     * @var string
     *
     * @ORM\Column(name="formsoustitre", type="string", length=150, nullable=false)
     */
    private $formsoustitre;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="formdate", type="date", nullable=false)
     */
    private $formdate;

    /**
     * @var string
     *
     * @ORM\Column(name="formdescription", type="string", length=200, nullable=false)
     */
    private $formdescription;



    /**
     * Get idformation
     *
     * @return integer
     */
    public function getIdformation()
    {
        return $this->idformation;
    }

    /**
     * Set formtitre
     *
     * @param string $formtitre
     *
     * @return Formation
     */
    public function setFormtitre($formtitre)
    {
        $this->formtitre = $formtitre;

        return $this;
    }

    /**
     * Get formtitre
     *
     * @return string
     */
    public function getFormtitre()
    {
        return $this->formtitre;
    }

    /**
     * Set formsoustitre
     *
     * @param string $formsoustitre
     *
     * @return Formation
     */
    public function setFormsoustitre($formsoustitre)
    {
        $this->formsoustitre = $formsoustitre;

        return $this;
    }

    /**
     * Get formsoustitre
     *
     * @return string
     */
    public function getFormsoustitre()
    {
        return $this->formsoustitre;
    }

    /**
     * Set formdate
     *
     * @param \DateTime $formdate
     *
     * @return Formation
     */
    public function setFormdate($formdate)
    {
        $this->formdate = $formdate;

        return $this;
    }

    /**
     * Get formdate
     *
     * @return \DateTime
     */
    public function getFormdate()
    {
        return $this->formdate;
    }

    /**
     * Set formdescription
     *
     * @param string $formdescription
     *
     * @return Formation
     */
    public function setFormdescription($formdescription)
    {
        $this->formdescription = $formdescription;

        return $this;
    }

    /**
     * Get formdescription
     *
     * @return string
     */
    public function getFormdescription()
    {
        return $this->formdescription;
    }
}
