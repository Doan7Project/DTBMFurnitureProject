@extends('User.main.main')
@section('content')
@include('User.pages.account.js')
<style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  .account {
    background-color: rgba(248, 248, 248, 0.288);
    padding-top: 70px;
    padding-bottom: 100px;
  }

  .showButton {
    display: none;

  }
</style>
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
      <form method="post" action="">
        @csrf
        <h4 class="text-start text-muted fw-bolder g-0">Your detail account information</h4>
        <div class="row pt-3">
          <div class="col-sm-4">
            <label for="firstName" class="form-label text-muted fw-bolder">First name</label>
            <input type="text" class="form-control" name="firstname" id="firstName" placeholder=""
              value="{{ $accinfo->first_name }}">
              @error('firstname')
              <span class="text-danger">{{$message}}</span>
              @enderror
          </div>
          <div class="col-sm-8">
            <label for="lastName" class="form-label text-muted fw-bolder">Last name</label>
            <input type="text" class="form-control " name="lastname" id="lastName" placeholder=""
              value="{{ $accinfo->last_name }}">
              @error('lastname')
              <span class="text-danger">{{$message}}</span>
              @enderror
          </div>
        </div>
        <div class="row pt-3 pb-3">
          <div class="col-md-7">
            <label for="email" class="form-label text-muted fw-bolder">Email<span class="text-muted">(Account)</span></label>
            <input type="email" readonly class="form-control" name="email" id="email" value="{{ $accinfo->email }}"
              placeholder="you@example.com">

          </div>
          <div class="col-md-5">
            <label for="gender" class="form-label text-muted fw-bolder">Gender</label>
            <select name="gender" class="form-select" id="gender">
              @foreach ($gender as $genders)
              @if ($genders['id'] == $accinfo->gender)
              <option value="{{ $genders['id'] }}" selected>{{ $genders['gender'] }}</option>
              @else
              <option value="{{ $genders['id'] }}">{{ $genders['gender'] }}</option>
              @endif
              @endforeach
            </select>

          </div>
        </div>
        <div class="row pb-3">
          <div class="col-md-6">
            <label for="phone" class="form-label text-muted fw-bolder">Phone number <span class="text-muted">(Account)</span></label>
            <input type="phone" name="phone" class="form-control" id="phone" value="{{ $accinfo->phone }}"
              placeholder="Enter you phone number">
              @error('phone')
              <span class="text-danger">{{$message}}</span>
              @enderror
          </div>
          <div class="col-md-6">
            <label for="birthday" class="form-label text-muted fw-bolder">Birthday</label>
            <input type="date" max="01-01-2000" class="form-control" value="{{ $accinfo->birthday }}" name="birthday" id="birthday"
              placeholder="Enter you phone number">
              @error('birthday')
              <span class="text-danger">{{$message}}</span>
              @enderror
          </div>
        </div>
        <div class="row pb-3">
          <div class="col-md-6">
            <label for="country" class="form-label text-muted fw-bolder">Country</label>
            <select class="form-select" id="country" name="country">
              <option value="">Choose...</option>
              @foreach ( $country as $jsons)
              @if ($jsons['name'] == $accinfo->country)
              <option value="{{ $jsons['name'] }}" selected>{{ $jsons['name'] }}</option>
              @else
              <option value="{{ $jsons['name'] }}">{{ $jsons['name'] }}</option>
              @endif

              @endforeach

            </select>
            @error('country')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
          <div class="col-md-6 ">

            <label for="city" class="form-label text-muted fw-bolder">City</label>
            <select class="form-select" id="city" name="city">
              <option value="">Choose...</option>
              @foreach ( $city as $jsons)
              @if ($jsons['city'] == $accinfo->city)
              <option value="{{ $jsons['city'] }}" selected>{{ $jsons['city'] }}</option>
              @else
              <option value="{{ $jsons['city'] }}">{{ $jsons['city'] }}</option>
              @endif
              @endforeach

            </select>
            @error('city')
            <span class="text-danger">{{$message}}</span>
            @enderror
          </div>
        </div>
        <div class="row pb-3">
          <div class="col-md-12">
            <label for="address" class="form-label text-muted fw-bolder">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $accinfo->address }}"
              placeholder="1234 Main St">
              @error('address')
              <span class="text-danger">{{$message}}</span>
              @enderror
          </div>
        </div>

        <div class="row" id="functionShow">
          <div class="col-md-12 d-flex">
            <div class="me-3">
              {{-- <button class=" w-100 btn btn-primary px-4 " type="submit">Edit your account</button> --}}
              {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Change
              </button> --}}
              {{-- <a class="btn btn-primary text-white" id="myBtn">Change</a> --}}
              <button type="submit" onclick="return confirm('Are you sure to update data')" class="btn btn-primary">Change</button>
            </div>
            {{-- <div>
              <button class="w-100 btn btn-secondary px-4" type="submit">Exit</button>
            </div> --}}
    
          </div>
        </div>
    
      </form>

    </main>
  </div>

</div>

@endsection