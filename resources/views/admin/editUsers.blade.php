@extends('layouts.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">Update User Information


                        <div class="card-body">
                            <form method="POST" action="{{route('Adminusers.update',$user)}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">


                                <div class="form-group row">
                                    <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name
                                        : </label>

                                    <div class="col-md-6">
                                        <input id="first_name" type="text" value="{{$user->first_name}}"
                                               class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                               name="first_name" required autofocus>

                                        @if ($errors->has('first_name'))
                                            <span class="invalid-feedback">
                        <strong>{{ $errors->first('first_name') }}</strong>
                    </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name
                                        : </label>

                                    <div class="col-md-6">
                                        <input id="last_name" type="text" value="{{$user->last_name}}"
                                               class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                               name="last_name" required autofocus>

                                        @if ($errors->has('last_name'))
                                            <span class="invalid-feedback">
                        <strong>{{ $errors->first('last_name') }}</strong>
                    </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="date" class="col-md-4 col-form-label text-md-right">Date Of Birth
                                        : </label>

                                    <div class="col-md-6">
                                        <input id="date" type="date" value="{{$user->date_of_birth}}"
                                               class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}"
                                               name="date" value="{{ old('date') }}" required autofocus>

                                        @if ($errors->has('date'))
                                            <span class="invalid-feedback">
                            <strong>{{ $errors->first('date') }}</strong>
                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sexe" class="col-md-4 col-form-label text-md-right">Gender : </label>

                                    <div class="col-md-6">
                                        <select name="sexe" id="sexe" class="selectpicker form-control ">
                                            <option value="man">Man</option>
                                            <option value="woman">Woman</option>

                                        </select>
                                        @if ($errors->has('sexe'))
                                            <span class="invalid-feedback">
                        <strong>{{ $errors->first('sexe') }}</strong>
                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Email :</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" value="{{$user->email}}"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">Password
                                        :</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" value="{{$user->password}}"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Modify
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
