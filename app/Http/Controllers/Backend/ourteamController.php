<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Ourteam\Ourteam;
use Illuminate\Http\Request;

class ourteamController extends BackendController
{
    public function adminOurteam(Request $request)
    {

        return view($this->pagePath . 'ourteam.ourteam', $this->data);

    }


    public function addOurteam(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'ourteam.ourteam', $this->data);

        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'name' => 'required|min:5|max:40',
                'post' => 'required',
                'image' => 'required|mimes:jpg,jpeg,gif,png'

            ]);

            $data['name'] = $request->name;
            $data['post'] = $request->post;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = strtolower($file->getClientOriginalExtension());
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('uploads/ourteam');
                if (!$file->move($uploadPath, $imageName)) {
                    return redirect()->with('error', 'File was not uploaded');
                }

                $data['image'] = $imageName;


                if (Ourteam::create($data)) {
                    return redirect()->intended(route('show-ourteam'))->with('success', 'Data was inserted successfully');
                } else {
                    return redirect()->back()->with('error', 'Data was not inserted');

                }

            }
        }
    }


    public function showOurteam(Request $request)
    {
        $ourteamData = Ourteam::orderBy('id', 'desc')->paginate(5);
        $this->data('ourteamData', $ourteamData);

        return view($this->pagePath . 'ourteam.show-ourteam', $this->data);

    }


    public function editOurteam(Request $request)
    {
        $id = $request->id;
        $ourteamData = Ourteam::findorfail($id);
        $this->data('ourteamData', $ourteamData);

        return view($this->pagePath . 'ourteam.edit-ourteam', $this->data);

    }

    public function editOurteamAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'ourteam.ourteam', $this->data);

        }

        if ($request->isMethod('post')) {
            $id = $request->id;
            $this->validate($request, [
                'name' => 'required|min:5|max:40',
                'post' => 'required',
                'image' => 'mimes:jpg,jpeg,gif,png'

            ]);

            $data['name'] = $request->name;
            $data['post'] = $request->post;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = strtolower($file->getClientOriginalExtension());
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('uploads/ourteam');

                if ($this->deleteFiles($id) && $file->move($uploadPath, $imageName)) {
                    $data['image'] = $imageName;
                }
            }
//            dd($data);
            if (Ourteam::findOrFail($id)->update($data)) {
                return redirect()->route('show-ourteam')->with('success', 'Data was Updated successfully');
            } else {
                return redirect()->back()->with('success', 'Data was not updated');

            }
        }
    }


    public function deleteFiles($id)
    {
        $findData = Ourteam::findOrFail($id);
        $imageName = $findData->image;
        $filePath = public_path('uploads/ourteam/' . $imageName);
        if (file_exists($filePath) && is_file($filePath)) {
            unlink($filePath);
        }
        return true;
    }

    public function deleteOurteam(Request $request)
    {
        $id = $request->criteria;
        $this->deleteFiles($id);
        if ($this->deleteFiles($id) && Ourteam::findOrFail($id)->delete()) {
            return redirect()->route("show-ourteam")->with('success', "Data Deleted Successfully");
        }
    }


}
