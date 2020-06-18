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
?>




 





<div class="banner-index">
    <div class="banner-index__items">
		  
		<?
			foreach($arResult[ITEMS] as $items){
				echo "
				<div class='banner-index__item'>
				  <div class='banner-index__pic'><img src='".CFile::GetPath($items[PROPERTIES][photo1][VALUE])."' class='banner-index__img' alt=''></div><a class='banner-index__link' href='".$items[PROPERTIES][directlink][VALUE]."'>".$items[NAME]."</a>
				</div>
				";
			}
		?>
		
    </div>
</div>

	















