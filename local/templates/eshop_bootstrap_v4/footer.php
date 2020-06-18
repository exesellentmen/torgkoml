<? $APPLICATION->IncludeComponent(
	"bitrix:news.detail",
	"footerdesign",
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_ELEMENT_CHAIN" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_CODE" => "footer",
		"ELEMENT_ID" => $_REQUEST["ELEMENT_ID"],
		"FIELD_CODE" => array(
			0 => "ID",
			1 => "NAME",
			2 => "",
		),
		"IBLOCK_ID" => "15",
		"IBLOCK_TYPE" => "shopequipment",
		"IBLOCK_URL" => "",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Страница",
		"PROPERTY_CODE" => array(
			0 => "",
			1 => "blog",
			2 => "",
		),
		"SET_BROWSER_TITLE" => "Y",
		"SET_CANONICAL_URL" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "Y",
		"SET_META_KEYWORDS" => "Y",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"STRICT_SECTION_CHECK" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_SHARE" => "N",
		"COMPONENT_TEMPLATE" => "footerdesign"
	),
	false
); ?>






















<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
</div>
<!--end .bx-content -->






































<?/*  Старый шаблон сайта






				<!-- region Sidebar -->
				<?if (!$needSidebar):?>
					<div class="sidebar col-md-3 col-sm-4">
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_SHOW" => "sect",
								"AREA_FILE_SUFFIX" => "sidebar",
								"AREA_FILE_RECURSIVE" => "Y",
								"EDIT_MODE" => "html",
							),
							false,
							Array('HIDE_ICONS' => 'Y')
						);?>
					</div>
				<?endif?>
				<!--endregion -->

			</div><!--end row-->
			<?$APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "sect",
					"AREA_FILE_SUFFIX" => "bottom",
					"AREA_FILE_RECURSIVE" => "N",
					"EDIT_MODE" => "html",
				),
				false,
				Array('HIDE_ICONS' => 'Y')
			);?>
		</div><!--end .container.bx-content-section-->
	</div><!--end .workarea-->

	<footer class="bx-footer">
		<div class="bx-footer-section bx-footer-bg">
			<div class="container">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"PATH" => SITE_DIR."include/socnet_footer.php",
						"AREA_FILE_RECURSIVE" => "N",
						"EDIT_MODE" => "html",
					),
					false,
					Array('HIDE_ICONS' => 'Y')
				);?>
			</div>
		</div>
		<div class="bx-footer-section py-5 bg-dark">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-lg-3 order-lg-2 order-1 mb-4 mb-lg-0">
						<h4 class="bx-block-title text-light">
							<? $APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => SITE_DIR."include/about_title.php"
								),
								false
							);?>
						</h4>
						<? $APPLICATION->IncludeComponent(
							"bitrix:menu",
							"bottom_menu",
							array(
								"ROOT_MENU_TYPE" => "bottom",
								"MAX_LEVEL" => "1",
								"MENU_CACHE_TYPE" => "A",
								"CACHE_SELECTED_ITEMS" => "N",
								"MENU_CACHE_TIME" => "36000000",
								"MENU_CACHE_USE_GROUPS" => "Y",
								"MENU_CACHE_GET_VARS" => array(),
							),
							false
						);?>
					</div>
					<div class="col-sm-6 col-lg-3 order-lg-3 order-2 mb-4 mb-lg-0">
						<h4 class="bx-block-title text-light">
							<? $APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => SITE_DIR."include/catalog_title.php"
								),
								false
							);?>
						</h4>
						<?$APPLICATION->IncludeComponent(
							"bitrix:menu",
							"bottom_menu",
							array(
								"ROOT_MENU_TYPE" => "left",
								"MENU_CACHE_TYPE" => "A",
								"MENU_CACHE_TIME" => "36000000",
								"MENU_CACHE_USE_GROUPS" => "Y",
								"MENU_CACHE_GET_VARS" => array(),
								"CACHE_SELECTED_ITEMS" => "N",
								"MAX_LEVEL" => "1",
								"USE_EXT" => "Y",
								"DELAY" => "N",
								"ALLOW_MULTI_SELECT" => "N"
							),
							false
						);?>
					</div>
					<div class="col-sm-6 col-lg-3 order-lg-4 order-3">
						<div style="padding: 20px;background:#eaeaeb">
							<? $APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => SITE_DIR."include/sender.php",
									"AREA_FILE_RECURSIVE" => "N",
									"EDIT_MODE" => "html",
								),
								false,
								array('HIDE_ICONS' => 'Y')
							);?>
						</div>
						<div id="bx-composite-banner" style="padding-top: 20px"></div>
					</div>
					<div class="col-sm-6 col-lg-3 order-lg-1 order-4">
						<div class="mb-3">
							<a class="bx-footer-logo" href="<?=SITE_DIR?>">
								<? $APPLICATION->IncludeComponent(
									"bitrix:main.include",
									"",
									array(
										"AREA_FILE_SHOW" => "file",
										"PATH" => SITE_DIR."include/company_logo_mobile.php"
									),
								false
								);?>
							</a>
						</div>
						<div class="mb-3 d-flex align-items-center">
							<i class="fa fa-phone pr-3 text-white" style="font-size: 25px;"></i>
							<span class="text-white">
								<? $APPLICATION->IncludeComponent(
									"bitrix:main.include",
									"", array(
										"AREA_FILE_SHOW" => "file",
										"PATH" => SITE_DIR."include/telephone.php"
									),
									false
								);?>
							</span>
						</div>
						<div class="mb-3 text-white">
							<? $APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => SITE_DIR."include/schedule.php"
								),
								false
							);?>
						</div>
						<div class="mb-3 text-white">
							<? $APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								array(
									"AREA_FILE_SHOW" => "file",
									"PATH" => SITE_DIR."include/personal.php"
								),
								false
							);?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bx-footer-section py-2 bg-secondary">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 bx-up">
							<a href="javascript:void(0)" data-role="eshopUpButton" class="text-white"><i class="fa fa-caret-up"></i> <?=GetMessage("FOOTER_UP_BUTTON")?></a>
						</div>
						<div class="col-sm-6 text-white text-right">
							<? $APPLICATION->IncludeComponent("bitrix:main.include", "", array(
								"AREA_FILE_SHOW" => "file",
								"PATH" => SITE_DIR."include/copyright.php"
							), false);?>
						</div>
					</div>
				</div>
			</div>
	</footer>
	<div class="col d-sm-none">
		<?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", "bootstrap_v4", array(
				"PATH_TO_BASKET" => SITE_DIR."personal/cart/",
				"PATH_TO_PERSONAL" => SITE_DIR."personal/",
				"SHOW_PERSONAL_LINK" => "N",
				"SHOW_NUM_PRODUCTS" => "Y",
				"SHOW_TOTAL_PRICE" => "Y",
				"SHOW_PRODUCTS" => "N",
				"POSITION_FIXED" =>"Y",
				"POSITION_HORIZONTAL" => "center",
				"POSITION_VERTICAL" => "bottom",
				"SHOW_AUTHOR" => "Y",
				"PATH_TO_REGISTER" => SITE_DIR."login/",
				"PATH_TO_PROFILE" => SITE_DIR."personal/"
			),
			false,
			array()
		);?>
	</div>
</div> <!-- //bx-wrapper -->


<script>
	BX.ready(function(){
		var upButton = document.querySelector('[data-role="eshopUpButton"]');
		BX.bind(upButton, "click", function(){
			var windowScroll = BX.GetWindowScrollPos();
			(new BX.easing({
				duration : 500,
				start : { scroll : windowScroll.scrollTop },
				finish : { scroll : 0 },
				transition : BX.easing.makeEaseOut(BX.easing.transitions.quart),
				step : function(state){
					window.scrollTo(0, state.scroll);
				},
				complete: function() {
				}
			})).animate();
		})
	});
</script>






*/ ?>



