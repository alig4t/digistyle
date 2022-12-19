<div class="col-10 mx-auto">
    @if(count($errors)>0)
    @foreach($errors->all() as $err)
    <div class="alert alert-primary alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h6 class="mb-0"><i class="icon fa fa-ban"></i> {{$err}}</h6>
    </div>
    @endforeach
    @endif
  </div>