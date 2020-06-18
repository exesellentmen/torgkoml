<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main;
use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 * @var array $arResult
 * @var CMain $APPLICATION
 * @var CUser $USER
 * @var SaleOrderAjax $component
 * @var string $templateFolder
 */

$context = Main\Application::getInstance()->getContext();
$request = $context->getRequest();

$arParams['ALLOW_USER_PROFILES'] = $arParams['ALLOW_USER_PROFILES'] === 'Y' ? 'Y' : 'N';
$arParams['SKIP_USELESS_BLOCK'] = $arParams['SKIP_USELESS_BLOCK'] === 'N' ? 'N' : 'Y';

if (!isset($arParams['SHOW_ORDER_BUTTON']))
{
	$arParams['SHOW_ORDER_BUTTON'] = 'final_step';
}

$arParams['HIDE_ORDER_DESCRIPTION'] = isset($arParams['HIDE_ORDER_DESCRIPTION']) && $arParams['HIDE_ORDER_DESCRIPTION'] === 'Y' ? 'Y' : 'N';
$arParams['SHOW_TOTAL_ORDER_BUTTON'] = $arParams['SHOW_TOTAL_ORDER_BUTTON'] === 'Y' ? 'Y' : 'N';
$arParams['SHOW_PAY_SYSTEM_LIST_NAMES'] = $arParams['SHOW_PAY_SYSTEM_LIST_NAMES'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_PAY_SYSTEM_INFO_NAME'] = $arParams['SHOW_PAY_SYSTEM_INFO_NAME'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_DELIVERY_LIST_NAMES'] = $arParams['SHOW_DELIVERY_LIST_NAMES'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_DELIVERY_INFO_NAME'] = $arParams['SHOW_DELIVERY_INFO_NAME'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_DELIVERY_PARENT_NAMES'] = $arParams['SHOW_DELIVERY_PARENT_NAMES'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_STORES_IMAGES'] = $arParams['SHOW_STORES_IMAGES'] === 'N' ? 'N' : 'Y';

if (!isset($arParams['BASKET_POSITION']) || !in_array($arParams['BASKET_POSITION'], array('before', 'after')))
{
	$arParams['BASKET_POSITION'] = 'after';
}

$arParams['EMPTY_BASKET_HINT_PATH'] = isset($arParams['EMPTY_BASKET_HINT_PATH']) ? (string)$arParams['EMPTY_BASKET_HINT_PATH'] : '/';
$arParams['SHOW_BASKET_HEADERS'] = $arParams['SHOW_BASKET_HEADERS'] === 'Y' ? 'Y' : 'N';
$arParams['HIDE_DETAIL_PAGE_URL'] = isset($arParams['HIDE_DETAIL_PAGE_URL']) && $arParams['HIDE_DETAIL_PAGE_URL'] === 'Y' ? 'Y' : 'N';
$arParams['DELIVERY_FADE_EXTRA_SERVICES'] = $arParams['DELIVERY_FADE_EXTRA_SERVICES'] === 'Y' ? 'Y' : 'N';

$arParams['SHOW_COUPONS'] = isset($arParams['SHOW_COUPONS']) && $arParams['SHOW_COUPONS'] === 'N' ? 'N' : 'Y';

if ($arParams['SHOW_COUPONS'] === 'N')
{
	$arParams['SHOW_COUPONS_BASKET'] = 'N';
	$arParams['SHOW_COUPONS_DELIVERY'] = 'N';
	$arParams['SHOW_COUPONS_PAY_SYSTEM'] = 'N';
}
else
{
	$arParams['SHOW_COUPONS_BASKET'] = isset($arParams['SHOW_COUPONS_BASKET']) && $arParams['SHOW_COUPONS_BASKET'] === 'N' ? 'N' : 'Y';
	$arParams['SHOW_COUPONS_DELIVERY'] = isset($arParams['SHOW_COUPONS_DELIVERY']) && $arParams['SHOW_COUPONS_DELIVERY'] === 'N' ? 'N' : 'Y';
	$arParams['SHOW_COUPONS_PAY_SYSTEM'] = isset($arParams['SHOW_COUPONS_PAY_SYSTEM']) && $arParams['SHOW_COUPONS_PAY_SYSTEM'] === 'N' ? 'N' : 'Y';
}

$arParams['SHOW_NEAREST_PICKUP'] = $arParams['SHOW_NEAREST_PICKUP'] === 'Y' ? 'Y' : 'N';
$arParams['DELIVERIES_PER_PAGE'] = isset($arParams['DELIVERIES_PER_PAGE']) ? intval($arParams['DELIVERIES_PER_PAGE']) : 9;
$arParams['PAY_SYSTEMS_PER_PAGE'] = isset($arParams['PAY_SYSTEMS_PER_PAGE']) ? intval($arParams['PAY_SYSTEMS_PER_PAGE']) : 9;
$arParams['PICKUPS_PER_PAGE'] = isset($arParams['PICKUPS_PER_PAGE']) ? intval($arParams['PICKUPS_PER_PAGE']) : 5;
$arParams['SHOW_PICKUP_MAP'] = $arParams['SHOW_PICKUP_MAP'] === 'N' ? 'N' : 'Y';
$arParams['SHOW_MAP_IN_PROPS'] = $arParams['SHOW_MAP_IN_PROPS'] === 'Y' ? 'Y' : 'N';
$arParams['USE_YM_GOALS'] = $arParams['USE_YM_GOALS'] === 'Y' ? 'Y' : 'N';
$arParams['USE_ENHANCED_ECOMMERCE'] = isset($arParams['USE_ENHANCED_ECOMMERCE']) && $arParams['USE_ENHANCED_ECOMMERCE'] === 'Y' ? 'Y' : 'N';
$arParams['DATA_LAYER_NAME'] = isset($arParams['DATA_LAYER_NAME']) ? trim($arParams['DATA_LAYER_NAME']) : 'dataLayer';
$arParams['BRAND_PROPERTY'] = isset($arParams['BRAND_PROPERTY']) ? trim($arParams['BRAND_PROPERTY']) : '';

$useDefaultMessages = !isset($arParams['USE_CUSTOM_MAIN_MESSAGES']) || $arParams['USE_CUSTOM_MAIN_MESSAGES'] != 'Y';

if ($useDefaultMessages || !isset($arParams['MESS_AUTH_BLOCK_NAME']))
{
	$arParams['MESS_AUTH_BLOCK_NAME'] = Loc::getMessage('AUTH_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_REG_BLOCK_NAME']))
{
	$arParams['MESS_REG_BLOCK_NAME'] = Loc::getMessage('REG_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_BASKET_BLOCK_NAME']))
{
	$arParams['MESS_BASKET_BLOCK_NAME'] = Loc::getMessage('BASKET_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_REGION_BLOCK_NAME']))
{
	$arParams['MESS_REGION_BLOCK_NAME'] = Loc::getMessage('REGION_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_PAYMENT_BLOCK_NAME']))
{
	$arParams['MESS_PAYMENT_BLOCK_NAME'] = Loc::getMessage('PAYMENT_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_DELIVERY_BLOCK_NAME']))
{
	$arParams['MESS_DELIVERY_BLOCK_NAME'] = Loc::getMessage('DELIVERY_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_BUYER_BLOCK_NAME']))
{
	$arParams['MESS_BUYER_BLOCK_NAME'] = Loc::getMessage('BUYER_BLOCK_NAME_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_BACK']))
{
	$arParams['MESS_BACK'] = Loc::getMessage('BACK_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_FURTHER']))
{
	$arParams['MESS_FURTHER'] = Loc::getMessage('FURTHER_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_EDIT']))
{
	$arParams['MESS_EDIT'] = Loc::getMessage('EDIT_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_ORDER']))
{
	$arParams['MESS_ORDER'] = $arParams['~MESS_ORDER'] = Loc::getMessage('ORDER_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_PRICE']))
{
	$arParams['MESS_PRICE'] = Loc::getMessage('PRICE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_PERIOD']))
{
	$arParams['MESS_PERIOD'] = Loc::getMessage('PERIOD_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_NAV_BACK']))
{
	$arParams['MESS_NAV_BACK'] = Loc::getMessage('NAV_BACK_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_NAV_FORWARD']))
{
	$arParams['MESS_NAV_FORWARD'] = Loc::getMessage('NAV_FORWARD_DEFAULT');
}

