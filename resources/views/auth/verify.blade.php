@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header text-center" style="background-color: #f8f9fa;">
                    <h3>{{ __('Подтвердите свою электронную почту') }}</h3>
                </div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Новая ссылка для подтверждения была отправлена на вашу электронную почту.') }}
                        </div>
                    @endif

                    <p>{{ __('Прежде чем продолжить, проверьте свою электронную почту на наличие ссылки для подтверждения.') }}</p>
                    <p>{{ __('Если вы не получили письмо,') }}</p>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Нажмите сюда, чтобы получить новое') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
