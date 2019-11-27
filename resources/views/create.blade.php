<!-- create.blade.php -->

@extends('layout')      

@section('title',trans('sentences.Create'))

@section('content')
<section>
    <div class="scale-08">
        @if (isset($submitState))
            @if ($submitState == 1)
                @yield('modal')
            @endif
        @endif
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <h1 class="display-4 text-center">{{ trans('sentences.Create')}}</h1>
                <div class="info-form">
                    <form method="post" action="{{ route('create.store')}}" class="form-inlin justify-content-center text-left">
                        @csrf
                        <div class="form-group">
                            <label for="Nombre">{{ trans('sentences.Name')}}:</label>
                            <input type="text" class="form-control" name="Nombre" placeholder="Jane"/>
                            @if ($errors->has('Nombre'))
                                <ul class="alert alert-danger">
                                @foreach ($errors->get('Nombre') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Apellido">{{ trans('sentences.LName')}}:</label>
                            <input type="text" class="form-control" name="Apellido" placeholder="Doe"/>
                            @if ($errors->has('Apellido'))
                            <ul class="alert alert-danger">
                            @foreach ($errors->get('Apellido') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Email">{{ trans('sentences.Email')}}:</label>
                            <input type="text" class="form-control" name="Email" placeholder="jane.doe@gmail.com"/>
                            @if ($errors->has('Email'))
                                <ul class="alert alert-danger">
                                @foreach ($errors->get('Email') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Cedula">{{trans('sentences.userID')}}:</label>
                            <input type="text" class="form-control" name="Cedula" placeholder="12345678"/>
                            @if ($errors->has('Cedula'))
                                <ul class="alert alert-danger">
                                @foreach ($errors->get('Cedula') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                                </ul>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="Genero">{{trans('sentences.Gender')}}:</label>
                            <select name="Genero" class="form-control  col-md-5" id="Genero">
                                <option value="">{{trans('sentences.Gender-placeholder')}}</option>
                                <option value="0">{{trans('sentences.Gender-Male')}}</option>
                                <option value="1">{{trans('sentences.Gender-Female')}}</option>
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
                            <button type="submit" class="btn btn-success ">{{trans('sentences.Submit')}}</button>
                        </div>
                    </form>
                </div>
                <br>
        </div>
    </div>
@endsection