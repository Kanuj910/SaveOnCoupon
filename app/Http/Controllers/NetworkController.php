<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Network;
use Validator;
use Auth;

class NetworkController extends Controller
{

    public function networkAdminList()
    {
        $networks = Network::get(['name','url','tracking_id','id as edit'])->toArray();
        $data = array('page' => 'Network','route' => 'network.admin.addForm','list' => $networks,'editroute'=>'network.admin.editForm');

        return view('be.templates.list',compact(['data']));
    }

    public function networkAdminAddForm()
    {
        $data = array('page' => 'Network',
            'route' => 'network.store',
            'form' => array(0 => array('type' => 'text','name' => 'name'),
                array('type' => 'text','name' => 'url'),
                array('type' => 'text','name' => 'tracking_id'))
            );

        return view('be.templates.add',compact(['data']));
    }

    public function networkAdminEditForm($id)
    {
        $network = Network::leftjoin('users as uc','uc.id','=','networks.c_uid')->
        leftjoin('users as uu','uu.id','=','networks.u_uid')->
        where('networks.id',$id)->get(['networks.*','uc.name as created_by','uu.name as updated_by'])->first();

        $data = array('page' => 'Network',
            'route' => 'network.update',
            'form' => array(0 => array('type' => 'text','name' => 'name'),
                array('type' => 'text','name' => 'url'),
                array('type' => 'text','name' => 'tracking_id')
            ));

        return view('be.network.edit',compact(['data','network']));
    }


	public function networks()
    {
    	$networks = Network::paginate(10);
    	return view('be.network.networks', compact('networks'));

    }

    protected function validator(array $data,$id)
    {
        if($id!=''){
            return Validator::make($data, [
                'name' => 'required|max:255|unique:networks,name,'.$id,
                'url' => 'required|url',
                'tracking_id' => 'required|min:4',
            ]);
        }else{
            return Validator::make($data, [
                'name' => 'required|max:255|unique:networks',
                'url' => 'required|url',
                'tracking_id' => 'required|min:4',
            ]);
        }
    }

    public function networkAdd(Request $request)
    {
    	$validator = $this->validator($request->all(),'');

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }


        $request['c_uid'] = Auth::user()->id;

        $network = Network::create($request->all());
        return redirect()->route('network.admin.list')->withSuccess( 'successfully added');

    }

    public function networkEdit(Request $request, $id)
    {
        $validator = $this->validator($request->all(),$id);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $network = Network::find($id);

        $request['u_uid'] = Auth::user()->id;

        $network->update($request->all());
        return redirect()->route('network.admin.list')->withSuccess( 'successfully updated');
    }

	public function networkDeactive($id)
	{
        Network::find($id)->delete();
        return redirect()->route('network.admin.list')->withSuccess( 'successfully deleted');
	}

    public function networkById($id)
    {
        $network=Network::where('id','=',$id)->get(['name','url']);
        return $network;

    }

    public function networkByIds ($data)
    {
        $networks=Network::whereIn('id',$data)->get(['name','url'])->toJson();
    }


    public function dummy(Request $request)
    {
        $data = $request->get('nid','');
        $data1=explode(',', $data);
        $this->networkByIds($data1);
    }
}
