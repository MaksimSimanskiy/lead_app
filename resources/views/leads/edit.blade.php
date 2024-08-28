@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header text-center" style="background-color: #f8f9fa;">
                    <h3>{{ __('Редактировать Лид') }}</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('leads.update', $lead->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="first_name" class="form-label">{{ __('Имя') }}</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $lead->first_name }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="last_name" class="form-label">{{ __('Фамилия') }}</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $lead->last_name }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone" class="form-label">{{ __('Номер телефона') }}</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ $lead->phone }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $lead->email }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="message" class="form-label">{{ __('Текст обращения') }}</label>
                            <textarea name="message" id="message" class="form-control" rows="4" required>{{ $lead->message }}</textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">{{ __('Сохранить') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
