@extends('layouts.admin')

@section('title')
<title>Data Aduan</title>
@endsection

@section('title-page')
Data Aduan
@endsection

@section('content')
<div class="w-full overflow-hidden rounded-lg shadow-xs">
    <div class="">
        <table id="crudTable" class="row-border">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th>Tanggal</th>
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
        order: [[3, 'desc']],
        ajax:{
            url:'{!! url()->current() !!}'
        },
        columns:[
            {data:'title', name:'title', orderable:false, width:'20%'},
            {data:'category.category', name:'category.category', orderable:false, width:'15%'},
            {data:'status', name:'status', orderable:false, width:'15%'},
            {data:'created_at', name:'created_at', width:'20%'},
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