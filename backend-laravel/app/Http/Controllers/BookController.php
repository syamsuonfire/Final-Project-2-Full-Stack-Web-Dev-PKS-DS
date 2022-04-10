<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get data from table categories
        $books = Book::all();
        foreach ($books as $book) {
            [
                'title' => $book->title,
                'rating' => $book->rating,
                'year' => $book->year,
                'description' => $book->description,
                'author' => $book->author->name,
                'category' => $book->category->category_name,
            ];
        }

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Books Data',
            'data'    => $books
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
        //find category by ID
        $book = Book::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Book Data',
            'data'    => $book
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
            'title'   => 'required',
            'rating'   => 'required',
            'rating'   => 'year',
            'description'   => 'required',
            'author_id'   => 'required',
            'category_id'   => 'required',

        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        //save to database
        if ($request->image_url) {
            $book = Book::create([
                'title'     => $request->title,
                'rating'     => $request->rating,
                'year'     => $request->year,
                'image_url'     => $request->image_url,
                'description'     => $request->description,
                'category_id'     => $request->category_id,
                'author_id'     => $request->author_id,
            ]);
        } else {

            $book = Book::create([
                'title'     => $request->title,
                'rating'     => $request->rating,
                'year'     => $request->year,
                'description'     => $request->description,
                'category_id'     => $request->category_id,
                'author_id'     => $request->author_id,
            ]);
        }


        //success save to database
        if ($book) {

            return response()->json([
                'success' => true,
                'message' => 'Book Created',
                'data'    => $book
            ], 201);
        }

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Book Failed to Save',
        ], 409);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $category
     * @return void
     */
    public function update(Request $request, Book $book)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'title'   => 'required',
            'rating'   => 'required',
            'year'   => 'required',
            'description'   => 'required',
            'author_id'   => 'required',
            'category_id'   => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find category by ID
        $book = Book::findOrFail($book->id);

        if ($book) {
            if ($request->image_url) {
                //update book
                $book->update([
                    'title'     => $request->title,
                    'rating'     => $request->rating,
                    'year'     => $request->year,
                    'image_url'     => $request->image_url,
                    'description'     => $request->description,
                    'category_id'     => $request->category_id,
                    'author_id'     => $request->author_id,
                ]);
            } else {
                $book->update([
                    'title'     => $request->title,
                    'rating'     => $request->rating,
                    'year'     => $request->year,
                    'description'     => $request->description,
                    'category_id'     => $request->category_id,
                    'author_id'     => $request->author_id,
                ]);
            }
            return response()->json([
                'success' => true,
                'message' => 'Book Updated',
                'data'    => $book
            ], 200);
        }

        //data category not found
        return response()->json([
            'success' => false,
            'message' => 'Book Not Found',
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
        //find category by ID
        $book = Book::findOrfail($id);

        if ($book) {

            //delete book
            $book->delete();

            return response()->json([
                'success' => true,
                'message' => 'Book Deleted',
            ], 200);
        }

        //data category not found
        return response()->json([
            'success' => false,
            'message' => 'Book Not Found',
        ], 404);
    }
}
