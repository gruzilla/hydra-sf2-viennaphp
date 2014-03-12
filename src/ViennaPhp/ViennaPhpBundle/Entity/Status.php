<?php

namespace ViennaPhp\ViennaPhpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Hydra\Annotation as Hydra;

/**
 * Status
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ViennaPhp\ViennaPhpBundle\Entity\StatusRepository")
 * @Hydra\Decoder("ViennaPhp\ViennaPhpBundle\Hydra\Twitter\SearchDecoder")
 */
class Status
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="string", length=255)
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=255)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255)
     * @Hydra\Map(source="user.screen_name")
     */
    private $username;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime")
     * @Hydra\Map("created_at")
     */
    private $created;


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
     * Set text
     *
     * @param string $text
     * @return Status
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Status
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Status
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }
}
