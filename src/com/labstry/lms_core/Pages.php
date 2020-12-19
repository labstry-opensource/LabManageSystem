<?php


namespace com\labstry\lms_core;


class Pages
{
    public $connection;
    public $page_table = 'lms_page';

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function checkHasPageBySlug($language, $parent_slug, $slug){
        return $this->connection->count($this->page_table, '*', [
            'slug[=]' => $slug,
            'parent_slug[=]' => $parent_slug,
            'locale[=]' => $language,
        ]);
    }

    public function getPagePropBySlug($language, $parent_slug, $slug){
        return $this->connection->get($this->page_table, '*', [
            'slug[=]' => $slug,
            'parent_slug[=]' => $parent_slug,
            'locale[=]' => $language,
        ]);
    }

    public function getParentPage($slug){

    }

    public function getSubPage($language, $slug){
        return $this->connection->select($this->page_table, '*', [
            'locale[=]' => $language,
            'parent_slug[=]' => $slug,
        ]);
    }

    public function hasSubPage($language, $slug){
        return $this->connection->count($this->page_table, '*', [
            'locale[=]' => $language,
            'parent_slug[=]' => $slug,
        ]);
    }

    public function getRecurseSubPages($language, $slug){
        $page_arr = array();
        if($this->hasSubPage($language, $slug)) {
            $page_arr = $this->getSubPage($language, $slug);

            /* Check if there is more subpages. Possibly the user could create multiple
             * pages with multiple layers
             */

            foreach ($page_arr as $index => $page_item){
                if($this->hasSubPage($language, $page_item['slug'])){
                    $page_arr[$index]['pages'] = $this->getRecurseSubPages($language, $page_item['slug']);
                }
            }
            return $page_arr;
        }
        return null;
    }

    public function getPages($language = null){
        if(!empty($language)){
            $where_arr = [
                'locale[=]' => $language,
            ];
        }else{
            $where_arr = array();
        }
        return $this->connection->select($this->page_table, '*', $where_arr);
    }


    public function getFSPages($language = null){

    }
}