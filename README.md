[![Test Suite](https://github.com/idmarinas/common-bundle/actions/workflows/php.yml/badge.svg)](https://github.com/idmarinas/common-bundle/actions/workflows/php.yml)
[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=idmarinas_common-bundle&metric=alert_status)](https://sonarcloud.io/summary/new_code?id=idmarinas_common-bundle)

![GitHub release](https://img.shields.io/github/release/idmarinas/common-bundle.svg)
![GitHub Release Date](https://img.shields.io/github/release-date/idmarinas/common-bundle.svg)
![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/idmarinas/common-bundle)
[![Build in PHP](https://img.shields.io/badge/PHP-^8.0-8892BF.svg?logo=php)](http://php.net/)

![GitHub issues](https://img.shields.io/github/issues/idmarinas/common-bundle.svg)
![GitHub pull requests](https://img.shields.io/github/issues-pr/idmarinas/common-bundle.svg)
![Github commits (since latest release)](https://img.shields.io/github/commits-since/idmarinas/common-bundle/latest.svg)
![GitHub commit activity](https://img.shields.io/github/commit-activity/w/idmarinas/common-bundle.svg)
![GitHub last commit](https://img.shields.io/github/last-commit/idmarinas/common-bundle.svg)

![GitHub top language](https://img.shields.io/github/languages/top/idmarinas/common-bundle.svg)
![GitHub language count](https://img.shields.io/github/languages/count/idmarinas/common-bundle.svg)

[![Reliability Rating](https://sonarcloud.io/api/project_badges/measure?project=idmarinas_common-bundle&metric=reliability_rating)](https://sonarcloud.io/dashboard?id=idmarinas_common-bundle)
[![Bugs](https://sonarcloud.io/api/project_badges/measure?project=idmarinas_common-bundle&metric=bugs)](https://sonarcloud.io/dashboard?id=idmarinas_common-bundle)
[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=idmarinas_common-bundle&metric=security_rating)](https://sonarcloud.io/dashboard?id=idmarinas_common-bundle)
[![Vulnerabilities](https://sonarcloud.io/api/project_badges/measure?project=idmarinas_common-bundle&metric=vulnerabilities)](https://sonarcloud.io/dashboard?id=idmarinas_common-bundle)
[![Maintainability Rating](https://sonarcloud.io/api/project_badges/measure?project=idmarinas_common-bundle&metric=sqale_rating)](https://sonarcloud.io/dashboard?id=idmarinas_common-bundle)
[![Technical Debt](https://sonarcloud.io/api/project_badges/measure?project=idmarinas_common-bundle&metric=sqale_index)](https://sonarcloud.io/dashboard?id=idmarinas_common-bundle)
[![Code Smells](https://sonarcloud.io/api/project_badges/measure?project=idmarinas_common-bundle&metric=code_smells)](https://sonarcloud.io/dashboard?id=idmarinas_common-bundle)
[![Coverage](https://sonarcloud.io/api/project_badges/measure?project=idmarinas_common-bundle&metric=coverage)](https://sonarcloud.io/dashboard?id=idmarinas_common-bundle)
[![Duplicated Lines (%)](https://sonarcloud.io/api/project_badges/measure?project=idmarinas_common-bundle&metric=duplicated_lines_density)](https://sonarcloud.io/dashboard?id=idmarinas_common-bundle)

[![PayPal.Me - The safer, easier way to pay online!](https://img.shields.io/badge/donate-help_my_project-ffaa29.svg?logo=paypal&cacheSeconds=86400)](https://www.paypal.me/idmarinas)
[![Liberapay - Donate](https://img.shields.io/liberapay/receives/IDMarinas.svg?logo=liberapay&cacheSeconds=86400)](https://liberapay.com/IDMarinas/donate)
[![Twitter](https://img.shields.io/twitter/url/http/shields.io.svg?style=social&cacheSeconds=86400)](https://twitter.com/idmarinas)

# IDMarinas Common Bundle

> This bundle is intended to group common and often repeated things when creating an APP with Symfony.

## Content

### Command

> Reset cache of OPcache

```bash
  symfony console idm:opcache:reset
```

> Regenerate APP_SECRET

```bash
  # Change var APP_SECRET in .env file
  symfony console idm:regenerate:app_secret
    
  # Only show value WITHOUT update .env file
  symfony console idm:regenerate:app_secret --show
```

### Entity

> `AbstractContact`: to create a table with contact messages from the web.

### Form

> `AbstractContactFormType`: to create form for send contact messages.

### Repository

> `AbstractContactRepository`: repository for AbstractContact entity.

### Traits

#### Entity

> `IdTrait`: add a field id in INT format

> `UuidTrait`: add a field uuid in UUID format

#### Tool

> `FakerTrait`: add a Faker method to use in test, fixtures...

> `VersionTrait`: add two methods:
> 1. **convertVersionToString** converts a version like '100000000' to STRING version like '1.0.0'
> 2. **convertVersionToInt** converts a version like '1.0.0' to INT version like '100000000'

### Validator

#### Constraint

> `IsEven` check if value is an even value.

> `IsOdd` check if value is an odd value.
