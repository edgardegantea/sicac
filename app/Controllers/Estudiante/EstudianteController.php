<?php

namespace App\Controllers\Estudiante;

use App\Controllers\BaseController;
use App\Models\UsuarioModel;

class EstudianteController extends BaseController
{
    public function __construct()
    {
        if (session()->get('perfil') != 3) {
            echo view('accesonoautorizado');
            exit;
        }
    }

    public function index()
    {
        return view('estudiante/dashboard');
    }
}
