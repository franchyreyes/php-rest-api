<?php

namespace FJR\traits;

trait ModelTableNameTrait
{
    /**
     * Get the name of the models
     * @return mixed
     */
    public static function name()
    {
        return with(new static)->getTable();
    }
}
