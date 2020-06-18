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



.pavbtn{
	
	height: 13vw !important;
	
}


.headdrodown.testarrow.activeheader{
	
	
    position: fixed;
    top: 51px;
    width: 89%;
    background-color: white; 
}


.headdrodown.testarrow.activeheader  .text2row{
font-size: 0.875rem !important;

}



.drodownsection.testarrow.activesection{
	 /*   margin-top: 61px; */
	
	
}






.headdrodown.testarrow{
	padding: 22px 25px 22px 20px;	

}



.headdrodown, .allgoods, .cellhead {
	font-family: Open Sans !important;
	font-style: normal !important;
	font-weight: normal;
	font-size: 0.875rem !important;
	line-height: 16px !important;
	color: #2F2F2F !important;
	
}


.activeheader .cellhead{
	font-size: 0.875rem !important;
    font-weight: 600 !important;
	
}



.headdrodown.testarrow{
	    font-size: 1rem !important;
    font-weight: 600 !important;
	
	
}



.testarrow:first-child:not(:only-of-type), .activeheader{
	background-size: 12px;
	
}

.activeheader .cellimg, .activeheader .cellhead{
    background-image: unset !important;
	padding: unset !important;
	
}






.drodownmenu{
	cursor:pointer;
	
}

.index-smo-list.soc{
    margin-bottom: 50px;	
}

.tablepoint{
	padding-right: 24px;
	display: table;
}

.cellimg{
    display: table-cell;
    padding: 0 42px 30px 0;
	    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
}

/*
.im2{
	padding: 0 23px 23px 0;
	
}
*/

.cellhead{
	vertical-align: middle;
    display: table-cell;
    padding-left: 10px;
}

/*
.cellhead2{
    padding-left: 26px !important;
}
	*/	


 .soc.index-smo-list__title{
	     font-size: 14px;
	 
	 
 }

.icon-inst.soc, .icon-vk.soc, .icon-facebook.soc, .icon-twitter.soc{
	width: 35px !important;
    height: 35px !important;
	font-size: 1.5rem;
    line-height: 35px;
    border-radius: 20px;
    border: 1px solid #212529!important;
	background-image: unset;
}


	
}

.icon-inst.soc{
/*	background-image: url(/local/templates/assest/img/forsectionmenu/instsoc.png) !important;*/
	
}


.icon-vk.soc{
/*	background-image: url(/local/templates/assest/img/forsectionmenu/vksoc.png) !important;*/
	
}

.icon-facebook.soc{
/*	background-image: url(/local/templates/assest/img/forsectionmenu/facebook.png) !important;*/
	
}

.icon-twitter.soc{
/*	background-image: url(/local/templates/assest/img/forsectionmenu/twitsoc.png) !important;*/
	
}



.index-smo-list__tag.soc{
	
	font-size: 14px;
}



 
.btncls{
	padding-left: 5%;
	    font-size: 26px;
    cursor: pointer;
    text-align: center;
    position: fixed;
    right: 0px;
    line-height: 61px;
    width: 13%;
    height: 79px;
    background-color: white;
    z-index: 9999;
    top: 50px;
}


	
.activeheader .cellhead, .activeheader{
font-weight: 600 !important;
}




.soc.index-smo-list__title, .index-smo-list__tag.soc{
	
	    font-size: 3vh;
	
}



.icon-inst.soc, .icon-vk.soc, .icon-facebook.soc, .icon-twitter.soc {
    width: 10vw !important;
    height: 10vw !important;
    font-size: 5vw;
    line-height: 10vw;
    border-radius: 10vw;
    border: 1px solid #212529!important;
    background-image: unset;
}




</style>



<?
/*
<div class="lnr lnr-cross btncls">

</div>
*/

?>



<div class="menufix">
<div style="display: block;height:100%;position: relative;width: 96%;margin: auto;">

<div class="icomenufix burger" style="
    
">
<span class="lnr lnr-menu vertmiddle"></span>
</div>

<div class="icomenufix logomenufix" style="
    
"></div>





<div class="icomenufix cart"><span class="lnr lnr-cart vertmiddle"></span></div>
<div class="icomenufix like"><span class="lnr lnr-heart vertmiddle"></span></div>
<div class="icomenufix comparison"><span class="lnr lnr-sort-amount-asc vertmiddle"></span></div>
<div class="icomenufix profile"><span class="lnr lnr-user vertmiddle"></span></div>
<div class="icomenufix search"><span class="lnr lnr-magnifier vertmiddle"></span></div>


</div>
</div>










			
				
<? require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php'); 
if(!CModule::IncludeModule("iblock"))
return; 
?>



<?/*
<style>
.menufix, .drodownmenu{
opacity: 0.3;
}


.panelmenu.menuactive{

background-color: #00ff9c66;
}
</style>
*/?>



<div class="lnr lnr-cross btncls">

</div>



