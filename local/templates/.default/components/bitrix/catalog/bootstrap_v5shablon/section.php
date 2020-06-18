<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;

$this->setFrameMode(true);
$this->addExternalCss("/bitrix/css/main/bootstrap.css");
?>





<?
	// Формирование SMART_FILTER_PATH
    if(empty($arResult["VARIABLES"]["SMART_FILTER_PATH"]))
    {
        $re = '/^\/.*\/filter\/(.*)\/apply\//';
        $str = Bitrix\Main\Context::getCurrent()->getRequest()->getRequestedPage();
        preg_match($re, $str, $matches);
        $arResult["VARIABLES"]["SMART_FILTER_PATH"] = $matches[1];
    }
	
	
	// Формирование SECTION_CODE_PATH
	if(empty($arResult["VARIABLES"]["SECTION_CODE_PATH"]))
    {
        $re = '/^\/.*\/(.*)\/filter\/.*\/apply\//';
		$str = Bitrix\Main\Context::getCurrent()->getRequest()->getRequestedPage();
		preg_match($re, $str, $matches);
		$arResult["VARIABLES"]["SECTION_CODE_PATH"] = $matches[1];
    }
?>
	
	
	
	
<?	
	
	
	
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





<?php
// подключаем пространство имен класса HighloadBlockTable и даём ему псевдоним HLBT для удобной работы
use Bitrix\Highloadblock\HighloadBlockTable as HLBT;
// id highload-инфоблока
const MY_HL_BLOCK_ID = 8;
//подключаем модуль highloadblock
CModule::IncludeModule('highloadblock');
//Напишем функцию получения экземпляра класса:
function GetEntityDataClass($HlBlockId) {
    if (empty($HlBlockId) || $HlBlockId < 1)
    {
        return false;
    }
    $hlblock = HLBT::getById($HlBlockId)->fetch();   
    $entity = HLBT::compileEntity($hlblock);
    $entity_data_class = $entity->getDataClass();
    return $entity_data_class;
}


const MY_HL_BLOCK_ID = 8;
CModule::IncludeModule('highloadblock');
$entity_data_class = GetEntityDataClass(MY_HL_BLOCK_ID);






$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$url = explode('?', $url);
$url = $url[0];



$url = explode('/filter/', $url);
$url = $url[1];

$url = explode('/apply/', $url);
$url = $url[0];

$url = explode('/', $url);
//$url = $url[0];

$titlenew = "";



foreach($url as $itemtitle){
	
	$titlenew .= " ";
	//echo " ";
	$rsData = $entity_data_class::getList(array(
   'select' => array('*'),
   'limit' => '1',
   'filter' => array('UF_PROPERTY_VAL_URL' => $itemtitle) 
	));
	while($el = $rsData->fetch()){
		//echo($el[UF_ADD_TO_TITLE]);
		//$titlenew = $titlenew."1";
		
		
		$titlenew .= $el[UF_ADD_TO_TITLE];
		
	}
	
	
}


?>





<script>

document.title ="111";

document.title = "<?$APPLICATION->ShowTitle();?><?=$titlenew;?>";


$('.comman_h1').html("<?$APPLICATION->ShowTitle();?><?=$titlenew;?>");


</script>



			  









  
<script> 

