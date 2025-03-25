<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EntryController extends Controller
{
    public function index()
    {
        $entries = Entry::all();
        return view('entries.index', compact('entries'));
    }

    public function create()
    {
        $creditTotal = 0.00; // Initialize creditTotal
        $debitTotal = 0.00; // Initialize creditTotal
        $total=$creditTotal-$debitTotal;
        return view('entries.create', compact(['creditTotal','debitTotal','total']));
    }

    public function store(Request $request)
    {
        Log::info($request->all()); // Log the incoming request data

        $request->validate([
            'date' => 'required|date',
            'entry_number' => 'required|string',
            'account_name' => 'required|string',
            'account_number' => 'required|string',
            'cost_center' => 'required|string',
            'reference' => 'required|string',
            'debit' => 'required|numeric',
            'credit' => 'required|numeric',
            'totel' => 'required|numeric',
        ]);

        Entry::create($request->all());
        return redirect()->route('entries.index')->with('success', 'Entry created successfully.');
    }

    public function edit($id)
    {
        $entry = Entry::findOrFail($id);
        return view('entries.edit', compact('entry'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'entry_number' => 'required|string',
            'account_name' => 'required|string',
            'account_number' => 'required|string',
            'cost_center' => 'required|string',
            'reference' => 'required|string',
            'debit' => 'required|numeric',
            'credit' => 'required|numeric',
        ]);

        $entry = Entry::findOrFail($id);
        $entry->update($request->all());
        return redirect()->route('entries.index')->with('success', 'Entry updated successfully.');
    }

    public function destroy($id)
    {
        $entry = Entry::findOrFail($id);
        $entry->delete();
        return redirect()->route('entries.index')->with('success', 'Entry deleted successfully.');
    }
}