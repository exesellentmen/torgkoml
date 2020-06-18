<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 */
?>
<script id="basket-total-template" type="text/html">
	<h2 class="cartStep1Total__title">Товаров в корзине</h2>



	<div class="cartStep1Total__sht"><span id="countTotal1">{{{QOUNT1}}}</span> шт.</div>
	<div class="cartStep1Total__price"><span id="totalPrice">{{{PRICE_FORMATED}}}</span></div>

	<div class="cartStep1Total-promocode" style="display:none;">
		<div class="cartStep1Total-promocode__title">Введите промокод или № сертификата:</div>
		<div class="cartStep1Total-promocode__input">
			<input class="cartStep1Total-promocode__input-text" type="text" placeholder="промокод">
		</div>
	</div>



	<button class="cartStep1Total__link" data-entity="basket-checkout-button">
		Перейти к оформлению
	</button>


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








	<div class="fixtotal">

		<div class="fixtotalcol1">
			<h2 class="cartStep1Total__title">Товаров в корзине</h2>
			<div class="cartStep1Total__sht"><span id="countTotal1">{{{QOUNT1}}}</span> шт.</div>
			<div class="cartStep1Total__price"><span id="totalPrice">{{{PRICE_FORMATED}}}</span></div>
		</div>
		<div class="fixtotalcol2">
			<button class="cartStep1Total__link" data-entity="basket-checkout-button">
				Перейти к оформлению
			</button>
		</div>
	</div>

















	<?/*



	<div class="basket-checkout-container" data-entity="basket-checkout-aligner">
		<?
		if ($arParams['HIDE_COUPON'] !== 'Y')
		{
			?>
	<div class="basket-coupon-section">
		<div class="basket-coupon-block-field">
			<div class="basket-coupon-block-field-description">
				<?= Loc::getMessage('SBB_COUPON_ENTER') ?>:
			</div>
			<div class="form">
				<div class="form-group" style="position: relative;">
					<input type="text" class="form-control" id="" placeholder="" data-entity="basket-coupon-input">
					<span class=" basket-coupon-block-coupon-btn"></span>
				</div>
			</div>

		</div>
	</div>
	<?
		}
		?>
	<div class="basket-checkout-section">
		<div class="basket-checkout-section-inner<?= (($arParams['HIDE_COUPON'] == 'Y') ? ' justify-content-between' : '') ?>">
			<div class="basket-checkout-block basket-checkout-block-total">
				<div class="basket-checkout-block-total-inner">
					<div class="basket-checkout-block-total-title"><?= Loc::getMessage('SBB_TOTAL') ?>:</div>
					<div class="basket-checkout-block-total-description">
						{{#WEIGHT_FORMATED}}
							<?= Loc::getMessage('SBB_WEIGHT') ?>: {{{WEIGHT_FORMATED}}}
							{{#SHOW_VAT}}<br>{{/SHOW_VAT}}
						{{/WEIGHT_FORMATED}}
						{{#SHOW_VAT}}
							<?= Loc::getMessage('SBB_VAT') ?>: {{{VAT_SUM_FORMATED}}}
						{{/SHOW_VAT}}
					</div>
				</div>
			</div>

			<div class="basket-checkout-block basket-checkout-block-total-price">
				<div class="basket-checkout-block-total-price-inner">
					{{#DISCOUNT_PRICE_FORMATED}}
						<div class="basket-coupon-block-total-price-old">
							{{{PRICE_WITHOUT_DISCOUNT_FORMATED}}}
						</div>
					{{/DISCOUNT_PRICE_FORMATED}}
					<div class="basket-coupon-block-total-price-current" data-entity="basket-total-price">
						{{{PRICE_FORMATED}}}
					</div>

					{{#DISCOUNT_PRICE_FORMATED}}
						<div class="basket-coupon-block-total-price-difference">
							<?= Loc::getMessage('SBB_BASKET_ITEM_ECONOMY') ?>
							<span style="white-space: nowrap;">{{{DISCOUNT_PRICE_FORMATED}}}</span>
						</div>
					{{/DISCOUNT_PRICE_FORMATED}}
				</div>
			</div>

			<div class="basket-checkout-block basket-checkout-block-btn">
				<button class="btn btn-lg btn-primary basket-btn-checkout{{#DISABLE_CHECKOUT}} disabled{{/DISABLE_CHECKOUT}}" data-entity="basket-checkout-button">
					<?= Loc::getMessage('SBB_ORDER') ?>
				</button>
			</div>
		</div>
	</div>

	<?
		if ($arParams['HIDE_COUPON'] !== 'Y')
		{
		?>
	<div class="basket-coupon-alert-section">
		<div class="basket-coupon-alert-inner">
			{{#COUPON_LIST}}
				<div class="basket-coupon-alert text-{{CLASS}}">
					<span class="basket-coupon-text">
						<strong>{{COUPON}}</strong> - <?= Loc::getMessage('SBB_COUPON') ?> {{JS_CHECK_CODE}}
						{{#DISCOUNT_NAME}}({{DISCOUNT_NAME}}){{/DISCOUNT_NAME}}
					</span>
					<span class="close-link" data-entity="basket-coupon-delete" data-coupon="{{COUPON}}">
						<?= Loc::getMessage('SBB_DELETE') ?>
					</span>
				</div>
			{{/COUPON_LIST}}
		</div>
	</div>
	<?
		}
		?>
	</>


	*/?>
</script>