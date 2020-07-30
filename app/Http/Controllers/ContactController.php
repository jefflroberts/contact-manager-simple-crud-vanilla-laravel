<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use Auth;

class ContactController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contacts = Auth::user()->contacts;

        return view('contact.index', compact('contacts'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('contact.create-or-edit');
    }

    /**
     * @param \App\Http\Requests\ContactRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $contact = Auth::user()->contacts()->create($request->all());

        return redirect()->route('contact.index')->with('success', 'Contact created!');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Contact $contact)
    {
        return view('contact.show', compact('contact'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Contact $contact)
    {
        return view('contact.create-or-edit', compact('contact'));
    }

    /**
     * @param \App\Http\Requests\ContactRequest $request
     * @param \App\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request, Contact $contact)
    {
        $contact = Auth::user()->contacts()->update($request->all());

        return redirect()->route('contact.index')->with('success', 'Contact updated!');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contact.index')->with('success', 'Contact deleted!');
    }
}
