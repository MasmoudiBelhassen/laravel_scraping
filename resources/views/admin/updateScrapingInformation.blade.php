@extends('layouts.index')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="{{route('updateScrapingInformation',['id'=> $source->id])}}"  method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PATCH">
                    <div class="card card-primary">


                        <div class="card-header">Add New Url From Exit Source</div>

                        <div class="card-body">


                            <div class="form-group row">
                                <label for="url" class="col-md-4 col-form-label text-md-right"><b>URL:</b></label>

                                <div class="col-md-6">
                                    <input id="url" type="url"
                                           class="form-control"
                                           value="{{$source->url}}"
                                           name="url" required>
                                </div>

                            </div>



                            <br>
                            <div class="form-group row">
                                <label for="interest" class="col-md-4 col-form-label text-md-right"><b>Choose Interest :</b></label>
                                <div class=" col-md-6">
                                    <select id="interest" name="interest" data-live-search="true" class="form-control">
                                        <option selected disabled>Choose Interest..</option>
                                        @foreach($interestSource as $interest)
                                            <option value="{{$interest->id}}">{{$interest->wording}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <br>




                            <div class="form-group row">
                                <label for="language" class="col-md-4 col-form-label text-md-right"><b>Choose Language :</b></label>

                                <div class="col-md-6">
                                    <select id="language" name="language" class="form-control">
                                        <option selected disabled>Choose Language..</option>
                                        @foreach($languages as $language)
                                            <option value="{{$language->id}}">{{$language->wording}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <br>




                            <div class="form-group row">
                                <label for="parent" class="col-md-4 col-form-label text-md-right"><b>Parent from source (class) :</b></label>

                                <div class="col-md-6">
                                    <input id="parent" type="text"
                                           class="form-control"
                                           value="{{$source->parent}}"
                                           name="parent" required>
                                </div>
                            </div>

                            <br>

                            <div class="form-group row">
                                <label for="date" class="col-md-4 col-form-label text-md-right"><b>Date from source (class) :</b></label>

                                <div class="col-md-6">
                                    <input id="date" type="text"
                                           class="form-control"
                                           value="{{$source->date}}"
                                           name="date" required>
                                </div>
                            </div>

                            <br>

                            <div class="form-group row">
                                <label for="href" class="col-md-4 col-form-label text-md-right"><b>Href from source (class) :</b></label>

                                <div class="col-md-6">
                                    <input id="href" type="text"
                                           value="{{$source->href}}"
                                           class="form-control"
                                           name="href" required>
                                </div>
                            </div>

                            <br>

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right"><b>Image from article (meta) :</b></label>
                                <div class="col-md-6">
                                    <input value="{{$source->image}}" required placeholder="Image from article (<meta>)" type="text"
                                           name="image" id="image" class="form-control">
                                </div>
                            </div>

                            <br>

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right"><b>Title from article (meta) :</b></label>
                                <div class="col-md-6">
                                    <input required  type="text"
                                           value="{{$source->title}}"
                                           name="title" id="title" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right"><b>Description from article (class) :</b></label>
                                <div class="col-md-6">
                                    <input required  type="text"
                                           value="{{$source->description}}"
                                           name="description" id="description" class="form-control">
                                </div>
                            </div>



                        </div>
                        <input type="submit" value="Modify" class="btn btn-outline-primary">

                    </div>
                </form>
            </div>

        </div>
    </div>
    </div>
@endsection