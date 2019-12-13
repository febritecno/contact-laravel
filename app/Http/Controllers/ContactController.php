<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Groups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::latest()->paginate(5);

        return view('contact.index', compact('contacts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups= new Groups;
        $data_groups= Groups::all();
        return view('contact.create',compact('data_groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zip' => 'required|numeric',
            'country' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'note' => 'required',
            'groups_id' => 'required',
            'avatar' => 'required',
        ]);

        $imageName = time() . '.' . $request->avatar->extension();

        $request->avatar->move(public_path('uploads'), $imageName);

        Contact::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'city' => $request->city,
            'zip' => $request->zip,
            'country' => $request->country,
            'email' => $request->email,
            'phone' => $request->phone,
            'note' => $request->note,
            'groups_id' => $request->groups_id,
            'avatar' => $imageName,
        ]);

        return redirect()->route('contact.index')
            ->with('success', 'Contact created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact,Request $request)
    {
        $data= Groups::find($request->segment(2));
        return view('contact.show', compact('contact','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $data_groups= Groups::all();
        return view('contact.edit', compact('contact','data_groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
       $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zip' => 'required|numeric',
            'country' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'note' => 'required',
            'groups_id' => 'required',
            'avatar' => 'required',
        ]);

        $imageName = time() . '.' . $request->avatar->extension();

        $request->avatar->move(public_path('uploads'), $imageName);


        $contact->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'city' => $request->city,
            'zip' => $request->zip,
            'country' => $request->country,
            'email' => $request->email,
            'phone' => $request->phone,
            'note' => $request->note,
            'groups_id' => $request->groups_id,
            'avatar' => $imageName,
        ]);

        return redirect()->route('contact.index')
            ->with('success', 'Contact updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact, Request $request)
    {
    
        $imageName=$contact->find($request->segment(2))->avatar;

        $file_path = public_path().'/uploads/'.$imageName;

        unlink($file_path);

        $contact->delete();


        return redirect()->route('contact.index')
            ->with('success', 'Contact deleted successfully');
    }
}
