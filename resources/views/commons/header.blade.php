<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome!</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/jquery.min.js')}}"></script>
</head>

<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a href="" class="navbar-brand">Photo Albums</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{route('login')}}" class="nav-link">Index</a>
            </li>
            <li class="nav-item">
                <a href="{{route('register')}}" class="nav-link">Register</a>
            </li>
        </ul>
    </div>
</nav>

<body>
    <div class="container mt-5">