@extends('layouts.dashboard.index')

@section('content')
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> تفاصيل المتجر </h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th>اسم المتجر</th>
                            <td>{{ $store->name }}</td>
                        </tr>
                        <tr>
                            <th>وصف المتجر</th>
                            <td>{{ $store->description }}</td>
                        </tr>
                        <tr>
                            <th>حالة المتجر</th>
                            <td>{{ $store->status }}</td>
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