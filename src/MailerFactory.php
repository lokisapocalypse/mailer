<?php

namespace Fusani\Mailer;

use PHPMailer\PHPMailer;

class MailerFactory
{
    /**
     * @param array $config
     * @return MailService
     */
    public static function buildGmailMailer(array $config) : PHPMailer\PHPMailer
    {
        $mailer = new PHPMailer\PHPMailer();
        $mailer->isSMTP();
        $mailer->Host = 'smtp.gmail.com';
        $mailer->Port = 587;
        $mailer->SMTPSecure = 'tls';
        $mailer->SMTPAuth = true;

        if (!empty($config['username']) && !empty($config['password'])) {
            $mailer->Username = $config['username'];
            $mailer->Password = $config['password'];
        }

        if (!empty($config['from'])) {
            $mailer->setFrom($config['from']['email'], $config['from']['name']);
            $mailer->addReplyTo($config['from']['email'], $config['from']['name']);
        }

        return $mailer;
    }
}