<? // Вывод корзины на стр
?>
<? // ===================================
?>

<div id="basket11">

	<? $APPLICATION->IncludeComponent(
		"bitrix:sale.basket.basket",
		"minicart",
		array(
			"AJAX_MODE" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"COLUMNS_LIST" => array(
				0 => "NAME",
				1 => "DISCOUNT",
				2 => "PRICE",
				3 => "QUANTITY",
				4 => "SUM",
				5 => "PROPS",
				6 => "DELETE",
				7 => "DELAY",
			),
			"COUNT_DISCOUNT_4_ALL_QUANTITY" => "N",
			"HIDE_COUPON" => "N",
			"OFFERS_PROPS" => array(
				0 => "SIZES_SHOES",
				1 => "SIZES_CLOTHES",
				2 => "COLOR_REF",
			),
			"PATH_TO_ORDER" => "/personal/order/make/",
			"PRICE_VAT_SHOW_VALUE" => "Y",
			"QUANTITY_FLOAT" => "N",
			"SET_TITLE" => "Y",
			"TEMPLATE_THEME" => "site",
			"COMPONENT_TEMPLATE" => "minicart",
			"DEFERRED_REFRESH" => "N",
			"USE_DYNAMIC_SCROLL" => "Y",
			"SHOW_FILTER" => "Y",
			"SHOW_RESTORE" => "Y",
			"COLUMNS_LIST_EXT" => array(
				0 => "PREVIEW_PICTURE",
				1 => "DISCOUNT",
				2 => "DELETE",
				3 => "DELAY",
				4 => "TYPE",
				5 => "SUM",
				6 => "PROPERTY_Gallery",
				7 => "PROPERTY_Article",
			),
			"COLUMNS_LIST_MOBILE" => array(
				0 => "PREVIEW_PICTURE",
				1 => "DISCOUNT",
				2 => "DELETE",
				3 => "DELAY",
				4 => "TYPE",
				5 => "SUM",
				6 => "PROPERTY_Gallery",
				7 => "PROPERTY_Article",
			),
			"TOTAL_BLOCK_DISPLAY" => array(
				0 => "top",
			),
			"DISPLAY_MODE" => "extended",
			"PRICE_DISPLAY_MODE" => "Y",
			"SHOW_DISCOUNT_PERCENT" => "Y",
			"DISCOUNT_PERCENT_POSITION" => "bottom-right",
			"PRODUCT_BLOCKS_ORDER" => "props,sku,columns",
			"USE_PRICE_ANIMATION" => "Y",
			"LABEL_PROP" => array(),
			"USE_PREPAYMENT" => "N",
			"CORRECT_RATIO" => "Y",
			"AUTO_CALCULATION" => "Y",
			"ACTION_VARIABLE" => "basketAction",
			"COMPATIBLE_MODE" => "Y",
			"EMPTY_BASKET_HINT_PATH" => "/",
			"ADDITIONAL_PICT_PROP_2" => "-",
			"ADDITIONAL_PICT_PROP_3" => "-",
			"ADDITIONAL_PICT_PROP_6" => "-",
			"ADDITIONAL_PICT_PROP_16" => "-",
			"ADDITIONAL_PICT_PROP_18" => "-",
			"ADDITIONAL_PICT_PROP_19" => "-",
			"BASKET_IMAGES_SCALING" => "adaptive",
			"USE_GIFTS" => "Y",
			"GIFTS_PLACE" => "BOTTOM",
			"GIFTS_BLOCK_TITLE" => "Выберите один из подарков",
			"GIFTS_HIDE_BLOCK_TITLE" => "N",
			"GIFTS_TEXT_LABEL_GIFT" => "Подарок",
			"GIFTS_PRODUCT_QUANTITY_VARIABLE" => "quantity",
			"GIFTS_PRODUCT_PROPS_VARIABLE" => "prop",
			"GIFTS_SHOW_OLD_PRICE" => "N",
			"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
			"GIFTS_MESS_BTN_BUY" => "Выбрать",
			"GIFTS_MESS_BTN_DETAIL" => "Подробнее",
			"GIFTS_PAGE_ELEMENT_COUNT" => "4",
			"GIFTS_CONVERT_CURRENCY" => "N",
			"GIFTS_HIDE_NOT_AVAILABLE" => "N",
			"USE_ENHANCED_ECOMMERCE" => "N"
		),
		false
	); ?>

