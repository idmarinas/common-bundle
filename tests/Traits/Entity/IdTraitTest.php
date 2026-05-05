<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 05/05/2026, 15:20
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    IdTraitTest.php
 * @date    05/05/2026
 * @time    15:26
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.7.0
 */

declare(strict_types=1);

/**
 * Copyright 2024 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 28/11/24, 19:52
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    IdTraitTest.php
 * @date    28/11/2024
 * @time    19:52
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.0.0
 */

namespace Idm\Bundle\Common\Tests\Traits\Entity;

use Idm\Bundle\Common\Traits\Entity\IdTrait;
use phpmock\phpunit\PHPMock;
use PHPUnit\Framework\TestCase;

final class IdTraitTest extends TestCase
{
	use PHPMock;

	public function testIdTrait(): void
	{
		$entity = new IdTraitCheck();
		$entity->setId(1);

		$this->assertSame(1, $entity->getId());
	}
}

class IdTraitCheck
{
	use IdTrait;
}
