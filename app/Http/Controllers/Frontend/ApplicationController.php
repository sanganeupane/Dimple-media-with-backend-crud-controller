<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\About\About;
use App\Models\Confession\Confession;
use App\Models\Contact\Contact;
use App\Models\News\News;
use App\Models\Opinion\Opinion;
use App\Models\Ourteam\Ourteam;
use App\Models\Privacy\Privacy;
use App\Models\Talks\Talks;
use App\Models\Terms\Terms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends FrontendController
{

    public function index()
    {

        $confessionData = Confession::orderBy('id', 'desc')->paginate(3);
        $this->data('confessionData', $confessionData);

        $opinionData = Opinion::orderBy('id', 'desc')->paginate(3);
        $this->data('opinionData', $opinionData);

        $newsData = News::orderBy('id', 'desc')->paginate(3);
        $this->data('newsData', $newsData);

        $contactData = Contact::orderBy('id', 'desc')->paginate(2);
        $this->data('contactData', $contactData);

        $talksData = Talks::orderBy('id', 'desc')->paginate(3);
        $this->data('talksData', $talksData);


        return view($this->pagePath. 'home.index',$this->data);
    }



    public function about()
    {
        $aboutData = About::orderBy('id', 'desc')->paginate(1);
        $this->data('aboutData', $aboutData);

        $ourteamData = Ourteam::orderBy('id', 'desc')->paginate(4);
        $this->data('ourteamData', $ourteamData);

        $contactData = Contact::orderBy('id', 'desc')->paginate(2);
        $this->data('contactData', $contactData);

        return view($this->pagePath. 'home.about',$this->data);
    }




    public function news()
    {
        $newsData = News::orderBy('id', 'desc')->paginate(9);
        $this->data('newsData', $newsData);


        $contactData = Contact::orderBy('id', 'desc')->paginate(2);

        $this->data('contactData', $contactData);

        return view($this->pagePath. 'home.news',$this->data);
    }




 public function confession()
    {

        $confessionData = Confession::orderBy('id', 'desc')->paginate(8);
        $this->data('confessionData', $confessionData);

        $contactData = Contact::orderBy('id', 'desc')->paginate(2);

     $this->data('contactData', $contactData);

        return view($this->pagePath . 'home.confession', $this->data);
    }




 public function opinion(Request $request)
    {

        $opinionData = Opinion::orderBy('id', 'desc')->paginate(8);
        $this->data('opinionData', $opinionData);

        $contactData = Contact::orderBy('id', 'desc')->paginate(2);

        $this->data('contactData', $contactData);

        return view($this->pagePath. 'home.opinion',$this->data);
    }



    public function singleconfession(Request $request)
    {
        $id = $request->id;
        $confessionData = Confession::findorfail($id);
        $this->data('confessionData', $confessionData);

        $recentConfessionData = Confession::orderBy('id', 'desc')->paginate(5);
        $this->data('recentConfessionData', $recentConfessionData);


        $contactData = Contact::orderBy('id', 'desc')->paginate(2);

        $this->data('contactData', $contactData);


        return view($this->pagePath. 'home.singleconfession',$this->data);
    }




    public function singlenews(Request $request)
    {
        $id = $request->id;
        $newsData = News::findorfail($id);
        $this->data('newsData', $newsData);

        $recentNewsData = News::orderBy('id', 'desc')->paginate(5);
        $this->data('recentNewsData', $recentNewsData);

        $contactData = Contact::orderBy('id', 'desc')->paginate(2);

        $this->data('contactData', $contactData);


        return view($this->pagePath. 'home.singlenews',$this->data);
    }



   public function singleopinion(Request  $request)
    {
        $id = $request->id;
        $opinionData = Opinion::findorfail($id);

        $otherOpinionData = Opinion::orderBy('id', 'desc')->paginate(5);
        $this->data('otherOpinionData', $otherOpinionData);

        $this->data('opinionData', $opinionData);


        $contactData = Contact::orderBy('id', 'desc')->paginate(2);
        $this->data('contactData', $contactData);

        return view($this->pagePath. 'home.singleopinion',$this->data);
    }



    public function talks()
    {
        $contactData = Contact::orderBy('id', 'desc')->paginate(2);

        $this->data('contactData', $contactData);

        $talksData = Talks::orderBy('id', 'desc')->paginate(9);
        $this->data('talksData', $talksData);



        return view($this->pagePath. 'home.talks',$this->data);
    }


    public function policypage()
    {
        $privacyData = Privacy::orderBy('id', 'desc')->paginate(2);
        $this->data('privacyData', $privacyData);

        $contactData = Contact::orderBy('id', 'desc')->paginate(2);
        $this->data('contactData', $contactData);

        return view($this->pagePath. 'home.policypage',$this->data);
    }


    public function termspage()
    {
        $termsData = Terms::orderBy('id', 'desc')->paginate(2);
        $this->data('termsData', $termsData);

        $contactData = Contact::orderBy('id', 'desc')->paginate(2);

        $this->data('contactData', $contactData);


        return view($this->pagePath. 'home.termspage',$this->data);
    }


    public function login(Request $request){
        if ($request->isMethod('get')){

            $contactData = Contact::orderBy('id', 'desc')->paginate(2);

            $this->data('contactData', $contactData);

            return view($this->frontendPath.'users.login',$this->data);

        }


        if ($request->isMethod('post')){
            $this->validate($request,[
                'username'=>'required',
                'password'=>'required'
            ]);
            $username=$request->username;
            $password=$request->password;

            if( Auth::guard('web')->attempt(['username'=>$username,'password'=>$password])) {

                return redirect()->intended(route('users'));
            }
            else{
                return redirect()->back()->with('error','Username & Password Not match');
            }
        }
    }




    public function user(Request $request)
    {


        $contactData = Contact::orderBy('id', 'desc')->paginate(2);

        $this->data('contactData', $contactData);

        return view($this->frontendPath.'users.index',$this->data);
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect()->intended(route('index'))->with('success','Successfully logout');
    }


}
