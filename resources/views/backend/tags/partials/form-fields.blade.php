<div class="grid gap-2.5">
    <label class="kt-label" for="{{ $tag ? 'name_'.$tag->id : 'name' }}">Name</label>
    <input class="kt-input @error('name') border-destructive @enderror" id="{{ $tag ? 'name_'.$tag->id : 'name' }}" name="name" type="text" value="{{ old('name', $tag?->name) }}" required>
    @error('name')
        <span class="text-sm text-destructive">{{ $message }}</span>
    @enderror
</div>

<div class="grid gap-2.5">
    <label class="kt-label" for="{{ $tag ? 'description_'.$tag->id : 'description' }}">Description</label>
    <textarea class="kt-textarea @error('description') border-destructive @enderror" id="{{ $tag ? 'description_'.$tag->id : 'description' }}" name="description" rows="4">{{ old('description', $tag?->description) }}</textarea>
    @error('description')
        <span class="text-sm text-destructive">{{ $message }}</span>
    @enderror
</div>
