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
	
	.pvfooter .cell1, .pvfooter .cell2, .pvfooter .cell3, .pvfooter .cell4, .pvfooter .cell5{
		
		display:inline-block;
		padding: 5px;
		    background-color: unset !important;
		
	}
	
	.pvfooter .footer-subscribe__title{
		width: 100%;
		
	}
	
	
	
	.pvfooter .cell1{
			width: 15%;
		background-color: violet;
		letter-spacing: 0px;
		display: inline-block;
		vertical-align: top;
		
	}
	
	.pvfooter .cell2{
		width: 15%;
		background-color: #ceb0ce;
		letter-spacing: 0px;
		display: inline-block;
		vertical-align: top;
		
	}
	
	.pvfooter .cell3{
		width: 24%;
		background-color: #9de0a8;
		letter-spacing: 0px;
		display: inline-block;
		vertical-align: top;
		
	}
	
	.pvfooter .cell4{
		width: 26%;
		background-color: #87bdb1;
		letter-spacing: 0px;
		display: inline-block;
		vertical-align: top;
			
	}
	
	.pvfooter .cell5{
		width: 20%;
		background-color: violet;
		letter-spacing: 0px;
		display: inline-block;
		vertical-align: top;
		
	}	
	
	.pvfooter .container{
		letter-spacing: -4px;
		width: 100%;
		
	}
	
	
	.pvfooter .footer-subscribe , .pvfooter .footer-subscribe__info , .pvfooter .footer-subscribe__form , .pvfooter .footer-subscribe__row , .pvfooter .footer-subscribe-input , .pvfooter .footer-subscribe__row , .pvfooter .footer-subscribe__row , .pvfooter .footer-menu{
		width:90%
		
	}
	
	.container{
		padding: 0px !important;
	}
	
	
	@media(max-width:1270px){
		.pvfooter .cell1, .pvfooter .cell2, .pvfooter .cell3 {
			display: none;
		}
		
		
		.pvfooter .cell5{
			width: 40%;
			
		}
		
		.pvfooter .cell4{
			width: 60%;
			
		}
		
		.pvfooter  .forphone{
			max-width: 300px;
			margin: auto;
			
		}
		.cell4 .footer-subscribe{
			max-width: 400px;
			margin: auto;
			
		}	
	}
	
	
	
	
	
	@media(max-width:768px){
		
		 
		.pvfooter .cell4{
			display: block;
			width: 100%;
			
		}
		.pvfooter .footer-subscribe{
			width: 80%;
    margin: auto;
			
		}
		.footer-subscribe__form, .footer-subscribe__row, .footer-subscribe-input, .pvfooter .cell5{
			width: 100%;
			
		}
		
		.footer-subscribe__row{
			text-align: center;
    width: 100%;
			
		}
		
		.pvfooter .cell5{
			display: block;
    width: 100%;
			
		}
		
		.pvfooter .cell5{
			margin-top: 20px;
			
		}
		
		.pvfooter .footer{
			padding: 24px 10px;
			
		}
		
		
		.cell5 .forphone, .cell4 .footer-subscribe {
			max-width: 400px;	
		}
		
		.pvfooter .footer-subscribe {
			width: unset;
		}
		
		
		
		.pvfooter .footer-subscribe-input, .pvfooter .footer-subscribe__row, .pvfooter .footer-subscribe__form{
			width: 100%;
		}
	
	}

</style>
	  
	  
	  

	  
	  
	  
	  
	  
	  
	  
	  
