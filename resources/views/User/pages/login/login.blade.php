@extends('User.main.main')
@section('content')

<!-- feature -->
<style>
    .loginPage {
        /* background-image: url(/images/login.png); */
        background-color: #f8f8f8;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
        height: 100vh;
        padding-top: 5rem;
    }

    .loginPage .card {
        background-color: transparent;
        border: none;
        width: 24rem;
        margin: auto;
    }

    .loginPage .content-pass {
        font-size: 12px;
        color: rgb(43, 43, 43);
    }

    .loginPage .content-pass:hover {
        color: white;
        transition: 0.4s ease-in-out;
    }

    .form-control {
        height: 40px;
        background-color: rgba(255, 255, 255, 0.966);
        border: 1px solid rgb(155, 159, 160);
        color: rgb(61, 61, 61);
        cursor: pointer;
    }

    .form-control:hover {
        background-color: rgba(255, 255, 255, 0.664);
        border: 1px solid rgb(155, 159, 160);
        color: rgb(61, 61, 61);
        box-shadow: 2px 1px 5px 1px rgb(161, 163, 163);
        transition: 0.4s ease-in-out;
    }

    .form-control:focus {
        background-color: rgba(255, 255, 255, 0.664);
        border: 1px solid rgb(155, 159, 160);
        color: rgb(61, 61, 61);
        box-shadow: 2px 1px 5px 1px rgb(161, 163, 163);
        transition: 0.4s ease-in-out;
    }

    .form-control:active {
        background-color: rgba(255, 255, 255, 0.664);
        border: 1px solid rgb(155, 159, 160);
        color: rgb(61, 61, 61);
        box-shadow: 2px 1px 5px 1px rgb(161, 163, 163);
        transition: 0.4s ease-in-out;
    }

    .form-control::placeholder {

        opacity: .5;
        color: rgb(54, 54, 54);
    }

    label {
        color: rgb(54, 54, 54);
    }

    .logoName {
        position: absolute;
        top: 20%;
        left: 10%;
        width: 250px;
    }

    .textDtbm {
        text-align: left;

        color: rgb(170, 170, 170);
        font-family: cursive;
        font-weight: bolder;
        font-size: 50px;
        text-shadow: 2px 2px #9b9b9b;
    }

    .p {
        color: white;
        font-family: cursive;
        text-align: right;
        font-size: 30px;
    }

    /*# sourceMappingURL=Login.css.map */
</style>
<div class="loginPage bg-gradient">
    <div class="card rounded-3 p-2">
        <form class="card-body" action="{{ route('signin') }}" method="post">
            <div class="row-cols-1 py-0 text-center">
                <i class="bi bi-person-bounding-box fs-1 text-black-50"></i>
            </div>
            <div class="row-cols-1 py-3 text-center">
                <label class="fw-bolder text-secondary fs-4" for="">Please Sign In</label>
            </div>
            <div class="row-cols-1">
                <label class="fs-6" for="username">Username</label>
                <input id="username" autocomplete="off" type="email" value="{{old('email')}}" name="email"
                    class="form-control w-100" placeholder="Enter username">
            </div>
            <div class="row-cols-1 py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <label class="fs-6" for="password">Password</label>
                    <a href="../ForgetForm/FLogin.html" class="content-pass fst-italic text-decoration-none "
                        role="button">Forgot
                        password?</a>
                </div>
                <input id="password" type="password" name="password" value="{{old('password')}}"
                    class="form-control w-100" placeholder="Enter password">
            </div>
            <div class="row-cols-1 py">
                <div class="form-check">
                    <input class="form-check-input" name="remember" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Remember
                    </label>
                </div>
            </div>
            @include('User.pages.login.alert')
            <div class="row-cols-1 pb-4 pt-3">
                <input type="submit" class="btn btn-secondary fw-bold" value="Sign In">
            </div>
            <div>
                <a href="{{url('/register')}}">Register</a>
            </div>
            @csrf
        </form>

    </div>

    @endsection