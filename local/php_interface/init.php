<?


//Рабочий скрипт

















//Скрипт текста с ссылкой на элемент

AddEventHandler("iblock", "OnIBlockPropertyBuildList", array("CIBlockNewProperty", "GetUserTypeDescription"));
class CIBlockNewProperty
{
  public  static function GetUserTypeDescription()
  {
    return array(
      "PROPERTY_TYPE"        => "S", #-----один из стандартных типов
      "USER_TYPE"            => "MYIDCODE", #-----идентификатор типа свойства
      "DESCRIPTION"          => "Пункты меню",
      "GetPropertyFieldHtml" => array("CIBlockNewProperty", "GetPropertyFieldHtml"),
    );
  }
  /*--------- вывод поля свойства на странице редактирования ---------*/
 
 public  static function GetPropertyFieldHtml($arProperty, $value, $strHTMLControlName)
  {
    return '<input type="text" name="'.$strHTMLControlName["VALUE"].'" value="'.$value['VALUE'].'">
			<input name="'.$strHTMLControlName["DESCRIPTION"].'" id="'.$strHTMLControlName["DESCRIPTION"].'" value="'.$value["DESCRIPTION"].'" size="5" type="text">
			<input type="button" value="..." onclick="jsUtils.OpenWindow(\'iblock_element_search.php?lang=ru&IBLOCK_ID=1&n='.$strHTMLControlName["DESCRIPTION"].'\', 800, 600);">  
			<span id="sp_'.$strHTMLControlName["DESCRIPTION"].'" >	 </span> 
			';
  }
}




//Скрипт текста с прямой ссылкой

AddEventHandler("iblock", "OnIBlockPropertyBuildList", array("CIBlockNewProperty1", "GetUserTypeDescription"));
class CIBlockNewProperty1
{
  public  static function GetUserTypeDescription()
  {
    return array(
      "PROPERTY_TYPE"        => "S", #-----один из стандартных типов
      "USER_TYPE"            => "MYIDCODE22", #-----идентификатор типа свойства
      "DESCRIPTION"          => "Список прямых ссылок",
      "GetPropertyFieldHtml" => array("CIBlockNewProperty1", "GetPropertyFieldHtml"),
    );
  }
  /*--------- вывод поля свойства на странице редактирования ---------*/
 
 public  static function GetPropertyFieldHtml($arProperty, $value, $strHTMLControlName)
  {
    return '<input type="text" name="'.$strHTMLControlName["VALUE"].'" value="'.$value['VALUE'].'">
			<input type="text" name="'.$strHTMLControlName["DESCRIPTION"].'" value="'.$value['DESCRIPTION'].'">
	
	';
  }
}













//Пример создания картинки в файле local/php_interface/init.php

AddEventHandler("iblock", "OnIBlockPropertyBuildList", array("CIBlockNewPropertya", "GetUserTypeDescription"));
class CIBlockNewPropertya
{
  public function GetUserTypeDescription()
  {
    return array(
      "PROPERTY_TYPE"        => "F", #-----один из стандартных типов
      "USER_TYPE"            => "MYIDCODE1", #-----идентификатор типа свойства
      "DESCRIPTION"          => "Картинка2",
	  "GetPropertyFieldHtml" => array("CIBlockNewPropertya", "GetPropertyFieldHtml"),
		"GetPropertyFieldHtmlMulty" => array("CIBlockNewPropertya", "GetPropertyFieldHtmlMulty"),
		"ConvertToDB" => array("CIBlockNewPropertya", "ConvertToDB"),
			"ConvertFromDB" => array("CIBlockNewPropertya", "ConvertFromDB"),
			"GetSettingsHTML" => array("CIBlockNewPropertya", "GetSettingsHTML"),
			
	  
    );
  }
  /*--------- вывод поля свойства на странице редактирования ---------*/
 


