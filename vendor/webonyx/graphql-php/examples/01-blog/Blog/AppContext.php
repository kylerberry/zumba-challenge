<?php
namespace GraphQL\Blog;

use GraphQL\Blog\Data\User;

/**
 * Class AppContext
 * Instance available in all GraphQL resolvers as 3rd argument
 *
 * @package GraphQL\Blog
 */
class AppContext
{
    /**
     * @var string
     */
    public $rootUrl;

    /**
     * @var User
     */
    public $viewer;

    /**
     * @var \mixed
     */
    public $request;
}
