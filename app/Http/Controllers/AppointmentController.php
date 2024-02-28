<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Barber;
use App\Models\Customer;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AppointmentController extends Controller
{
    public function showBookingForm()
    {
      //  $availableTimeSlots = $this->getAvailableTimeSlots();
        $barbers = Barber::all();
        $services = Service::all();

        return view('appointments.booking', compact( 'barbers', 'services'));
    }

    public function bookAppointment(Request $request)
    {
        $request->validate([
            'customer_first_name' => 'required|string|max:255',
            'customer_last_name' => 'required|string|max:255',
            'time_slot' => 'required',
            'barber' => 'required|exists:barbers,id',
            'service' => 'required|exists:service_types,id',
        ]);

        dd($request);

        $customer = Customer::create([
            'first_name' => $request->input('customer_first_name'),
            'last_name' => $request->input('customer_last_name'),
            // Add other customer fields if needed
        ]);

        $appointment = new Appointment([
            'start_time' => $request->input('time_slot'),
            'end_time' => Carbon::parse($request->input('time_slot'))->addMinutes(30), // Assuming 30-minute duration
            'store_selection' => 'Rockdale', // You can adjust this based on your logic
        ]);

        $barber = Barber::find($request->input('barber'));
        $barber->appointments()->save($appointment);

        $service = Service::find($request->input('service'));
        $appointment->serviceTypes()->attach($service);

        return redirect()->route('appointments.showBookingForm')->with('success', 'Appointment booked successfully!');
    }

    private function getAvailableTimeSlots()
    {
        // Implement your logic to get available time slots
    }
}
