<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'message',
        'status_id',
    ];
    protected $attributes = [
        'status_id' => 1, // Значение по умолчанию для статуса "Новый"
    ];
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