$useDefaultMessages = !isset($arParams['USE_CUSTOM_ADDITIONAL_MESSAGES']) || $arParams['USE_CUSTOM_ADDITIONAL_MESSAGES'] != 'Y';

if ($useDefaultMessages || !isset($arParams['MESS_PRICE_FREE']))
{
	$arParams['MESS_PRICE_FREE'] = Loc::getMessage('PRICE_FREE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_ECONOMY']))
{
	$arParams['MESS_ECONOMY'] = Loc::getMessage('ECONOMY_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_REGISTRATION_REFERENCE']))
{
	$arParams['MESS_REGISTRATION_REFERENCE'] = Loc::getMessage('REGISTRATION_REFERENCE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_AUTH_REFERENCE_1']))
{
	$arParams['MESS_AUTH_REFERENCE_1'] = Loc::getMessage('AUTH_REFERENCE_1_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_AUTH_REFERENCE_2']))
{
	$arParams['MESS_AUTH_REFERENCE_2'] = Loc::getMessage('AUTH_REFERENCE_2_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_AUTH_REFERENCE_3']))
{
	$arParams['MESS_AUTH_REFERENCE_3'] = Loc::getMessage('AUTH_REFERENCE_3_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_ADDITIONAL_PROPS']))
{
	$arParams['MESS_ADDITIONAL_PROPS'] = Loc::getMessage('ADDITIONAL_PROPS_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_USE_COUPON']))
{
	$arParams['MESS_USE_COUPON'] = Loc::getMessage('USE_COUPON_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_COUPON']))
{
	$arParams['MESS_COUPON'] = Loc::getMessage('COUPON_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_PERSON_TYPE']))
{
	$arParams['MESS_PERSON_TYPE'] = Loc::getMessage('PERSON_TYPE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_SELECT_PROFILE']))
{
	$arParams['MESS_SELECT_PROFILE'] = Loc::getMessage('SELECT_PROFILE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_REGION_REFERENCE']))
{
	$arParams['MESS_REGION_REFERENCE'] = Loc::getMessage('REGION_REFERENCE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_PICKUP_LIST']))
{
	$arParams['MESS_PICKUP_LIST'] = Loc::getMessage('PICKUP_LIST_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_NEAREST_PICKUP_LIST']))
{
	$arParams['MESS_NEAREST_PICKUP_LIST'] = Loc::getMessage('NEAREST_PICKUP_LIST_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_SELECT_PICKUP']))
{
	$arParams['MESS_SELECT_PICKUP'] = Loc::getMessage('SELECT_PICKUP_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_INNER_PS_BALANCE']))
{
	$arParams['MESS_INNER_PS_BALANCE'] = Loc::getMessage('INNER_PS_BALANCE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_ORDER_DESC']))
{
	$arParams['MESS_ORDER_DESC'] = Loc::getMessage('ORDER_DESC_DEFAULT');
}

$useDefaultMessages = !isset($arParams['USE_CUSTOM_ERROR_MESSAGES']) || $arParams['USE_CUSTOM_ERROR_MESSAGES'] != 'Y';

if ($useDefaultMessages || !isset($arParams['MESS_PRELOAD_ORDER_TITLE']))
{
	$arParams['MESS_PRELOAD_ORDER_TITLE'] = Loc::getMessage('PRELOAD_ORDER_TITLE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_SUCCESS_PRELOAD_TEXT']))
{
	$arParams['MESS_SUCCESS_PRELOAD_TEXT'] = Loc::getMessage('SUCCESS_PRELOAD_TEXT_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_FAIL_PRELOAD_TEXT']))
{
	$arParams['MESS_FAIL_PRELOAD_TEXT'] = Loc::getMessage('FAIL_PRELOAD_TEXT_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_DELIVERY_CALC_ERROR_TITLE']))
{
	$arParams['MESS_DELIVERY_CALC_ERROR_TITLE'] = Loc::getMessage('DELIVERY_CALC_ERROR_TITLE_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_DELIVERY_CALC_ERROR_TEXT']))
{
	$arParams['MESS_DELIVERY_CALC_ERROR_TEXT'] = Loc::getMessage('DELIVERY_CALC_ERROR_TEXT_DEFAULT');
}

