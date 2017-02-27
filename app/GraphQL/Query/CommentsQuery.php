<?php

namespace App\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;

use App\Model\Comment;

class CommentsQuery extends Query
{
    protected $attributes = [
        'name' => 'Comment query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('comment'));
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::int()]
        ];
    }

    public function resolve($root, $args)
    {
        if(isset($args['id'])) {
            return Comment::getById($args['id']);
        } else {
            return Comment::all();
        }
    }
}

