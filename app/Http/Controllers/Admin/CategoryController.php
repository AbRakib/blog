<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        return view('backend.categories.index', [
            'categories' => Category::query()->latest()->paginate(10),
        ]);
    }

    public function create(): RedirectResponse
    {
        return redirect()->route('admin.categories');
    }

    public function store(Request $request): RedirectResponse
    {
        Category::query()->create($this->validatedData($request));

        return redirect()
            ->route('admin.categories')
            ->with('success', 'Category created successfully.');
    }

    public function show(Category $category): RedirectResponse
    {
        return redirect()->route('admin.categories');
    }

    public function edit(Category $category): RedirectResponse
    {
        return redirect()->route('admin.categories');
    }

    public function update(Request $request, Category $category): RedirectResponse
    {
        $previousIcon = $category->icon;
        $category->update($this->validatedData($request, $category));

        if ($previousIcon && $previousIcon !== $category->icon) {
            Storage::disk('public')->delete($previousIcon);
        }

        return redirect()
            ->route('admin.categories')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();

        if ($category->icon) {
            Storage::disk('public')->delete($category->icon);
        }

        return redirect()
            ->route('admin.categories')
            ->with('success', 'Category deleted successfully.');
    }

    /**
     * @return array{name: string, slug: string, description: string|null, icon: string|null, meta_title: string|null, meta_description: string|null}
     */
    private function validatedData(Request $request, ?Category $category = null): array
    {
        $categoryId = $category?->id;

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('categories', 'name')->ignore($categoryId)],
            'description' => ['nullable', 'string', 'max:1000'],
            'icon' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:1000'],
        ]);

        $baseSlug = Str::slug($data['name']) ?: 'category';
        $slug = Str::substr($baseSlug, 0, 255);
        $suffix = 2;

        while (Category::query()->where('slug', $slug)->when($categoryId !== null, fn ($query) => $query->where('id', '!=', $categoryId))->exists()) {
            $ending = '-'.$suffix++;
            $slug = Str::substr($baseSlug, 0, 255 - strlen($ending)).$ending;
        }

        $data['slug'] = $slug;
        $data['icon'] = $request->hasFile('icon')
            ? $request->file('icon')->store('categories/icons', 'public')
            : $category?->icon;

        return $data;
    }
}
