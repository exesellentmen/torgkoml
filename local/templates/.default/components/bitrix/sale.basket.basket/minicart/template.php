<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main;
use Bitrix\Main\Localization\Loc;

\Bitrix\Main\UI\Extension::load("ui.fonts.ruble");

/**
 * @var array $arParams
 * @var array $arResult
 * @var string $templateFolder
 * @var string $templateName
 * @var CMain $APPLICATION
 * @var CBitrixBasketComponent $component
 * @var CBitrixComponentTemplate $this
 * @var array $giftParameters
 */

 
 
 /*
 
echo "Тест<br>";
 
 
 
 $qount = 0;
 
foreach($arResult[GRID][ROWS] as $item ){
	 $qount += $item[QUANTITY];
	 
	 
	echo "id - ".$item[PRODUCT_ID]."  <br>"; 
	echo "Наименование - ".$item[NAME]."  <br>"; 	
	echo "Артикуль - ".$item[PROPERTY_Article_VALUE]."  <br>"; 		
	echo "Цена старая - ".$item[FULL_PRICE_FORMATED]."  <br>"; 	 
	echo "Цена новая - ".$item[PRICE_FORMATED]."  <br>"; 
	echo "Сумма старая - ".$item[SUM_FULL_PRICE_FORMATED]."  <br>"; 
	echo "Сумма новая - ".$item[SUM]."  <br>"; 
	echo "Количество - ".$item[QUANTITY]."  <br>"; 


	
	echo "   <br><br>";  
 }
 

 echo "Количество: ".$qount."<br>";
  echo "Сумма: ".$arResult[allSum_FORMATED]."<br>";
 
   echo "<br>";
 
 
 */
 
 
 
 
 
 
 
 
	?>  

	
	<?
	print_r($item[ITEM_PRICES][0][PRICE]);
	
	?>
	
	<style>
	
		.imgcart22:before{
		  content: "";
		  display: block;
		  padding-top: 100%;   
		}
		
		.imgcart22{
			background-size: contain;
			background-position: center center;
			background-repeat: no-repeat;
		}
		
		.basket_header__col.two{
			width: 90%;
		}
		
		.contentcartpv{
			margin-bottom: 30px;
			height: calc(100vh - 330px) !important;
			
			
			
		}
		
		
	</style>
	
	
	
	
	
	
	
	
	
	<!-- Обработчик событий в файле js/app.js Функция появления окна в toggleHeaderBasket-->
    <div class="basket_header">
	
	
	<div class="cartinnerpv">
	<div class='contentcartpv'>
		<div class="basket_header__items">
		
		<?
		
		foreach($arResult[GRID][ROWS] as $item ){
	 $qount += $item[QUANTITY];
	 /*
	 
	echo "id - ".$item[PRODUCT_ID]."  <br>"; 
	echo "Наименование - ".$item[NAME]."  <br>"; 	
	echo "Артикуль - ".$item[PROPERTY_Article_VALUE]."  <br>"; 		
	echo "Цена старая - ".$item[FULL_PRICE_FORMATED]."  <br>"; 	 
	echo "Цена новая - ".$item[PRICE_FORMATED]."  <br>"; 
	echo "Сумма старая - ".$item[SUM_FULL_PRICE_FORMATED]."  <br>"; 
	echo "Сумма новая - ".$item[SUM]."  <br>"; 
	echo "Количество - ".$item[QUANTITY]."  <br>"; 


	
	echo "   <br><br>"; 
	<img class='basket_header__img' src='".CFile::GetPath($item[PROPERTY_Gallery_VALUE])."' alt=''>
	*/
	
	// CSaleBasket::Delete($item[ID]);
	
	//print_r($item[ID]);
	
	
	echo "<div class='basket_header__item' id='id$item[PRODUCT_ID]'
	
	data-item-quantity='$item[QUANTITY]'
	data-item-id='$item[PRODUCT_ID]'
	>
            <div class='basket_header__col one'><a class='basket_header__pic' href='#'>
			
			<div class='basket_header__img imgcart22' style='background-image: url(".CFile::GetPath($item[PROPERTY_Gallery_VALUE]).");' alt=''></div>
			
			</a></div>
            <div class='basket_header__col two'>
              <div class='basket_header-hero'><a class='basket_header__name' href='#' style=''>$item[NAME]</a>
                <div class='basket_header__art'>$item[PROPERTY_Article_VALUE]</div>
                <div class='basket_header__count'>$item[QUANTITY] шт</div>
              </div>
            </div>
            <div class='basket_header__col free'><span class='basket_header__delete '  >
                <div class='lnr lnr-trash basket_header__icon dell1' data-item-id='$item[ID]' data-id='$item[PRODUCT_ID]'></div></span>
              <div class='basket_header-price'>
                <div class='basket_header-price__summ'>$item[SUM]</div>
              </div>
            </div>
          </div>";
	
	
	
	
	
	
	
 }
		
		?>
		
		
		
		
		
		<?/*
          <div class="basket_header__item">
            <div class="basket_header__col one"><a class="basket_header__pic" href="#"><img class="basket_header__img" src="/local/templates/eshop_bootstrap_v4/assets/img/basket_img.png" alt=""></a></div>
            <div class="basket_header__col two">
              <div class="basket_header-hero"><a class="basket_header__name" href="#" style="">Вешало напольное ST-02.60 в цвете латунь для одежды и ремней</a>
                <div class="basket_header__art">Артикул: ST-02.60</div>
                <div class="basket_header__count">5 шт</div>
              </div>
            </div>
            <div class="basket_header__col free"><a class="basket_header__delete toggleTitle" href="#">
                <div class="lnr lnr-trash basket_header__icon"></div></a>
              <div class="basket_header-price">
                <div class="basket_header-price__summ">95 790 руб.</div>
              </div>
            </div>
          </div>
		  
		 */?> 
		  
		  
		  
		  
		  
        </div>
	</div>
	
	<?/*
	<div id="id528">
	ntcn
	
	</div>
	*/?>
	
	  
	  
	  
	  
      <div class="basket_header-info">
        <div class="basket_header-info__item">
          <div class="basket_header-info__name">Кол-во:</div>
          <div class="basket_header-info__value qountq"><?=$qount;?> шт</div>
        </div>
        <div class="basket_header-info__item">
          <div class="basket_header-info__name">Итог:</div>
          <div class="basket_header-info__value priceq"><?=$arResult[allSum_FORMATED]?></div>
        </div>
      </div><a class="basket_header-notes" href="#"><img class="basket_header-notes__img" src="/local/templates/eshop_bootstrap_v4/assets/img/basket-banner.png" alt="">
        <!--.basket_header-notes__text Скидка на изготовление полок 20% до конца ноября--></a>
      <div class="basket_header-control"><a class="basket_header-control__order btn-common-black" href="/personal/cart/">Перейти в корзину</a>
        <!--a.basket_header-control__close.btn-common-empty(href="#") Продолжить покупки-->
      </div>
	  
	</div>
