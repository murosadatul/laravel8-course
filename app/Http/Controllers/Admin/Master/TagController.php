<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Base\AdminBaseController;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rs_id'] = Tag::get_lists();
        return parent::display('admin.master.tags.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['mode_page'] = 'add';
        return parent::display('admin.master.tags.form')->with($data);
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
                        Tag::create($request->all());
                    }else{
                        Tag::find($id)->update($request->all());
                    }
                    return redirect('/tag');
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
        $data['mode_page'] = 'edit';
        $data['rs_id']     = Tag::find($id);
        return parent::display('admin.master.tags.form')->with($data);
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
        //
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
            Tag::find($id)->delete();
            return redirect('/tag');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
