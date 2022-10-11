<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\support\Str;

class CategoryController extends Controller
{
    public function index(){
        $category       =   Category::all();
        return view('admin.category.index', compact('category'));
    }

    public function create(){
        return view('admin.category.add');
    }
    public function store(CategoryFormRequest $request){
        $data    =     $request->validated();

        $category   =   new Category;
        $category->name     =   $data['name'];
        $category->slug     =   $data['slug'];
        $category->description     =   $data['description'];

        if($request->hasFile('image')){
            $file           =   $request->file('image');
            $filename       =   time() . '.' . $file->getClientOriginalExtension('image'); 
            $file->move('uploads/category/',$filename);
            $category->image    =    $filename;  
        }else{
            $category->image   =  '';
        }

        $category->meta_title     =   $data['meta_title'];
        $category->meta_description     =   $data['meta_description'];
        $category->meta_keyword     =  $data['meta_keyword'];
        $category->navbar_status     =   $request->navbar_status == true ? '1':'0';
        $category->status     =   $request->status == true ? '1':'0';
        $category->created_by =     Auth::user()->id;

        $category->save();

        return redirect('admin/category')->with('message','Category Added Successfully');
    }

    function edit($id){
        $category_info      =       Category::find($id);
        return view('admin.category.edit', compact('category_info'));
    }
    function update(CategoryFormRequest $request, $id){
        $data    =     $request->validated();

        $category   =   Category::find($id);
        $category->name     =   $data['name'];
        $category->slug     =   Str::slug($data['slug']);
        $category->description     =   $data['description'];

        if($request->hasFile('image')){

            $path   =   'uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }

            $file           =   $request->file('image');
            $filename       =   time() . '.' . $file->getClientOriginalExtension('image'); 
            $file->move('uploads/category/',$filename);
            $category->image    =    $filename;  
        }

        $category->meta_title     =   $data['meta_title'];
        $category->meta_description     =   $data['meta_description'];
        $category->meta_keyword     =  $data['meta_keyword'];
        $category->navbar_status     =   $request->navbar_status == true ? '1':'0';
        $category->status     =   $request->status == true ? '1':'0';
        $category->created_by =     Auth::user()->id;

        $category->update();

        return redirect('admin/category')->with('message','Category Updated Successfully');
    }

    function destroy($id){
        $category  =   Category::find($id);
        
        if($category){
            $path   =   'uploads/category/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $category->post()->delete();
            $category->delete();
            return redirect('admin/category')->with('message','Category Deleted with its Post Successfully');
        }else{
            return redirect('admin/category')->with('message','Category ID Not Found');
        }
    }

}
