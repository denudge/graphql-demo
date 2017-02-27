<?php

namespace App\GraphQL\Type;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

use App\Model\User;
use App\Model\Comment;

class UserType extends GraphQLType
{

    protected $attributes = [
        'name' => 'User',
        'description' => 'The Schema of a User Type',
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of the comment',
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of the user',
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The email address of the user',
            ],
            'comments' => [
                'type' => Type::listOf(GraphQL::type('comment')),
                'description' => 'The comments of the user',
            ]
        ];
    }

    // If you want to resolve the field yourself, you can declare a method
    // with the following format resolve[FIELD_NAME]Field()
    protected function resolveIdField(User $root, $args)
    {
        return $root->getId();
    }

    protected function resolveNameField(User $root, $args)
    {
        return $root->getName();
    }

    protected function resolveEmailField(User $root, $args)
    {
        return $root->getEmail();
    }

    protected function resolveCommentsField(User $root, $args)
    {
        return Comment::findByUserId($root->getId());
    }
}
