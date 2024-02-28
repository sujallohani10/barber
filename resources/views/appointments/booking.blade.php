<!-- resources/views/appointments/booking.blade.php -->

{{--@extends('layouts.app')--}}

{{--@section('content')--}}
    <h1>Book Appointment</h1>

{{--    @if(count($availableTimeSlots) > 0)--}}
        <!-- Button to Trigger Bootstrap Modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bookingModal">
            Book Now
        </button>

        <!-- Bootstrap Modal for Booking Form -->
        <div class="modal" id="bookingModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Book Appointment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Booking Form -->
                            <form action="{{ route('appointments.bookAppointment') }}" method="post">
                            @csrf

                            <label for="customer_first_name">Customer First Name:</label>
                            <input type="text" name="customer_first_name" required>

                            <label for="customer_last_name">Customer Last Name:</label>
                            <input type="text" name="customer_last_name" required>

                            <label for="time_slot">Select Time Slot:</label>
                            <select name="time_slot" id="time_slot">
{{--                                @foreach($availableTimeSlots as $timeSlot)--}}
{{--                                    <option value="{{ $timeSlot }}">{{ $timeSlot }}</option>--}}
{{--                                @endforeach--}}
                            </select>

                            <label for="barber">Select Barber:</label>
                            <select name="barber" id="barber">
{{--                                @foreach($barbers as $barber)--}}
{{--                                    <option value="{{ $barber->id }}">{{ $barber->first_name }} {{ $barber->last_name }}</option>--}}
{{--                                @endforeach--}}
                            </select>

                            <label for="service">Select Service:</label>
                            <select name="service" id="service">
{{--                                @foreach($services as $service)--}}
{{--                                    <option value="{{ $service->id }}">{{ $service->name }}</option>--}}
{{--                                @endforeach--}}
                            </select>

                            <button type="submit" class="btn btn-primary">Book Appointment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

{{--    @else--}}
{{--        <p>No available time slots.</p>--}}
{{--    @endif--}}
{{--@endsection--}}