<!-- Панель Меню -->
<div class="panelmenu menudeactive"  data-role="header"> 







	<!-- Начало меню -->
	<div class="drodownmenu">
	
	
	
	
		
	
	
			
		<?
		$IBLOCK_ID    = 4;
		$arFilter    = Array(
			  'IBLOCK_ID'=>$IBLOCK_ID, 
			  'GLOBAL_ACTIVE'=>'Y');
		$obSection    = CIBlockSection::GetTreeList($arFilter,$arSelect=Array("UF_LINKSECT","UF_IMGSECT1"));

		while($arResult = $obSection->GetNext()){
			
			
			
			
			
			echo "
			
			
			
			
			
	
		<!-- Раздел I -->
		<div class='drodownsection'>
		
			<!-- Заголовок -->
			<div class='headdrodown testarrow'  style='padding-top: 22px !important;    padding-bottom: 22px !important;'>
				<div class='text2row'>$arResult[NAME]</div>
			</div>";	
			
			
			
			
			
			
		// Назначение фильтра по инф блоку, по id категории
		 $arFilter1    = Array(
		  'IBLOCK_ID'=>$IBLOCK_ID, 
		  'GLOBAL_ACTIVE'=>'Y',
		  'SECTION_ID' =>  $arResult['ID']
		  );
		  
			$res = CIBlockElement::GetList(Array(), $arFilter1 , false);
			$res2 = CIBlockElement::GetList(Array(), $arFilter1 , false);
			
	  
		//Проверка на наличие подразделов и вывод вступления
		if ($el = $res2->Fetch()){
			
			echo "
			<!-- Элементы Раздела -->
			<div class='drodownsection testarrow'>
				
				
			
			
				<!-- Просмотреть все товары -->
				<div class='allgoods' style='background-color: #EEEEEE; padding: 22px 8px 22px 70px;'>
					<a href='$arResult[UF_LINKSECT]'>Просмотреть все товары</a>
				</div>";
				
				//Вывод подразделов
			while($ob = $res->GetNextElement())
			{
				
				$arFields = $ob->GetFields();
				$arProps = $ob->GetProperties();
				
				//Определение свойств подразделов
				
				$namesection = $arFields['NAME']; //Наименование подраздела
				$linksection = ""; //Ссылка на подраздел
					if($arProps[Linkonsection][VALUE])
						$linksection = $arProps[Linkonsection][VALUE];
						else{
							if($arProps[Linksect][VALUE]){
								
								$urlelem = CIBlockElement::GetByID($arProps[Linksect][VALUE]); //Получение элемента
								if($urlelem1 = $urlelem->GetNext()) // Метод вывод свойств в переменную
								$desc = $urlelem1['DETAIL_PAGE_URL']; // Присвоение ссылки хронящейся в массиве
								$linksection = $desc;
								
							}else{
							
							$urlelem = CIBlockElement::GetByID($arProps[Linkonitem][VALUE]); //Получение элемента
							if($urlelem1 = $urlelem->GetNext()) // Метод вывод свойств в переменную
							$desc = $urlelem1['DETAIL_PAGE_URL']; // Присвоение ссылки хронящейся в массиве
							$linksection = $desc;
							}
						}
						
					$icosection = CFile::GetPath($arProps['icoimg']['VALUE']); //Вывод Иконки подпункта
					
				


					
					
				
				
				echo "<!-- Раздел II -->
				<div class='drodownsection'>
				
					<!-- Заголовок -->
					<div class='headdrodown testarrow' style='padding-top: 22px !important;
    padding-bottom: 22px !important;'>
					<div class='tablepoint'>
						<div class='cellimg' style='background-image: url($icosection);'></div>
						<div  class='cellhead'>
						<div class='text3row'>
						
						$namesection</div></div>
					</div>	
						
						
					</div>";
					
					
					if($arProps[Linkslistnew][VALUE]){
						
					echo"
					<!-- Элементы Раздела -->
					<div class='drodownsection'>
				
				
					
					
					
						<!-- Просмотреть все товары -->
						<div class='allgoods' style='background-color: #EEEEEE; padding: 22px 8px 22px 70px;'>
							<a href='$linksection' >Просмотреть все товары</a>
						</div>";
						
						
						
						//   Вывод списка ссылок
							$arFilter3_linksnew = Array("IBLOCK_ID"=>5, "ID"=>$arProps[Linkslistnew][VALUE]);
							$arSelect_linksnew = Array("ID", "NAME", "PROPERTY_photo1", "PROPERTY_directlink", "PROPERTY_link");
							$res3_linksnew = CIBlockElement::GetList(Array(), $arFilter3_linksnew, $arSelect_linksnew);
							
							
							while($ob3_linksnew = $res3_linksnew->GetNextElement()){
								$arFields3_linksnew = $ob3_linksnew->GetFields(); // поля элемента
								$arProps3_linksnew = $ob3_linksnew->GetProperties(); // свойства элемента	
								
								//if($arProps3_linksnew[directlink][VALUE])
								$linkdesc_linksnew =  $arProps3_linksnew[directlink][VALUE];
							
							
							
							
							
								//Вывод ссылки на изображение
								$linkimg1_linksnew = CFile::GetPath($arFields3_linksnew[PROPERTY_PHOTO1_VALUE]);
								
								//Вывод Заголовка для изображения
								$headimg1_linksnew = $arFields3_linksnew[NAME];
								
								
								
								
							
								echo"
								<div class='drodownitem'>
									<a class='' href='$linkdesc_linksnew'>
										<div class='tablepoint'>
											<div class='cellimg im2' style='background-image: url($linkimg1_linksnew);'></div>
											<div  class='cellhead cellhead2'>
											<div class='text2row'>
											$headimg1_linksnew</div>
											
											</div>
										</div>	
									
									
									</a>
								</div>";
							
							
							
							}
						
						
					echo "</div>";}
					
					
					
					echo "</div>";
			}
				
				
			echo"</div>";
			
			
		}
			
		echo"</div>";
			
			
		}
		?>
	
	
	</div>
	<!-- Конец меню -->
	
	
	
	
	<div style="    margin-top: 20px;">
	
	<div style="    margin: 0 auto;    width: max-content; text-align: center; width: 100%;">
	
		<button class="header-middle-btn__button btn-common-empty openPopoupleaveRequest pavbtn" data-id-form="#orderCallback" style="margin: auto; width: 80%;">Заказать звонок</button>
		
		<button class="header-middle-btn__button btn-common-black openPopoupleaveRequest pavbtn" data-id-form="#orderEquipment" style="width: 80%; margin: 14px 0 25px 0;">Подобрать оборудование</button>
		
		
		<div class="index-smo-list  soc">
                    <div class="index-smo-list__title  soc">Следите за нами в соц.сетях:</div>
                    <div class="index-smo-list__items  soc">
					
					
					<a class="index-smo-list__item toggleTitle instpv soc" href="#" data-title="Instagram">
					
                        <div class="icon-inst  soc fa fa-instagram"></div></a>
						
						
						
						<a class="index-smo-list__item toggleTitle soc" href="#" data-title="Vkontakte">
						
						<div class="icon-vk fa fa-vk soc"></div>
						
						</a>
						
						
						
						<a class="index-smo-list__item toggleTitle soc" href="#" data-title="Facebook">
                        <div class="icon-facebook  soc fa fa-facebook"></div></a><a class="index-smo-list__item toggleTitle soc" href="#" data-title="Twitter">
                        <div class="icon-twitter  fa fa-twitter  soc"></div></a></div>
                    <div class="index-smo-list__tag  soc">#torgkomplekt_ru</div>
                  </div>
		
		
		
	</div>
	
	
	
	</div>
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
</div>







