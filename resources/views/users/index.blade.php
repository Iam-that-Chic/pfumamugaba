@extends('layouts.landing')
@section('content')
 
 <div class="container">
        <div class="row">
            <div class="col-12" style="padding:20px;">
                <div class="card_box">
                    <div class="card-header">My Mukando Groups
                    <a href="{{ route('create.mukando')}}" ><button
                                                    class="btn btn-info btn-sm">
                                                    <i class="fa fa-plus" aria-hidden="true"></i> create mukando</button></a>
  <a href="{{ route('join.mukando')}}" ><button
                                                    class="btn btn-info btn-sm">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>Join mukando</button></a>
                          <a href="{{ route('loyalty.points')}}" ><button
                                                    class="btn btn-info btn-sm">
                                                    <i class="fa fa-money" aria-hidden="true"></i>View My Loyalty Points</button></a>
                    </div>
                  
                    <div class="card-body">
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table id="dtBasicExample" class="table table-striped table-hover table-bordered table-sm" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>name of mukando</th>
                                       
                                          <th>View More Details</th> 
                                </thead>
                                <tbody>
                                 
                                @foreach($groups as $group)
                               
                                    <tr>
                                        <td>{{ $group->mukando->name}}</td>  
                                        <td> 
                                        
                                            <a href="{{ route('mukando.view', [$group->id]) }}" ><button
                                                    class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

@stop