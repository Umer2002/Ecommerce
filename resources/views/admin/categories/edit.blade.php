@extends('layouts.admin')


@section('content')

<div class="card">
    <div class="card-header">
    <h3>Update/Edit Categories</h3>

    </div>
    <div class="container">
        <form action="{{url('update_cate/'.$data->id)}}" method="POST">
            @csrf
            @method('post')
                <div class="row">
                <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="col-md-6">
                        <label for="">Name</label>
                        <input type="text" class="form-control py-2" name="name" value="{{$data->name}}">
                    </div>
                    <div class="col-md-6">
                        <label for="">Slug</label>
                        <input type="text" class="form-control" name="slug" value="{{$data->slug}}">
                    </div>
                    <div class="col-md-12 mt-5">
                      <label for="">Message</label>
                      <textarea name="description" rows="3" class="form-control">{{$data->description}}</textarea>
                    </div>
                    <div class="col-md-6 mb-3 mt-5">
                        <label for="">Status</label>
                        <input type="checkbox" name="status" value="status" {{ $data->status=="1"? 'checked':'' }}>
                    </div>
                    <div class="col-md-6 mb-3 mt-5">
                        <label for="">Popular</label>
                        <input type="checkbox" name="popular"  value="popular" {{ $data->popular=="1"? 'checked':'' }}>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta_Title</label>
                        <input type="text" class="form-control" name="meta_title" value="{{$data['meta_title']}}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta_Description</label>
                        <textarea name="meta_description" rows="3" class="form-control">{{$data->meta_descrip}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Meta Keywords</label>
                        <textarea name="meta_keywords" rows="3" class="form-control">{{$data->meta_keywords}}</textarea>
                    </div>
                    @if($data->image)
                     <img class="img-fluid" src="{{asset('public/category/'.$data->image)}}" alt="Category Image">
                    @endif
                    <div class="col-md-12 mt-2">
                        <input type="file" name="image">
                    </div>
                    <div class="col-md-12 mt-3 btn-1">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
        </form>
    </div>
</div>

@endsection