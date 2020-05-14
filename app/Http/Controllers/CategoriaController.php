<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $busq = $request->buscar;
        //$categorias = DB::select("select * from categorias");
        //DB::insert("insert into categorias (nombre, descripcion) values ('muebles', 'muebles de oficina')");
        //$categorias2 = DB::table("categorias")->select("nombre", "descripcion")->get();
        //DB::table("categorias")->where('id', 2)->update(["nombre"=> "muebles modificado"]);
        //return DB::table("categorias")->get();
        //Categoria::All();

        //$categorias =  Categoria::All();
        $categorias =  Categoria::paginate(5);

         return view("admin.categoria.listar", compact('busq', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.categoria.nuevo");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new Categoria;
        $cat->nombre = $request->nombre;
        $cat->descripcion = $request->descripcion;
        $cat->save();

        return redirect("/categoria")->with("ok", "La categoria se ha registrado");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("admin.categoria.mostrar");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::find($id);
        return view("admin.categoria.editar", compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();

        return redirect("/categoria")->with("ok", "La categoria se ha modificado");
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect("/categoria")->with("ok", "La categoria se ha eliminado");
    }
}
