<?php

namespace MyApp;
/**
 * Class AppContext
 * Instance available in all GraphQL resolvers as 3rd argument
 *
 */
class AppContext
{
    /**
     * @var string
     */
    public $rootUrl;

    /**
     *
     */
    public $viewer;

    /**
     * @var \mixed
     */
    public $request;
}