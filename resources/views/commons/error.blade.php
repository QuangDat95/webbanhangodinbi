@if(count($errors) > 0)
<div class="col-lg-12" >
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<div class="alert alert-success">
        <strong>{{ $error }}</strong>
    </div>
@endforeach
</ul>
</div>
</div>
@endif