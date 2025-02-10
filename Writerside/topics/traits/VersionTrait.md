# VersionTrait

<secondary-label ref="1.3" />
<secondary-label ref="3.4" />

Converts a version string to a number and vice versa.

## Glossary

<secondary-label ref="1.3" />

`convertVersionToString()`
: Convert `int` version like `100000000` to `1.0.0`
: **Param** `$version` `int` version like "`100000000`"
: **Return** a `string` version

`convertVersionToInt()`
: Convert `string` version like `1.0.0` to `100000000`
: **Param** `$version` `string` version like "`1.0.0`"
: **Return** a `int` version

### New method

<secondary-label ref="3.4" />

`versionDetails()`
: Get detail of version like `1.0.0`
: **Param** `$version` `string` version like "`1.0.0`"
: **Return** `array` with keys: `major`, `minor`, `patch`, `prerelease` and `buildmetadata`

{style="medium"}
