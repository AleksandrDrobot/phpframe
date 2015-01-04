<?php


class PHPfeedback
{
    var $mail;
    var $phone;
    var $message;
    var $action;
    var $action_message;
    var $name;


    function feedbackform($arPapam, $arDataBase)
    {
        $PHPdatabase = new PHPdatabase;
        $PHPdatabase->connect($arDataBase);

        include $_SERVER[DOCUMENT_ROOT] . '/core/message/text.php';

        $this->mail = htmlspecialchars($_POST[mail]);
        $this->phone = htmlspecialchars($_POST[phone]);
        $this->message = htmlspecialchars($_POST[message]);
        $this->action = htmlspecialchars($_POST[action]);
        $this->name = htmlspecialchars($_POST[name]);

        $date = date("Y-m-d");
        $time = date("H:m:s");

        if ($arPapam[view_mail] == 'N' AND $arPapam[view_phone] == 'N') {
            $this->action_message = true;
        }
        print '<div class="feedbackform">';
        if ($this->action == 4345349737) {
            if ($this->message AND $this->mail || $this->phone || $this->action_message == true AND $this->name) {

                if (mysql_query("INSERT INTO phpframe_feedback(_name , _mail, _phone, _message,_viewed, _date,
	 _time     )
VALUES ('$this->name' ,  '$this->mail' ,  '$this->phone' ,  '$this->message','N','$date',
				'$time') ")) {

                    print '<span class="message_send">' . $text_system[9] . '</span>';

                }

            } else {
                print '<span class="error">' . $text_system[3] . '</span>';
            }
        }

        print '<form action="" method="post">';
        print '<input style="display:block;" name="name" placeholder="' . $text_system[8] . '" type="text" />';
        if ($arPapam[view_mail] == 'Y') {
            print '<input style="display:block;" name="mail" placeholder="' . $text_system[5] . '"  type="email" />';
        }
        if ($arPapam[view_phone] == 'Y') {
            print '<input style="display:block;" name="phone" placeholder="' . $text_system[6] . '" type="text" />';
        }
        print '<textarea style="display:block;" name="message" placeholder="' . $text_system[7] . '"></textarea>';
        print '<input name="action" value="4345349737" type="hidden" />';
        print '<input style="display:block;" type="submit" value="' . $text_system[4] . '" class="submit" />';
        print '</form>';
        print '</div>';


    }

}