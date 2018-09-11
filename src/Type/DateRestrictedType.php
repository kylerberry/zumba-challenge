<?php
namespace MyApp\Type;

use GraphQL\Type\Definition\InterfaceType;
use MyApp\Types;

class DateRestrictedType extends InterfaceType
{
    public function __construct()
    {
        $config = [
            'name' => 'DateRestricted',
            'fields' => [
                'dateFrom' => Types::string(),
                'dateTo' => Types::string(),
            ]
        ];
        parent::__construct($config);
    }
}