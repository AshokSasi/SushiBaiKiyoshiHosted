@extends('layouts.master')

@section('content')

<h1 class="banner1">All Users</h1>
<div class="album py-5 contOpa rounded">  

        
  <button class="btn btn-primary mb-2">Add</button>
  
        <table class="table table-hover table-striped table-dark">
            <thead>
              <tr>
                <th class="center" scope="col">User ID</th>
                <th class="center"  scope="col">Name</th>
                <th class="center" scope="col">View</th>
            
           
              </tr>
            </thead>
            <tbody>
             @foreach ($users as $user)
                <tr>
                <td class="center"  scope="row">{{$user->id}}</td>
                <td class="center" >{{$user->userFirstName}} {{$user->userLastName}}</td>
                <td class="center" >
                    <button class="btn btn-primary">View</button>
                 </td>
              </tr>
              @endforeach
         
            </tbody>
          </table>
       
        @include('layouts.errors')
    </div>

@endsection