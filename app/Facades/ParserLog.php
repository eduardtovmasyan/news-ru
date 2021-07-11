<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * 
 */
class ParserLog extends Facade
{
    protected static function getFacadeAccessor() {
        return 'parserLog';
    }
}