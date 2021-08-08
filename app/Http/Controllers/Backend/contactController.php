<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact\Contact;
use Illuminate\Http\Request;

class contactController extends BackendController
{
    public function adminContact()
    {
        return view($this->pagePath . 'contact.contact', $this->data);
    }


    public function addContact(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'contact.contact', $this->data);

        }

        if ($request->isMethod('post')) {

            if (Contact::count() >= 1) {
                return redirect()->back()->with('error', 'Already contact information in added');
            } else {
//        if ($request->isMethod('post')) {
                $this->validate($request, [
                    'address' => 'required|min:3|max:30',
                    'city' => 'required|min:3|max:15',
                    'country' => 'required|min:3|max:15',
                    'email' => 'required|email|unique:contacts,email',
                    'phone' => 'required|min:10|max:15',


                ]);

                $data['address'] = $request->address;
                $data['city'] = $request->city;
                $data['country'] = $request->country;
                $data['email'] = $request->email;
                $data['phone'] = $request->phone;


            }
//dd($data);
            if (Contact::create($data)) {
                return redirect()->route('show-contact')->with('success', 'Data was inserted successfully');
            } else {
                return redirect()->back()->with('success', 'Data was not inserted');

            }

        }
    }

    public
    function showContact(Request $request)
    {
        $contactData = Contact::all();
        $this->data('contactData', $contactData);

        return view($this->pagePath . 'contact.show-contact', $this->data);

    }


    public function editContact(Request $request)
    {
        $id = $request->id;
        $contactData = Contact::findorfail($id);
        $this->data('contactData', $contactData);

        return view($this->pagePath . 'contact.edit-contact', $this->data);

    }


    public function editContactAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'contact.edit-contact', $this->data);

        }

        if ($request->isMethod('post')) {
            $id = $request->id;
            $this->validate($request, [
                'address' => 'required|min:3|max:30',
                'city' => 'required|min:3|max:15',
                'country' => 'required|min:3|max:15',
                'email' => 'required|email',
                'phone' => 'required|min:10|max:15',


            ]);

            $data['address'] = $request->address;
            $data['city'] = $request->city;
            $data['country'] = $request->country;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;

        }



        if (Contact::findOrFail($id)->update($data)) {


            return redirect()->route('show-contact')->with('success', 'Data was inserted successfully');

        } else {
            return redirect()->back()->with('success', 'Data was not updated');

        }

    }



    public function deleteContactAction(Request $request)
    {

        $id = $request->criteria;

        if (Contact::findorfail($id)->delete()) {
            return redirect()->back()->with('error', 'Data successfully delete');

        }

    }


}
