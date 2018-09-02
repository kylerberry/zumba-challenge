<?php
namespace MyApp\Type;

use MyApp\Type\MediaType;
use MyApp\TypeRegistry;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class MusicType extends ObjectType {

    public function __construct() {
        $config = [
            'fields' => [
                'id' => Type::id(),
                'name' => Type::String(),
                'url' => Type::String(),
                'dateStart' => Type::String(),
                'dateEnd' => Type::String()
            ],
            'interfaces' => [
                TypeRegistry::media(),
                TypeRegistry::dateRestricted(),
            ]
        ];
        parent::__construct($config);
    }
}