</div>




















<!-- Новый дизайн -->





<?/*
	  

	<!-- Обработчик событий в файле js/app.js Функция появления окна в toggleHeaderBasket-->
    <div class="basket_header">
	
	
	<div class="cartinnerpv">
	<div class='contentcartpv'>
		<div class="basket_header__items">
          <div class="basket_header__item">
            <div class="basket_header__col one"><a class="basket_header__pic" href="#"><img class="basket_header__img" src="/local/templates/eshop_bootstrap_v4/assets/img/basket_img.png" alt=""></a></div>
            <div class="basket_header__col two">
              <div class="basket_header-hero"><a class="basket_header__name" href="#" style="">Вешало напольное ST-02.60 в цвете латунь для одежды и ремней</a>
                <div class="basket_header__art">Артикул: ST-02.60</div>
                <div class="basket_header__count">5 шт</div>
              </div>
            </div>
            <div class="basket_header__col free"><a class="basket_header__delete toggleTitle" href="#">
                <div class="lnr lnr-trash basket_header__icon"></div></a>
              <div class="basket_header-price">
                <div class="basket_header-price__summ">95 790 руб.</div>
              </div>
            </div>
          </div>
          <div class="basket_header__item">
            <div class="basket_header__col one"><a class="basket_header__pic" href="#"><img class="basket_header__img" src="/local/templates/eshop_bootstrap_v4/assets/img/basket_img.png" alt=""></a></div>
            <div class="basket_header__col two">
              <div class="basket_header-hero"><a class="basket_header__name" href="#">Вешало напольное ST-02.60 в цвете латунь для одежды и ремней</a>
                <div class="basket_header__art">Артикул: ST-02.60</div>
                <div class="basket_header__count">5 шт</div>
              </div>
            </div>
            <div class="basket_header__col free"><a class="basket_header__delete toggleTitle" href="#">
                <div class="lnr lnr-trash basket_header__icon"></div></a>
              <div class="basket_header-price">
                <div class="basket_header-price__summ">95 790 руб.</div>
              </div>
            </div>
          </div>
          <div class="basket_header__item">
            <div class="basket_header__col one"><a class="basket_header__pic" href="#"><img class="basket_header__img" src="/local/templates/eshop_bootstrap_v4/assets/img/basket_img.png" alt=""></a></div>
            <div class="basket_header__col two">
              <div class="basket_header-hero"><a class="basket_header__name" href="#">Вешало напольное ST-02.60 в цвете латунь для одежды и ремней</a>
                <div class="basket_header__art">Артикул: ST-02.60</div>
                <div class="basket_header__count">5 шт</div>
              </div>
            </div>
            <div class="basket_header__col free"><a class="basket_header__delete toggleTitle" href="#">
                <div class="lnr lnr-trash basket_header__icon"></div></a>
              <div class="basket_header-price">
                <div class="basket_header-price__new">95 790 руб.</div>
                <div class="basket_header-price__old">177 250 руб.</div>
              </div>
            </div>
          </div>
          <div class="basket_header__item">
            <div class="basket_header__col one"><a class="basket_header__pic" href="#"><img class="basket_header__img" src="/local/templates/eshop_bootstrap_v4/assets/img/basket_img.png" alt=""></a></div>
            <div class="basket_header__col two">
              <div class="basket_header-hero"><a class="basket_header__name" href="#">Вешало напольное ST-02.60 в цвете латунь для одежды и ремней</a>
                <div class="basket_header__art">Артикул: ST-02.60</div>
                <div class="basket_header__count">5 шт</div>
              </div>
            </div>
            <div class="basket_header__col free"><a class="basket_header__delete " href="#">
                <div class="lnr lnr-trash basket_header__icon"></div></a>
              <div class="basket_header-price">
                <div class="basket_header-price__summ">95 790 руб.</div>
              </div>
            </div>
          </div>
          <div class="basket_header__item">
            <div class="basket_header__col one"><a class="basket_header__pic" href="#"><img class="basket_header__img" src="/local/templates/eshop_bootstrap_v4/assets/img/basket_img.png" alt=""></a></div>
            <div class="basket_header__col two">
              <div class="basket_header-hero"><a class="basket_header__name" href="#">Вешало напольное ST-02.60 в цвете латунь для одежды и ремней</a>
                <div class="basket_header__art">Артикул: ST-02.60</div>
                <div class="basket_header__count">5 шт</div>
              </div>
            </div>
            <div class="basket_header__col free"><a class="basket_header__delete " href="#">
                <div class="lnr lnr-trash basket_header__icon"></div></a>
              <div class="basket_header-price">
                <div class="basket_header-price__summ">95 790 руб.</div>
              </div>
            </div>
          </div>
          <div class="basket_header__item">
            <div class="basket_header__col one"><a class="basket_header__pic" href="#"><img class="basket_header__img" src="/local/templates/eshop_bootstrap_v4/assets/img/basket_img.png" alt=""></a></div>
            <div class="basket_header__col two">
              <div class="basket_header-hero"><a class="basket_header__name" href="#">Вешало напольное ST-02.60 в цвете латунь для одежды и ремней</a>
                <div class="basket_header__art">Артикул: ST-02.60</div>
                <div class="basket_header__count">5 шт</div>
              </div>
            </div>
            <div class="basket_header__col free"><a class="basket_header__delete " href="#">
                <div class="lnr lnr-trash basket_header__icon"></div></a>
              <div class="basket_header-price">
                <div class="basket_header-price__summ">95 790 руб.</div>
              </div>
            </div>
          </div>
          <div class="basket_header__item">
            <div class="basket_header__col one"><a class="basket_header__pic" href="#"><img class="basket_header__img" src="/local/templates/eshop_bootstrap_v4/assets/img/basket_img.png" alt=""></a></div>
            <div class="basket_header__col two">
              <div class="basket_header-hero"><a class="basket_header__name" href="#">Вешало напольное ST-02.60 в цвете латунь для одежды и ремней</a>
                <div class="basket_header__art">Артикул: ST-02.60</div>
                <div class="basket_header__count">5 шт</div>
              </div>
            </div>
            <div class="basket_header__col free"><a class="basket_header__delete " href="#">
                <div class="lnr lnr-trash basket_header__icon"></div></a>
              <div class="basket_header-price">
                <div class="basket_header-price__new">95 790 руб.</div>
                <div class="basket_header-price__old">177 250 руб.</div>
              </div>
            </div>
          </div>
          <div class="basket_header__item">
            <div class="basket_header__col one"><a class="basket_header__pic" href="#"><img class="basket_header__img" src="/local/templates/eshop_bootstrap_v4/assets/img/basket_img.png" alt=""></a></div>
            <div class="basket_header__col two">
              <div class="basket_header-hero"><a class="basket_header__name" href="#">Вешало напольное ST-02.60 в цвете латунь для одежды и ремней</a>
                <div class="basket_header__art">Артикул: ST-02.60</div>
                <div class="basket_header__count">5 шт</div>
              </div>
            </div>
            <div class="basket_header__col free"><a class="basket_header__delete " href="#">
                <div class="lnr lnr-trash basket_header__icon"></div></a>
              <div class="basket_header-price">
                <div class="basket_header-price__summ">95 790 руб.</div>
              </div>
            </div>
          </div>
        </div>
	</div>
	
	
	
	
	
	  
	  
	  
	  
      <div class="basket_header-info">
        <div class="basket_header-info__item">
          <div class="basket_header-info__name">Кол-во:</div>
          <div class="basket_header-info__value">26 шт</div>
        </div>
        <div class="basket_header-info__item">
          <div class="basket_header-info__name">Итог:</div>
          <div class="basket_header-info__value">478 950 руб.</div>
        </div>
      </div><a class="basket_header-notes" href="#"><img class="basket_header-notes__img" src="/local/templates/eshop_bootstrap_v4/assets/img/basket-banner.png" alt="">
        <!--.basket_header-notes__text Скидка на изготовление полок 20% до конца ноября--></a>
      <div class="basket_header-control"><a class="basket_header-control__order btn-common-black" href="#">Перейти в корзину</a>
        <!--a.basket_header-control__close.btn-common-empty(href="#") Продолжить покупки-->
      </div>
	  
	</div>
</div>	




*/ ?>



















