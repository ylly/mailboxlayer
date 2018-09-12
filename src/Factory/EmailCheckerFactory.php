<?php
namespace YllyMailboxLayer\Factory;

use YllyMailboxLayer\Client\Check\CheckClient;
use YllyMailboxLayer\Configurator;
use YllyMailboxLayer\EmailChecker;

class EmailCheckerFactory
{
    /**
     * @param string $accessKey
     * @param string|null $proxy
     * @return EmailChecker
     */
    public static function create($accessKey, $proxy)
    {
        $client = new CheckClient($accessKey, $proxy);
        return new EmailChecker($client);
    }

    /**
     * @param array $config
     * @return EmailChecker
     */
    public static function createFromArray(array $config)
    {
        return self::create(
            $config['accessKey'],
            isset($config['proxy']) ? $config['proxy'] : null
        );
    }

    /**
     * @param string $absolutePath
     * @return EmailChecker
     */
    public static function createFromYamlFile($absolutePath)
    {
        $config = Configurator::loadFromFile($absolutePath);
        return self::createFromArray($config);
    }
}