</div>	
 



<script>

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
				
				
			
			}
	});

</script>










 
 
 
 
 
<script>
 
	 
	 
	 
$('body').on('click','.dell1', function() {




		var tt=$(this).parents(".basket_header__item").attr('id');
		
		
		
		
		
		var iditem = $(this).attr('data-item-id');
		
		var iditem1 = $(this).attr('data-id');
		
		/*var tt="#id528";
						
		$(tt).remove();*/
		
	//	alert(iditem);
		
		
		//$("#id"+$(this).attr('data-item-id')).remove();
		
		
		var data="checks="+JSON.stringify(iditem1);
		
		
			$.ajax({
					type: "POST",
					url: "/local/include/Deletegood.php",
					data: data,
					cache: false,
					dataType: "html",
					success: function(data) {
						
					//	alert(data);
						
					//	$('body').html(data);
						
						
						$("#"+tt).remove();
							
						
						
						
						
						
						
			   
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
								 
								 
								}
						});
						
						
						
						
						
						
						
						
						
 
						
					}
					
					
					
			});
	});	
	 

 
</script>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 <?
 
 
 
 
 
 
 
 
 
 
 
//print_r($arParams); 
// print_r($arResult); 
//  print_r($templateName); 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 /*
 
 
 
 
 
 
if (!isset($arParams['DISPLAY_MODE']) || !in_array($arParams['DISPLAY_MODE'], array('extended', 'compact')))
{
	$arParams['DISPLAY_MODE'] = 'extended';
}

