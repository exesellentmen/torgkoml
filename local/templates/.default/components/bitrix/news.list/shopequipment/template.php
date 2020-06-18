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







 <?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>




            <div class="pIndexitemsProduction">
              <div class="pIndexitemsProduction__wrap">
                <h2 class="pIndexitemsProduction__title page-index__title">ПРОИЗДВОДСТВО ТОРГОВОГО ОБОРУДОВАНИЯ НА ЗАКАЗ</h2>
				
				
				
				
				
				<div class="form1cost">
					<div class="partpav">
						<p class="textleftpv">						
							Изготовим Вашу мебель на произвостве. От чертежа до монтажа за 4 недели.
						</p>
					</div>
					
					
					<div class="partpav partrightv">
						<p class="textrighttpv">

							Узнайте стоимость Вашего магазина
						</p>
						<p class="btnrightpv  openPopoupleaveRequest" data-id-form="#orderEquipment" style="cursor: pointer;">
							Узнать
						</p>
						
					</div>
					
					
					
					
				</div>
				
				
				
				<div  class="dddd">
				
                <div class="pIndexitemsProduction__items sscro">
					<div class="scrollfororder pIndexitemsProduction__items">
				
				<? $ind = 1;?>
				
			<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
				
				
				
					<?/*
						<a href="<?=$arItem[directlink];?>"  id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<div class="section_goods">
							<div class="section_ico" style="background-image:url('<?=CFile::GetPath($arItem[PROPERTIES][photo1][VALUE]);?>');"></div>
							<div class="section_title"><?=$arItem[NAME];?></div>
						</div>
						</a>
						
					
						
						
						<? print_r($arItem); ?>
						*/?>

						
						
						<div class="pIndexitemsProduction__item">
						<a href="<?=$arItem[DETAIL_PAGE_URL];?>"  id="<?=$this->GetEditAreaId($arItem['ID']);?>" >
							<div class="pIndexitemsProduction__pic">
							  <div class="pIndexitemsProduction__pic-hover"><?=$arItem[NAME];?></div>
							  <div class="pIndexitemsProduction__img imgelem1" style="background-image: url(<?=$arItem[PREVIEW_PICTURE][SRC];?>);" alt=""></div>
							</div>
							<div class="pIndexitemsProduction__name nameprod"><?=$arItem[NAME];?></div>
						</a>
						</div>
						
				  
				  <? $ind++;
				  
				  if($ind == 5){
					  break;
					  
				  }
				  
				  ?>
				  
						
				
			<?endforeach;?>
				
				
				
				
				
				
				
				  
				  
				  
				  
				  
				  
					</div>
					
					
					
				</div>
				  
                </div>
              </div>
              <div class="index-product-control">
                <button class="index-product-control__btn btn-common-black">Узнать больше</button>
              </div>
            </div>
		
			
			





