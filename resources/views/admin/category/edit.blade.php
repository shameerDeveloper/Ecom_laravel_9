@extends('layouts.admin')
@section('content')

<div class="row">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header">
                    <h3>
                        Edit Category
                        <a href="{{url('admin/category')}}" class="btn btn-primary btn-sm float-end">Back</a>
                    </h3>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form action="{{url('admin/category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label for="">Name</label>
                        <input type="text" name="name" value="{{$category->name}}" class="form-control"/>
                        @error('name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class=" col-md-6 mb-3">
                        <label for="">Slug</label>
                        <input type="text" name="slug" value="{{$category->slug}}" class="form-control"/>
                        @error('slug')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
    
                    </div>

                    <div class=" col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="description" class="form-control" rows="3"> {{$category->description}} </textarea>
                        @error('description')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
    
                    </div>
                    <div class=" col-md-6 mb-3">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control"/>
                        <img src="{{asset('/uploads/category/'.$category->image)}}" width="60px" height="60px" alt="">
    
                    </div>
                    <div class=" col-md-6 mb-3">
                        <label for="">Status</label><br>
                        <input type="checkbox" name="status"  {{$category->status == '1' ? 'checked' : ''}}/>
    
                    </div>
                    <br>
                    <div class="col-md-12">
                        <h4>SEO Tags</h4>
                    </div>
                    <br>
                    <div class=" col-md-12 mb-3">
                        <label for="">Meta Title</label>
                        <input type="text" name="meta_title" value="{{$category->meta_title}}" class="form-control"/>
                        @error('meta_title')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
    
                    </div>
                    <div class=" col-md-12 mb-3">
                        <label for="">Meta keyword</label>
                        <input type="text" name="meta_keyword"  value="{{$category->meta_keyword}}" class="form-control"/>

                        @error('meta_keyword')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
    
                    </div>

                    <div class=" col-md-12 mb-3">
                        <label for="">Meta Description</label>
                        <textarea name="meta_description" class="form-control" rows="3">{{$category->meta_description}} </textarea>
                         @error('meta_description')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
    
                    </div>

                    
                    <div class=" col-md-12 mb-3">
                        <button class="btn btn-primary float-end">Update</button>
                    </div>



                </div>
                

               
            </form>
        </div>
</div>
@endsection