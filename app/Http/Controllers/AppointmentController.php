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
        $services = Service::all();
        $period = new CarbonPeriod('10:00', '30 minutes', '20:00'); // for create use 24 hours format later change format
        $slots = [];
        foreach($period as $item){
            array_push($slots,$item->format("h:i A"));
        }
        return view('frontend.index', compact('services','slots'));
    }

    public function bookAppointment(Request $request)
    {
     //   dd($request->input());

        $request->validate([
            'service' => 'required|exists:services,id',
            'datepicker' => 'required|date',
            'timeSlot' => 'required',
            'customer_first_name' => 'required',
            'customer_last_name' => 'required',
            'mobile' => 'required|numeric',
            'email' => 'required|email',
        ]);

        DB::beginTransaction();

        $customer = Customer::firstOrCreate(
            ['mobile' => $request->mobile, 'email' => $request->email],
            [
                'first_name' => $request->customer_first_name,
                'last_name' => $request->customer_last_name,
            ]
        );
        $time = Carbon::createFromFormat('h:i A', $request->timeSlot)->format('H:i:s');

        // Create an appointment
        $appointment = Appointment::create([
            'customer_id' => $customer->id,
            'branch' => 'Hurstville',
            'date' => $request->datepicker,
            'time' => $time
        ]);

        // Attach the selected service types to the appointment
        $appointment->serviceTypes()->attach($request->service);

        DB::commit();
        // You may want to send a confirmation email or perform other actions here


        return redirect()->back()->with('success', 'Appointment booked successfully!');

    }
}
