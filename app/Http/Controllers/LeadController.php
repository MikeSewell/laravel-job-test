<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lead;
use App\Lead_phone;

class LeadController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function addLead(Request $request)
    {
         $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|integer',
            'postalCode'=>'required|integer'
            ]);

            
            $lead = new Lead;
            $lead_phones = new Lead_phone;

            $lead->name = $request->name;
            $lead->email = $request->email;
            $lead->postalCode = $request->postalCode;
            $lead_phones->phone = $request->phone;
            $lead->lead_phone()->associate($lead_phones);

            $lead_phones->save();
            $lead->phone_id = $lead_phones->id;
            $lead->save();
  

            return view('home')->with('$full', $lead->id);
            
    }
    public function rmLead(Request $request)
    {
        $lead = Lead::find($request->id);
        $lead->delete();
        return redirect('admin');
    }
    public function showLeads(Request $request)
    {
        return Lead::all();
    }
}