	public static function GetPropertyFieldHtmlMulty($arProperty, $arValues, $strHTMLControlName)
	{
		if($strHTMLControlName["MODE"]=="FORM_FILL" && CModule::IncludeModule('fileman'))
		{
			$inputName = array();
			$description = array();
			foreach ($arValues as $intPropertyValueID => $arOneValue)
			{
				$key = $strHTMLControlName["VALUE"]."[".$intPropertyValueID."]";
				$inputName[$key."[VALUE]"] = $arOneValue["VALUE"];
				$description[$key."[DESCRIPTION]"] = $arOneValue["DESCRIPTION"];
			}

			return CFileInput::ShowMultiple($inputName, $strHTMLControlName["VALUE"]."[n#IND#][VALUE]", array(
				"PATH" => "Y",
				"IMAGE" => "N",
				"MAX_SIZE" => array(
					"W" => COption::GetOptionString("iblock", "detail_image_size"),
					"H" => COption::GetOptionString("iblock", "detail_image_size"),
				),
			), false, array(
				'upload' => false,
				'medialib' => true,
				'file_dialog' => true,
				'cloud' => true,
				'del' => true,
				'description' => $arProperty["WITH_DESCRIPTION"]=="Y"? array(
					"VALUES" => $description,
					'NAME_TEMPLATE' => $strHTMLControlName["VALUE"]."[n#IND#][DESCRIPTION]",
				): false,
			));
		}
		else
		{
			$table_id = md5($strHTMLControlName["VALUE"]);
			$return = '<table id="tb'.$table_id.'" border=0 cellpadding=0 cellspacing=0>';
			foreach ($arValues as $intPropertyValueID => $arOneValue)
			{
				$return .= '<tr><td>';

				$return .= '<input type="text" name="'.htmlspecialcharsbx($strHTMLControlName["VALUE"]."[$intPropertyValueID][VALUE]").'" size="'.$arProperty["COL_COUNT"].'" value="'.htmlspecialcharsEx($arOneValue["VALUE"]).'">';

				if (($arProperty["WITH_DESCRIPTION"]=="Y") && ('' != trim($strHTMLControlName["DESCRIPTION"])))
					$return .= ' <span title="'.Loc::getMessage("IBLOCK_PROP_FILEMAN_DESCRIPTION_TITLE").'">'.Loc::getMessage("IBLOCK_PROP_FILEMAN_DESCRIPTION_LABEL").':<input name="'.htmlspecialcharsEx($strHTMLControlName["DESCRIPTION"]."[$intPropertyValueID][DESCRIPTION]").'" value="'.htmlspecialcharsEx($arOneValue["DESCRIPTION"]).'" size="18" type="text"></span>';

				$return .= '</td></tr>';
			}

			$return .= '<tr><td>';
			$return .= '<input type="text" name="'.htmlspecialcharsbx($strHTMLControlName["VALUE"]."[n0][VALUE]").'" size="'.$arProperty["COL_COUNT"].'" value="">';
			if (($arProperty["WITH_DESCRIPTION"]=="Y") && ('' != trim($strHTMLControlName["DESCRIPTION"])))
				$return .= ' <span title="'.Loc::getMessage("IBLOCK_PROP_FILEMAN_DESCRIPTION_TITLE").'">'.Loc::getMessage("IBLOCK_PROP_FILEMAN_DESCRIPTION_LABEL").':<input name="'.htmlspecialcharsEx($strHTMLControlName["DESCRIPTION"]."[n0][DESCRIPTION]").'" value="" size="18" type="text"></span>';
			$return .= '</td></tr>';

			$return .= '<tr><td><input type="button" value="'.Loc::getMessage("IBLOCK_PROP_FILEMAN_ADD").'" onClick="addNewRow(\'tb'.$table_id.'\')"></td></tr>';
			return $return.'</table>';
		}
	}
	
	
	
	
		public static function GetPropertyFieldHtml($arProperty, $value, $strHTMLControlName)
	{
		global $APPLICATION;

		if (strLen(trim($strHTMLControlName["FORM_NAME"])) <= 0)
			$strHTMLControlName["FORM_NAME"] = "form_element";
		$name = preg_replace("/[^a-zA-Z0-9_]/i", "x", htmlspecialcharsbx($strHTMLControlName["VALUE"]));

		if(is_array($value["VALUE"]))
		{
			$value["VALUE"] = $value["VALUE"]["VALUE"];
			$value["DESCRIPTION"] = $value["DESCRIPTION"]["VALUE"];
		}

		if($strHTMLControlName["MODE"]=="FORM_FILL" && CModule::IncludeModule('fileman'))
		{
			return CFileInput::Show($strHTMLControlName["VALUE"], $value["VALUE"],
				array(
					"PATH" => "Y",
					"IMAGE" => "N",
					"MAX_SIZE" => array(
						"W" => COption::GetOptionString("iblock", "detail_image_size"),
						"H" => COption::GetOptionString("iblock", "detail_image_size"),
					),
				), array(
					'upload' => false,
					'medialib' => true,
					'file_dialog' => true,
					'cloud' => true,
					'del' => true,
					'description' => $arProperty["WITH_DESCRIPTION"]=="Y"? array(
						"VALUE" => $value["DESCRIPTION"],
						"NAME" => $strHTMLControlName["DESCRIPTION"],
					): false,
				)
			);
		}
		else
		{
			$return = '<input type="text" name="'.htmlspecialcharsbx($strHTMLControlName["VALUE"]).'" id="'.$name.'" size="'.$arProperty["COL_COUNT"].'" value="'.htmlspecialcharsEx($value["VALUE"]).'">';

			if (($arProperty["WITH_DESCRIPTION"]=="Y") && ('' != trim($strHTMLControlName["DESCRIPTION"])))
			{
				$return .= ' <span title="'.Loc::getMessage("IBLOCK_PROP_FILEMAN_DESCRIPTION_TITLE").'">'.Loc::getMessage("IBLOCK_PROP_FILEMAN_DESCRIPTION_LABEL").':<input name="'.htmlspecialcharsEx($strHTMLControlName["DESCRIPTION"]).'" value="'.htmlspecialcharsEx($value["DESCRIPTION"]).'" size="18" type="text"></span>';
			}

			return $return;
		}
	}
	
	
	
	
	public static function ConvertToDB($arProperty, $value)
	{
		$result = array();
		$return = array();
		if(is_array($value["VALUE"]))
		{
			$result["VALUE"] = $value["VALUE"]["VALUE"];
			$result["DESCRIPTION"] = $value["DESCRIPTION"]["VALUE"];
		}
		else
		{
			$result["VALUE"] = $value["VALUE"];
			$result["DESCRIPTION"] = $value["DESCRIPTION"];
		}
		$return["VALUE"] = trim($result["VALUE"]);
		$return["DESCRIPTION"] = trim($result["DESCRIPTION"]);
		return $return;
	}

