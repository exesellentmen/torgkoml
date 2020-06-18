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


<?

	$value1 = $arResult[PROPERTIES][seoarticle][VALUE];

	$infoblokovara = CIBlockElement::GetByID($value1); //Получение элемента
					if($infoblokovara1 = $infoblokovara->GetNext()) // Метод вывод свойств в переменную
					$desc = $infoblokovara1['IBLOCK_ID']; // Присвоение ссылки хронящейся в массиве
					
					//Сбор данных о элементе галереи
					$arFilter4 = Array("IBLOCK_ID"=>$desc, "ID"=>$value1);
					
					$res4 = CIBlockElement::GetList(Array(), $arFilter4);
					if ($ob4 = $res4->GetNextElement()){
						$arFields4 = $ob4->GetFields(); // поля элемента
						$arProps4 = $ob4->GetProperties(); // свойства элемента
					   }
				   
?>


		  
		<div class="pvtext">  
		  
		  
		  <h2 class="page-index__title" style="margin-left: 25%; margin-right: 25%; text-align: left;"><?=$arFields4[NAME];?></h2>
          <div class="page-index__description">
            <?=$arFields4[DETAIL_TEXT];?>
          </div>
		  
		  
		  
		</div>  
		  
		  
		  
		  
		  <style>
		  
			  .pvtext{
				  margin-bottom: 50px;
				  
				  
			  }
			  
			  .pvtext .page-index__description{
				  max-width: 715px;
					margin: auto !important;
				  
				  
			  }
  
			.pvtext .page-index__title{
				margin-left: 10% !important;
				margin-right: 10% !important;
				text-align: center !important;
			  
			}
				
			@media(max-width:700px){
				.pvtext .page-index__description{
					margin-left: 12px !important;
					margin-right: 12px !important;	
				} 
			}
	
		  </style>
		  
