<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class confession extends BackendController
{
    public function adminconfession(Request $request)
    {

        return view($this->pagePath . 'confession.confession', $this->data);

    }


    public function addConfession(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'confession.confession', $this->data);

        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'title' => 'required|min:3|max:40',
                'address' => 'required',
                'gender' => 'required',
                'age' => 'required',
                'description' => 'required|min:20|max:5000',
                'image' => 'required|mimes:jpg,jpeg,gif,png'


            ]);

            $data['title'] = $request->title;
            $data['address'] = $request->address;
            $data['gender'] = $request->gender;
            $data['age'] = $request->age;
            $data['description'] = $request->description;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = strtolower($file->getClientOriginalExtension());
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('uploads/confession');
                if (!$file->move($uploadPath, $imageName)) {
                    return redirect()->with('error', 'File was not uploaded');
                }

                $data['image'] = $imageName;
            }


//dd($data);
            if (\App\Models\Confession\Confession::create($data)) {
                return redirect()->intended(route('show-confession'))->with('success', 'Data was inserted successfully');
            } else {
                return redirect()->back()->with('error', 'Data was not inserted');

            }

        }

    }


    public function showConfession(Request $request)
    {
        $confenssionData = \App\Models\Confession\Confession::orderBy('id', 'desc')->paginate(5);
        $this->data('confenssionData', $confenssionData);

        return view($this->pagePath . 'confession.show-confession', $this->data);

    }


    public function editConfession(Request $request)
    {
//        die();
        $id = $request->id;
//
        $confessionData = \App\Models\Confession\Confession::findorfail($id);
//
//        dd($confessionData);
        $this->data('confessionData', $confessionData);

        return view($this->pagePath . 'confession.edit-confession', $this->data);

    }

    public function editConfessionAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'confession.confession', $this->data);

        }
        if ($request->isMethod('post')) {
            $id = $request->id;
            $this->validate($request, [
                'title' => 'required|min:3|max:40',
                'address' => 'required',
                'gender' => 'required',
                'age' => 'required',
                'description' => 'required|min:2|max:5000',
                'image' => 'mimes:jpg,jpeg,gif,png'


            ]);

            $data['title'] = $request->title;
            $data['address'] = $request->address;
            $data['gender'] = $request->gender;
            $data['age'] = $request->age;
            $data['description'] = $request->description;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = strtolower($file->getClientOriginalExtension());
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('uploads/confession');
                if ($this->deleteFiles($id) && $file->move($uploadPath, $imageName)) {
                    $data['image'] = $imageName;
                }


                $data['image'] = $imageName;

            }

            if (\App\Models\Confession\Confession::findOrFail($id)->update($data)) {
                return redirect()->route('show-confession')->with('success', 'Data was Updated successfully');
            } else {
                return redirect()->back()->with('success', 'Data was not updated');

            }


        }
    }


    public function deleteFiles($id)
    {
//        $id = $request->criteria;
        $findData = \App\Models\Confession\Confession::findOrFail($id);
        $imageName = $findData->image;
        $filePath = public_path('uploads/confession/' . $imageName);
        if (file_exists($filePath) && is_file($filePath)) {
            unlink($filePath);
        }
        return true;
    }

    public function deleteConfessionAction(Request $request)
    {
        $id = $request->criteria;
        $this->deleteFiles($id);
        if ($this->deleteFiles($id) && \App\Models\Confession\Confession::findOrFail($id)->delete()) {
            return redirect()->route("show-confession")->with('success', "Data Deleted Successfully");
        }

    }

}
