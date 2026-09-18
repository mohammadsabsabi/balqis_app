@extends('layouts.dashboard.index')

@section('content')
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> تفاصيل المنتج </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th>اسم المنتج</th>
                            <td>{{ $product->name }}</td>
                        </tr>
                        <tr>
                            <th>وصف المنتج</th>
                            <td>{{ $product->description }}</td>
                        </tr>
                        <tr>
                            <th>حالة المنتج</th>
                            <td>{{ $product->status }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection



@push('styles')
<style>

</style>
@endpush

@push('scripts')

@endpush