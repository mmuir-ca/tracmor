<?php
/*
 * Copyright (c)  2009, Tracmor, LLC 
 *
 * This file is part of Tracmor.  
 *
 * Tracmor is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version. 
 *	
 * Tracmor is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tracmor; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */
?>

<?php

	class Item extends QBaseClass {
		
		public function RenderBarcode() {
			
			$strPath = '../includes/php/barcode.php';
			
			$strToReturn = sprintf('<img src="%s?code=%s">',$strPath, $this->strCode);
			
			return $strToReturn;
		}
		
		/**
		 * Internally called method to assist with SQL Query options/preferences for array loaders.
		 * Any LoadAll or LoadArray method can use this method to setup SQL Query Clauses that deal
		 * with OrderBy, Limit, and Object Expansion.  Strings that contain SQL Query Clauses are
		 * passed in by reference.
		 * @param string $strOrderBy reference to the Order By as passed in to the LoadArray method
		 * @param string $strLimit the Limit as passed in to the LoadArray method
		 * @param string $strLimitPrefix reference to the Limit Prefix to be used in the SQL
		 * @param string $strLimitSuffix reference to the Limit Suffix to be used in the SQL
		 * @param string $objDatabase reference to the Database object to be queried
		 */
		protected static function ArrayQueryHelper(&$strOrderBy, $strLimit, &$strLimitPrefix, &$strLimitSuffix, &$objDatabase) {
			// Get the Database
			$objDatabase = QApplication::$Database[1];

			// Setup OrderBy and Limit Information (if applicable)
			$strOrderBy = $objDatabase->SqlSortByVariable($strOrderBy);
			$strLimitPrefix = $objDatabase->SqlLimitVariablePrefix($strLimit);
			$strLimitSuffix = $objDatabase->SqlLimitVariableSuffix($strLimit);
		}		
		
		/**
		 * Instantiate an Item from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * @param DatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @return Shipment
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// Create a new instance of the Shipment object
			$objToReturn = new Item();

			$objToReturn->strShortDescription = $objDbRow->GetColumn($strAliasPrefix . 'short_description', 'VarChar');
			$objToReturn->strCode = $objDbRow->GetColumn($strAliasPrefix . 'code', 'VarChar');
			$objToReturn->strParentAsset = $objDbRow->GetColumn($strAliasPrefix . 'parent_asset', 'VarChar');
			$objToReturn->strParentCode = $objDbRow->GetColumn($strAliasPrefix . 'parent_code', 'VarChar');
			$objToReturn->strQuantity = $objDbRow->GetColumn($strAliasPrefix . 'quantity', 'VarChar');
			$objToReturn->strReceiptNumber = $objDbRow->GetColumn($strAliasPrefix . 'receipt_number', 'VarChar');
			$objToReturn->strQuickNotes = $objDbRow->GetColumn($strAliasPrefix . 'quick_notes', 'VarChar');
			$objToReturn->strDimensions = $objDbRow->GetColumn($strAliasPrefix . 'dimensions', 'VarChar');
			$objToReturn->strWeight = $objDbRow->GetColumn($strAliasPrefix . 'weight', 'VarChar');
			$objToReturn->strPackingBox = $objDbRow->GetColumn($strAliasPrefix . 'packing_box', 'VarChar');
			$objToReturn->strOwningCompany = $objDbRow->GetColumn($strAliasPrefix . 'owning_company', 'VarChar');
			$objToReturn->strSerialNumber = $objDbRow->GetColumn($strAliasPrefix . 'serial_number', 'VarChar');
			$objToReturn->strHScode = $objDbRow->GetColumn($strAliasPrefix . 'hs_code', 'VarChar');
			$objToReturn->strCountryOrigin = $objDbRow->GetColumn($strAliasPrefix . 'country_origin', 'VarChar');
			$objToReturn->strShippingValue = $objDbRow->GetColumn($strAliasPrefix . 'shipping_value', 'VarChar');
			$objToReturn->strFCC = $objDbRow->GetColumn($strAliasPrefix . 'fcc', 'VarChar');
			
			return $objToReturn;
		}
		
		/**
		 * Instantiate an array of Items from a Database Result
		 * @param DatabaseResultBase $objDbResult
		 * @return Item[]
		*/
		public static function InstantiateDbResult(QDatabaseResultBase $objDbResult) {
			$objToReturn = array();

			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;

			// Load up the return array with each row
			while ($objDbRow = $objDbResult->GetNextRow())
				array_push($objToReturn, Item::InstantiateDbRow($objDbRow));

			return $objToReturn;
		}
		
    /**
     * Load an array of Item objects by ShipmentId
     *
     * @param string $intShipmentId
     * @return Array
     */
		public static function LoadArrayByShipmentId($intShipmentId, $strOrderBy = null, $strLimit = null, $objExpansionMap = null) {
			
			Item::ArrayQueryHelper($strOrderBy, $strLimit, $strLimitPrefix, $strLimitSuffix, $objDatabase);
			
			$objShipment = Shipment::Load($intShipmentId);
							
			$strQuery = sprintf("
				SELECT 
					asset_model.short_description AS short_description,
					asset.asset_code AS code,
					asset.parent_asset_id AS parent_asset,
					(SELECT
						asset.asset_code 
					FROM
						asset 
					WHERE
						asset.asset_id = parent_asset) AS parent_code,
					'1' AS quantity,
					(
					SELECT 
						receipt.receipt_number 
					FROM 
						receipt,
						transaction,
						asset_transaction at
					WHERE
						receipt.transaction_id = transaction.transaction_id
					AND
						at.transaction_id = transaction.transaction_id
					AND
						at.parent_asset_transaction_id = asset_transaction.asset_transaction_id					
					) AS receipt_number,
					asset_custom_field_helper.cfv_36 AS quick_notes,
					asset_custom_field_helper.cfv_34 AS dimensions,
					asset_custom_field_helper.cfv_27 AS weight,
					asset_custom_field_helper.cfv_31 AS packing_box,
					asset_custom_field_helper.cfv_32 AS owning_company,
					asset_custom_field_helper.cfv_1 AS serial_number,
					asset_custom_field_helper.cfv_13 AS hs_code,
					asset_custom_field_helper.cfv_14 AS country_origin,
					asset_custom_field_helper.cfv_35 AS shipping_value,
					asset_custom_field_helper.cfv_24 AS fcc
				FROM 
					asset_transaction 
					LEFT JOIN asset ON asset_transaction.asset_id = asset.asset_id
					LEFT JOIN asset_model ON asset.asset_model_id = asset_model.asset_model_id
					LEFT JOIN asset_custom_field_helper ON asset_transaction.asset_id = asset_custom_field_helper.asset_id 
				WHERE
					asset_transaction.transaction_id = %s
				UNION
				SELECT 
					inventory_model.short_description AS short_description, 
					inventory_model.inventory_model_code AS code, 
					inventory_transaction.source_location_id AS parent_asset,
					(SELECT
						short_description
					FROM
						location
					WHERE
						location_id = parent_asset) AS parent_code,
					inventory_transaction.quantity AS quantity,
					'' AS receipt_number,
					inventory_model_custom_field_helper.cfv_36 AS quick_notes,
					inventory_model_custom_field_helper.cfv_34 AS dimensions,
					inventory_model_custom_field_helper.cfv_27 AS weight,
					inventory_model_custom_field_helper.cfv_31 AS packing_box,
					inventory_model_custom_field_helper.cfv_32 AS owning_company,
					'' AS serial_number,
					inventory_model_custom_field_helper.cfv_13 AS hs_code,
					inventory_model_custom_field_helper.cfv_14 AS country_origin,
					inventory_model_custom_field_helper.cfv_35 AS shipping_value,
					inventory_model_custom_field_helper.cfv_24 AS fcc
				FROM 
					inventory_transaction
					LEFT JOIN inventory_location ON inventory_transaction.inventory_location_id = inventory_location.inventory_location_id
					LEFT JOIN inventory_model ON inventory_location.inventory_model_id = inventory_model.inventory_model_id
					LEFT JOIN inventory_model_custom_field_helper ON inventory_model.inventory_model_id= inventory_model_custom_field_helper.inventory_model_id
				WHERE 
					inventory_transaction.transaction_id = %s
			", $objShipment->TransactionId, $objShipment->TransactionId);

			$objDbResult = $objDatabase->Query($strQuery);				
			return Item::InstantiateDbResult($objDbResult);
		}
		
		public function __get($strName) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				
				case 'ShortDescription':
					/**
					 * Gets the value for strCourierOther 
					 * @return string
					 */
					return $this->strShortDescription;
					
				case 'Code':
					/**
					 * Gets the value for strCourierOther 
					 * @return string
					 */
					return $this->strCode;
					
				case 'ParentAsset':
					return $this->strParentAsset;
					
				case 'ParentCode':
					return $this->strParentCode;
				
				case 'Quantity':
					/**
					 * Gets the value for strCourierOther 
					 * @return string
					 */
					return $this->strQuantity;
					
				case 'ReceiptNumber':
					/**
					 * Gets the value for strReceiptNumber 
					 * @return string
					 */
					return $this->strReceiptNumber;	
					
				case 'QuickNotes':
					/**
					 * Gets the value for strQuickNotes 
					 * @return string
					 */
					return $this->strQuickNotes;
					
				case 'Dimensions':
					/**
					 * Gets the value for strDimensions 
					 * @return string
					 */
					return $this->strDimensions;
					
				case 'Weight':
					/**
					 * Gets the value for strWeight 
					 * @return string
					 */
					return $this->strWeight;
					
				case 'PackingBox':
					/**
					 * Gets the value for strPackingBox 
					 * @return string
					 */
					return $this->strPackingBox;
					
				case 'OwningCompany':
					/**
					 * Gets the value for strOwningCompany 
					 * @return string
					 */
					return $this->strOwningCompany;
					
				case 'SerialNumber':
					/**
					 * Gets the value for strSerialNumber 
					 * @return string
					 */
					return $this->strSerialNumber;
					
				case 'HScode':
					/**
					 * Gets the value for strHScode 
					 * @return string
					 */
					return $this->strHScode;
				case 'CountryOrigin':
					/**
					 * Gets the value for strCountryOrigin
					 * @return string
					 */
					return $this->strCountryOrigin;
					
				case 'ShippingValue':
					/**
					 * Gets the value for strShippingValue  
					 * @return string
					 */
					return $this->strShippingValue;
					
				case 'FCC':
					/**
					 * Gets the value for strFCC  
					 * @return string
					 */
					return $this->strFCC;
					
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

				/**
		 * Override method to perform a property "Set"
		 * This will set the property $strName to be $mixValue
		 *
		 * @param string $strName Name of the property to set
		 * @param string $mixValue New value of the property
		 * @return mixed
		 */
		public function __set($strName, $mixValue) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				
				case 'ShortDescription':
					/**
					 * Sets the value for strShortDescription 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strShortDescription = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
					
				case 'Code':
					/**
					 * Sets the value for strCode 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCode = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
					
				case 'ParentAsset':					
					try {
						return ($this->strParentAsset = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
					
				case 'ParentCode':
					try {
						return ($this->strParentCode = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
				
				case 'Quantity':
					/**
					 * Sets the value for strQuantity 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strQuantity = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
					
				case 'QuickNotes':
					/**
					 * Sets the value for strQuickNotes 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strQuickNotes = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
							
				case 'Dimensions':
					/**
					 * Sets the value for strDimensions 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strDimensions = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
						
				case 'Weight':
					/**
					 * Sets the value for strWeight 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strWeight = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
						
				case 'OwningCompany':
					/**
					 * Sets the value for strOwningCompany 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strOwningCompany = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
									
				case 'SerialNumber':
					/**
					 * Sets the value for strSerialNumber 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strSerialNumber = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
					
				case 'HScode':
					/**
					 * Sets the value for strHScode 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strHScode = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
						
				case 'CountryOrigin':
					/**
					 * Sets the value for strCountryOrigin 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strCountryOrigin = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
						
				case 'ShippingValue':
					/**
					 * Sets the value for strShippingValue 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strShippingValue = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
						
				case 'FCC':
					/**
					 * Sets the value for strFCC 
					 * @param string $mixValue
					 * @return string
					 */
					try {
						return ($this->strFCC = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
						
				default:
					try {
						return parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
		
		///////////////////////////////
		// PROTECTED MEMBER VARIABLES
		///////////////////////////////
		protected $strShortDescription;
		protected $strCode;
		protected $strParentAsset;
		protected $strParentCode;
		protected $strQuantity;
		protected $strReceiptNumber;
		protected $strQuickNotes;
		protected $strDimensions;
		protected $strWeight;
		protected $strPackingBox;
		protected $strOwningCompany;
		protected $strSerialNumber;
		protected $strHScode;
		protected $strCountryOrigin;
		protected $strShippingValue;
		protected $strFCC;
		
	}
?>
