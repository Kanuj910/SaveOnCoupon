<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\model\banners\Home;
use DateTime;
use Validator;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['table'] = Home::orderBy('id','desc')->get();
        return view('be.front.banner.index',compact(['data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('be.front.banner.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $request['target'] = (isset($request->target) ? 1 : 0);
        
        $now = new DateTime();
        $date = $now->getTimestamp();

        if ($file = $request->hasFile('image')) {
            $file = $request->file('image');            
            $fileName = $date.strtolower($request->title).".jpg";
            $request['image'] = "asdf.jpg";
            $imgOpt = new ImageBannerController;
            $imgOpt->imageUploadPost($_FILES, $fileName);
        }


        $data = $request->all();
        $data['image'] = $date.strtolower($request->title).".jpg";

        Home::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Home::find($id);
        return view('be.front.banner.edit',compact(['data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $request['target'] = (isset($request->target) ? 1 : 0);
        $data = $request->all();


        $now = new DateTime();
        $date = $now->getTimestamp();

        if ($file = $request->hasFile('image')) {
            $file = $request->file('image');            
            $fileName = $date.strtolower($request->title).".jpg";
            $request['image'] = "asdf.jpg";
            $imgOpt = new ImageBannerController;
            $imgOpt->imageUploadPost($_FILES, $fileName);
            $data['image'] = $date.strtolower($request->title).".jpg";
        }else{
            unset($data['image']);
        }

        $banner = Home::find($id);
        $banner->update($data);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Home::find($id);
        $banner->delete();
        return redirect()->back();
    }

    protected function validator(array $data) {
        return Validator::make($data, [
            'image' => (isset($data['_method']) && $data['_method']=='PUT' ? 'image|mimes:jpeg,jpg,png,gif' : 'required|image|mimes:jpeg,jpg,png,gif'),
            'alt' => 'required',
            'title' => 'required',
            'link' => 'required|url',
        ]);
    }

    public function home()
    {
        return Home::orderBy('id','desc')->get();
        // dd($data['table']);
        // return view('be.front.banner.index',compact(['data']));
    }
}
