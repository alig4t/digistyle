<?php

namespace App\Http\Controllers\Backend;

use App\AttributeGroup;
use App\AttributeValue;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Attribute;
use Illuminate\Support\Facades\Session;

class AttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $attr_values = AttributeValue::orderBy('id','desc')
        ->paginate(10);
        return view('backend.attr_values.index',compact(['attr_values']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attr_groups = AttributeGroup::all();
        return view('backend.attr_values.create',compact(['attr_groups']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'group'=>'required|numeric'
        ],[
            'title.required' => 'وارد کردن عنوان الزامی است',
            'group.numeric' => 'گروه بندی الزامی است',
            'group.required' => 'گروه بندی الزامی است'
        ]);
        // return $request->all();
        $new_attr_val = new AttributeValue();
        $new_attr_val->title = $request->input('title');
        $new_attr_val['attr-groups-id']  = $request->input('group');
        $new_attr_val->save();

        Session::flash('new_attr_value','مقدار ویژگی جدید با موفقیت ثبت شد');
        return redirect('admin/attribute-values');
    }

    public function addVal_create($id){
        // $attr_val = AttributeValue::findorfail($id);
        $attr_groups = AttributeGroup::findorfail($id);
        return view('backend.attr_values.addval',compact(['attr_groups']));
    }

    public function addVal_insert(Request $request){
        
        $this->validate($request,[
            "title"    => "required|array|min:1",
            "title.*"  => "required|string|distinct|min:1",
        ],[
            'title.required' => 'وارد کردن عنوان الزامی است',
            'title.*.distinct' => 'بعضی مقادیر تکراری هستند'
        ]);

        // return $request->input('title');
        
        foreach($request->input('title') as $title){
            $new_attr_val = new AttributeValue();
            $new_attr_val->title = $title;
            $new_attr_val['attr-groups-id']  = $request->input('group');
            $new_attr_val->save();
        }
        Session::flash('new_attr_values','مقادیر ویژگی جدید با موفقیت ثبت شد');
        return redirect('admin/attribute-groups');

        // return $request->all();

        // foreach()

        // return $request->all();
        // $new_attr_val = new AttributeValue();
        // $new_attr_val->title = $request->input('title');
        // $new_attr_val['attr-groups-id']  = $request->input('group');
        // $new_attr_val->save();

        // Session::flash('new_attr_value','مقدار ویژگی جدید با موفقیت ثبت شد');
        // return redirect('admin/attribute-values');


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
        $attr_val = AttributeValue::findorfail($id);
        $attr_groups = AttributeGroup::all();
        return view('backend.attr_values.edit',compact(['attr_val','attr_groups']));
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
        $this->validate($request,[
            'title' => 'required',
            'group'=>'required|numeric'
        ],[
            'title.required' => 'وارد کردن عنوان الزامی است',
            'group.numeric' => 'گروه بندی الزامی است',
            'group.required' => 'گروه بندی الزامی است'
        ]);
        // return $request->all();
        $attr_val = AttributeValue::findorfail($id);
        $attr_val->title = $request->input('title');
        $attr_val['attr-groups-id']  = $request->input('group');
        $attr_val->save();

        Session::flash('edit_attr_value','مقدار ویژگی جدید با ویرایش شد');
        return redirect('admin/attribute-values');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attr_val = AttributeValue::findorfail($id);
        $attr_val->delete();
        
        Session::flash('new_attr_delete','مقدار ویژگی با موفقیت حذف شد');
        return redirect('admin/attribute-values');
    }
}
