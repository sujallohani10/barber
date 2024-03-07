<div class="modal fade" id="bookingModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel">Appointment Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('appointments.bookAppointment') }}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="selectService" class="form-label" >Select Service</label>
                            <select class="form-select" id="selectService" name="service">
                                @foreach($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }} - ${{ $service->price }}</option>
                                 @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="datePicker" class="form-label">Select a Date</label>
                            <input type="text" class="form-control" id="date" name="datepicker" required aria-placeholder="Select your date">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md d-none" id="timeslot">
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
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="customer_first_name" required>
                        </div>

                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="customer_last_name" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="mobile" class="form-label">Mobile</label>
                            <input type="number" class="form-control" id="mobile" name="mobile" required>
                        </div>

                        <div class="col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
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


