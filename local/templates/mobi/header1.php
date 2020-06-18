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
        <div class="scrollHeader">
          <div class="scrollHeader__col one"><a class="scrollHeader__logo" href="/"><img class="scrollHeader__logo-img" src="/local/templates/eshop_bootstrap_v4/assets/img/logo.png" alt=""></a></div>
          <div class="scrollHeader__col two">
            <ul class="scrollHeader-menu">
              <li class="scrollHeader-menu__item"><a class="scrollHeader-menu__link" href="#">ТОРГОВОЕ ОБОРУДОВАНИЕ </a>
                <div class="header-menu-sub">
                  <div class="header-menu-sub__col one">
                    <div class="header-menu-sub-menu">
                      <ul class="header-menu-sub-menu__items">
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link no_arrow" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/1.png)"></span><span class="header-menu-sub-menu__link-name">Каталог</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/2.png)"></span><span class="header-menu-sub-menu__link-name">Для магазинов</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/3.png)"></span><span class="header-menu-sub-menu__link-name">Вешала</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/4.png)"></span><span class="header-menu-sub-menu__link-name">Торговые системы</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/5.png)"></span><span class="header-menu-sub-menu__link-name">Кассовые стойки, ресепшн</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/6.png)"></span><span class="header-menu-sub-menu__link-name">Демонстрационные столы</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link no_arrow" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/7.png)"></span><span class="header-menu-sub-menu__link-name">Зеркала</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/8.png)"></span><span class="header-menu-sub-menu__link-name">Ювелирные витрины</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/9.png)"></span><span class="header-menu-sub-menu__link-name">Торговая мебель</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link no_arrow" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/10.png)"></span><span class="header-menu-sub-menu__link-name">Световые полки</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link no_arrow" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/11.png)"></span><span class="header-menu-sub-menu__link-name">Корзины</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/12.png)"></span><span class="header-menu-sub-menu__link-name">Демонстрационные формы</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/13.png)"></span><span class="header-menu-sub-menu__link-name">Вешала настольные</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/14.png)"></span><span class="header-menu-sub-menu__link-name">Ценникодержатели</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link no_arrow" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/1.png)"></span><span class="header-menu-sub-menu__link-name">Каталог</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/2.png)"></span><span class="header-menu-sub-menu__link-name">Для магазинов</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/3.png)"></span><span class="header-menu-sub-menu__link-name">Вешала</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/4.png)"></span><span class="header-menu-sub-menu__link-name">Торговые системы</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/5.png)"></span><span class="header-menu-sub-menu__link-name">Кассовые стойки, ресепшн</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/6.png)"></span><span class="header-menu-sub-menu__link-name">Демонстрационные столы</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link no_arrow" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/7.png)"></span><span class="header-menu-sub-menu__link-name">Зеркала</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/8.png)"></span><span class="header-menu-sub-menu__link-name">Ювелирные витрины</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/9.png)"></span><span class="header-menu-sub-menu__link-name">Торговая мебель</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link no_arrow" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/10.png)"></span><span class="header-menu-sub-menu__link-name">Световые полки</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link no_arrow" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/11.png)"></span><span class="header-menu-sub-menu__link-name">Корзины</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/12.png)"></span><span class="header-menu-sub-menu__link-name">Демонстрационные формы</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/13.png)"></span><span class="header-menu-sub-menu__link-name">Вешала настольные</span><span class="header-menu-sub-menu__link-line"></span></a></li>
                        <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/14.png)"></span><span class="header-menu-sub-menu__link-name">Ценникодержатели</span><span class="header-menu-sub-menu__link-line"></span></a></li>
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
              </li>
              <li class="scrollHeader-menu__item"><a class="scrollHeader-menu__link" href="#">ПРОИЗВОДСТВО МЕБЕЛИ НА ЗАКАЗ</a>
              </li>
              <li class="scrollHeader-menu__item"><a class="scrollHeader-menu__link" href="#">ДИЗАЙН-ПРОЕКТ</a>
              </li>
              <li class="scrollHeader-menu__item"><a class="scrollHeader-menu__link" href="#">ПОРТФОЛИО</a>
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
              </li>
              <li class="scrollHeader-menu__item"><a class="scrollHeader-menu__link" href="#">ШОУ-РУМ</a>
              </li>
              <li class="scrollHeader-menu__item"><a class="scrollHeader-menu__link" href="#">КОНТАКТЫ</a>
              </li>
            </ul>
          </div>
          <div class="scrollHeader__col three">
            <div class="scrollHeader-control"><a class="scrollHeader-control__link toggleTitle" href="#" data-title="Сравнение">
                <div class="scrollHeader-control__link-icon lnr lnr-sort-amount-asc"></div></a><a class="scrollHeader-control__link toggleTitle" href="#" data-title="Избранное">
                <div class="scrollHeader-control__link-icon lnr lnr-heart"></div></a></div>
            <div class="scrollHeader-basket">
              <div class="scrollHeader-basket__icon lnr lnr-cart toggleTitle" data-title="Корзина"></div>
              <div class="scrollHeader-basket__order">
                <div class="scrollHeader-basket__order-text">999 товаров</div>
                <div class="scrollHeader-basket__order-text">999 999 руб.</div>
              </div>
            </div>
          </div>
        </div>
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
                          <li class="header-menu-sub-menu__item"><a class="header-menu-sub-menu__link no_arrow" href="#"><span class="header-menu-sub-menu__link-icon" style="background-image: url(assets/img/popup/menu/11.png)"></span><span class="header-menu-sub-menu__link-name">Корзины</span><span class="header-menu-sub-menu__link-line"></span></a></li>
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