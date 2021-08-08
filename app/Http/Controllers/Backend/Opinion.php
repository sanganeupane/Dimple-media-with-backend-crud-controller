<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Opinion extends BackendController
{
    public function adminOpinion(Request $request)
    {

        return view($this->pagePath . 'opinion.opinion', $this->data);

    }


    public function addOpinion(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'opinion.opinion', $this->data);

        }
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'title' => 'required|min:3|max:400',

                'description' => 'required|min:5|max:5000',
                'image' => 'required|mimes:jpg,jpeg,gif,png'

            ]);

            $data['title'] = $request->title;

            $data['description'] = $request->description;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = strtolower($file->getClientOriginalExtension());
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('uploads/opinion');
                if (!$file->move($uploadPath, $imageName)) {
                    return redirect()->with('error', 'File was not uploaded');
                }

                $data['image'] = $imageName;
            }


            if (\App\Models\Opinion\Opinion::create($data)) {
                return redirect()->intended(route('show-opinion'))->with('success', 'Data was inserted successfully');
            } else {
                return redirect()->back()->with('error', 'Data was not inserted');

            }

        }

    }


    public function showOpinion()
    {
        $opinionData = \App\Models\Opinion\Opinion::orderBy('id', 'desc')->paginate(5);
        $this->data('opinionData', $opinionData);

        return view($this->pagePath . 'opinion.show-opinion', $this->data);

    }


    public function editOpinion(Request $request)
    {
        $id = $request->id;
//        dd($id);
        $opinionData = \App\Models\Opinion\Opinion::findorfail($id);
        $this->data('opinionData', $opinionData);

        return view($this->pagePath . 'opinion.edit-opinion', $this->data);

    }


    public function editOpinionAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'opinion.opinion', $this->data);

        }
        if ($request->isMethod('post')) {
            $id = $request->id;

            $this->validate($request, [
                'title' => 'required|min:3|max:400',

                'description' => 'required|min:5|max:5000',
                                'image' => 'mimes:jpg,jpeg,gif,png'


            ]);

            $data['title'] = $request->title;

            $data['description'] = $request->description;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = strtolower($file->getClientOriginalExtension());
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('uploads/opinion');
                if ($this->deleteFiles($id) && $file->move($uploadPath, $imageName)) {
                    $data['image'] = $imageName;
                }


                $data['image'] = $imageName;

            }


            if (\App\Models\Opinion\Opinion::findOrfail($id)->update($data)) {
                return redirect()->intended(route('show-opinion'))->with('success', 'Data was updated successfully');
            } else {
                return redirect()->back()->with('error', 'Data was not updated');

            }

        }
    }


    public function deleteFiles($id)
    {
//        $id = $request->criteria;
        $findData = \App\Models\Opinion\Opinion::findOrFail($id);
        $imageName = $findData->image;
        $filePath = public_path('uploads/opinion/' . $imageName);
        if (file_exists($filePath) && is_file($filePath)) {
            unlink($filePath);
        }
        return true;
    }

    public function deleteOpinionAction(Request $request)
    {
        $id = $request->criteria;
        $this->deleteFiles($id);
        if ($this->deleteFiles($id) && \App\Models\Opinion\Opinion::findOrFail($id)->delete()) {
            return redirect()->route("show-opinion")->with('success', "Data Deleted Successfully");
        }

    }





}
