<script>
    $(document).ready(function () {
        $('#book-datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('book.index') }}",
            columns: [
                {data: 'category_id', name: 'category_id'},
                {data: 'title', name: 'title'},
                {data: 'description', name: 'description'},
                {data: 'stock', name: 'stock'},
                {data: 'user_id', name: 'user_id'},
                {data: 'file_path', name: 'file_path'},
                {data: 'image_path', name: 'image_path'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>