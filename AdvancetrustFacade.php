<?php

namespace Bantenprov\Advancetrust;


use Illuminate\Support\Facades\Facade;

class AdvancetrustFacade extends Facade
{
    
    protected static function getFacadeAccessor()
    {
        return 'advancetrust';
    }
}
