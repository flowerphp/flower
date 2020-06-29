<?php


namespace App\Core\Databases;


use App\Core\Core;
use PDO;

interface iDriverDB
{
    public function __construct(Core $core);

    public function getDbName() : string ;
    public function getHostName() : string ;
    public function getPassword() : string ;
    public function getUserName() : string ;

    public function getConnection() : PDO ;
}