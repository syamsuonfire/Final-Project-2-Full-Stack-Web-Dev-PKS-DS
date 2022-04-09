<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
      /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get data from table authors
        $authors = Author::latest()->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Author',
            'data'    => $authors 
        ], 200);

    }
    
     /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        //find author by ID
        $author = Author::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Author',
            'data'    => $author
        ], 200);

    }
    
    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'name'   => 'required',
            'email' => 'required',
            'bio' => 'required',
            'books' => 'required',
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $author = Author::create([
            'name'     => $request->name,
            'email'   => $request->email,
            'bio'      => $request->bio,
            'books'    => $request->books,
        ]);

        //success save to database
        if($author) {

            return response()->json([
                'success' => true,
                'message' => 'Author Created',
                'data'    => $author  
            ], 201);

        } 

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Author Failed to Save',
        ], 409);

    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $author
     * @return void
     */
    public function update(Request $request, Author $author)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'name'   => 'required',
            'email' => 'required',
            'bio' => 'required',
            'books' => 'required',
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find author by ID
        $author = Author::findOrFail($author->id);

        if($post) {

            //update author
            $post->update([
                'name'  => $request->name,
                'email' => $request->email,
                'bio'   => $request->bio,
                'books' => $request->books
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Author Updated',
                'data'    => $author  
            ], 200);

        }

        //data author not found
        return response()->json([
            'success' => false,
            'message' => 'Author Not Found',
        ], 404);

    }
    
    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {
        //find author by ID
        $author = Author::findOrfail($id);

        if($author) {

            //delete author
            $author->delete();

            return response()->json([
                'success' => true,
                'message' => 'Author Deleted',
            ], 200);

        }

        //data post not found
        return response()->json([
            'success' => false,
            'message' => 'Author Not Found',
        ], 404);
    }
}
