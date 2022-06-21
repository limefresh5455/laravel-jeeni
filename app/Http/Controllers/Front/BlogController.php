<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    /**
     * Show the application Homepage.
     *
     * @param Request $request
     * @param string $slug
     * @return Renderable
     */
    public function getData(Request $request, string $slug = ''): Renderable
    {
        if($slug == '') {
            abort(404);
        } else {
            $blog = Post::whereSlug($slug)->first();
            $relatedBlogs = Post::published()
                ->whereNotIn('id', [$blog->id])
                ->latest()->limit(3)->get();
            return view('front.blog.single', compact(
                'blog',
                'relatedBlogs'));
        }
    }

    /**
     * Show all the blogs.
     * @return Renderable
     */
    public function blogs(): Renderable
    {
        $blogs = Post::published()->latest()->paginate(12);
        return view('front.blog.list', compact('blogs'));
    }
}
