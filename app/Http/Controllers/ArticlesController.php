<?php

namespace App\Http\Controllers;

use App\Age;
use App\Interest;
use App\Language;
use App\Sexe;
use App\Source;
use Illuminate\Http\Request;
use App\Article ;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $articles = Article::all();
        $sources = Source::all();
        $languages = Language::all();
        $interests = Interest::all();
        $genders = Sexe::where('id');
        $ages = Age::all();

        return view('admin.articlesManagement',compact('articles','sources','languages','interests',
            'genders','ages'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $articles = Article::find($id);
        foreach ($articles->sexe as $sexes)
        {
            $sexes->sexe_article;
        }
        return view('admin.UpdateArticlesManagement');
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
