@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg p-3 mb-5 bg-white rounded">
                <div class="card-header text-center" style="background-color: #f8f9fa;">
                    <h2>{{ __('Лиды') }} </h2>
                </div>

                <div class="card-body">
                    <p><strong>{{ __('Общее количество лидов') }}:</strong> {{ $leads->count() }}</p>

                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('ID') }}</th>
                                <th>{{ __('Имя') }}</th>
                                <th>{{ __('Фамилия') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Номер телефона') }}</th>
                                <th>{{ __('Дата создания') }}</th>
                                <th>{{ __('Статус') }}</th>
                                <th>{{ __('Действия') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leads as $lead)
                            <tr>
                                <td>{{ $lead->id }}</td>
                                <td>{{ $lead->first_name }}</td>
                                <td>{{ $lead->last_name }}</td>
                                <td>{{ $lead->email }}</td>
                                <td>{{ $lead->phone }}</td>
                                <td>{{ $lead->created_at->format('d.m.Y H:i') }}</td>
                                <td>
                                    <form action="{{ route('leads.update', $lead->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select name="status_id" class="form-select" onchange="this.form.submit()">
                                            @foreach($statuses as $status)
                                            <option value="{{ $status->id }}" {{ $lead->status_id == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </td>
                                <td>
                                    <a href="{{ route('leads.edit', $lead->id) }}" class="btn btn-primary btn-sm">{{ __('Редактировать') }}</a>
                                    <form action="{{ route('leads.destroy', $lead->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">{{ __('Удалить') }}</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
