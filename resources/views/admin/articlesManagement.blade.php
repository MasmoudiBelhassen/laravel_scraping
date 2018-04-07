@extends('layouts.index')
@section('content')

    <div  class="card ">
        <div class="card-header">
            <i class="fa fa-table"></i> Articles Management</div>
        <div class="card-body">
            <div class="table-responsive">



                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Url</th>
                        <th>Sex_Categorie</th>
                        <th>Age_Categorie</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Title</th>
                        <th>Url</th>
                        <th>Sex_Categorie</th>
                        <th>Age_Categorie</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>

                    @foreach ($articles as $article )
                        <tr>
                            <td>{{$article->title}}</td>
                            <td>{{$article->url}}</td>
                            <td><select multiple name="sexe[]">
                                    <option value="{{}}"></option>
                                </select></td>
                            <td> <a href="articles/{{$article->id}}/edit"><i class="fa fa-edit"></i></a>

                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection