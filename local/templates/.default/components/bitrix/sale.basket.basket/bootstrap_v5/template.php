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
/** @var Main\IO\File $jsTemplate */
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
	<div class="catalog-block-header" data-entity="header" data-showed="false" style="display: none; opacity: 0;">
		<?= $arParams['GIFTS_BLOCK_TITLE'] ?>
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
	<?= Loc::getMessage('SBB_BASKET_ITEM_MAX_COUNT_EXCEEDED', array('#PATH#' => $arParams['PATH_TO_BASKET'])) ?>
</div>
<?
	}
	?>






<style>
	.custp {
		display: -ms-flexbox;
		display: flex;
		-ms-flex-align: center;
		align-items: center;
		-ms-flex-pack: center;
		justify-content: center;
		border: 0;
		background-color: transparent;
	}
</style>









<style>
	.cartStep1Total {
		top: 80px;

	}


	.lkMenu {
		top: 80px;
	}

	.deldesk {
		display: block;
	}

	.delmobi {
		display: none;
	}



	.cartStep1-table__link {
		max-height: 43px;
		overflow: hidden;
	}



	.fixtotal {
		display: none;
	}


	.cartStep1-table-count__btn1.custp {
		line-height: 22px;
	}

	/*Версия для планшетов*/
	@media(max-width:1270px) {


		.cartStep1Total__link {
			font-size: 1rem !important;
			font-weight: normal !important;
			font-family: sans-serif !important;

		}


		.fixtotal {
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
		}

		.cartStep1-table-count__btn1.custp {
			line-height: 29px;
		}

		.cartStep1Total__sht {
			font-size: 15px !important;
		}

		.cartStep1Total__link {
			height: 40px;
		}


		.fixtotal {

			position: fixed;
			width: 100%;
			left: 0;
			background: white;
			bottom: 0px;
			z-index: 400;
			padding: 10px 20px;
			right: 0px;
			margin: 0px !important;
			display: block;
			font-size: 1rem !important;
			padding-top: 20px !important;
		}

		.fixtotal .fixtotalcol1 {
			display: inline-block;
			width: 50%;
			text-align: center;
		}


		.fixtotal .cartStep1Total__title {
			display: inline-block;
			margin: 0px 10px;
		}

		.fixtotal .cartStep1Total__sht {
			display: inline-block;
			margin: 0px 10px;
		}

		.fixtotal .cartStep1Total__price {
			display: inline-block;
			margin: 0px 10px;
		}

		.fixtotal .fixtotalcol2 {
			display: inline-block;
			width: 45%;
			text-align: center;
		}

		.fixtotal .cartStep1Total__link {
			margin: auto;
		}

		.fixtotal .cartStep1Total__link {
			margin: 0 0 0px auto;
		}








		.account__col.one {
			display: none;
		}

		.cartStep1-table {
			display: table !important;
		}

		.breadcrumbs {
			margin-left: 20px;
			margin-right: 20px;
		}

		.cartStep1-table-count__col.one {
			font-family: 'Open Sans';
			font-style: normal;
			font-weight: 300;
			font-size: 25px;
		}

		.cartStep1-table-count__col.two {
			line-height: 30px;
			font-family: 'Open Sans';
			font-style: normal;
			font-weight: 300;
		}

		.cartStep1-table-count__col.three {
			font-family: 'Open Sans';
			font-style: normal;
			font-weight: 300;
			font-size: 25px;
		}

		.cartStep1-table-count__btn1 {
			font-family: 'Open Sans';
			font-style: normal;
			font-weight: 300;

		}

		.cartStep1-table__link {
			padding-right: 14px;

		}





		/*До 1000px*/
		@media(min-width:1030px) {


			.fixtotal .fixtotalcol1 {
				width: unset;
			}


			.fixtotal .fixtotalcol2 {
				width: unset;
				float: right;
			}



			.account__col.two {
				width: 70%;
			}

			.cartStep1 {
				float: right;
			}

			.cartStep1-table {
				margin-bottom: 0px;
			}

			.account__col.three {
				width: 30%;
			}

			.cartStep1Total {
				width: 229px;
			}

			.cartStepNav {
				margin-left: auto;
			}

		}


		/*До 1000px*/
		@media(max-width:1030px) {

			.cartStep1Total-promocode {}

			.cartStepNav {
				margin: auto;
				margin-bottom: 36px;
				margin-top: 50px;
			}

			.account__col.three {
				display: none;
			}

			.account {
				display: block;
			}


			.account__col.two {
				display: block;
			}


			.cartStep1 {
				margin: auto;
			}


			.cartStep1-table {
				margin-bottom: 0px;
			}


			.account__col.three {
				display: block;
			}

			.account__col.three {
				width: 660px;
				margin: auto;
			}

			.cartStep1Total__title,
			.cartStep1Total__sht,
			.cartStep1Total__price {
				text-align: right;
			}


			.cartStep1Total__link {
				display: block;
				/*	margin: 0 0 40px auto;*/
			}




		}






		/*До 1000px*/
		@media(max-width:720px) {


			.scrollTop {
				bottom: 85px !important;
			}


			.cartStep1-table__total-old.sale {
				padding-right: 25px;
			}

			.deldesk {
				display: none;
			}

			.delmobi {
				display: block;
			}



			.cartStep1-table__tr {
				width: 320px;
				display: inline-block;
			}


			.cartStep1-table__td.one {
				display: inline-block;
				border-bottom: unset;
			}

			.cartStep1-table__td.two {
				display: inline-block;
				border-bottom: unset;
			}

			.cartStep1-table__info {
				max-height: 90px;
				overflow: hidden;
			}

			.cartStep1-table__link {
				max-height: 45px;
				overflow: hidden;
			}

			.cartStep1-table__td.three {
				display: inline-block;
				width: calc(45% - 45px);
				border-bottom: unset !important;
			}

			.cartStep1-table__td.four {
				display: inline-block;
				border-bottom: unset !important;
			}

			.cartStep1-table__td.five {
				display: inline-block;
				width: 47%;
				border-bottom: unset !important;
				width: calc(55% - 45px);
			}

			.cartStep1-table__total.sale {
				text-align: right;
				padding-right: 25px;
			}

			.cartStep1-table__tr {
				width: 320px;
				display: inline-block;
				border-bottom: 1px solid rgba(113, 113, 113, .7);
			}

			.cartStep1 {
				width: 100%;
				padding: 20px;
			}

			.cartStep1-table {
				display: none !important;
			}

			.cartStep1-table.basket-items-list-table {
				display: block !important;
			}


			.cartStep1-table__td.two {
				width: calc(100% - 100px);
				padding-left: 10px;
				padding-right: 10px;
			}

			.cartStep1-table__info {
				width: 100%;
			}



			.cartStep1-table.basket-items-list-table {
				text-align: center;
			}

			.cartStep1-table__tr {
				width: 90%;
				margin: auto !important;
				text-align: left;
				min-width: 310px;
			}

			.cartStep1 {
				padding: 5px;


			}

			.cartStepNav {
				margin: 20px;
			}


			.cartStepNav__items .cartStepNav__item:nth-child(2) {
				display: none;

			}

			.cartStepNav__items .cartStepNav__item:nth-child(3) {
				display: none;

			}

			.breadcrumbs {
				margin-left: 20px;
				margin-right: 20px;
			}



			.account__col.three {
				width: 100%;
				padding: 20px;
				margin: auto;
			}


			.cartStep1-table__td.three {
				padding-left: 10px;
			}

			.cartStep1-table__td.four {
				width: 90px;
			}



			.cartStep1-table__td.three {
				padding-left: 10px;
				width: calc(40% - 45px);
			}

			.cartStep1-table__td.five {
				float: right;
			}

			.cartStep1-table__total.sale {
				padding-right: 5px;
			}

			.cartStep1-table__total-old.sale {
				padding-right: 5px;
			}



		}





		/*До 1000px*/
		@media(max-width:500px) {
			.fixtotal {
				text-align: center;
			}


			.fixtotal .fixtotalcol1 {
				min-width: 250px;
				margin: auto;
			}

			.fixtotal .fixtotalcol2 {
				min-width: 250px;
				margin: auto;
			}

			.fixtotal .cartStep1Total__link {
				margin: auto;
			}


			.cartStep1Total__title {
				display: none;
			}

			.fixtotalcol2 {
				width: 100%;
			}

			.cartStep1Total__link {
				width: 100%;
				background: #ff4500 !important;
				color: #fff;
				border: unset !important;
			}

			.scrollTop.active,
			.cartStep1Total__title {
				display: none !important;
			}

			.fixtotalcol1 {
				margin-bottom: 5px;
			}

			.fixtotalcol2 {
				width: 100% !important;
			}


		}





	}
