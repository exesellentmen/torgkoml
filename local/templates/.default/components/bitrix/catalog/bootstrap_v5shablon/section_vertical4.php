<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;

/**
 * @global CMain $APPLICATION
 * @var CBitrixComponent $component
 * @var array $arParams
 * @var array $arResult
 * @var array $arCurSection
 */

if (isset($arParams['USE_COMMON_SETTINGS_BASKET_POPUP']) && $arParams['USE_COMMON_SETTINGS_BASKET_POPUP'] == 'Y')
{
	$basketAction = isset($arParams['COMMON_ADD_TO_BASKET_ACTION']) ? $arParams['COMMON_ADD_TO_BASKET_ACTION'] : '';
}
else
{
	$basketAction = isset($arParams['SECTION_ADD_TO_BASKET_ACTION']) ? $arParams['SECTION_ADD_TO_BASKET_ACTION'] : '';
}


if ($isSidebar)
{
	$contentBlockClass = ($isSidebarLeft ? "col-md-9 col-sm-8 order-1 order-sm-2" : "col-md-9 col-sm-8 order-1");
}
else
{
	$contentBlockClass = "col";
}
?>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<script> 
	$(function(){ 
		$("body").css("background-color","aqua");
		
		$(".catalogDetailProdukts-slider__item").css("background-color","beige");
		$( ".lnr-chevron-right" ).click(function() {
			$(".catalogDetailProdukts-slider__items > .slick-list.draggable > .slick-track").css("background-color","azure");
			$(".catalogDetailProdukts-slider__items > .slick-list.draggable > .slick-track").css({'transform' : 'translate3d(-2398px, 0px, 0px)'}
			$(".catalogDetailProdukts-slider__items > .slick-list.draggable > .slick-track").css({'transform' : 'translate3d(-2398px, 0px, 0px)'}
		});
	});
</script>



  
<script> 
	
	var i = 0;
	var countelem = 0;
	
	$(function(){
		
		$( ".btright" ).click(function() {
			
			//Определяем максимальное значение перемещения
			var cou = $(this).siblings(".gallerypv").children(".qqqq").children(".scroll").children(".scroll_child").children(".elem11").length * $( ".elem11").width() * (-1);
			
			//Определение текущего положения
			var info = $(this).siblings(".gallerypv").children(".qqqq").children(".scroll").children(".scroll_child").css('transform');
			var str = info.slice(info.indexOf(",")+1, info.length);
			str = str.slice(str.indexOf(",")+1, str.length);
			str = str.slice(str.indexOf(",")+1, str.length);
			str = str.slice(str.indexOf(",")+1, str.length);
			str = str.slice(1, str.indexOf(","));
			var posit = parseInt(str);
			if (!posit){
				posit = 0;
			}
			
			//Присвоение новой позиции
			posit = posit -$( ".elem11").width();
			
			if(posit > cou){
				$(this).siblings(".gallerypv").children(".qqqq").children(".scroll").children(".scroll_child").css("transform","translateX(" + posit + "px)");
			}
			
		});
		
		$( ".btleft" ).click(function() {
			
			//Определяем максимальное значение перемещения
			var cou = $(this).siblings(".gallerypv").children(".qqqq").children(".scroll").children(".scroll_child").children(".elem11").length * $( ".elem11").width() * (-1);
			
			//Определение текущего положения
			var info = $(this).siblings(".gallerypv").children(".qqqq").children(".scroll").children(".scroll_child").css('transform');
			var str = info.slice(info.indexOf(",")+1, info.length);
			str = str.slice(str.indexOf(",")+1, str.length);
			str = str.slice(str.indexOf(",")+1, str.length);
			str = str.slice(str.indexOf(",")+1, str.length);
			str = str.slice(1, str.indexOf(","));
			var posit = parseInt(str);
			if (!posit){
				posit = 0;
			}
			//Присвоение новой позиции
			posit = posit + $( ".elem11").width();
			
			//test = posit + $( ".innercont").width()-4;
			
			if(posit < 1){
				$(this).siblings(".gallerypv").children(".qqqq").children(".scroll").children(".scroll_child").css("transform","translateX(" + posit + "px)");
			}
			
		});
		
		$( ".btright1" ).click(function() {
			
			//alert(333);
			
			//Определяем максимальное значение перемещения
			var cou = $(this).siblings(".innercont").children(".scroll_child").children(".elem").length * $( ".elem").width() * (-1);
			
			//Определение текущего положения
			var info = $(this).siblings(".innercont").children(".scroll_child").css('transform');
			var str = info.slice(info.indexOf(",")+1, info.length);
			str = str.slice(str.indexOf(",")+1, str.length);
			str = str.slice(str.indexOf(",")+1, str.length);
			str = str.slice(str.indexOf(",")+1, str.length);
			str = str.slice(1, str.indexOf(","));
			var posit = parseInt(str);
			if (!posit){
				posit = 0;
			}
			
			//Присвоение новой позиции
			posit = posit -$( ".elem").width();
			
			/*alert(posit);
			alert(cou);*/
			
			test = posit - $( ".innercont").width()+21;
			
			if(test > cou){
				$(this).siblings(".innercont").children(".scroll_child").css("transform","translateX(" + posit + "px)");
			}
			
		});
		
		$( ".btleft1" ).click(function() {
			//Определяем максимальное значение перемещения
			var cou = $(this).siblings(".innercont").children(".scroll_child").children(".elem").length * $( ".elem").width() * (-1);
			
			//Определение текущего положения
			var info = $(this).siblings(".innercont").children(".scroll_child").css('transform');
			var str = info.slice(info.indexOf(",")+1, info.length);
			str = str.slice(str.indexOf(",")+1, str.length);
			str = str.slice(str.indexOf(",")+1, str.length);
			str = str.slice(str.indexOf(",")+1, str.length);
			str = str.slice(1, str.indexOf(","));
			var posit = parseInt(str);
			if (!posit){
				posit = 0;
			}
			//Присвоение новой позиции
			posit = posit +$( ".elem").width();
			if(posit < 21){
				$(this).siblings(".innercont").children(".scroll_child").css("transform","translateX(" + posit + "px)");
			}
			if(posit > $( ".elem").width()){
				$(this).siblings(".innercont").children(".scroll_child").css("transform","translateX(0px)");
			}
		});
		$( ".sectionCatalogFilter__row.two" ).click(function() {
						
			$( ".filt1" ).toggleClass('visable1 unvisable1');
			
			
		});
	})
</script>
	






























<?/*Начало фильтра*/?>
<?
	$APPLICATION->IncludeComponent("bitrix:catalog.smart.filter", "bootstrap_v4", array(
			"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],
			"SECTION_ID" => $arCurSection['ID'],
			"FILTER_NAME" => $arParams["FILTER_NAME"],
			"PRICE_CODE" => $arParams["~PRICE_CODE"],
			"CACHE_TYPE" => $arParams["CACHE_TYPE"],
			"CACHE_TIME" => $arParams["CACHE_TIME"],
			"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
			"SAVE_IN_SESSION" => "N",
			"FILTER_VIEW_MODE" => $arParams["FILTER_VIEW_MODE"],
			"XML_EXPORT" => "N",
			"SECTION_TITLE" => "NAME",
			"SECTION_DESCRIPTION" => "DESCRIPTION",
			'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
			"TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],
			'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
			'CURRENCY_ID' => $arParams['CURRENCY_ID'],
			"SEF_MODE" => $arParams["SEF_MODE"],
			"SEF_RULE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["smart_filter"],
			"SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
			"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
			"INSTANT_RELOAD" => $arParams["INSTANT_RELOAD"],
		),
		$component,
		array('HIDE_ICONS' => 'Y')
	);
?>


















 
	







<div class="pvdiv">



	
    <div class="wrapper">
      
      <div class="wrapper__main">
        <div class="breadcrumbs">
          <div class="container">
            <div class="container__wrap">
              <div class="breadcrumbs__items" itemscope="" itemtype="http://schema.org/BreadcrumbList"><span class="breadcrumbs__item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная" href="/"><span itemprop="name">Главная</span>
                    <meta itemprop="position" content="1"></a></span><span class="breadcrumbs__item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a class="breadcrumbs__link" itemprop="item" title=" Каталог" href="#"><span itemprop="name">Каталог</span>
                    <meta itemprop="position" content="2"></a></span><span class="breadcrumbs__item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a class="breadcrumbs__link" itemprop="item" title="Вешала" href="#"><span itemprop="name">Вешала</span>
                    <meta itemprop="position" content="3"></a></span><span class="breadcrumbs__item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a class="breadcrumbs__link" itemprop="item" title="Вешала латунь" href="#"><span itemprop="name">Вешала латунь</span>
                    <meta itemprop="position" content="4"></a></span><span class="breadcrumbs__item"><span class="breadcrumbs__text">Вешало st-54-123-latun</span></span></div>
            </div>
          </div>
        </div>
        <div class="wrapper__body">
          <h1 class="comman_h1">Вешала</h1>
        </div>
        <div class="container">
          <div class="wrapper__body">
            <div class="wrapper__hero">
              <div class="wrapper__col left">
                <aside class="sectionCatalogMenu">
                  <ul class="sectionCatalogMenu__items">
                    <li class="sectionCatalogMenu__item"><a class="sectionCatalogMenu__link" href="#">Оборудование по категориям магазинов</a>
                    </li>
                    <li class="sectionCatalogMenu__item active"><a class="sectionCatalogMenu__link" href="#">Вешала</a>
                      <ul class="sectionCatalogMenuSub">
                        <div class="sectionCatalogMenuSub__item"><a class="sectionCatalogMenuSub__link" href="#">Напольные</a></div>
                        <div class="sectionCatalogMenuSub__item"><a class="sectionCatalogMenuSub__link" href="#">Напльные на колесах</a></div>
                        <div class="sectionCatalogMenuSub__item"><a class="sectionCatalogMenuSub__link" href="#">Хром</a></div>
                        <div class="sectionCatalogMenuSub__item"><a class="sectionCatalogMenuSub__link" href="#">Латунь</a></div>
                        <div class="sectionCatalogMenuSub__item"><a class="sectionCatalogMenuSub__link" href="#">Золотые</a></div>
                        <div class="sectionCatalogMenuSub__item"><a class="sectionCatalogMenuSub__link" href="#">Настольные</a></div>
                        <div class="sectionCatalogMenuSub__item"><a class="sectionCatalogMenuSub__link" href="#">На колесах</a></div>
                        <div class="sectionCatalogMenuSub__item"><a class="sectionCatalogMenuSub__link" href="#">Из нержавейки</a></div>
                        <div class="sectionCatalogMenuSub__item"><a class="sectionCatalogMenuSub__link" href="#">Для верхней одежды</a></div>
                        <div class="sectionCatalogMenuSub__item"><a class="sectionCatalogMenuSub__link" href="#">Для ремней</a></div>
                      </ul>
                    </li>
                    <li class="sectionCatalogMenu__item"><a class="sectionCatalogMenu__link" href="#">Торговые системы</a>
                    </li>
                    <li class="sectionCatalogMenu__item"><a class="sectionCatalogMenu__link" href="#">Торговая мебель</a>
                    </li>
                    <li class="sectionCatalogMenu__item"><a class="sectionCatalogMenu__link" href="#">Зеркала</a>
                    </li>
                    <li class="sectionCatalogMenu__item"><a class="sectionCatalogMenu__link" href="#">Ювелирные витрины</a>
                    </li>
                    <li class="sectionCatalogMenu__item"><a class="sectionCatalogMenu__link" href="#">Световые полки</a>
                    </li>
                    <li class="sectionCatalogMenu__item"><a class="sectionCatalogMenu__link" href="#">Корзины</a>
                    </li>
                    <li class="sectionCatalogMenu__item"><a class="sectionCatalogMenu__link" href="#">Демонстрационные формы</a>
                    </li>
                    <li class="sectionCatalogMenu__item"><a class="sectionCatalogMenu__link" href="#">Стойки-вешала настольные</a>
                    </li>
                    <li class="sectionCatalogMenu__item"><a class="sectionCatalogMenu__link" href="#">Ценникодержатели</a>
                    </li>
                  </ul>
                </aside>
              </div>
              <div class="wrapper__col right">
			  
			  
			  
				
<div>
	
<?					
					
		//region Catalog Section - Вывод каталога
		$APPLICATION->IncludeComponent(
			"bitrix:catalog.section.list",
			"bootstrap_v4", array(
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
				"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
				"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
				"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
				"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
				"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
				"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
				"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : '')
			),
			$component,
			array("HIDE_ICONS" => "Y")
		);
		//endregion					
					
?>					
					
</div>		  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
                <div class="sectionCatalogFilter">
                  <div class="sectionCatalogFilter__wrap">
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
				 
				  
				  
				  
				  
				  
				  
				  
				  
				  
                    <div class="sectionCatalogFilter__row one filt1 unvisable1">
                      <div class="sectionCatalogFilter-selected">
                        <div class="sectionCatalogFilter-selected__value">Тип оборудования</div>
                        <div class="sectionCatalogFilter-selected__items">
                          <div class="sectionCatalogFilter-selected__item active">
                            <div class="sectionCatalogFilter-selected__text">Вешала</div>
                            <div class="sectionCatalogFilter-selected__count">213</div>
                          </div>
                          <div class="sectionCatalogFilter-selected__item">
                            <div class="sectionCatalogFilter-selected__text">Кассовые столы</div>
                            <div class="sectionCatalogFilter-selected__count">50</div>
                          </div>
                          <div class="sectionCatalogFilter-selected__item">
                            <div class="sectionCatalogFilter-selected__text">Демонстрационные столы</div>
                            <div class="sectionCatalogFilter-selected__count">123</div>
                          </div>
                          <div class="sectionCatalogFilter-selected__item">
                            <div class="sectionCatalogFilter-selected__text">Стеллажи</div>
                            <div class="sectionCatalogFilter-selected__count">87</div>
                          </div>
                        </div>
                      </div>
                      <div class="sectionCatalogFilter-selected">
                        <div class="sectionCatalogFilter-selected__value">Ширина, мм</div>
                        <div class="sectionCatalogFilter-selected__items">
                          <div class="sectionCatalogFilter-selected__item active">
                            <div class="sectionCatalogFilter-selected__text">Вешала</div>
                            <div class="sectionCatalogFilter-selected__count">213</div>
                          </div>
                          <div class="sectionCatalogFilter-selected__item">
                            <div class="sectionCatalogFilter-selected__text">Кассовые столы</div>
                            <div class="sectionCatalogFilter-selected__count">50</div>
                          </div>
                          <div class="sectionCatalogFilter-selected__item">
                            <div class="sectionCatalogFilter-selected__text">Демонстрационные столы</div>
                            <div class="sectionCatalogFilter-selected__count">123</div>
                          </div>
                          <div class="sectionCatalogFilter-selected__item">
                            <div class="sectionCatalogFilter-selected__text">Стеллажи</div>
                            <div class="sectionCatalogFilter-selected__count">87</div>
                          </div>
                        </div>
                      </div>
                      <div class="sectionCatalogFilter-selected">
                        <div class="sectionCatalogFilter-selected__value">Высота, мм</div>
                        <div class="sectionCatalogFilter-selected__items">
                          <div class="sectionCatalogFilter-selected__item active">
                            <div class="sectionCatalogFilter-selected__text">Вешала</div>
                            <div class="sectionCatalogFilter-selected__count">213</div>
                          </div>
                          <div class="sectionCatalogFilter-selected__item">
                            <div class="sectionCatalogFilter-selected__text">Кассовые столы</div>
                            <div class="sectionCatalogFilter-selected__count">50</div>
                          </div>
                          <div class="sectionCatalogFilter-selected__item">
                            <div class="sectionCatalogFilter-selected__text">Демонстрационные столы</div>
                            <div class="sectionCatalogFilter-selected__count">123</div>
                          </div>
                          <div class="sectionCatalogFilter-selected__item">
                            <div class="sectionCatalogFilter-selected__text">Стеллажи</div>
                            <div class="sectionCatalogFilter-selected__count">87</div>
                          </div>
                        </div>
                      </div>
                      <div class="sectionCatalogFilter-selected">
                        <div class="sectionCatalogFilter-selected__value">Пункт 4</div>
                        <div class="sectionCatalogFilter-selected__items">
                          <div class="sectionCatalogFilter-selected__item active">
                            <div class="sectionCatalogFilter-selected__text">Вешала</div>
                            <div class="sectionCatalogFilter-selected__count">213</div>
                          </div>
                          <div class="sectionCatalogFilter-selected__item">
                            <div class="sectionCatalogFilter-selected__text">Кассовые столы</div>
                            <div class="sectionCatalogFilter-selected__count">50</div>
                          </div>
                          <div class="sectionCatalogFilter-selected__item">
                            <div class="sectionCatalogFilter-selected__text">Демонстрационные столы</div>
                            <div class="sectionCatalogFilter-selected__count">123</div>
                          </div>
                          <div class="sectionCatalogFilter-selected__item">
                            <div class="sectionCatalogFilter-selected__text">Стеллажи</div>
                            <div class="sectionCatalogFilter-selected__count">87</div>
                          </div>
                        </div>
                      </div>
                      <div class="sectionCatalogFilter-selected">
                        <div class="sectionCatalogFilter-selected__value">Материал</div>
                        <div class="sectionCatalogFilter-selected__items">
                          <div class="sectionCatalogFilter-selected__item active">
                            <div class="sectionCatalogFilter-selected__text">Вешала</div>
                            <div class="sectionCatalogFilter-selected__count">213</div>
                          </div>
                          <div class="sectionCatalogFilter-selected__item">
                            <div class="sectionCatalogFilter-selected__text">Кассовые столы</div>
                            <div class="sectionCatalogFilter-selected__count">50</div>
                          </div>
                          <div class="sectionCatalogFilter-selected__item">
                            <div class="sectionCatalogFilter-selected__text">Демонстрационные столы</div>
                            <div class="sectionCatalogFilter-selected__count">123</div>
                          </div>
                          <div class="sectionCatalogFilter-selected__item">
                            <div class="sectionCatalogFilter-selected__text">Стеллажи</div>
                            <div class="sectionCatalogFilter-selected__count">87</div>
                          </div>
                        </div>
                      </div>
                      <div class="sectionCatalogFilter-selected">
                        <div class="sectionCatalogFilter-selected__value">Тип сечения</div>
                        <div class="sectionCatalogFilter-selected__items">
                          <div class="sectionCatalogFilter-selected__item active">
                            <div class="sectionCatalogFilter-selected__text">Вешала</div>
                            <div class="sectionCatalogFilter-selected__count">213</div>
                          </div>
                          <div class="sectionCatalogFilter-selected__item">
                            <div class="sectionCatalogFilter-selected__text">Кассовые столы</div>
                            <div class="sectionCatalogFilter-selected__count">50</div>
                          </div>
                          <div class="sectionCatalogFilter-selected__item">
                            <div class="sectionCatalogFilter-selected__text">Демонстрационные столы</div>
                            <div class="sectionCatalogFilter-selected__count">123</div>
                          </div>
                          <div class="sectionCatalogFilter-selected__item">
                            <div class="sectionCatalogFilter-selected__text">Стеллажи</div>
                            <div class="sectionCatalogFilter-selected__count">87</div>
                          </div>
                        </div>
                      </div>
                      <div class="sectionCatalogFilter-selected">
                        <div class="sectionCatalogFilter-selected__value">Пункт 5</div>
                        <div class="sectionCatalogFilter-selected__items">
                          <div class="sectionCatalogFilter-selected__item active">
                            <div class="sectionCatalogFilter-selected__text">Вешала</div>
                            <div class="sectionCatalogFilter-selected__count">213</div>
                          </div>
                          <div class="sectionCatalogFilter-selected__item">
                            <div class="sectionCatalogFilter-selected__text">Кассовые столы</div>
                            <div class="sectionCatalogFilter-selected__count">50</div>
                          </div>
                          <div class="sectionCatalogFilter-selected__item">
                            <div class="sectionCatalogFilter-selected__text">Демонстрационные столы</div>
                            <div class="sectionCatalogFilter-selected__count">123</div>
                          </div>
                          <div class="sectionCatalogFilter-selected__item">
                            <div class="sectionCatalogFilter-selected__text">Стеллажи</div>
                            <div class="sectionCatalogFilter-selected__count">87</div>
                          </div>
                        </div>
                      </div>
                      <div class="sectionCatalogFilter-selected">
                        <div class="sectionCatalogFilter-selected__value">Глубина, мм</div>
                        <div class="sectionCatalogFilter-selected__items">
                          <div class="sectionCatalogFilter-selected__item active">
                            <div class="sectionCatalogFilter-selected__text">Вешала</div>
                            <div class="sectionCatalogFilter-selected__count">213</div>
                          </div>
                          <div class="sectionCatalogFilter-selected__item">
                            <div class="sectionCatalogFilter-selected__text">Кассовые столы</div>
                            <div class="sectionCatalogFilter-selected__count">50</div>
                          </div>
                          <div class="sectionCatalogFilter-selected__item">
                            <div class="sectionCatalogFilter-selected__text">Демонстрационные столы</div>
                            <div class="sectionCatalogFilter-selected__count">123</div>
                          </div>
                          <div class="sectionCatalogFilter-selected__item">
                            <div class="sectionCatalogFilter-selected__text">Стеллажи</div>
                            <div class="sectionCatalogFilter-selected__count">87</div>
                          </div>
                        </div>
                      </div>
                      <div class="sectionCatalogFilter-selected">
                        <div class="sectionCatalogFilter-selected__value">Сечение, мм</div>
                        <div class="sectionCatalogFilter-selected__items">
                          <div class="sectionCatalogFilter-selected__item active">
                            <div class="sectionCatalogFilter-selected__text">Вешала</div>
                            <div class="sectionCatalogFilter-selected__count">213</div>
                          </div>
                          <div class="sectionCatalogFilter-selected__item">
                            <div class="sectionCatalogFilter-selected__text">Кассовые столы</div>
                            <div class="sectionCatalogFilter-selected__count">50</div>
                          </div>
                          <div class="sectionCatalogFilter-selected__item">
                            <div class="sectionCatalogFilter-selected__text">Демонстрационные столы</div>
                            <div class="sectionCatalogFilter-selected__count">123</div>
                          </div>
                          <div class="sectionCatalogFilter-selected__item">
                            <div class="sectionCatalogFilter-selected__text">Стеллажи</div>
                            <div class="sectionCatalogFilter-selected__count">87</div>
                          </div>
                        </div>
                      </div>
                    </div>
					
					
					
					
					
					 <div class="sectionCatalogFilter__row one sort1">
                      <div class="sectionCatalogFilter-info">
					  
						
						
						<div class="sectionCatalogFilter-info__col three">
                          <div class="lnr lnr-sort-amount-asc sectionCatalogFilter-info__icon pvico1"></div>
                          <h2 class="sectionCatalogFilter-info__title pvico2">Сортировка по цене:</h2>
						  
						  <div class="lnr lnr-arrow-up sectionCatalogFilter-info__icon pvico1"></div>
                        
						</div>
						
						
                      </div>
                    </div>
					
					
					
					
					
                    <div class="sectionCatalogFilter__row two">
                      <div class="sectionCatalogFilter-info">
					  
                        <div class="sectionCatalogFilter-info__col one">
                          <div class="lnr lnr-funnel sectionCatalogFilter-info__icon"></div>
                          <h2 class="sectionCatalogFilter-info__title">Фильтр товаров <span>(123)</span></h2>
                        </div>
						
						
						
						<div class="sectionCatalogFilter-info__col three tutu  sort1">
                          <div class="lnr lnr-sort-amount-asc sectionCatalogFilter-info__icon pvico1"></div>
                          <h2 class="sectionCatalogFilter-info__title pvico2">Сортировка по цене:</h2>
						  
						  <div class="lnr lnr-arrow-up sectionCatalogFilter-info__icon pvico1"></div>
                        
						</div>
						
						
						
                        <div class="sectionCatalogFilter-info__col two">
                          <button class="sectionCatalogFilter-info__reset">Сбросить все фильтры</button>
                        </div>
                      </div>
                    </div>
					
					
					
					
					
					
					
					
					
					
					
					
                  </div>
                </div>
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				  
				  
				  
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
                <div class="sectionCatalogList">
                  <div class="sectionCatalogList-sort">
                    <div class="sectionCatalogList-sort__title">Показывать по:</div><a class="sectionCatalogList-sort__count active" href="#">60</a><a class="sectionCatalogList-sort__count" href="#">120</a>
                  </div>
                  <div class="sectionCatalogList-items">
				  
				  
				  
				  <!-- Проработанная карточка товара -->
				  
			
					
					
					
					
					
					
					
					

<?/*Начало Содержимого*/?>

<?


	 	 $intSectionID = $APPLICATION->IncludeComponent(
					"bitrix:catalog.section",
					"bootstrap_v4", array(
						"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
						"IBLOCK_ID" => $arParams["IBLOCK_ID"],
						"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
						"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
						"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
						"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
						"PROPERTY_CODE" => (isset($arParams["LIST_PROPERTY_CODE"]) ? $arParams["LIST_PROPERTY_CODE"] : []),
						"PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
						"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
						"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
						"BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
						"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
						"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
						"BASKET_URL" => $arParams["BASKET_URL"],
						"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
						"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
						"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
						"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
						"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
						"FILTER_NAME" => $arParams["FILTER_NAME"],
						"CACHE_TYPE" => $arParams["CACHE_TYPE"],
						"CACHE_TIME" => $arParams["CACHE_TIME"],
						"CACHE_FILTER" => $arParams["CACHE_FILTER"],
						"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
						"SET_TITLE" => $arParams["SET_TITLE"],
						"MESSAGE_404" => $arParams["~MESSAGE_404"],
						"SET_STATUS_404" => $arParams["SET_STATUS_404"],
						"SHOW_404" => $arParams["SHOW_404"],
						"FILE_404" => $arParams["FILE_404"],
						"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
						"PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
						"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
						"PRICE_CODE" => $arParams["~PRICE_CODE"],
						"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
						"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

						"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
						"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
						"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
						"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
						"PRODUCT_PROPERTIES" => (isset($arParams["PRODUCT_PROPERTIES"]) ? $arParams["PRODUCT_PROPERTIES"] : []),

						"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
						"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
						"PAGER_TITLE" => $arParams["PAGER_TITLE"],
						"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
						"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
						"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
						"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
						"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
						"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
						"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
						"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
						"LAZY_LOAD" => $arParams["LAZY_LOAD"],
						"MESS_BTN_LAZY_LOAD" => $arParams["~MESS_BTN_LAZY_LOAD"],
						"LOAD_ON_SCROLL" => $arParams["LOAD_ON_SCROLL"],

						"OFFERS_CART_PROPERTIES" => (isset($arParams["OFFERS_CART_PROPERTIES"]) ? $arParams["OFFERS_CART_PROPERTIES"] : []),
						"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
						"OFFERS_PROPERTY_CODE" => (isset($arParams["LIST_OFFERS_PROPERTY_CODE"]) ? $arParams["LIST_OFFERS_PROPERTY_CODE"] : []),
						"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
						"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
						"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
						"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
		     			"OFFERS_LIMIT" => (isset($arParams["LIST_OFFERS_LIMIT"]) ? $arParams["LIST_OFFERS_LIMIT"] : 0),

						"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
						"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
						"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
						"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
						"USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
						'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
						'CURRENCY_ID' => $arParams['CURRENCY_ID'],
						'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
						'HIDE_NOT_AVAILABLE_OFFERS' => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],

						'LABEL_PROP' => $arParams['LABEL_PROP'],
						'LABEL_PROP_MOBILE' => $arParams['LABEL_PROP_MOBILE'],
						'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],
						'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
						'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
						'PRODUCT_BLOCKS_ORDER' => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
						'PRODUCT_ROW_VARIANTS' => $arParams['LIST_PRODUCT_ROW_VARIANTS'],
						'ENLARGE_PRODUCT' => $arParams['LIST_ENLARGE_PRODUCT'],
						'ENLARGE_PROP' => isset($arParams['LIST_ENLARGE_PROP']) ? $arParams['LIST_ENLARGE_PROP'] : '',
						'SHOW_SLIDER' => $arParams['LIST_SHOW_SLIDER'],
						'SLIDER_INTERVAL' => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
						'SLIDER_PROGRESS' => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',

						'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
						'OFFER_TREE_PROPS' => (isset($arParams['OFFER_TREE_PROPS']) ? $arParams['OFFER_TREE_PROPS'] : []),
						'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
						'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
						'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
						'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
						'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
						'MESS_SHOW_MAX_QUANTITY' => (isset($arParams['~MESS_SHOW_MAX_QUANTITY']) ? $arParams['~MESS_SHOW_MAX_QUANTITY'] : ''),
						'RELATIVE_QUANTITY_FACTOR' => (isset($arParams['RELATIVE_QUANTITY_FACTOR']) ? $arParams['RELATIVE_QUANTITY_FACTOR'] : ''),
						'MESS_RELATIVE_QUANTITY_MANY' => (isset($arParams['~MESS_RELATIVE_QUANTITY_MANY']) ? $arParams['~MESS_RELATIVE_QUANTITY_MANY'] : ''),
						'MESS_RELATIVE_QUANTITY_FEW' => (isset($arParams['~MESS_RELATIVE_QUANTITY_FEW']) ? $arParams['~MESS_RELATIVE_QUANTITY_FEW'] : ''),
						'MESS_BTN_BUY' => (isset($arParams['~MESS_BTN_BUY']) ? $arParams['~MESS_BTN_BUY'] : ''),
						'MESS_BTN_ADD_TO_BASKET' => (isset($arParams['~MESS_BTN_ADD_TO_BASKET']) ? $arParams['~MESS_BTN_ADD_TO_BASKET'] : ''),
						'MESS_BTN_SUBSCRIBE' => (isset($arParams['~MESS_BTN_SUBSCRIBE']) ? $arParams['~MESS_BTN_SUBSCRIBE'] : ''),
						'MESS_BTN_DETAIL' => (isset($arParams['~MESS_BTN_DETAIL']) ? $arParams['~MESS_BTN_DETAIL'] : ''),
						'MESS_NOT_AVAILABLE' => (isset($arParams['~MESS_NOT_AVAILABLE']) ? $arParams['~MESS_NOT_AVAILABLE'] : ''),
						'MESS_BTN_COMPARE' => (isset($arParams['~MESS_BTN_COMPARE']) ? $arParams['~MESS_BTN_COMPARE'] : ''),

						'USE_ENHANCED_ECOMMERCE' => (isset($arParams['USE_ENHANCED_ECOMMERCE']) ? $arParams['USE_ENHANCED_ECOMMERCE'] : ''),
						'DATA_LAYER_NAME' => (isset($arParams['DATA_LAYER_NAME']) ? $arParams['DATA_LAYER_NAME'] : ''),
						'BRAND_PROPERTY' => (isset($arParams['BRAND_PROPERTY']) ? $arParams['BRAND_PROPERTY'] : ''),

						'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
						"ADD_SECTIONS_CHAIN" => "N",
						'ADD_TO_BASKET_ACTION' => $basketAction,
						'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
						'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
						'COMPARE_NAME' => $arParams['COMPARE_NAME'],
						'USE_COMPARE_LIST' => 'Y',
						'BACKGROUND_IMAGE' => (isset($arParams['SECTION_BACKGROUND_IMAGE']) ? $arParams['SECTION_BACKGROUND_IMAGE'] : ''),
						'COMPATIBLE_MODE' => (isset($arParams['COMPATIBLE_MODE']) ? $arParams['COMPATIBLE_MODE'] : ''),
						'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : '')
					),
					$component
				);

				$GLOBALS['CATALOG_CURRENT_SECTION_ID'] = $intSectionID;


?>


					
					
					
					
					
					
					
					
					
								  
				  
				  	
					
					
                  </div>
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
                </div>
                <div class="sectionCatalogNav">
                  <div class="sectionCatalogNav__title">Вы посмотрели 180  из  480</div>
                  <button class="sectionCatalogNav__additems">Показать еще</button>
                  <ul class="sectionCatalogNav__items">
                    <li class="sectionCatalogNav__item"><a class="sectionCatalogNav__link" href="#"><</a></li>
                    <li class="sectionCatalogNav__item"><a class="sectionCatalogNav__link" href="#">1</a></li>
                    <li class="sectionCatalogNav__item"><a class="sectionCatalogNav__link" href="#">2</a></li>
                    <li class="sectionCatalogNav__item"><a class="sectionCatalogNav__link" href="#">3</a></li>
                    <li class="sectionCatalogNav__item"><span class="sectionCatalogNav__link">4</span></li>
                    <li class="sectionCatalogNav__item"><span class="sectionCatalogNav__link">...</span></li>
                    <li class="sectionCatalogNav__item"><a class="sectionCatalogNav__link" href="#">10</a></li>
                    <li class="sectionCatalogNav__item"><a class="sectionCatalogNav__link" href="#">></a></li>
                  </ul>
                </div>
              </div>
            </div>
			
			
			
</div></div></div></div></div>			
			
			<br><br>
			
			
			
			
			
			
			
			
			
			
			














	
						
			
			
			
			
	<div class="titlegoods">		
<h2 class="catalogDetailProdukts__title titlepvtovar">Сопутствующие товары (7):</h2>
</div>
			
			
<div class="qqqq qqqq1">  
			
<div class="tabcellpv1 btleft1">
		<div>				
			<div class="arrowleftpv1 lnr lnr-chevron-left"></div>
		</div>
</div>
			
			
  
  <div class="scroll innercont">
  
	  <div class="scroll_child">
	  
	  
	  	  
	  
							  
	  
	  
				<div class="elem">
		
					<div class="itempv">
						<div class="discountpv">-10 %</div>
						
						<div class="gallerypvcontent">
						
						<div class="tabcellpv btleft">
						
						<div class="arrowleftpv lnr lnr-chevron-left"></div>
						</div>
						
						<div class="gallerypv tabcellpv">
							<div class="qqqq">
							  <div class="scroll">
								  <div class="scroll_child">
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
								  </div>
								  
							  </div>
							  
							</div>
						</div>
						
						<div class="tabcellpv btright">
						<div class="arrowrightpv lnr lnr-chevron-right"></div>
						</div>
						
						</div>
						
						<div class="fastreview">
						Быстрый просмотр
						</div>
						
						
						<div class="statusorder">
						На заказ
						</div>
						
						<div class="itemtextpv">
						Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды
						</div>
						
						<div class="articlepv">
						<span>Артикул</span><span style="float: right;">ST-02.60</span>
						</div>
						
						<div class="pricepv">
							<div class="newprice">7 990 руб.</div>
							<div class="oldprice">7 990 руб.</div>
						</div>
					</div>
				</div>
				
				


							  
	  
	  
				<div class="elem">
		
					<div class="itempv">
						<div class="discountpv">-10 %</div>
						
						<div class="gallerypvcontent">
						
						<div class="tabcellpv btleft">
						
						<div class="arrowleftpv lnr lnr-chevron-left"></div>
						</div>
						
						<div class="gallerypv tabcellpv">
							<div class="qqqq">
							  <div class="scroll">
								  <div class="scroll_child">
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
								  </div>
								  
							  </div>
							  
							</div>
						</div>
						
						<div class="tabcellpv btright">
						<div class="arrowrightpv lnr lnr-chevron-right"></div>
						</div>
						
						</div>
						
						<div class="fastreview">
						Быстрый просмотр
						</div>
						
						
						<div class="statusorder">
						На заказ
						</div>
						
						<div class="itemtextpv">
						Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды
						</div>
						
						<div class="articlepv">
						<span>Артикул</span><span style="float: right;">ST-02.60</span>
						</div>
						
						<div class="pricepv">
							<div class="newprice">7 990 руб.</div>
							<div class="oldprice">7 990 руб.</div>
						</div>
					</div>
				</div>
				
				
							  
	  
	  
				<div class="elem">
		
					<div class="itempv">
						<div class="discountpv">-10 %</div>
						
						<div class="gallerypvcontent">
						
						<div class="tabcellpv btleft">
						
						<div class="arrowleftpv lnr lnr-chevron-left"></div>
						</div>
						
						<div class="gallerypv tabcellpv">
							<div class="qqqq">
							  <div class="scroll">
								  <div class="scroll_child">
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
								  </div>
								  
							  </div>
							  
							</div>
						</div>
						
						<div class="tabcellpv btright">
						<div class="arrowrightpv lnr lnr-chevron-right"></div>
						</div>
						
						</div>
						
						<div class="fastreview">
						Быстрый просмотр
						</div>
						
						
						<div class="statusorder">
						На заказ
						</div>
						
						<div class="itemtextpv">
						Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды
						</div>
						
						<div class="articlepv">
						<span>Артикул</span><span style="float: right;">ST-02.60</span>
						</div>
						
						<div class="pricepv">
							<div class="newprice">7 990 руб.</div>
							<div class="oldprice">7 990 руб.</div>
						</div>
					</div>
				</div>
				
				
							  
	  
	  
				<div class="elem">
		
					<div class="itempv">
						<div class="discountpv">-10 %</div>
						
						<div class="gallerypvcontent">
						
						<div class="tabcellpv btleft">
						
						<div class="arrowleftpv lnr lnr-chevron-left"></div>
						</div>
						
						<div class="gallerypv tabcellpv">
							<div class="qqqq">
							  <div class="scroll">
								  <div class="scroll_child">
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
								  </div>
								  
							  </div>
							  
							</div>
						</div>
						
						<div class="tabcellpv btright">
						<div class="arrowrightpv lnr lnr-chevron-right"></div>
						</div>
						
						</div>
						
						<div class="fastreview">
						Быстрый просмотр
						</div>
						
						
						<div class="statusorder">
						На заказ
						</div>
						
						<div class="itemtextpv">
						Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды
						</div>
						
						<div class="articlepv">
						<span>Артикул</span><span style="float: right;">ST-02.60</span>
						</div>
						
						<div class="pricepv">
							<div class="newprice">7 990 руб.</div>
							<div class="oldprice">7 990 руб.</div>
						</div>
					</div>
				</div>
				
				
							  
	  
	  
				<div class="elem">
		
					<div class="itempv">
						<div class="discountpv">-10 %</div>
						
						<div class="gallerypvcontent">
						
						<div class="tabcellpv btleft">
						
						<div class="arrowleftpv lnr lnr-chevron-left"></div>
						</div>
						
						<div class="gallerypv tabcellpv">
							<div class="qqqq">
							  <div class="scroll">
								  <div class="scroll_child">
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
								  </div>
								  
							  </div>
							  
							</div>
						</div>
						
						<div class="tabcellpv btright">
						<div class="arrowrightpv lnr lnr-chevron-right"></div>
						</div>
						
						</div>
						
						<div class="fastreview">
						Быстрый просмотр
						</div>
						
						
						<div class="statusorder">
						На заказ
						</div>
						
						<div class="itemtextpv">
						Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды
						</div>
						
						<div class="articlepv">
						<span>Артикул</span><span style="float: right;">ST-02.60</span>
						</div>
						
						<div class="pricepv">
							<div class="newprice">7 990 руб.</div>
							<div class="oldprice">7 990 руб.</div>
						</div>
					</div>
				</div>
				
				
							  
	  
	  
				<div class="elem">
		
					<div class="itempv">
						<div class="discountpv">-10 %</div>
						
						<div class="gallerypvcontent">
						
						<div class="tabcellpv btleft">
						
						<div class="arrowleftpv lnr lnr-chevron-left"></div>
						</div>
						
						<div class="gallerypv tabcellpv">
							<div class="qqqq">
							  <div class="scroll">
								  <div class="scroll_child">
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
								  </div>
								  
							  </div>
							  
							</div>
						</div>
						
						<div class="tabcellpv btright">
						<div class="arrowrightpv lnr lnr-chevron-right"></div>
						</div>
						
						</div>
						
						<div class="fastreview">
						Быстрый просмотр
						</div>
						
						
						<div class="statusorder">
						На заказ
						</div>
						
						<div class="itemtextpv">
						Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды
						</div>
						
						<div class="articlepv">
						<span>Артикул</span><span style="float: right;">ST-02.60</span>
						</div>
						
						<div class="pricepv">
							<div class="newprice">7 990 руб.</div>
							<div class="oldprice">7 990 руб.</div>
						</div>
					</div>
				</div>
				
				

							  
	  
	  
				<div class="elem">
		
					<div class="itempv">
						<div class="discountpv">-10 %</div>
						
						<div class="gallerypvcontent">
						
						<div class="tabcellpv btleft">
						
						<div class="arrowleftpv lnr lnr-chevron-left"></div>
						</div>
						
						<div class="gallerypv tabcellpv">
							<div class="qqqq">
							  <div class="scroll">
								  <div class="scroll_child">
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
								  </div>
								  
							  </div>
							  
							</div>
						</div>
						
						<div class="tabcellpv btright">
						<div class="arrowrightpv lnr lnr-chevron-right"></div>
						</div>
						
						</div>
						
						<div class="fastreview">
						Быстрый просмотр
						</div>
						
						
						<div class="statusorder">
						На заказ
						</div>
						
						<div class="itemtextpv">
						Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды
						</div>
						
						<div class="articlepv">
						<span>Артикул</span><span style="float: right;">ST-02.60</span>
						</div>
						
						<div class="pricepv">
							<div class="newprice">7 990 руб.</div>
							<div class="oldprice">7 990 руб.</div>
						</div>
					</div>
					
					
				</div>
				
					</div>
				</div>
				
				
				
				
				
				

			<div class="tabcellpv1 btright1">
		<div class="arrowrightpv1 lnr lnr-chevron-right"></div>
	</div>
</div>
			
			
			
			
			
			
			
			
			
			
			
			
			
			
	<div class="titlegoods">		
<h2 class="catalogDetailProdukts__title titlepvtovar">Вы недавно смотрели (7):</h2>
</div>
			
			
<div class="qqqq qqqq1">  
			
<div class="tabcellpv1 btleft1">
		<div>				
			<div class="arrowleftpv1 lnr lnr-chevron-left"></div>
		</div>
</div>
			
			
  
  <div class="scroll innercont">
  
	  <div class="scroll_child">
	  
	  
	  	  
	  
							  
	  
	  
				<div class="elem">
		
					<div class="itempv">
						<div class="discountpv">-10 %</div>
						
						<div class="gallerypvcontent">
						
						<div class="tabcellpv btleft">
						
						<div class="arrowleftpv lnr lnr-chevron-left"></div>
						</div>
						
						<div class="gallerypv tabcellpv">
							<div class="qqqq">
							  <div class="scroll">
								  <div class="scroll_child">
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
								  </div>
								  
							  </div>
							  
							</div>
						</div>
						
						<div class="tabcellpv btright">
						<div class="arrowrightpv lnr lnr-chevron-right"></div>
						</div>
						
						</div>
						
						<div class="fastreview">
						Быстрый просмотр
						</div>
						
						
						<div class="statusorder">
						На заказ
						</div>
						
						<div class="itemtextpv">
						Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды
						</div>
						
						<div class="articlepv">
						<span>Артикул</span><span style="float: right;">ST-02.60</span>
						</div>
						
						<div class="pricepv">
							<div class="newprice">7 990 руб.</div>
							<div class="oldprice">7 990 руб.</div>
						</div>
					</div>
				</div>
				
				


							  
	  
	  
				<div class="elem">
		
					<div class="itempv">
						<div class="discountpv">-10 %</div>
						
						<div class="gallerypvcontent">
						
						<div class="tabcellpv btleft">
						
						<div class="arrowleftpv lnr lnr-chevron-left"></div>
						</div>
						
						<div class="gallerypv tabcellpv">
							<div class="qqqq">
							  <div class="scroll">
								  <div class="scroll_child">
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
								  </div>
								  
							  </div>
							  
							</div>
						</div>
						
						<div class="tabcellpv btright">
						<div class="arrowrightpv lnr lnr-chevron-right"></div>
						</div>
						
						</div>
						
						<div class="fastreview">
						Быстрый просмотр
						</div>
						
						
						<div class="statusorder">
						На заказ
						</div>
						
						<div class="itemtextpv">
						Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды
						</div>
						
						<div class="articlepv">
						<span>Артикул</span><span style="float: right;">ST-02.60</span>
						</div>
						
						<div class="pricepv">
							<div class="newprice">7 990 руб.</div>
							<div class="oldprice">7 990 руб.</div>
						</div>
					</div>
				</div>
				
				
							  
	  
	  
				<div class="elem">
		
					<div class="itempv">
						<div class="discountpv">-10 %</div>
						
						<div class="gallerypvcontent">
						
						<div class="tabcellpv btleft">
						
						<div class="arrowleftpv lnr lnr-chevron-left"></div>
						</div>
						
						<div class="gallerypv tabcellpv">
							<div class="qqqq">
							  <div class="scroll">
								  <div class="scroll_child">
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
								  </div>
								  
							  </div>
							  
							</div>
						</div>
						
						<div class="tabcellpv btright">
						<div class="arrowrightpv lnr lnr-chevron-right"></div>
						</div>
						
						</div>
						
						<div class="fastreview">
						Быстрый просмотр
						</div>
						
						
						<div class="statusorder">
						На заказ
						</div>
						
						<div class="itemtextpv">
						Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды
						</div>
						
						<div class="articlepv">
						<span>Артикул</span><span style="float: right;">ST-02.60</span>
						</div>
						
						<div class="pricepv">
							<div class="newprice">7 990 руб.</div>
							<div class="oldprice">7 990 руб.</div>
						</div>
					</div>
				</div>
				
				
							  
	  
	  
				<div class="elem">
		
					<div class="itempv">
						<div class="discountpv">-10 %</div>
						
						<div class="gallerypvcontent">
						
						<div class="tabcellpv btleft">
						
						<div class="arrowleftpv lnr lnr-chevron-left"></div>
						</div>
						
						<div class="gallerypv tabcellpv">
							<div class="qqqq">
							  <div class="scroll">
								  <div class="scroll_child">
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
								  </div>
								  
							  </div>
							  
							</div>
						</div>
						
						<div class="tabcellpv btright">
						<div class="arrowrightpv lnr lnr-chevron-right"></div>
						</div>
						
						</div>
						
						<div class="fastreview">
						Быстрый просмотр
						</div>
						
						
						<div class="statusorder">
						На заказ
						</div>
						
						<div class="itemtextpv">
						Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды
						</div>
						
						<div class="articlepv">
						<span>Артикул</span><span style="float: right;">ST-02.60</span>
						</div>
						
						<div class="pricepv">
							<div class="newprice">7 990 руб.</div>
							<div class="oldprice">7 990 руб.</div>
						</div>
					</div>
				</div>
				
				
							  
	  
	  
				<div class="elem">
		
					<div class="itempv">
						<div class="discountpv">-10 %</div>
						
						<div class="gallerypvcontent">
						
						<div class="tabcellpv btleft">
						
						<div class="arrowleftpv lnr lnr-chevron-left"></div>
						</div>
						
						<div class="gallerypv tabcellpv">
							<div class="qqqq">
							  <div class="scroll">
								  <div class="scroll_child">
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
								  </div>
								  
							  </div>
							  
							</div>
						</div>
						
						<div class="tabcellpv btright">
						<div class="arrowrightpv lnr lnr-chevron-right"></div>
						</div>
						
						</div>
						
						<div class="fastreview">
						Быстрый просмотр
						</div>
						
						
						<div class="statusorder">
						На заказ
						</div>
						
						<div class="itemtextpv">
						Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды
						</div>
						
						<div class="articlepv">
						<span>Артикул</span><span style="float: right;">ST-02.60</span>
						</div>
						
						<div class="pricepv">
							<div class="newprice">7 990 руб.</div>
							<div class="oldprice">7 990 руб.</div>
						</div>
					</div>
				</div>
				
				
							  
	  
	  
				<div class="elem">
		
					<div class="itempv">
						<div class="discountpv">-10 %</div>
						
						<div class="gallerypvcontent">
						
						<div class="tabcellpv btleft">
						
						<div class="arrowleftpv lnr lnr-chevron-left"></div>
						</div>
						
						<div class="gallerypv tabcellpv">
							<div class="qqqq">
							  <div class="scroll">
								  <div class="scroll_child">
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
								  </div>
								  
							  </div>
							  
							</div>
						</div>
						
						<div class="tabcellpv btright">
						<div class="arrowrightpv lnr lnr-chevron-right"></div>
						</div>
						
						</div>
						
						<div class="fastreview">
						Быстрый просмотр
						</div>
						
						
						<div class="statusorder">
						На заказ
						</div>
						
						<div class="itemtextpv">
						Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды
						</div>
						
						<div class="articlepv">
						<span>Артикул</span><span style="float: right;">ST-02.60</span>
						</div>
						
						<div class="pricepv">
							<div class="newprice">7 990 руб.</div>
							<div class="oldprice">7 990 руб.</div>
						</div>
					</div>
				</div>
				
				

							  
	  
	  
				<div class="elem">
		
					<div class="itempv">
						<div class="discountpv">-10 %</div>
						
						<div class="gallerypvcontent">
						
						<div class="tabcellpv btleft">
						
						<div class="arrowleftpv lnr lnr-chevron-left"></div>
						</div>
						
						<div class="gallerypv tabcellpv">
							<div class="qqqq">
							  <div class="scroll">
								  <div class="scroll_child">
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
								  </div>
								  
							  </div>
							  
							</div>
						</div>
						
						<div class="tabcellpv btright">
						<div class="arrowrightpv lnr lnr-chevron-right"></div>
						</div>
						
						</div>
						
						<div class="fastreview">
						Быстрый просмотр
						</div>
						
						
						<div class="statusorder">
						На заказ
						</div>
						
						<div class="itemtextpv">
						Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды
						</div>
						
						<div class="articlepv">
						<span>Артикул</span><span style="float: right;">ST-02.60</span>
						</div>
						
						<div class="pricepv">
							<div class="newprice">7 990 руб.</div>
							<div class="oldprice">7 990 руб.</div>
						</div>
					</div>
					
					
				</div>
				
					</div>
				</div>
				
				
				
				
				
				

			<div class="tabcellpv1 btright1">
		<div class="arrowrightpv1 lnr lnr-chevron-right"></div>
	</div>
</div>
			
			
			
			
			
			
			
			
			
			
			
			
			
	
			
			
			
			
			
		<div class="titlegoods">	
<h2 class="catalogDetailProdukts__title titlepvtovar">Товары по акции (7):</h2>
</div>
			
			
<div class="qqqq qqqq1">  
			
<div class="tabcellpv1 btleft1">
		<div>				
			<div class="arrowleftpv1 lnr lnr-chevron-left"></div>
		</div>
</div>
			
			
  
  <div class="scroll innercont">
  
	  <div class="scroll_child">
	  
	  
	  	  
	  
							  
	  
	  
				<div class="elem">
		
					<div class="itempv">
						<div class="discountpv">-10 %</div>
						
						<div class="gallerypvcontent">
						
						<div class="tabcellpv btleft">
						
						<div class="arrowleftpv lnr lnr-chevron-left"></div>
						</div>
						
						<div class="gallerypv tabcellpv">
							<div class="qqqq">
							  <div class="scroll">
								  <div class="scroll_child">
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
								  </div>
								  
							  </div>
							  
							</div>
						</div>
						
						<div class="tabcellpv btright">
						<div class="arrowrightpv lnr lnr-chevron-right"></div>
						</div>
						
						</div>
						
						<div class="fastreview">
						Быстрый просмотр
						</div>
						
						
						<div class="statusorder">
						На заказ
						</div>
						
						<div class="itemtextpv">
						Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды
						</div>
						
						<div class="articlepv">
						<span>Артикул</span><span style="float: right;">ST-02.60</span>
						</div>
						
						<div class="pricepv">
							<div class="newprice">7 990 руб.</div>
							<div class="oldprice">7 990 руб.</div>
						</div>
					</div>
				</div>
				
				


							  
	  
	  
				<div class="elem">
		
					<div class="itempv">
						<div class="discountpv">-10 %</div>
						
						<div class="gallerypvcontent">
						
						<div class="tabcellpv btleft">
						
						<div class="arrowleftpv lnr lnr-chevron-left"></div>
						</div>
						
						<div class="gallerypv tabcellpv">
							<div class="qqqq">
							  <div class="scroll">
								  <div class="scroll_child">
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
								  </div>
								  
							  </div>
							  
							</div>
						</div>
						
						<div class="tabcellpv btright">
						<div class="arrowrightpv lnr lnr-chevron-right"></div>
						</div>
						
						</div>
						
						<div class="fastreview">
						Быстрый просмотр
						</div>
						
						
						<div class="statusorder">
						На заказ
						</div>
						
						<div class="itemtextpv">
						Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды
						</div>
						
						<div class="articlepv">
						<span>Артикул</span><span style="float: right;">ST-02.60</span>
						</div>
						
						<div class="pricepv">
							<div class="newprice">7 990 руб.</div>
							<div class="oldprice">7 990 руб.</div>
						</div>
					</div>
				</div>
				
				
							  
	  
	  
				<div class="elem">
		
					<div class="itempv">
						<div class="discountpv">-10 %</div>
						
						<div class="gallerypvcontent">
						
						<div class="tabcellpv btleft">
						
						<div class="arrowleftpv lnr lnr-chevron-left"></div>
						</div>
						
						<div class="gallerypv tabcellpv">
							<div class="qqqq">
							  <div class="scroll">
								  <div class="scroll_child">
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
								  </div>
								  
							  </div>
							  
							</div>
						</div>
						
						<div class="tabcellpv btright">
						<div class="arrowrightpv lnr lnr-chevron-right"></div>
						</div>
						
						</div>
						
						<div class="fastreview">
						Быстрый просмотр
						</div>
						
						
						<div class="statusorder">
						На заказ
						</div>
						
						<div class="itemtextpv">
						Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды
						</div>
						
						<div class="articlepv">
						<span>Артикул</span><span style="float: right;">ST-02.60</span>
						</div>
						
						<div class="pricepv">
							<div class="newprice">7 990 руб.</div>
							<div class="oldprice">7 990 руб.</div>
						</div>
					</div>
				</div>
				
				
							  
	  
	  
				<div class="elem">
		
					<div class="itempv">
						<div class="discountpv">-10 %</div>
						
						<div class="gallerypvcontent">
						
						<div class="tabcellpv btleft">
						
						<div class="arrowleftpv lnr lnr-chevron-left"></div>
						</div>
						
						<div class="gallerypv tabcellpv">
							<div class="qqqq">
							  <div class="scroll">
								  <div class="scroll_child">
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
								  </div>
								  
							  </div>
							  
							</div>
						</div>
						
						<div class="tabcellpv btright">
						<div class="arrowrightpv lnr lnr-chevron-right"></div>
						</div>
						
						</div>
						
						<div class="fastreview">
						Быстрый просмотр
						</div>
						
						
						<div class="statusorder">
						На заказ
						</div>
						
						<div class="itemtextpv">
						Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды
						</div>
						
						<div class="articlepv">
						<span>Артикул</span><span style="float: right;">ST-02.60</span>
						</div>
						
						<div class="pricepv">
							<div class="newprice">7 990 руб.</div>
							<div class="oldprice">7 990 руб.</div>
						</div>
					</div>
				</div>
				
				
							  
	  
	  
				<div class="elem">
		
					<div class="itempv">
						<div class="discountpv">-10 %</div>
						
						<div class="gallerypvcontent">
						
						<div class="tabcellpv btleft">
						
						<div class="arrowleftpv lnr lnr-chevron-left"></div>
						</div>
						
						<div class="gallerypv tabcellpv">
							<div class="qqqq">
							  <div class="scroll">
								  <div class="scroll_child">
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
								  </div>
								  
							  </div>
							  
							</div>
						</div>
						
						<div class="tabcellpv btright">
						<div class="arrowrightpv lnr lnr-chevron-right"></div>
						</div>
						
						</div>
						
						<div class="fastreview">
						Быстрый просмотр
						</div>
						
						
						<div class="statusorder">
						На заказ
						</div>
						
						<div class="itemtextpv">
						Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды
						</div>
						
						<div class="articlepv">
						<span>Артикул</span><span style="float: right;">ST-02.60</span>
						</div>
						
						<div class="pricepv">
							<div class="newprice">7 990 руб.</div>
							<div class="oldprice">7 990 руб.</div>
						</div>
					</div>
				</div>
				
				
							  
	  
	  
				<div class="elem">
		
					<div class="itempv">
						<div class="discountpv">-10 %</div>
						
						<div class="gallerypvcontent">
						
						<div class="tabcellpv btleft">
						
						<div class="arrowleftpv lnr lnr-chevron-left"></div>
						</div>
						
						<div class="gallerypv tabcellpv">
							<div class="qqqq">
							  <div class="scroll">
								  <div class="scroll_child">
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
								  </div>
								  
							  </div>
							  
							</div>
						</div>
						
						<div class="tabcellpv btright">
						<div class="arrowrightpv lnr lnr-chevron-right"></div>
						</div>
						
						</div>
						
						<div class="fastreview">
						Быстрый просмотр
						</div>
						
						
						<div class="statusorder">
						На заказ
						</div>
						
						<div class="itemtextpv">
						Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды
						</div>
						
						<div class="articlepv">
						<span>Артикул</span><span style="float: right;">ST-02.60</span>
						</div>
						
						<div class="pricepv">
							<div class="newprice">7 990 руб.</div>
							<div class="oldprice">7 990 руб.</div>
						</div>
					</div>
				</div>
				
				

							  
	  
	  
				<div class="elem">
		
					<div class="itempv">
						<div class="discountpv">-10 %</div>
						
						<div class="gallerypvcontent">
						
						<div class="tabcellpv btleft">
						
						<div class="arrowleftpv lnr lnr-chevron-left"></div>
						</div>
						
						<div class="gallerypv tabcellpv">
							<div class="qqqq">
							  <div class="scroll">
								  <div class="scroll_child">
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
								  </div>
								  
							  </div>
							  
							</div>
						</div>
						
						<div class="tabcellpv btright">
						<div class="arrowrightpv lnr lnr-chevron-right"></div>
						</div>
						
						</div>
						
						<div class="fastreview">
						Быстрый просмотр
						</div>
						
						
						<div class="statusorder">
						На заказ
						</div>
						
						<div class="itemtextpv">
						Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды Вешало напольное ST-02.60 для магазина одежды
						</div>
						
						<div class="articlepv">
						<span>Артикул</span><span style="float: right;">ST-02.60</span>
						</div>
						
						<div class="pricepv">
							<div class="newprice">7 990 руб.</div>
							<div class="oldprice">7 990 руб.</div>
						</div>
					</div>
					
					
				</div>
				
					</div>
				</div>
				
				
				
				
				
				

			<div class="tabcellpv1 btright1">
		<div class="arrowrightpv1 lnr lnr-chevron-right"></div>
	</div>
</div>
			
			
			
			
	<br><br><br><br>		
			
			
			
			
			
			
		
			
			
			
			
		









		
			
			
			
			
			
			
			
		
	








<style>




	/* Для мобильной версии каталог*/
	@media(max-width:1270px){
		
		
		/*
		.sectionCatalogFilter__row.one{
			display: none !important;
		}
		*/
		
		.sectionCatalogFilter-info{
				display: block !important;
		}	
		
		.sectionCatalogFilter-info__col.two{
			display: none !important;	
		}
		
		
		.pvico1{
			width: 20px;
			display: inline-block;
			top: 3px;
		}
		
		.pvico2{
			display: inline-block;
			
		}
		
		.sectionCatalogFilter-info__col.three{
			
			
		}
		
		.sectionCatalogFilter-info__col.one{
			margin-bottom: 1.6rem;
		}
		
		
		
		.sectionCatalogNav{
			margin-bottom: 30px;
			
		}
		
		
		.catalogDetailProdukts__title{
			margin-bottom: 40px;	
		}
		
		
		
		.catalogDetailProdukts-slider__btn-left.slick-arrow{
			left: -25px !important;
			right: unset !important;	
		}

		.catalogDetailProdukts-slider__btn-right.slick-arrow{
		right: -25px !important;	
		left: unset !important;	
		}
		
		
		
		    
		
		
		
		
		
		
		
	}
	
	
	
	











	/* Новая задача при нажатии выделение*/
	.pvbtndefault{
			color: #a7a7a7!important;
	}
	.pvbtndefault:hover{
			color: #5f5d5d!important;
	}
	.pvbtnclick{
			color: #5c22bb!important;
	}
	pvbtn{
			color: #a7a7a7!important;
	}

	.header-top__icon:hover{
			color: #5f5d5d!important;
	}
	.pvkard:hover{
			color: #5f5d5d!important;
	}
	.header-middle-control__cart.click .header-top__icon {
		color: #a7a7a7!important;
	}
	.fa-heart{
		color:#5c22bb!important
	}
	.visablebtn{
		display: block;
	}
	.unvisablebtn{
		display: none;
	}
	
	
	
	
				.tutu{
					display: none !important;
					
				}
				
				
				
				@media (max-width:1270px){
					
					
					.tutu{
						display: none !important;
						
					}
					
					.visable1{
						display: flex !important;
						
					}
					
					.unvisable1{
						display: none !important;
						
					}
					
					.wrapper__col.right{ 
						margin-left: 0px !important;
						margin-right: 0px !important;
					}
					
					.sectionCatalogFilter__row.one{
						margin-left: 0px !important;
						
					}
					
					.sectionCatalogFilter-selected{
					    margin-left: 0px !important;	
					}
					
					
				
				}
				
				
				
				.sectionCatalogFilter-info{
					cursor: pointer;
					
				}
				
				
				
				
					.pvkard{
						color: #a7a7a7;
						position: absolute;
						top: 5px;
						right: 5px;
						margin-top: 0px;
						z-index: 12;
						font-size: 20px;
						font-weight: 400;
						cursor: pointer;
					}
					
					.sectionCatalogList-items-prev-smo__link {
						margin-top: 15px;
					}
					
					
					
					.pvfa2{
						margin-top: 10px;
					
					}
					
					.qw22{
						font-size: 20px;
						position: absolute;
						right: -20px;
						color: #5c22bb !important;
					}
					
					.qw33{
						font-size: 20px;
						position: absolute;
						right: -20px;
						color: #5c22bb !important;
						top: 30px;
					}
					
					
					
					
					
					
					
					
				.sectionCatalogFilter__row.one{
					
					
				}
				
				
				
					@media(max-width:1270px){
						.slick-track{
							width: max-content !important;

						}
						.catalogDetailProdukts-slider__item.slick-slide.slick-current.slick-active{
							width: 280px !important;
						}
						.catalogDetailProdukts-slider__item.slick-slide{
							width: 280px !important;
							
						}
					}	
				
				
				.sectionCatalogList-items-prev{
					display: none !important;
					
				}
				
				
				
				
				
	.scroll{
		width:100%;
		overflow-x:scroll;
		overflow-y:hidden;
	}
	
	 .scroll_child{
	 
		text-align:center;
	 }
	
	.scroll_child > div{
		display: inline-block;
		
		
	}
	
	.qqqq{
	    padding-left: 22px;
	}
	
	
	
	.qqqq ::-webkit-scrollbar-thumb {
		border-radius: 0px !important;
		background-color: #f9a6a600 !important;
		background: rgba(0, 0, 0, 0);
	}


	.qqqq ::-webkit-scrollbar-track {
		background-color: #f9a6a600 !important;
		background: rgba(0, 0, 0, 0);
	}
	
	
	.qqqq ::-webkit-scrollbar-button {
		background-color: #f9a6a600 !important;
		background: rgba(0, 0, 0, 0);
		width: 5px;
		height: 0px;
		background-repeat: no-repeat;
	}
	
	.scroll_child{
		white-space: nowrap;
		
	}
	
	
	
	.section_goods{
		width: 136px;
		height: 119px;
		background: #EEEEEE;
		margin: 2px 0;
		padding: 9px;
	}
	
	.section_ico{
		width: 53px;
		height: 53px;
		background-size: contain;
		background-repeat: no-repeat;
		background-position: center;
		margin: 0px auto 4px auto;
	}
	
	
	.section_title{
		font-family: Open Sans;
		font-style: normal;
		font-weight: normal;
		font-size: 14px;
		line-height: 19px;
		color: #2F2F2F;
		height: 40px;
		white-space: pre-wrap;
		overflow: hidden;
	}
	
	.elem{
		vertical-align: top;
		
	}



@media (max-width: 1270px) {

	.scroll_child{
	letter-spacing: -4px;
	    margin-left: 0px;
}


.qqqq{
	
	    padding-left: 0px;
	
}


.elem:nth-child(1){
	    margin-left: 21px;
	
}

.elem{
letter-spacing: 0px;
margin-right: 0px;
}


.elem:nth-last-child(1){
margin-right: 21px;
}



	
}








/* Для десктопной версии */

@media (min-width: 1270px) {
	
	
	

	
	
	
	
	
	
	
	
	
	.section_title{
	    max-height: 40px !important;
	
}
	
	
	.scroll{
		
	}
	 
	 .scroll_child{
	 
    width: 100%;
	 }
	
	.qqqq{
		    width: 1270px;
    margin: auto;
    padding-left: 0px;
	}
	
	 
	
	.section_goods{
		
		    width: 100%;
    background: unset;
	}
	
	.section_ico{
	
	height: 68px;
    width: 110px;
	
    background-image: url(/upload/iblock/3e1/3e1767d….png);
}
	
	
	.section_title{
		    width: 75%;
    margin: auto auto 0;
    text-align: center;
	}
	
	.elem{
		width: 20%;
	}
	
	
	.qqqq a{
		
		
    width: 100%;
    margin-bottom: 50px !important;
    display: flow-root;
		
	}
	
	
	
	
	.section_goods:hover .section_ico{
		opacity: 0.6; 
		transition: opacity 150ms;
	}
	
	.section_goods:hover .section_title{
		font-size: 17px;
		transition: opacity 350ms;
	}
	
	
	
	
}

	.discountpv{
		float: left;
		border: 1px solid #ff4500;
		font-style: normal;
		font-weight: 400;
		font-size: 9px;
		line-height: 186.2%;
		padding: 2px 8px;
	}

	.gallerypv{
	/*	background-image: url(/assest/img/slider-2.png);*/
		width: 100%;
		height: 200px;
		background-repeat: no-repeat;
		background-position: center;
		background-size: contain;
	}
	
	.gallerypvcontent{
		width: 100%;
		height: 200px;
		
	}
	
	
	.arrowleftpv, .arrowrightpv{
		display:inline-block;
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	.statusorder{
		line-height: 18px;
		font-weight: 600!important;
		color: #5c22bb;
		text-aling:left;
		text-align: left;
		margin: 0px 20px 0px 20px;
		
	}
	
	.elem{
		width: 280px;
		
	}
	
	.itemtextpv{
		text-align: left;
		font-style: normal;
		font-weight: 600;
		font-size: 13px;
		line-height: 18px;
		color: #2f2f2f;
		margin-bottom: 20px;
		white-space: normal;
		margin: 0 20px 20px 20px;
		height: 40px;
		overflow: hidden;
	}
	
	
	.articlepv{
		font-style: normal;
		font-weight: 300;
		font-size: 13px;
		line-height: 18px;
		color: #2f2f2f;
		text-align: left;
		margin: 0 21px 0 21px;
		border-bottom: dotted 1px;
		white-space: normal;
		
	}
	
	
	.pricepv{
		text-align: left;
		margin: 0 21px 0 21px;
		
	}
	
	
	.articlepv{
		    justify-content: space-between;
		border-bottom: 1px solid rgba(113,113,113,.3);
		font-weight: 300;
		margin-bottom: 18px;
		font-style: normal;
		font-size: 13px;
		line-height: 18px;
		color: #2f2f2f;
		
	}
	
	.newprice{
		font-style: normal;
		font-weight: 600;
		font-size: 15px;
		line-height: 20px;
		color: #ff4500;
		text-align: right;
		
	}
	
	.oldprice{
		font-style: normal;
		font-weight: 300;
		font-size: 12px;
		line-height: 16px;
		text-decoration-line: line-through;
		color: #616161;
		text-align: right;
	}
	
	.itemtextpv{
		
		
	}
	
	
	
	.fastreview{
		opacity: 0;
	}


	.itempv{
		border: solid 1px white;
		
	}
	.pricepv{
		margin-bottom: 20px;
		
	}
	
	.fastreview{
		border: solid 1px #b8b8b8;
		border-left: 0px;
		border-right: 0px;
		margin-bottom: 4px;
		padding: 5px;
	
	}





	/*При наведении */

	.elem:hover .itempv{
		border: solid 1px #b8b8b8;
		
	}
	.elem:hover .fastreview{
		opacity: 1;	
		
	}

	.tabcellpv{
			display: table-cell;
    vertical-align: middle;
		
	}


	.gallerypvcontent{
			display: table;
	}


	.elem11{
		width: 216px;
		height: 200px;
		background-image: url(/assest/img/slider-2.png);
		width: 100%;
		height: 200px;
		background-repeat: no-repeat;
		background-position: center;
		background-size: contain;
	}
	
	.scroll_child{
		transition: transform 0.1s ease, 0.1s ease, filter 0.1s;
	}
	.elem11 {
		margin: 0 2px 0 2px;
		
	}
	
	
	.gallerypv .qqqq{
		width: unset;
		
	}
	
	
	
	
	
	
	
	
	
	.arrowrightpv, .arrowleftpv{
		opacity: 0;	
		
	}
	
	
	.elem:hover .arrowrightpv, .elem:hover .arrowleftpv{
		opacity: 1;	
		
	}
	
	
	@media(min-width:1270px){
	
		.sort1{
			display: none !important;
			
		}
	}
	
	
	
	@media(max-width:1270px){
		
		
		.gallerypv .scroll_child{
			transform: translate3d(0px, 0px, 0px) !important;
		}
		
		
		.btleft, .btright{
			display: none;
			
		}
		
		 
		.scroll_child .elem11:not(:first-child){
			display: none;
		}
		
		.elem11{
			margin:0px !important;
			
		}
		
		.qqqq1{
			width: 100%;	
		}
		
		
		
		
		
	}
	
	
	
	
			.qqqq1{
				display: flex;	
				
			}
			
			.tabcellpv1{
				vertical-align: middle;
				    margin: auto;
			}
			
			
			.innercont{
				display: inline-block;
				width: calc(100% - 62px);

				
			}
			
			
			.elem{
				width: calc(((100% - 21px) / 4));
			}
			
			
			@media(max-width:1200px){
				.elem{
					width: calc(((100% - 21px) / 3));
				}	
			}
			
			
			@media(max-width:850px){
				.elem{
					width: calc(((100% - 21px) / 2));
				}	
			}
			
			@media(max-width:540px){
				.elem{
					width: 100%;
					margin-left: 0px !important;
				}	
			}
			
			
			.titlepvtovar{
				margin: 0 20px 40px 20px;
				
			}
			
			@media (max-width: 906px) and (min-width: 620px){
				.sectionCatalogList-items__item:last-child{
				float: right;
			}
				
			}
			
			
			.titlegoods{
				width: 100%;
				max-width: 1270px;
				margin: auto;
				margin-top: 50px;
				
			}
			
			
			
		.wrapper{
				height: unset;
			
		}
	
		/* Для быстрого просмотра */ 
			@media (max-height: 900px){
				.Pvstyle .fastSeeProduct-hero__wrap{
					    height: 90%;
				
				}
				.Pvstyle .descriptionpv{
					height: 100%;
					overflow-y: auto;
				}
				
				.Pvstyle .catalogDetail-hero{
					height: 100%;
				}
			}
		
			.Pvstyle  .fastSeeProduct-control{
						justify-content: left !important;
			}
			
			
						
						
						
			/* Стили для скрола */ 	
			::-webkit-scrollbar-button {
			background-image:url('');
			background-repeat:no-repeat;
			width:5px;
			height:0px
			}

			 ::-webkit-scrollbar-track {
			background-color: #ecedee00;
			}

			::-webkit-scrollbar-thumb {
			-webkit-border-radius: 0px;
			border-radius: 9px;
			background-color: #5c22bb;
			}

			::-webkit-scrollbar-thumb:hover{
			background-color:#c4c4c4;
			}

			::-webkit-resizer{
			background-image:url('');
			background-repeat:no-repeat;
			width:4px;
			height:0px
			}

			 ::-webkit-scrollbar{
			width: 8px;
			}
			
			/* Стили для скрола */ 	
			.Pvstyle ::-webkit-scrollbar-button {
			background-image:url('');
			background-repeat:no-repeat;
			width:5px;
			height:0px
			}

			.Pvstyle  ::-webkit-scrollbar-track {
			background-color: #ecedee00;
			}

			.Pvstyle  ::-webkit-scrollbar-thumb {
			-webkit-border-radius: 0px;
			border-radius: 9px;
			background-color: #9d9d9d;
			}

			.Pvstyle  ::-webkit-scrollbar-thumb:hover{
			background-color:#c4c4c4;
			}

			 .Pvstyle ::-webkit-resizer{
			background-image:url('');
			background-repeat:no-repeat;
			width:4px;
			height:0px
			}

			.Pvstyle  ::-webkit-scrollbar{
			width: 8px;
			}
				
				
		
	.sectionCatalogList-items__name{
		height: 58px;
		overflow: hidden;	
	}
	
	
		@media (max-width: 1270px) {
			
			
			
			
			
			
			
			
			
			.wrapper__col.left{
				display: none !important;
			}
			
			
			.wrapper__col.right{
				margin: 21px 0 21px 0 !important;
				width: 100%;
				  
			}
			 
			.wrapper__hero{
				margin-left: 0px;
				
			}
			
			.sectionCatalogList-items-prev{
				display: none !important;
				
			}
			
			.sectionCatalogList-items__item {
				width: 270px !important;
			}
			
			
			
			
			.pvdiv .sectionCatalogList-items__item{
				
				display: inline-block;
			}
			
			.pvdiv .sectionCatalogList-items{
				text-align: justify;
				margin: 0 21px 0 21px;
				text-align-last: justify;
				
			}
			
			.pvdiv .sectionCatalogList-items{
				display: block;
				
			}
			
			
			.sectionCatalogList-items__item{
				text-align-last: auto;
				
			}
			
			
			
			
			
			
		}
		
		
		
		
		
		@media (max-width: 1270px) {
		
			.pvdiv .sectionCatalogList-items{
				margin-left: calc(25% - 202px);
				margin-right: calc(25% - 202px);	
			}
			
			.pvdiv .sectionCatalogList-items__item {
				margin-left: unset;
				margin-top: 50px;
			}
		
		}
		
		
		
		
		@media (max-width: 906px) {
				
			.pvdiv .sectionCatalogList-items{
				margin-left: calc(31% - 170px);
				margin-right: calc(31% - 170px);
			}
			
			.pvdiv .sectionCatalogList-items__item {
				margin-left: unset;
				margin-top: 50px;
			}
			
		}
		
		
		
		
		@media (max-width: 620px) {
				
			.pvdiv .sectionCatalogList-items__item {
				margin: auto;
				display: block;
				margin-top: 50px;
			}
				
			
			
			.pvdiv .sectionCatalogFilter-selected{
				display: block;
				width: 100%;
				
			}
			
			
			.sectionCatalogList-items{
				margin-left: 0px !important;
				margin-right: 0px !important;
			}
			
			
		}
		
		
		
		
		.pvdiv{
			margin-left: 23px;
			margin-right: 23px;
			
		}
		
		
			
			@media (max-width: 788px) {	
				
				
				
				.sectionCatalogList-items__item{
					padding: 1px 1px 20px !important;
					    width: 164px !important;
				}
				
				
				.sectionCatalogList-items__pic{
					width: 100% !important;
					text-align: center !important;
					background-color: white !important;
					
				}
				
				.catalogDetailProdukts-slider-mini-prop.catalogSectionPropHeight{
					height: 18px !important;
					
				}
				
				.sectionCatalogList-items__name{
					margin-bottom: 15px !important;
					font-weight: 600 !important;
					padding: 0 10px !important;
				}
				
				
				.sectionCatalogList-items-price{
					    padding: 0 10px !important;
					
				}
				
				.sectionCatalogList-items-control{
						text-align: center !important;
					
				}
				
				.sectionCatalogList-items-control__buy.black{
					    width: 150px !important;
					margin: auto !important;
					height: 40px !important;
				}
				
				
				.sectionCatalogList-items-prop{
					    display: none;
				}
				
				.sectionCatalogList-items-control__col.one{
					display: none;
					
				}
				
				
				.pvdiv .sectionCatalogList-items__item{
					display: inline-block;
					
				}
				
				
			
				
				
				
				@media (max-width: 1270px)
					.pvdiv .sectionCatalogList-items {
					margin-left: calc(25% - 202px) !important;
					margin-right: calc(25% - 202px) !important;
					
					}
					
					.sectionCatalogList-items__item{
						
						
					}
					
					
				}
				
				@media (max-width: 870px) {
					
					
					.pvdiv .sectionCatalogList-items {
						margin-left: calc(31% - 170px) !important;
						margin-right: calc(31% - 170px) !important;
					}
					
					
					
					
					
					
				}
				
				
				@media (max-width: 840px) and  (min-width: 550px) {
				
				.sectionCatalogList-items__item:nth-last-child(1){  
					 margin-left: calc(50% - 246px) !important;	
						
					}
					
				}	
					
				
				
				
				
				@media (max-width: 680px) {
					.pvdiv .sectionCatalogList-items {
						margin-left: calc(25% - 123px) !important;
						margin-right: calc(25% - 123px) !important;
					}
					
					
				}
				
				
				
				
				@media (max-width: 565px) {
					.pvdiv .sectionCatalogList-items {
						margin-left: calc(33% - 109px) !important;
						margin-right: calc(33% - 109px) !important;
					}
				}
				
				
				@media (max-width: 350px) {
					.pvdiv .sectionCatalogList-items {
						margin-left: calc(50% - 82px) !important;
						margin-right: calc(50% - 82px) !important;
					}
				}
				
				
				
				
				
				.pvdiv{
					margin-left: 0px !important;
					margin-right: 0px !important;
					
				}
				
				
				
				
				.breadcrumbs, .sectionCatalogFilter, .comman_h1, .sectionCatalogList-sort{
					margin-left: 21px !important;
					margin-right: 21px !important;



				}
				
				
				
				@media (max-width: 790px) {
					
					.sectionCatalogList-items__item{
						vertical-align: top;
						
						
					}
					
					.sectionCatalogList-items-price {
							min-height: 40px;	
					}
					
					.sectionCatalogList-items-control__buy{
							height: 40px !important;
							width: 150px !important;						
					}
					
				}
				
				
				
			}	
				







</style>





















































































































<?/*





<div class="row mb-4 bx-<?=$arParams["TEMPLATE_THEME"]?>">
	
	
	<?/*
	<? if ($isFilter || $isSidebar): ?>
	
	
	
	
	<?/*Начало фильтра*/?>
	<?/*======================================================*/?>
	
	<?/*
	
		<div class="col-lg-3 col-md-4 col-sm-5<?=(isset($arParams['FILTER_HIDE_ON_MOBILE']) && $arParams['FILTER_HIDE_ON_MOBILE'] === 'Y' ? ' d-none d-sm-block' : '')?>">
			<?
			//region Filter
			if ($isFilter): ?>
			
			
			
				<div class="bx-sidebar-block">
					<?
					$APPLICATION->IncludeComponent("bitrix:catalog.smart.filter", "bootstrap_v4", array(
							"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
							"IBLOCK_ID" => $arParams["IBLOCK_ID"],
							"SECTION_ID" => $arCurSection['ID'],
							"FILTER_NAME" => $arParams["FILTER_NAME"],
							"PRICE_CODE" => $arParams["~PRICE_CODE"],
							"CACHE_TYPE" => $arParams["CACHE_TYPE"],
							"CACHE_TIME" => $arParams["CACHE_TIME"],
							"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
							"SAVE_IN_SESSION" => "N",
							"FILTER_VIEW_MODE" => $arParams["FILTER_VIEW_MODE"],
							"XML_EXPORT" => "N",
							"SECTION_TITLE" => "NAME",
							"SECTION_DESCRIPTION" => "DESCRIPTION",
							'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
							"TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],
							'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
							'CURRENCY_ID' => $arParams['CURRENCY_ID'],
							"SEF_MODE" => $arParams["SEF_MODE"],
							"SEF_RULE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["smart_filter"],
							"SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
							"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
							"INSTANT_RELOAD" => $arParams["INSTANT_RELOAD"],
						),
						$component,
						array('HIDE_ICONS' => 'Y')
					);
					?>
				</div>
			<? endif
			//endregion
			?>


			<?/*Описание
			
			<?
			//region Sidebar
			if ($isSidebar): ?>
				<div class="d-none d-sm-block">
					<? $APPLICATION->IncludeComponent("bitrix:main.include", "", Array(
							"AREA_FILE_SHOW" => "file",
							"PATH" => $arParams["SIDEBAR_PATH"],
							"AREA_FILE_RECURSIVE" => "N",
							"EDIT_MODE" => "html",
						),
						false,
						array('HIDE_ICONS' => 'Y')
					);
					?>
				</div>
			<? endif
			//endregion
			?>
			?>*/?>
			
		<?/*	
		</div>
		
	
		
	<?endif?>

	*/?>
	
	<?/*======================================================*/?>
	<?/*Конец фильтра*/?>









































	<?/*Начало Списка товаров*/?>
	<?/*======================================================*/?>

<?/*
	
	<div class="pb-4 <?=(($isFilter || $isSidebar) ? "col-lg-9 col-md-8 col-sm-7" : "col")?>">
		<?
		if (ModuleManager::isModuleInstalled("sale"))
		{
			$arRecomData = array();
			$recomCacheID = array('IBLOCK_ID' => $arParams['IBLOCK_ID']);
			$obCache = new CPHPCache();
			if ($obCache->InitCache(36000, serialize($recomCacheID), "/sale/bestsellers"))
			{
				$arRecomData = $obCache->GetVars();
			}
			elseif ($obCache->StartDataCache())
			{
				if (Loader::includeModule("catalog"))
				{
					$arSKU = CCatalogSku::GetInfoByProductIBlock($arParams['IBLOCK_ID']);
					$arRecomData['OFFER_IBLOCK_ID'] = (!empty($arSKU) ? $arSKU['IBLOCK_ID'] : 0);
				}
				$obCache->EndDataCache($arRecomData);
			}

			//region Product Gift
			if (!empty($arRecomData) && $arParams['USE_GIFTS_SECTION'] === 'Y')
			{
				?>
				<div class="row">
					<div class="col" data-entity="parent-container">
						<? if (!isset($arParams['GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE']) || $arParams['GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE'] !== 'Y')
						{
							?>
							<div class="catalog-block-header" data-entity="header" data-showed="false" style="display: none; opacity: 0;"><?
								echo ($arParams['GIFTS_SECTION_LIST_BLOCK_TITLE'] ?: \Bitrix\Main\Localization\Loc::getMessage('CT_GIFTS_SECTION_LIST_BLOCK_TITLE_DEFAULT'));
							?></div><?
						}

						CBitrixComponent::includeComponentClass('bitrix:sale.products.gift.section');
						$APPLICATION->IncludeComponent(
							'bitrix:sale.products.gift.section',
							'bootstrap_v4', array(
								'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
								'IBLOCK_ID' => $arParams['IBLOCK_ID'],

								'SECTION_ID' => $arResult['VARIABLES']['SECTION_ID'],
								'SECTION_CODE' => $arResult['VARIABLES']['SECTION_CODE'],
								'SECTION_ID_VARIABLE' => $arParams['SECTION_ID_VARIABLE'],

								'PRODUCT_ID_VARIABLE' => $arParams['PRODUCT_ID_VARIABLE'],
								'ACTION_VARIABLE' => (!empty($arParams['ACTION_VARIABLE']) ? $arParams['ACTION_VARIABLE'] : 'action').'_spgs',

								'PRODUCT_ROW_VARIANTS' => \Bitrix\Main\Web\Json::encode(
									SaleProductsGiftSectionComponent::predictRowVariants(
										$arParams['GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT'],
										$arParams['GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT']
									)
								),
								'PAGE_ELEMENT_COUNT' => $arParams['GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT'],
								'DEFERRED_PRODUCT_ROW_VARIANTS' => '',
								'DEFERRED_PAGE_ELEMENT_COUNT' => 0,

								'SHOW_DISCOUNT_PERCENT' => $arParams['GIFTS_SHOW_DISCOUNT_PERCENT'],
								'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
								'SHOW_OLD_PRICE' => $arParams['GIFTS_SHOW_OLD_PRICE'],
								'PRODUCT_DISPLAY_MODE' => 'Y',
								'PRODUCT_BLOCKS_ORDER' => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
								'SHOW_SLIDER' => $arParams['LIST_SHOW_SLIDER'],
								'SLIDER_INTERVAL' => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
								'SLIDER_PROGRESS' => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',

								'TEXT_LABEL_GIFT' => $arParams['GIFTS_DETAIL_TEXT_LABEL_GIFT'],

								'LABEL_PROP_'.$arParams['IBLOCK_ID'] => array(),
								'LABEL_PROP_MOBILE_'.$arParams['IBLOCK_ID'] => array(),
								'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],

								'ADD_TO_BASKET_ACTION' => $basketAction,
								'MESS_BTN_BUY' => $arParams['~GIFTS_MESS_BTN_BUY'],
								'MESS_BTN_ADD_TO_BASKET' => $arParams['~GIFTS_MESS_BTN_BUY'],
								'MESS_BTN_DETAIL' => $arParams['~MESS_BTN_DETAIL'],
								'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],

								'PROPERTY_CODE' => (isset($arParams['LIST_PROPERTY_CODE']) ? $arParams['LIST_PROPERTY_CODE'] : []),
								'PROPERTY_CODE_MOBILE' => $arParams['LIST_PROPERTY_CODE_MOBILE'],
								'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],

								'OFFERS_FIELD_CODE' => $arParams['LIST_OFFERS_FIELD_CODE'],
								'OFFERS_PROPERTY_CODE' => (isset($arParams['LIST_OFFERS_PROPERTY_CODE']) ? $arParams['LIST_OFFERS_PROPERTY_CODE'] : []),
								'OFFER_TREE_PROPS' => (isset($arParams['OFFER_TREE_PROPS']) ? $arParams['OFFER_TREE_PROPS'] : []),
								'OFFERS_CART_PROPERTIES' => (isset($arParams['OFFERS_CART_PROPERTIES']) ? $arParams['OFFERS_CART_PROPERTIES'] : []),
								'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],

								'HIDE_NOT_AVAILABLE' => 'Y',
								'HIDE_NOT_AVAILABLE_OFFERS' => 'Y',
								'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
								'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
								'PRICE_CODE' => $arParams['~PRICE_CODE'],
								'SHOW_PRICE_COUNT' => $arParams['SHOW_PRICE_COUNT'],
								'PRICE_VAT_INCLUDE' => $arParams['PRICE_VAT_INCLUDE'],
								'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
								'BASKET_URL' => $arParams['BASKET_URL'],
								'ADD_PROPERTIES_TO_BASKET' => $arParams['ADD_PROPERTIES_TO_BASKET'],
								'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
								'PARTIAL_PRODUCT_PROPERTIES' => $arParams['PARTIAL_PRODUCT_PROPERTIES'],
								'USE_PRODUCT_QUANTITY' => 'N',
								'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
								'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],

								'USE_ENHANCED_ECOMMERCE' => (isset($arParams['USE_ENHANCED_ECOMMERCE']) ? $arParams['USE_ENHANCED_ECOMMERCE'] : ''),
								'DATA_LAYER_NAME' => (isset($arParams['DATA_LAYER_NAME']) ? $arParams['DATA_LAYER_NAME'] : ''),
								'BRAND_PROPERTY' => (isset($arParams['BRAND_PROPERTY']) ? $arParams['BRAND_PROPERTY'] : ''),
							),
							$component,
							array("HIDE_ICONS" => "Y")
						);
						?>
					</div>
				</div>
				<?
			}
			//endregion
		}

		//region Catalog Section
		$APPLICATION->IncludeComponent(
			"bitrix:catalog.section.list",
			"bootstrap_v4", array(
				"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
				"IBLOCK_ID" => $arParams["IBLOCK_ID"],
				"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
				"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
				"CACHE_TYPE" => $arParams["CACHE_TYPE"],
				"CACHE_TIME" => $arParams["CACHE_TIME"],
				"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
				"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
				"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
				"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
				"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
				"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
				"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
				"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : '')
			),
			$component,
			array("HIDE_ICONS" => "Y")
		);
		//endregion


echo "test666";

		//region Compare List
		if ($arParams["USE_COMPARE"]=="Y")
		{
			$APPLICATION->IncludeComponent(
			 	"bitrix:catalog.compare.list",
				"bootstrap_v4", array(
					"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
					"IBLOCK_ID" => $arParams["IBLOCK_ID"],
					"NAME" => $arParams["COMPARE_NAME"],
					"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
					"COMPARE_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["compare"],
					"ACTION_VARIABLE" => (!empty($arParams["ACTION_VARIABLE"]) ? $arParams["ACTION_VARIABLE"] : "action"),
					"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
					'POSITION_FIXED' => isset($arParams['COMPARE_POSITION_FIXED']) ? $arParams['COMPARE_POSITION_FIXED'] : '',
					'POSITION' => isset($arParams['COMPARE_POSITION']) ? $arParams['COMPARE_POSITION'] : ''
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
		}
		//endregion
		
echo "test77";		

	 	 $intSectionID = $APPLICATION->IncludeComponent(
					"bitrix:catalog.section",
					"bootstrap_v4", array(
						"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
						"IBLOCK_ID" => $arParams["IBLOCK_ID"],
						"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
						"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
						"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
						"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
						"PROPERTY_CODE" => (isset($arParams["LIST_PROPERTY_CODE"]) ? $arParams["LIST_PROPERTY_CODE"] : []),
						"PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
						"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
						"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
						"BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
						"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
						"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
						"BASKET_URL" => $arParams["BASKET_URL"],
						"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
						"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
						"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
						"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
						"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
						"FILTER_NAME" => $arParams["FILTER_NAME"],
						"CACHE_TYPE" => $arParams["CACHE_TYPE"],
						"CACHE_TIME" => $arParams["CACHE_TIME"],
						"CACHE_FILTER" => $arParams["CACHE_FILTER"],
						"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
						"SET_TITLE" => $arParams["SET_TITLE"],
						"MESSAGE_404" => $arParams["~MESSAGE_404"],
						"SET_STATUS_404" => $arParams["SET_STATUS_404"],
						"SHOW_404" => $arParams["SHOW_404"],
						"FILE_404" => $arParams["FILE_404"],
						"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
						"PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
						"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
						"PRICE_CODE" => $arParams["~PRICE_CODE"],
						"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
						"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

						"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
						"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
						"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
						"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
						"PRODUCT_PROPERTIES" => (isset($arParams["PRODUCT_PROPERTIES"]) ? $arParams["PRODUCT_PROPERTIES"] : []),

						"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
						"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
						"PAGER_TITLE" => $arParams["PAGER_TITLE"],
						"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
						"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
						"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
						"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
						"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
						"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
						"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
						"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
						"LAZY_LOAD" => $arParams["LAZY_LOAD"],
						"MESS_BTN_LAZY_LOAD" => $arParams["~MESS_BTN_LAZY_LOAD"],
						"LOAD_ON_SCROLL" => $arParams["LOAD_ON_SCROLL"],

						"OFFERS_CART_PROPERTIES" => (isset($arParams["OFFERS_CART_PROPERTIES"]) ? $arParams["OFFERS_CART_PROPERTIES"] : []),
						"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
						"OFFERS_PROPERTY_CODE" => (isset($arParams["LIST_OFFERS_PROPERTY_CODE"]) ? $arParams["LIST_OFFERS_PROPERTY_CODE"] : []),
						"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
						"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
						"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
						"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
		     			"OFFERS_LIMIT" => (isset($arParams["LIST_OFFERS_LIMIT"]) ? $arParams["LIST_OFFERS_LIMIT"] : 0),

						"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
						"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
						"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
						"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
						"USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
						'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
						'CURRENCY_ID' => $arParams['CURRENCY_ID'],
						'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
						'HIDE_NOT_AVAILABLE_OFFERS' => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],

						'LABEL_PROP' => $arParams['LABEL_PROP'],
						'LABEL_PROP_MOBILE' => $arParams['LABEL_PROP_MOBILE'],
						'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],
						'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
						'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
						'PRODUCT_BLOCKS_ORDER' => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
						'PRODUCT_ROW_VARIANTS' => $arParams['LIST_PRODUCT_ROW_VARIANTS'],
						'ENLARGE_PRODUCT' => $arParams['LIST_ENLARGE_PRODUCT'],
						'ENLARGE_PROP' => isset($arParams['LIST_ENLARGE_PROP']) ? $arParams['LIST_ENLARGE_PROP'] : '',
						'SHOW_SLIDER' => $arParams['LIST_SHOW_SLIDER'],
						'SLIDER_INTERVAL' => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
						'SLIDER_PROGRESS' => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',

						'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
						'OFFER_TREE_PROPS' => (isset($arParams['OFFER_TREE_PROPS']) ? $arParams['OFFER_TREE_PROPS'] : []),
						'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
						'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
						'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
						'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
						'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
						'MESS_SHOW_MAX_QUANTITY' => (isset($arParams['~MESS_SHOW_MAX_QUANTITY']) ? $arParams['~MESS_SHOW_MAX_QUANTITY'] : ''),
						'RELATIVE_QUANTITY_FACTOR' => (isset($arParams['RELATIVE_QUANTITY_FACTOR']) ? $arParams['RELATIVE_QUANTITY_FACTOR'] : ''),
						'MESS_RELATIVE_QUANTITY_MANY' => (isset($arParams['~MESS_RELATIVE_QUANTITY_MANY']) ? $arParams['~MESS_RELATIVE_QUANTITY_MANY'] : ''),
						'MESS_RELATIVE_QUANTITY_FEW' => (isset($arParams['~MESS_RELATIVE_QUANTITY_FEW']) ? $arParams['~MESS_RELATIVE_QUANTITY_FEW'] : ''),
						'MESS_BTN_BUY' => (isset($arParams['~MESS_BTN_BUY']) ? $arParams['~MESS_BTN_BUY'] : ''),
						'MESS_BTN_ADD_TO_BASKET' => (isset($arParams['~MESS_BTN_ADD_TO_BASKET']) ? $arParams['~MESS_BTN_ADD_TO_BASKET'] : ''),
						'MESS_BTN_SUBSCRIBE' => (isset($arParams['~MESS_BTN_SUBSCRIBE']) ? $arParams['~MESS_BTN_SUBSCRIBE'] : ''),
						'MESS_BTN_DETAIL' => (isset($arParams['~MESS_BTN_DETAIL']) ? $arParams['~MESS_BTN_DETAIL'] : ''),
						'MESS_NOT_AVAILABLE' => (isset($arParams['~MESS_NOT_AVAILABLE']) ? $arParams['~MESS_NOT_AVAILABLE'] : ''),
						'MESS_BTN_COMPARE' => (isset($arParams['~MESS_BTN_COMPARE']) ? $arParams['~MESS_BTN_COMPARE'] : ''),

						'USE_ENHANCED_ECOMMERCE' => (isset($arParams['USE_ENHANCED_ECOMMERCE']) ? $arParams['USE_ENHANCED_ECOMMERCE'] : ''),
						'DATA_LAYER_NAME' => (isset($arParams['DATA_LAYER_NAME']) ? $arParams['DATA_LAYER_NAME'] : ''),
						'BRAND_PROPERTY' => (isset($arParams['BRAND_PROPERTY']) ? $arParams['BRAND_PROPERTY'] : ''),

						'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
						"ADD_SECTIONS_CHAIN" => "N",
						'ADD_TO_BASKET_ACTION' => $basketAction,
						'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
						'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
						'COMPARE_NAME' => $arParams['COMPARE_NAME'],
						'USE_COMPARE_LIST' => 'Y',
						'BACKGROUND_IMAGE' => (isset($arParams['SECTION_BACKGROUND_IMAGE']) ? $arParams['SECTION_BACKGROUND_IMAGE'] : ''),
						'COMPATIBLE_MODE' => (isset($arParams['COMPATIBLE_MODE']) ? $arParams['COMPATIBLE_MODE'] : ''),
						'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : '')
					),
					$component
				);

				$GLOBALS['CATALOG_CURRENT_SECTION_ID'] = $intSectionID;


echo "test88";	

		if (ModuleManager::isModuleInstalled("sale"))
		{
			if (!empty($arRecomData))
			{
				if (!isset($arParams['USE_BIG_DATA']) || $arParams['USE_BIG_DATA'] != 'N')
				{
					?>
					<div class="row mb-3">
						<div class="col" data-entity="parent-container">
							<div class="catalog-block-header" data-entity="header" data-showed="false" style="display: none; opacity: 0;">
								<?=GetMessage('CATALOG_PERSONAL_RECOM')?>
							</div>
							
<?/* Вывод списка товаров конкретный блок*/?>

<?/*

							<? $APPLICATION->IncludeComponent("bitrix:catalog.section", "bootstrap_v4", array(
									"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
									"IBLOCK_ID" => $arParams["IBLOCK_ID"],
									"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
									"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
									"ELEMENT_SORT_FIELD2" => $arParams["ELEMENT_SORT_FIELD2"],
									"ELEMENT_SORT_ORDER2" => $arParams["ELEMENT_SORT_ORDER2"],
									"PROPERTY_CODE" => (isset($arParams["LIST_PROPERTY_CODE"]) ? $arParams["LIST_PROPERTY_CODE"] : []),
									"PROPERTY_CODE_MOBILE" => $arParams["LIST_PROPERTY_CODE_MOBILE"],
									"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
									"BASKET_URL" => $arParams["BASKET_URL"],
									"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
									"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
									"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
									"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
									"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
									"CACHE_TYPE" => $arParams["CACHE_TYPE"],
									"CACHE_TIME" => $arParams["CACHE_TIME"],
									"CACHE_FILTER" => $arParams["CACHE_FILTER"],
									"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
									"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
									"PAGE_ELEMENT_COUNT" => 0,
									"PRICE_CODE" => $arParams["~PRICE_CODE"],
									"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
									"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

									"SET_BROWSER_TITLE" => "N",
									"SET_META_KEYWORDS" => "N",
									"SET_META_DESCRIPTION" => "N",
									"SET_LAST_MODIFIED" => "N",
									"ADD_SECTIONS_CHAIN" => "N",

									"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
									"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
									"ADD_PROPERTIES_TO_BASKET" => (isset($arParams["ADD_PROPERTIES_TO_BASKET"]) ? $arParams["ADD_PROPERTIES_TO_BASKET"] : ''),
									"PARTIAL_PRODUCT_PROPERTIES" => (isset($arParams["PARTIAL_PRODUCT_PROPERTIES"]) ? $arParams["PARTIAL_PRODUCT_PROPERTIES"] : ''),
									"PRODUCT_PROPERTIES" => (isset($arParams["PRODUCT_PROPERTIES"]) ? $arParams["PRODUCT_PROPERTIES"] : []),

									"OFFERS_CART_PROPERTIES" => (isset($arParams["OFFERS_CART_PROPERTIES"]) ? $arParams["OFFERS_CART_PROPERTIES"] : []),
									"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
									"OFFERS_PROPERTY_CODE" => (isset($arParams["LIST_OFFERS_PROPERTY_CODE"]) ? $arParams["LIST_OFFERS_PROPERTY_CODE"] : []),
									"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
									"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
									"OFFERS_SORT_FIELD2" => $arParams["OFFERS_SORT_FIELD2"],
									"OFFERS_SORT_ORDER2" => $arParams["OFFERS_SORT_ORDER2"],
									"OFFERS_LIMIT" => (isset($arParams["LIST_OFFERS_LIMIT"]) ? $arParams["LIST_OFFERS_LIMIT"] : 0),

									"SECTION_ID" => $intSectionID,
									"SECTION_CODE" => "",
									"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
									"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
									"USE_MAIN_ELEMENT_SECTION" => $arParams["USE_MAIN_ELEMENT_SECTION"],
									'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
									'CURRENCY_ID' => $arParams['CURRENCY_ID'],
									'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
									'HIDE_NOT_AVAILABLE_OFFERS' => $arParams["HIDE_NOT_AVAILABLE_OFFERS"],

									'LABEL_PROP' => $arParams['LABEL_PROP'],
									'LABEL_PROP_MOBILE' => $arParams['LABEL_PROP_MOBILE'],
									'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],
									'ADD_PICT_PROP' => $arParams['ADD_PICT_PROP'],
									'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
									'PRODUCT_BLOCKS_ORDER' => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
									'PRODUCT_ROW_VARIANTS' => "[{'VARIANT':'3','BIG_DATA':true}]",
									'ENLARGE_PRODUCT' => $arParams['LIST_ENLARGE_PRODUCT'],
									'ENLARGE_PROP' => isset($arParams['LIST_ENLARGE_PROP']) ? $arParams['LIST_ENLARGE_PROP'] : '',
									'SHOW_SLIDER' => $arParams['LIST_SHOW_SLIDER'],
									'SLIDER_INTERVAL' => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
									'SLIDER_PROGRESS' => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',

									"DISPLAY_TOP_PAGER" => 'N',
									"DISPLAY_BOTTOM_PAGER" => 'N',
									"HIDE_SECTION_DESCRIPTION" => "Y",

									"RCM_TYPE" => isset($arParams['BIG_DATA_RCM_TYPE']) ? $arParams['BIG_DATA_RCM_TYPE'] : '',
									"SHOW_FROM_SECTION" => 'Y',

									'OFFER_ADD_PICT_PROP' => $arParams['OFFER_ADD_PICT_PROP'],
									'OFFER_TREE_PROPS' => (isset($arParams['OFFER_TREE_PROPS']) ? $arParams['OFFER_TREE_PROPS'] : []),
									'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
									'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
									'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
									'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
									'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
									'MESS_SHOW_MAX_QUANTITY' => (isset($arParams['~MESS_SHOW_MAX_QUANTITY']) ? $arParams['~MESS_SHOW_MAX_QUANTITY'] : ''),
									'RELATIVE_QUANTITY_FACTOR' => (isset($arParams['RELATIVE_QUANTITY_FACTOR']) ? $arParams['RELATIVE_QUANTITY_FACTOR'] : ''),
									'MESS_RELATIVE_QUANTITY_MANY' => (isset($arParams['~MESS_RELATIVE_QUANTITY_MANY']) ? $arParams['~MESS_RELATIVE_QUANTITY_MANY'] : ''),
									'MESS_RELATIVE_QUANTITY_FEW' => (isset($arParams['~MESS_RELATIVE_QUANTITY_FEW']) ? $arParams['~MESS_RELATIVE_QUANTITY_FEW'] : ''),
									'MESS_BTN_BUY' => (isset($arParams['~MESS_BTN_BUY']) ? $arParams['~MESS_BTN_BUY'] : ''),
									'MESS_BTN_ADD_TO_BASKET' => (isset($arParams['~MESS_BTN_ADD_TO_BASKET']) ? $arParams['~MESS_BTN_ADD_TO_BASKET'] : ''),
									'MESS_BTN_SUBSCRIBE' => (isset($arParams['~MESS_BTN_SUBSCRIBE']) ? $arParams['~MESS_BTN_SUBSCRIBE'] : ''),
									'MESS_BTN_DETAIL' => (isset($arParams['~MESS_BTN_DETAIL']) ? $arParams['~MESS_BTN_DETAIL'] : ''),
									'MESS_NOT_AVAILABLE' => (isset($arParams['~MESS_NOT_AVAILABLE']) ? $arParams['~MESS_NOT_AVAILABLE'] : ''),
									'MESS_BTN_COMPARE' => (isset($arParams['~MESS_BTN_COMPARE']) ? $arParams['~MESS_BTN_COMPARE'] : ''),

									'USE_ENHANCED_ECOMMERCE' => (isset($arParams['USE_ENHANCED_ECOMMERCE']) ? $arParams['USE_ENHANCED_ECOMMERCE'] : ''),
									'DATA_LAYER_NAME' => (isset($arParams['DATA_LAYER_NAME']) ? $arParams['DATA_LAYER_NAME'] : ''),
									'BRAND_PROPERTY' => (isset($arParams['BRAND_PROPERTY']) ? $arParams['BRAND_PROPERTY'] : ''),

									'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
									'ADD_TO_BASKET_ACTION' => $basketAction,
									'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
									'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
									'COMPARE_NAME' => $arParams['COMPARE_NAME'],
									'USE_COMPARE_LIST' => 'Y',
									'BACKGROUND_IMAGE' => '',
									'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : '')
								),
								$component
							);
							?>
							

							
							
						</div>
					</div>
					<?
				}
			}
		}
		?>
	</div>
	
	
	
	<?/*======================================================*/?>
	<?/*Конец содержимого*/?>
	
	<?/*
</div>






*/?>