if ($useDefaultMessages || !isset($arParams['MESS_PAY_SYSTEM_PAYABLE_ERROR']))
{
	$arParams['MESS_PAY_SYSTEM_PAYABLE_ERROR'] = Loc::getMessage('PAY_SYSTEM_PAYABLE_ERROR_DEFAULT');
}

$scheme = $request->isHttps() ? 'https' : 'http';

switch (LANGUAGE_ID)
{
	case 'ru':
		$locale = 'ru-RU'; break;
	case 'ua':
		$locale = 'ru-UA'; break;
	case 'tk':
		$locale = 'tr-TR'; break;
	default:
		$locale = 'en-US'; break;
}

$this->addExternalJs($templateFolder.'/order_ajax.js');
\Bitrix\Sale\PropertyValueCollection::initJs();
$this->addExternalJs($templateFolder.'/script.js');
?>
<NOSCRIPT>
	<div style="color:red"><?= Loc::getMessage('SOA_NO_JS') ?></div>
</NOSCRIPT>
<?



$qount111 = 0;
foreach ($arResult[USER_VALS][QUANTITY_LIST] as $key => $value) {
	$qount111 += $value;
}





if (strlen($request->get('ORDER_ID')) > 0)
{
	include(Main\Application::getDocumentRoot().$templateFolder.'/confirm.php');
}
elseif ($arParams['DISABLE_BASKET_REDIRECT'] === 'Y' && $arResult['SHOW_EMPTY_BASKET'])
{
	include(Main\Application::getDocumentRoot().$templateFolder.'/empty.php');
}
else
{
	Main\UI\Extension::load('phone_auth');

	$themeClass = !empty($arParams['TEMPLATE_THEME']) ? ' bx-'.$arParams['TEMPLATE_THEME'] : '';
	$hideDelivery = empty($arResult['DELIVERY']);
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


		/*До 1000px*/
		@media(min-width:1030px) {
			.twoin {
				width: 660px;
				float: right;
			}
		}



		/*До 1000px*/
		@media(min-width:720px) {
			.twoin {
				width: 600px;
				margin: auto;
			}
		}







		/*До 1000px*/
		@media(max-width:720px) {
			.cartStepNav__items .cartStepNav__item:nth-child(1) {
				display: none;

			}

			.cartStepNav__items .cartStepNav__item:nth-child(2) {
				display: none;

			}

			.cartStepNav__items .cartStepNav__item:nth-child(3) {
				display: block;

			}

			.twoin {
				width: 100%;
				padding: 20px;
				margin: auto;
				padding-left: 50px;
				padding-bottom: 0px;
			}


			.formCommon {
				width: 100% !important;
			}

			.formCommon__title {
				width: 100%;
				white-space: unset;

			}

			.cartStep1Total__link {
				text-align: center;
				line-height: 40px;
			}





		}









		.cartStep1Total__link {
			text-align: center;
			line-height: 40px;
		}

		.cartStep1Total__link {
			background: #ff4500 !important;
			color: #fff;
			border: unset !important;
		}




	}

	.cartStep1Total-promocode {
		display: none;
	}
</style>




<script>
	$('body').on('change', '.soa-property-container', function() {
		// Does some stuff and logs the event to the console


		$('.fileok').html("Реквизиты добавлены, файл: " + $(this).text());
	});
