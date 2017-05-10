<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Validator\Constraint as AppAssert;

/**
 * Club
 *
 * @ORM\Table(name="club")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ClubRepository")
 */
class Club
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=15)
     *
     */
    private $phone;

    /**
     * @var ArrayCollection|Player[]
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Player", mappedBy="club")
     */
    private $players;

    /**
     * @var string
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active = true;

    public function __construct()
    {
        $this->players = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Club
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
     * Set phone
     *
     * @param string $phone
     *
     * @return Club
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set players
     *
     * @param ArrayCollection|Player[] $players
     *
     * @return Club
     */
    public function setPlayers($players)
    {
        if (!is_array($players) || $players instanceof Collection) {
            throw new \InvalidArgumentException();
        }

        $this->players = $players;

        return $this;
    }

    /**
     * Get players
     *
     * @return ArrayCollection|Player[]
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Club
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this->active;
    }
}

