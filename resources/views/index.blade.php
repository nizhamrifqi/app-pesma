<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Tiny Dashboard - A Bootstrap Dashboard Template</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('tinydash') }}/css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ asset('tinydash') }}/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('tinydash') }}/css/app-light.css" id="lightTheme" disabled>
    <link rel="stylesheet" href="{{ asset('tinydash') }}/css/app-dark.css" id="darkTheme">
  </head>
  <body class="dark ">
    <div class="wrapper vh-100">
      <div class="align-items-center h-100 d-flex w-50 mx-auto">
        <div class="mx-auto text-center">
          @auth
          
            <h2 class="mb-4 text-muted font-weight-bold">Welcome {{auth()->user()->username}}</h2>
            <a href="/dashboard" class="btn btn-lg btn-primary px-5 mr-3">Dashboard</a>

            <form action="/logout" method="post">
              @csrf
              <button type="submit"class="btn btn-lg btn-danger px-5"> Logout</button>
            </form>
          @else
            <h1 class="mb-3 text-muted font-weight-bold">Please Login First!</h1>
            <a href="/login" class="btn btn-lg btn-primary px-5">Log in</a>
          @endauth
        </div>
      </div>
    </div>
    <script src="{{ asset('tinydash') }}/js/jquery.min.js"></script>
    <script src="{{ asset('tinydash') }}/js/popper.min.js"></script>
    <script src="{{ asset('tinydash') }}/js/moment.min.js"></script>
    <script src="{{ asset('tinydash') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('tinydash') }}/js/simplebar.min.js"></script>
    <script src="{{ asset('tinydash') }}/js/daterangepicker.js"></script>
    <script src="{{ asset('tinydash') }}/js/jquery.stickOnScroll.js"></script>
    <script src="{{ asset('tinydash') }}/js/tinycolor-min.js"></script>
    <script src="{{ asset('tinydash') }}/js/config.js"></script>
    <script src="{{ asset('tinydash') }}/js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>
  </body>
</html>
</body>
</html>