</script>








































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

					<span class="breadcrumbs__item" itemscope="" itemprop="itemListElement" itemtype="http://schema.org/ListItem">
						<a class="breadcrumbs__link" rel="nofollow" itemprop="item" title="Оформление заказа" href="/personal/order/make/">
							<span itemprop="name">Оформление заказа</span>
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
							<div class="cartStepNav__item"><a class="cartStepNav__link" href="/personal/cart/">КОРЗИНА</a></div>
							<div class="cartStepNav__item"><a class="cartStepNav__link" href="#">ВХОД / РЕГИСТРАЦИЯ</a></div>
							<div class="cartStepNav__item"><a class="cartStepNav__link active" href="/personal/order/make/">ОФОРМЛЕНИЕ ЗАКАЗА</a></div>
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




					<div class="twoin">










						<div class="formCommon" style="width: 401px">
							<form class="formCommon__form" action="">
								<div class="formCommon__icon lnr lnr-user"></div>
								<h3 class="formCommon__title">Персональные данные:</h3>
								<div class="formCommon__description">Проверьте или введите свои данные</div>
								<div class="formCommon__wrap">
									<div class="formCommon__row">
										<div class="formCommon__label">
											<div class="formCommon__label-required">*</div>
											<div class="formCommon__label-text">Ф.И.О.:</div>
										</div>
										<div class="formCommon__input">
											<input class="formCommon__input-text" type="text" placeholder="Фамилия Имя Отчество" required="required" onchange="$('#soa-property-1').val($(this).val());" id="fio1" />
										</div>
									</div>
									<div class="formCommon__row">
										<div class="formCommon__label">
											<div class="formCommon__label-required">*</div>
											<div class="formCommon__label-text">Город:</div>
										</div>
										<div class="formCommon__input">
											<input class="formCommon__input-text" type="text" placeholder="Москва" required="required" onchange="$('#soa-property-25').val($(this).val());" id="city1" />
										</div>
									</div>
									<div class="formCommon__row">
										<div class="formCommon__label">
											<div class="formCommon__label-required">*</div>
											<div class="formCommon__label-text">Номер телефона:</div>
										</div>
										<div class="formCommon__input">
											<input class="formCommon__input-text validPhone" type="text" placeholder="+7 977 ..." required="required" onchange="$('#soa-property-3').val($(this).val());" id="phone1" />
										</div>
									</div>
									<div class="formCommon__row">
										<div class="formCommon__label">
											<div class="formCommon__label-required">*</div>
											<div class="formCommon__label-text">Электронная почта:</div>
										</div>
										<div class="formCommon__input">
											<input class="formCommon__input-text email" type="text" placeholder="name@mail.ru" required="required" onchange="$('#soa-property-2').val($(this).val());" id="mail1" />
										</div>
									</div>
								</div>
							</form>
						</div>
						<div class="formCommon" style="width: 565px">
							<form class="formCommon__form" action="">
								<div class="formCommon__icon lnr lnr-car"></div>
								<h3 class="formCommon__title">Выберите способ доставки:</h3>
								<div class="formCommon__wrap">


									<div class="formCommon__row" onclick="" id="checkboxq1">
										<div class="formCommonDelivery" id="Pickup">
											<div class="formCommonDelivery__col one">
												<label>
													<div class="formCommonCheck__checkbox" onclick="chanprice('#ID_DELIVERY_ID_19');
													">
														<input class="formCommonCheck__checkbox-type" type="checkbox" />
														<div class="formCommonCheck__checkbox-style"></div>
													</div>
												</label>
											</div>
											<div class="formCommonDelivery__col two">
												<div class="formCommonDelivery__text">Самовывоз со склада или из офиса</div>
												<div class="formCommonDelivery__info">(Бесплатно. Оплата по расчетному счету или наличными в офисе)</div>
											</div>
										</div>
									</div>


									<div class="formCommon__row" onclick="" id="checkboxq2">
										<div class="formCommonDelivery" id="">
											<div class="formCommonDelivery__col one">
												<label>
													<div class="formCommonCheck__checkbox" onclick="chanprice('#ID_DELIVERY_ID_20');">
														<input class="formCommonCheck__checkbox-type" type="checkbox" />
														<div class="formCommonCheck__checkbox-style"></div>
													</div>
												</label>
											</div>
											<div class="formCommonDelivery__col two">
												<div class="formCommonDelivery__text">Доставка до терминала любой транспортной компании</div>
												<div class="formCommonDelivery__info">(Стоимость доставки 2500 руб. Далее по тарифам транспортной компании)</div>
											</div>
										</div>
									</div>


									<div class="formCommon__row" onclick="" id="checkboxq3">
										<div class="formCommonDelivery" id="">
											<div class="formCommonDelivery__col one">
												<label>
													<div class="formCommonCheck__checkbox" onclick="chanprice('#ID_DELIVERY_ID_21');">
														<input class="formCommonCheck__checkbox-type" type="checkbox" id="checkboxq3" />
														<div class="formCommonCheck__checkbox-style"></div>
													</div>
												</label>
											</div>
											<div class="formCommonDelivery__col two">
												<div class="formCommonDelivery__text">Доставка до терминала транспортной компании “Байкал сервис”</div>
												<div class="formCommonDelivery__info">(Стоимость доставки 600 руб в течение 2-3 раб.дней)</div>
											</div>
										</div>
									</div>


									<div class="formCommon__row" onclick="" id="checkboxq4">
										<div class="formCommonDelivery active" id="">
											<div class="formCommonDelivery__col one">
												<label>
													<div class="formCommonCheck__checkbox" onclick="chanprice('#ID_DELIVERY_ID_22');">
														<input class="formCommonCheck__checkbox-type" type="checkbox" checked="checked" id="checkboxq3" />
														<div class="formCommonCheck__checkbox-style"></div>
													</div>
												</label>
											</div>
											<div class="formCommonDelivery__col two">
												<div class="formCommonDelivery__text">Доставка по Москве в пределах МКАД на указанный адрес без разгрузки</div>
												<div class="formCommonDelivery__info">(Стоимость доставки 2500 руб в течение 2-3 раб.дней)</div>
											</div>
										</div>
									</div>


								</div>
							</form>
						</div>
						<div class="formCommon" style="width: 401px">
							<form class="formCommon__form" action="">
								<div class="formCommon__icon lnr lnr-home"></div>
								<h3 class="formCommon__title">Введите адрес доставки</h3>
								<div class="formCommon__description">У Вас еще нет сохранненых адресов, введите данные</div>
								<div class="formCommon__wrap">
									<div class="formCommon__row">
										<div class="formCommon__label">
											<div class="formCommon__label-required">*</div>
											<div class="formCommon__label-text">Страна, город:</div>
										</div>
										<div class="formCommon__input">
											<input class="formCommon__input-text" type="text" placeholder="Россия, Москва" required="required" onchange="$('#soa-property-28').val($(this).val());" id="cityandcount1" />
										</div>
									</div>
									<div class="formCommon__row">
										<div class="formCommon__label">
											<div class="formCommon__label-required">*</div>
											<div class="formCommon__label-text">Улица, дом, корпус:</div>
										</div>
										<div class="formCommon__input">
											<input class="formCommon__input-text" type="text" placeholder="Рублевское шоссе, дом 28, корпус 2" required="required" onchange="$('#soa-property-29').val($(this).val());" id="street1" />
										</div>
									</div>
									<div class="formCommon__row">
										<div class="formCommon__label">
											<div class="formCommon__label-text">Ваш комментарий:</div>
										</div>
										<div class="formCommon__input">
											<input class="formCommon__input-text" type="text" placeholder="Позвонить перед доставкой..." onchange="$('#orderDescription').val($(this).val());" id="comment1" />
										</div>
									</div>
									<div class="formCommon__row undefined" style="display:none;">
										<div class="formCommon__download"><span class="formCommon__download__href">добавить еще адрес</span></div>
									</div>
								</div>
							</form>
						</div>
						<div class="formCommon" style="width: 401px">
							<form class="formCommon__form" action="">
								<div class="formCommon__icon lnr lnr-paperclip" style="cursor: pointer;"></div>
								<h3 class="formCommon__title" style="cursor: pointer;">Прикрепите реквизиты компании</h3>
								<span class="fileok"></span>


								<div class="formCommon__wrap">
									<div class="formCommon__row top20">
										<?/*
										<div class="formCommon__download"><span class="formCommon__download__href" onclick="document.querySelector('.btn-sm').click();" style="text-decoration: underline;">Выберите файл</span></div>
*/?>

										<a class="cartStep1Total__link" href="javascript:void(0);" onclick="document.querySelector('.btn-sm').click();" style="font-style: italic;
    border: 1px solid #616161 !important;
    color: #616161;
    background: #ffffff !important;    width: 200px !important;font-size: 14px !important;">Выберите файл</a>


									</div>

									<?/*
									<div class="formCommon__row" style="display:none;">
										<div class="formCommon__download"><span class="formCommon__download__href">+ добавить еще</span><a class="formCommon__download-link" href="#">Сохранить данные в личном кабинете</a>
										</div>
									</div>
									*/?>
								</div>


							</form>
						</div>








					</div>



				</div>



















				<div class="account__col three">


					<div class="cartStep1Total">
						<div id="basket-root" class="bx-basket bx-<?= $arParams['TEMPLATE_THEME'] ?> bx-step-opacity" style="/*opacity: 0;*/">

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




							<h2 class="cartStep1Total__title">Товаров в корзине</h2>
							<div class="cartStep1Total__sht"><span id="countTotal"><?= $qount111 ?></span> шт.</div>
							<div class="cartStep1Total__price"><span id="totalPrice">524 599 руб.</span></div>
							<div class="cartStep1Total-promocode">
								<div class="cartStep1Total-promocode__title">Введите промокод или № сертификата:</div>
								<div class="cartStep1Total-promocode__input">
									<input class="cartStep1Total-promocode__input-text" type="text" placeholder="промокод">
								</div>
							</div><a class="cartStep1Total__link" href="javascript:void(0);" onclick="document.querySelector('#tesss').click();">Оформить заказ</a>
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
								менеджеру 8&nbsp;800&nbsp;302&nbsp;44&nbsp;01
							</div>







						</div>
					</div>



				</div>
			</div>
		</div>
	</div>
