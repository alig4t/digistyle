<?php

namespace App\Http\Controllers\Backend;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryEditRequest;
use Illuminate\Support\Facades\Session;
use Validator;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('childrenRecursive')
        ->where('parent_id',0)
        ->get();
        return view('backend.categories.index',compact(['categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('childrenRecursive')
        ->where('parent_id',0)
        ->get();
        return view('backend.categories.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {

        // dd($request->input('slug'));
        // return $request->all();
        // dd($request->file('image'));
        $new_cat = new Category();

        if ($image = $request->file('image')) {
            $image_path = 'cat-'.time() . "_" . $request->input('slug').".".$image->getClientOriginalExtension();
            $image->move('images/cats', $image_path);
            $new_cat->photo = $image_path;
        }
        $new_cat->title = $request->input('title');
        $new_cat->slug = $request->input('slug');
        $new_cat->parent_id = $request->input('parent'); 
        $new_cat->meta_description = $request->input('meta_desc');  
 
        $new_cat->save();
        
        Session::flash('new_cat','دسته بندی جدید با موفقیت ایجاد شد');
        return redirect('admin/categories');
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
        // $id=1;
        $categories = Category::with(['childrenRecursive'=>function($q){
            
        }])->where('parent_id',0)
        ->get();

        // return ($categories[0]->childrenRecursive);

        $cat = Category::findorfail($id);
        return view('backend.categories.edit',compact(['cat','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryEditRequest $request, $id)
    {
        $cat = Category::findorfail($id);
       
        if ($image = $request->file('image')) {
            $image_path = 'cat-'.time() . "_" . $request->input('slug').".".$image->getClientOriginalExtension();
            // dd($image_path);
            $image->move('images/cats', $image_path);
            $cat->photo = $image_path;
        }
        $cat->title = $request->input('title');
        $cat->slug = $request->input('slug');
        $cat->parent_id = $request->input('parent');  
        $cat->meta_description = $request->input('meta_desc');  

        $cat->save();
        
        Session::flash('edit_cat','دسته بندی  با موفقیت ویرایش شد');
        return redirect('admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::findorfail($id);
        // dd(public_path() . '\\images\cats\\' . $cat->photo);
        if($cat->photo != null){
           if(file_exists(public_path() . '\\images\cats\\' . $cat->photo)){
               unlink(public_path() . '\\images\cats\\' . $cat->photo);
           }
        }
        $cat->delete();
        Session::flash('delete_cat','دسته بندی  با موفقیت حذف شد');
        return redirect('admin/categories');
    }
}
