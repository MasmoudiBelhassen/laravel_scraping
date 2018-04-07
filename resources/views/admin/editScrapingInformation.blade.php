@extends('layouts.index')
@section('content')

    <div  class="card ">
        <div class="card-header">
            <i class="fa fa-table"></i>  User's Contact Information</div>
        <div class="card-body">
            <div class="table-responsive">



                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>url</th>
                        <th>parent</th>
                        <th>title</th>
                        <th>image</th>
                        <th>href</th>
                        <th>date</th>
                        <th>description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>url</th>
                        <th>parent</th>
                        <th>title</th>
                        <th>image</th>
                        <th>href</th>
                        <th>date</th>
                        <th>description</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    @foreach ($sources as $source )
                        <tr>
                            <td>{{$source->id}}</td>
                            <td>{{$source->typesource['name_source']}}</td>
                            <td>{{$source->url}}</td>
                            <td>{{$source->parent}}</td>
                            <td>{{$source->title}}</td>
                            <td>{{$source->image}}</td>
                            <td>{{$source->href}}</td>
                            <td>{{$source->date}}</td>
                            <td>{{$source->description}}</td>

                            <td> <a href="{{route('editScrapingInformation',['id'=> $source->id])}}"><i class="fa fa-edit"></i></a>

                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection