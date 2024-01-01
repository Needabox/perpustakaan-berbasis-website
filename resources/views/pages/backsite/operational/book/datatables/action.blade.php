<div class="text-center">
    <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">Action</button>
    <div class="dropdown-menu">
        <a href="{{ route('book.edit', $book->id) }}" class="dropdown-item">Edit</a>


        <form action="{{ route('book.destroy', $book->id) }}" method="POST"
            onclick="return confirm(`Are you sure want to delete this data ?`)">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" class="dropdown-item" value="Delete">
        </form>

    </div>
</div>
