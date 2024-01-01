<script>
    $(document).ready(function () {
        $('#category-datatables').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('category.index') }}",
            columns: [
                {data: 'name', name: 'name'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });
    });
</script>