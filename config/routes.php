<?php
use vendor\mvcsoft\base\Router;

/**
 * please place the custom rules above the default ones
 */

Router::add('^$', ['controller'=>'Index', 'action'=>'show']);
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix'=>'admin']);

Router::add('^admin$', ['controller'=>'IndexController', 'action'=>'show', 'prefix'=>'admin']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');