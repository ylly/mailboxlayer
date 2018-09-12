# mailboxLayer PHP library

This library allows you to easily implement mailboxLayer by apiLayer into your project.

[![Build Status](https://travis-ci.org/ylly/mailboxlayer.svg?branch=master)](https://travis-ci.org/ylly/mailboxlayer)

## Require :

* PHP 5.4+
* PHP JSON

## Limitations :

* catch_all attribute is of no use with free mailboxLayer account.

see https://mailboxlayer.com/documentation#catch_all

## Installation :

```
composer require ylly/mailboxLayer
```

## Usage :

You need to generate a key on mailboxLayer and add it to the configuration.yml

see https://mailboxlayer.com/product

### Configuration file :

```yaml
accessKey: generated access key from mailboxLayer 
```

### Check an email

The EmailChecker manage verifications on email addresses

You can set emailChecker with variables 
```php
$emailChecker = EmailCheckerFactory::create($accessKey, $proxy);
```

You can check set emailChecker from a YAML config file by 
```php
$emailChecker = EmailCheckerFactory::createFromYamlFile('/path/to/config.yml');
```

Or from an key-value array of configuration
```php
$emailChecker = EmailCheckerFactory::createFromArray($configArray);
```

### Fill user's email (and catch_all)

The users email addresses creates url for verifications
```php
$check = $emailChecker->checkEmail($email);
```

or with catch_all boolean attributes 
```php
$check = $emailChecker->checkEmail($email, $catchAll);
```

## Advanced usage :

A Log interface is provided to manage outputed logs, you can register your listener on the emailChecker

```php
class Listener implement LogListenerInterface
{
    public function recieve($level, $message)
    {
        // do something
    }
}

$emailChecker->addListener(new Listener());
```