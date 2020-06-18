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
	.razdeli{
		font-weight: 600;
		font-size: 15px;
		line-height: 20px;
		color: #2f2f2f;
		text-decoration: none;
		display: block;
		opacity: 1;
		transition: opacity 350ms;
		padding-bottom: 12px;
		height: unset;
	}
	
	
	
	
	.header-menu .scrollHeader-menu__item {
		margin-left: 65px;
		padding-left: 10px;
	}
	
	


</style>


<nav class="header-menu-nav">
          <div class="container__wrap">
            <div class="header-menu">
              <div class="header-menu__items">
                
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
	
	
	
	
	//Вывод заголовка раздела
	echo "<li class='scrollHeader-menu__item'><a class='scrollHeader-menu__link razdeli' href='$arResult[UF_LINKSECT]'>$arResult[NAME]</a>";
	
	
	
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
								//  print_r($arProps_img); 
								
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
                        <div class='header-menu-sub-disingItems__name' style=''>$headimg_img</div></a></li>";
						
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
					
					
					
					
					/*
					echo "<div class='header-menu-sub-menu-last'>
						<div class='header-menu-sub-menu-last__col one'></div>
						<div class='header-menu-sub-menu-last__col two'><a class='header-menu-sub-menu-last__link' href='11' style='color: white !important;'>11</a></div>
						<div class='header-menu-sub-menu-last__col last'></div>";
					*/
					
					
				echo '</div>
			</div>';
			
			
			//Вывод вступления правой колонки подменю
			echo "<div class='header-menu-sub__col two'>";
				
			
			
			
			$count_row = 0;
			
			
			
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
				
							$count_row = 0;
				
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
			
				
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			/*
			
			//Вывод окончания правой колонки подменю
			echo "</div>";
			
			*/
			
			
			
			
			/*
			
			
			
			
			echo "
                    <div class='header-menu-sub-body active active'>
					
                      <div class='header-menu-sub-body__col one'>
                      </div>
					  
					  
                      <div class='header-menu-sub-body__col two'>
                        <div class='header-menu-sub-body-banners'>
                          <div class='header-menu-sub-body-banners__item'><a class='header-menu-sub-body-banners__link' href='#'>
                              <div class='header-menu-sub-body-banners__pic'><img class='header-menu-sub-body-banners__img' src='/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/banner.png'/></div>
                              <div class='header-menu-sub-body-banners__name'>НОВОЕ ПОСТУПЛЕНИЕ ВЕШАЛА В РОЗОВОМ ЗОЛОТЕ</div></a></div>
                          <div class='header-menu-sub-body-banners__item'><a class='header-menu-sub-body-banners__link' href='#'>
                              <div class='header-menu-sub-body-banners__pic'><img class='header-menu-sub-body-banners__img' src='/local/templates/eshop_bootstrap_v4/assets/img/popup/menu/banner.png'/></div>
                              <div class='header-menu-sub-body-banners__name'>НОВОЕ ПОСТУПЛЕНИЕ ВЕШАЛА В РОЗОВОМ ЗОЛОТЕ</div></a></div>
                        </div>
                      </div>
					  
					  
					  
                    </div>
					
					
                    <div class='header-menu-sub-body'>
                      <div class='header-menu-sub-body__col one'>
                        <ul class='header-menu-sub-body__items'>
                          <li class='header-menu-sub-body__item'><a class='header-menu-sub-body__link' href='#'>Напольные</a></li>
                          <li class='header-menu-sub-body__item'><a class='header-menu-sub-body__link' href='#'>Двойные</a></li>
                          <li class='header-menu-sub-body__item'><a class='header-menu-sub-body__link' href='#'>Регулируемые</a></li>
                          <li class='header-menu-sub-body__item'><a class='header-menu-sub-body__link' href='#'>По странам производителям</a></li>
                          <li class='header-menu-sub-body__item'><a class='header-menu-sub-body__link' href='#'>Для аксессуаров</a></li>
                          <li class='header-menu-sub-body__item'><a class='header-menu-sub-body__link' href='#'>Для верхней одежды</a></li>
                          <li class='header-menu-sub-body__item'><a class='header-menu-sub-body__link' href='#'>Для свадебных салонов</a></li>
                          <li class='header-menu-sub-body__item'><a class='header-menu-sub-body__link' href='#'>Для брюк</a></li>
                          <li class='header-menu-sub-body__item'><a class='header-menu-sub-body__link' href='#'>Пристенные</a></li>
                        </ul>
                      </div>
				";
			
			
			
			
			
			
			
			*/
			
			
			
			
			
			
			
			
			
			
			
			
		
		
		
		echo '</div>
		 </div>';
		}
		
	
		
			


		echo "</li>";
		
			  
			  
			  

}


?>
				
				
				
				
				
				
				
				
				
				
				
				</ul>
				
              </div>
            </div>
          </div>
        </nav>







<?/*



<style>

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
	margin-top: 0.5rem !important;
    margin-bottom: 0.5rem !important;
	
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



.header-menu-sub{
	display:flex;
	
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
$obSection    = CIBlockSection::GetTreeList($arFilter);

while($arResult = $obSection->GetNext()){
	
	
	
	
	//Вывод заголовка раздела
	echo "<li class='scrollHeader-menu__item'><a class='scrollHeader-menu__link' href='#'>$arResult[NAME]</a>";
	
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
							foreach ($arProps[Linkslist][VALUE] as $value) {
								++$count_row;
								if(iconv_strlen($value)>25){
									++$count_row;
								}
								if(iconv_strlen($value)>50){
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
							foreach ($arProps[Linkslist][VALUE] as $value) {
								$qqq = $arProps[Linkslist][DESCRIPTION][$i];
								echo "<p class='header-menu-sub-body__item'><a class='header-menu-sub-body__link' href='$qqq'>$value</a></p>";
								$i++;
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





*/










