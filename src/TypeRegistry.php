<?php
namespace MyApp;

use MyApp\Type\MediaType;
use MyApp\Type\DateRestrictedType;

use MyApp\Type\MusicType;
use MyApp\Type\QueryType;

use GraphQL\Type\Definition\ObjectType;

// @note this could be automated
class TypeRegistry
{
    // Object types
    private static $music;
    private static $query;

    /**
     * @return MusicType
     */
    public static function music()
    {
       return self::$music ?: (self::$music = new MusicType());
    }

    /**
     * @return QueryType
     */
    public static function query()
    {
        return self::$query ?: (self::$query = new QueryType());
    }

    // Interface types
    private static $media;
    private static $dateRestricted;

    /**
     * @return MediaType
     */
    public static function media()
    {
        return new MediaType();
    }

    /**
     * @return DateRestrictedType
     */
    public static function dateRestricted()
    {
        return new DateRestrictedType();
    }
}