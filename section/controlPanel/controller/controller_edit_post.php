<?



$PHPeditPost = new PHPeditPost;
$PHPeditPost->view($arDataBase);

$PHPeditPost->sql = $PHPeditPost->view($arDataBase); // массив выборки мз бд

$PHPeditPost->cart_post($arDataBase);

$PHPeditPost->add           = htmlspecialchars($_GET[add]);
$PHPeditPost->post_cart     = htmlspecialchars($_GET[cart]);
$PHPeditPost->dell_cart     =  htmlspecialchars($_GET[del_cart]);
$PHPeditPost->add_post_cart = htmlspecialchars($_GET[add_post_cart]);
$PHPeditPost->cart_unlink   =  htmlspecialchars($_GET[cart_unlink]);
if($PHPeditPost->add == 'true'){

	$PHPeditPost->add = true;
}



if($PHPeditPost->post_cart !== 'Y'){

$arParamSection[title] = "Контент";

$img = '<img src="/section/controlPanel/library/images/edit_post.png">';

}else{

$arParamSection[title] = "Корзина";

$img = '<img src="/section/controlPanel/library/images/cart.png">';

}

if($PHPeditPost->post_cart){ $TEXT[26] = $TEXT[33]; }