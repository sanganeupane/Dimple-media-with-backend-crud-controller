<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Talks\Talks;
use App\Models\Terms\Terms;
use Illuminate\Http\Request;

class TalksController extends BackendController
{
    public function adminTalks(Request $request)
    {

        return view($this->pagePath . 'talks.talks', $this->data);

    }


    public function addTalks(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'talks.talks', $this->data);

        }

        if ($request->isMethod('post')) {

            $this->validate($request, [
                'title' => 'required|min:2|max:80',
                'description' => 'required|min:2|max:5000',
                'image' => 'required|mimes:jpg,jpeg,gif,png'

            ]);


            $data['title'] = $request->title;
            $data['description'] = $request->description;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = strtolower($file->getClientOriginalExtension());
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('uploads/talks');
                if (!$file->move($uploadPath, $imageName)) {
                    return redirect()->with('error', 'File was not uploaded');
                }

                $data['image'] = $imageName;


//dd($data);
                if (Talks::create($data)) {
                    return redirect()->intended(route('show-talks'))->with('success', 'Data was inserted successfully');
                } else {
                    return redirect()->back()->with('error', 'Data was not inserted');

                }

            }
        }
    }


    public function showTalks(Request $request)
    {
        $talksData = Talks::orderBy('id', 'desc')->paginate(5);
        $this->data('talksData', $talksData);

        return view($this->pagePath . 'talks.show-talks', $this->data);

    }

    public function editTalks(Request $request)
    {
        $id = $request->id;
        $talksData = Talks::findorfail($id);
        $this->data('talksData', $talksData);

        return view($this->pagePath . 'talks.edit-talks', $this->data);

    }


    public function editTalksAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'talks.talks', $this->data);

        }

        if ($request->isMethod('post')) {
            $id = $request->id;
            $this->validate($request, [
                'title' => 'required|min:2|max:80',
                'description' => 'required|min:2|max:5000',
                'image' => 'mimes:jpg,jpeg,gif,png'

            ]);


            $data['title'] = $request->title;
            $data['description'] = $request->description;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = strtolower($file->getClientOriginalExtension());
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('uploads/talks');
                if ($this->deleteFiles($id) && $file->move($uploadPath, $imageName)) {
                    $data['image'] = $imageName;
                }
            }
            if (Talks::findOrFail($id)->update($data)) {
                return redirect()->route('show-talks')->with('success', 'Data was Updated successfully');
            } else {
                return redirect()->back()->with('success', 'Data was not updated');

            }

        }
    }




    public function deleteFiles($id)
    {
        $findData = Talks::findOrFail($id);
        $imageName = $findData->image;
        $filePath = public_path('uploads/talks/' . $imageName);
        if (file_exists($filePath) && is_file($filePath)) {
            unlink($filePath);
        }
        return true;
    }

    public function deleteTalksAction(Request $request)
    {
        $id = $request->criteria;
        $this->deleteFiles($id);
        if ($this->deleteFiles($id) && Talks::findOrFail($id)->delete()) {
            return redirect()->route("show-talks")->with('success', "Data Deleted Successfully");
        }
    }



}
