<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Rol implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('rol') !== 'admin') {
            // Si el usuario no tiene el rol de administrador, muestra un mensaje de error o redirige a la página principal
            die('Acceso no autorizado'); // Puedes personalizar el mensaje o redirigir según tus necesidades
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}