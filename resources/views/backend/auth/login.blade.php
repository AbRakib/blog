@extends('backend.layouts.backend-auth')

@section('title', 'Admin Login')

@section('content')
    <div class="kt-card max-w-[370px] w-full">
        <form action="{{ route('admin.login.store') }}" class="kt-card-content flex flex-col gap-5 p-10" id="admin_login_form" method="post">
            @csrf

            <div class="text-center mb-2.5">
                <h3 class="text-lg font-medium text-mono leading-none mb-2.5">
                    Admin Login
                </h3>
                <div class="flex items-center justify-center font-medium">
                    <span class="text-sm text-secondary-foreground me-1.5">
                        Need an account?
                    </span>
                    <a class="text-sm link" href="{{ route('admin.register') }}">
                        Register
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-2.5">
                <a class="kt-btn kt-btn-outline justify-center" href="#">
                    <img alt="" class="size-3.5 shrink-0" src="{{ asset('dashboard-html/dist/assets/media/brand-logos/google.svg') }}">
                    Use Google
                </a>
                <a class="kt-btn kt-btn-outline justify-center" href="#">
                    <img alt="" class="size-3.5 shrink-0 dark:hidden" src="{{ asset('dashboard-html/dist/assets/media/brand-logos/apple-black.svg') }}">
                    <img alt="" class="size-3.5 shrink-0 light:hidden" src="{{ asset('dashboard-html/dist/assets/media/brand-logos/apple-white.svg') }}">
                    Use Apple
                </a>
            </div>

            <div class="flex items-center gap-2">
                <span class="border-t border-border w-full"></span>
                <span class="text-xs text-muted-foreground font-medium uppercase">Or</span>
                <span class="border-t border-border w-full"></span>
            </div>

            <div class="flex flex-col gap-1">
                <label class="kt-form-label font-normal text-mono" for="email">
                    Email
                </label>
                <input class="kt-input" id="email" name="email" placeholder="email@email.com" type="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                @error('email')
                    <p class="text-sm text-destructive">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap-1">
                <div class="flex items-center justify-between gap-1">
                    <label class="kt-form-label font-normal text-mono" for="password">
                        Password
                    </label>
                    <a class="text-sm kt-link shrink-0" href="#">
                        Forgot Password?
                    </a>
                </div>
                <div class="kt-input" data-kt-toggle-password="true">
                    <input id="password" name="password" placeholder="Enter Password" type="password" autocomplete="current-password">
                    <button class="kt-btn kt-btn-sm kt-btn-ghost kt-btn-icon bg-transparent! -me-1.5" data-kt-toggle-password-trigger="true" type="button">
                        <span class="kt-toggle-password-active:hidden">
                            <i class="ki-filled ki-eye text-muted-foreground"></i>
                        </span>
                        <span class="hidden kt-toggle-password-active:block">
                            <i class="ki-filled ki-eye-slash text-muted-foreground"></i>
                        </span>
                    </button>
                </div>
                @error('password')
                    <p class="text-sm text-destructive">{{ $message }}</p>
                @enderror
            </div>

            <label class="kt-label">
                <input class="kt-checkbox kt-checkbox-sm" name="remember" type="checkbox" value="1">
                <span class="kt-checkbox-label">
                    Remember me
                </span>
            </label>

            <button class="kt-btn kt-btn-primary flex justify-center grow" type="submit">
                Sign In
            </button>
        </form>
    </div>
@endsection
