@extends('layout.base')

@section('title')
    {{ $product->title }}
@stop

@section('page-content')
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">{{ $product->title }}</h2>
        </div>
        <div class="card-body table-responsive">
            <table class="table">
                <tr>
                    <td class="fw-bold">Product name :</td>
                    <td>
                        {{ $product->title }}
                    </td>
                </tr>
                <tr>
                    <td class="fw-bold">Description :</td>
                    <td>
                        {{ $product->description }}
                    </td>
                </tr>
                <tr>
                    <td class="fw-bold">Stock :</td>
                    <td>
                        {{ $product->stock }}
                    </td>
                </tr>
                <tr>
                    <td class="fw-bold">Category :</td>
                    <td>
                        {{ $product->category->title }}
                    </td>
                </tr>
                <tr>
                    <td class="fw-bold">Created at :</td>
                    <td>
                        {{ \Carbon\Carbon::parse($product->created_at)->toDateTimeString() }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
@stop
