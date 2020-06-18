<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог товаров 3");
?><?/*

<?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", "minicatinfo", Array(
	"HIDE_ON_BASKET_PAGES" => "Y",	// Не показывать на страницах корзины и оформления заказа
		"PATH_TO_BASKET" => SITE_DIR."personal/cart/",	// Страница корзины
		"PATH_TO_ORDER" => SITE_DIR."personal/order/make/",	// Страница оформления заказа
		"PATH_TO_PERSONAL" => SITE_DIR."personal/",	// Страница персонального раздела
		"PATH_TO_PROFILE" => SITE_DIR."personal/",	// Страница профиля
		"PATH_TO_REGISTER" => SITE_DIR."login/",	// Страница регистрации
		"POSITION_FIXED" => "Y",	// Отображать корзину поверх шаблона
		"POSITION_HORIZONTAL" => "right",	// Положение по горизонтали
		"POSITION_VERTICAL" => "top",	// Положение по вертикали
		"SHOW_AUTHOR" => "Y",	// Добавить возможность авторизации
		"SHOW_DELAY" => "N",	// Показывать отложенные товары
		"SHOW_EMPTY_VALUES" => "Y",	// Выводить нулевые значения в пустой корзине
		"SHOW_IMAGE" => "Y",	// Выводить картинку товара
		"SHOW_NOTAVAIL" => "N",	// Показывать товары, недоступные для покупки
		"SHOW_NUM_PRODUCTS" => "Y",	// Показывать количество товаров
		"SHOW_PERSONAL_LINK" => "N",	// Отображать персональный раздел
		"SHOW_PRICE" => "Y",	// Выводить цену товара
		"SHOW_PRODUCTS" => "Y",	// Показывать список товаров
		"SHOW_SUMMARY" => "Y",	// Выводить подытог по строке
		"SHOW_TOTAL_PRICE" => "Y",	// Показывать общую сумму по товарам
	),
	false
);?>
					
*/?>




<?//Стили?>


<style>
.scroll_child{
	    font-size: 0px !important;
	
}
</style>


	  
				<style>
				.qqqq99{
					position: relative;
					}
				
				.ggghhh{
					 height: 200px;
					position: absolute;
					width: 100%;
					    z-index: 200;
						overflow: scroll;
					
				}
				.ggghhh1{
					
    width: 200%;
	height: 40px;
					    left: 50%;
				}
				
				</style>	  
		


<style>
.smart-filter-section{
	width: 1000px;
    margin: auto;	
}

</style>


<style>

.titlegoods{
margin-top: 25px;	
	
}





.sectionCatalogList-sort{
	display:none;
	
}




@media (min-width: 600px){
	.sectionCatalogList-items-prop{
		min-height:102px;
		
	}
	
	.sectionCatalogList-items-price{
		min-height:38px;	
		
	}
	
}








.catalog-section-list-item-link{
	color: #2f2f2f;
	font-family: 'Open Sans' !important;	
	
}



.sectionCatalogMenu__link{
	font-family: 'Open Sans';
	
}


.sectionCatalogMenuSub__link{
	font-family: 'Open Sans' !important;
	text-decoration: dashed !important;
	font-size: 13px !important;
}









.sectionCatalogNav__item{
    margin-right: 0px !important;
    padding-right: 0px !important;	
	
}

.sectionCatalogNav__item, .sectionCatalogNav__link{
    margin-right: 0px !important;
    padding-right: 2px !important;	
	margin-left: 2px;
    padding-left: 0px !important;
	
}

.sectionCatalogNav__item a{
	    margin-right: 0px !important;
    padding-right: 2px !important;	
	margin-left: 2px;
    padding-left: 0px !important;	
	
}


.sectionCatalogNav__items li{
	    display: unset !important;	
    max-width: unset !important;	
	
}




.sectionCatalogFilter__row.one.sort1{
	display:none;
	
}





.fastreview{
	height: 40px;
    display: block;
    vertical-align: middle;
	padding-top: 10px !important;
	
}





.itemtextpv a, .catalog-section-list-item-title a{
    text-decoration: blink !important;
}



@media (max-width: 1270px){
	.qqqq{
		    position: relative !important;
		
	}
	
	.elem11{
		display:inline-block !important
		
	}
	
	.container .page-index__title{
		width: 100%;
		padding: 0 20px 0 20px;
		
	}
	
	.container .defaulttext{
		width: 100%;
		padding: 0 20px 0 20px;
		
	}
	
}
	








.catalog-section-list-item-inner{
	font-style: normal !important;
    font-weight: 300 !important;
    font-size: 15px !important;
    line-height: 20px !important;
    color: #2f2f2f !important;
    text-decoration: none !important;
	
}


.catalog-section-list-item-inner:hover{
	    font-weight: 600;
	
}


.catalogDetailProdukts-slider-mini-prop.catalogSectionPropHeight{
	min-height:18px;
	
}




.hits a{
color: #2f2f2f;	
	
}







/*

.pricepv{
	display: table;
    vertical-align: middle;
    text-align: right;
    min-height: 39px;
    float: right;
}

.newprice{
	display: table-cell;
    color: #000000;
    text-align: right;
    vertical-align: middle;
    margin: auto auto;
}

*/

.fastreview{
	font-size: 13px;
	
}


.sectionCatalogList-items__item{
	height: auto !important;
	
}




 
.sectionCatalogList-items-prev{
	    width: 130%;
}

