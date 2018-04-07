@extends('layouts.index')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Source Type </h1>
        </div>
    </div>

    <div class="row">
        <div class="table table-responsive">
            <table class="table table-bordered" id="table">
                <tr>

                    <th class="text-center" width="150px">Identity</th>
                    <th class="text-center" width="150px">Source Name</th>
                    <th class="text-center" width="150px">
                        Source URL
                    </th>
                    <th class="text-center" width="150px">Action</th>

                </tr>
                {{csrf_field()}}
                <?php foreach ($typeSources as $typeSource): ?>
                <tr>


                    <td class="text-center">{{$typeSource->id}}</td>
                    <td class="text-center">{{$typeSource->name_source}}</td>
                    <td class="text-center">{{$typeSource->url}}</td>
                    <td class="text-center">
                        <a href="typeSource/{{$typeSource->id}}/edit"><i class="fa fa-edit"></i></a>
                        <a
                                href="{{$typeSource->id}}"
                                onclick="
                var result = confirm('Are you sure you wish delete this Source');
                if(result)
                {
                  event.preventDefault();
                  document.getElementById('delete-form{{$typeSource->id}}').submit();
                }">
                            <i class="fa fa-trash-o"></i></a>

                        <form id="delete-form{{$typeSource->id}}" action="{{route('typeSource.destroy',[$typeSource->id])}}"
                              method="POST" style="display:none;">

                            <input type="hidden" name="_method" value="delete" >
                            {{csrf_field()}} </form>
                    </td>

                    <?php endforeach; ?>
                </tr>

            </table>
        </div>
    </div>



@endsection
