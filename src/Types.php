<?php
namespace MyApp;

use MyApp\Type\MediaType;
use MyApp\Type\DateRestrictedType;

use MyApp\Type\MusicType;
use MyApp\Type\RootQueryType;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ListOfType;
use GraphQL\Type\Definition\NonNull;
use GraphQL\Type\Definition\Type;

// @note this could be automated
class Types
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
     * @return RootQueryType
     */
    public static function query()
    {
        return self::$query ?: (self::$query = new RootQueryType());
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

    public static function boolean()
    {
        return Type::boolean();
    }

    /**
     * @return \GraphQL\Type\Definition\FloatType
     */
    public static function float()
    {
        return Type::float();
    }

    /**
     * @return \GraphQL\Type\Definition\IDType
     */
    public static function id()
    {
        return Type::id();
    }

    /**
     * @return \GraphQL\Type\Definition\IntType
     */
    public static function int()
    {
        return Type::int();
    }

    /**
     * @return NonNull
     */
    public static function nonNull()
    {
        return new NonNull();
    }

    /**
     * @return ListOfType
     */
    public static function listOf()
    {
        return new ListOfType();
    }

    /**
     * @return \GraphQL\Type\Definition\StringType
     */
    public static function string()
    {
        return Type::string();
    }
}