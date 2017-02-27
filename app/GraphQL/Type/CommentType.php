<?php

namespace App\GraphQL\Type;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

use App\Model\Comment;
use App\Model\User;

class CommentType extends GraphQLType
{

    protected $attributes = [
        'name' => 'Comment',
        'description' => 'The Schema of a Comment Type'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the comment',
            ],
            'text' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The text of the comment',
            ],
            'timestamp' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The timestamp of the comment',
            ],
            'parent_status' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The parent status of the comment',
            ],
            'likes_count' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The likes count of the comment',
            ],
            'user_id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The user id of the comment',
            ],
            'user' => [
                'type' => GraphQL::type('user'),
                'description' => 'The user of the comment',
            ]
        ];
    }

    protected function resolveIdField(Comment $root, $args)
    {
        return $root->getId();
    }

    protected function resolveTextField(Comment $root, $args)
    {
        return $root->getText();
    }

    protected function resolveTimestampField(Comment $root, $args)
    {
        return $root->getTimestamp();
    }

    protected function resolveParentStatusField(Comment $root, $args)
    {
        return $root->getParentStatus();
    }

    protected function resolveLikesCountField(Comment $root, $args)
    {
        return $root->getLikesCount();
    }

    protected function resolveUserIdField(Comment $root, $args)
    {
        return $root->getUserId();
    }

    protected function resolveUserField(Comment $root, $args)
    {
        return array_first(User::getById($root->getUserId()));
    }
}