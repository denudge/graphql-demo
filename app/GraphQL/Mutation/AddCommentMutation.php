<?php

namespace App\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;

use App\Model\Comment;
use App\Model\User;

class AddCommentMutation extends Mutation
{
    /**
     * Attributes of mutation.
     *
     * @var array
     */
    protected $attributes = [
        'name' => 'AddComment'
    ];

    /**
     * Type that will be mutated.
     *
     * @return mixed
     */
    public function type()
    {
        return GraphQL::type('comment');
    }

    /**
     * Arguments of mutation.
     *
     * @return array
     */
    public function args()
    {
        return [
            'text' => [
                'name' => 'text',
                'type' => Type::nonNull(Type::string())
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::nonNull(Type::string())
            ],
        ];
    }

    /**
     * Resolve mutation.
     *
     * @param  string $root
     * @param  array $args
     * @return Comment|null
     */
    public function resolve($root, $args)
    {
        $user = array_first(User::getByEmail($args['email']));
        if (!$user) {
            throw new \Exception('Unable to find user');
        }

        $comment = new Comment($user->getId(), rand(5000,9999), $args['text']);

        \Log::debug('Created new comment for user ' . $user->getName());

        return $comment;
    }

}

