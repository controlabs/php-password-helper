# php-password-helper

[![Build Status](https://travis-ci.org/controlabs/php-password-helper.svg?branch=master)](https://travis-ci.org/controlabs/php-password-helper)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/controlabs/php-password-helper/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/controlabs/php-password-helper/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/controlabs/php-password-helper/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/controlabs/php-password-helper/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/controlabs/php-password-helper/badges/build.png?b=master)](https://scrutinizer-ci.com/g/controlabs/php-password-helper/build-status/master)
[![Code Intelligence Status](https://scrutinizer-ci.com/g/controlabs/php-password-helper/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![PHPStan](https://img.shields.io/badge/PHPStan-enabled-brightgreen.svg?style=flat)](https://github.com/phpstan/phpstan)

[![License](https://poser.pugx.org/controlabs/password-helper/license)](https://packagist.org/packages/controlabs/password-helper)
[![Latest Stable Version](https://poser.pugx.org/controlabs/password-helper/v/stable)](https://packagist.org/packages/controlabs/password-helper)
[![Latest Unstable Version](https://poser.pugx.org/controlabs/password-helper/v/unstable)](https://packagist.org/packages/controlabs/password-helper)
[![composer.lock](https://poser.pugx.org/controlabs/password-helper/composerlock)](https://packagist.org/packages/controlabs/password-helper)
[![Total Downloads](https://poser.pugx.org/controlabs/password-helper/downloads)](https://packagist.org/packages/controlabs/password-helper)

Helper to encrypt and verify passwords.

## Installation

```
composer require controlabs/password-helper
```

## License

This software is open source, licensed under the The MIT License (MIT). See [LICENSE](https://github.com/controlabs/php-password-helper/blob/master/LICENSE) for details.

##Usages

##### Encrypting password like a Ciro Gomes
```php
use Controlabs\Helper\Password as PasswordHelper;

$helper = new PasswordHelper();

$passwordData = $helper->encrypt($_POST['password']);

$user = new User();
$user->login = 'controlabs';
$user->password = $passwordData->password();
$user->password_salt = $passwordData->salt();
$user->save();
```

##### Verify password
```php
use Controlabs\Http\Exception\Unauthorized; // composer require controlabs/http-exceptions (optional)
use Controlabs\Helper\Password as PasswordHelper;

$helper = new PasswordHelper();

$user = User::findByLogin('login', $_POST['login']);

$accept = $user and $helper->verify($user->password, $_POST['password'], $user->password_salt);

if(!$accept) {
    throw new Unauthorized('Invalid login or password.');
}
```
