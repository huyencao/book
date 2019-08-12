<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;
use App\Models\Comment;

class CommentRepository extends EloquentRepository
{
    public function model()
    {
        return \App\Models\Comment::class;
    }

    public function listComment($product_id)
    {
        $comment = Comment::with('product')->where('product_id', $product_id)->limit(5)->get();

        return $comment;
    }
}
