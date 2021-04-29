@extends('layouts.pastel')

@section('title', 'Inicio')

@section('content')

<div class="container">
    <div class="row">
        <!-- Formulario para ingresar pasteles -->
        <div class="col">
            <h4>Ingresa un pastel</h4>
            <form action="{{route('pastelesR.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <!-- Input para ingresar el nombre del pastel -->
                    <label for="nombrePastel">Nombre del pastel</label>
                    <input type="text" class="form-control" name="nombrePastel" id="nombrePastel" placeholder="Ingrese el nombre del pastel" required>
                </div>

                <!-- Inputa para ingresar el precio del pastel -->
                <div class="form-group">
                    <label for="precioPastel">Precio del pastel</label>
                    <input type="number" class="form-control" id="precioPastel" name="precioPastel" placeholder="Ingrese el precio del pastel" required>
                </div>

                <button type="submit" class="btn btn-primary">Guardar pastel</button>

            </form>
        </div>

        <!-- Formulario para ingresar receta -->
        <div class="col">
            <h4>Ingresa la descripcion de un pastel</h4>
            <form action="{{route('descP.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="pasteles">Selecciona un pastel para añadir una descripcion</label>
                    <select class="form-control" id="pasteles" name="pasteles">
                        @foreach($pasteles as $pastel)
                        <option value='{{$pastel->_id}}'>{{$pastel->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion">

                </div>
                <div class="form-group">
                    <label for="ingredientes">Ingredientes</label>
                    <input type="text" class="form-control" id="ingredientes" name="ingredientes" placeholder="Ingredientes">
                </div>
                <button type="submit" class="btn btn-primary">Guardar ingredientes</button>
        </div>
    </div>
    </form>
</div>

<div class="center">
    <table class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        @foreach($pasteles as $pastel)
        <tbody>
            <tr>
                <td>{{$pastel->_id}}</td>
                <td>{{$pastel->nombre}}</td>
                <td>{{$pastel->precio}}</td>
                <td>
                    <div class="form-row">
                        <div class="col">
                            <form action="{{route('pastelesR.destroy',$pastel->_id)}}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="submit" value="eliminar" class="btn btn-warning">
                            </form>
                        </div>
                        <div class="col">
                            <form action="{{route('editarPa',$pastel->_id)}}" method="POST">
                                @csrf
                                @method('GET')
                                <input type="submit" value="editar" class="btn btn-success">
                            </form>
                        </div>
                        <div class="col">
                            <form action="{{route('verPa',$pastel->_id)}}" method="POST">
                                @csrf
                                @method('GET')
                                <input type="submit" value="Ver" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
    <br>
    <table class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id relacion</th>
                <th>Descripcion</th>
                <th>Ingredientes</th>
                <th>Acciones</th>
            </tr>
        </thead>
        @foreach($descripcion as $desc)
        <tbody>
            <tr>
                <td>{{$desc->pastel_id}}</td>
                <td>{{$desc->desc}}</td>
                <td>{{$desc->ingredientes}}</td>
                <td>
                <div class="form-row">
                <div class="col">
                    <form action="{{route('descP.destroy',$desc->_id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="eliminar" class="btn btn-warning">
                    </form>
                    </div>
                    <div class="col">
                        <form action="{{route('editarDe',$desc->_id)}}" method="POST">
                            @csrf
                            @method('GET')
                            <input type="submit" value="editar" class="btn btn-success">
                        </form>
                    </div>
                    <div class="col">
                            <form action="{{route('verDe',$desc->_id)}}" method="POST">
                                @csrf
                                @method('GET')
                                <input type="submit" value="Ver" class="btn btn-primary">
                            </form>
                        </div>
                        </div>
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>
</div>
@endsection