<div style="
    padding-top: 65px;
    background: #2F2F2F;
">

	<div style="
    padding-left: 10px;
    padding-right: 10px;
    color: #FFFFFF;
	    display: table;
    width: 100%;
">
	<div style="
    display: table-cell;
    font-family: Open Sans;
    font-style: normal;
    font-weight: 500;
    font-size: 12px;
    line-height: 16px;
	    vertical-align: top;
		width: 100px;
">8 (800) 302-02-90<br>8 (800) 302-02-90</div> <div style="padding: 0 24px 24px 0;display: table-cell;background: url(/local/templates/eshop_bootstrap_v4/assets/img/whatsapp.png) no-repeat 0 0;"></div> <div style="
    font-family: Open Sans;
    font-style: normal;
    font-weight: 500;
    font-size: 11px;
    line-height: 15px;
    display: table-cell;
">
<div style="float: right;">
Пн-пт 9:00-18:00<br>Рублевское шоссе, д. 28, к.2
</div>
</div>


	</div>
  


 

<div style="    margin-top: 25px; padding-bottom: 16px;">
	
	<div style="    margin: 0 auto;    width: max-content; text-align: center;    width: 80%; ">
	
		<button class="header-middle-btn__button btn-common-empty openPopoupleaveRequest pavbtn" data-id-form="#orderCallback" style="margin: auto;font-size: 12px;    font-weight: 600;width: 100%;">Заказать звонок </button>
		
		<button class="header-middle-btn__button btn-common-empty openPopoupleaveRequest pavbtn" data-id-form="#orderCallback" style="margin: auto; margin-top:14px;font-size: 12px;    font-weight: 600;width: 100%;">Заказать оборудование</button>

</div>

</div>









</div>




















<style>

.text2row, .text3row{

	
	overflow:hidden;
	
	max-height:34px;
	max-width: 100%;
}

/*
.headdrodown.testarrow.activeheader{
	
	background-color: #f5deb357;
}
*/


.header-middle-btn__button btn-common-empty.openPopoupleaveRequest{
	text-align: center;
	
}

.panelmenu{
	padding: 0px 0px 1px 0px;
	margin-top: 51px;
	
	
}


.btncls{
width: 11%;
padding-left: 2%;
z-index: 100;


}


.drodownsection.testarrow.activesection {
    background-color: #00ffff6e;
}


.headdrodown.testarrow.activeheader{
	/*    position: unset;
	    width: unset;
	*/
	z-index: 9999;
}

</style>















<script>



    



/*
$("body").css("overflow","hidden");
*/



$('.btncls').css("display","none");


var start = true;


	$('.burger').on('click', function() {
		
		$('.panelmenu').toggleClass('menuactive menudeactive');
		
		
		$('.btncls').css("display","block");
		$("body").css("overflow","hidden");
		
		
		$("body").addClass("nonescroll");
		
		if(start){
			var po1 = $(".panelmenu > .drodownmenu > .drodownsection").height();
			$('.btncls').height(po1);
		}
		
		start = false;
		
		
		  
	});
	

	$('.btncls').on('click', function() {
		$('.panelmenu').addClass('menudeactive').removeClass('menuactive');
		
		//$('.panelmenu').toggleClass('menuactive menudeactive');
		
		
		
		$("body").removeClass("nonescroll");
		$("body").css("overflow","auto");
		  
	});



jQuery(function($){
	$(document).mouseup(function (e){ // событие клика по веб-документу
		var div = $(".panelmenu"); // тут указываем ID элемента
		if (!div.is(e.target) // если клик был не по нашему блоку
		    && div.has(e.target).length === 0) { // и не по его дочерним элементам
		//	div.hide(); // скрываем его
			
			//Проверка, есть ли активный класс
			if($(".panelmenu").hasClass('menuactive')){
			
			$('.panelmenu').removeClass('menuactive').addClass('menudeactive');
			$('.btncls').css("display","none");
			$("body").removeClass("nonescroll");
			$("body").css("overflow","auto");
			}
			
			
		}
	});
});








