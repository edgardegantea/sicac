<?php

namespace App\Controllers\Admin;

use App\Models\AsignaturaModel;
use CodeIgniter\RESTful\ResourceController;

class AsignaturaController extends ResourceController
{

    private $asignaturaModel;
    private $db;

    public function __construct()
    {
        helper(['url', 'form', 'session']);
        $this->db = \Config\Database::connect();
        $this->asignaturaModel = new AsignaturaModel();
        $this->session = \Config\Services::session();
    }





    public function index()
    {
        $asignaturas = $this->asignaturaModel->orderBy('id', 'desc')->findAll();

        $data = [
            'asignaturas'   => $asignaturas
        ];

        return view('admin/asignaturas/index', $data);
    }





    public function show($id = null)
    {
        $asignatura = $this->asignaturaModel->find($id);

        if ($asignatura) {
            return view('admin/asignaturas/show', compact('asignatura'));
        } else {
            return redirect()->to('admin/asignaturas');
        }
    }






    public function new()
    {
        return view('admin/asignaturas/create');
    }





    public function create()
    {
        $data = [
            'clave' => $this->request->getVar('clave'),
            'nombre' => $this->request->getVar('nombre'),
            'creditos' => $this->request->getVar('creditos'),
            'horas_teoricas' => $this->request->getVar('horas_teoricas'),
            'horas_practicas' => $this->request->getVar('horas_practicas'),
            'tipo_asignatura' => $this->request->getVar('tipo_asignatura'),
            'descripcion' => $this->request->getVar('descripcion'),
            'temario_asignatura' => $this->request->getVar('temario_asignatura'),
            'activo' => 1
        ];




        $data['horas_totales'] = $data['horas_teoricas'] + $data['horas_practicas'];

        $rules = [
            'clave' => 'required|is_unique[asignaturas.clave]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/admin/asignaturas/new')->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->asignaturaModel->insert($data);

        return redirect()->to('/admin/asignaturas')->with('success', 'Asignatura registrada exitosamente.');
    }




    public function edit($id = null)
    {
        $asignatura = $this->asignatura->find($id);
        if ($asignatura) {
            return view('admin/asignaturas/edit', compact('asignatura'));
        } else {
            session()->setFlashdata('failed', 'Asignatura no encontrada.');
            return redirect()->to('/admin/asignaturas');
        }
    }






    public function update($id = null)
    {
        $inputs = $this->validate([
            'clave'         => 'required|min_length[1]|max_length[10]',
            'nombre'        => 'required|min_length[2]|max_length[255]',
            'creditos'      => 'required',
            'horasSemana'   => 'required'
        ]);

        if (!$inputs) {
            return view('admin/asignaturas/create', [
                'validation' => $this->validator
            ]);
        }

        $this->asignatura->save([
            'id'                => $id,
            'clave'             => $this->request->getVar('clave'),
            'nombre'            => $this->request->getVar('nombre'),
            'descripcion'       => $this->request->getVar('descripcion'),
            'creditos'          => $this->request->getVar('creditos'),
            'horasSemana'       => $this->request->getVar('horasSemana'),
            'temario'           => $this->request->getVar('temario'),
            'temarioArchivo'    => $this->request->getVar('temarioArchivo')
        ]);
        session()->setFlashdata('success', 'Datos actualizados con éxito.');
        return redirect()->to(base_url('/admin/asignaturas'));
    }





    public function delete($id = null)
    {
        $this->asignaturaModel->delete($id);

        session()->setFlashdata('success', 'Registro borrado de la base de datos');

        return redirect()->to(base_url('/admin/asignaturas'));
    }



}
