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




<h2 class="page-index__title"><?=$arResult["NAME"]?></h2>
            <div class="page-index__text pvtext1">
              <?=$arResult[PROPERTIES][Subtitle][VALUE]?>
            </div>
          
		  
		  
          <div class="index-project index-margin-content">
            <div class="index-project__wrap pvphone">
			
			
			
			
			
			
			
              <div class="index-project__col one">
			  
				<div class="descversion1">
				
					<div class="index-project-photo">
					  <div class="index-project-photo__items">
					  
					  
					  
					  
						<?foreach($arResult[PROPERTIES][Gallery][VALUE] as $arItem):?>
					  
					  
						<div class="index-project-photo__item">
						  <div class="index-project-photo__pic"><img src="<?=CFile::GetPath($arItem)?>" class="index-project-photo__img" alt=""></div>
						</div>
						
						
						
						
						
						
						
						<?endforeach;?>
						
						
						
						
						
						
						
					  </div>
					</div>
					
				</div>	
				
				
				
				
				
				<div class="descversion">
				
				
				<div class="innerscrollpv1">
				
				
				
						<?foreach($arResult[PROPERTIES][Gallery][VALUE] as $arItem):?>
				
					<div class="innerscrollpvelem1" style="background-image: url(<?=CFile::GetPath($arItem)?>);"></div>
					
					
					<?endforeach;?>
					
					
				
				</div>
				
				
				
				
				
					
					
				</div>	
				
				
				
				
				
				
				
				
				
				
				
				
              </div>
			  
			  
			  
			  
			  
			  
			  
			  
			  
			  
              <div class="index-project__col two textpv1">
                <div class="index-project-info">
                  <h3 class="index-project-info__title">
                    <?=$arResult[PROPERTIES][Subtitle2][VALUE]?>
                  </h3>
				  
				  
                  <?=$arResult[PREVIEW_TEXT]?>
				  
				  
				  
                  <div class="index-project-info-btn">
                    <div class="index-project-info-btn__col">
                      <button class="index-project-info__btn btn-common-black openPopoupleaveRequest alldisaignpv2" data-id-form="#designProjectForm">Оставить заявку на дизайн проект</button>
                    </div>
                    <div class="index-project-info-btn__col">
                      <button class="index-project-info-btn__callback btn-common-empty alldisaignpv">Все дизайн проекты</button>
                    </div>
                  </div>
                </div>
              </div>
			  
			  
			  
			  
			  
            </div>
          </div>
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		<style>
		
		
		
			
			
			
		
		
		
		
		
			.textpv1{
				    margin-right: 24px;
				
			}
		
		
		  
			.pvtext1{
				margin-bottom: 12px !important;
				width: 800px !important;
				  
			}
			
			
			
			
				.descversion1{
				display:block;
			}
			
			
			
			
			.descversion{
				display:none;
			}
			
			
			
			
			
			
			
			@media (max-width: 1270px){
				

.innerscrollpvelem1:nth-last-child(1){
	
    margin-right: 14px;

}



.index-project__col.two.textpv1{
    margin-left: 14px !important;
}






.index-project__col {
    margin-left: 0px !important;
}







				
.index-project__col {
    margin-left: 0px;
}


.innerscrollpvelem1{
margin-right: 5px;
}



.innerscrollpvelem1:nth-child(1){
margin-left: 14px;
}

				
				
				
				
				
				
				
				
				.pvtext1{
				        padding: 0 24px 0 24px;
    white-space: pre-wrap;
    width: 100% !important;
				  
			}
			
				
				
				
				
				
				.index-project-info-btn{
					text-align: center;
    display: block;
					
				}
				
				.index-project-info-btn__col{
					
					width: 300px;
				}
				
				
				
				
				
				
				
				
				
				
				.alldisaignpv2{
						
					
				}
				
				
				.index-project-info-btn__col{
						margin: auto;
					
				}
				 
				
				.alldisaignpv{
				
				    display: none;
			}
			
			
				
				.index-project__wrap{
					
					margin-left: 0px;
				}
				
				
				
				.pvphone ::-webkit-scrollbar-thumb {
					border-radius: 0px !important;
					background-color: #f9a6a600 !important;
					background: rgba(0, 0, 0, 0);
				}
				
				.pvphone ::-webkit-scrollbar-track {
					background-color: #f9a6a600 !important;
					background: rgba(0, 0, 0, 0);
				}
				
				.pvphone ::-webkit-scrollbar-button {
					background-color: #f9a6a600 !important;
					background: rgba(0, 0, 0, 0);
					width: 5px;
					height: 0px;
					background-repeat: no-repeat;
				}
				
				
				
				
				
				
				
			
		.pvphone{
display: block;


}



.innerscrollpvelem1{
    
    width: 606px;
    height: 455px;
    display: inline-block;

}

.index-project__col {
    margin-left: 24px;
}

				
				
		.descversion{
			
			    width: 100%;
    overflow: hidden;
    overflow-x: scroll;
			
		}		
				
			.innerscrollpv1{
			white-space: nowrap;	
				
			}	
			
			
				
				
				
				
				
				.descversion{
					display:block;
				}
				

				.descversion1{
					display:none;
				}
				
				
				
				
				
				
				
				
			}
			
			
			
			
		
		  
		  
		  
		  @media (max-width: 768px){
			  .innerscrollpvelem1{
				width: 253px;
				height: 190px;
				background-size: cover;
				background-repeat: no-repeat;
				  
			  }
			  
			  
			  
			  .page-index__title{ 
				  font-weight: 600;
font-size: 18px;
line-height: 25px;
				  
				  
				  
			  }
			  
			  .index-project-info__title{
				  font-size: 18px;
line-height: 25px;
				  
			  }
			  
			  
			  
			  
		  }
		  
		  
		  
		  @media (max-width: 1270px) {
		  
		  
			  .index-project__col.two.textpv1{
				  margin: 0 14px 0 14px !important;
			  }
			  
			  .index-project-info-btn{
				  margin-left: 0px !important;
			  }
							  
				.index-project-info-btn__col {
					max-width: 290px;
				}

		  }


