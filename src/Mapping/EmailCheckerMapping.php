<?php

namespace YllyMailboxLayer\Mapping;

use YllyMailboxLayer\Model\EmailCheckerModel;
use YllyMailboxLayer\Exception\CheckerException;

class EmailCheckerMapping
{
    /**
     * @param object $object
     * @var string $object->email
     * @var string $object->did_you_mean
     * @var string $object->domain
     * @var string $object->user
     * @var boolean $object->smtp_check
     * @var boolean $object->mx_found
     * @var boolean $object->format_valid
     * @var boolean $object->catch_all
     * @var boolean $object->disposable
     * @var boolean $object->role
     * @var boolean $object->free
     * @var float $object->score
     * @return EmailCheckerModel
     * @throws CheckerException
     */
    public static function map($object)
    {
        $model = new EmailCheckerModel();

        try {
            $model->setEmail(isset($object->email) ? $object->email : '');
            $model->setDidYouMean($object->did_you_mean);
            $model->setDomain($object->domain);
            $model->setSmtpCheck($object->smtp_check);
            $model->setMxFound($object->mx_found);
            $model->setFormatValid($object->format_valid);
            $model->setCatchAll(isset($object->catch_all) ? $object->catch_all : false);
            $model->setDisposable($object->disposable);
            $model->setRole($object->role);
            $model->setScore($object->score);
            $model->setUser($object->user);
            $model->setFree($object->free);
        } catch (CheckerException $e) {
            throw new CheckerException('An unexpected error issue occurred. Try again in a few minutes');
        }

        return $model;
    }
}
