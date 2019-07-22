<?php

namespace PORTFOLIO\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Hobbies
 *
 * @ORM\Table(name="hobbies")
 * @ORM\Entity(repositoryClass="PORTFOLIO\Bundle\Repository\HobbiesRepository")
 */
class Hobbies
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idhobbie", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idhobbie;

    /**
     * @var string
     *
     * @ORM\Column(name="hbhobbie", type="string", length=200, nullable=false)
     */
    private $hbhobbie;

    /**
     * @var string
     *
     * @ORM\Column(name="hbdescription", type="string", length=150, nullable=false)
     */
    private $hbdescription;

    /**
     * @var string
     *
     * @ORM\Column(name="hbicon", type="string", length=255, nullable=false)
     */
    private $hbicon;



    /**
     * Get idhobbie
     *
     * @return integer
     */
    public function getIdhobbie()
    {
        return $this->idhobbie;
    }

    /**
     * Set hbhobbie
     *
     * @param string $hbhobbie
     *
     * @return Hobbies
     */
    public function setHbhobbie($hbhobbie)
    {
        $this->hbhobbie = $hbhobbie;

        return $this;
    }

    /**
     * Get hbhobbie
     *
     * @return string
     */
    public function getHbhobbie()
    {
        return $this->hbhobbie;
    }

    /**
     * Set hbdescription
     *
     * @param string $hbdescription
     *
     * @return Hobbies
     */
    public function setHbdescription($hbdescription)
    {
        $this->hbdescription = $hbdescription;

        return $this;
    }

    /**
     * Get hbdescription
     *
     * @return string
     */
    public function getHbdescription()
    {
        return $this->hbdescription;
    }

    /**
     * Set hbicon
     *
     * @param string $hbicon
     *
     * @return Hobbies
     */
    public function setHbicon($hbicon)
    {
        $this->hbicon = $hbicon;

        return $this;
    }

    /**
     * Get hbicon
     *
     * @return string
     */
    public function getHbicon()
    {
        return $this->hbicon;
    }
}
