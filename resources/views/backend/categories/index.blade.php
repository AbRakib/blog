@extends('backend.layouts.backend')

@section('title', 'Categories | Admin')
@section('breadcrumb', 'Categories')
@section('page-title', 'Categories')
@section('page-description', 'Manage category names, slugs, icons, and SEO details.')

@push('styles')
    <style>
        .category-modal .kt-modal-content {
            width: calc(100% - 32px);
            max-width: 620px;
            top: 6vh;
            margin-inline: auto;
            max-height: 88vh;
            overflow-y: auto;
            border-radius: 8px;
        }

        .category-modal .kt-modal-header {
            padding: 20px 24px;
        }

        .category-modal .kt-modal-title {
            font-size: 18px;
            font-weight: 600;
        }

        .category-modal .kt-modal-body {
            padding: 24px;
            gap: 20px;
        }

        .category-modal .kt-input {
            min-height: 42px;
        }

        .category-modal .kt-textarea {
            min-height: 100px;
            resize: vertical;
        }

        .category-modal .kt-modal-footer {
            padding: 16px 24px;
            background: var(--muted, #f9fafb);
        }

        @media (max-width: 640px) {
            .category-modal .kt-modal-content {
                top: 24px;
                max-height: calc(100dvh - 48px);
            }

            .category-modal .kt-modal-header,
            .category-modal .kt-modal-body,
            .category-modal .kt-modal-footer {
                padding: 16px;
            }
        }
    </style>
@endpush

@section('toolbar')
    <button class="kt-btn kt-btn-primary" data-kt-modal-toggle="#create_category_modal" type="button">
        <i class="ki-filled ki-plus" aria-hidden="true"></i>
        Add Category
    </button>
@endsection

@section('content')
    <div class="grid gap-5 lg:gap-7.5">
        @if ($errors->any())
            <div class="kt-alert kt-alert-danger" role="alert">
                <div class="kt-alert-title">Please fix the highlighted fields and try again.</div>
            </div>
        @endif

        <section class="kt-card" aria-labelledby="categories-heading">
            <div class="kt-card-header">
                <h2 id="categories-heading" class="kt-card-title">All Categories</h2>
                <span class="kt-badge kt-badge-outline kt-badge-primary">{{ $categories->total() }} Categories</span>
            </div>
            <div class="kt-card-content p-0">
                <div class="overflow-x-auto">
                    <table class="kt-table align-middle text-sm">
                        <thead>
                            <tr>
                                <th class="min-w-48">Name</th>
                                <th class="min-w-48">Slug</th>
                                <th class="min-w-40">Icon</th>
                                <th class="min-w-72">Description</th>
                                <th class="w-32 text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td class="font-medium text-mono">{{ $category->name }}</td>
                                    <td>
                                        <span class="kt-badge kt-badge-outline">{{ $category->slug }}</span>
                                    </td>
                                    <td class="text-secondary-foreground">
                                        @if ($category->icon)
                                            <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($category->icon) }}" alt="{{ $category->name }} icon" width="40" height="40" style="width: 40px; height: 40px; object-fit: contain;">
                                        @else
                                            No icon
                                        @endif
                                    </td>
                                    <td class="text-secondary-foreground">{{ $category->description ?: 'No description' }}</td>
                                    <td>
                                        <div class="flex justify-end gap-2">
                                            <button class="kt-btn kt-btn-sm kt-btn-icon kt-btn-outline" data-kt-modal-toggle="#edit_category_modal_{{ $category->id }}" type="button" aria-label="Edit {{ $category->name }}" title="Edit">
                                                <i class="ki-filled ki-pencil" aria-hidden="true"></i>
                                            </button>
                                            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="kt-btn kt-btn-sm kt-btn-icon kt-btn-outline kt-btn-destructive" type="submit" aria-label="Delete {{ $category->name }}" title="Delete" onclick="return confirm('Delete this category?')">
                                                    <i class="ki-filled ki-trash" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center text-secondary-foreground py-10" colspan="5">No categories have been created yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if ($categories->hasPages())
                <div class="kt-card-footer">
                    {{ $categories->links() }}
                </div>
            @endif
        </section>
    </div>

    <div class="kt-modal category-modal" data-kt-modal="true" id="create_category_modal">
        <div class="kt-modal-content max-w-[620px] top-5 lg:top-[10%]">
            <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input name="_modal" type="hidden" value="create_category_modal">
                <div class="kt-modal-header">
                    <h3 class="kt-modal-title">Add Category</h3>
                    <button class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost shrink-0" data-kt-modal-dismiss="true" type="button" aria-label="Close">
                        <i class="ki-filled ki-cross" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="kt-modal-body grid gap-5 p-5">
                    @include('backend.categories.partials.form-fields', ['category' => null])
                </div>
                <div class="kt-modal-footer justify-end gap-2.5">
                    <button class="kt-btn kt-btn-outline" data-kt-modal-dismiss="true" type="button">Cancel</button>
                    <button class="kt-btn kt-btn-primary" type="submit">Save Category</button>
                </div>
            </form>
        </div>
    </div>

    @foreach ($categories as $category)
        <div class="kt-modal category-modal" data-kt-modal="true" id="edit_category_modal_{{ $category->id }}">
            <div class="kt-modal-content max-w-[620px] top-5 lg:top-[10%]">
                <form action="{{ route('admin.categories.update', $category) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input name="_modal" type="hidden" value="edit_category_modal_{{ $category->id }}">
                    <div class="kt-modal-header">
                        <h3 class="kt-modal-title">Edit Category</h3>
                        <button class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost shrink-0" data-kt-modal-dismiss="true" type="button" aria-label="Close">
                            <i class="ki-filled ki-cross" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="kt-modal-body grid gap-5 p-5">
                        @include('backend.categories.partials.form-fields', ['category' => $category])
                    </div>
                    <div class="kt-modal-footer justify-end gap-2.5">
                        <button class="kt-btn kt-btn-outline" data-kt-modal-dismiss="true" type="button">Cancel</button>
                        <button class="kt-btn kt-btn-primary" type="submit">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection

@push('scripts')
    @if ($errors->any() && old('_modal'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                document.querySelector('[data-kt-modal-toggle="#{{ old('_modal') }}"]')?.click();
            });
        </script>
    @endif
@endpush
