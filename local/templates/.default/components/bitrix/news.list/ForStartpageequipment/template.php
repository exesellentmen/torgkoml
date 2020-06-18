<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$this->addExternalCss("/bitrix/css/main/bootstrap.css");
$this->addExternalCss("/bitrix/css/main/font-awesome.css");
$this->addExternalCss($this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/style.css');
?>



<?/*
<div class="bx-newslist">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<div class="row">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
	<div class="bx-newslist-container col-sm-6 col-md-4" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
	<div class="bx-newslist-block">
		<?if($arParams["DISPLAY_PICTURE"]!="N"):?>
			<?if ($arItem["VIDEO"]):?>
				<div class="bx-newslist-youtube embed-responsive embed-responsive-16by9" style="display: block;">
					<iframe
						src="<?echo $arItem["VIDEO"]?>"
						frameborder="0"
						allowfullscreen=""
						></iframe>
				</div>
			<?elseif ($arItem["SOUND_CLOUD"]):?>
				<div class="bx-newslist-audio">
					<iframe
						width="100%"
						height="166"
						scrolling="no"
						frameborder="no"
						src="https://w.soundcloud.com/player/?url=<?echo urlencode($arItem["SOUND_CLOUD"])?>&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"
						></iframe>
				</div>
			<?elseif ($arItem["SLIDER"] && count($arItem["SLIDER"]) > 1):?>
				<div class="bx-newslist-slider">
					<div class="bx-newslist-slider-container" style="width: <?echo count($arItem["SLIDER"])*100?>%;left: 0;">
						<?foreach ($arItem["SLIDER"] as $file):?>
						<div style="width: <?echo 100/count($arItem["SLIDER"])?>%;" class="bx-newslist-slider-slide">
							<img src="<?=$file["SRC"]?>" alt="<?=$file["DESCRIPTION"]?>">
						</div>
						<?endforeach?>
						<div style="clear: both;"></div>
					</div>
					<div class="bx-newslist-slider-arrow-container-left"><div class="bx-newslist-slider-arrow"><i class="fa fa-angle-left" ></i></div></div>
					<div class="bx-newslist-slider-arrow-container-right"><div class="bx-newslist-slider-arrow"><i class="fa fa-angle-right"></i></div></div>
					<ul class="bx-newslist-slider-control">
						<?foreach ($arItem["SLIDER"] as $i => $file):?>
							<li rel="<?=($i+1)?>" <?if (!$i) echo 'class="current"'?>><span></span></li>
						<?endforeach?>
					</ul>
				</div>
				<script type="text/javascript">
					BX.ready(function() {
						new JCNewsSlider('<?=CUtil::JSEscape($this->GetEditAreaId($arItem['ID']));?>', {
							imagesContainerClassName: 'bx-newslist-slider-container',
							leftArrowClassName: 'bx-newslist-slider-arrow-container-left',
							rightArrowClassName: 'bx-newslist-slider-arrow-container-right',
							controlContainerClassName: 'bx-newslist-slider-control'
						});
					});
				</script>
			<?elseif ($arItem["SLIDER"]):?>
				<div class="bx-newslist-img">
					<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
						<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img
								src="<?=$arItem["SLIDER"][0]["SRC"]?>"
								width="<?=$arItem["SLIDER"][0]["WIDTH"]?>"
								height="<?=$arItem["SLIDER"][0]["HEIGHT"]?>"
								alt="<?=$arItem["SLIDER"][0]["ALT"]?>"
								title="<?=$arItem["SLIDER"][0]["TITLE"]?>"
								/></a>
					<?else:?>
						<img
							src="<?=$arItem["SLIDER"][0]["SRC"]?>"
							width="<?=$arItem["SLIDER"][0]["WIDTH"]?>"
							height="<?=$arItem["SLIDER"][0]["HEIGHT"]?>"
							alt="<?=$arItem["SLIDER"][0]["ALT"]?>"
							title="<?=$arItem["SLIDER"][0]["TITLE"]?>"
							/>
					<?endif;?>
				</div>
			<?elseif (is_array($arItem["PREVIEW_PICTURE"])):?>
				<div class="bx-newslist-img">
				<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
					<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img
							src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
							width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
							height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
							alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
							title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
							/></a>
				<?else:?>
					<img
						src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
						width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
						height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
						alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>"
						/>
				<?endif;?>
				</div>
			<?endif;?>
		<?endif;?>
		<?if($arParams["DISPLAY_NAME"]!="N" && $arItem["NAME"]):?>
			<h3 class="bx-newslist-title">
				<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
					<a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a>
				<?else:?>
					<?echo $arItem["NAME"]?>
				<?endif;?>
			</h3>
		<?endif;?>
		<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arItem["PREVIEW_TEXT"]):?>
			<div class="bx-newslist-content">
			<?echo $arItem["PREVIEW_TEXT"];?>
			</div>
		<?endif;?>
		<?foreach($arItem["FIELDS"] as $code=>$value):?>
			<?if($code == "SHOW_COUNTER"):?>
				<div class="bx-newslist-view"><i class="fa fa-eye"></i> <?=GetMessage("IBLOCK_FIELD_".$code)?>:
					<?=intval($value);?>
				</div>
			<?elseif(
				$value
				&& (
					$code == "SHOW_COUNTER_START"
					|| $code == "DATE_ACTIVE_FROM"
					|| $code == "ACTIVE_FROM"
					|| $code == "DATE_ACTIVE_TO"
					|| $code == "ACTIVE_TO"
					|| $code == "DATE_CREATE"
					|| $code == "TIMESTAMP_X"
				)
			):?>
				<?
				$value = CIBlockFormatProperties::DateFormat($arParams["ACTIVE_DATE_FORMAT"], MakeTimeStamp($value, CSite::GetDateFormat()));
				?>
				<div class="bx-newslist-date"><i class="fa fa-calendar-o"></i> <?=GetMessage("IBLOCK_FIELD_".$code)?>:
					<?=$value;?>
				</div>
			<?elseif($code == "TAGS" && $value):?>
				<div class="bx-newslist-tags"><i class="fa fa-tag"></i> <?=GetMessage("IBLOCK_FIELD_".$code)?>:
					<?=$value;?>
				</div>
			<?elseif(
				$value
				&& (
					$code == "CREATED_USER_NAME"
					|| $code == "USER_NAME"
				)
			):?>
				<div class="bx-newslist-author"><i class="fa fa-user"></i> <?=GetMessage("IBLOCK_FIELD_".$code)?>:
					<?=$value;?>
				</div>
			<?elseif ($value != ""):?>
				<div class="bx-newslist-other"><i class="fa"></i> <?=GetMessage("IBLOCK_FIELD_".$code)?>:
					<?=$value;?>
				</div>
			<?endif;?>
		<?endforeach;?>
		<?foreach($arItem["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>
			<?
			if(is_array($arProperty["DISPLAY_VALUE"]))
				$value = implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);
			else
				$value = $arProperty["DISPLAY_VALUE"];
			?>
			<?if($arProperty["CODE"] == "FORUM_MESSAGE_CNT"):?>
				<div class="bx-newslist-comments"><i class="fa fa-comments"></i> <?=$arProperty["NAME"]?>:
					<?=$value;?>
				</div>
			<?elseif ($value != ""):?>
				<div class="bx-newslist-other"><i class="fa"></i> <?=$arProperty["NAME"]?>:
					<?=$value;?>
				</div>
			<?endif;?>
		<?endforeach;?>
		<div class="row">
		<?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
			<div class="col-xs-5">
				<div class="bx-newslist-date"><i class="fa fa-calendar-o"></i> <?echo $arItem["DISPLAY_ACTIVE_FROM"]?></div>
			</div>
		<?endif?>
		<?if($arParams["USE_RATING"]=="Y"):?>
			<div class="col-xs-7 text-right">
				<?$APPLICATION->IncludeComponent(
					"bitrix:iblock.vote",
					"flat",
					Array(
						"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
						"IBLOCK_ID" => $arParams["IBLOCK_ID"],
						"ELEMENT_ID" => $arItem["ID"],
						"MAX_VOTE" => $arParams["MAX_VOTE"],
						"VOTE_NAMES" => $arParams["VOTE_NAMES"],
						"CACHE_TYPE" => $arParams["CACHE_TYPE"],
						"CACHE_TIME" => $arParams["CACHE_TIME"],
						"DISPLAY_AS_RATING" => $arParams["DISPLAY_AS_RATING"],
						"SHOW_RATING" => "N",
					),
					$component
				);?>
			</div>
		<?endif?>
		</div>
		<div class="row">
			<div class="col-xs-5">
			<?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
				<div class="bx-newslist-more"><a class="btn btn-primary btn-xs" href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><?echo GetMessage("CT_BNL_GOTO_DETAIL")?></a></div>
			<?endif;?>
			</div>
		<?
		if ($arParams["USE_SHARE"] == "Y")
		{
			?>
			<div class="col-xs-7 text-right">
				<noindex>
				<?
				$APPLICATION->IncludeComponent("bitrix:main.share", $arParams["SHARE_TEMPLATE"], array(
						"HANDLERS" => $arParams["SHARE_HANDLERS"],
						"PAGE_URL" => $arItem["~DETAIL_PAGE_URL"],
						"PAGE_TITLE" => $arItem["~NAME"],
						"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
						"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
						"HIDE" => $arParams["SHARE_HIDE"],
					),
					$component,
					array("HIDE_ICONS" => "Y")
				);
				?>
				</noindex>
			</div>
			<?
		}
		?>
		</div>
	</div>
	</div>
<?endforeach;?>
</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
</div>


*/?>





<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>


			<div class="index-product index-margin-content">
				<h2 class="index-brand__title page-index__title">ОБОРУДОВАНИЕ ДЛЯ ТОРГОВЛИ</h2>
				
				<div class="index-product__items">



					<?foreach($arResult["ITEMS"] as $arItem):?>
						<?
						$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
						$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
						?>


						<a class="index-product__item" href="<?=$arItem[PROPERTIES][Linkonsection];?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<div class="index-product__pic">
							
							<?/*
							<img alt="<?=$arItem[NAME];?>" src="<?=CFile::GetPath($arItem[PROPERTIES][icoimg][VALUE]);?>" class="index-product__img">
							*/?>
							
							<div class="imgequipment " style="background-image: url(<?=CFile::GetPath($arItem[PROPERTIES][icoimg][VALUE]);?>);"></div>
							
							
						</div>
						<div class="index-product__name">
							<div class="index-product__text"><?=$arItem[NAME];?></div>
						</div>
						</a>





					<?endforeach;?>







				</div>
				
				
				
				
				
				<div class="index-product-control">
				  <button class="index-product-control__btn btn-common-black">Перейти в каталог</button>
				</div>
			</div>
		
		
		
		
		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>
		
		
		
		
		
		
		
		
		
		
		<style>
		
		.index-top-product__item{
			vertical-align: top !important;
			
			
		}



			
		
		.index-product__text{
			max-height: 40px !important;
			display: block !important;
			overflow: hidden !important;
		}
		
		
		
		
		/*Проверить*/
		.index-product__name{
			display: table;
			height: 40px;
			
		}
		
		.index-product__text{
			    display: table-cell;
    vertical-align: bottom;
	height:auto !important;
			
		}
		/*Проверить*/
		
		
		
		
		
		
		
		.page-index__title{
			margin-left: 21px;
			margin-right: 21px;
		}
		
		
		.index-product__text{
			
			height: 40px;
    overflow: hidden;
    margin: unset !important;
		}
		
		
		.imgequipment:before{
		  content: "";
		  display: block;
		  padding-top: 80%;   
		  
		}
		
		.imgequipment{
			width:100%;
			    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
			
		}
		
		.index-product__item{
			vertical-align: top;
			
		}
		
		
		@media (min-width: 1270px) {
			.index-product__item{
				width: 19.7% !important;
				display: inline-block !important;
				
				
			}
			
			.index-product__items{
				
				display: block !important;
				
			}
			
		}
		
		
		
		
		
		
		
		
		
		@media (max-width: 1270px) {
			.index-product__name{
				 vertical-align: middle !important; 
				
			}
			
		
		
			.index-product__items{
					    margin: 0 21px 30px;
				
			}
		.index-product__item{
			
			width: 100%;
    margin: unset;
    display: block;
    min-height: unset;
    padding: 5px;
    border-top: 1px solid rgba(97, 97, 97, 0.2);
		}
		
		
		.index-product__pic{
			    display: table-cell;
    width: 27% !important;
			
		}
		
		
		.index-product__img{
				width: 100%;
    object-fit: cover;
		}
		
		
		.index-product__name{
			
			margin: unset;
			display: table-cell;
			width: 200px;
			vertical-align: middle;
			padding-left: 25px;
			
			font-family: Open Sans;
font-style: normal;
font-weight: 300;
font-size: 14px;
line-height: 19px; 
			
			
		}
		
		
		.index-product__text{
			
			height: 40px;
    overflow: hidden;
    margin: unset !important;
		}
		
		
		.index-product__item:nth-last-child(1){
				border-bottom: 1px solid rgba(97, 97, 97, 0.2);
				
			}
		
		
		
			
		}
		
		
		
		
		@media (min-width: 768px) and (max-width: 1270px)  {
			
			
			.index-product__items{
					
			}
			
			.index-product__item{	
				width: 50%;
				
			}
			
			
			.index-product__item:nth-child(2n+1){
				border-right: 1px solid rgba(97, 97, 97, 0.2);
				
			} 

			.index-product__item:nth-last-child(1){
				border-bottom: 1px solid rgba(97, 97, 97, 0.2);
				
			}
			
			.index-product__item:nth-last-child(2){
				border-bottom: 1px solid rgba(97, 97, 97, 0.2);
				
			}
			
			
			.index-product__pic{
				    width: 27% !important;
			}
			
			
			.index-product__img{
			}
			
			
			.index-product__name{
				
			font-family: Open Sans;
				font-style: normal;
				font-weight: 300;
				font-size: 14px;
				line-height: 19px; 
				
				
			}
			
			
			.index-product__text{
			
			}
			
			
			.index-product__name{
				 vertical-align: middle !important; 
				
			}
				
		}
		
		
		
		
		
		
		
		@media (min-width: 1270px)  {
			
			.elem > a:nth-child(2n){
				margin-bottom: 0px !important;

			}
			
			
		}
		
		
		
		</style>
		















