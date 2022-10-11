<?php

namespace App\Http\Controllers\Admin\Master;

use App\Http\Controllers\Base\AdminBaseController;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class MasterPostController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        // check user login auntetication
        $this->middleware('auth');
    }
    public function index()
    {
        $data['rs_id'] = Post::get_lists();
        return parent::display('admin.master.posts.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['rs_category'] = Category::get_all();
        $data['mode_page']   = 'add';
        return parent::display('admin.master.posts.form')->with($data);
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
            $request->validate([
                "title" => 'required',
                "category_id" => 'required',
                "body" => 'required',
                "image" => 'image|file|max:100'
            ]);

            // $request->validate('image','image|file|max:1024');
            // dd($request->file('image'));
            // return;
            if($request){
                // get file all info
                // $request->file('image') -- image --> input name
                // get all input data
                $params = $request->all();
                // set image value after upload
                if( empty(!$request->input('image_old')) ){
                    // with storage::disk and custome disk
                    $params['image']  = Storage::disk('public_upload')->put('images',$request->file('image'));
                }else{
                    // with storage::disk and custome disk
                    $params['image']  = Storage::disk('public_upload')->put('images',$request->file('image'));
                }

                // with $request->file
                // $params['image']  = $request->file('image')->store('images');
                $params['author'] = $request->session()->get('user')['name'];
                if(empty($id)){
                    Post::create($params);
                }else{
                    Post::find($id)->update($params);
                }
                return redirect('/masterpost');
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
        $data['rs_category'] = Category::get_all();
        $data['rs_id']     = Post::find($id);
        $data['mode_page'] = 'edit';
        return parent::display('admin.master.posts.form')->with($data);
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
            Post::find($id)->delete();
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
