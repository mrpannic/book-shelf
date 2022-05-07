<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Book Shelf</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" >
    </head>
    <body style="background: #111827">
      <div id="app"></div>
      <script src="{{ asset('/js/app.js') }}"></script>
    </body>
</html>
