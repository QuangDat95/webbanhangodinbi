@if(Session::has('flash_message'))
<div class="alert alert-success alert-dismissible" role="alert">
    <strong>{{ Session('flash_message') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
</div>
@endif