@extends('layouts.dashboard.index')

@section('content')
<div class="row mb-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> تفاصيل  </h3>
            </div>
            <div class="card-tools">
            <a href="{{ route('dashboard.hr.employees.index') }}" class="btn btn-primary m-2">
                <i class="fas fa-arrow-left ml-1"></i>
               العودة إلى القوائم
            </a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <tbody>
                        <tr>
                            <th>اسم الموظف</th>
                            <td>{{ $employee->name }}</td>
                        </tr>
                        <tr>
                            <th>وصف الموظف</th>
                            <td>{{ $employee->description }}</td>
                        </tr>
                        <tr>
                            <th>حالة الموظف</th>
                            <td>{{ $employee->status }}</td>
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