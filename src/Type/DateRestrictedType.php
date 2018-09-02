<?php
namespace MyApp\Type;

use GraphQL\Type\Definition\InterfaceType;
use GraphQL\Type\Definition\Type;

class DateRestrictedType extends InterfaceType
{
    public function __construct()
    {
        $config = [
            'name' => 'DateRestricted',
            'fields' => [
                'dateFrom' => Type::String(),
                'dateTo' => Type::String(),
            ]
        ];
        parent::__construct($config);
    }
}