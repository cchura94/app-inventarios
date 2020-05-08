<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonaController extends Controller
{
    public function listar()
    {
        return view("admin.persona.listar");
    }

    public function crear()
    {
        return view("admin.persona.nuevo");
    }

    public function mostrar($id)
    {
        return view("admin.persona.mostrar", ["id" => $id]);
    }

    public function editar($id)
    {
        return view("admin.persona.editar", ["id" => $id]);
    
    }
}
