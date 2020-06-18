<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

    <?
    $sum = 0;
    $quantity = 0;
    ?>
    <? foreach ($arResult["ITEMS"] as $itemres): ?>
        <?
        $sum +=  $itemres["QUANTITY"] *  $itemres["PRICE"];
        $quantity = $quantity + 1;
        ?>
    <? endforeach;?>
   
<?if($quantity==0){?> 
	Товаров пока нет
<?}else{?>   
	<h4>Готовые к заказу</h4>
    <ul class="basket-listing">
    <? $i = 1;  ?>
    <? foreach ($arResult["ITEMS"] as $item): ?>  
        <li>
           <a href="<?echo $item["DETAIL_PAGE_URL"] ?>"><?echo $item["NAME"]?></a><br/>
           <? print floor($item['QUANTITY']) ;?> &times; <?echo $item["PRICE_FORMATED"]?>
        </li>
     <? $i++;?>
    <? endforeach;?>
    </ul>
    <p>Итого: <?php echo number_format($sum, 0, '', ' ')." руб.";  ?></p> 
    <a href="<?=$arParams["PATH_TO_BASKET"];?>">Оформить</a>
<?}?> 