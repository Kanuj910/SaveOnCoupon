<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use Auth;

class CategoryController extends Controller
{
    public function show($id)
    {
        return Category::find($id);
    }

    public function categoryAdminList()
    {

        $categories = Category::get(['name','seo_url','id as edit'])->toArray();
        $data = array('page' => 'Category','route' => 'category.admin.addForm','list' => $categories,'editroute'=>'category.admin.editForm');

        return view('be.templates.list',compact(['data']));
    }

    public function categoryAdminAddForm()
    {
        $category=Category::pluck('name','id');
        $data = array('page' => 'Category',
            'route' => 'category.store',
            'form' => array(0 => array('type'=>'select','name'=>'parent_id','list'=>$category),
                array('type' => 'text','name' => 'name'),
                array('type' => 'text','name' => 'seo_url'))
            );

        return view('be.templates.add',compact(['data']));
    }

    public function categoryAdminEditForm($id)
    {

        $category = Category::leftjoin('users as uc','uc.id','=','categories.c_uid')->
        leftjoin('users as uu','uu.id','=','categories.u_uid')->
        where('categories.id',$id)->get(['categories.*','uc.name as created_by','uu.name as updated_by'])->first();

        $category1=Category::pluck('name','id');
        $data = array('page' => 'Category',
            'route' => 'category.update',
            'form' => array(0 => array('type'=>'select','name'=>'parent_id','list'=>$category1),
                array('type' => 'text','name' => 'name'),
                array('type' => 'text','name' => 'seo_url')
            ));

        return view('be.category.edit',compact(['data','category']));
    } 

    protected function validator(array $data,$form,$id)
    {
        if($form=='category'){
            if($id!=''){
                return Validator::make($data, [
                    'name' => 'required|max:50|unique:categories,name,'.$id,
                    'seo_url' => 'required|max:50|unique:categories,seo_url,'.$id,
                ]);
            }else{
                return Validator::make($data, [
                    'name' => 'required|max:50|unique:categories',
                    'seo_url' => 'required|max:50|unique:categories',
                ]);
            }
        }elseif($form=='seo'){
            return Validator::make($data, [
                'meta_title' => 'max:70|min:10',
                'meta_description' => 'max:170|min:10',
                'meta_keywords' => '',
                'h1' => '',
                'h2' => '',
            ]);
        }
    }

	public function categoryAdd(Request $request)
	{
        $validator = $this->validator($request->all(),'category','');

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $request['c_uid'] = Auth::user()->id;
        $request['parent_id'] = ($request->parent_id == '' ? 0 : $request->parent_id );

        $category = Category::create($request->all());
        return redirect()->route('category.admin.list')->withSuccess( 'successfully added');

	}

	public function categoryEdit(Request $request,$id)
	{

        if(isset($request->h1)){
            $validator = $this->validator($request->all(),'seo',$id);
        }else{
            $validator = $this->validator($request->all(),'category',$id);
        }

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $request['u_uid'] = Auth::user()->id;
        $request['parent_id'] = ($request->parent_id == '' ? 0 : $request->parent_id );

        $category=Category::find($id);
        $category->update($request->all());

        if(isset($request->h1)){
            return redirect()->back()->withSuccess( 'Successfully updated');
        }else{
            return redirect()->back()->withSuccess( 'Successfully updated');
        }
	}

	public function categoryDeactive($id)
	{
		Category::find($id)->delete();
        return redirect()->route('category.index')->withSuccess( 'successfully deleted');


	}

    public function categoryByStore()
    {
       $category=Category::with('store')->get();
        dd($category);
    }
    
    public function categoryById($id)
    {
        $category=Category::where('id',$id)->get(['name','seo_url']);
        return $category;
    }

    public function categoryByURL($url)
    {
        $res = Category::where('seo_url','=',$url)->get(['id']);
        return $res;
    }

    public function categoryByIds($data1)
    {
       $categories=Category::whereIn('id',$data1)->get(['name','seo_url'])->toJson();
       dd($categories);
    }

    public function getIds(Request $request)
    {

         $data = $request->get('cat_id','');
        $data1=explode(',', $data);
        $this->categoryByIds($data1);
    }

    public function categories($arr)
    {
        return Category::where('parent_id',0)->get($arr);
    }

    public function categoriesByStore($sid,$arr)
    {
        return Category::join('cat_stores','cat_stores.cat_id','=','categories.id')
        ->join('stores','stores.id','=','cat_stores.sid')
        ->where('stores.id',$sid)->get($arr);
    }

    public function categoriesByCoupon($cid,$arr)
    {
        return Category::join('cat_coupons','cat_coupons.cat_id','=','categories.id')
        ->join('coupons','coupons.id','=','cat_coupons.cid')
        ->where('coupons.id',$cid)->get($arr);
    }
    
}
