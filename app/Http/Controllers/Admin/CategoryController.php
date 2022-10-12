<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequet;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    //

    public function index(){
        return  view('admin.category.index');
    }

    public function create()
    {
        return  view('admin.category.create'); 
    }

    public function store(CategoryFormRequet $request)
    {
       // dd($request->all());

       $validatedData =$request->validated();

       $category =Category::create([

        'name' =>$request->name,
        'slug' =>Str::slug($request->slug),
        'description' =>$request->description,
        // 'image' => ($request->file('image')) ? $request->file('image')->move('category', 'uploads') : NULL,
        'meta_title' =>$request->meta_title,
        'meta_keyword' =>$request->meta_keyword,
        'meta_description' =>$request->meta_description,

        'status' =>$request->status == true ? '1':'0',

       ]);

       if($request->hasFile('image')){
        $file =$request->file('image');
        $ext =$file->getClientOriginalExtension();
        $file_name =time().'.'.$ext;
        $file->move('uploads/category/',$file_name);
        $category->image =$file_name;
        $category->save();
       }




       return redirect('admin/category')->with('message','Category Added Successfully');
    }

    public function edit(Category $category)
    {
        // return $category;
        return  view('admin.category.edit',compact('category')); 
    }

    public function update(CategoryFormRequet $request, $category){
        $category =Category::findOrFail($category);

        $category->name =$request->name;
        $category->slug =$request->slug;
        $category->description =$request->description;
        $category->meta_title =$request->meta_title;
        $category->meta_keyword =$request->meta_keyword;
        $category->meta_description =$request->meta_description;
        $category->status =$request->status == true ? '1':'0';



        if($request->hasFile('image'))
        {
                  $path ='uploads/category/'.$category->image;
                  if(File::exists($path))
                  {
                    File::delete($path);
                  }

                  $file =$request->file('image');
                  $ext =$file->getClientOriginalExtension();
                  $file_name = time().'.'.$ext;

                  $file->move('uploads/category',$file_name);
                  $category->image = $file_name;
        }

        $category->update();
        return redirect('admin/category')->with('message','Category Updated Successfully');

    }
}