//Вниз по каталогу
	$('.headdrodown').on('click', function() {
		
		
		//Проверка, есть ли активный класс
		if($(this).hasClass('activeheader')){
			
			
			//Открываем раздел
	  $(this).parent('.drodownsection').children('.drodownsection').removeClass('activesection');
	  //Открываем его элементы
	  $(this).parent('.drodownsection').children('.drodownsection').children('.drodownsection').removeClass('activesection');
	  //Скрываем соседние элементы раздела
	  $(this).parent('.drodownsection').siblings('.drodownsection').removeClass('noneactive');
	  //Меняем стиль заголовка в зависимости от клика
	  $(this).parent('.drodownsection').children('.headdrodown').removeClass('activeheader');
	  //Скрываем кнопку все товары
	  $(this).parent('.drodownsection').siblings('.allgoods').removeClass('noneactive');
	  //Скрытие заголовка родительского раздела
	  $(this).parent('.drodownsection').parent(".drodownsection").siblings('.headdrodown').removeClass('noneactive');
	  
	  
	  //Скрываем кнопку все товары
	  $(this).siblings('.drodownsection').children('.drodownitem').removeClass('activesection');
	  
	  //Скрываем кнопку все товары
	  $(this).parent('.drodownsection').siblings('.drodownitem').removeClass('noneactive').addClass('activesection');
	 // $("body").css("overflow","auto");
	 $(this).parent('.drodownsection.activesection').siblings(".headdrodown.testarrow.activeheader").css("display","block");
	 
	 $('.panelmenu ').animate({ scrollTop: 0 }, 0);
	 
	 if($(this).parent('.drodownsection').parent('.drodownsection').siblings('.headdrodown').height()){
		 
	//  alert($(this).parent('.drodownsection').parent('.drodownsection').siblings('.headdrodown').height() + 45); // Определение ширины поля
	  
	  
	  
	  var po = $(this).parent('.drodownsection').parent('.drodownsection').siblings('.headdrodown').height() + 45;
	  $('.btncls').height(po);
	  
	  $('.panelmenu').css("margin-top",(po+50)+"px");
	  
	 
	 } 
	 else{
		 $('.panelmenu').css("margin-top","51px");
		 
		 /*
		 $('.btncls').css("width","9%");
		$('.btncls').css("padding-left","0px");
		 */
		 
	 }
	 
	 
	 
	 
			 
		 }
		 else{
		
		
		$('.panelmenu ').animate({ scrollTop: 0 }, 0);
		
		
		
	/*
		$('.btncls').css("width","11%");
		$('.btncls').css("padding-left","0px");
		*/
		
		
		
		
		
	  //Открываем раздел
	  $(this).parent('.drodownsection').children('.drodownsection').addClass('activesection');
	  //Открываем его элементы
	  $(this).parent('.drodownsection').children('.drodownsection').children('.drodownsection').addClass('activesection');
	  //Скрываем соседние элементы раздела
	  $(this).parent('.drodownsection').siblings('.drodownsection').addClass('noneactive');
	  //Меняем стиль заголовка в зависимости от клика
	  $(this).parent('.drodownsection').children('.headdrodown').addClass('activeheader');
	  //Скрываем кнопку все товары
	  $(this).parent('.drodownsection').siblings('.allgoods').addClass('noneactive');
	  //Скрытие заголовка родительского раздела
	  $(this).parent('.drodownsection').parent(".drodownsection").siblings('.headdrodown').addClass('noneactive');
	 
		$(this).parent('.drodownsection.activesection').siblings(".headdrodown.testarrow.activeheader").css("display","none");
	  
	 
	  //Скрываем кнопку все товары
	  $(this).siblings('.drodownsection').children('.drodownitem').addClass('activesection');
	  
	  //Скрываем кнопку все товары
	  $(this).parent('.drodownsection').siblings('.drodownitem').addClass('noneactive').removeClass('activesection');
	  
	  
	  
	  
	  //Тестовая запись
	//	$(".headdrodown.testarrow.activeheader").css("padding","22px 20px 22px 70px !important");
		

	//alert($(this).height()+45);
		
		
		 var po = $(this).height()+45;
		 
		 $('.panelmenu').css("margin-top",(po+50)+"px");
		 
		 
	  $('.btncls').height(po);


		
		 }
		
		
		
	  
	});










</script>












































<?/* Заготовка меню


<div class="menufix">
<div style="display: block;height:100%;position: relative;width: 96%;margin: auto;">

<div class="icomenufix burger" style="
    
">
<span class="lnr lnr-menu vertmiddle"></span>
</div>


<div class="icomenufix logomenufix" style="
    
"></div>








<div class="icomenufix cart"><span class="lnr lnr-cart vertmiddle"></span></div>
<div class="icomenufix like"><span class="lnr lnr-heart vertmiddle"></span></div>
<div class="icomenufix comparison"><span class="lnr lnr-sort-amount-asc vertmiddle"></span></div>
<div class="icomenufix profile"><span class="lnr lnr-user vertmiddle"></span></div>
<div class="icomenufix search"><span class="lnr lnr-magnifier vertmiddle"></span></div>


</div>
</div>




<!-- Панель Меню -->
<div class="panelmenu menudeactive"  data-role="header"> 


	<!-- Начало меню -->
	<div class="drodownmenu">
	
		<!-- Раздел I -->
		<div class="drodownsection">
		
			<!-- Заголовок -->
			<div class="headdrodown testarrow">
				Вложенный 1 = 1
			</div>	
			
			<!-- Элементы Раздела -->
			<div class="drodownsection testarrow">
			
				<!-- Просмотреть все товары -->
				<div class="allgoods">
					Просмотреть все товары
				</div>
				
				<!-- Раздел II -->
				<div class="drodownsection">
				
					<!-- Заголовок -->
					<div class="headdrodown testarrow">
						Вложенный 2 = 1
					</div>
					
					<!-- Элементы Раздела -->
					<div class="drodownsection testarrow">
					
						<!-- Просмотреть все товары -->
						<div class="allgoods">
							Просмотреть все товары
						</div>
						<div class="drodownitem">
							Вложенный 3 = 2
						</div>
						<div class="drodownitem">
							Вложенный 3 = 3
						</div>
						
					</div>
				
				</div>
				
				<div class="drodownitem">
							Вложенный 2 = 2
				</div>
						
						
				<div class="drodownitem">
							Вложенный 2 = 3
				</div>
				
			</div>
			
		</div>
		
		
		
		
		
		
		
		

		
		
	</div>
	<!-- Конец меню -->
	
	
	
	
	
	
	
	
	
</div>




*/?>

























