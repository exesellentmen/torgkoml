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




<div class="wrapper__col left">
  <aside class="sectionCatalogMenu">
    <ul class="sectionCatalogMenu__items">

<?



$IBLOCK_ID    = $arResult[ID];
$arFilter    = Array(
      'IBLOCK_ID'=>$IBLOCK_ID, 
      'GLOBAL_ACTIVE'=>'Y');
$obSection    = CIBlockSection::GetList(Array("SORT"=>"ASC"),$arFilter,false,Array("UF_LINK_SECTION"));

while($arResult = $obSection->GetNext()){
	

   
if($arResult['DEPTH_LEVEL'] == 1) { ?>


	<li class="sectionCatalogMenu__item  <?
				
				$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
				
				if(strpos($url, $arResult["UF_LINK_SECTION"])){
				echo "active ";
				}?>">
	
	<a class="sectionCatalogMenu__link catalog-section-list-item-img correctclass" href="/katalog-tovarov-3/<?=$arResult["UF_LINK_SECTION"];?>" 

	style=""

	>
		<?=$arResult[NAME];?>
	</a>

	
	
	
	<? }




	$arFilter1    = Array(
		 'IBLOCK_ID'=>$IBLOCK_ID, 
		 'GLOBAL_ACTIVE'=>'Y',
		  'SECTION_ID' =>  $arResult['ID']
		  );
		  $res = CIBlockElement::GetList(Array(), $arFilter1 , false, Array("nPageSize"=>50));
		  
		
	if($res){	?>
		<ul class="sectionCatalogMenuSub">
          
			<?
			  
			while($ob = $res->GetNextElement())
			{
				$arFields = $ob->GetFields();
				$arProps = $ob->GetProperties();
				
				?>
				<div class="sectionCatalogMenuSub__item
				
				">
				<a class="sectionCatalogMenuSub__link" href="/katalog-tovarov-3/<?=$arProps['link'][VALUE];?>"><?=$arFields[NAME];?></a>
				</div>
				<?
			  
			}
			?>
		</ul>
		<?
		
	}




   
if($arResult['DEPTH_LEVEL'] == 1) {?>
	</li>
	<?}
	
	

}
?>

    </ul>
  </aside>
</div>









