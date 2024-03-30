<?php

namespace App\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="App\CmsBundle\Repository\CronTaskRepository")
 * @UniqueEntity("name")
 */
class CronTask {

    const DAYS = 'days';
    const HOURS = 'hours';
    const MINUTES = 'minutes';
    const DISABLED = false;
    const ENABLED = true;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string" )
     */
    private $name;

    /**
     * @ORM\Column(type="array")
     */
    private $commands = [];

    /**
     * @ORM\Column(type="string")
     */
    private $minutes = '*';

    /**
     * @ORM\Column(type="string")
     */
    private $hours = '*';

    /**
     * @ORM\Column(type="string")
     */
    private $days = '*';

    /**
     * @ORM\Column(type="string")
     */
    private $weeks = '*';

    /**
     * @ORM\Column(type="string")
     */
    private $months = '*';

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastrun;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $statusTask;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $running = false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $single_run = false;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $delete_after_run = false;

    /**
     * Variable que permite ocultar un comando
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isHide;

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getCommands() {
        return $this->commands;
    }

    public function setCommands($commands) {
        $this->commands = $commands;
        return $this;
    }

    public function getLastRun() {
        return $this->lastrun;
    }

    public function setLastRun($lastrun) {
        $this->lastrun = $lastrun;
        return $this;
    }

    function getStatusTask() {
        return $this->statusTask;
    }

    function setStatusTask($statusTask) {
        $this->statusTask = $statusTask;
    }

    function getIsHide() {
        return $this->isHide;
    }

    function setIsHide($isHide) {
        $this->isHide = $isHide;
    }

    public function __toString() {
        return $this->getName();
    }

    /**
     * Set minutes.
     *
     * @param string $minutes
     *
     * @return CronTask
     */
    public function setMinutes($minutes)
    {
        $this->minutes = $minutes;

        return $this;
    }

    /**
     * Get minutes.
     *
     * @return string
     */
    public function getMinutes()
    {
        return $this->minutes;
    }

    /**
     * Set hours.
     *
     * @param string $hours
     *
     * @return CronTask
     */
    public function setHours($hours)
    {
        $this->hours = $hours;

        return $this;
    }

    /**
     * Get hours.
     *
     * @return string
     */
    public function getHours()
    {
        return $this->hours;
    }

    /**
     * Set days.
     *
     * @param string $days
     *
     * @return CronTask
     */
    public function setDays($days)
    {
        $this->days = $days;

        return $this;
    }

    /**
     * Get days.
     *
     * @return string
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * Set weeks.
     *
     * @param string $weeks
     *
     * @return CronTask
     */
    public function setWeeks($weeks)
    {
        $this->weeks = $weeks;

        return $this;
    }

    /**
     * Get weeks.
     *
     * @return string
     */
    public function getWeeks()
    {
        return $this->weeks;
    }

    /**
     * Set months.
     *
     * @param string $months
     *
     * @return CronTask
     */
    public function setMonths($months)
    {
        $this->months = $months;

        return $this;
    }

    /**
     * Get months.
     *
     * @return string
     */
    public function getMonths()
    {
        return $this->months;
    }

    /**
     * Get cron expression.
     *
     * @return string
     */
    public function getExpression()
    {
        return $this->minutes . ' ' . $this->hours . ' ' . $this->days . ' ' . $this->months . ' ' . $this->weeks;
    }

    /**
     * Get natural string based on cron expression
     *
     * @return string
     */
    public function naturalString(){
        try {
            return \App\CmsBundle\Classes\Cron\CronSchedule::fromCronString($this->getExpression())->asNaturalLanguage();
        } catch (\Exception $e) {
            return null;
        }
    }

    /**
     * Get next run
     *
     * @return Datetime
     */
    public function getNextRun(){
        $cron = \App\CmsBundle\Classes\Cron\CronExpression::factory($this->getExpression());

        if($this->getLastRun() == null){
            $cron->isDue();
            return $cron->getNextRunDate();
        }

        return $cron->getNextRunDate($this->getLastRun());
    }

    /**
     * Set singleRun
     *
     * @param boolean $singleRun
     *
     * @return CronTask
     */
    public function setSingleRun($singleRun)
    {
        $this->single_run = $singleRun;

        return $this;
    }

    /**
     * Get singleRun
     *
     * @return boolean
     */
    public function getSingleRun()
    {
        return $this->single_run;
    }

    /**
     * Set deleteAfterRun.
     *
     * @param bool|null $deleteAfterRun
     *
     * @return CronTask
     */
    public function setDeleteAfterRun($deleteAfterRun = null)
    {
        $this->delete_after_run = $deleteAfterRun;

        return $this;
    }

    /**
     * Get deleteAfterRun.
     *
     * @return bool|null
     */
    public function getDeleteAfterRun()
    {
        return $this->delete_after_run;
    }

    /**
     * Set running.
     *
     * @param bool|null $running
     *
     * @return CronTask
     */
    public function setRunning($running = null)
    {
        $this->running = $running;

        return $this;
    }

    /**
     * Get running.
     *
     * @return bool|null
     */
    public function getRunning()
    {
        return $this->running;
    }
}
