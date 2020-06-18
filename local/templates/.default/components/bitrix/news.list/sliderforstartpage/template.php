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



<style>

</style>




<?
$IBLOCK_ID1    = 5;
$arFilter1    = Array(
      'IBLOCK_ID'=>$IBLOCK_ID1, 
	  'IBLOCK_SECTION_ID' => 53,
      'GLOBAL_ACTIVE'=>'Y');
	  
$obSection1    = CIBlockSection::GetTreeList($arFilter1,$arSelect=Array("UF_LINKVIDEO"));

	if($arResult1 = $obSection1->GetNext())
	if($arResult1[UF_LINKVIDEO])
	{
	/*	echo"
		<video class='vid2' id='myVideo'  autoplay loop muted playsinline >
		<source src='$arResult1[UF_LINKVIDEO]' type='video/webm'>
		</video>";
		*/
		echo"
		<video  class='vid2' autoplay loop muted playsinline poster='video_thumbnail/thumbanil.jpg' src='/local/templates/assest/qqq.mp4'>
        <source src='$arResult1[UF_LINKVIDEO]' type='video/mp4'></source>
     </video>";
		
		
		
	}
	else
	{
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

	
		
		
		
		<?
	}

?>




 <?/*
 <video class="vid2" id="myVideo" muted="muted" autoplay="" loop="" playinline="" >
 <source src="/local/templates/assest/video3.webm" type="video/webm">
 </video>
 
 <?
 print_r($arResult);
 ?>
 
 
 */?>
 
 
 
 
 
 
 




	