	public static function ConvertFromDB($arProperty, $value)
	{
		$return = array();
		if (strLen(trim($value["VALUE"])) > 0)
			$return["VALUE"] = $value["VALUE"];
		if (strLen(trim($value["DESCRIPTION"])) > 0)
			$return["DESCRIPTION"] = $value["DESCRIPTION"];
		return $return;
	}

	public static function GetSettingsHTML($arProperty, $strHTMLControlName, &$arPropertyFields)
	{
		$arPropertyFields = array(
			"HIDE" => array("MULTIPLE_CNT"),
		);

		return '';
	}

  
  

  
}














/*
// Класс для Свойства: картинка с текстом и ссылкой
class CIBlockNewPropertya // Добавляем новый класс для каждого свойства с уникальным названием
{
  public function GetUserTypeDescription()
  {
    return array(
      "PROPERTY_TYPE"        => "F", #-----один из стандартных типов
      "USER_TYPE"            => "MYIDCODEA1", #-----идентификатор типа свойства
      "DESCRIPTION"          => "Галерея для раздела",
      "GetPropertyFieldHtml" => array("CIBlockNewProperty", "GetPropertyFieldHtml"),
	  
    );
  }
  /*--------- вывод поля свойства на странице редактирования ---------*/
 
/*
 public function GetPropertyFieldHtml($arProperty, $value, $strHTMLControlName)
  {
    return '<input type="text" name="'.$strHTMLControlName["VALUE"].'" value="'.$value['VALUE'].'">
	<input type="text" name="'.$strHTMLControlName["DESCRIPTION"].'" value="'.$value['DESCRIPTION'].'">';
  }
  

  
  
  
  
  
  
}

*/






































