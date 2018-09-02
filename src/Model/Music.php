<?php
namespace MyApp\Model;

use GraphQL\Utils\Utils;

class Music
{
    public $id;
    public $name;
    public $url;
    public $dateFrom;
    public $dateTo;

    public function __construct(array $data)
    {
        Utils::assign($this, $data);
    }
}