@extends('layouts.master')

@section('content')
    <!-- Make this page have unique url using wild card in route for the id of the item and then fill in the details of the items-->
    <h1 class="banner1">View {{$user->userFirstName}} {{$user->userLastName}}</h1>
    <div class="album py-5 contOpa rounded">  
    <div class="col-md-8">
    
     
        
   
            @include('layouts.errors')

        </form>
    </div>
    </div>

@endsection