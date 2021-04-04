@extends('layouts.admin-edit')

@section('page_header')
Edit Shop
@stop

@section('side_link')
<a href="">Edit Shop</a>
@stop
@section('content')

<div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6 col-sm-offset-3 align-items-sm-center">
    @include('includes.form_errors')
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Edit Shop</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form role="form" method="post" action="{{route('shops.update',$shop->id)}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="name">Shop Name</label>
            <input type="text" name="name" value="{{$shop->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="Shop Name" required>
            @error('name')
            <span class="invalid-feedback row" role="alert" style="display: inherit !important;">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="email">email</label>
            <input type="email" name="email" value="{{$shop->email}}" class="form-control @error('email') is-invalid @enderror" placeholder="email">
            @error('email')
            <span class="invalid-feedback row" role="alert" style="display: inherit !important;">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="website">Website</label>
            <input type="url" name="website" value="{{$shop->website}}" class="form-control @error('website') is-invalid @enderror" placeholder="Shop Website">
            @error('website')
            <span class="invalid-feedback row" role="alert" style="display: inherit !important;">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="logo">logo</label>
            <input type="file" name="logo" value="{{$shop->logo}}" class="form-control @error('logo') is-invalid @enderror" >
            @error('logo')
            <span class="invalid-feedback row" role="alert" style="display: inherit !important;">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>

  </div>
</div>

@stop