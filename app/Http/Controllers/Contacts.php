<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacts as Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\notificationAdded;

class Contacts extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        
        return view('contacts.index_register');
    }

    public function show($id) {
        $contact = Contact::findOrFail($id);

        return view('contacts.contact', [
            'contact' => $contact
        ]);
    }

    public function edit($id) {
        $contact = Contact::findOrFail($id);

        return view('contacts.edit', [
            'contact' => $contact
        ]);
    }

    public function update(Request $request, $id) {
        $contact = Contact::findOrFail($id);
        $contact->fname = $request->get('fname');
        $contact->lname = $request->get('lname');
        $contact->email = $request->get('email');
        $contact->number = $request->get('phone');

        $contact->update();
        
        return redirect('contacts/' . $id)->with('success', 'Your contact information has been updated correctly.');

    }

    public function store(Request $request) {
        try {
            $contact = new Contact();
            $contact->fname = $request->get('fname');
            $contact->lname = $request->get('lname');
            $contact->email = $request->get('email');
            $contact->number = $request->get('phone');
            $contact->user_id = Auth::user()->id;
            $contact->save();

            Mail::to($contact->email)->send(new notificationAdded);
        } catch (Exception $e) {
            echo "Error.";
        }

        return redirect('home')->with('success', 'You have added a new contact to your contact list. We will notify you that now you have it added.');
    }

    public function destroy($id) {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect('home')->with('warning', 'You have deleted a contact from your list.');
    }
}