</div>












<div class="fixtotal" style="display: block;    padding-top: 5px !important;">

	<div class="fixtotalcol1" style="margin-bottom: 5px;">
		<h2 class="cartStep1Total__title">Товаров в корзине</h2>
		<div class="cartStep1Total__sht"><span id="countTotal1" class="countTotal1">13</span> шт.</div>
		<div class="cartStep1Total__price"><span id="totalPrice" class="totalPrice">635 471 руб.</span></div>
	</div>
	<div class="fixtotalcol2">
		<button class="cartStep1Total__link" data-entity="basket-checkout-button">
			Перейти к оформлению
		</button>
	</div>
</div>






<script>
	//Скрытие кнопки
	var startscr = 5;
	var endscr = 0;
	startscr = -100;
	endscr = $('.fileok').offset().top;
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
<br><br><br><br><br><br><br><br><br><br><br>
*/?>











<div style="display:none;">


	<form action="<?= POST_FORM_ACTION_URI ?>" method="POST" name="ORDER_FORM" class="bx-soa-wrapper mb-4<?= $themeClass ?>" id="bx-soa-order-form" enctype="multipart/form-data">
		<?
		echo bitrix_sessid_post();

		if (strlen($arResult['PREPAY_ADIT_FIELDS']) > 0)
		{
			echo $arResult['PREPAY_ADIT_FIELDS'];
		}
		?>
		<input type="hidden" name="<?= $arParams['ACTION_VARIABLE'] ?>" value="saveOrderAjax">
		<input type="hidden" name="location_type" value="code">
		<input type="hidden" name="BUYER_STORE" id="BUYER_STORE" value="<?= $arResult['BUYER_STORE'] ?>">
		<div id="bx-soa-order" class="row" style="opacity: 0">
			<!--	MAIN BLOCK	-->
			<div class="col-lg-8 col-md-7 bx-soa">
				<div id="bx-soa-main-notifications">
					<div class="alert alert-danger" style="display:none"></div>
					<div data-type="informer" style="display:none"></div>
				</div>
				<!--	AUTH BLOCK	-->
				<div id="bx-soa-auth" class="bx-soa-section bx-soa-auth" style="display: none;">
					<div class="bx-soa-section-title-container">
						<div class="bx-soa-section-title" data-entity="section-title">
							<span class="bx-soa-section-title-count"></span>
							<?= $arParams['MESS_AUTH_BLOCK_NAME'] ?>
						</div>
					</div>
					<div class="bx-soa-section-content"></div>
				</div>

				<!--	DUPLICATE MOBILE ORDER SAVE BLOCK	-->
				<div id="bx-soa-total-mobile" style="margin-bottom: 6px;"></div>



				<? if ($arParams['BASKET_POSITION'] === 'before'): ?>
				<!--	BASKET ITEMS BLOCK	-->
				<div id="bx-soa-basket" data-visited="false" class="bx-soa-section bx-active">
					<div class="bx-soa-section-title-container d-flex justify-content-between align-items-center flex-nowrap">
						<div class="bx-soa-section-title" data-entity="section-title">
							<span class="bx-soa-section-title-count"></span>
							<?= $arParams['MESS_BASKET_BLOCK_NAME'] ?>
						</div>
						<div><a href="javascript:void(0)" class="bx-soa-editstep"><?= $arParams['MESS_EDIT'] ?></a></div>
					</div>
					<div class="bx-soa-section-content"></div>
				</div>
				<? endif ?>



				<!--	REGION BLOCK	-->
				<div id="bx-soa-region" data-visited="false" class="bx-soa-section bx-active">
					<div class="bx-soa-section-title-container d-flex justify-content-between align-items-center flex-nowrap">
						<div class="bx-soa-section-title" data-entity="section-title">
							<span class="bx-soa-section-title-count"></span><?= $arParams['MESS_REGION_BLOCK_NAME'] ?>
						</div>
						<div><a href="" class="bx-soa-editstep"><?= $arParams['MESS_EDIT'] ?></a></div>
					</div>
					<div class="bx-soa-section-content"></div>
				</div>

				<? if ($arParams['DELIVERY_TO_PAYSYSTEM'] === 'p2d'): ?>
				<!--	PAY SYSTEMS BLOCK	-->
				<div id="bx-soa-paysystem" data-visited="false" class="bx-soa-section bx-active">
					<div class="bx-soa-section-title-container d-flex justify-content-between align-items-center flex-nowrap">
						<div class="bx-soa-section-title" data-entity="section-title">
							<span class="bx-soa-section-title-count"></span><?= $arParams['MESS_PAYMENT_BLOCK_NAME'] ?>
						</div>
						<div><a href="" class="bx-soa-editstep"><?= $arParams['MESS_EDIT'] ?></a></div>
					</div>
					<div class="bx-soa-section-content"></div>
				</div>
				<!--	DELIVERY BLOCK	-->
				<div id="bx-soa-delivery" data-visited="false" class="bx-soa-section bx-active" <?= ($hideDelivery ? 'style="display:none"' : '') ?>>
					<div class="bx-soa-section-title-container d-flex justify-content-between align-items-center flex-nowrap">
						<div class="bx-soa-section-title" data-entity="section-title">
							<span class="bx-soa-section-title-count"></span><?= $arParams['MESS_DELIVERY_BLOCK_NAME'] ?>
						</div>
						<div><a href="" class="bx-soa-editstep"><?= $arParams['MESS_EDIT'] ?></a></div>
					</div>
					<div class="bx-soa-section-content"></div>
				</div>
				<!--	PICKUP BLOCK	-->
				<div id="bx-soa-pickup" data-visited="false" class="bx-soa-section" style="display:none">
					<div class="bx-soa-section-title-container d-flex justify-content-between align-items-center flex-nowrap">
						<div class="bx-soa-section-title" data-entity="section-title">
							<span class="bx-soa-section-title-count"></span>
						</div>
						<div><a href="" class="bx-soa-editstep"><?= $arParams['MESS_EDIT'] ?></a></div>
					</div>
					<div class="bx-soa-section-content"></div>
				</div>
				<? else: ?>



				<!--	DELIVERY BLOCK	-->
				<div id="bx-soa-delivery" data-visited="false" class="bx-soa-section bx-active" <?= ($hideDelivery ? 'style="display:none"' : '') ?>>
					<div class="bx-soa-section-title-container d-flex justify-content-between align-items-center flex-nowrap" id="g1">
						<div class="bx-soa-section-title" data-entity="section-title" id="g2">
							<span class="bx-soa-section-title-count" id="g3"></span><?= $arParams['MESS_DELIVERY_BLOCK_NAME'] ?>
						</div>
						<div><a href="" class="bx-soa-editstep"><?= $arParams['MESS_EDIT'] ?></a></div>
					</div>
					<div class="bx-soa-section-content"></div>
				</div>




				<!--	PICKUP BLOCK	-->
				<div id="bx-soa-pickup" data-visited="false" class="bx-soa-section" style="display:none">
					<div class="bx-soa-section-title-container d-flex justify-content-between align-items-center flex-nowrap">
						<div class="bx-soa-section-title" data-entity="section-title">
							<span class="bx-soa-section-title-count"></span>
						</div>
						<div><a href="" class="bx-soa-editstep"><?= $arParams['MESS_EDIT'] ?></a></div>
					</div>
					<div class="bx-soa-section-content"></div>
				</div>
				<!--	PAY SYSTEMS BLOCK	-->
				<div id="bx-soa-paysystem" data-visited="false" class="bx-soa-section bx-active">
					<div class="bx-soa-section-title-container d-flex justify-content-between align-items-center flex-nowrap">
						<div class="bx-soa-section-title" data-entity="section-title">
							<span class="bx-soa-section-title-count"></span><?= $arParams['MESS_PAYMENT_BLOCK_NAME'] ?>
						</div>
						<div><a href="" class="bx-soa-editstep"><?= $arParams['MESS_EDIT'] ?></a></div>
					</div>
					<div class="bx-soa-section-content"></div>
				</div>
				<? endif ?>
				<!--	BUYER PROPS BLOCK	-->
				<div id="bx-soa-properties" data-visited="false" class="bx-soa-section bx-active">
					<div class="bx-soa-section-title-container d-flex justify-content-between align-items-center flex-nowrap">
						<div class="bx-soa-section-title" data-entity="section-title">
							<span class="bx-soa-section-title-count"></span><?= $arParams['MESS_BUYER_BLOCK_NAME'] ?>
						</div>
						<div><a href="" class="bx-soa-editstep"><?= $arParams['MESS_EDIT'] ?></a></div>
					</div>
					<div class="bx-soa-section-content"></div>
				</div>

				<? if ($arParams['BASKET_POSITION'] === 'after'): ?>
				<!--	BASKET ITEMS BLOCK	-->
				<div id="bx-soa-basket" data-visited="false" class="bx-soa-section bx-active">
					<div class="bx-soa-section-title-container d-flex justify-content-between align-items-center flex-nowrap">
						<div class="bx-soa-section-title" data-entity="section-title">
							<span class="bx-soa-section-title-count"></span><?= $arParams['MESS_BASKET_BLOCK_NAME'] ?>
						</div>
						<div><a href="javascript:void(0)" class="bx-soa-editstep"><?= $arParams['MESS_EDIT'] ?></a></div>
					</div>
					<div class="bx-soa-section-content"></div>
				</div>
				<? endif ?>

				<!--	ORDER SAVE BLOCK	-->
				<div id="bx-soa-orderSave">
					<div class="checkbox">
						<?
						if ($arParams['USER_CONSENT'] === 'Y')
						{
							$APPLICATION->IncludeComponent(
								'bitrix:main.userconsent.request',
								'',
								array(
									'ID' => $arParams['USER_CONSENT_ID'],
									'IS_CHECKED' => $arParams['USER_CONSENT_IS_CHECKED'],
									'IS_LOADED' => $arParams['USER_CONSENT_IS_LOADED'],
									'AUTO_SAVE' => 'N',
									'SUBMIT_EVENT_NAME' => 'bx-soa-order-save',
									'REPLACE' => array(
										'button_caption' => isset($arParams['~MESS_ORDER']) ? $arParams['~MESS_ORDER'] : $arParams['MESS_ORDER'],
										'fields' => $arResult['USER_CONSENT_PROPERTY_DATA']
									)
								)
							);
						}
						?>
					</div>
					<a href="javascript:void(0)" style="margin: 10px 0" class="btn btn-primary btn-lg d-none d-sm-inline-block" data-save-button="true" ID="tesss">
						<?= $arParams['MESS_ORDER'] ?>
					</a>
				</div>

				<div style="display: none;">
					<div id='bx-soa-basket-hidden' class="bx-soa-section"></div>
					<div id='bx-soa-region-hidden' class="bx-soa-section"></div>
					<div id='bx-soa-paysystem-hidden' class="bx-soa-section"></div>
					<div id='bx-soa-delivery-hidden' class="bx-soa-section"></div>
					<div id='bx-soa-pickup-hidden' class="bx-soa-section"></div>
					<div id="bx-soa-properties-hidden" class="bx-soa-section"></div>
					<div id="bx-soa-auth-hidden" class="bx-soa-section">
						<div class="bx-soa-section-content reg"></div>
					</div>
				</div>
			</div>

			<!--	SIDEBAR BLOCK	-->
			<div id="bx-soa-total" class="col-lg-4 col-md-5 bx-soa-sidebar">
				<div class="bx-soa-cart-total-ghost"></div>
				<div class="bx-soa-cart-total"></div>
			</div>
		</div>
	</form>

	<div id="bx-soa-saved-files" style="display:none"></div>
	<div id="bx-soa-soc-auth-services" style="display:none">
		<?
		$arServices = false;
		$arResult['ALLOW_SOCSERV_AUTHORIZATION'] = Main\Config\Option::get('main', 'allow_socserv_authorization', 'Y') != 'N' ? 'Y' : 'N';
		$arResult['FOR_INTRANET'] = false;

		if (Main\ModuleManager::isModuleInstalled('intranet') || Main\ModuleManager::isModuleInstalled('rest'))
			$arResult['FOR_INTRANET'] = true;

		if (Main\Loader::includeModule('socialservices') && $arResult['ALLOW_SOCSERV_AUTHORIZATION'] === 'Y')
		{
			$oAuthManager = new CSocServAuthManager();
			$arServices = $oAuthManager->GetActiveAuthServices(array(
				'BACKURL' => $this->arParams['~CURRENT_PAGE'],
				'FOR_INTRANET' => $arResult['FOR_INTRANET'],
			));

			if (!empty($arServices))
			{
				$APPLICATION->IncludeComponent(
					'bitrix:socserv.auth.form',
					'flat',
					array(
						'AUTH_SERVICES' => $arServices,
						'AUTH_URL' => $arParams['~CURRENT_PAGE'],
						'POST' => $arResult['POST'],
					),
					$component,
					array('HIDE_ICONS' => 'Y')
				);
			}
		}
		?>
	</div>

	<div style="display: none">
		<?
		// we need to have all styles for sale.location.selector.steps, but RestartBuffer() cuts off document head with styles in it
		$APPLICATION->IncludeComponent(
			'bitrix:sale.location.selector.steps',
			'.default',
			array(),
			false
		);
		$APPLICATION->IncludeComponent(
			'bitrix:sale.location.selector.search',
			'.default',
			array(),
			false
		);
		?>
	</div>




