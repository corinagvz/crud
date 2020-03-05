@extends('article.layout')
@section('content')
<h2 style="margin-top: 12px;" class="text-center">Edit article</a></h2>
<br>
<form action="{{ route('articles.update', $article_info->id) }}" method="POST" name="update_article">
{{ csrf_field() }}
@method('PATCH')
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Title</strong>
            <input type="text" name="title" class="form-control" placeholder="Enter Title" value="{{ $article_info->title }}">
            <span class="text-danger">{{ $errors->first('title') }}</span>
        </div>
    </div>
    
    <div class="col-md-12">
        <div class="form-group">
            <strong>Description</strong>
            <textarea class="form-control" col="4" name="description" placeholder="Enter Description" >{{ $article_info->description }}</textarea>
            <span class="text-danger">{{ $errors->first('description') }}</span>
        </div>
    </div>
    
<div class="col-md-12">
        <div class="form-group">
            <strong>article Code</strong>
            <input type="text" name="text" class="form-control" placeholder="Enter article Text" value="{{ $article_info->text }}">
            <span class="text-danger">{{ $errors->first('text') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Image</strong>
            <input type="text" name="img_name" class="form-control" placeholder="Enter img name" value="{{ $article_info->img_name }}">
            <span class="text-danger">{{ $errors->first('img_name') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
 
</form>
@endsection