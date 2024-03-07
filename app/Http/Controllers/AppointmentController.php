<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
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
        $period = new CarbonPeriod('10:00', '30 minutes', '20:00');
        $slots = [];
        foreach($period as $item){
            array_push($slots,$item->format("h:i A"));
        }
        return view('frontend.index', compact('services','slots'));
    }

    public function bookAppointment(Request $request)
    {
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

        $customer = Customer::firstOrCreate([
            'mobile' => $request->mobile,
            'email' => $request->email,
            'first_name' => $request->customer_first_name,
            'last_name' => $request->customer_last_name,
            ]
        );
        $time = Carbon::createFromFormat('h:i A', $request->timeSlot)->format('H:i:s');
        $appointment = Appointment::create([
            'customer_id' => $customer->id,
            'branch' => 'Hurstville',
            'date' => $request->datepicker,
            'time' => $time
        ]);
        $appointment->serviceTypes()->attach($request->service);
        DB::commit();
        return redirect()->back()->with('success', 'Appointment booked successfully!');
    }
}
