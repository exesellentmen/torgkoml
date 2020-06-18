

<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/header.php");
CJSCore::Init(array("fx"));

\Bitrix\Main\UI\Extension::load("ui.bootstrap4");

if (isset($_GET["theme"]) && in_array($_GET["theme"], array("blue", "green", "yellow", "red")))
{
	COption::SetOptionString("main", "wizard_eshop_bootstrap_theme_id", $_GET["theme"], false, SITE_ID);
}
$theme = COption::GetOptionString("main", "wizard_eshop_bootstrap_theme_id", "green", SITE_ID);

$curPage = $APPLICATION->GetCurPage(true);

?><!DOCTYPE html>
<html xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
<head>



<script>






 
<?//Функция для исправления ошибки битрикса?>


(function() {
	
    let oldHref = window.location.href;
	if(oldHref.substring(0, oldHref.indexOf("filter")) != ''){
		oldHref = oldHref.substring(0, oldHref.indexOf("filter"));
	}
	var ttteeee111 = oldHref;
	
	
   var intervalID = setInterval(function() {
		checkurl();
    }, 100);
	
	//Старый интервал
	function checkurl(){
		ttteeee111 = window.location.href;
		if(ttteeee111.substring(0, ttteeee111.indexOf("filter")) != ''){
			ttteeee111 = ttteeee111.substring(0, ttteeee111.indexOf("filter"));
		}
		if (oldHref !== ttteeee111) {
				oldHref = ttteeee111;
		}
	}
	
	
	//Новый интервал
	function checkurl1(){
		ttteeee111 = window.location.href;
		if(ttteeee111.substring(0, ttteeee111.indexOf("filter")) != ''){
			ttteeee111 = ttteeee111.substring(0, ttteeee111.indexOf("filter"));
		}
		if (oldHref !== ttteeee111) {
				oldHref = ttteeee111;
				location.reload();
		}
	}
	
	
	
	//Событие кнопки назад
	addEventListener("popstate",function(e){
		
		//Прерываем старый интервал
		clearInterval(intervalID);

		
		//Запускаем новый интервал
		let timerId = setInterval(function() {
			checkurl1();
		}, 100);
		
		//Прерываем интервал если ссылка не поменялась
		setTimeout(() => { clearInterval(timerId);  }, 5000);
		
	},false);
	
	
	
	
})();

 







</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>




<style>

.correctclass{
    padding-top: unset !important;
    width: unset !important;
    border: unset !important;
    border-radius: unset !important;
    background-color: unset !important;
    transition: unset !important;
	
	
}

.sectionCatalogMenu__item .sectionCatalogMenuSub{
	display:none;
}


.sectionCatalogMenu__item.active .sectionCatalogMenuSub{
	display: block;
}


</style>








<?
// начинаем сессию
session_start();
 
//$_SESSION['breadcr'] = 111;
 


?>









<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">








<style>


body{
overflow-x: hidden !important; 
}

















</style>






<?
/*
$IBLOCK_ID    = 20;
$link = "katalog-tovarov-3/torgovye-sistemy/typetorgsistem-is-horizont";

$arFilter    = Array(
      'IBLOCK_ID'=>$IBLOCK_ID,
	  
		
      'GLOBAL_ACTIVE'=>'Y');
$obSection    = CIBlockSection::GetTreeList($arFilter,$arSelect=Array("UF_LINKSECT","UF_IMGSECT1"));

while($arResult = $obSection->GetNext()){
	
}
*/


				
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php'); 
if(!CModule::IncludeModule("iblock"))
return; 



$IBLOCK_ID    = 20;

//$url = $_SERVER['REQUEST_URI'];
//echo $url;

$link = $_SERVER['REQUEST_URI'];
//$link = '/katalog-tovarov-3/torgovye-sistemy/typetorgsistem-is-horizont';


//echo $link;

	// Назначение фильтра по инф блоку, по id категории
		 $arFilter1    = Array(
		  'IBLOCK_ID'=>$IBLOCK_ID, 
		 // 'CREATED_BY'=>20,
		  'GLOBAL_ACTIVE'=>'Y',
		  'PROPERTY_link'=>$link,
		  );
		  
		  $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM","PROPERTY_*");
		  
			$res = CIBlockElement::GetList(Array(), $arFilter1 , false);

//Проверка на наличие подразделов и вывод вступления
		if ($el = $res->Fetch()){
			echo "<title>$el[NAME]</title>";
			
			//echo '<div class="header-menu-sub">'; // Открытие подменю
			
			//print_r($el);
			
		}
		else{?>
		
		<title><?$APPLICATION->ShowTitle()?></title>	
			
			<?
		}





?>










<?/*	<title><?$APPLICATION->ShowTitle()?></title>
	*/?>
	
	
	
	
	
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
	<link rel="shortcut icon" type="image/x-icon" href="<?=SITE_DIR?>favicon.ico" />

<?/* Пробую убрать
	<? $APPLICATION->ShowHead(); ?>
	*/?>
	
	<meta http-equiv="Content-Type" content="text/html; charset=<?=LANG_CHARSET;?>" />

<? $APPLICATION->ShowMeta("keywords") ?><!--  - Вывод мета тега keywords -->

<? $APPLICATION->ShowMeta("description") ?><!--  - Вывод мета тега description -->

<? $APPLICATION->ShowCSS(); ?><!--  - Подключение основных файлов стилей template_styles.css и styles.css -->

<? $APPLICATION->ShowHeadStrings() ?><!--  - Отображает специальные стили, JavaScript попробовать перенести в футер -->

