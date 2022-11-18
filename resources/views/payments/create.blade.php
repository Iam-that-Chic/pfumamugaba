@extends('layouts.landing')
@section('content')
<div class="card" style="margin: 20px;">
 
  <div class="card-header">Make Mukando Payment</div>
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
       
      <form action="{{ route('make.payment') }}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
              <label>Enter Amount</label>
              <input type="text" name="amount" id="amount" class="form-control" required>
            </div>
          </div>
          <!--end name section-->
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
              
              <input type="text" name="user_id" id="user_id" class="form-control" hidden value='1'>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group mb-3">
              
              <input type="text" name="mukando_id" id="mukando_id" class="form-control" value="{{$mukando->id}}" hidden>
            </div>
          </div>
          <!--end description section-->
        </div> <!--end div row -->
         <input type="submit" value="Pay" class="btn btn-success">
    </form> 
  </div>
</div>
@stop