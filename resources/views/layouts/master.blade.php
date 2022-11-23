<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{config('app.name', 'Laravel') }}</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
  <div class="container">
    {{--@dump($errors)  --}}
    @if(session()->has('error') )
    <div class="alert alert-danger">
      {{ session()->get('error') }}
    </div>
    @endif
      {{-- nombre de la vista --}}
    @yield('content')
  </div>
 

</body>
</html>