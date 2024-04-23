<?php

namespace App\Controllers\Admin;

use CodeIgniter\RESTful\ResourceController;
use App\Models\AsesoriaModel;

class AsesoriaController extends ResourceController
{

    private $asesoriaModel;
    

    public function __construct()
    {
        $this->asesoriaModel = new AsesoriaModel();
    }

    
    public function index()
    {
        $data = [
            'asesorias' => $this->asesoriaModel->orderBy('id', 'desc')->findAll()
        ];

        return view('admin/asesorias/index', $data);
    }

    
    
    public function show($id = null)
    {
        //
    }



    public function new()
    {
        //
    }



    public function create()
    {
        //
    }



    public function edit($id = null)
    {
        //
    }



    public function update($id = null)
    {
        //
    }



    public function delete($id = null)
    {
        //
    }
}
