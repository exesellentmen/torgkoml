<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Тестменю");
?><style>

	.podpunkt{
		font-weight: 500;
		font-size: 20px;
		margin-left: 10rem;		
			
	}
	
	.punkt{
		font-weight: 700;
		font-size: 30px;
		margin-left: 5rem;	
	}
	
	.menupodpenkt{
		margin-left: 12rem;
	}
	
	.imgggg{
		display: inline-block;
		margin: 1rem;	
	}

</style> <? require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php'); 
if(!CModule::IncludeModule("iblock"))
return; 
?> <br>
 <br>
 Вывод пунктов Меню <br>
 <br>
 <!-- Вывод Разделов, начала цикла --> <?
$IBLOCK_ID    = 4;
$arFilter    = Array(
      'IBLOCK_ID'=>$IBLOCK_ID, 
      'GLOBAL_ACTIVE'=>'Y');
$obSection    = CIBlockSection::GetTreeList($arFilter);

while($arResult = $obSection->GetNext()){
	
	//Вывод наименовения ПУНКТОВ
	echo '<div class="punkt">'.$arResult['NAME'].'</div><br>';
	
	
		//Вывод ПОДПУНКТОВ
		
		// Назначение фильтра по инф блоку, по id категории
		 $arFilter1    = Array(
		  'IBLOCK_ID'=>$IBLOCK_ID, 
		  'GLOBAL_ACTIVE'=>'Y',
		  'SECTION_ID' =>  $arResult['ID']
		  );
		  
		  $res = CIBlockElement::GetList(Array(), $arFilter1 , false, Array("nPageSize"=>50));
	  
	  
		//Вывод содержимого ПОДПУНКТОВ (свойства, ссылки, и др)
		while($ob = $res->GetNextElement())
		{
			$arFields = $ob->GetFields();
			$arProps = $ob->GetProperties();
			
			//Вывод Наименование ПОДПУНКТА
			echo '<div class="podpunkt">'.$arFields['NAME'].'</div>';
			
			//Вывод основной ссылки. При этом проверяет в начале прямую ссылку, а затем ссылку на элемент
			echo '<br><div class="menupodpenkt"><b>Основная ссылка:</b><br>';
			if($arProps[Linkonsection][VALUE])
				echo $arProps[Linkonsection][VALUE];
			else{
				if($arProps[Linksect][VALUE]){
					
					$urlelem = CIBlockElement::GetByID($arProps[Linksect][VALUE]); //Получение элемента
				if($urlelem1 = $urlelem->GetNext()) // Метод вывод свойств в переменную
				$desc = $urlelem1['DETAIL_PAGE_URL']; // Присвоение ссылки хронящейся в массиве
				echo $desc;
					
					
				}else{
				
				$urlelem = CIBlockElement::GetByID($arProps[Linkonitem][VALUE]); //Получение элемента
				if($urlelem1 = $urlelem->GetNext()) // Метод вывод свойств в переменную
				$desc = $urlelem1['DETAIL_PAGE_URL']; // Присвоение ссылки хронящейся в массиве
				echo $desc;
				}
			}
			
			
			
			
			echo '<br>';
			
			
			
			
			
			//Вывод Иконки подпункта
			echo '<br><b>Иконка подпункта:</b>';
			$img_path1 = CFile::GetPath($arProps['icoimg']['VALUE']);
			echo "<br>
			<img src='$img_path1' style='width: 40px; height: 30px;'>
			<br>";
			
			//Вывод ссылок ПОДПУНКТОВ
			echo '<br><b>Список ссылок:</b><br>';
			$i=0;
			foreach ($arProps[Linkslist][VALUE] as $value) {
				//Вывод ссылки используя id элемента
				//print_r($arProps[Linkslist]);
				
				
				$qqq = $arProps[Linkslist][DESCRIPTION][$i];
				
				echo "<a href='$qqq' class='podpodpunkt'>$value</a><br>";
				$i++;
			}
			echo '<br>';
			
			//Вывод картинок с заголовками и текстом
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
				
				echo "
				<div class='imgggg'>
				<a href='$linkdesc'>
				<img src='$linkimg1' style='width: 200px; height: 150px;'><br>
				$headimg1
				</a>
				</div>
				";
			}
			
			
			
			
			//Вывод html кода
			// Декодирование html содержимого от Bitrix
			echo "<br><br><b>Вывод html кода:</b><br>";
			echo html_entity_decode($arProps[htmlcont][VALUE][TEXT]); 
			
			
			
			
			
			
			
			
			
			
			
			
			
			echo '</div><br>';
			
		}






