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

if (!empty($arResult['CURRENCIES'])) {
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


unset($currencyList, $templateLibrary);

$mainId = $this->GetEditAreaId($arResult['ID']);
$itemIds = array(
	'ID' => $mainId,
	'DISCOUNT_PERCENT_ID' => $mainId . '_dsc_pict',
	'STICKER_ID' => $mainId . '_sticker',
	'BIG_SLIDER_ID' => $mainId . '_big_slider',
	'BIG_IMG_CONT_ID' => $mainId . '_bigimg_cont',
	'SLIDER_CONT_ID' => $mainId . '_slider_cont',
	'OLD_PRICE_ID' => $mainId . '_old_price',
	'PRICE_ID' => $mainId . '_price',
	'DISCOUNT_PRICE_ID' => $mainId . '_price_discount',
	'PRICE_TOTAL' => $mainId . '_price_total',
	'SLIDER_CONT_OF_ID' => $mainId . '_slider_cont_',
	'QUANTITY_ID' => $mainId . '_quantity',
	'QUANTITY_DOWN_ID' => $mainId . '_quant_down',
	'QUANTITY_UP_ID' => $mainId . '_quant_up',
	'QUANTITY_MEASURE' => $mainId . '_quant_measure',
	'QUANTITY_LIMIT' => $mainId . '_quant_limit',
	'BUY_LINK' => $mainId . '_buy_link',
	'ADD_BASKET_LINK' => $mainId . '_add_basket_link',
	'BASKET_ACTIONS_ID' => $mainId . '_basket_actions',
	'NOT_AVAILABLE_MESS' => $mainId . '_not_avail',
	'COMPARE_LINK' => $mainId . '_compare_link',
	'TREE_ID' => $mainId . '_skudiv',
	'DISPLAY_PROP_DIV' => $mainId . '_sku_prop',
	'DISPLAY_MAIN_PROP_DIV' => $mainId . '_main_sku_prop',
	'OFFER_GROUP' => $mainId . '_set_group_',
	'BASKET_PROP_DIV' => $mainId . '_basket_prop',
	'SUBSCRIBE_LINK' => $mainId . '_subscribe',
	'TABS_ID' => $mainId . '_tabs',
	'TAB_CONTAINERS_ID' => $mainId . '_tab_containers',
	'SMALL_CARD_PANEL_ID' => $mainId . '_small_card_panel',
	'TABS_PANEL_ID' => $mainId . '_tabs_panel'
);
$obName = $templateData['JS_OBJ'] = 'ob' . preg_replace('/[^a-zA-Z0-9_]/', 'x', $mainId);
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
if ($haveOffers) {
	$actualItem = isset($arResult['OFFERS'][$arResult['OFFERS_SELECTED']])
		? $arResult['OFFERS'][$arResult['OFFERS_SELECTED']]
		: reset($arResult['OFFERS']);
	$showSliderControls = false;

	foreach ($arResult['OFFERS'] as $offer) {
		if ($offer['MORE_PHOTO_COUNT'] > 1) {
			$showSliderControls = true;
			break;
		}
	}
} else {
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
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION'])) {
	foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos) {
		$discountPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
	}
}

$labelPositionClass = 'product-item-label-big';
if (!empty($arParams['LABEL_PROP_POSITION'])) {
	foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos) {
		$labelPositionClass .= isset($positionClassMap[$pos]) ? ' ' . $positionClassMap[$pos] : '';
	}
}

$themeClass = isset($arParams['TEMPLATE_THEME']) ? ' bx-' . $arParams['TEMPLATE_THEME'] : '';
?>


<?
// Для определения вариаций цветов

$imgcolors = [];

$generalcolors = [];

if (CModule::IncludeModule('highloadblock')) {

	$ID = 5;

	$hldata = Bitrix\Highloadblock\HighloadBlockTable::getById($ID)->fetch();
	$hlentity = Bitrix\Highloadblock\HighloadBlockTable::compileEntity($hldata);
	$hlDataClass = $hldata["NAME"] . "Table";

	$result = $hlDataClass::getList(array(
		"select" => array("ID", "UF_NAME", "UF_XML_ID", "UF_FILE"), // Поля для выборки
		"order" => array("UF_SORT" => "ASC"),
		"filter" => array("UF_XML_ID" => $arResult[PROPERTIES][color][VALUE])

	));

	while ($res1 = $result->fetch()) {
		array_push($imgcolors, array("Name" => $res1[UF_NAME], "file" => $res1[UF_FILE]));
	}



	//Скрипт для вывода цвета
	$result = $hlDataClass::getList(array(
		"select" => array("ID", "UF_NAME", "UF_XML_ID", "UF_FILE"), // Поля для выборки
		"order" => array("UF_SORT" => "ASC"),
		"filter" => array("UF_XML_ID" => $arResult[PROPERTIES][color][VALUE])

	));

	while ($res1 = $result->fetch()) {
		array_push($generalcolors, array("Name" => $res1[UF_NAME]));
	}
}

?>




