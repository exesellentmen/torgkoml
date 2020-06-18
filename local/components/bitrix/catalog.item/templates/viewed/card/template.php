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



<? //print_r($item); ?>




<?
// Для определения вариаций цветов

$imgcolors = [];

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
	array_push($imgcolors , array("Name" => $res1[UF_NAME],"file" => $res1[UF_FILE]) );
    }
}

?>						  
	






<?

//print_r($item[DETAIL_PAGE_URL]);

?>













				
		
					<div class="itempv  info"
					
					data-item-id="<?=$item[ID]?>" 
					  data-item-img="<?=CFile::GetPath($item[PROPERTIES][Gallery][VALUE][0])?>"
					  data-item-name="<?=$item[NAME]?>" 
					  data-item-article="<?=$item[PROPERTIES][Article][VALUE]?>" 
					  data-item-price="<?=$price[BASE_PRICE]?>" 
					
					
					
					
					
					>
					
					
					<?if($item[PROPERTIES][discount][VALUE]){?>
						<div class="discountpv">-<?=$item[PROPERTIES][discount][VALUE]?> %</div>
						
					<? } else {?>

						<div style="min-height:22.64px"></div>
						<?
						}
						
						?>	
						
						<div class="gallerypvcontent">
						
						<div class="tabcellpv btleft" style="opacity: 1; <?=($item[PROPERTIES][Gallery][VALUE][1] ? "" :  "opacity: 0 !important;");?>">
						
						<div class="arrowleftpv lnr lnr-chevron-left"></div>
						</div>
						
						
						
						
						
						<div class="gallerypv tabcellpv">
							<a href="<?=$item[DETAIL_PAGE_URL]?>" style=" margin-bottom: unset !important; text-decoration: none;">
						
							<div class="qqqq">
							
							<?/*
								<div class="ggghhh">
									<div class="ggghhh1">
									</div>
								</div>
							*/?>
							
							
							  <div class="scroll">
								  <div class="scroll_child">
								  
								  
								  <?/*
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
											<div class="elem11 "></div>
										*/?>	
											
											
											
											
											<? $po = 1;?>
							
							<?	foreach($item[PROPERTIES][Gallery][VALUE] as $imggoods):?>
						
						<div class="elem11 " style="background-image:url(<?=CFile::GetPath($imggoods)?>)"></div>
						
						
						
						  
						  <? endforeach;?>
											
											
											
											
											
											
											
								  </div>
								  
							  </div>
							  
							</div>
							
						</a>	
							
						</div>
						
						
						
						
						<div class="tabcellpv btright" style="opacity: 1; <?=($item[PROPERTIES][Gallery][VALUE][1] ? "" :  "opacity: 0 !important;");?>">
						<div class="arrowrightpv lnr lnr-chevron-right"></div>
						</div>
						
						</div>
						
						<div class="fastreview">
						Быстрый просмотр 
						</div>
						
						
						
						
						
						<a href="<?=$item["~DETAIL_PAGE_URL"]?>" style="text-decoration: none;margin-bottom: unset !important;">
						<div class="statusorder" style="min-height: 18px; font-size: 13px;">
						
							<? foreach($item[PROPERTIES][stiker][VALUE] as $stick):?>
							<div style="display: inline-block;margin: 0 10px 0 0;"><?=$stick; ?></div>
							
							<?endforeach?>
						
						
						<?//echo $item[DETAIL_PAGE_URL]; ?>
						
						
						</div>
						</a>
						
						
						<div class="itemtextpv">
						<a href="<?=$item[DETAIL_PAGE_URL]?>" style="font-weight: 600 !important;margin-bottom: unset !important;">
						<?=$item[NAME]?>
						</a>
						</div>
						
						<a href="<?=$item[DETAIL_PAGE_URL]?>" style="font-weight: 600 !important;margin-bottom: unset !important;text-decoration: none;">
						<div class="articlepv">
						<span>Артикул</span><span style="float: right;"><?=$item[PROPERTIES][Article][VALUE]?></span>
						
						
						
						
						
						
						
						
						</div>
						</a>
						
						
						
						
						
					<a href="<?=$item[DETAIL_PAGE_URL]?>" style="font-weight: 600 !important;margin-bottom: unset !important;text-decoration: none;">	
					<div class="pricepv">
						
						
							
							
							<? if ($price['RATIO_PRICE'] >= $price['RATIO_BASE_PRICE']){?>
							
							<?/*
							<div class="newprice" style="
							color: #000000;
							display: table-cell;
							text-align: right;
							vertical-align: middle;
							margin: auto auto;">
							*/?>
							<div class="newprice" style="color: #000000;">
							
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
							
							<?}else{
								
								
								
							?>
							
							<div class="newprice" >
							
							
							<?/*
							<?=$item[ITEM_PRICES][0][PRICE] ?> руб.*/?>
							
							<?=number_format(ceil($item[ITEM_PRICES][0][PRICE]), 0, ',', ' '); ?> руб.
							
							
							
							</div>
							
							<?}?>
							
							
							
							
							
							
							
							
							
							<div class="oldprice">
							<?
							if ($arParams['SHOW_OLD_PRICE'] === 'Y')
							{
								?>
								
								<div class="sectionCatalogList-items-prev-price__old" id="<?=$itemIds['PRICE_OLD']?>"
									<?=($price['RATIO_PRICE'] >= $price['RATIO_BASE_PRICE'] ? 'style="display: none;"' : '')?>>
									<?=$price['PRINT_RATIO_BASE_PRICE']?>
								</div>
								
								<?
							}
							?>
							
							
							
							</div>
						</div>
					</div>
			
					</a>
				
				






































