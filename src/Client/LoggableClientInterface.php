<?php

namespace YllyMailboxLayer\Client;

use YllyMailboxLayer\Log\LogListenerInterface;

interface LoggableClientInterface
{
    /**
     * @param int $level
     * @param string $message
     */
    public function writeLog($level, $message);

    /**
     * @var LogListenerInterface[]
     */
    public function addListener(LogListenerInterface $listener);

    /**
     * @param int $level
     * @param string $message
     */
    public function emit($level, $message);
}