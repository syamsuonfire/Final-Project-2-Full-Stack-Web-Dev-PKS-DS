<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
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
        //get data from table categories
        $categories = Category::latest()->get();

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'List Data Category',
            'data'    => $categories
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
        $category = Category::findOrfail($id);

        //make response JSON
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Category',
            'data'    => $category
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
            'category_name'   => 'required',

        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //save to database
        $category = Category::create([
            'category_name'     => $request->category_name,

        ]);

        //success save to database
        if ($category) {

            return response()->json([
                'success' => true,
                'message' => 'Category Created',
                'data'    => $category
            ], 201);
        }

        //failed save to database
        return response()->json([
            'success' => false,
            'message' => 'Category Failed to Save',
        ], 409);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $category
     * @return void
     */
    public function update(Request $request, Category $category)
    {
        //set validation
        $validator = Validator::make($request->all(), [
            'category_name'   => 'required',

        ]);

        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        //find category by ID
        $category = Category::findOrFail($category->id);

        if ($category) {

            //update category
            $category->update([
                'category_name'     => $request->category_name,

            ]);

            return response()->json([
                'success' => true,
                'message' => 'Category Updated',
                'data'    => $category
            ], 200);
        }

        //data category not found
        return response()->json([
            'success' => false,
            'message' => 'Category Not Found',
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
        $category = Category::findOrfail($id);

        if ($category) {

            //delete category
            $category->delete();

            return response()->json([
                'success' => true,
                'message' => 'Category Deleted',
            ], 200);
        }

        //data category not found
        return response()->json([
            'success' => false,
            'message' => 'Category Not Found',
        ], 404);
    }
}
