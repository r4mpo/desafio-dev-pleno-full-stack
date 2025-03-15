<?php

namespace App\Queries;

abstract class PadraoQuery
{
    public abstract static function getQuery(): string;
}