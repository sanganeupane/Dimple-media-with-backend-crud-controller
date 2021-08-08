<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\About\About;
use Illuminate\Http\Request;

class aboutController extends BackendController
{
    public function adminAbout(Request $request)
    {

        return view($this->pagePath . 'about.admin-about', $this->data);

    }


    public function addAbout(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'about.admin-about', $this->data);

        }

        if ($request->isMethod('post')) {

            if (About::count() >= 1) {
                return redirect()->back()->with('error', 'Already About information is added');
            } else {

                $this->validate($request, [
                    'description' => 'required|min:2|max:5000',
                    'image' => 'required|mimes:jpg,jpeg,gif,png'

                ]);


                $data['description'] = $request->description;
                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $ext = strtolower($file->getClientOriginalExtension());
                    $imageName = md5(microtime()) . '.' . $ext;
                    $uploadPath = public_path('uploads/about');
                    if (!$file->move($uploadPath, $imageName)) {
                        return redirect()->with('error', 'File was not uploaded');
                    }

                    $data['image'] = $imageName;


//dd($data);
                    if (About::create($data)) {
                        return redirect()->intended(route('show-about'))->with('success', 'Data was inserted successfully');
                    } else {
                        return redirect()->back()->with('error', 'Data was not inserted');

                    }

                }
            }
        }
    }

    public function showAbout(Request $request)
    {
        $aboutData = About::orderBy('id', 'desc')->paginate(5);
        $this->data('aboutData', $aboutData);

        return view($this->pagePath . 'about.show-about', $this->data);


    }


    public function editAbout(Request $request)
    {
        $id=$request->id;
        $aboutData = About::findorfail($id);
        $this->data('aboutData', $aboutData);

        return view($this->pagePath . 'about.edit-about', $this->data);

    }


    public function editAboutAction(Request $request)
    {
        $id=$request->id;
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'about.admin-about', $this->data);

        }

        if ($request->isMethod('post')) {

                $this->validate($request, [
                    'description' => 'required|min:2|max:5000',
                    'image' => 'mimes:jpg,jpeg,gif,png'

                ]);


                $data['description'] = $request->description;
                if ($request->hasFile('image')) {
                    $file = $request->file('image');
                    $ext = strtolower($file->getClientOriginalExtension());
                    $imageName = md5(microtime()) . '.' . $ext;
                    $uploadPath = public_path('uploads/about');
                    if ($this->deleteFiles($id) && $file->move($uploadPath, $imageName)) {
                        $data['image'] = $imageName;
                    }


                    $data['image'] = $imageName;

                }
//dd($data);
            if (About::findOrFail($id)->update($data)) {
                return redirect()->route('show-about')->with('success', 'Data was Updated successfully');
            } else {
                return redirect()->back()->with('success', 'Data was not updated');

            }

                }
            }





    public function deleteFiles($id)
    {
        $findData = About::findOrFail($id);
        $imageName = $findData->image;
        $filePath = public_path('uploads/about/' . $imageName);
        if (file_exists($filePath) && is_file($filePath)) {
            unlink($filePath);
        }
        return true;
    }

    public function deleteAboutAction(Request $request)
    {
        $id = $request->criteria;
        $this->deleteFiles($id);
        if ($this->deleteFiles($id) && About::findOrFail($id)->delete()) {
            return redirect()->route("show-about")->with('success', "Data Deleted Successfully");
        }
    }

}
