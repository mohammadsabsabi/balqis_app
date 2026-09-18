<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}

   <style>
    .form-control {
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        -webkit-appearance: none;
        appearance: none;
        border-radius: 0.25rem;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
    .btn-primary {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }
   </style>
    </div>

    <form method="POST" action="{{ route('two-factor.login') }}">
        @csrf

        <div class="col-4">
            <input class="form-control" type="text" name="code"  placeholder="Enter Your Authentication Code"  /> 
        </div>

        <div class="col-4">
            <input class="form-control" type="text" name="recovery_code"  placeholder="Enter Your Recovery Code"  /> 
        </div>
        
        <div class="col-4">
            <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
        </div>
    </form>
</x-guest-layout>