<!--Перенести в футер-->
<script src="/local/templates/eshop_bootstrap_v4/assets/js/foundation.js" defer></script>

<script src="/local/templates/eshop_bootstrap_v4/assets/js/jquery.jscrollpane.min.js" defer></script>
<script src="/local/templates/eshop_bootstrap_v4/assets/js/jquery.mousewheel.js" defer></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js" defer></script>
<script src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js" defer></script>


<script src="/local/templates/eshop_bootstrap_v4/assets/js/app.js" defer></script>


<?/* 
    


*/ ?>



<script>
	/*

$('body').on('mouseenter mouseleave','.lll', function() {
	
	$('.lll').css("background-color","black");
	
	//  alert(22222);
	  
	 
	  
});
	*/
	/*
	//Пример hover	
	$("body").on({
	    mouseenter: function () {
	        //stuff to do on mouse enter
			$('.lll').css("background-color","black");
	    },
	    mouseleave: function () {
	        //stuff to do on mouse leave
			$('.lll').css("background-color","white");
	    }
	},'.lll');	
		*/



	/*
	//Пример hover	
	$("body").on({
	    mouseenter: function (this) {
	        //stuff to do on mouse enter
			$('.lll').css("background-color","black");
	    },
	    mouseleave: function () {
	        //stuff to do on mouse leave
			$('.lll').css("background-color","white");
	    }
	},'.lll');	
		*/






	/*
	
	//Пример hover	
$("body").on({
    mouseenter: function () {
        //stuff to do on mouse enter
		$('.sectionCatalogList-items-prev-price__new').css("background-color","black");
    },
    mouseleave: function () {
        //stuff to do on mouse leave
		$('.sectionCatalogList-items-prev-price__new').css("background-color","white");
    }
},'.sectionCatalogList-items-prev-price__new');	
	
*/












	/*	
	$( ".lll" ).click(function() {
	  alert(22222);
	});

	function include(url) {
	    var script = document.createElement('script');
	    script.src = url;
	    document.getElementsByTagName('body')[0].appendChild(script);
	}
	 include("/local/templates/eshop_bootstrap_v4/assets/js/foundation.js");

	*/


	/*

	$(".qqq"").on({
	    mouseenter: function () {
	        //stuff to do on mouse enter
			alert(555);
			$('.lll').css("background-color","black");
	    },
	    mouseleave: function () {
	        //stuff to do on mouse leave
			alert(555);
			$('.lll').css("background-color","white");
	    }
	},'.lll');	

	*/
