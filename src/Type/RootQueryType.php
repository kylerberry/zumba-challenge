<?php
namespace MyApp\Type;

use MyApp\AppContext;
use MyApp\Types;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;

class RootQueryType extends ObjectType
{
    public function __construct()
    {
        // break into music queries class, video queries class, etc
        // get benefit from user to return what they're allowed to see
        $config = [
            'name' => 'Query',
            'fields' => [
                'musicById' => [
                    'type' => Types::music(),
                    'description' => 'Returns a music by id',
                    'args' => [
                        'id' => Types::nonNull(Types::id())
                    ]
                ],
                'allMusic' => [
                    'type' => Types::listOf(Types::music()),
                    'description' => 'Returns all available music',
                ],
                'hello' => Types::string()
            ],
            'resolveField' => function($val, $args, $context, ResolveInfo $info) {
                return $this->{$info->fieldName}($val, $args, $context, $info);
            }
        ];
        parent::__construct($config);
    }

    public function musicById ($rootValue, $args) {
        return EntityManager::getRepository('Music')->find($args['id']);
    }

    public function allMusic () {
        return EntityManager::getRepository('Music')->findAll();
    }

    public function hello()
    {
        return 'Your graphql-php endpoint is ready! Use GraphiQL to browse API';
    }
}