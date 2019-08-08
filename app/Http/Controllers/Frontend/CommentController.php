<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentRequest;
use Validator;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $request->merge([
            'star' => $request->rating,
        ]);

        Comment::create($request->all());

        return redirect()->route('home.product')->with([
            'flash_level' => 'success',
            'flash_message' => 'Cảm ơn bạn đã đánh giá sản phẩm!'
        ]);
    }
}
