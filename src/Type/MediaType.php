<?php
namespace MyApp\Type;

use GraphQL\Type\Definition\InterfaceType;
use GraphQL\Type\Definition\Type;

class MediaType extends InterfaceType
{
    public function __construct()
    {
        $config = [
            'name' => 'Media',
            'fields' => [
                'url' => Type::String()
            ]
        ];
        parent::__construct($config);
    }
}