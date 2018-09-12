<?php

namespace YllyMailboxLayer\Client\Check;

use YllyMailboxLayer\Client\AbstractClient;

class CheckClient extends AbstractClient implements CheckClientInterface
{
    const ENDPOINT = 'https://apilayer.net/api/';

    /**
     * @var string
     */
    private $accessKey;

    /**
     * @var string
     */
    private $proxy;

    /**
     * @param string $accessKey
     * @param string $proxy
     */
    public function __construct($accessKey, $proxy)
    {
        $this->accessKey = $accessKey;
        $this->proxy = $proxy;
    }

    /**
     * @param string $email
     * @param boolean $catchAll
     * @return string
     */
    private function createUrl($email, $catchAll)
    {
        $urlParameters = ['access_key' => $this->accessKey, 'email' => $email, 'catch_all' => $catchAll];
        $url = self::ENDPOINT . 'check?' . http_build_query($urlParameters);

        return $url;
    }

    /**
     * @param string $url
     * @return string|object
     */
    private function getResponse($url)
    {
        $context = $this->getContext();

        $response = file_get_contents($url, false, $context);

        if (preg_match('/[45]\d{2}/', $http_response_header[0], $matches)) {
            $this->writeLog(self::ERROR, sprintf('Error : %s', 'http ' . $matches[0]));
            $response = $matches[0];
        } else {
            $this->writeLog(self::INFO, sprintf('Response : %s', $response));
        }

        return $response;
    }

    /**
     * @return null|resource
     */
    private function getContext()
    {
        $context = null;
        if ($this->proxy !== null) {
            $context = stream_context_create(['http' => ['proxy' => $this->proxy]]);
        }

        return $context;
    }

    /**
     * @param string $email
     * @param boolean $catchAll
     * @return object
     */
    public function get($email, $catchAll)
    {
        $url = $this->createUrl($email, $catchAll);
        $response = $this->getResponse($url);
        return json_decode($response);
    }
}