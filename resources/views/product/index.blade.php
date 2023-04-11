@extends('layout.base')

@section('title')
    Home
@stop

@section('css')
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
@stop

@section('page-content')
    <div class="card">
        <div class="card-header">Products list</div>
        <div class="card-body table-responsive">
            <table class="table table-hover table-striped" id="products-table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Stock</th>
                    <th>Category</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
                </thead>
            </table>
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $('#products-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! route('products_data') !!}',
            columns: [
                { data: 'id', name: 'id' },
                { data: 'title', name: 'title' },
                { data: 'stock', name: 'stock' },
                { data: 'category_id', name: 'category', orderable: false, searchable: false },
                { data: 'created_at', name: 'created_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });
    </script>
@stop
