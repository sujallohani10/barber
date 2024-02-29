@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Booking') }}</div>

                    <div class="card-body">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bookingModal">
                            Book an Appointment Now
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="bookingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="bookingModalLabel">Appointment Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Booking form -->
                                        <form action="{{ route('appointments.bookAppointment') }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="selectService" class="form-label">Select Service</label>
                                                <select class="form-select" id="selectService" name="service">
                                                    <option value="1">Hair Cut - $30</option>
                                                    <option value="2">Shave - $20</option>
                                                    <option value="3">Haircut and Shave Combo - $45</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="selectBarber" class="form-label">Select Barber</label>
                                                <select class="form-select" id="selectBarber">
                                                    <option value="0">Any</option> <!-- Any option -->
                                                    <option value="1">Tom</option>
                                                    <option value="2">Matt</option>
                                                    <option value="3">Harry</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="date" id="date" class="form-label">Select Date</label>
                                                <input type="text" class="form-control" id="date" name="datepicker" placeholder="Select a date">
                                            </div>

                                            <div class="mb-3 d-none" id="timeslot">
                                                <label for="selectTimeSlot" id="selectTimeSlot" class="form-label">Select Time Slot</label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="list-group">
                                                            @foreach($slots as $index => $slot)
                                                                @if($index % 2 == 0)
                                                                    <button type="button" class="list-group-item list-group-item-action" data-time="{{ $slot }}">{{ $slot }}</button>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="list-group">
                                                            @foreach($slots as $index => $slot)
                                                                @if($index % 2 != 0)
                                                                    <button type="button" class="list-group-item list-group-item-action" data-time="{{ $slot }}">{{ $slot }}</button>
                                                                @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="timeSlot" id="selectedTimeSlot">
                                            </div>

                                            <div class="mb-3">
                                                <label for="firstName" class="form-label">First Name</label>
                                                <input type="text" class="form-control" id="firstName" name="customer_first_name" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="lastName" class="form-label">Last Name</label>
                                                <input type="text" class="form-control" id="lastName" name="customer_last_name" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="mobile" class="form-label">Mobile</label>
                                                <input type="number" class="form-control" id="mobile" name="mobile" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="email" class="form-label">E-mail</label>
                                                <input type="email" class="form-control" id="email" name="email" required>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Book Appointment</button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const datePicker = flatpickr("#date", {
                minDate: "today",
                maxDate: new Date().fp_incr(14),
                dateFormat: "Y-m-d",
                onChange: function (selectedDates, dateStr, instance) {
                    const timeSlotContainer = document.getElementById('timeslot');
                    console.log(timeSlotContainer,'timeslot');
                    if (selectedDates.length > 0) {
                        timeSlotContainer.classList.remove('d-none');
                    }
                },
            });

            const timeSlotButtons = document.querySelectorAll('.list-group-item');
            timeSlotButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    timeSlotButtons.forEach(function(btn) {
                        btn.classList.remove('active');
                    });
                    this.classList.add('active');
                    document.getElementById('selectedTimeSlot').value = this.getAttribute('data-time');
                });
            });
        });
    </script>
@endsection
