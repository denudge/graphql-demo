<?php

namespace App\GraphQL\Query;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;

use App\Model\User;

class UsersQuery extends Query
{
    protected $attributes = [
        'name' => 'User query'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('user'));
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::int()],
            'name' => ['name' => 'name', 'type' => Type::string()],
            'email' => ['name' => 'email', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args)
    {
        if(isset($args['id'])) {
            return User::getById($args['id']);
        } elseif(isset($args['name'])) {
            return User::getByName($args['name']);
        } elseif (isset($args['email'])) {
            return User::getByEmail($args['email']);
        } else {
            return User::all();
        }
    }
}

