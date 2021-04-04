@extends('layouts.admin-edit')

@section('page_header')
All Shops
@stop

@section('side_link')
<a href="">All Shops</a>
@stop
@section('content')

@include('includes.form_errors')

<div class="row">
  <a class="btn btn-primary" href="{{route('shops.create')}}">Create Shop</a>
  @if(count($data)>0)
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>logo</th>
        <th>Name</th>
        <th>Mail</th>
        <th>Website</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($data as $i=>$item)
      <tr>
        <td>{{++$i}}</td>
        <td><img height="50" width="150" src="{{$item->logo}}" alt=""></td>
        <td>{{$item->name}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->website}}</td>
        <td>
          <a href="{{route('shops.show',$item->id)}}" class="btn btn-sm btn-outline-success">customers</a>
          <a href="{{route('shops.edit',$item->id)}}" class="btn btn-sm btn-icon btn-outline-warning"><i class="fas fa-edit"></i></a>
          <form action="{{url('shops/'.$item->id)}}" method="post" style="display: inline">
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
  <div class="mx-auto">
    {{ $data->links() }}
  </div>
</div>
@stop