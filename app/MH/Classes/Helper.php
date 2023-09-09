<?php

namespace App\MH\Classes;

class Helper {
    public static function getURLMHClientesServiciosAPI(): string {
        return env('URL_MH_API_CLIENTES_SERVICIOS', 'http://localhost');
    }
}
