<?php

namespace Ht3aa\TitleWithImageSelectLabel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ht3aa\TitleWithImageSelectLabel\TitleWithImageSelectLabel
 */
class TitleWithImageSelectLabel extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Ht3aa\TitleWithImageSelectLabel\TitleWithImageSelectLabel::class;
    }
}
