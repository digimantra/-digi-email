# Laravel FCM Notifications Package

![Packagist Version](https://img.shields.io/packagist/v/digimantra/digi-email)
![Packagist Downloads](https://img.shields.io/packagist/dt/digimantra/digi-email)
![GitHub License](https://img.shields.io/github/license/digimantra/digi-email?style=flat-square)

## Table of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)
- [Queueing Emails](#Queueing-Emails)
- [Composer Requirements](#Composer-Requirements)
- [License](#license)
- [Contribution](#contribution)
- [Support](#support)

## Requirements

- Laravel 8, 9, or 10
- PHP 8.0 or higher
- Google API Client (installed automatically via composer)
- Firebase account with Cloud Messaging API enabled

## Installation

**Install via Composer**

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

## Contribution
Feel free to contribute by opening issues or submitting pull requests for new features or bug fixes.

## Support

For any issues or support inquiries, please open an issue on the GitHub repository:  
[https://github.com/digimantra/digi-email](https://github.com/digimantra/digi-email)
```