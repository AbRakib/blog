@extends('backend.layouts.backend')

@section('title', 'Admin Dashboard')
@section('breadcrumb', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-description', 'Welcome back, '.auth()->user()->name.'.')

@section('toolbar')
    <a class="kt-btn kt-btn-outline" href="{{ route('home') }}">
        <i class="ki-filled ki-home" aria-hidden="true"></i>
        View Website
    </a>
@endsection

@section('content')
    <div class="grid gap-5 lg:gap-7.5">
        <section class="kt-card" aria-labelledby="account-heading">
            <div class="kt-card-header">
                <h2 id="account-heading" class="kt-card-title">Your Account</h2>
                <i class="ki-filled ki-profile-circle text-xl text-muted-foreground" aria-hidden="true"></i>
            </div>
            <div class="kt-card-content">
                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <dt class="text-sm text-secondary-foreground">Name</dt>
                        <dd class="text-sm font-medium text-mono mt-2 break-all">{{ auth()->user()->name }}</dd>
                    </div>
                    <div>
                        <dt class="text-sm text-secondary-foreground">Email</dt>
                        <dd class="text-sm font-medium text-mono mt-2 break-all">{{ auth()->user()->email }}</dd>
                    </div>
                </dl>
            </div>
        </section>
    </div>
@endsection