</script>



















<style>
	.sectionCatalogList-items__item:hover .sectionCatalogList-items-prev {
		display: flex !important;

	}

	.sectionCatalogList-items-prev-slider__item {
		overflow: hidden;
	}
</style>






<script>
	/*
//Пример hover	
$("body").on({
    mouseenter: function (this) {
        //stuff to do on mouse enter
		alert(55);
		$('.sectionCatalogList-items-prev-price__new').css("background-color","black");
    },
    mouseleave: function () {
        //stuff to do on mouse leave
		alert(55);
		$('.sectionCatalogList-items-prev-price__new').css("background-color","white");
    }
},'.sectionCatalogList-items-prev-price__new');	
	
	*/
</script>



<?/* Раскрытие и скрытие выпадающего списка*/ ?>
<script>
	/*
  $('body').on('click','.sectionCatalogFilter-selected__item', function() {
    pageCatalogSectionsGetSelectedFilter($(this));
  });
*/

	/*
  
$('.favourites-items__item').hover(function (e) {
        $(this).find('.favourites-popup-slider__items').slick('setPosition', 0);
    });

*/


	/*
		
		$("body").on({
	    mouseenter: function (this) {
	        //stuff to do on mouse enter
			alert(55);
			$(this).find('.favourites-popup-slider__items').slick('setPosition', 0);
	    },
	    mouseleave: function () {
	        //stuff to do on mouse leave
			alert(55);
			$(this).find('.favourites-popup-slider__items').slick('setPosition', 0);
	    }
	},'.favourites-items__item');	
		
		*/







	var opnedrop = false;
	var q = false;
	var noncl = false;


	$('body').on('click', '.noneclick', function() {
		noncl = true;

	});


















	$('body').on('click', '.sectionCatalogFilter-selected', function() {
		//	alert(1);

		if (!noncl) {

			if ($(this).hasClass("active1")) {



				$(this).removeClass("active1");
				$(this).removeClass("active");
				opnedrop = false;
			} else {
				$('.sectionCatalogFilter-selected').removeClass("active");
				$('.sectionCatalogFilter-selected').removeClass("active1");


				$(this).addClass("active");
				$(this).addClass("active1");
				opnedrop = true;

			}
			q = true;

		}

	});

	$('body').on('click', function() {
		//	alert(2);


		if (!noncl) {

			if (!q) {

				if (opnedrop) {
					$('.sectionCatalogFilter-selected').removeClass("active1");
					$('.sectionCatalogFilter-selected').removeClass("active");

				}

			}

			q = false;


		}
		noncl = false;
	});
