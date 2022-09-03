<?php
require_once '../vendor/autoload.php';
require_once '../packages/pandacode/framework/src/function.php';
require_once 'GenerateDb.php';


session_start();

define('URL', trim($_SERVER['REQUEST_URI'], ''));
define('ROOT', dirname(__DIR__));
define('DOMAIN', 'http://localhost:8184/');

use Petrenko\Framework\Route;
use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();
$dotenv->load(ROOT . '/.env');

require_once ROOT . '/routes/web.php';

Route::dispatch(URL);


