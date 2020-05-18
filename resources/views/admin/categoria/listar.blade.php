@extends("layouts.admin")


@section("titulo", "Lista de Categorias")


@section("contenedor")

<h1>Lista de Categorias</h1>

<h2>Buscaste: {{ $busq }}</h2>

@if(session('ok'))
    <div class="alert alert-success">{{ session('ok')}}</div>
@endif

<a href="/categoria/create" class="btn btn-success">Nueva categoria</a>
<a href="{{ route('categoria.create') }}" class="btn btn-success">Nueva categoria</a>


<form action="/categoria/buscar" method="get">
    <input type="text" name="buscar" id="">
    <input type="submit" value="Buscar" class="btn btn-primary">
</form>

<table class="table table-hover table-striped">
    <tr>
        <td>ID</td>
        <td>NOMBRE</td>
        <td>DESCRIPCIOn</td>
        <td>ACCIONES</td>
    </tr>
    @foreach($categorias as $cat)
    <tr>
        <td>{{ $cat->id }}</td>
        <td>{{ $cat->nombre }}</td>
        <td>{{ $cat->descripcion }}</td>
        <td>
            <a href="{{ route('categoria.edit', $cat->id) }}" class="btn btn-warning btn-xs">editar</a>
            
            <form action="{{ route('categoria.destroy', $cat->id) }}" method="post" style="display:inline">
                @csrf
                @Method('DELETE')
                <input type="submit" value="eliminar" class="btn btn-danger btn-xs">
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $categorias->links() }}

@endsection