@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow-lg p-4" style="width: 100%; max-width: 500px;">
        <h1 class="text-center mb-4">Оставьте заявку</h1>
        <form action="{{ route('leads.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="first_name">Имя</label>
                <input type="text" name="first_name" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="last_name">Фамилия</label>
                <input type="text" name="last_name" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="phone">Номер телефона</label>
                <input type="text" name="phone" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group mb-4">
                <label for="message">Текст обращения</label>
                <textarea name="message" class="form-control" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary w-100">Отправить</button>
        </form>
    </div>
</div>
@endsection
