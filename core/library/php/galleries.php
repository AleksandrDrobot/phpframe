<?php

class PHPgalleriesAPI
{

    var $arGalleriesList;
    var $galleryicon;
    var $img;
    var $counter;
    var $title;
    var $desc;
    var $id;
    var $rov;
    var $rowimg;


    function GetList($arDataBase, $limit)
    {

        $PHPdatabase = new PHPdatabase;
        $PHPdatabase->connect($arDataBase);

        $this->counter = 0;
        $sql = mysql_query("SELECT * FROM phpframe_galleries  ORDER BY id  DESC LIMIT $limit");
        while ($val = mysql_fetch_array($sql)) {

            $img_icon = mysql_query("SELECT * FROM phpframe_galleries_img WHERE _id_galleries = '$val[id]'  ORDER BY id  DESC LIMIT $limit");
            $vals = mysql_fetch_array($img_icon);
             $vals[_link_norm];

            $this->img[] = '<img src="'.$vals[_link_min].'" />';
            $this->arGgalleriesList[] = $val;

        }
    }

    function GetByID($arDataBase,$id){

        $PHPdatabase = new PHPdatabase;
        $PHPdatabase->connect($arDataBase);

        $val =  mysql_fetch_array(mysql_query("SELECT * FROM phpframe_galleries  WHERE id='$id'"));
        $this->title = $val[_title];
        $this->desc = $val[_desc];
        $this->id = $val[id];
        $img_icon = mysql_fetch_array(mysql_query("SELECT * FROM phpframe_galleries_img WHERE _id_galleries = '$val[id]' ORDER BY RAND()"));
        $this->img = $img_icon[_link_min];

        $this->row = array(
            "id" => $this->id,
            "title" => $this->title,
            "desc" => $this->desc,
            "icon" => $this->img
        );

        $sql = mysql_query("SELECT * FROM phpframe_galleries_img WHERE _id_galleries = '$val[id]'  ORDER BY _sort  ASC ");
        while($val = mysql_fetch_array($sql)){

            $this->rowimg[] = $val;

        }
    }
}