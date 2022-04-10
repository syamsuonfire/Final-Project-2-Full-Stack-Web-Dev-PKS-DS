<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function show($id)
    {
        //get data from table reviewers
        $review = Review::where('book_id', $id)->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Review',
            'data'    => $review
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
            'review'   => 'required',
            'rating' => 'required',
            'reviewer_id' => 'required',
            'book_id' => 'required',
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $review = Review::create([
            'review'  => $request->review,
            'rating' => $request->rating,
            'reviewer_id' => $request->reviewer_id,
            'book_id' => $request->book_id
        ]);

        //success save to database
        if ($review) {

            return response()->json([
                'success' => true,
                'message' => 'Review Created',
                'data'    => $review
            ], 201);
        }

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Review Failed to Save',
        ], 409);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $reviewer
     * @return void
     */
    public function update(Request $request, Review $review)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'review'  => $request->review,
            'rating' => $request->rating,
            'reviewer_id' => $request->reviewer_id,
            'book_id' => $request->book_id
        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find review by ID
        $review = Review::findOrFail($review->id);

        if ($review) {

            //update review
            $review->update([
                'review'  => $request->review,
                'rating' => $request->rating,
                'reviewer_id' => $request->reviewer_id,
                'book_id' => $request->book_id
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Reviewer Updated',
                'data'    => $review
            ], 200);
        }

        //data reviewer not found
        return response()->json([
            'success' => false,
            'message' => 'Reviewer Not Found',
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
        //find reviewer by ID
        $review = Review::findOrfail($id);

        if ($review) {

            //delete review
            $review->delete();

            return response()->json([
                'success' => true,
                'message' => 'Review Deleted',
            ], 200);
        }

        //data review not found
        return response()->json([
            'success' => false,
            'message' => 'Review Not Found',
        ], 404);
    }
}
