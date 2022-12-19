<?php

namespace App\Http\Controllers\Backend;

use App\AttributeGroup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttrGpRequest;
use Attribute;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class AttributeGroupController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attr_groups = AttributeGroup::orderBy('id','desc')->paginate(10);
        return view('backend.attr_gropus.index',compact(['attr_groups'])); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.attr_gropus.create'); 

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttrGpRequest $request)
    {
        $this->uploadImage();
        // $this->validate($request,[
        //     'title' => 'required|unique:attributegroups',
        //     'type'=>'required'
        // ],[
        //     'title.required' => 'وارد کردن عنوان الزامی است',
        //     'title.unique' => 'عنوان تکراری است',
        //     'type.required' => 'وارد کردن نوع الزامی است'
        // ]);
        // return $request->all();
        $new_attr_gp = new AttributeGroup();
        // $new_attr_gp->title = $request->input('title');
        // $new_attr_gp->type = $request->input('type');
        // $new_attr_gp->save();

        $new_attr_gp->create($request->input());

        Session::flash('new_attr_group','ویژگی جدید با موفقیت ثبت شد');
        return redirect('admin/attribute-groups');
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
        $attr_group = AttributeGroup::findorfail($id);
        return view('backend.attr_gropus.edit',compact(['attr_group'])); 

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttrGpRequest $request, $id)
    {
        // $this->validate($request,[
        //     'title' => ['required',Rule::unique('attributegroups')->ignore($request->attribute_group)],
        //     'type'=>'required'
        // ],[
        //     'title.required' => 'وارد کردن عنوان الزامی است',
        //     'title.unique' => 'عنوان تکراری است',
        //     'type.required' => 'وارد کردن نوع الزامی است'
        // ]);
        // return $request->all();
        $new_attr_gp = AttributeGroup::findorfail($id);
        $new_attr_gp->title = $request->input('title');
        $new_attr_gp->type = $request->input('type');
        $new_attr_gp->save();

        Session::flash('edit_attr_group','ویژگی جدید با موفقیت ویرایش شد');
        return redirect('admin/attribute-groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attr_gp = AttributeGroup::findorfail($id);
        $attr_gp->delete();
        Session::flash('delete_attr_group','ویژگی با موفقیت حذف شد');
        return redirect('admin/attribute-groups');
    }

   


}
