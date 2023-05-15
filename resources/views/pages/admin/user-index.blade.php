@extends('layouts.admin')

@section('title')
<title>Data Masyarakat</title>
@endsection

@section('title-page')
<h2 class="my-6 text-lg font-semibold text-gray-700 dark:text-gray-200">
    Data Masyarakat
</h2>
@endsection

@section('content')
<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="">
        <table id="crudTable" class="row-border">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor Telp</th>
                    <th>Alamat</th>
                    <th>Actions</th>
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
            {data:'id', name:'id'},
            {data:'name', name:'name'},
            {data:'email', name:'email', orderable:false},
            {data:'phone', name:'phone', orderable:false},
            {data:'address', name:'address', orderable:false},
            {
                data:'action',
                name:'action',
                orderable:false,
                searchable:false,
                width:'30%'
            }
        ]
    });
</script>
@endpush