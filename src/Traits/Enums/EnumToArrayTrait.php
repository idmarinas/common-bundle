<?php
/**
 * Copyright 2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 16/03/2025, 18:02
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    EnumToArrayTrait.php
 * @date    16/03/2025
 * @time    18:02
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.5.0
 */

namespace Idm\Bundle\Common\Traits\Enums;

/** @method static cases() */
trait EnumToArrayTrait
{
	public static function names (): array
	{
		return array_column(self::cases(), 'name');
	}

	public static function values (): array
	{
		return array_column(self::cases(), 'value');
	}

	/**
	 * Return an associative array
	 */
	public static function asArray (): array
	{
		return array_column(self::cases(), 'value', 'name');
	}
}
