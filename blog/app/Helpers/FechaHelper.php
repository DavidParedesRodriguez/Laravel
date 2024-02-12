<?php

namespace App\Helpers;

class FechaHelper
{
    public static function fechaActual($formato = 'd/m/Y')
    {
        return date($formato);
    }
}
