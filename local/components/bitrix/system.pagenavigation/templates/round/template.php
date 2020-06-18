<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */


?>

<?/*
Вы посмотрели <?=$arResult[NavPageSize]*$arResult[NavPageNomer];?> из <?=$arResult[NavPageSize]*$arResult[NavPageCount];?>
*/?>



<script>

/*
$('.sectionCatalogNav__title').text("Вы посмотрели <?=$arResult[NavPageSize]*$arResult[NavPageNomer];?> из <?=$arResult[NavPageSize]*$arResult[NavPageCount];?>");
*/
var tt44=<?=$arResult[NavPageSize]*$arResult[NavPageNomer];?>;


</script>







<?




$this->setFrameMode(true);

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

$colorSchemes = array(
	"green" => "bx-green",
	"yellow" => "bx-yellow",
	"red" => "bx-red",
	"blue" => "bx-blue",
);
if(isset($colorSchemes[$arParams["TEMPLATE_THEME"]]))
{
	$colorScheme = $colorSchemes[$arParams["TEMPLATE_THEME"]];
}
else
{
	$colorScheme = "";
}
?>






<?/*Для кнопки назад*/?>

<?/*
	<?if ($arResult["NavPageNomer"] > 1):?>
		<?if($arResult["bSavePage"]):?>
			<li class="bx-pag-prev"><a href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><span>14__<?echo GetMessage("round_nav_back")?></span></a></li>
			<li class=""><a href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=1"><span>1</span></a></li>
		<?else:?>
			<?if ($arResult["NavPageNomer"] > 2):?>
				<li class="bx-pag-prev"><a href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><span>15__<</span></a></li>
			<?else:?>
				<li class="bx-pag-prev"><a href="<?=$arResult["sUrlPath"]?>"><span>16__<</span></a></li>
			<?endif?>
			<li class=""><a href="<?=$arResult["sUrlPath"]?>"><span>17__1</span></a></li>
		<?endif?>
	<?else:?>
			<li class="bx-pag-prev"><span>18__<</span></li>
			<li class="bx-active"><span>19__1</span></li>
	<?endif?>
	
*/?>











	

	<ul class="sectionCatalogNav__items">


	
	

	
		
		
	


	<?/* Для первой стр и для кнопки назад */?>
	<?if ($arResult["NavPageNomer"] > 1):?>
		<?if($arResult["bSavePage"]):?>
			<li class="bx-pag-prev"><a href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><span>14__<?echo GetMessage("round_nav_back")?></span></a></li>
			<li class=""><a href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=1"><span>1</span></a></li>
		<?else:?>
			<?if ($arResult["NavPageNomer"] > 2):?>
				<?/*
				<li class="bx-pag-prev"><a href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><span>15__<</span></a></li>
				*/?>
				<li class="sectionCatalogNav__item tas"><a class="sectionCatalogNav__link" href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><</a></li>
				
			<?else:?>
				<?/*
				<li class="bx-pag-prev"><a href="<?=$arResult["sUrlPath"]?>"><span>16__<</span></a></li>
				*/?>
				<li class="sectionCatalogNav__item"><a class="sectionCatalogNav__link" href="<?=$arResult["sUrlPath"]?>"><</a></li>
				
			<?endif?>
			<?/*
			<li class=""><a href="<?=$arResult["sUrlPath"]?>"><span>17__1</span></a></li>
			*/?>
			<li class="sectionCatalogNav__item"><a class="sectionCatalogNav__link" href="<?=$arResult["sUrlPath"]?>">1</a></li>
			..
		<?endif?>
	<?else:?>
			<?/*
			<li class="bx-pag-prev"><span>18__<</span></li>
			*/?>
			<li class="sectionCatalogNav__item"><span class="sectionCatalogNav__link"><</span></li>
			
			<?/*
			<li class="bx-active"><span>19__1</span></li>
			*/?>
			
			
			<li class="sectionCatalogNav__item"  style="font-weight: 700;"><span class="sectionCatalogNav__link">1</span></li>
			
	<?endif?>
		
		
	

	
	
	
	
	
	
	
	
	
		<?/* Средние кнопки */?>
	<?
	$arResult["nStartPage"]++;
	while($arResult["nStartPage"] <= $arResult["nEndPage"]-1):
	?>
		<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
		
			<?/*
			<li class="bx-active"><span>20__<?=$arResult["nStartPage"]?></span></li>
			*/?>
			
			
				

			
			
			<li class="sectionCatalogNav__item"><span class="sectionCatalogNav__link" style="font-weight: 700;"><?=$arResult["nStartPage"]?></span></li>
			
		
		<?else:?>
		
			<?/*
			<li class=""><a href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><span>21__<?=$arResult["nStartPage"]?></span></a></li>
			*/?>
			
			
			<li class="sectionCatalogNav__item tas2"><a class="sectionCatalogNav__link" href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a></li>
			
			
		<?endif?>
		<?$arResult["nStartPage"]++?>
	<?endwhile?>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

		
	<?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		<?if($arResult["NavPageCount"] > 1):?>
			<li class="">
			
			<?/*
			<a href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><span>22__<?=$arResult["NavPageCount"]?></span></a>
			*/?>
			
			..<li class="sectionCatalogNav__item"><a class="sectionCatalogNav__link" href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?></a></li>
			
			
			</li>
		<?endif?>
		
			<?/*
			<li class="bx-pag-next"><a href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><span>23__<?echo GetMessage("round_nav_forward")?></span></a></li>
			*/?>
			
			<li class="sectionCatalogNav__item"><a class="sectionCatalogNav__link" href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">></a></li>
			
			
			
			
	<?else:?>
		<?if($arResult["NavPageCount"] > 1):?>
		<?/*
			<li class="bx-active"><span>24__<?=$arResult["NavPageCount"]?></span></li>
			*/?>
			
			<li class="sectionCatalogNav__item"><span class="sectionCatalogNav__link"  style="font-weight: 700;"><?=$arResult["NavPageCount"]?></span></li>
			
			
		<?endif?>
		<?/*
			<li class="bx-pag-next"><span>25__<?echo GetMessage("round_nav_forward")?></span></li>
			*/?>
			<li class="sectionCatalogNav__item"><span class="sectionCatalogNav__link"  style="font-weight: 700;">></span></li>
			
			
	<?endif?>

	
	
	
	
	
	
	
	
	
	
		
		
		
		
		
		
		
	
