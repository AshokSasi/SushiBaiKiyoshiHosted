@extends('layouts.master')

@section('content')

<h1 class="banner1">All Users</h1>
<div class="album py-5 contOpa rounded">  

        
  <button class="btn btn-primary mb-2">Add</button>
  
        <table class="table table-hover table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">User ID</th>
                <th scope="col">Name</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
           
              </tr>
            </thead>
            <tbody>
             @foreach ($users as $user)
                <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->userFirstName}}</td>
                <td>
                    <button class="btn btn-primary">View</button>
                 </td>
                 <td>
                  <button class="btn btn-primary">Edit</button>
               </td>
               <td>
                <button class="btn btn-danger">Delete</button>
             </td>
              </tr>
              @endforeach
         
            </tbody>
          </table>
       
        @include('layouts.errors')
    </div>

@endsection