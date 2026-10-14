@extends('backend.layouts.backend')

@section('title', $menuItem['title'].' | Admin')
@section('breadcrumb', $menuItem['title'])
@section('page-title', $menuItem['title'])
@section('page-description', $menuItem['description'])

@section('content')
    <div class="grid gap-5 lg:gap-7.5">
        <section class="kt-card" aria-labelledby="section-heading">
            <div class="kt-card-header">
                <h2 id="section-heading" class="kt-card-title">{{ $menuItem['title'] }}</h2>
                <i class="ki-filled {{ $menuItem['icon'] }} text-xl text-muted-foreground" aria-hidden="true"></i>
            </div>
            <div class="kt-card-content">
                <div class="flex flex-col gap-3">
                    <p class="text-sm text-secondary-foreground">{{ $menuItem['description'] }}</p>
                    <p class="text-sm font-medium text-mono">This workspace is ready for the {{ strtolower($menuItem['title']) }} workflow.</p>
                </div>
            </div>
        </section>
    </div>
@endsection
