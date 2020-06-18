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





















	
		  
		  
<div class="blogpv">

  <div class="index-blog index-margin-content">

    <div class="index-news-header" style="margin: 55px 0 40px 0 !important;">
      <div class="index-news-header__col one" style="margin: 0px;margin-right: 5px;">
        <h2 class="index-news-header__title" style="    margin: 0px !important;">БЛОГ </h2>
      </div>
      <div class="index-news-header__col one" style="margin: 0px;">
        \ <a class="index-news-header__section" href="#"> Весь блог</a>
      </div>

    </div>

    <div class="index-blog__items">

      <div class="contentmiddle">
        <div class="contentinner">

					
					
					
<?
	
foreach ($arResult[PROPERTIES][blog][VALUE] as $value1) {
	$infoblokovara = CIBlockElement::GetByID($value1); //Получение элемента
	if($infoblokovara1 = $infoblokovara->GetNext()) // Метод вывод свойств в переменную
	$desc = $infoblokovara1['IBLOCK_ID']; // Присвоение ссылки хронящейся в массиве



	//Сбор данных о элементе галереи
	$arFilter4 = Array("IBLOCK_ID"=>$desc, "ID"=>$value1, "ACTIVE" => "Y");


	$res4 = CIBlockElement::GetList(Array(), $arFilter4);
	if ($ob4 = $res4->GetNextElement()){
		$arFields4 = $ob4->GetFields(); // поля элемента
		$arProps4 = $ob4->GetProperties(); // свойства элемента
	   }
	   
	   
	//   print_r($arFields4);
		
		$nameelem = $arFields4[NAME];
		
		if($arFields4[DATE_ACTIVE_TO])
			$date1 = $arFields4[DATE_ACTIVE_TO];
		else	
			$date1 = $arFields4[CREATED_DATE];
		
		
		$months = array( 1 => 'января', 'февраля', 'марта', 'апреля', 'мая',
    'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
$date = DateTime::createFromFormat('Y.m.d', $date1);
//echo $date->format('j ' . $months[$date->format( 'n' )] . ' Y');
		
		$dateok = $date->format('j ' . $months[$date->format( 'n' )] . ' Y');
		
		
		$picimg = CFile::GetPath($arFields4[PREVIEW_PICTURE]);
		
	
	
	echo "
					  
					  
			<div class='index-blog__item'>

				<div class='imgblog' style='background-image: url($picimg);'></div>
				<div class='index-blog__date'>$dateok</div><a class='index-blog__name' href='$arFields4[DETAIL_PAGE_URL]'>$arFields4[NAME]</a>
				
				
				<div class='textblogpv'>
				$arFields4[PREVIEW_TEXT]
				
				</div>
			
			
			
			</div>
					  
					  
					  
					  
					  
					  
					  
					  ";
	

				   
}
			
			
			
			
			
					
?>		
					
					
					
        </div>

      </div>

    </div>

  </div>

</div>
	
	
	
	
	
  
		  
		  
		  
<style>



	.blogpv .index-margin-content{
		margin-bottom: 55px !important;
		
	}


	.blogpv .imgblog{
		margin-bottom: 19px;
		
	}
	
	
	.blogpv .index-blog__name{
		    margin-bottom: 5px;
		
	}
	
	
	.blogpv .index-blog__date{
		    margin-bottom: 5px;
		
	}
	
	



	.blogpv .index-blog__item{
		vertical-align: top;
		
	}
	
	
	


	.blogpv .textblogpv{
		    width: 100%;
			white-space: normal;
			max-height: 60px;
			overflow: hidden;
		
	}



	.blogpv .imgblog{
		width: 100%;
		background-size: cover;
		background-repeat: no-repeat;
		
		
	}
	
	
	.blogpv .imgblog:before{
		content: "";
		display: block;
		padding-top: 50%;   
		  
	}



	.blogpv  .index-blog__items {
		margin-left: 0px;
	}
	
	.blogpv  .index-blog__name {
		height: 40px;
		overflow: hidden;
		white-space: pre-wrap;
	}
	
	.blogpv  {
		width: 100%;
		padding-left: 20px;
	}
	
	.blogpv  .index-blog__item {
		display: inline-block;
		margin-left: 0px;
		margin-right: 80px;
		width: calc(33.33334% - 53px);
		min-width: 272px;
	}
	
	.blogpv  .index-blog__item:last-child{
		margin-right: 0px;
		
		
	}
	
	
	
	
	
	.blogpv  .itemnews {
		display: inline-block;
		width: 300px;
		white-space: pre-wrap;
	}
	
	.blogpv  .index-blog.index-margin-content {
		width: unset;
	}
	
	.blogpv ::-webkit-scrollbar-thumb {
		border-radius: 0px !important;
		background-color: #f9a6a600 !important;
		background: rgba(0, 0, 0, 0);
	}
	
	.blogpv ::-webkit-scrollbar-track {
		background-color: #f9a6a600 !important;
		background: rgba(0, 0, 0, 0);
	}
	
	.blogpv ::-webkit-scrollbar-button {
		background-color: #f9a6a600 !important;
		background: rgba(0, 0, 0, 0);
		width: 5px;
		height: 0px;
		background-repeat: no-repeat;
	}
	
	@media (max-width:1270px) {
		
		.blogpv .index-blog__item{
			margin-right: 5%;
		}
		





.blogpv{
    padding-left: 0px;
}

.index-news-header{
    margin-left: 14px;

}


.index-blog__item:nth-child(1){
    margin-left: 14px;
}



.index-blog__item:nth-last-child(1){
    margin-right: 14px;
}


.blogpv .index-blog__item:last-child{
margin-right: 14px;
}


	}
	
	
</style>		  
		  

		  
		  



		  
		  
		  
		  
		  
		  
		  
		  


