@extends('layout')   

@section('title','Update')

@section('content')


<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>
</div>

<div class="row content-table update">
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
        <tr>
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
        <td><button type="button" class="btn btn-warning edit-btn">Editar</button></td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
</div>
@endsection
