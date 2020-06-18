<? require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php'); 
if(!CModule::IncludeModule("iblock"))
return; 
// Удаление товаров из корзины

 if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main;
use Bitrix\Main\Localization\Loc;

\Bitrix\Main\UI\Extension::load("ui.fonts.ruble");







 
	$shag = json_decode($_POST['checks'], true);


//	echo $shag ;

	
	
	
	if(CModule::IncludeModule("sale")){
		

$dbBasketItems = CSaleBasket::GetList(array(
                "SORT" => "ASC",
                "NAME" => "ASC"
            ),
        array("PRODUCT_ID" => $shag,
		"FUSER_ID" => CSaleBasket::GetBasketUserID(),
		 "LID" => SITE_ID,
		 "ORDER_ID" => "NULL"
		)
		
		);
		
		while ($arItems = $dbBasketItems->Fetch())
		{
			//print_r($arItems);
		//	echo $arItems[ID]." ";
		
		$aa=$arItems[ID];
			
		}




		
		
		
		
	}
	
	//$aa="";
	
	
	//echo '-'.$aa.'-';
	

	if(CModule::IncludeModule("sale"))
		{//здесь можно использовать функции классов модуля sale
			CSaleBasket::Delete($aa);
		}

			
			
			
?>

