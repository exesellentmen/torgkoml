<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $item
 * @var array $actualItem
 * @var array $minOffer
 * @var array $itemIds
 * @var array $price
 * @var array $measureRatio
 * @var bool $haveOffers
 * @var bool $showSubscribe
 * @var array $morePhoto
 * @var bool $showSlider
 * @var bool $itemHasDetailUrl
 * @var string $imgTitle
 * @var string $productTitle
 * @var string $buttonSizeClass
 * @var CatalogSectionComponent $component
 */
?>


<?

if (CModule::IncludeModule("sale")) {

	$dbBasketItems = CSaleBasket::GetList(
		array(
			"NAME" => "ASC",
			"ID" => "ASC"
		),
		array(
			"FUSER_ID" => CSaleBasket::GetBasketUserID(),
			"LID" => SITE_ID,
			"PRODUCT_ID" => $item['ID'], //ID текущего товара
			"ORDER_ID" => "NULL",
			"DELAY" => "N" //Исключая отложенные
		),
		false,
		false,
		array("PRODUCT_ID")
	);
	while ($arItemsBasket = $dbBasketItems->Fetch()) {

		//array_push($itInBasket, $arItemsBasket['PRODUCT_ID']);
		$itInBasket = $arItemsBasket['PRODUCT_ID'];
	}
}


?>


<style>
	.itemsystem {
		background-repeat: no-repeat !important;
		background-position: center !important;
		background-size: contain !important;
	}

	.itemsystem:before {
		content: "";
		display: block;
		padding-top: 100%;
	}

	.namesystem {
		margin-top: 15px;
		text-decoration: dashed !important;
	}

	.system:hover .namesystem {
		margin-top: 15px;

		font-weight: 700;
		font-size: 15px;
		line-height: 20px;
		color: #2f2f2f;
		text-decoration: dashed !important;

	}

	a:hover, a:focus {
		text-decoration: dashed !important;
	}
</style>



<?

if($item[PROPERTIES][torgsist][VALUE][0]){
?>




<a href="<?= $item[DETAIL_PAGE_URL] ?>">
	<div class="system">
		<div class="itemsystem" style="background:url('<?= CFile::GetPath($item[PROPERTIES][Gallery][VALUE][0]) ?>'); width:100%;
	
	
	
	"></div>
		<div class="namesystem"><?= $item[NAME] ?></div>


	</div>
</a>














<?
}else{


?>

























<style>
	.sectionCatalogList-items__item:hover .sectionCatalogList-items-prev {
		display: none !important;

	}


	.pvdiv .sectionCatalogList-items {
		text-align-last: unset !important;
	}

	.product-item-amount-field {
		font-weight: normal !important;

	}

	.product-item-amount-field-btn-plus,
	.product-item-amount-field-btn-minus {
		height: 19px !important;

	}

	.sectionCatalogList-items-control__buy {
		margin-right: 0px !important;
		float: right !important;
	}
</style>


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
		"filter" => array("UF_XML_ID" => $item[PROPERTIES][colorsvariant][VALUE])

	));

	while ($res1 = $result->fetch()) {
		// Выводите что вам надо
		array_push($imgcolors, array("Name" => $res1[UF_NAME], "file" => $res1[UF_FILE]));
	}






	$result = $hlDataClass::getList(array(
		"select" => array("ID", "UF_NAME", "UF_XML_ID", "UF_FILE"), // Поля для выборки
		"order" => array("UF_SORT" => "ASC"),
		"filter" => array("UF_XML_ID" => $item[PROPERTIES][color][VALUE])

	));

	while ($res1 = $result->fetch()) {
		// Выводите что вам надо
		array_push($generalcolors, array("Name" => $res1[UF_NAME]));
	}
}

?>










<span class="product-item-image-slider-slide-container slide" id="<?= $itemIds['PICT_SLIDER'] ?>"></span>

<span id="<?= $itemIds['SECOND_PICT'] ?>" style="display: none;"></span>













<div class="lnr lnr-heart toggleTitle pvbtn  qw22 unvisablebtn" data-title="Избранное" style="
						
					"></div>

<div class="lnr lnr-sort-amount-asc toggleTitle pvbtn pvbtndefault pvbtnclick qw33 unvisablebtn" data-title="Сравнение" style="
						
					"></div>


<div class="sectionCatalogList-items__item-sale">-10 %</div>




<?// Начало верхнего уровня  ?>
<?// ==========================================  ?>


<div class="sectionCatalogList-items-prev info" data-item-id="<?= $item[ID] ?>" data-item-img="<?= CFile::GetPath($item[PROPERTIES][Gallery][VALUE][0]) ?>" data-item-name="<?= $item[NAME] ?>" data-item-article="<?= $item[PROPERTIES][Article][VALUE] ?>" data-item-price="<?= $item[ITEM_PRICES][0][PRICE] ?>">



	<div class="sectionCatalogList-items-prev-smo">

		<div class="lnr lnr-heart toggleTitle pvbtn selectpv sectionCatalogList-items-prev-smo__link" data-title="Избранное"></div>

		<div class="lnr lnr-sort-amount-asc toggleTitle pvbtn comparisonpv sectionCatalogList-items-prev-smo__link" data-title="Сравнение"></div>

	</div>


	<div class="sectionCatalogList-items__item-sale">-10 %</div>

	<? $po = 1; ?>



	<div class="gallerypvcontent" style="position: relative;">

		<div class="tabcellpv btleft kardd1">

			<div class="arrowleftpv lnr lnr-chevron-left" style="opacity: 0.3; <?= ($item[PROPERTIES][Gallery][VALUE][1] ? "" :  "opacity: 0 !important;"); ?>
"></div>
		</div>

		<div class="gallerypv tabcellpv">
			<a class="qqqq" href="<?= $item[DETAIL_PAGE_URL] ?>">
				<div class="scroll">

					<div class="scroll_child" style="transform: translateX(0px);">



						<? foreach ($item[PROPERTIES][Gallery][VALUE] as $imggoods) : ?>

						<div class="elem11 kardd1 " style="background-image:url(<?= CFile::GetPath($imggoods) ?>); /*width:190px;*/"></div>



						<? endforeach; ?>







					</div>

				</div>

			</a>
		</div>



		<div class="tabcellpv btright kardd1">
			<div class="arrowrightpv lnr lnr-chevron-right" style="opacity: 1; <?= ($item[PROPERTIES][Gallery][VALUE][1] ? "" :  "opacity: 0 !important;"); ?>
"></div>
		</div>


		<div class="fastview" style="position: absolute;
    bottom: 0%;
    left: 0px;
    text-align: center;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 40px;
    background: rgba(255,255,255,.5);
    border-top: 1px solid rgba(113,113,113,.5);
    border-bottom: 1px solid rgba(113,113,113,.5);
	font-style: normal !important; 
    font-weight: 300 !important; 
    font-size: 13px !important;
	
	">

			<div onclick="$('.shadow12').css('display','block');$('.cardshow').css('display','block');
