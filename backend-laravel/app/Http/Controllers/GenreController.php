<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth:api');
    }
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get data from table genres
        $genres = Genre::latest()->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Genre',
            'data'    => $genres
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
        //find post by ID
        $genre = Genre::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $genre
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
            'genre_name'   => 'required',

        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $genre = Genre::create([
            'genre_name'     => $request->genre_name,

        ]);

        //success save to database
        if ($genre) {

            return response()->json([
                'success' => true,
                'message' => 'Genre Created',
                'data'    => $genre
            ], 201);
        }

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Genre Failed to Save',
        ], 409);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $genre
     * @return void
     */
    public function update(Request $request, Genre $genre)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'genre_name'   => 'required',

        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find post by ID
        $genre = Genre::findOrFail($genre->id);

        if ($genre) {

            //update post
            $genre->update([
                'genre_name'     => $request->genre_name,

            ]);

            return response()->json([
                'success' => true,
                'message' => 'Genre Updated',
                'data'    => $genre
            ], 200);
        }

        //data post not found
        return response()->json([
            'success' => false,
            'message' => 'Genre Not Found',
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
        //find genre by ID
        $genre = Genre::findOrfail($id);

        if ($genre) {

            //delete genre
            $genre->delete();

            return response()->json([
                'success' => true,
                'message' => 'Genre Deleted',
            ], 200);
        }

        //data genre not found
        return response()->json([
            'success' => false,
            'message' => 'Genre Not Found',
        ], 404);
    }
}
