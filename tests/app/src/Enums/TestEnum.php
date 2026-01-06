<?php
/**
 * Copyright 2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 16/03/2025, 18:02
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    TestEnum.php
 * @date    16/03/2025
 * @time    18:02
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.5.0
 */

namespace App\Enums;

use Idm\Bundle\Common\Traits\Enums\EnumToArrayTrait;

enum TestEnum: string
{
	use EnumToArrayTrait;

	case UNO    = 'uno';
	case DOS    = 'dos';
	case TRES   = 'tres';
	case CUATRO = 'cuatro';
}