<?/*====================================================================*/?>


	<?/*
		<li class="sectionCatalogNav__item"><a class="sectionCatalogNav__link" href="#"><</a></li>
	*/?>	
		
		<?/*
		
		<li class="sectionCatalogNav__item"><a class="sectionCatalogNav__link" href="#">1</a></li>
		<li class="sectionCatalogNav__item"><a class="sectionCatalogNav__link" href="#">2</a></li>
		<li class="sectionCatalogNav__item"><a class="sectionCatalogNav__link" href="#">3</a></li>
		<li class="sectionCatalogNav__item"><span class="sectionCatalogNav__link">4</span></li>
		<li class="sectionCatalogNav__item"><span class="sectionCatalogNav__link">...</span></li>
		<li class="sectionCatalogNav__item"><a class="sectionCatalogNav__link" href="#">10</a></li>
		
		
		<li class="sectionCatalogNav__item"><a class="sectionCatalogNav__link" href="#">></a></li>
		*/?>
		
		
	</ul>




<?/*

<br><br><br>
*/?>















<?/*


<div class="bx-pagination <?=$colorScheme?>">
	<div class="bx-pagination-container">
		<ul>
<?if($arResult["bDescPageNumbering"] === true):?>





	<?//Для кнопки назад?>
	<?if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		<?if($arResult["bSavePage"]):?>
			<li class="bx-pag-prev"><a href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><span>1__<?echo GetMessage("round_nav_back")?></span></a></li>
			<li class="">
			
<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">
			
			
			<a href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>">
			
			<span>2__1</span></a></li>
		<?else:?>
			<?if (($arResult["NavPageNomer"]+1) == $arResult["NavPageCount"]):?>
				<li class="bx-pag-prev"><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><span>3__<?echo GetMessage("round_nav_back")?></span></a></li>
			<?else:?>
				<li class="bx-pag-prev"><a href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><span>4__<?echo GetMessage("round_nav_back")?></span></a></li>
			<?endif?>
			<li class=""><a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><span>5__1</span></a></li>
		<?endif?>
	<?else:?>
			<li class="bx-pag-prev"><span>6__<?echo GetMessage("round_nav_back")?></span></li>
			<li class="bx-active"><span>7__1</span></li>
	<?endif?>

	
	
	
	
	
	
	<?
	$arResult["nStartPage"]--;
	while($arResult["nStartPage"] >= $arResult["nEndPage"]+1):
	?>
		<?$NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;?>

		<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
			<li class="bx-active"><span>8__<?=$NavRecordGroupPrint?></span></li>
		<?else:?>
			<li class=""><a href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><span>9__<?=$NavRecordGroupPrint?></span></a></li>
		<?endif?>

		<?$arResult["nStartPage"]--?>
	<?endwhile?>

	<?if ($arResult["NavPageNomer"] > 1):?>
		<?if($arResult["NavPageCount"] > 1):?>
			<li class=""><a href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=1"><span>10__<?=$arResult["NavPageCount"]?></span></a></li>
		<?endif?>
			<li class="bx-pag-next"><a href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><span>11__<?echo GetMessage("round_nav_forward")?></span></a></li>
	<?else:?>
		<?if($arResult["NavPageCount"] > 1):?>
			<li class="bx-active"><span>12__<?=$arResult["NavPageCount"]?></span></li>
		<?endif?>
			<li class="bx-pag-next"><span>13__<?echo GetMessage("round_nav_forward")?></span></li>
	<?endif?>

<?else:?>





<?//Для кнопки назад?>
	<?if ($arResult["NavPageNomer"] > 1):?>
		<?if($arResult["bSavePage"]):?>
			<li class="bx-pag-prev"><a href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><span>14__<?echo GetMessage("round_nav_back")?></span></a></li>
			<li class=""><a href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=1"><span>1</span></a></li>
		<?else:?>
			<?if ($arResult["NavPageNomer"] > 2):?>
				<li class="bx-pag-prev"><a href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><span>15__<?echo GetMessage("round_nav_back")?></span></a></li>
			<?else:?>
				<li class="bx-pag-prev"><a href="<?=$arResult["sUrlPath"]?>"><span>16__<?echo GetMessage("round_nav_back")?></span></a></li>
			<?endif?>
			<li class=""><a href="<?=$arResult["sUrlPath"]?>"><span>17__1</span></a></li>
		<?endif?>
	<?else:?>
			<li class="bx-pag-prev"><span>18__<?echo GetMessage("round_nav_back")?></span></li>
			<li class="bx-active"><span>19__1</span></li>
	<?endif?>
	
	
	
	
	
	

	<?
	$arResult["nStartPage"]++;
	while($arResult["nStartPage"] <= $arResult["nEndPage"]-1):
	?>
		<?if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):?>
			<li class="bx-active"><span>20__<?=$arResult["nStartPage"]?></span></li>
		<?else:?>
			<li class=""><a href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><span>21__<?=$arResult["nStartPage"]?></span></a></li>
		<?endif?>
		<?$arResult["nStartPage"]++?>
	<?endwhile?>





	
	<?if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):?>
		<?if($arResult["NavPageCount"] > 1):?>
			<li class="">
			
			<a href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><span>22__<?=$arResult["NavPageCount"]?></span></a>
			
			</li>
		<?endif?>
			<li class="bx-pag-next"><a href="<?=$arResult["sUrlPath"]?>?PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><span>23__<?echo GetMessage("round_nav_forward")?></span></a></li>
	<?else:?>
		<?if($arResult["NavPageCount"] > 1):?>
			<li class="bx-active"><span>24__<?=$arResult["NavPageCount"]?></span></li>
		<?endif?>
			<li class="bx-pag-next"><span>25__<?echo GetMessage("round_nav_forward")?></span></li>
	<?endif?>
	
	 
	
<?endif?>





<?if ($arResult["bShowAll"]):?>
	<?if ($arResult["NavShowAll"]):?>
			<li class="bx-pag-all"><a href="<?=$arResult["sUrlPath"]?>?SHOWALL_<?=$arResult["NavNum"]?>=0" rel="nofollow"><span>26__<?echo GetMessage("round_nav_pages")?></span></a></li>
	<?else:?>
			<li class="bx-pag-all"><a href="<?=$arResult["sUrlPath"]?>?SHOWALL_<?=$arResult["NavNum"]?>=1" rel="nofollow"><span>27__<?echo GetMessage("round_nav_all")?></span></a></li>
	<?endif?>
<?endif?>
		</ul>
		<div style="clear:both"></div>
	</div>
</div>



*/?>
