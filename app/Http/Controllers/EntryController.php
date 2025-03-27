<?php

namespace App\Http\Controllers;

use App\Models\ChartOfAccount;
use App\Models\Entry;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    public function index()
    {
        $entries = Entry::all();
        return view('entries.index', compact('entries'));
    }

    public function create()
    {
        $accounts = ChartOfAccount::all(); // Fetch all accounts
        return view('entries.create', compact('accounts')); // Pass accounts to the view
    }

    public function store(Request $request)
    {
        foreach ($request->input('entries') as $entryData) {
            $entryData['chart_of_account_id'] = $request->input('parent_id'); // Save parent_id to chart_of_account_id
            Entry::create(array_merge($entryData, [
                'date' => $request->input('date'),
                'entry_number' => $request->input('entry_number'),
                'account_name' => $entryData['account_name'],
                'account_name2' => $entryData['account_name2'] ?? '', // Use empty string if account_name2 is not set
                'account_number2' => $entryData['account_number2'] ?? '', // Use null if account_number2 is not set
                'cost_center2' => $entryData['cost_center2'] ?? '', // Use null if cost_center2 is not set
                'reference2' => $entryData['reference2'] ?? '', // Use null if reference2 is not set
                'totel' => $request->input('totel') // Include the totem field
            ]));
        }
        return redirect()->route('entries.index')->with('success', 'Entry created successfully.');
    }

    public function edit($id)
    {
        $entry = Entry::findOrFail($id);
        return view('entries.edit', compact('entry'));
    }

    public function update(Request $request, $id)
    {
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
