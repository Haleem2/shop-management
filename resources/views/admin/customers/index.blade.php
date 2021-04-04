@extends('layouts.admin-edit')

@section('page_header')
All Customers
@stop

@section('side_link')
<a href="">All Customers</a>
@stop
@section('content')

@include('includes.form_errors')

<div class="row">
  <a class="btn btn-primary" href="{{url('shops/'.$shop_id.'/customers/create')}}">Add Customer</a>
  @if(count($data)>0)
  <table class="table table-bordered table-striped" style="margin-top: 20px!important;">
    <thead>
      <tr>
        <th>#</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone</th>
        <th>Mail</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($data as $i=>$item)
      <tr>
        <td>{{++$i}}</td>
        <td>{{$item->first_name}}</td>
        <td>{{$item->last_name}}</td>
        <td>{{$item->phone}}</td>
        <td>{{$item->email}}</td>
        <td>
          <a href="{{url('shops/'.$item->shop->id.'/customers/'.$item->id.'/edit')}}" class="btn btn-sm btn-icon btn-outline-warning"><i class="fas fa-edit"></i></a>
          <form action="{{url('shops/'.$item->shop->id.'/customers/'.$item->id)}}" method="post" style="display: inline">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm btn-clean btn-icon"><i class="fas fa-trash-alt"></i></button>
          </form>
        </td>
      </tr>
      @endforeach


    </tbody>
  </table>
  @else
  <h3 class="alert alert-warning col-12" style="margin-top: 10px;">No Data Available</h3>
  @endif
</div>

<div class="row">
  <div class="mx-auto ">
    {{$data->render()}}

  </div>
</div>
@stop