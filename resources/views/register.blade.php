@include('commons.header')
<h1>Register</h1>
<form class="mt-3" action="{{route('registerUser')}}" method="post">
    @csrf
    <div class="mb-3">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control">
    </div>

    <div class="mb-3">
        <label for="password">Password</label>
        <input type="text" name="password" id="password" class="form-control">
    </div>
    <div class="mb-3">
        <label for="password_confirmation">Password Confirmation</label>
        <input type="text" name="password_confirmation" id="password_confirmation" class="form-control">
    </div>
    <button class="btn btn-primary" type="submit">Register</button>
</form>