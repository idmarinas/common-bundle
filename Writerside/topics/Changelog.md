# Changelog

## 3.5.2 - 2026-01-06

### Changed {id="changed_1"}

* _Changed_ a PHP min version to `8.3`

### Added {id="added_1"}

* _Added_ Symfony `8.0` compatibility

## 3.5.1 - 2025-11-04

### Fixed {id="fixed_1"}

* Moved `symfony/uid` to `require` packages.

## 3.5.0 - 2025-03-16

### Added {id="added_3.5.0"}

#### Traits {id="traits_3.5.0"}

* _Added_ **EnumToArrayTrait** [Read Docs](EnumToArrayTrait.md)

## 3.4.1 - 2025-02-24

### Fixed

* Fixed the error in Contact Form, now email is optional

## 3.4.0 - 2025-02-10

### Release highlights

* **Contact Form**: Contact Form for get feedback of users.

### Added

* **Contact Form**: [Read Docs](Contact.topic)
	* A simple contact system that you can use on your website. Comes with form, controller and administration panel.

### Changed

#### Commands

* **Generate Crypto Value**: [Read Docs](Generate-Crypto-Value.md)
	* _Added_: `--var` option
	* _Added_: `--length` option

#### Traits

* **Version trait**: [Read Docs](VersionTrait.md)
	* _Added_: `versionDetails()` method
