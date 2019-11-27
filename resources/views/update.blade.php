@extends('layout')   

@section('title',trans('sentences.Update'))

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
                <form method="post" action="{{ route('update.update')}}" class="form-inlin justify-content-center text-left">
                    @csrf
                    <div class="form-group">
                        <label for="Nombre">{{trans('sentences.Name')}}:</label>
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
                        <label for="Apellido">{{trans('sentences.LName')}}:</label>
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
                        <label for="Email">{{trans('sentences.Email')}}:</label>
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
                        <label for="Cedula">{{trans('sentences.userID')}}:</label>
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
                        <label for="Genero">{{trans('sentences.Gender')}}:</label>
                        <select name="Genero" class="form-control  col-md-5" id="upt-gender" >
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
                      <input type="hidden" id="upt-user_id" name="id"></input>

                    <div class="text-center">
                        <button type="submit" class="btn btn-success ">{{trans('sentences.Submit-Update')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="row content-table update">
    <div class="col-sm-6 offset-sm-3 scale-08">
        <h1 class="display-4 text-center">{{trans('sentences.Update')}}</h1>
    </div>
    <div class="col-sm-10 offset-sm-1">
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">{{trans('sentences.Name')}}</th>
        <th scope="col">{{trans('sentences.LName')}}</th>
        <th scope="col">{{trans('sentences.Email')}}</th>
        <th scope="col">{{trans('sentences.userID')}}</th>
        <th scope="col">{{trans('sentences.Gender')}}</th>
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
                {{trans('sentences.Gender-Male')}}
            @else
                {{trans('sentences.Gender-Female')}}
            @endif
        </td>
        <td><button type="button" class="btn btn-warning edit-btn" data-id = "{{$user}}" data-token="{{csrf_token()}}">{{trans('sentences.Button-Edit')}}</button></td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
</div>

<script>
      var flag = @json($flag);

    if (flag == 1){
      var user = @json($userC);
      console.log(user);
      $("#modal-bg").css('display', 'block');
      $("#myModal").css('display','block');
      // Fill form with user data
      $("#upt-name").attr("value", user.Nombre);
      $("#upt-lastName").attr("value", user.Apellido);
      $("#upt-email").attr("value", user.Email);
      $("#upt-id").attr("value", user.Cedula);
      $("#upt-gender").val(user.Genero);
      $("#upt-user_id").val(user.id);
    }

</script>

@endsection
