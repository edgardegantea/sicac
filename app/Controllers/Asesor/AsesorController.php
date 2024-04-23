<?php

namespace App\Controllers\Asesor;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class AsesorController extends BaseController
{
    public function __construct()
    {
        if (session()->get('perfil') != 2) {
            echo view('accesonoautorizado');
            exit;
        }
    }

    public function index()
    {
        $usuarioModel = new UsuarioModel();
        $usuarios = $usuarioModel->orderBy('id', 'DESC')->findAll();

        $data = [
            'usuarios'  => $usuarios
        ];

        return view('asesor/dashboard', $data);
    }
}
