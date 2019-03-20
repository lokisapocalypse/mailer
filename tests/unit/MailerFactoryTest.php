<?php

namespace Fusani\Mailer;

use PHPMailer\PHPMailer;
use PHPUnit_Framework_TestCase;

class MailFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider gmailServiceProvider
     * @param array $config
     * @return array
     */
    public function testBuildGmailService(array $config)
    {
        $mailer = MailerFactory::buildGmailMailer($config);

        $this->assertNotNull($mailer);
        $this->assertInstanceOf(PHPMailer\PHPMailer::class, $mailer);
    }

    /**
     * @return array
     */
    public function gmailServiceProvider() : array
    {
        return [
            'Empty array' => [[]],
            'Missing username' => [['password' => 'password']],
            'Missing password' => [['username' => 'username']],
            'Both required parameters' => [['username' => 'username', 'password' => 'password']],
            'Includes from array' => [['username' => 'username', 'password' => 'password', 'from' => ['email' => 'from@gmail.com', 'name' => 'David Tennant']]],
        ];
    }
}
