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

 
		<?
		
		
		/*Настроил вывод десктоп*/
		
		
		
		
			echo "<div class='descpv11'>  
		  
          <div class='index-top-product index-margin-content'>
            <h2 class='index-top-product__title page-index__title'>ПОПУЛЯРНЫЕ ТОВАРЫ</h2>
            <div class='index-top-product__items'>";
							$i1 = 0;
							
							
							
			
			foreach ($arResult[PROPERTIES][tovargl][VALUE] as $value1) {
				$infoblokovara = CIBlockElement::GetByID($value1); //Получение элемента
				if($infoblokovara1 = $infoblokovara->GetNext()) // Метод вывод свойств в переменную
				$desc = $infoblokovara1['IBLOCK_ID']; // Присвоение ссылки хронящейся в массиве
				
				
				
				//Сбор данных о элементе галереи
				$arFilter4 = Array("IBLOCK_ID"=>$desc, "ID"=>$value1);
				
				
				$res4 = CIBlockElement::GetList(Array(), $arFilter4);
				if ($ob4 = $res4->GetNextElement()){
					$arFields4 = $ob4->GetFields(); // поля элемента
					$arProps4 = $ob4->GetProperties(); // свойства элемента
				   }
				   $photo[$i1] = CFile::GetPath($arProps4[PHOTO_1][VALUE]);
				   $morephoto[$i1] = $arProps4[MORE_PHOTO][VALUE];
				   $DISCOUNT[$i1] = $arProps4[DISCOUNT][VALUE];
				   $ARTICLE[$i1] = $arProps4[ARTICLE][VALUE];
				   $IN_STOCK[$i1] = $arProps4[IN_STOCK][VALUE];
					$pricegoods = CPrice::GetBasePrice($value1);
					
					$pricegoods1[$i1] = $pricegoods[PRICE];
					
					$nameelem[$i1] = $arFields4[NAME];
					

					
								   $i1++;
								   if($i1==5)$i1=0;   	

								   
			}
			
				
						echo	   "
						
			<a class='index-top-product__item one' href='#'>
                <div class='index-top-product-smo'>
                  <div class='index-top-product-smo__item'>-10%</div>
                </div>
                <div class='index-top-product__pic'><img src='$photo[0]' class='index-top-product__img' alt=''></div>
                <div class='index-top-product__name'>$nameelem[0]</div>
				<div class='index-top-product__name'>Артикул: $ARTICLE[0]</div>
				
                <div class='index-top-product-info'>
				
                  <div class='index-top-product-info__col price'>
                    <div class='index-top-product__name-stiker'>На заказ</div>$pricegoods1[0] руб.-
                  </div>
                </div>
			</a>
				
				
				
				<a class='index-top-product__item two' href='#'>
                <div class='index-top-product__name'>$nameelem[1]</div>
                <div class='index-top-product__art'>Артикул: $ARTICLE[1]</div>
                <div class='index-top-product__pic'><img src='$photo[1]' class='index-top-product__img' alt=''></div>
                <div class='index-top-product__price'>$pricegoods1[1] руб.-</div></a>
				
				<a class='index-top-product__item three' href='#'>
                <div class='index-top-product-smo'>
                  <div class='index-top-product-smo__item'>-10%</div>
                </div>
                <div class='index-top-product__name'>$nameelem[2]</div>
                <div class='index-top-product__art'>Артикул: $ARTICLE[2]</div>
                <div class='index-top-product__pic' style='margin-left: 2px;'><img src='$photo[2]' class='index-top-product__img' alt=''></div>
                <div class='index-top-product__price'>
                  <div class='index-top-product__name-stiker'>Нет в наличии</div>$pricegoods1[2] руб.-
                </div></a>
				
				
				
				<a class='index-top-product__item four' href='#'>
                <div class='index-top-product__pic'><img src='$photo[3]' class='index-top-product__img' alt=''></div>
                <div class='index-top-product__name'>$nameelem[3]</div>
                <div class='index-top-product__art'>Артикул: $ARTICLE[3]</div>
                <div class='index-top-product__price'>$pricegoods1[3] руб.-</div></a>
				
				
				
				<a class='index-top-product__item five' href='#'>
                <div class='index-top-product__pic'><img src='$photo[4]' class='index-top-product__img' alt=''></div>
                <div class='index-top-product__name'>$nameelem[4]</div>
                <div class='index-top-product-info'>
                  <div class='index-top-product-info__col art'>Артикул: $ARTICLE[4]</div>
                  <div class='index-top-product-info__col price'>$pricegoods1[4] руб.-</div>
                </div>
				</a>
				
				";
			
			
			
			echo "</div>
          </div>
		  
		</div>";
		
		
			
		
		
		
		
		echo "
		
		
		 <div class='pvcss'>
		 
		 
		 <h2 class='index-top-product__title page-index__title'>ПОПУЛЯРНЫЕ ТОВАРЫ</h2>
		 
		 
		 
			<div class='contentoutter'>
				<div class='contentmiddle'>
					<div class='contentinner'>
					 
					 
					 
					 
					 
					 <a class='index-top-product__item one' href='#'>
						<div class='index-top-product-smo'>
						  <div class='index-top-product-smo__item'>-10%</div>
						</div>
						<div class='index-top-product__pic'>
						
						
						<div class='imgph index-top-product__img' style='background-image:url($photo[0])'></div>
						
						</div>
						<div class='index-top-product__name'>$nameelem[0]</div>
						<div class='index-top-product__name artic'>Артикул: $ARTICLE[0]</div>
						
						
						<div class='index-top-product-info'>
						  
						  
						  <div class='index-top-product-info__col price'>
							<div class='index-top-product__name-stiker'>На заказ</div>$pricegoods1[0] руб.-
						  </div>
						</div>
					</a>
					 
					 
					 
					 
					 
					 <a class='index-top-product__item one' href='#'>
						<div class='index-top-product-smo'>
						  <div class='index-top-product-smo__item'>-10%</div>
						</div>
						<div class='index-top-product__pic'>
						
						
						<div class='imgph index-top-product__img' style='background-image:url($photo[1])'></div>
						
						</div>
						<div class='index-top-product__name'>$nameelem[1]</div>
						<div class='index-top-product__name artic'>Артикул: $ARTICLE[1]</div>
						
						
						<div class='index-top-product-info'>
						  
						  
						  <div class='index-top-product-info__col price'>
							<div class='index-top-product__name-stiker'>На заказ</div>$pricegoods1[1] руб.-
						  </div>
						</div>
					</a>
					 
					 
					 

					 
					 <a class='index-top-product__item one' href='#'>
						<div class='index-top-product-smo'>
						  <div class='index-top-product-smo__item'>-10%</div>
						</div>
						<div class='index-top-product__pic'>
						
						
						<div class='imgph index-top-product__img' style='background-image:url($photo[2])'></div>
						
						</div>
						<div class='index-top-product__name'>$nameelem[2]</div>
						<div class='index-top-product__name artic'>Артикул: $ARTICLE[2]</div>
						
						
						<div class='index-top-product-info'>
						  
						  <div class='index-top-product-info__col price'>
							<div class='index-top-product__name-stiker'>На заказ</div>$pricegoods1[2] руб.-
						  </div>
						</div>
					</a>
					 
					 
					 
					 
					 
					 
					 <a class='index-top-product__item one' href='#'>
						<div class='index-top-product-smo'>
						  <div class='index-top-product-smo__item'>-10%</div>
						</div>
						<div class='index-top-product__pic'>
						
						
						<div class='imgph index-top-product__img' style='background-image:url($photo[3])'></div>
						
						</div>
						<div class='index-top-product__name'>$nameelem[3]</div>
						<div class='index-top-product__name artic'>Артикул: $ARTICLE[3]</div>
						
						
						<div class='index-top-product-info'>
						  
						  
						  <div class='index-top-product-info__col price'>
							<div class='index-top-product__name-stiker'>На заказ</div>$pricegoods1[3] руб.-
						  </div>
						</div>
					</a>
	 
					 
					 <a class='index-top-product__item one' href='#'>
						<div class='index-top-product-smo'>
						  <div class='index-top-product-smo__item'>-10%</div>
						</div>
						<div class='index-top-product__pic'>
						
						
						<div class='imgph index-top-product__img' style='background-image:url($photo[4])'></div>
						
						</div>
						<div class='index-top-product__name'>$nameelem[4]</div>
						<div class='index-top-product__name artic'>Артикул: $ARTICLE[4]</div>
						
						
						<div class='index-top-product-info'>
						  
						  
						  <div class='index-top-product-info__col price'>
							<div class='index-top-product__name-stiker'>На заказ</div>$pricegoods1[4] руб.-
						  </div>
						</div>
					</a>
					 

			 
					</div> 
				</div> 
			</div> 
		</div>  
		
		
		";
		
		
		

		
		?>  
		  
		 
		 
		 
		 
		 
		 <style>
		 
		 .one .index-top-product__pic{
			height: 283px !important;
			margin-bottom: 5px !important;
			 
			 
		 }
		 
		 .one .index-top-product__name{
			 width: 60%;
			height: 40px;
			overflow: hidden;
			display: inline-block;
			 
			 
		 }
		 
		 .one .index-top-product__name{
			display: inline-block;
			width: 60%;
			 
		 }
		 
		 
		 .one .index-top-product-info{
			    display: inline-block;
				float: right; 
			 
		 }
		 
		 
		 .two .index-top-product__name{
			text-overflow: ellipsis;
			white-space: nowrap;
			overflow: hidden;
			width: 70%;
			 
		 }
		 
		 .two .index-top-product__art{
			text-overflow: ellipsis;
			white-space: nowrap;
			overflow: hidden;
			width: 47%;
			 
		 }
		 
		 .two .index-top-product__price{
			 position: absolute;
			bottom: 10px !important;
			left: 10px !important;
			top: unset !important;
			 
			 
		 }
		 
		 
		 .three .index-top-product__name{
			text-overflow: ellipsis;
			white-space: nowrap;
			overflow: hidden;
			width: 70%;
			float: right;
			 
		 }
		 
		 .three .index-top-product__art{
			text-overflow: ellipsis;
			white-space: nowrap;
			overflow: hidden;
			width: 47%;
			float: right;
			 
		 }
		 
		 .three .index-top-product__price{
			 position: absolute;
			bottom: 10px !important;
			left: 10px !important;
			top: unset !important;
			 
			 
		 }		 
		 
		 .three .index-top-product__pic{
			 
			 margin-left: 2px !important;
    bottom: 10px !important;
    position: absolute !important;
		 }
		 
		  .three .index-top-product__price{
			  
			  bottom: 10px !important;
    position: absolute !important;
    right: 0px !important;
			  
		  }
		  
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 .five .index-top-product__pic{
			height: 283px !important;
			margin-bottom: 5px !important;
			 
			 
		 }
		 
		 .five .index-top-product__name{
			 width: 60%;
			height: 40px;
			overflow: hidden;
			display: inline-block;
			 
			 
		 }
		 
		 .five .index-top-product__name{
			display: inline-block;
			width: 60%;
			 
		 }
		 
		 
		 .five .index-top-product-info{
			    display: inline-block;
				float: right; 
			 
		 }
		 
		 
		 
		 .five .index-top-product__name{
			 height: 40px;
    overflow: hidden;
			 
		 }
		 
		 .five .index-top-product-info{
			 width: 96%;
    float: left;
			 
		 }
		 
		 
		 .five .index-top-product-info__col.art{
			     width: 60%;
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
			 
		 }
		 
		 
		 .five .index-top-product-info__col.price{
			     float: right;
			 
		 }
		 
  
		  
		  .pvcss{
				  display:none;
			  }
		  
		  
		  
		  
		  
		  @media (max-width: 1270px) {
			  
			  
			  .descpv11{
				  display:none;
			  }
			  
			  .pvcss{
				  display:block;
			  }
			  
			  
			  .imgph{
				  background-repeat: no-repeat;
				background-size: cover;
				    margin-top: 2px;
				  
			  }
			  
			  
			  
			  .pvcss .index-top-product__item.one{
				  position: relative;
			  }
			  
			  .pvcss .index-top-product__name.artic{
				  float: left;
				  
			  }
			  
			  .pvcss .index-top-product__name{
				      white-space: pre-wrap;
				  
			  }
			  
			  
			  
			  
			  
			.pvcss .index-top-product__item.one{
			  display: inline-block  !important;
				width: 275px !important;
				height: 275px !important;
				    margin-right: 12px;
			  
			  
			}
			
			
			.pvcss .index-top-product__pic{
				width: 199px !important;
				height: 199px !important;
			  
			}
			
			
			.pvcss .index-top-product__img{ 
				width: 199px !important;
				height: 199px !important;
			}
			
			
			.pvcss .index-top-product__name{
			  
				height: 40px;
				overflow: hidden;
			  
			}
			
			

			.pvcss .index-top-product__name{
				width: 60%;
				display: inline-block;	
			}
			
			
			.pvcss .index-top-product__name.artic{
				display: inline-block;
				width: 50%;
				height: unset;
				white-space: nowrap;
				overflow: hidden;
			}
			  
			.pvcss .index-top-product-info{
				display: inline-block;
				float: right;
				
			}
			
			
			
			
			
			.pvcss ::-webkit-scrollbar-thumb {
				border-radius: 0px !important;
				background-color: #f9a6a600 !important;
				background: rgba(0, 0, 0, 0);
			}


			.pvcss ::-webkit-scrollbar-track {
				background-color: #f9a6a600 !important;
				background: rgba(0, 0, 0, 0);
			}
			
			
			.pvcss ::-webkit-scrollbar-button {
				background-color: #f9a6a600 !important;
				background: rgba(0, 0, 0, 0);
				width: 5px;
				height: 0px;
				background-repeat: no-repeat;
			}
			
			
			
			
			
			
			
			
			
			
			
			
			
	  
			  
		  }
		  
		  
		  
		  
		  
		  </style>
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  
		  


