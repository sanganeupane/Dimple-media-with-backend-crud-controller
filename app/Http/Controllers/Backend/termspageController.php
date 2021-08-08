<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Terms\Terms;
use Illuminate\Http\Request;

class termspageController extends BackendController
{
    public function adminTermspage()
    {

        return view($this->pagePath . 'termspage.termspage', $this->data);

    }

    public function addTermspage(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'termspage.termspage', $this->data);

        }

        if ($request->isMethod('post')) {

            if (Terms::count() >= 1) {
                return redirect()->back()->with('error', 'Already Terms & Condition information is added');
            } else {
                $this->validate($request, [
                    'description' => 'required|min:5|max:4000',

                ]);

                $data['description'] = $request->description;

//dd($data);

                if (Terms::create($data)) {
                    return redirect()->intended(route('show-termspage'))->with('success', 'Data was inserted successfully');
                } else {
                    return redirect()->back()->with('error', 'Data was not inserted');

                }

            }
        }
    }

    public
    function showTermspage(Request $request)
    {
        $termspageData = Terms::orderBy('id', 'desc')->paginate(4);
        $this->data('termspageData', $termspageData);

        return view($this->pagePath . 'termspage.show-termspage', $this->data);

    }


    public function editTermspage(Request $request)
    {
        $id = $request->id;
        $termsData = Terms::findorfail($id);
        $this->data('termsData', $termsData);

        return view($this->pagePath . 'termspage.edit-termspage', $this->data);

    }


    public function editTermspageAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'termspage.termspage', $this->data);

        }

        if ($request->isMethod('post')) {
            $id = $request->id;
            $this->validate($request, [
                'description' => 'required|min:5|max:4000',

            ]);

            $data['description'] = $request->description;

            if (Terms::findorfail($id)->update($data)) {
                return redirect()->intended(route('show-termspage'))->with('success', 'Data was updated successfully');
            } else {
                return redirect()->back()->with('error', 'Data was not updated');

            }

        }
    }



    public function deleteTermspageAction(Request $request)
    {

        $id = $request->criteria;

        if (Terms::findorfail($id)->delete()) {
            return redirect()->back()->with('error', 'Data successfully delete');

        }

    }

}

