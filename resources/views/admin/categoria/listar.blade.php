@extends("layouts.admin")


@section("titulo", "Lista de Categorias")


@section("contenedor")

<h1>Lista de Categorias</h1>

<h2>Buscaste: {{ $busq }}</h2>

{{ $categorias }}
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
        </td>
    </tr>
    @endforeach
</table>

@endsection