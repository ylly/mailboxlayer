<?php

namespace YllyMailboxLayer\Client\Check;

use YllyMailboxLayer\Client\LoggableClientInterface;

interface CheckClientInterface extends LoggableClientInterface
{
    /**
     * @param string $email
     * @param boolean $catchAll
     * @return object
     */
    public function get($email, $catchAll);
}