var spacebtn = true;
var fixx = true;
var uuu = 0;
	var i = 0;
	var countelem = 0;
	
	$(function(){














		
		$( ".btright" ).click(function() {
			
			if(spacebtn){
				var valwidth = $(this).siblings(".gallerypv").find(".elem11").width()+4;
				var uuu = $(this).siblings(".gallerypv").find(".scroll").scrollLeft();
				$(tt).css("overflow","hidden");
				
					$(this).siblings(".gallerypv").find(".scroll").animate({
							scrollLeft: (uuu + valwidth),
						}, 300, function() {
							
							
							fixx = true;
							uuu = uuu + valwidth;
					});
					
			
			
				spacebtn = false;
				setTimeout(function(){spacebtn = true;}, 300);
				$(tt).css("overflow","scroll");
				
				
				if(($(this).siblings(".gallerypv").find(".elem11").length*valwidth)-(($(this).siblings(".gallerypv").find(".elem11").width()+55)*2) < uuu){
					$(this).css("opacity","0.3");
				}
				
				$(this).parents('.gallerypvcontent').find(".arrowleftpv").css("opacity","1");
				$(this).parents('.gallerypvcontent').find(".btleft").css("opacity","1");
				
			}
			
			
		});
		
		
		
		
		$( ".btleft" ).click(function() {
			
			if(spacebtn){
				var valwidth = $(this).siblings(".gallerypv").find(".elem11").width()+4;
				var uuu = $(this).siblings(".gallerypv").find(".scroll").scrollLeft();
				$(tt).css("overflow","hidden");
					$(this).siblings(".gallerypv").find(".scroll").animate({
							scrollLeft: (uuu - valwidth),
						}, 300, function() {
							
							
							fixx = true;
							uuu = uuu - valwidth;
					});
					
			
			
				spacebtn = false;
				setTimeout(function(){spacebtn = true;}, 300);
				$(tt).css("overflow","scroll");
				
				
					$(this).parents('.gallerypvcontent').find(".btright").css("opacity","1");
					
				
				
				if(valwidth+100 > uuu){
					$(this).css("opacity","0.3");
				}
				
					
				
			}
			
			
		});		

		
		
		
		//$( ".btleft" ).css("opacity","0.3");
		
		
		



$('.ggghhh').scrollLeft(50);

$('.ggghhh').scroll(function(){

	if($(this).scrollLeft()>(90)){
		if(fixx){
			fixx = false;
			var tt = this;
			$(tt).scrollLeft(50);
			$(tt).css("overflow","hidden");
			
			var valwidth = $(this).siblings(".scroll").find(".elem11").width()+4;
			var uuu = $(this).siblings(".scroll").scrollLeft();
			
			$(this).siblings(".scroll").animate({
						scrollLeft: (uuu + valwidth),
					}, 300, function() {
						
						
						$(tt).scrollLeft(50);
						uuu = uuu + valwidth;
						fixx = true;
			});
			
			$(tt).css("overflow","scroll");
			
			
			
			
			
			if(($(this).parents(".gallerypv").find(".elem11").length*valwidth)-(valwidth*2+50) < uuu){
					$(this).parents(".gallerypv").siblings(".btright").css("opacity","0.3");
				}
				
			$(this).parents('.gallerypvcontent').find(".btleft").css("opacity","1");
			
			
			
			
		}
	}
	
	
	if($(this).scrollLeft()<(10)){
		if(fixx){
			fixx = false;
			var tt = this;
			$(tt).css("overflow","hidden");
			var valwidth = $(this).siblings(".scroll").find(".elem11").width()+4;
			var uuu = $(this).siblings(".scroll").scrollLeft();
			$(this).siblings(".scroll").animate({
						scrollLeft: (uuu - valwidth),
					}, 300, function() {
						
						
						
						$(tt).scrollLeft(50);
						uuu = uuu - valwidth;
						fixx = true;
				});
				$(tt).css("overflow","scroll");
				
				
				
			
				if(valwidth+100 > uuu){
						$(this).parents(".gallerypv").siblings(".btleft").css("opacity","0.3");
					}
					
				$(this).parents('.gallerypvcontent').find(".btright").css("opacity","1");
					
				
		}
	}
	

});		




	
		$( ".btleft" ).click(function() {
			
			
			
			
			
			
			
			if(spacebtn){
			
			//Определяем максимальное значение перемещения
			var cou = $(this).siblings(".gallerypv").find(".elem11").length * $(this).siblings(".gallerypv").find(".elem11").width() * (-1);
			
			//Определение текущего положения
			var info = $(this).siblings(".gallerypv").find(".scroll_child").css('transform');
			var str = info.slice(info.indexOf(",")+1, info.length);
			str = str.slice(str.indexOf(",")+1, str.length);
			str = str.slice(str.indexOf(",")+1, str.length);
			str = str.slice(str.indexOf(",")+1, str.length);
			str = str.slice(1, str.indexOf(","));
			var posit = parseInt(str);
			if (!posit){
				posit = 0;
			}
			
			
			posit = posit + $(this).siblings(".gallerypv").find(".elem11").width() + 4;	
			
			
			//test = posit + $( ".innercont").width()-4;
			
			
			
			if(posit < 1){
				$(this).siblings(".gallerypv").find(".scroll_child").css("transform","translateX(" + posit + "px)");
			}
			else{
				$(this).siblings(".gallerypv").find(".scroll_child").css("transform","translateX(0px)");
			}
			
			spacebtn = false;

			setTimeout(function(){spacebtn = true;}, 500);

			}
			
		});
		
		
		
		
		
		
		
		$( ".btright1" ).click(function() {
			
			
			
			if(spacebtn){
				var tt = this;
				var valwidth = $(this).siblings(".scroll").find(".elem").width();
				var uuu = $(this).siblings(".scroll").scrollLeft();
				$(tt).css("overflow","hidden");
				
					$(this).siblings(".scroll").animate({
							scrollLeft: (uuu + valwidth),
						}, 300, function() {
							
							
							fixx = true;
							uuu = uuu + valwidth;
					});
					
			
			
				spacebtn = false;
				setTimeout(function(){spacebtn = true;}, 300);
				$(tt).css("overflow","scroll");
				
				
				

				if((($(this).siblings(".scroll").find(".elem").length * valwidth) - valwidth  ) < (uuu+$(this).siblings(".scroll").width()+100)){
					$(this).css("opacity","0.3");
				}
				
				
				
				$(this).parents('.qqqq1').find(".btleft1").css("opacity","1");
				
				
			}
			
			
			
			
			
			
			
		});
		
		
		
		$( ".btleft1" ).css("opacity","0.3");
		
		
		$( ".btleft1" ).click(function() {
			
			
			
			if(spacebtn){
				var tt = this;
				var valwidth = $(this).siblings(".scroll").find(".elem").width();
				var uuu = $(this).siblings(".scroll").scrollLeft();
				$(tt).css("overflow","hidden");
				
					$(this).siblings(".scroll").animate({
							scrollLeft: (uuu - valwidth),
						}, 300, function() {
							
							
							fixx = true;
							uuu = uuu - valwidth;
					});
					
			
			
				spacebtn = false;
				setTimeout(function(){spacebtn = true;}, 300);
				$(tt).css("overflow","scroll");
				
				
				if( valwidth > uuu){
					$(this).css("opacity","0.3");
				}
				
				
				$(this).parents('.qqqq1').find(".btright1").css("opacity","1");
				
			}
			
			
			
			
		});
		$( ".sectionCatalogFilter__row.two" ).click(function() {
						
			$( ".filt1" ).toggleClass('visable1 unvisable1');
			
			
		});
		
		
			
			
			
	});
	
	
	//Скрытие кнопок листания слайдов, при отсутствии такой возможности
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
</script>
	






























<?/*Начало фильтра*/?>
<?/*
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
			"DISPLAY_ELEMENT_COUNT" =>  "Y",
			
		),
		$component,
		array('HIDE_ICONS' => 'Y')
	);
?>
*/?>














<?//Определение крошек?>









 
	







<div class="pvdiv">



	
    <div class="wrapper">
      
      <div class="wrapper__main">
	  
	  
	  
	  
	  
	  
        <div class="breadcrumbs">
          <div class="container">
            <div class="container__wrap">
              <div class="breadcrumbs__items contentbread" itemscope="" itemtype="http://schema.org/BreadcrumbList">
			  
			  
			  
				<span class="breadcrumbs__item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
					<a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная" href="/">
						<span itemprop="name">Главная</span>
						<meta itemprop="position" content="1">
					</a>
				</span>
					
					
				
				<?
				foreach($_SESSION['breadcr'] as $key=>$crumb){
				?>
					
					
					<span class="breadcrumbs__item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
						<a class="breadcrumbs__link" itemprop="item" title="Каталог" href="<?=$crumb[URL];?>">
							<span itemprop="name"><?=$crumb[NAME];?></span>
							<meta itemprop="position" content="2">
						</a>
					</span>

					
				<?
				}
				?>	
					
					
					
					
					
					
					</div>
            </div>
          </div>
        </div>
		
		
		
		
		
		
		
		
        <div class="wrapper__body">
          <h1 class="comman_h1">
		  <?$APPLICATION->ShowTitle()?>
		  
		  
		  
		  
		  </h1>
        </div>
        <div class="container">
          <div class="wrapper__body">
            <div class="wrapper__hero">
			
			
			
				
			
 <?$APPLICATION->IncludeComponent(
	"bitrix:news.list",
	"PriseNew",
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
		"FIELD_CODE" => array("",""),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "21",
		"IBLOCK_TYPE" => "Side_menu",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"INCLUDE_SUBSECTIONS" => "Y",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "9999",
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
		"PROPERTY_CODE" => array("link","",""),
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
			  
			 */?>
			  
			  
			  
			  
			
			  
<div class="wrapper__col right">




<!-- Список разделов -->


	<div class="pvcataloglist">
		
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
			  
			  
	<!-- Конец разделов -->		  
			  
			  
			  
	  
	  
	  

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
			//"SEF_RULE" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["smart_filter"],
			//"SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],
			"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
			"INSTANT_RELOAD" => $arParams["INSTANT_RELOAD"],
			"DISPLAY_ELEMENT_COUNT" =>  "Y",
			
			 
			
			
					
			"SHOW_ALL_WO_SECTION" => "Y",//Добавил
            "SEF_RULE" => "/katalog-tovarov-3/#SECTION_CODE_PATH#/filter/#SMART_FILTER_PATH#/apply/",//Добавил
            "SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],//Добавил
			"SECTION_CODE_PATH" => $arResult["VARIABLES"]["SECTION_CODE_PATH"],//Добавил
			
		),
		$component,
		array('HIDE_ICONS' => 'Y')
	);
