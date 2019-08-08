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

    public function listComment()
    {
        $comment = Comment::with('product')->limit(5)->get();

        return $comment;
    }
}