<? $APPLICATION->ShowHeadScripts() ?><!--  - Вывода служебных скриптов попробовать перенести в футер -->
	
	
	
	<!-- Скрипты дизайна -->
	
	
	<meta content="ie=edge" http-equiv="x-ua-compatible">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" media="screen">
    <link rel="stylesheet" href="/local/templates/eshop_bootstrap_v4/assets/css/foundation.css">
    <link rel="stylesheet" href="/local/templates/eshop_bootstrap_v4/assets/js/jquery.jscrollpane.css">
    <link rel="stylesheet" href="/local/templates/eshop_bootstrap_v4/assets/css/app.css"><!--[if lt IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script><![endif]-->
	
	<!-- Корректировки -->
	<link href="/local/templates/eshop_bootstrap_v4/assets/css/stylestartpv.css" rel="stylesheet">
	
	
	
	<style>
	
	body{
		overflow: overlay;
		
	}
	
	.banner-index .slick-dots{
	    margin-top: 1rem !important;
	}
	
	
	.header-top-aut__link {
		color: #fff !important;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	</style>
	
	
	
	
	
	
	<style>
	
	@media(min-width:1270px){
		
		
		.scrollHeader-menu__item{
			    margin-left: 6% !important;
			
		}
		
		
		.scrollHeader-basket__order{
		display:none !important;	
		}
		
		
		
		
		.scrollHeader-menu{
					margin-left: 6%;
		}
		
		.scrollHeader-menu__item:nth-child(1){
			margin-left: 0% !important;
		}
		
		
		.scrollHeader-menu__link{
				font-size: 12px;
			
		}
		
	
		.scrollHeader{
			padding: 0 20px;
		}
		
		.header-top.scroll{
			display: none;
		}
		
		.scrollHeader{
			top: 0px;
		}
		
		.scrollHeader-basket{
			margin-left: 20px;
			
		}
		
		.inicon{
			text-align: justify;
			text-align-last: justify;
			width: 12%;
		}
		
		
	}	
		
		@media(min-width:1350px){
			
			.scrollHeader{
			padding: 0 60px;
		}
			
		}
	
	
	
	</style>
	
	
	
	
	
	
	
	
	
	
	
	
</head>
<body>


<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>


    <div class="wrapper">
      <div class="header">
        <div class="header-top">
          <div class="header-top__col one">
            <ul class="header-top-menu">
              <li class="header-top-menu__item"><a class="header-top-menu__link" href="#">О нас</a></li>
              <li class="header-top-menu__item"><a class="header-top-menu__link" href="#">Доставка и оплата</a></li>
              <li class="header-top-menu__item"><a class="header-top-menu__link" href="#">Дилерам</a></li>
            </ul>
          </div>
          <div class="header-top__col two">
            <div class="header-top-search">
              <form class="header-top-search__form" action="" method="get">
                <div class="header-top-search__wrap">
                  <div class="header-top-search__col one">
                    <div class="header-top-search-input">
                      <input class="header-top-search-input__text" type="text" name="q" placeholder="Поиск">
                    </div>
                  </div>
                  <div class="header-top-search__col two toggleTitle" data-title="Голосовой поиск">
                    <button class="header-top-search__submit">
                      <div class="lnr lnr-mic header-top__icon whiteHover"></div>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="header-top__col mobile">
            <div class="header-top-control">
			<div style="width: 100%;">
		
              <div class="header-top-control__item" style="margin-left: 0px;"><a class="header-top-control__menu toggleTitle" href="#" data-title="Сравнение"><span class="lnr lnr-sort-amount-asc header-top-control__icon"></span></a></div>
          
			  <div class="header-top-control__item" style="margin-left: calc(33% - 9.5px);"><a class="header-top-control__favourites toggleTitle" href="#" data-title="Избранное"><span class="lnr lnr-heart header-top-control__icon"></span></a></div>
            
			
			</div>
			</div>
          </div>
          <div class="header-top__col three">
            <div class="header-top-aut">
              <div class="header-top-aut__col">
                <div class="lnr lnr-user header-top-aut__icon header-top__icon toggleTitle whiteHover" data-title="Личный кабинет"></div>
              </div>
              <div class="header-top-aut__col"><a class="header-top-aut__name header-top-aut__link openPopoupleaveRequest" data-id-form="#loginForm">Семенова Елена |</a></div>
              <div class="header-top-aut__col"><a class="header-top-aut__exit header-top-aut__link">Выйти</a></div>
            </div>
          </div>
        </div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

<!-- Зафиксированное меню на одном месте -->
 <?$APPLICATION->IncludeComponent("bitrix:news.list", "menufix", Array(
	"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
		"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
		"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
		"DISPLAY_DATE" => "Y",	// Выводить дату элемента
		"DISPLAY_NAME" => "Y",	// Выводить название элемента
		"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
		"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"FIELD_CODE" => array(	// Поля
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",	// Фильтр
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
		"IBLOCK_ID" => "4",	// Код информационного блока
		"IBLOCK_TYPE" => "generalmenu",	// Тип информационного блока (используется только для проверки)
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// Включать инфоблок в цепочку навигации
		"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
		"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
		"NEWS_COUNT" => "20",	// Количество новостей на странице
		"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
		"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
		"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
		"PAGER_TITLE" => "Новости",	// Название категорий
		"PARENT_SECTION" => "",	// ID раздела
		"PARENT_SECTION_CODE" => "",	// Код раздела
		"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
		"PROPERTY_CODE" => array(	// Свойства
			0 => "Linkonsection",
			1 => "htmlcont",
			2 => "Linkslist",
			3 => "",
		),
		"SET_BROWSER_TITLE" => "Y",	// Устанавливать заголовок окна браузера
		"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
		"SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
		"SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
		"SET_STATUS_404" => "N",	// Устанавливать статус 404
		"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
		"SHOW_404" => "N",	// Показ специальной страницы
		"SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
		"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
		"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
		"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
		"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
	),
	false
);?>

		
		
		
		
		
		
		
		
		
		
		
		
<?
//Определение количества товаров в корзине и общую стоимость

if (CModule::IncludeModule("sale"))
{
   $arBasketItems = array();
   $dbBasketItems = CSaleBasket::GetList(
                  array("NAME" => "ASC","ID" => "ASC"),
                  array("FUSER_ID" => CSaleBasket::GetBasketUserID(), "LID" => SITE_ID, "ORDER_ID" => "NULL"),
                  false,
                  false,
				  array());
                  
				  
				  
   while ($arItems=$dbBasketItems->Fetch())
   {
	//   print_r($arItems);
	   
      $arItems=CSaleBasket::GetByID($arItems["ID"]);
      $arBasketItems[]=$arItems;   
      $cart_num+=$arItems['QUANTITY'];
      $cart_sum+=$arItems['PRICE']*$arItems['QUANTITY'];
   }
   if (empty($cart_num))
      $cart_num="0";
   if (empty($cart_sum))
      $cart_sum="0";
   
 // В вашей корзине  <?=$cart_num?/> товаров.На сумму <?=$cart_sum?/> рублей
   
}
?>
		
		
		
		
		
		
		
		
		
        <div class="header-middle">
          <div class="header-middle__col one"><a class="header-middle-logo" href="/"><img class="header-middle-logo__img" src="/local/templates/eshop_bootstrap_v4/assets/img/logo.png" alt=""></a></div>
          <div class="header-middle__col two">
            <div class="header-middle-phoneAddress">
              <div class="header-middle-phoneAddress__col one">
                <div class="header-middle-phone">
                  <div class="header-middle-phone__item">8 (800) 302-02-90</div>
                  <div class="header-middle-phone__item">8 (800) 302-02-90<a class="header-middle-phone__wathsapp toggleTitle" href="#" data-title="Wathsapp"></a></div>
                </div>
              </div>
              <div class="header-middle-phoneAddress__col two">
                <div class="header-middle-address">
                  <div class="header-middle-address__item">Пн-пт 9:00-18:00</div>
                  <div class="header-middle-address__item">Рублевское шоссе, д. 28, к.2</div>
                </div>
              </div>
            </div>
          </div>
          <div class="header-middle__col four">
            <div class="header-middle-btn">
              <div class="header-middle-btn__item">
                <button class="header-middle-btn__button btn-common-empty openPopoupleaveRequest" data-id-form="#orderCallback">Заказать звонок</button>
              </div>
              <div class="header-middle-btn__item">
                <button class="header-middle-btn__button btn-common-black openPopoupleaveRequest" data-id-form="#orderEquipment">Заказать оборудование</button>
              </div>
            </div>
          </div>
          <div class="header-middle__col five">
            <div class="header-middle-control">
              <div class="header-middle-control__item"><a class="header-middle-control__menu toggleTitle" href="#" data-title="Сравнение"><span class="lnr lnr-sort-amount-asc header-top__icon"></span></a></div>
              <div class="header-middle-control__item"><a class="header-middle-control__favourites toggleTitle" href="#" data-title="Избранное"><span class="lnr lnr-heart header-top__icon"></span></a></div>
              <div class="header-middle-control__item">
                <div class="header-middle-control-basket">
                  <div class="header-middle-control-basket__col one"><a class="header-middle-control__cart" href="/cart_step_1.html"><span class="lnr lnr-cart header-top__icon"></span></a></div>
                  <div class="header-middle-control-basket__col two">
				  
				  
                    <div class="header-middle-control-basket__product"><?=$cart_num?> товаров</div>
                    <div class="header-middle-control-basket__product"><?=$cart_sum?> руб.</div>
					
					
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
		
		
		
		
		
		
		
		
		
		
				


 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	".default",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(0=>"",1=>"",),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "4",
		"IBLOCK_TYPE" => "generalmenu",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(0=>"Linkonsection",1=>"htmlcont",2=>"Linkslist",3=>"",),
		"SET_BROWSER_TITLE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N"
	)
);?>

		
		
		
		
		
		
		
		
		
		
		<?/*
		
		
		
        <nav class="header-menu-nav">
          <div class="container__wrap">
            <div class="header-menu">
              <div class="header-menu__items">
                <div class="header-menu__item"><a class="header-menu__link sub" href="#">ТОРГОВОЕ ОБОРУДОВАНИЕ </a>
                  <div class="header-menu-sub">
                    <div class="header-menu-sub__col one">
                      <div class="header-menu-sub-menu">
                        <ul class="header-menu-sub-menu__items">
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link no_arrow" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/1.png)"></span><span class="header-menu-sub-menu__link-name">Каталог</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/2.png)"></span><span class="header-menu-sub-menu__link-name">Для магазинов</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/3.png)"></span><span class="header-menu-sub-menu__link-name">Вешала</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/4.png)"></span><span class="header-menu-sub-menu__link-name">Торговые системы</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/5.png)"></span><span class="header-menu-sub-menu__link-name">Кассовые стойки, ресепшн</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/6.png)"></span><span class="header-menu-sub-menu__link-name">Демонстрационные столы</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link no_arrow" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/7.png)"></span><span class="header-menu-sub-menu__link-name">Зеркала</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/8.png)"></span><span class="header-menu-sub-menu__link-name">Ювелирные витрины</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/9.png)"></span><span class="header-menu-sub-menu__link-name">Торговая мебель</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link no_arrow" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/10.png)"></span><span class="header-menu-sub-menu__link-name">Световые полки</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link no_arrow" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/11.png)"></span><span class="header-menu-sub-menu__link-name">Корзины</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/12.png)"></span><span class="header-menu-sub-menu__link-name">Демонстрационные формы</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/13.png)"></span><span class="header-menu-sub-menu__link-name">Вешала настольные</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/14.png)"></span><span class="header-menu-sub-menu__link-name">Ценникодержатели</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link no_arrow" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/1.png)"></span><span class="header-menu-sub-menu__link-name">Каталог</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/2.png)"></span><span class="header-menu-sub-menu__link-name">Для магазинов</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/3.png)"></span><span class="header-menu-sub-menu__link-name">Вешала</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/4.png)"></span><span class="header-menu-sub-menu__link-name">Торговые системы</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/5.png)"></span><span class="header-menu-sub-menu__link-name">Кассовые стойки, ресепшн</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/6.png)"></span><span class="header-menu-sub-menu__link-name">Демонстрационные столы</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link no_arrow" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/7.png)"></span><span class="header-menu-sub-menu__link-name">Зеркала</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/8.png)"></span><span class="header-menu-sub-menu__link-name">Ювелирные витрины</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/9.png)"></span><span class="header-menu-sub-menu__link-name">Торговая мебель</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link no_arrow" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/10.png)"></span><span class="header-menu-sub-menu__link-name">Световые полки</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link no_arrow" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/11.png)"></span><span class="header-menu-sub-menu__link-name">Корзины</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/12.png)"></span><span class="header-menu-sub-menu__link-name">Демонстрационные формы</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/13.png)"></span><span class="header-menu-sub-menu__link-name">Вешала настольные</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/14.png)"></span><span class="header-menu-sub-menu__link-name">Ценникодержатели</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        </ul>
                      </div>
                      <div class="header-menu-sub-menu-last">
                        <div class="header-menu-sub-menu-last__col one"></div>
                        <div class="header-menu-sub-menu-last__col two"><a class="header-menu-sub-menu-last__link" href="#">Производство мебели на заказ</a></div>
                        <div class="header-menu-sub-menu-last__col last"></div>
                      </div>
                    </div>
                    <div class="header-menu-sub__col two">
                      <div class="header-menu-sub-body active active">
                        <div class="header-menu-sub-body__col one">
                        </div>
                        <div class="header-menu-sub-body__col two">
                          <div class="header-menu-sub-body-banners">
                            <div class="header-menu-sub-body-banners__item"><a class="header-menu-sub-body-banners__link" href="#">
                                <div class="header-menu-sub-body-banners__pic"><img class="header-menu-sub-body-banners__img" src="/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/banner.png"/></div>
                                <div class="header-menu-sub-body-banners__name">НОВОЕ ПОСТУПЛЕНИЕ ВЕШАЛА В РОЗОВОМ ЗОЛОТЕ</div></a></div>
                            <div class="header-menu-sub-body-banners__item"><a class="header-menu-sub-body-banners__link" href="#">
                                <div class="header-menu-sub-body-banners__pic"><img class="header-menu-sub-body-banners__img" src="/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/banner.png"/></div>
                                <div class="header-menu-sub-body-banners__name">НОВОЕ ПОСТУПЛЕНИЕ ВЕШАЛА В РОЗОВОМ ЗОЛОТЕ</div></a></div>
                          </div>
                        </div>
                      </div>
                      <div class="header-menu-sub-body">
                        <div class="header-menu-sub-body__col one">
                          <ul class="header-menu-sub-body__items">
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Напольные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Двойные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Регулируемые</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">По странам производителям</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для аксессуаров</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для верхней одежды</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для свадебных салонов</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для брюк</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Пристенные</a></li>
                          </ul>
                        </div>
                        <div class="header-menu-sub-body__col two">
                          <div class="header-menu-sub-banner-four"><a class="header-menu-sub-banner-four__item" href="#">
                              <div class="header-menu-sub-banner-four__pic"><img class="header-menu-sub-banner-four__img" src="/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/banner.png" alt=""/></div>
                              <div class="header-menu-sub-banner-four__name">НОВОЕ ПОСТУПЛЕНИЕ ВЕШАЛА В РОЗОВОМ ЗОЛОТЕ</div></a><a class="header-menu-sub-banner-four__item" href="#">
                              <div class="header-menu-sub-banner-four__pic"><img class="header-menu-sub-banner-four__img" src="/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/banner.png" alt=""/></div>
                              <div class="header-menu-sub-banner-four__name">НОВОЕ ПОСТУПЛЕНИЕ ВЕШАЛА В РОЗОВОМ ЗОЛОТЕ</div></a><a class="header-menu-sub-banner-four__item" href="#">
                              <div class="header-menu-sub-banner-four__pic"><img class="header-menu-sub-banner-four__img" src="/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/banner.png" alt=""/></div>
                              <div class="header-menu-sub-banner-four__name">НОВОЕ ПОСТУПЛЕНИЕ ВЕШАЛА В РОЗОВОМ ЗОЛОТЕ</div></a><a class="header-menu-sub-banner-four__item" href="#">
                              <div class="header-menu-sub-banner-four__pic"><img class="header-menu-sub-banner-four__img" src="/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/banner.png" alt=""/></div>
                              <div class="header-menu-sub-banner-four__name">НОВОЕ ПОСТУПЛЕНИЕ ВЕШАЛА В РОЗОВОМ ЗОЛОТЕ</div></a>
                          </div>
                        </div>
                      </div>
                      <div class="header-menu-sub-body">
                        <div class="header-menu-sub-body__col one">
                          <ul class="header-menu-sub-body__items">
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Напольные 2</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Двойные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Регулируемые</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">По странам производителям</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для аксессуаров</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для верхней одежды</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для свадебных салонов</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для брюк</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Пристенные</a></li>
                          </ul>
                        </div>
                        <div class="header-menu-sub-body__col two">
                          <div class="header-menu-sub-banner-one"><a class="header-menu-sub-banner-one__item" href="#">
                              <div class="header-menu-sub-banner-one__pic"><img class="header-menu-sub-banner-one__img" src="/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/banner-one.png" alt=""/></div>
                              <div class="header-menu-sub-banner-one__name">НОВОЕ ПОСТУПЛЕНИЕ ВЕШАЛА В РОЗОВОМ ЗОЛОТЕ</div></a>
                          </div>
                        </div>
                      </div>
                      <div class="header-menu-sub-body">
                        <div class="header-menu-sub-body__col one">
                          <ul class="header-menu-sub-body__items">
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Напольные 3</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Двойные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Регулируемые</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">По странам производителям</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для аксессуаров</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для верхней одежды</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для свадебных салонов</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для брюк</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Пристенные</a></li>
                          </ul>
                        </div>
                        <div class="header-menu-sub-body__col two">
                          <div class="header-menu-sub-banner-plitka"><a class="header-menu-sub-banner-plitka__item cl_1" style="width: 212px; height: 358px;" href="#">
                              <div class="header-menu-sub-banner-plitka__pic"><img class="header-menu-sub-banner-plitka__img" src="/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/plitka_1.png"/></div>
                              <div class="header-menu-sub-banner-plitka__name">Вешало напольное круглое</div>
                              <div class="header-menu-sub-banner-plitka__art">Артикул: trp004</div>
                              <div class="header-menu-sub-banner-plitka__price">61 216 руб.-</div></a><a class="header-menu-sub-banner-plitka__item cl_2" style="width: 358px; height: 358px;" href="#">
                              <div class="header-menu-sub-banner-plitka__pic"><img class="header-menu-sub-banner-plitka__img" src="/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/plitka_2.png"/></div>
                              <div class="header-menu-sub-banner-plitka__name">Комплект из 3-х каркасов для столов</div>
                              <div class="header-menu-sub-banner-plitka__art">Артикул: 2404-lg</div>
                              <div class="header-menu-sub-banner-plitka__price">61 216 руб.-</div></a><a class="header-menu-sub-banner-plitka__item cl_3" style="width: 285px; height: 176px;" href="#">
                              <div class="header-menu-sub-banner-plitka__pic"><img class="header-menu-sub-banner-plitka__img" src="/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/plitka_3.png"/></div>
                              <div class="header-menu-sub-banner-plitka__name">Зеркало на колесах</div>
                              <div class="header-menu-sub-banner-plitka__art">Артикул: trp004</div>
                              <div class="header-menu-sub-banner-plitka__price">61 216 руб.-</div></a><a class="header-menu-sub-banner-plitka__item cl_4" style="width: 285px; height: 176px;" href="#">
                              <div class="header-menu-sub-banner-plitka__pic"><img class="header-menu-sub-banner-plitka__img" src="/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/plitka_4.png"/></div>
                              <div class="header-menu-sub-banner-plitka__name">Демонстрационный стол с 2-мя тумбочками</div>
                              <div class="header-menu-sub-banner-plitka__art">Артикул: DUB-1</div>
                              <div class="header-menu-sub-banner-plitka__price">61 216 руб.-</div></a>
                          </div>
                        </div>
                      </div>
                      <div class="header-menu-sub-body">
                        <div class="header-menu-sub-body__col one">
                          <ul class="header-menu-sub-body__items">
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Напольные 4</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Двойные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Регулируемые</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">По странам производителям</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для аксессуаров</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для верхней одежды</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для свадебных салонов</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для брюк</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Пристенные</a></li>
                          </ul>
                        </div>
                        <div class="header-menu-sub-body__col two">
                        </div>
                      </div>
                      <div class="header-menu-sub-body">
                        <div class="header-menu-sub-body__col one">
                          <ul class="header-menu-sub-body__items">
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Напольные 5</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Двойные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Регулируемые</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">По странам производителям</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для аксессуаров</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для верхней одежды</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для свадебных салонов</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для брюк</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Пристенные</a></li>
                          </ul>
                        </div>
                        <div class="header-menu-sub-body__col two">
                        </div>
                      </div>
                      <div class="header-menu-sub-body">
                        <div class="header-menu-sub-body__col one">
                        </div>
                        <div class="header-menu-sub-body__col two">
                        </div>
                      </div>
                      <div class="header-menu-sub-body">
                        <div class="header-menu-sub-body__col one">
                          <ul class="header-menu-sub-body__items">
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Напольные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Двойные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Регулируемые</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">По странам производителям</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для аксессуаров</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для верхней одежды</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для свадебных салонов</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для брюк</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Пристенные</a></li>
                          </ul>
                        </div>
                        <div class="header-menu-sub-body__col two">
                        </div>
                      </div>
                      <div class="header-menu-sub-body">
                        <div class="header-menu-sub-body__col one">
                          <ul class="header-menu-sub-body__items">
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Напольные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Двойные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Регулируемые</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">По странам производителям</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для аксессуаров</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для верхней одежды</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для свадебных салонов</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для брюк</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Пристенные</a></li>
                          </ul>
                        </div>
                        <div class="header-menu-sub-body__col two">
                        </div>
                      </div>
                      <div class="header-menu-sub-body">
                        <div class="header-menu-sub-body__col one">
                        </div>
                        <div class="header-menu-sub-body__col two">
                        </div>
                      </div>
                      <div class="header-menu-sub-body">
                        <div class="header-menu-sub-body__col one">
                        </div>
                        <div class="header-menu-sub-body__col two">
                        </div>
                      </div>
                      <div class="header-menu-sub-body">
                        <div class="header-menu-sub-body__col one">
                          <ul class="header-menu-sub-body__items">
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Напольные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Двойные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Регулируемые</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">По странам производителям</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для аксессуаров</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для верхней одежды</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для свадебных салонов</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для брюк</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Пристенные</a></li>
                          </ul>
                        </div>
                        <div class="header-menu-sub-body__col two">
                        </div>
                      </div>
                      <div class="header-menu-sub-body">
                        <div class="header-menu-sub-body__col one">
                          <ul class="header-menu-sub-body__items">
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Напольные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Двойные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Регулируемые</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">По странам производителям</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для аксессуаров</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для верхней одежды</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для свадебных салонов</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для брюк</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Пристенные</a></li>
                          </ul>
                        </div>
                        <div class="header-menu-sub-body__col two">
                        </div>
                      </div>
                      <div class="header-menu-sub-body">
                        <div class="header-menu-sub-body__col one">
                          <ul class="header-menu-sub-body__items">
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Напольные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Двойные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Регулируемые</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">По странам производителям</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для аксессуаров</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для верхней одежды</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для свадебных салонов</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для брюк</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Пристенные</a></li>
                          </ul>
                        </div>
                        <div class="header-menu-sub-body__col two">
                        </div>
                      </div>
                      <div class="header-menu-sub-body">
                        <div class="header-menu-sub-body__col one">
                        </div>
                        <div class="header-menu-sub-body__col two">
                        </div>
                      </div>
                      <div class="header-menu-sub-body">
                        <div class="header-menu-sub-body__col one">
                          <ul class="header-menu-sub-body__items">
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Напольные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Двойные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Регулируемые</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">По странам производителям</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для аксессуаров</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для верхней одежды</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для свадебных салонов</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для брюк</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Пристенные</a></li>
                          </ul>
                        </div>
                        <div class="header-menu-sub-body__col two">
                        </div>
                      </div>
                      <div class="header-menu-sub-body">
                        <div class="header-menu-sub-body__col one">
                          <ul class="header-menu-sub-body__items">
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Напольные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Двойные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Регулируемые</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">По странам производителям</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для аксессуаров</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для верхней одежды</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для свадебных салонов</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для брюк</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Пристенные</a></li>
                          </ul>
                        </div>
                        <div class="header-menu-sub-body__col two">
                        </div>
                      </div>
                      <div class="header-menu-sub-body">
                        <div class="header-menu-sub-body__col one">
                          <ul class="header-menu-sub-body__items">
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Напольные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Двойные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Регулируемые</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">По странам производителям</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для аксессуаров</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для верхней одежды</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для свадебных салонов</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для брюк</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Пристенные</a></li>
                          </ul>
                        </div>
                        <div class="header-menu-sub-body__col two">
                        </div>
                      </div>
                      <div class="header-menu-sub-body">
                        <div class="header-menu-sub-body__col one">
                          <ul class="header-menu-sub-body__items">
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Напольные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Двойные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Регулируемые</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">По странам производителям</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для аксессуаров</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для верхней одежды</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для свадебных салонов</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для брюк</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Пристенные</a></li>
                          </ul>
                        </div>
                        <div class="header-menu-sub-body__col two">
                        </div>
                      </div>
                      <div class="header-menu-sub-body">
                        <div class="header-menu-sub-body__col one">
                          <ul class="header-menu-sub-body__items">
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Напольные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Двойные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Регулируемые</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">По странам производителям</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для аксессуаров</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для верхней одежды</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для свадебных салонов</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для брюк</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Пристенные</a></li>
                          </ul>
                        </div>
                        <div class="header-menu-sub-body__col two">
                        </div>
                      </div>
                      <div class="header-menu-sub-body">
                        <div class="header-menu-sub-body__col one">
                        </div>
                        <div class="header-menu-sub-body__col two">
                        </div>
                      </div>
                      <div class="header-menu-sub-body">
                        <div class="header-menu-sub-body__col one">
                          <ul class="header-menu-sub-body__items">
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Напольные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Двойные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Регулируемые</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">По странам производителям</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для аксессуаров</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для верхней одежды</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для свадебных салонов</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для брюк</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Пристенные</a></li>
                          </ul>
                        </div>
                        <div class="header-menu-sub-body__col two">
                        </div>
                      </div>
                      <div class="header-menu-sub-body">
                        <div class="header-menu-sub-body__col one">
                          <ul class="header-menu-sub-body__items">
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Напольные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Двойные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Регулируемые</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">По странам производителям</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для аксессуаров</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для верхней одежды</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для свадебных салонов</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для брюк</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Пристенные</a></li>
                          </ul>
                        </div>
                        <div class="header-menu-sub-body__col two">
                        </div>
                      </div>
                      <div class="header-menu-sub-body">
                        <div class="header-menu-sub-body__col one">
                        </div>
                        <div class="header-menu-sub-body__col two">
                        </div>
                      </div>
                      <div class="header-menu-sub-body">
                        <div class="header-menu-sub-body__col one">
                        </div>
                        <div class="header-menu-sub-body__col two">
                        </div>
                      </div>
                      <div class="header-menu-sub-body">
                        <div class="header-menu-sub-body__col one">
                          <ul class="header-menu-sub-body__items">
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Напольные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Двойные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Регулируемые</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">По странам производителям</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для аксессуаров</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для верхней одежды</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для свадебных салонов</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для брюк</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Пристенные</a></li>
                          </ul>
                        </div>
                        <div class="header-menu-sub-body__col two">
                        </div>
                      </div>
                      <div class="header-menu-sub-body">
                        <div class="header-menu-sub-body__col one">
                          <ul class="header-menu-sub-body__items">
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Напольные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Двойные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Регулируемые</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">По странам производителям</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для аксессуаров</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для верхней одежды</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для свадебных салонов</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для брюк</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Пристенные</a></li>
                          </ul>
                        </div>
                        <div class="header-menu-sub-body__col two">
                        </div>
                      </div>
                      <div class="header-menu-sub-body">
                        <div class="header-menu-sub-body__col one">
                          <ul class="header-menu-sub-body__items">
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Напольные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Двойные</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Регулируемые</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">По странам производителям</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для аксессуаров</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для верхней одежды</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для свадебных салонов</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для брюк</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Пристенные</a></li>
                          </ul>
                        </div>
                        <div class="header-menu-sub-body__col two">
                        </div>
                      </div>
                      <div class="header-menu-sub-body last">
                        <div class="header-menu-sub-body__col one">
                          <ul class="header-menu-sub-body__items">
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Напольные 5</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Двойные 5</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Регулируемые 5</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">По странам производителям 5</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для аксессуаров 5</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для верхней одежды</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для свадебных салонов</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Для брюк</a></li>
                            <li class="header-menu-sub-body__item"><a class="header-menu-sub-body__link" href="#">Пристенные</a></li>
                          </ul>
                        </div>
                        <div class="header-menu-sub-body__col two"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="header-menu__item"><a class="header-menu__link sub" href="#">ПРОИЗВОДСТВО МЕБЕЛИ НА ЗАКАЗ</a>
                </div>
                <div class="header-menu__item"><a class="header-menu__link sub" href="#">ДИЗАЙН-ПРОЕКТ</a>
                </div>
                <div class="header-menu__item"><a class="header-menu__link" href="#">ПОРТФОЛИО</a>
                  <div class="header-menu-sub">
                    <ul class="header-menu-sub-disingItems">
                      <li class="header-menu-sub-disingItems__item"><a class="header-menu-sub-disingItems__link" href="#">
                          <div class="header-menu-sub-disingItems__pic" data-name="ДИЗАЙН-ПРОЕКТЫ"><img class="header-menu-sub-disingItems__img" src="/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/disingItems_1.png" alt=""></div>
                          <div class="header-menu-sub-disingItems__name">ДИЗАЙН-ПРОЕКТЫ</div></a></li>
                      <li class="header-menu-sub-disingItems__item"><a class="header-menu-sub-disingItems__link" href="#">
                          <div class="header-menu-sub-disingItems__pic" data-name="РЕАЛИЗОВАННЫЕ ПРОЕКТЫ"><img class="header-menu-sub-disingItems__img" src="/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/disingItems_2.png" alt=""></div>
                          <div class="header-menu-sub-disingItems__name">РЕАЛИЗОВАННЫЕ ПРОЕКТЫ</div></a></li>
                      <li class="header-menu-sub-disingItems__item"><a class="header-menu-sub-disingItems__link" href="#">
                          <div class="header-menu-sub-disingItems__pic" data-name="ВИДЕО-ОБЗОРЫ МАГАЗИНОВ"><img class="header-menu-sub-disingItems__img" src="/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/disingItems_2.png" alt=""></div>
                          <div class="header-menu-sub-disingItems__name">ВИДЕО-ОБЗОРЫ МАГАЗИНОВ</div></a></li>
                    </ul>
                  </div>
                </div>
                <div class="header-menu__item"><a class="header-menu__link" href="#">ШОУ-РУМ</a>
                </div>
                <div class="header-menu__item"><a class="header-menu__link" href="#">КОНТАКТЫ</a>
                </div>
              </div>
            </div>
          </div>
        </nav>
		
		
		*/?>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
      </div>
	  
	  
	  
	  <script>



