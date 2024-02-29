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
                                        <h5 class="modal-title" id="bookingModalLabel">Book an Appointment</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Booking form -->
                                        <form action="{{ route('appointments.bookAppointment') }}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="selectService" class="form-label">Select Service</label>
                                                <!-- Add your service selection dropdown here -->
                                                <select class="form-select" id="selectService">
                                                    <!-- Options for services -->
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="selectService" class="form-label">Select Barber</label>
                                                <!-- Add your service selection dropdown here -->
                                                <select class="form-select" id="selectService">
                                                    <!-- Options for services -->
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="date" class="form-label">Select Date</label>
                                                <input type="text" class="form-control" id="date" name="datepicker" placeholder="Select a date">
                                            </div>
                                            <div class="mb-3">
                                                <label for="time" class="form-label">Select Time Slot</label>
                                                <!-- Add your time slot selection dropdown or scrollable list here -->
                                                <div id="calendar_slots" class="appointo-calendar-slots">
                                                    <!-- Time slots will be dynamically generated here -->
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="first_name" class="form-label">First Name</label>
                                                <input type="text" class="form-control" id="firstName" name="firstName" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="last_name" class="form-label">Last Name</label>
                                                <input type="text" class="form-control" id="lastName" name="lastName" required>
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
            // Initialize flatpickr on the datepicker input
            const datePicker = flatpickr("#date", {
                minDate: "today",
                maxDate: new Date().fp_incr(14), // 14 days from now
                dateFormat: "Y-m-d",
                onChange: function (selectedDates, dateStr, instance) {
                    // Handle date change event
                    generateTimeSlots(selectedDates[0]);
                },
            });

            // Function to generate time slots
            function generateTimeSlots(selectedDate) {
                const timeSlotsContainer = document.getElementById('calendar_slots');
                timeSlotsContainer.innerHTML = ''; // Clear existing slots

                // Define your time slot intervals
                const timeSlotIntervals = [
                    { start: '10:00 PM', end: '10:30 PM' },
                    { start: '10:30 PM', end: '11:00 PM' },
                    { start: '11:00 PM', end: '11:30 PM' },
                    { start: '12:00 PM', end: '12:30 PM' },
                    { start: '12:30 PM', end: '01:00 PM' },
                    { start: '01:00 PM', end: '01:30 PM' },
                    { start: '01:30 PM', end: '02:00 PM' },
                    { start: '02:00 PM', end: '02:30 PM' },
                    { start: '02:30 PM', end: '03:00 PM' },
                    // Add more time slots as needed
                ];

                // Iterate over time slot intervals and create elements
                timeSlotIntervals.forEach((interval, index) => {
                    const timeSlotDiv = document.createElement('div');
                    timeSlotDiv.className = 'appointo-time-div';
                    timeSlotDiv.id = 'appointo-time-div-' + index;

                    const slotContent = document.createElement('div');
                    slotContent.style.width = '100%';
                    slotContent.className = 'appointo-slot';
                    slotContent.id = 'appointo-slot-' + index;
                    slotContent.textContent = `${interval.start} - ${interval.end}`;

                    timeSlotDiv.appendChild(slotContent);
                    timeSlotsContainer.appendChild(timeSlotDiv);
                });
            }
        });
    </script>
@endsection
