<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Base\AdminBaseController;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rs_id'] = Category::get_lists();
        return parent::display('admin.master.categories.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['mode_page'] = 'add';
        return parent::display('admin.master.categories.form')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $id = $request->input('id');
            $request->validate(["name" => 'required',]);
                if($request){
                    if(empty($id)){
                        Category::create($request->all());
                    }else{
                        Category::find($id)->update($request->all());
                    }
                    return redirect('/category');
                }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
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
        $data['rs_id']     = Category::find($id);
        $data['mode_page'] = 'edit';
        return parent::display('admin.master.categories.form')->with($data);
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
        try {
            $id = $request->input('id');
            var_dump($id);
            die();
            $request->validate(["name" => 'required',"id"=>"required"]);
                if($request){
                    Category::find($id)->update($request->all());
                    return redirect('/category');
                }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Category::find($id)->delete();
            return redirect('/category');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
