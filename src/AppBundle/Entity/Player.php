<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 *
 * @ORM\Table(name="players")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PlayersRepository")
 */
class Player
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
     * @var Club
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Club", inversedBy="players")
     * @ORM\JoinColumn(name="id_club", referencedColumnName="id")
     */
    private $club;


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
     * @return Player
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
     * @return string
     */
    public function getClub()
    {
        return $this->club;
    }

    /**
     * @param Club $club
     */
    public function setClub(Club $club)
    {
        $this->club = $club;
    }
}

