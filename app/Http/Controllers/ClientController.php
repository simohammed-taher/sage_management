<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // public function index()
    // {
    // // $clients = Client::all();
    // $clients = Client::paginate(10);

    // return view('clients.index', ['clients' => $clients]);
    // $clients = Client::orderBy('id', 'DESC')->paginate(5);

    // return view('clients.index', ['clients' => $clients]);

    public function index()
    {
        $clients = Client::paginate(6); // Adjust the number to the desired number of items per page
        return view('clients.index', compact('clients'));
    }

    // }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        Client::create($request->all());
        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $client->update($request->all());
        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}
