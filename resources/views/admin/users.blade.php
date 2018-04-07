@extends('layouts.index')
@php 
Use Carbon\Carbon;
@endphp   
@section('content')
           


 <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>  User's Contact Information</div>
        <div class="card-body">
          <div class="table-responsive">


          
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                <th>Id</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Date Of Birth</th>
                  <th>E_Mail</th>
                  <th>Gender</th> 
                  <th>Age</th> 
                  <th>This Person Is</th> 
                  <th>Action</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Date Of Birth</th>
                  <th>E_Mail</th> 
                  <th>Gender</th> 
                  <th>Age</th>
                  <th>This Person Is</th> 
                  <th>Action</th>
                </tr>
              </tfoot>
              @foreach ($users as $user )
              <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->first_name}}</td>
              <td>{{$user->last_name}}</td>
              <td>{{$user->date_of_birth}}</td>              
              <td>{{$user->email}}</td>
              <td>{{$user->sexe->wording}}</td>
              
              <td>{{Carbon::parse($user->date_of_birth)->age}}</td>
              <td>{{$user->age->wording}}</td>
              <td> <a href="Adminusers/{{$user->id}}/edit"><i class="fa fa-edit"></i></a>
                <a 
                href="{{$user->id}}"
                onclick="
                var result = confirm('Are you sure you wish delete this User');
                if(result)
                {
                  event.preventDefault();
                  document.getElementById('delete-form').submit();
                }

                ">

                <i class="fa fa-trash"></i></a>
              <form id="delete-form" action="{{route('Adminusers.destroy',[$user->id])}}"
                method="POST" style="display:none;">

                <input type="hidden" name="_method" value="delete" >
                {{csrf_field()}} </form>
              </td>

              </tr>
              @endforeach
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection
