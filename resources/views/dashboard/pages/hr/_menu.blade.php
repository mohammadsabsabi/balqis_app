@php
$current = $current ?? '';
@endphp

<div class="mb-3">
    <a href="{{ route('dashboard.hr.index') }}" class="btn {{ $current === 'overview' ? 'btn-primary' : 'btn-dark-primary' }}">نظرة عامة</a>
    <a href="{{ route('dashboard.hr.departments.index') }}" class="btn {{ $current === 'departments' ? 'btn-primary' : 'btn-dark-primary' }}">الأقسام</a>
    <a href="{{ route('dashboard.hr.employees.index') }}" class="btn {{ $current === 'employees' ? 'btn-primary' : 'btn-dark-primary' }}">الموظفين</a>
</div>