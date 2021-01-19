<?php

namespace App\Entity;

use App\Repository\TimetableRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TimetableRepository::class)
 */
class Timetable
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
    private $morning;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $afternoon;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $close;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $winterHoliday;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $summerHoliday;





    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMorning(): ?string
    {
        return $this->morning;
    }

    public function setMorning(string $morning): self
    {
        $this->morning = $morning;

        return $this;
    }

    public function getAfternoon(): ?string
    {
        return $this->afternoon;
    }

    public function setAfternoon(string $afternoon): self
    {
        $this->afternoon = $afternoon;

        return $this;
    }

    public function getClose(): ?string
    {
        return $this->close;
    }

    public function setClose(string $close): self
    {
        $this->close = $close;

        return $this;
    }

    public function getWinterHoliday(): ?string
    {
        return $this->winterHoliday;
    }

    public function setWinterHoliday(string $winterHoliday): self
    {
        $this->winterHoliday = $winterHoliday;

        return $this;
    }

    public function getSummerHoliday(): ?string
    {
        return $this->summerHoliday;
    }

    public function setSummerHoliday(string $summerHoliday): self
    {
        $this->summerHoliday = $summerHoliday;

        return $this;
    }
}
