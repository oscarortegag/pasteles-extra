@extends('layouts.pastel')

@section('title', 'Inicio')

@section('content')

<div class="center">
    
<form action="{{route('pastelesR.update', $pastelE->_id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <!-- Input para ingresar el nombre del pastel -->
                    <label for="nombrePastel">Nombre del pastel</label>
                    <input type="text" class="form-control" value="{{$pastelE->nombre}}" name="nombrePastel" id="nombrePastel" placeholder="Ingrese el nombre del pastel" required>
                </div>

                <!-- Inputa para ingresar el precio del pastel -->
                <div class="form-group">
                    <label for="precioPastel">Precio del pastel</label>
                    <input type="number" class="form-control" value="{{$pastelE->precio}}" id="precioPastel" name="precioPastel" placeholder="Ingrese el precio del pastel" required>
                </div>

                <button type="submit" class="btn btn-primary">Guardar pastel</button>

            </form>  
</div>

@endsection