$arParams['USE_DYNAMIC_SCROLL'] = isset($arParams['USE_DYNAMIC_SCROLL']) && $arParams['USE_DYNAMIC_SCROLL'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_FILTER'] = isset($arParams['SHOW_FILTER']) && $arParams['SHOW_FILTER'] === 'N' ? 'N' : 'Y';

$arParams['PRICE_DISPLAY_MODE'] = isset($arParams['PRICE_DISPLAY_MODE']) && $arParams['PRICE_DISPLAY_MODE'] === 'N' ? 'N' : 'Y';

if (!isset($arParams['TOTAL_BLOCK_DISPLAY']) || !is_array($arParams['TOTAL_BLOCK_DISPLAY']))
{
	$arParams['TOTAL_BLOCK_DISPLAY'] = array('top');
}

if (empty($arParams['PRODUCT_BLOCKS_ORDER']))
{
	$arParams['PRODUCT_BLOCKS_ORDER'] = 'props,sku,columns';
}

if (is_string($arParams['PRODUCT_BLOCKS_ORDER']))
{
	$arParams['PRODUCT_BLOCKS_ORDER'] = explode(',', $arParams['PRODUCT_BLOCKS_ORDER']);
}

$arParams['USE_PRICE_ANIMATION'] = isset($arParams['USE_PRICE_ANIMATION']) && $arParams['USE_PRICE_ANIMATION'] === 'N' ? 'N' : 'Y';
$arParams['EMPTY_BASKET_HINT_PATH'] = isset($arParams['EMPTY_BASKET_HINT_PATH']) ? (string)$arParams['EMPTY_BASKET_HINT_PATH'] : '/';
$arParams['USE_ENHANCED_ECOMMERCE'] = isset($arParams['USE_ENHANCED_ECOMMERCE']) && $arParams['USE_ENHANCED_ECOMMERCE'] === 'Y' ? 'Y' : 'N';
$arParams['DATA_LAYER_NAME'] = isset($arParams['DATA_LAYER_NAME']) ? trim($arParams['DATA_LAYER_NAME']) : 'dataLayer';
$arParams['BRAND_PROPERTY'] = isset($arParams['BRAND_PROPERTY']) ? trim($arParams['BRAND_PROPERTY']) : '';

if ($arParams['USE_GIFTS'] === 'Y')
{
	$arParams['GIFTS_BLOCK_TITLE'] = isset($arParams['GIFTS_BLOCK_TITLE']) ? trim((string)$arParams['GIFTS_BLOCK_TITLE']) : Loc::getMessage('SBB_GIFTS_BLOCK_TITLE');

	CBitrixComponent::includeComponentClass('bitrix:sale.products.gift.basket');

	$giftParameters = array(
		'SHOW_PRICE_COUNT' => 1,
		'PRODUCT_SUBSCRIPTION' => 'N',
		'PRODUCT_ID_VARIABLE' => 'id',
		'USE_PRODUCT_QUANTITY' => 'N',
		'ACTION_VARIABLE' => 'actionGift',
		'ADD_PROPERTIES_TO_BASKET' => 'Y',
		'PARTIAL_PRODUCT_PROPERTIES' => 'Y',

		'BASKET_URL' => $APPLICATION->GetCurPage(),
		'APPLIED_DISCOUNT_LIST' => $arResult['APPLIED_DISCOUNT_LIST'],
		'FULL_DISCOUNT_LIST' => $arResult['FULL_DISCOUNT_LIST'],

		'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
		'PRICE_VAT_INCLUDE' => $arParams['PRICE_VAT_SHOW_VALUE'],
		'CACHE_GROUPS' => $arParams['CACHE_GROUPS'],

		'BLOCK_TITLE' => $arParams['GIFTS_BLOCK_TITLE'],
		'HIDE_BLOCK_TITLE' => $arParams['GIFTS_HIDE_BLOCK_TITLE'],
		'TEXT_LABEL_GIFT' => $arParams['GIFTS_TEXT_LABEL_GIFT'],

		'DETAIL_URL' => isset($arParams['GIFTS_DETAIL_URL']) ? $arParams['GIFTS_DETAIL_URL'] : null,
		'PRODUCT_QUANTITY_VARIABLE' => $arParams['GIFTS_PRODUCT_QUANTITY_VARIABLE'],
		'PRODUCT_PROPS_VARIABLE' => $arParams['GIFTS_PRODUCT_PROPS_VARIABLE'],
		'SHOW_OLD_PRICE' => $arParams['GIFTS_SHOW_OLD_PRICE'],
		'SHOW_DISCOUNT_PERCENT' => $arParams['GIFTS_SHOW_DISCOUNT_PERCENT'],
		'DISCOUNT_PERCENT_POSITION' => $arParams['DISCOUNT_PERCENT_POSITION'],
		'MESS_BTN_BUY' => $arParams['GIFTS_MESS_BTN_BUY'],
		'MESS_BTN_DETAIL' => $arParams['GIFTS_MESS_BTN_DETAIL'],
		'CONVERT_CURRENCY' => $arParams['GIFTS_CONVERT_CURRENCY'],
		'HIDE_NOT_AVAILABLE' => $arParams['GIFTS_HIDE_NOT_AVAILABLE'],

		'PRODUCT_ROW_VARIANTS' => '',
		'PAGE_ELEMENT_COUNT' => 0,
		'DEFERRED_PRODUCT_ROW_VARIANTS' => \Bitrix\Main\Web\Json::encode(
			SaleProductsGiftBasketComponent::predictRowVariants(
				$arParams['GIFTS_PAGE_ELEMENT_COUNT'],
				$arParams['GIFTS_PAGE_ELEMENT_COUNT']
			)
		),
		'DEFERRED_PAGE_ELEMENT_COUNT' => $arParams['GIFTS_PAGE_ELEMENT_COUNT'],

		'ADD_TO_BASKET_ACTION' => 'BUY',
		'PRODUCT_DISPLAY_MODE' => 'Y',
		'PRODUCT_BLOCKS_ORDER' => isset($arParams['GIFTS_PRODUCT_BLOCKS_ORDER']) ? $arParams['GIFTS_PRODUCT_BLOCKS_ORDER'] : '',
		'SHOW_SLIDER' => isset($arParams['GIFTS_SHOW_SLIDER']) ? $arParams['GIFTS_SHOW_SLIDER'] : '',
		'SLIDER_INTERVAL' => isset($arParams['GIFTS_SLIDER_INTERVAL']) ? $arParams['GIFTS_SLIDER_INTERVAL'] : '',
		'SLIDER_PROGRESS' => isset($arParams['GIFTS_SLIDER_PROGRESS']) ? $arParams['GIFTS_SLIDER_PROGRESS'] : '',
		'LABEL_PROP_POSITION' => $arParams['LABEL_PROP_POSITION'],

		'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
		'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
		'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY']
	);
}

