<div class="title_elem">
    <table>
        <tr>
            <td><img src="/section/controlPanel/library/images/file_manager.png"</td>
            <td><? $message->text($arParamSection[title], 'title_') ?></td>
        </tr>
    </table>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#myTable").tableDnD({
            onDragClass: "dragRow",
            onDrop: function (table, row) {
                var data = new Object();
                data.data = new Object();
                data.key = $(table).find("tbody tr td").attr("rel");
                $(row).fadeOut("fast").fadeIn("slow");
                $(table).find("tbody tr").each(function (i, e) {
                    var id = $(e).find("td:first").attr("id");
                    var order = i + 1;
                    data.data[order] = id;
                    $(e).find("td[rel=sort_order]").html(order);
                });

                $.ajax({
                    type: "POST",
                    url: "url для обработки данных",
                    data: data,
                    success: function (html) {
                        $("#myTable tr").removeClass("color");
                        $("#myTable tr:even").addClass("color");
                    }
                });
            }
        });
    });
</script>
<? if ($PHPgalleries->dell) { ?>
    <div id="div">
        <div class="complete">
            <a onClick="hide_show();return false;" class="icon_cl" id="link"><img class="hidden_link_icon"
                                                                                  src="/section/controlPanel/library/images/hidden_icon.png"></a>
            <? $message->text($TEXT[74], 'msg') ?>
        </div>
    </div>
<? } ?>
<? if ($PHPgalleries->delete) { ?>
    <div id="div">
        <div class="complete">
            <a onClick="hide_show();return false;" class="icon_cl" id="link"><img class="hidden_link_icon"
                                                                                  src="/section/controlPanel/library/images/hidden_icon.png"></a>
            <? $message->text($TEXT[86], 'msg') ?>
        </div>
    </div>
<? } ?>
<? if ($PHPgalleries->create) { ?>
    <div id="div">
        <div class="complete">
            <a onClick="hide_show();return false;" class="icon_cl" id="link"><img class="hidden_link_icon"
                                                                                  src="/section/controlPanel/library/images/hidden_icon.png"></a>
            <? $message->text($TEXT[76], 'msg') ?>
        </div>
    </div>
<? } ?>
<? if (!$PHPgalleries->edit) { ?>
    <script>
        tinymce.init({
            selector: "textarea",
            theme: "modern",
            language: "ru",
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor"
            ],
            content_css: "css/content.css",
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
            style_formats: [
                {title: 'Bold text', inline: 'b'},
                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                {title: 'Example 1', inline: 'span', classes: 'example1'},
                {title: 'Example 2', inline: 'span', classes: 'example2'},
                {title: 'Table styles'},
                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
            ]
        });
    </script>
    <form action="" method="post">
        <div class="block_content_form">
            <div class="block_title_category_status">
                <table>
                    <tr>
                        <td><? $message->text($TEXT[71], $title_error) ?></td>
                        <td><input name="title" value="<?= $PHPgalleries->title ?>" type="text"></td>
                        <td style="padding-top: 14px;">
                        </td>
                    </tr>
                    <tr>
                        <td><? $message->text($TEXT[70], 'title_form') ?></td>
                        <td>
                            <div class="textarea_new_gallery"><textarea name="desc"
                                                                        rows="5"><?= $PHPgalleries->desc ?></textarea>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <a name="img_list"></a>
        <input type="hidden" name="action" value="74327">
        <input type="submit" name="save" class="button_form" value="<? if ($PHPgalleries->id) {
            $message->text($TEXT[77], '');
        } else {
            $message->text($TEXT[23], '');
        } ?>">
    </form>
