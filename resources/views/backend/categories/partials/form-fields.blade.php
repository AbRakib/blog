<div class="grid gap-2.5">
    <label class="kt-label" for="{{ $category ? 'name_'.$category->id : 'name' }}">Name</label>
    <input class="kt-input @error('name') border-destructive @enderror" id="{{ $category ? 'name_'.$category->id : 'name' }}" name="name" type="text" value="{{ old('name', $category?->name) }}" required>
    @error('name')
        <span class="text-sm text-destructive">{{ $message }}</span>
    @enderror
</div>

<div class="grid gap-2.5">
    <label class="kt-label" for="{{ $category ? 'icon_'.$category->id : 'icon' }}">Icon</label>
    @if ($category?->icon)
        <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($category->icon) }}" alt="{{ $category->name }} icon" width="64" height="64" style="width: 64px; height: 64px; object-fit: contain;">
    @endif
    <input class="kt-input @error('icon') border-destructive @enderror" id="{{ $category ? 'icon_'.$category->id : 'icon' }}" name="icon" type="file" accept="image/jpeg,image/png,image/gif,image/webp">
    @error('icon')
        <span class="text-sm text-destructive">{{ $message }}</span>
    @enderror
</div>

<div class="grid gap-2.5">
    <label class="kt-label" for="{{ $category ? 'description_'.$category->id : 'description' }}">Description</label>
    <textarea class="kt-textarea @error('description') border-destructive @enderror" id="{{ $category ? 'description_'.$category->id : 'description' }}" name="description" rows="4">{{ old('description', $category?->description) }}</textarea>
    @error('description')
        <span class="text-sm text-destructive">{{ $message }}</span>
    @enderror
</div>

<div class="grid gap-2.5">
    <label class="kt-label" for="{{ $category ? 'meta_title_'.$category->id : 'meta_title' }}">Meta Title</label>
    <input class="kt-input @error('meta_title') border-destructive @enderror" id="{{ $category ? 'meta_title_'.$category->id : 'meta_title' }}" name="meta_title" type="text" value="{{ old('meta_title', $category?->meta_title) }}">
    @error('meta_title')
        <span class="text-sm text-destructive">{{ $message }}</span>
    @enderror
</div>

<div class="grid gap-2.5">
    <label class="kt-label" for="{{ $category ? 'meta_description_'.$category->id : 'meta_description' }}">Meta Description</label>
    <textarea class="kt-textarea @error('meta_description') border-destructive @enderror" id="{{ $category ? 'meta_description_'.$category->id : 'meta_description' }}" name="meta_description" rows="3">{{ old('meta_description', $category?->meta_description) }}</textarea>
    @error('meta_description')
        <span class="text-sm text-destructive">{{ $message }}</span>
    @enderror
</div>
