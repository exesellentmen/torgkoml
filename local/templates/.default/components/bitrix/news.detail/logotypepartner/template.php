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



		  

		  <h2 class="index-brand__title page-index__title"><?=$arResult["NAME"]?></h2>
		  
		  
		<div class="fordesc">  
		  
          <div class="index-brand index-margin-content">
            
			
			
            <div class="index-brand-slider__wrap">
              <div class="index-brand__items">
			  
			  
				<?foreach($arResult[PROPERTIES][logotypespertner][VALUE] as $arItem):?>
				
				<div class="index-brand__item">
                  <div class="index-brand__pic"><img src="<?=CFile::GetPath($arItem)?>" class="index-brand__img" alt=""></div>
                </div>
					
				<?endforeach;?>
				
				
				
              </div>
            </div>
			
			
          </div>
		  
		  
		</div>  
		  
		  
		  
		  
		  
		  
		  
		  
		<div class="contentoutter">
			<div class="contentmiddle">
				<div class="contentinner">
				
				
				
				<?foreach($arResult[PROPERTIES][logotypespertner][VALUE] as $arItem):?>
				  
					<div class="itemlogo" style="background-image: url(<?=CFile::GetPath($arItem)?>);"></div>
					
				
				<?endforeach;?>	
					
				  
			  
			  
				</div>
			</div>
		</div>
		
		  
		  
		  
		  
		  

<style>

.index-brand__title.page-index__title{
	margin-bottom: 17px !important;
}


.index-brand__title.page-index__title{
	padding-bottom: 0px;
	
}


.contentoutter{
		display:none;
	}



@media (max-width: 1270px) {
	
	.fordesc{
		display:none;
		
	}
	
	.contentoutter{
		display:block;
	}
	
.contentoutter {
    margin-left: 0px !important;
}
	



.itemlogo:nth-child(1){
margin-left: 14px;
}



.itemlogo:nth-last-child(1){
margin-right: 14px;
}








}









	
	.contentoutter{
		margin-left: 24px;
	}
	
	
	.itemlogo{
		background-repeat: no-repeat;
		background-size: cover;
		width: 136px;
		height: 67px;
		display: inline-block;
		margin-left: 5px;
		margin-right: 5px;
	}
	
	.contentinner{
		white-space: nowrap;
	}
	
	.contentmiddle{
		overflow: hidden;
		width: 100%;
		overflow-x: scroll;
		overflow-y: hidden;
	}
	
	
	
	
	
	
		
	.contentoutter ::-webkit-scrollbar-thumb {
		border-radius: 0px !important;
		background-color: #f9a6a600 !important;
		background: rgba(0, 0, 0, 0);
	}


	.contentoutter ::-webkit-scrollbar-track {
		background-color: #f9a6a600 !important;
		background: rgba(0, 0, 0, 0);
	}
	
	
	.contentoutter ::-webkit-scrollbar-button {
		background-color: #f9a6a600 !important;
		background: rgba(0, 0, 0, 0);
		width: 5px;
		height: 0px;
		background-repeat: no-repeat;
	}
	
	
	
	
	.index-brand__title.page-index__title{
		padding-bottom: 0px !important;
		
	}
	
	
</style>
 
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  