</script>




<style>
	@media (min-width:1270px) {

		.catalogDetail-tabs-tab__wrap,
		.sectionCatalogFilter__row.one {
			justify-content: unset !important;
		}
	}

	.sectionCatalogList-items-prev-price__buy,
	.sectionCatalogList-items-control__buy {
		align-items: center;
		justify-content: center;
		display: flex;
	}
</style>









<script>
	addEventListener("popstate", function(e) {



	}, false);




	$('body').on('click', '.sectionCatalogList-items-prev-price__buy', function() {

		$(this).html("Добавлено");
		$(this).css("background", "#2f2f2f");
		$(this).parents(".sectionCatalogList-items__item").find(".sectionCatalogList-items-control__buy").html("Добавлено");
		$(this).parents(".sectionCatalogList-items__item").find(".sectionCatalogList-items-control__buy").css("background", "#2f2f2f");
		$(this).parents(".sectionCatalogList-items__item").find(".sectionCatalogList-items-control__buy").css("color", "white");


	});
</script>









<a class="scrollTop" href="#">Наверх</a>


<style>
	.sectionCatalogList-items__item:hover .sectionCatalogList-items-prev {
		//display: none !important;

	}


	.product-item-amount-field-btn-plus {
		height: 16px !important;
	}


	.product-item-amount-field-btn-plus,
	.product-item-amount-field-btn-minus {

		min-width: 15px !important;
		text-align: left;
	}

	.product-item-amount-field-container {
		letter-spacing: -2.5px;
		width: 80px;
		text-align: left;
	}


	.product-item-amount-field {
		text-align: left;
	}

	.product-item-info-container {
		margin-bottom: unset;
	}

	.sectionCatalogList-items__item:hover .sectionCatalogList-items-prev {
		/*display: none !important;*/
	}


	.breadcrumbs,
	.sectionCatalogFilter,
	.comman_h1,
	.sectionCatalogList-sort {
		margin-left: unset !important;
		margin-right: unset !important;
	}


	@media (min-width: 1270px) {

		.catalogDetail-tabs-tab__wrap,
		.sectionCatalogFilter__row.one {
			justify-content: space-between !important;
		}

		.sectionCatalogFilter-info__reset {
			padding-right: 0px;
		}

	}





	.sectionCatalogList-items-prev-price__buy.black {
		color: #fff;
		background-color: #ff4500;
	}

	.sectionCatalogList-items-control__buy.black {
		background-color: #ffffff;
		color: #000;

	}



	/*Каталог*/

	.pvcataloglist .catalog-section-list-item-img {
		border: 0px white !important;
		background-size: contain !important;
		width: 218px !important;
		height: 157px !important;
		padding-top: 157px !important;
		margin-bottom: 23px;

	}



	.pvcataloglist .col-md-2 {
		padding: 0px !important;

	}


	.pvcataloglist .col-md-2 {
		display: inline-block !important;
		width: 25% !important;
		max-width: unset !important;
		border: unset !important;
	}



	.pvcataloglist .catalog-section-list-tile-list {
		display: block;

	}


	.pvcataloglist .catalog-section-list-item-inner {
		margin-bottom: 46px !important;

	}

	.pvcataloglist .catalog-section-list-item:hover .catalog-section-list-tile-img-container {
		opacity: .5;

	}

	.pvcataloglist .catalog-section-list-item:hover .catalog-section-list-item-link {
		font-weight: 600;

	}



	.sectionCatalogList-items-prev {
		left: -30px !important;
		top: 0px !important;
		width: 275px !important;
		min-height: 530px;
	}

	.fastreview {
		text-align: center;
	}
