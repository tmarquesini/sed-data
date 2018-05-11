<?php

namespace SedData\Entity;

/**
 * Class Grade
 * @package SedData\Entity
 */
class Grade
{
    /**
     * @var
     */
    private $code;

    /**
     * @var
     */
    private $year;

    /**
     * @var
     */
    private $group;

    /**
     * @var
     */
    private $type;

    /**
     * @var
     */
    private $totalStudents;

    /**
     * @var
     */
    private $transferredStudents;

    /**
     * @var
     */
    private $dropoutStudents;

    /**
     * @var
     */
    private $didNotAttendStudents;

    /**
     * @var
     */
    private $otherStudents;

    /**
     * @var
     */
    private $activeStudents;

    /**
     * Grade constructor.
     * @param $code
     * @param $year
     * @param $group
     * @param $type
     * @param $totalStudents
     * @param $transferredStudents
     * @param $dropoutStudents
     * @param $didNotAttendStudents
     * @param $otherStudents
     * @param $activeStudents
     */
    public function __construct($code, $year, $group, $type, $totalStudents, $transferredStudents, $dropoutStudents, $didNotAttendStudents, $otherStudents, $activeStudents)
    {
        $this->code = $code;
        $this->year = $year;
        $this->group = $group;
        $this->type = $type;
        $this->totalStudents = $totalStudents;
        $this->transferredStudents = $transferredStudents;
        $this->dropoutStudents = $dropoutStudents;
        $this->didNotAttendStudents = $didNotAttendStudents;
        $this->otherStudents = $otherStudents;
        $this->activeStudents = $activeStudents;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @return mixed
     */
    public function getGroup()
    {
        return $this->group;
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
    public function getTotalStudents()
    {
        return $this->totalStudents;
    }

    /**
     * @return mixed
     */
    public function getTransferredStudents()
    {
        return $this->transferredStudents;
    }

    /**
     * @return mixed
     */
    public function getDropoutStudents()
    {
        return $this->dropoutStudents;
    }

    /**
     * @return mixed
     */
    public function getDidNotAttendStudents()
    {
        return $this->didNotAttendStudents;
    }

    /**
     * @return mixed
     */
    public function getOtherStudents()
    {
        return $this->otherStudents;
    }

    /**
     * @return mixed
     */
    public function getActiveStudents()
    {
        return $this->activeStudents;
    }
}