@if(count($errors) > 0)
<div class="col-lg-12" >
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<li style="list-style-type: none;"><p><span>{{ $error }}</span></p></li>
@endforeach
</ul>
</div>
</div>
@endif