@extends('layouts.dashboard.index')


@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">التحقق بخطوتين</h3>
    </div>
    <div class="card-body">
        <!-- <p>مرحباً، {{ $user->name }}! يمكنك إدارة إعدادات التحقق بخطوتين هنا.</p> -->
        @if ($user->two_factor_secret)
        <p>التحقق بخطوتين مفعل. يمكنك تعطيله إذا رغبت.</p>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    {{!! $user->twoFactorQrCodeSvg() !!}}
                </div>
            </div>
              <div class="col-md-6">
                <h5>رمز التحقق</h5>
                <ul class="list-group">
                    @foreach($user->recoveryCodes() as $code)
                        <li class="list-group-item">{{ $code }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        
        <form method="POST" action="{{ route('two-factor.disable') }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">تعطيل التحقق بخطوتين</button>
        </form>
        @else
        <p>التحقق بخطوتين غير مفعل. يمكنك تفعيله لتعزيز أمان حسابك.</p>
        <form method="POST" action="{{ route('two-factor.enable') }}">
            @csrf
            <button type="submit" class="btn btn-success">تفعيل التحقق بخطوتين</button>
        </form>
        @endif
    </div>
</div>

@endsection