/*







//Вывод ссылок с пунктами меню
echo "<b>Элементы меню:</b><br>";

$i=0;
foreach ($arProps[Linkspoint][VALUE] as $value) {
	
	$desc = $arProps[Linkspoint][DESCRIPTION][$i];
	echo "<a href='$desc'>$value</a><br>";
	$i++;
}
  
 
 
//Вывод изображений с заголовками
echo "<br><b>Изображения:</b><br>";

$i=0;
foreach ($arProps[Galmenu][VALUE] as $value) {
	
	$img_path = CFile::GetPath($value);
	$desc = $arProps[Galmenu][DESCRIPTION][$i];
	
	echo "<img src='$img_path' style='width: 200px; height: 150px;'><br>
	$desc<br><br>
	";
	$i++;
}










//Вывод изображеий с текстом и ссылкой

echo "Изображения с текстом и ссылкой:<br><br><br>";

$i=0;
foreach ($arProps[gal2][VALUE] as $value1) {
	echo $value1;
	
		 // Назначение фильтра по инф блоку, по id категории
	 $arFilter2    = Array(
      'IBLOCK_ID'=>5, 
      'GLOBAL_ACTIVE'=>'Y',
	  'ID' =>  $value1
	  );
	 
	 
	  $res1 = CIBlockElement::GetList(Array(), $arFilter2 , false);
	  

while($ob1 = $res1->GetNextElement())
{
  $arFields1 = $ob1->GetFields();
  $arProps1 = $ob1->GetProperties();
  
//  print_r($arFields1[NAME]);


//Вывод картинки
$img_path1 = CFile::GetPath($arProps1['photo1']['VALUE']);
echo "<br>
<img src='$img_path1' style='width: 200px; height: 150px;'>
	<br>";




//Вывод ссылки используя id элемента
$res2 = CIBlockElement::GetByID($arProps1['link']['VALUE']);
	if($ar_res = $res2->GetNext())		
	echo "<br>Ссылка <br>";	
	echo $ar_res['DETAIL_PAGE_URL'];	
	echo "<br>";


//Вывод Названия картинки
echo "Заголовок <br>";	
echo $arFields1['NAME'];
echo "<br>";

  
  
}
	

	$i++;
}








 
 
// Декодирование html содержимого от Bitrix
echo "Вывод html кода:<br>";
echo html_entity_decode($arProps[htmlcont][VALUE][TEXT]); 


 
// Декодирование html содержимого от Bitrix
echo "Вывод иконки<br>";
$img_path1 = CFile::GetPath($arProps[icoimg][VALUE][0]);
//	$desc = $arProps[Galmenu][DESCRIPTION][$i];
	
	echo "<img src='$img_path1' style='width: 20px; height: 20px;'><br>
	";



 echo '<br><br>

				</div>
			</div>';

	
	
	
	
	
	
	*/
	
}
























