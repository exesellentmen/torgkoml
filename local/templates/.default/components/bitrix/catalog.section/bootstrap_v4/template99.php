<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main\Localization\Loc;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogSectionComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 *
 *  _________________________________________________________________________
 * |	Attention!
 * |	The following comments are for system use
 * |	and are required for the component to work correctly in ajax mode:
 * |	<!-- items-container -->
 * |	<!-- pagination-container -->
 * |	<!-- component-end -->
 */
 
 
 
// print_r($arResult[ITEMS]);
 
 
//Тест 1
 
 /*
 $q = 0;
 foreach($arResult[ITEMS] as $item1){
	echo "Товар №".$item1[ID]."<br>";
	$q++; 
 }
 echo "Всего: $q<br>";
 
 */
 
 
 
//Количество страниц 
 

$this->setFrameMode(true);

if (!empty($arResult['NAV_RESULT']))
{
	$navParams =  array(
		'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
		'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
		'NavNum' => $arResult['NAV_RESULT']->NavNum
	);
}
else
{
	$navParams = array(
		'NavPageCount' => 1,
		'NavPageNomer' => 1,
		'NavNum' => $this->randString()
	);
}

/*
echo "<br>";
echo $arParams['LAZY_LOAD']." = arParams['LAZY_LOAD']<br>";
echo $navParams['NavPageNomer']." = navParams['NavPageNomer']<br>";
echo $navParams['NavPageCount']." = navParams['NavPageCount']<br>";
echo "<br>";
*/
//print_r($navParams);



$showTopPager = false;
$showBottomPager = false;
$showLazyLoad = false;

//echo "showLazyLoad = ".$showLazyLoad.";<br>";

if ($arParams['PAGE_ELEMENT_COUNT'] > 0 && $navParams['NavPageCount'] > 1)
{
	$showTopPager = $arParams['DISPLAY_TOP_PAGER'];
	$showBottomPager = $arParams['DISPLAY_BOTTOM_PAGER'];
	$showLazyLoad = $arParams['LAZY_LOAD'] === 'Y' && $navParams['NavPageNomer'] != $navParams['NavPageCount'];
}
 

 

echo "showLazyLoad = ".$showLazyLoad.";<br>";


$templateLibrary = array('popup', 'ajax', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES']))
{
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList
);
unset($currencyList, $templateLibrary);

$elementEdit = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
$elementDelete = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
$elementDeleteParams = array('CONFIRM' => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));

$positionClassMap = array(
	'left' => 'product-item-label-left',
	'center' => 'product-item-label-center',
	'right' => 'product-item-label-right',
	'bottom' => 'product-item-label-bottom',
	'middle' => 'product-item-label-middle',
	'top' => 'product-item-label-top'
);

