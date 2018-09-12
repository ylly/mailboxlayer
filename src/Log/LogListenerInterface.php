<?php

namespace YllyMailboxLayer\Log;

interface LogListenerInterface
{
    /**
     * @param int $level
     * @param string $message
     */
    public function recieve($level, $message);
}