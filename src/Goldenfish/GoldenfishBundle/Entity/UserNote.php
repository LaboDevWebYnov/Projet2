<?php

namespace Goldenfish\GoldenfishBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserNote
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Goldenfish\GoldenfishBundle\Entity\UserNoteRepository")
 */
class UserNote
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="droit", type="string", length=255)
     */
    private $droit;

    /**
     * @ORM\ManyToOne(targetEntity="Goldenfish\GoldenfishBundle\Entity\Note", inversedBy="usernote")
     * @ORM\JoinColumn(nullable=false)
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity="Goldenfish\UserBundle\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;


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
     * Set droit
     *
     * @param string $droit
     *
     * @return UserNote
     */
    public function setDroit($droit)
    {
        $this->droit = $droit;

        return $this;
    }

    /**
     * Get droit
     *
     * @return string
     */
    public function getDroit()
    {
        return $this->droit;
    }

    /**
     * Set note
     *
     * @param \Goldenfish\GoldenfishBundle\Entity\Note $note
     *
     * @return UserNote
     */
    public function setNote(\Goldenfish\GoldenfishBundle\Entity\Note $note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return \Goldenfish\GoldenfishBundle\Entity\Note
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set user
     *
     * @param \Goldenfish\UserBundle\Entity\User $user
     *
     * @return UserNote
     */
    public function setUser(\Goldenfish\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Goldenfish\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