<div class="pvfooter">  
	<footer class="footer" id="footer">
	
		<div class="container">
		
			<div class="cell1">
				<ul class="footer-menu">
				
					
					<?
						$ii1 = 0;
					
						foreach ($arResult[PROPERTIES][linklist][VALUE] as $value1) {
							
							$uu = $arResult[PROPERTIES][linklist][DESCRIPTION][$ii1];
							
							echo "<li class='footer-menu__item'><a class='footer-menu__link' href='$uu'>$value1</a></li>";
							
							$ii1++;
							
							if($ii1==11)break;
							
							
						}
					
					
					?>
					
				</ul>
			</div>
			
			<div class="cell2">
				<ul class="footer-menu">
				
				
				
					<?
						$ii1 = 0;
					
						foreach ($arResult[PROPERTIES][linklist][VALUE] as $value1) {
							$ii1++;
							$uu = $arResult[PROPERTIES][linklist][DESCRIPTION][$ii1];
							if($ii1>11)
							echo "<li class='footer-menu__item'><a class='footer-menu__link' href='$uu'>$value1</a></li>";	
						}
					
					
					?>
				
				</ul>	
			</div>
			
			<div class="cell3">
			
				<div class="footer-address">
					<div class="footer-address__title">Адрес офиса и шоу-рума:</div>
					<div class="footer-address__item"><? echo html_entity_decode($arResult[PROPERTIES][adress][VALUE][TEXT])?></div>
				</div>
				  <div class="footer-address">
					<div class="footer-address__title">Время работы:</div>
					<div class="footer-address__item"><?=html_entity_decode($arResult[PROPERTIES][timework][VALUE][TEXT])?></div>
				  </div>
              <div class="footer-address">
                <div class="footer-address__title">Выходные:</div>
                <div class="footer-address__item"><?=html_entity_decode($arResult[PROPERTIES][holiday][VALUE][TEXT])?></div>
              </div>
              <div class="footer-smo">
                <div class="footer-smo__title">Мы в соц. сетях</div>
                <div class="footer-smo__items"><a class="footer-smo__item" href="#">
                    <div class="icon-footer-inst"></div></a><a class="footer-smo__item" href="#">
                    <div class="icon-footer-facebook"></div></a><a class="footer-smo__item" href="#">
                    <div class="icon-footer-vk"></div></a><a class="footer-smo__item" href="#">
                    <div class="icon-footer-twitter"></div></a></div>
                <div class="footer-smo__tag">#torgkomplekt_ru</div>
              </div>
				
			</div>
			
			<div class="cell4">
			
					<div class="footer-subscribe">
					<div class="footer-subscribe__title">
					  Подпишитесь на наши обновления, чтобы получать e-mail рассылки
					  с новыми поступлениями, скидками и предложениями.
					</div>
					<div class="footer-subscribe__info">Оставьте вашу электронную почту</div>
					<form class="footer-subscribe__form" action="" method="post">
					  <div class="footer-subscribe__row">
						<div class="footer-subscribe-input">
						  <input class="footer-subscribe-input__text" type="text" placeholder="Введите  Ваш e-mail...">
						</div>
					  </div>
					  <div class="footer-subscribe__row">
						<div class="footer-subscribe-polity">
						  <div class="footer-subscribe-polity__col one">
							<label>
							  <div class="footer-subscribe-polity-checkbox">
								<input class="footer-subscribe-polity-checkbox__type" type="checkbox">
								<div class="footer-subscribe-polity-checkbox__style"></div>
							  </div>
							</label>
						  </div>
						  <div class="footer-subscribe-polity__col two">
							<div class="footer-subscribe-polity__text">Я согласен с <a class="footer-subscribe-polity__link" href="#">политикой конфиденциальности</a></div>
						  </div>
						</div>
					  </div>
					  <div class="footer-subscribe__row">
						<input class="footer-subscribe__submit btn-common-border-white" type="submit" value="Подписаться">
					  </div>
					</form>
				  </div>
			
			
			
				
			</div>
			
			<div class="cell5">
			
			<div class="forphone">
			
				<div class="footer-address">
					<div class="footer-address__title">Исполнительный директор</div>
					<?=html_entity_decode($arResult[PROPERTIES][supervisor][VALUE][TEXT])?>
					
					
					
				</div>
				<div class="footer-address">
					<div class="footer-address__title">Отдел продаж:</div>
					<?=html_entity_decode($arResult[PROPERTIES][selldepartment][VALUE][TEXT])?>
				</div>
				<div class="footer-address">
					<div class="footer-address__title">Для Москвы и МО:</div>
					<?=html_entity_decode($arResult[PROPERTIES][formoscow][VALUE][TEXT])?>
				</div>
			
			<div>
			
			
				
			</div>




		</div>
	</footer>

  
  
  
</div>  
	  
	  



























































	
<?/*		  
		  
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
		
		
	}
	
	
</style>		  
		  

		  
*/?>		  



		  
		  
		  
		  
		  
		  
		  
		  


