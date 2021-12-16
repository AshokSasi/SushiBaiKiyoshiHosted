{{-- 
    
Title:      layouts/errors.blade.php
Created by: Ashok Sasitharan, Andre Agrippa, Jacky Yuan
Details:    This page will check if there are errors and output them into a list. 
    
--}}

@if (count($errors))
    
<div class="form-gorup">

  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
          <li>{{$error }}</li>
      @endforeach
    </ul>
  </div>

</div>
@endif