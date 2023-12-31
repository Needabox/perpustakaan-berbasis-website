<?php

namespace App\Http\Controllers\backsite\Operational;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backsite\Operational\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Category::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<div class="btn-group">';
                    $btn .= '<a href="'.route('category.edit', $row->id).'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>';
                    $btn .= '<form action="'.route('category.destroy', $row->id).'" method="POST" class="d-inline">';
                    $btn .= csrf_field();
                    $btn .= method_field('DELETE');
                    $btn .= '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')"><i class="fas fa-trash"></i></button>';
                    $btn .= '</form>';
                    $btn .= '</div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        
        return view('pages.backsite.operational.category.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Category has been created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);

        return view('pages.backsite.operational.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        return redirect()->route('category.index')->with('success', 'Category has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category has been deleted successfully!');
    }
}
