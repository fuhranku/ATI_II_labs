@extends('layout')

@section('title',trans('sentences.Read'))

@section('content')
<div class="row content-table read">
    <div class="col-sm-6 offset-sm-3 scale-08">
        <h1 class="display-4 text-center">{{ trans('sentences.Read')}}</h1>
    </div>
        <div class="col-sm-10 offset-sm-1">
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">{{ trans('sentences.Name')}}</th>
        <th scope="col">{{ trans('sentences.LName')}}</th>
        <th scope="col">{{ trans('sentences.Email')}}</th>
        <th scope="col">{{ trans('sentences.userID')}}</th>
        <th scope="col">{{ trans('sentences.Gender')}}</th>
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
                {{ trans('sentences.Gender-Male')}}
            @else
                {{ trans('sentences.Gender-Female')}}
            @endif
        <td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
</div>
@endsection