</div>


















<?
	$signer = new Main\Security\Sign\Signer;
	$signedParams = $signer->sign(base64_encode(serialize($arParams)), 'sale.order.ajax');
	$messages = Loc::loadLanguageFile(__FILE__);
	?>
<script>
	BX.message(<?= CUtil::PhpToJSObject($messages) ?>);
	BX.Sale.OrderAjaxComponent.init({
		result: <?= CUtil::PhpToJSObject($arResult['JS_DATA']) ?>,
		locations: <?= CUtil::PhpToJSObject($arResult['LOCATIONS']) ?>,
		params: <?= CUtil::PhpToJSObject($arParams) ?>,
		signedParamsString: '<?= CUtil::JSEscape($signedParams) ?>',
		siteID: '<?= CUtil::JSEscape($component->getSiteId()) ?>',
		ajaxUrl: '<?= CUtil::JSEscape($component->getPath() . '/ajax.php') ?>',
		templateFolder: '<?= CUtil::JSEscape($templateFolder) ?>',
		propertyValidation: true,
		showWarnings: true,
		pickUpMap: {
			defaultMapPosition: {
				lat: 55.76,
				lon: 37.64,
				zoom: 7
			},
			secureGeoLocation: false,
			geoLocationMaxTime: 5000,
			minToShowNearestBlock: 3,
			nearestPickUpsToShow: 3
		},
		propertyMap: {
			defaultMapPosition: {
				lat: 55.76,
				lon: 37.64,
				zoom: 7
			}
		},
		orderBlockId: 'bx-soa-order',
		authBlockId: 'bx-soa-auth',
		basketBlockId: 'bx-soa-basket',
		regionBlockId: 'bx-soa-region',
		paySystemBlockId: 'bx-soa-paysystem',
		deliveryBlockId: 'bx-soa-delivery',
		pickUpBlockId: 'bx-soa-pickup',
		propsBlockId: 'bx-soa-properties',
		totalBlockId: 'bx-soa-total'
	});
