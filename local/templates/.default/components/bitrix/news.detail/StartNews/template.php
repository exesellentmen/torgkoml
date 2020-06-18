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





















	
<div class="pvformob">	
	
	
	<div class="index-blog index-margin-content">
		  
            <div class="index-news-header" style="margin: 55px 0 40px 0 !important;">
              <div class="index-news-header__col one" style="margin: 0px;margin-right: 5px;">
                <h2 class="index-news-header__title" style="    margin: 0px !important;">НОВОСТИ </h2>
              </div>
			  <div class="index-news-header__col one" style="margin: 0px;">
                 \ <a class="index-news-header__section" href="#" > Все новости</a>
              </div>
			  
            </div>
			
			
			
			
			
					
					<div class="index-blog__items">
					
					<div class="contentmiddle">
				<div class="contentinner">
					
					
					
					
<?
	
foreach ($arResult[PROPERTIES][news][VALUE] as $value1) {
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
		
	
	
	echo "<div class='index-blog__item'>
						<div class='index-blog__date'>$dateok</div><a class='index-blog__name' href='$arFields4[DETAIL_PAGE_URL]'>$arFields4[NAME]</a>
					  </div>";
	

				   
}
			
			
			
			
			
					
?>		
					
					
					
					
					
					
					
					</div>
				
				</div>
			
			</div>
			
			
			
			
			
			
          </div>
	
</div>	
	
	
	
	
	
  
		  
		  
		  
<style>

	
		
		.pvformob .index-blog__items{
			margin-left: 0px;
			
		}
		
		
		
		.pvformob .index-blog__name{
			    height: 40px;
    overflow: hidden;
	    white-space: pre-wrap;
			
		}
		
		
		
		.pvformob{
			width: 100%;
			padding-left: 20px;
			
		}
		
		
		.pvformob .index-blog__item{
			display: inline-block;
			
			width: 200px;
			margin-left: 30px;
			
			
			margin-right: 30px;
			margin-left: 0px;
			width: 22%;
			min-width: 220px;
			
			
		}
		
		.pvformob .itemnews{
			display: inline-block;
			width: 300px;
			white-space: pre-wrap;
			
		}
		
		.pvformob .index-blog.index-margin-content{
			width: unset;
			
			
		}
		
		
					
			.pvformob ::-webkit-scrollbar-thumb {
				border-radius: 0px !important;
				background-color: #f9a6a600 !important;
				background: rgba(0, 0, 0, 0);
			}


			.pvformob ::-webkit-scrollbar-track {
				background-color: #f9a6a600 !important;
				background: rgba(0, 0, 0, 0);
			}
			
			
			.pvformob ::-webkit-scrollbar-button {
				background-color: #f9a6a600 !important;
				background: rgba(0, 0, 0, 0);
				width: 5px;
				height: 0px;
				background-repeat: no-repeat;
			}
			
		
		
		
	@media (max-width:1270px){	
		



.pvformob{
    padding-left: 0px;
}

.index-news-header{
    padding-left: 14px;
}

.index-blog__item:nth-child(1){
margin-left: 14px;
}

		
		
		
		
	}
	



</style>		  
		  
		  
		  



		  
		  
		  
		  
		  
		  
		  
		  


