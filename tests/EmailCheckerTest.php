<?php

namespace YllyMailboxLayerTest;

use YllyMailboxLayer\Client\Check\CheckClient;
use YllyMailboxLayer\EmailChecker;
use YllyMailboxLayer\Exception\CheckerException;

class EmailCheckerTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @throws \YllyMailboxLayer\Exception\CheckerException
     */
    public function testClientEmailChecker()
    {
        /** @var CheckClient|\PHPUnit_Framework_MockObject_MockObject $stub */
        $stub = $this
            ->getMockBuilder('YllyMailboxLayer\Client\Check\CheckClient')
            ->setConstructorArgs(['xxx', 'xxx'])
            ->getMock();

        $stub->method('get')->willReturn(
            (object)
            [
                'email' => 'jean@ylly.fr',
                'did_you_mean' => '',
                'domain' => 'ylly.fr',
                'user' => 'jean',
                'smtp_check' => true,
                'mx_found' => true,
                'format_valid' => true,
                'catch_all' => false,
                'disposable' => false,
                'role' => false,
                'score' => 0.96,
                'free' => false,
            ]
        );

        $mailChecker = new EmailChecker($stub);

        $response = $mailChecker->checkEmail('jean@ylly.fr');

        $this->assertEquals('jean@ylly.fr', $response->getEmail());
        $this->assertEquals('', $response->getDidYouMean());
        $this->assertEquals('jean', $response->getUser());
        $this->assertEquals('ylly.fr', $response->getDomain());
        $this->assertEquals(true, $response->getMxFound());
        $this->assertEquals(true, $response->getFormatValid());
        $this->assertEquals(true, $response->getSmtpCheck());
        $this->assertEquals(false, $response->getCatchAll());
        $this->assertEquals(false, $response->getRole());
        $this->assertEquals(false, $response->getDisposable());
        $this->assertEquals(false, $response->getFree());
        $this->assertEquals(0.96, $response->getScore());
    }

    /**
     * @throws \YllyMailboxLayer\Exception\CheckerException
     */
    public function testExceptionEmailChecker()
    {
        /** @var CheckClient|\PHPUnit_Framework_MockObject_MockObject $stub */
        $stub = $this
            ->getMockBuilder('YllyMailboxLayer\Client\Check\CheckClient')
            ->setConstructorArgs(['xxx', 'xxx'])
            ->getMock();

        $stub->method('get')->willReturn(
            (object)[
                'error' => 'myError'
            ]
        );

        $mailChecker = new EmailChecker($stub);

        $hasError = false;
        
        try {
            $mailChecker->checkEmail('jean@ylly.fr');
        } catch (CheckerException $e) {
            $hasError = true;
        }

        $this->assertTrue($hasError);
    }

    /**
     * @throws \YllyMailboxLayer\Exception\CheckerException
     */
    public function testErrorEmailChecker()
    {
        /** @var CheckClient|\PHPUnit_Framework_MockObject_MockObject $stub */
        $stub = $this
            ->getMockBuilder('YllyMailboxLayer\Client\Check\CheckClient')
            ->setConstructorArgs(['xxx', 'xxx'])
            ->getMock();

        $stub->method('get')->willReturn('400');

        $mailChecker = new EmailChecker($stub);

        $errorMessage = null;
        
        try {
            $mailChecker->checkEmail('jean@ylly.fr');
        } catch (CheckerException $e) {
            $errorMessage = $e->getMessage();
        }

        $this->assertEquals($errorMessage, 'Error HTTP 400');
    }
}