</script>
<script>
	< ?
	// spike: for children of cities we place this prompt
	$city = \Bitrix\ Sale\ Location\ TypeTable::getList(array('filter' => array('=CODE' => 'CITY'), 'select' => array('ID'))) - > fetch(); ?
	>
	BX.saleOrderAjax.init(<?= CUtil::PhpToJSObject(array(
								'source' => $component->getPath() . '/get.php',
								'cityTypeId' => intval($city['ID']),
								'messages' => array(
									'otherLocation' => '--- ' . Loc::getMessage('SOA_OTHER_LOCATION'),
									'moreInfoLocation' => '--- ' . Loc::getMessage('SOA_NOT_SELECTED_ALT'), // spike: for children of cities we place this prompt
									'notFoundPrompt' => '<div class="-bx-popup-special-prompt">' . Loc::getMessage('SOA_LOCATION_NOT_FOUND') . '.<br />' . Loc::getMessage('SOA_LOCATION_NOT_FOUND_PROMPT', array(
										'#ANCHOR#' => '<a href="javascript:void(0)" class="-bx-popup-set-mode-add-loc">',
										'#ANCHOR_END#' => '</a>'
									)) . '</div>'
								)
							)) ?>);
</script>


<?
	if ($arParams['SHOW_PICKUP_MAP'] === 'Y' || $arParams['SHOW_MAP_IN_PROPS'] === 'Y')
	{
		if ($arParams['PICKUP_MAP_TYPE'] === 'yandex')
		{
			$this->addExternalJs($templateFolder.'/scripts/yandex_maps.js');
			?>
<script src="<?= $scheme ?>://api-maps.yandex.ru/2.1.50/?load=package.full&lang=<?= $locale ?>"></script>
<script>
	(function bx_ymaps_waiter() {
		if (typeof ymaps !== 'undefined' && BX.Sale && BX.Sale.OrderAjaxComponent)
			ymaps.ready(BX.proxy(BX.Sale.OrderAjaxComponent.initMaps, BX.Sale.OrderAjaxComponent));
		else
			setTimeout(bx_ymaps_waiter, 100);
	})();
</script>
<?
		}

		if ($arParams['PICKUP_MAP_TYPE'] === 'google')
		{
			$this->addExternalJs($templateFolder.'/scripts/google_maps.js');
			$apiKey = htmlspecialcharsbx(Main\Config\Option::get('fileman', 'google_map_api_key', ''));
			?>
<script async defer src="<?= $scheme ?>://maps.googleapis.com/maps/api/js?key=<?= $apiKey ?>&callback=bx_gmaps_waiter">
</script>
<script>
	function bx_gmaps_waiter() {
		if (BX.Sale && BX.Sale.OrderAjaxComponent)
			BX.Sale.OrderAjaxComponent.initMaps();
		else
			setTimeout(bx_gmaps_waiter, 100);
	}
</script>
<?
		}
	}

	if ($arParams['USE_YM_GOALS'] === 'Y')
	{
		?>
<script>
	(function bx_counter_waiter(i) {
		i = i || 0;
		if (i > 50)
			return;

		if (typeof window['yaCounter<?= $arParams['YM_GOALS_COUNTER'] ?>'] !== 'undefined')
			BX.Sale.OrderAjaxComponent.reachGoal('initialization');
		else
			setTimeout(function() {
				bx_counter_waiter(++i)
			}, 100);
	})();
</script>

<?
	}
}