?>











<?/* фильтр старый шаблон
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
			"DISPLAY_ELEMENT_COUNT" =>  "Y",
			
		),
		$component,
		array('HIDE_ICONS' => 'Y')
	);
?>
	 


*/?>
	  
	  
	  
	  
	  
				
				
			
				
				
				
				
				
                <div class="sectionCatalogList">
                  <div class="sectionCatalogList-sort">
                    <div class="sectionCatalogList-sort__title">Показывать по:</div><a class="sectionCatalogList-sort__count active" href="#">60</a><a class="sectionCatalogList-sort__count" href="#">120</a>
                  </div>
                  <div class="sectionCatalogList-items">
				  
				  
				  
				  <!-- Проработанная карточка товара -->
				  


					
					
					<?
					//	print_r($arParams);
					
					?>
					
					
					
					
			<?//	PAGE_ELEMENT_COUNT	
			$count = 60;
			$linecount = 2;
			
			//[LINE_ELEMENT_COUNT] => 3
			
			?>

			
			
			
			<?
			
			if ($_GET["sort"] == "priceabc")
			{
				$arParams["ELEMENT_SORT_FIELD"] = "catalog_PRICE_1";
				$arParams["ELEMENT_SORT_ORDER"] = "DESC";
			}
			
			if ($_GET["sort"] == "pricedesc")
			{
				$arParams["ELEMENT_SORT_FIELD"] = "catalog_PRICE_1";
				$arParams["ELEMENT_SORT_ORDER"] = "ABC";
			}
			
			
			//$arParams["ELEMENT_SORT_ORDER"] = "DESC";
			//$arParams["ELEMENT_SORT_ORDER"] = "ABC";
			
			?>
			
			
			
			
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
			"PAGE_ELEMENT_COUNT" => $count,
		//	"PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
			
		//	"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
			
			
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
			
			
			"SHOW_ALL_WO_SECTION" => "Y",
			"INCLUDE_SUBSECTIONS" => "Y",
			
			
			
			
			
			/*
			"SHOW_ALL_WO_SECTION" => "N",
			"INCLUDE_SUBSECTIONS" => "N",
			*/
			
			//"BY_LINK"=> "Y",
			
			
			'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : '')
		),
		$component
	);
	$GLOBALS['CATALOG_CURRENT_SECTION_ID'] = $intSectionID;
?>


			 



	
                  </div>
				  
				  
				  
				  
				  
				  
				  
				  
				  
				  
                </div>
				
				
				
				
				
			
				
				
              </div>
            </div>
			
			
			
</div></div></div></div></div>			
			
			
			

