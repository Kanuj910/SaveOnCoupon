<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;
use Validator;
use Auth;

class EventController extends Controller
{
    public function show($id)
    {
        return Event::find($id);
    }

    public function eventAdminList()
    {
    	$events = Event::get(['event','seo_url','id as edit'])->toArray();
        $data = array('page' => 'Event','route' => 'event.admin.addForm','list' => $events,'editroute'=>'event.admin.editForm');

        return view('be.templates.list',compact(['data']));
    }
    public function eventAdminAddForm()
    {
    	$data = array('page' => 'Event',
            'route' => 'event.store',
            'form' => array(0 => array('type' => 'text','name' => 'event'),
                array('type' => 'text','name' => 'seo_url'))
            );

        return view('be.templates.add',compact(['data']));
    }

    protected function validator(array $data,$form,$id)
    {
        if($form=='event'){

            if($id!=''){
                return Validator::make($data, [
                    'event' => 'required|max:255|unique:events,event,'.$id,
                    'seo_url' => 'required|unique:events,seo_url,'.$id,
                ]);
            }else{
                return Validator::make($data, [
                    'event' => 'required|max:255|unique:events',
                    'seo_url' => 'required|unique:events',
                ]);
            }
        }elseif($form=='seo'){
            return Validator::make($data, [               
            ]);
        }
    }

    public function eventAdd(Request $request)
    {
    	$validator = $this->validator($request->all(),'event','');

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $request['c_uid'] = Auth::user()->id;

        $event = Event::create($request->all());
        return redirect()->route('event.admin.list')->withSuccess( 'successfully added');
    }

    public function eventAdminEditForm($id)
    {
    	$event=Event::find($id);
        $data = array('page' => 'Event',
            'route' => 'event.update',
            'form' => array(0 => array('type' => 'text','name' => 'event'),
                array('type' => 'text','name' => 'seo_url')
            ));

        return view('be.event.edit',compact(['data','event']));
    }
    public function eventEdit(Request $request, $id)
    {
        if(isset($request->h1)){
            $validator = $this->validator($request->all(),'seo',$id);
        }else{
            $validator = $this->validator($request->all(),'event',$id);
        }

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }


        $request['u_uid'] = Auth::user()->id;

        $event = Event::find($id);
        $event->update($request->all());

        if(isset($request->h1)){
            return redirect()->back()->withSuccess('Successfully updated');
        }else{
            return redirect()->back()->withSuccess('Successfully updated');
        }
    }

    public function events($arr)
    {
        return Event::get($arr);
    }

    public function eventByURL($url)
    {
        return Event::where('seo_url','=',$url)->get(['id']);
    }

    public function eventByCoupon($cid,$arr)
    {
        return Event::join('eve_coupons as ec','ec.eid','=','events.id')->where('ec.cid',$cid)->get($arr);
    }

}
