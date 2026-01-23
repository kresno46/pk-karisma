<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::orderByDesc('id')->paginate(10);

        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogs.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return redirect()->route('admin.blogs.edit', $blog);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            $validated['slug'] = $this->generateUniqueSlug(
                $validated['slug'] ?? $validated['title']
            );

            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('blogs', 'public');
            }

            $this->applyPublishState($validated, null);

            Blog::create($validated);
        });

        return redirect()->route('admin.blogs.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        DB::transaction(function () use ($request, $blog) {
            $validated = $request->validated();

            $slugSource = $validated['slug'] ?? $blog->slug ?? $validated['title'];
            $validated['slug'] = $this->generateUniqueSlug($slugSource, $blog->id);

            if ($request->hasFile('image')) {
                if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                    Storage::disk('public')->delete($blog->image);
                }
                $validated['image'] = $request->file('image')->store('blogs', 'public');
            }

            $this->applyPublishState($validated, $blog);

            $blog->update($validated);
        });

        return redirect()->route('admin.blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        DB::transaction(function () use ($blog) {
            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }
            $blog->delete();
        });

        return redirect()->route('admin.blogs.index');
    }

    private function generateUniqueSlug(string $source, ?int $ignoreId = null): string
    {
        $baseSlug = Str::slug($source);
        $slug = $baseSlug;
        $counter = 1;

        while (Blog::where('slug', $slug)
            ->when($ignoreId, function ($query) use ($ignoreId) {
                return $query->where('id', '!=', $ignoreId);
            })
            ->exists()
        ) {
            $slug = $baseSlug.'-'.$counter;
            $counter++;
        }

        return $slug;
    }

    private function applyPublishState(array &$validated, ?Blog $blog): void
    {
        $isPublished = !empty($validated['is_published']);
        $validated['is_published'] = $isPublished;

        if ($isPublished) {
            $validated['published_at'] = $blog?->published_at ?? now();
        } else {
            $validated['published_at'] = null;
        }
    }
}
