<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Status;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::with('status')->get();
        $statuses = Status::all();
        return view('leads.index', compact('leads', 'statuses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Lead::create($request->all());
        return redirect()->back()->with('success', 'Ваша заявка принята');
    }

    public function edit(Lead $lead)
    {
        $statuses = Status::all();
        return view('leads.edit', compact('lead', 'statuses'));
    }

    public function update(Request $request, Lead $lead)
    {
        $lead->update($request->all());
        return redirect()->route('leads.index')->with('success', 'Лид обновлен успешно');
    }

    public function destroy(Lead $lead)
    {
        $lead->delete();
        return redirect()->route('leads.index')->with('success', 'Лид обновлен');
    }
}