</style>




<style>
	@media (min-width: 1270px) {

		.container {
			width: 1270px !important;

		}

	}



	@media (max-width: 1270px) {

		.container {
			width: 100% !important;

		}








		.catalog-section-list-item-inner {
			font-style: normal !important;
			font-weight: 300 !important;
			font-size: 15px !important;
			line-height: 20px !important;
			color: #2f2f2f !important;
			text-decoration: none !important;

		}


		.catalog-section-list-item-link:hover {
			text-decoration: none !important;

		}


		.product-item-amount-description-container {

			text-decoration: none !important;
		}









	}
</style>







<style>
	/*
.elem11:before {
    content: "" !important;
    display: block !important;
    padding-top: 100% !important;
}

.sectionCatalogList-items-prev.info{
	display: none !important;
	
}


.sectionCatalogList-items__item:hover .sectionCatalogList-items-prev {
    display: none !important;
}



.scroll_child .elem11:not(:first-child) {
 /*   display: inline-block;*/
	}


	.scroll_child>div {
		display: inline-block;
	}

	*/
	/*
.sectionCatalogList-items-prev.info{
	display: none !important;
	
}


.sectionCatalogList-items__item:hover .sectionCatalogList-items-prev {
    display: none !important;
}

*/
</style>





<? // Мобильная версия для скролла галереи
?>



<style>
	.scroll {
		width: 100%;
		overflow-x: scroll;
		overflow-y: hidden;
	}

	.scroll_child {

		text-align: center;
	}

	.scroll_child>div {
		display: inline-block;
	}

	.qqqq {
		padding-left: 22px;
	}



	.qqqq ::-webkit-scrollbar-thumb {
		border-radius: 0px !important;
		background-color: #f9a6a600 !important;
		background: rgba(0, 0, 0, 0);
	}


	.qqqq ::-webkit-scrollbar-track {
		background-color: #f9a6a600 !important;
		background: rgba(0, 0, 0, 0);
	}


	.qqqq ::-webkit-scrollbar-button {
		background-color: #f9a6a600 !important;
		background: rgba(0, 0, 0, 0);
		width: 5px;
		height: 0px;
		background-repeat: no-repeat;
	}

	.scroll_child {
		white-space: nowrap;

	}



	.elem {
		vertical-align: top;

	}




	.scroll_child {

		width: 100%;
	}

	.qqqq {
		width: 1270px;
		margin: auto;
		padding-left: 0px;
	}



	.elem {
		width: 20%;
	}


	.qqqq a {


		width: 100%;
		margin-bottom: 50px !important;
		display: flow-root;

	}





















	.scroll_child {

		width: 100%;
	}

	.qqqq {
		width: 1270px;
		margin: auto;
		padding-left: 0px;
	}



	.elem {
		width: 20%;
	}


	.qqqq a {


		width: 100%;
		margin-bottom: 50px !important;
		display: flow-root;

	}




	.gallerypv {
		width: 100%;
		height: 200px;
		background-repeat: no-repeat;
		background-position: center;
		background-size: contain;
	}

	.gallerypvcontent {
		width: 100%;
		height: 200px;

	}


	.arrowleftpv,
	.arrowrightpv {
		display: inline-block;

	}














	.elem {
		width: 280px;

	}

	.itemtextpv {
		text-align: left;
		font-style: normal;
		font-weight: 600;
		font-size: 13px;
		line-height: 18px;
		color: #2f2f2f;
		margin-bottom: 20px;
		white-space: normal;
		margin: 0 20px 20px 20px;
		height: 40px;
		overflow: hidden;
	}







	/*При наведении */

	.elem:hover .itempv {
		border: solid 1px #b8b8b8;

	}

	.elem:hover .fastreview {
		opacity: 1;

	}

	.tabcellpv {
		display: table-cell;
		vertical-align: middle;

	}


	.gallerypvcontent {
		display: table;
	}


	.elem11 {
		width: 216px;
		height: 200px;
		background-image: url(/assest/img/slider-2.png);
		width: 100%;
		height: 200px;
		background-repeat: no-repeat;
		background-position: center;
		background-size: contain;
	}


	.scroll_child {
		transition: transform 0.5s ease, 0.5s ease, filter 0.5s;
	}


	.elem11 {
		margin: 0 2px 0 2px;

	}


	.gallerypv .qqqq {
		width: unset;

	}




	.arrowrightpv,
	.arrowleftpv {
		opacity: 0;

	}


	.elem:hover .arrowrightpv,
	.elem:hover .arrowleftpv {
		opacity: 1;

	}







	.qqqq1 {
		display: flex;

	}

	.tabcellpv1 {
		vertical-align: middle;
		margin: auto;
	}




	.elem {
		width: calc(((100% - 21px) / 5));
	}



















	.arrowrightpv1 {
		cursor: pointer;
	}



	.arrowleftpv {
		cursor: pointer;
	}

	.arrowrightpv {
		cursor: pointer;
	}



	.elem11:before {
		content: "";
		display: block;
		padding-top: 100%;

	}

	.elem11 {
		height: unset !important;
	}

	.statusorder {
		margin-bottom: 12px;
	}


	.tabcellpv:before {
		content: "";
		display: block;
		padding-top: 0px;
		padding-bottom: 0px;
	}

	.gallerypv,
	.gallerypvcontent {
		height: unset !important;
	}









	.scroll_child {
		text-align: left;
	}

	.elem {
		width: 214px !important;
	}







	.hits .scroll_child {
		letter-spacing: -2.5px;
	}

	.hits .scroll_child .elem {
		letter-spacing: normal;
	}


	.qqqq1 .scroll_child {
		letter-spacing: -2.5px;
	}

	.qqqq1 .scroll_child .elem {
		letter-spacing: normal;
	}






	@media (max-width: 1270px) {

		.btleft,
		.btright {
			display: table-cell;
		}




	}




	@media (min-width: 1270px) {

		.mobiver {
			display: none;

		}

		.pcver {
			display: block;

		}


	}


	@media (max-width: 1270px) {

		.mobiver {
			display: block;

		}

		.pcver {
			display: none;

		}


	}