</style>











































<?// Начало корзины?>




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
						<a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Каталог" href="/katalog-tovarov-3/">
							<span itemprop="name">Каталог</span>
							<meta itemprop="position" content="1">
						</a>
					</span>

					<span class="breadcrumbs__item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
						<a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Корзина" href="/personal/cart/">
							<span itemprop="name">Корзина</span>
							<meta itemprop="position" content="1">
						</a>
					</span>



						</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="wrapper__body">
			<div class="account">
				<div class="account__col one"></div>
				<div class="account__col two">
					<div class="cartStepNav">
						<div class="cartStepNav__items">
							<div class="cartStepNav__item"><a class="cartStepNav__link active" href="/personal/cart/">КОРЗИНА</a></div>
							<div class="cartStepNav__item"><a class="cartStepNav__link" href="#">ВХОД / РЕГИСТРАЦИЯ</a></div>
							<div class="cartStepNav__item"><a class="cartStepNav__link" href="/personal/order/make/">ОФОРМЛЕНИЕ ЗАКАЗА</a></div>
						</div>
					</div>
				</div>
				<div class="account__col three"></div>
			</div>
			<div class="account">

				<div class="account__col one">
					<div class="lkMenu">
						<ul class="lkMenu__items">
							<li class="lkMenu__item"><a class="lkMenu__link active" href="#"><span class="lkMenu__text">Личный кабинет</span><span class="lkMenu__icon lnr lnr-user"></span></a></li>
							<li class="lkMenu__item"><a class="lkMenu__link active" href="#"><span class="lkMenu__text">Корзина</span><span class="lkMenu__icon lnr lnr-cart"></span></a></li>
							<li class="lkMenu__item"><a class="lkMenu__link" href="#"><span class="lkMenu__text">Сравнение</span><span class="lkMenu__icon lnr lnr-sort-amount-asc"></span></a></li>
							<li class="lkMenu__item"><a class="lkMenu__link" href="#"><span class="lkMenu__text">Избранное</span><span class="lkMenu__icon lnr lnr-heart"></span></a></li>
							<li class="lkMenu__item"><a class="lkMenu__link" href="#"><span class="lkMenu__text">История покупок</span><span class="lkMenu__icon lnr lnr-history"></span></a></li>
						</ul>
					</div>
				</div>
























				<div class="account__col two">
					<div class="cartStep1">
						<div class="cartStep1-table" style="margin-bottom: 0px;">

							<div class="cartStep1-table__tr one">
								<div class="cartStep1-table__th one">
									<div class="cartStep1-table__th-oneText">Описание товара</div>
								</div>
								<div class="cartStep1-table__th two"></div>
								<div class="cartStep1-table__th three">Цена за ед.</div>
								<div class="cartStep1-table__th four">Количество</div>
								<div class="cartStep1-table__th five">Стоимость</div>
							</div>
						</div>

						<?//Вывод товара по строкам?>
						<?/*
						<div class="cartStep1-table">

							<div class="cartStep1-table__tr">
								<div class="cartStep1-table__td one"><a class="cartStep1-table__pic" href="#"><img class="cartStep1-table__img" src="assets/img/page/cart_step_1/item-1.png" alt=""></a></div>
								<div class="cartStep1-table__td two">
									<div class="cartStep1-table__info"><a class="cartStep1-table__link" href="#">Вешало напольное ST-02.60 для верхней одежды</a>
										<div class="cartStep1-table__art">Артикул: ST-02.60</div>
									</div>
								</div>
								<div class="cartStep1-table__td three">
									<div class="cartStep1-table-price-wrap">
										<div class="cartStep1-table__price">12 103 руб.</div>
										<div class="cartStep1-table__price-old">17 290 руб.</div>
									</div>
								</div>
								<div class="cartStep1-table__td four">
									<div class="cartStep1-table-count">
										<div class="cartStep1-table-count__col one">
											<button class="cartStep1-table-count__btn" data-type="minus">-</button>
										</div>
										<div class="cartStep1-table-count__col two">
											<div class="cartStep1-table-count__input">
												<input class="cartStep1-table-count__input-text" type="text" value="1">
											</div>
										</div>
										<div class="cartStep1-table-count__col three">
											<button class="cartStep1-table-count__btn" data-type="plus">+</button>
										</div>
									</div>
								</div>
								<div class="cartStep1-table__td five"><a class="cartStep1-table__delete">
										<div class="lnr lnr-trash toggleTitle" href="#" data-title="Удалить"></div>
									</a>
									<div class="cartStep1-table__total sale" data-total="12103">12 103 руб.</div>
									<div class="cartStep1-table__total-old sale" data-sale="17290">17 290 руб.</div>
								</div>
							</div>

						</div>
		*/?>




						<div class="cartStep1-table basket-items-list-table" id="basket-item-table">

							<?//	<table class="basket-items-list-table" id="basket-item-table"></table> ?>




						</div>























					</div>
				</div>























				<div class="account__col three">


					<div class="cartStep1Total">
						<div id="basket-root" class="bx-basket bx-<?= $arParams['TEMPLATE_THEME'] ?> bx-step-opacity" style="opacity: 0;">

							<?
								if (
									$arParams['BASKET_WITH_ORDER_INTEGRATION'] !== 'Y'
									&& in_array('top', $arParams['TOTAL_BLOCK_DISPLAY'])
								)
								{
							?>
							<div data-entity="basket-total-block">
							</div>
							<?
								}
							?>

							<?/*


							<h2 class="cartStep1Total__title">Товаров в корзине</h2>
							<div class="cartStep1Total__sht"><span id="countTotal">29</span> шт.</div>
							<div class="cartStep1Total__price"><span id="totalPrice">524 599 руб.</span></div>
							<div class="cartStep1Total-promocode">
								<div class="cartStep1Total-promocode__title">Введите промокод или № сертификата:</div>
								<div class="cartStep1Total-promocode__input">
									<input class="cartStep1Total-promocode__input-text" type="text" placeholder="промокод">
								</div>
							</div><a class="cartStep1Total__link" href="#">Перейти к оформлению</a>
							<div class="cartStep1Total__text">
								ОБРАТИТЕ ВНИМАНИЕ!<br>
								Мы принимаем оплату за товар
								только на расчетный счет или
								наличными в шоу-руме! Мы не
								принимаем оплату на электронные
								кошельки (Яндекс.Деньги, WebMoney
								и прочее)
								или банковские карты.
								Перед оплатой позвоните
								нашему
								менеджеру 8 800 302 44 01
							</div>

								*/?>





						</div>
					</div>



				</div>
			</div>
		</div>
	</div>
