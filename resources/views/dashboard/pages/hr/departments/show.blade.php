@extends('layouts.dashboard.index')

@section('content')
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> تفاصيل القسم </h3>
            </div>
            <div class="card-tools">
            <a href="{{ route('dashboard.hr.departments.index') }}" class="btn btn-primary m-2">
                <i class="fas fa-arrow-left ml-1"></i>
               العودة إلى القوائم
            </a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th>اسم القسم</th>
                            <td>{{ $department->name }}</td>
                        </tr>
                        <tr>
                            <th>وصف القسم</th>
                            <td>{{ $department->description }}</td>
                        </tr>
                        <tr>
                            <th>حالة القسم</th>
                            <td>{{ $department->status }}</td>
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