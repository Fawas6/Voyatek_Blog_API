<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function createBlog(Request $request) {
        try {
            $request->validate([
                'title' => ['required', 'string'],
                'image' => ['required', 'string'],
                'article' => ['required']
            ]);

            $blog = Blog::create([
                'title' => $request->title,
                'image' => $request->image,
                'article' => $request->article
            ]);

            return response()->json(['error' => false, 'message' => 'success', 'data' => $blog], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage(), 'data' => null], 500);
        }
    }

    public function getAllBlogs() {
        try {
            $data = Blog::all();

            return response()->json(['error' => false, 'message' => 'success', 'data' => $data], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage(), 'data' => null], 500);
        }
    }

    public function getBlog($id) {
        try {
            $data = Blog::with(['posts'])->find($id);

            return response()->json(['error' => false, 'message' => 'success', 'data' => $data], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage(), 'data' => null], 500);
        }
    }

    public function updateBlog(Request $request, $id) {
        try {
            $blog = Blog::find($id);

            $blog->update([
                'title' => $request->filled('title') ? $request->input('title') : $blog->title,
                'image' => $request->filled('image') ? $request->input('image') : $blog->image,
                'article' => $request->filled('article') ? $request->input('article') : $blog->article,
            ]);

            $blog = Blog::find($id);

            return response()->json(['error' => false, 'message' => 'success', 'data' => $blog], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage(), 'data' => null], 500);
        }
    }

    public function deleteBlog($id) {
        try {
            $blog = Blog::find($id);

            $data = $blog->delete();

            return response()->json(['error' => false, 'message' => 'success', 'data' => $data], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage(), 'data' => null], 500);
        }
    }
}
