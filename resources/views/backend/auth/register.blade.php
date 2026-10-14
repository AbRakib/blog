@extends('backend.layouts.backend-auth')

@section('title', 'Admin Registration')

@section('content')
    <div class="kt-card max-w-[370px] w-full">
        <form action="{{ route('admin.register.store') }}" class="kt-card-content flex flex-col gap-5 p-10" id="admin_register_form" method="post">
            @csrf

            <div class="text-center mb-2.5">
                <h3 class="text-lg font-medium text-mono leading-none mb-2.5">
                    Admin Registration
                </h3>
                <div class="flex items-center justify-center">
                    <span class="text-sm text-secondary-foreground me-1.5">
                        Already have an account?
                    </span>
                    <a class="text-sm link" href="{{ route('admin.login') }}">
                        Sign In
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
                <span class="text-xs text-secondary-foreground uppercase">or</span>
                <span class="border-t border-border w-full"></span>
            </div>

            <div class="flex flex-col gap-1">
                <label class="kt-form-label text-mono" for="name">
                    Name
                </label>
                <input class="kt-input" id="name" name="name" placeholder="Admin name" type="text" value="{{ old('name') }}" autocomplete="name">
                @error('name')
                    <p class="text-sm text-destructive">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap-1">
                <label class="kt-form-label text-mono" for="email">
                    Email
                </label>
                <input class="kt-input" id="email" name="email" placeholder="email@email.com" type="email" value="{{ old('email') }}" autocomplete="email">
                @error('email')
                    <p class="text-sm text-destructive">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex flex-col gap-1">
                <label class="kt-form-label font-normal text-mono" for="password">
                    Password
                </label>
                <div class="kt-input" data-kt-toggle-password="true">
                    <input id="password" name="password" placeholder="Enter Password" type="password" autocomplete="new-password">
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

            <div class="flex flex-col gap-1">
                <label class="kt-form-label font-normal text-mono" for="password_confirmation">
                    Confirm Password
                </label>
                <div class="kt-input" data-kt-toggle-password="true">
                    <input id="password_confirmation" name="password_confirmation" placeholder="Re-enter Password" type="password" autocomplete="new-password">
                    <button class="kt-btn kt-btn-sm kt-btn-ghost kt-btn-icon bg-transparent! -me-1.5" data-kt-toggle-password-trigger="true" type="button">
                        <span class="kt-toggle-password-active:hidden">
                            <i class="ki-filled ki-eye text-muted-foreground"></i>
                        </span>
                        <span class="hidden kt-toggle-password-active:block">
                            <i class="ki-filled ki-eye-slash text-muted-foreground"></i>
                        </span>
                    </button>
                </div>
                @error('password_confirmation')
                    <p class="text-sm text-destructive">{{ $message }}</p>
                @enderror
            </div>

            <label class="kt-checkbox-group">
                <input class="kt-checkbox kt-checkbox-sm" name="terms" type="checkbox" value="1">
                <span class="kt-checkbox-label">
                    I accept
                    <a class="text-sm link" href="#">
                        Terms & Conditions
                    </a>
                </span>
            </label>
            @error('terms')
                <p class="text-sm text-destructive">{{ $message }}</p>
            @enderror

            <button class="kt-btn kt-btn-primary flex justify-center grow" type="submit">
                Sign up
            </button>
        </form>
    </div>
@endsection
