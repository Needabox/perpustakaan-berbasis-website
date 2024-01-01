<?php

namespace App\Http\Controllers\Backsite\Operational;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Backsite\Operational\Book;
use App\Models\Backsite\Operational\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            if (auth()->user()->user_type == 2) {
                $books = Book::with('category', 'user')->where('user_id', auth()->user()->id)->select('*');
            } else {
                $books = Book::with('category', 'user')->select('*');
            }
            return Datatables::of($books)

                ->addIndexColumn()
                ->addColumn('action', function ($book) {
                    return view('pages.backsite.operational.book.datatables.action', compact('book'));
                })
                ->editColumn('category_id', function ($book) {
                    return $book->category->name;
                })
                ->editColumn('user_id', function ($book) {
                    return $book->user->name;
                })
                ->editColumn('file_path', function ($book) {
                    return '<a href="' . asset('storage/file/' . $book->file_path) . '" target="_blank">' . $book->file_path . '</a>';
                })
                ->editColumn('image_path', function ($book) {
                    return '<a href="' . asset('storage/cover/' . $book->image_path) . '" target="_blank">' . $book->image_path . '</a>';
                })
                ->editColumn('created_at', function ($book) {
                    return $book->created_at->format('d-m-Y H:i:s');
                })
                ->rawColumns(['action', 'file_path', 'image_path'])
                ->make(true);
        }
        
        $categories = Category::all();
        return view('pages.backsite.operational.book.index', compact('categories'));
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
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'stock' => 'required',
            'file_path' => 'required',
            'image_path' => 'required',
        ]);

        $file = $request->file('file_path');
        $file_name = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('storage/file'), $file_name);

        $image = $request->file('image_path');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('storage/cover'), $image_name);

        $book = new Book();
        $book->category_id = $request->category_id;
        $book->title = $request->title;
        $book->description = $request->description;
        $book->stock = $request->stock;
        $book->file_path = $file_name;
        $book->image_path = $image_name;
        $book->user_id = auth()->user()->id;
        $book->save();

        return redirect()->route('book.index')->with('success', 'Book created successfully.');
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
        $book = Book::find($id);
        if ($book->user_id != auth()->user()->id || auth()->user->user_type != 1) {
            return redirect()->route('book.index')->with('error', 'You are not authorized to update this book.');
        }
        $categories = Category::all();

        return view('pages.backsite.operational.book.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $book = Book::find($id);
        if ($book->user_id != auth()->user()->id || auth()->user->user_type != 1) {
            return redirect()->route('book.index')->with('error', 'You are not authorized to delete this book.');
        }

        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'stock' => 'required',
        ]);

        $book->category_id = $request->category_id;
        $book->title = $request->title;
        $book->description = $request->description;
        $book->stock = $request->stock;

        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/file'), $file_name);
            
            $book->file_path = $file_name;
        }

        if ($request->hasFile('image_path')) {
            $image = $request->file('image_path');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/cover'), $image_name);

            $book->image_path = $image_name;
        }
;
        $book->user_id = 1;
        $book->save();

        return redirect()->route('book.index')->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::find($id);
        if ($book->user_id != auth()->user()->id || auth()->user->user_type != 1) {
            return redirect()->route('book.index')->with('error', 'You are not authorized to delete this book.');
        }

        $book->delete();

        return redirect()->route('book.index')->with('success', 'Book deleted successfully.');
    }
}
