<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class TagController extends Controller
{
    public function index(): View
    {
        return view('backend.tags.index', [
            'tags' => Tag::query()->latest()->paginate(10),
        ]);
    }

    public function create(): RedirectResponse
    {
        return redirect()->route('admin.tags');
    }

    public function store(Request $request): RedirectResponse
    {
        Tag::query()->create($this->validatedData($request));

        return redirect()
            ->route('admin.tags')
            ->with('success', 'Tag created successfully.');
    }

    public function show(Tag $tag): RedirectResponse
    {
        return redirect()->route('admin.tags');
    }

    public function edit(Tag $tag): RedirectResponse
    {
        return redirect()->route('admin.tags');
    }

    public function update(Request $request, Tag $tag): RedirectResponse
    {
        $tag->update($this->validatedData($request, $tag));

        return redirect()
            ->route('admin.tags')
            ->with('success', 'Tag updated successfully.');
    }

    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();

        return redirect()
            ->route('admin.tags')
            ->with('success', 'Tag deleted successfully.');
    }

    /**
     * @return array{name: string, slug: string, description: string|null}
     */
    private function validatedData(Request $request, ?Tag $tag = null): array
    {
        $tagId = $tag?->id;

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('tags', 'name')->ignore($tagId)],
            'description' => ['nullable', 'string', 'max:1000'],
        ]);

        $baseSlug = Str::slug($data['name']) ?: 'tag';
        $slug = Str::substr($baseSlug, 0, 255);
        $suffix = 2;

        while (Tag::query()->where('slug', $slug)->when($tagId !== null, fn ($query) => $query->where('id', '!=', $tagId))->exists()) {
            $ending = '-'.$suffix++;
            $slug = Str::substr($baseSlug, 0, 255 - strlen($ending)).$ending;
        }

        $data['slug'] = $slug;

        return $data;
    }
}
