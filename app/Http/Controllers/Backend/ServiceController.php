<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ServiceController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {

        $services = Service::all();

        return view('backend.services.index')
            ->with('services', $services);
    }

    public function create(Request $request)
    {
        return view('backend.services.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|integer',
        ]);

        // Store the services
        Service::create([
            'name' => $request['name'],
            'price' => $request['price'],
            'description' => $request['description'],
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully!');
    }

    public function edit(Service $service, Request $request)
    {

    }

    public function update(Service $service, Request $request)
    {

    }
}