BX.ajax.insertToNode('<?= $item[DETAIL_PAGE_URL] ?>?bxajaxid=cardshow1&test=y', 'cardshow2');">
				Быстрый просмотр
			</div>

		</div>

	</div>



	<?// Вставляем новые картинки // ?>
	<?// ============================================== // ?>
















	<div>

		<a href="<?= $item[DETAIL_PAGE_URL] ?>" style="text-decoration: none;">

			<? foreach ($item[PROPERTIES][stiker][VALUE] as $stick) : ?>
			<div class="catalogDetailProdukts-slider-mini-prop__item orange" style="display: inline-block;"><?= $stick; ?></div>

			<? endforeach ?>
		</a>

	</div>



	<div class="sectionCatalogList-items-prev__name"><a href="<?= $item[DETAIL_PAGE_URL] ?>" style="text-decoration: dashed;"><?= $item[NAME] ?></a></div>
	<div class="sectionCatalogList-items-prev-material">








		<?
		foreach ($imgcolors as $imgcol) {
		?>

		<div class="sectionCatalogList-items-prev-material__item toggleTitle" data-title="<?= $imgcol[Name] ?>">
			<a href="<?= $item[DETAIL_PAGE_URL] ?>" style="text-decoration: dashed;">
				<img class="sectionCatalogList-items-prev-material__img" src="<?= CFile::GetPath($imgcol[file]) ?>" alt="" style="width: 40px;height: 40px;">
			</a>
		</div>

		<?
		}
		?>







		<? if (count($imgcolors) > 5) : ?>

		<div class="sectionCatalogList-items-prev-material__item">
			<a class="sectionCatalogList-items-prev-material__more" href="<?= $item[DETAIL_PAGE_URL] ?>">Еще</a>
		</div>

		<? endif; ?>



	</div>

	<a href="<?= $item[DETAIL_PAGE_URL] ?>" style="text-decoration: dashed;">


		<div class="sectionCatalogList-items-prev-prop">
			<div class="sectionCatalogList-items-prev-prop__item">
				<div class="sectionCatalogList-items-prev-prop__name">Артикул</div>
				<div class="sectionCatalogList-items-prev-prop__value"><?= $item[PROPERTIES][Article][VALUE] ?>
				</div>
			</div>



			<div class="sectionCatalogList-items-prev-prop__item">
				<div class="sectionCatalogList-items-prev-prop__name">Материал</div>
				<div class="sectionCatalogList-items-prev-prop__value" style="text-align: right;">
					<? //Список материалов
					$materialall = "";
					foreach ($item[PROPERTIES][material][VALUE] as $material1) {
						$materialall .= $material1 . ", ";
					}
					$materialall  = mb_substr($materialall, 0, -2);
					echo $materialall;
					?>

				</div>
			</div>


			<div class="sectionCatalogList-items-prev-prop__item">
				<div class="sectionCatalogList-items-prev-prop__name">Цвет</div>
				<div class="sectionCatalogList-items-prev-prop__value" style="text-align: right;">



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



			<? $paramcount = 0; ?>



			<? if ($item[PROPERTIES][height][VALUE]) : ?>
			<? $paramcount++; ?>
			<div class="sectionCatalogList-items-prev-prop__item">
				<div class="sectionCatalogList-items-prev-prop__name">Высота, мм</div>
				<div class="sectionCatalogList-items-prev-prop__value"><?= $item[PROPERTIES][height][VALUE] ?></div>
			</div>
			<? endif; ?>


			<? if ($item[PROPERTIES][size][VALUE]) : ?>
			<? $paramcount++; ?>
			<div class="sectionCatalogList-items-prev-prop__item">
				<div class="sectionCatalogList-items-prev-prop__name">Длина, мм</div>
				<div class="sectionCatalogList-items-prev-prop__value"><?= $item[PROPERTIES][size][VALUE] ?></div>
			</div>
			<? endif; ?>


			<? if ($item[PROPERTIES][width][VALUE]) : ?>
			<? $paramcount++; ?>
			<div class="sectionCatalogList-items-prev-prop__item">
				<div class="sectionCatalogList-items-prev-prop__name">Ширина, мм</div>
				<div class="sectionCatalogList-items-prev-prop__value"><?= $item[PROPERTIES][width][VALUE] ?></div>
			</div>
			<? endif; ?>




			<? if ($item[PROPERTIES][deep][VALUE]) : ?>
			<? $paramcount++;
				if ($paramcount < 4) : ?>
			<div class="sectionCatalogList-items-prev-prop__item">
				<div class="sectionCatalogList-items-prev-prop__name">Глубина, мм</div>
				<div class="sectionCatalogList-items-prev-prop__value"><?= $item[PROPERTIES][deep][VALUE] ?></div>
			</div>
			<? endif; ?>
			<? endif; ?>



			<? if ($item[PROPERTIES][diametr][VALUE]) : ?>
			<? $paramcount++;
				if ($paramcount < 4) : ?>
			<div class="sectionCatalogList-items-prev-prop__item">
				<div class="sectionCatalogList-items-prev-prop__name">Диаметр, мм</div>
				<div class="sectionCatalogList-items-prev-prop__value"><?= $item[PROPERTIES][diametr][VALUE] ?></div>
			</div>
			<? endif; ?>
			<? endif; ?>




			<? if ($item[PROPERTIES][sechenie][VALUE]) : ?>
			<? $paramcount++;
				if ($paramcount < 4) : ?>
			<div class="sectionCatalogList-items-prev-prop__item">
				<div class="sectionCatalogList-items-prev-prop__name">Сечение, мм</div>
				<div class="sectionCatalogList-items-prev-prop__value"><?= $item[PROPERTIES][sechenie][VALUE] ?></div>
			</div>
			<? endif; ?>
			<? endif; ?>





		</div>


	</a>



	<? print_r($item[PROPERTIES][VALUE][0]);
	?>

	<div class="sectionCatalogList-items-prev-price">


		<div class="sectionCatalogList-items-prev-price__col one" style="<?= ($item[PROPERTIES][torgoffer][VALUE][0] ? "opacity:1;" : "opacity:0;"); ?>"><a class="sectionCatalogList-items-prev-price__link" href="<?= $item[DETAIL_PAGE_URL] ?>">Другие размеры</a></div>


		<div class="sectionCatalogList-items-prev-price__col two">
			<div class="sectionCatalogList-items-prev-price__new" style="<?= ($price['RATIO_PRICE'] >= $price['RATIO_BASE_PRICE'] ? 'color:#2f2f2f;' : '') ?>">
				<a href="<?= $item[DETAIL_PAGE_URL] ?>" style="text-decoration: none;">
					<?= number_format(ceil($price[PRICE]), 0, ',', ' ') . " руб."; ?>
				</a>

				<? //=$item[ITEM_PRICES][0][PRINT_BASE_PRICE];
				?>


			</div>
			<?
			if ($arParams['SHOW_OLD_PRICE'] === 'Y') {
			?>
			<a href="<?= $item[DETAIL_PAGE_URL] ?>" style="text-decoration: none;">
				<div class="sectionCatalogList-items-prev-price__old" id="<?= $itemIds['PRICE_OLD'] ?>" <?= ($price['RATIO_PRICE'] >= $price['RATIO_BASE_PRICE'] ? 'style="display: none;"' : '') ?>>
					<?= $price['PRINT_RATIO_BASE_PRICE'] ?>



				</div>
			</a>

			<?
			} else { ?>
			<a href="<?= $item[DETAIL_PAGE_URL] ?>" style="text-decoration: none;">
				<div style="font-style: normal;font-weight: 300;font-size: 12px;line-height: 16px;"> </div>
			</a>

			<?
			}
			?>


		</div>
	</div>





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




		<div class="sectionCatalogList-items-prev-control__col two">
			<button class="sectionCatalogList-items-prev-price__buy black popupAddBasket__open buy-but1" data-msg-ok="Купить" href="javascript:void(0)" data-value="<?= $item[ID]; ?>" style="<?= $itInBasket ? "background: #2f2f2f !important;" : "background: #ff4500 !important;"; ?>">


				<?= $itInBasket ? "Добавлено" : "Купить"; ?>



			</button>
		</div>



	</div>
</div>


<?// Конец верхнего уровня // ?>
<?// ========================================== // ?>






<div class="mobiver mobivers">


	<div class="gallerypvcontent" style="position: relative;">

		<div class="tabcellpv btleft kardd1 mobivers">

			<div class="arrowleftpv lnr lnr-chevron-left" style="opacity: 1; <?= ($item[PROPERTIES][Gallery][VALUE][1] ? "" :  "opacity: 0 !important;"); ?>
"></div>
		</div>


		<div class="gallerypv tabcellpv">
			<div class="qqqq99">

				<div class="ggghhh">
					<div class="ggghhh1">
					</div>
				</div>



				<div class="scroll">
					<div class="scroll_child mobivers" style="transform: translateX(0px);">



						<? foreach ($item[PROPERTIES][Gallery][VALUE] as $imggoods) : ?>

						<div class="elem11 kardd1 mobivers" style="background-image:url(<?= CFile::GetPath($imggoods) ?>); /*width:190px;*/"></div>



						<? endforeach; ?>







					</div>

				</div>

			</div>
		</div>

		<div class="tabcellpv btright kardd1 mobivers">
			<div class="arrowrightpv lnr lnr-chevron-right" style="opacity: 1; <?= ($item[PROPERTIES][Gallery][VALUE][1] ? "" :  "opacity: 0 !important;"); ?>
"></div>
		</div>




	</div>


</div>







<div class="pcver">


	<div class="sectionCatalogList-items__pic">

		<div class="sectionCatalogList-items__img img_kard" style="background-image: url(<?= CFile::GetPath($item[PROPERTIES][Gallery][VALUE][0]) ?>);"></div>

	</div>
</div>














<div class="catalogDetailProdukts-slider-mini-prop catalogSectionPropHeight">





	<? foreach ($item[PROPERTIES][stiker][VALUE] as $stick) : ?>
	<div class="catalogDetailProdukts-slider-mini-prop__item orange"><?= $stick; ?></div>

	<? endforeach ?>







</div>



<a class="sectionCatalogList-items__name" href="<?= $item['DETAIL_PAGE_URL'] ?>"><?= $item[NAME] ?></a>




<a href="<?= $item[DETAIL_PAGE_URL] ?>" style="text-decoration: dashed;">


	<div class="sectionCatalogList-items-prop">
		<div class="sectionCatalogList-items-prop__item">
			<div class="sectionCatalogList-items-prop__name">Артикул</div>
			<div class="sectionCatalogList-items-prop__value"><?= $item[PROPERTIES][Article][VALUE] ?></div>
		</div>
		<div class="sectionCatalogList-items-prop__item">
			<div class="sectionCatalogList-items-prop__name">Материал</div>
			<div class="sectionCatalogList-items-prop__value" style="text-align: right;">


				<? //Список материалов
				$materialall = "";
				foreach ($item[PROPERTIES][material][VALUE] as $material1) {
					$materialall .= $material1 . ", ";
				}
				$materialall  = mb_substr($materialall, 0, -2);
				echo $materialall;
				?>




			</div>
		</div>
		<div class="sectionCatalogList-items-prop__item">
			<div class="sectionCatalogList-items-prop__name">Цвет</div>
			<div class="sectionCatalogList-items-prop__value" style="text-align: right;">

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





		<? if ($item[PROPERTIES][height][VALUE]) : ?>
		<? $paramcount++; ?>
		<div class="sectionCatalogList-items-prop__item haract">
			<div class="sectionCatalogList-items-prop__name">Высота, мм</div>
			<div class="sectionCatalogList-items-prop__value"><?= $item[PROPERTIES][height][VALUE] ?></div>
		</div>
		<? endif; ?>


		<? if ($item[PROPERTIES][size][VALUE]) : ?>
		<? $paramcount++; ?>
		<div class="sectionCatalogList-items-prop__item haract">
			<div class="sectionCatalogList-items-prop__name">Длина, мм</div>
			<div class="sectionCatalogList-items-prop__value"><?= $item[PROPERTIES][size][VALUE] ?></div>
		</div>
		<? endif; ?>


		<? if ($item[PROPERTIES][width][VALUE]) : ?>
		<? $paramcount++; ?>
		<div class="sectionCatalogList-items-prop__item haract">
			<div class="sectionCatalogList-items-prop__name">Ширина, мм</div>
			<div class="sectionCatalogList-items-prop__value"><?= $item[PROPERTIES][width][VALUE] ?></div>
		</div>
		<? endif; ?>




		<? if ($item[PROPERTIES][deep][VALUE]) : ?>
		<? $paramcount++;
			if ($paramcount < 4) : ?>
		<div class="sectionCatalogList-items-prop__item haract">
			<div class="sectionCatalogList-items-prop__name">Глубина, мм</div>
			<div class="sectionCatalogList-items-prop__value"><?= $item[PROPERTIES][deep][VALUE] ?></div>
		</div>
		<? endif; ?>
		<? endif; ?>



		<? if ($item[PROPERTIES][diametr][VALUE]) : ?>
		<? $paramcount++;
			if ($paramcount < 4) : ?>
		<div class="sectionCatalogList-items-prop__item haract">
			<div class="sectionCatalogList-items-prop__name">Диаметр, мм</div>
			<div class="sectionCatalogList-items-prop__value"><?= $item[PROPERTIES][diametr][VALUE] ?></div>
		</div>
		<? endif; ?>
		<? endif; ?>




		<? if ($item[PROPERTIES][sechenie][VALUE]) : ?>
		<? $paramcount++;
			if ($paramcount < 4) : ?>
		<div class="sectionCatalogList-items-prop__item haract">
			<div class="sectionCatalogList-items-prop__name">Сечение, мм</div>
			<div class="sectionCatalogList-items-prop__value"><?= $item[PROPERTIES][sechenie][VALUE] ?></div>
		</div>
		<? endif; ?>
		<? endif; ?>

































	</div>