/*


AddEventHandler("iblock", "OnIBlockPropertyBuildList", array("CIBlockPropertyPicture", "GetUserTypeDescription"));
AddEventHandler("iblock", "OnBeforeIBlockElementDelete", array("CIBlockPropertyPicture", "OnBeforeIBlockElementDelete"));
class CIBlockPropertyPicture
{
   function GetUserTypeDescription()
   {
      return array(
         "PROPERTY_TYPE"      =>"E",
         "USER_TYPE"      =>"Picture",
         "DESCRIPTION"      =>"Картинка",
         "GetPropertyFieldHtml" =>array("CIBlockPropertyPicture", "GetPropertyFieldHtml"),
         "GetPublicViewHTML" =>array("CIBlockPropertyPicture", "GetPublicViewHTML"),
         "ConvertToDB" =>array("CIBlockPropertyPicture", "ConvertToDB"),

         //"GetPublicEditHTML" =>array("CIBlockPropertyPicture","GetPublicEditHTML"),
         //"GetAdminListViewHTML" =>array("CIBlockPropertyPicture","GetAdminListViewHTML"),
         //"CheckFields" =>array("CIBlockPropertyPicture","CheckFields"),
         //"ConvertFromDB" =>array("CIBlockPropertyPicture","ConvertFromDB"),
         //"GetLength" =>array("CIBlockPropertyPicture","GetLength"),
      );
   }

   function GetPropertyFieldHtml($arProperty, $value, $strHTMLControlName)
   {
      $LINK_IBLOCK_ID = intval($arProperty["LINK_IBLOCK_ID"]);
      if($LINK_IBLOCK_ID)
      {
         $ELEMENT_ID = intval($value["VALUE"]);
         if($ELEMENT_ID)
         {
            $rsElement = CIBlockElement::GetList(array(), array("IBLOCK_ID" => $arProperty["LINK_IBLOCK_ID"],
                          "ID" => $value["VALUE"]), false, false, array("ID", "PREVIEW_PICTURE", "DETAIL_PICTURE"));
            $arElement = $rsElement->Fetch();
            if(is_array($arElement))
               $file_id = $arElement["DETAIL_PICTURE"];
            else
               $file_id = 0;
         }
         else
         {
            $file_id = 0;
         }

         if($file_id)
         {
            $db_img = CFile::GetByID($file_id);
            $db_img_arr = $db_img->Fetch();
            if($db_img_arr)
            {
               $strImageStorePath = COption::GetOptionString("main", "upload_dir", "upload");
               $sImagePath = "/".$strImageStorePath."/".$db_img_arr["SUBDIR"]."/".$db_img_arr["FILE_NAME"];
               return '<label><input name="'.$strHTMLControlName["VALUE"].'[del]" value="Y" type="checkbox"> 
                        Удалить файл '.$sImagePath.'</label>'
               .'<input name="'.$strHTMLControlName["VALUE"].'[old]" value="'.$ELEMENT_ID.'" type="hidden">';
            }
         }
         return '<input type="file" size="'.$arProperty["COL_COUNT"].'" name="'.$strHTMLControlName["VALUE"].'"/>';
      }
      else
      {
         return "Ошибка настройки свойства. Укажите инфоблок в котором будут храниться картинки.";
      }
   }

   function GetPublicViewHTML($arProperty, $value, $strHTMLControlName)
   {
      $LINK_IBLOCK_ID = intval($arProperty["LINK_IBLOCK_ID"]);
      if($LINK_IBLOCK_ID)
      {
         $ELEMENT_ID = intval($value["VALUE"]);
         if($ELEMENT_ID)
         {
            $rsElement = CIBlockElement::GetList(array(), array("IBLOCK_ID" => $arProperty["LINK_IBLOCK_ID"], 
                          "ID" => $value["VALUE"]), false, false, array("ID", "PREVIEW_PICTURE", "DETAIL_PICTURE"));
            $arElement = $rsElement->Fetch();
            if(is_array($arElement))
               return CFile::Show2Images($arElement["PREVIEW_PICTURE"], $arElement["DETAIL_PICTURE"]);
         }
      }
      return "";
   }

   function ConvertToDB($arProperty, $value)
   {
      $arResult = array("VALUE" => "", "DESCRIPTION" => "");
      $LINK_IBLOCK_ID = intval($arProperty["LINK_IBLOCK_ID"]);
      if($LINK_IBLOCK_ID)
      {
         if(
            is_array($value["VALUE"])
            && is_array($value["VALUE"]["error"])
            && $value["VALUE"]["error"]["VALUE"] == 0
            && $value["VALUE"]["size"]["VALUE"] > 0
         )
         {
            $arDetailPicture =  array(
               "name" => $value["VALUE"]["name"]["VALUE"],
               "type" => $value["VALUE"]["type"]["VALUE"],
               "tmp_name" => $value["VALUE"]["tmp_name"]["VALUE"],
               "error" => $value["VALUE"]["error"]["VALUE"],
               "size" => $value["VALUE"]["size"]["VALUE"],
            );
            $obElement = new CIBlockElement;
            $arResult["VALUE"] = $obElement->Add(array(
               "IBLOCK_ID" => $LINK_IBLOCK_ID,
               "NAME" => $arDetailPicture["name"],
               "DETAIL_PICTURE" => $arDetailPicture,
            ), false, false, true);
         }
         elseif(
            is_array($value["VALUE"])
            && isset($value["VALUE"]["size"])
            && !is_array($value["VALUE"]["size"])
            && $value["VALUE"]["size"] > 0
         )
         {
            $arDetailPicture =  array(
               "name" => $value["VALUE"]["name"],
               "type" => $value["VALUE"]["type"],
               "tmp_name" => $value["VALUE"]["tmp_name"],
               "error" => intval($value["VALUE"]["error"]),
               "size" => $value["VALUE"]["size"],
            );
            $obElement = new CIBlockElement;
            $arResult["VALUE"] = $obElement->Add(array(
               "IBLOCK_ID" => $LINK_IBLOCK_ID,
               "NAME" => $arDetailPicture["name"],
               "DETAIL_PICTURE" => $arDetailPicture,
            ), false, false, true);
         }
         elseif($value["VALUE"]["del"])
         {
            $obElement = new CIBlockElement;
            $obElement->Delete($value["VALUE"]["old"]);
         }
         elseif($value["VALUE"]["old"])
         {
            $arResult["VALUE"] = $value["VALUE"]["old"];
         }
         elseif(!is_array($value["VALUE"]) && intval($value["VALUE"]))
         {
            $arResult["VALUE"] = $value["VALUE"];
         }
      }
      return $arResult;
   }

   function OnBeforeIBlockElementDelete($ELEMENT_ID)
   {
      $arProperties = array();
      $rsElement = CIBlockElement::GetList(array(), array("ID" => $ELEMENT_ID), false, false, array("ID", "IBLOCK_ID"));
      $arElement = $rsElement->Fetch();
      if($arElement)
      {
         $rsProperties = CIBlockProperty::GetList(array(), array("IBLOCK_ID" => $arElement["IBLOCK_ID"], "USER_TYPE" => "Picture"));
         while($arProperty = $rsProperties->Fetch())
            $arProperties[] = $arProperty;
      }

      $arElements = array();
      foreach($arProperties as $arProperty)
      {
         $rsPropValues = CIBlockElement::GetProperty($arElement["IBLOCK_ID"], $arElement["ID"], array(), array(
            "EMPTY" => "N",
            "ID" => $arProperty["ID"],
         ));
         while($arPropValue = $rsPropValues->Fetch())
         {
            $ID = intval($arPropValue["VALUE"]);
            if($ID > 0)
               $arElements[$ID] = $ID;
         }
      }

      foreach($arElements as $to_delete)
      {
         CIBlockElement::Delete($to_delete);
      }
   }
}





*/








?>