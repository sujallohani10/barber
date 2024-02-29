<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'barber_id', 'branch', 'date', 'time'];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function barber()
    {
        return $this->belongsTo(Barber::class, 'barber_id');
    }

    public function serviceTypes()
    {
        return $this->belongsToMany(Service::class, 'appointment_service');
    }

    public function getStartTimeAttribute($value): Carbon
    {
        return Carbon::parse($value);
    }

    public function getEndTimeAttribute($value): Carbon
    {
        return Carbon::parse($value);
    }

    public function setStartTimeAttribute($value)
    {
        $this->attributes['start_time'] = Carbon::parse($value);
    }

    public function setEndTimeAttribute($value)
    {
        $this->attributes['end_time'] = Carbon::parse($value);
    }
}
