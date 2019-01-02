@extends("guest_view/layout")
@section("judul","Login")
@section("content")

	<form class="form-horizontal" method="post" action="{{url('/login')}}">
    {{csrf_field()}}
<fieldset>

<!-- Form Name -->
<legend>Silahkan Login disini</legend>

@if(Session::has("error"))
  <div class="alert alert-danger">
    {{Session::get("error")}}
  </div>
@endif

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_email">Email</label>  
  <div class="col-md-4">
  <input id="txt_email" name="txt_email" type="text" placeholder="Email Anda" class="form-control input-md">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="txt_password">Password</label>
  <div class="col-md-4">
    <input id="txt_password" name="txt_password" type="password" placeholder="Password Anda" class="form-control input-md">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button id="" name="" class="btn btn-primary">Login</button>
  </div>
</div>

</fieldset>
</form>

	
@endsection