<?/*
<pre>
<?
print_r(array(
	'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
	'IBLOCK_ID' => $arParams['IBLOCK_ID'],
	'ELEMENT_SORT_FIELD' => $arParams['ELEMENT_SORT_FIELD'],
	'ELEMENT_SORT_ORDER' => $arParams['ELEMENT_SORT_ORDER'],
	'ELEMENT_SORT_FIELD2' => $arParams['ELEMENT_SORT_FIELD2'],
	'ELEMENT_SORT_ORDER2' => $arParams['ELEMENT_SORT_ORDER2'],
	'PROPERTY_CODE' => (isset($arParams['LIST_PROPERTY_CODE']) ? $arParams['LIST_PROPERTY_CODE'] : []),
	'PROPERTY_CODE_MOBILE' => $arParams['LIST_PROPERTY_CODE_MOBILE'],
	'META_KEYWORDS' => $arParams['LIST_META_KEYWORDS'],
	'META_DESCRIPTION' => $arParams['LIST_META_DESCRIPTION'],
	'BROWSER_TITLE' => $arParams['LIST_BROWSER_TITLE'],
	'SET_LAST_MODIFIED' => $arParams['SET_LAST_MODIFIED'],
	'INCLUDE_SUBSECTIONS' => $arParams['INCLUDE_SUBSECTIONS'],
	'BASKET_URL' => $arParams['BASKET_URL'],
	'ACTION_VARIABLE' => $arParams['ACTION_VARIABLE'],
	'PRODUCT_ID_VARIABLE' => $arParams['PRODUCT_ID_VARIABLE'],
	'SECTION_ID_VARIABLE' => $arParams['SECTION_ID_VARIABLE'],
	'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
	'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
	'FILTER_NAME' => $arParams['FILTER_NAME'],
	'CACHE_TYPE' => $arParams['CACHE_TYPE'],
	'CACHE_TIME' => $arParams['CACHE_TIME'],
	'CACHE_FILTER' => $arParams['CACHE_FILTER'],
	'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
	'SET_TITLE' => $arParams['SET_TITLE'],
	'MESSAGE_404' => $arParams['~MESSAGE_404'],
	'SET_STATUS_404' => $arParams['SET_STATUS_404'],
	'SHOW_404' => $arParams['SHOW_404'],
	'FILE_404' => $arParams['FILE_404'],
	'DISPLAY_COMPARE' => $arParams['USE_COMPARE'],
	'PAGE_ELEMENT_COUNT' => $count,
	'PRICE_CODE' => $arParams['~PRICE_CODE'],
	'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
	'SHOW_PRICE_COUNT' => $arParams['SHOW_PRICE_COUNT'],
	'PRICE_VAT_INCLUDE' => $arParams['PRICE_VAT_INCLUDE'],
	'USE_PRODUCT_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
	'ADD_PROPERTIES_TO_BASKET' => (isset($arParams['ADD_PROPERTIES_TO_BASKET']) ? $arParams['ADD_PROPERTIES_TO_BASKET'] : ''),
	'PARTIAL_PRODUCT_PROPERTIES' => (isset($arParams['PARTIAL_PRODUCT_PROPERTIES']) ? $arParams['PARTIAL_PRODUCT_PROPERTIES'] : ''),
	'PRODUCT_PROPERTIES' => (isset($arParams['PRODUCT_PROPERTIES']) ? $arParams['PRODUCT_PROPERTIES'] : []),
	'DISPLAY_TOP_PAGER' => $arParams['DISPLAY_TOP_PAGER'],
	'DISPLAY_BOTTOM_PAGER' => $arParams['DISPLAY_BOTTOM_PAGER'],
	'PAGER_TITLE' => $arParams['PAGER_TITLE'],
	'PAGER_SHOW_ALWAYS' => $arParams['PAGER_SHOW_ALWAYS'],
	'PAGER_TEMPLATE' => $arParams['PAGER_TEMPLATE'],
	'PAGER_DESC_NUMBERING' => $arParams['PAGER_DESC_NUMBERING'],
	'PAGER_DESC_NUMBERING_CACHE_TIME' => $arParams['PAGER_DESC_NUMBERING_CACHE_TIME'],
	'PAGER_SHOW_ALL' => $arParams['PAGER_SHOW_ALL'],
	'PAGER_BASE_LINK_ENABLE' => $arParams['PAGER_BASE_LINK_ENABLE'],
	'PAGER_BASE_LINK' => $arParams['PAGER_BASE_LINK'],
	'PAGER_PARAMS_NAME' => $arParams['PAGER_PARAMS_NAME'],
	'LAZY_LOAD' => $arParams['LAZY_LOAD'],
	'MESS_BTN_LAZY_LOAD' => $arParams['~MESS_BTN_LAZY_LOAD'],
	'LOAD_ON_SCROLL' => $arParams['LOAD_ON_SCROLL'],
	'OFFERS_CART_PROPERTIES' => (isset($arParams['OFFERS_CART_PROPERTIES']) ? $arParams['OFFERS_CART_PROPERTIES'] : []),
	'OFFERS_FIELD_CODE' => $arParams['LIST_OFFERS_FIELD_CODE'],
	'OFFERS_PROPERTY_CODE' => (isset($arParams['LIST_OFFERS_PROPERTY_CODE']) ? $arParams['LIST_OFFERS_PROPERTY_CODE'] : []),
	'OFFERS_SORT_FIELD' => $arParams['OFFERS_SORT_FIELD'],
	'OFFERS_SORT_ORDER' => $arParams['OFFERS_SORT_ORDER'],
	'OFFERS_SORT_FIELD2' => $arParams['OFFERS_SORT_FIELD2'],
	'OFFERS_SORT_ORDER2' => $arParams['OFFERS_SORT_ORDER2'],
	'OFFERS_LIMIT' => (isset($arParams['LIST_OFFERS_LIMIT']) ? $arParams['LIST_OFFERS_LIMIT'] : 0),
	'SECTION_ID' => $arResult['VARIABLES']['SECTION_ID'],
	'SECTION_CODE' => $arResult['VARIABLES']['SECTION_CODE'],
	'SECTION_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['section'],
	'DETAIL_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['element'],
	'USE_MAIN_ELEMENT_SECTION' => $arParams['USE_MAIN_ELEMENT_SECTION'],
	'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
	'CURRENCY_ID' => $arParams['CURRENCY_ID'],
	'HIDE_NOT_AVAILABLE' => $arParams['HIDE_NOT_AVAILABLE'],
	'HIDE_NOT_AVAILABLE_OFFERS' => $arParams['HIDE_NOT_AVAILABLE_OFFERS'],
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
	'ADD_SECTIONS_CHAIN' => 'N',
	'ADD_TO_BASKET_ACTION' => $basketAction,
	'SHOW_CLOSE_POPUP' => isset($arParams['COMMON_SHOW_CLOSE_POPUP']) ? $arParams['COMMON_SHOW_CLOSE_POPUP'] : '',
	'COMPARE_PATH' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['compare'],
	'COMPARE_NAME' => $arParams['COMPARE_NAME'],
	'USE_COMPARE_LIST' => 'Y',
	'BACKGROUND_IMAGE' => (isset($arParams['SECTION_BACKGROUND_IMAGE']) ? $arParams['SECTION_BACKGROUND_IMAGE'] : ''),
	'COMPATIBLE_MODE' => (isset($arParams['COMPATIBLE_MODE']) ? $arParams['COMPATIBLE_MODE'] : ''),
	
	
	'SHOW_ALL_WO_SECTION' => 'Y',
	'INCLUDE_SUBSECTIONS' => 'Y',
	'DISABLE_INIT_JS_IN_COMPONENT' => (isset($arParams['DISABLE_INIT_JS_IN_COMPONENT']) ? $arParams['DISABLE_INIT_JS_IN_COMPONENT'] : '')
));
?>
</pre>


*/?>













			
			
			
			
			

