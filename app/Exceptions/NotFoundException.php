<?php

namespace App\Exceptions;

use Exception;

class NotFoundException extends Exception {
    protected $message = 'Страница не найдена';
}