</a>



<?// Вывод Цены  ?>

<a href="<?= $item[DETAIL_PAGE_URL] ?>" style="text-decoration: dashed;">

	<div class="sectionCatalogList-items-price" data-entity="price-block">


		<? if ($imgcolors[0]) { ?>



		<div class="othersizecolor">+другие цвета<br> +другие размеры</div>

		<? } ?>




		<div class="sectionCatalogList-items-price__new" style="text-align-last: right;
							<?= ($price['RATIO_PRICE'] >= $price['RATIO_BASE_PRICE'] ? 'color:#2f2f2f;' : '') ?>
							
							" id="<?= $itemIds['PRICE'] ?>">



			<?
			if (!empty($price)) {
				if ($arParams['PRODUCT_DISPLAY_MODE'] === 'N' && $haveOffers) {


					echo Loc::getMessage(
						'CT_BCI_TPL_MESS_PRICE_SIMPLE_MODE',
						array(
							'#PRICE#' => $price['PRINT_RATIO_PRICE'],
							'#VALUE#' => $measureRatio,
							'#UNIT#' => $minOffer['ITEM_MEASURE']['TITLE']
						)
					);
				} else {


					echo number_format(ceil($price[PRICE]), 0, ',', ' ') . " руб.";
				}
			}
			?>

		</div>





		<?
		if ($arParams['SHOW_OLD_PRICE'] === 'Y') {
		?>

		<div class="sectionCatalogList-items-price__old" style="text-align-last: right;" id="<?= $itemIds['PRICE_OLD'] ?>">

			<?= ($price['RATIO_PRICE'] < $price['RATIO_BASE_PRICE'] ? $price['PRINT_RATIO_BASE_PRICE'] : '') ?>
		</div>




		<?
		}
		?>











	</div>

</a>






<div class="sectionCatalogList-items-control">








	<?// Кнопки штуки ?>



	<?
	if ($actualItem['CAN_BUY'] && $arParams['USE_PRODUCT_QUANTITY']) {
	?>
	<div class="product-item-info-container product-item-hidden" data-entity="quantity-block">
		<div class="product-item-amount">
			<div class="product-item-amount-field-container">

				<span class="product-item-amount-field-btn-minus no-select" id="<?= $itemIds['QUANTITY_DOWN'] ?>" style="background-color: unset;">-</span>

				<input class="product-item-amount-field" id="<?= $itemIds['QUANTITY'] ?>" type="number" name="<?= $arParams['PRODUCT_QUANTITY_VARIABLE'] ?>" value="<?= $measureRatio ?>">


				<span class="product-item-amount-field-btn-plus no-select" id="<?= $itemIds['QUANTITY_UP'] ?>" style="background-color: unset;">+</span>


			</div>
		</div>
	</div>
	<?
	}
	?>








	<div class="sectionCatalogList-items-control__col two" id="<?= $itemIds['BASKET_ACTIONS'] ?>">
		<button class="sectionCatalogList-items-control__buy black buy-but1" data-msg-ok="Купить" href="javascript:void(0)" data-value="<?= $item[ID]; ?>" style="<?= $itInBasket ? "background: #2f2f2f !important; color:white;" : ""; ?>">


			<?= $itInBasket ? "Добавлено" : "Купить"; ?>




		</button>
	</div>




	<script>
		var str = "<?= $arParams['~ADD_URL_TEMPLATE'] ?>";
	</script>






</div>