</style>




<? // Сокращенный код
?>
<style>
	.scroll_child {
		text-align: center;
		white-space: nowrap;
		width: 100%;
		transition: transform 0.5s ease, 0.5s ease, filter 0.5s;
		text-align: left;
	}


	.scroll {
		width: 100%;
		overflow-x: scroll;
		overflow-y: hidden;
	}

	.scroll_child>div {
		display: inline-block;
	}

	.qqqq {
		padding-left: 22px;
		width: 1270px;
		margin: auto;
		padding-left: 0px;
	}


	.elem {
		vertical-align: top;
		width: 214px !important;
	}






	.sectionCatalogMenu__link {
		text-decoration: none !important;

	}

	.catalog-section-list-item-link {
		font-size: 15px;
		font-family: 'Open Sans';
	}
</style>


<style>
	.mobifilter {
		display: none !important;
	}



	.sectionCatalogList-items__item-sale {
		background: white;

	}




	@media (min-width: 1270px) {

		.btright1 {
			margin-right: 0px !important;
			margin-left: 0px !important;

		}

		.pvcataloglist .sectionCatalogList {
			margin-bottom: 0px !important;


		}


		.btleft1 {
			margin-right: 0px !important;
			margin-left: 0px !important;


		}

		.scroll.innercont {
			margin: auto !important;
			width: 1200px !important;
		}



		.elem {
			width: 240px !important;
		}

		.sectionCatalogList {
			margin-bottom: 0px !important;

		}

		.sectionCatalogNav {
			margin-bottom: 0px !important;

		}


	}
</style>



<script>
	$("body").on({
		mouseenter: function() {
			//stuff to do on mouse enter
			$(this).addClass('active');
		},
		mouseleave: function() {
			//stuff to do on mouse leave
			$(this).removeClass('active');
		}
	}, '.toggleTitle');
</script>






<style>

.catalogDetailInfoProp__item.sale{
	
	    font-weight: 600;
    font-size: 10px;
	    background: #ff4500;
    color: white;
}

.discountpv{
	font-weight: 600;
    font-size: 10px;
	    background: #ff4500;
    color: white;
	
	
}

.sectionCatalogList-items__item-sale{
	font-weight: 600;
    font-size: 10px;
	    background: #ff4500;
    color: white;
	
}

</style>





<script>
	//Поделиться
	$('body').on('click', '.catalogDetailPhoto-big__popup.one', function() {

		$(this).toggleClass('active');

	});
</script>








</body>

</html>