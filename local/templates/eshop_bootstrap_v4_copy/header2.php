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
	
	
	
</head>
<body style="    background-color: chartreuse;     overflow-x: hidden;">
<?/*
<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
*/?>





<style>

.panelmenu{
	background-color: white;
    width: 90%;
    position: fixed;
    z-index: 500;
    height: 100%;
	
	padding: 14px 8px 1px 20px;
}

.drodownmenu{
	
}

/*
.drodownsection{
	border-bottom: 1px solid rgba(97, 97, 97, 0.2);
	padding: 11px 0px 11px 0px;
	
}
*/


.drodownelement{
	
	
}


.drodownsection .drodownelement {
	display: none;	
}






.enclosure{
    background-image: url(/local/templates/assest/img/arrow1.png);
    background-repeat: no-repeat;
    background-position: right 0px center;	
	
}




.drodownsection:hover >.drodownelement {
	display: block;
	
	
}



.headdrodown{
	border-bottom: 1px solid rgba(97, 97, 97, 0.2);
	padding: 11px 0px 11px 0px;
}









.drodownmenu:hover > .drodownsection:not(:hover){
	display: none;
	
}


/*Скрытие заголовка при открытие раздела */
.drodownsection:hover .level1{
	display: none;
	
}










.level2{
	display: block;
	
}



.drodownsection:hover > .levels2{
	display: block;
	
}






.levels2{
	display: none;	
	
}

.drodownsection .level22{
	display: block;
	
}






/*.level2:hover:before*/



.levels2:hover > .level2:not(:hover){
	display: none;
	
}


.level22{
	display: block !important;	
	
}




.level22:hover > .clickpoint1:not(:hover){
	display: none;
	
}








</style>


<!-- Панель Меню -->
<div class="panelmenu">
	<div class="drodownmenu">

<!-- Более правильный раздел -->


		<!-- Раздел I -->
		<div class="drodownsection">
		
		
			<div class="headdrodown enclosure level1">
				Вложенный 1 = 1
			</div>	
			
			
			<div class="levels2">
			
			<div class="headdrodown enclosure level2 head2">
				Вложенный 1 = 1
			</div>
			
			
			
			<div class="drodownelement level2 level22">
			
			
			
				<!-- Раздел II -->
				<div class="drodownsection clickpoint1">
				
				
					<div class="headdrodown enclosure">
						Вложенный 2 = 1
					</div>	
					<div class="drodownelement">
					
						<!-- Пункт III -->
						<div class="drodownsection">
							<div class="headdrodown enclosure">
							Вложенный 3 = 1
							</div>	
						</div>
						
						<!-- Пункт III -->	
						<div class="drodownsection">
							<div class="headdrodown enclosure">
							Вложенный 3 = 2
							</div>	
						</div>
						
					</div>
					
					
				</div>
				
				
				
				
				
				
				<!-- Раздел II -->
				<div class="drodownsection clickpoint1">
				
				
					<div class="headdrodown enclosure">
						Вложенный 2 = 1
					</div>	
					<div class="drodownelement">
						<div class="drodownsection">
						
						

							<div class="headdrodown enclosure">
							Вложенный 3 = 1
							</div>	
						</div>
						<div class="drodownsection">
							<div class="headdrodown enclosure">
							Вложенный 3 = 2
							</div>	
						</div>
					</div>
					
					
				</div>	
				
				
					
				
				
				
			</div>
			
			
			
			
			
			
			</div>
			
			
		</div>
		
		
		
		
		
		
		
		<!-- Раздел I -->
		<div class="drodownsection">
		
		
			<div class="headdrodown enclosure level1">
				Вложенный 1 = 1
			</div>	
			
			
			<div class="levels2">
			
			<div class="headdrodown enclosure level2 head2">
				Вложенный 1 = 1
			</div>
			
			
			
			<div class="drodownelement level2 level22">
			
			
			
				<!-- Раздел II -->
				<div class="drodownsection clickpoint1">
				
				
					<div class="headdrodown enclosure">
						Вложенный 2 = 1
					</div>	
					<div class="drodownelement">
					
						<!-- Пункт III -->
						<div class="drodownsection">
							<div class="headdrodown enclosure">
							Вложенный 3 = 1
							</div>	
						</div>
						
						<!-- Пункт III -->	
						<div class="drodownsection">
							<div class="headdrodown enclosure">
							Вложенный 3 = 2
							</div>	
						</div>
						
					</div>
					
					
				</div>
				
				
				
				
				
				
				<!-- Раздел II -->
				<div class="drodownsection clickpoint1">
				
				
					<div class="headdrodown enclosure">
						Вложенный 2 = 1
					</div>	
					<div class="drodownelement">
						<div class="drodownsection">
						
						

							<div class="headdrodown enclosure">
							Вложенный 3 = 1
							</div>	
						</div>
						<div class="drodownsection">
							<div class="headdrodown enclosure">
							Вложенный 3 = 2
							</div>	
						</div>
					</div>
					
					
				</div>	
				
				
					
				
				
				
			</div>
			
			
			
			
			
			
			</div>
			
			
		</div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		<!-- Раздел I -->
		<div class="drodownsection">
		
		
			<div class="headdrodown enclosure">
				Вложенный 1 = 1
			</div>	
			<div class="drodownelement">
				<div class="drodownsection">
				
				
					<div class="headdrodown enclosure">
						Вложенный 2 = 1
					</div>	
					<div class="drodownelement">
						<div class="drodownsection">
							<div class="headdrodown enclosure">
							Вложенный 3 = 1
							</div>	
						</div>
						<div class="drodownsection">
							<div class="headdrodown enclosure">
							Вложенный 3 = 2
							</div>	
						</div>
					</div>
					
					
				</div>
			</div>
			
		</div>
			
			
	
			
			
			
		
		
		
<?/*		
		
		<div class="drodownsection">
		
		
			<div class="headdrodown enclosure">
				Вложенный 1 = 1
			</div>	
			<div class="drodownelement">
				<div class="drodownsection">
				
				
					<div class="headdrodown enclosure">
						Вложенный 2 = 1
					</div>	
					<div class="drodownelement">
						<div class="drodownsection">
							<div class="headdrodown enclosure">
							Вложенный 3 = 1
							</div>	
						</div>
						<div class="drodownsection">
							<div class="headdrodown enclosure">
							Вложенный 3 = 1
							</div>	
						</div>
					</div>
					
					
				</div>
			</div>
			
		</div>





*/?>




	</div>
</div>













</br></br></br></br></br>
























<?/* Старое меню



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
                    <div class="header-middle-control-basket__product">999 товаров</div>
                    <div class="header-middle-control-basket__product">999 999 руб.</div>
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

		
		
		
		
		
      </div>
	  
	  
	  
	  <script>



</script>








*/?>























































