@extends('layouts.main')

@section('content')
    <form>
        <div class="form-group">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" id="inputPassword" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="secondInputPassword">Password again</label>
            <input type="password" class="form-control" id="secondInputPassword" placeholder="Password again">
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
@endsection
