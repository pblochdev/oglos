<?php

namespace MainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 */
class User
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $surename;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $sex;

    /**
     * @var \DateTime
     */
    private $born;

    /**
     * @var string
     */
    private $woj;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $kategoria;

    /**
     * @var boolean
     */
    private $rule;


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
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surename
     *
     * @param string $surename
     * @return User
     */
    public function setSurename($surename)
    {
        $this->surename = $surename;

        return $this;
    }

    /**
     * Get surename
     *
     * @return string 
     */
    public function getSurename()
    {
        return $this->surename;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set sex
     *
     * @param string $sex
     * @return User
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get sex
     *
     * @return string 
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set born
     *
     * @param \DateTime $born
     * @return User
     */
    public function setBorn($born)
    {
        $this->born = $born;

        return $this;
    }

    /**
     * Get born
     *
     * @return \DateTime 
     */
    public function getBorn()
    {
        return $this->born;
    }

    /**
     * Set woj
     *
     * @param string $woj
     * @return User
     */
    public function setWoj($woj)
    {
        $this->woj = $woj;

        return $this;
    }

    /**
     * Get woj
     *
     * @return string 
     */
    public function getWoj()
    {
        return $this->woj;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set kategoria
     *
     * @param string $kategoria
     * @return User
     */
    public function setKategoria($kategoria)
    {
        $this->kategoria = $kategoria;

        return $this;
    }

    /**
     * Get kategoria
     *
     * @return string 
     */
    public function getKategoria()
    {
        return $this->kategoria;
    }

    /**
     * Set rule
     *
     * @param boolean $rule
     * @return User
     */
    public function setRule($rule)
    {
        $this->rule = $rule;

        return $this;
    }

    /**
     * Get rule
     *
     * @return boolean 
     */
    public function getRule()
    {
        return $this->rule;
    }
}
