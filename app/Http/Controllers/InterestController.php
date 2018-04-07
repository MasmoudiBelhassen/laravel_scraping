<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interest;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\http\Requests;

class InterestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interests = Interest::all();
        return view('admin.interests',compact('interests'));
    }



    public function addInterest(Request $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'wording' => 'required|unique:interests'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Response::json(
              array(
                'errors' => $validator->getMessageBag()->toarray()
              )
            );
        } else {
            return response()->json(
              Interest::create([
                  'wording' => $request->input('wording')
              ])
            );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $edit = Interest::findorFail($id);
        return Response::json($edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $edit = Interest::findorFail($id);
        $update = $edit->update($request->all());
        return Response::json($update);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($interest)
    {
        if(Interest::where('id', $interest)->delete())
        {
            return response()->json([
                "error" => false,
                'message' => 'Record has been deleted successfully!',
                'id' => $interest
            ]);
        }

        return response()->json([
            "error" => true,
            'message' => 'Error while deleteing interest!',
            'id' => $interest
        ]);
    }

}
