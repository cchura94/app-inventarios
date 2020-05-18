<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Categoria;
use Auth;
use Dompdf\Dompdf;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        Auth::user()->autorizar(['user', 'admin']);

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
        Auth::user()->autorizar(['admin']);
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
        Auth::user()->autorizar(['admin']);
        $request->validate([
            "nombre" => "required|unique:categorias|max:30|min:2"            
        ]);

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
        Auth::user()->autorizar(['user']);
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
        Auth::user()->autorizar(['admin']);
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
        Auth::user()->autorizar(['admin']);
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
        Auth::user()->autorizar(['admin']);
        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect("/categoria")->with("ok", "La categoria se ha eliminado");
    }

    public function buscar(Request $request)
    {
        Auth::user()->autorizar(['user', 'admin']);
        $busq =  $request->buscar;
        $categorias = Categoria::where('nombre', "like", "%".$busq."%")->orwhere('descripcion', "like", "%".$busq."%")->paginate();
        return view("admin.categoria.listar", compact('busq', 'categorias'));
    }

    public function generarpdf()
    {
        $categorias = Categoria::All();
        $dompdf = new Dompdf();
        $dompdf->loadHtml('Hola Mundo');

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream();
    }
}
