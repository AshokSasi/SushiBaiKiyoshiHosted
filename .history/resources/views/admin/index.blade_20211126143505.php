@extends('layouts.master')

@section('content')

<h1 class="banner1">All Users</h1>
<div class="album py-5 contOpa rounded">  

   <a href="/admin/create">
    <button class="btn btn-primary mb-2">Add</button>
  </a>     

  
        <table class="table table-hover table-striped table-dark">
            <thead>
              <tr>
                <th class="center" scope="col">User ID</th>
                <th class="center"  scope="col">Name</th>
                <th class="center"  scope="col">Role</th>
                <th class="center" scope="col">View</th>
            
           
              </tr>
            </thead>
            <tbody>
             @foreach ($users as $user)
                <tr>
                <td class="center"  scope="row">{{$user->id}}</td>
                <td class="center" >{{$user->userFirstName}} {{$user->userLastName}}</td>
                @if($user->userPosition == "a")

                  @php ($position = "Admin")

                @endif
                
                @if($user->userPosition == "c")

                  @php ($position = "Customer")

                @endif
                 <td class="center" >{{$user->userPosition}}</td>
                <td class="center" >
                    <a href="/admin/show/{{$user->id}}">
                    <button class="btn btn-primary">View</button>
                    </a>
                 </td>
              </tr>
              @endforeach
         
            </tbody>
          </table>
       
        @include('layouts.errors')
    </div>

@endsection