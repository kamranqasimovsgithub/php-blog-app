<?php

namespace App\Exceptions;

use Exception;
use Throwable;


class NotFoundException extends Exception
{

    public function __construct($message = "", $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }


    public function error404()
    {
        http_response_code(404);

        return require VIEWS_FOLDER . 'errors/404.view.php';
    }
}