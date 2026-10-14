@extends('backend.layouts.backend')

@section('title', 'Tags | Admin')
@section('breadcrumb', 'Tags')
@section('page-title', 'Tags')
@section('page-description', 'Create tags and assign them to posts.')

@push('styles')
    <style>
        .tag-modal .kt-modal-content {
            width: calc(100% - 32px);
            max-width: 520px;
            top: 10vh;
            margin-inline: auto;
            max-height: 80vh;
            overflow-y: auto;
            border-radius: 8px;
        }

        .tag-modal .kt-modal-header {
            padding: 20px 24px;
        }

        .tag-modal .kt-modal-title {
            font-size: 18px;
            font-weight: 600;
        }

        .tag-modal .kt-modal-body {
            padding: 24px;
            gap: 20px;
        }

        .tag-modal .kt-input {
            min-height: 42px;
        }

        .tag-modal .kt-textarea {
            min-height: 100px;
            resize: vertical;
        }

        .tag-modal .kt-modal-footer {
            padding: 16px 24px;
            background: var(--muted, #f9fafb);
        }

        @media (max-width: 640px) {
            .tag-modal .kt-modal-content {
                top: 24px;
                max-height: calc(100dvh - 48px);
            }

            .tag-modal .kt-modal-header,
            .tag-modal .kt-modal-body,
            .tag-modal .kt-modal-footer {
                padding: 16px;
            }
        }
    </style>
@endpush

@section('toolbar')
    <button class="kt-btn kt-btn-primary" data-kt-modal-toggle="#create_tag_modal" type="button">
        <i class="ki-filled ki-plus" aria-hidden="true"></i>
        Add Tag
    </button>
@endsection

@section('content')
    <div class="grid gap-5 lg:gap-7.5">
        @if ($errors->any())
            <div class="kt-alert kt-alert-danger" role="alert">
                <div class="kt-alert-title">Please fix the highlighted fields and try again.</div>
            </div>
        @endif

        <section class="kt-card" aria-labelledby="tags-heading">
            <div class="kt-card-header">
                <h2 id="tags-heading" class="kt-card-title">All Tags</h2>
                <span class="kt-badge kt-badge-outline kt-badge-primary">{{ $tags->total() }} Tags</span>
            </div>
            <div class="kt-card-content p-0">
                <div class="overflow-x-auto">
                    <table class="kt-table align-middle text-sm">
                        <thead>
                            <tr>
                                <th class="min-w-48">Name</th>
                                <th class="min-w-48">Slug</th>
                                <th class="min-w-72">Description</th>
                                <th class="w-32 text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($tags as $tag)
                                <tr>
                                    <td class="font-medium text-mono">{{ $tag->name }}</td>
                                    <td>
                                        <span class="kt-badge kt-badge-outline">{{ $tag->slug }}</span>
                                    </td>
                                    <td class="text-secondary-foreground">{{ $tag->description ?: 'No description' }}</td>
                                    <td>
                                        <div class="flex justify-end gap-2">
                                            <button class="kt-btn kt-btn-sm kt-btn-icon kt-btn-outline" data-kt-modal-toggle="#edit_tag_modal_{{ $tag->id }}" type="button" aria-label="Edit {{ $tag->name }}" title="Edit">
                                                <i class="ki-filled ki-pencil" aria-hidden="true"></i>
                                            </button>
                                            <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="kt-btn kt-btn-sm kt-btn-icon kt-btn-outline kt-btn-destructive" type="submit" aria-label="Delete {{ $tag->name }}" title="Delete" onclick="return confirm('Delete this tag?')">
                                                    <i class="ki-filled ki-trash" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center text-secondary-foreground py-10" colspan="4">No tags have been created yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if ($tags->hasPages())
                <div class="kt-card-footer">
                    {{ $tags->links() }}
                </div>
            @endif
        </section>
    </div>

    <div class="kt-modal tag-modal" data-kt-modal="true" id="create_tag_modal">
        <div class="kt-modal-content max-w-[520px] top-5 lg:top-[15%]">
            <form action="{{ route('admin.tags.store') }}" method="POST">
                @csrf
                <input name="_modal" type="hidden" value="create_tag_modal">
                <div class="kt-modal-header">
                    <h3 class="kt-modal-title">Add Tag</h3>
                    <button class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost shrink-0" data-kt-modal-dismiss="true" type="button" aria-label="Close">
                        <i class="ki-filled ki-cross" aria-hidden="true"></i>
                    </button>
                </div>
                <div class="kt-modal-body grid gap-5 p-5">
                    @include('backend.tags.partials.form-fields', ['tag' => null])
                </div>
                <div class="kt-modal-footer justify-end gap-2.5">
                    <button class="kt-btn kt-btn-outline" data-kt-modal-dismiss="true" type="button">Cancel</button>
                    <button class="kt-btn kt-btn-primary" type="submit">Save Tag</button>
                </div>
            </form>
        </div>
    </div>

    @foreach ($tags as $tag)
        <div class="kt-modal tag-modal" data-kt-modal="true" id="edit_tag_modal_{{ $tag->id }}">
            <div class="kt-modal-content max-w-[520px] top-5 lg:top-[15%]">
                <form action="{{ route('admin.tags.update', $tag) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input name="_modal" type="hidden" value="edit_tag_modal_{{ $tag->id }}">
                    <div class="kt-modal-header">
                        <h3 class="kt-modal-title">Edit Tag</h3>
                        <button class="kt-btn kt-btn-sm kt-btn-icon kt-btn-ghost shrink-0" data-kt-modal-dismiss="true" type="button" aria-label="Close">
                            <i class="ki-filled ki-cross" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="kt-modal-body grid gap-5 p-5">
                        @include('backend.tags.partials.form-fields', ['tag' => $tag])
                    </div>
                    <div class="kt-modal-footer justify-end gap-2.5">
                        <button class="kt-btn kt-btn-outline" data-kt-modal-dismiss="true" type="button">Cancel</button>
                        <button class="kt-btn kt-btn-primary" type="submit">Update Tag</button>
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
