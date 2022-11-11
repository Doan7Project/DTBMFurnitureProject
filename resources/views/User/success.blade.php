<html>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
  </head>
    <style>
      body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        h4 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 30px;
          margin-bottom: 10px;
        }
        a {
          color: #14497d;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:18px;
          margin: 0;
          text-decoration: none;
        }
        a:hover {
          color: #1069c2;
          
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
    </style>
    <body>
      <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h4>{{ session('success') }}</h4> 
        <a class="fs-2" href="{{ route('logout') }}">Going to Home page</a>
      </div>
    </body>
</html>