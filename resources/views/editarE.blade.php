@extends('layouts.pastel')

@section('title', 'Inicio')

@section('content')

<div class="center">
    
<h4>Modifica el pastel</h4>
            <form action="{{route('descP.update', $descripcion->_id)}}" method="POST">
                @csrf
                @method('PUT')
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
                    <input type="text" class="form-control" value="{{$descripcion->desc}}" id="descripcion" name="descripcion" >
                </div>
                <div class="form-group">
                    <label for="ingredientes">Ingredientes</label>
                    <input type="text" class="form-control" value="{{$descripcion->ingredientes}}" id="ingredientes" name="ingredientes" >
                </div>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
    </div>
    </form>
</div>

@endsection