<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>






	  
		  
		<style>
		 
		.pIndexitemsProduction__pic-hover{
    white-space: normal;
			
		}
		
				
				
			
					.imgelem1{
						width: 222px;
						height: 160px;

					}	
									
									
					.nameprod{
						white-space: normal;
					}
				
				
				
				
				
				
				@media (min-width: 1270px)   {	
				
				.imgelem1{
						width: 300px;
						height: 216px;

					}	
					
					
				.form1cost{
					width: 1270px;	
					    margin-left: auto;
    margin-right: auto;
					
				}
				
				
				}
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
			@media (min-width: 768px) and (max-width: 1270px)   {			

				
				
				.pIndexitemsProduction__title.page-index__title{
					font-weight: 600;
					font-size: 18px;
					
					
				}
				.form1cost{
					height: 100px;
					margin-bottom: 40px;
				}
				.partpav{
					width: 50%;
					height: 100px;
					display: table-cell;
					vertical-align: middle;
					text-align:center;
				}
				.partrightv{
					width: 49% !important;
					background: #FBAD65;
				}
				.textleftpv{
					width: 75%;
					margin: auto;
					text-align: left;
					font-family: Open Sans;
					font-style: normal;
					font-weight: normal;
					font-size: 20px;
					line-height: 27px;
				
				}
				.textrighttpv{
					width: 75%;
					margin: auto;
					text-align: center;
					font-family: Open Sans;
					font-style: normal;
					font-weight: normal;
					font-size: 20px;
					line-height: 27px;
					color: #FFFFFF;
				}
				.btnrightpv{
					width: 214px;
					margin-top: 1rem !important;
					padding: 0.212rem;
					border: 2px solid #FFFFFF;
					box-sizing: border-box;
					margin: auto;
					text-align: center;
					font-family: Open Sans;
					font-style: normal;
					font-weight: normal;
					font-size: 13px;
					line-height: 27px;
					color: #FFFFFF;
				}
				.pIndexitemsProduction__items{
					width: 1250px;
					margin: auto;
				}
				/* Стили формы ТОРГОВОГО ОБОРУДОВАНИЯ НА ЗАКАЗ*/
				.form1cost{
					height: auto;
					
				}
				.textleftpv{
					font-weight: normal;
					font-size: 15px;
					line-height: 20px;
					
				}
				.partpav{
					padding: 20px 0 20px;
					
				}
				.textrighttpv{
					
					font-weight: 600;
					font-size: 15px;
					line-height: 20px;
									
				}
				h2{
					margin-bottom: 40px !important;
					margin-top: 55px !important;
					
				}			
			}	
			
			
			
			
			
			
			
			
			
			
			
			
			
							
			@media (max-width: 768px)  {			


				/* Стили формы ТОРГОВОГО ОБОРУДОВАНИЯ НА ЗАКАЗ*/
				.form1cost{
					margin-bottom: 40px;
				}
				.partpav{
					width: 50%;
					height: 100px;
					display: table-cell;
					vertical-align: middle;
					text-align:center;
				}
				.partrightv{
					width: 49% !important;
					background: #FBAD65;
				}
				.textleftpv{
					width: 75%;
					margin: auto;
					text-align: left;
					font-family: Open Sans;
					font-style: normal;
					font-weight: normal;
					font-size: 20px;
					line-height: 27px;
				
				}
				.textrighttpv{
					width: 75%;
					margin: auto;
					text-align: center;
					font-family: Open Sans;
					font-style: normal;
					font-weight: normal;
					font-size: 20px;
					line-height: 27px;
					color: #FFFFFF;
				}
				.btnrightpv{
					width: 214px;
					margin-top: 1rem !important;
					padding: 0.212rem;
					border: 2px solid #FFFFFF;
					box-sizing: border-box;
					margin: auto;
					text-align: center;
					font-family: Open Sans;
					font-style: normal;
					font-weight: normal;
					font-size: 13px;
					line-height: 27px;
					color: #FFFFFF;
				}
				.pIndexitemsProduction__items{
					width: 1250px;
					margin: auto;
				}
				
				
				
			
			
				.pIndexitemsProduction__title.page-index__title{
					font-weight: 600;
					font-size: 18px;
					line-height: 25px;
					text-align: center;
					margin-left: 38px;
					margin-right: 38px;
				}
			
				
				.partpav{
					height: unset;
				}
				
				.textleftpv{
					display: block;
					margin: 0 22px 13px 22px;
					width: unset;
					font-weight: normal;
					font-size: 15px;
					line-height: 20px;
				}
				
				.partpav.partrightv{
					display: block;
					width: 100% !important;
					height: auto;
					padding-bottom: 31px;
					text-align: center;
				}
				
				.textrighttpv{
					padding: 22px 0px 27px 0px;
					font-weight: 600;
					font-size: 15px;
					line-height: 20px;
					
				}
				
				
				
				.btnrightpv{
					margin-top: 0px !important;
					
				}
				
				
				
								
			}	
			
			
			
			
			@media (max-width: 1270px) {
				
				
				.sscro{
					width: 100%;
					overflow-x: scroll;
					overflow-y: hidden;
					margin-left: 21px;
					
				}
				
				.scrollfororder{
					white-space: nowrap;
					width: auto;
					
				}
				
				.pIndexitemsProduction__item{
					display: inline-block;
					margin-right: 14px;
					
				}
				
				.dddd ::-webkit-scrollbar-thumb {
					border-radius: 0px !important;
					background-color: #f9a6a600 !important;
					background: rgba(0, 0, 0, 0);
				}
				
				.dddd ::-webkit-scrollbar-track {
					background-color: #f9a6a600 !important;
					background: rgba(0, 0, 0, 0);
				}
				
				.dddd ::-webkit-scrollbar-button {
					background-color: #f9a6a600 !important;
					background: rgba(0, 0, 0, 0);
					width: 5px;
					height: 0px;
					background-repeat: no-repeat;
				}


.pIndexitemsProduction__items.sscro{
margin-left: 0px;
}

.pIndexitemsProduction__item{
    margin-left: 14px;
}

.pIndexitemsProduction__item:nth-last-child(1){
    margin-right: 14px;
}

				
				.pIndexitemsProduction__item{
margin-right: 0px;	
}
				
				
			}
			
			
			
			
			
			
			
			
			
				
		</style>















































<?/*




<h2 class="index-brand__title page-index__title">ПО КАТЕГОРИЯМ</h2>
  
 <?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
 
<div class="qqqq">  
  
  <div class="scroll">
  
	  <div class="scroll_child">
	  
	  
	  <?
		$countitem = 1;
	  
	  ?>
	  
	  
			<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
	  
	  
	  
				<?if((($countitem % 2) != 0)):?>
				<div class="elem">
				
				<?endif?>
				
				
				
					
	  
					
						<a href="<?=$arItem[directlink];?>"  id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<div class="section_goods">
							<div class="section_ico" style="background-image:url('<?=CFile::GetPath($arItem[PROPERTIES][photo1][VALUE]);?>');"></div>
							<div class="section_title"><?=$arItem[NAME];?></div>
						</div>
						</a>
						
						
					
					
					
					
				<?if(($countitem % 2) == 0):?>
				
				
				</div>
				<?endif?>	
				
			
			
			<?
			$countitem++;
			?>
			<?endforeach;?>
			
			
			
			<?if(($countitem % 2) == 0):?>
				</div>
			<?endif?>	
			
			
			
	  
	  </div>
	  
  </div>
  
</div>


<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?>
<?endif;?>






 
		  <!-- Для моби-->

<style type="text/css">




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
		transition: opacity 350ms;
	}
	
	.section_goods:hover .section_title{
		font-size: 17px;
		transition: opacity 350ms;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
}

















</style>



*/?>












