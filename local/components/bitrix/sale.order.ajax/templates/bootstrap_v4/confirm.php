<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 * @var array $arResult
 * @var $APPLICATION CMain
 */

if ($arParams["SET_TITLE"] == "Y")
{
	$APPLICATION->SetTitle(Loc::getMessage("SOA_ORDER_COMPLETE"));
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


			.cartStep4-control {
				display: block;
				text-align: center;
			}

			.cartStep4-control__btn{
				margin: auto;
			}
			.cartStep4-control__col.two{
				margin-top: 20px;
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
				display: block;

			}

			.cartStepNav__items .cartStepNav__item:nth-child(2) {
				display: none;

			}

			.cartStepNav__items .cartStepNav__item:nth-child(3) {
				display: block;

			}

			.account__col.three{
				display: none;
			}

			.cartStepNav{
				padding-left: 30px;
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


		.cartStepNav{
			max-width: 600px;
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
							<div class="cartStepNav__item"><a class="cartStepNav__link" href="#">СПАСИБО</a></div>
							<div class="cartStepNav__item"><a class="cartStepNav__link" href="#"></a></div>
							<div class="cartStepNav__item"><a class="cartStepNav__link active" href="#"></a></div>
						</div>
					</div>
				</div>
				<div class="account__col three"></div>
			</div>
			<div class="account">

				<div class="account__col one">
					<div class="lkMenu" style='display:none;'>
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



						<? if (!empty($arResult["ORDER"])): ?>
						<div class="cartStep4">
							<h3 class="cartStep4__title">Успешное оформление заказа</h3>
							<div class="cartStep4__text one">Наш менеджер свяжется с Вами в рабочее время., ожидайте письмо на указанный e-mail адрес.</div>
							<div class="cartStep4__text two">
								<b>
							Номер вашего заказа

								<a class="cartStep4__link" href="#"><b>№<?= $arResult["ORDER_ID"]; ?></b></a>
						</b>
							</div>




							<?/*
							<div class="cartStep4__text three">Посмотреть заявку Вы можете в <a class="cartStep4__link" href="#">Истории покупок</a></div>
						*/?>
							<div class="cartStep4__info">*Если вы оставили заказ в нерабочее время, он будет обработан в начале следующего рабочего дня.</div>
							<div class="cartStep4-control">
								<div class="cartStep4-control__col one"><a class="cartStep4-control__btn" href="/katalog-tovarov-3/" style="text-decoration: dashed;">Каталог</a></div>
								<div class="cartStep4-control__col two"><a class="cartStep4-control__link" href="#">Перейти в контакты</a></div>
							</div>
						</div>
						<? endif ?>


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








						</div>
					</div>



				</div>
			</div>
		</div>
	</div>
</div>




















<div style="display:none;">

	<br><br><br><br><br><br><br><br>






	<? if (!empty($arResult["ORDER"])): ?>

	<div class="row mb-5">
		<div class="col">
			<?= Loc::getMessage("SOA_ORDER_SUC", array(
				"#ORDER_DATE#" => $arResult["ORDER"]["DATE_INSERT"]->toUserTime()->format('d.m.Y H:i'),
				"#ORDER_ID#" => $arResult["ORDER"]["ACCOUNT_NUMBER"]
			)) ?>
			<? if (!empty($arResult['ORDER']["PAYMENT_ID"])): ?>
			<?= Loc::getMessage("SOA_PAYMENT_SUC", array(
				"#PAYMENT_ID#" => $arResult['PAYMENT'][$arResult['ORDER']["PAYMENT_ID"]]['ACCOUNT_NUMBER']
			)) ?>
			<? endif ?>
		</div>
	</div>

	<? if ($arParams['NO_PERSONAL'] !== 'Y'): ?>
	<div class="row mb-5">
		<div class="col">
			<?= Loc::getMessage('SOA_ORDER_SUC1', ['#LINK#' => $arParams['PATH_TO_PERSONAL']]) ?>
		</div>
	</div>
	<? endif; ?>

	<?
	if ($arResult["ORDER"]["IS_ALLOW_PAY"] === 'Y')
	{
		if (!empty($arResult["PAYMENT"]))
		{
			foreach ($arResult["PAYMENT"] as $payment)
			{
				if ($payment["PAID"] != 'Y')
				{
					if (!empty($arResult['PAY_SYSTEM_LIST'])
						&& array_key_exists($payment["PAY_SYSTEM_ID"], $arResult['PAY_SYSTEM_LIST'])
					)
					{
						$arPaySystem = $arResult['PAY_SYSTEM_LIST_BY_PAYMENT_ID'][$payment["ID"]];

						if (empty($arPaySystem["ERROR"]))
						{
							?>

	<div class="row mb-2">
		<div class="col">
			<h3 class="pay_name"><?= Loc::getMessage("SOA_PAY") ?></h3>
		</div>
	</div>
	<div class="row mb-2 align-items-center">
		<div class="col-auto"><strong><?= $arPaySystem["NAME"] ?></strong></div>
		<div class="col"><?= CFile::ShowImage($arPaySystem["LOGOTIP"], 100, 100, "border=0\" style=\"width:100px\"", "", false) ?></div>
	</div>
	<div class="row mb-2">
		<div class="col">
			<? if (strlen($arPaySystem["ACTION_FILE"]) > 0 && $arPaySystem["NEW_WINDOW"] == "Y" && $arPaySystem["IS_CASH"] != "Y"): ?>
			<?
										$orderAccountNumber = urlencode(urlencode($arResult["ORDER"]["ACCOUNT_NUMBER"]));
										$paymentAccountNumber = $payment["ACCOUNT_NUMBER"];
									?>
			<script>
				window.open('<?= $arParams["PATH_TO_PAYMENT"] ?>?ORDER_ID=<?= $orderAccountNumber ?>&PAYMENT_ID=<?= $paymentAccountNumber ?>');
			</script>
			<?= Loc::getMessage("SOA_PAY_LINK", array("#LINK#" => $arParams["PATH_TO_PAYMENT"] . "?ORDER_ID=" . $orderAccountNumber . "&PAYMENT_ID=" . $paymentAccountNumber)) ?>
			<? if (CSalePdf::isPdfAvailable() && $arPaySystem['IS_AFFORD_PDF']): ?>
			<br />
			<?= Loc::getMessage("SOA_PAY_PDF", array("#LINK#" => $arParams["PATH_TO_PAYMENT"] . "?ORDER_ID=" . $orderAccountNumber . "&pdf=1&DOWNLOAD=Y")) ?>
			<? endif ?>
			<? else: ?>
			<?= $arPaySystem["BUFFERED_OUTPUT"] ?>
			<? endif ?>
		</div>
	</div>



	<?
						}
						else
						{
							?>
	<div class="alert alert-danger" role="alert"><?= Loc::getMessage("SOA_ORDER_PS_ERROR") ?></div>
	<?
						}
					}
					else
					{
						?>
	<div class="alert alert-danger" role="alert"><?= Loc::getMessage("SOA_ORDER_PS_ERROR") ?></div>
	<?
					}
				}
			}
		}
	}
	else
	{
		?>
	<div class="alert alert-danger" role="alert"><?= $arParams['MESS_PAY_SYSTEM_PAYABLE_ERROR'] ?></div>
	<?
	}
	?>

	<? else: ?>


	<div class="row mb-2">
		<div class="col">
			<div class="alert alert-danger" role="alert"><strong><?= Loc::getMessage("SOA_ERROR_ORDER") ?></strong><br />
				<?= Loc::getMessage("SOA_ERROR_ORDER_LOST", ["#ORDER_ID#" => htmlspecialcharsbx($arResult["ACCOUNT_NUMBER"])]) ?><br />
				<?= Loc::getMessage("SOA_ERROR_ORDER_LOST1") ?></div>
		</div>
	</div>

	<? endif ?>


</div>