<?/*




<style>


.header-menu-sub-disingItems__item:hover .header-menu-sub-disingItems__name{
	
	    text-decoration: underline !important;
}


header-menu-sub-menu-last__link:hover{
    color: #fff !important;
}
header-menu-sub-menu-last__link:hover{
    color: #fff;
}

.header-menu-sub-banner-plitka__name{
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    width: 90%;	
	
}



.promo2 .header-menu-sub-banner-plitka__name, .promo3 .header-menu-sub-banner-plitka__name, .promo4 .header-menu-sub-banner-plitka__name{
    width: 70%;	
	
}


.promo1 .header-menu-sub-banner-plitka__name, .promo1 .header-menu-sub-banner-plitka__art
{
	    vertical-align: top !important;
    position: unset !important;
	width: 90%;	
	
}





.header-menu-sub-banner-plitka__art{
	text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
	width: 47%;
	
}





width: 70%;




body{
	overflow-x: hidden;
}
    



.header-menu-sub-banner-plitka{
margin-right: 0px;
    margin-top: 0px;
	
	
}






.header-menu-sub-body__item{
	
	
}

.header-menu-sub-body__link{
	    line-height: unset !important;
	
}

	.header-menu-sub-body__col.one{
		
		-webkit-column-width: 200px !important;
		-moz-column-width: 200px !important;
		column-width: 200px !important;
	}

.header-menu-sub-body__item{
	padding-top: 0.5rem !important;
    padding-bottom: 0.5rem !important;
    margin-bottom: 0px;
}











.header-menu-sub-body-banners__item {
    vertical-align: top;
	padding: 3px;
}





@media (max-width: 1600px) {
  .viwnone{
	
	display:none;
}
}





.header-menu-sub-body{
	height:701px;
	    overflow: hidden;
	
}


	.header-menu-sub-body__col.one{
		min-width: 210px;
		float: left;
		
	}

	.header-menu-sub-menu__link-icon{
		background-size:cover !important;
	}
	
	.header-menu-sub-body__col.two{
		max-width:45%;
		height: 73vh;
		overflow: auto;

	}

	.header-menu-sub-body-banners {
		margin-right: 0px;
		margin-top: 0px; 
	}
	
	.header-menu-sub-body-banners__item {
		margin-top: 15px;
		width: 49%;
	}
	
	
	.header-menu-sub-body-banners__item {
		display: inline-block;
	}




 

	.header-menu-sub-body__col.one{
		
		column-count: auto !important;
		column-rule: unset !important;
		column-gap: 10px !important;
		width: 883px;
		
		
		height: 700px;
		overflow: hidden;
		-webkit-column-width: 400px;
		-moz-column-width: 400px;
		column-width: 400px;
		-webkit-column-count: auto;
		
		column-fill: auto;
		
		
		
		
		-webkit-column-gap: 10px;
		-moz-column-gap: 10px;
		
		
	}





	.promo1{
		width: 212px;
		height: 358px;
	}
	.promo2{
		width: 358px;
		height: 358px;
	}
	.promo3{
		width: 285px; 
		height: 176px;
	}
	.promo4{
		width: 285px;
		height: 176px;
	}
	
	.promo2 .imgpromo{
		width: 100%;
		padding-bottom: 84%;
		margin-bottom: 5%;
		background-size: contain;
		background-repeat: no-repeat;
	}
	
	.promo1 .imgpromo{
		width: 100%;
		padding-bottom: 104%;
		margin-bottom: 5%;
		background-size: contain;
		background-repeat: no-repeat;
	}
	
	.promo3 .header-menu-sub-banner-plitka__pic{
		width: 58%;
		height: 77%;
	}
	
	.promo3 .imgpromo{
		width: 100%;
		padding-bottom: 87%;
		background-size: contain;
		background-repeat: no-repeat;
	}
	
	.promo4 .header-menu-sub-banner-plitka__pic{
		width: 58%;
		height: 77%;
	}
	
	.promo4 .imgpromo{
		width: 100%;
		padding-bottom: 87%;
		background-size: contain;
		background-repeat: no-repeat;
	}								






</style>








<!-- Выводим меню -->

        <div class="scrollHeader">
          <div class="scrollHeader__col one"><a class="scrollHeader__logo" href="/"><img class="scrollHeader__logo-img" src="/local/templates/eshop_bootstrap_v4/assets/img/logo.png" alt=""></a></div>
          <div class="scrollHeader__col two">
            <ul class="scrollHeader-menu">





<? require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php'); 
if(!CModule::IncludeModule("iblock"))
return; 
?>



<?
$IBLOCK_ID    = 4;
$arFilter    = Array(
      'IBLOCK_ID'=>$IBLOCK_ID, 
      'GLOBAL_ACTIVE'=>'Y');
$obSection    = CIBlockSection::GetTreeList($arFilter,$arSelect=Array("UF_LINKSECT","UF_IMGSECT1"));

while($arResult = $obSection->GetNext()){
	
	
//	print_r($arResult[UF_IMGSECT1][0]);
	
	
	
	
	
	
	
	//Вывод заголовка раздела
	echo "<li class='scrollHeader-menu__item'><a class='scrollHeader-menu__link' href='$arResult[UF_LINKSECT]'>$arResult[NAME]</a>";
	
	
	
	
	if($arResult[UF_IMGSECT1][0]){
		
		
		
		
		$qqq22 = $arResult[UF_IMGSECT1];
		
		
		
		 
		echo "<div class='header-menu-sub'>
                  <ul class='header-menu-sub-disingItems'>";
				  
				  
				  
				  
				  foreach ($qqq22 as $valueimg){
					//Сбор данных о элементе галереи
					
					
					
								$arFilter_img = Array("IBLOCK_ID"=>5, "ID"=>$valueimg);
								
								
								$res_img = CIBlockElement::GetList(Array(), $arFilter_img);
								
								
								
								if ($ob_img = $res_img->GetNextElement()){
									$arFields_img = $ob_img->GetFields(); // поля элемента
									$arProps_img = $ob_img->GetProperties(); // свойства элемента
								   }
								
								if($arProps_img[directlink][VALUE])
								$linkdesc_img =  $arProps_img[directlink][VALUE];
								else{
								
								//Вывод ссылки на элемент
								$urlelem_img = CIBlockElement::GetByID($arProps_img[link][VALUE]); //Получение элемента
								if($urlelem_img = $urlelem_img->GetNext()) // Метод вывод свойств в переменную
								
								//Вывод ссылки на элемент
								$linkdesc_img = $urlelem_img['DETAIL_PAGE_URL']; // Присвоение ссылки хронящейся в массиве
								}
								
								//Вывод ссылки на изображение
								$linkimg_img = CFile::GetPath($arProps_img[photo1][VALUE]);
								
								//Вывод Заголовка для изображения
								$headimg_img = $arFields_img[NAME];
				  
				  
				  
                    echo "<li class='header-menu-sub-disingItems__item'><a class='header-menu-sub-disingItems__link' href='$linkdesc_img'>
                        <div class='header-menu-sub-disingItems__pic' data-name='$headimg_img'><img class='header-menu-sub-disingItems__img' src='$linkimg_img' alt=''></div>
                        <div class='header-menu-sub-disingItems__name' >$headimg_img</div></a></li>";
						
				  }	
						
						
                echo  " </ul>
                </div>";
		
		
	}
	
	
	
	
	
	
	
	
	
		// Назначение фильтра по инф блоку, по id категории
		 $arFilter1    = Array(
		  'IBLOCK_ID'=>$IBLOCK_ID, 
		  'GLOBAL_ACTIVE'=>'Y',
		  'SECTION_ID' =>  $arResult['ID']
		  );
		  
			$res = CIBlockElement::GetList(Array(), $arFilter1 , false);
			$res2 = CIBlockElement::GetList(Array(), $arFilter1 , false);
			
	  
		//Проверка на наличие подразделов и вывод вступления
		if ($el = $res2->Fetch()){
			echo '<div class="header-menu-sub">'; // Открытие подменю
			
			echo '<div class="header-menu-sub__col one">
					<div class="header-menu-sub-menu">
                      <ul class="header-menu-sub-menu__items">'; // Открытие панели подразделов (колонка слева)
		 
		 
		 
		
		
		
		
			//Вывод подразделов
			while($ob = $res->GetNextElement())
			{
				
				$arFields = $ob->GetFields();
				$arProps = $ob->GetProperties();
				
				//Определение свойств подразделов
				
				
				if($arProps[lastlink][VALUE] != "Последняя ссылка"){

				
				
					$namesection = $arFields['NAME']; //Наименование подраздела
					
					$linksection = ""; //Ссылка на подраздел
					if($arProps[Linkonsection][VALUE])
						$linksection = $arProps[Linkonsection][VALUE];
						else{
							if($arProps[Linksect][VALUE]){
								
								$urlelem = CIBlockElement::GetByID($arProps[Linksect][VALUE]); //Получение элемента
								if($urlelem1 = $urlelem->GetNext()) // Метод вывод свойств в переменную
								$desc = $urlelem1['DETAIL_PAGE_URL']; // Присвоение ссылки хронящейся в массиве
								$linksection = $desc;
								
							}else{
							
							$urlelem = CIBlockElement::GetByID($arProps[Linkonitem][VALUE]); //Получение элемента
							if($urlelem1 = $urlelem->GetNext()) // Метод вывод свойств в переменную
							$desc = $urlelem1['DETAIL_PAGE_URL']; // Присвоение ссылки хронящейся в массиве
							$linksection = $desc;
							}
						}
						
					$icosection = CFile::GetPath($arProps['icoimg']['VALUE']); //Вывод Иконки подпункта
					
					
					
					
					
					 
					
					echo "
					<li class='header-menu-sub-menu__item'>";
					
					//Проверка на наличие подпунктов
					if($arProps[Linkslist][VALUE]||$arProps[Block_Goods][VALUE]||$arProps[gal2][VALUE])
						echo "<a class='header-menu-sub-menu__link active' href='$linksection'>";
						else
						echo "<a class='header-menu-sub-menu__link no_arrow' href='$linksection'>";
						
						echo	"<span class='header-menu-sub-menu__link-icon' style='background-image: url($icosection); '></span>
						
						
							<span class='header-menu-sub-menu__link-name'>
								$namesection 
							</span>
							<span class='header-menu-sub-menu__link-line'></span>
						</a>
					</li>";
					
					}
					
				
				
				
				
			//Конец вывода подпунктов	
			}
			
			
			
			
			
			
			//Вывод окончания левой колонки подменю
			 echo '</div>';
			 
			 
			 
			 
			 
			
			 //Вывод последней ссылки
			 $reslast = CIBlockElement::GetList(Array(), $arFilter1 , false);
			while($oblast1 = $reslast->GetNextElement())
			{
				$arFieldslast = $oblast1->GetFields();
				$arPropslast = $oblast1->GetProperties();
				if($arPropslast[lastlink][VALUE]){
					$namesection = $arFieldslast['NAME']; //Наименование подраздела
					$linksection = ""; //Ссылка на подраздел
					if($arPropslast[Linkonsection][VALUE])
						$linksection = $arPropslast[Linkonsection][VALUE];
						else{
							if($arPropslast[Linksect][VALUE]){
								$urlelem = CIBlockElement::GetByID($arPropslast[Linksect][VALUE]); //Получение элемента
								if($urlelem1 = $urlelem->GetNext()) // Метод вывод свойств в переменную
								$desc = $urlelem1['DETAIL_PAGE_URL']; // Присвоение ссылки хронящейся в массиве
								$linksection = $desc;
							}else{
							$urlelem = CIBlockElement::GetByID($arPropslast[Linkonitem][VALUE]); //Получение элемента
							if($urlelem1 = $urlelem->GetNext()) // Метод вывод свойств в переменную
							$desc = $urlelem1['DETAIL_PAGE_URL']; // Присвоение ссылки хронящейся в массиве
							$linksection = $desc;
							}
						}
						echo "<div class='header-menu-sub-menu-last'>
						<div class='header-menu-sub-menu-last__col one'></div>
						<div class='header-menu-sub-menu-last__col two'><a class='header-menu-sub-menu-last__link' href='$linksection' style='color: white !important;'>$namesection</a></div>
						<div class='header-menu-sub-menu-last__col last'></div>";
				}	
			}		
					
					
					
					
					
					
				echo '</div>
			</div>';
			
			
			//Вывод вступления правой колонки подменю
			echo "<div class='header-menu-sub__col two'>";
				
			
			
			
			
			
			
			
			//    Вывод элементов в зависимости от контента
			$res = CIBlockElement::GetList(Array(), $arFilter1 , false);
			$q=true;
			
			while($ob = $res->GetNextElement())
			{
				
				$arFields = $ob->GetFields();
				$arProps = $ob->GetProperties();
				
							
						
						

							//    Выводим вступление в пункт правого подменю в зависимости от активности элемента. Также проверяет последнюю ссылку и выводит отдельно
							if($arProps[lastlink][VALUE] == "Последняя ссылка"){
								echo "<div class='header-menu-sub-body last'>";
							}
							else
							{
							if($q){
								echo "<div class='header-menu-sub-body active active'>";
								$q = false;
							}else{
								echo "<div class='header-menu-sub-body'>";
							}
							}
							
							
							
					
					
					
							//   Начинаем блок, внутри которого будет содержаться контент 2х колонок. 1 колонка вытесняет вторую
							echo '<div style="overflow: hidden; position: relative;width: 100%;">';
				
				
				
							//   Подсчитываем количество колонок и устанавливаем для списка элементов
							$count_row = 0;
							//Подсчет количества строк, согласно лимиту 25 символов на 1 строку
							
							
							
							
							
							
							
							
							//  Для определения количества столбцов
							$arFilter3_linksnew = Array("IBLOCK_ID"=>5, "ID"=>$arProps[Linkslistnew][VALUE]);
							$arSelect_linksnew = Array("ID", "NAME", "PROPERTY_photo1", "PROPERTY_directlink", "PROPERTY_link");
							$res3_linksnew = CIBlockElement::GetList(Array(), $arFilter3_linksnew, $arSelect_linksnew);
							
							while($ob3_linksnew = $res3_linksnew->GetNextElement()){
								$arProps3_linksnew = $ob3_linksnew->GetProperties(); // свойства элемента	
								
								++$count_row;
								if(iconv_strlen($arProps3_linksnew[NAME])>25){
									++$count_row;
								}
								if(iconv_strlen($arProps3_linksnew[NAME])>50){
									++$count_row;
								}
							}
							
							
							
							
							
							
							
							
							
							//   Если у подпункта есть список товаров, мы вносим изменение стиля в блоки
							$htmlyes1 = "";
							$htmlyes2 = "";
							if($arProps[Block_Goods][VALUE]){
								$htmlyes1 = "width: 25%!important; min-width: unset;";
								$htmlyes2 = "max-width: unset !important;width: unset !important;padding-left: 5px;";
							}
				
				
				
							//   Вывод вступления первой колоник контентной части
							if(($count_row>21)&&($count_row<42)){
								echo "	<div class='header-menu-sub-body__col one' style='width: 440px; column-fill: balance;$htmlyes1'>";
								$sizeminuspic = "450px";
							}
							elseif(($count_row>41)&&($count_row<75)){
								echo "	<div class='header-menu-sub-body__col one' style='width: 630px; column-fill: balance;$htmlyes1'>";
								$sizeminuspic = "640pxpx";
							}
							elseif($count_row>74){
								echo "	<div class='header-menu-sub-body__col one' style='width: 840px; column-fill: balance;$htmlyes1'>";
								$sizeminuspic = "850px";
							}
							else{
								echo "	<div class='header-menu-sub-body__col one' style='width: 250px;     column-fill: auto;$htmlyes1'>";
								$sizeminuspic = "250px";
								}
								
								
								
								
								
							
							
							//   Вывод списка ссылок
							$arFilter3_linksnew = Array("IBLOCK_ID"=>5, "ID"=>$arProps[Linkslistnew][VALUE]);
							$arSelect_linksnew = Array("ID", "NAME", "PROPERTY_photo1", "PROPERTY_directlink", "PROPERTY_link");
							$res3_linksnew = CIBlockElement::GetList(Array(), $arFilter3_linksnew, $arSelect_linksnew);
							
							
							while($ob3_linksnew = $res3_linksnew->GetNextElement()){
								$arFields3_linksnew = $ob3_linksnew->GetFields(); // поля элемента
								$arProps3_linksnew = $ob3_linksnew->GetProperties(); // свойства элемента	
								
								//if($arProps3_linksnew[directlink][VALUE])
								$linkdesc_linksnew =  $arProps3_linksnew[directlink][VALUE];
							
								// В случае если будут выбираться элементы
								//else{
								//Вывод ссылки на элемент
								//$urlelem2_linksnew = CIBlockElement::GetByID($arProps3_linksnew[link][VALUE]); //Получение элемента
								//if($urlelem3_linksnew = $urlelem2_linksnew->GetNext()) // Метод вывод свойств в переменную
								//Вывод ссылки на элемент
								//$linkdesc_linksnew = $urlelem3_linksnew['DETAIL_PAGE_URL']; // Присвоение ссылки хронящейся в массиве
								//}
								
								//Вывод ссылки на изображение
								$linkimg1_linksnew = CFile::GetPath($arProps3_linksnew[photo1][VALUE]);
								
								//Вывод Заголовка для изображения
								$headimg1_linksnew = $arFields3_linksnew[NAME];
								
								echo "<p class='header-menu-sub-body__item'><a class='header-menu-sub-body__link' href='$linkdesc_linksnew'>$headimg1_linksnew</a></p>";
							}
							echo "</div>";
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							
							//   Вывод вступления второй колоник контентной части
							if(($count_row>21)&&($count_row<42)){
							echo "<div class='header-menu-sub-body__col two'style='float: right; width: calc(100% - 450px);max-width: 50%;$htmlyes2'>
								<div class='header-menu-sub-body-banners'>";
							}
							elseif(($count_row>41)&&($count_row<75)){
								echo "<div class='header-menu-sub-body__col two viwnone' style='float: right; width: calc(100% - 640px);max-width: 50%;$htmlyes2'>
									<div class='header-menu-sub-body-banners'>";
							}
							elseif($count_row>74){
								echo "<div class='header-menu-sub-body__col two viwnone' style='float: right; width: calc(100% - 850px);max-width: 50%;$htmlyes2'>
									<div class='header-menu-sub-body-banners'>";
							}
							else{
								echo "<div class='header-menu-sub-body__col two' style='float: right; width: calc(100% - 260px);max-width: 50%;$htmlyes2'>
									<div class='header-menu-sub-body-banners'>";
							}
					
					
					
					
							//   Вывод картинок с заголовками и текстом
							foreach ($arProps[gal2][VALUE] as $value1) {
								
								//Сбор данных о элементе галереи
								$arFilter3 = Array("IBLOCK_ID"=>5, "ID"=>$value1);
								$res3 = CIBlockElement::GetList(Array(), $arFilter3);
								if ($ob3 = $res3->GetNextElement()){
									$arFields3 = $ob3->GetFields(); // поля элемента
									$arProps3 = $ob3->GetProperties(); // свойства элемента
								   }
								
								if($arProps3[directlink][VALUE])
								$linkdesc =  $arProps3[directlink][VALUE];
								else{
								
								//Вывод ссылки на элемент
								$urlelem2 = CIBlockElement::GetByID($arProps3[link][VALUE]); //Получение элемента
								if($urlelem3 = $urlelem2->GetNext()) // Метод вывод свойств в переменную
								
								//Вывод ссылки на элемент
								$linkdesc = $urlelem3['DETAIL_PAGE_URL']; // Присвоение ссылки хронящейся в массиве
								}
								
								//Вывод ссылки на изображение
								$linkimg1 = CFile::GetPath($arProps3[photo1][VALUE]);
								
								//Вывод Заголовка для изображения
								$headimg1 = $arFields3[NAME];
								
								if($arProps[formatpic][VALUE] == "Формат: 1 большая картинка"){
								echo "
								<div class='header-menu-sub-body-banners__item' style='width: 100%;'>
									<a class='header-menu-sub-body-banners__link' href='$linkdesc'>
										  <div class='header-menu-sub-body-banners__pic' style='width: 100%;'>
											<img class='header-menu-sub-body-banners__img' src='$linkimg1' style='width: 100%;'/>
										  </div>
										  <div class='header-menu-sub-body-banners__name'>
											$headimg1
										  </div>
									</a>
								</div>
								";	
								}
								else{
									echo "
								<div class='header-menu-sub-body-banners__item' style='float: right;'>
									<a class='header-menu-sub-body-banners__link' href='$linkdesc'>
										  <div class='header-menu-sub-body-banners__pic'>
											<img class='header-menu-sub-body-banners__img' src='$linkimg1'/>
										  </div>
										  <div class='header-menu-sub-body-banners__name'>
											$headimg1
										  </div>
									</a>
								</div>
								";	
								}
								
							}
							
							
							
							
							//   Вывод товара
							echo "<div class='header-menu-sub-banner-plitka'>";
							$i1 = 1;
							foreach ($arProps[Block_Goods][VALUE] as $value1) {
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
								   $photo = CFile::GetPath($arProps4[PHOTO_1][VALUE]);
								   $morephoto = $arProps4[MORE_PHOTO][VALUE];
								   $DISCOUNT = $arProps4[DISCOUNT][VALUE];
								   $ARTICLE = $arProps4[ARTICLE][VALUE];
								   $IN_STOCK = $arProps4[IN_STOCK][VALUE];
									$pricegoods = CPrice::GetBasePrice($value1);
								   echo
								   "<a class='header-menu-sub-banner-plitka__item cl_$i1 promo$i1'  href='#'>
										<div class='header-menu-sub-banner-plitka__pic'>
										<div class='imgpromo' style='background-image: url($photo)'></div>
										</div>
										<div class='header-menu-sub-banner-plitka__name'>$arFields4[NAME]</div>
										<div class='header-menu-sub-banner-plitka__art'>Артикул: $ARTICLE</div>
										<div class='header-menu-sub-banner-plitka__price'>$pricegoods[PRICE] руб.-</div></a>";
								   $i1++;
								   if($i1==5)$i1=1;   
							}
							
							//Завершение пункта
							echo "</div></div></div></div></div>";
						


								
				
							
			//Конец вывода подпунктов	
			}
			
				
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		
		
		
		echo '</div>
		 </div>';
		}
		
	
		
			


		echo "</li>";
		
			  
			  
			  

}


?>





            </ul>
          </div>
          <div class="scrollHeader__col three">
            <div class="scrollHeader-control"><a class="scrollHeader-control__link toggleTitle" href="#" data-title="Сравнение">
                <div class="scrollHeader-control__link-icon lnr lnr-sort-amount-asc"></div></a><a class="scrollHeader-control__link toggleTitle" href="#" data-title="Избранное">
                <div class="scrollHeader-control__link-icon lnr lnr-heart"></div></a></div>
            <div class="scrollHeader-basket">
              <div class="scrollHeader-basket__icon lnr lnr-cart toggleTitle" data-title="Корзина"></div>
              <div class="scrollHeader-basket__order">
                <div class="scrollHeader-basket__order-text">999 товаров</div>
                <div class="scrollHeader-basket__order-text">999 999 руб.</div>
              </div>
            </div>
          </div>
        </div>




*/?>











