<?php

class PHPgallery
{

    var $id;
    var $description;
    var $title;
    var $img_list;
    var $galleries_list;
    var $img_galery_icon;
    var $limit;
    var $next_link;


    function view($arDataBase, $arParamSection)
    {

        $PHPdatabase = new PHPdatabase;
        $PHPdatabase->connect($arDataBase);

        $this->id = htmlspecialchars($_GET[v]);


        $val = mysql_fetch_array(mysql_query("SELECT * FROM phpframe_galleries WHERE id='$this->id'"));

        $this->description = $val[_desc];
        $this->title = $val[_title];

        $this->img_list = mysql_query("SELECT * FROM phpframe_galleries_img WHERE _id_galleries='$this->id' ORDER BY _sort  ASC ");


        if (htmlspecialchars($_GET[q])) {
            $this->limit = htmlspecialchars($_GET[q]);
        } else {
            $this->limit = $arParamSection[count_galleries];
        }

        $count = 0;
        $sql = mysql_query("SELECT * FROM phpframe_galleries  ORDER BY id  DESC ");
        while ($val = mysql_fetch_array($sql)) {
            $count++;
        }


        $this->next_link = $this->limit + $arParamSection[count_galleries];


        $this->galleries_list = mysql_query("SELECT * FROM phpframe_galleries  ORDER BY id  DESC LIMIT $this->limit");

        $sql = mysql_query("SELECT * FROM phpframe_galleries  ORDER BY id  DESC LIMIT $this->limit,5");
        $val = mysql_fetch_array($sql);


        if ($count > $arParamSection[count_galleries] AND $this->limit < $count) {
            $this->next_link = '<a class="pagination" href="/?section=galleries&q=' . $this->next_link . '#' . $val[id] . '">' . $arParamSection[tex_next_link] . '</a>';
        } else {

            unset($this->next_link);

        }


    }

    function add_img_galery_icon($arDataBase, $id)
    {
        $PHPdatabase = new PHPdatabase;
        $PHPdatabase->connect($arDataBase);
        $val = mysql_fetch_array(mysql_query("SELECT * FROM phpframe_galleries_img WHERE _id_galleries='$id' ORDER BY RAND()"));
        $this->img_galery_icon = $val[_link_min];
        $this->img_galery_icon = '<img src="' . $this->img_galery_icon . '?' . mt_rand(111, 999) . '" width="' . $width . '" class="img_galery_icon"/><a name="' . $id . '">';
    }
}