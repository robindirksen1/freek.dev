<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController
{
    public function __invoke(Request $request, Post $post)
    {
        if (request()->route('postSlug')) {
            //check if the post slug is correct, if not, redirect to the correct one for SEO
            dd(request()->route('postSlug'), $post->idSlug());

            if (request()->route('postSlug') !== $post->idSlug()) {
                return redirect($post->url, 301);
            }
        }

        $ad = Ad::getForCurrentPage();

        return view('front.posts.show', compact('post', 'ad'));
    }
}