<?
			$APPLICATION->IncludeComponent(
				'bitrix:catalog.products.viewed',
				'bootstrap_v4',
				array(
					'IBLOCK_MODE' => 'catalog',
					'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
					'IBLOCK_ID' => $arParams['IBLOCK_ID'],
					'ELEMENT_SORT_FIELD' => $arParams['ELEMENT_SORT_FIELD'],
					'ELEMENT_SORT_ORDER' => $arParams['ELEMENT_SORT_ORDER'],
					'ELEMENT_SORT_FIELD2' => $arParams['ELEMENT_SORT_FIELD2'],
					'ELEMENT_SORT_ORDER2' => $arParams['ELEMENT_SORT_ORDER2'],
					'PROPERTY_CODE_'.$arParams['IBLOCK_ID'] => (isset($arParams['LIST_PROPERTY_CODE']) ? $arParams['LIST_PROPERTY_CODE'] : []),
					'PROPERTY_CODE_'.$recommendedData['OFFER_IBLOCK_ID'] => (isset($arParams['LIST_OFFERS_PROPERTY_CODE']) ? $arParams['LIST_OFFERS_PROPERTY_CODE'] : []),
					'PROPERTY_CODE_MOBILE'.$arParams['IBLOCK_ID'] => $arParams['LIST_PROPERTY_CODE_MOBILE'],
					'BASKET_URL' => $arParams['BASKET_URL'],
					'ACTION_VARIABLE' => $arParams['ACTION_VARIABLE'],
					'PRODUCT_ID_VARIABLE' => $arParams['PRODUCT_ID_VARIABLE'],
					'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
					'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
					'CACHE_TYPE' => $arParams['CACHE_TYPE'],
					'CACHE_TIME' => $arParams['CACHE_TIME'],
					'CACHE_FILTER' => $arParams['CACHE_FILTER'],
					'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
					'DISPLAY_COMPARE' => $arParams['USE_COMPARE'],
					'PRICE_CODE' => $arParams['~PRICE_CODE'],
					'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
					'SHOW_PRICE_COUNT' => $arParams['SHOW_PRICE_COUNT'],
					'PAGE_ELEMENT_COUNT' => 20,
					'SECTION_ELEMENT_ID' => $elementId,

					"SET_TITLE" => "N",
					"SET_BROWSER_TITLE" => "N",
					"SET_META_KEYWORDS" => "N",
					"SET_META_DESCRIPTION" => "N",
					"SET_LAST_MODIFIED" => "N",
					"ADD_SECTIONS_CHAIN" => "N",

					'PRICE_VAT_INCLUDE' => $arParams['PRICE_VAT_INCLUDE'],
					'USE_PRODUCT_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
					'ADD_PROPERTIES_TO_BASKET' => (isset($arParams['ADD_PROPERTIES_TO_BASKET']) ? $arParams['ADD_PROPERTIES_TO_BASKET'] : ''),
					'PARTIAL_PRODUCT_PROPERTIES' => (isset($arParams['PARTIAL_PRODUCT_PROPERTIES']) ? $arParams['PARTIAL_PRODUCT_PROPERTIES'] : ''),
					'CART_PROPERTIES_'.$arParams['IBLOCK_ID'] => (isset($arParams['PRODUCT_PROPERTIES']) ? $arParams['PRODUCT_PROPERTIES'] : []),
					'CART_PROPERTIES_'.$recommendedData['OFFER_IBLOCK_ID'] => (isset($arParams['OFFERS_CART_PROPERTIES']) ? $arParams['OFFERS_CART_PROPERTIES'] : []),
					'ADDITIONAL_PICT_PROP_'.$arParams['IBLOCK_ID'] => $arParams['ADD_PICT_PROP'],
					'ADDITIONAL_PICT_PROP_'.$recommendedData['OFFER_IBLOCK_ID'] => $arParams['OFFER_ADD_PICT_PROP'],

					'SHOW_FROM_SECTION' => 'N',
					'DETAIL_URL' => $arResult['FOLDER'].$arResult['URL_TEMPLATES']['element'],
					'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
					'CURRENCY_ID' => $arParams['CURRENCY_ID'],
					'HIDE_NOT_AVAILABLE' => $arParams['HIDE_NOT_AVAILABLE'],
					'HIDE_NOT_AVAILABLE_OFFERS' => $arParams['HIDE_NOT_AVAILABLE_OFFERS'],

					'LABEL_PROP_'.$arParams['IBLOCK_ID'] => $arParams['LABEL_PROP'],
					'LABEL_PROP_MOBILE_'.$arParams['IBLOCK_ID'] => $arParams['LABEL_PROP_MOBILE'],
					'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],
					'PRODUCT_BLOCKS_ORDER' => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
					'PRODUCT_ROW_VARIANTS' => "[{'VARIANT':'3','BIG_DATA':false}]",
					'ENLARGE_PRODUCT' => $arParams['LIST_ENLARGE_PRODUCT'],
					'ENLARGE_PROP_'.$arParams['IBLOCK_ID'] => isset($arParams['LIST_ENLARGE_PROP']) ? $arParams['LIST_ENLARGE_PROP'] : '',
					'SHOW_SLIDER' => $arParams['LIST_SHOW_SLIDER'],
					'SLIDER_INTERVAL' => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
					'SLIDER_PROGRESS' => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',

					'OFFER_TREE_PROPS_'.$recommendedData['OFFER_IBLOCK_ID'] => (isset($arParams['OFFER_TREE_PROPS']) ? $arParams['OFFER_TREE_PROPS'] : []),
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
					
					//Добавил для правильных ссылок
					"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
					"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
					"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
					"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
					
					
					
					
				),
				$component
			);
			?>		
			
			






<?
/**
	"bitrix:catalog.top",
	"bootstrap_v4",
*/

?>





















<div class="hits">



<?/* Топ элементов*/?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.top",
	"bootstrap_v4",
	Array(
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_TO_BASKET_ACTION" => "ADD",
		"BASKET_URL" => "/personal/basket.php",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
		"COMPATIBLE_MODE" => "Y",
		"COMPONENT_TEMPLATE" => "bootstrap_v4",
		"CONVERT_CURRENCY" => "N",
		"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[{\"CLASS_ID\":\"CondIBProp:6:140\",\"DATA\":{\"logic\":\"Equal\",\"value\":90}}]}",
		"DETAIL_URL" => "",
		"DISPLAY_COMPARE" => "N",
		"ELEMENT_COUNT" => "12",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"ENLARGE_PRODUCT" => "STRICT",
		"FILTER_NAME" => "",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"IBLOCK_ID" => "6",
		"IBLOCK_TYPE" => "catalog",
		"LABEL_PROP" => array(),
		"LINE_ELEMENT_COUNT" => "3",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_COMPARE" => "Сравнить",
		"MESS_BTN_DETAIL" => "Хиты продаж",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"OFFERS_FIELD_CODE" => array(0=>"",1=>"",),
		"OFFERS_LIMIT" => "0",
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_ORDER2" => "desc",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		//"PRICE_CODE" => array(),
		//"PRICE_VAT_INCLUDE" => "Y",
		

		
		
		
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"PRODUCT_DISPLAY_MODE" => "N",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"PROPERTY_CODE_MOBILE" => array(0=>"color",1=>"colorsvariant",),
		"ROTATE_TIMER" => "30",
		"SECTION_URL" => "",
		"SEF_MODE" => "N",
		"SHOW_CLOSE_POPUP" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_OLD_PRICE" => "Y",
		"SHOW_PAGINATION" => "Y",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_SLIDER" => "Y",
		"SLIDER_INTERVAL" => "3000",
		"SLIDER_PROGRESS" => "N",
		"TEMPLATE_THEME" => "blue",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"VIEW_MODE" => "SECTION",
		
				'PRICE_CODE' => $arParams['~PRICE_CODE'],
'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
					'SHOW_PRICE_COUNT' => $arParams['SHOW_PRICE_COUNT'],
'PRICE_VAT_INCLUDE' => $arParams['PRICE_VAT_INCLUDE'],
'PRICE_VAT_INCLUDE' => $arParams['PRICE_VAT_INCLUDE'],
'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
		
		//Добавил для правильных ссылок
		"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
		"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
		
		
	)
);?>





