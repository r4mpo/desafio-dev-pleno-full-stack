<?php
namespace App\Queries\Users;

use App\Queries\PadraoQuery;

class RegistrarQuery extends PadraoQuery
{
    public static function getQuery(): string
    {
        return "INSERT INTO users (name, email, password, email_verified_at, remember_token, created_at, updated_at) 
            VALUES (:name, :email, :password, :email_verified_at, :remember_token, :created_at, :updated_at);"; 
    }
}