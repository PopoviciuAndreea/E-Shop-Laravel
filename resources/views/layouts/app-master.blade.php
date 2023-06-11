@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Lista Sarcini</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
    </head>
    <body>

            <main class="container mt-5">
                @yield('content')
            </main> 

            <script src="{!! url('assets/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>
    </body>
</html>
                

