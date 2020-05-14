@extends("layouts.admin")

@section("contenedor")

<h1>Nueva categoria</h1>

<form action="{{ route('categoria.store') }}" method="post">

    @csrf
    <label for="">Ingrese nombre de categoria:</label>
    
    <input type="text" name="nombre" class="form-control">

    <label for="">Ingrese Descripción:</label>
    
    <textarea name="descripcion" class="form-control"></textarea>

    <input type="submit" value="Guardar" class="btn btn-primary">
</form>

@endsection


