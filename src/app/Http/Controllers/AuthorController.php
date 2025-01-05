<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware; // Import for middleware

class AuthorController extends Controller implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            'auth', // Require authentication for all methods in this controller
        ];
    }

    // Display all Authors
    public function list(): View
    {
        $items = Author::orderBy('name', 'asc')->get();

        return view(
            'author.list',
            [
                'title' => 'Authors',
                'items' => $items,
            ]
        );
    }

    // Display new Author form
    public function create(): View
    {
        return view(
            'author.form',
            [
                'title' => 'Add new author',
                'author' => new Author(), // Pass an empty Author object for create
            ]
        );
    }

    // Create new Author
    public function put(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author = new Author();
        $author->name = $validatedData['name'];
        $author->save();

        return redirect('/authors');
    }

    // Update existing Author data
    public function patch(Author $author, Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $author->name = $validatedData['name'];
        $author->save();

        return redirect('/authors');
    }

    // Delete an Author
    public function delete(Author $author): RedirectResponse
    {
        // This is a good place to check if the author has related Book items and prevent deletion if so
        $author->delete();

        return redirect('/authors')->with('success', 'Author deleted successfully!');
    }
}
