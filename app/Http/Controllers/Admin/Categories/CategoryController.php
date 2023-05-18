<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Models\Articles\Categories;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        // $user = User::whereIn('id',auth()->user())->first();

        $categories = Categories::all();


        $categorydata = array();
        $categorydata['categories'] = $categories;
        //dd($data);

        return view('admin.categories.index', compact('categorydata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $categories = array(
            "Technical" => "Technical",
            "Sports" => "Sports",
            "Business" => "Business",
            "Art" => "Art",
            "News" => "News",
        );
        $categorydata['categories'] = $categories;
        $categoriesAvailable = Categories::all();
        $categorydata['categoriesAvailable'] = $categoriesAvailable;
        return view('admin.categories.create', compact('categorydata'));
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
        $request->validate([
            'category' => 'required|string|unique:categories',
            'category_description' => 'required|string|min:25|max:255',
            'category_class' => 'required|string',
        ]);

        $user = User::whereIn('id', auth()->user())->first();
        //dd($user);

        $category = $user->category()->create([
            'category' => $request->category,
            'category_description' => $request->category_description,
            'category_class' => $request->category_class,
        ]);



        return redirect('/admin/articles/category/index')->with('success', 'Category added successfully');
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
        $category = Categories::where('id', $id)->first();
        $categorydata['category'] = $category;
        //dd($data);

        return view('admin.categories.show', compact('categorydata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Categories::where('id', $id)->first();


        $categorydata = array();
        $categorydata['category'] = $category;
        //dd($data);
        $categories = array(
            "News" => "News",
            "Technical" => "Tech",
            "Art" => "Poems",
            "Business" => "Business",
            "Sports" => "Sports",
        );
        $categorydata['categories'] = $categories;

        return view('admin.categories.edit', compact('categorydata'));
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
        //
        $request->validate([
            'category' => 'required|string',
            'category_description' => 'required|string|min:25|max:255',
            'category_class' => 'required|string',
        ]);

        $category = Categories::where('id', $id)->first();
        $result =    $category->update([
            'category' => $request->category,
            'category_description' => $request->category_description,
            'category_class' => $request->category_class,
        ]);

        if (!$result)
            return back()->with('error', "Category could not be added ");

        return redirect('/admin/articles/category/index')->with('success', 'Category Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $result = Categories::destroy($id);

        if (!$result)
            return back()->with('error', 'Category could not be deleted');

        return redirect(route('admin.categories.index'))->with('success', 'Category deleted successfully');
    }
}
