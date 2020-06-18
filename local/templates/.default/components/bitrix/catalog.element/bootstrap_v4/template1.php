<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */

 
 
$this->setFrameMode(true);

$templateLibrary = array('popup', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES']))
{
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList,
	'ITEM' => array(
		'ID' => $arResult['ID'],
		'IBLOCK_ID' => $arResult['IBLOCK_ID'],
		'OFFERS_SELECTED' => $arResult['OFFERS_SELECTED'],
		'JS_OFFERS' => $arResult['JS_OFFERS']
	)
);

/*
//Установка торгового предложения
$arResult['OFFERS_SELECTED'] = 2;
echo $arResult['OFFERS_SELECTED'];

*/





unset($currencyList, $templateLibrary);

$mainId = $this->GetEditAreaId($arResult['ID']);
$itemIds = array(
	'ID' => $mainId,
	'DISCOUNT_PERCENT_ID' => $mainId.'_dsc_pict',
	'STICKER_ID' => $mainId.'_sticker',
	'BIG_SLIDER_ID' => $mainId.'_big_slider',
	'BIG_IMG_CONT_ID' => $mainId.'_bigimg_cont',
	'SLIDER_CONT_ID' => $mainId.'_slider_cont',
	'OLD_PRICE_ID' => $mainId.'_old_price',
	'PRICE_ID' => $mainId.'_price',
	'DISCOUNT_PRICE_ID' => $mainId.'_price_discount',
	'PRICE_TOTAL' => $mainId.'_price_total',
	'SLIDER_CONT_OF_ID' => $mainId.'_slider_cont_',
	'QUANTITY_ID' => $mainId.'_quantity',
	'QUANTITY_DOWN_ID' => $mainId.'_quant_down',
	'QUANTITY_UP_ID' => $mainId.'_quant_up',
	'QUANTITY_MEASURE' => $mainId.'_quant_measure',
	'QUANTITY_LIMIT' => $mainId.'_quant_limit',
	'BUY_LINK' => $mainId.'_buy_link',
	'ADD_BASKET_LINK' => $mainId.'_add_basket_link',
	'BASKET_ACTIONS_ID' => $mainId.'_basket_actions',
	'NOT_AVAILABLE_MESS' => $mainId.'_not_avail',
	'COMPARE_LINK' => $mainId.'_compare_link',
	'TREE_ID' => $mainId.'_skudiv',
	'DISPLAY_PROP_DIV' => $mainId.'_sku_prop',
	'DISPLAY_MAIN_PROP_DIV' => $mainId.'_main_sku_prop',
	'OFFER_GROUP' => $mainId.'_set_group_',
	'BASKET_PROP_DIV' => $mainId.'_basket_prop',
	'SUBSCRIBE_LINK' => $mainId.'_subscribe',
	'TABS_ID' => $mainId.'_tabs',
	'TAB_CONTAINERS_ID' => $mainId.'_tab_containers',
	'SMALL_CARD_PANEL_ID' => $mainId.'_small_card_panel',
	'TABS_PANEL_ID' => $mainId.'_tabs_panel'
);
$obName = $templateData['JS_OBJ'] = 'ob'.preg_replace('/[^a-zA-Z0-9_]/', 'x', $mainId);
$name = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_PAGE_TITLE']
	: $arResult['NAME'];
$title = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_TITLE']
	: $arResult['NAME'];
$alt = !empty($arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT'])
	? $arResult['IPROPERTY_VALUES']['ELEMENT_DETAIL_PICTURE_FILE_ALT']
	: $arResult['NAME'];

$haveOffers = !empty($arResult['OFFERS']);
if ($haveOffers)
{
	$actualItem = isset($arResult['OFFERS'][$arResult['OFFERS_SELECTED']])
		? $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]
		: reset($arResult['OFFERS']);
	$showSliderControls = false;

	foreach ($arResult['OFFERS'] as $offer)
	{
		if ($offer['MORE_PHOTO_COUNT'] > 1)
		{
			$showSliderControls = true;
			break;
		}
	}
}
else
{
	$actualItem = $arResult;
	$showSliderControls = $arResult['MORE_PHOTO_COUNT'] > 1;
}

$skuProps = array();
$price = $actualItem['ITEM_PRICES'][$actualItem['ITEM_PRICE_SELECTED']];
$measureRatio = $actualItem['ITEM_MEASURE_RATIOS'][$actualItem['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'];
$showDiscount = $price['PERCENT'] > 0;

$showDescription = !empty($arResult['PREVIEW_TEXT']) || !empty($arResult['DETAIL_TEXT']);
$showBuyBtn = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION']);
$buyButtonClassName = in_array('BUY', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-primary' : 'btn-link';
$showAddBtn = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION']);
$showButtonClassName = in_array('ADD', $arParams['ADD_TO_BASKET_ACTION_PRIMARY']) ? 'btn-primary' : 'btn-link';
$showSubscribe = $arParams['PRODUCT_SUBSCRIPTION'] === 'Y' && ($arResult['PRODUCT']['SUBSCRIBE'] === 'Y' || $haveOffers);

$arParams['MESS_BTN_BUY'] = $arParams['MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCE_CATALOG_BUY');
$arParams['MESS_BTN_ADD_TO_BASKET'] = $arParams['MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCE_CATALOG_ADD');
$arParams['MESS_NOT_AVAILABLE'] = $arParams['MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCE_CATALOG_NOT_AVAILABLE');
$arParams['MESS_BTN_COMPARE'] = $arParams['MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCE_CATALOG_COMPARE');
$arParams['MESS_PRICE_RANGES_TITLE'] = $arParams['MESS_PRICE_RANGES_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_PRICE_RANGES_TITLE');
$arParams['MESS_DESCRIPTION_TAB'] = $arParams['MESS_DESCRIPTION_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_DESCRIPTION_TAB');
$arParams['MESS_PROPERTIES_TAB'] = $arParams['MESS_PROPERTIES_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_PROPERTIES_TAB');
$arParams['MESS_COMMENTS_TAB'] = $arParams['MESS_COMMENTS_TAB'] ?: Loc::getMessage('CT_BCE_CATALOG_COMMENTS_TAB');
$arParams['MESS_SHOW_MAX_QUANTITY'] = $arParams['MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCE_CATALOG_SHOW_MAX_QUANTITY');
$arParams['MESS_RELATIVE_QUANTITY_MANY'] = $arParams['MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['MESS_RELATIVE_QUANTITY_FEW'] = $arParams['MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCE_CATALOG_RELATIVE_QUANTITY_FEW');

$positionClassMap = array(
	'left' => 'product-item-label-left',
	'center' => 'product-item-label-center',
	'right' => 'product-item-label-right',
	'bottom' => 'product-item-label-bottom',
	'middle' => 'product-item-label-middle',
	'top' => 'product-item-label-top'
);

$discountPositionClass = 'product-item-label-big';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION']))
{
	foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos)
	{
		$discountPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$labelPositionClass = 'product-item-label-big';
if (!empty($arParams['LABEL_PROP_POSITION']))
{
	foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos)
	{
		$labelPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$themeClass = isset($arParams['TEMPLATE_THEME']) ? ' bx-'.$arParams['TEMPLATE_THEME'] : '';
?>




<?
// Для определения вариаций цветов

$imgcolors = [];

$generalcolors = [];

if (CModule::IncludeModule('highloadblock')) {

    $ID = 5; // ИД 

    $hldata = Bitrix\Highloadblock\HighloadBlockTable::getById($ID)->fetch();
    $hlentity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hldata);
    $hlDataClass = $hldata["NAME"] . "Table";

    $result = $hlDataClass::getList(array(
                "select" => array("ID", "UF_NAME", "UF_XML_ID", "UF_FILE"), // Поля для выборки
                "order" => array("UF_SORT" => "ASC"),
                "filter" => array("UF_XML_ID" => $arResult[PROPERTIES][color][VALUE])
				
				));

    while ($res1 = $result->fetch()) {
    // Выводите что вам надо
	array_push($imgcolors , array("Name" => $res1[UF_NAME],"file" => $res1[UF_FILE]) );
    }
	
	
	
	
	
	//Скрипт для вывода цвета
	 $result = $hlDataClass::getList(array(
                "select" => array("ID", "UF_NAME", "UF_XML_ID", "UF_FILE"), // Поля для выборки
                "order" => array("UF_SORT" => "ASC"),
                "filter" => array("UF_XML_ID" => $arResult[PROPERTIES][color][VALUE])
				
				));

    while ($res1 = $result->fetch()) {
    // Выводите что вам надо
	array_push($generalcolors , array("Name" => $res1[UF_NAME]) );
    }
	
	
	
}

?>












<style>
.popupAddBasket-complekt__name:hover {
    text-decoration: underline;
}

.popupAddBasket-item__name:hover {
    text-decoration: underline;
}

@media (max-width: 1200px) {

    .custompv .breadcrumbs .container {
        width: 100% !important;
        padding: 0 20px 0 20px !important;
        box-sizing: border-box;
    }


    .custompv .breadcrumbs {
        margin: 20px 0 40px 0;
        padding-top: 0px;
        border-top: unset !important;

    }
}
</style>

<div class="deskver">
    <?

$pos = strpos($_SESSION['breadcr'][1][URL], $arParams["~SECTION_CODE"]);
$katalogurl = "/katalog-tovarov-3/";
$sectionfolder = $katalogurl.$arParams["~SECTION_CODE"];

if ($pos) { ?>






    <div class="custompv">
        <div class="wrapper__main">
            <div class="breadcrumbs">
                <div class="container">
                    <div class="container__wrap">
                        <div class="breadcrumbs__items" itemscope="" itemtype="http://schema.org/BreadcrumbList">


                            <span class="breadcrumbs__item" itemscope="" itemprop="itemListElement"
                                itemtype="http://schema.org/ListItem">
                                <a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная" href="/">
                                    <span itemprop="name">Главная</span>
                                    <meta itemprop="position" content="1">
                                </a>
                            </span>





                            <?
								foreach($_SESSION['breadcr'] as $key=>$crumb){
								?>

                            <span class="breadcrumbs__item" itemscope="" itemprop="itemListElement"
                                itemtype="http://schema.org/ListItem">
                                <a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная"
                                    href="<?=$crumb[URL];?>">
                                    <span itemprop="name"><?=$crumb[NAME];?></span>
                                    <meta itemprop="position" content="1">
                                </a>
                            </span>

                            <?
								}
								?>





                            <span class="breadcrumbs__item">
                                <span class="breadcrumbs__text"><?=$name?></span>
                            </span>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?
		}else{
		?>
    <div class="custompv">
        <div class="wrapper__main">
            <div class="breadcrumbs">
                <div class="container">
                    <div class="container__wrap">
                        <div class="breadcrumbs__items" itemscope="" itemtype="http://schema.org/BreadcrumbList">


                            <span class="breadcrumbs__item" itemscope="" itemprop="itemListElement"
                                itemtype="http://schema.org/ListItem">
                                <a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная" href="/">
                                    <span itemprop="name">Главная</span>
                                    <meta itemprop="position" content="1">
                                </a>
                            </span>

                            <span class="breadcrumbs__item" itemscope="" itemprop="itemListElement"
                                itemtype="http://schema.org/ListItem">
                                <a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная"
                                    href="<?=$katalogurl;?>">
                                    <span itemprop="name">Каталог</span>
                                    <meta itemprop="position" content="1">
                                </a>
                            </span>


                            <span class="breadcrumbs__item" itemscope="" itemprop="itemListElement"
                                itemtype="http://schema.org/ListItem">
                                <a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная"
                                    href="<?=$arResult[SECTION][SECTION_PAGE_URL];?>">
                                    <span itemprop="name"><?=$arResult[SECTION][NAME];?></span>
                                    <meta itemprop="position" content="1">
                                </a>
                            </span>






                            <span class="breadcrumbs__item">
                                <span class="breadcrumbs__text"><?=$name?></span>
                            </span>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?	
		}
		?>


    <br>


    <?// Детальное описание товара ?>
    <?// =============================================== ?>

    <?// Закрепленный товар в шапке?>
    <div class="propductLine">
        <div class="container">
            <div class="container__wrap">
                <div class="propductLine__wrap">
                    <div class="propductLine__col one">
                        <div class="propductLine-item">
                            <div class="propductLine-item__col one">
                                <div class="propductLine__pic"><img class="propductLine__img"
                                        src="assets/img/page/detail_catalog/big.png" alt=""></div>
                            </div>
                            <div class="propductLine-item__col two">
                                <div class="propductLine__name">
                                    <?=$arResult[NAME];?>
                                </div>
                                <div class="propductLine__art">Артикул: st-02.90-latun</div>
                            </div>
                        </div>
                    </div>
                    <div class="propductLine__col two">
                        <div class="propductLine-prop">
                            <div class="propductLine-prop__col one"><a class="propductLine-prop__back-prop"
                                    href="#product_prop">Вернуться к характеристикам</a></div>
                            <div class="propductLine-prop__col two">
                                <div class="popupAddBasket-item-count">
                                    <div class="popupAddBasket-item-count__col one">
                                        <button class="popupAddBasket-item-count__btn" data-type="minus">-</button>
                                    </div>
                                    <div class="popupAddBasket-item-count__col two">
                                        <div class="popupAddBasket-item-count__input">
                                            <input class="popupAddBasket-item-count__input-text" value="1">
                                        </div>
                                    </div>
                                    <div class="popupAddBasket-item-count__col three">
                                        <button class="popupAddBasket-item-count__btn" data-type="plus">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="propductLine-prop__col three">
                                <div class="propductLine-prop-price">
                                    <div class="propductLine-prop-price__old">17 250 руб.</div>
                                    <div class="propductLine-prop-price__new">23 900 руб.-</div>
                                </div>
                            </div>
                            <div class="propductLine-prop__col four">
                                <button class="propductLine-prop__btn btn-common-empty">Купить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>








    <?// Детальное описание товара ?>
    <div class="catalogDetail">
        <div class="container">
            <div class="container__wrap">
                <div class="catalogDetail-hero">


                    <div class="catalogDetail-hero__col one">
                        <div class="catalogDetailPhoto">


                            <div class="catalogDetailPhoto__col one">
                                <div class="catalogDetailPhoto-mini">
                                    <div class="catalogDetailPhoto-mini__items">

                                        <?
								foreach($arResult[PROPERTIES][Gallery][VALUE] as $key=>$imgg121){
								?>
                                        <div class="catalogDetailPhoto-mini__item"
                                            onclick="$('.catalogDetailPhoto-big__popup.two').attr('href', '<?=CFile::GetPath($imgg121);?>');">
                                            <div class="catalogDetailPhoto-mini__pic"><img
                                                    class="catalogDetailPhoto-mini__img"
                                                    src="<?=CFile::GetPath($imgg121);?>" alt="" /></div>
                                        </div>
                                        <?
								}
								?>

                                    </div>
                                </div>
                            </div>




                            <div class="catalogDetailPhoto__col two">
                                <div class="catalogDetailPhoto-big">



                                    <div class="catalogDetailPhoto-big__popup three" style="opacity:0;"><span
                                            class="catalogDetailPhoto-big__toggleTitle toggleTitle"
                                            data-title="Смотреть">
                                            <div class="lnr lnr-camera-video catalogDetailPhoto-big__icon"></div>
                                            <div class="catalogDetailPhoto-big__popup-title" data-show="видео"
                                                data-hide="смотреть">видео</div>
                                        </span>
                                    </div>


                                    <div class="catalogDetailPhoto-big__popup one">
                                        <div class="lnr lnr-exit-up catalogDetailPhoto-big__icon toggleTitle"
                                            data-title="Поделиться"></div><span class="share-popup"><span
                                                class="share-popup__items"><a class="share-popup__item" href="#"><span
                                                        class="fa fa-instagram share-popup__icon"></span></a><a
                                                    class="share-popup__item" href="#"><span
                                                        class="fa fa-vk share-popup__icon"></span></a><a
                                                    class="share-popup__item" href="#"><span
                                                        class="fa fa-facebook share-popup__icon"></span></a><a
                                                    class="share-popup__item" href="#"><span
                                                        class="fa fa-twitter share-popup__icon"></span></a><a
                                                    class="share-popup__item" href="#"><span
                                                        class="fa fa-whatsapp share-popup__icon"></span></a></span></span>
                                    </div>


                                    <a class="catalogDetailPhoto-big__popup two" id="js-catalogDetailPhoto-fancybox"
                                        data-fancybox="gallery"
                                        href="<?=CFile::GetPath($arResult[PROPERTIES][Gallery][VALUE][0]);?>">
                                        <div class="lnr lnr-frame-expand catalogDetailPhoto-big__icon toggleTitle"
                                            data-title="Увеличить"></div>
                                    </a>




















                                    <div class="catalogDetailPhoto-big__items">

                                        <?
								$qe = true;
								foreach($arResult[PROPERTIES][Gallery][VALUE] as $key=>$imgg121){
								?>
                                        <div class="catalogDetailPhoto-big__item"><a class="catalogDetailPhoto-big__pic"
                                                data-fancybox="gallery-img" href="<?=CFile::GetPath($imgg121);?>"><img
                                                    class="catalogDetailPhoto-big__img"
                                                    src="<?=CFile::GetPath($imgg121);?>" alt="" /></a></div>
                                        <?
								}
								?>



                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>




                    <div class="catalogDetail-hero__col two">
                        <div class="catalogDetailInfo">

                            <?//Вывод скидки и стикеров?>



                            <div class="catalogDetailInfoProp">
                                <?if($arResult[PROPERTIES][discount][VALUE]){?>
                                <div class="catalogDetailInfoProp__item sale">
                                    -<?=$arResult[PROPERTIES][discount][VALUE];?> %</div>
                                <?}?>


                                <? foreach($arResult[PROPERTIES][stiker][VALUE] as $key=>$stiker){ ?>
                                <div class="catalogDetailInfoProp__item green"><?=$stiker;?></div>
                                <? } ?>
                            </div>





                            <div class="catalogDetailInfoTags">
                                <a class="catalogDetailInfoTags__link" href="<?=$katalogurl?>">Каталог</a>


                                <?
								$ElementId = $arResult['ID'];
								$db_groups = CIBlockElement::GetElementGroups($ElementId, true);
								while($ar_group = $db_groups->Fetch()) {
									?>

                                <a class="catalogDetailInfoTags__link"
                                    href="<?=$katalogurl?><?=$ar_group[CODE]?>/"><?=$ar_group["NAME"]?></a>

                                <?
							}
							?>


                                <?
							$ji = 0;
							foreach($arResult[PROPERTIES][vid_oborudovaniy][VALUE] as $key=>$vidobor){ ?>

                                <a class="catalogDetailInfoTags__link"
                                    href="<?=$katalogurl?>filter/vid_oborudovaniy-is-<?=$arResult[PROPERTIES][vid_oborudovaniy][VALUE_XML_ID][$ji++]?>/apply/"><?=$vidobor;?></a>

                                <? } ?>





                            </div>



                            <a name="product_prop"></a>
                            <h1 class="catalogDetailInfo__title"><?=$arResult[NAME];?></h1>




                            <div class="catalogDetailInfo-buy">
                                <div class="catalogDetailInfo-buy__col one">

                                    <div class="catalogDetailInfo-buy__price-old"
                                        style="<?=(ceil($arResult[ITEM_PRICES][0][UNROUND_BASE_PRICE]) > ceil($arResult[ITEM_PRICES][0][UNROUND_PRICE]) ? '' : 'font-style: normal;font-weight: 600;font-size: 25px;line-height: 34px;color: #2f2f2f;text-decoration-line: unset;')?>">

                                        <?=number_format(ceil($arResult[ITEM_PRICES][0][UNROUND_BASE_PRICE]), 0, ',', ' ')." руб.";?>
                                    </div>
                                    <div class="catalogDetailInfo-buy__price"
                                        style="<?=(ceil($arResult[ITEM_PRICES][0][UNROUND_BASE_PRICE]) > ceil($arResult[ITEM_PRICES][0][UNROUND_PRICE]) ? 'font-style: normal;font-weight: 600;font-size: 25px;line-height: 34px;color: #ff4500;' : 'display: none;')?>">

                                        <?=number_format(ceil($arResult[ITEM_PRICES][0][UNROUND_PRICE]), 0, ',', ' ')." руб.";?>

                                    </div>


                                    <a class="catalogDetailInfo-buy__link" href="#">сравнить</a><a
                                        class="catalogDetailInfo-buy__link two" href="#">в избранное</a>
                                </div>





                                <?//Кнопка купить?>



                                <div class="sectionCatalogList-items-prev-control">
                                    <div class="sectionCatalogList-items-prev-control__col one">
                                        <div class="sectionCatalogList-items-count">
                                            <div class="sectionCatalogList-items-count__col">
                                                <button class="sectionCatalogList-items-count__btn minus">-</button>
                                            </div>
                                            <div class="sectionCatalogList-items-count__col">
                                                <div class="sectionCatalogList-items-count__input">
                                                    <input class="sectionCatalogList-items-count__input-text"
                                                        type="text" value="1">
                                                </div>
                                            </div>
                                            <div class="sectionCatalogList-items-count__col">
                                                <button class="sectionCatalogList-items-count__btn plus">+</button>
                                            </div>
                                        </div>
                                    </div>













                                    <div class="sectionCatalogList-items-prev-control__col two">
                                        <button
                                            class="sectionCatalogList-items-prev-price__buy black popupAddBasket__open buy-but1"
                                            data-msg-ok="Купить" href="javascript:void(0)"
                                            data-value="<?=$arResult[ID];?>"
                                            style="<?=$itInBasket ? "background: #2f2f2f !important;" : "background: #ff4500 !important;";?>">


                                            <?=$itInBasket ? "Добавлено" : "Купить";?>



                                        </button>
                                    </div>



                                </div>












                            </div>





                            <div class="catalogDetailInfo__art">Артикул: <?=$arResult[PROPERTIES][Article][VALUE];?>
                            </div>
                            <div class="catalogDetailInfo__preview">

                                <?=$arResult["~PREVIEW_TEXT"];?>

                                <?//[~DETAIL_TEXT]?>
                            </div>
                            <h2 class="catalogDetailInfo-prop__title">Характеристики:</h2>
                            <div class="catalogDetailInfo-prop__items">







                                <?if($arResult[PROPERTIES][material][VALUE][0]){?>
                                <div class="catalogDetailInfo-prop__item">
                                    <div class="catalogDetailInfo-prop__col one">Материал</div>
                                    <div class="catalogDetailInfo-prop__col two">
                                        <? $allval = ""; foreach($arResult[PROPERTIES][material][VALUE] as $val1){$allval .= $val1.", ";}$allval  = mb_substr($allval, 0, -2); echo $allval;?>
                                    </div>
                                </div>
                                <?}?>


                                <?if($arResult[PROPERTIES][color][VALUE][0]){?>
                                <div class="catalogDetailInfo-prop__item">
                                    <div class="catalogDetailInfo-prop__col one">Цвет</div>
                                    <div class="catalogDetailInfo-prop__col two">

                                        <?//Список цветов
									$allcolors = "";
									foreach($generalcolors as $imgcol1){
										$allcolors .= $imgcol1[Name].", ";
									}
									$allcolors  = mb_substr($allcolors, 0, -2);
									echo $allcolors;
								?>

                                    </div>
                                </div>
                                <?}?>


                                <?if($arResult[PROPERTIES][width][VALUE]){?>
                                <div class="catalogDetailInfo-prop__item">
                                    <div class="catalogDetailInfo-prop__col one">Ширина, мм</div>
                                    <div class="catalogDetailInfo-prop__col two">
                                        <?=$arResult[PROPERTIES][width][VALUE];?></div>
                                </div>
                                <?}?>

                                <?if($arResult[PROPERTIES][deep][VALUE]){?>
                                <div class="catalogDetailInfo-prop__item">
                                    <div class="catalogDetailInfo-prop__col one">Глубина, мм</div>
                                    <div class="catalogDetailInfo-prop__col two">
                                        <?=$arResult[PROPERTIES][deep][VALUE];?></div>
                                </div>
                                <?}?>

                                <?if($arResult[PROPERTIES][height][VALUE]){?>
                                <div class="catalogDetailInfo-prop__item">
                                    <div class="catalogDetailInfo-prop__col one">Высота, мм</div>
                                    <div class="catalogDetailInfo-prop__col two">
                                        <?=$arResult[PROPERTIES][height][VALUE];?></div>
                                </div>
                                <?}?>

                                <?if($arResult[PROPERTIES][sechenie][VALUE]){?>
                                <div class="catalogDetailInfo-prop__item">
                                    <div class="catalogDetailInfo-prop__col one">Сечение, мм</div>
                                    <div class="catalogDetailInfo-prop__col two">
                                        <?=$arResult[PROPERTIES][sechenie][VALUE];?></div>
                                </div>
                                <?}?>

                                <?if($arResult[PROPERTIES][typesechenie][VALUE]){?>
                                <div class="catalogDetailInfo-prop__item">
                                    <div class="catalogDetailInfo-prop__col one">Тип сечения</div>
                                    <div class="catalogDetailInfo-prop__col two">
                                        <?=$arResult[PROPERTIES][typesechenie][VALUE];?></div>
                                </div>
                                <?}?>

                                <?if($arResult[PROPERTIES][kreplenie][VALUE]){?>
                                <div class="catalogDetailInfo-prop__item">
                                    <div class="catalogDetailInfo-prop__col one">Тип крепления</div>
                                    <div class="catalogDetailInfo-prop__col two">
                                        <?=$arResult[PROPERTIES][kreplenie][VALUE];?></div>
                                </div>
                                <?}?>

                                <?if($arResult[PROPERTIES][edizmereniy][VALUE]){?>
                                <div class="catalogDetailInfo-prop__item">
                                    <div class="catalogDetailInfo-prop__col one">Единицы измерения</div>
                                    <div class="catalogDetailInfo-prop__col two">
                                        <?=$arResult[PROPERTIES][edizmereniy][VALUE];?></div>
                                </div>
                                <?}?>




                            </div>




                            <?//Новая версия таблицы другие варианты товаров?>

                        </div>
                    </div>
                </div>
            </div>



            <br><br><br>

            <h2 class="catalogDetailInfo-prop__title">Другие варианты товара :</h2>

            <br>





            <?
			
			
			
			
			//Задача за минимальные ресурсы, найти все элементы связанные с этим товаром Поиск 2-го уровня
			
			/*
			
			Алгоритм 
			
			1 Выводим все элементы связанные с данным товаром через поле [torgoffer] 1,2,3,4..
			
			2 Выводим элементы в котором в качестве связи указан id нашего товара "PROPERTY_torgoffer" => $arResult[ID]
			
			3 Выводим элементы которые связанны с данным товаром через поле [torgoffer] 1,2,3,4..
			
			Все элементы вносим в массив, исключая дубликаты
			
			*/
			
			
			
			//Сбор всех цветов
			$result = $hlDataClass::getList(array(
            "select" => array("ID", "UF_NAME", "UF_XML_ID", "UF_FILE"), // Поля для выборки
            "order" => array("UF_SORT" => "ASC")
			));
			
			$generalcolors1 = [];
			
			//Переносим в массив цветов
			while ($res1 = $result->fetch()) {
				$generalcolors1[$res1[UF_XML_ID]] = $res1[UF_NAME];
			}
			
			
			
			
			$torgoggerid = [];
			
			
			$arFilter3_linksnew11 = Array("IBLOCK_ID"=>6,
										"PROPERTY_torgoffer" => $arResult[XML_ID],
										"ACTIVE"=>"Y");
										
			$res3_linksnew11 = CIBlockElement::GetList(Array(), $arFilter3_linksnew11, false, false);
			while($ob3_linksnew11 = $res3_linksnew11->GetNextElement()){
				$arFields11 = $ob3_linksnew11->GetFields();  
				$props11 = $ob3_linksnew11->GetProperties();
				
				//Вывод всех указателей на этот элемент
				array_push($torgoggerid,$arFields11[XML_ID]);
				
				//Вывод всех указателей у выбранных указателей
				foreach($props11[torgoffer][VALUE] as $itemoffer){
					array_push($torgoggerid,$itemoffer);
				}
				
			}
			
			
			
			
			
			
			
			
			
			
			//Вывод всех указателей у этого элемента(Правильно)
			foreach($arResult[PROPERTIES][torgoffer][VALUE] as $itemoffer){
				array_push($torgoggerid,$itemoffer);
				
			}
			
			
			$result = array_unique($torgoggerid);
			
			
			
			$arFilter3_linksnew = Array("IBLOCK_ID"=>6,
										"XML_ID"=>$result,
										"ACTIVE"=>"Y");
			
			
			$res3_linksnew = CIBlockElement::GetList(Array(), $arFilter3_linksnew, false, false);
			
			
			
			
			//Проверка:
            $artest[obrabotka] = false;
			$artest[height] = false;
			$artest[size] = false;
			$artest[width] = false;
            $artest[deep] = false;
            $artest[tolchina] = false;
			$artest[diametr] = false;
			
            
            


			
			
			//echo "<table class='tabvariant'><tr><td style='width:25%;'>Цвет</td><td style='width:45%;'>Размер</td><td style=''>Цена</td></tr>";
			
			echo "<table class='tabvariant'>
			<tr>
				<td style=''>Артикул</td>
				<td style=''>Цвет</td>
				<td style=''>Материал</td>
				<td style='' class='obrabotka-column'>Вид обработки</td>
				<td style='' class='height-column'>Высота<br>(мм)</td>
				<td style='' class='size-column'>Длина<br>(мм)</td>
				<td style='' class='width-column'>Ширина<br>(мм)</td>
				<td style='' class='deep-column'>Глубина<br>(мм)</td>
				<td style='' class='tolchina-column'>Толщина<br>(мм)</td>
				<td style='' class='diametr-column'>Диаметр<br>(мм)</td>
				<td style=''>Цена</td>
			</tr>";
			
			
			
			while($ob3_linksnew = $res3_linksnew->GetNextElement()){
				
				$arFields = $ob3_linksnew->GetFields();  
                $props = $ob3_linksnew->GetProperties(); 
                
                    


                    $artest[obrabotka] = ($props[obrabotka][VALUE]? true : $artest[obrabotka]);
                    $artest[height] = ($props[height][VALUE]? true : $artest[height]);
                    $artest[size] = ($props[size][VALUE]? true : $artest[size]);
                    $artest[width] = ($props[width][VALUE]? true : $artest[width]);
                    $artest[deep] = ($props[deep][VALUE]? true : $artest[deep]);
                    $artest[tolchina] = ($props[tolchina][VALUE]? true : $artest[tolchina]);
                    $artest[diametr] = ($props[diametr][VALUE]? true : $artest[diametr]);



				
				
					
				
					$PRODUCT_ID = $arFields['ID'];
				
					$price = CCatalogProduct::GetOptimalPrice($PRODUCT_ID, 1, $USER->GetUserGroupArray(), 'N');

					$oldprice1 = $price[PRICE][PRICE];
					
					$cur12 = $price[PRICE][CURRENCY];
					
					$price = $price['RESULT_PRICE']['DISCOUNT_PRICE'];
					
					//Параметры
					
					$par11 = "";
					
					if($props[height][VALUE]){
						$par11 .= " <span class='para'>в. </span>".$props[height][VALUE];
					}
					if($props[size][VALUE]){
						if($par11)$par11.=" * ";
						$par11 .= "<span class='para'> д. </span>".$props[size][VALUE];
					}
					if($props[width][VALUE]){
						if($par11)$par11.=" * ";
						$par11 .= "<span class='para'> ш. </span>".$props[width][VALUE];
					}
					if($props[deep][VALUE]){
						if($par11)$par11.=" * ";
						$par11 .= "<span class='para'> г. </span>".$props[deep][VALUE];
					}
					if($props[diametr][VALUE]){
						if($par11)$par11.=" * ";
						$par11 .= "<span class='para'> D </span>".$props[diametr][VALUE];
					}
					if($props[sechenie][VALUE]){
						if($par11)$par11.=" * ";
						$par11 .= "<span class='para'> сеч. </span>".$props[sechenie][VALUE];
					}
					
					
					
					
					
					
					?>










            <?
					
					
					
					
					
					
					
					
				
					
				
				
				
				
				
				
				
				
				
				$linknew = str_replace("SITE_DIR#/catalog/", "/katalog-tovarov-3/", $arFields[DETAIL_PAGE_URL])."/";
				
				
														
				$PRICE_TYPE_ID = 1;

				$rsPrices = CPrice::GetList(array(), array('PRODUCT_ID' => $arFields['ID'], 'CATALOG_GROUP_ID' => $PRICE_TYPE_ID));
				if ($arPrice = $rsPrices->Fetch())
				{
					
				
				
				//Формируем материал
					$allmaterial = "";
					foreach($props[material][VALUE] as $imgcol1){
						$allmaterial .= $imgcol1.", ";
						
					}
					if($props[material][VALUE][0])
					$allmaterial  = mb_substr($allmaterial, 0, -2);
				
					
					
				
				if($arFields[NAME] == $arResult[NAME]){
					
					//Формируем цвет
					$allcolors = "";
					foreach($props[color][VALUE] as $imgcol1){
						$allcolors .= $generalcolors1[$imgcol1].", ";
					}
					if($props[color][VALUE][0])
					$allcolors  = mb_substr($allcolors, 0, -2);
				
				
				
				
					
				
					
					
				
					/*	
					echo "<tr style='cursor: pointer;background-color: #eaeaea !important;font-weight: 600;' ";?>onclick="document.location
            = '<?=$linknew;?>';"
            <? echo "><td >".$allcolors."</td><td>$par11 мм</td><td >".
					"<span class='".(($oldprice1>$price)?"disc22":"")."'>".CurrencyFormat($price, $arPrice["CURRENCY"])."</span>".
					(($oldprice1>$price)?"<span class='".(($oldprice1>$price)?"disc1":"")."'>".CurrencyFormat($oldprice1,$cur12)."</span>":"")."</td></tr>";	
					*/
					
					echo "<tr style='cursor: pointer; background-color: #eaeaea !important; font-weight: 600;' ";?>onclick="document.location
            = '<?=$linknew;?>';"
            <? echo ">
						<td style='text-decoration: underline;'>".$props[Article][VALUE]."</td>	
						<td style=''>".$allcolors."</td>
						<td style=''>".$allmaterial."</td>
						<td style='' class='obrabotka-column'>".$props[obrabotka][VALUE]."</td>
						<td style='' class='height-column'>".$props[height][VALUE]."</td>
						<td style='' class='size-column'>".$props[size][VALUE]."</td>
						<td style='' class='width-column'>".$props[width][VALUE]."</td>
						<td style='' class='deep-column'>".$props[deep][VALUE]."</td>
						<td style='' class='tolchina-column'>".$props[tolchina][VALUE]."</td>
						<td style='' class='diametr-column'>".$props[diametr][VALUE]."</td>
						<td style='' class='pricvar1'>".
							(($oldprice1>$price)?"<span class='".(($oldprice1>$price)?"disc1":"")."'>".CurrencyFormat($oldprice1,$cur12)."</span><br>":"")."
							<span class='".(($oldprice1>$price)?"disc22":"")."'>".CurrencyFormat($price, $arPrice["CURRENCY"])."</span>
						</td>
						</tr>";
					
					
					
					
					
					
					
						
				}
				else{
					//Формируем цвет
					$allcolors = "";
					foreach($props[color][VALUE] as $imgcol1){
						$allcolors .= $generalcolors1[$imgcol1].", ";
					}
					if($props[color][VALUE][0])
					$allcolors  = mb_substr($allcolors, 0, -2);
					
					/*
					echo "<tr style='cursor: pointer;' ";?>onclick="document.location = '<?=$linknew;?>';"
            <? echo "><td>".$allcolors."</td><td>".($props[height][VALUE] ? $props[height][VALUE]:"В")."*".($props[size][VALUE] ? $props[size][VALUE]:"Д")."*".($props[width][VALUE] ? $props[width][VALUE]:"Ш")." мм</td><td >".
					"<span class='".(($oldprice1>$price)?"disc22":"")."'>".CurrencyFormat($price, $arPrice["CURRENCY"])."</span>".
					(($oldprice1>$price)?"<span class='".(($oldprice1>$price)?"disc1":"")."'>".CurrencyFormat($oldprice1,$cur12)."</span>":"").
					
					"</td></tr>";	
					*/
					/*
					echo "<tr style='cursor: pointer;' ";?>onclick="document.location = '<?=$linknew;?>';"
            <? echo "><td>".$allcolors."</td><td>$par11 мм</td><td >".
					"<span class='".(($oldprice1>$price)?"disc22":"")."'>".CurrencyFormat($price, $arPrice["CURRENCY"])."</span>".
					(($oldprice1>$price)?"<span class='".(($oldprice1>$price)?"disc1":"")."'>".CurrencyFormat($oldprice1,$cur12)."</span>":"").
					
					"</td></tr>";
					*/
					
					
					echo "<tr style='cursor: pointer;' ";?>onclick="document.location = '<?=$linknew;?>';"
            <? echo ">
						<td style=''>".$props[Article][VALUE]."</td>	
						<td style=''>".$allcolors."</td>
						<td style=''>".$allmaterial."</td>
						<td style='' class='obrabotka-column'>".$props[obrabotka][VALUE]."</td>
						<td style='' class='height-column'>".$props[height][VALUE]."</td>
						<td style='' class='size-column'>".$props[size][VALUE]."</td>
						<td style='' class='width-column'>".$props[width][VALUE]."</td>
						<td style='' class='deep-column'>".$props[deep][VALUE]."</td>
						<td style='' class='tolchina-column'>".$props[tolchina][VALUE]."</td>
						<td style='' class='diametr-column'>".$props[diametr][VALUE]."</td> 
						<td style='' class='pricvar1'>".
							(($oldprice1>$price)?"<span class='".(($oldprice1>$price)?"disc1":"")."'>".CurrencyFormat($oldprice1,$cur12)."</span><br>":"")."
							<span class='".(($oldprice1>$price)?"disc22":"")."'>".CurrencyFormat($price, $arPrice["CURRENCY"])."</span>
						</td>
						</tr>";
					
					
					
					
					
					
					
					
					
				}
				
				
					
				}
				
				 
			}
			
			 
			echo "</table>";
			
			echo "<br><br><br><br>";
			


			/*
			echo "
				<table class='tabvariant'>
				<tr><td style='width:20%;'>Наименование</td><td style='width:30%;'>Цвет</td><td style='width:30%;'>Размер<br><span style='font-weight:100;'>(выс.*длин.*шир.)</span></td><td>Цена</td></tr>";
			
			while($ob3_linksnew = $res3_linksnew->GetNextElement()){
				
				$arFields = $ob3_linksnew->GetFields();  
				$props = $ob3_linksnew->GetProperties(); 
				
				
					
				
					$PRODUCT_ID = $arFields['ID'];
				
					$price = CCatalogProduct::GetOptimalPrice($PRODUCT_ID, 1, $USER->GetUserGroupArray(), 'N');

					
					$price = $price['RESULT_PRICE']['DISCOUNT_PRICE'];
					
					
				
				
				
				
				
				
				
				
				
				
				
				$linknew = str_replace("SITE_DIR#/catalog/", "/katalog-tovarov-3/", $arFields[DETAIL_PAGE_URL])."/";
				
				
														
				$PRICE_TYPE_ID = 1;

				$rsPrices = CPrice::GetList(array(), array('PRODUCT_ID' => $arFields['ID'], 'CATALOG_GROUP_ID' => $PRICE_TYPE_ID));
				if ($arPrice = $rsPrices->Fetch())
				{
					
				
					
					
				
				if($arFields[NAME] == $arResult[NAME]){
					
					//Формируем цвет
					$allcolors = "";
					foreach($props[color][VALUE] as $imgcol1){
						$allcolors .= $generalcolors1[$imgcol1].", ";
					}
					if($props[color][VALUE][0])
					$allcolors  = mb_substr($allcolors, 0, -2);
				
						
					echo "<tr style='cursor: pointer;background-color: #eaeaea !important;' ";?>onclick="document.location =
            '<?=$linknew;?>';"
            <? echo "><td>".$arFields[NAME]."</td><td>".$allcolors."</td><td>".($props[height][VALUE] ? $props[height][VALUE]:"В")."*".($props[size][VALUE] ? $props[size][VALUE]:"Д")."*".($props[width][VALUE] ? $props[width][VALUE]:"Ш")." мм</td><td>".CurrencyFormat($price, $arPrice["CURRENCY"])."</td></tr>";	
						
				}
				else{
					//Формируем цвет
					$allcolors = "";
					foreach($props[color][VALUE] as $imgcol1){
						$allcolors .= $generalcolors1[$imgcol1].", ";
					}
					if($props[color][VALUE][0])
					$allcolors  = mb_substr($allcolors, 0, -2);
					
					echo "<tr style='cursor: pointer;' ";?>onclick="document.location = '<?=$linknew;?>';"
            <? echo "><td>".$arFields[NAME]."</td><td>".$allcolors."</td><td>".($props[height][VALUE] ? $props[height][VALUE]:"В")."*".($props[size][VALUE] ? $props[size][VALUE]:"Д")."*".($props[width][VALUE] ? $props[width][VALUE]:"Ш")." мм</td><td>".CurrencyFormat($price, $arPrice["CURRENCY"])."</td></tr>";
				}
				
				
					
				}
				
				 
			}
			
			
			echo "</table>";
			
			
			
			
			
			*/
			?>





            <br>




            <style>


            <?=($artest[obrabotka]?"":".obrabotka-column{display:none;}");?>
            <?=($artest[height]?"":".height-column{display:none;}");?>
            <?=($artest[size]?"":".size-column{display:none;}");?>
            <?=($artest[width]?"":".width-column{display:none;}");?>
            <?=($artest[deep]?"":".deep-column{display:none;}");?>
            <?=($artest[tolchina]?"":".tolchina-column{display:none;}");?>
            <?=($artest[diametr]?"":".diametr-column{display:none;}");?>







            .tabvariant {
                text-align: left;
            }






            .pricvar1 {
                font-weight: 600;
            }


            .propductLine {
                display: none !important;

            }


            .catalogDetail-hero__col.one {
                display: flex;
                position: relative;

            }

            .catalogDetailPhoto {
                height: 400px;
                position: sticky;
                top: 135px;
                display: flex;
            }








            .disc1 {

                font-size: 12px;
                text-decoration: line-through;
                padding-left: 10px;
                color: #616161 !important;

            }

            .disc22 {

                color: #ff581b;

            }

            .tabvariant td {
                padding-left: 5px;

            }



            .tabvariant tr {
                /*	border-bottom: 1px solid rgba(113,113,113,.3);*/
                height: 60px;

            }

            .tabvariant tr:hover {
                background-color: #eaeaea !important;
                font-weight: 600;
            }

            .tabvariant {
                width: 100%;
            }



            tr:nth-child(1) {
                background-color: #fff !important;
                font-weight: 600;

            }


            tr:nth-child(1):hover {
                background-color: #fff !important;

            }


            tr:nth-child(2n) {
                /*background-color: #eeeeee !important;*/

            }


            .tabvariant {
                /*border: #e4e4e4 solid 1px;*/

            }




            .catalogDetailInfo-prop__items {
                width: 100%;

            }


            .para {
                color: #b3b3b3;
                font-size: 14px;

            }
            </style>


































































        </div>
    </div><a class="catalogDetail-hero-produkt__prev" href="#">
        <div class="lnr lnr-chevron-left catalogDetail-hero-produkt__icon toggleTitle" data-title="Предыдущий товар">
        </div>
    </a><a class="catalogDetail-hero-produkt__next" href="#">
        <div class="lnr lnr-chevron-right catalogDetail-hero-produkt__icon toggleTitle" data-title="Следующий товар">
        </div>
    </a>
</div>
</div>









<div class="container__wrap">
    <div class="catalogDetail-tabs">
        <div class="catalogDetail-tabs__wrap">

            <?//Наименование вкладок?>
            <div class="catalogDetail-tabs__items">
                <a class="catalogDetail-tabs__item active" href="#">Описание товара</a>
                <a class="catalogDetail-tabs__item" href="#">Нет нужного размера или цвета?</a>
                <a class="catalogDetail-tabs__item" href="#">Доставка и оплата</a>
                <a class="catalogDetail-tabs__item" href="#">Частые вопросы</a>
            </div>

            <div class="catalogDetail-tabs-tab">
                <div class="catalogDetail-tabs-tab__item active">
                    <div class="catalogDetail-tabs-tab__wrap">

                        <div class="catalogDetail-tabs-tab__col one">
                            <div class="catalogDetail-tabs-tab__text">
                                <?=$arResult["~DETAIL_TEXT"];?>

                            </div>
                        </div>


                        <div class="catalogDetail-tabs-tab__col two">
                            <p>Чтобы ознакомиться подробнее с оборудованием посетите наш шоу-рум или позвоните по
                                телефону:</p>
                            <p>
                                - 8 800 302 44 01 (Бесплатно по РФ)<br>
                                - 8 495 413 74 15 (Москва и МО)
                            </p>
                            <p>Если Вы не дозвонились нам, пожалуйста, перезвоните или закажите звонок</p>
                            <p>Наш менеджер ответит на все ваши вопросы.</p>
                            <button class="catalogDetail-tabs-tab__btn">Заказать звонок</button>
                        </div>


                    </div>
                </div>
                <div class="catalogDetail-tabs-tab__item">Можете позвонить нам и мы подберем альтернативный вариант
                    <p>
                        - 8 800 302 44 01 (Бесплатно по РФ)<br>
                        - 8 495 413 74 15 (Москва и МО)
                    </p>

                </div>
                <div class="catalogDetail-tabs-tab__item">
                    Доставим!

                </div>
                <div class="catalogDetail-tabs-tab__item">Вопрос 1 Ответ 1</div>
            </div>
        </div>
    </div>




</div>





</div>

</div>

</div>
































































<?// Мобильная версия?>
<?//===============================================?>
<?//===============================================?>
<?//===============================================?>


<div class="mobi">

    <?	
	if ($pos){
	?>


    <div class="custompv">
        <div class="wrapper__main">
            <div class="breadcrumbs">
                <div class="container">
                    <div class="container__wrap">
                        <div class="breadcrumbs__items" itemscope="" itemtype="http://schema.org/BreadcrumbList">


                            <span class="breadcrumbs__item" itemscope="" itemprop="itemListElement"
                                itemtype="http://schema.org/ListItem">
                                <a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная" href="/">
                                    <span itemprop="name">Главная</span>
                                    <meta itemprop="position" content="1">
                                </a>
                            </span>





                            <?
							foreach($_SESSION['breadcr'] as $key=>$crumb){
							?>

                            <span class="breadcrumbs__item" itemscope="" itemprop="itemListElement"
                                itemtype="http://schema.org/ListItem">
                                <a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная"
                                    href="<?=$crumb[URL];?>">
                                    <span itemprop="name"><?=$crumb[NAME];?></span>
                                    <meta itemprop="position" content="1">
                                </a>
                            </span>

                            <?
							}
							?>





                            <span class="breadcrumbs__item">
                                <span class="breadcrumbs__text"><?=$name?></span>
                            </span>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?
	}else{
	?>
    <div class="custompv">
        <div class="wrapper__main">
            <div class="breadcrumbs">
                <div class="container">
                    <div class="container__wrap">
                        <div class="breadcrumbs__items" itemscope="" itemtype="http://schema.org/BreadcrumbList">


                            <span class="breadcrumbs__item" itemscope="" itemprop="itemListElement"
                                itemtype="http://schema.org/ListItem">
                                <a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная" href="/">
                                    <span itemprop="name">Главная</span>
                                    <meta itemprop="position" content="1">
                                </a>
                            </span>

                            <span class="breadcrumbs__item" itemscope="" itemprop="itemListElement"
                                itemtype="http://schema.org/ListItem">
                                <a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная"
                                    href="<?=$katalogurl;?>">
                                    <span itemprop="name">Каталог</span>
                                    <meta itemprop="position" content="1">
                                </a>
                            </span>


                            <span class="breadcrumbs__item" itemscope="" itemprop="itemListElement"
                                itemtype="http://schema.org/ListItem">
                                <a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная"
                                    href="<?=$arResult[SECTION][SECTION_PAGE_URL];?>">
                                    <span itemprop="name"><?=$arResult[SECTION][NAME];?></span>
                                    <meta itemprop="position" content="1">
                                </a>
                            </span>






                            <span class="breadcrumbs__item">
                                <span class="breadcrumbs__text"><?=$name?></span>
                            </span>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?	
	}
	?>







    <h1 class="namegood">
        <?=$arResult[NAME];?>
    </h1>


    <div class="article">Артикул: <?=$arResult[PROPERTIES][Article][VALUE];?></div>









    <div class="gallerypvcontent" style="position: relative;">

        <div class="tabcellpv btleft kardd1 mobivers">
            <div class="arrowleftpv lnr lnr-chevron-left"
                style="opacity: 1; <?=($arResult[PROPERTIES][Gallery][VALUE][0] ? "" :  "opacity: 0 !important;");?>">
            </div>
        </div>


        <div class="gallerypv tabcellpv">
            <div class="qqqq99">

                <div class="ggghhh">
                    <div class="ggghhh1">
                    </div>
                </div>



                <div class="scroll">
                    <div class="scroll_child mobivers" style="transform: translateX(0px);">



                        <?	foreach($arResult[PROPERTIES][Gallery][VALUE] as $imggoods):?>

                        <div class="elem11 kardd1 mobivers"
                            style="background-image:url(<?=CFile::GetPath($imggoods)?>); /*width:190px;*/"></div>



                        <? endforeach;?>







                    </div>

                </div>

            </div>
        </div>

        <div class="tabcellpv btright kardd1 mobivers">
            <div class="arrowrightpv lnr lnr-chevron-right"
                style="opacity: 1; <?=($arResult[PROPERTIES][Gallery][VALUE][0] ? "" :  "opacity: 0 !important;");?>">
            </div>
        </div>




    </div>


    <br>








    <div class="catalogDetailInfo-buy" style="margin:auto; margin:0 20px 0 20px;">
        <div class="catalogDetailInfo-buy__col one" style="    margin-left: 0px;">

            <div class="catalogDetailInfo-buy__price-old"
                style="<?=(ceil($arResult[ITEM_PRICES][0][UNROUND_BASE_PRICE]) > ceil($arResult[ITEM_PRICES][0][UNROUND_PRICE]) ? '' : 'font-style: normal;font-weight: 600;font-size: 25px;line-height: 34px;color: #2f2f2f;text-decoration-line: unset;')?>  font-size: 15px;font-family: Open Sans;font-style: normal;font-weight: normal; ">



                <?=CurrencyFormat($arResult[ITEM_PRICES][0][UNROUND_BASE_PRICE], $arResult[ITEM_PRICES][0][CURRENCY]);?>
            </div>

            <div class="catalogDetailInfo-buy__price"
                style="<?=(ceil($arResult[ITEM_PRICES][0][UNROUND_BASE_PRICE]) > ceil($arResult[ITEM_PRICES][0][UNROUND_PRICE]) ? 'font-style: normal;font-weight: 600;font-size: 20px;line-height: 34px;color: #ff4500;' : 'display: none;')?> font-size: 20px;">

                <?=number_format(ceil($arResult[ITEM_PRICES][0][UNROUND_PRICE]), 0, ',', ' ')." руб.";?>

            </div>


            <a class="catalogDetailInfo-buy__link" href="#" style="display:none;">сравнить</a><a
                class="catalogDetailInfo-buy__link two" href="#" style="display:none;">в избранное</a>
        </div>





        <?//Кнопка купить?>



        <div class="sectionCatalogList-items-prev-control">


            <div class="sectionCatalogList-items-prev-control__col one">
                <div class="sectionCatalogList-items-count">
                    <div class="sectionCatalogList-items-count__col">
                        <button class="sectionCatalogList-items-count__btn minus">-</button>
                    </div>
                    <div class="sectionCatalogList-items-count__col">
                        <div class="sectionCatalogList-items-count__input">
                            <input class="sectionCatalogList-items-count__input-text" type="text" value="1">
                        </div>
                    </div>
                    <div class="sectionCatalogList-items-count__col">
                        <button class="sectionCatalogList-items-count__btn plus">+</button>
                    </div>
                </div>
            </div>






        </div>



    </div>


    <div class="sectionCatalogList-items-prev-control__col two">
        <button class="sectionCatalogList-items-prev-price__buy black popupAddBasket__open buy-but1"
            data-msg-ok="Купить" href="javascript:void(0)" data-value="<?=$arResult[ID];?>"
            style="<?=$itInBasket ? "background: #2f2f2f !important;" : "background: #fff !important;color: black; border: 1px solid #2F2F2F;";?>">


            <?=$itInBasket ? "Добавлено" : "Купить";?>



        </button>
    </div>



    <style>
    <? //Новая версия карусели с фоном?>

    @media (max-width: 1270px) {

        .catalogDetailInfoProp,
        .catalogDetailInfoTags {
            margin: 0 20px 0 20px !important;
        }

        .catalogDetailInfoProp__item.sale,
        .catalogDetailInfoProp__item.green {
            margin-right: 14px;
            margin-left: 0px;
        }

        .catalogDetailInfoTags a {
            margin-right: 14px;
            margin-left: 0px;
        }

        .catalogDetailInfoProp {
            margin-bottom: 5px !important;

        }

        .namegood {
            margin-bottom: 5px !important;
        }

        .article {
            margin-top: 5px !important;

        }

        .catalogDetailInfo__preview {
            margin-bottom: 0px;

        }

        .catalogDetailInfo-prop__title {
            padding-top: 20px !important;
        }

        .catalogDetailInfo-prop__items {
            margin-bottom: 0px;
        }

        .variantgood {
            padding-bottom: 0px !important;

        }

    }
    </style>









    <?//Вывод скидки и стикеров?>



    <h1 class="namegood">
        <?=$arResult[NAME];?>
    </h1>


    <div class="article">Артикул: <?=$arResult[PROPERTIES][Article][VALUE];?></div>


    <div class="catalogDetailInfoProp">
        <?if($arResult[PROPERTIES][discount][VALUE]){?>
        <div class="catalogDetailInfoProp__item sale">-<?=$arResult[PROPERTIES][discount][VALUE];?> %</div>
        <?}?>


        <? foreach($arResult[PROPERTIES][stiker][VALUE] as $key=>$stiker){ ?>
        <div class="catalogDetailInfoProp__item green"><?=$stiker;?></div>
        <? } ?>
    </div>





    <div class="catalogDetailInfoTags">
        <a class="catalogDetailInfoTags__link" href="<?=$katalogurl?>">Каталог</a>


        <?
								$ElementId = $arResult['ID'];
								$db_groups = CIBlockElement::GetElementGroups($ElementId, true);
								while($ar_group = $db_groups->Fetch()) {
									?>

        <a class="catalogDetailInfoTags__link" href="<?=$katalogurl?><?=$ar_group[CODE]?>/"><?=$ar_group["NAME"]?></a>

        <?
							}
							?>


        <?
							$ji = 0;
							foreach($arResult[PROPERTIES][vid_oborudovaniy][VALUE] as $key=>$vidobor){ ?>

        <a class="catalogDetailInfoTags__link"
            href="<?=$katalogurl?>filter/vid_oborudovaniy-is-<?=$arResult[PROPERTIES][vid_oborudovaniy][VALUE_XML_ID][$ji++]?>/apply/"><?=$vidobor;?></a>

        <? } ?>





    </div>


















    <div class="catalogDetailInfo__preview">
        <?=$arResult["~PREVIEW_TEXT"];?>
    </div>

    <h2 class="catalogDetailInfo-prop__title">Характеристики:</h2>
    <div class="catalogDetailInfo-prop__items">







        <?if($arResult[PROPERTIES][material][VALUE][0]){?>
        <div class="catalogDetailInfo-prop__item">
            <div class="catalogDetailInfo-prop__col one">Материал</div>
            <div class="catalogDetailInfo-prop__col two">
                <? $allval = ""; foreach($arResult[PROPERTIES][material][VALUE] as $val1){$allval .= $val1.", ";}$allval  = mb_substr($allval, 0, -2); echo $allval;?>
            </div>
        </div>
        <?}?>


        <?if($arResult[PROPERTIES][color][VALUE][0]){?>
        <div class="catalogDetailInfo-prop__item">
            <div class="catalogDetailInfo-prop__col one">Цвет</div>
            <div class="catalogDetailInfo-prop__col two">

                <?//Список цветов
									$allcolors = "";
									foreach($generalcolors as $imgcol1){
										$allcolors .= $imgcol1[Name].", ";
									}
									$allcolors  = mb_substr($allcolors, 0, -2);
									echo $allcolors;
								?>

            </div>
        </div>
        <?}?>






        <?if($arResult[PROPERTIES][width][VALUE]){?>
        <div class="catalogDetailInfo-prop__item">
            <div class="catalogDetailInfo-prop__col one">Ширина, мм</div>
            <div class="catalogDetailInfo-prop__col two"><?=$arResult[PROPERTIES][width][VALUE];?></div>
        </div>
        <?}?>

        <?if($arResult[PROPERTIES][deep][VALUE]){?>
        <div class="catalogDetailInfo-prop__item">
            <div class="catalogDetailInfo-prop__col one">Глубина, мм</div>
            <div class="catalogDetailInfo-prop__col two"><?=$arResult[PROPERTIES][deep][VALUE];?></div>
        </div>
        <?}?>

        <?if($arResult[PROPERTIES][height][VALUE]){?>
        <div class="catalogDetailInfo-prop__item">
            <div class="catalogDetailInfo-prop__col one">Высота, мм</div>
            <div class="catalogDetailInfo-prop__col two"><?=$arResult[PROPERTIES][height][VALUE];?></div>
        </div>
        <?}?>

        <?if($arResult[PROPERTIES][sechenie][VALUE]){?>
        <div class="catalogDetailInfo-prop__item">
            <div class="catalogDetailInfo-prop__col one">Сечение, мм</div>
            <div class="catalogDetailInfo-prop__col two"><?=$arResult[PROPERTIES][sechenie][VALUE];?></div>
        </div>
        <?}?>

        <?if($arResult[PROPERTIES][typesechenie][VALUE]){?>
        <div class="catalogDetailInfo-prop__item">
            <div class="catalogDetailInfo-prop__col one">Тип сечения</div>
            <div class="catalogDetailInfo-prop__col two"><?=$arResult[PROPERTIES][typesechenie][VALUE];?></div>
        </div>
        <?}?>

        <?if($arResult[PROPERTIES][kreplenie][VALUE]){?>
        <div class="catalogDetailInfo-prop__item">
            <div class="catalogDetailInfo-prop__col one">Тип крепления</div>
            <div class="catalogDetailInfo-prop__col two"><?=$arResult[PROPERTIES][kreplenie][VALUE];?></div>
        </div>
        <?}?>

        <?if($arResult[PROPERTIES][edizmereniy][VALUE]){?>
        <div class="catalogDetailInfo-prop__item">
            <div class="catalogDetailInfo-prop__col one">Единицы измерения</div>
            <div class="catalogDetailInfo-prop__col two"><?=$arResult[PROPERTIES][edizmereniy][VALUE];?></div>
        </div>
        <?}?>




    </div>










    <h2 class="catalogDetailInfo-prop__title">Другие варианты товара :</h2>








    <div class="variantgood">


        <?
			
			
			
			
			//Задача за минимальные ресурсы, найти все элементы связанные с этим товаром Поиск 2-го уровня
			
			/*
			
			Алгоритм 
			
			1 Выводим все элементы связанные с данным товаром через поле [torgoffer] 1,2,3,4..
			
			2 Выводим элементы в котором в качестве связи указан id нашего товара "PROPERTY_torgoffer" => $arResult[ID]
			
			3 Выводим элементы которые связанны с данным товаром через поле [torgoffer] 1,2,3,4..
			
			Все элементы вносим в массив, исключая дубликаты
			
			*/
			
			
			
			//Сбор всех цветов
			$result = $hlDataClass::getList(array(
            "select" => array("ID", "UF_NAME", "UF_XML_ID", "UF_FILE"), // Поля для выборки
            "order" => array("UF_SORT" => "ASC")
			));
			
			$generalcolors1 = [];
			
			//Переносим в массив цветов
			while ($res1 = $result->fetch()) {
				$generalcolors1[$res1[UF_XML_ID]] = $res1[UF_NAME];
			}
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			$torgoggerid = [];
			
			
			
			$arFilter3_linksnew11 = Array("IBLOCK_ID"=>6,
										"PROPERTY_torgoffer" => $arResult[ID],
										"ACTIVE"=>"Y");
			$res3_linksnew11 = CIBlockElement::GetList(Array(), $arFilter3_linksnew11, false, false);
			while($ob3_linksnew11 = $res3_linksnew11->GetNextElement()){
				$arFields11 = $ob3_linksnew11->GetFields();  
				$props11 = $ob3_linksnew11->GetProperties();
				
				//Вывод всех указателей на этот элемент
				array_push($torgoggerid,$arFields11[ID]);
				
				//Вывод всех указателей у выбранных указателей
				foreach($props11[torgoffer][VALUE] as $itemoffer){
					array_push($torgoggerid,$itemoffer);
				}
				
				
				
				//echo $arFields11[NAME]."<br>";
				
				
			}
			
			//Вывод всех указателей у этого элемента
			foreach($arResult[PROPERTIES][torgoffer][VALUE] as $itemoffer){
				array_push($torgoggerid,$itemoffer);
				
			}
			
			
			
			$result = array_unique($torgoggerid);
			
			$arFilter3_linksnew = Array("IBLOCK_ID"=>6,
										"ID"=>$result,
										"ACTIVE"=>"Y");
			
			
			$res3_linksnew = CIBlockElement::GetList(Array(), $arFilter3_linksnew, false, false);
			
			
			
			
			while($ob3_linksnew = $res3_linksnew->GetNextElement()){
				
				$arFields = $ob3_linksnew->GetFields();  
				$props = $ob3_linksnew->GetProperties(); 
				
				
				$PRODUCT_ID = $arFields['ID'];
				
				$price = CCatalogProduct::GetOptimalPrice($PRODUCT_ID, 1, $USER->GetUserGroupArray(), 'N');

				$oldprice1 = $price[PRICE][PRICE];
				
				$cur12 = $price[PRICE][CURRENCY];
				
				$price = $price['RESULT_PRICE']['DISCOUNT_PRICE'];
				
				
				
				
				
				
				
				
					//Параметры
					
					$par11 = "";
					
					if($props[height][VALUE]){
						$par11 .= " <span class='para'>в. </span>".$props[height][VALUE];
					}
					if($props[size][VALUE]){
						if($par11)$par11.=" * ";
						$par11 .= "<span class='para'> д. </span>".$props[size][VALUE];
					}
					if($props[width][VALUE]){
						if($par11)$par11.=" * ";
						$par11 .= "<span class='para'> ш. </span>".$props[width][VALUE];
					}
					if($props[deep][VALUE]){
						if($par11)$par11.=" * ";
						$par11 .= "<span class='para'> г. </span>".$props[deep][VALUE];
					}
					if($props[diametr][VALUE]){
						if($par11)$par11.=" * ";
						$par11 .= "<span class='para'> D </span>".$props[diametr][VALUE];
					}
					if($props[sechenie][VALUE]){
						if($par11)$par11.=" * ";
						$par11 .= "<span class='para'> сеч. </span>".$props[sechenie][VALUE];
					}
					
					
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				$linknew = str_replace("SITE_DIR#/catalog/", "/katalog-tovarov-3/", $arFields[DETAIL_PAGE_URL])."/";
				
				
														
				$PRICE_TYPE_ID = 1;

				$rsPrices = CPrice::GetList(array(), array('PRODUCT_ID' => $arFields['ID'], 'CATALOG_GROUP_ID' => $PRICE_TYPE_ID));
				if ($arPrice = $rsPrices->Fetch())
				{
					
				
					
					
				
				if($arFields[NAME] == $arResult[NAME]){
					
					//Формируем цвет
					$allcolors = "";
					foreach($props[color][VALUE] as $imgcol1){
						$allcolors .= $generalcolors1[$imgcol1].", ";
					}
					if($props[color][VALUE][0])
					$allcolors  = mb_substr($allcolors, 0, -2);
				
				
				
				echo "<a href='$linknew'>
				<div class='mibilistvar'><span style='font-weight:600;'>
				$arFields[NAME]</span>, в цветах: $allcolors, С размерами: $par11 мм.".
					"<br> Цена: <span class='".(($oldprice1>$price)?"disc22":"")."'>".CurrencyFormat($price, $arPrice["CURRENCY"])."</span>".
					(($oldprice1>$price)?"<span class='".(($oldprice1>$price)?"disc1":"")."'>".CurrencyFormat($oldprice1,$cur12)."</span>":"").
				
				
				"</div></a>";
				
							
						
				}
				else{
					//Формируем цвет
					$allcolors = "";
					foreach($props[color][VALUE] as $imgcol1){
						$allcolors .= $generalcolors1[$imgcol1].", ";
					}
					if($props[color][VALUE][0])
					$allcolors  = mb_substr($allcolors, 0, -2);
					
					echo "<a href='$linknew'>
						<div class='mibilistvar'>
							<span style='font-weight:600;'>
							$arFields[NAME]</span>, в цветах: $allcolors, С размерами: $par11 мм.".
							"<br> Цена: <span class='".(($oldprice1>$price)?"disc22":"")."'>".CurrencyFormat($price, $arPrice["CURRENCY"])."</span>".
							(($oldprice1>$price)?"<span class='".(($oldprice1>$price)?"disc1":"")."'>".CurrencyFormat($oldprice1,$cur12)."</span>":"").
						"</div>
					</a>";
				}
				
				
					
				}
				
				 
			}
			
			
			
			
			
			
			
			?>

    </div>



    <style>
    .mibilistvar {
        padding: 10px 0 10px 0;
        border-bottom: 1px solid #d7d7d7;

    }
    </style>



    <? if($arResult["~DETAIL_TEXT"]){?>
    <h2 class="catalogDetailInfo-prop__title">Описание</h2>

    <div class="descript11">
        <?=$arResult["~DETAIL_TEXT"];?>
    </div>

    <? } ?>
















</div>

<style>
.qqqq99 {
    position: relative;
}

.ggghhh {
    height: 200px;
    position: absolute;
    width: 100%;
    z-index: 200;
    overflow: scroll;

}

.ggghhh1 {

    width: 200%;
    height: 40px;
    left: 50%;
}
</style>


<style>
.mobi {
    display: none;

}


@media(max-width:1270px) {


    .catalogDetailInfo__preview,
    .catalogDetailInfo-prop__title,
    .catalogDetailInfo-prop__items {
        width: 100%;
        padding: 10px 20px 20px 20px;
    }



    .variantgood {
        width: 100%;
        padding: 0px 20px 20px 20px;

    }

    .variantgood div {
        margin-bottom: 20px;

    }

    .descript11 {
        width: 100%;
        padding: 0px 20px 20px 20px;
        font-style: normal;
        line-height: 25px;
        color: #2f2f2f;

    }




    .mobi {
        display: block;

    }

    .deskver {
        display: none;

    }
}
</style>




<style>
<? //Заголовок?>

.namegood {
    margin: 20px 20px 20px 20px;
    font-style: normal;
    font-weight: 600;
    font-size: 18px;
    line-height: 25px;
    color: #2f2f2f;

}


.hits {
    margin: auto;

}

.article {
    margin: 20px 20px 20px 20px;
    font-size: 15px;
    line-height: 20px;
    color: #2f2f2f;

}
</style>









































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
		//"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
		"SECTION_ID" => $arResult[SECTION][ID],
		
		
		"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
		
		
		
		
	),
	$component
);
?>


















<?

global $arrFilter;
$arrFilter = Array( 
"SECTION_ID" => $arResult["SECTION"]["ID"],
);

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
		"FILTER_NAME" => "arrFilter",
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
		"SECTION_ID" => $arResult["SECTION"]["ID"],
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
		"FILTER_NAME" => "arrFilter",
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
		"SECTION_ID" => $arResult[SECTION][ID],
		"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],


	)
);?>


</div>






<script>
var spacebtn = true;
var fixx = true;
var uuu = 0;
var i = 0;
var countelem = 0;

$(function() {

    $(".btright").click(function() {

        if (spacebtn) {
            var valwidth = $(this).siblings(".gallerypv").find(".elem11").width() + 4;
            var uuu = $(this).siblings(".gallerypv").find(".scroll").scrollLeft();
            $(tt).css("overflow", "hidden");

            $(this).siblings(".gallerypv").find(".scroll").animate({
                scrollLeft: (uuu + valwidth),
            }, 300, function() {


                fixx = true;
                uuu = uuu + valwidth;
            });



            spacebtn = false;
            setTimeout(function() {
                spacebtn = true;
            }, 300);
            $(tt).css("overflow", "scroll");


            if (($(this).siblings(".gallerypv").find(".elem11").length * valwidth) - (($(this).siblings(
                    ".gallerypv").find(".elem11").width() + 55) * 2) < uuu) {
                $(this).css("opacity", "0.3");
            }

            $(this).parents('.gallerypvcontent').find(".arrowleftpv").css("opacity", "1");
            $(this).parents('.gallerypvcontent').find(".btleft").css("opacity", "1");

        }


    });




    $(".btleft").click(function() {

        if (spacebtn) {
            var valwidth = $(this).siblings(".gallerypv").find(".elem11").width() + 4;
            var uuu = $(this).siblings(".gallerypv").find(".scroll").scrollLeft();
            $(tt).css("overflow", "hidden");
            $(this).siblings(".gallerypv").find(".scroll").animate({
                scrollLeft: (uuu - valwidth),
            }, 300, function() {


                fixx = true;
                uuu = uuu - valwidth;
            });



            spacebtn = false;
            setTimeout(function() {
                spacebtn = true;
            }, 300);
            $(tt).css("overflow", "scroll");


            $(this).parents('.gallerypvcontent').find(".btright").css("opacity", "1");



            if (valwidth + 100 > uuu) {
                $(this).css("opacity", "0.3");
            }



        }


    });


    $('.ggghhh').scrollLeft(50);

    $('.ggghhh').scroll(function() {

        if ($(this).scrollLeft() > (90)) {
            if (fixx) {
                fixx = false;
                var tt = this;
                $(tt).scrollLeft(50);
                $(tt).css("overflow", "hidden");

                var valwidth = $(this).siblings(".scroll").find(".elem11").width() + 4;
                var uuu = $(this).siblings(".scroll").scrollLeft();

                $(this).siblings(".scroll").animate({
                    scrollLeft: (uuu + valwidth),
                }, 300, function() {


                    $(tt).scrollLeft(50);
                    uuu = uuu + valwidth;
                    fixx = true;
                });

                $(tt).css("overflow", "scroll");





                if (($(this).parents(".gallerypv").find(".elem11").length * valwidth) - (valwidth * 2 +
                        50) < uuu) {
                    $(this).parents(".gallerypv").siblings(".btright").css("opacity", "0.3");
                }

                $(this).parents('.gallerypvcontent').find(".btleft").css("opacity", "1");




            }
        }


        if ($(this).scrollLeft() < (10)) {
            if (fixx) {
                fixx = false;
                var tt = this;
                $(tt).css("overflow", "hidden");
                var valwidth = $(this).siblings(".scroll").find(".elem11").width() + 4;
                var uuu = $(this).siblings(".scroll").scrollLeft();
                $(this).siblings(".scroll").animate({
                    scrollLeft: (uuu - valwidth),
                }, 300, function() {



                    $(tt).scrollLeft(50);
                    uuu = uuu - valwidth;
                    fixx = true;
                });
                $(tt).css("overflow", "scroll");




                if (valwidth + 100 > uuu) {
                    $(this).parents(".gallerypv").siblings(".btleft").css("opacity", "0.3");
                }

                $(this).parents('.gallerypvcontent').find(".btright").css("opacity", "1");


            }
        }


    });





    $(".btleft").click(function() {

        if (spacebtn) {

            //Определяем максимальное значение перемещения
            var cou = $(this).siblings(".gallerypv").find(".elem11").length * $(this).siblings(
                ".gallerypv").find(".elem11").width() * (-1);

            //Определение текущего положения
            var info = $(this).siblings(".gallerypv").find(".scroll_child").css('transform');
            var str = info.slice(info.indexOf(",") + 1, info.length);
            str = str.slice(str.indexOf(",") + 1, str.length);
            str = str.slice(str.indexOf(",") + 1, str.length);
            str = str.slice(str.indexOf(",") + 1, str.length);
            str = str.slice(1, str.indexOf(","));
            var posit = parseInt(str);
            if (!posit) {
                posit = 0;
            }


            posit = posit + $(this).siblings(".gallerypv").find(".elem11").width() + 4;

            if (posit < 1) {
                $(this).siblings(".gallerypv").find(".scroll_child").css("transform", "translateX(" +
                    posit + "px)");
            } else {
                $(this).siblings(".gallerypv").find(".scroll_child").css("transform",
                    "translateX(0px)");
            }

            spacebtn = false;

            setTimeout(function() {
                spacebtn = true;
            }, 500);

        }

    });

    $(".btright1").click(function() {



        if (spacebtn) {
            var tt = this;
            var valwidth = $(this).siblings(".scroll").find(".elem").width();
            var uuu = $(this).siblings(".scroll").scrollLeft();
            $(tt).css("overflow", "hidden");

            $(this).siblings(".scroll").animate({
                scrollLeft: (uuu + valwidth),
            }, 300, function() {


                fixx = true;
                uuu = uuu + valwidth;
            });
            spacebtn = false;
            setTimeout(function() {
                spacebtn = true;
            }, 300);
            $(tt).css("overflow", "scroll");




            if ((($(this).siblings(".scroll").find(".elem").length * valwidth) - valwidth) < (uuu + $(
                    this).siblings(".scroll").width() + 100)) {
                $(this).css("opacity", "0.3");
            }



            $(this).parents('.qqqq1').find(".btleft1").css("opacity", "1");


        }

    });



    $(".btleft1").css("opacity", "0.3");


    $(".btleft1").click(function() {



        if (spacebtn) {
            var tt = this;
            var valwidth = $(this).siblings(".scroll").find(".elem").width();
            var uuu = $(this).siblings(".scroll").scrollLeft();
            $(tt).css("overflow", "hidden");

            $(this).siblings(".scroll").animate({
                scrollLeft: (uuu - valwidth),
            }, 300, function() {


                fixx = true;
                uuu = uuu - valwidth;
            });



            spacebtn = false;
            setTimeout(function() {
                spacebtn = true;
            }, 300);
            $(tt).css("overflow", "scroll");


            if (valwidth > uuu) {
                $(this).css("opacity", "0.3");
            }


            $(this).parents('.qqqq1').find(".btright1").css("opacity", "1");

        }





    });
    $(".sectionCatalogFilter__row.two").click(function() {

        $(".filt1").toggleClass('visable1 unvisable1');


    });





});
</script>












<style>
.titlegoods {
    margin-top: 25px;

}





.sectionCatalogList-sort {
    display: none;

}




@media (min-width: 600px) {
    .sectionCatalogList-items-prop {
        min-height: 102px;

    }

    .sectionCatalogList-items-price {
        min-height: 38px;

    }

}








.catalog-section-list-item-link {
    color: #2f2f2f;
    font-family: 'Open Sans' !important;

}



.sectionCatalogMenu__link {
    font-family: 'Open Sans';

}


.sectionCatalogMenuSub__link {
    font-family: 'Open Sans' !important;
    text-decoration: dashed !important;
    font-size: 13px !important;
}









.sectionCatalogNav__item {
    margin-right: 0px !important;
    padding-right: 0px !important;

}

.sectionCatalogNav__item,
.sectionCatalogNav__link {
    margin-right: 0px !important;
    padding-right: 2px !important;
    margin-left: 2px;
    padding-left: 0px !important;

}

.sectionCatalogNav__item a {
    margin-right: 0px !important;
    padding-right: 2px !important;
    margin-left: 2px;
    padding-left: 0px !important;

}


.sectionCatalogNav__items li {
    display: unset !important;
    max-width: unset !important;

}




.sectionCatalogFilter__row.one.sort1 {
    display: none;

}





.fastreview {
    height: 40px;
    display: block;
    vertical-align: middle;
    padding-top: 10px !important;

}





.itemtextpv a,
.catalog-section-list-item-title a {
    text-decoration: blink !important;
}



@media (max-width: 1270px) {
    .qqqq {
        position: relative !important;

    }

    .elem11 {
        display: inline-block !important
    }

    .container .page-index__title {
        width: 100%;
        padding: 0 20px 0 20px;

    }

    .container .defaulttext {
        width: 100%;
        padding: 0 20px 0 20px;

    }

}









.catalog-section-list-item-inner {
    font-style: normal !important;
    font-weight: 300 !important;
    font-size: 15px !important;
    line-height: 20px !important;
    color: #2f2f2f !important;
    text-decoration: none !important;

}


.catalog-section-list-item-inner:hover {
    font-weight: 600;

}


.catalogDetailProdukts-slider-mini-prop.catalogSectionPropHeight {
    min-height: 18px;

}




.hits a {
    color: #2f2f2f;

}







/*

.pricepv{
	display: table;
    vertical-align: middle;
    text-align: right;
    min-height: 39px;
    float: right;
}

.newprice{
	display: table-cell;
    color: #000000;
    text-align: right;
    vertical-align: middle;
    margin: auto auto;
}

*/

.fastreview {
    font-size: 13px;

}


.sectionCatalogList-items__item {
    height: auto !important;

}





.sectionCatalogList-items-prev {
    width: 130%;
}

/*
.sectionCatalogList-items-prev{
				display: block !important;
			}
*/







/* Для мобильной версии каталог*/


@media(max-width:1270px) {


    /*
		.sectionCatalogFilter__row.one{
			display: none !important;
		}
		*/

    .sectionCatalogFilter-info {
        display: block !important;
    }




    .pvico1 {
        width: 20px;
        display: inline-block;
        top: 3px;
    }

    .pvico2 {
        display: inline-block;

    }

    .sectionCatalogFilter-info__col.three {}

    .sectionCatalogFilter-info__col.one {
        margin-bottom: 1.6rem;
    }



    .sectionCatalogNav {
        margin-bottom: 30px;

    }


    .catalogDetailProdukts__title {
        margin-bottom: 40px;
    }



    .catalogDetailProdukts-slider__btn-left.slick-arrow {
        left: -25px !important;
        right: unset !important;
    }

    .catalogDetailProdukts-slider__btn-right.slick-arrow {
        right: -25px !important;
        left: unset !important;
    }











}















/* Новая задача при нажатии выделение*/
.pvbtndefault {
    color: #a7a7a7 !important;
}

.pvbtndefault:hover {
    color: #5f5d5d !important;
}

.pvbtnclick {
    color: #5c22bb !important;
}

pvbtn {
    color: #a7a7a7 !important;
}

.header-top__icon:hover {
    color: #5f5d5d !important;
}

.pvkard:hover {
    color: #5f5d5d !important;
}

.header-middle-control__cart.click .header-top__icon {
    color: #a7a7a7 !important;
}

.fa-heart {
    color: #5c22bb !important
}

.visablebtn {
    display: block;
}

.unvisablebtn {
    display: none;
}




.tutu {
    display: none !important;

}



@media (max-width:1270px) {


    .tutu {
        display: none !important;

    }

    .visable1 {
        display: flex !important;

    }

    .unvisable1 {
        display: none !important;

    }

    .wrapper__col.right {
        margin-left: 0px !important;
        margin-right: 0px !important;
    }

    .sectionCatalogFilter__row.one {
        margin-left: 0px !important;

    }

    .sectionCatalogFilter-selected {
        margin-left: 0px !important;
    }



}



.sectionCatalogFilter-info {
    cursor: pointer;

}




.pvkard {
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



.pvfa2 {
    margin-top: 10px;

}

.qw22 {
    font-size: 20px;
    position: absolute;
    right: -20px;
    color: #5c22bb !important;
}

.qw33 {
    font-size: 20px;
    position: absolute;
    right: -20px;
    color: #5c22bb !important;
    top: 30px;
}








.sectionCatalogFilter__row.one {}



@media(max-width:1270px) {
    .slick-track {
        width: max-content !important;

    }

    .catalogDetailProdukts-slider__item.slick-slide.slick-current.slick-active {
        width: 280px !important;
    }

    .catalogDetailProdukts-slider__item.slick-slide {
        width: 280px !important;

    }
}



.sectionCatalogList-items-prev {
    /*	display: block !important;
					*/
}





.scroll {
    width: 100%;
    overflow-x: scroll;
    overflow-y: hidden;
}

.scroll_child {

    text-align: center;
}

.scroll_child>div {
    display: inline-block;


}

.qqqq {
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

.scroll_child {
    white-space: nowrap;

}



.section_goods {
    width: 136px;
    height: 119px;
    background: #EEEEEE;
    margin: 2px 0;
    padding: 9px;
}

.section_ico {
    width: 53px;
    height: 53px;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    margin: 0px auto 4px auto;
}


.section_title {
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

.elem {
    vertical-align: top;

}



@media (max-width: 1270px) {

    .scroll_child {
        letter-spacing: -4px;
        margin-left: 0px;
    }


    .qqqq {

        padding-left: 0px;

    }


    .elem:nth-child(1) {
        margin-left: 21px;

    }

    .elem {
        letter-spacing: 0px;
        margin-right: 0px;
    }


    .elem:nth-last-child(1) {
        margin-right: 21px;
    }




}








/* Для десктопной версии */

@media (min-width: 1270px) {













    .section_title {
        max-height: 40px !important;

    }


    .scroll {}

    .scroll_child {

        width: 100%;
    }

    .qqqq {
        width: 1270px;
        margin: auto;
        padding-left: 0px;
    }



    .section_goods {

        width: 100%;
        background: unset;
    }

    .section_ico {

        height: 68px;
        width: 110px;

        background-image: url(/upload/iblock/3e1/3e1767d….png);
    }


    .section_title {
        width: 75%;
        margin: auto auto 0;
        text-align: center;
    }

    .elem {
        width: 20%;
    }


    .qqqq a {


        width: 100%;
        margin-bottom: 50px !important;
        display: flow-root;

    }




    .section_goods:hover .section_ico {
        opacity: 0.6;
        transition: opacity 150ms;
    }

    .section_goods:hover .section_title {
        font-size: 17px;
        transition: opacity 350ms;
    }




}


.scroll {}

.scroll_child {

    width: 100%;
}

.qqqq {
    width: 1270px;
    margin: auto;
    padding-left: 0px;
}



.elem {
    width: 20%;
}


.qqqq a {


    width: 100%;
    margin-bottom: 50px !important;
    display: flow-root;

}









.discountpv {
    float: left;
    border: 1px solid #ff4500;
    font-style: normal;
    font-weight: 400;
    font-size: 9px;
    line-height: 186.2%;
    padding: 2px 8px;
}

.gallerypv {
    /*	background-image: url(/assest/img/slider-2.png);*/
    width: 100%;
    height: 200px;
    background-repeat: no-repeat;
    background-position: center;
    background-size: contain;
}

.gallerypvcontent {
    width: 100%;
    height: 200px;

}


.arrowleftpv,
.arrowrightpv {
    display: inline-block;

}












.statusorder {
    line-height: 18px;
    font-weight: 600 !important;
    color: #5c22bb;
    text-aling: left;
    text-align: left;
    margin: 0px 20px 0px 20px;

}

.elem {
    width: 280px;

}

.itemtextpv {
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


.articlepv {
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


.pricepv {
    text-align: left;
    margin: 0 21px 0 21px;

}


.articlepv {
    justify-content: space-between;
    border-bottom: 1px solid rgba(113, 113, 113, .3);
    font-weight: 300;
    margin-bottom: 18px;
    font-style: normal;
    font-size: 13px;
    line-height: 18px;
    color: #2f2f2f;

}

.newprice {
    font-style: normal;
    font-weight: 600;
    font-size: 15px;
    line-height: 20px;
    color: #ff4500;
    text-align: right;

}

.oldprice {
    font-style: normal;
    font-weight: 300;
    font-size: 12px;
    line-height: 16px;
    text-decoration-line: line-through;
    color: #616161;
    text-align: right;
}

.itemtextpv {}



.fastreview {
    opacity: 0;
}


.itempv {
    border: solid 1px white;

}

.pricepv {
    margin-bottom: 20px;

}

.fastreview {
    border: solid 1px #b8b8b8;
    border-left: 0px;
    border-right: 0px;
    margin-bottom: 4px;
    padding: 5px;

}





/*При наведении */

.elem:hover .itempv {
    border: solid 1px #b8b8b8;

}

.elem:hover .fastreview {
    opacity: 1;

}

.tabcellpv {
    display: table-cell;
    vertical-align: middle;

}


.gallerypvcontent {
    display: table;
}


.elem11 {
    width: 216px;
    height: 200px;
    background-image: url(/assest/img/slider-2.png);
    width: 100%;
    height: 200px;
    background-repeat: no-repeat;
    background-position: center;
    background-size: contain;
}


.scroll_child {
    transition: transform 0.5s ease, 0.5s ease, filter 0.5s;
}


.elem11 {
    margin: 0 2px 0 2px;

}


.gallerypv .qqqq {
    width: unset;

}




.arrowrightpv,
.arrowleftpv {
    opacity: 0;

}


.elem:hover .arrowrightpv,
.elem:hover .arrowleftpv {
    opacity: 1;

}


@media(min-width:1270px) {

    .sort1 {
        display: none !important;

    }
}



@media(max-width:1270px) {

    /*
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
		
		*/



}




.qqqq1 {
    display: flex;

}

.tabcellpv1 {
    vertical-align: middle;
    margin: auto;
}


.innercont {
    display: inline-block;
    width: calc(100% - 62px);


}


.elem {
    width: calc(((100% - 21px) / 5));
}


@media(max-width:1200px) {
    .elem {
        width: calc(((100% - 21px) / 3));
    }
}


@media(max-width:850px) {
    .elem {
        width: calc(((100% - 21px) / 2));
    }
}

@media(max-width:540px) {
    .elem {
        width: 100%;
        margin-left: 0px !important;
    }
}


.titlepvtovar {
    margin: 0 20px 40px 20px;

}

@media (max-width: 906px) and (min-width: 620px) {
    .sectionCatalogList-items__item:last-child {
        float: right;
    }

}


.titlegoods {
    width: 100%;
    max-width: 1270px;
    margin: auto;
    margin-top: 50px;

}



.wrapper {
    height: unset;

}





/* ==============================*/
/* Для быстрого просмотра */



@media (max-height: 900px) {
    .Pvstyle .fastSeeProduct-hero__wrap {
        height: 90%;

    }

    .Pvstyle .descriptionpv {
        height: 100%;
        overflow-y: auto;
    }

    .Pvstyle .catalogDetail-hero {
        height: 100%;
    }
}

.Pvstyle .fastSeeProduct-control {
    justify-content: left !important;
}





/* Стили для скрола */
::-webkit-scrollbar-button {
    background-image: url('');
    background-repeat: no-repeat;
    width: 5px;
    height: 0px
}

::-webkit-scrollbar-track {
    background-color: #ecedee00;
}

::-webkit-scrollbar-thumb {
    -webkit-border-radius: 0px;
    border-radius: 9px;
    background-color: #5c22bb;
}

::-webkit-scrollbar-thumb:hover {
    background-color: #c4c4c4;
}

::-webkit-resizer {
    background-image: url('');
    background-repeat: no-repeat;
    width: 4px;
    height: 0px
}

::-webkit-scrollbar {
    width: 8px;
}

/* Стили для скрола */
.Pvstyle ::-webkit-scrollbar-button {
    background-image: url('');
    background-repeat: no-repeat;
    width: 5px;
    height: 0px
}

.Pvstyle ::-webkit-scrollbar-track {
    background-color: #ecedee00;
}

.Pvstyle ::-webkit-scrollbar-thumb {
    -webkit-border-radius: 0px;
    border-radius: 9px;
    background-color: #9d9d9d;
}

.Pvstyle ::-webkit-scrollbar-thumb:hover {
    background-color: #c4c4c4;
}

.Pvstyle ::-webkit-resizer {
    background-image: url('');
    background-repeat: no-repeat;
    width: 4px;
    height: 0px
}

.Pvstyle ::-webkit-scrollbar {
    width: 8px;
}



.sectionCatalogList-items__name {
    height: 58px;
    overflow: hidden;
}



@media (max-width: 1270px) {



    .wrapper__col.left {
        display: none !important;
    }


    .wrapper__col.right {
        margin: 21px 0 21px 0 !important;
        width: 100%;

    }

    .wrapper__hero {
        margin-left: 0px;

    }

    /*
			.sectionCatalogList-items-prev{
				display: none !important;
				
			}
			*/
    .sectionCatalogList-items__item {
        width: 214px !important;
    }




    .pvdiv .sectionCatalogList-items__item {

        display: inline-block;
    }

    .pvdiv .sectionCatalogList-items {
        text-align: justify;
        margin: 0 21px 0 21px;
        text-align-last: justify;

    }

    .pvdiv .sectionCatalogList-items {
        display: block;

    }


    .sectionCatalogList-items__item {
        text-align-last: auto;

    }






}




@media (max-width: 1270px) {

    .pvdiv .sectionCatalogList-items {
        margin-left: calc(25% - 202px);
        margin-right: calc(25% - 202px);
    }

    /*
			.pvdiv .sectionCatalogList-items__item {
				margin-left: unset;
				margin-top: 50px;
			}
			*/

}




@media (max-width: 906px) {

    .pvdiv .sectionCatalogList-items {
        margin-left: calc(31% - 170px);
        margin-right: calc(31% - 170px);
    }

    /*
			.pvdiv .sectionCatalogList-items__item {
				margin-left: unset;
				margin-top: 50px;
			}
			*/

}




@media (max-width: 620px) {

    .pvdiv .sectionCatalogList-items__item {
        margin: auto;
        display: block;
        margin-top: 50px;
    }



    .pvdiv .sectionCatalogFilter-selected {
        display: block;
        width: 100%;

    }


    .sectionCatalogList-items {
        margin-left: 0px !important;
        margin-right: 0px !important;
    }


}




.pvdiv {
    margin-left: 23px;
    margin-right: 23px;

}







/*
		
			
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
				
				
				*/


@media (max-width: 870px) {


    .pvdiv .sectionCatalogList-items {
        margin-left: calc(31% - 170px) !important;
        margin-right: calc(31% - 170px) !important;
    }






}


@media (max-width: 840px) and (min-width: 550px) {

    .sectionCatalogList-items__item:nth-last-child(1) {
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





.pvdiv {
    margin-left: 0px !important;
    margin-right: 0px !important;

}




.breadcrumbs,
.sectionCatalogFilter,
.comman_h1,
.sectionCatalogList-sort {
    margin-left: 21px !important;
    margin-right: 21px !important;



}



@media (max-width: 790px) {

    .sectionCatalogList-items__item {
        vertical-align: top;


    }

    .sectionCatalogList-items-price {
        min-height: 40px;
    }

    .sectionCatalogList-items-control__buy {
        height: 40px !important;
        width: 150px !important;
    }

}



}


.lnr-chevron-left,
.lnr-chevron-right {
    cursor: pointer;
}




.lnr-chevron-left {
    cursor: pointer;
}

.arrowrightpv1 {
    cursor: pointer;
}



.arrowleftpv {
    cursor: pointer;
}

.arrowrightpv {
    cursor: pointer;
}



.elem11:before {
    content: "";
    display: block;
    padding-top: 100%;

}

.elem11 {
    height: unset !important;
}

.statusorder {
    margin-bottom: 12px;
}



::-webkit-scrollbar {
    border-radius: 0px;
    /* width: 0px !important;*/
    height: 0px !important;

}


.tabcellpv:before {
    content: "";
    display: block;
    padding-top: 0px;
    padding-bottom: 0px;
}

.gallerypv,
.gallerypvcontent {
    height: unset !important;
}
</style>





<style>
.img_kard {
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center center;
    height: unset !important;
}




.img_kard:before {
    content: "";
    display: block;
    padding-top: 100%;

}


.product-item-amount-field-btn-minus,
.product-item-amount-field-btn-plus {
    font-family: sans-serif;
    font-size: 100%;
    line-height: 1.15;
    margin: 0;
    color: black;
}


.product-item-amount-field-btn-minus:after,
.product-item-amount-field-btn-plus:after {
    background: unset !important;
    background-size: unset !important;
    color: black !important;

}

.product-item-amount-description-container {
    text-align: center;
}


.product-item-amount-field {
    max-width: 20px;

}

.sectionCatalogList-items-control__col.two {
    text-align: right;

}


.product-item-image-slider-slide-container.slide {
    /*	display: none;
		*/
}


.sectionCatalogList-items-prev {

    top: 5px;
    left: -5px;
    bottom: 5px;
    /*display: flex !important; */

    /*display: none !important; */
}


.sectionCatalogList-items-prev-slider__pic {
    width: 100%;
    /*	    height: 308px;*/
}



.sectionCatalogList-items-prev {
    /*	display: none !important; */
}

.product-item-image-slider-slide-container.slide {
    display: none !important;
}






.sectionCatalogList-items__item {}








.pvdiv .sectionCatalogList-items {
    margin-left: 23px;
    margin-right: 23px;
    margin: auto !important;
    text-align-last: left;
}



@media (max-width: 1270px) {

    @media (min-width: 320px) {
        .pvdiv .sectionCatalogList-items {
            width: 260px;
        }
    }

    @media (min-width: 570px) {
        .pvdiv .sectionCatalogList-items {
            width: 510px;
        }
    }

    @media (min-width: 880px) {
        .pvdiv .sectionCatalogList-items {
            width: 760px;
        }
    }

    @media (min-width: 1070px) {
        .pvdiv .sectionCatalogList-items {
            width: 1010px;
        }
    }

}


.scroll_child {
    text-align: left;
}

.elem {
    width: 214px !important;
}





@media (min-width: 320px) {
    .scroll.innercont {
        width: 215px;
    }
}

@media (min-width: 535px) {
    .scroll.innercont {
        width: 430px;
    }
}

@media (min-width: 750px) {
    .scroll.innercont {
        width: 645px;
    }
}

@media (min-width: 965px) {
    .scroll.innercont {
        width: 860px;
    }
}

@media (min-width: 1180px) {
    .scroll.innercont {
        width: 1075px;
    }
}




.itemtextpv a {
    font-weight: normal;
    font-size: 13px;
    line-height: 18px;

}






.hits .scroll_child {
    letter-spacing: -2.5px;
}

.hits .scroll_child .elem {
    letter-spacing: normal;
}


.qqqq1 .scroll_child {
    letter-spacing: -2.5px;
}

.qqqq1 .scroll_child .elem {
    letter-spacing: normal;
}





/*Тест адаптива*/

.othersizecolor {
    display: none;
    float: left;
    text-align: left;

}







@media (min-width: 330px) and (max-width: 500px) {
    .sectionCatalogList-items__item {
        width: 274px !important;
    }


    .sectionCatalogList-items__item {
        width: 300px !important;
    }

    .img_kard:before {
        content: "";
        display: block;
        padding-top: 70%;
    }

    .pvdiv .sectionCatalogList-items {
        width: 100%;
    }

}



@media (max-width: 330px) {
    .sectionCatalogList-items__item {
        width: 100% !important;
    }
}








@media (max-width: 350px) {
    .haract {
        display: none;

    }
}



@media (max-width: 1270px) {
    .sectionCatalogList-items-control__buy.black {
        width: 100% !important;
        background-color: #ffffff;
        color: black;
    }


    .sectionCatalogList-items-control__col.two {
        width: 100% !important;

    }

    .sectionCatalogList-items-prev.info {
        display: none !important;
    }


    .othersizecolor {
        display: inline-block;

    }


    .sectionCatalogList-items__item:hover .sectionCatalogList-items-prev {
        display: none !important;
    }

}


@media (max-width: 1270px) {

    .btleft,
    .btright {
        display: table-cell;
    }




}




@media (min-width: 1270px) {

    .mobiver {
        display: none;

    }

    .pcver {
        display: block;

    }


}


@media (max-width: 1270px) {

    .mobiver {
        display: block;

    }

    .pcver {
        display: none;

    }


}




.catalog-section-list-item-title {
    text-align: left;
    color: #414141;

}



@media (max-width: 720px) {

    .catalog-section-list-tile-list li:nth-last-child(1) .catalog-section-list-tile-img-container,
    .catalog-section-list-tile-list li:nth-last-child(1) .catalog-section-list-item-inner {
        border-bottom: 1px solid rgba(97, 97, 97, 0.2);
    }




    .col li {
        display: table;
        max-width: 100%;
        width: 100%;
        flex: unset;
        vertical-align: middle;

    }

    .col .catalog-section-list-tile-img-container {
        border-top: 1px solid rgba(97, 97, 97, 0.2);
        width: 15%;
        display: table-cell;
        vertical-align: middle;

    }

    .col .catalog-section-list-item-inner {
        width: 55%;
        display: table-cell;
        vertical-align: middle;
        padding-left: 26px;
        padding-right: 16px;
        border-top: 1px solid rgba(97, 97, 97, 0.2);

    }

    .catalog-section-list-item-title a {
        font-family: Open Sans;
        font-style: normal;
        font-weight: 300;
        font-size: 14px;
        line-height: 19px;
        color: #2F2F2F;

    }


    .catalog-section-list-tile-list li:nth-last-child(1) .catalog-section-list-tile-img-container {
        border-top: 1px solid rgba(97, 97, 97, 0.2);


    }



}


@media (max-width: 720px) {
    /*
		.hits .elem{
			width: 100% !important;	
			
		}
		
		.hits .scroll.innercont{
			width: 100% !important;	
			
		}
	*/


    .scroll.innercont {
        width: 90% !important;
    }

    .scroll.innercont .elem {
        width: 100% !important;
    }




}

















<? //Новая версия карусели с фоном?>

@media (max-width: 1270px) {

    .qqqq1 {
        background: #efefef;
        padding: 25px 0 25px 0;

    }

    .scroll.innercont {
        background: #efefef;
        font-size: 50px !important;
        width: 100% !important;
    }


    .scroll.innercont>.scroll_child {
        background: #efefef;
        font-size: 50px !important;

    }

    .scroll.innercont>.scroll_child>.elem {
        background: #ffffff;
        width: 70% !important;
    }



    .scroll.innercont>.scroll_child>.elem:nth-child(1) {
        margin-left: 20px !important;
    }

    .qqqq1>.btleft1,
    .qqqq1>.btright1 {
        display: none !important;

    }

    .fastreview {
        display: none !important;

    }

    .itempv {
        border: solid 1px white !important;
    }

    .oldprice {
        min-height: 18px;

    }



    .scroll_child .elem11:not(:first-child):not(.mobivers) {
        display: none !important;
    }



    .catalogDetailInfo-buy {
        margin: 0 20px 0 20px;
        align-items: center;
        justify-content: space-between;
    }

    .catalogDetailInfo-buy__col.one {
        margin-left: 0px;

    }

    .sectionCatalogList-items-prev-control {
        margin-bottom: unset;

    }

    .catalogDetailInfo-buy__price {
        line-height: normal !important;
        margin-bottom: 0px !important;
    }

    .sectionCatalogList-items-prev-control__col.two {
        margin: 0 20px 40px 20px;

    }

    .buy-but1 {
        width: 100%;

    }

    .buy-but1 {
        border: 1px solid #2F2F2F;
        line-height: normal;
        font-size: 13px !important;
        padding: 12px;
        height: unset !important;
    }

    .catalogDetailInfo-buy__price-old {
        line-height: normal;
        margin-bottom: 2px;
    }

    .catalogDetailInfo-buy {
        margin-bottom: 15px !important;

    }


}

<? //=====================================?>
</style>



<?//Обновление крипта при загрузки ajax?>
<script>
"use strict";
pageIndexCatalogHeightItem();
toggleTitle();
catalogDetailPhoto();
</script>










<?//Скрипт для кнопки купить?>


<div class="info1" style="display:none;" data-item-id="<?=$arResult[ID];?>"
    data-item-img="<?=CFile::GetPath($arResult[PROPERTIES][Gallery][VALUE][0]);?>"
    data-item-name="<?=$arResult[NAME];?>" data-item-article="<?=$arResult[PROPERTIES][Article][VALUE];?>"
    data-item-price="<?=$arResult[ITEM_PRICES][0][UNROUND_PRICE];?>">











    <script>
    < ? echo "var str = '".$arResult["~ADD_URL_TEMPLATE"].
    "';"; ? >





    $(".sectionCatalogList-items-count__btn.minus").click(function() {

        var znachenie = $(this).parents(".sectionCatalogList-items__item").find(".product-item-amount-field")
            .val();

        //alert(znachenie);

        if (znachenie > 1) {


            $(this).parents(".sectionCatalogList-items__item").find(
                ".sectionCatalogList-items-count__input-text").val(znachenie);

            $(this).parents(".sectionCatalogList-items__item").find(".product-item-amount-field-btn-minus")
                .trigger('click');

        }

    });



    $(".sectionCatalogList-items-count__btn.plus").click(function() {

        var znachenie = $(this).parents(".sectionCatalogList-items__item").find(
            ".sectionCatalogList-items-count__input-text").val();




        $(this).parents(".sectionCatalogList-items__item").find(".sectionCatalogList-items-count__input-text")
            .val(znachenie);

        $(this).parents(".sectionCatalogList-items__item").find(".product-item-amount-field-btn-plus").trigger(
            'click');



    });













    $(".buy-but1").click(function() {



        var qq = $(this).attr('data-value');
        var qount = $(".sectionCatalogList-items-count__input-text").val();


        // Определение Параметров добавленного товара

        var id = $(".info1").attr('data-item-id');

        name = $(".info1").attr('data-item-name');
        article = $(".info1").attr('data-item-article');
        price = $(".info1").attr('data-item-price');
        imggg = $(".info1").attr('data-item-img');



        //	alert($(".basket_header__items").find(".basket_header__item"));

        /*	if($(".basket_header").is(".basket_header__item")){
        		alert("test");
        	}
        	*/
        if ($('.basket_header__item').is('#id' + id)) {
            //Есть товар в корзине

            //var currentcount = $(".basket_header__items").find('#'+id).find('.basket_header__count').html();

            //Количество товаров
            var currentcount = $(".basket_header__items").find('#id' + id).attr('data-item-quantity');

            allcount = Number.parseInt(currentcount) + Number.parseInt(qount);

            allprice = allcount * price;



            //	alert(allcount);
            //	alert(allprice);
            //$(".basket_header__items").find('#'+id).find('basket_header__count').html("тест");


            $(".basket_header__items").find('#id' + id).find('.basket_header__count').html("" + allcount +
                " шт");
            $(".basket_header__items").find('#id' + id).find('.basket_header-price__summ').html("" + allprice
                .toLocaleString() + " руб.");











        } else {
            //Нет товар в корзине




            var sumprice = Number.parseInt(qount) * Number.parseInt(price);
            //alert(sumprice);

            var add = "<div class='basket_header__item' id=id" + id + " data-item-quantity=" + qount +
                " data-item-id=" + id +
                ">            <div class='basket_header__col one'><a class='basket_header__pic' href='#'>						<div class='basket_header__img imgcart22' style='background-image: url(" +
                imggg +
                ");' alt=''></div>						</a></div>            <div class='basket_header__col two'>              <div class='basket_header-hero'><a class='basket_header__name' href='#' style=''>" +
                name + "</a>                <div class='basket_header__art'>" + article +
                "</div>                <div class='basket_header__count'>" + qount +
                " шт</div>              </div>            </div>            <div class='basket_header__col free'><a class='basket_header__delete toggleTitle' href='javascript:void(0);'>                <div class='lnr lnr-trash basket_header__icon  dell1'  data-id=" +
                id +
                "></div></a>              <div class='basket_header-price'>                <div class='basket_header-price__summ'>" +
                sumprice.toLocaleString() + " руб.</div>              </div>            </div>          </div>";




            //alert(add);

            $(".basket_header__items").append(add);







            //alert(add);
        }























        //alert(id);alert(name);alert(article);alert(price);


        const searchRegExp = '#ID#';
        const replaceWith = qq; //483





        const result = str.replace(searchRegExp, replaceWith);



        result; // => 'goose goose go'

        //	alert(result);

        // Добавление товара в корзину
        $.ajax({
            type: "GET",
            url: result + "&quantity=" + qount,
            dataType: "html",
            success: function(out) {

                //alert(out);


                //     alert("готово. Перейти в корзину http://torg.vmoidom.ru/personal/cart/");




                $.ajax({
                    type: "POST",
                    url: "/local/include/cartinfomin.php",

                    cache: false,
                    dataType: "html",
                    success: function(jsondata) {

                        var person = JSON.parse(jsondata);

                        var tess = "<div class='scrollHeader-basket__order-text'>" +
                            person['count'] +
                            "</div><div class='scrollHeader-basket__order-text'>" +
                            person['cost'] + "</div>";

                        $(".scrollHeader-basket__order").html(tess);


                        var tess =
                            "<div class='header-middle-control-basket__product'>" +
                            person['count'] +
                            "</div><div class='header-middle-control-basket__product'>" +
                            person['cost'] + "</div>";

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

















































































































































    <?/*
			  
			  
              <div class="catalogDetail-slider">
                <h2 class="catalogDetail-slider__title">Фото товара в магазине (7):</h2>
                <div class="catalogDetail-slider__items">
                  <div class="catalogDetail-slider__item">
                    <div class="catalogDetail-slider__pic"><img class="catalogDetail-slider__img" src="assets/img/page/detail_catalog/slider-1.png" alt="">
                      <div class="catalogDetail-slider__text">
                        <div class="catalogDetail-slider__text-name">Tom Farr<br>VICTORIYA BONYA</div>
                        <div class="catalogDetail-slider__text-description">магазин женской одежды на улице<br>Большая Полянка<br>с красивым интерьером</div>
                      </div>
                    </div>
                  </div>
                  <div class="catalogDetail-slider__item">
                    <div class="catalogDetail-slider__pic"><img class="catalogDetail-slider__img" src="assets/img/page/detail_catalog/slider-1.png" alt="">
                      <div class="catalogDetail-slider__text">
                        <div class="catalogDetail-slider__text-name">Tom Farr<br>VICTORIYA BONYA</div>
                        <div class="catalogDetail-slider__text-description">магазин женской одежды на улице<br>Большая Полянка<br>с красивым интерьером</div>
                      </div>
                    </div>
                  </div>
                  <div class="catalogDetail-slider__item">
                    <div class="catalogDetail-slider__pic"><img class="catalogDetail-slider__img" src="assets/img/page/detail_catalog/slider-1.png" alt="">
                      <div class="catalogDetail-slider__text">
                        <div class="catalogDetail-slider__text-name">Tom Farr<br>VICTORIYA BONYA</div>
                        <div class="catalogDetail-slider__text-description">магазин женской одежды на улице<br>Большая Полянка<br>с красивым интерьером</div>
                      </div>
                    </div>
                  </div>
                  <div class="catalogDetail-slider__item">
                    <div class="catalogDetail-slider__pic"><img class="catalogDetail-slider__img" src="assets/img/page/detail_catalog/slider-1.png" alt="">
                      <div class="catalogDetail-slider__text">
                        <div class="catalogDetail-slider__text-name">Tom Farr<br>VICTORIYA BONYA</div>
                        <div class="catalogDetail-slider__text-description">магазин женской одежды на улице<br>Большая Полянка<br>с красивым интерьером</div>
                      </div>
                    </div>
                  </div>
                  <div class="catalogDetail-slider__item">
                    <div class="catalogDetail-slider__pic"><img class="catalogDetail-slider__img" src="assets/img/page/detail_catalog/slider-1.png" alt="">
                      <div class="catalogDetail-slider__text">
                        <div class="catalogDetail-slider__text-name">Tom Farr<br>VICTORIYA BONYA</div>
                        <div class="catalogDetail-slider__text-description">магазин женской одежды на улице<br>Большая Полянка<br>с красивым интерьером</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="catalogDetailProdukts">
                <h2 class="catalogDetailProdukts__title">Похожие товары (7):</h2>
                <div class="catalogDetailProdukts-slider">
                  <div class="catalogDetailProdukts-slider__items" data-slick="{&quot;slidesToShow&quot;: 5 }">
                    <div class="catalogDetailProdukts-slider__item">
                      <div class="sectionCatalogList-items__item-sale">-10 %</div>
                      <div class="catalogDetailProdukts-slider-mini">
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini-prop">
                        <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                        <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для магазина одежды</div>
                      <div class="catalogDetailProdukts-slider-mini__art">
                        <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                        <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                      <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                    </div>
                    <div class="catalogDetailProdukts-slider__item">
                      <div class="sectionCatalogList-items__item-sale">-10 %</div>
                      <div class="catalogDetailProdukts-slider-mini">
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini-prop">
                        <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                        <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для магазина одежды</div>
                      <div class="catalogDetailProdukts-slider-mini__art">
                        <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                        <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                      <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                    </div>
                    <div class="catalogDetailProdukts-slider__item">
                      <div class="sectionCatalogList-items__item-sale">-10 %</div>
                      <div class="catalogDetailProdukts-slider-mini">
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini-prop">
                        <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                        <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для магазина одежды</div>
                      <div class="catalogDetailProdukts-slider-mini__art">
                        <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                        <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                      <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                    </div>
                    <div class="catalogDetailProdukts-slider__item">
                      <div class="sectionCatalogList-items__item-sale">-10 %</div>
                      <div class="catalogDetailProdukts-slider-mini">
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini-prop">
                        <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                        <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для магазина одежды</div>
                      <div class="catalogDetailProdukts-slider-mini__art">
                        <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                        <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                      <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                    </div>
                    <div class="catalogDetailProdukts-slider__item">
                      <div class="sectionCatalogList-items__item-sale">-10 %</div>
                      <div class="catalogDetailProdukts-slider-mini">
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini-prop">
                        <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                        <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для магазина одежды</div>
                      <div class="catalogDetailProdukts-slider-mini__art">
                        <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                        <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                      <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                    </div>
                    <div class="catalogDetailProdukts-slider__item">
                      <div class="sectionCatalogList-items__item-sale">-10 %</div>
                      <div class="catalogDetailProdukts-slider-mini">
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini-prop">
                        <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                        <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для магазина одежды</div>
                      <div class="catalogDetailProdukts-slider-mini__art">
                        <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                        <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                      <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                    </div>
                    <div class="catalogDetailProdukts-slider__item">
                      <div class="sectionCatalogList-items__item-sale">-10 %</div>
                      <div class="catalogDetailProdukts-slider-mini">
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini-prop">
                        <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                        <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для магазина одежды</div>
                      <div class="catalogDetailProdukts-slider-mini__art">
                        <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                        <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                      <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="catalogDetailProdukts">
                <h2 class="catalogDetailProdukts__title">Вы недавно смотрели (7):</h2>
                <div class="catalogDetailProdukts-slider">
                  <div class="catalogDetailProdukts-slider__items" data-slick="{&quot;slidesToShow&quot;: 5 }">
                    <div class="catalogDetailProdukts-slider__item">
                      <div class="sectionCatalogList-items__item-sale">-10 %</div>
                      <div class="catalogDetailProdukts-slider-mini">
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini-prop">
                        <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                        <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для магазина одежды</div>
                      <div class="catalogDetailProdukts-slider-mini__art">
                        <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                        <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                      <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                    </div>
                    <div class="catalogDetailProdukts-slider__item">
                      <div class="sectionCatalogList-items__item-sale">-10 %</div>
                      <div class="catalogDetailProdukts-slider-mini">
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini-prop">
                        <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                        <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для магазина одежды</div>
                      <div class="catalogDetailProdukts-slider-mini__art">
                        <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                        <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                      <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                    </div>
                    <div class="catalogDetailProdukts-slider__item">
                      <div class="sectionCatalogList-items__item-sale">-10 %</div>
                      <div class="catalogDetailProdukts-slider-mini">
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini-prop">
                        <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                        <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для магазина одежды</div>
                      <div class="catalogDetailProdukts-slider-mini__art">
                        <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                        <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                      <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                    </div>
                    <div class="catalogDetailProdukts-slider__item">
                      <div class="sectionCatalogList-items__item-sale">-10 %</div>
                      <div class="catalogDetailProdukts-slider-mini">
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini-prop">
                        <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                        <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для магазина одежды</div>
                      <div class="catalogDetailProdukts-slider-mini__art">
                        <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                        <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                      <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                    </div>
                    <div class="catalogDetailProdukts-slider__item">
                      <div class="sectionCatalogList-items__item-sale">-10 %</div>
                      <div class="catalogDetailProdukts-slider-mini">
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini-prop">
                        <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                        <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для магазина одежды</div>
                      <div class="catalogDetailProdukts-slider-mini__art">
                        <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                        <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                      <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                    </div>
                    <div class="catalogDetailProdukts-slider__item">
                      <div class="sectionCatalogList-items__item-sale">-10 %</div>
                      <div class="catalogDetailProdukts-slider-mini">
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini-prop">
                        <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                        <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для магазина одежды</div>
                      <div class="catalogDetailProdukts-slider-mini__art">
                        <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                        <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                      <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                    </div>
                    <div class="catalogDetailProdukts-slider__item">
                      <div class="sectionCatalogList-items__item-sale">-10 %</div>
                      <div class="catalogDetailProdukts-slider-mini">
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                        <div class="catalogDetailProdukts-slider-mini__item">
                          <div class="catalogDetailProdukts-slider-mini__pic"><img class="catalogDetailProdukts-slider-mini__img" src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                        </div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini-prop">
                        <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                        <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для магазина одежды</div>
                      <div class="catalogDetailProdukts-slider-mini__art">
                        <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                        <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                      </div>
                      <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                      <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
      
	  
	 
    <script src="/local/templates/eshop_bootstrap_v4/assets/js/foundation.js" defer></script>
	
    <script src="/local/templates/eshop_bootstrap_v4/assets/js/jquery.jscrollpane.min.js" defer></script>
	
    <script src="/local/templates/eshop_bootstrap_v4/assets/js/jquery.mousewheel.js" defer></script>
	
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js" defer></script>
	
    <script src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js" defer></script>
	
    <script src="/local/templates/eshop_bootstrap_v4/assets/js/app.js" defer></script>
	
	
	
		
	

	

<div class="info"  
data-item-id="<?=$arResult[ID]?>"
    data-item-img="<?=CFile::GetPath($arResult[PROPERTIES][Gallery][VALUE][0])?>"
    data-item-name="<?=$arResult[NAME]?>"
    data-item-article="<?=$arResult[PROPERTIES][Article][VALUE]?>"
    data-item-price="<?=ceil($arResult[ITEM_PRICES][0][UNROUND_PRICE]);?>"

    >








</div>








<script>
$(".sectionCatalogList-items-count__btn.minus").click(function() {

    var znachenie = $(this).parents(".sectionCatalogList-items__item").find(".product-item-amount-field").val();

    //alert(znachenie);

    if (znachenie > 1) {


        $(this).parents(".sectionCatalogList-items__item").find(".sectionCatalogList-items-count__input-text")
            .val(znachenie);

        $(this).parents(".sectionCatalogList-items__item").find(".product-item-amount-field-btn-minus").trigger(
            'click');

    }

});



$(".sectionCatalogList-items-count__btn.plus").click(function() {

    var znachenie = $(this).parents(".sectionCatalogList-items__item").find(
        ".sectionCatalogList-items-count__input-text").val();




    $(this).parents(".sectionCatalogList-items__item").find(".sectionCatalogList-items-count__input-text").val(
        znachenie);

    $(this).parents(".sectionCatalogList-items__item").find(".product-item-amount-field-btn-plus").trigger(
        'click');



});













$(".buy-but1").click(function() {

    var qq = $(this).attr('data-value');
    var qount = $(".sectionCatalogList-items-count__input-text").val();


    // Определение Параметров добавленного товара

    var id = $(".info").attr('data-item-id');

    name = $(".info").attr('data-item-name');
    article = $(".info").attr('data-item-article');
    price = $(".info").attr('data-item-price');
    imggg = $(".info").attr('data-item-img');



    if ($('.basket_header__item').is('#id' + id)) {
        //Есть товар в корзине


        //Количество товаров
        var currentcount = $(".basket_header__items").find('#id' + id).attr('data-item-quantity');

        allcount = Number.parseInt(currentcount) + Number.parseInt(qount);

        allprice = allcount * price;





        $(".basket_header__items").find('#id' + id).find('.basket_header__count').html("" + allcount + " шт");
        $(".basket_header__items").find('#id' + id).find('.basket_header-price__summ').html("" + allprice
            .toLocaleString() + " руб.");











    } else {
        //Нет товар в корзине

        var sumprice = Number.parseInt(qount) * Number.parseInt(price);


        var add = "<div class='basket_header__item' id=id" + id + " data-item-quantity=" + qount +
            " data-item-id=" + id +
            ">            <div class='basket_header__col one'><a class='basket_header__pic' href='#'>						<div class='basket_header__img imgcart22' style='background-image: url(" +
            imggg +
            ");' alt=''></div>						</a></div>            <div class='basket_header__col two'>              <div class='basket_header-hero'><a class='basket_header__name' href='#' style=''>" +
            name + "</a>                <div class='basket_header__art'>" + article +
            "</div>                <div class='basket_header__count'>" + qount +
            " шт</div>              </div>            </div>            <div class='basket_header__col free'><a class='basket_header__delete toggleTitle' href='javascript:void(0);'>                <div class='lnr lnr-trash basket_header__icon  dell1'  data-id=" +
            id +
            "></div></a>              <div class='basket_header-price'>                <div class='basket_header-price__summ'>" +
            sumprice.toLocaleString() + " руб.</div>              </div>            </div>          </div>";




        $(".basket_header__items").append(add);





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
        url: result + "&quantity=" + qount,
        dataType: "html",
        success: function(out) {

            //alert(out);


            //     alert("готово. Перейти в корзину http://torg.vmoidom.ru/personal/cart/");




            $.ajax({
                type: "POST",
                url: "/local/include/cartinfomin.php",

                cache: false,
                dataType: "html",
                success: function(jsondata) {

                    var person = JSON.parse(jsondata);

                    var tess = "<div class='scrollHeader-basket__order-text'>" + person[
                            'count'] +
                        "</div><div class='scrollHeader-basket__order-text'>" + person[
                            'cost'] + "</div>";

                    $(".scrollHeader-basket__order").html(tess);


                    var tess = "<div class='header-middle-control-basket__product'>" +
                        person['count'] +
                        "</div><div class='header-middle-control-basket__product'>" +
                        person['cost'] + "</div>";

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



























































<div class="wrapper__main">


    <div class="breadcrumbs">
        <div class="container">
            <div class="container__wrap">
                <div class="breadcrumbs__items" itemscope="" itemtype="http://schema.org/BreadcrumbList"><span
                        class="breadcrumbs__item" itemscope="" itemprop="itemListElement"
                        itemtype="http://schema.org/ListItem"><a class="breadcrumbs__link" rel="nofollow"
                            itemprop="item" title="Главная" href="/"><span itemprop="name">Главная</span>
                            <meta itemprop="position" content="1"></a></span><span class="breadcrumbs__item"
                        itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a
                            class="breadcrumbs__link" itemprop="item" title=" Каталог" href="#"><span
                                itemprop="name">Каталог</span>
                            <meta itemprop="position" content="2"></a></span><span class="breadcrumbs__item"
                        itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a
                            class="breadcrumbs__link" itemprop="item" title="Вешала" href="#"><span
                                itemprop="name">Вешала</span>
                            <meta itemprop="position" content="3"></a></span><span class="breadcrumbs__item"
                        itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem"><a
                            class="breadcrumbs__link" itemprop="item" title="Вешала латунь" href="#"><span
                                itemprop="name">Вешала латунь</span>
                            <meta itemprop="position" content="4"></a></span><span class="breadcrumbs__item"><span
                            class="breadcrumbs__text">Вешало st-54-123-latun</span></span></div>
            </div>
        </div>
    </div>


    <div class="propductLine">
        <div class="container">
            <div class="container__wrap">
                <div class="propductLine__wrap">
                    <div class="propductLine__col one">
                        <div class="propductLine-item">
                            <div class="propductLine-item__col one">
                                <div class="propductLine__pic"><img class="propductLine__img"
                                        src="assets/img/page/detail_catalog/big.png" alt=""></div>
                            </div>
                            <div class="propductLine-item__col two">
                                <div class="propductLine__name">
                                    Вешало напольное латунь st-02.90-latun для одежы и шуб,
                                    ремней и обуви Вешало напольное латунь st-02.90-latun
                                </div>
                                <div class="propductLine__art">Артикул: st-02.90-latun</div>
                            </div>
                        </div>
                    </div>
                    <div class="propductLine__col two">
                        <div class="propductLine-prop">
                            <div class="propductLine-prop__col one"><a class="propductLine-prop__back-prop"
                                    href="#product_prop">Вернуться к характеристикам</a></div>
                            <div class="propductLine-prop__col two">
                                <div class="popupAddBasket-item-count">
                                    <div class="popupAddBasket-item-count__col one">
                                        <button class="popupAddBasket-item-count__btn" data-type="minus">-</button>
                                    </div>
                                    <div class="popupAddBasket-item-count__col two">
                                        <div class="popupAddBasket-item-count__input">
                                            <input class="popupAddBasket-item-count__input-text" value="1">
                                        </div>
                                    </div>
                                    <div class="popupAddBasket-item-count__col three">
                                        <button class="popupAddBasket-item-count__btn" data-type="plus">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="propductLine-prop__col three">
                                <div class="propductLine-prop-price">
                                    <div class="propductLine-prop-price__old">17 250 руб.</div>
                                    <div class="propductLine-prop-price__new">23 900 руб.-</div>
                                </div>
                            </div>
                            <div class="propductLine-prop__col four">
                                <button class="propductLine-prop__btn btn-common-empty">Купить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="catalogDetail">
        <div class="container">
            <div class="container__wrap">
                <div class="catalogDetail-hero">
                    <div class="catalogDetail-hero__col one">
                        <div class="catalogDetailPhoto">
                            <div class="catalogDetailPhoto__col one">
                                <div class="catalogDetailPhoto-mini">
                                    <div class="catalogDetailPhoto-mini__items">
                                        <div class="catalogDetailPhoto-mini__item">
                                            <div class="catalogDetailPhoto-mini__pic"><img
                                                    class="catalogDetailPhoto-mini__img"
                                                    src="assets/img/page/detail_catalog/mini.png" alt="" /></div>
                                        </div>
                                        <div class="catalogDetailPhoto-mini__item">
                                            <div class="catalogDetailPhoto-mini__pic"><img
                                                    class="catalogDetailPhoto-mini__img"
                                                    src="assets/img/page/detail_catalog/mini.png" alt="" /></div>
                                        </div>
                                        <div class="catalogDetailPhoto-mini__item">
                                            <div class="catalogDetailPhoto-mini__pic"><img
                                                    class="catalogDetailPhoto-mini__img"
                                                    src="assets/img/page/detail_catalog/mini.png" alt="" /></div>
                                        </div>
                                        <div class="catalogDetailPhoto-mini__item">
                                            <div class="catalogDetailPhoto-mini__pic"><img
                                                    class="catalogDetailPhoto-mini__img"
                                                    src="assets/img/page/detail_catalog/mini.png" alt="" /></div>
                                        </div>
                                        <div class="catalogDetailPhoto-mini__item">
                                            <div class="catalogDetailPhoto-mini__pic"><img
                                                    class="catalogDetailPhoto-mini__img"
                                                    src="assets/img/page/detail_catalog/mini.png" alt="" /></div>
                                        </div>
                                        <div class="catalogDetailPhoto-mini__item">
                                            <div class="catalogDetailPhoto-mini__pic"><img
                                                    class="catalogDetailPhoto-mini__img"
                                                    src="assets/img/page/detail_catalog/mini.png" alt="" /></div>
                                        </div>
                                        <div class="catalogDetailPhoto-mini__item">
                                            <div class="catalogDetailPhoto-mini__pic"><img
                                                    class="catalogDetailPhoto-mini__img"
                                                    src="assets/img/page/detail_catalog/mini.png" alt="" /></div>
                                        </div>
                                        <div class="catalogDetailPhoto-mini__item">
                                            <div class="catalogDetailPhoto-mini__pic"><img
                                                    class="catalogDetailPhoto-mini__img"
                                                    src="assets/img/page/detail_catalog/mini.png" alt="" /></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="catalogDetailPhoto__col two">
                                <div class="catalogDetailPhoto-big">
                                    <div class="catalogDetailPhoto-big__popup three"><span
                                            class="catalogDetailPhoto-big__toggleTitle toggleTitle"
                                            data-title="Смотреть">
                                            <div class="lnr lnr-camera-video catalogDetailPhoto-big__icon"></div>
                                            <div class="catalogDetailPhoto-big__popup-title" data-show="видео"
                                                data-hide="смотреть">видео</div>
                                        </span></div>
                                    <div class="catalogDetailPhoto-big__popup one">
                                        <div class="lnr lnr-exit-up catalogDetailPhoto-big__icon toggleTitle"
                                            data-title="Поделиться"></div><span class="share-popup"><span
                                                class="share-popup__items"><a class="share-popup__item" href="#"><span
                                                        class="fa fa-instagram share-popup__icon"></span></a><a
                                                    class="share-popup__item" href="#"><span
                                                        class="fa fa-vk share-popup__icon"></span></a><a
                                                    class="share-popup__item" href="#"><span
                                                        class="fa fa-facebook share-popup__icon"></span></a><a
                                                    class="share-popup__item" href="#"><span
                                                        class="fa fa-twitter share-popup__icon"></span></a><a
                                                    class="share-popup__item" href="#"><span
                                                        class="fa fa-whatsapp share-popup__icon"></span></a></span></span>
                                    </div><a class="catalogDetailPhoto-big__popup two"
                                        id="js-catalogDetailPhoto-fancybox" data-fancybox="gallery"
                                        href="assets/img/page/detail_catalog/big.png">
                                        <div class="lnr lnr-frame-expand catalogDetailPhoto-big__icon toggleTitle"
                                            data-title="Увеличить"></div>
                                    </a>
                                    <div class="catalogDetailPhoto-big__items">
                                        <div class="catalogDetailPhoto-big__item"><a class="catalogDetailPhoto-big__pic"
                                                data-fancybox="gallery-img"
                                                href="assets/img/page/detail_catalog/big.png"><img
                                                    class="catalogDetailPhoto-big__img"
                                                    src="assets/img/page/detail_catalog/big.png" alt="" /></a></div>
                                        <div class="catalogDetailPhoto-big__item"><a class="catalogDetailPhoto-big__pic"
                                                data-fancybox="gallery-img"
                                                href="assets/img/page/detail_catalog/big.png"><img
                                                    class="catalogDetailPhoto-big__img"
                                                    src="assets/img/page/detail_catalog/big.png" alt="" /></a></div>
                                        <div class="catalogDetailPhoto-big__item"><a class="catalogDetailPhoto-big__pic"
                                                data-fancybox="gallery-img"
                                                href="assets/img/page/detail_catalog/big.png"><img
                                                    class="catalogDetailPhoto-big__img"
                                                    src="assets/img/page/detail_catalog/big.png" alt="" /></a></div>
                                        <div class="catalogDetailPhoto-big__item"><a class="catalogDetailPhoto-big__pic"
                                                data-fancybox="gallery-img"
                                                href="assets/img/page/detail_catalog/big.png"><img
                                                    class="catalogDetailPhoto-big__img"
                                                    src="assets/img/page/detail_catalog/big.png" alt="" /></a></div>
                                        <div class="catalogDetailPhoto-big__item"><a class="catalogDetailPhoto-big__pic"
                                                data-fancybox="gallery-img"
                                                href="assets/img/page/detail_catalog/big.png"><img
                                                    class="catalogDetailPhoto-big__img"
                                                    src="assets/img/page/detail_catalog/big.png" alt="" /></a></div>
                                        <div class="catalogDetailPhoto-big__item"><a class="catalogDetailPhoto-big__pic"
                                                data-fancybox="gallery-img"
                                                href="assets/img/page/detail_catalog/big.png"><img
                                                    class="catalogDetailPhoto-big__img"
                                                    src="assets/img/page/detail_catalog/big.png" alt="" /></a></div>
                                        <div class="catalogDetailPhoto-big__item"><a class="catalogDetailPhoto-big__pic"
                                                data-fancybox="gallery-img"
                                                href="assets/img/page/detail_catalog/big.png"><img
                                                    class="catalogDetailPhoto-big__img"
                                                    src="assets/img/page/detail_catalog/big.png" alt="" /></a></div>
                                        <div class="catalogDetailPhoto-big__item"><a class="catalogDetailPhoto-big__pic"
                                                data-fancybox="gallery-img"
                                                href="assets/img/page/detail_catalog/big.png"><img
                                                    class="catalogDetailPhoto-big__img"
                                                    src="assets/img/page/detail_catalog/big.png" alt="" /></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="catalogDetail-hero__col two">
                        <div class="catalogDetailInfo">
                            <div class="catalogDetailInfoProp">
                                <div class="catalogDetailInfoProp__item sale">-10 %</div>
                                <div class="catalogDetailInfoProp__item green">Новинка</div>
                                <div class="catalogDetailInfoProp__item orange">Хит продаж</div>
                            </div>
                            <div class="catalogDetailInfoTags"><a class="catalogDetailInfoTags__link" href="#">Торговые
                                    системы не требующие крепления к стене</a><a class="catalogDetailInfoTags__link"
                                    href="#">Вертикальные торговые системы</a><a class="catalogDetailInfoTags__link"
                                    href="#">Вешала стойки напольные</a><a class="catalogDetailInfoTags__link"
                                    href="#">Вешала из нержавейкинержавейки</a><a class="catalogDetailInfoTags__link"
                                    href="#">Вешала</a><a class="catalogDetailInfoTags__link" href="#">Вешала
                                    напольные</a>
                            </div><a name="product_prop"></a>
                            <h1 class="catalogDetailInfo__title">Вешало напольное латунь st-02.90-latun для одежы и шуб,
                                ремней и обуви Вешало напольное латунь st-02.90-latun</h1>
                            <div class="catalogDetailInfo-buy">
                                <div class="catalogDetailInfo-buy__col one">
                                    <div class="catalogDetailInfo-buy__price-old">17 250 руб.-</div>
                                    <div class="catalogDetailInfo-buy__price">23 900 руб.-</div><a
                                        class="catalogDetailInfo-buy__link" href="#">сравнить</a><a
                                        class="catalogDetailInfo-buy__link two" href="#">в избранное</a>
                                </div>
                                <div class="catalogDetailInfo-buy__col two">
                                    <button class="catalogDetailInfo-buy__btn popupAddBasket__open">Купить</button>
                                </div>
                                <div class="catalogDetailInfo-buy__col three">
                                    <div class="catalogDetailInfo-buy-count">
                                        <div class="catalogDetailInfo-buy-count__col one">
                                            <button class="catalogDetailInfo-buy-count__btn"
                                                data-type="minus">-</button>
                                        </div>
                                        <div class="catalogDetailInfo-buy-count__col two">
                                            <div class="catalogDetailInfo-buy-count-input">
                                                <input class="catalogDetailInfo-buy-count-input__text" type="text"
                                                    value="1" />
                                            </div>
                                        </div>
                                        <div class="catalogDetailInfo-buy-count__col three">
                                            <button class="catalogDetailInfo-buy-count__btn" data-type="plus">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="catalogDetailInfo__art">Артикул: st-02.90-latun</div>
                            <div class="catalogDetailInfo__preview">
                                Вешало st-02.90 используется с трубой арт.st-02-80-cr с овальным сечением
                                30*60 мм. И еще для чего-нибудь подходит
                            </div>
                            <h2 class="catalogDetailInfo-prop__title">Характеристики:</h2>
                            <div class="catalogDetailInfo-prop__items">
                                <div class="catalogDetailInfo-prop__item">
                                    <div class="catalogDetailInfo-prop__col one">Материал</div>
                                    <div class="catalogDetailInfo-prop__col two">нержавеющая сталь хромированный</div>
                                </div>
                                <div class="catalogDetailInfo-prop__item">
                                    <div class="catalogDetailInfo-prop__col one">Цвет</div>
                                    <div class="catalogDetailInfo-prop__col two">латунь</div>
                                </div>
                                <div class="catalogDetailInfo-prop__item">
                                    <div class="catalogDetailInfo-prop__col one">Ширина, мм</div>
                                    <div class="catalogDetailInfo-prop__col two">1500</div>
                                </div>
                                <div class="catalogDetailInfo-prop__item">
                                    <div class="catalogDetailInfo-prop__col one">Глубина, мм</div>
                                    <div class="catalogDetailInfo-prop__col two">450</div>
                                </div>
                                <div class="catalogDetailInfo-prop__item">
                                    <div class="catalogDetailInfo-prop__col one">Высота, мм</div>
                                    <div class="catalogDetailInfo-prop__col two">1500</div>
                                </div>
                                <div class="catalogDetailInfo-prop__item">
                                    <div class="catalogDetailInfo-prop__col one">Сечение, мм</div>
                                    <div class="catalogDetailInfo-prop__col two">40*40</div>
                                </div>
                                <div class="catalogDetailInfo-prop__item">
                                    <div class="catalogDetailInfo-prop__col one">Тип сечения</div>
                                    <div class="catalogDetailInfo-prop__col two">квадратное</div>
                                </div>
                                <div class="catalogDetailInfo-prop__item">
                                    <div class="catalogDetailInfo-prop__col one">Тип крепления</div>
                                    <div class="catalogDetailInfo-prop__col two">на стойку</div>
                                </div>
                                <div class="catalogDetailInfo-prop__item">
                                    <div class="catalogDetailInfo-prop__col one">Единицы измерения</div>
                                    <div class="catalogDetailInfo-prop__col two">шт.</div>
                                </div>
                            </div>
                            <h2 class="catalogDetailInfo-prop__title">Выбрать другой цвет (покрытие) :</h2>
                            <div class="catalogDetailInfo-prop-select">
                                <div class="catalogDetailInfo-prop-select__value">латунь</div>
                                <div class="catalogDetailInfo-prop-select__items">
                                    <div class="catalogDetailInfo-prop-select__item active">латунь</div>
                                    <div class="catalogDetailInfo-prop-select__item">золото</div>
                                    <div class="catalogDetailInfo-prop-select__item">хром</div>
                                    <div class="catalogDetailInfo-prop-select__item">серый</div>
                                </div>
                            </div>
                            <h2 class="catalogDetailInfo-prop__title">Выбрать другой размер:</h2>
                            <div class="catalogDetailInfo-prop-select">
                                <div class="catalogDetailInfo-prop-select__value">1200*450*1200 мм, сечение 40*40 мм
                                </div>
                                <div class="catalogDetailInfo-prop-select__items">
                                    <div class="catalogDetailInfo-prop-select__item">свойство 2</div>
                                    <div class="catalogDetailInfo-prop-select__item">свойство 3</div>
                                    <div class="catalogDetailInfo-prop-select__item">свойство 4</div>
                                </div>
                            </div>
                        </div>
                    </div><a class="catalogDetail-hero-produkt__prev" href="#">
                        <div class="lnr lnr-chevron-left catalogDetail-hero-produkt__icon toggleTitle"
                            data-title="Предыдущий товар"></div>
                    </a><a class="catalogDetail-hero-produkt__next" href="#">
                        <div class="lnr lnr-chevron-right catalogDetail-hero-produkt__icon toggleTitle"
                            data-title="Следующий товар"></div>
                    </a>
                </div>
            </div>
            <div class="container__wrap">
                <div class="catalogDetail-tabs">
                    <div class="catalogDetail-tabs__wrap">
                        <div class="catalogDetail-tabs__items"><a class="catalogDetail-tabs__item active"
                                href="#">Описание товара</a><a class="catalogDetail-tabs__item" href="#">Нет нужного
                                размера или цвета?</a><a class="catalogDetail-tabs__item" href="#">Доставка и
                                оплата</a><a class="catalogDetail-tabs__item" href="#">Частые вопросы</a></div>
                        <div class="catalogDetail-tabs-tab">
                            <div class="catalogDetail-tabs-tab__item active">
                                <div class="catalogDetail-tabs-tab__wrap">
                                    <div class="catalogDetail-tabs-tab__col one">
                                        <div class="catalogDetail-tabs-tab__text">
                                            Вешало напольное латунь st-02.90-latun для одежы<br>
                                            и шуб, ремней и обуви из прочной нержавеющей<br>
                                            стали с покрытием латунь
                                        </div>
                                    </div>
                                    <div class="catalogDetail-tabs-tab__col two">
                                        <p>Чтобы ознакомиться подробнее с оборудованием посетите наш шоу-рум или
                                            позвоните по телефону:</p>
                                        <p>
                                            - 8 800 302 44 01 (Бесплатно по РФ)<br>
                                            - 8 495 413 74 15 (Москва и МО)
                                        </p>
                                        <p>Если Вы не дозвонились нам, пожалуйста, перезвоните или закажите звонок</p>
                                        <p>Наш менеджер ответит на все ваши вопросы.</p>
                                        <button class="catalogDetail-tabs-tab__btn">Заказать звонок</button>
                                    </div>
                                </div>
                            </div>
                            <div class="catalogDetail-tabs-tab__item">2</div>
                            <div class="catalogDetail-tabs-tab__item">3</div>
                            <div class="catalogDetail-tabs-tab__item">4</div>
                        </div>
                    </div>
                </div>
                <div class="catalogDetail-slider">
                    <h2 class="catalogDetail-slider__title">Фото товара в магазине (7):</h2>
                    <div class="catalogDetail-slider__items">
                        <div class="catalogDetail-slider__item">
                            <div class="catalogDetail-slider__pic"><img class="catalogDetail-slider__img"
                                    src="assets/img/page/detail_catalog/slider-1.png" alt="">
                                <div class="catalogDetail-slider__text">
                                    <div class="catalogDetail-slider__text-name">Tom Farr<br>VICTORIYA BONYA</div>
                                    <div class="catalogDetail-slider__text-description">магазин женской одежды на
                                        улице<br>Большая Полянка<br>с красивым интерьером</div>
                                </div>
                            </div>
                        </div>
                        <div class="catalogDetail-slider__item">
                            <div class="catalogDetail-slider__pic"><img class="catalogDetail-slider__img"
                                    src="assets/img/page/detail_catalog/slider-1.png" alt="">
                                <div class="catalogDetail-slider__text">
                                    <div class="catalogDetail-slider__text-name">Tom Farr<br>VICTORIYA BONYA</div>
                                    <div class="catalogDetail-slider__text-description">магазин женской одежды на
                                        улице<br>Большая Полянка<br>с красивым интерьером</div>
                                </div>
                            </div>
                        </div>
                        <div class="catalogDetail-slider__item">
                            <div class="catalogDetail-slider__pic"><img class="catalogDetail-slider__img"
                                    src="assets/img/page/detail_catalog/slider-1.png" alt="">
                                <div class="catalogDetail-slider__text">
                                    <div class="catalogDetail-slider__text-name">Tom Farr<br>VICTORIYA BONYA</div>
                                    <div class="catalogDetail-slider__text-description">магазин женской одежды на
                                        улице<br>Большая Полянка<br>с красивым интерьером</div>
                                </div>
                            </div>
                        </div>
                        <div class="catalogDetail-slider__item">
                            <div class="catalogDetail-slider__pic"><img class="catalogDetail-slider__img"
                                    src="assets/img/page/detail_catalog/slider-1.png" alt="">
                                <div class="catalogDetail-slider__text">
                                    <div class="catalogDetail-slider__text-name">Tom Farr<br>VICTORIYA BONYA</div>
                                    <div class="catalogDetail-slider__text-description">магазин женской одежды на
                                        улице<br>Большая Полянка<br>с красивым интерьером</div>
                                </div>
                            </div>
                        </div>
                        <div class="catalogDetail-slider__item">
                            <div class="catalogDetail-slider__pic"><img class="catalogDetail-slider__img"
                                    src="assets/img/page/detail_catalog/slider-1.png" alt="">
                                <div class="catalogDetail-slider__text">
                                    <div class="catalogDetail-slider__text-name">Tom Farr<br>VICTORIYA BONYA</div>
                                    <div class="catalogDetail-slider__text-description">магазин женской одежды на
                                        улице<br>Большая Полянка<br>с красивым интерьером</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="catalogDetailProdukts">
                    <h2 class="catalogDetailProdukts__title">Похожие товары (7):</h2>
                    <div class="catalogDetailProdukts-slider">
                        <div class="catalogDetailProdukts-slider__items" data-slick="{&quot;slidesToShow&quot;: 5 }">
                            <div class="catalogDetailProdukts-slider__item">
                                <div class="sectionCatalogList-items__item-sale">-10 %</div>
                                <div class="catalogDetailProdukts-slider-mini">
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini-prop">
                                    <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                                    <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для
                                    магазина одежды</div>
                                <div class="catalogDetailProdukts-slider-mini__art">
                                    <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                                    <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                                <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a
                                    class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                            </div>
                            <div class="catalogDetailProdukts-slider__item">
                                <div class="sectionCatalogList-items__item-sale">-10 %</div>
                                <div class="catalogDetailProdukts-slider-mini">
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini-prop">
                                    <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                                    <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для
                                    магазина одежды</div>
                                <div class="catalogDetailProdukts-slider-mini__art">
                                    <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                                    <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                                <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a
                                    class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                            </div>
                            <div class="catalogDetailProdukts-slider__item">
                                <div class="sectionCatalogList-items__item-sale">-10 %</div>
                                <div class="catalogDetailProdukts-slider-mini">
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini-prop">
                                    <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                                    <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для
                                    магазина одежды</div>
                                <div class="catalogDetailProdukts-slider-mini__art">
                                    <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                                    <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                                <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a
                                    class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                            </div>
                            <div class="catalogDetailProdukts-slider__item">
                                <div class="sectionCatalogList-items__item-sale">-10 %</div>
                                <div class="catalogDetailProdukts-slider-mini">
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini-prop">
                                    <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                                    <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для
                                    магазина одежды</div>
                                <div class="catalogDetailProdukts-slider-mini__art">
                                    <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                                    <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                                <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a
                                    class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                            </div>
                            <div class="catalogDetailProdukts-slider__item">
                                <div class="sectionCatalogList-items__item-sale">-10 %</div>
                                <div class="catalogDetailProdukts-slider-mini">
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini-prop">
                                    <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                                    <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для
                                    магазина одежды</div>
                                <div class="catalogDetailProdukts-slider-mini__art">
                                    <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                                    <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                                <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a
                                    class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                            </div>
                            <div class="catalogDetailProdukts-slider__item">
                                <div class="sectionCatalogList-items__item-sale">-10 %</div>
                                <div class="catalogDetailProdukts-slider-mini">
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini-prop">
                                    <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                                    <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для
                                    магазина одежды</div>
                                <div class="catalogDetailProdukts-slider-mini__art">
                                    <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                                    <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                                <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a
                                    class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                            </div>
                            <div class="catalogDetailProdukts-slider__item">
                                <div class="sectionCatalogList-items__item-sale">-10 %</div>
                                <div class="catalogDetailProdukts-slider-mini">
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini-prop">
                                    <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                                    <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для
                                    магазина одежды</div>
                                <div class="catalogDetailProdukts-slider-mini__art">
                                    <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                                    <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                                <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a
                                    class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="catalogDetailProdukts">
                    <h2 class="catalogDetailProdukts__title">Вы недавно смотрели (7):</h2>
                    <div class="catalogDetailProdukts-slider">
                        <div class="catalogDetailProdukts-slider__items" data-slick="{&quot;slidesToShow&quot;: 5 }">
                            <div class="catalogDetailProdukts-slider__item">
                                <div class="sectionCatalogList-items__item-sale">-10 %</div>
                                <div class="catalogDetailProdukts-slider-mini">
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini-prop">
                                    <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                                    <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для
                                    магазина одежды</div>
                                <div class="catalogDetailProdukts-slider-mini__art">
                                    <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                                    <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                                <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a
                                    class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                            </div>
                            <div class="catalogDetailProdukts-slider__item">
                                <div class="sectionCatalogList-items__item-sale">-10 %</div>
                                <div class="catalogDetailProdukts-slider-mini">
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini-prop">
                                    <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                                    <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для
                                    магазина одежды</div>
                                <div class="catalogDetailProdukts-slider-mini__art">
                                    <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                                    <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                                <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a
                                    class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                            </div>
                            <div class="catalogDetailProdukts-slider__item">
                                <div class="sectionCatalogList-items__item-sale">-10 %</div>
                                <div class="catalogDetailProdukts-slider-mini">
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini-prop">
                                    <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                                    <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для
                                    магазина одежды</div>
                                <div class="catalogDetailProdukts-slider-mini__art">
                                    <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                                    <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                                <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a
                                    class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                            </div>
                            <div class="catalogDetailProdukts-slider__item">
                                <div class="sectionCatalogList-items__item-sale">-10 %</div>
                                <div class="catalogDetailProdukts-slider-mini">
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini-prop">
                                    <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                                    <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для
                                    магазина одежды</div>
                                <div class="catalogDetailProdukts-slider-mini__art">
                                    <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                                    <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                                <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a
                                    class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                            </div>
                            <div class="catalogDetailProdukts-slider__item">
                                <div class="sectionCatalogList-items__item-sale">-10 %</div>
                                <div class="catalogDetailProdukts-slider-mini">
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini-prop">
                                    <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                                    <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для
                                    магазина одежды</div>
                                <div class="catalogDetailProdukts-slider-mini__art">
                                    <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                                    <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                                <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a
                                    class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                            </div>
                            <div class="catalogDetailProdukts-slider__item">
                                <div class="sectionCatalogList-items__item-sale">-10 %</div>
                                <div class="catalogDetailProdukts-slider-mini">
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini-prop">
                                    <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                                    <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для
                                    магазина одежды</div>
                                <div class="catalogDetailProdukts-slider-mini__art">
                                    <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                                    <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                                <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a
                                    class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                            </div>
                            <div class="catalogDetailProdukts-slider__item">
                                <div class="sectionCatalogList-items__item-sale">-10 %</div>
                                <div class="catalogDetailProdukts-slider-mini">
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                    <div class="catalogDetailProdukts-slider-mini__item">
                                        <div class="catalogDetailProdukts-slider-mini__pic"><img
                                                class="catalogDetailProdukts-slider-mini__img"
                                                src="assets/img/page/detail_catalog/slider-2.png" alt=""></div>
                                    </div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini-prop">
                                    <div class="catalogDetailProdukts-slider-mini-prop__item orange">На заказ</div>
                                    <!--.catalogDetailProdukts-slider-mini-prop__item.green Новинка-->
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__name">Вешало напольное ST-02.60 для
                                    магазина одежды</div>
                                <div class="catalogDetailProdukts-slider-mini__art">
                                    <div class="catalogDetailProdukts-slider-mini__art__col one">Артикул</div>
                                    <div class="catalogDetailProdukts-slider-mini__art__col two">ST-02.60</div>
                                </div>
                                <div class="catalogDetailProdukts-slider-mini__price">7 990 руб.</div>
                                <div class="catalogDetailProdukts-slider-mini__price-old">17 990 руб.</div><a
                                    class="catalogDetailProdukts-slider__more fastSeeShow" href="#">Быстрый просмотр</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

















































































































<br><br><br><br>



<div class="bx-catalog-element<?=$themeClass?>" id="<?=$itemIds['ID']?>" itemscope itemtype="http://schema.org/Product">
    <?
	if ($arParams['DISPLAY_NAME'] === 'Y')
	{
		?>
    <h1 class="mb-3"><?=$name?></h1>
    <?
	}
	?>
    <div class="row">

        <div class="col-md">
            <div class="product-item-detail-slider-container" id="<?=$itemIds['BIG_SLIDER_ID']?>">
                <span class="product-item-detail-slider-close" data-entity="close-popup"></span>
                <div class="product-item-detail-slider-block
					<?=($arParams['IMAGE_RESOLUTION'] === '1by1' ? 'product-item-detail-slider-block-square' : '')?>"
                    data-entity="images-slider-block">
                    <span class="product-item-detail-slider-left" data-entity="slider-control-left"
                        style="display: none;"></span>
                    <span class="product-item-detail-slider-right" data-entity="slider-control-right"
                        style="display: none;"></span>
                    <div class="product-item-label-text <?=$labelPositionClass?>" id="<?=$itemIds['STICKER_ID']?>"
                        <?=(!$arResult['LABEL'] ? 'style="display: none;"' : '' )?>>
                        <?
						if ($arResult['LABEL'] && !empty($arResult['LABEL_ARRAY_VALUE']))
						{
							foreach ($arResult['LABEL_ARRAY_VALUE'] as $code => $value)
							{
								?>
                        <div<?=(!isset($arParams['LABEL_PROP_MOBILE'][$code]) ? ' class="hidden-xs"' : '')?>>
                            <span title="<?=$value?>"><?=$value?></span>
                    </div>
                    <?
							}
						}
						?>
                </div>
                <?
					if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y')
					{
						if ($haveOffers)
						{
							?>
                <div class="product-item-label-ring <?=$discountPositionClass?>"
                    id="<?=$itemIds['DISCOUNT_PERCENT_ID']?>" style="display: none;">
                </div>
                <?
						}
						else
						{
							if ($price['DISCOUNT'] > 0)
							{
								?>
                <div class="product-item-label-ring <?=$discountPositionClass?>"
                    id="<?=$itemIds['DISCOUNT_PERCENT_ID']?>" title="<?=-$price['PERCENT']?>%">
                    <span><?=-$price['PERCENT']?>%</span>
                </div>
                <?
							}
						}
					}
					?>
                <div class="product-item-detail-slider-images-container" data-entity="images-container">
                    <?
						if (!empty($actualItem['MORE_PHOTO']))
						{
							foreach ($actualItem['MORE_PHOTO'] as $key => $photo)
							{
								?>
                    <div class="product-item-detail-slider-image<?=($key == 0 ? ' active' : '')?>" data-entity="image"
                        data-id="<?=$photo['ID']?>">
                        <img src="<?=$photo['SRC']?>" alt="<?=$alt?>" title="<?=$title?>"
                            <?=($key == 0 ? ' itemprop="image"' : '')?>>
                    </div>
                    <?
							}
						}

						if ($arParams['SLIDER_PROGRESS'] === 'Y')
						{
							?>
                    <div class="product-item-detail-slider-progress-bar" data-entity="slider-progress-bar"
                        style="width: 0;"></div>
                    <?
						}
						?>
                </div>
            </div>
            <?
				if ($showSliderControls)
				{
					if ($haveOffers)
					{
						foreach ($arResult['OFFERS'] as $keyOffer => $offer)
						{
							if (!isset($offer['MORE_PHOTO_COUNT']) || $offer['MORE_PHOTO_COUNT'] <= 0)
								continue;

							$strVisible = $arResult['OFFERS_SELECTED'] == $keyOffer ? '' : 'none';
							?>
            <div class="product-item-detail-slider-controls-block" id="<?=$itemIds['SLIDER_CONT_OF_ID'].$offer['ID']?>"
                style="display: <?=$strVisible?>;">
                <?
								foreach ($offer['MORE_PHOTO'] as $keyPhoto => $photo)
								{
									?>
                <div class="product-item-detail-slider-controls-image<?=($keyPhoto == 0 ? ' active' : '')?>"
                    data-entity="slider-control" data-value="<?=$offer['ID'].'_'.$photo['ID']?>">
                    <img src="<?=$photo['SRC']?>">
                </div>
                <?
								}
								?>
            </div>
            <?
						}
					}
					else
					{
						?>
            <div class="product-item-detail-slider-controls-block" id="<?=$itemIds['SLIDER_CONT_ID']?>">
                <?
							if (!empty($actualItem['MORE_PHOTO']))
							{
								foreach ($actualItem['MORE_PHOTO'] as $key => $photo)
								{
									?>
                <div class="product-item-detail-slider-controls-image<?=($key == 0 ? ' active' : '')?>"
                    data-entity="slider-control" data-value="<?=$photo['ID']?>">
                    <img src="<?=$photo['SRC']?>">
                </div>
                <?
								}
							}
							?>
            </div>
            <?
					}
				}
				?>
        </div>
    </div>
    <?
		$showOffersBlock = $haveOffers && !empty($arResult['OFFERS_PROP']);
		$mainBlockProperties = array_intersect_key($arResult['DISPLAY_PROPERTIES'], $arParams['MAIN_BLOCK_PROPERTY_CODE']);
		$showPropsBlock = !empty($mainBlockProperties) || $arResult['SHOW_OFFERS_PROPS'];
		$showBlockWithOffersAndProps = $showOffersBlock || $showPropsBlock;
		?>
    <div class="<?=($showBlockWithOffersAndProps ? "col-md-5 col-lg-6" : "col-md-4"); ?>">
        <div class="row">
            <?
				if ($showBlockWithOffersAndProps)
				{
				?>
            <div class="col-lg-5">
                <?
					foreach ($arParams['PRODUCT_INFO_BLOCK_ORDER'] as $blockName)
					{
						switch ($blockName)
						{
							case 'sku':
								if ($showOffersBlock)
								{
									?>
                <div class="mb-3" id="<?=$itemIds['TREE_ID']?>">
                    <?
										foreach ($arResult['SKU_PROPS'] as $skuProperty)
										{
											if (!isset($arResult['OFFERS_PROP'][$skuProperty['CODE']]))
												continue;

											$propertyId = $skuProperty['ID'];
											$skuProps[] = array(
												'ID' => $propertyId,
												'SHOW_MODE' => $skuProperty['SHOW_MODE'],
												'VALUES' => $skuProperty['VALUES'],
												'VALUES_COUNT' => $skuProperty['VALUES_COUNT']
											);
											?>
                    <div data-entity="sku-line-block" class="mb-3">
                        <div class="product-item-scu-container-title"><?=htmlspecialcharsEx($skuProperty['NAME'])?>
                        </div>
                        <div class="product-item-scu-container">
                            <div class="product-item-scu-block">
                                <div class="product-item-scu-list">
                                    <ul class="product-item-scu-item-list">
                                        <?
																foreach ($skuProperty['VALUES'] as &$value)
																{
																	$value['NAME'] = htmlspecialcharsbx($value['NAME']);

																	if ($skuProperty['SHOW_MODE'] === 'PICT')
																	{
																		?>
                                        <li class="product-item-scu-item-color-container" title="<?=$value['NAME']?>"
                                            data-treevalue="<?=$propertyId?>_<?=$value['ID']?>"
                                            data-onevalue="<?=$value['ID']?>">
                                            <div class="product-item-scu-item-color-block">
                                                <div class="product-item-scu-item-color" title="<?=$value['NAME']?>"
                                                    style="background-image: url('<?=$value['PICT']['SRC']?>');">
                                                </div>
                                            </div>
                                        </li>
                                        <?
																	}
																	else
																	{
																		?>
                                        <li class="product-item-scu-item-text-container" title="<?=$value['NAME']?>"
                                            data-treevalue="<?=$propertyId?>_<?=$value['ID']?>"
                                            data-onevalue="<?=$value['ID']?>">
                                            <div class="product-item-scu-item-text-block">
                                                <div class="product-item-scu-item-text"><?=$value['NAME']?></div>
                                            </div>
                                        </li>
                                        <?
																	}
																}
																?>
                                    </ul>
                                    <div style="clear: both;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?
										}
										?>
                </div>
                <?
								}

								break;

							case 'props':
								if ($showPropsBlock)
								{
									?>
                <div class="mb-3">
                    <?
										if (!empty($mainBlockProperties))
										{
											?>
                    <ul class="product-item-detail-properties">
                        <?
												foreach ($mainBlockProperties as $property)
												{
													?>
                        <li class="product-item-detail-properties-item">
                            <span class="product-item-detail-properties-name text-muted"><?=$property['NAME']?></span>
                            <span class="product-item-detail-properties-dots"></span>
                            <span class="product-item-detail-properties-value"><?=(is_array($property['DISPLAY_VALUE'])
																? implode(' / ', $property['DISPLAY_VALUE'])
																: $property['DISPLAY_VALUE'])?>
                            </span>
                        </li>
                        <?
												}
												?>
                    </ul>
                    <?
										}

										if ($arResult['SHOW_OFFERS_PROPS'])
										{
											?>
                    <ul class="product-item-detail-properties" id="<?=$itemIds['DISPLAY_MAIN_PROP_DIV']?>"></ul>
                    <?
										}
										?>
                </div>
                <?
								}

								break;
						}
					}
					?>
            </div>
            <?
				}
				?>
            <div class="<?=($showBlockWithOffersAndProps ? "col-lg-7" : "col-lg"); ?>">
                <div class="product-item-detail-pay-block">
                    <?
						foreach ($arParams['PRODUCT_PAY_BLOCK_ORDER'] as $blockName)
						{
							switch ($blockName)
							{
								case 'rating':
									if ($arParams['USE_VOTE_RATING'] === 'Y')
									{
										?>
                    <div class="mb-3">
                        <?
											$APPLICATION->IncludeComponent(
												'bitrix:iblock.vote',
												'bootstrap_v4',
												array(
													'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
													'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
													'IBLOCK_ID' => $arParams['IBLOCK_ID'],
													'ELEMENT_ID' => $arResult['ID'],
													'ELEMENT_CODE' => '',
													'MAX_VOTE' => '5',
													'VOTE_NAMES' => array('1', '2', '3', '4', '5'),
													'SET_STATUS_404' => 'N',
													'DISPLAY_AS_RATING' => $arParams['VOTE_DISPLAY_AS_RATING'],
													'CACHE_TYPE' => $arParams['CACHE_TYPE'],
													'CACHE_TIME' => $arParams['CACHE_TIME']
												),
												$component,
												array('HIDE_ICONS' => 'Y')
											);
											?>
                    </div>
                    <?
									}

									break;

								case 'price':
									?>
                    <div class="mb-3">
                        <?
										if ($arParams['SHOW_OLD_PRICE'] === 'Y')
										{
											?>
                        <div class="product-item-detail-price-old mb-1" id="<?=$itemIds['OLD_PRICE_ID']?>"
                            <?=($showDiscount ? '' : 'style="display: none;"')?>;>
                            <?=($showDiscount ? $price['PRINT_RATIO_BASE_PRICE'] : '')?></div>
                        <?
										}
										?>

                        <div class="product-item-detail-price-current mb-1" id="<?=$itemIds['PRICE_ID']?>">
                            <?=$price['PRINT_RATIO_PRICE']?></div>

                        <?
										if ($arParams['SHOW_OLD_PRICE'] === 'Y')
										{
											?>
                        <div class="product-item-detail-economy-price mb-1" id="<?=$itemIds['DISCOUNT_PRICE_ID']?>"
                            <?=($showDiscount ? '' : 'style="display: none;"')?>>
                            <?
													if ($showDiscount)
													{
														echo Loc::getMessage('CT_BCE_CATALOG_ECONOMY_INFO2', array('#ECONOMY#' => $price['PRINT_RATIO_DISCOUNT']));
													}
												?>
                        </div>
                        <?
										}
										?>
                    </div>
                    <?
									break;

								case 'priceRanges':
									if ($arParams['USE_PRICE_COUNT'])
									{
										$showRanges = !$haveOffers && count($actualItem['ITEM_QUANTITY_RANGES']) > 1;
										$useRatio = $arParams['USE_RATIO_IN_RANGES'] === 'Y';
										?>
                    <div class="mb-3" <?=$showRanges ? '' : 'style="display: none;"'?> data-entity="price-ranges-block">
                        <?
											if ($arParams['MESS_PRICE_RANGES_TITLE'])
											{
												?>
                        <div class="product-item-detail-info-container-title text-center">
                            <?= $arParams['MESS_PRICE_RANGES_TITLE'] ?>
                            <span data-entity="price-ranges-ratio-header">
                                (<?= (Loc::getMessage(
															'CT_BCE_CATALOG_RATIO_PRICE',
															array('#RATIO#' => ($useRatio ? $measureRatio : '1').' '.$actualItem['ITEM_MEASURE']['TITLE'])
														)) ?>)
                            </span>
                        </div>
                        <?
											}
											?>
                        <ul class="product-item-detail-properties" data-entity="price-ranges-body">
                            <?
												if ($showRanges)
												{
													foreach ($actualItem['ITEM_QUANTITY_RANGES'] as $range)
													{
														if ($range['HASH'] !== 'ZERO-INF')
														{
															$itemPrice = false;

															foreach ($arResult['ITEM_PRICES'] as $itemPrice)
															{
																if ($itemPrice['QUANTITY_HASH'] === $range['HASH'])
																{
																	break;
																}
															}

															if ($itemPrice)
															{
																?>
                            <li class="product-item-detail-properties-item">
                                <span class="product-item-detail-properties-name text-muted">
                                    <?
																		echo Loc::getMessage(
																				'CT_BCE_CATALOG_RANGE_FROM',
																				array('#FROM#' => $range['SORT_FROM'].' '.$actualItem['ITEM_MEASURE']['TITLE'])
																			).' ';

																		if (is_infinite($range['SORT_TO']))
																		{
																			echo Loc::getMessage('CT_BCE_CATALOG_RANGE_MORE');
																		}
																		else
																		{
																			echo Loc::getMessage(
																				'CT_BCE_CATALOG_RANGE_TO',
																				array('#TO#' => $range['SORT_TO'].' '.$actualItem['ITEM_MEASURE']['TITLE'])
																			);
																		}
																		?>
                                </span>
                                <span class="product-item-detail-properties-dots"></span>
                                <span
                                    class="product-item-detail-properties-value"><?=($useRatio ? $itemPrice['PRINT_RATIO_PRICE'] : $itemPrice['PRINT_PRICE'])?></span>
                            </li>
                            <?
															}
														}
													}
												}
												?>
                        </ul>
                    </div>
                    <?
										unset($showRanges, $useRatio, $itemPrice, $range);
									}

									break;

								case 'quantityLimit':
									if ($arParams['SHOW_MAX_QUANTITY'] !== 'N')
									{
										if ($haveOffers)
										{
											?>
                    <div class="mb-3" id="<?=$itemIds['QUANTITY_LIMIT']?>" style="display: none;">
                        <div class="product-item-detail-info-container-title text-center">
                            <?=$arParams['MESS_SHOW_MAX_QUANTITY']?>:
                        </div>
                        <span class="product-item-quantity" data-entity="quantity-limit-value"></span>
                    </div>
                    <?
										}
										else
										{
											if (
												$measureRatio
												&& (float)$actualItem['PRODUCT']['QUANTITY'] > 0
												&& $actualItem['CHECK_QUANTITY']
											)
											{
												?>
                    <div class="mb-3 text-center" id="<?=$itemIds['QUANTITY_LIMIT']?>">
                        <span
                            class="product-item-detail-info-container-title"><?=$arParams['MESS_SHOW_MAX_QUANTITY']?>:</span>
                        <span class="product-item-quantity" data-entity="quantity-limit-value">
                            <?
														if ($arParams['SHOW_MAX_QUANTITY'] === 'M')
														{
															if ((float)$actualItem['PRODUCT']['QUANTITY'] / $measureRatio >= $arParams['RELATIVE_QUANTITY_FACTOR'])
															{
																echo $arParams['MESS_RELATIVE_QUANTITY_MANY'];
															}
															else
															{
																echo $arParams['MESS_RELATIVE_QUANTITY_FEW'];
															}
														}
														else
														{
															echo $actualItem['PRODUCT']['QUANTITY'].' '.$actualItem['ITEM_MEASURE']['TITLE'];
														}
														?>
                        </span>
                    </div>
                    <?
											}
										}
									}

									break;

								case 'quantity':
									if ($arParams['USE_PRODUCT_QUANTITY'])
									{
										?>
                    <div class="mb-3" <?= (!$actualItem['CAN_BUY'] ? ' style="display: none;"' : '') ?>
                        data-entity="quantity-block">
                        <?
											if (Loc::getMessage('CATALOG_QUANTITY'))
											{
												?>
                        <div class="product-item-detail-info-container-title text-center">
                            <?= Loc::getMessage('CATALOG_QUANTITY') ?></div>
                        <?
											}
											?>

                        <div class="product-item-amount">
                            <div class="product-item-amount-field-container">
                                <span class="product-item-amount-field-btn-minus no-select"
                                    id="<?=$itemIds['QUANTITY_DOWN_ID']?>"></span>
                                <input class="product-item-amount-field" id="<?=$itemIds['QUANTITY_ID']?>" type="number"
                                    value="<?=$price['MIN_QUANTITY']?>">
                                <span class="product-item-amount-field-btn-plus no-select"
                                    id="<?=$itemIds['QUANTITY_UP_ID']?>"></span>
                                <span class="product-item-amount-description-container">
                                    <span
                                        id="<?=$itemIds['QUANTITY_MEASURE']?>"><?=$actualItem['ITEM_MEASURE']['TITLE']?></span>
                                    <span id="<?=$itemIds['PRICE_TOTAL']?>"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <?
									}

									break;

								case 'buttons':
									?>
                    <div data-entity="main-button-container" class="mb-3">
                        <div id="<?=$itemIds['BASKET_ACTIONS_ID']?>"
                            style="display: <?=($actualItem['CAN_BUY'] ? '' : 'none')?>;">
                            <?
											if ($showAddBtn)
											{
												?>
                            <div class="mb-3">
                                <a class="btn <?=$showButtonClassName?> product-item-detail-buy-button"
                                    id="<?=$itemIds['ADD_BASKET_LINK']?>" href="javascript:void(0);">
                                    <?=$arParams['MESS_BTN_ADD_TO_BASKET']?>
                                </a>
                            </div>
                            <?
											}

											if ($showBuyBtn)
											{
												?>
                            <div class="mb-3">
                                <a class="btn <?=$buyButtonClassName?> product-item-detail-buy-button"
                                    id="<?=$itemIds['BUY_LINK']?>" href="javascript:void(0);">
                                    <?=$arParams['MESS_BTN_BUY']?>
                                </a>
                            </div>
                            <?
											}
											?>
                        </div>
                    </div>
                    <?
									if ($showSubscribe)
									{
										?>
                    <div class="mb-3">
                        <?
											$APPLICATION->IncludeComponent(
												'bitrix:catalog.product.subscribe',
												'',
												array(
													'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
													'PRODUCT_ID' => $arResult['ID'],
													'BUTTON_ID' => $itemIds['SUBSCRIBE_LINK'],
													'BUTTON_CLASS' => 'btn u-btn-outline-primary product-item-detail-buy-button',
													'DEFAULT_DISPLAY' => !$actualItem['CAN_BUY'],
													'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
												),
												$component,
												array('HIDE_ICONS' => 'Y')
											);
											?>
                    </div>
                    <?
									}
									?>
                    <div class="mb-3" id="<?=$itemIds['NOT_AVAILABLE_MESS']?>"
                        style="display: <?=(!$actualItem['CAN_BUY'] ? '' : 'none')?>;">
                        <a class="btn btn-primary product-item-detail-buy-button" href="javascript:void(0)"
                            rel="nofollow"><?=$arParams['MESS_NOT_AVAILABLE']?></a>
                    </div>
                    <?
									break;
							}
						}

						if ($arParams['DISPLAY_COMPARE'])
						{
							?>
                    <div class="product-item-detail-compare-container">
                        <div class="product-item-detail-compare">
                            <div class="checkbox">
                                <label class="m-0" id="<?=$itemIds['COMPARE_LINK']?>">
                                    <input type="checkbox" data-entity="compare-checkbox">
                                    <span data-entity="compare-title"><?=$arParams['MESS_BTN_COMPARE']?></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <?
						}
						?>
                </div>
            </div>
        </div>



        Другие варианты товара:<br>




        TEST

        <?
			
			
			
			
			//Задача за минимальные ресурсы, найти все элементы связанные с этим товаром Поиск 2-го уровня
			
			/*
			
			Алгоритм 
			
			1 Выводим все элементы связанные с данным товаром через поле [torgoffer] 1,2,3,4..
			
			2 Выводим элементы в котором в качестве связи указан id нашего товара "PROPERTY_torgoffer" => $arResult[ID]
			
			3 Выводим элементы которые связанны с данным товаром через поле [torgoffer] 1,2,3,4..
			
			Все элементы вносим в массив, исключая дубликаты
			
			
			
			
			$result = array_unique($input); - убрать дубликаты
			
			array_push($stack, "1", "2"); - добавление в конец массива
			
			
			
			
			$torgoggerid = [];
			
			
			
			$arFilter3_linksnew11 = Array("IBLOCK_ID"=>6,
										"PROPERTY_torgoffer" => $arResult[ID],
										"ACTIVE"=>"Y"
										);
			$res3_linksnew11 = CIBlockElement::GetList(Array(), $arFilter3_linksnew11, false, false);
			while($ob3_linksnew11 = $res3_linksnew11->GetNextElement()){
				$arFields11 = $ob3_linksnew11->GetFields();  
				$props11 = $ob3_linksnew11->GetProperties();
				
				//Вывод всех указателей на этот элемент
				array_push($torgoggerid,$arFields11[ID]);
				
				//Вывод всех указателей у выбранных указателей
				foreach($props11[torgoffer][VALUE] as $itemoffer){
					array_push($torgoggerid,$itemoffer);
				}
				
				
				
				echo $arFields11[NAME]."<br>";
				
				
			}
			
			//Вывод всех указателей у этого элемента
			foreach($arResult[PROPERTIES][torgoffer][VALUE] as $itemoffer){
				array_push($torgoggerid,$itemoffer);
				
			}
			
			
			
			$result = array_unique($torgoggerid);
			
			
			
			 
			
			
			
			
			//print_r($result);
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			//==================================================================
			
			
			
			
			
			//print_r($arResult[PROPERTIES][torgoffer][VALUE]);
			
			
			$arFilter3_linksnew = Array("IBLOCK_ID"=>6,
										"ID"=>$result,
										"ACTIVE"=>"Y"
										
										
										
										
										);
			
		/*	$arSelect_linksnew = Array("ID", "NAME", );*/
		
		
		/*
			
			$res3_linksnew = CIBlockElement::GetList(Array(), $arFilter3_linksnew, false, false);
			
			
			
			echo "
				<table>
				<tr><td>Наименование</td><td>Цвет</td><td>Цена</td><td>Размер</td></tr>";
			
			while($ob3_linksnew = $res3_linksnew->GetNextElement()){
				
				//print_r($ob3_linksnew);
				
				$arFields = $ob3_linksnew->GetFields();  
				$props = $ob3_linksnew->GetProperties(); 
				
			//	print_r($props);
				
				
			//	print_r($arFields);
			
			
			
			
			$PRICE_TYPE_ID = 1;

			$rsPrices = CPrice::GetList(array(), array('PRODUCT_ID' => $arFields['ID'], 'CATALOG_GROUP_ID' => $PRICE_TYPE_ID));
			if ($arPrice = $rsPrices->Fetch())
			{
			
			if($arFields[NAME] == $arResult[NAME])
				echo "<tr style='background-color: #f8c7f6;'><td>".$arFields[NAME]."</td><td>".$props[color][VALUE]."</td><td>".CurrencyFormat($arPrice["PRICE"], $arPrice["CURRENCY"])."</td><td>".$props[size][VALUE]."</td></tr>";
			else
				echo "<tr><td>".$arFields[NAME]."</td><td>".$props[color][VALUE]."</td><td>".CurrencyFormat($arPrice["PRICE"], $arPrice["CURRENCY"])."</td><td>".$props[size][VALUE]."</td></tr>";
				
				
			}
				
				 
			}
			
			
			echo "</table>";
			
			
			
			
			
			
			
			
			
			
			
			
				
				
				
				
				
				
				
				
				
			
			?>






        <style>
        tr:nth-child(2n) {
            background-color: #daffe5;

        }
        </style>








    </div>

</div>
<?
	if ($haveOffers)
	{
		if ($arResult['OFFER_GROUP'])
		{
			?>
<div class="row">
    <div class="col">
        <?
						foreach ($arResult['OFFER_GROUP_VALUES'] as $offerId)
						{
							?>
        <span id="<?=$itemIds['OFFER_GROUP'].$offerId?>" style="display: none;">
            <?
								$APPLICATION->IncludeComponent('bitrix:catalog.set.constructor', 'bootstrap_v4', array(
										'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
										'IBLOCK_ID' => $arResult['OFFERS_IBLOCK'],
										'ELEMENT_ID' => $offerId,
										'PRICE_CODE' => $arParams['PRICE_CODE'],
										'BASKET_URL' => $arParams['BASKET_URL'],
										'OFFERS_CART_PROPERTIES' => $arParams['OFFERS_CART_PROPERTIES'],
										'CACHE_TYPE' => $arParams['CACHE_TYPE'],
										'CACHE_TIME' => $arParams['CACHE_TIME'],
										'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
										'TEMPLATE_THEME' => $arParams['~TEMPLATE_THEME'],
										'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
										'CURRENCY_ID' => $arParams['CURRENCY_ID'],
										'DETAIL_URL' => $arParams['~DETAIL_URL']
									),
									$component,
									array('HIDE_ICONS' => 'Y')
								);
								?>
        </span>
        <?
						}
						?>
    </div>
</div>
<?
		}
	}
	else
	{
		if ($arResult['MODULES']['catalog'] && $arResult['OFFER_GROUP'])
		{
			?>
<div class="row">
    <div class="col">
        <? $APPLICATION->IncludeComponent('bitrix:catalog.set.constructor', 'bootstrap_v4',array(
								'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
								'IBLOCK_ID' => $arParams['IBLOCK_ID'],
								'ELEMENT_ID' => $arResult['ID'],
								'PRICE_CODE' => $arParams['PRICE_CODE'],
								'BASKET_URL' => $arParams['BASKET_URL'],
								'CACHE_TYPE' => $arParams['CACHE_TYPE'],
								'CACHE_TIME' => $arParams['CACHE_TIME'],
								'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
								'TEMPLATE_THEME' => $arParams['~TEMPLATE_THEME'],
								'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
								'CURRENCY_ID' => $arParams['CURRENCY_ID']
							),
							$component,
							array('HIDE_ICONS' => 'Y')
						);
						?>
    </div>
</div>
<?
		}
	}
	?>

<div class="row">
    <div class="col">
        <div class="row" id="<?=$itemIds['TABS_ID']?>">
            <div class="col">
                <div class="product-item-detail-tabs-container">
                    <ul class="product-item-detail-tabs-list">
                        <?
							if ($showDescription)
							{
								?>
                        <li class="product-item-detail-tab active" data-entity="tab" data-value="description">
                            <a href="javascript:void(0);" class="product-item-detail-tab-link">
                                <span><?=$arParams['MESS_DESCRIPTION_TAB']?></span>
                            </a>
                        </li>
                        <?
							}

							if (!empty($arResult['DISPLAY_PROPERTIES']) || $arResult['SHOW_OFFERS_PROPS'])
							{
								?>
                        <li class="product-item-detail-tab" data-entity="tab" data-value="properties">
                            <a href="javascript:void(0);" class="product-item-detail-tab-link">
                                <span><?=$arParams['MESS_PROPERTIES_TAB']?></span>
                            </a>
                        </li>
                        <?
							}

							if ($arParams['USE_COMMENTS'] === 'Y')
							{
								?>
                        <li class="product-item-detail-tab" data-entity="tab" data-value="comments">
                            <a href="javascript:void(0);" class="product-item-detail-tab-link">
                                <span><?=$arParams['MESS_COMMENTS_TAB']?></span>
                            </a>
                        </li>
                        <?
							}
							?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row" id="<?=$itemIds['TAB_CONTAINERS_ID']?>">
            <div class="col">
                <?
					if ($showDescription)
					{
						?>
                <div class="product-item-detail-tab-content active" data-entity="tab-container" data-value="description"
                    itemprop="description">
                    <?
							if (
								$arResult['PREVIEW_TEXT'] != ''
								&& (
									$arParams['DISPLAY_PREVIEW_TEXT_MODE'] === 'S'
									|| ($arParams['DISPLAY_PREVIEW_TEXT_MODE'] === 'E' && $arResult['DETAIL_TEXT'] == '')
								)
							)
							{
								echo $arResult['PREVIEW_TEXT_TYPE'] === 'html' ? $arResult['PREVIEW_TEXT'] : '<p>'.$arResult['PREVIEW_TEXT'].'</p>';
							}

							if ($arResult['DETAIL_TEXT'] != '')
							{
								echo $arResult['DETAIL_TEXT_TYPE'] === 'html' ? $arResult['DETAIL_TEXT'] : '<p>'.$arResult['DETAIL_TEXT'].'</p>';
							}
							?>
                </div>
                <?
					}

					if (!empty($arResult['DISPLAY_PROPERTIES']) || $arResult['SHOW_OFFERS_PROPS'])
					{
						?>
                <div class="product-item-detail-tab-content" data-entity="tab-container" data-value="properties">
                    <?
							if (!empty($arResult['DISPLAY_PROPERTIES']))
							{
								?>
                    <ul class="product-item-detail-properties">
                        <?
									foreach ($arResult['DISPLAY_PROPERTIES'] as $property)
									{
										?>
                        <li class="product-item-detail-properties-item">
                            <span class="product-item-detail-properties-name"><?=$property['NAME']?></span>
                            <span class="product-item-detail-properties-dots"></span>
                            <span class="product-item-detail-properties-value"><?=(
												is_array($property['DISPLAY_VALUE'])
													? implode(' / ', $property['DISPLAY_VALUE'])
													: $property['DISPLAY_VALUE']
												)?>
                            </span>
                        </li>
                        <?
									}
									unset($property);
									?>
                    </ul>
                    <?
							}

							if ($arResult['SHOW_OFFERS_PROPS'])
							{
								?>
                    <ul class="product-item-detail-properties" id="<?=$itemIds['DISPLAY_PROP_DIV']?>"></ul>
                    <?
							}
							?>
                </div>
                <?
					}

					if ($arParams['USE_COMMENTS'] === 'Y')
					{
						?>
                <div class="product-item-detail-tab-content" data-entity="tab-container" data-value="comments"
                    style="display: none;">
                    <?
							$componentCommentsParams = array(
								'ELEMENT_ID' => $arResult['ID'],
								'ELEMENT_CODE' => '',
								'IBLOCK_ID' => $arParams['IBLOCK_ID'],
								'SHOW_DEACTIVATED' => $arParams['SHOW_DEACTIVATED'],
								'URL_TO_COMMENT' => '',
								'WIDTH' => '',
								'COMMENTS_COUNT' => '5',
								'BLOG_USE' => $arParams['BLOG_USE'],
								'FB_USE' => $arParams['FB_USE'],
								'FB_APP_ID' => $arParams['FB_APP_ID'],
								'VK_USE' => $arParams['VK_USE'],
								'VK_API_ID' => $arParams['VK_API_ID'],
								'CACHE_TYPE' => $arParams['CACHE_TYPE'],
								'CACHE_TIME' => $arParams['CACHE_TIME'],
								'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
								'BLOG_TITLE' => '',
								'BLOG_URL' => $arParams['BLOG_URL'],
								'PATH_TO_SMILE' => '',
								'EMAIL_NOTIFY' => $arParams['BLOG_EMAIL_NOTIFY'],
								'AJAX_POST' => 'Y',
								'SHOW_SPAM' => 'Y',
								'SHOW_RATING' => 'N',
								'FB_TITLE' => '',
								'FB_USER_ADMIN_ID' => '',
								'FB_COLORSCHEME' => 'light',
								'FB_ORDER_BY' => 'reverse_time',
								'VK_TITLE' => '',
								'TEMPLATE_THEME' => $arParams['~TEMPLATE_THEME']
							);
							if(isset($arParams["USER_CONSENT"]))
								$componentCommentsParams["USER_CONSENT"] = $arParams["USER_CONSENT"];
							if(isset($arParams["USER_CONSENT_ID"]))
								$componentCommentsParams["USER_CONSENT_ID"] = $arParams["USER_CONSENT_ID"];
							if(isset($arParams["USER_CONSENT_IS_CHECKED"]))
								$componentCommentsParams["USER_CONSENT_IS_CHECKED"] = $arParams["USER_CONSENT_IS_CHECKED"];
							if(isset($arParams["USER_CONSENT_IS_LOADED"]))
								$componentCommentsParams["USER_CONSENT_IS_LOADED"] = $arParams["USER_CONSENT_IS_LOADED"];
							$APPLICATION->IncludeComponent(
								'bitrix:catalog.comments',
								'',
								$componentCommentsParams,
								$component,
								array('HIDE_ICONS' => 'Y')
							);
							?>
                </div>
                <?
					}
					?>
            </div>
        </div>
    </div>
    <?
			if ($arParams['BRAND_USE'] === 'Y')
			{
		?>
    <div class="col-sm-4 col-md-3">
        <? $APPLICATION->IncludeComponent('bitrix:catalog.brandblock', 'bootstrap_v4', array(
						'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
						'IBLOCK_ID' => $arParams['IBLOCK_ID'],
						'ELEMENT_ID' => $arResult['ID'],
						'ELEMENT_CODE' => '',
						'PROP_CODE' => $arParams['BRAND_PROP_CODE'],
						'CACHE_TYPE' => $arParams['CACHE_TYPE'],
						'CACHE_TIME' => $arParams['CACHE_TIME'],
						'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
						'WIDTH' => '',
						'HEIGHT' => ''
					),
					$component,
					array('HIDE_ICONS' => 'Y')
				);
				?>
    </div>
    <?
			}
		?>
</div>

<div class="row">
    <div class="col">
        <?
			if ($arResult['CATALOG'] && $actualItem['CAN_BUY'] && \Bitrix\Main\ModuleManager::isModuleInstalled('sale'))
			{
				$APPLICATION->IncludeComponent(
					'bitrix:sale.prediction.product.detail',
					'',
					array(
						'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
						'BUTTON_ID' => $showBuyBtn ? $itemIds['BUY_LINK'] : $itemIds['ADD_BASKET_LINK'],
						'POTENTIAL_PRODUCT_TO_BUY' => array(
							'ID' => isset($arResult['ID']) ? $arResult['ID'] : null,
							'MODULE' => isset($arResult['MODULE']) ? $arResult['MODULE'] : 'catalog',
							'PRODUCT_PROVIDER_CLASS' => isset($arResult['~PRODUCT_PROVIDER_CLASS']) ? $arResult['~PRODUCT_PROVIDER_CLASS'] : '\Bitrix\Catalog\Product\CatalogProvider',
							'QUANTITY' => isset($arResult['QUANTITY']) ? $arResult['QUANTITY'] : null,
							'IBLOCK_ID' => isset($arResult['IBLOCK_ID']) ? $arResult['IBLOCK_ID'] : null,

							'PRIMARY_OFFER_ID' => isset($arResult['OFFERS'][0]['ID']) ? $arResult['OFFERS'][0]['ID'] : null,
							'SECTION' => array(
								'ID' => isset($arResult['SECTION']['ID']) ? $arResult['SECTION']['ID'] : null,
								'IBLOCK_ID' => isset($arResult['SECTION']['IBLOCK_ID']) ? $arResult['SECTION']['IBLOCK_ID'] : null,
								'LEFT_MARGIN' => isset($arResult['SECTION']['LEFT_MARGIN']) ? $arResult['SECTION']['LEFT_MARGIN'] : null,
								'RIGHT_MARGIN' => isset($arResult['SECTION']['RIGHT_MARGIN']) ? $arResult['SECTION']['RIGHT_MARGIN'] : null,
							),
						)
					),
					$component,
					array('HIDE_ICONS' => 'Y')
				);
			}

			if ($arResult['CATALOG'] && $arParams['USE_GIFTS_DETAIL'] == 'Y' && \Bitrix\Main\ModuleManager::isModuleInstalled('sale'))
			{
				?>
        <div data-entity="parent-container">
            <?
					if (!isset($arParams['GIFTS_DETAIL_HIDE_BLOCK_TITLE']) || $arParams['GIFTS_DETAIL_HIDE_BLOCK_TITLE'] !== 'Y')
					{
						?>
            <div class="catalog-block-header" data-entity="header" data-showed="false"
                style="display: none; opacity: 0;">
                <?=($arParams['GIFTS_DETAIL_BLOCK_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_GIFT_BLOCK_TITLE_DEFAULT'))?>
            </div>
            <?
					}

					CBitrixComponent::includeComponentClass('bitrix:sale.products.gift');
					$APPLICATION->IncludeComponent('bitrix:sale.products.gift', 'bootstrap_v4', array(
							'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
							'PRODUCT_ID_VARIABLE' => $arParams['PRODUCT_ID_VARIABLE'],
							'ACTION_VARIABLE' => $arParams['ACTION_VARIABLE'],

							'PRODUCT_ROW_VARIANTS' => "",
							'PAGE_ELEMENT_COUNT' => 0,
							'DEFERRED_PRODUCT_ROW_VARIANTS' => \Bitrix\Main\Web\Json::encode(
								SaleProductsGiftComponent::predictRowVariants(
									$arParams['GIFTS_DETAIL_PAGE_ELEMENT_COUNT'],
									$arParams['GIFTS_DETAIL_PAGE_ELEMENT_COUNT']
								)
							),
							'DEFERRED_PAGE_ELEMENT_COUNT' => $arParams['GIFTS_DETAIL_PAGE_ELEMENT_COUNT'],

							'SHOW_DISCOUNT_PERCENT' => $arParams['GIFTS_SHOW_DISCOUNT_PERCENT'],
							'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
							'SHOW_OLD_PRICE' => $arParams['GIFTS_SHOW_OLD_PRICE'],
							'PRODUCT_DISPLAY_MODE' => 'Y',
							'PRODUCT_BLOCKS_ORDER' => $arParams['GIFTS_PRODUCT_BLOCKS_ORDER'],
							'SHOW_SLIDER' => $arParams['GIFTS_SHOW_SLIDER'],
							'SLIDER_INTERVAL' => isset($arParams['GIFTS_SLIDER_INTERVAL']) ? $arParams['GIFTS_SLIDER_INTERVAL'] : '',
							'SLIDER_PROGRESS' => isset($arParams['GIFTS_SLIDER_PROGRESS']) ? $arParams['GIFTS_SLIDER_PROGRESS'] : '',

							'TEXT_LABEL_GIFT' => $arParams['GIFTS_DETAIL_TEXT_LABEL_GIFT'],

							'LABEL_PROP_'.$arParams['IBLOCK_ID'] => array(),
							'LABEL_PROP_MOBILE_'.$arParams['IBLOCK_ID'] => array(),
							'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],

							'ADD_TO_BASKET_ACTION' => (isset($arParams['ADD_TO_BASKET_ACTION']) ? $arParams['ADD_TO_BASKET_ACTION'] : ''),
							'MESS_BTN_BUY' => $arParams['~GIFTS_MESS_BTN_BUY'],
							'MESS_BTN_ADD_TO_BASKET' => $arParams['~GIFTS_MESS_BTN_BUY'],
							'MESS_BTN_DETAIL' => $arParams['~MESS_BTN_DETAIL'],
							'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],

							'SHOW_PRODUCTS_'.$arParams['IBLOCK_ID'] => 'Y',
							'PROPERTY_CODE_'.$arParams['IBLOCK_ID'] => $arParams['LIST_PROPERTY_CODE'],
							'PROPERTY_CODE_MOBILE'.$arParams['IBLOCK_ID'] => $arParams['LIST_PROPERTY_CODE_MOBILE'],
							'PROPERTY_CODE_'.$arResult['OFFERS_IBLOCK'] => $arParams['OFFER_TREE_PROPS'],
							'OFFER_TREE_PROPS_'.$arResult['OFFERS_IBLOCK'] => $arParams['OFFER_TREE_PROPS'],
							'CART_PROPERTIES_'.$arResult['OFFERS_IBLOCK'] => $arParams['OFFERS_CART_PROPERTIES'],
							'ADDITIONAL_PICT_PROP_'.$arParams['IBLOCK_ID'] => (isset($arParams['ADD_PICT_PROP']) ? $arParams['ADD_PICT_PROP'] : ''),
							'ADDITIONAL_PICT_PROP_'.$arResult['OFFERS_IBLOCK'] => (isset($arParams['OFFER_ADD_PICT_PROP']) ? $arParams['OFFER_ADD_PICT_PROP'] : ''),

							'HIDE_NOT_AVAILABLE' => 'Y',
							'HIDE_NOT_AVAILABLE_OFFERS' => 'Y',
							'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
							'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
							'PRICE_CODE' => $arParams['PRICE_CODE'],
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
							'POTENTIAL_PRODUCT_TO_BUY' => array(
								'ID' => isset($arResult['ID']) ? $arResult['ID'] : null,
								'MODULE' => isset($arResult['MODULE']) ? $arResult['MODULE'] : 'catalog',
								'PRODUCT_PROVIDER_CLASS' => isset($arResult['~PRODUCT_PROVIDER_CLASS']) ? $arResult['~PRODUCT_PROVIDER_CLASS'] : '\Bitrix\Catalog\Product\CatalogProvider',
								'QUANTITY' => isset($arResult['QUANTITY']) ? $arResult['QUANTITY'] : null,
								'IBLOCK_ID' => isset($arResult['IBLOCK_ID']) ? $arResult['IBLOCK_ID'] : null,

								'PRIMARY_OFFER_ID' => isset($arResult['OFFERS'][$arResult['OFFERS_SELECTED']]['ID'])
									? $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]['ID']
									: null,
								'SECTION' => array(
									'ID' => isset($arResult['SECTION']['ID']) ? $arResult['SECTION']['ID'] : null,
									'IBLOCK_ID' => isset($arResult['SECTION']['IBLOCK_ID']) ? $arResult['SECTION']['IBLOCK_ID'] : null,
									'LEFT_MARGIN' => isset($arResult['SECTION']['LEFT_MARGIN']) ? $arResult['SECTION']['LEFT_MARGIN'] : null,
									'RIGHT_MARGIN' => isset($arResult['SECTION']['RIGHT_MARGIN']) ? $arResult['SECTION']['RIGHT_MARGIN'] : null,
								),
							),

							'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
							'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
							'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY']
						),
						$component,
						array('HIDE_ICONS' => 'Y')
					);
					?>
        </div>
        <?
			}

			if ($arResult['CATALOG'] && $arParams['USE_GIFTS_MAIN_PR_SECTION_LIST'] == 'Y' && \Bitrix\Main\ModuleManager::isModuleInstalled('sale'))
			{
				?>
        <div data-entity="parent-container">
            <?
					if (!isset($arParams['GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE']) || $arParams['GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE'] !== 'Y')
					{
						?>
            <div class="catalog-block-header" data-entity="header" data-showed="false"
                style="display: none; opacity: 0;">
                <?=($arParams['GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE'] ?: Loc::getMessage('CT_BCE_CATALOG_GIFTS_MAIN_BLOCK_TITLE_DEFAULT'))?>
            </div>
            <?
					}

					$APPLICATION->IncludeComponent('bitrix:sale.gift.main.products', 'bootstrap_v4', array(
							'CUSTOM_SITE_ID' => isset($arParams['CUSTOM_SITE_ID']) ? $arParams['CUSTOM_SITE_ID'] : null,
							'PAGE_ELEMENT_COUNT' => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT'],
							'LINE_ELEMENT_COUNT' => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT'],
							'HIDE_BLOCK_TITLE' => 'Y',
							'BLOCK_TITLE' => $arParams['GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE'],

							'OFFERS_FIELD_CODE' => $arParams['OFFERS_FIELD_CODE'],
							'OFFERS_PROPERTY_CODE' => $arParams['OFFERS_PROPERTY_CODE'],

							'AJAX_MODE' => $arParams['AJAX_MODE'],
							'IBLOCK_TYPE' => $arParams['IBLOCK_TYPE'],
							'IBLOCK_ID' => $arParams['IBLOCK_ID'],

							'ELEMENT_SORT_FIELD' => 'ID',
							'ELEMENT_SORT_ORDER' => 'DESC',
							//'ELEMENT_SORT_FIELD2' => $arParams['ELEMENT_SORT_FIELD2'],
							//'ELEMENT_SORT_ORDER2' => $arParams['ELEMENT_SORT_ORDER2'],
							'FILTER_NAME' => 'searchFilter',
							'SECTION_URL' => $arParams['SECTION_URL'],
							'DETAIL_URL' => $arParams['DETAIL_URL'],
							'BASKET_URL' => $arParams['BASKET_URL'],
							'ACTION_VARIABLE' => $arParams['ACTION_VARIABLE'],
							'PRODUCT_ID_VARIABLE' => $arParams['PRODUCT_ID_VARIABLE'],
							'SECTION_ID_VARIABLE' => $arParams['SECTION_ID_VARIABLE'],

							'CACHE_TYPE' => $arParams['CACHE_TYPE'],
							'CACHE_TIME' => $arParams['CACHE_TIME'],

							'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],
							'SET_TITLE' => $arParams['SET_TITLE'],
							'PROPERTY_CODE' => $arParams['PROPERTY_CODE'],
							'PRICE_CODE' => $arParams['PRICE_CODE'],
							'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
							'SHOW_PRICE_COUNT' => $arParams['SHOW_PRICE_COUNT'],

							'PRICE_VAT_INCLUDE' => $arParams['PRICE_VAT_INCLUDE'],
							'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
							'CURRENCY_ID' => $arParams['CURRENCY_ID'],
							'HIDE_NOT_AVAILABLE' => 'Y',
							'HIDE_NOT_AVAILABLE_OFFERS' => 'Y',
							'TEMPLATE_THEME' => (isset($arParams['TEMPLATE_THEME']) ? $arParams['TEMPLATE_THEME'] : ''),
							'PRODUCT_BLOCKS_ORDER' => $arParams['GIFTS_PRODUCT_BLOCKS_ORDER'],

							'SHOW_SLIDER' => $arParams['GIFTS_SHOW_SLIDER'],
							'SLIDER_INTERVAL' => isset($arParams['GIFTS_SLIDER_INTERVAL']) ? $arParams['GIFTS_SLIDER_INTERVAL'] : '',
							'SLIDER_PROGRESS' => isset($arParams['GIFTS_SLIDER_PROGRESS']) ? $arParams['GIFTS_SLIDER_PROGRESS'] : '',

							'ADD_PICT_PROP' => (isset($arParams['ADD_PICT_PROP']) ? $arParams['ADD_PICT_PROP'] : ''),
							'LABEL_PROP' => (isset($arParams['LABEL_PROP']) ? $arParams['LABEL_PROP'] : ''),
							'LABEL_PROP_MOBILE' => (isset($arParams['LABEL_PROP_MOBILE']) ? $arParams['LABEL_PROP_MOBILE'] : ''),
							'LABEL_PROP_POSITION' => (isset($arParams['LABEL_PROP_POSITION']) ? $arParams['LABEL_PROP_POSITION'] : ''),
							'OFFER_ADD_PICT_PROP' => (isset($arParams['OFFER_ADD_PICT_PROP']) ? $arParams['OFFER_ADD_PICT_PROP'] : ''),
							'OFFER_TREE_PROPS' => (isset($arParams['OFFER_TREE_PROPS']) ? $arParams['OFFER_TREE_PROPS'] : ''),
							'SHOW_DISCOUNT_PERCENT' => (isset($arParams['SHOW_DISCOUNT_PERCENT']) ? $arParams['SHOW_DISCOUNT_PERCENT'] : ''),
							'DISCOUNT_PERCENT_POSITION' => (isset($arParams['DISCOUNT_PERCENT_POSITION']) ? $arParams['DISCOUNT_PERCENT_POSITION'] : ''),
							'SHOW_OLD_PRICE' => (isset($arParams['SHOW_OLD_PRICE']) ? $arParams['SHOW_OLD_PRICE'] : ''),
							'MESS_BTN_BUY' => (isset($arParams['~MESS_BTN_BUY']) ? $arParams['~MESS_BTN_BUY'] : ''),
							'MESS_BTN_ADD_TO_BASKET' => (isset($arParams['~MESS_BTN_ADD_TO_BASKET']) ? $arParams['~MESS_BTN_ADD_TO_BASKET'] : ''),
							'MESS_BTN_DETAIL' => (isset($arParams['~MESS_BTN_DETAIL']) ? $arParams['~MESS_BTN_DETAIL'] : ''),
							'MESS_NOT_AVAILABLE' => (isset($arParams['~MESS_NOT_AVAILABLE']) ? $arParams['~MESS_NOT_AVAILABLE'] : ''),
							'ADD_TO_BASKET_ACTION' => (isset($arParams['ADD_TO_BASKET_ACTION']) ? $arParams['ADD_TO_BASKET_ACTION'] : ''),
							'SHOW_CLOSE_POPUP' => (isset($arParams['SHOW_CLOSE_POPUP']) ? $arParams['SHOW_CLOSE_POPUP'] : ''),
							'DISPLAY_COMPARE' => (isset($arParams['DISPLAY_COMPARE']) ? $arParams['DISPLAY_COMPARE'] : ''),
							'COMPARE_PATH' => (isset($arParams['COMPARE_PATH']) ? $arParams['COMPARE_PATH'] : ''),
						)
						+ array(
							'OFFER_ID' => empty($arResult['OFFERS'][$arResult['OFFERS_SELECTED']]['ID'])
								? $arResult['ID']
								: $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]['ID'],
							'SECTION_ID' => $arResult['SECTION']['ID'],
							'ELEMENT_ID' => $arResult['ID'],

							'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
							'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
							'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY']
						),
						$component,
						array('HIDE_ICONS' => 'Y')
					);
					?>
        </div>
        <?
			}
			?>
    </div>
</div>

<!--Small Card-->
<div class="p-2 product-item-detail-short-card-fixed d-none d-md-block" id="<?=$itemIds['SMALL_CARD_PANEL_ID']?>">
    <div class="product-item-detail-short-card-content-container">
        <div class="product-item-detail-short-card-image">
            <img src="" style="height: 65px;" data-entity="panel-picture">
        </div>
        <div class="product-item-detail-short-title-container" data-entity="panel-title">
            <div class="product-item-detail-short-title-text"><?=$name?></div>
            <?
				if ($haveOffers)
				{
					?>
            <div>
                <div class="product-item-selected-scu-container" data-entity="panel-sku-container">
                    <?
							$i = 0;

							foreach ($arResult['SKU_PROPS'] as $skuProperty)
							{
								if (!isset($arResult['OFFERS_PROP'][$skuProperty['CODE']]))
								{
									continue;
								}

								$propertyId = $skuProperty['ID'];

								foreach ($skuProperty['VALUES'] as $value)
								{
									$value['NAME'] = htmlspecialcharsbx($value['NAME']);
									if ($skuProperty['SHOW_MODE'] === 'PICT')
									{
										?>
                    <div class="product-item-selected-scu product-item-selected-scu-color selected"
                        title="<?=$value['NAME']?>"
                        style="background-image: url('<?=$value['PICT']['SRC']?>'); display: none;"
                        data-sku-line="<?=$i?>" data-treevalue="<?=$propertyId?>_<?=$value['ID']?>"
                        data-onevalue="<?=$value['ID']?>">
                    </div>
                    <?
									}
									else
									{
										?>
                    <div class="product-item-selected-scu product-item-selected-scu-text selected"
                        title="<?=$value['NAME']?>" style="display: none;" data-sku-line="<?=$i?>"
                        data-treevalue="<?=$propertyId?>_<?=$value['ID']?>" data-onevalue="<?=$value['ID']?>">
                        <?=$value['NAME']?>
                    </div>
                    <?
									}
								}

								$i++;
							}
							?>
                </div>
            </div>
            <?
				}
				?>

        </div>
        <div class="product-item-detail-short-card-price">
            <?
				if ($arParams['SHOW_OLD_PRICE'] === 'Y')
				{
					?>
            <div class="product-item-detail-price-old" style="display: <?=($showDiscount ? '' : 'none')?>;"
                data-entity="panel-old-price">
                <?=($showDiscount ? $price['PRINT_RATIO_BASE_PRICE'] : '')?>
            </div>
            <?
				}
				?>
            <div class="product-item-detail-price-current" data-entity="panel-price"><?=$price['PRINT_RATIO_PRICE']?>
            </div>
        </div>
        <?
			if ($showAddBtn)
			{
				?>
        <div class="product-item-detail-short-card-btn" style="display: <?=($actualItem['CAN_BUY'] ? '' : 'none')?>;"
            data-entity="panel-add-button">
            <a class="btn <?=$showButtonClassName?> product-item-detail-buy-button"
                id="<?=$itemIds['ADD_BASKET_LINK']?>" href="javascript:void(0);">
                <?=$arParams['MESS_BTN_ADD_TO_BASKET']?>
            </a>
        </div>
        <?
			}

			if ($showBuyBtn)
			{
				?>
        <div class="product-item-detail-short-card-btn" style="display: <?=($actualItem['CAN_BUY'] ? '' : 'none')?>;"
            data-entity="panel-buy-button">
            <a class="btn <?=$buyButtonClassName?> product-item-detail-buy-button" id="<?=$itemIds['BUY_LINK']?>"
                href="javascript:void(0);">
                <?=$arParams['MESS_BTN_BUY']?>
            </a>
        </div>
        <?
			}
			?>
        <div class="product-item-detail-short-card-btn" style="display: <?=(!$actualItem['CAN_BUY'] ? '' : 'none')?>;"
            data-entity="panel-not-available-button">
            <a class="btn btn-link product-item-detail-buy-button" href="javascript:void(0)" rel="nofollow">
                <?=$arParams['MESS_NOT_AVAILABLE']?>
            </a>
        </div>
    </div>
</div>
<!--Top tabs-->
<div class="pt-2 pb-0 product-item-detail-tabs-container-fixed d-none d-md-block" id="<?=$itemIds['TABS_PANEL_ID']?>">
    <ul class="product-item-detail-tabs-list">
        <?
			if ($showDescription)
			{
				?>
        <li class="product-item-detail-tab active" data-entity="tab" data-value="description">
            <a href="javascript:void(0);" class="product-item-detail-tab-link">
                <span><?=$arParams['MESS_DESCRIPTION_TAB']?></span>
            </a>
        </li>
        <?
			}

			if (!empty($arResult['DISPLAY_PROPERTIES']) || $arResult['SHOW_OFFERS_PROPS'])
			{
				?>
        <li class="product-item-detail-tab" data-entity="tab" data-value="properties">
            <a href="javascript:void(0);" class="product-item-detail-tab-link">
                <span><?=$arParams['MESS_PROPERTIES_TAB']?></span>
            </a>
        </li>
        <?
			}

			if ($arParams['USE_COMMENTS'] === 'Y')
			{
				?>
        <li class="product-item-detail-tab" data-entity="tab" data-value="comments">
            <a href="javascript:void(0);" class="product-item-detail-tab-link">
                <span><?=$arParams['MESS_COMMENTS_TAB']?></span>
            </a>
        </li>
        <?
			}
			?>
    </ul>
</div>

<meta itemprop="name" content="<?=$name?>" />
<meta itemprop="category" content="<?=$arResult['CATEGORY_PATH']?>" />
<?
	if ($haveOffers)
	{
		foreach ($arResult['JS_OFFERS'] as $offer)
		{
			$currentOffersList = array();

			if (!empty($offer['TREE']) && is_array($offer['TREE']))
			{
				foreach ($offer['TREE'] as $propName => $skuId)
				{
					$propId = (int)substr($propName, 5);

					foreach ($skuProps as $prop)
					{
						if ($prop['ID'] == $propId)
						{
							foreach ($prop['VALUES'] as $propId => $propValue)
							{
								if ($propId == $skuId)
								{
									$currentOffersList[] = $propValue['NAME'];
									break;
								}
							}
						}
					}
				}
			}

			$offerPrice = $offer['ITEM_PRICES'][$offer['ITEM_PRICE_SELECTED']];
			?>
<span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
    <meta itemprop="sku" content="<?=htmlspecialcharsbx(implode('/', $currentOffersList))?>" />
    <meta itemprop="price" content="<?=$offerPrice['RATIO_PRICE']?>" />
    <meta itemprop="priceCurrency" content="<?=$offerPrice['CURRENCY']?>" />
    <link itemprop="availability" href="http://schema.org/<?=($offer['CAN_BUY'] ? 'InStock' : 'OutOfStock')?>" />
</span>
<?
		}

		unset($offerPrice, $currentOffersList);
	}
	else
	{
		?>
<span itemprop="offers" itemscope itemtype="http://schema.org/Offer">
    <meta itemprop="price" content="<?=$price['RATIO_PRICE']?>" />
    <meta itemprop="priceCurrency" content="<?=$price['CURRENCY']?>" />
    <link itemprop="availability" href="http://schema.org/<?=($actualItem['CAN_BUY'] ? 'InStock' : 'OutOfStock')?>" />
</span>
<?
	}
	?>






<?
	if ($haveOffers)
	{
		$offerIds = array();
		$offerCodes = array();

		$useRatio = $arParams['USE_RATIO_IN_RANGES'] === 'Y';

		foreach ($arResult['JS_OFFERS'] as $ind => &$jsOffer)
		{
			$offerIds[] = (int)$jsOffer['ID'];
			$offerCodes[] = $jsOffer['CODE'];

			$fullOffer = $arResult['OFFERS'][$ind];
			$measureName = $fullOffer['ITEM_MEASURE']['TITLE'];

			$strAllProps = '';
			$strMainProps = '';
			$strPriceRangesRatio = '';
			$strPriceRanges = '';

			if ($arResult['SHOW_OFFERS_PROPS'])
			{
				if (!empty($jsOffer['DISPLAY_PROPERTIES']))
				{
					foreach ($jsOffer['DISPLAY_PROPERTIES'] as $property)
					{
						$current = '<li class="product-item-detail-properties-item">
						<span class="product-item-detail-properties-name">'.$property['NAME'].'</span>
						<span class="product-item-detail-properties-dots"></span>
						<span class="product-item-detail-properties-value">'.(
							is_array($property['VALUE'])
								? implode(' / ', $property['VALUE'])
								: $property['VALUE']
							).'</span></li>';
						$strAllProps .= $current;

						if (isset($arParams['MAIN_BLOCK_OFFERS_PROPERTY_CODE'][$property['CODE']]))
						{
							$strMainProps .= $current;
						}
					}

					unset($current);
				}
			}











			if ($arParams['USE_PRICE_COUNT'] && count($jsOffer['ITEM_QUANTITY_RANGES']) > 1)
			{
				$strPriceRangesRatio = '('.Loc::getMessage(
						'CT_BCE_CATALOG_RATIO_PRICE',
						array('#RATIO#' => ($useRatio
								? $fullOffer['ITEM_MEASURE_RATIOS'][$fullOffer['ITEM_MEASURE_RATIO_SELECTED']]['RATIO']
								: '1'
							).' '.$measureName)
					).')';

				foreach ($jsOffer['ITEM_QUANTITY_RANGES'] as $range)
				{
					if ($range['HASH'] !== 'ZERO-INF')
					{
						$itemPrice = false;

						foreach ($jsOffer['ITEM_PRICES'] as $itemPrice)
						{
							if ($itemPrice['QUANTITY_HASH'] === $range['HASH'])
							{
								break;
							}
						}

						if ($itemPrice)
						{
							$strPriceRanges .= '<dt>'.Loc::getMessage(
									'CT_BCE_CATALOG_RANGE_FROM',
									array('#FROM#' => $range['SORT_FROM'].' '.$measureName)
								).' ';

							if (is_infinite($range['SORT_TO']))
							{
								$strPriceRanges .= Loc::getMessage('CT_BCE_CATALOG_RANGE_MORE');
							}
							else
							{
								$strPriceRanges .= Loc::getMessage(
									'CT_BCE_CATALOG_RANGE_TO',
									array('#TO#' => $range['SORT_TO'].' '.$measureName)
								);
							}

							$strPriceRanges .= '</dt><dd>'.($useRatio ? $itemPrice['PRINT_RATIO_PRICE'] : $itemPrice['PRINT_PRICE']).'</dd>';
						}
					}
				}

				unset($range, $itemPrice);
			}

			$jsOffer['DISPLAY_PROPERTIES'] = $strAllProps;
			$jsOffer['DISPLAY_PROPERTIES_MAIN_BLOCK'] = $strMainProps;
			$jsOffer['PRICE_RANGES_RATIO_HTML'] = $strPriceRangesRatio;
			$jsOffer['PRICE_RANGES_HTML'] = $strPriceRanges;
		}

		$templateData['OFFER_IDS'] = $offerIds;
		$templateData['OFFER_CODES'] = $offerCodes;
		unset($jsOffer, $strAllProps, $strMainProps, $strPriceRanges, $strPriceRangesRatio, $useRatio);

		$jsParams = array(
			'CONFIG' => array(
				'USE_CATALOG' => $arResult['CATALOG'],
				'SHOW_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
				'SHOW_PRICE' => true,
				'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'] === 'Y',
				'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'] === 'Y',
				'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
				'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
				'SHOW_SKU_PROPS' => $arResult['SHOW_OFFERS_PROPS'],
				'OFFER_GROUP' => $arResult['OFFER_GROUP'],
				'MAIN_PICTURE_MODE' => $arParams['DETAIL_PICTURE_MODE'],
				'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
				'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'] === 'Y',
				'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
				'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
				'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
				'USE_STICKERS' => true,
				'USE_SUBSCRIBE' => $showSubscribe,
				'SHOW_SLIDER' => $arParams['SHOW_SLIDER'],
				'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
				'ALT' => $alt,
				'TITLE' => $title,
				'MAGNIFIER_ZOOM_PERCENT' => 200,
				'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
				'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
				'BRAND_PROPERTY' => !empty($arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']])
					? $arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']]['DISPLAY_VALUE']
					: null
			),
			'PRODUCT_TYPE' => $arResult['PRODUCT']['TYPE'],
			'VISUAL' => $itemIds,
			'DEFAULT_PICTURE' => array(
				'PREVIEW_PICTURE' => $arResult['DEFAULT_PICTURE'],
				'DETAIL_PICTURE' => $arResult['DEFAULT_PICTURE']
			),
			'PRODUCT' => array(
				'ID' => $arResult['ID'],
				'ACTIVE' => $arResult['ACTIVE'],
				'NAME' => $arResult['~NAME'],
				'CATEGORY' => $arResult['CATEGORY_PATH']
			),
			'BASKET' => array(
				'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
				'BASKET_URL' => $arParams['BASKET_URL'],
				'SKU_PROPS' => $arResult['OFFERS_PROP_CODES'],
				'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
				'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
			),
			'OFFERS' => $arResult['JS_OFFERS'],
			'OFFER_SELECTED' => $arResult['OFFERS_SELECTED'],
			'TREE_PROPS' => $skuProps
		);
	}
	else
	{
		$emptyProductProperties = empty($arResult['PRODUCT_PROPERTIES']);
		if ($arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y' && !$emptyProductProperties)
		{
			?>
<div id="<?=$itemIds['BASKET_PROP_DIV']?>" style="display: none;">
    <?
				if (!empty($arResult['PRODUCT_PROPERTIES_FILL']))
				{
					foreach ($arResult['PRODUCT_PROPERTIES_FILL'] as $propId => $propInfo)
					{
						?>
    <input type="hidden" name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propId?>]"
        value="<?=htmlspecialcharsbx($propInfo['ID'])?>">
    <?
						unset($arResult['PRODUCT_PROPERTIES'][$propId]);
					}
				}

				$emptyProductProperties = empty($arResult['PRODUCT_PROPERTIES']);
				if (!$emptyProductProperties)
				{
					?>
    <table>
        <?
						foreach ($arResult['PRODUCT_PROPERTIES'] as $propId => $propInfo)
						{
							?>
        <tr>
            <td><?=$arResult['PROPERTIES'][$propId]['NAME']?></td>
            <td>
                <?
									if (
										$arResult['PROPERTIES'][$propId]['PROPERTY_TYPE'] === 'L'
										&& $arResult['PROPERTIES'][$propId]['LIST_TYPE'] === 'C'
									)
									{
										foreach ($propInfo['VALUES'] as $valueId => $value)
										{
											?>
                <label>
                    <input type="radio" name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propId?>]"
                        value="<?=$valueId?>" <?=($valueId == $propInfo['SELECTED'] ? '"checked"' : '')?>>
                    <?=$value?>
                </label>
                <br>
                <?
										}
									}
									else
									{
										?>
                <select name="<?=$arParams['PRODUCT_PROPS_VARIABLE']?>[<?=$propId?>]">
                    <?
											foreach ($propInfo['VALUES'] as $valueId => $value)
											{
												?>
                    <option value="<?=$valueId?>" <?=($valueId == $propInfo['SELECTED'] ? '"selected"' : '')?>>
                        <?=$value?>
                    </option>
                    <?
											}
											?>
                </select>
                <?
									}
									?>
            </td>
        </tr>
        <?
						}
						?>
    </table>
    <?
				}
				?>
</div>
<?
		}
		
		*/?>

<?
		
	/*	
		

		$jsParams = array(
			'CONFIG' => array(
				'USE_CATALOG' => $arResult['CATALOG'],
				'SHOW_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
				'SHOW_PRICE' => !empty($arResult['ITEM_PRICES']),
				'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'] === 'Y',
				'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'] === 'Y',
				'USE_PRICE_COUNT' => $arParams['USE_PRICE_COUNT'],
				'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
				'MAIN_PICTURE_MODE' => $arParams['DETAIL_PICTURE_MODE'],
				'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
				'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'] === 'Y',
				'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
				'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
				'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
				'USE_STICKERS' => true,
				'USE_SUBSCRIBE' => $showSubscribe,
				'SHOW_SLIDER' => $arParams['SHOW_SLIDER'],
				'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
				'ALT' => $alt,
				'TITLE' => $title,
				'MAGNIFIER_ZOOM_PERCENT' => 200,
				'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
				'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
				'BRAND_PROPERTY' => !empty($arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']])
					? $arResult['DISPLAY_PROPERTIES'][$arParams['BRAND_PROPERTY']]['DISPLAY_VALUE']
					: null
			),
			'VISUAL' => $itemIds,
			'PRODUCT_TYPE' => $arResult['PRODUCT']['TYPE'],
			'PRODUCT' => array(
				'ID' => $arResult['ID'],
				'ACTIVE' => $arResult['ACTIVE'],
				'PICT' => reset($arResult['MORE_PHOTO']),
				'NAME' => $arResult['~NAME'],
				'SUBSCRIPTION' => true,
				'ITEM_PRICE_MODE' => $arResult['ITEM_PRICE_MODE'],
				'ITEM_PRICES' => $arResult['ITEM_PRICES'],
				'ITEM_PRICE_SELECTED' => $arResult['ITEM_PRICE_SELECTED'],
				'ITEM_QUANTITY_RANGES' => $arResult['ITEM_QUANTITY_RANGES'],
				'ITEM_QUANTITY_RANGE_SELECTED' => $arResult['ITEM_QUANTITY_RANGE_SELECTED'],
				'ITEM_MEASURE_RATIOS' => $arResult['ITEM_MEASURE_RATIOS'],
				'ITEM_MEASURE_RATIO_SELECTED' => $arResult['ITEM_MEASURE_RATIO_SELECTED'],
				'SLIDER_COUNT' => $arResult['MORE_PHOTO_COUNT'],
				'SLIDER' => $arResult['MORE_PHOTO'],
				'CAN_BUY' => $arResult['CAN_BUY'],
				'CHECK_QUANTITY' => $arResult['CHECK_QUANTITY'],
				'QUANTITY_FLOAT' => is_float($arResult['ITEM_MEASURE_RATIOS'][$arResult['ITEM_MEASURE_RATIO_SELECTED']]['RATIO']),
				'MAX_QUANTITY' => $arResult['PRODUCT']['QUANTITY'],
				'STEP_QUANTITY' => $arResult['ITEM_MEASURE_RATIOS'][$arResult['ITEM_MEASURE_RATIO_SELECTED']]['RATIO'],
				'CATEGORY' => $arResult['CATEGORY_PATH']
			),
			'BASKET' => array(
				'ADD_PROPS' => $arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y',
				'QUANTITY' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
				'PROPS' => $arParams['PRODUCT_PROPS_VARIABLE'],
				'EMPTY_PROPS' => $emptyProductProperties,
				'BASKET_URL' => $arParams['BASKET_URL'],
				'ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
				'BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE']
			)
		);
		unset($emptyProductProperties);
	//}

	if ($arParams['DISPLAY_COMPARE'])
	{
		$jsParams['COMPARE'] = array(
			'COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
			'COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
			'COMPARE_PATH' => $arParams['COMPARE_PATH']
		);
	}
	?>
</div>


<script>
BX.message({
    ECONOMY_INFO_MESSAGE: '<?=GetMessageJS('
    CT_BCE_CATALOG_ECONOMY_INFO2 ')?>',
    TITLE_ERROR: '<?=GetMessageJS('
    CT_BCE_CATALOG_TITLE_ERROR ')?>',
    TITLE_BASKET_PROPS: '<?=GetMessageJS('
    CT_BCE_CATALOG_TITLE_BASKET_PROPS ')?>',
    BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('
    CT_BCE_CATALOG_BASKET_UNKNOWN_ERROR ')?>',
    BTN_SEND_PROPS: '<?=GetMessageJS('
    CT_BCE_CATALOG_BTN_SEND_PROPS ')?>',
    BTN_MESSAGE_BASKET_REDIRECT: '<?=GetMessageJS('
    CT_BCE_CATALOG_BTN_MESSAGE_BASKET_REDIRECT ')?>',
    BTN_MESSAGE_CLOSE: '<?=GetMessageJS('
    CT_BCE_CATALOG_BTN_MESSAGE_CLOSE ')?>',
    BTN_MESSAGE_CLOSE_POPUP: '<?=GetMessageJS('
    CT_BCE_CATALOG_BTN_MESSAGE_CLOSE_POPUP ')?>',
    TITLE_SUCCESSFUL: '<?=GetMessageJS('
    CT_BCE_CATALOG_ADD_TO_BASKET_OK ')?>',
    COMPARE_MESSAGE_OK: '<?=GetMessageJS('
    CT_BCE_CATALOG_MESS_COMPARE_OK ')?>',
    COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('
    CT_BCE_CATALOG_MESS_COMPARE_UNKNOWN_ERROR ')?>',
    COMPARE_TITLE: '<?=GetMessageJS('
    CT_BCE_CATALOG_MESS_COMPARE_TITLE ')?>',
    BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS('
    CT_BCE_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT ')?>',
    PRODUCT_GIFT_LABEL: '<?=GetMessageJS('
    CT_BCE_CATALOG_PRODUCT_GIFT_LABEL ')?>',
    PRICE_TOTAL_PREFIX: '<?=GetMessageJS('
    CT_BCE_CATALOG_MESS_PRICE_TOTAL_PREFIX ')?>',
    RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape($arParams['
    MESS_RELATIVE_QUANTITY_MANY '])?>',
    RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['
    MESS_RELATIVE_QUANTITY_FEW '])?>',
    SITE_ID: '<?=CUtil::JSEscape($component->getSiteId())?>'
});

var < ? = $obName ? > = new JCCatalogElement( < ? = CUtil::PhpToJSObject($jsParams, false, true) ? > );
</script>

*/?>

<?/*
unset($actualItem, $itemIds, $jsParams);*/
?>