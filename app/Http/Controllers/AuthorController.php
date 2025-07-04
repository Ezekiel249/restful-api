<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $authors = Author::all();
        if(!empty($authors)){
            return Response()->json(['data' => $authors], 200);
             
            
        }
        else{
           return Response()->json(['message' => 'No authors found'], 404);
        }
        
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
        $data = array();
        $data['author_name'] = $request->author_name;
        $data['author_contact_no'] = $request->author_contact_no;
        $data['author_country'] = $request->author_country;
        $data['created_at'] = Carbon::now();

        $rules = array(
            'author_name' => 'required',
            'author_contact_no' => 'required',
            'author_country' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return Response()->json(['errors' => $validator->errors()], 422);
        }
        else{
             $authors = Author::create($data);
        if($authors){
            return Response()->json(['Message' => 'New Author has been created'], 200);
        }
        else{
           return Response()->json(['message' => 'Not Successful'], 404);
        }
        }  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        $authorr = Author::find($author->id);
        if(!empty($authorr)){
            return Response()->json(['data' => $authorr], 200);
             
            
        }
        else{
           return Response()->json(['message' => 'No authors found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
         //$data = array();
        //$data['author_name'] = $request->author_name;
       // $data['author_contact_no'] = $request->author_contact_no;
        //$data['author_country'] = $request->author_country;
        //$data['updated_at'] = Carbon::now();
        $aut = Author::find($author->id);
        $aut->update($request->all());
        if($aut){
            return Response()->json(['Message' => 'Author data has been updated'], 200);
        }
        else{
           return Response()->json(['message' => 'Not Successful'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {

        $aut = Author::where('id', $author->id)->delete();
        if($aut){
            return Response()->json(['Message' => 'Author data has been deleted'], 200);
        }
        else{
           return Response()->json(['message' => 'Not Successful'], 404);
        }
    }

    public function search($term){

         $authors = Author::where('author_name', 'LIKE', '%' . $term . '%')
            ->orWhere('author_country', 'LIKE', '%' . $term . '%')
            ->orWhere('author_contact_no', 'LIKE', '%' . $term . '%')
            ->get();
        if(!empty($authors)){
            return Response()->json(['data' => $authors], 200);
             
        }
        else{
           return Response()->json(['message' => 'No authors found'], 404);
        }

    }

}