<?/*











<span class="product-item-image-slider-slide-container slide" id="<?=$itemIds['PICT_SLIDER']?>"></span>

<span id="<?=$itemIds['SECOND_PICT']?>" style="display: none;"></span>




					<div class="lnr lnr-heart toggleTitle pvbtn  qw22 unvisablebtn" data-title="Избранное" style="
						
					"></div>
					
					<div class="lnr lnr-sort-amount-asc toggleTitle pvbtn pvbtndefault pvbtnclick qw33 unvisablebtn" data-title="Сравнение"  style="
						
					"></div>
					
					
                      <div class="sectionCatalogList-items__item-sale">-10 %</div>
                      
					  
					  
					  
					  <?// Начало верхнего уровня ?>
					  <?// ========================================== ?>
					  
					  
					  <div class="sectionCatalogList-items-prev info" 
					  data-item-id="<?=$item[ID]?>" 
					  data-item-img="<?=CFile::GetPath($item[PROPERTIES][Gallery][VALUE][0])?>"
					  data-item-name="<?=$item[NAME]?>" 
					  data-item-article="<?=$item[PROPERTIES][Article][VALUE]?>" 
					  data-item-price="<?=$price[BASE_PRICE]?>" 
					  
					  >
					  
					
					  
                        <div class="sectionCatalogList-items-prev-smo">
						
                            <div class="lnr lnr-heart toggleTitle pvbtn selectpv sectionCatalogList-items-prev-smo__link" data-title="Избранное"></div>
							
                            <div class="lnr lnr-sort-amount-asc toggleTitle pvbtn comparisonpv sectionCatalogList-items-prev-smo__link" data-title="Сравнение"></div>
							
						</div>	
						
						
                        <div class="sectionCatalogList-items__item-sale">-10 %</div>
						
							
                        <div class="sectionCatalogList-items-prev-slider">
						
						<? $po = 1;?>
							
							<?	foreach($item[PROPERTIES][Gallery][VALUE] as $imggoods):?>
						
						<div class="sectionCatalogList-items-prev-slider__item">
                            <div class="sectionCatalogList-items-prev-slider__pic">
							
							
							<div class="sectionCatalogList-items-prev-slider__img img_kard" style="height: 100% !important;background-image:url(<?=CFile::GetPath($imggoods)?>)" ></div>
							
							
							
							</div><a class="sectionCatalogList-items-prev-fast-see fastSeeShow" href="#">Быстрый просмотр</a>
                          </div>
						
						
						  
						  <? endforeach;?>
						
						  
						  
                        </div>
						
						
						
						<div>
							<? foreach($item[PROPERTIES][stiker][VALUE] as $stick):?>
						<div class="catalogDetailProdukts-slider-mini-prop__item orange" style="display: inline-block;"><?=$stick; ?></div>
						
						<?endforeach?>
						</div>
						
						
						
                        <div class="sectionCatalogList-items-prev__name"><a href="<?=$item[DETAIL_PAGE_URL]?>"><?=$item[NAME]?></a></div>
                        <div class="sectionCatalogList-items-prev-material">
							
							
						  <?
						  
						  foreach($imgcolors as $imgcol){
							  
						  ?>
							   <div class="sectionCatalogList-items-prev-material__item toggleTitle" data-title="<?=$imgcol[Name]?>"><img class="sectionCatalogList-items-prev-material__img" src="<?=CFile::GetPath($imgcol[file])?>" alt=""></div>
							  
							  
							<?  
							  
						  }
						  
						  
						  
						  ?>
						  
						  
						  
                          <div class="sectionCatalogList-items-prev-material__item"><a class="sectionCatalogList-items-prev-material__more" href="#">Еще</a></div>
						  
						  
                        </div>
                        <div class="sectionCatalogList-items-prev-prop">
                          <div class="sectionCatalogList-items-prev-prop__item">
                            <div class="sectionCatalogList-items-prev-prop__name">Артикул</div>
                            <div class="sectionCatalogList-items-prev-prop__value"><?=$item[PROPERTIES][Article][VALUE]?>
</div>
                          </div>
                          <div class="sectionCatalogList-items-prev-prop__item">
                            <div class="sectionCatalogList-items-prev-prop__name">Материал</div>
                            <div class="sectionCatalogList-items-prev-prop__value">
<?=$item[PROPERTIES][material][VALUE]?></div>
                          </div>
                          <div class="sectionCatalogList-items-prev-prop__item">
                            <div class="sectionCatalogList-items-prev-prop__name">Цвет</div>
                            <div class="sectionCatalogList-items-prev-prop__value"><?=$item[PROPERTIES][color][VALUE]?></div>
                          </div>
                          <div class="sectionCatalogList-items-prev-prop__item">
                            <div class="sectionCatalogList-items-prev-prop__name">Ширина, мм</div>
                            <div class="sectionCatalogList-items-prev-prop__value"><?=$item[PROPERTIES][width][VALUE]?></div>
                          </div>
                          <div class="sectionCatalogList-items-prev-prop__item">
                            <div class="sectionCatalogList-items-prev-prop__name">Глубина, мм</div>
                            <div class="sectionCatalogList-items-prev-prop__value">
<?=$item[PROPERTIES][deep][VALUE]?></div>
                          </div>
                          <div class="sectionCatalogList-items-prev-prop__item">
                            <div class="sectionCatalogList-items-prev-prop__name">Высота, мм</div>
                            <div class="sectionCatalogList-items-prev-prop__value"><?=$item[PROPERTIES][height][VALUE]?></div>
                          </div>
                        </div>
                        <div class="sectionCatalogList-items-prev-price">
                          <div class="sectionCatalogList-items-prev-price__col one"><a class="sectionCatalogList-items-prev-price__link" href="#">Другие размеры</a></div>
                          <div class="sectionCatalogList-items-prev-price__col two">
                            <div class="sectionCatalogList-items-prev-price__new"><?=$item[ITEM_PRICES][0][PRICE] ?> руб.</div>
							<?
							if ($arParams['SHOW_OLD_PRICE'] === 'Y')
							{
								?>
								
								<div class="sectionCatalogList-items-prev-price__old" id="<?=$itemIds['PRICE_OLD']?>"
									<?=($price['RATIO_PRICE'] >= $price['RATIO_BASE_PRICE'] ? 'style="display: none;"' : '')?>>
									<?=$price['PRINT_RATIO_BASE_PRICE']?>
								</div>
								
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
				<button class="sectionCatalogList-items-prev-price__buy black popupAddBasket__open buy-but1" data-msg-ok="Добавлено"  href="javascript:void(0)" data-value="<?=$item[ID];?>">
					Добавлено
				</button>
			</div>

						  
						  
                        </div>
                      </div>
					  
					  
					<?// Конец верхнего уровня ?>
					<?// ========================================== ?> 
					  
					  
					  
					  
					  
					  
					  
					  
					  

                      <div class="sectionCatalogList-items__pic">
					  
					  
					  <div class="sectionCatalogList-items__img img_kard" style="background-image: url(<?=CFile::GetPath($item[PROPERTIES][Gallery][VALUE][0])?>);"></div>
					  
					  
					  </div>
                      <div class="catalogDetailProdukts-slider-mini-prop catalogSectionPropHeight">
					  
					  
					  
					  
						
						<? foreach($item[PROPERTIES][stiker][VALUE] as $stick):?>
						<div class="catalogDetailProdukts-slider-mini-prop__item orange"><?=$stick; ?></div>
						
						<?endforeach?>
						
					  
					  
					  
					  
					  
					  
                      </div>
					  
					  
					  
					  <a class="sectionCatalogList-items__name" href="<?=$item['DETAIL_PAGE_URL']?>"><?=$item[NAME]?></a>
                      
					  
					  
					  <div class="sectionCatalogList-items-prop">
                        <div class="sectionCatalogList-items-prop__item">
                          <div class="sectionCatalogList-items-prop__name">Артикул</div>
                          <div class="sectionCatalogList-items-prop__value"><?=$item[PROPERTIES][Article][VALUE]?></div>
                        </div>
                        <div class="sectionCatalogList-items-prop__item">
                          <div class="sectionCatalogList-items-prop__name">Материал</div>
                          <div class="sectionCatalogList-items-prop__value"><?=$item[PROPERTIES][material][VALUE]?></div>
                        </div>
                        <div class="sectionCatalogList-items-prop__item">
                          <div class="sectionCatalogList-items-prop__name">Цвет</div>
                          <div class="sectionCatalogList-items-prop__value"><?=$item[PROPERTIES][color][VALUE]?></div>
                        </div>
                        <div class="sectionCatalogList-items-prop__item">
                          <div class="sectionCatalogList-items-prop__name">Ширина, мм</div>
                          <div class="sectionCatalogList-items-prop__value"><?=$item[PROPERTIES][width][VALUE]?></div>
                        </div>
                        <div class="sectionCatalogList-items-prop__item">
                          <div class="sectionCatalogList-items-prop__name">Глубина, мм</div>
                          <div class="sectionCatalogList-items-prop__value"><?=$item[PROPERTIES][deep][VALUE]?></div>
                        </div>
                        <div class="sectionCatalogList-items-prop__item">
                          <div class="sectionCatalogList-items-prop__name">Высота, мм</div>
                          <div class="sectionCatalogList-items-prop__value"><?=$item[PROPERTIES][height][VALUE]?></div>
                        </div>
						</div>
						
					  
					  
					  
					  
						<?// Вывод Цены ?>



						<div class="sectionCatalogList-items-price" data-entity="price-block">
							<?
							if ($arParams['SHOW_OLD_PRICE'] === 'Y')
							{
								?>
								
								<div class="sectionCatalogList-items-price__old" id="<?=$itemIds['PRICE_OLD']?>"
									<?=($price['RATIO_PRICE'] >= $price['RATIO_BASE_PRICE'] ? 'style="display: none;"' : '')?>>
									<?=$price['PRINT_RATIO_BASE_PRICE']?>
								</div>
								
								<?
							}
							?>
							
							<div class="sectionCatalogList-items-price__new" id="<?=$itemIds['PRICE']?>">
							
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
                        
						
						
						
						
						
						
							
						<?// Кнопки штуки ?>
						

						
						<?
						if ($actualItem['CAN_BUY'] && $arParams['USE_PRODUCT_QUANTITY'])
							{
								?>
								<div class="product-item-info-container product-item-hidden" data-entity="quantity-block">
									<div class="product-item-amount">
										<div class="product-item-amount-field-container">
										
											<span class="product-item-amount-field-btn-minus no-select" id="<?=$itemIds['QUANTITY_DOWN']?>" style="background-color: unset;">-</span>
											
											<input class="product-item-amount-field" id="<?=$itemIds['QUANTITY']?>" type="number"
												name="<?=$arParams['PRODUCT_QUANTITY_VARIABLE']?>"
												value="<?=$measureRatio?>">
											
											
											<span class="product-item-amount-field-btn-plus no-select" id="<?=$itemIds['QUANTITY_UP']?>" style="background-color: unset;">+</span>
											
											
										</div>
									</div>
								</div>
								<?
							}
						?>
						
						
						
						
						<?// Кнопки купить 2 ?>

                       <div class="sectionCatalogList-items-control__col two" id="<?=$itemIds['BASKET_ACTIONS']?>">
                          <button class="sectionCatalogList-items-control__buy black" data-msg-ok="Добавлено" id="<?=$itemIds['BUY_LINK']?>" href="javascript:void(0)" rel="nofollow">
						  
							<?=($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET'])?>
							
						  
						  </button>
                        </div>
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						<script>
							var str = "<?=$arParams['~ADD_URL_TEMPLATE']?>";
						</script>
						
						
						
						
						
						
                    </div>
	


<span class="product-item-amount-description-container">
	<span id="<?=$itemIds['QUANTITY_MEASURE']?>">
		<?=$actualItem['ITEM_MEASURE']['TITLE']?>
	</span>
	<span id="<?=$itemIds['PRICE_TOTAL']?>"></span>
</span>





*/?>