?> <?/*





<div class="news-list">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?
$qqq =0;
echo "<div>

 
 
  <br>
 <br>
	<div class='content1'>";
	




$IBLOCK_ID    = 4;
$arFilter    = Array(
      'IBLOCK_ID'=>$IBLOCK_ID, 
      'GLOBAL_ACTIVE'=>'Y');
$obSection    = CIBlockSection::GetTreeList($arFilter);

while($arResult = $obSection->GetNext()){
   for($i=0;$i<=($arResult['DEPTH_LEVEL']-2);$i++){
   }


	
	
	
   
if($arResult['DEPTH_LEVEL'] == 1) {
	if($qqq == 1){
		echo "
		<br> 
					</div>
			 </details><details> <summary style='background-color: #D4C9DB;'> ";
			 $qqq = 0;
		
	}else{
		
		echo "<details> <summary style='background-color: #D4C9DB;'>";
		
		
	}
} else {
	
	echo "<div class='row2'>";


} 

     echo $arResult['NAME'].'<br>';
	 
	 
if($arResult['DEPTH_LEVEL'] == 1) {
	echo "</summary><div class='content'>";
} else {
	
	echo "</div>";


}  
	 
	 
	 // Назначение фильтра по инф блоку, по id категории
	 $arFilter1    = Array(
      'IBLOCK_ID'=>$IBLOCK_ID, 
      'GLOBAL_ACTIVE'=>'Y',
	  'SECTION_ID' =>  $arResult['ID']
	  );
	 
	 
	  $res = CIBlockElement::GetList(Array(), $arFilter1 , false, Array("nPageSize"=>50));
	  
	  
	  
while($ob = $res->GetNextElement())
{
  $arFields = $ob->GetFields();
  $arProps = $ob->GetProperties();
  
  
 // print_r($arProps);
  
  
  echo '
  
  <div class="row1">
				<div class="name_usluga">';
				
  echo "<br><br><b>Раздел:</b> $arFields[NAME]<br><br>";
  
  echo '</div>
				<div class="price_usluga">';





//Вывод ссылок с пунктами меню
echo "<b>Элементы меню:</b><br>";

$i=0;
foreach ($arProps[Linkspoint][VALUE] as $value) {
	
	$desc = $arProps[Linkspoint][DESCRIPTION][$i];
	echo "<a href='$desc'>$value</a><br>";
	$i++;
}
  
 
 
//Вывод изображений с заголовками
echo "<br><b>Изображения:</b><br>";

$i=0;
foreach ($arProps[Galmenu][VALUE] as $value) {
	
	$img_path = CFile::GetPath($value);
	$desc = $arProps[Galmenu][DESCRIPTION][$i];
	
	echo "<img src='$img_path' style='width: 200px; height: 150px;'><br>
	$desc<br><br>
	";
	$i++;
}










//print_r($arProps);

//Вывод изображеий с текстом и ссылкой

echo "Изображения с текстом и ссылкой:<br><br><br>";

$i=0;
foreach ($arProps[gal2][VALUE] as $value1) {
	echo $value1;
	
		 // Назначение фильтра по инф блоку, по id категории
	 $arFilter2    = Array(
      'IBLOCK_ID'=>5, 
      'GLOBAL_ACTIVE'=>'Y',
	  'ID' =>  $value1
	  );
	 
	 
	  $res1 = CIBlockElement::GetList(Array(), $arFilter2 , false);
	  

while($ob1 = $res1->GetNextElement())
{
  $arFields1 = $ob1->GetFields();
  $arProps1 = $ob1->GetProperties();
  
//  print_r($arFields1[NAME]);


//Вывод картинки
$img_path1 = CFile::GetPath($arProps1['photo1']['VALUE']);
echo "<br>
<img src='$img_path1' style='width: 200px; height: 150px;'>
	<br>";




//Вывод ссылки используя id элемента
$res2 = CIBlockElement::GetByID($arProps1['link']['VALUE']);
	if($ar_res = $res2->GetNext())		
	echo "<br>Ссылка <br>";	
	echo $ar_res['DETAIL_PAGE_URL'];	
	echo "<br>";


//Вывод Названия картинки
echo "Заголовок <br>";	
echo $arFields1['NAME'];
echo "<br>";

  
  
}
	
	
	
	
	
	/*
	$img_path = CFile::GetPath($value);
	$desc = $arProps[galmen][DESCRIPTION][$i];
	
	*/
	