</div>
















<?/*
<div id="basket-root" class="bx-basket bx-<?= $arParams['TEMPLATE_THEME'] ?> bx-step-opacity" style="opacity: 0;">

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


</div>

*/?>

























<?
/*
<pre style="overflow: unset;">

<?

print_r($arResult);
?>

</pre>
*/
?>



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



<?
	if (!empty($arResult['CURRENCIES']) && Main\Loader::includeModule('currency'))
	{
		CJSCore::Init('currency');

		?>
<script>
	BX.Currency.setCurrencies(<?= CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true) ?>);
</script>
<?
	}



	$signer = new \Bitrix\Main\Security\Sign\Signer;
	$signedTemplate = $signer->sign($templateName, 'sale.basket.basket');
	$signedParams = $signer->sign(base64_encode(serialize($arParams)), 'sale.basket.basket');
	$messages = Loc::loadLanguageFile(__FILE__);

	?>
<script>
	BX.message(<?= CUtil::PhpToJSObject($messages) ?>);
	BX.Sale.BasketComponent.init({
		result: <?= CUtil::PhpToJSObject($arResult, false, false, true) ?>,
		params: <?= CUtil::PhpToJSObject($arParams) ?>,
		template: '<?= CUtil::JSEscape($signedTemplate) ?>',
		signedParamsString: '<?= CUtil::JSEscape($signedParams) ?>',
		siteId: '<?= CUtil::JSEscape($component->getSiteId()) ?>',
		siteTemplateId: '<?= CUtil::JSEscape($component->getSiteTemplateId()) ?>',
		templateFolder: '<?= CUtil::JSEscape($templateFolder) ?>'
	});
