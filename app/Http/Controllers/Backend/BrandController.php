<?php

namespace App\Http\Controllers\Backend;

use App\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class BrandController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $brands = Brand::orderBy('id', 'desc')
            ->paginate(20);
        return view('backend.brands.index', compact(['brands']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        // $this->authorize('OnlyAdminCan');
        $new_brand = new Brand();
        if ($request->file('image')) {
            $new_brand->logo = $this->uploadImage($request->file('image'), $request->input('slug'),[[200,110],[120,null]]);
        }
        $new_brand->name = $request->input('name');
        $new_brand->slug = $request->input('slug');
        $new_brand->description = $request->input('desc');

        $new_brand->save();

        Session::flash('new_brand', 'برند جدید با موفقیت ایجاد شد');
        return redirect('admin/brands');
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
        $brand = Brand::findorfail($id);
        return view('backend.brands.edit', compact(['brand']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, $id)
    {

        $brand = Brand::findorfail($id);
        if ($request->file('image')) {
            $brand->logo = $this->uploadImage($request->file('image'), $request->input('slug'),[[200,110],[120,null]]);
        }
        $brand->name = $request->input('name');
        $brand->slug = $request->input('slug');
        $brand->description = $request->input('desc');
        $brand->save();

        $brand->update();

        Session::flash('edit_brand', 'برند با موفقیت ویرایش شد');
        return redirect('admin/brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($request,$id)
    {
        $brand = Brand::findorfail($id);

        foreach($brand->logo['images'] as $row){
            if(file_exists(public_path($row))){
                unlink(public_path($row));
            }
        }

        $brand->delete();

        Session::flash('delete_brand', 'برند با موفقیت حذف شد');
        return redirect('admin/brands');
    }
}
