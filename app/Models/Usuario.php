<?php


namespace App\Models;

use CodeIgniter\Model;

class Usuario extends Model{

    protected $table = 'usuarios';

    protected $primaryKey = 'id';


    public function buscarUsuarioEmail($email){
        $db = db_connect();

        $builder = $db->table($this->table)->where('email',$email)->where('estado','A');
        $result = $builder->get();
        return $result->getResult()? $result->getResult()[0]: false;
    }

    public function buscarUsuarioUser($user){
        $db = db_connect();

        $builder = $db->table($this->table)->where('usuario',$user)->where('estado','A');
        $result = $builder->get();
        return $result->getResult()? $result->getResult()[0]: false;
    }


}