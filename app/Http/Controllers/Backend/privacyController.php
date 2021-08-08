<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Privacy\Privacy;
use Illuminate\Http\Request;

class privacyController extends BackendController
{
    public function adminPrivacy()
    {

        return view($this->pagePath . 'policypage.policypage', $this->data);

    }

    public function addprivacy(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'policypage.policypage', $this->data);

        }


        if ($request->isMethod('post')) {


            if (Privacy::count() >= 1) {
                return redirect()->back()->with('error', 'Already Privacy And Policy  information is added');
            } else {
                $this->validate($request, [
                    'description' => 'required|min:5|max:4000',

                ]);

                $data['description'] = $request->description;

//dd($data);

                if (Privacy::create($data)) {
                    return redirect()->intended(route('show-privacy'))->with('success', 'Data was inserted successfully');
                } else {
                    return redirect()->back()->with('error', 'Data was not inserted');

                }

            }
        }

    }
    public function showPrivacy(Request $request)
    {
        $privacyData = Privacy::orderBy('id', 'desc')->paginate(5);
        $this->data('privacyData', $privacyData);

        return view($this->pagePath . 'policypage.show-privacypage', $this->data);

    }




    public function editPrivacy(Request $request)
    {
        $id = $request->id;

        $privacyData = Privacy::findOrFail($id) ;
        $this->data('privacyData', $privacyData);

        return view($this->pagePath . 'policypage.edit-privacy-page', $this->data);

    }


    public function editPrivacyAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'policypage.policypage', $this->data);

        }


        if ($request->isMethod('post')) {

            $id=$request->id;

                $this->validate($request, [
                    'description' => 'required|min:5|max:4000',

                ]);

                $data['description'] = $request->description;

//dd($data);

                if (Privacy::findOrFail($id)->update($data)) {
                    return redirect()->intended(route('show-privacy'))->with('success', 'Data was updated successfully');
                } else {
                    return redirect()->back()->with('error', 'Data was not updated');

                }

            }
        }


    public function deletePrivacyAction(Request $request)
    {

        $id = $request->criteria;

        if (Privacy::findorfail($id)->delete()) {
            return redirect()->back()->with('error', 'Data successfully delete');

        }

    }



}
