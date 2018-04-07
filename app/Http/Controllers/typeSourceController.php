<?php

namespace App\Http\Controllers;
use App\Typesource;
use App\Interest;
use App\Language;
use Illuminate\Http\Request;


class typeSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeSources = Typesource::all();
        return view('admin.editTypeSource',compact('typeSources'));
    }


    public function selectTypeSource(){
        $typeSources = Typesource::all();
        $interestSource = Interest::all();
        $languages = Language::all();
        return view('admin.addNewSourceUrl',compact('typeSources','interestSource','languages'));
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
        $typeSources = typeSource::find($id);
        return view('admin.updateTypeSource',compact('typeSources'));
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
        $typeSourceUpadte= typeSource::where('id',$id)->update([
            'name_source'=>$request['name_source'],
            'url'=>$request['url']
        ]);

        if($typeSourceUpadte){
            return redirect()->route('typeSource.index')
                ->with('success','User Updated Successfully');
        }
        return back()->withInput()->with('errors','Error Updating Source');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $delete =  Typesource::where('id',$id)->delete();

        if($delete){
            return redirect()->route('typeSource.index')
                ->with('success','User Updated Successfully');
        }
        return back()->withInput()->with('errors','Error Updating User');
    }
}
