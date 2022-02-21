<div class="col-lg-12" >
@if(Session::has('flash_message'))
<div class="alert alert-success">
<h5> {{ Session::get('flash_message')}} </h5>
</div>
@endif
</div>