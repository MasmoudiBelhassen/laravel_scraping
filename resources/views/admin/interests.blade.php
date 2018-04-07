@extends('layouts.index')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Interests </h1>
        </div>
    </div>

    <div class="row">
        <div class="table table-responsive">
            <table class="table table-bordered" id="table">
                <tr>
                    <th width="150px">Id</th>
                    <th>Interests</th>
                    <th class="text-center" width="150px">
                        <a href="#" class="create-modal btn btn-success btn-sm" data-toggle="modal" data-target="#add">
                            <i class="fa fa-plus"></i>
                        </a>
                    </th>
                </tr>
                {{csrf_field()}}
                @foreach ($interests as $interest)
                <tr class="post{{$interest->id}}">
                    <td>{{$interest->id}}</td>
                    <td>{{$interest->wording}}</td>
                    <td>
                        <a href="{{$interest->id}}" class="deleteProduct" data-id="{{ $interest->id }}" data-token="{{ csrf_token() }}">
                            <i class="fa fa-trash"></i>
                        </a>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    {{-- Modal Form Create Post --}}
    <div id="add" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Interest</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" id="insert_form" action="{{URL::to('store')}}">
                        @csrf
                        <div class="input-group mb-3">
                            <input name="wording" id="wording" type="text" class="form-control"
                                   placeholder="Put Your Interest Here">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">
                                    <span class="fa fa-check"></span></button>
                            </div>

                        </div>
                        <span id="iderror" class="error text-center"></span>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection