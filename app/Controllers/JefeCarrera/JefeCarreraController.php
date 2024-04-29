<?php

namespace App\Controllers\JefeCarrera;

use App\Controllers\BaseController;
use App\Models\JefeCarreraModel; 

class JefeCarreraController extends BaseController
{
    public function index()
{
    // Cargar el modelo
    $jefeCarreraModel = new JefeCarreraModel();

    // Obtener los datos de la tabla 'atributos'
    $datos_atributos = $jefeCarreraModel->obtener_datos_atributos();

    // Procesar los datos
    $claves = array();
    $valores = array();

    foreach ($datos_atributos as $dato) {
        $claves[] = $dato['clave']; 
        $nivel = $dato['nivel']; 
        switch ($nivel) {
            case 'A':
                $valores[] = 1 / 3;
                break;
            case 'B':
                $valores[] = 2 / 3;
                break;
            case 'C':
                $valores[] = 1;
                break;
            default:
                $valores[] = 0;
                break;
        }
    }

    // Pasar los datos a la vista
    $data['claves'] = $claves;
    $data['valores'] = $valores;

    // Cargar la vista
    return view('jefedecarrera/dashboard', $data);
}}