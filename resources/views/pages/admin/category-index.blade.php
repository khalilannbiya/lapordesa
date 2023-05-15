@extends('layouts.admin')

@section('title')
<title>Data Kategori</title>
@endsection

@section('title-page')
<h2 class="my-6 text-lg font-semibold text-gray-700 dark:text-gray-200">
    Data Kategori
</h2>
@endsection

@section('content')
<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="">
        <table id="crudTable" class="row-border">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('script')
<script>
    // AJAX Datatable
    var datatable = $('#crudTable').DataTable({
        // responsive: true,
        scrollX: 200,
        scroller: true,
        ajax:{
            url:'{!! url()->current() !!}'
        },
        columns:[
            {data:'id', name:'id', width:'50%'},
            {data:'category', category:'name', orderable:false, width:'50%'},
        ]
    });
</script>
@endpush