</div>








<div class="hits" style="margin-bottom: 50px;">



<?/* Акции*/?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.top",
	"bootstrap_v4",
	Array(
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_TO_BASKET_ACTION" => "ADD",
		"BASKET_URL" => "/personal/basket.php",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
		"COMPATIBLE_MODE" => "Y",
		"COMPONENT_TEMPLATE" => "bootstrap_v4",
		"CONVERT_CURRENCY" => "N",
		"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":{\"1\":{\"CLASS_ID\":\"CondIBProp:6:140\",\"DATA\":{\"logic\":\"Equal\",\"value\":127}}}}",
		"DETAIL_URL" => "",
		"DISPLAY_COMPARE" => "N",
		"ELEMENT_COUNT" => "15",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"ENLARGE_PRODUCT" => "STRICT",
		"FILTER_NAME" => "",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"IBLOCK_ID" => "6",
		"IBLOCK_TYPE" => "catalog",
		"LABEL_PROP" => array(),
		"LINE_ELEMENT_COUNT" => "3",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_COMPARE" => "Сравнить",
		"MESS_BTN_DETAIL" => "Товары по акции",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"OFFERS_FIELD_CODE" => array(0=>"",1=>"",),
		"OFFERS_LIMIT" => "0",
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_ORDER2" => "desc",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		//"PRICE_CODE" => array(),
		//"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"PRODUCT_DISPLAY_MODE" => "N",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"PROPERTY_CODE_MOBILE" => array(0=>"color",1=>"colorsvariant",),
		"ROTATE_TIMER" => "30",
		"SECTION_URL" => "",
		"SEF_MODE" => "N",
		"SHOW_CLOSE_POPUP" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_PAGINATION" => "Y",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_SLIDER" => "Y",
		"SLIDER_INTERVAL" => "3000",
		"SLIDER_PROGRESS" => "N",
		"TEMPLATE_THEME" => "blue",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"VIEW_MODE" => "SECTION",
		
		
		'PRICE_CODE' => $arParams['~PRICE_CODE'],
'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
					'SHOW_PRICE_COUNT' => $arParams['SHOW_PRICE_COUNT'],
'PRICE_VAT_INCLUDE' => $arParams['PRICE_VAT_INCLUDE'],
'PRICE_VAT_INCLUDE' => $arParams['PRICE_VAT_INCLUDE'],
'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],


		//Добавил для правильных ссылок
		"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
		"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],


	)
);?>


</div>










			













<script>





$(".sectionCatalogList-items-count__btn.minus").click(function(){
	
	var znachenie = $(this).parents(".sectionCatalogList-items__item").find(".product-item-amount-field").val();
	
	//alert(znachenie);
	
	if(znachenie>1){
	
	
	$(this).parents(".sectionCatalogList-items__item").find(".sectionCatalogList-items-count__input-text").val(znachenie);
	
	$(this).parents(".sectionCatalogList-items__item").find(".product-item-amount-field-btn-minus").trigger('click');
	
	}
	
});	



