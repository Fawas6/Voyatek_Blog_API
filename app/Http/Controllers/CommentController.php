<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function createComment(Request $request, $postID) {
        try {
            $request->validate([
                'content' => ['required'],
            ]);

            $comment = Comment::create([
                'user_id' => '1',
                'post_id' => $postID,
                'content' => $request->content
            ]);

            return response()->json(['error' => false, 'message' => 'success', 'data' => $comment], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => true, 'message' => $e->getMessage(), 'data' => null], 500);
        }
    }
}
