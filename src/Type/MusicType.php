<?php
namespace MyApp\Type;

use MyApp\Types;

use GraphQL\Type\Definition\ObjectType;

class MusicType extends ObjectType {

    public function __construct() {
        $config = [
            'fields' => [
                'id' => Type::id(),
                'name' => Type::string(),
                'url' => Type::string(),
                'dateStart' => Type::string(),
                'dateEnd' => Type::string()
            ],
            'interfaces' => [
                Types::media(),
                Types::dateRestricted(),
            ]
        ];
        parent::__construct($config);
    }
}