</script>
<?


	if ($arParams['USE_GIFTS'] === 'Y' && $arParams['GIFTS_PLACE'] === 'BOTTOM')
	{
		?>
<div data-entity="parent-container">
	<div class="catalog-block-header" data-entity="header" data-showed="false" style="display: none; opacity: 0;">
		<?= $arParams['GIFTS_BLOCK_TITLE'] ?>
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
?>





<script>
	//Скрытие кнопки
	var startscr = 5;
	var endscr = 0;
	startscr = -100;
	endscr = $('.cartStep1Total').offset().top;
	$('.fixtotal').css('display', 'none');
	$(document).scroll(function() {
		if (($(this).scrollTop() > (startscr)) && ($(this).scrollTop() < (endscr - $(window).height()))) {
			$('.fixtotal').css('display', 'block');
		} else {
			$('.fixtotal').css('display', 'none');
		}
	});
</script>



















<?/*

<div id="basket-root" class="bx-basket bx-<?= $arParams['TEMPLATE_THEME'] ?> bx-step-opacity" style="opacity: 0;">

<div class="row">
	<div class="col">
		<div class="alert alert-warning alert-dismissable" id="basket-warning" style="display: none;">
			<span class="close" data-entity="basket-items-warning-notification-close">&times;</span>
			<div data-entity="basket-general-warnings"></div>
			<div data-entity="basket-item-warnings">
				<?= Loc::getMessage('SBB_BASKET_ITEM_WARNING') ?>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="mb-3 basket-items-list-wrapper basket-items-list-wrapper-height-fixed basket-items-list-wrapper-light<?= $displayModeClass ?>" id="basket-items-list-wrapper">
			<div class="basket-items-list-header" data-entity="basket-items-list-header">
				<div class="basket-items-search-field" data-entity="basket-filter">
					<div class="form input-group">
						<input type="text" class="form-control" placeholder="<?= Loc::getMessage('SBB_BASKET_FILTER') ?>" data-entity="basket-filter-input">
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
						<div class="basket-search-not-found-text"><?= Loc::getMessage('SBB_FILTER_EMPTY_RESULT') ?></div>
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
















<?/*
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
	


</div>
<?
	if (!empty($arResult['CURRENCIES']) && Main\Loader::includeModule('currency'))
	{
		CJSCore::Init('currency');

		?>
<script>
	BX.Currency.setCurrencies(<?= CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true) ?>);
</script>
<?
	}

	$signer = new \Bitrix\Main\Security\Sign\Signer;
	$signedTemplate = $signer->sign($templateName, 'sale.basket.basket');
	$signedParams = $signer->sign(base64_encode(serialize($arParams)), 'sale.basket.basket');
	$messages = Loc::loadLanguageFile(__FILE__);
	?>
<script>
	BX.message(<?= CUtil::PhpToJSObject($messages) ?>);
	BX.Sale.BasketComponent.init({
		result: <?= CUtil::PhpToJSObject($arResult, false, false, true) ?>,
		params: <?= CUtil::PhpToJSObject($arParams) ?>,
		template: '<?= CUtil::JSEscape($signedTemplate) ?>',
		signedParamsString: '<?= CUtil::JSEscape($signedParams) ?>',
		siteId: '<?= CUtil::JSEscape($component->getSiteId()) ?>',
		siteTemplateId: '<?= CUtil::JSEscape($component->getSiteTemplateId()) ?>',
		templateFolder: '<?= CUtil::JSEscape($templateFolder) ?>'
	});
</script>
<?
	if ($arParams['USE_GIFTS'] === 'Y' && $arParams['GIFTS_PLACE'] === 'BOTTOM')
	{
		?>
<div data-entity="parent-container">
	<div class="catalog-block-header" data-entity="header" data-showed="false" style="display: none; opacity: 0;">
		<?= $arParams['GIFTS_BLOCK_TITLE'] ?>
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

elseif ($arResult['EMPTY_BASKET'])
{
	include(Main\Application::getDocumentRoot().$templateFolder.'/empty.php');
}
else
{
	ShowError($arResult['ERROR_MESSAGE']);
}

*/?>