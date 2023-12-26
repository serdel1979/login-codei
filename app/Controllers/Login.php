<?php

namespace App\Controllers;

use App\Models\Usuario;

class Login extends BaseController{

    protected $usuario;

    public function index(){

        // $encrypter = \Config\Services::encrypter();
        // $clave = bin2hex($encrypter->encrypt(123));

        // echo $clave;
        return view("Login/index");
    }

    public function validar(){
        $emailUsuario = $this->request->getPost("emailUsuario");
        if(filter_var($emailUsuario, FILTER_VALIDATE_EMAIL)){
            $email = filter_var($emailUsuario, FILTER_SANITIZE_EMAIL);
        
            $this->usuario = new Usuario();
            $resultUser = $this->usuario->buscarUsuarioEmail($email);

        }else{
            $usuario = preg_replace("/[^a-zA-Z0-9.-]/", "", $emailUsuario);
            $this->usuario = new Usuario();
            $resultUser = $this->usuario->buscarUsuarioUser($usuario);

        }

        print_r($resultUser);
    }


}