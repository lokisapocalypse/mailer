# Mailer
This is a simple wrapper for PHPMailer. It uses arrays to initialize PHPMailer and returns the PHPMailer object so that you can simply use PHPMailer to send emails. At present, on
ly Gmail is supported but others will be added as I see a need for them.

Or other people fork and commit.

## Gmail

The below code will configure PHPMailer to send emails from a gmail account. Only username and password are required. You can pass in a from array if you are using a donotreply email address for example.

```
$config = [
    'username' => 'testuser',
    'password' => 'testpass',
    'from' => [
        'email' => 'from.email@gmail.com',
        'name' => 'David Tennant',
    ],
];

$mailer = MailFactory::buildGmailMailer($config);
```
