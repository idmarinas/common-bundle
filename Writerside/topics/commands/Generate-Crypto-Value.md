# Generate Crypto Value

<secondary-label ref="1.4" />

This command generates a cryptographically secure random value of 16 bytes, this updates the variable `APP_SECRET`
variable in the `.env` file.

## Command

Syntax:

```console
php bin/console idm:generate:crypto:value
```

## Options

<secondary-label ref="1.4" />

You can modify this command with the following options:

`--show`
: Only display the value without updating `.env` file. (`Default: false`)

### New options

<secondary-label ref="3.4" />

`--var`
: Name of `var` to replace value (`Default: APP_SECRET`)

`-l`, `--length`
: The length of the cryptography key to be generated (`Default: 16`)

{type="narrow"}
