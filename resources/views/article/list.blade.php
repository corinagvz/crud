@extends('article.layout')
@section('content')
  <a href="{{ route('articles.create') }}" class="btn btn-success mb-2">Add</a> 
  <br>
   <div class="row">
        <div class="col-12">
          
          <table class="table table-striped rounded" id="laravel_crud">
           <thead class="thead-dark">
              <tr>
                 <th scope="col">Id</th>
                 <th scope="col">Title</th>
                 <th scope="col">Description</th>
                 <th scope="col">Text</th>
                 <th scope="col">Image</th>
                 <th scope="col">Created at</th>
                 <th scope="col" colspan="2">Action</td>
              </tr>
           </thead>
           <tbody>
              @foreach($articles as $article)
              <tr>
                 <td scope="row">{{ $article->id }}</td>
                 <td>{{ $article->title }}</td>
                 <td>{{ $article->description }}</td>
                 <td>{{ $article->text }}</td>
                 <td>{{ $article->img_name }}</td>
                 <td>{{ date('Y-m-d', strtotime($article->created_at)) }}</td>
                 <td><a href="{{ route('articles.edit',$article->id)}}" class="btn btn-primary">Edit</a></td>
                 <td>
                 <form action="{{ route('articles.destroy', $article->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                </td>
              </tr>
              @endforeach
           </tbody>
          </table>
          {!! $articles->links() !!}
       </div> 
   </div>
 @endsection  