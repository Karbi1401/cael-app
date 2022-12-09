<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Load Config
require_once 'config/config.php';
// Load Helpers
require_once 'helpers/session_helper.php';
require_once 'helpers/url_helper.php';
require_once 'helpers/auth.php';
require_once 'helpers/email.php';

new Auth();
new Email;

// Autoload Core Classes
spl_autoload_register(function ($className) {
  require_once 'libraries/' . $className . '.php';
});
