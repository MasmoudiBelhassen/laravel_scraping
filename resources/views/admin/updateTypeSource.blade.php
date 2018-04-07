@extends('layouts.index')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">Update Source Type Information</div>
                    <div class="card-body">


                        <div class="card-body">
                            <form method="POST" action="{{route('typeSource.update',$typeSources)}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="PUT">


                                <div class="form-group row">
                                    <label for="name_source" class="col-md-4 col-form-label text-md-right">Source Name
                                        : </label>

                                    <div class="col-md-6">
                                        <input id="name_source" type="text" value="{{$typeSources->name_source}}"
                                               class="form-control"
                                               name="name_source" required autofocus>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row">
                                    <label for="url" class="col-md-4 col-form-label text-md-right">Source Name
                                        : </label>

                                    <div class="col-md-6">
                                        <input id="url" type="text" value="{{$typeSources->url}}"
                                               class="form-control"
                                               name="url" required autofocus>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary">
                                                Modify
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
