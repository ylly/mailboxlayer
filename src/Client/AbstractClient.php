<?php

namespace YllyMailboxLayer\Client;

use YllyMailboxLayer\Log\LogListenerInterface;

abstract class AbstractClient implements LoggableClientInterface
{
    const INFO = 'info';

    const ERROR = 'error';

    /**
     * @var LogListenerInterface[]
     */
    private $listeners = [];

    /**
     * @param LogListenerInterface $listener
     */
    public function addListener(LogListenerInterface $listener)
    {
        $this->listeners[] = $listener;
    }

    /**
     * @param int $level
     * @param string $message
     */
    public function emit($level, $message)
    {
        foreach ($this->listeners as $listener) {
            $listener->recieve($level, $message);
        }
    }

    /**
     * @param int $level
     * @param string $message
     */
    public function writeLog($level, $message)
    {
        $this->emit($level, $message);
    }
}