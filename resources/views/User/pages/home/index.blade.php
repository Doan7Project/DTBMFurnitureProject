@extends('User.main.main')
@section('content')

<div>
    @include('User.pages.home.slide')
</div>
<!-- feature -->
<div>
    @include('User.pages.home.feature')
</div>
<script>
    const myCarouselElement = document.querySelector('#myCarousel')
    const carousel = new bootstrap.Carousel(myCarouselElement, {
        interval: 2500,
        wrap: false
    })
</script>
@endsection