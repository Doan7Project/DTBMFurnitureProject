@extends('User.main.main')
@section('content')

<!-- feature -->
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  .account {
    background-color: rgba(248, 248, 248, 0.288);
    padding-top: 40px;
    padding-bottom: 100px;
  }

  .showButton {
    display: none;

  }

  .border {
    border: 1px greenyellow solid;
  }

  .showandHide{
    display: none;
  }

</style>
{{-- // file json thành phố và tỉnh thành --}}
@php
$path = storage_path() . "/json/city.json";
$city = json_decode(file_get_contents($path), true);
$path = storage_path() . "/json/country.json";
$country = json_decode(file_get_contents($path), true);
$path = storage_path() . "/json/gender.json";
$gender = json_decode(file_get_contents($path), true);
@endphp

<div class="account">
  @if (Session::has('success'))
  <div class="alert alert-success">
    {{Session::get('success')}}
  </div>
  @endif
  <div class="row container  m-auto">
    <div class="col-md-6 align-items-center">
      <img class="w-100" src="{{ asset('images/account.png') }}" alt="">
    </div>
    <main class="col-md-6">
      <form method="post" action="" >
        @csrf
        <h4 class="text-start g-0">Making your account</h4>
        <div class="row pt-3">
          <div class="col-sm-5">
            <label for="firstName" class="form-label">First name</label>
            <input type="text" class="form-control shadow-none" name="firstname" id="firstName" placeholder=""
              value="{{ old('firstname') }}">
            @error('firstname')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="col-sm-7">
            <label for="lastName" class="form-label">Last name</label>
            <input type="text" class="form-control shadow-none" name="lastname" id="lastName" placeholder=""
              value="{{ old('lastname') }}">
            @error('lastname')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
        </div>
        <div class="row pt-3 pb-3">
          <div class="col-md-7">
            <label for="email" class="form-label">Email <span class="text-muted">(Account)</span></label>
            <input type="text" autocomplete="off" class="form-control shadow-none" name="email" id="email" value="{{ old('email') }}"
              placeholder="you@example.com">
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="col-md-5">
            <label for="gender" class="form-label">Gender</label>
            <select name="gender" class="form-select shadow-none" id="gender">
              <option value="">Choose...</option>
              @foreach ($gender as $genders )
              <option value="{{ $genders['id'] }}" {{ old('gender')==$genders['id'] ? 'selected' : '' }}>{{
                $genders['gender'] }}</option>
              @endforeach
            </select>
            @error('gender')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
        </div>
        <div class="row pb-3">
          <div class="col-md-6">
            <label for="phone" class="form-label">Phone number <span class="text-muted">(Account)</span></label>
            <input type="phone" name="phone" class="form-control shadow-none" id="phone" value="{{ old('phone') }}"
              placeholder="Enter you phone number">
            @error('phone')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="birthday" class="form-label">Birthday</label>
            <input type="date" class="form-control shadow-none" value="{{ old('birthday') }}" name="birthday"
              id="birthday">
            @error('birthday')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
        </div>
        <div class="row pb-3">
          <div class="col-md-6">
            <label for="password" class="form-label">Password<span class="text-danger text-muted">(*)</span></label>
            <input class="form-control shadow-none" id="password" type="password" name="txtpassword" value="{{ old('txtpassword') }}" placeholder="Enter your password"> 
            @error('txtpassword')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="col-md-6">
            <label for="confirmpassword" class="form-label">Confirm Password<span class="text-muted">(*)</span></label>
            <input type="password" name="confirmpassword" class="form-control shadow-none" id="confirmpassword"
              value="{{ old('confirmpassword') }}" placeholder="Enter your confirm password">
            @error('confirmpassword')
            <span id="confirmtext" class="text-danger">{{$message}}</span>
            @enderror
            <span id="successpass" class="showandHide text-success"><i class="bi bi-check-circle-fill pe-2"></i>Password is
              march!</span>
            <span id="failpass" class="showandHide text-danger"><i class="bi bi-exclamation-triangle-fill pe-2"></i>Password
              is not march!</span>
          </div>
        </div>
        <div class="row pb-3">
          <div class="col-md-6">
            <label for="country" class="form-label">Country</label>
            <select class="form-select shadow-none" id="country" name="country">
              <option value="">Choose...</option>
              @foreach ($country as $countries )
              <option value="{{ $countries['name'] }}" {{ old('country')==$countries['name'] ? 'selected' :'' }}>{{
                $countries['name'] }}</option>
              @endforeach

            </select>
            @error('country')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="col-md-6 ">

            <label for="city" class="form-label">City</label>
            <select class="form-select shadow-none" id="city" name="city">
              <option value="">Choose...</option>
              @foreach ($city as $cities )
              <option value="{{ $cities['city'] }}" {{ old('city')==$cities['city'] ? 'selected' :'' }}>{{
                $cities['city'] }}</option>
              @endforeach

            </select>
            @error('city')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
        </div>
        <div class="row pb-3">
          <div class="col-md-12">
            <label for="address" class="form-label shadow-none">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}"
              placeholder="1234 Main St">
            @error('address')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
        </div>
        <div class="row" id="functionShow">
          <div class="col-md-12 d-flex">
            <div class="me-3">
              <button type="submit" class="btn btn-primary text-white">Register</button>
            </div>
          </div>
        </div>
      </form>
    </main>
  </div>

</div>
@include('User.pages.register.js')
@endsection