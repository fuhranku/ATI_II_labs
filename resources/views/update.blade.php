@extends('layout')   

@section('title','Update')

@section('content')

<div id="modal-bg">
    <!-- The Modal -->
    <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            @if (isset($submitState))
            @if ($submitState == 1)
                @yield('modal')
                @endif
            @endif
            <div class="info-form">
                <form method="post" action="{{ route('create.store')}}" class="form-inlin justify-content-center text-left">
                    @csrf
                    <div class="form-group">
                        <label for="Nombre">Nombre:</label>
                        <input type="text" class="form-control" id="upt-name" name="Nombre" placeholder="Jane"/>
                        @if ($errors->has('Nombre'))
                            <ul class="alert alert-danger">
                            @foreach ($errors->get('Nombre') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Apellido">Apellido:</label>
                        <input type="text" class="form-control" id="upt-lastName" name="Apellido" placeholder="Doe"/>
                        @if ($errors->has('Apellido'))
                        <ul class="alert alert-danger">
                        @foreach ($errors->get('Apellido') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Email">Email:</label>
                        <input type="text" class="form-control" name="Email" id="upt-email" placeholder="jane.doe@gmail.com"/>
                        @if ($errors->has('Email'))
                            <ul class="alert alert-danger">
                            @foreach ($errors->get('Email') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Cedula">Cédula:</label>
                        <input type="text" class="form-control" name="Cedula" id="upt-id" placeholder="12345678"/>
                        @if ($errors->has('Cedula'))
                            <ul class="alert alert-danger">
                            @foreach ($errors->get('Cedula') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="Genero">Género:</label>
                        <select name="Genero" class="form-control  col-md-5" id="upt-genre" >
                            <option value="">Selecciona tu género</option>
                            <option value="0">Masculino</option>
                            <option value="1">Femenino</option>
                        </select>
                        @if ($errors->has('Genero'))
                            <ul class="alert alert-danger">
                            @foreach ($errors->get('Genero') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-success ">Update</button>
                    </div>
                </form>
            </div>
        </div>
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
        <td><button type="button" class="btn btn-warning edit-btn" data-id = "{{$user->id}}" data-token="{{csrf_token()}}">Editar</button></td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
</div>
@endsection
