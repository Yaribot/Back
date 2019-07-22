<?php

namespace PORTFOLIO\Bundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="PORTFOLIO\Bundle\Repository\UserRepository")
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="iduser", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $iduser;

    /**
     * @var string
     *
     * @ORM\Column(name="ufirstname", type="string", length=100, nullable=false)
     */
    private $ufirstname;

    /**
     * @var string
     *
     * @ORM\Column(name="ulastname", type="string", length=100, nullable=false)
     */
    private $ulastname;

    /**
     * @var string
     *
     * @ORM\Column(name="uemail", type="string", length=150, nullable=false)
     */
    private $uemail;

    /**
     * @var string
     *
     * @ORM\Column(name="upassword", type="string", length=20, nullable=false)
     */
    private $upassword;

    /**
     * @var string
     *
     * @ORM\Column(name="upseudo", type="string", length=30, nullable=false)
     */
    private $upseudo;

    /**
     * @var integer
     *
     * @ORM\Column(name="statut", type="integer", nullable=false)
     */
    private $statut;



    /**
     * Get iduser
     *
     * @return integer
     */
    public function getIduser()
    {
        return $this->iduser;
    }

    /**
     * Set ufirstname
     *
     * @param string $ufirstname
     *
     * @return User
     */
    public function setUfirstname($ufirstname)
    {
        $this->ufirstname = $ufirstname;

        return $this;
    }

    /**
     * Get ufirstname
     *
     * @return string
     */
    public function getUfirstname()
    {
        return $this->ufirstname;
    }

    /**
     * Set ulastname
     *
     * @param string $ulastname
     *
     * @return User
     */
    public function setUlastname($ulastname)
    {
        $this->ulastname = $ulastname;

        return $this;
    }

    /**
     * Get ulastname
     *
     * @return string
     */
    public function getUlastname()
    {
        return $this->ulastname;
    }

    /**
     * Set uemail
     *
     * @param string $uemail
     *
     * @return User
     */
    public function setUemail($uemail)
    {
        $this->uemail = $uemail;

        return $this;
    }

    /**
     * Get uemail
     *
     * @return string
     */
    public function getUemail()
    {
        return $this->uemail;
    }

    /**
     * Set upassword
     *
     * @param string $upassword
     *
     * @return User
     */
    public function setUpassword($upassword)
    {
        $this->upassword = $upassword;

        return $this;
    }

    /**
     * Get upassword
     *
     * @return string
     */
    public function getUpassword()
    {
        return $this->upassword;
    }

    /**
     * Set upseudo
     *
     * @param string $upseudo
     *
     * @return User
     */
    public function setUpseudo($upseudo)
    {
        $this->upseudo = $upseudo;

        return $this;
    }

    /**
     * Get upseudo
     *
     * @return string
     */
    public function getUpseudo()
    {
        return $this->upseudo;
    }

    /**
     * Set statut
     *
     * @param integer $statut
     *
     * @return User
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return integer
     */
    public function getStatut()
    {
        return $this->statut;
    }
}
