@extends('layouts.landing')
@section('content')
<div class="card" style="margin: 20px;">
 
  <div class="card-header">Create Mukando</div>
  <div class="card-body">
    @if ($errors->any())
    <div class="alert alert-danger">
      <strong>Error!</strong>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
        @endforeach
      </ul>
        </div>
      @endif
      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>{{ $message }}</strong>
      </div>
      @endif
       
      <form action="{{ route('save.mukando') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
              <label>Name</label>
              <input type="text" name="name" id="name" class="form-control" required>
            </div>
          </div>
          <!--end name section-->
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
              <label>Description</label>
              <textarea name="description" id="description" class="form-control"  row="5" required></textarea>
            </div>
          </div>
          <!--end description section-->
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
              <label>end date</label>
              <input type="date" name="end_date" id="end_date" class="form-control">
            </div>
          </div>
          <!--end end-date section-->
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
              <label>Monthly</label>
              <input type="text" name="monthly" id="monthly" class="form-control" required>
            </div>
          </div>
          <!--end monthly target section-->
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
              <label>target</label>
              <input type="text" name="target" id="target" class="form-control" required>
            </div>
          </div>
        </div> <!--end div row -->
        <input type="submit" value="Create" class="btn btn-success">  
    </form> 
  </div>
</div>
@stop