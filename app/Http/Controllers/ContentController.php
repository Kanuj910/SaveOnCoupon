<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Content;
use App\Http\Requests;
use Validator;
use Auth;
use DB;


class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $request['c_uid'] = Auth::user()->id;
        $request['description'] = $request->content;
        Content::create($request->all());
        return redirect()->route('meta.store.editForm',$request->sid);
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
        $data['content'] = Content::find($id);
        return view('be.meta.content.premium.edit',compact(['data']));
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
        if(isset($request->description)){
            $validator = $this->validator1($request->all());
        }else{
            $validator = $this->validator($request->all());
            $request['description'] = $request->content;
        }

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $request['u_uid'] = Auth::user()->id;
        
        $content = Content::find($id);
        $content->update($request->all());
        return redirect()->route('seo.store.content.edit',$id)->withSuccess('Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function validator(array $data)
    {
        return Validator::make($data, ['title' => 'required',
            'content' => 'required']);
    }

    protected function validator1(array $data)
    {
        return Validator::make($data, ['title' => 'required',
            'description' => 'required']);
    }

    public function getPremiumContent($id, $backend)
    {
        $premium_content = Content::leftjoin('store_premium_content_sort as cs','cs.tid','=','store_premium_content.id')->where('sid',$id)->orderBy('cs.id','asc')->get(['store_premium_content.id','store_premium_content.sid','store_premium_content.title','store_premium_content.description','cs.type']);

        $sort = array();

        foreach ($premium_content as $key) {
            if($key->type==1){
                $sort['main'][] = array('title' => $key->title, 'description' => $key->description, 'id' => $key->id);
            }elseif($key->type==2){
                $sort['side'][] = array('title' => $key->title, 'description' => $key->description, 'id' => $key->id);
            }elseif($backend==1){
                $sort['delete'][] = array('title' => $key->title, 'description' => $key->description, 'id' => $key->id);
            }else{

            }
        }
        return array('content' => $premium_content,'sort' => $sort);
    }

    public function sort(Request $request)
    {
        $request->delete = json_decode($request->delete);
        $request->side = json_decode($request->side);
        $request->main = json_decode($request->main);

        $delete = array_merge($request->delete,$request->side,$request->main);

        foreach ($delete as $key) {
            DB::table('store_premium_content_sort')->where('tid',$key)->delete();
        }unset($key);
        foreach ($request->side as $key) {
            DB::table('store_premium_content_sort')->insert(array('type' => 2, 'tid' => $key));
        }unset($key);
        foreach ($request->main as $key) {
            DB::table('store_premium_content_sort')->insert(array('type' => 1, 'tid' => $key));
        }unset($key);
    }
}
