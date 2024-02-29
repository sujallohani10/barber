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
    private function getAvailableTimeSlots()
    {
        // Implement your logic to get available time slots
    }


    public function showBookingForm()
    {
        $barbers = Barber::all();
        $services = Service::all();

        return view('appointments.booking', compact('barbers', 'services'));
    }

    public function bookAppointment(Request $request)
    {
        $request->validate([
            'customer_first_name' => 'required|string|max:255',
            'customer_last_name' => 'required|string|max:255',
            'mobile' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'datepicker' => 'required|date_format:Y-m-d',
            'selectService' => 'required|exists:services,id',
            'selectTimeSlot' => 'required', // Add validation for time slot as needed
            'barber' => 'required|exists:barbers,id',
        ]);

        $customer = Customer::create([
            'first_name' => $request->input('customer_first_name'),
            'last_name' => $request->input('customer_last_name'),
            'mobile' => $request->input('mobile'),
            'email' => $request->input('email'),
        ]);

        $appointment = new Appointment([
            'start_time' => $request->input('selectTimeSlot'), // Adjust this based on your time slot handling logic
            'end_time' => Carbon::parse($request->input('selectTimeSlot'))->addMinutes(30), // Assuming 30-minute duration
            'store_selection' => 'Rockdale', // You can adjust this based on your logic
        ]);

        $barber = Barber::find($request->input('barber'));
        $barber->appointments()->save($appointment);

        $service = Service::find($request->input('selectService'));
        $appointment->serviceTypes()->attach($service);

        return redirect()->route('appointments.showBookingForm')->with('success', 'Appointment booked successfully!');
    }
}
