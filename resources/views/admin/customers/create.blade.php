@extends('layouts.admin-edit')

@section('page_header')
Add Customer
@stop

@section('side_link')
<a href="">Add Customer</a>
@stop
@section('content')

<div class="row">
  <div class="col-sm-3"></div>
  <div class="col-sm-6 col-sm-offset-3 align-items-sm-center">
    @include('includes.form_errors')
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Add Customer</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form role="form" method="post" action="{{url('shops/'.$shop_id.'/customers')}}">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputEmail1">First Name</label>
            <input type="text" name="first_name" value="{{old('first_name')}}" class="form-control @error('first_name') is-invalid @enderror" required placeholder="first name">
            @error('first_name')
            <span class="invalid-feedback row" role="alert" style="display: inherit !important;">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Last Name</label>
            <input type="text" name="last_name" value="{{old('last_name')}}" class="form-control @error('last_name') is-invalid @enderror" required placeholder="last name">
            @error('last_name')
            <span class="invalid-feedback row" role="alert" style="display: inherit !important;">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror"  placeholder="email">
            @error('email')
            <span class="invalid-feedback row" role="alert" style="display: inherit !important;">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Phone</label>
            <input type="text" name="phone" value="{{old('phone')}}" class="form-control @error('phone') is-invalid @enderror"  placeholder="phones">
            @error('phone')
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