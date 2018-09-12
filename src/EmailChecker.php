<?php

namespace YllyMailboxLayer;

use YllyMailboxLayer\Client\Check\CheckClientInterface;
use YllyMailboxLayer\Mapping\EmailCheckerMapping;
use YllyMailboxLayer\Model\EmailCheckerModel;
use YllyMailboxLayer\Exception\CheckerException;
use YllyMailboxLayer\Log\LogListenerInterface;

class EmailChecker
{
    /**
     * @var CheckClientInterface
     */
    private $client;

    /**
     * @param CheckClientInterface $client
     */
    public function __construct(CheckClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param LogListenerInterface $listener
     */
    public function addListener(LogListenerInterface $listener)
    {
        $this->client->addListener($listener);
    }

    /**
     * @param string $email
     * @param boolean $catchAll
     * @return EmailCheckerModel
     * @throws CheckerException
     */
    public function checkEmail($email, $catchAll = false)
    {
        $response = $this->client->get(urlencode($email), (bool)$catchAll);

        if (isset($response->error) != null) {
            $errorMessage = isset($response->error->info) && isset($response->error->code) ? $response->error->info . ',' . $response->error->code : json_encode($response->error);
            throw new CheckerException($errorMessage);
        } elseif (is_string($response) && preg_match('/[45]\d{2}/', $response)) {
            throw new CheckerException('Error HTTP ' . $response);
        }

        return EmailCheckerMapping::map($response);
    }
}