//Новый скрипт:
?>



<script type="text/javascript">
	$('#fio1').val($('#soa-property-1').val());
	$('#city1').val($('#soa-property-25').val());
	$('#phone1').val($('#soa-property-3').val());
	$('#mail1').val($('#soa-property-2').val());
	$('#cityandcount1').val($('#soa-property-28').val());
	$('#street1').val($('#soa-property-29').val());
	$('#comment1').val($('#orderDescription').val());

	$('#totalPrice').html($('.bx-soa-cart-total-line-total').find('.bx-soa-cart-d').html());





	function chanprice(targetclick1) {

		chanprice1(targetclick1);

		$('#totalPrice').html($('.bx-soa-cart-total-line-total').find('.bx-soa-cart-d').html());

		setTimeout("$('#totalPrice').html($('.bx-soa-cart-total-line-total').find('.bx-soa-cart-d').html())", 500);
		setTimeout("$('#totalPrice').html($('.bx-soa-cart-total-line-total').find('.bx-soa-cart-d').html())", 1000);
		setTimeout("$('#totalPrice').html($('.bx-soa-cart-total-line-total').find('.bx-soa-cart-d').html())", 2000);


		$('.totalPrice').html($('.bx-soa-cart-total-line-total').find('.bx-soa-cart-d').html());

setTimeout("$('.totalPrice').html($('.bx-soa-cart-total-line-total').find('.bx-soa-cart-d').html())", 500);
setTimeout("$('.totalPrice').html($('.bx-soa-cart-total-line-total').find('.bx-soa-cart-d').html())", 1000);
setTimeout("$('.totalPrice').html($('.bx-soa-cart-total-line-total').find('.bx-soa-cart-d').html())", 2000);




	};



	function chanprice1(targetclick) {

		document.querySelector('#g1').click();
		document.querySelector(targetclick).click();
		return true;

	};














	if ($('#checkboxq1').find('.formCommonDelivery__text').html() == $('.bx-soa-pp-company-selected').find('strong').html()) {
		$('#checkboxq1').find('.formCommonDelivery').addClass("active");
		$('#checkboxq1').find('.formCommonCheck__checkbox-type').attr("checked", "checked");
	} else {
		$('#checkboxq1').find('.formCommonDelivery').removeClass("active");
		$('#checkboxq1').find('.formCommonCheck__checkbox-type').removeAttr("checked");
	}

	if ($('#checkboxq2').find('.formCommonDelivery__text').html() == $('.bx-soa-pp-company-selected').find('strong').html()) {
		$('#checkboxq2').find('.formCommonDelivery').addClass("active");
		$('#checkboxq2').find('.formCommonCheck__checkbox-type').attr("checked", "checked");
	} else {
		$('#checkboxq2').find('.formCommonDelivery').removeClass("active");
		$('#checkboxq2').find('.formCommonCheck__checkbox-type').removeAttr("checked");
	}

	if ($('#checkboxq3').find('.formCommonDelivery__text').html() == $('.bx-soa-pp-company-selected').find('strong').html()) {
		$('#checkboxq3').find('.formCommonDelivery').addClass("active");
		$('#checkboxq3').find('.formCommonCheck__checkbox-type').attr("checked", "checked");
	} else {
		$('#checkboxq3').find('.formCommonDelivery').removeClass("active");
		$('#checkboxq3').find('.formCommonCheck__checkbox-type').removeAttr("checked");
	}

	if ($('#checkboxq4').find('.formCommonDelivery__text').html() == $('.bx-soa-pp-company-selected').find('strong').html()) {
		$('#checkboxq4').find('.formCommonDelivery').addClass("active");
		$('#checkboxq4').find('.formCommonCheck__checkbox-type').attr("checked", "checked");
	} else {
		$('#checkboxq4').find('.formCommonDelivery').removeClass("active");
		$('#checkboxq4').find('.formCommonCheck__checkbox-type').removeAttr("checked");
	}
</script>