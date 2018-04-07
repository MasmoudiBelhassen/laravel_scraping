@extends('layouts.index')
@section('content')
    <div class="container">
        <form action="{{route('save')}}" method="post">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-12 ">
                    <div class="card card-primary">
                        <div class="card-header">Scraping Form</div>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <label for="nameSource" class="col-md-4 col-form-label text-md-right"><b>Name Of Source
                                        :</b></label>
                                <input required type="text" name="nameSource" id="nameSource" class="form-control"
                                       placeholder="Put The Name Of Your New Source Here ..">
                            </div>
                        </div>
                        <form action="{{URL::to('verif')}}" method="get" id="formUrl">
                            @csrf
                            <div class="card-body">
                                <div class="input-group mb-3">
                                    <label for="url" class="col-md-4 col-form-label text-md-right"><b>Put The URL Source
                                            :</b></label>
                                    <input required type="url" name="url" onblur="myfunction()" id="url"
                                           class="form-control"
                                           placeholder="Example : http://www.example.com">
                                    <div class="input-group-append">
                                        <span name ="msg" id="msg"  class="input-group-text"></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card-body">
                            <div class="input-group mb-3">
                                <table class="table table-hover small-text" id="tb">
                                    <tr class="tr-header">
                                        <th>Put Information For Scarping</th>
                                        <th></th>
                                        <th></th>

                                        <th><a href="javascript:void(0);" style="font-size:18px;" id="addMore"
                                               title="Add More Person"><span class="fa fa-plus"></span></a></th>
                                    <tr>
                                        <td>
                                            <input id="url" name="urlInterest[]" type="text"
                                                   class="form-control"
                                                   placeholder="Example : http://www.Example.com/...."
                                                   aria-label="Username" aria-describedby="basic-addon1">
                                            <br>

                                            <div class="input-group mb-3">
                                                <input required placeholder="Parent from source (class)" type="text"
                                                       name="parent[]" id="parent[]" class="form-control">
                                            </div>
                                            <br>

                                            <div class="input-group mb-3">
                                                <input required placeholder="Date from source (class)" type="text"
                                                       name="date[]" id="date[]" class="form-control">
                                            </div>

                                        </td>
                                        <td><select name="interest[]" data-live-search="true" class="form-control"
                                            >
                                                <option selected disabled>Choose Interest..</option>
                                                @foreach($interestSource as $interest)
                                                    <option value="{{$interest->id}}">{{$interest->wording}}</option>
                                                @endforeach
                                            </select>
                                            <br>
                                            <div class="input-group mb-3">
                                                <input required placeholder="Title from article (<meta>)" type="text"
                                                       name="title[]" id="title[]" class="form-control">
                                            </div>
                                            <br>

                                            <div class="input-group mb-3">
                                                <input required placeholder="Description from article (class)" type="text"
                                                       name="description[]" id="description[]" class="form-control">
                                            </div>


                                        </td>

                                        <td><select name="language[]" class="form-control">
                                                <option selected disabled>Choose Language..</option>
                                                @foreach($languages as $language)
                                                    <option value="{{$language->id}}">{{$language->wording}}</option>
                                                @endforeach
                                            </select>
                                            <br>
                                            <div class="input-group mb-3">
                                                <input required placeholder="Image from article (<meta>)" type="text"
                                                       name="image[]" id="image[]" class="form-control">
                                            </div>
                                            <br>
                                            <div class="input-group mb-3">
                                                <input required placeholder="URL from source (class)" type="text"
                                                       name="href[]" id="href[]" class="form-control">
                                            </div>


                                        </td>

                                        <td><a href='javascript:void(0);' class='remove'><span style="color: red"
                                                                                               class='fa fa-remove'></span></a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <input type="submit" value="Insert" class="btn btn-outline-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>




@endsection