</script>




































































<?/*




<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/header.php");
CJSCore::Init(array("fx"));

\Bitrix\Main\UI\Extension::load("ui.bootstrap4");

if (isset($_GET["theme"]) && in_array($_GET["theme"], array("blue", "green", "yellow", "red")))
{
	COption::SetOptionString("main", "wizard_eshop_bootstrap_theme_id", $_GET["theme"], false, SITE_ID);
}
$theme = COption::GetOptionString("main", "wizard_eshop_bootstrap_theme_id", "green", SITE_ID);

$curPage = $APPLICATION->GetCurPage(true);

?><!DOCTYPE html>
<html xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
<head>
	<title><?$APPLICATION->ShowTitle()?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
	<link rel="shortcut icon" type="image/x-icon" href="<?=SITE_DIR?>favicon.ico" />
	<? $APPLICATION->ShowHead(); ?>
</head>
<body class="bx-background-image bx-theme-<?=$theme?>" <?$APPLICATION->ShowProperty("backgroundImage");?>>
<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
<?$APPLICATION->IncludeComponent(
	"bitrix:eshop.banner",
	"",
	array()
);?>
<div class="bx-wrapper" id="bx_eshop_wrap">
	<header class="bx-header">
		<div class="bx-header-section container">
			<!--region bx-header-->
			<div class="row pt-0 pt-md-3 mb-3 align-items-center" style="position: relative;">
				<div class="d-block d-md-none bx-menu-button-mobile" data-role='bx-menu-button-mobile-position'></div>
				<div class="col-12 col-md-auto bx-header-logo">
					<a class="bx-logo-block d-none d-md-block" href="<?=SITE_DIR?>">
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							array(
								"AREA_FILE_SHOW" => "file",
								"PATH" => SITE_DIR."include/company_logo.php"),
							false
						);?>
					</a>
					<a class="bx-logo-block d-block d-md-none text-center" href="<?=SITE_DIR?>">
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							array(
								"AREA_FILE_SHOW" => "file",
								"PATH" => SITE_DIR."include/company_logo_mobile.php"
							),
							false
						);?>
					</a>
				</div>

				<div class="col-auto d-none d-md-block bx-header-personal">
					<?$APPLICATION->IncludeComponent(
						"bitrix:sale.basket.basket.line",
						"bootstrap_v4",
						array(
							"PATH_TO_BASKET" => SITE_DIR."personal/cart/",
							"PATH_TO_PERSONAL" => SITE_DIR."personal/",
							"SHOW_PERSONAL_LINK" => "N",
							"SHOW_NUM_PRODUCTS" => "Y",
							"SHOW_TOTAL_PRICE" => "Y",
							"SHOW_PRODUCTS" => "N",
							"POSITION_FIXED" =>"N",
							"SHOW_AUTHOR" => "Y",
							"PATH_TO_REGISTER" => SITE_DIR."login/",
							"PATH_TO_PROFILE" => SITE_DIR."personal/"
						),
						false,
						array()
					);?>
				</div>

				<div class="col bx-header-contact">
					<div class="d-flex align-items-center justify-content-between justify-content-md-center flex-column flex-sm-row flex-md-column flex-lg-row">
						<div class="p-lg-3 p-1">
							<div class="bx-header-phone-block">
								<i class="bx-header-phone-icon"></i>
								<span class="bx-header-phone-number">
									<?$APPLICATION->IncludeComponent(
										"bitrix:main.include",
										"",
										array(
											"AREA_FILE_SHOW" => "file",
											"PATH" => SITE_DIR."include/telephone.php"
										),
										false
									);?>
								</span>
							</div>
						</div>
						<div class="p-lg-3 p-1">
							<div class="bx-header-worktime">
								<div class="bx-worktime-title"><?=GetMessage('HEADER_WORK_TIME'); ?></div>
								<div class="bx-worktime-schedule">
									<?$APPLICATION->IncludeComponent(
										"bitrix:main.include",
										"",
										array(
											"AREA_FILE_SHOW" => "file",
											"PATH" => SITE_DIR."include/schedule.php"
										),
										false
									);?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--endregion-->

			<!--region menu-->
			<div class="row mb-4 d-none d-md-block">
				<div class="col">
					<?$APPLICATION->IncludeComponent(
						"bitrix:menu",
						"bootstrap_v4",
						array(
							"ROOT_MENU_TYPE" => "left",
							"MENU_CACHE_TYPE" => "A",
							"MENU_CACHE_TIME" => "36000000",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"MENU_THEME" => "site",
							"CACHE_SELECTED_ITEMS" => "N",
							"MENU_CACHE_GET_VARS" => array(),
							"MAX_LEVEL" => "3",
							"CHILD_MENU_TYPE" => "left",
							"USE_EXT" => "Y",
							"DELAY" => "N",
							"ALLOW_MULTI_SELECT" => "N",
							"COMPONENT_TEMPLATE" => "bootstrap_v4"
						),
						false
					);?>
				</div>
			</div>
			<!--endregion-->

			<!--region search.title -->
			<?if ($curPage != SITE_DIR."index.php"):?>
				<div class="row mb-4">
					<div class="col">
						<?$APPLICATION->IncludeComponent(
							"bitrix:search.title",
							"bootstrap_v4",
							array(
								"NUM_CATEGORIES" => "1",
								"TOP_COUNT" => "5",
								"CHECK_DATES" => "N",
								"SHOW_OTHERS" => "N",
								"PAGE" => SITE_DIR."catalog/",
								"CATEGORY_0_TITLE" => GetMessage("SEARCH_GOODS") ,
								"CATEGORY_0" => array(
									0 => "iblock_catalog",
								),
								"CATEGORY_0_iblock_catalog" => array(
									0 => "all",
								),
								"CATEGORY_OTHERS_TITLE" => GetMessage("SEARCH_OTHER"),
								"SHOW_INPUT" => "Y",
								"INPUT_ID" => "title-search-input",
								"CONTAINER_ID" => "search",
								"PRICE_CODE" => array(
									0 => "BASE",
								),
								"SHOW_PREVIEW" => "Y",
								"PREVIEW_WIDTH" => "75",
								"PREVIEW_HEIGHT" => "75",
								"CONVERT_CURRENCY" => "Y"
							),
							false
						);?>
					</div>
				</div>
			<?endif?>
			<!--endregion-->

			<!--region breadcrumb-->
			<?if ($curPage != SITE_DIR."index.php"):?>
				<div class="row mb-4">
					<div class="col" id="navigation">
						<?$APPLICATION->IncludeComponent(
							"bitrix:breadcrumb",
							"universal",
							array(
								"START_FROM" => "0",
								"PATH" => "",
								"SITE_ID" => "-"
							),
							false,
							Array('HIDE_ICONS' => 'Y')
						);?>
					</div>
				</div>
				<h1 id="pagetitle"><?$APPLICATION->ShowTitle(false);?></h1>
			<?endif?>
			<!--endregion-->
		</div>
	</header>




	<div class="workarea">
		<div class="container bx-content-section">
			<div class="row">
			<?$needSidebar = preg_match("~^".SITE_DIR."(catalog|personal\/cart|personal\/order\/make)/~", $curPage);?>
				<div class="bx-content <?=($needSidebar ? "col" : "col-md-9 col-sm-8")?>">
				
				*/?>