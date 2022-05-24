<?php

namespace App\Models;

use App\core\Model;

use App\core\Application;

class Users extends Model
{


    public function setTableName()
    {
        return 'Users';
    }

    public static function do()
    {
        return new static;
    }
    
    //!refactor
    public function setRegister(array $body)
    {


        $SQL = [

            "firstName" => "null",
            "lastName" => "null",
            "email" => "null",
            "password" => "null",
            "statuse" => "0"
        ];
        $SQL["firstName"]  = $body['firstName'];
        $SQL["lastName"] = $body['lastName'];
        $SQL["email"] = $body['email'];
        $SQL["password"] = md5($body['password']);

        $this->insert($SQL);
    }
    
    //!refactor
    public function getData($where)
    {
        $table = $this->setTableName();
        $column = ['id','firstName','lastName','email'];
        $findBy = [ "id" => $where ];
        return  Application::$app->Connection->getMedoo()->select($table, $column, $findBy);
    }
}