$discountPositionClass = '';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION']))
{
	foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos)
	{
		$discountPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$labelPositionClass = '';
if (!empty($arParams['LABEL_PROP_POSITION']))
{
	foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos)
	{
		$labelPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$arParams['~MESS_BTN_BUY'] = $arParams['~MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_BUY');
$arParams['~MESS_BTN_DETAIL'] = $arParams['~MESS_BTN_DETAIL'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_DETAIL');
$arParams['~MESS_BTN_COMPARE'] = $arParams['~MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_COMPARE');
$arParams['~MESS_BTN_SUBSCRIBE'] = $arParams['~MESS_BTN_SUBSCRIBE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_SUBSCRIBE');
$arParams['~MESS_BTN_ADD_TO_BASKET'] = $arParams['~MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_ADD_TO_BASKET');
$arParams['~MESS_NOT_AVAILABLE'] = $arParams['~MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE');
$arParams['~MESS_SHOW_MAX_QUANTITY'] = $arParams['~MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCS_CATALOG_SHOW_MAX_QUANTITY');
$arParams['~MESS_RELATIVE_QUANTITY_MANY'] = $arParams['~MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['~MESS_RELATIVE_QUANTITY_FEW'] = $arParams['~MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_FEW');

$arParams['MESS_BTN_LAZY_LOAD'] = $arParams['MESS_BTN_LAZY_LOAD'] ?: Loc::getMessage('CT_BCS_CATALOG_MESS_BTN_LAZY_LOAD');

$generalParams = array(
	'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
	'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
	'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
	'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
	'MESS_SHOW_MAX_QUANTITY' => $arParams['~MESS_SHOW_MAX_QUANTITY'],
	'MESS_RELATIVE_QUANTITY_MANY' => $arParams['~MESS_RELATIVE_QUANTITY_MANY'],
	'MESS_RELATIVE_QUANTITY_FEW' => $arParams['~MESS_RELATIVE_QUANTITY_FEW'],
	'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
	'USE_PRODUCT_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
	'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
	'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
	'ADD_PROPERTIES_TO_BASKET' => $arParams['ADD_PROPERTIES_TO_BASKET'],
	'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
	'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'],
	'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
	'COMPARE_PATH' => $arParams['COMPARE_PATH'],
	'COMPARE_NAME' => $arParams['COMPARE_NAME'],
	'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
	'PRODUCT_BLOCKS_ORDER' => $arParams['PRODUCT_BLOCKS_ORDER'],
	'LABEL_POSITION_CLASS' => $labelPositionClass,
	'DISCOUNT_POSITION_CLASS' => $discountPositionClass,
	'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
	'SLIDER_PROGRESS' => $arParams['SLIDER_PROGRESS'],
	'~BASKET_URL' => $arParams['~BASKET_URL'],
	'~ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
	'~BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE'],
	'~COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
	'~COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
	'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
	'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY'],
	'MESS_BTN_BUY' => $arParams['~MESS_BTN_BUY'],
	'MESS_BTN_DETAIL' => $arParams['~MESS_BTN_DETAIL'],
	'MESS_BTN_COMPARE' => $arParams['~MESS_BTN_COMPARE'],
	'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
	'MESS_BTN_ADD_TO_BASKET' => $arParams['~MESS_BTN_ADD_TO_BASKET'],
	'MESS_NOT_AVAILABLE' => $arParams['~MESS_NOT_AVAILABLE']
);

$obName = 'ob'.preg_replace('/[^a-zA-Z0-9_]/', 'x', $this->GetEditAreaId($navParams['NavNum']));
$containerName = 'container-'.$navParams['NavNum'];

$themeClass = isset($arParams['TEMPLATE_THEME']) ? ' bx-'.$arParams['TEMPLATE_THEME'] : '';

?>



<?/*

Начало блока




<div class="row<?=$themeClass?>"> <? // wrapper ?>
	<div class="col">
	<?
	//region Pagination
	if ($showTopPager)
	{
		?>
		<div class="row mb-4">
			<div class="col text-center" data-pagination-num="<?=$navParams['NavNum']?>">
				<!-- pagination-container -->
				<?=$arResult['NAV_STRING']?>
				<!-- pagination-container -->
			</div>
		</div>
		<?
	}
	//endregion

	//region Description
	if (($arParams['HIDE_SECTION_DESCRIPTION'] !== 'Y') && !empty($arResult['DESCRIPTION']))
	{
		?>
		<div class="row mb-4">
			<div class="col catalog-section-description">
				<p><?=$arResult['DESCRIPTION']?></p>
			</div>
		</div>
		<?
	}
	//endregion
	?>
	
	
		<div class="mb-4 catalog-section" data-entity="<?=$containerName?>">
			<!-- items-container -->
			
			
			
		<div class="sectionCatalogList">
			<div class="sectionCatalogList-sort">
				<div class="sectionCatalogList-sort__title">Показывать по:
				</div>
				<a class="sectionCatalogList-sort__count active" href="#">60</a>
				<a class="sectionCatalogList-sort__count" href="#">120</a>
			</div>
			<div class="sectionCatalogList-items">			
			
			
			
			*/?>
			
			
			
			
			<?
			if (!empty($arResult['ITEMS']) && !empty($arResult['ITEM_ROWS']))
			{
				$areaIds = array();

				foreach ($arResult['ITEMS'] as $item)
				{
					$uniqueId = $item['ID'].'_'.md5($this->randString().$component->getAction());
					$areaIds[$item['ID']] = $this->GetEditAreaId($uniqueId);
					$this->AddEditAction($uniqueId, $item['EDIT_LINK'], $elementEdit);
					$this->AddDeleteAction($uniqueId, $item['DELETE_LINK'], $elementDelete, $elementDeleteParams);
				}
				
				
				
				
				
				
				
				// Начало списка товаров
				
				
				
				
				
				
				
				
				
				

				foreach ($arResult['ITEM_ROWS'] as $rowData)
				{
					$rowItems = array_splice($arResult['ITEMS'], 0, $rowData['COUNT']);
					?>
					
					
					
					
					
					
					
						<?
						switch ($rowData['VARIANT'])
						{
							case 0:
								?>
								<div class="col product-item-big-card">
									<?
									$item = reset($rowItems);
									$APPLICATION->IncludeComponent(
										'bitrix:catalog.item',
										'bootstrap_v4',
										array(
											'RESULT' => array(
												'ITEM' => $item,
												'AREA_ID' => $areaIds[$item['ID']],
												'TYPE' => $rowData['TYPE'],
												'BIG_LABEL' => 'N',
												'BIG_DISCOUNT_PERCENT' => 'N',
												'BIG_BUTTONS' => 'N',
												'SCALABLE' => 'N'
											),
											'PARAMS' => $generalParams
												+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
										),
										$component,
										array('HIDE_ICONS' => 'Y')
									);
									?>
								</div>
								<?
								break;

							case 1:
								foreach ($rowItems as $item)
								{
									?>
									<div class="col-6 product-item-big-card">
										<?
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.item',
											'bootstrap_v4',
											array(
												'RESULT' => array(
													'ITEM' => $item,
													'AREA_ID' => $areaIds[$item['ID']],
													'TYPE' => $rowData['TYPE'],
													'BIG_LABEL' => 'N',
													'BIG_DISCOUNT_PERCENT' => 'N',
													'BIG_BUTTONS' => 'N',
													'SCALABLE' => 'N'
												),
												'PARAMS' => $generalParams
													+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
										?>
									</div>
									<?
								}
								break;



							/*Наш вариант товара*/

							case 2:
							
							
							
								foreach ($rowItems as $item)
								{
									?>
								
									
								
										
										<?
										
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.item',
											'bootstrap_v4',
											array(
												'RESULT' => array(
													'ITEM' => $item,
													'AREA_ID' => $areaIds[$item['ID']],
													'TYPE' => $rowData['TYPE'],
													'BIG_LABEL' => 'N',
													'BIG_DISCOUNT_PERCENT' => 'N',
													'BIG_BUTTONS' => 'Y',
													'SCALABLE' => 'N'
													
												),
												'PARAMS' => $generalParams
													+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
										?>
											
										
									
									
									
									<?
								}
								
								
								
								
								
							break;
								
								
								
								
								
								

							case 3:
								foreach ($rowItems as $item)
								{
									?>
									<div class="col-6 col-md-3 product-item-small-card">
										<?
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.item',
											'bootstrap_v4',
											array(
												'RESULT' => array(
													'ITEM' => $item,
													'AREA_ID' => $areaIds[$item['ID']],
													'TYPE' => $rowData['TYPE'],
													'BIG_LABEL' => 'N',
													'BIG_DISCOUNT_PERCENT' => 'N',
													'BIG_BUTTONS' => 'N',
													'SCALABLE' => 'N'
												),
												'PARAMS' => $generalParams
													+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
										?>
									</div>
									<?
								}
								break;

							case 4:
								$rowItemsCount = count($rowItems);
								?>
								<div class="col-sm-6 product-item-big-card">
									<?
									$item = array_shift($rowItems);
									$APPLICATION->IncludeComponent(
										'bitrix:catalog.item',
										'bootstrap_v4',
										array(
											'RESULT' => array(
												'ITEM' => $item,
												'AREA_ID' => $areaIds[$item['ID']],
												'TYPE' => $rowData['TYPE'],
												'BIG_LABEL' => 'N',
												'BIG_DISCOUNT_PERCENT' => 'N',
												'BIG_BUTTONS' => 'Y',
												'SCALABLE' => 'Y'
											),
											'PARAMS' => $generalParams
												+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
										),
										$component,
										array('HIDE_ICONS' => 'Y')
									);
									unset($item);
									?>
								</div>
								<div class="col-sm-6 product-item-small-card">
									<div class="row">
										<?
										for ($i = 0; $i < $rowItemsCount - 1; $i++)
										{
											?>
											<div class="col-6">
												<?
												$APPLICATION->IncludeComponent(
													'bitrix:catalog.item',
													'bootstrap_v4',
													array(
														'RESULT' => array(
															'ITEM' => $rowItems[$i],
															'AREA_ID' => $areaIds[$rowItems[$i]['ID']],
															'TYPE' => $rowData['TYPE'],
															'BIG_LABEL' => 'N',
															'BIG_DISCOUNT_PERCENT' => 'N',
															'BIG_BUTTONS' => 'N',
															'SCALABLE' => 'N'
														),
														'PARAMS' => $generalParams
															+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$rowItems[$i]['IBLOCK_ID']])
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
								<?
								break;

							case 5:
								$rowItemsCount = count($rowItems);
								?>
								<div class="col-sm-6 col-12 product-item-small-card">
									<div class="row">
										<?
										for ($i = 0; $i < $rowItemsCount - 1; $i++)
										{
											?>
											<div class="col-6">
												<?
												$APPLICATION->IncludeComponent(
													'bitrix:catalog.item',
													'bootstrap_v4',
													array(
														'RESULT' => array(
															'ITEM' => $rowItems[$i],
															'AREA_ID' => $areaIds[$rowItems[$i]['ID']],
															'TYPE' => $rowData['TYPE'],
															'BIG_LABEL' => 'N',
															'BIG_DISCOUNT_PERCENT' => 'N',
															'BIG_BUTTONS' => 'N',
															'SCALABLE' => 'N'
														),
														'PARAMS' => $generalParams
															+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$rowItems[$i]['IBLOCK_ID']])
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
								<div class="col-sm-6 product-item-big-card">
									<?
									$item = end($rowItems);
									$APPLICATION->IncludeComponent(
										'bitrix:catalog.item',
										'bootstrap_v4',
										array(
											'RESULT' => array(
												'ITEM' => $item,
												'AREA_ID' => $areaIds[$item['ID']],
												'TYPE' => $rowData['TYPE'],
												'BIG_LABEL' => 'N',
												'BIG_DISCOUNT_PERCENT' => 'N',
												'BIG_BUTTONS' => 'Y',
												'SCALABLE' => 'Y'
											),
											'PARAMS' => $generalParams
												+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
										),
										$component,
										array('HIDE_ICONS' => 'Y')
									);
									unset($item);
									?>
								</div>
								<?
								break;

							case 6:
								foreach ($rowItems as $item)
								{
									?>
									<div class="col-6 col-sm-4 col-md-4 col-lg-2 product-item-small-card">
										<?
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.item',
											'bootstrap_v4',
											array(
												'RESULT' => array(
													'ITEM' => $item,
													'AREA_ID' => $areaIds[$item['ID']],
													'TYPE' => $rowData['TYPE'],
													'BIG_LABEL' => 'N',
													'BIG_DISCOUNT_PERCENT' => 'N',
													'BIG_BUTTONS' => 'N',
													'SCALABLE' => 'N'
												),
												'PARAMS' => $generalParams
													+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
										?>
									</div>
									<?
								}

								break;

							case 7:
								$rowItemsCount = count($rowItems);
								?>
								<div class="col-sm-6 col-12 product-item-big-card">
									<?
									$item = array_shift($rowItems);
									$APPLICATION->IncludeComponent(
										'bitrix:catalog.item',
										'bootstrap_v4',
										array(
											'RESULT' => array(
												'ITEM' => $item,
												'AREA_ID' => $areaIds[$item['ID']],
												'TYPE' => $rowData['TYPE'],
												'BIG_LABEL' => 'N',
												'BIG_DISCOUNT_PERCENT' => 'N',
												'BIG_BUTTONS' => 'Y',
												'SCALABLE' => 'Y'
											),
											'PARAMS' => $generalParams
												+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
										),
										$component,
										array('HIDE_ICONS' => 'Y')
									);
									unset($item);
									?>
								</div>
								<div class="col-sm-6 col-12 product-item-small-card">
									<div class="row">
										<?
										for ($i = 0; $i < $rowItemsCount - 1; $i++)
										{
											?>
											<div class="col-6 col-md-4">
												<?
												$APPLICATION->IncludeComponent(
													'bitrix:catalog.item',
													'bootstrap_v4',
													array(
														'RESULT' => array(
															'ITEM' => $rowItems[$i],
															'AREA_ID' => $areaIds[$rowItems[$i]['ID']],
															'TYPE' => $rowData['TYPE'],
															'BIG_LABEL' => 'N',
															'BIG_DISCOUNT_PERCENT' => 'N',
															'BIG_BUTTONS' => 'N',
															'SCALABLE' => 'N'
														),
														'PARAMS' => $generalParams
															+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$rowItems[$i]['IBLOCK_ID']])
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
								<?
								break;

							case 8:
								$rowItemsCount = count($rowItems);
								?>
								<div class="col-sm-6 col-12 product-item-small-card">
									<div class="row">
										<?
										for ($i = 0; $i < $rowItemsCount - 1; $i++)
										{
											?>
											<div class="col-6 col-md-4">
												<?
												$APPLICATION->IncludeComponent(
													'bitrix:catalog.item',
													'bootstrap_v4',
													array(
														'RESULT' => array(
															'ITEM' => $rowItems[$i],
															'AREA_ID' => $areaIds[$rowItems[$i]['ID']],
															'TYPE' => $rowData['TYPE'],
															'BIG_LABEL' => 'N',
															'BIG_DISCOUNT_PERCENT' => 'N',
															'BIG_BUTTONS' => 'N',
															'SCALABLE' => 'N'
														),
														'PARAMS' => $generalParams
															+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$rowItems[$i]['IBLOCK_ID']])
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
								<div class="col-sm-6 col-12 product-item-big-card">
									<?
									$item = end($rowItems);
									$APPLICATION->IncludeComponent(
										'bitrix:catalog.item',
										'bootstrap_v4',
										array(
											'RESULT' => array(
												'ITEM' => $item,
												'AREA_ID' => $areaIds[$item['ID']],
												'TYPE' => $rowData['TYPE'],
												'BIG_LABEL' => 'N',
												'BIG_DISCOUNT_PERCENT' => 'N',
												'BIG_BUTTONS' => 'Y',
												'SCALABLE' => 'Y'
											),
											'PARAMS' => $generalParams
												+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
										),
										$component,
										array('HIDE_ICONS' => 'Y')
									);
									unset($item);
									?>
								</div>
								<?
								break;

							case 9:
								foreach ($rowItems as $item)
								{
									?>
									<div class="col product-item-line-card">
										<? $APPLICATION->IncludeComponent('bitrix:catalog.item', 'bootstrap_v4', array(
												'RESULT' => array(
													'ITEM' => $item,
													'AREA_ID' => $areaIds[$item['ID']],
													'TYPE' => $rowData['TYPE'],
													'BIG_LABEL' => 'N',
													'BIG_DISCOUNT_PERCENT' => 'N',
													'BIG_BUTTONS' => 'N'
												),
												'PARAMS' => $generalParams
													+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
										?>
									</div>
									<?
								}

								break;
						}
						?>
					
					
					
					<?/* Начало списка товаров */?>
					
					
					
					
					
					
					
					
					
					
					
					
					<?
				}
				
				// конец списка товаров 
				
				
				
			//	echo "</div></div>";
			
			
				
				echo "</div>";
				
			
				
				
				
				
				unset($generalParams, $rowItems);

			}
			else
			{
				// load css for bigData/deferred load
				$APPLICATION->IncludeComponent(
					'bitrix:catalog.item',
					'bootstrap_v4',
					array(),
					$component,
					array('HIDE_ICONS' => 'Y')
				);
			}
			?>
			<!-- items-container -->
		</div>
		
		
		<?
		echo "page".$navParams['NavPageNomer'];
		
		print_r($arResult['NAV_STRING']);
		
		
		?>
		
		
		
		
		
		<?

		
		//region LazyLoad Button
		if ($showLazyLoad)
		{
			?>
			<div class="text-center mb-4" data-entity="lazy-<?=$containerName?>">
				<button type="button"
						class="btn btn-primary btn-md"
						style="margin: 15px;"
						data-use="show-more-<?=$navParams['NavNum']?>">
							<?=$arParams['MESS_BTN_LAZY_LOAD']?>
				</button>
			</div>
			
			
			<?
		}
		//endregion

		
		
		
		
		
		//region Pagination
		if ($showBottomPager)
		{
			?>
			
			
			<div class="row mb-4">
				<div class="col text-center" data-pagination-num="<?=$navParams['NavNum']?>">
					<!-- pagination-container -->
					<?=$arResult['NAV_STRING']?>
					<!-- pagination-container -->
				</div>
			</div>
			
			
			
			
			
			
			</div>
			
			
			
			<?
		}
		//endregion

		$signer = new \Bitrix\Main\Security\Sign\Signer;
		$signedTemplate = $signer->sign($templateName, 'catalog.section');
		$signedParams = $signer->sign(base64_encode(serialize($arResult['ORIGINAL_PARAMETERS'])), 'catalog.section');
		?>
		<script>
		
		
			BX.message({
				BTN_MESSAGE_BASKET_REDIRECT: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_BASKET_REDIRECT')?>',
				BASKET_URL: '<?=$arParams['BASKET_URL']?>',
				ADD_TO_BASKET_OK: '<?=GetMessageJS('ADD_TO_BASKET_OK')?>',
				TITLE_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_TITLE_ERROR')?>',
				TITLE_BASKET_PROPS: '<?=GetMessageJS('CT_BCS_CATALOG_TITLE_BASKET_PROPS')?>',
				TITLE_SUCCESSFUL: '<?=GetMessageJS('ADD_TO_BASKET_OK')?>',
				BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_BASKET_UNKNOWN_ERROR')?>',
				BTN_MESSAGE_SEND_PROPS: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_SEND_PROPS')?>',
				BTN_MESSAGE_CLOSE: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE')?>',
				BTN_MESSAGE_CLOSE_POPUP: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE_POPUP')?>',
				COMPARE_MESSAGE_OK: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_OK')?>',
				COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_UNKNOWN_ERROR')?>',
				COMPARE_TITLE: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_TITLE')?>',
				PRICE_TOTAL_PREFIX: '<?=GetMessageJS('CT_BCS_CATALOG_PRICE_TOTAL_PREFIX')?>',
				RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY'])?>',
				RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW'])?>',
				BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT')?>',
				BTN_MESSAGE_LAZY_LOAD: '<?=CUtil::JSEscape($arParams['MESS_BTN_LAZY_LOAD'])?>',
				BTN_MESSAGE_LAZY_LOAD_WAITER: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_LAZY_LOAD_WAITER')?>',
				SITE_ID: '<?=CUtil::JSEscape($component->getSiteId())?>'
			});
			var <?=$obName?> = new JCCatalogSectionComponent({
				siteId: '<?=CUtil::JSEscape($component->getSiteId())?>',
				componentPath: '<?=CUtil::JSEscape($componentPath)?>',
				navParams: <?=CUtil::PhpToJSObject($navParams)?>,
				deferredLoad: false, // enable it for deferred load
				initiallyShowHeader: '<?=!empty($arResult['ITEM_ROWS'])?>',
				bigData: <?=CUtil::PhpToJSObject($arResult['BIG_DATA'])?>,
				lazyLoad: !!'<?=$showLazyLoad?>',
				loadOnScroll: !!'<?=($arParams['LOAD_ON_SCROLL'] === 'Y')?>',
				template: '<?=CUtil::JSEscape($signedTemplate)?>',
				ajaxId: '<?=CUtil::JSEscape($arParams['AJAX_ID'])?>',
				parameters: '<?=CUtil::JSEscape($signedParams)?>',
				container: '<?=$containerName?>'
			});
			
			
		</script>


	</div>
</div> <? //end wrapper?>
<!-- component-end -->












 <?/*



<style>







	@media(max-width:1270px){
		
		
		
		.sectionCatalogFilter-info{
				display: block !important;
		}	
		
		.sectionCatalogFilter-info__col.two{
			display: none !important;	
		}
		
		
		.pvico1{
			width: 20px;
			display: inline-block;
			top: 3px;
		}
		
		.pvico2{
			display: inline-block;
			
		}
		
		.sectionCatalogFilter-info__col.three{
			
			
		}
		
		.sectionCatalogFilter-info__col.one{
			margin-bottom: 1.6rem;
		}
		
		
		
		.sectionCatalogNav{
			margin-bottom: 30px;
			
		}
		
		
		.catalogDetailProdukts__title{
			margin-bottom: 40px;	
		}
		
		
		
		.catalogDetailProdukts-slider__btn-left.slick-arrow{
			left: -25px !important;
			right: unset !important;	
		}

		.catalogDetailProdukts-slider__btn-right.slick-arrow{
		right: -25px !important;	
		left: unset !important;	
		}
		
		
		
		    
		
		
		
		
		
		
		
	}
	
	
	
	











	.pvbtndefault{
			color: #a7a7a7!important;
	}
	.pvbtndefault:hover{
			color: #5f5d5d!important;
	}
	.pvbtnclick{
			color: #5c22bb!important;
	}
	pvbtn{
			color: #a7a7a7!important;
	}

	.header-top__icon:hover{
			color: #5f5d5d!important;
	}
	.pvkard:hover{
			color: #5f5d5d!important;
	}
	.header-middle-control__cart.click .header-top__icon {
		color: #a7a7a7!important;
	}
	.fa-heart{
		color:#5c22bb!important
	}
	.visablebtn{
		display: block;
	}
	.unvisablebtn{
		display: none;
	}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	








				
				
				
				<style>
				
				
				
				.tutu{
					display: none !important;
					
				}
				
				
				
				@media (max-width:1270px){
					
					
					.tutu{
						display: none !important;
						
					}
					
					.visable1{
						display: flex !important;
						
					}
					
					.unvisable1{
						display: none !important;
						
					}
					
					.wrapper__col.right{ 
						margin-left: 0px !important;
						margin-right: 0px !important;
					}
					
					.sectionCatalogFilter__row.one{
						margin-left: 0px !important;
						
					}
					
					.sectionCatalogFilter-selected{
					    margin-left: 0px !important;	
					}
					
					
				
				}
				
				
				
				.sectionCatalogFilter-info{
					cursor: pointer;
					
				}
				
				</style>
				
				
				
				
				
				
				
				
				
				
				
				<style>
					.pvkard{
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
					
					
					
					.pvfa2{
						margin-top: 10px;
					
					}
					
					.qw22{
						font-size: 20px;
						position: absolute;
						right: -20px;
						color: #5c22bb !important;
					}
					
					.qw33{
						font-size: 20px;
						position: absolute;
						right: -20px;
						color: #5c22bb !important;
						top: 30px;
					}
				</style>
				
				
				
				
				<style>
				
				.sectionCatalogFilter__row.one{
					
					
				}
				
				
				
					@media(max-width:1270px){
						.slick-track{
							width: max-content !important;

						}
						.catalogDetailProdukts-slider__item.slick-slide.slick-current.slick-active{
							width: 280px !important;
						}
						.catalogDetailProdukts-slider__item.slick-slide{
							width: 280px !important;
							
						}
					}	
				
				
				
				
				</style>
				  
				  
				  
				  
				<script> 
				
				//$(".catalogDetailProdukts-slider-mini__name").css("color", "yellow");
				
				
				$(function(){ 
					
					
					
					$("body").css("background-color","aqua");
					
					$(".catalogDetailProdukts-slider__item").css("background-color","beige");
					
					
						$( ".lnr-chevron-right" ).click(function() {
							
							
							$(".catalogDetailProdukts-slider__items > .slick-list.draggable > .slick-track").css("background-color","azure");
							
							$(".catalogDetailProdukts-slider__items > .slick-list.draggable > .slick-track").css({'transform' : 'translate3d(-2398px, 0px, 0px)'}
							$(".catalogDetailProdukts-slider__items > .slick-list.draggable > .slick-track").css({'transform' : 'translate3d(-2398px, 0px, 0px)'}
							
							
							/*
							var left = 22 + 'px';
							var top = 22 + 'px';
							
							setTimeout(function() {
								$(".catalogDetailProdukts-slider__items > .slick-list.draggable > .slick-track").css({'transform' : 'translate(' + left +', ' + top + ')'});
							}, 1000);
							*/
							
							/*
						}); 
					
				
				
				})
				
				
				/*
					 $( ".slick-list" ).click(function() {
						
						$(".slick-list").css("background-color","aqua");
						//alert("11");
						
						
					}); 
				*/
				/*
				
				</script>
				
				
				
				
				
				
				
				
				
				
					<script>
	
	/* 
		 $(document).ready(function(){
			$('.selectpv').click(function () {
				$(this).toggleClass('pvbtndefault pvbtnclick');
				$(this).closest('.sectionCatalogList-items__item').find(".qw22").toggleClass('visablebtn unvisablebtn');
				
				
				});
			$('.comparisonpv').click(function () {
				$(this).toggleClass('pvbtndefault pvbtnclick');
				$(this).closest('.sectionCatalogList-items__item').find(".qw33").toggleClass('visablebtn unvisablebtn');
				
				
				});	
				
				
				
			});
			
		*/
		/*
		
	</script>
				
				


		
			
			
			

 
		  <!-- Для моби-->

<style type="text/css">










	.scroll{
		width:100%;
		overflow-x:scroll;
		overflow-y:hidden;
	}
	
	 .scroll_child{
	 
		text-align:center;
	 }
	
	.scroll_child > div{
		display: inline-block;
		
		
	}
	
	.qqqq{
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
	
	.scroll_child{
		white-space: nowrap;
		
	}
	
	
	
	.section_goods{
		width: 136px;
		height: 119px;
		background: #EEEEEE;
		margin: 2px 0;
		padding: 9px;
	}
	
	.section_ico{
		width: 53px;
		height: 53px;
		background-size: contain;
		background-repeat: no-repeat;
		background-position: center;
		margin: 0px auto 4px auto;
	}
	
	
	.section_title{
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
	
	.elem{
		vertical-align: top;
		
	}



@media (max-width: 1270px) {

	.scroll_child{
	letter-spacing: -4px;
	    margin-left: 0px;
}


.qqqq{
	
	    padding-left: 0px;
	
}


.elem:nth-child(1){
	    margin-left: 21px;
	
}

.elem{
letter-spacing: 0px;
margin-right: 0px;
}


.elem:nth-last-child(1){
margin-right: 21px;
}



	
}








/* Для десктопной версии */
/*
@media (min-width: 1270px) {
	
	
	

	
	
	
	
	
	
	
	
	
	.section_title{
	    max-height: 40px !important;
	
}
	
	
	.scroll{
		
	}
	 
	 .scroll_child{
	 
    width: 100%;
	 }
	
	.qqqq{
		    width: 1270px;
    margin: auto;
    padding-left: 0px;
	}
	
	 
	
	.section_goods{
		
		    width: 100%;
    background: unset;
	}
	
	.section_ico{
	
	height: 68px;
    width: 110px;
	
    background-image: url(/upload/iblock/3e1/3e1767d….png);
}
	
	
	.section_title{
		    width: 75%;
    margin: auto auto 0;
    text-align: center;
	}
	
	.elem{
		width: 20%;
	}
	
	
	.qqqq a{
		
		
    width: 100%;
    margin-bottom: 50px !important;
    display: flow-root;
		
	}
	
	
	
	
	.section_goods:hover .section_ico{
		opacity: 0.6; 
		transition: opacity 150ms;
	}
	
	.section_goods:hover .section_title{
		font-size: 17px;
		transition: opacity 350ms;
	}
	
	
	
	
}


</style>












<style>

	.discountpv{
		float: left;
		border: 1px solid #ff4500;
		font-style: normal;
		font-weight: 400;
		font-size: 9px;
		line-height: 186.2%;
		padding: 2px 8px;
	}

	.gallerypv{
	/*	background-image: url(/assest/img/slider-2.png);*/
	/*
		width: 100%;
		height: 200px;
		background-repeat: no-repeat;
		background-position: center;
		background-size: contain;
	}
	
	.gallerypvcontent{
		width: 100%;
		height: 200px;
		
	}
	
	
	.arrowleftpv, .arrowrightpv{
		display:inline-block;
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	.statusorder{
		line-height: 18px;
		font-weight: 600!important;
		color: #5c22bb;
		text-aling:left;
		text-align: left;
		margin: 0px 20px 0px 20px;
		
	}
	
	.elem{
		width: 280px;
		
	}
	
	.itemtextpv{
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
	
	
	.articlepv{
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
	
	
	.pricepv{
		text-align: left;
		margin: 0 21px 0 21px;
		
	}
	
	
	.articlepv{
		    justify-content: space-between;
		border-bottom: 1px solid rgba(113,113,113,.3);
		font-weight: 300;
		margin-bottom: 18px;
		font-style: normal;
		font-size: 13px;
		line-height: 18px;
		color: #2f2f2f;
		
	}
	
	.newprice{
		font-style: normal;
		font-weight: 600;
		font-size: 15px;
		line-height: 20px;
		color: #ff4500;
		text-align: right;
		
	}
	
	.oldprice{
		font-style: normal;
		font-weight: 300;
		font-size: 12px;
		line-height: 16px;
		text-decoration-line: line-through;
		color: #616161;
		text-align: right;
	}
	
	.itemtextpv{
		
		
	}
	
	
	
	.fastreview{
		opacity: 0;
	}


	.itempv{
		border: solid 1px white;
		
	}
	.pricepv{
		margin-bottom: 20px;
		
	}
	
	.fastreview{
		border: solid 1px #b8b8b8;
		border-left: 0px;
		border-right: 0px;
		margin-bottom: 4px;
		padding: 5px;
	
	}





	/*При наведении */
/*
	.elem:hover .itempv{
		border: solid 1px #b8b8b8;
		
	}
	.elem:hover .fastreview{
		opacity: 1;	
		
	}

	.tabcellpv{
			display: table-cell;
    vertical-align: middle;
		
	}


	.gallerypvcontent{
			display: table;
	}


	.elem11{
		width: 216px;
		height: 200px;
		background-image: url(/assest/img/slider-2.png);
		width: 100%;
		height: 200px;
		background-repeat: no-repeat;
		background-position: center;
		background-size: contain;
	}
	
	.scroll_child{
		transition: transform 0.1s ease, 0.1s ease, filter 0.1s;
	}
	.elem11 {
		margin: 0 2px 0 2px;
		
	}
	
	
	.gallerypv .qqqq{
		width: unset;
		
	}
	
	
	
	
	
	
	
	
	
	.arrowrightpv, .arrowleftpv{
		opacity: 0;	
		
	}
	
	
	.elem:hover .arrowrightpv, .elem:hover .arrowleftpv{
		opacity: 1;	
		
	}
	
	
	@media(min-width:1270px){
	
		.sort1{
			display: none !important;
			
		}
	}
	
	
	
	@media(max-width:1270px){
		
		
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
		
		
		
		
		
	}
	
	
	
	
	
	
	

</style>









	  
	<script> 
	
		var i = 0;
		var countelem = 0;
		
		$(function(){
			
			$( ".btright" ).click(function() {
				
				//Определяем максимальное значение перемещения
				var cou = $(this).siblings(".gallerypv").children(".qqqq").children(".scroll").children(".scroll_child").children(".elem11").length * $( ".elem11").width() * (-1);
				
				//Определение текущего положения
				var info = $(this).siblings(".gallerypv").children(".qqqq").children(".scroll").children(".scroll_child").css('transform');
				var str = info.slice(info.indexOf(",")+1, info.length);
				str = str.slice(str.indexOf(",")+1, str.length);
				str = str.slice(str.indexOf(",")+1, str.length);
				str = str.slice(str.indexOf(",")+1, str.length);
				str = str.slice(1, str.indexOf(","));
				var posit = parseInt(str);
				if (!posit){
					posit = 0;
				}
				
				//Присвоение новой позиции
				posit = posit -$( ".elem11").width();
				
				
				if(posit > cou){
					$(this).siblings(".gallerypv").children(".qqqq").children(".scroll").children(".scroll_child").css("transform","translateX(" + posit + "px)");
				}
				
			});





	
			$( ".btleft" ).click(function() {
				
				//Определяем максимальное значение перемещения
				var cou = $(this).siblings(".gallerypv").children(".qqqq").children(".scroll").children(".scroll_child").children(".elem11").length * $( ".elem11").width() * (-1);
				
				//Определение текущего положения
				var info = $(this).siblings(".gallerypv").children(".qqqq").children(".scroll").children(".scroll_child").css('transform');
				var str = info.slice(info.indexOf(",")+1, info.length);
				str = str.slice(str.indexOf(",")+1, str.length);
				str = str.slice(str.indexOf(",")+1, str.length);
				str = str.slice(str.indexOf(",")+1, str.length);
				str = str.slice(1, str.indexOf(","));
				var posit = parseInt(str);
				if (!posit){
					posit = 0;
				}
				
				
				//Присвоение новой позиции
				posit = posit + $( ".elem11").width();
				
				//test = posit + $( ".innercont").width()-4;
				
				if(posit < 1){
					$(this).siblings(".gallerypv").children(".qqqq").children(".scroll").children(".scroll_child").css("transform","translateX(" + posit + "px)");
				}
				
			});	




			
			$( ".btright1" ).click(function() {
				
				//alert(333);
				
				//Определяем максимальное значение перемещения
				var cou = $(this).siblings(".innercont").children(".scroll_child").children(".elem").length * $( ".elem").width() * (-1);
				
				//Определение текущего положения
				var info = $(this).siblings(".innercont").children(".scroll_child").css('transform');
				var str = info.slice(info.indexOf(",")+1, info.length);
				str = str.slice(str.indexOf(",")+1, str.length);
				str = str.slice(str.indexOf(",")+1, str.length);
				str = str.slice(str.indexOf(",")+1, str.length);
				str = str.slice(1, str.indexOf(","));
				var posit = parseInt(str);
				if (!posit){
					posit = 0;
				}
				
				//Присвоение новой позиции
				posit = posit -$( ".elem").width();
				
				/*alert(posit);
				alert(cou);*/
				
				
				/*
				test = posit - $( ".innercont").width()+21;
				
				if(test > cou){
					$(this).siblings(".innercont").children(".scroll_child").css("transform","translateX(" + posit + "px)");
				}
				
			});


			
			$( ".btleft1" ).click(function() {
				
				//
				
				//Определяем максимальное значение перемещения
				var cou = $(this).siblings(".innercont").children(".scroll_child").children(".elem").length * $( ".elem").width() * (-1);
				
				//Определение текущего положения
				var info = $(this).siblings(".innercont").children(".scroll_child").css('transform');
				var str = info.slice(info.indexOf(",")+1, info.length);
				str = str.slice(str.indexOf(",")+1, str.length);
				str = str.slice(str.indexOf(",")+1, str.length);
				str = str.slice(str.indexOf(",")+1, str.length);
				str = str.slice(1, str.indexOf(","));
				var posit = parseInt(str);
				if (!posit){
					posit = 0;
				}
				
				//Присвоение новой позиции
				posit = posit +$( ".elem").width();
				
				
				if(posit < 21){
					$(this).siblings(".innercont").children(".scroll_child").css("transform","translateX(" + posit + "px)");
				}
				
				
				
				
				if(posit > $( ".elem").width()){
					$(this).siblings(".innercont").children(".scroll_child").css("transform","translateX(0px)");
				}
				
				
			});
			
			
			
			
		
			
			$( ".sectionCatalogFilter__row.two" ).click(function() {
							
				$( ".filt1" ).toggleClass('visable1 unvisable1');
				
				
			});







			
			
		
		
		
		
		
		})
	
	
	
	</script>
	






<style>












			.qqqq1{
				display: flex;	
				
			}
			
			.tabcellpv1{
				vertical-align: middle;
				    margin: auto;
			}
			
			
			.innercont{
				display: inline-block;
				width: calc(100% - 62px);

				
			}
			
			
			.elem{
				width: calc(((100% - 21px) / 4));
			}
			
			
			@media(max-width:1200px){
				.elem{
					width: calc(((100% - 21px) / 3));
				}	
			}
			
			
			@media(max-width:850px){
				.elem{
					width: calc(((100% - 21px) / 2));
				}	
			}
			
			@media(max-width:540px){
				.elem{
					width: 100%;
					margin-left: 0px !important;
				}	
			}
			
			
			.titlepvtovar{
				margin: 0 20px 40px 20px;
				
			}
			
			@media (max-width: 906px) and (min-width: 620px){
				.sectionCatalogList-items__item:last-child{
				float: right;
			}
				
			}
			
			
			.titlegoods{
				width: 100%;
				max-width: 1270px;
				margin: auto;
				margin-top: 50px;
				
			}
			
			














	.product-item-container{
		width: 30%;
		display: inline-block;
	}
	.mb-4.catalog-section{
		width: 100%;	
	}





		.wrapper{
				height: unset;
			
		}
	
		/* Для быстрого просмотра */ 
		/*
			@media (max-height: 900px){
				.Pvstyle .fastSeeProduct-hero__wrap{
					    height: 90%;
				
				}
				.Pvstyle .descriptionpv{
					height: 100%;
					overflow-y: auto;
				}
				
				.Pvstyle .catalogDetail-hero{
					height: 100%;
				}
			}
		
			.Pvstyle  .fastSeeProduct-control{
						justify-content: left !important;
			}
			
			
						
						
						
			/* Стили для скрола */ 	
			/*
			::-webkit-scrollbar-button {
			background-image:url('');
			background-repeat:no-repeat;
			width:5px;
			height:0px
			}

			 ::-webkit-scrollbar-track {
			background-color: #ecedee00;
			}

			::-webkit-scrollbar-thumb {
			-webkit-border-radius: 0px;
			border-radius: 9px;
			background-color: #5c22bb;
			}

			::-webkit-scrollbar-thumb:hover{
			background-color:#c4c4c4;
			}

			::-webkit-resizer{
			background-image:url('');
			background-repeat:no-repeat;
			width:4px;
			height:0px
			}

			 ::-webkit-scrollbar{
			width: 8px;
			}
			
			/* Стили для скрола */ 	
			/*
			.Pvstyle ::-webkit-scrollbar-button {
			background-image:url('');
			background-repeat:no-repeat;
			width:5px;
			height:0px
			}

			.Pvstyle  ::-webkit-scrollbar-track {
			background-color: #ecedee00;
			}

			.Pvstyle  ::-webkit-scrollbar-thumb {
			-webkit-border-radius: 0px;
			border-radius: 9px;
			background-color: #9d9d9d;
			}

			.Pvstyle  ::-webkit-scrollbar-thumb:hover{
			background-color:#c4c4c4;
			}

			 .Pvstyle ::-webkit-resizer{
			background-image:url('');
			background-repeat:no-repeat;
			width:4px;
			height:0px
			}

			.Pvstyle  ::-webkit-scrollbar{
			width: 8px;
			}
				
				
				
				


	
	.sectionCatalogList-items__name{
		height: 58px;
		overflow: hidden;	
	}
	
	
		@media (max-width: 1270px) {
			
			
			
			
			
			
			
			
			
			.wrapper__col.left{
				display: none !important;
			}
			
			
			.wrapper__col.right{
				margin: 21px 0 21px 0 !important;
				width: 100%;
				  
			}
			 
			.wrapper__hero{
				margin-left: 0px;
				
			}
			
			.sectionCatalogList-items-prev{
				display: none !important;
				
			}
			
			.sectionCatalogList-items__item {
				width: 270px !important;
			}
			
			
			
			
			.pvdiv .sectionCatalogList-items__item{
				
				display: inline-block;
			}
			
			.pvdiv .sectionCatalogList-items{
				text-align: justify;
				margin: 0 21px 0 21px;
				text-align-last: justify;
				
			}
			
			.pvdiv .sectionCatalogList-items{
				display: block;
				
			}
			
			
			.sectionCatalogList-items__item{
				text-align-last: auto;
				
			}
			
			
			
			
			
			
		}
		
		
		
		
		
		@media (max-width: 1270px) {
		
			.pvdiv .sectionCatalogList-items{
				margin-left: calc(25% - 202px);
				margin-right: calc(25% - 202px);	
			}
			
			.pvdiv .sectionCatalogList-items__item {
				margin-left: unset;
				margin-top: 50px;
			}
		
		}
		
		
		
		
		@media (max-width: 906px) {
				
			.pvdiv .sectionCatalogList-items{
				margin-left: calc(31% - 170px);
				margin-right: calc(31% - 170px);
			}
			
			.pvdiv .sectionCatalogList-items__item {
				margin-left: unset;
				margin-top: 50px;
			}
			
		}
		
		
		
		
		@media (max-width: 620px) {
				
			.pvdiv .sectionCatalogList-items__item {
				margin: auto;
				display: block;
				margin-top: 50px;
			}
				
			
			
			.pvdiv .sectionCatalogFilter-selected{
				display: block;
				width: 100%;
				
			}
			
			
			.sectionCatalogList-items{
				margin-left: 0px !important;
				margin-right: 0px !important;
			}
			
			
		}
		
		
		
		
		.pvdiv{
			margin-left: 23px;
			margin-right: 23px;
			
		}
		
		
		
	  



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
				
				@media (max-width: 870px) {
					
					
					.pvdiv .sectionCatalogList-items {
						margin-left: calc(31% - 170px) !important;
						margin-right: calc(31% - 170px) !important;
					}
					
					
					
					
					
					
				}
				
				
				@media (max-width: 840px) and  (min-width: 550px) {
				
				.sectionCatalogList-items__item:nth-last-child(1){  
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
				
				
				
				
				
				.pvdiv{
					margin-left: 0px !important;
					margin-right: 0px !important;
					
				}
				
				
				
				
				.breadcrumbs, .sectionCatalogFilter, .comman_h1, .sectionCatalogList-sort{
					margin-left: 21px !important;
					margin-right: 21px !important;



				}
				
				
				
				@media (max-width: 790px) {
					
					.sectionCatalogList-items__item{
						vertical-align: top;
						
						
					}
					
					.sectionCatalogList-items-price {
							min-height: 40px;	
					}
					
					.sectionCatalogList-items-control__buy{
							height: 40px !important;
							width: 150px !important;						
					}
					
				}
				
				
				
			}	
				
				














</style>



Конец блока
 
 
 
 */?>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 <?
 
 /*
 

$this->setFrameMode(true);

if (!empty($arResult['NAV_RESULT']))
{
	$navParams =  array(
		'NavPageCount' => $arResult['NAV_RESULT']->NavPageCount,
		'NavPageNomer' => $arResult['NAV_RESULT']->NavPageNomer,
		'NavNum' => $arResult['NAV_RESULT']->NavNum
	);
}
else
{
	$navParams = array(
		'NavPageCount' => 1,
		'NavPageNomer' => 1,
		'NavNum' => $this->randString()
	);
}

$showTopPager = false;
$showBottomPager = false;
$showLazyLoad = false;

if ($arParams['PAGE_ELEMENT_COUNT'] > 0 && $navParams['NavPageCount'] > 1)
{
	$showTopPager = $arParams['DISPLAY_TOP_PAGER'];
	$showBottomPager = $arParams['DISPLAY_BOTTOM_PAGER'];
	$showLazyLoad = $arParams['LAZY_LOAD'] === 'Y' && $navParams['NavPageNomer'] != $navParams['NavPageCount'];
}

$templateLibrary = array('popup', 'ajax', 'fx');
$currencyList = '';

if (!empty($arResult['CURRENCIES']))
{
	$templateLibrary[] = 'currency';
	$currencyList = CUtil::PhpToJSObject($arResult['CURRENCIES'], false, true, true);
}

$templateData = array(
	'TEMPLATE_LIBRARY' => $templateLibrary,
	'CURRENCIES' => $currencyList
);
unset($currencyList, $templateLibrary);

$elementEdit = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_EDIT');
$elementDelete = CIBlock::GetArrayByID($arParams['IBLOCK_ID'], 'ELEMENT_DELETE');
$elementDeleteParams = array('CONFIRM' => GetMessage('CT_BCS_TPL_ELEMENT_DELETE_CONFIRM'));

$positionClassMap = array(
	'left' => 'product-item-label-left',
	'center' => 'product-item-label-center',
	'right' => 'product-item-label-right',
	'bottom' => 'product-item-label-bottom',
	'middle' => 'product-item-label-middle',
	'top' => 'product-item-label-top'
);

$discountPositionClass = '';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION']))
{
	foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos)
	{
		$discountPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$labelPositionClass = '';
if (!empty($arParams['LABEL_PROP_POSITION']))
{
	foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos)
	{
		$labelPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$arParams['~MESS_BTN_BUY'] = $arParams['~MESS_BTN_BUY'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_BUY');
$arParams['~MESS_BTN_DETAIL'] = $arParams['~MESS_BTN_DETAIL'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_DETAIL');
$arParams['~MESS_BTN_COMPARE'] = $arParams['~MESS_BTN_COMPARE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_COMPARE');
$arParams['~MESS_BTN_SUBSCRIBE'] = $arParams['~MESS_BTN_SUBSCRIBE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_SUBSCRIBE');
$arParams['~MESS_BTN_ADD_TO_BASKET'] = $arParams['~MESS_BTN_ADD_TO_BASKET'] ?: Loc::getMessage('CT_BCS_TPL_MESS_BTN_ADD_TO_BASKET');
$arParams['~MESS_NOT_AVAILABLE'] = $arParams['~MESS_NOT_AVAILABLE'] ?: Loc::getMessage('CT_BCS_TPL_MESS_PRODUCT_NOT_AVAILABLE');
$arParams['~MESS_SHOW_MAX_QUANTITY'] = $arParams['~MESS_SHOW_MAX_QUANTITY'] ?: Loc::getMessage('CT_BCS_CATALOG_SHOW_MAX_QUANTITY');
$arParams['~MESS_RELATIVE_QUANTITY_MANY'] = $arParams['~MESS_RELATIVE_QUANTITY_MANY'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_MANY');
$arParams['~MESS_RELATIVE_QUANTITY_FEW'] = $arParams['~MESS_RELATIVE_QUANTITY_FEW'] ?: Loc::getMessage('CT_BCS_CATALOG_RELATIVE_QUANTITY_FEW');

$arParams['MESS_BTN_LAZY_LOAD'] = $arParams['MESS_BTN_LAZY_LOAD'] ?: Loc::getMessage('CT_BCS_CATALOG_MESS_BTN_LAZY_LOAD');

$generalParams = array(
	'SHOW_DISCOUNT_PERCENT' => $arParams['SHOW_DISCOUNT_PERCENT'],
	'PRODUCT_DISPLAY_MODE' => $arParams['PRODUCT_DISPLAY_MODE'],
	'SHOW_MAX_QUANTITY' => $arParams['SHOW_MAX_QUANTITY'],
	'RELATIVE_QUANTITY_FACTOR' => $arParams['RELATIVE_QUANTITY_FACTOR'],
	'MESS_SHOW_MAX_QUANTITY' => $arParams['~MESS_SHOW_MAX_QUANTITY'],
	'MESS_RELATIVE_QUANTITY_MANY' => $arParams['~MESS_RELATIVE_QUANTITY_MANY'],
	'MESS_RELATIVE_QUANTITY_FEW' => $arParams['~MESS_RELATIVE_QUANTITY_FEW'],
	'SHOW_OLD_PRICE' => $arParams['SHOW_OLD_PRICE'],
	'USE_PRODUCT_QUANTITY' => $arParams['USE_PRODUCT_QUANTITY'],
	'PRODUCT_QUANTITY_VARIABLE' => $arParams['PRODUCT_QUANTITY_VARIABLE'],
	'ADD_TO_BASKET_ACTION' => $arParams['ADD_TO_BASKET_ACTION'],
	'ADD_PROPERTIES_TO_BASKET' => $arParams['ADD_PROPERTIES_TO_BASKET'],
	'PRODUCT_PROPS_VARIABLE' => $arParams['PRODUCT_PROPS_VARIABLE'],
	'SHOW_CLOSE_POPUP' => $arParams['SHOW_CLOSE_POPUP'],
	'DISPLAY_COMPARE' => $arParams['DISPLAY_COMPARE'],
	'COMPARE_PATH' => $arParams['COMPARE_PATH'],
	'COMPARE_NAME' => $arParams['COMPARE_NAME'],
	'PRODUCT_SUBSCRIPTION' => $arParams['PRODUCT_SUBSCRIPTION'],
	'PRODUCT_BLOCKS_ORDER' => $arParams['PRODUCT_BLOCKS_ORDER'],
	'LABEL_POSITION_CLASS' => $labelPositionClass,
	'DISCOUNT_POSITION_CLASS' => $discountPositionClass,
	'SLIDER_INTERVAL' => $arParams['SLIDER_INTERVAL'],
	'SLIDER_PROGRESS' => $arParams['SLIDER_PROGRESS'],
	'~BASKET_URL' => $arParams['~BASKET_URL'],
	'~ADD_URL_TEMPLATE' => $arResult['~ADD_URL_TEMPLATE'],
	'~BUY_URL_TEMPLATE' => $arResult['~BUY_URL_TEMPLATE'],
	'~COMPARE_URL_TEMPLATE' => $arResult['~COMPARE_URL_TEMPLATE'],
	'~COMPARE_DELETE_URL_TEMPLATE' => $arResult['~COMPARE_DELETE_URL_TEMPLATE'],
	'TEMPLATE_THEME' => $arParams['TEMPLATE_THEME'],
	'USE_ENHANCED_ECOMMERCE' => $arParams['USE_ENHANCED_ECOMMERCE'],
	'DATA_LAYER_NAME' => $arParams['DATA_LAYER_NAME'],
	'BRAND_PROPERTY' => $arParams['BRAND_PROPERTY'],
	'MESS_BTN_BUY' => $arParams['~MESS_BTN_BUY'],
	'MESS_BTN_DETAIL' => $arParams['~MESS_BTN_DETAIL'],
	'MESS_BTN_COMPARE' => $arParams['~MESS_BTN_COMPARE'],
	'MESS_BTN_SUBSCRIBE' => $arParams['~MESS_BTN_SUBSCRIBE'],
	'MESS_BTN_ADD_TO_BASKET' => $arParams['~MESS_BTN_ADD_TO_BASKET'],
	'MESS_NOT_AVAILABLE' => $arParams['~MESS_NOT_AVAILABLE']
);

$obName = 'ob'.preg_replace('/[^a-zA-Z0-9_]/', 'x', $this->GetEditAreaId($navParams['NavNum']));
$containerName = 'container-'.$navParams['NavNum'];

$themeClass = isset($arParams['TEMPLATE_THEME']) ? ' bx-'.$arParams['TEMPLATE_THEME'] : '';

?>





Начало блока




<div class="row<?=$themeClass?>"> <? // wrapper ?>
	<div class="col">
	<?
	//region Pagination
	if ($showTopPager)
	{
		?>
		<div class="row mb-4">
			<div class="col text-center" data-pagination-num="<?=$navParams['NavNum']?>">
				<!-- pagination-container -->
				<?=$arResult['NAV_STRING']?>
				<!-- pagination-container -->
			</div>
		</div>
		<?
	}
	//endregion

	//region Description
	if (($arParams['HIDE_SECTION_DESCRIPTION'] !== 'Y') && !empty($arResult['DESCRIPTION']))
	{
		?>
		<div class="row mb-4">
			<div class="col catalog-section-description">
				<p><?=$arResult['DESCRIPTION']?></p>
			</div>
		</div>
		<?
	}
	//endregion
	?>
		<div class="mb-4 catalog-section" data-entity="<?=$containerName?>">
			<!-- items-container -->
			<?
			if (!empty($arResult['ITEMS']) && !empty($arResult['ITEM_ROWS']))
			{
				$areaIds = array();

				foreach ($arResult['ITEMS'] as $item)
				{
					$uniqueId = $item['ID'].'_'.md5($this->randString().$component->getAction());
					$areaIds[$item['ID']] = $this->GetEditAreaId($uniqueId);
					$this->AddEditAction($uniqueId, $item['EDIT_LINK'], $elementEdit);
					$this->AddDeleteAction($uniqueId, $item['DELETE_LINK'], $elementDelete, $elementDeleteParams);
				}

				foreach ($arResult['ITEM_ROWS'] as $rowData)
				{
					$rowItems = array_splice($arResult['ITEMS'], 0, $rowData['COUNT']);
					?>
					11<div class="row <?=$rowData['CLASS']?>" data-entity="items-row">
						<?
						switch ($rowData['VARIANT'])
						{
							case 0:
								?>
								<div class="col product-item-big-card">
									<?
									$item = reset($rowItems);
									$APPLICATION->IncludeComponent(
										'bitrix:catalog.item',
										'bootstrap_v4',
										array(
											'RESULT' => array(
												'ITEM' => $item,
												'AREA_ID' => $areaIds[$item['ID']],
												'TYPE' => $rowData['TYPE'],
												'BIG_LABEL' => 'N',
												'BIG_DISCOUNT_PERCENT' => 'N',
												'BIG_BUTTONS' => 'N',
												'SCALABLE' => 'N'
											),
											'PARAMS' => $generalParams
												+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
										),
										$component,
										array('HIDE_ICONS' => 'Y')
									);
									?>
								</div>
								<?
								break;

							case 1:
								foreach ($rowItems as $item)
								{
									?>
									<div class="col-6 product-item-big-card">
										<?
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.item',
											'bootstrap_v4',
											array(
												'RESULT' => array(
													'ITEM' => $item,
													'AREA_ID' => $areaIds[$item['ID']],
													'TYPE' => $rowData['TYPE'],
													'BIG_LABEL' => 'N',
													'BIG_DISCOUNT_PERCENT' => 'N',
													'BIG_BUTTONS' => 'N',
													'SCALABLE' => 'N'
												),
												'PARAMS' => $generalParams
													+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
										?>
									</div>
									<?
								}
								break;

							case 2:
								foreach ($rowItems as $item)
								{
									?>
									<div class="col-sm-4 product-item-small-card">
										<?
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.item',
											'bootstrap_v4',
											array(
												'RESULT' => array(
													'ITEM' => $item,
													'AREA_ID' => $areaIds[$item['ID']],
													'TYPE' => $rowData['TYPE'],
													'BIG_LABEL' => 'N',
													'BIG_DISCOUNT_PERCENT' => 'N',
													'BIG_BUTTONS' => 'Y',
													'SCALABLE' => 'N'
												),
												'PARAMS' => $generalParams
													+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
										?>
									</div>
									<?
								}
								break;

							case 3:
								foreach ($rowItems as $item)
								{
									?>
									<div class="col-6 col-md-3 product-item-small-card">
										<?
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.item',
											'bootstrap_v4',
											array(
												'RESULT' => array(
													'ITEM' => $item,
													'AREA_ID' => $areaIds[$item['ID']],
													'TYPE' => $rowData['TYPE'],
													'BIG_LABEL' => 'N',
													'BIG_DISCOUNT_PERCENT' => 'N',
													'BIG_BUTTONS' => 'N',
													'SCALABLE' => 'N'
												),
												'PARAMS' => $generalParams
													+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
										?>
									</div>
									<?
								}
								break;

							case 4:
								$rowItemsCount = count($rowItems);
								?>
								<div class="col-sm-6 product-item-big-card">
									<?
									$item = array_shift($rowItems);
									$APPLICATION->IncludeComponent(
										'bitrix:catalog.item',
										'bootstrap_v4',
										array(
											'RESULT' => array(
												'ITEM' => $item,
												'AREA_ID' => $areaIds[$item['ID']],
												'TYPE' => $rowData['TYPE'],
												'BIG_LABEL' => 'N',
												'BIG_DISCOUNT_PERCENT' => 'N',
												'BIG_BUTTONS' => 'Y',
												'SCALABLE' => 'Y'
											),
											'PARAMS' => $generalParams
												+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
										),
										$component,
										array('HIDE_ICONS' => 'Y')
									);
									unset($item);
									?>
								</div>
								<div class="col-sm-6 product-item-small-card">
									<div class="row">
										<?
										for ($i = 0; $i < $rowItemsCount - 1; $i++)
										{
											?>
											<div class="col-6">
												<?
												$APPLICATION->IncludeComponent(
													'bitrix:catalog.item',
													'bootstrap_v4',
													array(
														'RESULT' => array(
															'ITEM' => $rowItems[$i],
															'AREA_ID' => $areaIds[$rowItems[$i]['ID']],
															'TYPE' => $rowData['TYPE'],
															'BIG_LABEL' => 'N',
															'BIG_DISCOUNT_PERCENT' => 'N',
															'BIG_BUTTONS' => 'N',
															'SCALABLE' => 'N'
														),
														'PARAMS' => $generalParams
															+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$rowItems[$i]['IBLOCK_ID']])
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
								<?
								break;

							case 5:
								$rowItemsCount = count($rowItems);
								?>
								<div class="col-sm-6 col-12 product-item-small-card">
									<div class="row">
										<?
										for ($i = 0; $i < $rowItemsCount - 1; $i++)
										{
											?>
											<div class="col-6">
												<?
												$APPLICATION->IncludeComponent(
													'bitrix:catalog.item',
													'bootstrap_v4',
													array(
														'RESULT' => array(
															'ITEM' => $rowItems[$i],
															'AREA_ID' => $areaIds[$rowItems[$i]['ID']],
															'TYPE' => $rowData['TYPE'],
															'BIG_LABEL' => 'N',
															'BIG_DISCOUNT_PERCENT' => 'N',
															'BIG_BUTTONS' => 'N',
															'SCALABLE' => 'N'
														),
														'PARAMS' => $generalParams
															+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$rowItems[$i]['IBLOCK_ID']])
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
								<div class="col-sm-6 product-item-big-card">
									<?
									$item = end($rowItems);
									$APPLICATION->IncludeComponent(
										'bitrix:catalog.item',
										'bootstrap_v4',
										array(
											'RESULT' => array(
												'ITEM' => $item,
												'AREA_ID' => $areaIds[$item['ID']],
												'TYPE' => $rowData['TYPE'],
												'BIG_LABEL' => 'N',
												'BIG_DISCOUNT_PERCENT' => 'N',
												'BIG_BUTTONS' => 'Y',
												'SCALABLE' => 'Y'
											),
											'PARAMS' => $generalParams
												+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
										),
										$component,
										array('HIDE_ICONS' => 'Y')
									);
									unset($item);
									?>
								</div>
								<?
								break;

							case 6:
								foreach ($rowItems as $item)
								{
									?>
									<div class="col-6 col-sm-4 col-md-4 col-lg-2 product-item-small-card">
										<?
										$APPLICATION->IncludeComponent(
											'bitrix:catalog.item',
											'bootstrap_v4',
											array(
												'RESULT' => array(
													'ITEM' => $item,
													'AREA_ID' => $areaIds[$item['ID']],
													'TYPE' => $rowData['TYPE'],
													'BIG_LABEL' => 'N',
													'BIG_DISCOUNT_PERCENT' => 'N',
													'BIG_BUTTONS' => 'N',
													'SCALABLE' => 'N'
												),
												'PARAMS' => $generalParams
													+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
										?>
									</div>
									<?
								}

								break;

							case 7:
								$rowItemsCount = count($rowItems);
								?>
								<div class="col-sm-6 col-12 product-item-big-card">
									<?
									$item = array_shift($rowItems);
									$APPLICATION->IncludeComponent(
										'bitrix:catalog.item',
										'bootstrap_v4',
										array(
											'RESULT' => array(
												'ITEM' => $item,
												'AREA_ID' => $areaIds[$item['ID']],
												'TYPE' => $rowData['TYPE'],
												'BIG_LABEL' => 'N',
												'BIG_DISCOUNT_PERCENT' => 'N',
												'BIG_BUTTONS' => 'Y',
												'SCALABLE' => 'Y'
											),
											'PARAMS' => $generalParams
												+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
										),
										$component,
										array('HIDE_ICONS' => 'Y')
									);
									unset($item);
									?>
								</div>
								<div class="col-sm-6 col-12 product-item-small-card">
									<div class="row">
										<?
										for ($i = 0; $i < $rowItemsCount - 1; $i++)
										{
											?>
											<div class="col-6 col-md-4">
												<?
												$APPLICATION->IncludeComponent(
													'bitrix:catalog.item',
													'bootstrap_v4',
													array(
														'RESULT' => array(
															'ITEM' => $rowItems[$i],
															'AREA_ID' => $areaIds[$rowItems[$i]['ID']],
															'TYPE' => $rowData['TYPE'],
															'BIG_LABEL' => 'N',
															'BIG_DISCOUNT_PERCENT' => 'N',
															'BIG_BUTTONS' => 'N',
															'SCALABLE' => 'N'
														),
														'PARAMS' => $generalParams
															+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$rowItems[$i]['IBLOCK_ID']])
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
								<?
								break;

							case 8:
								$rowItemsCount = count($rowItems);
								?>
								<div class="col-sm-6 col-12 product-item-small-card">
									<div class="row">
										<?
										for ($i = 0; $i < $rowItemsCount - 1; $i++)
										{
											?>
											<div class="col-6 col-md-4">
												<?
												$APPLICATION->IncludeComponent(
													'bitrix:catalog.item',
													'bootstrap_v4',
													array(
														'RESULT' => array(
															'ITEM' => $rowItems[$i],
															'AREA_ID' => $areaIds[$rowItems[$i]['ID']],
															'TYPE' => $rowData['TYPE'],
															'BIG_LABEL' => 'N',
															'BIG_DISCOUNT_PERCENT' => 'N',
															'BIG_BUTTONS' => 'N',
															'SCALABLE' => 'N'
														),
														'PARAMS' => $generalParams
															+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$rowItems[$i]['IBLOCK_ID']])
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
								<div class="col-sm-6 col-12 product-item-big-card">
									<?
									$item = end($rowItems);
									$APPLICATION->IncludeComponent(
										'bitrix:catalog.item',
										'bootstrap_v4',
										array(
											'RESULT' => array(
												'ITEM' => $item,
												'AREA_ID' => $areaIds[$item['ID']],
												'TYPE' => $rowData['TYPE'],
												'BIG_LABEL' => 'N',
												'BIG_DISCOUNT_PERCENT' => 'N',
												'BIG_BUTTONS' => 'Y',
												'SCALABLE' => 'Y'
											),
											'PARAMS' => $generalParams
												+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
										),
										$component,
										array('HIDE_ICONS' => 'Y')
									);
									unset($item);
									?>
								</div>
								<?
								break;

							case 9:
								foreach ($rowItems as $item)
								{
									?>
									<div class="col product-item-line-card">
										<? $APPLICATION->IncludeComponent('bitrix:catalog.item', 'bootstrap_v4', array(
												'RESULT' => array(
													'ITEM' => $item,
													'AREA_ID' => $areaIds[$item['ID']],
													'TYPE' => $rowData['TYPE'],
													'BIG_LABEL' => 'N',
													'BIG_DISCOUNT_PERCENT' => 'N',
													'BIG_BUTTONS' => 'N'
												),
												'PARAMS' => $generalParams
													+ array('SKU_PROPS' => $arResult['SKU_PROPS'][$item['IBLOCK_ID']])
											),
											$component,
											array('HIDE_ICONS' => 'Y')
										);
										?>
									</div>
									<?
								}

								break;
						}
						?>
					</div>
					<?
				}
				unset($generalParams, $rowItems);

			}
			else
			{
				// load css for bigData/deferred load
				$APPLICATION->IncludeComponent(
					'bitrix:catalog.item',
					'bootstrap_v4',
					array(),
					$component,
					array('HIDE_ICONS' => 'Y')
				);
			}
			?>
			<!-- items-container -->
		</div>
		<?

		//region LazyLoad Button
		if ($showLazyLoad)
		{
			?>
			<div class="text-center mb-4" data-entity="lazy-<?=$containerName?>">
				<button type="button"
						class="btn btn-primary btn-md"
						style="margin: 15px;"
						data-use="show-more-<?=$navParams['NavNum']?>">
							<?=$arParams['MESS_BTN_LAZY_LOAD']?>
				</button>
			</div>
			<?
		}
		//endregion

		//region Pagination
		if ($showBottomPager)
		{
			?>
			<div class="row mb-4">
				<div class="col text-center" data-pagination-num="<?=$navParams['NavNum']?>">
					<!-- pagination-container -->
					<?=$arResult['NAV_STRING']?>
					<!-- pagination-container -->
				</div>
			</div>
			<?
		}
		//endregion

		$signer = new \Bitrix\Main\Security\Sign\Signer;
		$signedTemplate = $signer->sign($templateName, 'catalog.section');
		$signedParams = $signer->sign(base64_encode(serialize($arResult['ORIGINAL_PARAMETERS'])), 'catalog.section');
		?>
		<script>
			BX.message({
				BTN_MESSAGE_BASKET_REDIRECT: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_BASKET_REDIRECT')?>',
				BASKET_URL: '<?=$arParams['BASKET_URL']?>',
				ADD_TO_BASKET_OK: '<?=GetMessageJS('ADD_TO_BASKET_OK')?>',
				TITLE_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_TITLE_ERROR')?>',
				TITLE_BASKET_PROPS: '<?=GetMessageJS('CT_BCS_CATALOG_TITLE_BASKET_PROPS')?>',
				TITLE_SUCCESSFUL: '<?=GetMessageJS('ADD_TO_BASKET_OK')?>',
				BASKET_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_BASKET_UNKNOWN_ERROR')?>',
				BTN_MESSAGE_SEND_PROPS: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_SEND_PROPS')?>',
				BTN_MESSAGE_CLOSE: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE')?>',
				BTN_MESSAGE_CLOSE_POPUP: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_CLOSE_POPUP')?>',
				COMPARE_MESSAGE_OK: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_OK')?>',
				COMPARE_UNKNOWN_ERROR: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_UNKNOWN_ERROR')?>',
				COMPARE_TITLE: '<?=GetMessageJS('CT_BCS_CATALOG_MESS_COMPARE_TITLE')?>',
				PRICE_TOTAL_PREFIX: '<?=GetMessageJS('CT_BCS_CATALOG_PRICE_TOTAL_PREFIX')?>',
				RELATIVE_QUANTITY_MANY: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_MANY'])?>',
				RELATIVE_QUANTITY_FEW: '<?=CUtil::JSEscape($arParams['MESS_RELATIVE_QUANTITY_FEW'])?>',
				BTN_MESSAGE_COMPARE_REDIRECT: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_COMPARE_REDIRECT')?>',
				BTN_MESSAGE_LAZY_LOAD: '<?=CUtil::JSEscape($arParams['MESS_BTN_LAZY_LOAD'])?>',
				BTN_MESSAGE_LAZY_LOAD_WAITER: '<?=GetMessageJS('CT_BCS_CATALOG_BTN_MESSAGE_LAZY_LOAD_WAITER')?>',
				SITE_ID: '<?=CUtil::JSEscape($component->getSiteId())?>'
			});
			var <?=$obName?> = new JCCatalogSectionComponent({
				siteId: '<?=CUtil::JSEscape($component->getSiteId())?>',
				componentPath: '<?=CUtil::JSEscape($componentPath)?>',
				navParams: <?=CUtil::PhpToJSObject($navParams)?>,
				deferredLoad: false, // enable it for deferred load
				initiallyShowHeader: '<?=!empty($arResult['ITEM_ROWS'])?>',
				bigData: <?=CUtil::PhpToJSObject($arResult['BIG_DATA'])?>,
				lazyLoad: !!'<?=$showLazyLoad?>',
				loadOnScroll: !!'<?=($arParams['LOAD_ON_SCROLL'] === 'Y')?>',
				template: '<?=CUtil::JSEscape($signedTemplate)?>',
				ajaxId: '<?=CUtil::JSEscape($arParams['AJAX_ID'])?>',
				parameters: '<?=CUtil::JSEscape($signedParams)?>',
				container: '<?=$containerName?>'
			});
		</script>


	</div>
</div> <? //end wrapper?>
<!-- component-end -->



Конец блока


*/

?>
















<?/*

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

   <script src="/local/templates/eshop_bootstrap_v4/assets/js/foundation.js" defer></script>
    <script src="/local/templates/eshop_bootstrap_v4/assets/js/jquery.jscrollpane.min.js" defer></script>
    <script src="/local/templates/eshop_bootstrap_v4/assets/js/jquery.mousewheel.js" defer></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js" defer></script>
    <script src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js" defer></script>
    <script src="/local/templates/eshop_bootstrap_v4/assets/js/app.js" defer></script>

*/?>





