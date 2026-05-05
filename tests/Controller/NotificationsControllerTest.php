<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 05/05/2026, 18:49
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    NotificationsControllerTest.php
 * @date    05/05/2026
 * @time    18:54
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.7.0
 */

namespace Idm\Bundle\Common\Tests\Controller;

use App\Kernel;
use Idm\Bundle\Common\Tests\CreateKernelCaseTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class NotificationsControllerTest extends WebTestCase
{
	use CreateKernelCaseTrait;

	public function testIndex(): void
	{
		$client = static::createClient([
			'config' => static function (Kernel $kernel): void {
				$kernel->addExtraConfig([
					'idm_common' => [
						'notifications_bag' => true,
					],
				]);
			},
		]);
		$client->request('GET', '/notifications');

		self::assertResponseIsSuccessful();

		self::assertPageTitleContains('IDMarinas Common Bundle');
		self::assertSelectorTextContains('.notification-error', 'This is an error message');
		self::assertSelectorTextContains('.notification-success', 'This is a success message');
		self::assertSelectorTextContains('.notification-warning', 'This is a warning message');
	}
}
