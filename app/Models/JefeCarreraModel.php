<?php

namespace App\Models;

use CodeIgniter\Model;

class JefeCarreraModel extends Model
{
    protected $table = 'atributos';

    // Método para obtener los datos de la tabla 'atributos'
    public function obtener_datos_atributos()
    {
        // Realizar la consulta a la base de datos
        $query = $this->db->query("SELECT * FROM atributos");

        // Devolver los resultados como un arreglo de filas
        return $query->getResultArray();
    }
}
