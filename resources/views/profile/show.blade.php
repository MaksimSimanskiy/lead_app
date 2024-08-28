@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
    <div class="card shadow-lg ">
        <div class="card-body">
            <h1 class="text-center mb-4">Профиль пользователя</h1>

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Форма обновления профиля -->
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PATCH')

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Имя</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">Обновить профиль</button>
                    </div>
                </div>
            </form>

            <!-- Форма обновления пароля -->
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('PATCH')

                <div class="row mb-3">
                    <label for="current_password" class="col-md-4 col-form-label text-md-end">Текущий пароль</label>
                    <div class="col-md-6">
                        <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required>
                        @error('current_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password" class="col-md-4 col-form-label text-md-end">Новый пароль</label>
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password_confirmation" class="col-md-4 col-form-label text-md-end">Подтверждение пароля</label>
                    <div class="col-md-6">
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">Обновить пароль</button>
                    </div>
                </div>
            </form>

            <!-- Кнопка для верификации почты -->
            @if (!$user->hasVerifiedEmail())
                <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <div class="row mb-3 mt-4">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-warning">Подтвердить Email</button>
                        </div>
                    </div>
                </form>
            @endif

            <!-- Кнопка для выхода из профиля -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <div class="row mb-0 mt-5 justify-content-right">
                    <div class="">
                        <button type="submit" class="btn btn-danger">Выйти</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
