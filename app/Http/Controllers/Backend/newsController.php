<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\News\News;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class newsController extends BackendController
{
    public function adminNews(Request $request)
    {

        return view($this->pagePath . 'news.news', $this->data);

    }


    public function addNews(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'news.news', $this->data);

        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'title' => 'required|min:3|max:40',
                'address' => 'required',
                'description' => 'required|min:2|max:5000',
                'image' => 'required|mimes:jpg,jpeg,gif,png'

            ]);

            $data['title'] = $request->title;
            $data['address'] = $request->address;
            $data['description'] = $request->description;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = strtolower($file->getClientOriginalExtension());
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('uploads/news');
                if (!$file->move($uploadPath, $imageName)) {
                    return redirect()->with('error', 'File was not uploaded');
                }

                $data['image'] = $imageName;


//dd($data);
                if (News::create($data)) {
                    return redirect()->intended(route('show-news'))->with('success', 'Data was inserted successfully');
                } else {
                    return redirect()->back()->with('error', 'Data was not inserted');

                }

            }
        }
    }


    public function showNews(Request $request)
    {
        $newsData = News::orderBy('id', 'desc')->paginate(5);
        $this->data('newsData', $newsData);

        return view($this->pagePath . 'news.show-news', $this->data);

    }


    public function deleteFiles($id)
    {
        $findData = News::findOrFail($id);
        $imageName = $findData->image;
        $filePath = public_path('uploads/news/' . $imageName);
        if (file_exists($filePath) && is_file($filePath)) {
            unlink($filePath);
        }
        return true;
    }

    public function deleteNewsAction(Request $request)
    {
        $id = $request->criteria;
        $this->deleteFiles($id);
        if ($this->deleteFiles($id) && News::findOrFail($id)->delete()) {
            return redirect()->route("show-news")->with('success', "Data Deleted Successfully");
        }
    }


    public function editNews(Request $request)
    {
        $id = $request->id;
        $newsData = News::findorfail($id);
        $this->data('newsData', $newsData);

        return view($this->pagePath . 'news.edit-news', $this->data);

    }


    public function editNewsAction(Request $request)
    {
        if ($request->isMethod('get')) {
            return view($this->pagePath . 'news.news', $this->data);

        }

        if ($request->isMethod('post')) {

            $id = $request->id;
            $this->validate($request, [
                'title' => 'required|min:3|max:40',
                'address' => 'required',
                'description' => 'required|min:2|max:5000',
                'image' => 'mimes:jpg,jpeg,gif,png'

            ]);

            $data['title'] = $request->title;
            $data['address'] = $request->address;
            $data['description'] = $request->description;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = strtolower($file->getClientOriginalExtension());
                $imageName = md5(microtime()) . '.' . $ext;
                $uploadPath = public_path('uploads/news');

//                if ($file->move($uploadPath, $imageName)) {
                if ($this->deleteFiles($id) && $file->move($uploadPath, $imageName)) {
                    $data['image'] = $imageName;
                }
            }
            if (News::findOrFail($id)->update($data)) {
                return redirect()->route('show-news')->with('success', 'Data was Updated successfully');
            } else {
                return redirect()->back()->with('success', 'Data was not updated');

            }

        }
    }

}
