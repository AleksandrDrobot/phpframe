<?php

class PHPgalleries
{
    var $title;
    var $desc;
    var $action;
    var $result;
    var $result_id;
    var $id;
    var $edit;
    var $sql_view_galleries;
    var $dell;
    var $create;
    var $action_upload;
    var $title_img;
    var $img_desc;
    var $path_orig_img;
    var $path_normal_img;
    var $path_min_img;
    var $path_hot_img;
    var $path_img;
    var $type_img;
    var $path_orig_img_link;
    var $path_normal_img_link;
    var $path_min_img_link;
    var $view_img_galery;
    var $delete;


    function add($arDataBase)
    {

        $PHPdatabase = new PHPdatabase;
        $PHPdatabase->connect($arDataBase);

        $this->title = htmlspecialchars($_POST[title]);
        $this->desc = $_POST[desc];
        $this->action = htmlspecialchars($_POST[action]);
        $this->id = htmlspecialchars($_GET[id]);
        $this->edit = htmlspecialchars($_GET[edit]);
        $this->dell = htmlspecialchars($_GET[dell]);
        $this->create = htmlspecialchars($_GET[create]);
        $this->action_upload = htmlspecialchars($_POST[action_upload]);
        $this->title_img = htmlspecialchars($_POST[title_img]);
        $this->img_desc = htmlspecialchars($_POST[img_desc]);


        if ($this->edit == 'edit_all') {
            $this->edit = true;


            $this->sql_view_galleries = mysql_query("SELECT * FROM phpframe_galleries  ORDER BY id  DESC ");

            if ($this->dell > 0) {

                $sql = mysql_query("SELECT * FROM phpframe_galleries_img WHERE _id_galleries='$this->dell'");
                while ($val = mysql_fetch_array($sql)) {

                    if ($val[_path_orig]) {
                        unlink($val[_path_orig]);
                    }
                    if ($val[_path_norm]) {
                        unlink($val[_path_norm]);
                    }
                    if ($val[_path_min]) {
                        unlink($val[_path_min]);
                    }
                }

                mysql_query("DELETE  FROM  phpframe_galleries_img WHERE _id_galleries='$this->dell' ");

                if (mysql_query("DELETE  FROM  phpframe_galleries WHERE id='$this->dell' ")) {
                    header('Location: /?section=controlPanel&element=galleries&edit=edit_all&dell=deletel', true, 303);
                }

            }


        } else {
            $this->edit = false;
        }

        if ($this->action AND $this->title) {

            if (!$this->id) {

                $this->result = mysql_query("INSERT INTO phpframe_galleries(_title, _desc) VALUES ('$this->title' ,  '$this->desc') ");
                $sql = mysql_query("SELECT * FROM phpframe_galleries  ORDER BY id  DESC LIMIT 1");
                $val = mysql_fetch_array($sql);
                $this->result_id = $val[id];

                if ($this->result) {
                    header('Location: /?section=controlPanel&element=galleries&id=' . $this->result_id . '&create=new', true, 303);
                }

            } else {
                mysql_query("UPDATE phpframe_galleries SET _title='$this->title',  _desc= '$this->desc'  WHERE id='$this->id' ");

            }

        }

        if ($this->id) {
            $this->delete = htmlspecialchars($_GET[delete]);
            if ($this->delete) {

                $sql = mysql_query("SELECT * FROM phpframe_galleries_img WHERE id='$this->delete'");
                $val = mysql_fetch_array($sql);

                if ($val[_path_orig]) {
                    unlink($val[_path_orig]);
                }
                if ($val[_path_norm]) {
                    unlink($val[_path_norm]);
                }
                if ($val[_path_min]) {
                    unlink($val[_path_min]);
                }

                mysql_query("DELETE  FROM  phpframe_galleries_img WHERE id='$this->delete' ");

            }

            $sql = mysql_query("SELECT * FROM phpframe_galleries WHERE id='$this->id'  ORDER BY id  DESC LIMIT 1");
            $val = mysql_fetch_array($sql);

            $this->title = $val[_title];
            $this->desc = $val[_desc];

            if ($this->action_upload == 8764536887467364562) {

                $this->path_orig_img = $_SERVER[DOCUMENT_ROOT] . '/section/galleries/library/img/galleries/original/';
                $this->path_normal_img = $_SERVER[DOCUMENT_ROOT] . '/section/galleries/library/img/galleries/preview_normal/';
                $this->path_min_img = $_SERVER[DOCUMENT_ROOT] . '/section/galleries/library/img/galleries/preview_min/';

                $uploaddir = $this->path_orig_img;
                $uploadfile = $uploaddir . basename($_FILES['uploadfile']['name']);


                @copy($_FILES['uploadfile']['tmp_name'], $uploadfile);

                $this->path_hot_img = $this->path_orig_img . $_FILES['uploadfile']['name'];
                $this->type_img = $_FILES['uploadfile']['type'];
                $img_orig = mt_rand(1111, 9999) . '-' . $_FILES['uploadfile']['name'];
                $this->path_img = $this->path_orig_img . $img_orig;
                @rename($this->path_hot_img, $this->path_img);


                if ($this->type_img == trim('image/jpeg')) {
                    $no_unlink = 1;
                }
                if ($this->type_img == trim('image/png')) {
                    $no_unlink = 1;
                }
                if ($this->type_img == trim('image/gif')) {
                    $no_unlink = 1;
                }
                if ($this->type_img == trim('image/jpg')) {
                    $no_unlink = 1;
                }

                if ($no_unlink !== 1) {
                    @unlink($this->path_img);
                } else {

                    $image = new SimpleImage();
                    $image->load($this->path_img);
                    $image->resizeToWidth(700);
                    $img_normal = 'prew-' . mt_rand(1111, 9999) . '-' . $_FILES['uploadfile']['name'];
                    $this->path_normal_img = $this->path_normal_img . $img_normal;
                    $image->save($this->path_normal_img);

                    $image->load($this->path_img);
                    $image->resizeToWidth(300);
                    $img_min = 'prew-' . mt_rand(1111, 9999) . '-' . $_FILES['uploadfile']['name'];
                    $this->path_min_img = $this->path_min_img . $img_min;
                    $image->save($this->path_min_img);

                    $this->path_orig_img_link = '/section/galleries/library/img/galleries/original/' . $img_orig;
                    $this->path_min_img_link = '/section/galleries/library/img/galleries/preview_min/' . $img_min;
                    $this->path_normal_img_link = '/section/galleries/library/img/galleries/preview_normal/' . $img_normal;

                    $date = date("Y-m-d");
                    $time = date("H:m:s");

                    if (!$this->title_img) {
                        $this->title_img = $date;
                    }

                    mysql_query("
 INSERT INTO phpframe_galleries_img(_title , _desc, _sort, _path_orig, _path_norm, _path_min, _link_orig,  _link_norm, _link_min, _date, _time,  _id_galleries
 ) VALUES (
'$this->title_img' , '$this->img_desc' , '0' , '$this->path_img', '$this->path_normal_img', '$this->path_min_img', '$this->path_orig_img_link', '$this->path_normal_img_link','$this->path_min_img_link','$date','$time','$this->id'
 )");

                }

            }

            if ($_POST[hids_sort]) {
                $pos = 0;
                foreach ($_POST as $val) {
                    $pos++;

                    mysql_query("UPDATE phpframe_galleries_img SET _sort='$pos' WHERE id='$val' ");

                }
            }

            $this->view_img_galery = mysql_query("SELECT * FROM phpframe_galleries_img WHERE _id_galleries='$this->id' ORDER BY _sort  ASC ");

        }

    }
}