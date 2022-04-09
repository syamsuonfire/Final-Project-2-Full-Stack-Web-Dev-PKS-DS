<?php

namespace App\Http\Controllers;

use App\Reviewer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewerController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get data from table reviewers
        $reviewers = Reviewer::latest()->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Reviewer',
            'data'    => $reviewers  
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
        //find reviewer by ID
        $reviewer = Reviewer::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Reviewer',
            'data'    => $reviewer 
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
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $reviewer = Reviewer::create([
            'name'  => $request->name,
            'email' => $request->email
        ]);

        //success save to database
        if($reviewer) {

            return response()->json([
                'success' => true,
                'message' => 'Reviewer Created',
                'data'    => $reviewer
            ], 201);

        } 

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Reviewer Failed to Save',
        ], 409);

    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $reviewer
     * @return void
     */
    public function update(Request $request, Reviewer $reviewer)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'name'   => 'required',
            'email' => 'required',
        ]);
        
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find reviewer by ID
        $reviewer = Reviewer::findOrFail($reviewer->id);

        if($reviewer) {

            //update reviewer
            $reviewer->update([
                'name'  => $request->name,
                'email' => $request->email
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Reviewer Updated',
                'data'    => $reviewer
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
        $reviewer = Reviewer::findOrfail($id);

        if($reviewer) {

            //delete reviewer
            $reviewer->delete();

            return response()->json([
                'success' => true,
                'message' => 'Reviewer Deleted',
            ], 200);

        }

        //data reviewer not found
        return response()->json([
            'success' => false,
            'message' => 'Reviewer Not Found',
        ], 404);
    }
}
