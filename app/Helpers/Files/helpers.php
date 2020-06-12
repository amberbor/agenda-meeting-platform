<?php

if(!function_exists('app_locale')){

    /**
     * @return string|string[]
     */
    function app_locale()
    {
        return str_replace('_', '-', app()->getLocale());
    }
}

if(!function_exists('is_active_route')){

    /**
     * @param string $route_name
     * @return string
     */
    function is_active_route(string $route_name): string
    {
        return (request()->route()->getName() == $route_name) ? 'active' : '';
    }
}

if(!function_exists('is_active')){

    /**
     * @param string $url
     * @return string
     */
    function is_active(string $url): string
    {
        return request()->is($url) ? 'active' : '';
    }
}

if(!function_exists('is_collapsed')){

    /**
     * @param string $url
     * @return string
     */
    function is_collapsed(string $url): string
    {
        return request()->is($url) ? '' : 'collapsed';
    }
}

if(!function_exists('is_shown')){

    /**
     * @param string $url
     * @return string
     */
    function is_shown(string $url): string
    {
        return request()->is($url) ? 'show' : '';
    }
}
