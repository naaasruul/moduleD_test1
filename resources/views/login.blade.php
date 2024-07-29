@include('commons.header')
<h1>Login</h1>
<form class="mt-3" action="{{route('loginUser')}}" method="post">
    @csrf
    <div class="mb-3">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control">
    </div>
    <div class="mb-3">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>
    <button class="btn btn-primary" type="submit">Login</button>
</form>