<? //Хлебные крошки десктоп 
?>
<div class="deskver">
	<?


	$pos = strpos($_SESSION['breadcr'][1][URL], $arParams["~SECTION_CODE"]);
	$katalogurl = "/katalog-tovarov-3/";
	$sectionfolder = $katalogurl . $arParams["~SECTION_CODE"];

	if ($pos) { ?>

		<div class="custompv">
			<div class="wrapper__main">
				<div class="breadcrumbs">
					<div class="container">
						<div class="container__wrap">
							<div class="breadcrumbs__items" itemscope="" itemtype="http://schema.org/BreadcrumbList">


								<span class="breadcrumbs__item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
									<a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная" href="/">
										<span itemprop="name">Главная</span>
										<meta itemprop="position" content="1">
									</a>
								</span>





								<?
								foreach ($_SESSION['breadcr'] as $key => $crumb) {

									if ($crumb[URL]) {
								?>
										<span class="breadcrumbs__item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
											<a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная" href="<?= $crumb[URL]; ?>">
												<span itemprop="name"><?= $crumb[NAME]; ?></span>
												<meta itemprop="position" content="1">
											</a>
										</span>

								<?
									}
								}
								?>





								<span class="breadcrumbs__item">
									<span class="breadcrumbs__text"><?= $name ?></span>
								</span>


							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



	<?
	} else {
	?>
		<?
		$SectList = CIBlockSection::GetList(array(), array(
			"IBLOCK_ID" => 6,
			"ACTIVE" => "Y",
		), false, array("ID", "IBLOCK_ID", "IBLOCK_TYPE_ID", "IBLOCK_SECTION_ID", "CODE", "SECTION_ID", "NAME", "SECTION_PAGE_URL"));
		
		?>
		<div class="custompv">
			<div class="wrapper__main">
				<div class="breadcrumbs">
					<div class="container">
						<div class="container__wrap">
							<div class="breadcrumbs__items" itemscope="" itemtype="http://schema.org/BreadcrumbList">


								<span class="breadcrumbs__item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
									<a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная" href="/">
										<span itemprop="name">Главная</span>
										<meta itemprop="position" content="1">
									</a>
								</span>

								<span class="breadcrumbs__item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
									<a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная" href="<?= $katalogurl; ?>">
										<span itemprop="name">Каталог</span>
										<meta itemprop="position" content="1">
									</a>
								</span>



								<? if ($arResult[SECTION][SECTION_PAGE_URL]) { ?>
									<span class="breadcrumbs__item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
										<a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная" href="<?= $arResult[SECTION][SECTION_PAGE_URL]; ?>">
											<span itemprop="name"><?= $arResult[SECTION][NAME]; ?></span>
											<meta itemprop="position" content="1">
										</a>
									</span>
								<? } ?>





								<span class="breadcrumbs__item">
									<span class="breadcrumbs__text"><?= $name ?></span>
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


	<? // Детальное описание товара 
	?>
	

	<? // Закрепленный товар в шапке
	?>
	<div class="propductLine" style="top: 60px; left: 0px;">
		<div class="container">
			<div class="container__wrap">
				<div class="propductLine__wrap">
					<div class="propductLine__col one">
						<div class="propductLine-item">
							<div class="propductLine-item__col one">
								<div class="propductLine__pic"><img class="propductLine__img" src="<?= CFile::GetPath($arResult[PROPERTIES][Gallery][VALUE][0]); ?>" alt=""></div>
							</div>
							<div class="propductLine-item__col two">
								<div class="propductLine__name">
									<?= $arResult[NAME]; ?>
								</div>
								<div class="propductLine__art">Артикул: <?= $arResult[PROPERTIES][Article][VALUE]; ?></div>
							</div>
						</div>
					</div>











					<div class="propductLine__col two">
						<div class="propductLine-prop">
							<div class="propductLine-prop__col one"><a class="propductLine-prop__back-prop" href="javascript:void(0);" onclick="window.scrollTo( 0, $('#charr1').position().top);">Вернуться к характеристикам</a></div>
							<div class="propductLine-prop__col two">







								<div class="popupAddBasket-item-count">
									<div class="popupAddBasket-item-count__col one">
										<button class="popupAddBasket-item-count__btn minus" data-type="minus">-</button>
									</div>
									<div class="popupAddBasket-item-count__col two">
										<div class="popupAddBasket-item-count__input">
											<input class="popupAddBasket-item-count__input-text sectionCatalogList-items-count__input-text" value="1">
										</div>
									</div>
									<div class="popupAddBasket-item-count__col three">
										<button class="popupAddBasket-item-count__btn plus" data-type="plus">+</button>
									</div>
								</div>
							</div>









							<div class="propductLine-prop__col three">
								<div class="propductLine-prop-price">
								
									<div class="catalogDetailInfo-buy__price-old" style="<?= (ceil($arResult[ITEM_PRICES][0][UNROUND_BASE_PRICE]) > ceil($arResult[ITEM_PRICES][0][UNROUND_PRICE]) ? '' : 'font-style: normal;font-weight: 600;font-size: 20px;line-height: 34px;color: #2f2f2f;text-decoration-line: unset;') ?>">

										<?= number_format(ceil($arResult[ITEM_PRICES][0][UNROUND_BASE_PRICE]), 0, ',', ' ') . " руб."; ?></div>
										
								
									<div class="catalogDetailInfo-buy__price" style="<?= (ceil($arResult[ITEM_PRICES][0][UNROUND_BASE_PRICE]) > ceil($arResult[ITEM_PRICES][0][UNROUND_PRICE]) ? 'font-style: normal;font-weight: 600;font-size: 20px;line-height: 27px;color: #ff4500;' : 'display: none;') ?>">

										<?= number_format(ceil($arResult[ITEM_PRICES][0][UNROUND_PRICE]), 0, ',', ' ') . " руб."; ?>

									</div>
									
									



								</div>
							</div>


							<div class="propductLine-prop__col four">
								<button class="propductLine-prop__btn btn-common-empty buy-but1" data-msg-ok="Купить" href="javascript:void(0)" data-value="<?= $arResult[ID]; ?>" style="<?= $itInBasket ? "background: #2f2f2f !important;" : ""; ?> font-size: 13px;"><?= $itInBasket ? "Добавлено" : "Купить"; ?></button>
							</div>






						</div>
					</div>




				</div>
			</div>
		</div>
	</div>


	<style>

	</style>





	<? // Детальное описание товара 
	?>
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
										foreach ($arResult[PROPERTIES][Gallery][VALUE] as $key => $imgg121) {
										?>
											<div class="catalogDetailPhoto-mini__item" onclick="$('.catalogDetailPhoto-big__popup.two').attr('href', '<?= CFile::GetPath($imgg121); ?>');">
												<div class="catalogDetailPhoto-mini__pic"><img class="catalogDetailPhoto-mini__img" src="<?= CFile::GetPath($imgg121); ?>" alt="" /></div>
											</div>
										<?
										}
										?>

									</div>
								</div>
							</div>




							<div class="catalogDetailPhoto__col two">
								<div class="catalogDetailPhoto-big">



									<div class="catalogDetailPhoto-big__popup three" style="opacity:0;"><span class="catalogDetailPhoto-big__toggleTitle toggleTitle" data-title="Смотреть">
											<div class="lnr lnr-camera-video catalogDetailPhoto-big__icon"></div>
											<div class="catalogDetailPhoto-big__popup-title" data-show="видео" data-hide="смотреть">видео</div>
										</span>
									</div>


									<div class="catalogDetailPhoto-big__popup one">
										<div class="lnr lnr-exit-up catalogDetailPhoto-big__icon toggleTitle" data-title="Поделиться">

											<? //Поделиться
											?>

										</div><span class="share-popup"><span class="share-popup__items">

 

<a class="share-popup__item"  title="Поделиться в whatsapp" target="_blank" href="https://api.whatsapp.com/send?text=<?= urlencode($arResult[NAME]); ?>.%0A<?= $url11; ?>"><span class="fa fa-whatsapp share-popup__icon"></span></a>
										
										
	<a class="share-popup__item"  title="Копировать ссылку"href="javascript:void(0);"
	onclick="var $tmp = $('<textarea>');$('body').append($tmp);	var qq1 = window.location.href;$tmp.val(qq1).select();
    document.execCommand('copy');$tmp.remove();">
	
	<span class="fa fa-link share-popup__icon"></span></a>									
										
										
		<a class="share-popup__item"  title="Поделиться в instagram" target="_blank" href="https://www.instagram.com/torgkomplekt/"><span class="fa fa-instagram share-popup__icon"></span></a>
									
										
	<a class="share-popup__item"  title="Распечатать" target="_blank" href="mailto:?subject=<?= urlencode($arResult[NAME]); ?>&body=<?= $url11; ?>&url=<?= $url11; ?>"><span class="fa fa-envelope-o share-popup__icon"></span></a>

		<a class="share-popup__item"  title="Поделиться в facebook" target="_blank" href="https://www.facebook.com/sharer.php?src=sp&u=<?= $url11; ?>"><span class="fa fa-facebook share-popup__icon"></span></a>										

		
<a class="share-popup__item"  title="Поделиться в vk" target="_blank" href="https://vk.com/share.php?url=<?= $url11; ?>&image=<?= $url22; ?><?= CFile::GetPath($arResult[PROPERTIES][Gallery][VALUE][0]); ?>"><span class="fa fa-vk share-popup__icon"></span></a>

												




											

												<a class="share-popup__item"  title="Поделиться в twitter" target="_blank" href="https://twitter.com/intent/tweet?&url=<?= $url11; ?>&text=<?= urlencode($arResult[NAME]); ?>.Закажи%20в%20Интернет-магазине%20ТОРГКОМПЛЕКТ"><span class="fa fa-twitter share-popup__icon"></span></a>

												


											

												



											</span></span>
									</div>


									<a class="catalogDetailPhoto-big__popup two" id="js-catalogDetailPhoto-fancybox" data-fancybox="gallery" href="<?= CFile::GetPath($arResult[PROPERTIES][Gallery][VALUE][0]); ?>">
										<div class="lnr lnr-frame-expand catalogDetailPhoto-big__icon toggleTitle" data-title="Увеличить"></div>
									</a>




















									<div class="catalogDetailPhoto-big__items">

										<?
										$qe = true;
										foreach ($arResult[PROPERTIES][Gallery][VALUE] as $key => $imgg121) {
										?>
											<div class="catalogDetailPhoto-big__item"><a class="catalogDetailPhoto-big__pic" data-fancybox="gallery-img" href="<?= CFile::GetPath($imgg121); ?>"><img class="catalogDetailPhoto-big__img" src="<?= CFile::GetPath($imgg121); ?>" alt="" /></a></div>
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

							<? //Вывод скидки и стикеров
							?>



							<div class="catalogDetailInfoProp">
								<? if ($arResult[PROPERTIES][discount][VALUE]) { ?>
									<div class="catalogDetailInfoProp__item sale">-<?= $arResult[PROPERTIES][discount][VALUE]; ?> %</div>
								<? } ?>


								<? foreach ($arResult[PROPERTIES][stiker][VALUE] as $key => $stiker) { ?>
									<div class="catalogDetailInfoProp__item green"><?= $stiker; ?></div>
								<? } ?>
							</div>





							<div class="catalogDetailInfoTags">
								<a class="catalogDetailInfoTags__link" href="<?= $katalogurl ?>">Каталог</a>


								<?
								$ElementId = $arResult['ID'];
								$db_groups = CIBlockElement::GetElementGroups($ElementId, true);
								while ($ar_group = $db_groups->Fetch()) {
								?>

									<a class="catalogDetailInfoTags__link" href="<?= $katalogurl ?><?= $ar_group[CODE] ?>/"><?= $ar_group["NAME"] ?></a>

								<?
								}
								?>


								<?
								$ji = 0;
								foreach ($arResult[PROPERTIES][vid_oborudovaniy][VALUE] as $key => $vidobor) { ?>

									<a class="catalogDetailInfoTags__link" href="<?= $katalogurl ?>filter/vid_oborudovaniy-is-<?= $arResult[PROPERTIES][vid_oborudovaniy][VALUE_XML_ID][$ji++] ?>/apply/"><?= $vidobor; ?></a>

								<? } ?>





							</div>



							<a name="product_prop"></a>
							<h1 class="catalogDetailInfo__title"><?= $arResult[NAME]; ?></h1>




							<div class="catalogDetailInfo-buy">
								<div class="catalogDetailInfo-buy__col one">
									<div class="catalogDetailInfo-buy__price" style="<?= (ceil($arResult[ITEM_PRICES][0][UNROUND_BASE_PRICE]) > ceil($arResult[ITEM_PRICES][0][UNROUND_PRICE]) ? 'font-style: normal;font-weight: 600;font-size: 25px;line-height: 34px;color: #ff4500;' : 'display: none;') ?>">

										<?= number_format(ceil($arResult[ITEM_PRICES][0][UNROUND_PRICE]), 0, ',', ' ') . " руб."; ?>

									</div>
									<div class="catalogDetailInfo-buy__price-old" style="<?= (ceil($arResult[ITEM_PRICES][0][UNROUND_BASE_PRICE]) > ceil($arResult[ITEM_PRICES][0][UNROUND_PRICE]) ? '' : 'font-style: normal;font-weight: 600;font-size: 25px;line-height: 34px;color: #2f2f2f;text-decoration-line: unset;') ?>">

										<?= number_format(ceil($arResult[ITEM_PRICES][0][UNROUND_BASE_PRICE]), 0, ',', ' ') . " руб."; ?></div>



									<a class="catalogDetailInfo-buy__link" href="#">сравнить</a><a class="catalogDetailInfo-buy__link two" href="#">в избранное</a>
								</div>





								<? //Кнопка купить
								?>




								<div class="sectionCatalogList-items-prev-control__col two" style="margin-left: 50px;">
									<button class="sectionCatalogList-items-prev-price__buy black popupAddBasket__open buy-but1" data-msg-ok="Купить" href="javascript:void(0)" data-value="<?= $arResult[ID]; ?>" style="<?= $itInBasket ? "background: #2f2f2f !important;color: #fff; " : "color: #000; background-color: #fff; border: 1px solid #616161;    width: 153px; height: 42px;"; ?>">


										<?= $itInBasket ? "Добавлено" : "Купить"; ?>



									</button>
								</div>



								<div class="sectionCatalogList-items-prev-control" style="margin-bottom: 0px;">
									<div class="sectionCatalogList-items-prev-control__col one">
										<div class="sectionCatalogList-items-count">
											<div class="sectionCatalogList-items-count__col">
												<button class="sectionCatalogList-items-count__btn minus">-</button>
											</div>
											<div class="sectionCatalogList-items-count__col" style="margin-left: 5px; margin-right: 5px;">
												<div class="sectionCatalogList-items-count__input">
													<input class="sectionCatalogList-items-count__input-text" type="text" value="1" style="font-size: 18px;">
												</div>
											</div>
											<div class="sectionCatalogList-items-count__col">
												<button class="sectionCatalogList-items-count__btn plus">+</button>
											</div>
										</div>
									</div>


								</div>


							</div>


							<div class="catalogDetailInfo__art">Артикул: <?= $arResult[PROPERTIES][Article][VALUE]; ?></div>
							<div class="catalogDetailInfo__preview">

								<?= $arResult["~PREVIEW_TEXT"]; ?>

							</div>
							<h2 class="catalogDetailInfo-prop__title">Характеристики:</h2>
							<div class="catalogDetailInfo-prop__items">







								<? if ($arResult[PROPERTIES][material][VALUE][0]) { ?>
									<div class="catalogDetailInfo-prop__item">
										<div class="catalogDetailInfo-prop__col one">Материал</div>
										<div class="catalogDetailInfo-prop__col two">
											<? $allval = "";
											foreach ($arResult[PROPERTIES][material][VALUE] as $val1) {
												$allval .= $val1 . ", ";
											}
											$allval  = mb_substr($allval, 0, -2);
											echo $allval; ?>
										</div>
									</div>
								<? } ?>


								<? if ($arResult[PROPERTIES][color][VALUE][0]) { ?>
									<div class="catalogDetailInfo-prop__item">
										<div class="catalogDetailInfo-prop__col one">Цвет</div>
										<div class="catalogDetailInfo-prop__col two">

											<? //Список цветов
											$allcolors = "";
											foreach ($generalcolors as $imgcol1) {
												$allcolors .= $imgcol1[Name] . ", ";
											}
											$allcolors  = mb_substr($allcolors, 0, -2);
											echo $allcolors;
											?>

										</div>
									</div>
								<? } ?>


								<? if ($arResult[PROPERTIES][width][VALUE]) { ?>
									<div class="catalogDetailInfo-prop__item">
										<div class="catalogDetailInfo-prop__col one">Ширина, мм</div>
										<div class="catalogDetailInfo-prop__col two"><?= $arResult[PROPERTIES][width][VALUE]; ?></div>
									</div>
								<? } ?>

								<? if ($arResult[PROPERTIES][deep][VALUE]) { ?>
									<div class="catalogDetailInfo-prop__item">
										<div class="catalogDetailInfo-prop__col one">Глубина, мм</div>
										<div class="catalogDetailInfo-prop__col two"><?= $arResult[PROPERTIES][deep][VALUE]; ?></div>
									</div>
								<? } ?>

								<? if ($arResult[PROPERTIES][height][VALUE]) { ?>
									<div class="catalogDetailInfo-prop__item">
										<div class="catalogDetailInfo-prop__col one">Высота, мм</div>
										<div class="catalogDetailInfo-prop__col two"><?= $arResult[PROPERTIES][height][VALUE]; ?></div>
									</div>
								<? } ?>

								<? if ($arResult[PROPERTIES][sechenie][VALUE]) { ?>
									<div class="catalogDetailInfo-prop__item">
										<div class="catalogDetailInfo-prop__col one">Сечение, мм</div>
										<div class="catalogDetailInfo-prop__col two"><?= $arResult[PROPERTIES][sechenie][VALUE]; ?></div>
									</div>
								<? } ?>

								<? if ($arResult[PROPERTIES][typesechenie][VALUE]) { ?>
									<div class="catalogDetailInfo-prop__item">
										<div class="catalogDetailInfo-prop__col one">Тип сечения</div>
										<div class="catalogDetailInfo-prop__col two"><?= $arResult[PROPERTIES][typesechenie][VALUE]; ?></div>
									</div>
								<? } ?>

								<? if ($arResult[PROPERTIES][kreplenie][VALUE]) { ?>
									<div class="catalogDetailInfo-prop__item">
										<div class="catalogDetailInfo-prop__col one">Тип крепления</div>
										<div class="catalogDetailInfo-prop__col two"><?= $arResult[PROPERTIES][kreplenie][VALUE]; ?></div>
									</div>
								<? } ?>

								<? if ($arResult[PROPERTIES][edizmereniy][VALUE]) { ?>
									<div class="catalogDetailInfo-prop__item">
										<div class="catalogDetailInfo-prop__col one">Единицы измерения</div>
										<div class="catalogDetailInfo-prop__col two"><?= $arResult[PROPERTIES][edizmereniy][VALUE]; ?></div>
									</div>
								<? } ?>




							</div>


						</div>
					</div>
				</div>
			</div>

			<div id="charr1"></div>

			<br><br><br>

			<h2 class="catalogDetailInfo-prop__title">Другие варианты товара :</h2>

			<br>





			<?




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


			$arFilter3_linksnew11 = array(
				"IBLOCK_ID" => 6,
				"PROPERTY_torgoffer" => $arResult[XML_ID],
				"ACTIVE" => "Y"
			);

			$res3_linksnew11 = CIBlockElement::GetList(array(), $arFilter3_linksnew11, false, false);
			while ($ob3_linksnew11 = $res3_linksnew11->GetNextElement()) {
				$arFields11 = $ob3_linksnew11->GetFields();
				$props11 = $ob3_linksnew11->GetProperties();

				//Вывод всех указателей на этот элемент
				array_push($torgoggerid, $arFields11[XML_ID]);

				//Вывод всех указателей у выбранных указателей
				foreach ($props11[torgoffer][VALUE] as $itemoffer) {
					array_push($torgoggerid, $itemoffer);
				}
			}







			//Вывод всех указателей у этого элемента(Правильно)
			foreach ($arResult[PROPERTIES][torgoffer][VALUE] as $itemoffer) {
				array_push($torgoggerid, $itemoffer);
			}


			$result = array_unique($torgoggerid);



			$arFilter3_linksnew = array(
				"IBLOCK_ID" => 6,
				"XML_ID" => $result,
				"ACTIVE" => "Y"
			);


			$res3_linksnew = CIBlockElement::GetList(array(), $arFilter3_linksnew, false, false);




			//Проверка:
			$artest[obrabotka] = false;
			$artest[height] = false;
			$artest[size] = false;
			$artest[width] = false;
			$artest[deep] = false;
			$artest[tolchina] = false;
			$artest[diametr] = false;


			?>

			<div class='contentgoods'>

				<div class='showbox1'>
					<div class='imgbox1'></div><br>
					<div class='boxtitle1'>TEST</div>
				</div>









				<?




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



				while ($ob3_linksnew = $res3_linksnew->GetNextElement()) {

					$arFields = $ob3_linksnew->GetFields();
					$props = $ob3_linksnew->GetProperties();




					$artest[obrabotka] = ($props[obrabotka][VALUE] ? true : $artest[obrabotka]);
					$artest[height] = ($props[height][VALUE] ? true : $artest[height]);
					$artest[size] = ($props[size][VALUE] ? true : $artest[size]);
					$artest[width] = ($props[width][VALUE] ? true : $artest[width]);
					$artest[deep] = ($props[deep][VALUE] ? true : $artest[deep]);
					$artest[tolchina] = ($props[tolchina][VALUE] ? true : $artest[tolchina]);
					$artest[diametr] = ($props[diametr][VALUE] ? true : $artest[diametr]);







					$PRODUCT_ID = $arFields['ID'];

					$price = CCatalogProduct::GetOptimalPrice($PRODUCT_ID, 1, $USER->GetUserGroupArray(), 'N');

					$oldprice1 = $price[PRICE][PRICE];

					$cur12 = $price[PRICE][CURRENCY];

					$price = $price['RESULT_PRICE']['DISCOUNT_PRICE'];

					//Параметры

					$par11 = "";

					if ($props[height][VALUE]) {
						$par11 .= " <span class='para'>в. </span>" . $props[height][VALUE];
					}
					if ($props[size][VALUE]) {
						if ($par11) $par11 .= " * ";
						$par11 .= "<span class='para'> д. </span>" . $props[size][VALUE];
					}
					if ($props[width][VALUE]) {
						if ($par11) $par11 .= " * ";
						$par11 .= "<span class='para'> ш. </span>" . $props[width][VALUE];
					}
					if ($props[deep][VALUE]) {
						if ($par11) $par11 .= " * ";
						$par11 .= "<span class='para'> г. </span>" . $props[deep][VALUE];
					}
					if ($props[diametr][VALUE]) {
						if ($par11) $par11 .= " * ";
						$par11 .= "<span class='para'> D </span>" . $props[diametr][VALUE];
					}
					if ($props[sechenie][VALUE]) {
						if ($par11) $par11 .= " * ";
						$par11 .= "<span class='para'> сеч. </span>" . $props[sechenie][VALUE];
					}

				?>



					<?



					$linknew = str_replace("SITE_DIR#/catalog/", "/katalog-tovarov-3/", $arFields[DETAIL_PAGE_URL]) . "/";



					$PRICE_TYPE_ID = 1;

					$rsPrices = CPrice::GetList(array(), array('PRODUCT_ID' => $arFields['ID'], 'CATALOG_GROUP_ID' => $PRICE_TYPE_ID));
					if ($arPrice = $rsPrices->Fetch()) {



						//Формируем материал
						$allmaterial = "";
						foreach ($props[material][VALUE] as $imgcol1) {
							$allmaterial .= $imgcol1 . ", ";
						}
						if ($props[material][VALUE][0])
							$allmaterial  = mb_substr($allmaterial, 0, -2);




						if ($arFields[ID] == $arResult[ID]) {

							//Формируем цвет
							$allcolors = "";
							foreach ($props[color][VALUE] as $imgcol1) {
								$allcolors .= $generalcolors1[$imgcol1] . ", ";
							}
							if ($props[color][VALUE][0])
								$allcolors  = mb_substr($allcolors, 0, -2);







							echo "<tr class='showimgproduct' style='cursor: pointer; background-color: #eaeaea !important; font-weight: 600;' "; ?>onclick="document.location
					= '<?= $linknew; ?>';"
					<? echo "  data-img='" . CFile::GetPath($props[Gallery][VALUE][0]) . "' data-name='" . $arFields[NAME] . "'>


			<td style='text-decoration: underline;'>" . $props[Article][VALUE] . "</td>	
			<td style=''>" . $allcolors . "</td>
			<td style=''>" . $allmaterial . "</td>
			<td style='' class='obrabotka-column'>" . $props[obrabotka][VALUE] . "</td>
			<td style='' class='height-column'>" . $props[height][VALUE] . "</td>
			<td style='' class='size-column'>" . $props[size][VALUE] . "</td>
			<td style='' class='width-column'>" . $props[width][VALUE] . "</td>
			<td style='' class='deep-column'>" . $props[deep][VALUE] . "</td>
			<td style='' class='tolchina-column'>" . $props[tolchina][VALUE] . "</td>
			<td style='' class='diametr-column'>" . $props[diametr][VALUE] . "</td>
			<td style='' class='pricvar1'>" . 
			"<span class='" . (($oldprice1 > $price) ? "disc22" : "") . "'>" . CurrencyFormat($price, $arPrice["CURRENCY"]) . "</span><br>" .
			
			(($oldprice1 > $price) ? "<span class='" . (($oldprice1 > $price) ? "disc1" : "") . "'>" . CurrencyFormat($oldprice1, $cur12) . "</span>" : "") .
								


								"</td>
			</tr>";
						} else {
							//Формируем цвет
							$allcolors = "";
							foreach ($props[color][VALUE] as $imgcol1) {
								$allcolors .= $generalcolors1[$imgcol1] . ", ";
							}
							if ($props[color][VALUE][0])
								$allcolors  = mb_substr($allcolors, 0, -2);





							echo "<tr class='showimgproduct' style='cursor: pointer;' "; ?>onclick="document.location = '<?= $linknew; ?>';"
		<? echo "  data-img='" . CFile::GetPath($props[Gallery][VALUE][0]) . "' data-name='" . $arFields[NAME] . "'>
			<td style=''>" . $props[Article][VALUE] . "</td>	
			<td style=''>" . $allcolors . "</td>
			<td style=''>" . $allmaterial . "</td>
			<td style='' class='obrabotka-column'>" . $props[obrabotka][VALUE] . "</td>
			<td style='' class='height-column'>" . $props[height][VALUE] . "</td>
			<td style='' class='size-column'>" . $props[size][VALUE] . "</td>
			<td style='' class='width-column'>" . $props[width][VALUE] . "</td>
			<td style='' class='deep-column'>" . $props[deep][VALUE] . "</td>
			<td style='' class='tolchina-column'>" . $props[tolchina][VALUE] . "</td>
			<td style='' class='diametr-column'>" . $props[diametr][VALUE] . "</td> 
			<td style='' class='pricvar1'>" .
								
								"<span class='" . (($oldprice1 > $price) ? "disc22" : "") . "'>" . CurrencyFormat($price, $arPrice["CURRENCY"]) . "</span><br>" .
								(($oldprice1 > $price) ? "<span class='" . (($oldprice1 > $price) ? "disc1" : "") . "'>" . CurrencyFormat($oldprice1, $cur12) . "</span>" : "") .

								"</td>
			</tr>";
						}
					}
				}


				echo "</table>";

				echo "</div>";



				echo "<br><br><br><br>";

		?>




		<br>




			</div>
			</><a class="catalogDetail-hero-produkt__prev" href="#">
				<div class="lnr lnr-chevron-left catalogDetail-hero-produkt__icon toggleTitle" data-title="Предыдущий товар"></div>
			</a><a class="catalogDetail-hero-produkt__next" href="#">
				<div class="lnr lnr-chevron-right catalogDetail-hero-produkt__icon toggleTitle" data-title="Следующий товар"></div>
			</a>
		</div>
		
		
		
		

	<div class="descdescription">
		<div class="container__wrap">
			<div class="catalogDetail-tabs">
				<div class="catalogDetail-tabs__wrap">

					<? //Наименование вкладок
					?>
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
										<?= $arResult["~DETAIL_TEXT"]; ?>

									</div>
								</div>


								<div class="catalogDetail-tabs-tab__col two">
									<p>Чтобы ознакомиться подробнее с оборудованием посетите наш шоу-рум или позвоните по телефону:</p>
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





<script>
	$('body').on('click', '.closebtncustom', function() {
		$('.variant_goods').css('display', 'none');

	});
</script>




<div class="mobi">

	<? //Поделиться моби
	?>



	<div class='sharemobi'>
		<div class="lnr lnr-cross btncls closebtncustom close2" onclick="$('.shade').css('display','none');$('.sharemobi').css('display','none');" style=""></div>

		<div class="titlevarc">Поделиться с друзьями</div>




		<div class="sharein">
		
		
		
		<div class="itemshare">
				<a class="share-popup__item" target="_blank" href="https://api.whatsapp.com/send?text=<?= urlencode($arResult[NAME]); ?>.%0A<?= $url11; ?>"><span class="fa fa-whatsapp share-popup__icon"></span></a>

			</div>
		
		<div class="itemshare">
				<a class="share-popup__item" target="_blank" href="https://www.instagram.com/torgkomplekt/"><span class="fa fa-instagram share-popup__icon"></span></a>

			</div>
		
		
		

			<div class="itemshare">
				<a class="share-popup__item" target="_blank" href="mailto:?subject=<?= urlencode($arResult[NAME]); ?>&body=<?= $url11; ?>&url=<?= $url11; ?>"><span class="fa fa-envelope-o share-popup__icon"></span></a>

			</div>
		
		
		<div class="itemshare">
				<a class="share-popup__item" target="_blank" href="https://www.facebook.com/sharer.php?src=sp&u=<?= $url11; ?>"><span class="fa fa-facebook share-popup__icon"></span></a>

			</div>



			

			<div class="itemshare">
				<a class="share-popup__item" target="_blank" href="https://vk.com/share.php?url=<?= $url11; ?>&image=<?= $url22; ?><?= CFile::GetPath($arResult[PROPERTIES][Gallery][VALUE][0]); ?>"><span class="fa fa-vk share-popup__icon"></span></a>

			</div>


			

			<div class="itemshare">
				<a class="share-popup__item" target="_blank" href="https://twitter.com/intent/tweet?&url=<?= $url11; ?>&text=<?= urlencode($arResult[NAME]); ?>.Закажи%20в%20Интернет-магазине%20ТОРГКОМПЛЕКТ"><span class="fa fa-twitter share-popup__icon"></span></a>

			</div>


			

			
			<div class="itemshare">
				<a class="share-popup__item" href="javascript:void(0);" onclick="var $tmp = $('<textarea>');$('body').append($tmp);	var qq1 = window.location.href;$tmp.val(qq1).select(); document.execCommand('copy');$tmp.remove();">
				<span class="fa fa-link share-popup__icon"></span>
				</a>
			</div>
			
			
			
			
			
			
			
			

		</div>


	</div>





	<? //Варианты товаров
	?>
	<div class="variant_goods">
		<div class="lnr lnr-cross btncls closebtncustom" onclick="$('.variant_goods').css('display','none');" style=""></div>
		<br><br>
		<div class="titlevarc">Другие варианты товара</div>


		<? // Начало вывода товаров
		$result1 = array_unique($torgoggerid);



		$arFilter3_linksnew1 = array(
			"IBLOCK_ID" => 6,
			"XML_ID" => $result1,
			"ACTIVE" => "Y"
		);


		$res3_linksnew1 = CIBlockElement::GetList(array(), $arFilter3_linksnew1, false, false);



		while ($ob3_linksnew1 = $res3_linksnew1->GetNextElement()) {

			$arFields = $ob3_linksnew1->GetFields();
			$props = $ob3_linksnew1->GetProperties();

		?>





			<?
			//Вводный код

			//Определение цены
			$PRODUCT_ID = $arFields['ID'];
			$price = CCatalogProduct::GetOptimalPrice($PRODUCT_ID, 1, $USER->GetUserGroupArray(), 'N');
			$oldprice1 = $price[PRICE][PRICE];
			$cur12 = $price[PRICE][CURRENCY];
			$price = $price['RESULT_PRICE']['DISCOUNT_PRICE'];
			$PRICE_TYPE_ID = 1;
			$rsPrices = CPrice::GetList(array(), array('PRODUCT_ID' => $arFields['ID'], 'CATALOG_GROUP_ID' => $PRICE_TYPE_ID));
			if ($arPrice = $rsPrices->Fetch()) {
			}

			//Определение ссылки 
			$linknew = str_replace("SITE_DIR#/catalog/", "/katalog-tovarov-3/", $arFields[DETAIL_PAGE_URL]) . "/";

			//Формируем материал
			$allmaterial = "";
			foreach ($props[material][VALUE] as $imgcol1) {
				$allmaterial .= $imgcol1 . ", ";
			}
			if ($props[material][VALUE][0])
				$allmaterial  = mb_substr($allmaterial, 0, -2);

			//Формируем цвет
			$allcolors = "";
			foreach ($props[color][VALUE] as $imgcol1) {
				$allcolors .= $generalcolors1[$imgcol1] . ", ";
			}
			if ($props[color][VALUE][0])
				$allcolors  = mb_substr($allcolors, 0, -2);
			?>


			<? // Вывод товара мобильная версия 
			?>
			<div class="itemproduct1 mobiitem">
				<div class="titlecust"><?= $arFields[NAME]; ?></div>

				<div class="headgoodscustom">
					<div class="tabcheck">

						<? if ($arFields[ID] == $arResult[ID]) { ?>
							<div class="checkcustom" style="background: url('/local/templates/.default/components/bitrix/catalog.element/bootstrap_v4/check.png');"></div>
						<? } else { ?>
							<div class="checkcustom" class="checkcustom" style="opacity: 0;"></div>
						<? } ?>



					</div>

					<div class="imgitemcustom">
						<div class="imginnercust" style="background-image: url('<?= CFile::GetPath($props[Gallery][VALUE][0]); ?>');"></div>
					</div>


					<div class="tabprice">
						<? echo "" . "<span class='" . (($oldprice1 > $price) ? "disc22" : "") . "'>" . CurrencyFormat($price, $arPrice["CURRENCY"]) . "</span><br>" . (($oldprice1 > $price) ? "<span class='" . (($oldprice1 > $price) ? "disc1" : "") . "'>" . CurrencyFormat($oldprice1, $cur12) . "</span><br>" : ""); ?>

					</div>

				</div>


				<div class="paramcust">
					<? if ($allcolors) { ?>
						<div class="rowitemcust">
							<div class="namerowcust">Цвет:</div>
							<div class="valrowcust"><?= $allcolors; ?></div>
						</div>
						<? } ?><? if ($allmaterial) { ?>
						<div class="rowitemcust">
							<div class="namerowcust">Материал:</div>
							<div class="valrowcust"><?= $allmaterial; ?></div>
						</div>
						<? } ?><? if ($props[obrabotka][VALUE]) { ?>
						<div class="rowitemcust">
							<div class="namerowcust">Вид обработки:</div>
							<div class="valrowcust"><?= $props[obrabotka][VALUE]; ?></div>
						</div>



						<? } ?><? if ($props[height][VALUE]) { ?>
						<div class="rowitemcust">
							<div class="namerowcust">Высота, мм:</div>
							<div class="valrowcust "><?= $props[height][VALUE]; ?></div>
						</div>

						<? } ?><? if ($props[size][VALUE]) { ?>
						<div class="rowitemcust">
							<div class="namerowcust">Длина, мм:</div>
							<div class="valrowcust "><?= $props[size][VALUE]; ?></div>
						</div>

						<? } ?><? if ($props[width][VALUE]) { ?>
						<div class="rowitemcust">
							<div class="namerowcust">Ширина, мм:</div>
							<div class="valrowcust "><?= $props[width][VALUE]; ?></div>
						</div>

						<? } ?><? if ($props[deep][VALUE]) { ?>
						<div class="rowitemcust">
							<div class="namerowcust">Глубина, мм:</div>
							<div class="valrowcust "><?= $props[deep][VALUE]; ?></div>
						</div>

						<? } ?><? if ($props[tolchina][VALUE]) { ?>
						<div class="rowitemcust">
							<div class="namerowcust">Толщина, мм:</div>
							<div class="valrowcust "><?= $props[tolchina][VALUE]; ?></div>
						</div>

						<? } ?><? if ($props[diametr][VALUE]) { ?>
						<div class="rowitemcust">
							<div class="namerowcust">Диаметр, мм:</div>
							<div class="valrowcust "><?= $props[diametr][VALUE]; ?></div>
						</div>
					<? } ?>


				</div>

				<div class="sectionCatalogList-items-prev-control__col two">

					<button onclick="document.location = '<?= $linknew; ?>';" class="sectionCatalogList-items-prev-price__buy black popupAddBasket__open contcust" data-msg-ok="Купить" href="javascript:void(0)" data-value="483" style="background: #fff !important;color: black; border: 1px solid #2F2F2F;">


						Подробнее


					</button>

				</div>
			</div>






			<? // Вывод товара планшет 
			?>
			<div class="itemproduct1 planitem">
				<div class="titlecust"><?= $arFields[NAME]; ?></div>



				<div class="tableplan">

					<div class="cellplan checkplan">
						<? if ($arFields[ID] == $arResult[ID]) { ?>
							<div class="checkcustom" style="background: url('/local/templates/.default/components/bitrix/catalog.element/bootstrap_v4/check.png');"></div>
						<? } else { ?>
							<div class="checkcustom" style="opacity: 0;"></div>
						<? } ?>
					</div>

					<div class="cellplan imgplan">
						<div class="imginnercust" style="background-image: url('<?= CFile::GetPath($props[Gallery][VALUE][0]); ?>');"></div>
					</div>

					<div class="priseandparam">

						<div class="tablplanch">
							<div class="cellplan param1plan">
								<? if ($allcolors) { ?>
									<div class="rowitemcust">
										<div class="namerowcust">Цвет:</div>
										<div class="valrowcust"><?= $allcolors; ?></div>
									</div>
									<? } ?><? if ($allmaterial) { ?>
									<div class="rowitemcust">
										<div class="namerowcust">Материал:</div>
										<div class="valrowcust"><?= $allmaterial; ?></div>
									</div>
									<? } ?><? if ($props[obrabotka][VALUE]) { ?>
									<div class="rowitemcust">
										<div class="namerowcust">Вид обработки:</div>
										<div class="valrowcust"><?= $props[obrabotka][VALUE]; ?></div>
									</div>
									<? } ?><? if ($props[height][VALUE]) { ?>
									<div class="rowitemcust">
										<div class="namerowcust">Высота, мм:</div>
										<div class="valrowcust "><?= $props[height][VALUE]; ?></div>
									</div>
								<? } ?>
							</div>

							<div class="cellplan param2plan">
								<? if ($props[size][VALUE]) { ?>
									<div class="rowitemcust">
										<div class="namerowcust">Длина, мм:</div>
										<div class="valrowcust "><?= $props[size][VALUE]; ?></div>
									</div>

									<? } ?><? if ($props[width][VALUE]) { ?>
									<div class="rowitemcust">
										<div class="namerowcust">Ширина, мм:</div>
										<div class="valrowcust "><?= $props[width][VALUE]; ?></div>
									</div>

									<? } ?><? if ($props[deep][VALUE]) { ?>
									<div class="rowitemcust">
										<div class="namerowcust">Глубина, мм:</div>
										<div class="valrowcust "><?= $props[deep][VALUE]; ?></div>
									</div>

									<? } ?><? if ($props[tolchina][VALUE]) { ?>
									<div class="rowitemcust">
										<div class="namerowcust">Толщина, мм:</div>
										<div class="valrowcust "><?= $props[tolchina][VALUE]; ?></div>
									</div>

									<? } ?><? if ($props[diametr][VALUE]) { ?>
									<div class="rowitemcust">
										<div class="namerowcust">Диаметр, мм:</div>
										<div class="valrowcust "><?= $props[diametr][VALUE]; ?></div>
									</div>
								<? } ?>


							</div>
							<div class="cellplan priceplan">
								<? echo "" . "<span class='" . (($oldprice1 > $price) ? "disc22" : "") . "'>" . CurrencyFormat($price, $arPrice["CURRENCY"]) . "</span><br>" . (($oldprice1 > $price) ? "<span class='" . (($oldprice1 > $price) ? "disc1" : "") . "'>" . CurrencyFormat($oldprice1, $cur12) . "</span><br>" : ""); ?>


							</div>
						</div>
					</div>

				</div>



				<div class="btnplanch">

					<div class="btnplanchinner">Подробнее</div>
				</div>

			</div>


		<? } ?>




	</div>




	<? //Хлебные крошки моби
	{

	?>
		<?
		if ($pos) {
		?>


			<div class="custompv">
				<div class="wrapper__main">
					<div class="breadcrumbs">
						<div class="container">
							<div class="container__wrap">
								<div class="breadcrumbs__items" itemscope="" itemtype="http://schema.org/BreadcrumbList">


									<span class="breadcrumbs__item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
										<a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная" href="/">
											<span itemprop="name">Главная</span>
											<meta itemprop="position" content="1">
										</a>
									</span>





									<?
									foreach ($_SESSION['breadcr'] as $key => $crumb) {
									?>

										<span class="breadcrumbs__item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
											<a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная" href="<?= $crumb[URL]; ?>">
												<span itemprop="name"><?= $crumb[NAME]; ?></span>
												<meta itemprop="position" content="1">
											</a>
										</span>

									<?
									}
									?>





									<span class="breadcrumbs__item">
										<span class="breadcrumbs__text"><?= $name ?></span>
									</span>


								</div>
							</div>
						</div>
					</div>
				</div>
			</div>



		<?
		} else {
		?>
			<div class="custompv">
				<div class="wrapper__main">
					<div class="breadcrumbs">
						<div class="container">
							<div class="container__wrap">
								<div class="breadcrumbs__items" itemscope="" itemtype="http://schema.org/BreadcrumbList">


									<span class="breadcrumbs__item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
										<a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная" href="/">
											<span itemprop="name">Главная</span>
											<meta itemprop="position" content="1">
										</a>
									</span>

									<span class="breadcrumbs__item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
										<a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная" href="<?= $katalogurl; ?>">
											<span itemprop="name">Каталог</span>
											<meta itemprop="position" content="1">
										</a>
									</span>


									<span class="breadcrumbs__item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
										<a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная" href="<?= $arResult[SECTION][SECTION_PAGE_URL]; ?>">
											<span itemprop="name"><?= $arResult[SECTION][NAME]; ?></span>
											<meta itemprop="position" content="1">
										</a>
									</span>






									<span class="breadcrumbs__item">
										<span class="breadcrumbs__text"><?= $name ?></span>
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

	<?

	}
	?>


	<h1 class="namegood">
		<?= $arResult[NAME]; ?>
	</h1>

	<div class="article">Артикул: <?= $arResult[PROPERTIES][Article][VALUE]; ?></div>



	<? //Галерея фотографий
	?>
	<div class="gallerypvcontent" style="position: relative;">

		<div class="tabcellpv btleft kardd1 mobivers">
			<div class="arrowleftpv lnr lnr-chevron-left" style="opacity: 1; <?= ($arResult[PROPERTIES][Gallery][VALUE][0] ? "" :  "opacity: 0 !important;"); ?>"></div>
		</div>


		<div class="gallerypv tabcellpv">
			<div class="qqqq99">

				<div class="ggghhh">
					<div class="ggghhh1">
					</div>
				</div>



				<div class="scroll">
					<div class="scroll_child mobivers" style="transform: translateX(0px);">



						<? foreach ($arResult[PROPERTIES][Gallery][VALUE] as $imggoods) : ?>

							<div class="elem11 kardd1 mobivers" style="background-image:url(<?= CFile::GetPath($imggoods) ?>); /*width:190px;*/"></div>

						<? endforeach; ?>

					</div>

				</div>

			</div>
		</div>

		<div class="tabcellpv btright kardd1 mobivers">
			<div class="arrowrightpv lnr lnr-chevron-right" style="opacity: 1; <?= ($arResult[PROPERTIES][Gallery][VALUE][0] ? "" :  "opacity: 0 !important;"); ?>"></div>
		</div>




	</div>

	<div style="text-align: center;" class="allpointq">


		<? foreach ($arResult[PROPERTIES][Gallery][VALUE] as $imggoods) : ?>

			<div style="display: inline-block;width: 15px;"><svg style="height:20px" class="pointgal">
					<circle r="2" cx="7" cy="1mm" /></svg></div>
		<? endforeach; ?>


	</div>











	<br>

	<script>
		$('.shade').css('display', 'none');
		$('.sharemobi').css('display', 'none');
	</script>



	<div style="text-align: left;margin: 0 20px 20px 20px;">

		<div onclick="$('.shade').css('display', 'block');
		$('.sharemobi').css('display', 'block');" class="lnr lnr-exit-up catalogDetailPhoto-big__icon ">


		</div>

	</div>


	<? //Купить кнопка и количество
	?>
	<div class="catalogDetailInfo-buy" style="margin:auto; margin:0 20px 0 20px;">
		<div class="catalogDetailInfo-buy__col one" style="    margin-left: 0px;">
			<div class="catalogDetailInfo-buy__price" style="<?= (ceil($arResult[ITEM_PRICES][0][UNROUND_BASE_PRICE]) > ceil($arResult[ITEM_PRICES][0][UNROUND_PRICE]) ? 'font-style: normal;font-weight: 600;font-size: 20px;line-height: 34px;color: #ff4500;' : 'display: none;') ?> font-size: 20px;">

				<?= number_format(ceil($arResult[ITEM_PRICES][0][UNROUND_PRICE]), 0, ',', ' ') . " руб."; ?>

			</div>
			<div class="catalogDetailInfo-buy__price-old" style="<?= (ceil($arResult[ITEM_PRICES][0][UNROUND_BASE_PRICE]) > ceil($arResult[ITEM_PRICES][0][UNROUND_PRICE]) ? '' : 'font-style: normal;font-weight: 600!important;font-size: 20px !important;line-height: 34px;color: #2f2f2f;text-decoration-line: unset;') ?>  font-size: 15px;font-family: Open Sans;font-style: normal;font-weight: normal; ">

				<?= CurrencyFormat($arResult[ITEM_PRICES][0][UNROUND_BASE_PRICE], $arResult[ITEM_PRICES][0][CURRENCY]); ?></div>




			<a class="catalogDetailInfo-buy__link" href="#" style="display:none;">сравнить</a><a class="catalogDetailInfo-buy__link two" href="#" style="display:none;">в избранное</a>
		</div>

		<? //Кнопка купить
		?>

		<div class="sectionCatalogList-items-prev-control">

			<div class="sectionCatalogList-items-prev-control__col one">
				<div class="sectionCatalogList-items-count" style="vertical-align: middle;">
					<div class="sectionCatalogList-items-count__col" style="margin-right: 5px;">
						<button class="sectionCatalogList-items-count__btn minus" style="font-size: 30px;
    width: 50px;
    height: 50px;">-</button>
					</div>
					<div class="sectionCatalogList-items-count__col" style="vertical-align: middle;">
						<div class="sectionCatalogList-items-count__input" style="vertical-align: middle; width: unset;       max-width: 45px;">
							<input class="sectionCatalogList-items-count__input-text" type="text" value="1" style="vertical-align: middle;  font-size: 20px;     max-width: 45px;">
						</div>
					</div>
					<div class="sectionCatalogList-items-count__col" style="margin-left: 5px;">
						<button class="sectionCatalogList-items-count__btn plus" style="font-size: 30px;
    width: 50px;
    height: 50px;">+</button>
					</div>
				</div>
			</div>


		</div>



	</div>


	<div class="sectionCatalogList-items-prev-control__col two">
		<button class="sectionCatalogList-items-prev-price__buy black popupAddBasket__open buy-but1 bu12" data-msg-ok="Купить" href="javascript:void(0)" data-value="<?= $arResult[ID]; ?>" style="<?= $itInBasket ? "background: #2f2f2f !important;" : "background: #fff !important;color: black; border: 1px solid #2F2F2F;"; ?>">


			<?= $itInBasket ? "Добавлено" : "Купить"; ?>



		</button>
	</div>




	<? //Вывод скидки и стикеров
	?>



	<div class="catalogDetailInfoProp">
		<? if ($arResult[PROPERTIES][discount][VALUE]) { ?>
			<div class="catalogDetailInfoProp__item sale">-<?= $arResult[PROPERTIES][discount][VALUE]; ?> %</div>
		<? } ?>


		<? foreach ($arResult[PROPERTIES][stiker][VALUE] as $key => $stiker) { ?>
			<div class="catalogDetailInfoProp__item green"><?= $stiker; ?></div>
		<? } ?>
	</div>





	<div class="catalogDetailInfoTags">
		<a class="catalogDetailInfoTags__link" href="<?= $katalogurl ?>">Каталог</a>


		<?
		$ElementId = $arResult['ID'];
		$db_groups = CIBlockElement::GetElementGroups($ElementId, true);
		while ($ar_group = $db_groups->Fetch()) {
		?>

			<a class="catalogDetailInfoTags__link" href="<?= $katalogurl ?><?= $ar_group[CODE] ?>/"><?= $ar_group["NAME"] ?></a>

		<?
		}
		?>


		<?
		$ji = 0;
		foreach ($arResult[PROPERTIES][vid_oborudovaniy][VALUE] as $key => $vidobor) { ?>

			<a class="catalogDetailInfoTags__link" href="<?= $katalogurl ?>filter/vid_oborudovaniy-is-<?= $arResult[PROPERTIES][vid_oborudovaniy][VALUE_XML_ID][$ji++] ?>/apply/"><?= $vidobor; ?></a>

		<? } ?>





	</div>


	<h1 class="namegood">
		<?= $arResult[NAME]; ?>
	</h1>


	<div class="article">Артикул: <?= $arResult[PROPERTIES][Article][VALUE]; ?></div>





	<div class="catalogDetailInfo__preview">
		<?= $arResult["~PREVIEW_TEXT"]; ?>
	</div>

	<h2 class="catalogDetailInfo-prop__title">Характеристики:</h2>
	<div class="catalogDetailInfo-prop__items">







		<? if ($arResult[PROPERTIES][material][VALUE][0]) { ?>
			<div class="catalogDetailInfo-prop__item">
				<div class="catalogDetailInfo-prop__col one">Материал</div>
				<div class="catalogDetailInfo-prop__col two">
					<? $allval = "";
					foreach ($arResult[PROPERTIES][material][VALUE] as $val1) {
						$allval .= $val1 . ", ";
					}
					$allval  = mb_substr($allval, 0, -2);
					echo $allval; ?>
				</div>
			</div>
		<? } ?>


		<? if ($arResult[PROPERTIES][color][VALUE][0]) { ?>
			<div class="catalogDetailInfo-prop__item">
				<div class="catalogDetailInfo-prop__col one">Цвет</div>
				<div class="catalogDetailInfo-prop__col two">

					<? //Список цветов
					$allcolors = "";
					foreach ($generalcolors as $imgcol1) {
						$allcolors .= $imgcol1[Name] . ", ";
					}
					$allcolors  = mb_substr($allcolors, 0, -2);
					echo $allcolors;
					?>

				</div>
			</div>
		<? } ?>






		<? if ($arResult[PROPERTIES][width][VALUE]) { ?>
			<div class="catalogDetailInfo-prop__item">
				<div class="catalogDetailInfo-prop__col one">Ширина, мм</div>
				<div class="catalogDetailInfo-prop__col two"><?= $arResult[PROPERTIES][width][VALUE]; ?></div>
			</div>
		<? } ?>

		<? if ($arResult[PROPERTIES][deep][VALUE]) { ?>
			<div class="catalogDetailInfo-prop__item">
				<div class="catalogDetailInfo-prop__col one">Глубина, мм</div>
				<div class="catalogDetailInfo-prop__col two"><?= $arResult[PROPERTIES][deep][VALUE]; ?></div>
			</div>
		<? } ?>

		<? if ($arResult[PROPERTIES][height][VALUE]) { ?>
			<div class="catalogDetailInfo-prop__item">
				<div class="catalogDetailInfo-prop__col one">Высота, мм</div>
				<div class="catalogDetailInfo-prop__col two"><?= $arResult[PROPERTIES][height][VALUE]; ?></div>
			</div>
		<? } ?>

		<? if ($arResult[PROPERTIES][sechenie][VALUE]) { ?>
			<div class="catalogDetailInfo-prop__item">
				<div class="catalogDetailInfo-prop__col one">Сечение, мм</div>
				<div class="catalogDetailInfo-prop__col two"><?= $arResult[PROPERTIES][sechenie][VALUE]; ?></div>
			</div>
		<? } ?>

		<? if ($arResult[PROPERTIES][typesechenie][VALUE]) { ?>
			<div class="catalogDetailInfo-prop__item">
				<div class="catalogDetailInfo-prop__col one">Тип сечения</div>
				<div class="catalogDetailInfo-prop__col two"><?= $arResult[PROPERTIES][typesechenie][VALUE]; ?></div>
			</div>
		<? } ?>

		<? if ($arResult[PROPERTIES][kreplenie][VALUE]) { ?>
			<div class="catalogDetailInfo-prop__item">
				<div class="catalogDetailInfo-prop__col one">Тип крепления</div>
				<div class="catalogDetailInfo-prop__col two"><?= $arResult[PROPERTIES][kreplenie][VALUE]; ?></div>
			</div>
		<? } ?>

		<? if ($arResult[PROPERTIES][edizmereniy][VALUE]) { ?>
			<div class="catalogDetailInfo-prop__item">
				<div class="catalogDetailInfo-prop__col one">Единицы измерения</div>
				<div class="catalogDetailInfo-prop__col two"><?= $arResult[PROPERTIES][edizmereniy][VALUE]; ?></div>
			</div>
		<? } ?>




	</div>



	<div class="sectionCatalogList-items-prev-control__col two algoods">

		<button onclick="$('.variant_goods').css('display','block');" class="sectionCatalogList-items-prev-price__buy black popupAddBasket__open contcust" data-msg-ok="Купить" href="javascript:void(0)" data-value="483" style="background: #fff !important;color: black; border: 1px solid #2F2F2F;">


			Другие варианты этого товара


		</button>

	</div>







	<style>
		.mibilistvar {
			padding: 10px 0 10px 0;
			border-bottom: 1px solid #d7d7d7;

		}
	</style>



	<? if ($arResult["~DETAIL_TEXT"]) { ?>
		<details style="margin: 20px;" open>
			<!-- <details open> -->
			<summary style='color: #2f2f2f;    font-style: normal;    font-weight: 600;    font-size: 15px;    font-family: "OpenSans-Regular","Open Sans","Helvetica Neue",Helvetica,Arial,sans-serif;    line-height: 40px;'>Описание

				<span style="float: right;" class="minusplus1" class="minusplus1">-</span>
			</summary>
			<div class="descript11" style='    padding: 0px;'>
				<?= $arResult["~DETAIL_TEXT"]; ?>
			</div>
		</details>
	<? } ?>



	<details style="margin: 20px;">
		<!-- <details open> -->
		<summary style='color: #2f2f2f;    font-style: normal;    font-weight: 600;    font-size: 15px;    font-family: "OpenSans-Regular","Open Sans","Helvetica Neue",Helvetica,Arial,sans-serif;    line-height: 40px;'>Нет нужного размера или цвета?

			<span style="float: right;" class="minusplus1">+</span>
		</summary>
		<div class="descript11" style='    padding: 0px;'>
			Можете позвонить нам и мы подберем альтернативный вариант<br>
			- 8 800 302 44 01 (Бесплатно по РФ)<br>
			- 8 495 413 74 15 (Москва и МО)<br>
		</div>
	</details>



	<details style="margin: 20px;">
		<!-- <details open> -->
		<summary style='color: #2f2f2f;    font-style: normal;    font-weight: 600;    font-size: 15px;    font-family: "OpenSans-Regular","Open Sans","Helvetica Neue",Helvetica,Arial,sans-serif;    line-height: 40px;'>Частые вопросы

			<span style="float: right;" class="minusplus1">+</span>
		</summary>
		<div class="descript11" style='    padding: 0px;'>
			Можете позвонить нам и мы подберем альтернативный вариант<br>
			- 8 800 302 44 01 (Бесплатно по РФ)<br>
			- 8 495 413 74 15 (Москва и МО)<br>
		</div>
	</details>




	<style>
		details summary::-webkit-details-marker {
			/*background: red;*/
			opacity: 0;
			font-size: 0px;
		}
	</style>







	<div class="sectionCatalogList-items-prev-control__col two btnfixby" style="position: fixed; bottom: 5px; z-index: 400; width: 100%; margin: 0px !important;padding: 20px; ">

		<button class="sectionCatalogList-items-prev-price__buy black popupAddBasket__open buy-but1" data-msg-ok="Купить" href="javascript:void(0)" data-value="483" style="background: #ff4500 !important; color: #fff;border: unset !important;">
			Купить
		</button>
	</div>











</div>






<div class="mobi planch2">

	<? //Поделиться моби
	?>



	<div class='sharemobi'>
		<div class="lnr lnr-cross btncls closebtncustom close2" onclick="$('.shade').css('display','none');$('.sharemobi').css('display','none');" style=""></div>

		<div class="titlevarc">Поделиться с друзьями</div>




		<div class="sharein">


			<div class="itemshare">
				<a class="share-popup__item" target="_blank" href="https://www.instagram.com/torgkomplekt/"><span class="fa fa-instagram share-popup__icon"></span></a>

			</div>

			<div class="itemshare">
				<a class="share-popup__item" target="_blank" href="https://vk.com/share.php?url=<?= $url11; ?>&image=<?= $url22; ?><?= CFile::GetPath($arResult[PROPERTIES][Gallery][VALUE][0]); ?>"><span class="fa fa-vk share-popup__icon"></span></a>

			</div>


			<div class="itemshare">
				<a class="share-popup__item" target="_blank" href="https://www.facebook.com/sharer.php?src=sp&u=<?= $url11; ?>"><span class="fa fa-facebook share-popup__icon"></span></a>

			</div>


			<div class="itemshare">
				<a class="share-popup__item" target="_blank" href="https://twitter.com/intent/tweet?&url=<?= $url11; ?>&text=<?= urlencode($arResult[NAME]); ?>.Закажи%20в%20Интернет-магазине%20ТОРГКОМПЛЕКТ"><span class="fa fa-twitter share-popup__icon"></span></a>

			</div>


			<div class="itemshare">
				<a class="share-popup__item" target="_blank" href="https://api.whatsapp.com/send?text=<?= urlencode($arResult[NAME]); ?>.%0A<?= $url11; ?>"><span class="fa fa-whatsapp share-popup__icon"></span></a>

			</div>


			<div class="itemshare">
				<a class="share-popup__item" target="_blank" href="mailto:?subject=<?= urlencode($arResult[NAME]); ?>&body=<?= $url11; ?>&url=<?= $url11; ?>"><span class="fa fa-envelope-o share-popup__icon"></span></a>

			</div>

		</div>


	</div>





	<? //Варианты товаров
	?>
	<div class="variant_goods">
		<div class="lnr lnr-cross btncls closebtncustom" onclick="$('.variant_goods').css('display','none');" style=""></div>
		<br><br>
		<div class="titlevarc">Другие варианты товара</div>


		<? // Начало вывода товаров
		$result1 = array_unique($torgoggerid);



		$arFilter3_linksnew1 = array(
			"IBLOCK_ID" => 6,
			"XML_ID" => $result1,
			"ACTIVE" => "Y"
		);


		$res3_linksnew1 = CIBlockElement::GetList(array(), $arFilter3_linksnew1, false, false);



		while ($ob3_linksnew1 = $res3_linksnew1->GetNextElement()) {

			$arFields = $ob3_linksnew1->GetFields();
			$props = $ob3_linksnew1->GetProperties();

		?>





			<?
			//Вводный код

			//Определение цены
			$PRODUCT_ID = $arFields['ID'];
			$price = CCatalogProduct::GetOptimalPrice($PRODUCT_ID, 1, $USER->GetUserGroupArray(), 'N');
			$oldprice1 = $price[PRICE][PRICE];
			$cur12 = $price[PRICE][CURRENCY];
			$price = $price['RESULT_PRICE']['DISCOUNT_PRICE'];
			$PRICE_TYPE_ID = 1;
			$rsPrices = CPrice::GetList(array(), array('PRODUCT_ID' => $arFields['ID'], 'CATALOG_GROUP_ID' => $PRICE_TYPE_ID));
			if ($arPrice = $rsPrices->Fetch()) {
			}

			//Определение ссылки 
			$linknew = str_replace("SITE_DIR#/catalog/", "/katalog-tovarov-3/", $arFields[DETAIL_PAGE_URL]) . "/";

			//Формируем материал
			$allmaterial = "";
			foreach ($props[material][VALUE] as $imgcol1) {
				$allmaterial .= $imgcol1 . ", ";
			}
			if ($props[material][VALUE][0])
				$allmaterial  = mb_substr($allmaterial, 0, -2);

			//Формируем цвет
			$allcolors = "";
			foreach ($props[color][VALUE] as $imgcol1) {
				$allcolors .= $generalcolors1[$imgcol1] . ", ";
			}
			if ($props[color][VALUE][0])
				$allcolors  = mb_substr($allcolors, 0, -2);
			?>


			<? // Вывод товара мобильная версия 
			?>
			<div class="itemproduct1 mobiitem">
				<div class="titlecust"><?= $arFields[NAME]; ?></div>

				<div class="headgoodscustom">
					<div class="tabcheck">

						<? if ($arFields[ID] == $arResult[ID]) { ?>
							<div class="checkcustom" style="background: url('/local/templates/.default/components/bitrix/catalog.element/bootstrap_v4/check.png');"></div>
						<? } else { ?>
							<div class="checkcustom" class="checkcustom" style="opacity: 0;"></div>
						<? } ?>



					</div>

					<div class="imgitemcustom">
						<div class="imginnercust" style="background-image: url('<?= CFile::GetPath($props[Gallery][VALUE][0]); ?>');"></div>
					</div>


					<div class="tabprice">
						<? echo "" . "<span class='" . (($oldprice1 > $price) ? "disc22" : "") . "'>" . CurrencyFormat($price, $arPrice["CURRENCY"]) . "</span><br>" . (($oldprice1 > $price) ? "<span class='" . (($oldprice1 > $price) ? "disc1" : "") . "'>" . CurrencyFormat($oldprice1, $cur12) . "</span><br>" : ""); ?>

					</div>

				</div>


				<div class="paramcust">
					<? if ($allcolors) { ?>
						<div class="rowitemcust">
							<div class="namerowcust">Цвет:</div>
							<div class="valrowcust"><?= $allcolors; ?></div>
						</div>
						<? } ?><? if ($allmaterial) { ?>
						<div class="rowitemcust">
							<div class="namerowcust">Материал:</div>
							<div class="valrowcust"><?= $allmaterial; ?></div>
						</div>
						<? } ?><? if ($props[obrabotka][VALUE]) { ?>
						<div class="rowitemcust">
							<div class="namerowcust">Вид обработки:</div>
							<div class="valrowcust"><?= $props[obrabotka][VALUE]; ?></div>
						</div>



						<? } ?><? if ($props[height][VALUE]) { ?>
						<div class="rowitemcust">
							<div class="namerowcust">Высота, мм:</div>
							<div class="valrowcust "><?= $props[height][VALUE]; ?></div>
						</div>

						<? } ?><? if ($props[size][VALUE]) { ?>
						<div class="rowitemcust">
							<div class="namerowcust">Длина, мм:</div>
							<div class="valrowcust "><?= $props[size][VALUE]; ?></div>
						</div>

						<? } ?><? if ($props[width][VALUE]) { ?>
						<div class="rowitemcust">
							<div class="namerowcust">Ширина, мм:</div>
							<div class="valrowcust "><?= $props[width][VALUE]; ?></div>
						</div>

						<? } ?><? if ($props[deep][VALUE]) { ?>
						<div class="rowitemcust">
							<div class="namerowcust">Глубина, мм:</div>
							<div class="valrowcust "><?= $props[deep][VALUE]; ?></div>
						</div>

						<? } ?><? if ($props[tolchina][VALUE]) { ?>
						<div class="rowitemcust">
							<div class="namerowcust">Толщина, мм:</div>
							<div class="valrowcust "><?= $props[tolchina][VALUE]; ?></div>
						</div>

						<? } ?><? if ($props[diametr][VALUE]) { ?>
						<div class="rowitemcust">
							<div class="namerowcust">Диаметр, мм:</div>
							<div class="valrowcust "><?= $props[diametr][VALUE]; ?></div>
						</div>
					<? } ?>


				</div>

				<div class="sectionCatalogList-items-prev-control__col two">

					<button onclick="document.location = '<?= $linknew; ?>';" class="sectionCatalogList-items-prev-price__buy black popupAddBasket__open contcust" data-msg-ok="Купить" href="javascript:void(0)" data-value="483" style="background: #fff !important;color: black; border: 1px solid #2F2F2F;">


						Подробнее


					</button>

				</div>
			</div>

			<style>
				@media(max-width:1270px) and (min-width:700px) {
					.mobiitem {
						display: none;
					}

					.planitem {
						display: block;
					}


				}
			</style>



			<link href="/local/templates/.default/components/bitrix/catalog.element/bootstrap_v4/product-style.css" type="text/css" rel="stylesheet" />

			<? // Вывод товара планшет 
			?>
			<div class="itemproduct1 planitem">
				<div class="titlecust"><?= $arFields[NAME]; ?></div>



				<div class="tableplan" onclick="document.location = '<?= $linknew; ?>';">

					<div class="cellplan checkplan">
						<? if ($arFields[ID] == $arResult[ID]) { ?>
							<div class="checkcustom" style="background: url('/local/templates/.default/components/bitrix/catalog.element/bootstrap_v4/check.png');"></div>
						<? } else { ?>
							<div class="checkcustom" style="opacity: 0;"></div>
						<? } ?>
					</div>

					<div class="cellplan imgplan">
						<div class="imginnercust" style="background-image: url('<?= CFile::GetPath($props[Gallery][VALUE][0]); ?>');"></div>
					</div>

					<div class="priseandparam">

						<div class="tablplanch">
							<div class="cellplan param1plan">
								<? if ($allcolors) { ?>
									<div class="rowitemcust">
										<div class="namerowcust">Цвет:</div>
										<div class="valrowcust"><?= $allcolors; ?></div>
									</div>
									<? } ?><? if ($allmaterial) { ?>
									<div class="rowitemcust">
										<div class="namerowcust">Материал:</div>
										<div class="valrowcust"><?= $allmaterial; ?></div>
									</div>
									<? } ?><? if ($props[obrabotka][VALUE]) { ?>
									<div class="rowitemcust">
										<div class="namerowcust">Вид обработки:</div>
										<div class="valrowcust"><?= $props[obrabotka][VALUE]; ?></div>
									</div>
									<? } ?><? if ($props[height][VALUE]) { ?>
									<div class="rowitemcust">
										<div class="namerowcust">Высота, мм:</div>
										<div class="valrowcust "><?= $props[height][VALUE]; ?></div>
									</div>
								<? } ?>
							</div>

							<div class="cellplan param2plan">
								<? if ($props[size][VALUE]) { ?>
									<div class="rowitemcust">
										<div class="namerowcust">Длина, мм:</div>
										<div class="valrowcust "><?= $props[size][VALUE]; ?></div>
									</div>

									<? } ?><? if ($props[width][VALUE]) { ?>
									<div class="rowitemcust">
										<div class="namerowcust">Ширина, мм:</div>
										<div class="valrowcust "><?= $props[width][VALUE]; ?></div>
									</div>

									<? } ?><? if ($props[deep][VALUE]) { ?>
									<div class="rowitemcust">
										<div class="namerowcust">Глубина, мм:</div>
										<div class="valrowcust "><?= $props[deep][VALUE]; ?></div>
									</div>

									<? } ?><? if ($props[tolchina][VALUE]) { ?>
									<div class="rowitemcust">
										<div class="namerowcust">Толщина, мм:</div>
										<div class="valrowcust "><?= $props[tolchina][VALUE]; ?></div>
									</div>

									<? } ?><? if ($props[diametr][VALUE]) { ?>
									<div class="rowitemcust">
										<div class="namerowcust">Диаметр, мм:</div>
										<div class="valrowcust "><?= $props[diametr][VALUE]; ?></div>
									</div>
								<? } ?>


							</div>
							<div class="cellplan priceplan">
								<? echo "" . "<span class='" . (($oldprice1 > $price) ? "disc22" : "") . "'>" . CurrencyFormat($price, $arPrice["CURRENCY"]) . "</span><br>" . (($oldprice1 > $price) ? "<span class='" . (($oldprice1 > $price) ? "disc1" : "") . "'>" . CurrencyFormat($oldprice1, $cur12) . "</span><br>" : ""); ?>


							</div>
						</div>
					</div>

				</div>



				<div class="btnplanch">

					<div class="btnplanchinner">Подробнее</div>
				</div>

			</div>


		<? } ?>




	</div>




	<? //Хлебные крошки моби
	{

	?>
		<?
		if ($pos) {
		?>


			<div class="custompv">
				<div class="wrapper__main">
					<div class="breadcrumbs" style="margin: 20px 0 0px 0;">
						<div class="container">
							<div class="container__wrap">
								<div class="breadcrumbs__items" itemscope="" itemtype="http://schema.org/BreadcrumbList">


									<span class="breadcrumbs__item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
										<a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная" href="/">
											<span itemprop="name">Главная</span>
											<meta itemprop="position" content="1">
										</a>
									</span>





									<?
									foreach ($_SESSION['breadcr'] as $key => $crumb) {
									?>

										<span class="breadcrumbs__item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
											<a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная" href="<?= $crumb[URL]; ?>">
												<span itemprop="name"><?= $crumb[NAME]; ?></span>
												<meta itemprop="position" content="1">
											</a>
										</span>

									<?
									}
									?>





									<span class="breadcrumbs__item">
										<span class="breadcrumbs__text"><?= $name ?></span>
									</span>


								</div>
							</div>
						</div>
					</div>
				</div>
			</div>



		<?
		} else {
		?>
			<div class="custompv">
				<div class="wrapper__main">
					<div class="breadcrumbs" style="margin: 20px 0 0px 0;">
						<div class="container">
							<div class="container__wrap">
								<div class="breadcrumbs__items" itemscope="" itemtype="http://schema.org/BreadcrumbList">


									<span class="breadcrumbs__item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
										<a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная" href="/">
											<span itemprop="name">Главная</span>
											<meta itemprop="position" content="1">
										</a>
									</span>

									<span class="breadcrumbs__item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
										<a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная" href="<?= $katalogurl; ?>">
											<span itemprop="name">Каталог</span>
											<meta itemprop="position" content="1">
										</a>
									</span>


									<span class="breadcrumbs__item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
										<a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Главная" href="<?= $arResult[SECTION][SECTION_PAGE_URL]; ?>">
											<span itemprop="name"><?= $arResult[SECTION][NAME]; ?></span>
											<meta itemprop="position" content="1">
										</a>
									</span>






									<span class="breadcrumbs__item">
										<span class="breadcrumbs__text"><?= $name ?></span>
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

	<?

	}
	?>





	<div class="sectionCatalogList-items-prev-control__col two btnfixby1" style="position: fixed; bottom: 5px; z-index: 400; width: 40%; margin: 0px !important;padding: 20px; right: 0;">


		<div class="catalogDetailInfo-buy__col one" style="    margin-left: 0px;">


			<div class="catalogDetailInfo-buy__price" style="<?= (ceil($arResult[ITEM_PRICES][0][UNROUND_BASE_PRICE]) > ceil($arResult[ITEM_PRICES][0][UNROUND_PRICE]) ? 'font-style: normal;font-weight: 600;font-size: 20px;line-height: 34px;color: #ff4500;' : 'display: none;') ?> font-size: 20px;">

				<?= number_format(ceil($arResult[ITEM_PRICES][0][UNROUND_PRICE]), 0, ',', ' ') . " руб."; ?>

			</div>

			<div class="catalogDetailInfo-buy__price-old" style="<?= (ceil($arResult[ITEM_PRICES][0][UNROUND_BASE_PRICE]) > ceil($arResult[ITEM_PRICES][0][UNROUND_PRICE]) ? '' : 'font-style: normal;font-weight: 600;font-size: 25px;line-height: 34px;color: #2f2f2f;text-decoration-line: unset;') ?>  font-size: 15px;font-family: Open Sans;font-style: normal;font-weight: normal; ">

				<?= CurrencyFormat($arResult[ITEM_PRICES][0][UNROUND_BASE_PRICE], $arResult[ITEM_PRICES][0][CURRENCY]); ?></div>




			<a class="catalogDetailInfo-buy__link" href="#" style="display:none;">сравнить</a><a class="catalogDetailInfo-buy__link two" href="#" style="display:none;">в избранное</a>
		</div>





		<button class="sectionCatalogList-items-prev-price__buy black popupAddBasket__open buy-but1" data-msg-ok="Купить" href="javascript:void(0)" data-value="483" style="background: #ff4500 !important; color: #fff;border: unset !important;width: 48%;">
			Купить
		</button>
	</div>






	<div class="plancolall">

















		<? //Галерея фотографий
		?>
		<div class="plancol1">
			<div class="gallerypvcontent" style="position: relative;">

				<div class="tabcellpv btleft kardd1 mobivers">
					<div class="arrowleftpv lnr lnr-chevron-left" style="opacity: 1; <?= ($arResult[PROPERTIES][Gallery][VALUE][0] ? "" :  "opacity: 0 !important;"); ?>"></div>
				</div>


				<div class="gallerypv tabcellpv">
					<div class="qqqq99">

						<div class="ggghhh">
							<div class="ggghhh1">
							</div>
						</div>



						<div class="scroll">
							<div class="scroll_child mobivers" style="transform: translateX(0px);">



								<? foreach ($arResult[PROPERTIES][Gallery][VALUE] as $imggoods) : ?>

									<div class="elem11 kardd1 mobivers" style="background-image:url(<?= CFile::GetPath($imggoods) ?>); /*width:190px;*/"></div>

								<? endforeach; ?>

							</div>

						</div>

					</div>
				</div>

				<div class="tabcellpv btright kardd1 mobivers">
					<div class="arrowrightpv lnr lnr-chevron-right" style="opacity: 1; <?= ($arResult[PROPERTIES][Gallery][VALUE][0] ? "" :  "opacity: 0 !important;"); ?>"></div>
				</div>




			</div>


			<div style="text-align: center;" class="allpointq2">


				<? foreach ($arResult[PROPERTIES][Gallery][VALUE] as $imggoods) : ?>

					<div style="display: inline-block;width: 15px;"><svg style="height:20px" class="pointgal2">
							<circle r="2" cx="7" cy="1mm" /></svg></div>
				<? endforeach; ?>


			</div>

		</div>


		<div class="plancol3">




			<br>





			<? //Вывод скидки и стикеров
			?>




			<div class="catalogDetailInfoProp">
				<? if ($arResult[PROPERTIES][discount][VALUE]) { ?>
					<div class="catalogDetailInfoProp__item sale">-<?= $arResult[PROPERTIES][discount][VALUE]; ?> %</div>
				<? } ?>


				<? foreach ($arResult[PROPERTIES][stiker][VALUE] as $key => $stiker) { ?>
					<div class="catalogDetailInfoProp__item green"><?= $stiker; ?></div>
				<? } ?>
			</div>





			<div class="catalogDetailInfoTags">
				<a class="catalogDetailInfoTags__link" href="<?= $katalogurl ?>">Каталог</a>


				<?
				$ElementId = $arResult['ID'];
				$db_groups = CIBlockElement::GetElementGroups($ElementId, true);
				while ($ar_group = $db_groups->Fetch()) {
				?>

					<a class="catalogDetailInfoTags__link" href="<?= $katalogurl ?><?= $ar_group[CODE] ?>/"><?= $ar_group["NAME"] ?></a>

				<?
				}
				?>


				<?
				$ji = 0;
				foreach ($arResult[PROPERTIES][vid_oborudovaniy][VALUE] as $key => $vidobor) { ?>

					<a class="catalogDetailInfoTags__link" href="<?= $katalogurl ?>filter/vid_oborudovaniy-is-<?= $arResult[PROPERTIES][vid_oborudovaniy][VALUE_XML_ID][$ji++] ?>/apply/"><?= $vidobor; ?></a>

				<? } ?>





			</div>



			<script>
				$('.shade').css('display', 'none');
				$('.sharemobi').css('display', 'none');
			</script>


			<? //Поделиться
			?>
			<div style="margin: 16px 20px 0 10px;display: inline-block;float: right;">
				<div onclick="$('.shade').css('display', 'block'); $('.sharemobi').css('display', 'block');" class="lnr lnr-exit-up catalogDetailPhoto-big__icon toggleTitle ">
				</div>
			</div>



			<h1 class="namegood">
				<?= $arResult[NAME]; ?>
			</h1>


			<div class="article">Артикул: <?= $arResult[PROPERTIES][Article][VALUE]; ?></div>

			<div class="catalogDetailInfo__preview">
				<?= $arResult["~PREVIEW_TEXT"]; ?>
			</div>




			<? //Купить кнопка и количество
			?>
			<div class="catalogDetailInfo-buy" style="margin:auto; margin:0 20px 0 20px;">
				<div class="catalogDetailInfo-buy__col one" style="    margin-left: 0px;    text-align: left !important;">
					<div class="catalogDetailInfo-buy__price" style="<?= (ceil($arResult[ITEM_PRICES][0][UNROUND_BASE_PRICE]) > ceil($arResult[ITEM_PRICES][0][UNROUND_PRICE]) ? 'font-style: normal;font-weight: 600;font-size: 20px;line-height: 34px;color: #ff4500;' : 'display: none;') ?> font-size: 20px;">

						<?= number_format(ceil($arResult[ITEM_PRICES][0][UNROUND_PRICE]), 0, ',', ' ') . " руб."; ?>

					</div>
					<div class="catalogDetailInfo-buy__price-old" style="<?= (ceil($arResult[ITEM_PRICES][0][UNROUND_BASE_PRICE]) > ceil($arResult[ITEM_PRICES][0][UNROUND_PRICE]) ? '' : 'font-style: normal;font-weight: 600;font-size: 25px;line-height: 34px;color: #2f2f2f;text-decoration-line: unset;') ?>  font-size: 15px;font-family: Open Sans;font-style: normal;font-weight: normal; ">

						<?= CurrencyFormat($arResult[ITEM_PRICES][0][UNROUND_BASE_PRICE], $arResult[ITEM_PRICES][0][CURRENCY]); ?></div>




					<a class="catalogDetailInfo-buy__link" href="#" style="display:none;">сравнить</a><a class="catalogDetailInfo-buy__link two" href="#" style="display:none;">в избранное</a>
				</div>

				<? //Кнопка купить
				?>



			</div>



			<div class="sectionCatalogList-items-prev-control" style="align-items: center;justify-content: unset;">

				<div class="sectionCatalogList-items-prev-control__col two btnstartby">
					<button class="sectionCatalogList-items-prev-price__buy black popupAddBasket__open buy-but1" data-msg-ok="Купить" href="javascript:void(0)" data-value="<?= $arResult[ID]; ?>" style="<?= $itInBasket ? "background: #2f2f2f !important;" : "background: #fff !important;color: black; border: 1px solid #2F2F2F;"; ?>">


						<?= $itInBasket ? "Добавлено" : "Купить"; ?>



					</button>
				</div>


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
	</div>













	<div class="plancol1">


		<h2 class="catalogDetailInfo-prop__title">Характеристики:</h2>
		<div class="catalogDetailInfo-prop__items">







			<? if ($arResult[PROPERTIES][material][VALUE][0]) { ?>
				<div class="catalogDetailInfo-prop__item">
					<div class="catalogDetailInfo-prop__col one">Материал</div>
					<div class="catalogDetailInfo-prop__col two">
						<? $allval = "";
						foreach ($arResult[PROPERTIES][material][VALUE] as $val1) {
							$allval .= $val1 . ", ";
						}
						$allval  = mb_substr($allval, 0, -2);
						echo $allval; ?>
					</div>
				</div>
			<? } ?>


			<? if ($arResult[PROPERTIES][color][VALUE][0]) { ?>
				<div class="catalogDetailInfo-prop__item">
					<div class="catalogDetailInfo-prop__col one">Цвет</div>
					<div class="catalogDetailInfo-prop__col two">

						<? //Список цветов
						$allcolors = "";
						foreach ($generalcolors as $imgcol1) {
							$allcolors .= $imgcol1[Name] . ", ";
						}
						$allcolors  = mb_substr($allcolors, 0, -2);
						echo $allcolors;
						?>

					</div>
				</div>
			<? } ?>






			<? if ($arResult[PROPERTIES][width][VALUE]) { ?>
				<div class="catalogDetailInfo-prop__item">
					<div class="catalogDetailInfo-prop__col one">Ширина, мм</div>
					<div class="catalogDetailInfo-prop__col two"><?= $arResult[PROPERTIES][width][VALUE]; ?></div>
				</div>
			<? } ?>

			<? if ($arResult[PROPERTIES][deep][VALUE]) { ?>
				<div class="catalogDetailInfo-prop__item">
					<div class="catalogDetailInfo-prop__col one">Глубина, мм</div>
					<div class="catalogDetailInfo-prop__col two"><?= $arResult[PROPERTIES][deep][VALUE]; ?></div>
				</div>
			<? } ?>

			<? if ($arResult[PROPERTIES][height][VALUE]) { ?>
				<div class="catalogDetailInfo-prop__item">
					<div class="catalogDetailInfo-prop__col one">Высота, мм</div>
					<div class="catalogDetailInfo-prop__col two"><?= $arResult[PROPERTIES][height][VALUE]; ?></div>
				</div>
			<? } ?>

			<? if ($arResult[PROPERTIES][sechenie][VALUE]) { ?>
				<div class="catalogDetailInfo-prop__item">
					<div class="catalogDetailInfo-prop__col one">Сечение, мм</div>
					<div class="catalogDetailInfo-prop__col two"><?= $arResult[PROPERTIES][sechenie][VALUE]; ?></div>
				</div>
			<? } ?>

			<? if ($arResult[PROPERTIES][typesechenie][VALUE]) { ?>
				<div class="catalogDetailInfo-prop__item">
					<div class="catalogDetailInfo-prop__col one">Тип сечения</div>
					<div class="catalogDetailInfo-prop__col two"><?= $arResult[PROPERTIES][typesechenie][VALUE]; ?></div>
				</div>
			<? } ?>

			<? if ($arResult[PROPERTIES][kreplenie][VALUE]) { ?>
				<div class="catalogDetailInfo-prop__item">
					<div class="catalogDetailInfo-prop__col one">Тип крепления</div>
					<div class="catalogDetailInfo-prop__col two"><?= $arResult[PROPERTIES][kreplenie][VALUE]; ?></div>
				</div>
			<? } ?>

			<? if ($arResult[PROPERTIES][edizmereniy][VALUE]) { ?>
				<div class="catalogDetailInfo-prop__item">
					<div class="catalogDetailInfo-prop__col one">Единицы измерения</div>
					<div class="catalogDetailInfo-prop__col two"><?= $arResult[PROPERTIES][edizmereniy][VALUE]; ?></div>
				</div>
			<? } ?>




		</div>

		<div class="sectionCatalogList-items-prev-control__col two">

			<button onclick="$('.variant_goods').css('display','block');" class="sectionCatalogList-items-prev-price__buy black popupAddBasket__open contcust" data-msg-ok="Купить" href="javascript:void(0)" data-value="483" style="background: #fff !important;color: black; border: 1px solid #2F2F2F;">


				Другие варианты этого товара


			</button>

		</div>


	</div>













	<? if ($arResult["~DETAIL_TEXT"]) { ?>
		<details style="margin: 20px;" open>
			<!-- <details open> -->
			<summary style='color: #2f2f2f;    font-style: normal;    font-weight: 600;    font-size: 15px;    font-family: "OpenSans-Regular","Open Sans","Helvetica Neue",Helvetica,Arial,sans-serif;    line-height: 40px;'>Описание

				<span style="float: right;" class="minusplus1">-</span>
			</summary>
			<div class="descript11" style='    padding: 0px;'>
				<?= $arResult["~DETAIL_TEXT"]; ?>
			</div>
		</details>
	<? } ?>



	<details style="margin: 20px;">
		<!-- <details open> -->
		<summary style='color: #2f2f2f;    font-style: normal;    font-weight: 600;    font-size: 15px;    font-family: "OpenSans-Regular","Open Sans","Helvetica Neue",Helvetica,Arial,sans-serif;    line-height: 40px;'>Нет нужного размера или цвета?

			<span style="float: right;" class="minusplus1">+</span>
		</summary>
		<div class="descript11" style='    padding: 0px;'>
			Можете позвонить нам и мы подберем альтернативный вариант<br>
			- 8 800 302 44 01 (Бесплатно по РФ)<br>
			- 8 495 413 74 15 (Москва и МО)<br>
		</div>
	</details>



	<details style="margin: 20px;">
		<!-- <details open> -->
		<summary style='color: #2f2f2f;    font-style: normal;    font-weight: 600;    font-size: 15px;    font-family: "OpenSans-Regular","Open Sans","Helvetica Neue",Helvetica,Arial,sans-serif;    line-height: 40px;'>Частые вопросы

			<span style="float: right;" class="minusplus1">+</span>
		</summary>
		<div class="descript11" style='    padding: 0px;'>
			Можете позвонить нам и мы подберем альтернативный вариант<br>
			- 8 800 302 44 01 (Бесплатно по РФ)<br>
			- 8 495 413 74 15 (Москва и МО)<br>
		</div>
	</details>









</div>






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
		'PROPERTY_CODE_' . $arParams['IBLOCK_ID'] => (isset($arParams['LIST_PROPERTY_CODE']) ? $arParams['LIST_PROPERTY_CODE'] : []),
		'PROPERTY_CODE_' . $recommendedData['OFFER_IBLOCK_ID'] => (isset($arParams['LIST_OFFERS_PROPERTY_CODE']) ? $arParams['LIST_OFFERS_PROPERTY_CODE'] : []),
		'PROPERTY_CODE_MOBILE' . $arParams['IBLOCK_ID'] => $arParams['LIST_PROPERTY_CODE_MOBILE'],
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
		'CART_PROPERTIES_' . $arParams['IBLOCK_ID'] => (isset($arParams['PRODUCT_PROPERTIES']) ? $arParams['PRODUCT_PROPERTIES'] : []),
		'CART_PROPERTIES_' . $recommendedData['OFFER_IBLOCK_ID'] => (isset($arParams['OFFERS_CART_PROPERTIES']) ? $arParams['OFFERS_CART_PROPERTIES'] : []),
		'ADDITIONAL_PICT_PROP_' . $arParams['IBLOCK_ID'] => $arParams['ADD_PICT_PROP'],
		'ADDITIONAL_PICT_PROP_' . $recommendedData['OFFER_IBLOCK_ID'] => $arParams['OFFER_ADD_PICT_PROP'],

		'SHOW_FROM_SECTION' => 'N',
		'DETAIL_URL' => $arResult['FOLDER'] . $arResult['URL_TEMPLATES']['element'],
		'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
		'CURRENCY_ID' => $arParams['CURRENCY_ID'],
		'HIDE_NOT_AVAILABLE' => $arParams['HIDE_NOT_AVAILABLE'],
		'HIDE_NOT_AVAILABLE_OFFERS' => $arParams['HIDE_NOT_AVAILABLE_OFFERS'],

		'LABEL_PROP_' . $arParams['IBLOCK_ID'] => $arParams['LABEL_PROP'],
		'LABEL_PROP_MOBILE_' . $arParams['IBLOCK_ID'] => $arParams['LABEL_PROP_MOBILE'],
		'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],
		'PRODUCT_BLOCKS_ORDER' => $arParams['LIST_PRODUCT_BLOCKS_ORDER'],
		'PRODUCT_ROW_VARIANTS' => "[{'VARIANT':'3','BIG_DATA':false}]",
		'ENLARGE_PRODUCT' => $arParams['LIST_ENLARGE_PRODUCT'],
		'ENLARGE_PROP_' . $arParams['IBLOCK_ID'] => isset($arParams['LIST_ENLARGE_PROP']) ? $arParams['LIST_ENLARGE_PROP'] : '',
		'SHOW_SLIDER' => $arParams['LIST_SHOW_SLIDER'],
		'SLIDER_INTERVAL' => isset($arParams['LIST_SLIDER_INTERVAL']) ? $arParams['LIST_SLIDER_INTERVAL'] : '',
		'SLIDER_PROGRESS' => isset($arParams['LIST_SLIDER_PROGRESS']) ? $arParams['LIST_SLIDER_PROGRESS'] : '',

		'OFFER_TREE_PROPS_' . $recommendedData['OFFER_IBLOCK_ID'] => (isset($arParams['OFFER_TREE_PROPS']) ? $arParams['OFFER_TREE_PROPS'] : []),
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
		'COMPARE_PATH' => $arResult['FOLDER'] . $arResult['URL_TEMPLATES']['compare'],
		'COMPARE_NAME' => $arParams['COMPARE_NAME'],

		//Добавил для правильных ссылок
		//"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
		"SECTION_ID" => $arResult[SECTION][ID],


		"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		"SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
		"DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["element"],




	),
	$component
);
?>


















<?

global $arrFilter;
$arrFilter = array(
	"SECTION_ID" => $arResult["SECTION"]["ID"],
);

?>


<div class="hits">



	<?/* Топ элементов*/ ?>
	<? $APPLICATION->IncludeComponent(
		"bitrix:catalog.top",
		"bootstrap_v4",
		array(
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
			"OFFERS_FIELD_CODE" => array(0 => "", 1 => "",),
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
			"PROPERTY_CODE_MOBILE" => array(0 => "color", 1 => "colorsvariant",),
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
			"SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
			"DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["element"],


		)
	); ?>





</div>







<div class="hits" style="margin-bottom: 50px;">



	<?/* Акции*/ ?>
	<? $APPLICATION->IncludeComponent(
		"bitrix:catalog.top",
		"bootstrap_v4",
		array(
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
			"OFFERS_FIELD_CODE" => array(0 => "", 1 => "",),
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
			"PROPERTY_CODE_MOBILE" => array(0 => "color", 1 => "colorsvariant",),
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
			"SECTION_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["section"],
			"DETAIL_URL" => $arResult["FOLDER"] . $arResult["URL_TEMPLATES"]["element"],


		)
	); ?>


</div>





<style>
	@media (max-width:700px) {

		.sectionCatalogList-items-prev-price__buy.black.popupAddBasket__open.buy-but1:hover {
			background: #2f2f2f !important;

		}
	}
</style>



<script>
	$(document).ready(function() {

		$('details').click(function() {


			if ($(this).find('.minusplus1').html() == '+')
				$(this).find('.minusplus1').html('-');
			else
				$(this).find('.minusplus1').html('+');




		});







		//Скрытие кнопки
		var startscr1 = 5;
		var endscr1 = 0;
		startscr1 = $('.bu12').offset().top;
		endscr1 = $('.footer').offset().top;
		$('.btnfixby').css('display', 'none');
		$(document).scroll(function() {
			if (($(this).scrollTop() > (startscr1)) && ($(this).scrollTop() < (endscr1 - $(window).height()))) {
				$('.btnfixby').css('display', 'block');
			} else {
				$('.btnfixby').css('display', 'none');
			}
		});




		//Скрытие кнопки
		var startscr = 5;
		var endscr = 0;
		startscr = $('.btnstartby').offset().top;
		endscr = $('.footer').offset().top;
		$('.btnfixby1').css('display', 'none');
		$(document).scroll(function() {
			if (($(this).scrollTop() > (startscr)) && ($(this).scrollTop() < (endscr - $(window).height()))) {
				$('.btnfixby1').css('display', 'block');
			} else {
				$('.btnfixby1').css('display', 'none');
			}
		});











		var spacebtn = true;
		var fixx = true;
		var uuu = 0;
		var i = 0;
		var countelem = 0;
		var indpoint = 0;
		//var sumpoint = 0;



		var sumpoint = 0;

		<? foreach ($arResult[PROPERTIES][Gallery][VALUE] as $imggoods) : ?>
			sumpoint = sumpoint + 1;
		<? endforeach; ?>






		$('.pointgal').eq(0).find('circle').css('r', '4');
		$('.pointgal2').eq(0).find('circle').css('r', '4');

		$(function() {

			$(".btright").click(function() {

				var tt = this;

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



					if (sumpoint > (indpoint + 1)) {

						$('.pointgal').eq(indpoint).find('circle').css('r', '2');
						$('.pointgal2').eq(indpoint).find('circle').css('r', '2');

						$('.pointgal').eq(++indpoint).find('circle').css('r', '4');
						$('.pointgal2').eq(indpoint).find('circle').css('r', '4');


					}

					spacebtn = false;
					setTimeout(function() {
						spacebtn = true;
					}, 300);
					$(tt).css("overflow", "scroll");


					if (($(this).siblings(".gallerypv").find(".elem11").length * valwidth) - (($(this).siblings(".gallerypv").find(".elem11").width() + 55) * 2) < uuu) {
						$(this).css("opacity", "0.3");
					}

					$(this).parents('.gallerypvcontent').find(".arrowleftpv").css("opacity", "1");
					$(this).parents('.gallerypvcontent').find(".btleft").css("opacity", "1");

				}


			});




			$(".btleft").click(function() {
				var tt = this;
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


					if (-1 < (indpoint - 1)) {

						$('.pointgal').eq(indpoint).find('circle').css('r', '2');
						$('.pointgal2').eq(indpoint).find('circle').css('r', '2');

						$('.pointgal').eq(--indpoint).find('circle').css('r', '4');
						$('.pointgal2').eq(indpoint).find('circle').css('r', '4');

					}


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



						if (sumpoint > (indpoint + 1)) {

							$('.pointgal').eq(indpoint).find('circle').css('r', '2');
							$('.pointgal2').eq(indpoint).find('circle').css('r', '2');

							$('.pointgal').eq(++indpoint).find('circle').css('r', '4');
							$('.pointgal2').eq(indpoint).find('circle').css('r', '4');

						}


						if (($(this).parents(".gallerypv").find(".elem11").length * valwidth) - (valwidth * 2 + 50) < uuu) {
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

						if (-1 < (indpoint - 1)) {

							$('.pointgal').eq(indpoint).find('circle').css('r', '2');
							$('.pointgal2').eq(indpoint).find('circle').css('r', '2');

							$('.pointgal').eq(--indpoint).find('circle').css('r', '4');
							$('.pointgal2').eq(indpoint).find('circle').css('r', '4');

						}



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
					var cou = $(this).siblings(".gallerypv").find(".elem11").length * $(this).siblings(".gallerypv").find(".elem11").width() * (-1);

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
						$(this).siblings(".gallerypv").find(".scroll_child").css("transform", "translateX(" + posit + "px)");
					} else {
						$(this).siblings(".gallerypv").find(".scroll_child").css("transform", "translateX(0px)");
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




					if ((($(this).siblings(".scroll").find(".elem").length * valwidth) - valwidth) < (uuu + $(this).siblings(".scroll").width() + 100)) {
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



	});
</script>










<? //Обновление крипта при загрузки ajax
?>
<script>
	"use strict";
	pageIndexCatalogHeightItem();
	toggleTitle();
	catalogDetailPhoto();
</script>









<div class="info1" style="display:none;" data-item-id="<?= $arResult[ID]; ?>" data-item-img="<?= CFile::GetPath($arResult[PROPERTIES][Gallery][VALUE][0]); ?>" data-item-name="<?= $arResult[NAME]; ?>" data-item-article="<?= $arResult[PROPERTIES][Article][VALUE]; ?>" data-item-price="<?= $arResult[ITEM_PRICES][0][UNROUND_PRICE]; ?>">


</div>





<script>
	<? echo "var str = '" . $arResult["~ADD_URL_TEMPLATE"] . "';"; ?>





	$(".sectionCatalogList-items-count__btn.minus").click(function() {

		var znachenie = $(this).parents(".sectionCatalogList-items__item").find(".product-item-amount-field").val();

		//alert(znachenie);

		if (znachenie > 1) {


			$(this).parents(".sectionCatalogList-items__item").find(".sectionCatalogList-items-count__input-text").val(znachenie);

			$(this).parents(".sectionCatalogList-items__item").find(".product-item-amount-field-btn-minus").trigger('click');

		}

	});



	$(".sectionCatalogList-items-count__btn.plus").click(function() {

		var znachenie = $(this).parents(".sectionCatalogList-items__item").find(".sectionCatalogList-items-count__input-text").val();




		$(this).parents(".sectionCatalogList-items__item").find(".sectionCatalogList-items-count__input-text").val(znachenie);

		$(this).parents(".sectionCatalogList-items__item").find(".product-item-amount-field-btn-plus").trigger('click');



	});













	$(".buy-but1").click(function() {

		//изменить цвет кнопки и шрифт
		$(this).css("color", "white");
		$(this).css("background", "rgb(47, 47, 47)");
		$(this).html('Добавлено');


		var qq = $(this).attr('data-value');
		var qount = $(".sectionCatalogList-items-count__input-text").val();


		// Определение Параметров добавленного товара

		var id = $(".info1").attr('data-item-id');

		name = $(".info1").attr('data-item-name');
		article = $(".info1").attr('data-item-article');
		price = $(".info1").attr('data-item-price');
		imggg = $(".info1").attr('data-item-img');


		if ($('.basket_header__item').is('#id' + id)) {
			//Есть товар в корзине

			//Количество товаров
			var currentcount = $(".basket_header__items").find('#id' + id).attr('data-item-quantity');

			allcount = Number.parseInt(currentcount) + Number.parseInt(qount);

			allprice = allcount * price;



			$(".basket_header__items").find('#id' + id).find('.basket_header__count').html("" + allcount + " шт");
			$(".basket_header__items").find('#id' + id).find('.basket_header-price__summ').html("" + allprice.toLocaleString() + " руб.");











		} else {
			//Нет товар в корзине




			var sumprice = Number.parseInt(qount) * Number.parseInt(price);
			//alert(sumprice);

			var add = "<div class='basket_header__item' id=id" + id + " data-item-quantity=" + qount + " data-item-id=" + id + ">            <div class='basket_header__col one'><a class='basket_header__pic' href='#'>						<div class='basket_header__img imgcart22' style='background-image: url(" + imggg + ");' alt=''></div>						</a></div>            <div class='basket_header__col two'>              <div class='basket_header-hero'><a class='basket_header__name' href='#' style=''>" + name + "</a>                <div class='basket_header__art'>" + article + "</div>                <div class='basket_header__count'>" + qount + " шт</div>              </div>            </div>            <div class='basket_header__col free'><a class='basket_header__delete toggleTitle' href='javascript:void(0);'>                <div class='lnr lnr-trash basket_header__icon  dell1'  data-id=" + id + "></div></a>              <div class='basket_header-price'>                <div class='basket_header-price__summ'>" + sumprice.toLocaleString() + " руб.</div>              </div>            </div>          </div>";




			$(".basket_header__items").append(add);






		}























		const searchRegExp = '#ID#';
		const replaceWith = qq; //483





		const result = str.replace(searchRegExp, replaceWith);



		result; // => 'goose goose go'


		// Добавление товара в корзину
		$.ajax({
			type: "GET",
			url: result + "&quantity=" + qount,
			dataType: "html",
			success: function(out) {




				$.ajax({
					type: "POST",
					url: "/local/include/cartinfomin.php",

					cache: false,
					dataType: "html",
					success: function(jsondata) {

						var person = JSON.parse(jsondata);

						var tess = "<div class='scrollHeader-basket__order-text'>" + person['count'] + "</div><div class='scrollHeader-basket__order-text'>" + person['cost'] + "</div>";

						$(".scrollHeader-basket__order").html(tess);


						var tess = "<div class='header-middle-control-basket__product'>" + person['count'] + "</div><div class='header-middle-control-basket__product'>" + person['cost'] + "</div>";

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
	$("body").on({
		mouseenter: function() {
			//stuff to do on mouse enter
			var imgproduct = $(this).attr('data-img');
			var nameproduct = $(this).attr('data-name');


			$('.showbox1').css('bottom', ($('.tabvariant').height() - $(this).position().top + 'px'));

			$('.boxtitle1').html(nameproduct);


			$('.imgbox1').css('background-image', 'url("' + imgproduct + '")');


			$('.showbox1').css('display', 'block');


		},
		mouseleave: function() {
			//stuff to do on mouse leave

			$('.showbox1').css('display', 'none');
		}
	}, '.showimgproduct');
</script>