@media (max-width: 1270px){
	.page-index__text.pvtext1{
	white-space: normal !important;
	}
}





		</style>
		  





















<?/*


<div class="news-detail">
	<?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arResult["DETAIL_PICTURE"])):?>
		<img
			class="detail_picture"
			border="0"
			src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
			width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
			height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
			alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
			title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
			/>
	<?endif?>
	<?if($arParams["DISPLAY_DATE"]!="N" && $arResult["DISPLAY_ACTIVE_FROM"]):?>
		<span class="news-date-time"><?=$arResult["DISPLAY_ACTIVE_FROM"]?></span>
	<?endif;?>
	<?if($arParams["DISPLAY_NAME"]!="N" && $arResult["NAME"]):?>
		<h3><?=$arResult["NAME"]?></h3>
	<?endif;?>
	<?if($arParams["DISPLAY_PREVIEW_TEXT"]!="N" && $arResult["FIELDS"]["PREVIEW_TEXT"]):?>
		<p><?=$arResult["FIELDS"]["PREVIEW_TEXT"];unset($arResult["FIELDS"]["PREVIEW_TEXT"]);?></p>
	<?endif;?>
	<?if($arResult["NAV_RESULT"]):?>
		<?if($arParams["DISPLAY_TOP_PAGER"]):?><?=$arResult["NAV_STRING"]?><br /><?endif;?>
		<?echo $arResult["NAV_TEXT"];?>
		<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?><br /><?=$arResult["NAV_STRING"]?><?endif;?>
	<?elseif(strlen($arResult["DETAIL_TEXT"])>0):?>
		<?echo $arResult["DETAIL_TEXT"];?>
	<?else:?>
		<?echo $arResult["PREVIEW_TEXT"];?>
	<?endif?>
	<div style="clear:both"></div>
	<br />
	<?foreach($arResult["FIELDS"] as $code=>$value):
		if ('PREVIEW_PICTURE' == $code || 'DETAIL_PICTURE' == $code)
		{
			?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?
			if (!empty($value) && is_array($value))
			{
				?><img border="0" src="<?=$value["SRC"]?>" width="<?=$value["WIDTH"]?>" height="<?=$value["HEIGHT"]?>"><?
			}
		}
		else
		{
			?><?=GetMessage("IBLOCK_FIELD_".$code)?>:&nbsp;<?=$value;?><?
		}
		?><br />
	<?endforeach;
	foreach($arResult["DISPLAY_PROPERTIES"] as $pid=>$arProperty):?>

		<?=$arProperty["NAME"]?>:&nbsp;
		<?if(is_array($arProperty["DISPLAY_VALUE"])):?>
			<?=implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);?>
		<?else:?>
			<?=$arProperty["DISPLAY_VALUE"];?>
		<?endif?>
		<br />
	<?endforeach;
	if(array_key_exists("USE_SHARE", $arParams) && $arParams["USE_SHARE"] == "Y")
	{
		?>
		<div class="news-detail-share">
			<noindex>
			<?
			$APPLICATION->IncludeComponent("bitrix:main.share", "", array(
					"HANDLERS" => $arParams["SHARE_HANDLERS"],
					"PAGE_URL" => $arResult["~DETAIL_PAGE_URL"],
					"PAGE_TITLE" => $arResult["~NAME"],
					"SHORTEN_URL_LOGIN" => $arParams["SHARE_SHORTEN_URL_LOGIN"],
					"SHORTEN_URL_KEY" => $arParams["SHARE_SHORTEN_URL_KEY"],
					"HIDE" => $arParams["SHARE_HIDE"],
				),
				$component,
				array("HIDE_ICONS" => "Y")
			);
			?>
			</noindex>
		</div>
		<?
	}
	?>
</div>


*/?>


