<?php

namespace SedData\Entity;

/**
 * Class Student
 * @package SedData\Entity
 */
class Student
{
    /**
     * @var
     */
    private $type;

    /**
     * @var
     */
    private $grade;

    /**
     * @var
     */
    private $number;

    /**
     * @var
     */
    private $name;

    /**
     * @var
     */
    private $ra;

    /**
     * @var
     */
    private $raDigit;

    /**
     * @var
     */
    private $raUf;

    /**
     * @var
     */
    private $birthday;

    /**
     * @var
     */
    private $status;

    /**
     * @var
     */
    private $moveDate;

    /**
     * @var
     */
    private $disabilities;

    /**
     * Student constructor.
     * @param $type
     * @param $grade
     * @param $number
     * @param $name
     * @param $ra
     * @param $raDigit
     * @param $raUf
     * @param $birthday
     * @param $status
     * @param $moveDate
     * @param $disabilities
     */
    public function __construct($type, $grade, $number, $name, $ra, $raDigit, $raUf, $birthday, $status, $moveDate, $disabilities)
    {
        $this->type = $type;
        $this->grade = $grade;
        $this->number = $number;
        $this->name = $name;
        $this->ra = $ra;
        $this->raDigit = $raDigit;
        $this->raUf = $raUf;
        $this->birthday = $birthday;
        $this->status = $status;
        $this->moveDate = $moveDate;
        $this->disabilities = $disabilities;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getRa()
    {
        return $this->ra;
    }

    /**
     * @return mixed
     */
    public function getRaDigit()
    {
        return $this->raDigit;
    }

    /**
     * @return mixed
     */
    public function getRaUf()
    {
        return $this->raUf;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getMoveDate()
    {
        return $this->moveDate;
    }

    /**
     * @return mixed
     */
    public function getDisabilities()
    {
        return $this->disabilities;
    }

    /**
     * @return string
     */
    public function getFullRA()
    {
        return $this->ra . $this->raDigit;
    }
}