$(".sectionCatalogList-items-count__btn.plus").click(function(){
	
	var znachenie = $(this).parents(".sectionCatalogList-items__item").find(".sectionCatalogList-items-count__input-text").val();
	
	
	
	
	$(this).parents(".sectionCatalogList-items__item").find(".sectionCatalogList-items-count__input-text").val(znachenie);
	
	$(this).parents(".sectionCatalogList-items__item").find(".product-item-amount-field-btn-plus").trigger('click');
	
	
	
});	












		
$(".buy-but1").click(function(){
	
	
	var qq = $(this).attr('data-value');
	var qount = $(this).parents(".sectionCatalogList-items__item").find(".product-item-amount-field").val();

	
	// Определение Параметров добавленного товара
	
	var id = $(this).parents(".sectionCatalogList-items__item").find(".info").attr('data-item-id');
	
	name = $(this).parents(".sectionCatalogList-items__item").find(".info").attr('data-item-name');
	article = $(this).parents(".sectionCatalogList-items__item").find(".info").attr('data-item-article');
	price = $(this).parents(".sectionCatalogList-items__item").find(".info").attr('data-item-price');
	imggg = $(this).parents(".sectionCatalogList-items__item").find(".info").attr('data-item-img');
	
	
	
	
//	alert($(".basket_header__items").find(".basket_header__item"));
	
/*	if($(".basket_header").is(".basket_header__item")){
		alert("test");
	}
	*/
	if($('.basket_header__item').is('#id'+id)) {
		//Есть товар в корзине
		
		//var currentcount = $(".basket_header__items").find('#'+id).find('.basket_header__count').html();
		
		//Количество товаров
		var currentcount = $(".basket_header__items").find('#id'+id).attr('data-item-quantity');
		
		allcount = Number.parseInt(currentcount) + Number.parseInt(qount);
		
		allprice = allcount * price;
		
		
		
	//	alert(allcount);
	//	alert(allprice);
		//$(".basket_header__items").find('#'+id).find('basket_header__count').html("тест");
		
		
		$(".basket_header__items").find('#id'+id).find('.basket_header__count').html(""+allcount+" шт");
		$(".basket_header__items").find('#id'+id).find('.basket_header-price__summ').html(""+allprice.toLocaleString()+" руб.");
		
		 
		
		
		
		
		
		
		
		
		
	}
	else {
		//Нет товар в корзине
		
		var sumprice = Number.parseInt(qount) * Number.parseInt(price);
		//alert(sumprice);

		var add = "<div class='basket_header__item' id=id"+id+" data-item-quantity="+qount+" data-item-id="+id+">            <div class='basket_header__col one'><a class='basket_header__pic' href='#'>						<div class='basket_header__img imgcart22' style='background-image: url("+imggg+");' alt=''></div>						</a></div>            <div class='basket_header__col two'>              <div class='basket_header-hero'><a class='basket_header__name' href='#' style=''>"+name+"</a>                <div class='basket_header__art'>"+article+"</div>                <div class='basket_header__count'>"+qount+" шт</div>              </div>            </div>            <div class='basket_header__col free'><a class='basket_header__delete toggleTitle' href='javascript:void(0);'>                <div class='lnr lnr-trash basket_header__icon  dell1'  data-id="+id+"></div></a>              <div class='basket_header-price'>                <div class='basket_header-price__summ'>"+sumprice.toLocaleString()+" руб.</div>              </div>            </div>          </div>";
		
		
		
		
		//alert(add);
		
		$(".basket_header__items").append(add);
		
		
		 
		
		
		
		
		//alert(add);
	}
	
	
	
	
	
		
	
		
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	//alert(id);alert(name);alert(article);alert(price);

const searchRegExp = '#ID#';
const replaceWith = qq;
 
const result = str.replace(searchRegExp, replaceWith);


 
result; // => 'goose goose go'
	
//	alert(result);
	
			// Добавление товара в корзину
            $.ajax({
                type: "GET",
                url: result+"&quantity="+qount,
                dataType: "html",
                success: function(out){
					
					//alert(out);
					
					
               //     alert("готово. Перейти в корзину http://torg.vmoidom.ru/personal/cart/");
			   
			   
			   
			   
					$.ajax({
							type: "POST",
							url: "/local/include/cartinfomin.php",
							
							cache: false,
							dataType: "html",
							success: function(jsondata) {
								 
								 var person = JSON.parse(jsondata);
								 
								 var tess = "<div class='scrollHeader-basket__order-text'>"+person['count']+"</div><div class='scrollHeader-basket__order-text'>"+person['cost']+"</div>";
								 
								 $(".scrollHeader-basket__order").html(tess);
								
								
								 var tess = "<div class='header-middle-control-basket__product'>"+person['count']+"</div><div class='header-middle-control-basket__product'>"+person['cost']+"</div>";
								 
								 $(".header-middle-control-basket__col.two").html(tess);
								 
								 $(".qountq").html(person['count']);
								 $(".priceq").html(person['cost']);
								 
								 
								 
								//Тестовый код добавление товара в корзину
								
								
							 
							}
					});
			   
			   
			   
			   
			   
			   
			   
                }

            });
			
			
			
			
			
			
			
			
			
			
			
			
			
        });		
		
		
		

		
		
</script>






































































































































<script>
//Скрытие кнопок листания слайдов, при малом количестве элементов
	for (let i = 0; i < $('.qqqq1').length; i++) {
		if(($('.qqqq1:eq('+i+') .elem').length*$('.qqqq1:eq('+i+') .elem').width()) > ($('.qqqq1:eq('+i+')').width())){
		}else{
			$('.qqqq1:eq('+i+') .tabcellpv1').css("opacity","0");
		}
	}
</script>













 
	  
		
				
				
				<div class="container">
				
				
				<div class="wrapper__col right" style="margin: 0px auto;">
				
				
				<h2 class="page-index__title defaulth2" style=" text-align: left;">КАК ВЫБРАТЬ ТОРГОВОЕ ОБОРУДОВАНИЕ ДЛЯ МАГАЗИНА</h2>
          <div class="page-index__description defaulttext">
            Мы предлагаем оборудование для магазинов уже не один год, и знаем, что от таких изделий
            требуется многое. Износостойкость – чтобы стеллаж или вешалка долгое время не требовали замены.
            Прочность – чтобы владельцам не пришлось тратиться на ремонт на замену.
            Привлекательность – чтобы каждая стойка или витрина были украшением зала.
            Кроме того, оборудование для торгового зала должно бытьудобным для раскладки товаров,
            для их осмотра покупателями.
            Продажа торгового оборудования – то, чем мы занимаемся для успеха своих клиентов.
            Мы предлагаем хороший выбор и формируем самые приемлемые расценки,поэтому сотрудничать с
            нами выгодно, удобно и приятно.
          </div>
				
				
				
				
				
				
				
				
				
				
				
				</div>
				
				
				</div>
				
				
				

<script>
<?
	/*			
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php'); 
if(!CModule::IncludeModule("iblock"))
return; 
*/


$IBLOCK_ID    = 20;
$link = $_SERVER['REQUEST_URI'];
$pos = false;
$pos = strpos($link, "?");
if($pos){
	$link = substr($link,0, $pos);
	
}
$pos = false;
$pos = strpos($link, "filter/clear/apply/");
if($pos){
	$link = substr($link, 0, $pos);
}


$link = str_replace('//', '/', $link); 




		 $arFilter1    = Array(
		  'IBLOCK_ID'=>$IBLOCK_ID, 
		  'GLOBAL_ACTIVE'=>'Y',
		  'PROPERTY_link'=>$link,
		  );
		  
		  $arSelect = Array("ID", "IBLOCK_ID", "NAME", "DATE_ACTIVE_FROM", "PREVIEW_TEXT", "PROPERTY_head_for_text");
		  
			$res = CIBlockElement::GetList(Array(), $arFilter1 , false,false, $arSelect);

			
		if ($el = $res->Fetch()){
			
			?>
			
			
			
			$('.comman_h1').html('<?=$el["NAME"];?>');
			
			$('.page-index__title').html('<?=$el["PROPERTY_HEAD_FOR_TEXT_VALUE"];?>');
			
			$('.page-index__description.defaulttext').html('<?=$el["PREVIEW_TEXT"]?>');
			
			<?
			CModule::IncludeModule("iblock");
			$ipropValues = new \Bitrix\Iblock\InheritedProperty\ElementValues(
									$IBLOCK_ID, // ID инфоблока
									$el["ID"] // ID элемента
								);
			$arElMetaProp = $ipropValues->getValues();
			 
			//echo '<pre>'; print_r ($arElMetaProp); echo '</pre>';
			
			
			//echo 'document.title = "'.$arElMetaProp[ELEMENT_META_TITLE].'";';
			
			?>
			
			$('meta[name="keywords"]').attr('content','<?=$arElMetaProp[ELEMENT_META_KEYWORDS];?>');        
			
			$('meta[name="description"]').attr('content','<?=$arElMetaProp[ELEMENT_META_DESCRIPTION];?>');
			
			
			 
			<?
			
			
			
			
		}
		else{?>
		
			
			<?
		}


