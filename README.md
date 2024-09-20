Here’s the updated README file content with the additional point about configuring the queue:

```
# Custom Email Sender

## Overview

The **custom-email-sender** package simplifies the process of sending emails via SMTP in your Laravel applications. It allows you to easily send emails by calling a function with a predefined data structure, supporting HTML content and attachments.

## Key Features

- **Effortless Email Sending:** Quickly send emails by providing essential data such as recipient details, content, and optional attachment flags.
- **Seamless SMTP Integration:** Utilize your existing SMTP credentials for easy email dispatch.
- **HTML Email Support:** Send rich, HTML-based emails or use view files for content.
- **Structured Data for Sending Emails:** Use a straightforward data structure to send emails efficiently.

## Installation

To install the package, run the following command in your Laravel project:

```bash
composer require digimantra/digi-email
```

## Configuration

### Update SMTP Settings

Modify your `.env` file to include your SMTP credentials:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.yourservice.com
MAIL_PORT=587
MAIL_USERNAME=your_email@domain.com
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=your_email@domain.com
```

**Important:** Clear the configuration cache with:

```bash
php artisan config:clear
```

### Configure the Queue

Make sure you have set up your queue configuration in `config/queue.php` and have a queue driver configured (like database, Redis, etc.). If you're using the database driver, run the migration to create the jobs table:

```bash
php artisan queue:table
php artisan migrate
```

## Usage

Invoke the package’s email-sending function and provide the `$data` array as follows:

```php
$data = [
    'to' => 'user@email.com',
    'html' => true,
    'content' => '<h1>Hi, test email</h1>',
    'view' => '<path/to/view>',
    'attachment' => false,
];
```

The package will handle the rest.

## Queueing Emails

To process queued jobs, execute the following command in your terminal:

```bash
php artisan queue:work
```

## Composer Requirements

The package relies on `phpmailer/phpmailer` for SMTP handling and is compatible with Laravel versions 8.x, 9.x, and 10.x.

## License

This package is released under the MIT License. Refer to the LICENSE file for details.

## Support

For any issues or support inquiries, please open an issue on the GitHub repository:  
[https://github.com/digimantra/digi-email](https://github.com/digimantra/digi-email)
```