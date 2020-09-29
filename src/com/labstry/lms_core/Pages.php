<?php


namespace com\labstry\lms_core;


class Pages
{
    public $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function checkHasPageBySlug($language, $parent_slug, $slug){
        return $this->connection->count('lms_page', '*', [
            'slug[=]' => $slug,
            'parent_slug[=]' => $parent_slug,
            'locale[=]' => $language,
        ]);
    }

    public function getPagePropBySlug($language, $parent_slug, $slug){
        return $this->connection->get('lms_page', '*', [
            'slug[=]' => $slug,
            'parent_slug[=]' => $parent_slug,
            'locale[=]' => $language,
        ]);
    }

    public function getParentPage($slug){

    }
}