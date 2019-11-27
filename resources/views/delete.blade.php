@extends('layout')

@section('title','Eliminar')

@section('content')
<div class="row content-table delete">
    <div class="col-sm-6 offset-sm-3 scale-08">
        <h1 class="display-4 text-center">Eliminar</h1>
    </div>
        <div class="col-sm-10 offset-sm-1">
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Email</th>
        <th scope="col">Cédula</th>
        <th scope="col">Género</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr id="user-id-{{$user->id}}">
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->Nombre}}</td>
        <td>{{$user->Apellido}}</td>
        <td>{{$user->Email}}</td>
        <td>{{$user->Cedula}}</td>
        <td>
            @if ($user->Genero == 0)
                Masculino
            @else
                Femenino
            @endif
        </td>
        <td><button type="button" class="btn btn-danger delete-btn " data-id = "{{$user->id}}" data-token="{{csrf_token()}}">Eliminar</button></td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
</div>
@endsection