<?php

/**
 * Copyright 2022-2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 22/01/2025, 19:09
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    IsEven.php
 * @date    05/11/2022
 * @time    17:18
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   1.1.0
 */

namespace Idm\Bundle\Common\Validator\Constraint;

use Attribute;
use Symfony\Component\Validator\Constraint;

/**
 * Check if the value is even.
 *
 * @Annotation
 */
#[Attribute]
class IsEven extends Constraint
{
	public string $message = 'idm_common_bundle.is_even';
}
