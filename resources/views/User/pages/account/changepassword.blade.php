@extends('User.main.main')
@section('content')
@include('User.pages.account.js')
<style>
    .card {
        width: 400px;
       

    }
    .showHide{
        display: none;
    }
    form{
        background-color:rgb(248, 248, 248);
        padding: 100px;
        display: flex;
        justify-content: center;
    }
</style>


<form action="" method="post">

    @csrf
    <div class="px-4 pb-4 card bg-gradient card body-card">
        
        <div class="text-center pt-5">
          
            <label for="" class="fw-bolder fs-5"><i class="bi bi-gear-wide-connected pe-2"></i>Password Changing</label>
        </div>
        <div class="pt-3">

            <input type="hidden" value="{{ $getdata->password }}" class="form-control" name="oldpasswordHide"
                id="oldpasswordHide" placeholder="Enter old password">

        </div>
        <div class="pt-3">
            <label for="oldpassword" class="form-label">Old password</label>
            <input type="password" value="{{old('oldpassword')}}" class="form-control" name="oldpassword"
                id="oldpassword" placeholder="Enter old password">

        </div>
        <div class="pt-3">
            <label for="newpassword" class="form-label">New password</label>
            <input type="password" class="form-control" name="newpassword" value="{{old('newpassword')}}"
                id="newpassword" placeholder="Enter new password">
        </div>

        <div class="pt-3">
            <label for="confirmedpassword" class="form-label">Confirmed password</label>
            <input type="password" class="form-control" value="{{old('confirmedpassword')}}" name="confirmedpassword"
                id="confirmedpassword" placeholder="Enter confirmed password">
                <span class="showHide text-success" id="match">The password is matching</span>
                <span class="showHide text-danger" id="notmatch" >The password is not matching</span>
        </div>
        <div class="pt-3">
            <button type="submit" onclick="return confirm('Are you sure to Change your password')" class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample"
                role="button" aria-expanded="false" aria-controls="collapseExample">
                Change
            </button>
        </div>
        <div class="mt-3">
            <span class="text-danger">
                <span class="text-secondary fw-bolder">Press change</span> for adjusting your password information
            </span>
        </div>
        @include('User.pages.account.alert')
    </div>
</form>
@endsection