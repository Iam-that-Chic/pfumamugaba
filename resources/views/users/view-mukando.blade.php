@extends('layouts.landing')
@section('content')
<div class="card" style="margin: 20px;">
 
  <div class="card-header">Mukando Details</div>
  <div class="card-body">

        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
              <label>Mukando name :{{ $mukando->name }}</label>
          </div>
          <!--end name section-->
         <div class="col-xs-12 col-sm-12 col-md-12">
              <label>Description:{{ $mukando->description }}</label>
          </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
              <label>Monthly amount:{{ $mukando->monthly }}</label>
          </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
              <label>Our Target :{{ $mukando->target }}</label>
          </div>
           <div class="col-xs-12 col-sm-12 col-md-12">
              <label>End Date :{{ $mukando->end_date }}</label>
          </div>
        </div> <!--end div row -->
         <a href="{{ route('payment.create',[$mukando->id])}}" ><button
           class="btn btn-info btn-sm">
        <i class="fa fa-money" aria-hidden="true"></i> Make Payment</button></a>
  </div>
</div>
@stop