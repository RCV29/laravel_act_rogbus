<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'PennyWise')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    @include('include.header')
    <div class="mb-3">
      <label for="login" class="form-label"><a href="{{route('login')}}">login</a></label>
    </div>
    <div class="mb-3">
      <label for="registration" class="form-label"><a href="{{route('registration')}}">Register</a></label>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" ></script>
  </body>
</html>