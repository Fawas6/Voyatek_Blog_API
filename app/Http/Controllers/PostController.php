<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Postlike;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function createPost(Request $request, $blogID) {
        try {
            $request->validate([
                'content' => ['required'],
            ]);

            $post = Post::create([
                'blog_id' => $blogID,
                'content' => $request->content
            ]);

            return response()->json(['error' => false, 'message' => 'success', 'data' => $post], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage(), 'data' => null], 500);
        }
    }

    public function getAllBlogPosts($id) {
        try {
            $data = Post::where('blog_id', $id)->get();

            return response()->json(['error' => false, 'message' => 'success', 'data' => $data], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage(), 'data' => null], 500);
        }
    }

    public function getPost($id) {
        try {
            $data = Post::with(['comments'])->find($id);

            return response()->json(['error' => false, 'message' => 'success', 'data' => $data], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage(), 'data' => null], 500);
        }
    }

    public function updatePost(Request $request, $id) {
        try {
            $post = Post::find($id);

            $post->update([
                'content' => $request->filled('content') ? $request->input('content') : $post->content
            ]);

            $post = Post::find($id);

            return response()->json(['error' => false, 'message' => 'success', 'data' => $post], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage(), 'data' => null], 500);
        }
    }

    public function deletePost($id) {
        try {
            $post = Post::find($id);

            $data = $post->delete();

            return response()->json(['error' => false, 'message' => 'success', 'data' => $data], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage(), 'data' => null], 500);
        }
    }

    public function like($id)
    {
        try {
            if (Postlike::where('user_id', '1')->where('post_id', $id)->exists()) {
                $post = Post::find($id);
                $post->likes_count--;
                $post->save();

                Postlike::where('user_id', '1')->where('post_id', $id)->delete();

                return response()->json(['error' => false, 'message' => 'success', 'data' => $post], 201);
            } else {
                $post = Post::find($id);
                $post->likes_count++;
                $post->save();
                $likes = $post->likes_count;

                $post_like = Postlike::create([
                    'user_id' => '1',
                    'post_id' => $id
                ]);

                return response()->json(['error' => false, 'message' => 'success', 'likes' => $likes, 'post_like' => $post_like], 201);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage(), 'data' => null], 500);
        }
    }
}
