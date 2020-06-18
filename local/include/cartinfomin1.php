<? require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php'); 
if(!CModule::IncludeModule("iblock"))
return; 
?>	
<?
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
      $arItems=CSaleBasket::GetByID($arItems["ID"]);
      $arBasketItems[]=$arItems;   
      $cart_num+=$arItems['QUANTITY'];
      $cart_sum+=$arItems['PRICE']*$arItems['QUANTITY'];
   }
   if (empty($cart_num))
      $cart_num="0";
   if (empty($cart_sum))
      $cart_sum="0";
}
?>
                    <div class="header-middle-control-basket__product"><?=$cart_num?> товаров</div>
                    <div class="header-middle-control-basket__product"><?=$cart_sum?> руб.</div>
					
					
					
					