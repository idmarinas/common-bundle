<!--suppress HtmlDeprecatedAttribute -->
<div align="center">

# IDMarinas Common Bundle

</div>

> This bundle is intended to group common and often repeated things when creating an APP with Symfony.

<br />

<div align="center">

[![Test Suite](https://img.shields.io/github/actions/workflow/status/idmarinas/common-bundle/php.yml?style=for-the-badge&logo=github&logoColor=white&label=Bundle%20Test%20Suite)](https://github.com/idmarinas/common-bundle/actions/workflows/php.yml)
[![Quality Gate Status](https://img.shields.io/sonar/quality_gate/idmarinas_common-bundle?server=https%3A%2F%2Fsonarcloud.io&style=for-the-badge&logo=sonarcloud&logoColor=white)](https://sonarcloud.io/summary/new_code?id=idmarinas_common-bundle)
[![Coverage](https://img.shields.io/sonar/coverage/idmarinas_common-bundle?server=https%3A%2F%2Fsonarcloud.io&style=for-the-badge&logo=sonarcloud&logoColor=white)](https://sonarcloud.io/dashboard?id=idmarinas_common-bundle)
[![Technical Debt](https://img.shields.io/sonar/tech_debt/idmarinas_common-bundle?server=https%3A%2F%2Fsonarcloud.io&style=for-the-badge&logo=sonarcloud&logoColor=white)](https://sonarcloud.io/dashboard?id=idmarinas_common-bundle)

<br />

![GitHub release](https://img.shields.io/github/release/idmarinas/common-bundle.svg?style=for-the-badge)
![GitHub Release Date](https://img.shields.io/github/release-date/idmarinas/common-bundle.svg?style=for-the-badge)
![Github commits (since latest release)](https://img.shields.io/github/commits-since/idmarinas/common-bundle/latest.svg?style=for-the-badge)
![GitHub commit activity](https://img.shields.io/github/commit-activity/w/idmarinas/common-bundle.svg?style=for-the-badge)
![GitHub last commit](https://img.shields.io/github/last-commit/idmarinas/common-bundle.svg?style=for-the-badge)

#### Code analysis

[![Reliability Rating](https://sonarcloud.io/api/project_badges/measure?project=idmarinas_common-bundle&metric=reliability_rating)](https://sonarcloud.io/dashboard?id=idmarinas_common-bundle)
[![Bugs](https://sonarcloud.io/api/project_badges/measure?project=idmarinas_common-bundle&metric=bugs)](https://sonarcloud.io/dashboard?id=idmarinas_common-bundle)
[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=idmarinas_common-bundle&metric=security_rating)](https://sonarcloud.io/dashboard?id=idmarinas_common-bundle)
[![Vulnerabilities](https://sonarcloud.io/api/project_badges/measure?project=idmarinas_common-bundle&metric=vulnerabilities)](https://sonarcloud.io/dashboard?id=idmarinas_common-bundle)
[![Maintainability Rating](https://sonarcloud.io/api/project_badges/measure?project=idmarinas_common-bundle&metric=sqale_rating)](https://sonarcloud.io/dashboard?id=idmarinas_common-bundle)
[![Code Smells](https://sonarcloud.io/api/project_badges/measure?project=idmarinas_common-bundle&metric=code_smells)](https://sonarcloud.io/dashboard?id=idmarinas_common-bundle)
[![Duplicated Lines (%)](https://sonarcloud.io/api/project_badges/measure?project=idmarinas_common-bundle&metric=duplicated_lines_density)](https://sonarcloud.io/dashboard?id=idmarinas_common-bundle)

</div>

> ## 🖖 Support
>
> 🩵 If you like this project, give it a 🌟 and share it with your friends!
>
> [![PayPal.Me - The safer, easier way to pay online!](https://img.shields.io/badge/donate-help_my_projects-ffaa29.svg?style=for-the-badge&logo=paypal&cacheSeconds=86400)](https://www.paypal.me/idmarinas)
> [![Liberapay - Donate](https://img.shields.io/liberapay/receives/IDMarinas.svg?style=for-the-badge&logo=liberapay&cacheSeconds=86400)](https://liberapay.com/IDMarinas/donate)
> [![Static Badge](https://img.shields.io/badge/Sponsor-ea4aaa?style=for-the-badge&logo=github&logoColor=white)](https://github.com/sponsors/idmarinas)

<br />

# 💾 Installation

Make sure Composer is installed globally, as explained in the
[installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

## 💪 Applications that use Symfony Flex

Open a command console, enter your project directory and execute:

```console
$ composer require idmarinas/common-bundle
```

## 🚫 Applications that don't use Symfony Flex

### Step 1️⃣: Download the Bundle

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
$ composer require idmarinas/common-bundle
```

### Step 2️⃣: Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles
in the `config/bundles.php` file of your project:

```php
// config/bundles.php

return [
    // ...
    Idm\Bundle\Common\IdmCommonBundle::class => ['all' => true],
];
```

## 🖱️ Tech used in code

![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/idmarinas/common-bundle.svg?style=for-the-badge)
[![PHP](https://img.shields.io/badge/php-%23777BB4.svg?style=for-the-badge&logo=php&logoColor=white)](https://www.php.net)
[![Doctrine](https://img.shields.io/badge/doctrine-fa6a3c?style=for-the-badge&logo=doctrine&logoColor=white)](https://www.doctrine-project.org)
[![Symfony](https://img.shields.io/badge/symfony-black.svg?style=for-the-badge&logo=symfony&logoColor=white)](https://www.symfony.com)

## 🛠️ Tools used for create this project

![Dependabot](https://img.shields.io/badge/dependabot-025E8C?style=for-the-badge&logo=dependabot&logoColor=white)
[![GitHub Actions](https://img.shields.io/badge/github%20actions-%232671E5.svg?style=for-the-badge&logo=githubactions&logoColor=white)](https://github.com/features/actions)
[![Docker](https://img.shields.io/badge/docker-%230db7ed.svg?style=for-the-badge&logo=docker&logoColor=white)](https://www.docker.com)
[![Composer](https://img.shields.io/badge/composer-%238c5530?style=for-the-badge&logo=composer&logoColor=white)](https://getcomposer.org)
