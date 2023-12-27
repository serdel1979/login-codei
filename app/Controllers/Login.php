<?php

namespace App\Controllers;

use App\Models\Usuario;

class Login extends BaseController{

    protected $usuario;

    public function index(){

        // $encrypter = \Config\Services::encrypter();
        // $clave = bin2hex($encrypter->encrypt(123));

        // echo $clave;
        if (session()->get('usuario')) {
            // Si ya está autenticado, redirige al dashboard
            return redirect()->to(base_url('dashboard'));
        }
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

        if($resultUser){
                $encrypter = \Config\Services::encrypter();
                $clavedB = $encrypter->decrypt(hex2bin($resultUser->clave));

                $clave = $this->request->getPost("clave");
                if($clave == $clavedB){

                    $data = [
                        "usuario"=> $resultUser->nombre.' '.$resultUser->apellido,
                        "email"=> $resultUser->email,
                        "activo"=> $resultUser->estado,
                        "foto"=> $resultUser->foto,
                    ];
                    session()->set($data);

                    return redirect()->to(base_url().'dashboard');
                }else{
                    $data = ['tipo'=>'danger','mensaje'=>'Usuario o clave incorrecto'];
                    return view('login/index',$data);
                }
        }else{
            $data = ['tipo'=>'danger','mensaje'=>'Usuario o clave incorrecto'];
            return view('login/index',$data);
        }

    }


    public function cerrar(){
        session()->destroy();
        return redirect()->to(base_url());
    }

}