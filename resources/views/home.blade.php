@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
        <div class="card shadow-lg p-4"">
                <div class="card-header">{{ __('Спасибо за регистрацию!') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Вы авторизованы') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
