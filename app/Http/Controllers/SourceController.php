<?php

namespace App\Http\Controllers;


use App\Typesource;
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use DiDom\Document;
use App\Source;
use App\Interest;
use App\Language;
use App\Article;
use App\Typesources;


class SourceController extends Controller
{

    public function index()
    {
        $interestSource = Interest::all();
        $languages = Language::all();
        return view('admin.source', compact('interestSource', 'languages'));
    }

    public function index2(){

        $sources = Source::all();
        return view('admin.editScrapingInformation',compact('sources'));
    }


    public function editScrapingInformation($id)
    {
        $source= Source::find($id);
        $interestSource = Interest::all();
        $languages = Language::all();
        return view('admin.updateScrapingInformation',compact('source','interestSource','languages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateScrapingInformation(Request $request, $id){

        $source= Source::where('id',$id)->update([

            'url'=>$request['url'],
            'parent'=>$request['parent'],
            'date'=>$request['date'],
            'href'=>$request['href'],
            'image'=>$request['image'],
            'title'=>$request['title'],
            'description'=>$request['description'],
            'interest_id'=>$request['interest'],
            'language_id'=>$request['language']
        ]);

        if($source){
            return redirect()->route('index2')
                ->with('success','Information Updated Successfully');
        }
        return back()->withInput()->with('errors','Error Updating Source');

    }



    public function addNewUrlToExistSource(Request $request){

        $source = new Source();
            $source->url =$request['url'];
            $source->parent = $request['parent'];
            $source->date = $request['date'];
            $source->href = $request['href'];
            $source->image = $request['image'];
            $source->title = $request['title'];
            $source->description = $request['description'];
            $source->typesource_id=$request['sourceName'];
            $source->interest_id=$request['interest'];
            $source->language_id=$request['language'];
            $source->save();
        if($source){
            return redirect()->route('selectTypeSource')
                ->with('success','User Updated Successfully');
        }
        return back()->withInput()->with('errors','Error Updating User');


    }



    /*Verifier Si le site est existe*/
    public function verif(Request $request)
    {
        $itc_headers = @get_headers($request['url']);
        if (!$itc_headers || $itc_headers[0] == 'HTTP/1.1 404 Not Found') {
            return response()->json(false);

        } else {

            return response()->json(true);
        }
    }



    public function save(Request $request)
    {
        $typesrc = Typesource::create([
            'name_source' => $request['nameSource'],
            'url' => $request['url']
        ]);
        $i = 0;
        foreach ($request->input('urlInterest') as $a) {
            $source = new Source();
            $source->url = $a;
            $source->href = $request['href'][$i];
            $source->parent = $request['parent'][$i];
            $source->date = $request['date'][$i];
            $source->description = $request['description'][$i];
            $source->image = $request['image'][$i];
            $source->title = $request['title'][$i];
            $source->interest()->associate(Interest::find($request['interest'][$i]));
            $source->language()->associate(Language::find($request['language'][$i]));
            $source->typesource()->associate($typesrc);
            $source->save();
            $i++;
        }
        return back();
    }





    public function metaSolution()
    {
        $sources = Source::all();
        foreach ($sources as $source) {
            $url = $source->url;
            $document = new Document(get_effective_url($url), true);
            $headers = $document->find($source->parent);
            $menu = [];
            foreach ($headers as $header) {
                $href = $header->firstInDocument($source->href);
                $date = $header->firstInDocument($source->date);
                $allHref = $href->getAttribute('href');
                if (strpos($allHref, $source->typesource->url) === false) {

                    if (starts_with($allHref, '/') === false) {

                        $allHref = '/' . $allHref;
                        $allHref = $source->typesource->url . $allHref;
                    } else {
                        $allHref = $source->typesource->url . $allHref;
                    }

                } else {
                    $allHref = $href->getAttribute('href');
                }


                $document = new Document(get_effective_url($allHref), true);
                $title = $document->xpath('/html/head/meta[@property="' . $source->title . '"]/@content')[0];
                $image = $document->xpath('/html/head/meta[@property="' . $source->image . '"]/@content')[0];
                $description = $document->first($source->description);

                $menu [] = [
                    "site" => $allHref,
                    "title" => $title,
                    "image" => $image,
                    "description" => $description->text(),
                    "date" => $date->text()
                ];
            }

            foreach ($menu as $item) {
                if (Article::where('url', '=', $item['site'])->first    () == null) {
                    $article = new Article();
                    $article->url = $item['site'];
                    $article->title = $item['title'];
                    $article->image = $item['image'];
                    $article->description = $item['description'];
                    $article->date = $item['date'];
                    $article->source_id = $source->id;
                    $article->save();
                    $article->sexe()->attach([1,2]);
                    $article->age()->attach([1,2]);

                }
            }
        }
    }
}