?>





</script>
	
	
	
	
<?/*	
<?// Изменение хлебных крошек?>
<script>
	<?
	echo "$('.contentbread').html('";

	echo '<span class="breadcrumbs__item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная" href="/"><span itemprop="name">Главная</span><meta itemprop="position" content="1"></a></span>';

	foreach($_SESSION["breadcr"] as $key=>$crumb){
		echo '<span class="breadcrumbs__item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a class="breadcrumbs__link" itemprop="item" title="Каталог" href="'.$crumb[URL].'"><span itemprop="name">'.$crumb[NAME].'</span><meta itemprop="position" content="2"></a></span>';
	}
	echo "');";
	?>
</script>	
*/?>


	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	<?/*
			
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


















<div class="row">
    <div class="col-md-3 col-lg-2 col-sm-4 <?=(isset($arParams['FILTER_HIDE_ON_MOBILE']) && $arParams['FILTER_HIDE_ON_MOBILE'] === 'Y' ? ' hidden-xs' : '')?>">
        <div class="bx-sidebar-block">
            <?
			
			
			
			//Умный фильтр
			
            $APPLICATION->IncludeComponent(
                "bitrix:catalog.smart.filter",
                "",
                array(
                    
                    "IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
                    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
                    "SECTION_ID" => 0,//Добавил
                    "FILTER_NAME" => $arParams["FILTER_NAME"],
                    "PRICE_CODE" => $arParams["PRICE_CODE"],
                    "CACHE_TYPE" => $arParams["CACHE_TYPE"],
                    "CACHE_TIME" => $arParams["CACHE_TIME"],
                    "CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
                    "SAVE_IN_SESSION" => "N",
                    "FILTER_VIEW_MODE" => $arParams["FILTER_VIEW_MODE"],
                    "XML_EXPORT" => "Y",
                    "SECTION_TITLE" => "NAME",
                    "SECTION_DESCRIPTION" => "DESCRIPTION",
                    'HIDE_NOT_AVAILABLE' => $arParams["HIDE_NOT_AVAILABLE"],
                    "TEMPLATE_THEME" => $arParams["TEMPLATE_THEME"],
                    'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
                    'CURRENCY_ID' => $arParams['CURRENCY_ID'],
                    "SEF_MODE" => $arParams["SEF_MODE"],
					
					
					"SHOW_ALL_WO_SECTION" => "Y",//Добавил
                    "SEF_RULE" => "/katalog-tovarov-3/#SECTION_CODE_PATH#/filter/#SMART_FILTER_PATH#/apply/",//Добавил
                    "SMART_FILTER_PATH" => $arResult["VARIABLES"]["SMART_FILTER_PATH"],//Добавил
					"SECTION_CODE_PATH" => $arResult["VARIABLES"]["SECTION_CODE_PATH"],//Добавил
					
					
                    "PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
                    "INSTANT_RELOAD" => $arParams["INSTANT_RELOAD"],
                ),
                $component,
                array('HIDE_ICONS' => 'Y')
            );
			
            ?>
			
			
		
			
			
			
			
			
			
			
			
			
			
        </div>
    </div>
    <div class="col-md-9 col-lg-10 col-sm-8 col-xs-12">
        <?
        $APPLICATION->IncludeComponent(
            "bitrix:catalog.section",
            "",
            array(
                "SHOW_ALL_WO_SECTION" => "Y",
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
        ?>
    </div>
</div>

*/?>




















<style>
	.fastview{
		cursor: pointer;
	}
	
	.cardshow{
		    overflow: auto;
		position: fixed;
		z-index: 9999;
		width: 1240px;
		max-height: 90%;
		top: 5%;
		background: white;
		
		margin: auto;
		left: 0;
		right: 0;
		
		width: 1290px;
		
	}
	
	.shadow12{
		position: fixed;
		z-index: 9998;
		width: 100%;
		height: 100%;
		background: #0404047a;
		margin: auto;
		left: 0;
		right: 0;
		top: 0px;
		
	}
	
	.shadow12{
		display:none;
	}
	
	.cardshow{
		display:none;
	}
	
	.closebtncustom {
		cursor: pointer;
	}

	#cardshow2 .breadcrumbs,
	#cardshow2 .godund,
	#cardshow2 .contentgoods,
	#cardshow2 .hits,
	#cardshow2 .propductLine,
	#cardshow2 .catalogDetail-hero-produkt__prev,
	#cardshow2 .catalogDetail-hero-produkt__next,
	#cardshow2 .descdescription
	 {
		display: none !important;
	}


	#cardshow1 .btnurl {
		display: block !important;
		margin: 20px auto;
	}


	#cardshow1 .imgarr1 {
		display: block !important;
	}



	#cardshow2 .row.bx-site {
		margin: 0px !important;
    width: 100%;
	}


	#cardshow2 .catalogDetailInfo-prop__items{
		width: 80%;
	}

	.shadow12{
		cursor: pointer;
	}
	
	
</style>


<div class='shadow12' onclick="$('.shadow12').css('display','none');$('.cardshow').css('display','none');" ></div>




<div class='cardshow' id='cardshow1'>
	<div style="display: block;height: 40px;">

		<div class="lnr lnr-cross btncls closebtncustom" onclick="$('.shadow12').css('display','none');$('.cardshow').css('display','none');" style="font-size: 25px; margin: 10px;"></div>
	</div>

	<div id='cardshow2'>

	</div>





</div>






<script type="text/javascript">
/*
 BX.ajax.insertToNode('/katalog-tovarov-3/?bxajaxid=cardshow1&amp;test=y', 'cardshow2');
*/
</script>

























<script>
/*
$('.shadow12').css('display','block');$('.cardshow').css('display','block');
BX.ajax.insertToNode('/katalog-tovarov-3/testovyy-razdel/docherniy-3/?bxajaxid=cardshow1&test=y', 'cardshow2');
*/


</script>