<? } else { ?>
    <div class="wrapper_galleri">
        <?php $counter = 0;
        while ($view = mysql_fetch_array($PHPgalleries->sql_view_galleries)) {
            $counter++; ?>

            <div class="block_icon">
                <a href="/?section=controlPanel&element=galleries&edit=edit_all&dell=<?= $view[id] ?>"
                   title="<? $message->text($TEXT[30], '') ?>"
                   onClick="return window.confirm('<?= $message->text($TEXT[45], '') ?>')" class="dell">Х</a>

                id [ <?= $view[id] ?> ] <?= $view[_title] ?>
                <img src="/section/controlPanel/library/images/menu/media.png"/>
                <span class="links"><a href="/?section=galleries&v=<?= $view[id] ?>"
                                       target="parent"><? $message->text($TEXT[72], '') ?></a> | <a
                        href="/?section=controlPanel&element=galleries&id=<?= $view[id] ?>"><? $message->text($TEXT[73], '') ?></a> </span>

            </div>
        <? } ?>
        <? if ($counter == 0) { ?> <br/><? $message->text($TEXT[75], 'no_post') ?>   <? } ?>
    </div>
<? } ?>

<? if ($PHPgalleries->id) { ?>
    <div class="wrqpper_img_list_view">
        <div class="wrappe_while_img">
            <style type="text/css">
                body {
                    font-family: Arial
                }

                #myTable thead th {
                    background: none repeat scroll 0 0 #F0F0F0;
                    border-bottom: 1px solid #fff;
                    font-size: 12px;
                    color: #666666;
                    text-align: center;
                    padding: 3px;
                    text-transform: capitalize
                }

                #myTable tbody td {
                    height: 24px;
                    border-bottom: 1px solid #fff;
                    font-size: 13px;
                    color: #666666;
                    padding: 3px 6px
                }

                #myTable tbody td a {
                    color: #268BC5
                }

                .dragRow {
                    background: #F0F0F0;
                    color: #191970;
                    border: 2px solid #FFD700
                }

                .color {
                    background: #ccc
                }
            </style>
            <form id="main_form" action="#img_list" method="post">
                <table id="myTable" border="0" cellspacing="1" cellpadding="0" width="100%">
                    <thead>

                    </thead>
                    <tbody>
                    <? $count = 0;
                    while ($view = mysql_fetch_array($PHPgalleries->view_img_galery)) {
                        $count++;
                        if (!$view[_desc]) {
                            $view[_desc] = '<span class="date_create_img_gal_list">' . $TEXT[83] . '</span>';
                        }?>
                        <tr class="tr_list_img_gal">
                            <td width="100"><img class="img" src="<?= $view[_link_min] ?>"/></td>
                            <td>id <?= $view[id] ?></td>
                            <td><?= $view[_title] ?></td>
                            <td><?= $view[_desc] ?></td>
                            <td><a class="img_list_gal_orig" href="<?= $view[_link_orig] ?>"
                                   target="parent"><? $message->text($TEXT[84], '') ?></a><input type="hidden"
                                                                                                 name="<?= $view[id] ?>"
                                                                                                 value="<?= $view[id] ?>"/>
                            </td>
                            <td><span class="date_create_img_gal_list"><?= $view[_date] ?> в <?= $view[_time] ?></span>
                            </td>
                            <td>
                                <a href="/?section=controlPanel&element=galleries&id=<?= $PHPgalleries->id ?>&delete=<?= $view[id] ?>"
                                   onClick="return window.confirm('<?= $message->text($TEXT[85], '') ?>')"><img
                                        class="icon_s_del" src="/section/controlPanel/library/images/delete.png"></a>
                            </td>
                        </tr>
                    <? } ?>
                    </tbody>
                </table>
                <? if ($count > 1) { ?>
                    <div class="line_panel_updata_sort_gal_img">
                        <input type="hidden" name="hids_sort" value="887878"/><br/><br/><input class="button_form"
                                                                                               type="submit"
                                                                                               value="<? $message->text($TEXT[82], '') ?>">
                    </div>
                <? } ?>
            </form>
            <div class="block_img">
                <form action='#img_list' method=post enctype=multipart/form-data>
                    <div class="upload_inp">
                        <span><? $message->text($TEXT[79], '') ?></span>
                        <input type=file name=uploadfile>
                        <input class="button_form" type=submit value=Загрузить>
                        <input type="hidden" name="action_upload" value="8764536887467364562"/>
                        <input type="text" class="desc" name="title_img"
                               placeholder="<? $message->text($TEXT[80], '') ?>"/>
                        <input type="text" class="desc" name="img_desc"
                               placeholder="<? $message->text($TEXT[78], '') ?>"/></div>
                </form>
            </div>
        </div>
    </div>
<? } ?>