<span class="product-item-amount-description-container">

	<span class="countadd" style="display:none;"><span>


			<span id="<?= $itemIds['QUANTITY_MEASURE'] ?>">
				<?= $actualItem['ITEM_MEASURE']['TITLE'] ?>
			</span>
			<span id="<?= $itemIds['PRICE_TOTAL'] ?>"></span>
		</span>








		<?
}
?>














































































		<? // Тестирую с самым малень текстом 
		?>



		<?/*


<div class="tovar">

	<?= $productTitle ?><br>








		<?// Кнопки купить 2 ?>
		<div class="product-item-button-container" id="<?= $itemIds['BASKET_ACTIONS'] ?>">
			<button class="btn btn-primary <?= $buttonSizeClass ?>" id="<?= $itemIds['BUY_LINK'] ?>" href="javascript:void(0)" rel="nofollow">
				<?= ($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET']) ?>
			</button>
		</div>














		<?//  Вывод Цены ?>

		<div class="product-item-info-container product-item-price-container" data-entity="price-block">
			<?
						if ($arParams['SHOW_OLD_PRICE'] === 'Y')
						{
							?>
			Старая цена<br><span class="product-item-price-old" id="<?= $itemIds['PRICE_OLD'] ?>" <?= ($price['RATIO_PRICE'] >= $price['RATIO_BASE_PRICE'] ? 'style="display: none;"' : '') ?>>
				<?= $price['PRINT_RATIO_BASE_PRICE'] ?>
			</span>&nbsp;
			<?
						}
						?>
			Новая цена<br><span class="product-item-price-current" id="<?= $itemIds['PRICE'] ?>">
				<?
							if (!empty($price))
							{
								if ($arParams['PRODUCT_DISPLAY_MODE'] === 'N' && $haveOffers)
								{
									echo Loc::getMessage(
										'CT_BCI_TPL_MESS_PRICE_SIMPLE_MODE',
										array(
											'#PRICE#' => $price['PRINT_RATIO_PRICE'],
											'#VALUE#' => $measureRatio,
											'#UNIT#' => $minOffer['ITEM_MEASURE']['TITLE']
										)
									);
								}
								else
								{
									echo $price['PRINT_RATIO_PRICE'];
								}
							}
							?>
			</span>
		</div>












		<?//  Кнопки штуки ?>
		<?
	
	
	if ($actualItem['CAN_BUY'] && $arParams['USE_PRODUCT_QUANTITY'])
						{
							?>
		<div class="product-item-info-container product-item-hidden" data-entity="quantity-block">
			<div class="product-item-amount">
				<div class="product-item-amount-field-container">
					<span class="product-item-amount-field-btn-minus no-select" id="<?= $itemIds['QUANTITY_DOWN'] ?>"></span>
					<input class="product-item-amount-field" id="<?= $itemIds['QUANTITY'] ?>" type="number" name="<?= $arParams['PRODUCT_QUANTITY_VARIABLE'] ?>" value="<?= $measureRatio ?>">
					<span class="product-item-amount-field-btn-plus no-select" id="<?= $itemIds['QUANTITY_UP'] ?>"></span>
					<span class="product-item-amount-description-container">
						<span id="<?= $itemIds['QUANTITY_MEASURE'] ?>">
							<?= $actualItem['ITEM_MEASURE']['TITLE'] ?>
						</span>
						<span id="<?= $itemIds['PRICE_TOTAL'] ?>"></span>
					</span>
				</div>
			</div>
		</div>
		<?
						}
	
	
	?>







		</div>



		*/ ?>











































		<?/*

<br><br>
Вывод Параметров:

<br><br>
<?= $item[NAME] ?><br>
		<?= $item[PROPERTIES][Article][VALUE] ?><br>
		<?= $item[PROPERTIES][material][VALUE] ?><br>
		<?= $item[PROPERTIES][color][VALUE] ?><br>
		<?= $item[PROPERTIES][width][VALUE] ?><br>
		<?= $item[PROPERTIES][height][VALUE] ?><br>
		<?= $item[PROPERTIES][deep][VALUE] ?><br>

		<br><br>

		*/ ?>

		<?/*
<?= CFile::GetPath($item[PROPERTIES][Gallery][VALUE][0]) ?><br>
		*/ ?>




		<?/* print_r($item); */ ?>







		<?/*


					
					<div class="lnr lnr-heart toggleTitle pvbtn  qw22 unvisablebtn" data-title="Избранное" style="
						
					"></div>
					
					<div class="lnr lnr-sort-amount-asc toggleTitle pvbtn pvbtndefault pvbtnclick qw33 unvisablebtn" data-title="Сравнение"  style="
						
					"></div>
					
					
                      <div class="sectionCatalogList-items__item-sale">-10 %</div>
                      <div class="sectionCatalogList-items-prev">
					  
					
					  
                        <div class="sectionCatalogList-items-prev-smo">
						
                            <div class="lnr lnr-heart toggleTitle pvbtn selectpv sectionCatalogList-items-prev-smo__link" data-title="Избранное"></div>
							
                            <div class="lnr lnr-sort-amount-asc toggleTitle pvbtn comparisonpv sectionCatalogList-items-prev-smo__link" data-title="Сравнение"></div>
							
						</div>	
						
						
                        <div class="sectionCatalogList-items__item-sale">-10 %</div>
						
							
                        <div class="sectionCatalogList-items-prev-slider">
						
                          <div class="sectionCatalogList-items-prev-slider__item">
                            <div class="sectionCatalogList-items-prev-slider__pic"><img class="sectionCatalogList-items-prev-slider__img" src="/assest/img/imgelem1.png" alt=""></div><a class="sectionCatalogList-items-prev-fast-see fastSeeShow" href="#">Быстрый просмотр</a>
                          </div>
                          <div class="sectionCatalogList-items-prev-slider__item">
                            <div class="sectionCatalogList-items-prev-slider__pic"><img class="sectionCatalogList-items-prev-slider__img" src="/assest/img/imgelem1.png" alt=""></div><a class="sectionCatalogList-items-prev-fast-see fastSeeShow" href="#">Быстрый просмотр</a>
                          </div>
                          <div class="sectionCatalogList-items-prev-slider__item">
                            <div class="sectionCatalogList-items-prev-slider__pic"><img class="sectionCatalogList-items-prev-slider__img" src="/assest/img/imgelem1.png" alt=""></div><a class="sectionCatalogList-items-prev-fast-see fastSeeShow" href="#">Быстрый просмотр</a>
                          </div>
                        </div>
                        <div class="sectionCatalogList-items-prev__name"><?= $item[NAME] ?>
		</div>
		<div class="sectionCatalogList-items-prev-material">
			<div class="sectionCatalogList-items-prev-material__item toggleTitle" data-title="Цвет 2"><img class="sectionCatalogList-items-prev-material__img" src="assets/img/page/catalog_sections/material-2.png" alt=""></div>
			<div class="sectionCatalogList-items-prev-material__item toggleTitle" data-title="Цвет 2"><img class="sectionCatalogList-items-prev-material__img" src="assets/img/page/catalog_sections/material-2.png" alt=""></div>
			<div class="sectionCatalogList-items-prev-material__item toggleTitle" data-title="Цвет 3"><img class="sectionCatalogList-items-prev-material__img" src="assets/img/page/catalog_sections/material-3.png" alt=""></div>
			<div class="sectionCatalogList-items-prev-material__item toggleTitle" data-title="Цвет 4"><img class="sectionCatalogList-items-prev-material__img" src="assets/img/page/catalog_sections/material-4.png" alt=""></div>
			<div class="sectionCatalogList-items-prev-material__item toggleTitle" data-title="Цвет 5"><img class="sectionCatalogList-items-prev-material__img" src="assets/img/page/catalog_sections/material-5.png" alt=""></div>
			<div class="sectionCatalogList-items-prev-material__item"><a class="sectionCatalogList-items-prev-material__more" href="#">Еще</a></div>
		</div>
		<div class="sectionCatalogList-items-prev-prop">
			<div class="sectionCatalogList-items-prev-prop__item">
				<div class="sectionCatalogList-items-prev-prop__name">Артикул</div>
				<div class="sectionCatalogList-items-prev-prop__value"><?= $item[PROPERTIES][Article][VALUE] ?>
				</div>
			</div>
			<div class="sectionCatalogList-items-prev-prop__item">
				<div class="sectionCatalogList-items-prev-prop__name">Материал</div>
				<div class="sectionCatalogList-items-prev-prop__value">
					<?= $item[PROPERTIES][material][VALUE] ?></div>
			</div>
			<div class="sectionCatalogList-items-prev-prop__item">
				<div class="sectionCatalogList-items-prev-prop__name">Цвет</div>
				<div class="sectionCatalogList-items-prev-prop__value"><?= $item[PROPERTIES][color][VALUE] ?></div>
			</div>
			<div class="sectionCatalogList-items-prev-prop__item">
				<div class="sectionCatalogList-items-prev-prop__name">Ширина, мм</div>
				<div class="sectionCatalogList-items-prev-prop__value"><?= $item[PROPERTIES][width][VALUE] ?></div>
			</div>
			<div class="sectionCatalogList-items-prev-prop__item">
				<div class="sectionCatalogList-items-prev-prop__name">Глубина, мм</div>
				<div class="sectionCatalogList-items-prev-prop__value">
					<?= $item[PROPERTIES][deep][VALUE] ?></div>
			</div>
			<div class="sectionCatalogList-items-prev-prop__item">
				<div class="sectionCatalogList-items-prev-prop__name">Высота, мм</div>
				<div class="sectionCatalogList-items-prev-prop__value"><?= $item[PROPERTIES][height][VALUE] ?></div>
			</div>
		</div>
		<div class="sectionCatalogList-items-prev-price">
			<div class="sectionCatalogList-items-prev-price__col one"><a class="sectionCatalogList-items-prev-price__link" href="#">Другие размеры</a></div>
			<div class="sectionCatalogList-items-prev-price__col two">
				<div class="sectionCatalogList-items-prev-price__new"><?= $item[ITEM_PRICES][0][PRICE] ?> руб.</div>
				<div class="sectionCatalogList-items-prev-price__old">17 250 руб.</div>
			</div>
		</div>
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
			<div class="sectionCatalogList-items-prev-control__col two">
				<button class="sectionCatalogList-items-prev-price__buy black popupAddBasket__open" data-msg-ok="Добавлено">Добавлено</button>
			</div>
		</div>
		</div>










		<div class="sectionCatalogList-items__pic"><img class="sectionCatalogList-items__img" src="<?= CFile::GetPath($item[PROPERTIES][Gallery][VALUE][0]) ?>" alt=""></div>
		<div class="catalogDetailProdukts-slider-mini-prop catalogSectionPropHeight">
		</div><a class="sectionCatalogList-items__name" href="#"><?= $item[NAME] ?></a>
		<div class="sectionCatalogList-items-prop">
			<div class="sectionCatalogList-items-prop__item">
				<div class="sectionCatalogList-items-prop__name">Артикул</div>
				<div class="sectionCatalogList-items-prop__value"><?= $item[PROPERTIES][Article][VALUE] ?></div>
			</div>
			<div class="sectionCatalogList-items-prop__item">
				<div class="sectionCatalogList-items-prop__name">Материал</div>
				<div class="sectionCatalogList-items-prop__value"><?= $item[PROPERTIES][material][VALUE] ?></div>
			</div>
			<div class="sectionCatalogList-items-prop__item">
				<div class="sectionCatalogList-items-prop__name">Цвет</div>
				<div class="sectionCatalogList-items-prop__value"><?= $item[PROPERTIES][color][VALUE] ?></div>
			</div>
			<div class="sectionCatalogList-items-prop__item">
				<div class="sectionCatalogList-items-prop__name">Ширина, мм</div>
				<div class="sectionCatalogList-items-prop__value"><?= $item[PROPERTIES][width][VALUE] ?></div>
			</div>
			<div class="sectionCatalogList-items-prop__item">
				<div class="sectionCatalogList-items-prop__name">Глубина, мм</div>
				<div class="sectionCatalogList-items-prop__value"><?= $item[PROPERTIES][deep][VALUE] ?></div>
			</div>
			<div class="sectionCatalogList-items-prop__item">
				<div class="sectionCatalogList-items-prop__name">Высота, мм</div>
				<div class="sectionCatalogList-items-prop__value"><?= $item[PROPERTIES][height][VALUE] ?></div>
			</div>
		</div>
		<div class="sectionCatalogList-items-price">
			<div class="sectionCatalogList-items-price__new"><?= $item[ITEM_PRICES][0][PRICE] ?> руб.</div>
			<div class="sectionCatalogList-items-price__old">17 250 руб.</div>
		</div>
		<div class="sectionCatalogList-items-control">
			<div class="sectionCatalogList-items-control__col one">
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
			<div class="sectionCatalogList-items-control__col two">
				<button class="sectionCatalogList-items-control__buy black" data-msg-ok="Добавлено">Добавлено</button>
			</div>
		</div>




		*/ ?>



		<?/*


					
					<div class="lnr lnr-heart toggleTitle pvbtn  qw22 unvisablebtn" data-title="Избранное" style="
						
					"></div>
					
					<div class="lnr lnr-sort-amount-asc toggleTitle pvbtn pvbtndefault pvbtnclick qw33 unvisablebtn" data-title="Сравнение"  style="
						
					"></div>
					
					
                      <div class="sectionCatalogList-items__item-sale">-10 %</div>
                      <div class="sectionCatalogList-items-prev">
					  
					
					  
                        <div class="sectionCatalogList-items-prev-smo">
						
                            <div class="lnr lnr-heart toggleTitle pvbtn selectpv sectionCatalogList-items-prev-smo__link" data-title="Избранное"></div>
							
                            <div class="lnr lnr-sort-amount-asc toggleTitle pvbtn comparisonpv sectionCatalogList-items-prev-smo__link" data-title="Сравнение"></div>
							
						</div>	
						
						
                        <div class="sectionCatalogList-items__item-sale">-10 %</div>
						
							
                        <div class="sectionCatalogList-items-prev-slider">
						
                          <div class="sectionCatalogList-items-prev-slider__item">
                            <div class="sectionCatalogList-items-prev-slider__pic"><img class="sectionCatalogList-items-prev-slider__img" src="/assest/img/imgelem1.png" alt=""></div><a class="sectionCatalogList-items-prev-fast-see fastSeeShow" href="#">Быстрый просмотр</a>
                          </div>
                          <div class="sectionCatalogList-items-prev-slider__item">
                            <div class="sectionCatalogList-items-prev-slider__pic"><img class="sectionCatalogList-items-prev-slider__img" src="/assest/img/imgelem1.png" alt=""></div><a class="sectionCatalogList-items-prev-fast-see fastSeeShow" href="#">Быстрый просмотр</a>
                          </div>
                          <div class="sectionCatalogList-items-prev-slider__item">
                            <div class="sectionCatalogList-items-prev-slider__pic"><img class="sectionCatalogList-items-prev-slider__img" src="/assest/img/imgelem1.png" alt=""></div><a class="sectionCatalogList-items-prev-fast-see fastSeeShow" href="#">Быстрый просмотр</a>
                          </div>
                        </div>
                        <div class="sectionCatalogList-items-prev__name"><?= $item[NAME] ?>
		</div>
		<div class="sectionCatalogList-items-prev-material">
			<div class="sectionCatalogList-items-prev-material__item toggleTitle" data-title="Цвет 2"><img class="sectionCatalogList-items-prev-material__img" src="assets/img/page/catalog_sections/material-2.png" alt=""></div>
			<div class="sectionCatalogList-items-prev-material__item toggleTitle" data-title="Цвет 2"><img class="sectionCatalogList-items-prev-material__img" src="assets/img/page/catalog_sections/material-2.png" alt=""></div>
			<div class="sectionCatalogList-items-prev-material__item toggleTitle" data-title="Цвет 3"><img class="sectionCatalogList-items-prev-material__img" src="assets/img/page/catalog_sections/material-3.png" alt=""></div>
			<div class="sectionCatalogList-items-prev-material__item toggleTitle" data-title="Цвет 4"><img class="sectionCatalogList-items-prev-material__img" src="assets/img/page/catalog_sections/material-4.png" alt=""></div>
			<div class="sectionCatalogList-items-prev-material__item toggleTitle" data-title="Цвет 5"><img class="sectionCatalogList-items-prev-material__img" src="assets/img/page/catalog_sections/material-5.png" alt=""></div>
			<div class="sectionCatalogList-items-prev-material__item"><a class="sectionCatalogList-items-prev-material__more" href="#">Еще</a></div>
		</div>
		<div class="sectionCatalogList-items-prev-prop">
			<div class="sectionCatalogList-items-prev-prop__item">
				<div class="sectionCatalogList-items-prev-prop__name">Артикул</div>
				<div class="sectionCatalogList-items-prev-prop__value"><?= $item[PROPERTIES][Article][VALUE] ?>
				</div>
			</div>
			<div class="sectionCatalogList-items-prev-prop__item">
				<div class="sectionCatalogList-items-prev-prop__name">Материал</div>
				<div class="sectionCatalogList-items-prev-prop__value">
					<?= $item[PROPERTIES][material][VALUE] ?></div>
			</div>
			<div class="sectionCatalogList-items-prev-prop__item">
				<div class="sectionCatalogList-items-prev-prop__name">Цвет</div>
				<div class="sectionCatalogList-items-prev-prop__value"><?= $item[PROPERTIES][color][VALUE] ?></div>
			</div>
			<div class="sectionCatalogList-items-prev-prop__item">
				<div class="sectionCatalogList-items-prev-prop__name">Ширина, мм</div>
				<div class="sectionCatalogList-items-prev-prop__value"><?= $item[PROPERTIES][width][VALUE] ?></div>
			</div>
			<div class="sectionCatalogList-items-prev-prop__item">
				<div class="sectionCatalogList-items-prev-prop__name">Глубина, мм</div>
				<div class="sectionCatalogList-items-prev-prop__value">
					<?= $item[PROPERTIES][deep][VALUE] ?></div>
			</div>
			<div class="sectionCatalogList-items-prev-prop__item">
				<div class="sectionCatalogList-items-prev-prop__name">Высота, мм</div>
				<div class="sectionCatalogList-items-prev-prop__value"><?= $item[PROPERTIES][height][VALUE] ?></div>
			</div>
		</div>
		<div class="sectionCatalogList-items-prev-price">
			<div class="sectionCatalogList-items-prev-price__col one"><a class="sectionCatalogList-items-prev-price__link" href="#">Другие размеры</a></div>
			<div class="sectionCatalogList-items-prev-price__col two">
				<div class="sectionCatalogList-items-prev-price__new"><?= $item[ITEM_PRICES][0][PRICE] ?> руб.</div>
				<div class="sectionCatalogList-items-prev-price__old">17 250 руб.</div>
			</div>
		</div>
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
			<div class="sectionCatalogList-items-prev-control__col two">
				<button class="sectionCatalogList-items-prev-price__buy black popupAddBasket__open" data-msg-ok="Добавлено">Добавлено</button>
			</div>
		</div>
		</div>










		<div class="sectionCatalogList-items__pic"><img class="sectionCatalogList-items__img" src="<?= CFile::GetPath($item[PROPERTIES][Gallery][VALUE][0]) ?>" alt=""></div>
		<div class="catalogDetailProdukts-slider-mini-prop catalogSectionPropHeight">
		</div><a class="sectionCatalogList-items__name" href="#"><?= $item[NAME] ?></a>
		<div class="sectionCatalogList-items-prop">
			<div class="sectionCatalogList-items-prop__item">
				<div class="sectionCatalogList-items-prop__name">Артикул</div>
				<div class="sectionCatalogList-items-prop__value"><?= $item[PROPERTIES][Article][VALUE] ?></div>
			</div>
			<div class="sectionCatalogList-items-prop__item">
				<div class="sectionCatalogList-items-prop__name">Материал</div>
				<div class="sectionCatalogList-items-prop__value"><?= $item[PROPERTIES][material][VALUE] ?></div>
			</div>
			<div class="sectionCatalogList-items-prop__item">
				<div class="sectionCatalogList-items-prop__name">Цвет</div>
				<div class="sectionCatalogList-items-prop__value"><?= $item[PROPERTIES][color][VALUE] ?></div>
			</div>
			<div class="sectionCatalogList-items-prop__item">
				<div class="sectionCatalogList-items-prop__name">Ширина, мм</div>
				<div class="sectionCatalogList-items-prop__value"><?= $item[PROPERTIES][width][VALUE] ?></div>
			</div>
			<div class="sectionCatalogList-items-prop__item">
				<div class="sectionCatalogList-items-prop__name">Глубина, мм</div>
				<div class="sectionCatalogList-items-prop__value"><?= $item[PROPERTIES][deep][VALUE] ?></div>
			</div>
			<div class="sectionCatalogList-items-prop__item">
				<div class="sectionCatalogList-items-prop__name">Высота, мм</div>
				<div class="sectionCatalogList-items-prop__value"><?= $item[PROPERTIES][height][VALUE] ?></div>
			</div>
		</div>


		<?/* Вывод Цены */ ?>
		<?/*
						<div class="sectionCatalogList-items-price" data-entity="price-block">
							<?
							if ($arParams['SHOW_OLD_PRICE'] === 'Y')
							{
								?>

		<div class="sectionCatalogList-items-price__old" id="<?= $itemIds['PRICE_OLD'] ?>" <?= ($price['RATIO_PRICE'] >= $price['RATIO_BASE_PRICE'] ? 'style="display: none;"' : '') ?>>
			<?= $price['PRINT_RATIO_BASE_PRICE'] ?>
		</div>

		<?
							}
							?>

		<div class="sectionCatalogList-items-price__new" id="<?= $itemIds['PRICE'] ?>">

			<?
								if (!empty($price))
								{
									if ($arParams['PRODUCT_DISPLAY_MODE'] === 'N' && $haveOffers)
									{
										echo Loc::getMessage(
											'CT_BCI_TPL_MESS_PRICE_SIMPLE_MODE',
											array(
												'#PRICE#' => $price['PRINT_RATIO_PRICE'],
												'#VALUE#' => $measureRatio,
												'#UNIT#' => $minOffer['ITEM_MEASURE']['TITLE']
											)
										);
									}
									else
									{
										echo $price['PRINT_RATIO_PRICE'];
									}
								}
								?>

		</div>
		</div>


























		<div class="sectionCatalogList-items-control">


			<?/*
						<div class="sectionCatalogList-items-control__col one">
                          <div class="sectionCatalogList-items-count">
						  
						  
						  
                            <div class="sectionCatalogList-items-count__col">
                              
							  <button class="sectionCatalogList-items-count__btn minus"  id="<?= $itemIds['QUANTITY_DOWN'] ?>">-</button>

		</div>


		<div class="sectionCatalogList-items-count__col">
			<div class="sectionCatalogList-items-count__input">

				<input class="sectionCatalogList-items-count__input-text product-item-amount-field" id="<?= $itemIds['QUANTITY'] ?>" type="number" name="<?= $arParams['PRODUCT_QUANTITY_VARIABLE'] ?>" value="<?= $measureRatio ?>">

			</div>
		</div>

		<div class="sectionCatalogList-items-count__col">

			<button class="sectionCatalogList-items-count__btn plus" id="<?= $itemIds['QUANTITY_UP'] ?>">+</button>

		</div>


		<span class="product-item-amount-description-container">
			<span id="<?= $itemIds['QUANTITY_MEASURE'] ?>">
				<?= $actualItem['ITEM_MEASURE']['TITLE'] ?>
			</span>
			<span id="<?= $itemIds['PRICE_TOTAL'] ?>"></span>
		</span>





		</div>
		</div>
		*/ ?>







		<?/* Кнопки штуки */ ?>

		<?/*
						
						<?
						if ($actualItem['CAN_BUY'] && $arParams['USE_PRODUCT_QUANTITY'])
							{
								?>
		<div class="product-item-info-container product-item-hidden" data-entity="quantity-block">
			<div class="product-item-amount">
				<div class="product-item-amount-field-container">

					<span class="product-item-amount-field-btn-minus no-select" id="<?= $itemIds['QUANTITY_DOWN'] ?>"></span>

					<input class="product-item-amount-field" id="<?= $itemIds['QUANTITY'] ?>" type="number" name="<?= $arParams['PRODUCT_QUANTITY_VARIABLE'] ?>" value="<?= $measureRatio ?>">


					<span class="product-item-amount-field-btn-plus no-select" id="<?= $itemIds['QUANTITY_UP'] ?>"></span>

					<span class="product-item-amount-description-container">
						<span id="<?= $itemIds['QUANTITY_MEASURE'] ?>">
							<?= $actualItem['ITEM_MEASURE']['TITLE'] ?>
						</span>
						<span id="<?= $itemIds['PRICE_TOTAL'] ?>"></span>
					</span>


				</div>
			</div>
		</div>
		<?
							}
						?>
















		<?/* Кнопки купить 2 */ ?>
		<?/*
                       <div class="sectionCatalogList-items-control__col two" id="<?= $itemIds['BASKET_ACTIONS'] ?>">
		<button class="sectionCatalogList-items-control__buy black" data-msg-ok="Добавлено" id="<?= $itemIds['BUY_LINK'] ?>" href="javascript:void(0)" rel="nofollow">

			<?= ($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET']) ?>


		</button>
		</div>





		<?/* Кнопки купить 2 */ ?>

		<?/*
						<div class="product-item-button-container" id="<?= $itemIds['BASKET_ACTIONS'] ?>">
		<button class="btn btn-primary <?= $buttonSizeClass ?>" id="<?= $itemIds['BUY_LINK'] ?>" href="javascript:void(0)" rel="nofollow">
			<?= ($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET']) ?>
		</button>
		</div>
		*/ ?>


		<?/*
					
						
						
						
                    </div>
	
















































<br><br><br>









<?// Тестирую с самым малень текстом ?>



		<div class="tovar">

			<?= $productTitle ?><br>









			<?// Кнопки купить 2 ?>
			<div class="product-item-button-container" id="<?= $itemIds['BASKET_ACTIONS'] ?>">
				<button class="btn btn-primary <?= $buttonSizeClass ?>" id="<?= $itemIds['BUY_LINK'] ?>" href="javascript:void(0)" rel="nofollow">
					<?= ($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET']) ?>
				</button>
			</div>















			<?//  Вывод Цены ?>

			<div class="product-item-info-container product-item-price-container" data-entity="price-block">
				<?
						if ($arParams['SHOW_OLD_PRICE'] === 'Y')
						{
							?>
				Старая цена<br><span class="product-item-price-old" id="<?= $itemIds['PRICE_OLD'] ?>" <?= ($price['RATIO_PRICE'] >= $price['RATIO_BASE_PRICE'] ? 'style="display: none;"' : '') ?>>
					<?= $price['PRINT_RATIO_BASE_PRICE'] ?>
				</span>&nbsp;
				<?
						}
						?>
				Новая цена<br><span class="product-item-price-current" id="<?= $itemIds['PRICE'] ?>">
					<?
							if (!empty($price))
							{
								if ($arParams['PRODUCT_DISPLAY_MODE'] === 'N' && $haveOffers)
								{
									echo Loc::getMessage(
										'CT_BCI_TPL_MESS_PRICE_SIMPLE_MODE',
										array(
											'#PRICE#' => $price['PRINT_RATIO_PRICE'],
											'#VALUE#' => $measureRatio,
											'#UNIT#' => $minOffer['ITEM_MEASURE']['TITLE']
										)
									);
								}
								else
								{
									echo $price['PRINT_RATIO_PRICE'];
								}
							}
							?>
				</span>
			</div>












			<?//  Кнопки штуки ?>
			<?
	
	
	if ($actualItem['CAN_BUY'] && $arParams['USE_PRODUCT_QUANTITY'])
						{
							?>
			<div class="product-item-info-container product-item-hidden" data-entity="quantity-block">
				<div class="product-item-amount">
					<div class="product-item-amount-field-container">
						<span class="product-item-amount-field-btn-minus no-select" id="<?= $itemIds['QUANTITY_DOWN'] ?>"></span>
						<input class="product-item-amount-field" id="<?= $itemIds['QUANTITY'] ?>" type="number" name="<?= $arParams['PRODUCT_QUANTITY_VARIABLE'] ?>" value="<?= $measureRatio ?>">
						<span class="product-item-amount-field-btn-plus no-select" id="<?= $itemIds['QUANTITY_UP'] ?>"></span>
						<span class="product-item-amount-description-container">
							<span id="<?= $itemIds['QUANTITY_MEASURE'] ?>">
								<?= $actualItem['ITEM_MEASURE']['TITLE'] ?>
							</span>
							<span id="<?= $itemIds['PRICE_TOTAL'] ?>"></span>
						</span>
					</div>
				</div>
			</div>
			<?
						}
	
	
	?>













			<?/* Кнопки купить */ ?>
			<?/*
	<div class="product-item-info-container product-item-hidden" data-entity="buttons-block">
		<?
		if (!$haveOffers)
		{
			if ($actualItem['CAN_BUY'])
			{
				?>
			<div class="product-item-button-container" id="<?= $itemIds['BASKET_ACTIONS'] ?>">
				TEST5<button class="btn btn-primary <?= $buttonSizeClass ?>" id="<?= $itemIds['BUY_LINK'] ?>" href="javascript:void(0)" rel="nofollow">
					<?= ($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET']) ?>
				</button>
			</div>
			<?
			}
			else
			{
				?>
			<div class="product-item-button-container">
				<?
					if ($showSubscribe)
					{
						$APPLICATION->IncludeComponent(
							'bitrix:catalog.product.subscribe',
							'',
							array(
								'PRODUCT_ID' => $actualItem['ID'],
								'BUTTON_ID' => $itemIds['SUBSCRIBE_LINK'],
								'BUTTON_CLASS' => 'btn btn-primary '.$buttonSizeClass,
								'DEFAULT_DISPLAY' => true,
								'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
							),
							$component,
							array('HIDE_ICONS' => 'Y')
						);
					}
					?>
				<button class="btn btn-link <?= $buttonSizeClass ?>" id="<?= $itemIds['NOT_AVAILABLE_MESS'] ?>" href="javascript:void(0)" rel="nofollow">
					<?= $arParams['MESS_NOT_AVAILABLE'] ?>
				</button>
			</div>
			<?
			}
		}
		else
		{
			if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
			{
				?>
			<div class="product-item-button-container">
				<?
					if ($showSubscribe)
					{
						$APPLICATION->IncludeComponent(
							'bitrix:catalog.product.subscribe',
							'',
							array(
								'PRODUCT_ID' => $item['ID'],
								'BUTTON_ID' => $itemIds['SUBSCRIBE_LINK'],
								'BUTTON_CLASS' => 'btn btn-primary '.$buttonSizeClass,
								'DEFAULT_DISPLAY' => !$actualItem['CAN_BUY'],
								'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
							),
							$component,
							array('HIDE_ICONS' => 'Y')
						);
					}
					?>
				<button class="btn btn-link <?= $buttonSizeClass ?>" id="<?= $itemIds['NOT_AVAILABLE_MESS'] ?>" href="javascript:void(0)" rel="nofollow" <?= ($actualItem['CAN_BUY'] ? 'style="display: none;"' : '') ?>>
					<?= $arParams['MESS_NOT_AVAILABLE'] ?>
				</button>
				<div id="<?= $itemIds['BASKET_ACTIONS'] ?>" <?= ($actualItem['CAN_BUY'] ? '' : 'style="display: none;"') ?>>
					<button class="btn btn-primary <?= $buttonSizeClass ?>" id="<?= $itemIds['BUY_LINK'] ?>" href="javascript:void(0)" rel="nofollow">
						<?= ($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET']) ?>
					</button>
				</div>
			</div>
			<?
			}
			else
			{
				?>
			<div class="product-item-button-container">
				<button class="btn btn-primary <?= $buttonSizeClass ?>" href="<?= $item['DETAIL_PAGE_URL'] ?>">
					<?= $arParams['MESS_BTN_DETAIL'] ?>
				</button>
			</div>
			<?
			}
		}
		?>
		</div>

		*/ ?>








		<?/*

	
	
	
	
	
	

</div>










































<div class="product-item">
	<? if ($itemHasDetailUrl): ?>
		<a class="product-item-image-wrapper" href="<?= $item['DETAIL_PAGE_URL'] ?>" title="<?= $imgTitle ?>" data-entity="image-wrapper">
			<? else: ?>



			<span class="product-item-image-wrapper" data-entity="image-wrapper">
				<? endif; ?>


				<span class="product-item-image-slider-slide-container slide" id="<?= $itemIds['PICT_SLIDER'] ?>" <?= ($showSlider ? '' : 'style="display: none;"') ?> data-slider-interval="<?= $arParams['SLIDER_INTERVAL'] ?>" data-slider-wrap="true">
					<?
			if ($showSlider)
			{
				foreach ($morePhoto as $key => $photo)
				{
					?>
					<span class="product-item-image-slide item <?= ($key == 0 ? 'active' : '') ?>" style="background-image: url('<?= $photo['SRC'] ?>');"></span>
					<?
				}
			}
			?>
				</span>


				<?/*
		<span class="product-item-image-original" id="<?= $itemIds['PICT'] ?>" style="background-image: url('<?= $item['PREVIEW_PICTURE']['SRC'] ?>'); <?= ($showSlider ? 'display: none;' : '') ?>"></span>
			*/ ?>

			<?/*
	
		
		<?
		
		
		if ($item['SECOND_PICT'])
		{
			
			$bgImage = !empty($item['PREVIEW_PICTURE_SECOND']) ? $item['PREVIEW_PICTURE_SECOND']['SRC'] : $item['PREVIEW_PICTURE']['SRC'];
			?>


			<span class="product-item-image-alternative" id="<?= $itemIds['SECOND_PICT'] ?>" style="background-image: url('<?= $bgImage ?>'); <?= ($showSlider ? 'display: none;' : '') ?>">

			</span>


			<?
		}


/* Если есть скидка */

		/*
		if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y')
		{
			?>
			<div class="product-item-label-ring <?= $discountPositionClass ?>" id="<?= $itemIds['DSC_PERC'] ?>" <?= ($price['PERCENT'] > 0 ? '' : 'style="display: none;"') ?>>
				<span><?= -$price['PERCENT'] ?>%</span>
			</div>
			<?
		}
		*/

		/* Если есть метки */

		/*
		
		if ($item['LABEL'])
		{
			?>
			<div class="product-item-label-text <?= $labelPositionClass ?>" id="<?= $itemIds['STICKER_ID'] ?>">
				<?
				if (!empty($item['LABEL_ARRAY_VALUE']))
				{
					foreach ($item['LABEL_ARRAY_VALUE'] as $code => $value)
					{
						?>
				<div<?= (!isset($item['LABEL_PROP_MOBILE'][$code]) ? ' class="hidden-xs"' : '') ?>>
					<span title="<?= $value ?>"><?= $value ?></span>
			</div>
			<?
					}
				}
				?>
			</div>
			<?
		}
		

		?>
			<span class="product-item-image-slider-control-container" id="<?= $itemIds['PICT_SLIDER'] ?>_indicator" <?= ($showSlider ? '' : 'style="display: none;"') ?>>
				<?
			if ($showSlider)
			{
				foreach ($morePhoto as $key => $photo)
				{
					?>
				<span class="product-item-image-slider-control<?= ($key == 0 ? ' active' : '') ?>" data-go-to="<?= $key ?>"></span>
				<?
				}
			}
			?>
			</span>
			<?
		if ($arParams['SLIDER_PROGRESS'] === 'Y')
		{
			?>
			<span class="product-item-image-slider-progress-bar-container">
				<span class="product-item-image-slider-progress-bar" id="<?= $itemIds['PICT_SLIDER'] ?>_progress_bar" style="width: 0;"></span>
			</span>
			<?
		}
		?>
			<? if ($itemHasDetailUrl): ?>
		</a>
		<? else: ?>
	</span>
	<? endif; ?>






	<!-- Заголовок с ссылкой на товар детально-->

	<?= $productTitle ?>

	<?/*
	<h3 class="product-item-title">
		<? if ($itemHasDetailUrl): ?>
	<a href="<?= $item['DETAIL_PAGE_URL'] ?>" title="<?= $productTitle ?>">
		<? endif; ?>
		<?= $productTitle ?>
		<? if ($itemHasDetailUrl): ?>
	</a>
	<? endif; ?>
	</h3>
	*/ ?>









	<?/*
	
	<div>Тестовый блок</div>
	
	<div>
		<?
			echo "Заголовок: $productTitle";
		?>
	</div>

	<div>
		<?
			echo "Артикуль: ".$item[PROPERTIES][Article][VALUE]." <br>";
			echo "Материал: ".$item[PROPERTIES][material][VALUE]." <br>";
			echo "Цвет: ".$item[PROPERTIES][color][VALUE]." <br>";
			echo "Ширина, мм: ".$item[PROPERTIES][width][VALUE]." <br>";
			echo "Глубина, мм: ".$item[PROPERTIES][deep][VALUE]." <br>";
			echo "Высота, мм: ".$item[PROPERTIES][height][VALUE]." <br>";
			
			//echo "Варианты товаров: ".$item[PROPERTIES][torgoffer][VALUE]." <br>";
			
		?>
	</div>







	<div>
		<?
			echo "Цена: $price[PRICE]";
		?>
	</div>


	*/ ?>
















	<?/*

	
	<?
	if (!empty($arParams['PRODUCT_BLOCKS_ORDER']))
	{
		foreach ($arParams['PRODUCT_BLOCKS_ORDER'] as $blockName)
		{
			
			
			
			switch ($blockName)
			{
				case 'price': ?>
	<div class="product-item-info-container product-item-price-container" data-entity="price-block">
		<?
						if ($arParams['SHOW_OLD_PRICE'] === 'Y')
						{
							?>
		<span class="product-item-price-old" id="<?= $itemIds['PRICE_OLD'] ?>" <?= ($price['RATIO_PRICE'] >= $price['RATIO_BASE_PRICE'] ? 'style="display: none;"' : '') ?>>
			<?= $price['PRINT_RATIO_BASE_PRICE'] ?>
		</span>&nbsp;
		<?
						}
						?>
		<span class="product-item-price-current" id="<?= $itemIds['PRICE'] ?>">
			<?
							if (!empty($price))
							{
								if ($arParams['PRODUCT_DISPLAY_MODE'] === 'N' && $haveOffers)
								{
									echo Loc::getMessage(
										'CT_BCI_TPL_MESS_PRICE_SIMPLE_MODE',
										array(
											'#PRICE#' => $price['PRINT_RATIO_PRICE'],
											'#VALUE#' => $measureRatio,
											'#UNIT#' => $minOffer['ITEM_MEASURE']['TITLE']
										)
									);
								}
								else
								{
									echo $price['PRINT_RATIO_PRICE'];
								}
							}
							?>
		</span>
	</div>
	<?
					break;

				case 'quantityLimit':
					if ($arParams['SHOW_MAX_QUANTITY'] !== 'N')
					{
						if ($haveOffers)
						{
							if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
							{
								?>
	<div class="product-item-info-container product-item-hidden" id="<?= $itemIds['QUANTITY_LIMIT'] ?>" style="display: none;" data-entity="quantity-limit-block">
		<div class="product-item-info-container-title text-muted">
			<?= $arParams['MESS_SHOW_MAX_QUANTITY'] ?>:
			<span class="product-item-quantity text-dark" data-entity="quantity-limit-value"></span>
		</div>
	</div>
	<?
							}
						}
						else
						{
							if (
								$measureRatio
								&& (float)$actualItem['CATALOG_QUANTITY'] > 0
								&& $actualItem['CATALOG_QUANTITY_TRACE'] === 'Y'
								&& $actualItem['CATALOG_CAN_BUY_ZERO'] === 'N'
							)
							{
								?>
	<div class="product-item-info-container product-item-hidden" id="<?= $itemIds['QUANTITY_LIMIT'] ?>">
		<div class="product-item-info-container-title text-muted">
			<?= $arParams['MESS_SHOW_MAX_QUANTITY'] ?>:
			<span class="product-item-quantity text-dark" data-entity="quantity-limit-value">
				<?
												if ($arParams['SHOW_MAX_QUANTITY'] === 'M')
												{
													if ((float)$actualItem['CATALOG_QUANTITY'] / $measureRatio >= $arParams['RELATIVE_QUANTITY_FACTOR'])
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
													echo $actualItem['CATALOG_QUANTITY'].' '.$actualItem['ITEM_MEASURE']['TITLE'];
												}
												?>
			</span>
		</div>
	</div>
	<?
							}
						}
					}

					break;

				case 'quantity':
					if (!$haveOffers)
					{
						if ($actualItem['CAN_BUY'] && $arParams['USE_PRODUCT_QUANTITY'])
						{
							?>
	<div class="product-item-info-container product-item-hidden" data-entity="quantity-block">
		<div class="product-item-amount">
			<div class="product-item-amount-field-container">
				<span class="product-item-amount-field-btn-minus no-select" id="<?= $itemIds['QUANTITY_DOWN'] ?>"></span>
				<input class="product-item-amount-field" id="<?= $itemIds['QUANTITY'] ?>" type="number" name="<?= $arParams['PRODUCT_QUANTITY_VARIABLE'] ?>" value="<?= $measureRatio ?>">
				<span class="product-item-amount-field-btn-plus no-select" id="<?= $itemIds['QUANTITY_UP'] ?>"></span>
				<span class="product-item-amount-description-container">
					<span id="<?= $itemIds['QUANTITY_MEASURE'] ?>">
						<?= $actualItem['ITEM_MEASURE']['TITLE'] ?>
					</span>
					<span id="<?= $itemIds['PRICE_TOTAL'] ?>"></span>
				</span>
			</div>
		</div>
	</div>
	<?
						}
					}
					elseif ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
					{
						if ($arParams['USE_PRODUCT_QUANTITY'])
						{
							?>
	<div class="product-item-info-container product-item-hidden" data-entity="quantity-block">
		<div class="product-item-amount">
			<div class="product-item-amount-field-container">
				<span class="product-item-amount-field-btn-minus no-select" id="<?= $itemIds['QUANTITY_DOWN'] ?>"></span>
				<input class="product-item-amount-field" id="<?= $itemIds['QUANTITY'] ?>" type="number" name="<?= $arParams['PRODUCT_QUANTITY_VARIABLE'] ?>" value="<?= $measureRatio ?>">
				<span class="product-item-amount-field-btn-plus no-select" id="<?= $itemIds['QUANTITY_UP'] ?>"></span>
				<span class="product-item-amount-description-container">
					<span id="<?= $itemIds['QUANTITY_MEASURE'] ?>"><?= $actualItem['ITEM_MEASURE']['TITLE'] ?></span>
					<span id="<?= $itemIds['PRICE_TOTAL'] ?>"></span>
				</span>
			</div>
		</div>
	</div>
	<?
						}
					}

					break;

				case 'buttons':
					?>
	<div class="product-item-info-container product-item-hidden" data-entity="buttons-block">
		<?
						if (!$haveOffers)
						{
							if ($actualItem['CAN_BUY'])
							{
								?>
		<div class="product-item-button-container" id="<?= $itemIds['BASKET_ACTIONS'] ?>">
			<button class="btn btn-primary <?= $buttonSizeClass ?>" id="<?= $itemIds['BUY_LINK'] ?>" href="javascript:void(0)" rel="nofollow">
				<?= ($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET']) ?>
			</button>
		</div>
		<?
							}
							else
							{
								?>
		<div class="product-item-button-container">
			<?
									if ($showSubscribe)
									{
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.product.subscribe',
											'',
											array(
												'PRODUCT_ID' => $actualItem['ID'],
												'BUTTON_ID' => $itemIds['SUBSCRIBE_LINK'],
												'BUTTON_CLASS' => 'btn btn-primary '.$buttonSizeClass,
												'DEFAULT_DISPLAY' => true,
												'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
									}
									?>
			<button class="btn btn-link <?= $buttonSizeClass ?>" id="<?= $itemIds['NOT_AVAILABLE_MESS'] ?>" href="javascript:void(0)" rel="nofollow">
				<?= $arParams['MESS_NOT_AVAILABLE'] ?>
			</button>
		</div>
		<?
							}
						}
						else
						{
							if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
							{
								?>
		<div class="product-item-button-container">
			<?
									if ($showSubscribe)
									{
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.product.subscribe',
											'',
											array(
												'PRODUCT_ID' => $item['ID'],
												'BUTTON_ID' => $itemIds['SUBSCRIBE_LINK'],
												'BUTTON_CLASS' => 'btn btn-primary '.$buttonSizeClass,
												'DEFAULT_DISPLAY' => !$actualItem['CAN_BUY'],
												'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
									}
									?>
			<button class="btn btn-link <?= $buttonSizeClass ?>" id="<?= $itemIds['NOT_AVAILABLE_MESS'] ?>" href="javascript:void(0)" rel="nofollow" <?= ($actualItem['CAN_BUY'] ? 'style="display: none;"' : '') ?>>
				<?= $arParams['MESS_NOT_AVAILABLE'] ?>
			</button>
			<div id="<?= $itemIds['BASKET_ACTIONS'] ?>" <?= ($actualItem['CAN_BUY'] ? '' : 'style="display: none;"') ?>>
				<button class="btn btn-primary <?= $buttonSizeClass ?>" id="<?= $itemIds['BUY_LINK'] ?>" href="javascript:void(0)" rel="nofollow">
					<?= ($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET']) ?>
				</button>
			</div>
		</div>
		<?
							}
							else
							{
								?>
		<div class="product-item-button-container">
			<button class="btn btn-primary <?= $buttonSizeClass ?>" href="<?= $item['DETAIL_PAGE_URL'] ?>">
				<?= $arParams['MESS_BTN_DETAIL'] ?>
			</button>
		</div>
		<?
							}
						}
						?>
	</div>
	<?
					break;

				case 'props':
					if (!$haveOffers)
					{
						if (!empty($item['DISPLAY_PROPERTIES']))
						{
							?>
	<div class="product-item-info-container product-item-hidden" data-entity="props-block">
		<dl class="product-item-properties">
			<?
									foreach ($item['DISPLAY_PROPERTIES'] as $code => $displayProperty)
									{
										?>
			<dt class="text-muted<?= (!isset($item['PROPERTY_CODE_MOBILE'][$code]) ? ' d-none d-sm-block' : '') ?>">
				<?= $displayProperty['NAME'] ?>
			</dt>
			<dd class="text-dark<?= (!isset($item['PROPERTY_CODE_MOBILE'][$code]) ? ' d-none d-sm-block' : '') ?>">
				<?= (is_array($displayProperty['DISPLAY_VALUE'])
					? implode(' / ', $displayProperty['DISPLAY_VALUE'])
					: $displayProperty['DISPLAY_VALUE']) ?>
			</dd>
			<?
									}
									?>
		</dl>
	</div>
	<?
						}

						if ($arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y' && !empty($item['PRODUCT_PROPERTIES']))
						{
							?>
	<div id="<?= $itemIds['BASKET_PROP_DIV'] ?>" style="display: none;">
		<?
								if (!empty($item['PRODUCT_PROPERTIES_FILL']))
								{
									foreach ($item['PRODUCT_PROPERTIES_FILL'] as $propID => $propInfo)
									{
										?>
		<input type="hidden" name="<?= $arParams['PRODUCT_PROPS_VARIABLE'] ?>[<?= $propID ?>]" value="<?= htmlspecialcharsbx($propInfo['ID']) ?>">
		<?
										unset($item['PRODUCT_PROPERTIES'][$propID]);
									}
								}

								if (!empty($item['PRODUCT_PROPERTIES']))
								{
									?>
		<table>
			<?
										foreach ($item['PRODUCT_PROPERTIES'] as $propID => $propInfo)
										{
											?>
			<tr>
				<td><?= $item['PROPERTIES'][$propID]['NAME'] ?></td>
				<td>
					<?
													if (
														$item['PROPERTIES'][$propID]['PROPERTY_TYPE'] === 'L'
														&& $item['PROPERTIES'][$propID]['LIST_TYPE'] === 'C'
													)
													{
														foreach ($propInfo['VALUES'] as $valueID => $value)
														{
															?>
					<label>
						<? $checked = $valueID === $propInfo['SELECTED'] ? 'checked' : ''; ?>
						<input type="radio" name="<?= $arParams['PRODUCT_PROPS_VARIABLE'] ?>[<?= $propID ?>]" value="<?= $valueID ?>" <?= $checked ?>>
						<?= $value ?>
					</label>
					<br />
					<?
														}
													}
													else
													{
														?>
					<select name="<?= $arParams['PRODUCT_PROPS_VARIABLE'] ?>[<?= $propID ?>]">
						<?
															foreach ($propInfo['VALUES'] as $valueID => $value)
															{
																$selected = $valueID === $propInfo['SELECTED'] ? 'selected' : '';
																?>
						<option value="<?= $valueID ?>" <?= $selected ?>>
							<?= $value ?>
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
					}
					else
					{
						$showProductProps = !empty($item['DISPLAY_PROPERTIES']);
						$showOfferProps = $arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && $item['OFFERS_PROPS_DISPLAY'];

						if ($showProductProps || $showOfferProps)
						{
							?>
	<div class="product-item-info-container product-item-hidden" data-entity="props-block">
		<dl class="product-item-properties">
			<?
									if ($showProductProps)
									{
										foreach ($item['DISPLAY_PROPERTIES'] as $code => $displayProperty)
										{
											?>
			<dt class="text-muted<?= (!isset($item['PROPERTY_CODE_MOBILE'][$code]) ? ' d-none d-sm-block' : '') ?>">
				<?= $displayProperty['NAME'] ?>
			</dt>
			<dd class="text-dark<?= (!isset($item['PROPERTY_CODE_MOBILE'][$code]) ? ' d-none d-sm-block' : '') ?>">
				<?= (is_array($displayProperty['DISPLAY_VALUE'])
					? implode(' / ', $displayProperty['DISPLAY_VALUE'])
					: $displayProperty['DISPLAY_VALUE']) ?>
			</dd>
			<?
										}
									}

									if ($showOfferProps)
									{
										?>
			<span id="<?= $itemIds['DISPLAY_PROP_DIV'] ?>" style="display: none;"></span>
			<?
									}
									?>
		</dl>
	</div>
	<?
						}
					}

					break;

				case 'sku':
					if ($arParams['PRODUCT_DISPLAY_MODE'] === 'Y' && $haveOffers && !empty($item['OFFERS_PROP']))
					{
						?>
	<div class="product-item-info-container product-item-hidden" id="<?= $itemIds['PROP_DIV'] ?>">
		<?
							foreach ($arParams['SKU_PROPS'] as $skuProperty)
							{
								$propertyId = $skuProperty['ID'];
								$skuProperty['NAME'] = htmlspecialcharsbx($skuProperty['NAME']);
								if (!isset($item['SKU_TREE_VALUES'][$propertyId]))
									continue;
								?>
		<div data-entity="sku-block">
			<div class="product-item-scu-container" data-entity="sku-line-block">
				<div class="product-item-scu-block-title text-muted"><?= $skuProperty['NAME'] ?></div>
				<div class="product-item-scu-block">
					<div class="product-item-scu-list">
						<ul class="product-item-scu-item-list">
							<?
													foreach ($skuProperty['VALUES'] as $value)
													{
														if (!isset($item['SKU_TREE_VALUES'][$propertyId][$value['ID']]))
															continue;

														$value['NAME'] = htmlspecialcharsbx($value['NAME']);

														if ($skuProperty['SHOW_MODE'] === 'PICT')
														{
															?>
							<li class="product-item-scu-item-color-container" title="<?= $value['NAME'] ?>" data-treevalue="<?= $propertyId ?>_<?= $value['ID'] ?>" data-onevalue="<?= $value['ID'] ?>">
								<div class="product-item-scu-item-color-block">
									<div class="product-item-scu-item-color" title="<?= $value['NAME'] ?>" style="background-image: url('<?= $value['PICT']['SRC'] ?>');"></div>
								</div>
							</li>
							<?
														}
														else
														{
															?>
							<li class="product-item-scu-item-text-container" title="<?= $value['NAME'] ?>" data-treevalue="<?= $propertyId ?>_<?= $value['ID'] ?>" data-onevalue="<?= $value['ID'] ?>">
								<div class="product-item-scu-item-text-block">
									<div class="product-item-scu-item-text"><?= $value['NAME'] ?></div>
								</div>
							</li>
							<?
														}
													}
													?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<?
							}
							?>
	</div>
	<?
						foreach ($arParams['SKU_PROPS'] as $skuProperty)
						{
							if (!isset($item['OFFERS_PROP'][$skuProperty['CODE']]))
								continue;

							$skuProps[] = array(
								'ID' => $skuProperty['ID'],
								'SHOW_MODE' => $skuProperty['SHOW_MODE'],
								'VALUES' => $skuProperty['VALUES'],
								'VALUES_COUNT' => $skuProperty['VALUES_COUNT']
							);
						}

						unset($skuProperty, $value);

						if ($item['OFFERS_PROPS_DISPLAY'])
						{
							foreach ($item['JS_OFFERS'] as $keyOffer => $jsOffer)
							{
								$strProps = '';

								if (!empty($jsOffer['DISPLAY_PROPERTIES']))
								{
									foreach ($jsOffer['DISPLAY_PROPERTIES'] as $displayProperty)
									{
										$strProps .= '<dt>'.$displayProperty['NAME'].'</dt><dd>'
											.(is_array($displayProperty['VALUE'])
												? implode(' / ', $displayProperty['VALUE'])
												: $displayProperty['VALUE'])
											.'</dd>';
									}
								}

								$item['JS_OFFERS'][$keyOffer]['DISPLAY_PROPERTIES'] = $strProps;
							}
							unset($jsOffer, $strProps);
						}
					}

					break;
			}
		}
	}

	if (
		$arParams['DISPLAY_COMPARE']
		&& (!$haveOffers || $arParams['PRODUCT_DISPLAY_MODE'] === 'Y')
	)
	{
		?>
	<div class="product-item-compare-container">
		<div class="product-item-compare">
			<div class="checkbox">
				<label id="<?= $itemIds['COMPARE_LINK'] ?>">
					<input type="checkbox" data-entity="compare-checkbox">
					<span data-entity="compare-title"><?= $arParams['MESS_BTN_COMPARE'] ?></span>
				</label>
			</div>
		</div>
	</div>

	<?
	}
	?>


	</div>















































	*/ ?>