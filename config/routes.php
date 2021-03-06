<?php
/**
 * Created by PhpStorm.
 * User: parus
 * Date: 19.09.2018
 * Time: 11:49
 */
return [
    '([a-zA-Z]+)/([0-9]+)' => 'blog/detail/$2',
    'news/([a-zA-Z]+)' => 'news/index/$1',
    'news' => 'news/index',
    'comment' => 'comments/index',
    'about' => 'about/about',
    'contacts' => 'contacts/contacts',
    'blog' => 'blog/blog',
    '[a-zA-Z]+' => 'index/index',
    '' => 'index/index',
];