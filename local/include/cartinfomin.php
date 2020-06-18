<? require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php'); 
if(!CModule::IncludeModule("iblock"))
return; 
//Определение количества товаров в корзине и общую стоимость








if (CModule::IncludeModule("sale"))
{
   $arBasketItems = array();
   $dbBasketItems = CSaleBasket::GetList(
                  array("NAME" => "ASC","ID" => "ASC"),
                  array("FUSER_ID" => CSaleBasket::GetBasketUserID(), "LID" => SITE_ID, "ORDER_ID" => "NULL"),
                  false,
                  false,
				  array());
                  
				  
				  
   while ($arItems=$dbBasketItems->Fetch())
   {
	  
		$arDiscounts = CCatalogDiscount::GetDiscountByProduct(
		$arItems[PRODUCT_ID],
		$USER->GetUserGroupArray(),
		"N",
		1,
		SITE_ID
		);
		
		
		if($arDiscounts !== false) {
		  $price = \CCatalogProduct::CountPriceWithDiscount(
			  $arItems["PRICE"],
			  $arItems["CURRENCY"],
			  $arDiscounts
		  );
		}
		
		
	   
      $arItems=CSaleBasket::GetByID($arItems["ID"]);
      $arBasketItems[]=$arItems;   
	  
	  
	  
	  
      $cart_num+=$arItems['QUANTITY'];
	
		$cart_sum+=$price*$arItems['QUANTITY'];
   }
   if (empty($cart_num))
      $cart_num="0";
   if (empty($cart_sum))
      $cart_sum="0";
}



$cart_sum = round ($cart_sum);


$arr['cost'] = $cart_sum."  руб.";
$arr['count'] = $cart_num." товаров";

echo json_encode($arr);

































/*
                <div class="scrollHeader-basket__order-text"><?=$cart_num?> товаров</div>
                <div class="scrollHeader-basket__order-text"><?=$cart_sum?> руб.</div>
              
*/?>

