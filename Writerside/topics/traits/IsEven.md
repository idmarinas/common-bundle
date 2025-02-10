# IsEven Constraint

<secondary-label ref="1.1" />

Check if value is Even

## Usage

```php
namespace App\Entity;

use Idm\Bundle\Common\Validator\Constraint\IsEven;

class EntityClass
{
	#[IsEven]
	private int $even;

	
	// ... Other properties
	
	// ... methods
}
```
