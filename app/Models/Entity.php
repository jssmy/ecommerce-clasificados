<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    //
    public static function getClass()
    {
        return get_class(new static);
    }

    public static function getEntity()
    {
        return (new static());
    }

    public static function entity()
    {
        return class_basename((new static())->getClass());
    }

    public static function cols()
    {
        return with(new static)->getOriginal();
    }
    public static function table()
    {
        return with(new static)->getTable();
    }
}
