<?php

namespace YllyMailboxLayer\Model;

class EmailCheckerModel
{
    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $didYouMean;

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $domain;

    /**
     * @var boolean
     */
    private $formatValid;

    /**
     * @var boolean
     */
    private $mxFound;

    /**
     * @var boolean
     */
    private $smtpCheck;

    /**
     * @var boolean
     */
    private $catchAll;

    /**
     * @var boolean
     */
    private $role;

    /**
     * @var boolean
     */
    private $disposable;

    /**
     * @var boolean
     */
    private $free;

    /**
     * @var float
     */
    private $score;

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return EmailCheckerModel
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getDidYouMean()
    {
        return $this->didYouMean;
    }

    /**
     * @param string $didYouMean
     * @return EmailCheckerModel
     */
    public function setDidYouMean($didYouMean)
    {
        $this->didYouMean = $didYouMean;

        return $this;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param string $user
     * @return EmailCheckerModel
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param string $domain
     * @return EmailCheckerModel
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getFormatValid()
    {
        return $this->formatValid;
    }

    /**
     * @param boolean $formatValid
     * @return EmailCheckerModel
     */
    public function setFormatValid($formatValid)
    {
        $this->formatValid = $formatValid;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getMxFound()
    {
        return $this->mxFound;
    }

    /**
     * @param boolean $mxFound
     * @return EmailCheckerModel
     */
    public function setMxFound($mxFound)
    {
        $this->mxFound = $mxFound;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getSmtpCheck()
    {
        return $this->smtpCheck;
    }

    /**
     * @param boolean $smtpCheck
     * @return EmailCheckerModel
     */
    public function setSmtpCheck($smtpCheck)
    {
        $this->smtpCheck = $smtpCheck;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getCatchAll()
    {
        return $this->catchAll;
    }

    /**
     * @param boolean $catchAll
     * @return EmailCheckerModel
     */
    public function setCatchAll($catchAll)
    {
        $this->catchAll = $catchAll;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param boolean $role
     * @return EmailCheckerModel
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getDisposable()
    {
        return $this->disposable;
    }

    /**
     * @param boolean $disposable
     * @return EmailCheckerModel
     */
    public function setDisposable($disposable)
    {
        $this->disposable = $disposable;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getFree()
    {
        return $this->free;
    }

    /**
     * @param boolean $free
     * @return EmailCheckerModel
     */
    public function setFree($free)
    {
        $this->free = $free;

        return $this;
    }

    /**
     * @return float
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * @param float $score
     * @return EmailCheckerModel
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }
}