\CJSCore::Init(array('fx', 'popup', 'ajax'));

//$this->addExternalCss($templateFolder.'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css');

$this->addExternalJs($templateFolder.'/js/mustache.js');
$this->addExternalJs($templateFolder.'/js/action-pool.js');
$this->addExternalJs($templateFolder.'/js/filter.js');
$this->addExternalJs($templateFolder.'/js/component.js');

$mobileColumns = isset($arParams['COLUMNS_LIST_MOBILE'])
	? $arParams['COLUMNS_LIST_MOBILE']
	: $arParams['COLUMNS_LIST'];
$mobileColumns = array_fill_keys($mobileColumns, true);

$jsTemplates = new Main\IO\Directory(Main\Application::getDocumentRoot().$templateFolder.'/js-templates');
// @var Main\IO\File $jsTemplate 
foreach ($jsTemplates->getChildren() as $jsTemplate)
{
	include($jsTemplate->getPath());
}

$displayModeClass = $arParams['DISPLAY_MODE'] === 'compact' ? ' basket-items-list-wrapper-compact' : '';
















if (empty($arResult['ERROR_MESSAGE']))
{
	if ($arParams['USE_GIFTS'] === 'Y' && $arParams['GIFTS_PLACE'] === 'TOP')
	{
		?>
		<div data-entity="parent-container">
			<div class="catalog-block-header"
					data-entity="header"
					data-showed="false"
					style="display: none; opacity: 0;">
				<?=$arParams['GIFTS_BLOCK_TITLE']?>
			</div>
			<?
			$APPLICATION->IncludeComponent(
				'bitrix:sale.products.gift.basket',
				'bootstrap_v4',
				$giftParameters,
				$component
			);
			?>
		</div>
		<?
	}

	if ($arResult['BASKET_ITEM_MAX_COUNT_EXCEEDED'])
	{
		?>
		<div id="basket-item-message">
			<?=Loc::getMessage('SBB_BASKET_ITEM_MAX_COUNT_EXCEEDED', array('#PATH#' => $arParams['PATH_TO_BASKET']))?>
		</div>
		<?
	}
	?>
	<div id="basket-root" class="bx-basket bx-<?=$arParams['TEMPLATE_THEME']?> bx-step-opacity" style="opacity: 0;">
		<?
		if (
			$arParams['BASKET_WITH_ORDER_INTEGRATION'] !== 'Y'
			&& in_array('top', $arParams['TOTAL_BLOCK_DISPLAY'])
		)
		{
			?>
			<div class="row">
				<div class="col" data-entity="basket-total-block"></div>
			</div>
			<?
		}
		?>

		<div class="row">
			<div class="col">
				<div class="alert alert-warning alert-dismissable" id="basket-warning" style="display: none;">
					<span class="close" data-entity="basket-items-warning-notification-close">&times;</span>
					<div data-entity="basket-general-warnings"></div>
					<div data-entity="basket-item-warnings">
						<?=Loc::getMessage('SBB_BASKET_ITEM_WARNING')?>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col">
				<div class="mb-3 basket-items-list-wrapper basket-items-list-wrapper-height-fixed basket-items-list-wrapper-light<?=$displayModeClass?>"
					id="basket-items-list-wrapper">
					<div class="basket-items-list-header" data-entity="basket-items-list-header">
						<div class="basket-items-search-field" data-entity="basket-filter">
							<div class="form input-group">
								<input type="text" class="form-control" placeholder="<?=Loc::getMessage('SBB_BASKET_FILTER')?>" data-entity="basket-filter-input">
							</div>
							<button class="basket-items-search-clear-btn" type="button" data-entity="basket-filter-clear-btn">&times;</button>
						</div>

						<div class="basket-items-list-header-filter">
							<a href="javascript:void(0)" class="basket-items-list-header-filter-item active" data-entity="basket-items-count" data-filter="all" style="display: none;"></a>
							<a href="javascript:void(0)" class="basket-items-list-header-filter-item" data-entity="basket-items-count" data-filter="similar" style="display: none;"></a>
							<a href="javascript:void(0)" class="basket-items-list-header-filter-item" data-entity="basket-items-count" data-filter="warning" style="display: none;"></a>
							<a href="javascript:void(0)" class="basket-items-list-header-filter-item" data-entity="basket-items-count" data-filter="delayed" style="display: none;"></a>
							<a href="javascript:void(0)" class="basket-items-list-header-filter-item" data-entity="basket-items-count" data-filter="not-available" style="display: none;"></a>
						</div>
					</div>
					<div class="basket-items-list-container" id="basket-items-list-container">
						<div class="basket-items-list-overlay" id="basket-items-list-overlay" style="display: none;"></div>
						<div class="basket-items-list" id="basket-item-list">
							<div class="basket-search-not-found" id="basket-item-list-empty-result" style="display: none;">
								<div class="basket-search-not-found-icon"></div>
								<div class="basket-search-not-found-text"><?=Loc::getMessage('SBB_FILTER_EMPTY_RESULT')?></div>
							</div>
							<table class="basket-items-list-table" id="basket-item-table"></table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?
		if (
			$arParams['BASKET_WITH_ORDER_INTEGRATION'] !== 'Y'
			&& in_array('bottom', $arParams['TOTAL_BLOCK_DISPLAY'])
		)
		{
			?>
			<div class="row">
				<div class="col" data-entity="basket-total-block"></div>
			</div>
			<?
		}
		?>
	</div>
	<?
	if (!empty($arResult['CURRENCIES']) && Main\Loader::includeModule('currency'))
	{
		CJSCore::Init('currency');

		?>
		<script>
			BX.Currency.setCurrencies(<?=CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true)?>);
		</script>
		<?
	}

	$signer = new \Bitrix\Main\Security\Sign\Signer;
	$signedTemplate = $signer->sign($templateName, 'sale.basket.basket');
	$signedParams = $signer->sign(base64_encode(serialize($arParams)), 'sale.basket.basket');
	$messages = Loc::loadLanguageFile(__FILE__);
	?>
	<script>
		BX.message(<?=CUtil::PhpToJSObject($messages)?>);
		BX.Sale.BasketComponent.init({
			result: <?=CUtil::PhpToJSObject($arResult, false, false, true)?>,
			params: <?=CUtil::PhpToJSObject($arParams)?>,
			template: '<?=CUtil::JSEscape($signedTemplate)?>',
			signedParamsString: '<?=CUtil::JSEscape($signedParams)?>',
			siteId: '<?=CUtil::JSEscape($component->getSiteId())?>',
			siteTemplateId: '<?=CUtil::JSEscape($component->getSiteTemplateId())?>',
			templateFolder: '<?=CUtil::JSEscape($templateFolder)?>'
		});
	</script>
	<?
	if ($arParams['USE_GIFTS'] === 'Y' && $arParams['GIFTS_PLACE'] === 'BOTTOM')
	{
		?>
		<div data-entity="parent-container">
			<div class="catalog-block-header"
					data-entity="header"
					data-showed="false"
					style="display: none; opacity: 0;">
				<?=$arParams['GIFTS_BLOCK_TITLE']?>
			</div>
			<?
			$APPLICATION->IncludeComponent(
				'bitrix:sale.products.gift.basket',
				'bootstrap_v4',
				$giftParameters,
				$component
			);
			?>
		</div>
		<?
	}
}
elseif ($arResult['EMPTY_BASKET'])
{
	include(Main\Application::getDocumentRoot().$templateFolder.'/empty.php');
}
else
{
	ShowError($arResult['ERROR_MESSAGE']);
}
*/
?>