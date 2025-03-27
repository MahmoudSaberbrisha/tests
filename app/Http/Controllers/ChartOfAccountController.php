<?php

namespace App\Http\Controllers;

use App\Models\ChartOfAccount;
use Illuminate\Http\Request;

class ChartOfAccountController extends Controller
{
    public function index()
    {
         $accounts = ChartOfAccount::all();
        return view('accounts.index', compact('accounts'));

    }
    public function show()
    {
   $accounts = ChartOfAccount::with('children')->get();
        return view('accounts.chart', compact('accounts'));}

    public function create()
    {
        return view('accounts.create');
    }

    public function store(Request $request)
    {
        ChartOfAccount::create($request->all());
        return redirect()->route('accounts.index')->with('success', 'Account created successfully.');
    }

    public function edit($id)
    {
        $account = ChartOfAccount::findOrFail($id);
        return view('accounts.edit', compact('account'));
    }

    public function update(Request $request, $id)
    {
        $account = ChartOfAccount::findOrFail($id);
        $account->update($request->all());
        return redirect()->route('accounts.index')->with('success', 'Account updated successfully.');
    }

    public function destroy($id)
    {
        $account = ChartOfAccount::findOrFail($id);
        $account->delete();
        return redirect()->route('accounts.index')->with('success', 'Account deleted successfully.');
    }
}
