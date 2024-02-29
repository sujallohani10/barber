<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Barber;
use App\Models\Customer;
use App\Models\Service;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    public function showBookingForm()
    {
        $barbers = Barber::all();
        $services = Service::all();
        $period = new CarbonPeriod('10:00', '30 minutes', '20:00'); // for create use 24 hours format later change format
        $slots = [];
        foreach($period as $item){
            array_push($slots,$item->format("h:i A"));
        }
        return view('frontend.index', compact('barbers', 'services','slots'));
    }

    public function bookAppointment(Request $request)
    {
        //dd($request);

        // TODO:: validation is not working so commented for now
//        $valid = $request->validate([
//            'customer_first_name' => 'required|string|max:255',
//            'customer_last_name' => 'required|string|max:255',
//            'mobile' => 'required|string|max:255',
//            'email' => 'required|email|max:255',
//            'datepicker' => 'required|date_format:Y-m-d',
//            'service' => 'required|exists:services,id',
////            'timeSlot' => 'required', // Add validation for time slot as needed
////            'barber' => 'required|exists:barbers,id',
//        ]);

        DB::beginTransaction();

        $customer = Customer::create([
            'first_name' => $request->input('customer_first_name'),
            'last_name' => $request->input('customer_last_name'),
            'mobile' => $request->input('mobile'),
            'email' => $request->input('email'),
        ]);

        $appointment = $customer->appointments()->create([
            'date' => $request->input('datepicker'), // Adjust this based on your time slot handling logic
            'time' => Carbon::now()->format('H:i'), //TODO:: currently we are saving current time, we need to change this based on ui selection value
            'branch' => 'Rockdale', //TODO:: this will be dynamic from the db
            'barber_id' => $request->barber, //TODO:: We will get the barber id dynamically once we seed the Barber into db
        ]);

        DB::commit();

        //$barber = Barber::find($request->input('barber'));
        //$barber->appointments()->save($appointment);

        //$service = Service::find($request->input('selectService'));
        //$appointment->serviceTypes()->attach($service);

        return redirect()->route('index')->with('success', 'Appointment Booked successfully!');
    }
}
