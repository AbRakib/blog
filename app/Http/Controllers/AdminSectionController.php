<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AdminSectionController extends Controller
{
    public function __invoke(string $section): View
    {
        $menuItem = collect(config('admin_menu.items'))
            ->firstWhere('path', $section);

        abort_unless($menuItem, 404);

        return view('backend.section', [
            'menuItem' => $menuItem,
        ]);
    }
}
