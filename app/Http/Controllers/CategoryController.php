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
    /**
     * fetch Category based on id
     * @param int $id
     * @return object
     */
    public function show($id)
    {
        return Category::find($id);
    }

    /**
     * fetch Category list and display in admin panel
     * @return object
     */
    public function categoryAdminList()
      {

          $categories = Category::get(['name','seo_url','id as edit'])->toArray();
          $data = array('page' => 'Category','route' => 'category.admin.addForm','list' => $categories,'editroute'=>'category.admin.editForm');

          return view('be.templates.list',compact(['data']));
      }

    /**
     * set category add form
     * @return object
     */
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

    /**
     * fetch category edit data
     * @param int $id
     * @return object
     */
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

    /**
     * validator for category add and update
     * @param array $data
     * @param string $form
     * @param int $id
     * @return object
     */
    protected function validator(array $data,$form,$id)
    {
      // if form name is category use this validation
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
          // if form name is category use this validation
            return Validator::make($data, [
                'meta_title' => 'max:70|min:10',
                'meta_description' => 'max:170|min:10',
                'meta_keywords' => '',
                'h1' => '',
                'h2' => '',
            ]);
        }
    }

    /**
     * add category
     * @param Request $request
     * @return redirect
     */
    public function categoryAdd(Request $request)
    {
          $validator = $this->validator($request->all(),'category',''); // validate form for category

          if ($validator->fails()) {
              $this->throwValidationException(
                  $request, $validator
              ); // if validation fails throws validation fail error
          }

          $request['c_uid'] = Auth::user()->id;
          $request['parent_id'] = ($request->parent_id == '' ? 0 : $request->parent_id );

          $category = Category::create($request->all());
          return redirect()->route('category.admin.list')->withSuccess( 'successfully added');

    }

    /**
     * update category
     * @param Request $request
     * @param int $id
     * @return redirect
     */
    public function categoryEdit(Request $request,$id)
    {

          if(isset($request->h1)){
              $validator = $this->validator($request->all(),'seo',$id); // validate form for seo
          }else{
              $validator = $this->validator($request->all(),'category',$id); // validate form form category
          }

          if ($validator->fails()) {
              $this->throwValidationException(
                  $request, $validator
              );
          } // if validation fails throws validation fail error

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

    /**
     * Delete the category
     * @param int $id
     * @return redirect
     */
    public function categoryDeactive($id)
    {
      Category::find($id)->delete();
      return redirect()->route('category.index')->withSuccess( 'successfully deleted');
    }

    /**
     * fetch category name and slug
     * @param int $id
     * @return object
     */
    public function categoryById($id)
    {
        $category=Category::where('id',$id)->get(['name','seo_url']);
        return $category;
    }

  /**
   * fetch category based on category slug
   * @param string $url
   * @return object
   */
    public function categoryByURL($url)
    {
        $res = Category::where('seo_url','=',$url)->get(['id']);
        return $res;
    }
    /**
     * fetch category based on category id and return json response
     * @param int $data1
     * @return object
     */
    public function categoryByIds($data1)
    {
       return  Category::whereIn('id',$data1)->get(['name','seo_url'])->toJson();
    }

    public function getIds(Request $request)
    {

         $data = $request->get('cat_id','');
        $data1 = explode(',', $data);
        return $this->categoryByIds($data1);
    }

    /**
     * get paraent categories
     * @param array $arr
     * @return object
     */
    public function categories($arr)
    {
        return Category::where('parent_id',0)->get($arr);
    }

  /**
   * fetch categories based on store
   * @param int $sid
   * @param array $arr
   * @return object
   */
    public function categoriesByStore($sid,$arr)
    {
        return Category::join('cat_stores','cat_stores.cat_id','=','categories.id')
        ->join('stores','stores.id','=','cat_stores.sid')
        ->where('stores.id',$sid)->get($arr);
    }

    /**
     * fetch category coupons
     * @param int $cid
     * @param array $arr
     * @return object
     */
    public function categoriesByCoupon($cid,$arr)
    {
        return Category::join('cat_coupons','cat_coupons.cat_id','=','categories.id')
        ->join('coupons','coupons.id','=','cat_coupons.cid')
        ->where('coupons.id',$cid)->get($arr);
    }
    
}
