<?php
/**
 * This file is required in the root of the public folder. Wordpress looks at the root of its folder,
 * or one folder above for a wp-config file. This file will include any composer packages for
 * leveraging autoload as well as setting up the configuration and environment for wordpress.
 */
require_once(__DIR__ . '/bootstrap.php');
require_once(__DIR__ . '/config.php');
require_once(ABSPATH . 'wp-settings.php');