/*	echo "<img src='$img_path' style='width: 200px; height: 150px;'><br>
	<br><br>
	";
	
	
	$i++;
}



<?




 
 
// Декодирование html содержимого от Bitrix
echo "Вывод html кода:<br>";
echo html_entity_decode($arProps[htmlcont][VALUE][TEXT]); 


 
// Декодирование html содержимого от Bitrix
echo "Вывод иконки<br>";
$img_path1 = CFile::GetPath($arProps[icoimg][VALUE][0]);
//	$desc = $arProps[Galmenu][DESCRIPTION][$i];
	
	echo "<img src='$img_path1' style='width: 20px; height: 20px;'><br>
	";



 echo '<br><br>

				</div>
			</div>';
}






	if($arResult['DEPTH_LEVEL'] == 1) { 
	
		$intCount = CIBlockSection::GetCount(array('IBLOCK_ID' => 4,'SECTION_ID' => $arResult['ID']));
		if($intCount == 0)	{
			echo "
			 <br> 
					</div>
			 </details> 
			 ";
			 
			 $qqq = 0;
		}	

	

	} else {
		
		$qqq = 1;


	}  

	 
}






echo "	</div>
 <br>
 <br>
</div>";



echo "<br><br><br>";









?>


















<?/*
//Входные данные

$st = 3; // Например

$shag = json_decode($_POST['checks'], true);

//$shag = $_POST['checks'];

//$shag = $shag*5;

//echo $shag;


?>







<?

$IBLOCK_ID    = 13;

 // Назначение фильтра по инф блоку, по id категории
	 $arFilter1    = Array(
      'IBLOCK_ID'=>$IBLOCK_ID, 
      'GLOBAL_ACTIVE'=>'Y'
	  
	  
	  
	  );
	 
	 
	  $res = CIBlockElement::GetList(Array("TIMESTAMP_X"=>"DESC"), $arFilter1 , false, Array('checkOutOfRange' => true,
'nPageSize' => 3,
'iNumPage'  => $shag));
	  
	  
//	  print_r($res);
	  
	  
	$iter_dop= 1;

	  
while($ob = $res->GetNextElement())
{
	
	
	
  $arFields = $ob->GetFields();
  $arProps = $ob->GetProperties();
  $item = $ob->GetFields();
  
 // echo $arFields[NAME];
  
 // echo "<br>";
  
  
  
  ?>
  
	<div class="abaut_block_4_box_onziv_item_box reviews__slider_item_element" style="margin: auto;">
		<div class="abaut_block_4_box_onziv_item" >
		<?if($iter_dop%2){?>
			<div class="abaut_block_4_box_onziv_item_left">
				<?if($item['PREVIEW_PICTURE']['SRC']){?>
					<img src="<?=$item['PREVIEW_PICTURE']['SRC']?>">
				<?}else{?>
					<img src="<?=SITE_TEMPLATE_PATH?>/img/dop_img/otzivei_img_3_over.png" alt=" " title=" " />
				<?}?>
			</div>
		<?}?>
			<div class="abaut_block_4_box_onziv_item_right">
				<h4 class="abaut_block_4_box_onziv_item_right_h4"><?=$item['~NAME']?>
				</h4>
				<?if($item['ACTIVE_FROM']){?>
				<span class="abaut_block_4_box_onziv_item_right_span"><?echo $arr_date[0].' '.$_monthsList[$arr_date[1]].' '.$arr_date[2];?></span>
				<?}?>
				<div class="abaut_block_4_box_onziv_item_right_div">
					<?=$item['~PREVIEW_TEXT']?>
				</div>
			</div>
			<?if(!($iter_dop%2)){?>
			<div class="abaut_block_4_box_onziv_item_left">
				<?if($item['PREVIEW_PICTURE']['SRC']){?>
					<img src="<?=$item['PREVIEW_PICTURE']['SRC']?>">
				<?}else{?>
					<img src="<?=SITE_TEMPLATE_PATH?>/img/dop_img/otzivei_img_3_over.png" alt=" " title=" " />
				<?}?>
			</div>
		<?}?>
		</div>
	</div>	
  
  
  
  
  
  
  <?
  
  
  
  
  
  
  
	
  
}


*/
?> <br>
 <br>
 <br>
 Вывод меню<br>
 <?$APPLICATION->IncludeComponent("bitrix:news.list", ".default", Array(
	"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
		"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
		"AJAX_MODE" => "N",	// Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
		"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
		"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
		"CACHE_GROUPS" => "Y",	// Учитывать права доступа
		"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
		"CACHE_TYPE" => "A",	// Тип кеширования
		"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
		"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
		"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
		"DISPLAY_DATE" => "Y",	// Выводить дату элемента
		"DISPLAY_NAME" => "Y",	// Выводить название элемента
		"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
		"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
		"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
		"FIELD_CODE" => array(	// Поля
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",	// Фильтр
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
		"IBLOCK_ID" => "4",	// Код информационного блока
		"IBLOCK_TYPE" => "generalmenu",	// Тип информационного блока (используется только для проверки)
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",	// Включать инфоблок в цепочку навигации
		"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
		"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
		"NEWS_COUNT" => "20",	// Количество новостей на странице
		"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
		"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
		"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
		"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
		"PAGER_TITLE" => "Новости",	// Название категорий
		"PARENT_SECTION" => "",	// ID раздела
		"PARENT_SECTION_CODE" => "",	// Код раздела
		"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
		"PROPERTY_CODE" => array(	// Свойства
			0 => "Linkonsection",
			1 => "htmlcont",
			2 => "Linkslist",
			3 => "",
		),
		"SET_BROWSER_TITLE" => "Y",	// Устанавливать заголовок окна браузера
		"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
		"SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
		"SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
		"SET_STATUS_404" => "N",	// Устанавливать статус 404
		"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
		"SHOW_404" => "N",	// Показ специальной страницы
		"SORT_BY1" => "ACTIVE_FROM",	// Поле для первой сортировки новостей
		"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
		"SORT_ORDER1" => "DESC",	// Направление для первой сортировки новостей
		"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
		"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
	),
	false
);?><br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>