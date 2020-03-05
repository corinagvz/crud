<?php
   
namespace App\Http\Controllers;
   
use App\Article;
use Illuminate\Http\Request;
use Redirect;
use PDF;
   
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['articles'] = Article::orderBy('id','desc')->paginate(10);
   
        return view('article.list',$data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create');
    }
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'text' => 'required',            

        ]);
   
        Article::create($request->all());
    
        return Redirect::to('articles')
       ->with('success','Greate! Article created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $where = array('id' => $id);
        $data['article_info'] = Article::where($where)->first();
 
        return view('article.edit', $data);
    }
   
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'text' => 'required',
            'img_name' => 'required',
        ]);
         
     $update = ['title' => $request->title, 'description' => $request->description,'text' => $request->text, 'img_name' => $request->img_name];
        Article::where('id',$id)->update($update);
   
        return Redirect::to('articles')
       ->with('success','Great! Article updated successfully');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::where('id',$id)->delete();
   
        return Redirect::to('articles')->with('success','Article deleted successfully');
    }
     
}