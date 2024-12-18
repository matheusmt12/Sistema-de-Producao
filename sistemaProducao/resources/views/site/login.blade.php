@extends('site.layout.app')

@section('title', 'Login')

@section('nav')
<div style="margin-left: auto; margin-right: auto; width: 50%;">

    <div class="card">
        <div class="card-header">
            <h2>Login</h2>
        </div>
        <div class="card-body">
            @if($error == '1')
            <div style="color: red; text-align: center;">Senha ou Email invlálido</div>
            @endif
            <form action="{{route('login.acesso')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="" class="form-label">Email</label>
                    <input type="email" name="email" value="{{old('email')}}" class="form-control">
                    @error('email')
                    <div style="color: red;">{{$message}}</div>
                    @enderror

                </div>
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                    @error('password')
                    <div style="color: red;">$message</div>
                    @enderror
                </div>
                @if($error == '2')
                <div>É necessario realizar o login para ter acesso a essa página </div>
                @endif
                <button type="submit" class="btn btn-primary">Entrar</button>
            </form>
        </div>
    </div>
</div>
@endsection