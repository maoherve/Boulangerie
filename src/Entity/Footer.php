<?php

namespace App\Entity;

use App\Repository\FooterRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FooterRepository::class)
 */
class Footer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $linkGitHub;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $linkInstagram;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $linkInkedin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getLinkGitHub(): ?string
    {
        return $this->linkGitHub;
    }

    public function setLinkGitHub(string $linkGitHub): self
    {
        $this->linkGitHub = $linkGitHub;

        return $this;
    }

    public function getLinkInstagram(): ?string
    {
        return $this->linkInstagram;
    }

    public function setLinkInstagram(string $linkInstagram): self
    {
        $this->linkInstagram = $linkInstagram;

        return $this;
    }

    public function getLinkInkedin(): ?string
    {
        return $this->linkInkedin;
    }

    public function setLinkInkedin(string $linkInkedin): self
    {
        $this->linkInkedin = $linkInkedin;

        return $this;
    }
}
