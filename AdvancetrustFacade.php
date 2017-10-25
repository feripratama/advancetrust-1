<?php

namespace feripratama\advancetrust;


use Illuminate\Support\Facades\Facade;

class AdvancetrustFacade extends Facade
{
    
    protected static function getFacadeAccessor()
    {
        return 'advancetrust';
    }
}
