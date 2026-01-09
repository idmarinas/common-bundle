<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 08/01/2026, 20:46
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    index.php
 * @date    08/01/2026
 * @time    20:46
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.5.0
 */

use App\Kernel;

require_once dirname(__DIR__, 3) . '/vendor/autoload_runtime.php';

return fn(array $context) => new Kernel($context['APP_ENV'], (bool)$context['APP_DEBUG']);
