<?php
/**
 * Copyright 2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 01/01/2025, 20:46
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    CommonConstEnum.php
 * @date    01/01/2025
 * @time    20:46
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.3.0
 */

namespace Idm\Bundle\Common;

enum CommonConstEnum: string
{
	case NOW               = 'now()';
	case CURRENT_TIMESTAMP = 'current_timestamp()';
}
