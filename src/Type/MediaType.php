<?php
namespace MyApp\Type;

use MyApp\Types;
use GraphQL\Type\Definition\InterfaceType;

class MediaType extends InterfaceType
{
    public function __construct()
    {
        $config = [
            'name' => 'Media',
            'fields' => [
                'url' => Types::string()
            ]
        ];
        parent::__construct($config);
    }
}