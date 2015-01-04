<?php

/*

Класс отображения контент блока

*/

class PHPcontentBlockView {
    var $alias;
    var $blockID;
    var $templates;
    var $default_templates;
    var $count_post;

    var $title;
    var $introtext;
    var $fulltext;
    var $date;
    var $link;
    var $str_count;
    var $id;

    var $str;
    var $title_block;
    var $page_link;
    var $time;

    function view($arDataBase,$arParams){
        session_start();
        $PHPdatabase = new PHPdatabase;
        $PHPdatabase->connect($arDataBase);

        $this->alias      = htmlspecialchars($arParams[alias]);
        $this->templates  = htmlspecialchars($arParams[path_templates]);
        $this->count_post = htmlspecialchars($arParams[count_post]);
        $this->page_link  = htmlspecialchars($arParams[page_link]);

        $this->str = htmlspecialchars($_GET[str]);


        $this->default_templates = '/templates/default/view_content_block.tpl';


        $sql= mysql_query("SELECT * FROM phpframe_content_block WHERE _alias = '$this->alias' AND _status = 'A' ORDER BY id  DESC ");
        $val = mysql_fetch_array($sql);

        $this->bloclID = $val[id];
        $this->title_block = $val[_title];

        $this->templates = $_SERVER[DOCUMENT_ROOT].$this->templates;
        $this->default_templates = $_SERVER[DOCUMENT_ROOT].$this->default_templates;


        if($this->alias AND $this->count_post ) {

            /* педжирование */

            $this->str_count = $this->count_post;

            if($this->str) {
                $this->count_post = $this->str;
            }


            $sql= mysql_query("SELECT * FROM phpframe_post

       WHERE _content_block = '$this->bloclID' AND _status = 'P' AND _element_cart = 'N' AND _publish_main = 'on' 

       ORDER BY id  DESC LIMIT  $this->count_post");

        }

        $count_block = 0; while( $val = mysql_fetch_array($sql)){ $count_block++;

            $this->id           = $val[id];
            if($this->page_link == 'Y') {
                $this->title        = $val[_title].'<a name="'.$this->id.'"></a>';
            }else{
                $this->title        = $val[_title];
            }
            $this->introtext    = $val[_introtext];
            $this->fulltext     = $val[_fulltext];
            $this->date  = $val[_date];
            $this->time         = $val[_time];
            $this->link         = '/?section=content&page='.$val[id].'';

            if(file_exists($this->templates) AND $this->templates !== NULL){

                include $this->templates;

            }else{

                include $this->default_templates;

            }

        }

        if($count_block == 0 AND $_SESSION[SITE_CONTENT]) {print '<font color="#FF0035">Content Not exists.</font>';}

        $this->str = $this->count_post + $this->str_count;

        /* Считаем сколько всего записей  */

        $sql_= mysql_query("SELECT * FROM phpframe_post

       WHERE _content_block = '$this->bloclID' AND _status = 'P' AND _element_cart = 'N' AND _publish_main = 'on' 

       ORDER BY id  DESC");

        $counter = 0; while(mysql_fetch_array($sql_)){ $counter++; }

        if($this->count_post < $counter AND $this->page_link == 'Y' ) {

            print '<a class="view_anext_post" href="?section=content&block='.$this->alias.'&str='.$this->str.'#'.$this->id.'">'.$arParams[text_all_link].'</a>';

        }
    }
}