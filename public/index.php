<?php

// error_reporting(E_ALL);
// ini_set('display_errors', '1');

echo "<!DOCTYPE html>";

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


use App\Exceptions\NotFoundException;
use App\Http\Router\Router;

require_once '../vendor/autoload.php';

define('VIEWS_FOLDER', dirname(__DIR__) . '/views/');

$root_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === "on") ? "https" : "http");
$root_url .= "://".$_SERVER['HTTP_HOST'];
$root_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"", $_SERVER['SCRIPT_NAME']);

define("ROOT_URL", $root_url);

const DB_NAME = 'blog-app';
const DB_HOST = '127.0.0.1';
const DB_USER = 'root';
const DB_PWD = 'root';

$url = $_GET['url'] ?? '/';

$router = new Router(isset($_GET['url']) ? $_GET['url'] : $url );

$router->get('/', 'App\Http\Controllers\BlogController@welcome');
$router->get('/posts', 'App\Http\Controllers\BlogController@index');
$router->get('/posts/:id', 'App\Http\Controllers\BlogController@show');

$router->get('/login', 'App\Http\Controllers\UserController@login');
$router->get('/register', 'App\Http\Controllers\UserController@register');
$router->post('/login', 'App\Http\Controllers\UserController@signin');
$router->post('/register', 'App\Http\Controllers\UserController@signup');
$router->get('/logout', 'App\Http\Controllers\UserController@logout');

$router->get('/admin/posts', 'App\Http\Controllers\Admin\PostController@index');
$router->get('/admin/posts/create', 'App\Http\Controllers\Admin\PostController@create');
$router->post('/admin/posts/store', 'App\Http\Controllers\Admin\PostController@store');
$router->get('/admin/posts/edit/:id', 'App\Http\Controllers\Admin\PostController@edit');
$router->post('/admin/posts/update', 'App\Http\Controllers\Admin\PostController@update');
$router->post('/admin/posts/delete', 'App\Http\Controllers\Admin\PostController@delete');

$router->get('/cookie-policy', 'PageController@cookiePolicy');


try {
    $router->run();
} catch (NotFoundException $e) {
    $e->error404();
}