/*
.sectionCatalogList-items-prev{
				display: block !important;
			}
*/







	/* Для мобильной версии каталог*/


	@media(max-width:1270px){
		
		
		/*
		.sectionCatalogFilter__row.one{
			display: none !important;
		}
		*/
		
		.sectionCatalogFilter-info{
				display: block !important;
		}	
		
		
		
		
		.pvico1{
			width: 20px;
			display: inline-block;
			top: 3px;
		}
		
		.pvico2{
			display: inline-block;
			
		}
		
		.sectionCatalogFilter-info__col.three{
			
			
		}
		
		.sectionCatalogFilter-info__col.one{
			margin-bottom: 1.6rem;
		}
		
		
		
		.sectionCatalogNav{
			margin-bottom: 30px;
			
		}
		
		
		.catalogDetailProdukts__title{
			margin-bottom: 40px;	
		}
		
		
		
		.catalogDetailProdukts-slider__btn-left.slick-arrow{
			left: -25px !important;
			right: unset !important;	
		}

		.catalogDetailProdukts-slider__btn-right.slick-arrow{
		right: -25px !important;	
		left: unset !important;	
		}
		
		
		
		    
		
		
		
		
		
		
		
	}
	

	
	











	/* Новая задача при нажатии выделение*/
	.pvbtndefault{
			color: #a7a7a7!important;
	}
	.pvbtndefault:hover{
			color: #5f5d5d!important;
	}
	.pvbtnclick{
			color: #5c22bb!important;
	}
	pvbtn{
			color: #a7a7a7!important;
	}

	.header-top__icon:hover{
			color: #5f5d5d!important;
	}
	.pvkard:hover{
			color: #5f5d5d!important;
	}
	.header-middle-control__cart.click .header-top__icon {
		color: #a7a7a7!important;
	}
	.fa-heart{
		color:#5c22bb!important
	}
	.visablebtn{
		display: block;
	}
	.unvisablebtn{
		display: none;
	}
	
	
	
	
				.tutu{
					display: none !important;
					
				}
				
				
				
				@media (max-width:1270px){
					
					
					.tutu{
						display: none !important;
						
					}
					
					.visable1{
						display: flex !important;
						
					}
					
					.unvisable1{
						display: none !important;
						
					}
					
					.wrapper__col.right{ 
						margin-left: 0px !important;
						margin-right: 0px !important;
					}
					
					.sectionCatalogFilter__row.one{
						margin-left: 0px !important;
						
					}
					
					.sectionCatalogFilter-selected{
					    margin-left: 0px !important;	
					}
					
					
				
				}
				
				
				
				.sectionCatalogFilter-info{
					cursor: pointer;
					
				}
				
				
				
				
					.pvkard{
						color: #a7a7a7;
						position: absolute;
						top: 5px;
						right: 5px;
						margin-top: 0px;
						z-index: 12;
						font-size: 20px;
						font-weight: 400;
						cursor: pointer;
					}
					
					.sectionCatalogList-items-prev-smo__link {
						margin-top: 15px;
					}
					
					
					
					.pvfa2{
						margin-top: 10px;
					
					}
					
					.qw22{
						font-size: 20px;
						position: absolute;
						right: -20px;
						color: #5c22bb !important;
					}
					
					.qw33{
						font-size: 20px;
						position: absolute;
						right: -20px;
						color: #5c22bb !important;
						top: 30px;
					}
					
					
					
					
					
					
					
					
				.sectionCatalogFilter__row.one{
					
					
				}
				
				
				
					@media(max-width:1270px){
						.slick-track{
							width: max-content !important;

						}
						.catalogDetailProdukts-slider__item.slick-slide.slick-current.slick-active{
							width: 280px !important;
						}
						.catalogDetailProdukts-slider__item.slick-slide{
							width: 280px !important;
							
						}
					}	
				
				
				
				.sectionCatalogList-items-prev{
				/*	display: block !important;
					*/
				}
				
				
				
				
				
	.scroll{
		width:100%;
		overflow-x:scroll;
		overflow-y:hidden;
	}
	
	 .scroll_child{
	 
		text-align:center;
	 }
	
	.scroll_child > div{
		display: inline-block;
		
		
	}
	
	.qqqq{
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
	
	.scroll_child{
		white-space: nowrap;
		
	}
	
	
	
	.section_goods{
		width: 136px;
		height: 119px;
		background: #EEEEEE;
		margin: 2px 0;
		padding: 9px;
	}
	
	.section_ico{
		width: 53px;
		height: 53px;
		background-size: contain;
		background-repeat: no-repeat;
		background-position: center;
		margin: 0px auto 4px auto;
	}
	
	
	.section_title{
		font-family: Open Sans;
		font-style: normal;
		font-weight: normal;
		font-size: 14px;
		line-height: 19px;
		color: #2F2F2F;
		height: 40px;
		white-space: pre-wrap;
		overflow: hidden;
	}
	
	.elem{
		vertical-align: top;
		
	}



@media (max-width: 1270px) {

	.scroll_child{
	letter-spacing: -4px;
	    margin-left: 0px;
}


.qqqq{
	
	    padding-left: 0px;
	
}


.elem:nth-child(1){
	    margin-left: 21px;
	
}

.elem{
letter-spacing: 0px;
margin-right: 0px;
}


.elem:nth-last-child(1){
margin-right: 21px;
}



	
}








/* Для десктопной версии */

@media (min-width: 1270px) {
	
	
	

	
	
	
	
	
	
	
	
	
	.section_title{
	    max-height: 40px !important;
	
}
	
	
	.scroll{
		
	}
	 
	 .scroll_child{
	 
    width: 100%;
	 }
	
	.qqqq{
		    width: 1270px;
    margin: auto;
    padding-left: 0px;
	}
	
	 
	
	.section_goods{
		
		    width: 100%;
    background: unset;
	}
	
	.section_ico{
	
	height: 68px;
    width: 110px;
	
    background-image: url(/upload/iblock/3e1/3e1767d….png);
}
	
	
	.section_title{
		    width: 75%;
    margin: auto auto 0;
    text-align: center;
	}
	
	.elem{
		width: 20%;
	}
	
	
	.qqqq a{
		
		
    width: 100%;
    margin-bottom: 50px !important;
    display: flow-root;
		
	}
	
	
	
	
	.section_goods:hover .section_ico{
		opacity: 0.6; 
		transition: opacity 150ms;
	}
	
	.section_goods:hover .section_title{
		font-size: 17px;
		transition: opacity 350ms;
	}
	
	
	
	
}


	.scroll{
		
	}
	 
	 .scroll_child{
	 
    width: 100%;
	 }
	
	.qqqq{
		    width: 1270px;
    margin: auto;
    padding-left: 0px;
	}
	


.elem{
		width: 20%;
	}
	
	
	.qqqq a{
		
		
    width: 100%;
    margin-bottom: 50px !important;
    display: flow-root;
		
	}
	








	.discountpv{
		float: left;
		border: 1px solid #ff4500;
		font-style: normal;
		font-weight: 400;
		font-size: 9px;
		line-height: 186.2%;
		padding: 2px 8px;
	}

	.gallerypv{
	/*	background-image: url(/assest/img/slider-2.png);*/
		width: 100%;
		height: 200px;
		background-repeat: no-repeat;
		background-position: center;
		background-size: contain;
	}
	
	.gallerypvcontent{
		width: 100%;
		height: 200px;
		
	}
	
	
	.arrowleftpv, .arrowrightpv{
		display:inline-block;
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	.statusorder{
		line-height: 18px;
		font-weight: 600!important;
		color: #5c22bb;
		text-aling:left;
		text-align: left;
		margin: 0px 20px 0px 20px;
		
	}
	
	.elem{
		width: 280px;
		
	}
	
	.itemtextpv{
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
	
	
	.articlepv{
		font-style: normal;
		font-weight: 300;
		font-size: 13px;
		line-height: 18px;
		color: #2f2f2f;
		text-align: left;
		margin: 0 21px 0 21px;
		border-bottom: dotted 1px;
		white-space: normal;
		
	}
	
	
	.pricepv{
		text-align: left;
		margin: 0 21px 0 21px;
		
	}
	
	
	.articlepv{
		    justify-content: space-between;
		border-bottom: 1px solid rgba(113,113,113,.3);
		font-weight: 300;
		margin-bottom: 18px;
		font-style: normal;
		font-size: 13px;
		line-height: 18px;
		color: #2f2f2f;
		
	}
	
	.newprice{
		font-style: normal;
		font-weight: 600;
		font-size: 15px;
		line-height: 20px;
		color: #ff4500;
		text-align: right;
		
	}
	
	.oldprice{
		font-style: normal;
		font-weight: 300;
		font-size: 12px;
		line-height: 16px;
		text-decoration-line: line-through;
		color: #616161;
		text-align: right;
	}
	
	.itemtextpv{
		
		
	}
	
	
	
	.fastreview{
		opacity: 0;
	}


	.itempv{
		border: solid 1px white;
		
	}
	.pricepv{
		margin-bottom: 20px;
		
	}
	
	.fastreview{
		border: solid 1px #b8b8b8;
		border-left: 0px;
		border-right: 0px;
		margin-bottom: 4px;
		padding: 5px;
	
	}





	/*При наведении */

	.elem:hover .itempv{
		border: solid 1px #b8b8b8;
		
	}
	.elem:hover .fastreview{
		opacity: 1;	
		
	}

	.tabcellpv{
			display: table-cell;
    vertical-align: middle;
		
	}


	.gallerypvcontent{
			display: table;
	}


	.elem11{
		width: 216px;
		height: 200px;
		background-image: url(/assest/img/slider-2.png);
		width: 100%;
		height: 200px;
		background-repeat: no-repeat;
		background-position: center;
		background-size: contain;
	}
	
	
	.scroll_child{
		transition: transform 0.5s ease, 0.5s ease, filter 0.5s;
	}
	
	
	.elem11 {
		margin: 0 2px 0 2px;
		
	}
	
	
	.gallerypv .qqqq{
		width: unset;
		
	}
	
	
	
	
	.arrowrightpv, .arrowleftpv{
		opacity: 0;	
		
	}
	
	
	.elem:hover .arrowrightpv, .elem:hover .arrowleftpv{
		opacity: 1;	
		
	}
	
	
	@media(min-width:1270px){
	
		.sort1{
			display: none !important;
			
		}
	}
	
	
	
	@media(max-width:1270px){
		
		/*
		.gallerypv .scroll_child{
			transform: translate3d(0px, 0px, 0px) !important;
		}
		
		
		.btleft, .btright{
			display: none;
			
		}
		
		 
		.scroll_child .elem11:not(:first-child){
			display: none;
		}
		
		.elem11{
			margin:0px !important;
			
		}
		
		.qqqq1{
			width: 100%;	
		}
		
		*/
		
		
		
	}
	
	
	
	
			.qqqq1{
				display: flex;	
				
			}
			
			.tabcellpv1{
				vertical-align: middle;
				    margin: auto;
			}
			
			
			.innercont{
				display: inline-block;
				width: calc(100% - 62px);

				
			}
			
			
			.elem{
				width: calc(((100% - 21px) / 5));
			}
			
			
			@media(max-width:1200px){
				.elem{
					width: calc(((100% - 21px) / 3));
				}	
			}
			
			
			@media(max-width:850px){
				.elem{
					width: calc(((100% - 21px) / 2));
				}	
			}
			
			@media(max-width:540px){
				.elem{
					width: 100%;
					margin-left: 0px !important;
				}	
			}
			
			
			.titlepvtovar{
				margin: 0 20px 40px 20px;
				
			}
			
			@media (max-width: 906px) and (min-width: 620px){
				.sectionCatalogList-items__item:last-child{
				float: right;
			}
				
			}
			
			
			.titlegoods{
				width: 100%;
				max-width: 1270px;
				margin: auto;
				margin-top: 50px;
				
			}
			
			
			
		.wrapper{
				height: unset;
			
		}
		
		
		
		
		
		/* ==============================*/
		/* Для быстрого просмотра */ 
		
		
		
			@media (max-height: 900px){
				.Pvstyle .fastSeeProduct-hero__wrap{
					    height: 90%;
				
				}
				.Pvstyle .descriptionpv{
					height: 100%;
					overflow-y: auto;
				}
				
				.Pvstyle .catalogDetail-hero{
					height: 100%;
				}
			}
		
			.Pvstyle  .fastSeeProduct-control{
						justify-content: left !important;
			}
			
			
						
						
						
			/* Стили для скрола */ 	
			::-webkit-scrollbar-button {
			background-image:url('');
			background-repeat:no-repeat;
			width:5px;
			height:0px
			}

			 ::-webkit-scrollbar-track {
			background-color: #ecedee00;
			}

			::-webkit-scrollbar-thumb {
			-webkit-border-radius: 0px;
			border-radius: 9px;
			background-color: #5c22bb;
			}

			::-webkit-scrollbar-thumb:hover{
			background-color:#c4c4c4;
			}

			::-webkit-resizer{
			background-image:url('');
			background-repeat:no-repeat;
			width:4px;
			height:0px
			}

			 ::-webkit-scrollbar{
			width: 8px;
			}
			
			/* Стили для скрола */ 	
			.Pvstyle ::-webkit-scrollbar-button {
			background-image:url('');
			background-repeat:no-repeat;
			width:5px;
			height:0px
			}

			.Pvstyle  ::-webkit-scrollbar-track {
			background-color: #ecedee00;
			}

			.Pvstyle  ::-webkit-scrollbar-thumb {
			-webkit-border-radius: 0px;
			border-radius: 9px;
			background-color: #9d9d9d;
			}

			.Pvstyle  ::-webkit-scrollbar-thumb:hover{
			background-color:#c4c4c4;
			}

			 .Pvstyle ::-webkit-resizer{
			background-image:url('');
			background-repeat:no-repeat;
			width:4px;
			height:0px
			}

			.Pvstyle  ::-webkit-scrollbar{
			width: 8px;
			}
				
				
		
	.sectionCatalogList-items__name{
		height: 58px;
		overflow: hidden;	
	}
	
	
	
		@media (max-width: 1270px) {
			
			
			
			.wrapper__col.left{
				display: none !important;
			}
			
			
			.wrapper__col.right{
				margin: 21px 0 21px 0 !important;
				width: 100%;
				  
			}
			 
			.wrapper__hero{
				margin-left: 0px;
				
			}
			
			/*
			.sectionCatalogList-items-prev{
				display: none !important;
				
			}
			*/
			.sectionCatalogList-items__item {
				width: 214px !important;
			}
			
			
			
			
			.pvdiv .sectionCatalogList-items__item{
				
				display: inline-block;
			}
			
			.pvdiv .sectionCatalogList-items{
				text-align: justify;
				margin: 0 21px 0 21px;
				text-align-last: justify;
				
			}
			
			.pvdiv .sectionCatalogList-items{
				display: block;
				
			}
			
			
			.sectionCatalogList-items__item{
				text-align-last: auto;
				
			}
			
			
			
			
			
			
		}
		
		
		
		
		@media (max-width: 1270px) {
		
			.pvdiv .sectionCatalogList-items{
				margin-left: calc(25% - 202px);
				margin-right: calc(25% - 202px);	
			}
			
			/*
			.pvdiv .sectionCatalogList-items__item {
				margin-left: unset;
				margin-top: 50px;
			}
			*/
		
		}
		
		
		
		
		@media (max-width: 906px) {
				
			.pvdiv .sectionCatalogList-items{
				margin-left: calc(31% - 170px);
				margin-right: calc(31% - 170px);
			}
			
			/*
			.pvdiv .sectionCatalogList-items__item {
				margin-left: unset;
				margin-top: 50px;
			}
			*/
			
		}
		
		
		
		
		@media (max-width: 620px) {
				
			.pvdiv .sectionCatalogList-items__item {
				margin: auto;
				display: block;
				margin-top: 50px;
			}
				
			
			
			.pvdiv .sectionCatalogFilter-selected{
				display: block;
				width: 100%;
				
			}
			
			
			.sectionCatalogList-items{
				margin-left: 0px !important;
				margin-right: 0px !important;
			}
			
			
		}
		
		
		
		
		.pvdiv{
			margin-left: 23px;
			margin-right: 23px;
			
		}
		
		
		
		
		
		
		
		/*
		
			
			@media (max-width: 788px) {	
				
				
				
				.sectionCatalogList-items__item{
					padding: 1px 1px 20px !important;
					    width: 164px !important;
				}
				
				
				.sectionCatalogList-items__pic{
					width: 100% !important;
					text-align: center !important;
					background-color: white !important;
					
				}
				
				.catalogDetailProdukts-slider-mini-prop.catalogSectionPropHeight{
					height: 18px !important;
					
				}
				
				.sectionCatalogList-items__name{
					margin-bottom: 15px !important;
					font-weight: 600 !important;
					padding: 0 10px !important;
				}
				
				
				.sectionCatalogList-items-price{
					    padding: 0 10px !important;
					
				}
				
				.sectionCatalogList-items-control{
						text-align: center !important;
					
				}
				
				.sectionCatalogList-items-control__buy.black{
					    width: 150px !important;
					margin: auto !important;
					height: 40px !important;
				}
				
				
				.sectionCatalogList-items-prop{
					    display: none;
				}
				
				.sectionCatalogList-items-control__col.one{
					display: none;
					
				}
				
				
				.pvdiv .sectionCatalogList-items__item{
					display: inline-block;
					
				}
				
				
			
				
				
				
				@media (max-width: 1270px)
					.pvdiv .sectionCatalogList-items {
					margin-left: calc(25% - 202px) !important;
					margin-right: calc(25% - 202px) !important;
					
					}
					
					.sectionCatalogList-items__item{
						
						
					}
					
					
				}
				
				
				*/
				
				
				@media (max-width: 870px) {
					
					
					.pvdiv .sectionCatalogList-items {
						margin-left: calc(31% - 170px) !important;
						margin-right: calc(31% - 170px) !important;
					}
					
					
					
					
					
					
				}
				
				
				@media (max-width: 840px) and  (min-width: 550px) {
				
				.sectionCatalogList-items__item:nth-last-child(1){  
					 margin-left: calc(50% - 246px) !important;	
						
					}
					
				}	
					
				
				
				
				
				@media (max-width: 680px) {
					.pvdiv .sectionCatalogList-items {
						margin-left: calc(25% - 123px) !important;
						margin-right: calc(25% - 123px) !important;
					}
					
					
				}
				
				
				
				
				@media (max-width: 565px) {
					.pvdiv .sectionCatalogList-items {
						margin-left: calc(33% - 109px) !important;
						margin-right: calc(33% - 109px) !important;
					}
				}
				
				
				@media (max-width: 350px) {
					.pvdiv .sectionCatalogList-items {
						margin-left: calc(50% - 82px) !important;
						margin-right: calc(50% - 82px) !important;
					}
				}
				
				
				
				
				
				.pvdiv{
					margin-left: 0px !important;
					margin-right: 0px !important;
					
				}
				
				
				
				
				.breadcrumbs, .sectionCatalogFilter, .comman_h1, .sectionCatalogList-sort{
					margin-left: 21px !important;
					margin-right: 21px !important;



				}
				
				
				
				@media (max-width: 790px) {
					
					.sectionCatalogList-items__item{
						vertical-align: top;
						
						
					}
					
					.sectionCatalogList-items-price {
							min-height: 40px;	
					}
					
					.sectionCatalogList-items-control__buy{
							height: 40px !important;
							width: 150px !important;						
					}
					
				}
				
				
				
			}	
			
			
			.lnr-chevron-left, .lnr-chevron-right {
				cursor: pointer;
			}
			
			
			
			
			.lnr-chevron-left {
				cursor: pointer;
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
			
			
			
			.elem11:before{
			  content: "";
			  display: block;
			  padding-top: 100%;   
			  
			}
			
			.elem11{
			    height: unset !important;
			}
			
			.statusorder{
				margin-bottom: 12px;
			}


			
			::-webkit-scrollbar{
				border-radius: 0px;
   /* width: 0px !important;*/
    height: 0px !important;
				
			}
			
			
			.tabcellpv:before{
			  content: "";
			  display: block;
			  padding-top: 0px;   
			  padding-bottom: 0px;  
			}
			
			.gallerypv, .gallerypvcontent{
				height: unset !important;
			}
			
			
			
	
	
	
	


</style>



						

<style>



.img_kard{
    background-size: contain;
	background-repeat: no-repeat;
	background-position: center center;
	    height: unset !important;
}




.img_kard:before{
	content: "";
	display: block;
	padding-top: 100%;   
  
}


	.product-item-amount-field-btn-minus, .product-item-amount-field-btn-plus{
		font-family: sans-serif;
		font-size: 100%;
		line-height: 1.15;
		margin: 0;
		color:black;
	}
	
	
	.product-item-amount-field-btn-minus:after, .product-item-amount-field-btn-plus:after  {
		background: unset !important;
		background-size: unset !important;
		color: black !important;
		
	}
	
	.product-item-amount-description-container{
		text-align: center;
	}
	
	
	.product-item-amount-field{
		    max-width: 20px;	
		
	}

	.sectionCatalogList-items-control__col.two{
		text-align: right;
		
	}
	
	
	.product-item-image-slider-slide-container.slide{
	/*	display: none;
		*/
	}
	
	
	.sectionCatalogList-items-prev{
		
		top: 5px;
		left: -5px;
		bottom: 5px;
		/*display: flex !important; */
		
		/*display: none !important; */
	}
	
	
	.sectionCatalogList-items-prev-slider__pic{
		    width: 100%;
	/*	    height: 308px;*/
	}
	
	
	
.sectionCatalogList-items-prev{
	/*	display: none !important; */
	}
	
.product-item-image-slider-slide-container.slide{
	display: none !important; 
}






.sectionCatalogList-items__item{

}








.pvdiv .sectionCatalogList-items{
     margin-left: 23px; 
     margin-right: 23px; 
	 margin: auto !important;
	 text-align-last: left;
}



@media (max-width: 1270px) {

	@media (min-width: 320px) {
		.pvdiv .sectionCatalogList-items{
			 width: 260px;
		}					
	}
	@media (min-width: 570px) {
		.pvdiv .sectionCatalogList-items{
			 width: 510px;
		}					
	}
	@media (min-width: 880px) {
		.pvdiv .sectionCatalogList-items{
			 width: 760px;
		}					
	}

	@media (min-width: 1070px) {
		.pvdiv .sectionCatalogList-items{
			 width: 1010px;
		}					
	}

}


.scroll_child{
	text-align: left;
}

.elem{
	width: 214px !important;
}





@media (min-width: 320px) {
	.scroll.innercont{
		 width: 215px;
	}					
}

@media (min-width: 535px) {
	.scroll.innercont{
		 width: 430px;
	}					
}

@media (min-width: 750px) {
	.scroll.innercont{
		 width: 645px;
	}					
}
@media (min-width: 965px) {
	.scroll.innercont{
		 width: 860px;
	}					
}

@media (min-width: 1180px) {
	.scroll.innercont{
		 width: 1075px;
	}					
}




.itemtextpv a{
	font-weight: normal;
	font-size: 13px;
	line-height: 18px;
	
}




 

.hits .scroll_child{
letter-spacing: -2.5px;
}

.hits .scroll_child .elem{
letter-spacing: normal;
}


.qqqq1 .scroll_child{
letter-spacing: -2.5px;
}

.qqqq1 .scroll_child .elem{
letter-spacing: normal;
}





/*Тест адаптива*/

.othersizecolor{
	    display: none;
		float: left;
		text-align: left;	
		
	}


	
	
	
	
	
@media (min-width: 330px) and  (max-width: 500px) {
	.sectionCatalogList-items__item{
		 width: 274px !important;
	}	


	.sectionCatalogList-items__item{
			 width:300px !important;
	}	
	
	.img_kard:before {
		content: "";
		display: block;
		padding-top: 70%;
	}
	
	.pvdiv .sectionCatalogList-items {
		width: 100%;
		}
	
}



@media (max-width: 330px) {
	.sectionCatalogList-items__item{
			 width:100% !important;
	}	
}








@media (max-width: 350px) {
	.haract{
		display:none;
		
	}
}

 

@media (max-width: 1270px) {
	.sectionCatalogList-items-control__buy.black{
		width: 100% !important;
		background-color: #ffffff;
		color: black;
	}
	
	
	.sectionCatalogList-items-control__col.two{
		width: 100% !important;
		
	}
	
	.sectionCatalogList-items-prev.info{
		  display: none !important;
	}
	
	
	.othersizecolor{
	    display: inline-block;
		
	}
	
	
	.sectionCatalogList-items__item:hover .sectionCatalogList-items-prev {
    display: none !important;
}
	
}


@media (max-width: 1270px){
.btleft, .btright {
     display: table-cell; 
}




}




@media (min-width: 1270px){

.mobiver{
	display: none;
	
}

.pcver{
	display: block;
	
}


}


@media (max-width: 1270px){

.mobiver{
	display: block;
	
}

.pcver{
	display: none;
	
}


}




.catalog-section-list-item-title{
    text-align: left;
    color: #414141;
	
}



@media (max-width: 720px){
	
	.catalog-section-list-tile-list li:nth-last-child(1) .catalog-section-list-tile-img-container, .catalog-section-list-tile-list li:nth-last-child(1) .catalog-section-list-item-inner{
		border-bottom: 1px solid rgba(97, 97, 97, 0.2);
	}
	
	
	
	
	.col li{
		display: table;
		max-width: 100%;
		width: 100%;
		flex: unset;
		vertical-align: middle;
		
	}
	
	.col .catalog-section-list-tile-img-container{
		border-top: 1px solid rgba(97, 97, 97, 0.2);
		width: 15%;
		display: table-cell;
		vertical-align: middle;
		
	}
	
	.col .catalog-section-list-item-inner{
		width: 55%;
		display: table-cell;
		vertical-align: middle;
		padding-left: 26px;
		padding-right: 16px;
		border-top: 1px solid rgba(97, 97, 97, 0.2);
		
	}
	
	.catalog-section-list-item-title a{
		font-family: Open Sans;
		font-style: normal;
		font-weight: 300;
		font-size: 14px;
		line-height: 19px;
		color: #2F2F2F;
		
	}
	
	
	.catalog-section-list-tile-list li:nth-last-child(1) .catalog-section-list-tile-img-container{
		border-top: 1px solid rgba(97, 97, 97, 0.2);
	
	
	}



}


@media (max-width: 720px){
	/*
		.hits .elem{
			width: 100% !important;	
			
		}
		
		.hits .scroll.innercont{
			width: 100% !important;	
			
		}
	*/
	
	
	.scroll.innercont {
		width: 90% !important;	
	}
	
	.scroll.innercont .elem{
		width: 100% !important;
	}
	
	

	
}




	
	











<?//Новая версия карусели с фоном?>

@media (max-width: 1270px){
		
	.qqqq1{
		background: #efefef;
		padding: 25px 0 25px 0;
		
	}

	.scroll.innercont{
	background: #efefef;
		font-size: 50px !important;	
		width: 100% !important;
	}


	.scroll.innercont > .scroll_child{
			background: #efefef;
		font-size: 50px !important;
		
	}

	.scroll.innercont > .scroll_child > .elem{
		background: #ffffff;
			width: 70% !important;
	}



	.scroll.innercont > .scroll_child > .elem:nth-child(1){
		margin-left: 20px !important;
	}

	.qqqq1 > .btleft1, .qqqq1 > .btright1{
		display: none !important;
		
	}
	
	.fastreview{
		display: none !important;
		
	}
	
	.itempv {
		border: solid 1px white !important;
	}
	
	.oldprice{
		    min-height: 18px;
		
	}
	
	
	
	.scroll_child .elem11:not(:first-child):not(.mobivers) {
		display: none !important;
	}
	


}

<?//=====================================?>



</style>
			
			
			

<style>
	.defaulth2{
		width: 800px;
		margin: auto;
		margin-bottom: 40px;
	}
	
	.defaulttext{
		width: 800px;
		margin: auto;
		margin-bottom: 45px;
	}
	
	
	

</style>
				
				
			

















 <?$APPLICATION->IncludeComponent(
	"bitrix:catalog", 
	"bootstrap_v5shablon", 
	array(
		"ACTION_VARIABLE" => "action",
		"ADD_ELEMENT_CHAIN" => "Y",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"ADD_SECTION_CHAIN" => "Y",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"ALSO_BUY_ELEMENT_COUNT" => "4",
		"ALSO_BUY_MIN_BUYES" => "1",
		"BASKET_URL" => "/personal/cart/",
		"BIG_DATA_RCM_TYPE" => "personal",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COMMON_ADD_TO_BASKET_ACTION" => "ADD",
		"COMMON_SHOW_CLOSE_POPUP" => "N",
		"COMPATIBLE_MODE" => "N",
		"COMPONENT_TEMPLATE" => "bootstrap_v5shablon",
		"CONVERT_CURRENCY" => "N",
		"DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
		"DETAIL_ADD_TO_BASKET_ACTION" => array(
			0 => "BUY",
		),
		"DETAIL_ADD_TO_BASKET_ACTION_PRIMARY" => array(
			0 => "BUY",
		),
		"DETAIL_BACKGROUND_IMAGE" => "-",
		"DETAIL_BLOG_EMAIL_NOTIFY" => "N",
		"DETAIL_BLOG_URL" => "catalog_comments",
		"DETAIL_BLOG_USE" => "Y",
		"DETAIL_BRAND_PROP_CODE" => array(
			0 => "",
			1 => "BRAND_REF",
			2 => "",
		),
		"DETAIL_BRAND_USE" => "Y",
		"DETAIL_BROWSER_TITLE" => "-",
		"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
		"DETAIL_DETAIL_PICTURE_MODE" => array(
			0 => "MAGNIFIER",
		),
		"DETAIL_DISPLAY_NAME" => "N",
		"DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "E",
		"DETAIL_FB_APP_ID" => "",
		"DETAIL_FB_USE" => "Y",
		"DETAIL_IMAGE_RESOLUTION" => "16by9",
		"DETAIL_MAIN_BLOCK_OFFERS_PROPERTY_CODE" => array(
		),
		"DETAIL_MAIN_BLOCK_PROPERTY_CODE" => array(
		),
		"DETAIL_META_DESCRIPTION" => "torgoffer",
		"DETAIL_META_KEYWORDS" => "torgoffer",
		"DETAIL_OFFERS_FIELD_CODE" => array(
			0 => "NAME",
			1 => "",
		),
		"DETAIL_OFFERS_PROPERTY_CODE" => array(
			0 => "ARTNUMBER",
			1 => "SIZES_SHOES",
			2 => "SIZES_CLOTHES",
			3 => "COLOR_REF",
			4 => "MORE_PHOTO",
			5 => "",
		),
		"DETAIL_PRODUCT_INFO_BLOCK_ORDER" => "sku,props",
		"DETAIL_PRODUCT_PAY_BLOCK_ORDER" => "rating,price,priceRanges,quantityLimit,quantity,buttons",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "NEWPRODUCT",
			1 => "MANUFACTURER",
			2 => "MATERIAL",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DETAIL_SET_VIEWED_IN_COMPONENT" => "N",
		"DETAIL_SHOW_BASIS_PRICE" => "Y",
		"DETAIL_SHOW_MAX_QUANTITY" => "N",
		"DETAIL_SHOW_POPULAR" => "Y",
		"DETAIL_SHOW_SLIDER" => "N",
		"DETAIL_SHOW_VIEWED" => "Y",
		"DETAIL_STRICT_SECTION_CHECK" => "N",
		"DETAIL_USE_COMMENTS" => "Y",
		"DETAIL_USE_VOTE_RATING" => "Y",
		"DETAIL_VK_USE" => "N",
		"DETAIL_VOTE_DISPLAY_AS_RATING" => "rating",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISCOUNT_PERCENT_POSITION" => "bottom-right",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "desc",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"FIELDS" => array(
			0 => "SCHEDULE",
			1 => "STORE",
			2 => "",
		),
		"FILTER_HIDE_ON_MOBILE" => "N",
		"FILTER_NAME" => "",
		"FILTER_VIEW_MODE" => "VERTICAL",
		"GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
		"GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
		"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_MESS_BTN_BUY" => "Выбрать",
		"GIFTS_SECTION_LIST_BLOCK_TITLE" => "Подарки к товарам этого раздела",
		"GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT" => "4",
		"GIFTS_SECTION_LIST_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
		"GIFTS_SHOW_IMAGE" => "Y",
		"GIFTS_SHOW_NAME" => "Y",
		"GIFTS_SHOW_OLD_PRICE" => "Y",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"IBLOCK_ID" => "6",
		"IBLOCK_TYPE" => "catalog",
		"INCLUDE_SUBSECTIONS" => "N",
		"INSTANT_RELOAD" => "Y",
		"LABEL_PROP" => array(
			0 => "stiker",
		),
		"LABEL_PROP_MOBILE" => array(
		),
		"LABEL_PROP_POSITION" => "top-left",
		"LAZY_LOAD" => "Y",
		"LINE_ELEMENT_COUNT" => "3",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"LINK_IBLOCK_ID" => "",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_PROPERTY_SID" => "",
		"LIST_BROWSER_TITLE" => "-",
		"LIST_ENLARGE_PRODUCT" => "STRICT",
		"LIST_ENLARGE_PROP" => "-",
		"LIST_META_DESCRIPTION" => "-",
		"LIST_META_KEYWORDS" => "-",
		"LIST_OFFERS_FIELD_CODE" => array(
			0 => "NAME",
			1 => "PREVIEW_PICTURE",
			2 => "DETAIL_PICTURE",
			3 => "",
		),
		"LIST_OFFERS_LIMIT" => "0",
		"LIST_OFFERS_PROPERTY_CODE" => array(
			0 => "SIZES_SHOES",
			1 => "SIZES_CLOTHES",
			2 => "COLOR_REF",
			3 => "MORE_PHOTO",
			4 => "ARTNUMBER",
			5 => "",
		),
		"LIST_PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"LIST_PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false},{'VARIANT':'3','BIG_DATA':false}]",
		"LIST_PROPERTY_CODE" => array(
			0 => "NEWPRODUCT",
			1 => "SALELEADER",
			2 => "SPECIALOFFER",
			3 => "",
		),
		"LIST_PROPERTY_CODE_MOBILE" => array(
		),
		"LIST_SHOW_SLIDER" => "Y",
		"LIST_SLIDER_INTERVAL" => "3000",
		"LIST_SLIDER_PROGRESS" => "N",
		"LOAD_ON_SCROLL" => "N",
		"MAIN_TITLE" => "Наличие на складах",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "Купить",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_COMPARE" => "Сравнение",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_LAZY_LOAD" => "Показать ещё",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_COMMENTS_TAB" => "Комментарии",
		"MESS_DESCRIPTION_TAB" => "Описание",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"MESS_PRICE_RANGES_TITLE" => "Цены",
		"MESS_PROPERTIES_TAB" => "Характеристики",
		"MIN_AMOUNT" => "10",
		"OFFERS_CART_PROPERTIES" => array(
			0 => "SIZES_SHOES",
			1 => "SIZES_CLOTHES",
			2 => "COLOR_REF",
		),
		"OFFERS_SORT_FIELD" => "sort",
		"OFFERS_SORT_FIELD2" => "id",
		"OFFERS_SORT_ORDER" => "desc",
		"OFFERS_SORT_ORDER2" => "desc",
		"OFFER_ADD_PICT_PROP" => "-",
		"OFFER_TREE_PROPS" => "",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "round",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "60",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_DISPLAY_MODE" => "Y",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPERTIES" => "",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"QUANTITY_FLOAT" => "N",
		"SEARCH_CHECK_DATES" => "Y",
		"SEARCH_NO_WORD_LOGIC" => "Y",
		"SEARCH_PAGE_RESULT_COUNT" => "50",
		"SEARCH_RESTART" => "N",
		"SEARCH_USE_LANGUAGE_GUESS" => "Y",
		"SECTIONS_HIDE_SECTION_NAME" => "N",
		"SECTIONS_SHOW_PARENT_NAME" => "N",
		"SECTIONS_VIEW_MODE" => "TILE",
		"SECTION_ADD_TO_BASKET_ACTION" => "ADD",
		"SECTION_BACKGROUND_IMAGE" => "-",
		"SECTION_COUNT_ELEMENTS" => "N",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_TOP_DEPTH" => "1",
		"SEF_FOLDER" => "/katalog-tovarov-3/",
		"SEF_MODE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SHOW_ALL_WO_SECTION" => "N",
		"SHOW_DEACTIVATED" => "N",
		"SHOW_DISCOUNT_PERCENT" => "Y",
		"SHOW_EMPTY_STORE" => "Y",
		"SHOW_GENERAL_STORE_INFORMATION" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_OLD_PRICE" => "Y",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_TOP_ELEMENTS" => "N",
		"SIDEBAR_DETAIL_POSITION" => "right",
		"SIDEBAR_DETAIL_SHOW" => "Y",
		"SIDEBAR_PATH" => "/katalog-tovarov-3/sidebar.php",
		"SIDEBAR_SECTION_POSITION" => "right",
		"SIDEBAR_SECTION_SHOW" => "Y",
		"STORES" => array(
			0 => "",
			1 => "",
		),
		"STORE_PATH" => "/store/#store_id#",
		"TEMPLATE_THEME" => "site",
		"TOP_ADD_TO_BASKET_ACTION" => "ADD",
		"USER_CONSENT" => "N",
		"USER_CONSENT_ID" => "0",
		"USER_CONSENT_IS_CHECKED" => "Y",
		"USER_CONSENT_IS_LOADED" => "N",
		"USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"USE_ALSO_BUY" => "Y",
		"USE_BIG_DATA" => "Y",
		"USE_COMMON_SETTINGS_BASKET_POPUP" => "N",
		"USE_COMPARE" => "N",
		"USE_ELEMENT_COUNTER" => "Y",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_FILTER" => "Y",
		"USE_GIFTS_DETAIL" => "Y",
		"USE_GIFTS_MAIN_PR_SECTION_LIST" => "Y",
		"USE_GIFTS_SECTION" => "Y",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_MIN_AMOUNT" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "Y",
		"USE_SALE_BESTSELLERS" => "Y",
		"USE_STORE" => "Y",
		"SEF_URL_TEMPLATES" => array(
			"sections" => "",
			"section" => "#SECTION_CODE_PATH#/",
			"element" => "#SECTION_CODE_PATH#/#ELEMENT_CODE#/",
			"compare" => "compare/",
			"smart_filter" => "#SECTION_CODE_PATH#/filter/#SMART_FILTER_PATH#/apply/",
		)
	),
	false
);?> <?/* Топ элементов*/?>


<?/* Скрипты*/?>



<script>





		


		
				
</script>












 
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>