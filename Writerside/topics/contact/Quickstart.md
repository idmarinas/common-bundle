<card-summary rel="summary" />

# Quickstart

<secondary-label ref="3.4" />

This is a quick way to start using the contact system for your project.
{id="summary"}

## Before you start

> You need to have `Symfony maker` and `IDMarinas maker` installed to be able to use the following commands.
> {style="warning"}

```console
composer require --dev symfony/maker-bundle
composer require --dev idmarinas/maker-bundle
```

## Install

```console
php bin/symfony make:idm:common:contact
```

<procedure title="These files are installed in the default folders" id="maker">
	<step>The Doctrine entity</step>
	<step>The form type</step>
	<step>The controller to be able to send the contact messages</step>
	<step>The administration controllers for EasyCorp EasyAdmin</step>
	<p>Congratulation! you have installed Contact system.</p>
</procedure>

<seealso>
	<category ref="related">
		<a href="Contact-Entity.md" />
		<a href="Contact-Repository.md" />
		<a href="Contact-Form-Type.md" />
		<a href="Contact-Controller.md" />
		<a href="Contact-Crud-Controller.md" />
	</category>
</seealso>
