<?php
namespace MyApp\Type;

use MyApp\AppContext;
use MyApp\TypeRegistry;
use MyApp\Data\DataSource;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

class QueryType extends ObjectType
{
    public function __construct()
    {
        // break into music queries class, video queries class, etc
        // get benefit from user to return what they're allowed to see
        $config = [
            'name' => 'Query',
            'fields' => [
                'musicById' => [
                    'type' => TypeRegistry::music(),
                    'description' => 'Returns a music by id',
                    'args' => [
                        'id' => Type::nonNull(Type::id())
                    ]
                ],
                'allMusic' => [
                    'type' => Type::listOf(TypeRegistry::music()),
                    'description' => 'Returns all available music',
                ],
                'hello' => Type::string()
            ],
            'resolveField' => function($val, $args, $context, ResolveInfo $info) {
                return $this->{$info->fieldName}($val, $args, $context, $info);
            }
        ];
        parent::__construct($config);
    }

    public function musicById ($rootValue, $args) {
        return DataSource::getMusicById($args['id']);
    }

    public function allMusic () {
        return DataSource::getAllMusic();
    }

    public function hello()
    {
        return 'Your graphql-php endpoint is ready! Use GraphiQL to browse API';
    }
}