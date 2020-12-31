<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Http\Resources\News as NewsResource;
use App\Http\Requests;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perPage = $request->get('per_page') ? $request->get('per_page') : 5;
        $news = News::paginate($perPage);
        return NewsResource::collection($news);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = new News;
        return $this->save($news, $request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        return new NewsResource($news);
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
        $news = News::findOrFail($id);
        return $this->save($news, $request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        if($news->delete()) {
            return new NewsResource($news);
        }
    }

    /**
     * Custom Save function to create or update news entity
     * Can still be refactored
     *
     * @param  object  $data
     * @return \Illuminate\Http\Response
     */
    public function save($data, $request) {
        $request->validate([
            'title'=>'required',
            'article'=>'required',
            'is_published'=>'required',
        ]);

        $data->title = $request->input('title');
        $data->article = $request->input('article');
        $data->author_id = 1;  // Todo: we can add here the $user->id if we implement user authentication
        $data->is_published = $request->input('is_published');

        if($data->save()) {
            return new NewsResource($data);
        }
    }
}
