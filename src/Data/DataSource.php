<?php
namespace MyApp\Data;

use MyApp\Model\Music;

class DataSource
{
    private static $music = [];

    public static function init()
    {
        self::$music = [
            '1' => new Music([
                'id' => '1',
                'url' => 'https://cdn.example.com/music/1',
                'name' => 'Bailando',
                'dateFrom' => '2018-09-01 00:00:00',
                'dateTo' => '2018-09-02 00:00:00'
            ]),
            '2' => new Music([
                'id' => '2',
                'url' => 'https://cdn.example.com/music/2',
                'name' => 'Bohemian Rhapsody',
                'dateFrom' => '2018-08-01 00:00:00', // an active by date
                'dateTo' => '2019-09-03 00:00:00'
            ]),
            '3' => new Music([
                'id' => '3',
                'url' => 'https://cdn.example.com/music/3',
                'name' => 'Bawitdaba',
                'dateFrom' => '2018-09-03 00:00:00',
                'dateTo' => '2018-09-04 00:00:00'
            ]),
        ];
    }

    public static function getMusicById($id)
    {
        return isset(self::$music[(string)$id]) ? self::$music[(string)$id] : null;
    }

    public static function getAllMusic()
    {
        return self::$music;
    }
}