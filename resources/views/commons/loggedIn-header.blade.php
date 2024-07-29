<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome {{$user->username}}</title>
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}">
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/js/jquery.min.js')}}"></script>
</head>

<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a href="" class="navbar-brand">Photo Albums</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{route('gallery')}}" class="nav-link">Gallery</a>
            </li>
            <li class="nav-item">
                <a href="{{route('album')}}" class="nav-link">Albums</a>
            </li>
            <li class="nav-item">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="nav-link">Logout</button>
                </form>
            </li>
        </ul>
        <p style="margin: 0;">{{$user->username}}</p>
    </div>
</nav>

<body class="">
    <div class="container mt-5">