<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lecturer
 *
 * @ORM\Table(name="lecturer")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\Repository\LecturerRepository")
 */
class Lecturer
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
     * @ORM\Column(name="name", type="string", length=63, nullable=false, unique=true)
     */
    protected $name;

    /**
     * @ORM\Column(name="bio", type="text", nullable=true)
     */
    protected $bio;

    /**
     * @var \AppBundle\Entity\Lecture[]
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Lecture", mappedBy="lecturer")
     */
    protected $lectures;

    /** {@inheritdoc} */
    public function __toString()
    {
        return $this->getName();
    }

    /** @return int */
    public function getId()
    {
        return $this->id;
    }

    /** @return string */
    public function getName()
    {
        return $this->name;
    }

    /** @param string $name */
    public function setName($name)
    {
        $this->name = $name;
    }

    /** @return string */
    public function getBio()
    {
        return $this->bio;
    }

    /** @param string $bio */
    public function setBio($bio)
    {
        $this->bio = $bio;
    }
}
