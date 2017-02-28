<?php
	/**
	 * The abstract SamsAssetLogGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the SamsAssetLog subclass which
	 * extends this SamsAssetLogGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the SamsAssetLog class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $AssetLogId the value for intAssetLogId (Read-Only PK)
	 * @property integer $AssetId the value for intAssetId (Not Null)
	 * @property integer $CreatedBy the value for intCreatedBy (Not Null)
	 * @property QDateTime $CreationDate the value for dttCreationDate 
	 * @property integer $LogQtypeId the value for intLogQtypeId (Not Null)
	 * @property string $Note the value for strNote (Not Null)
	 * @property Asset $Asset the value for the Asset object referenced by intAssetId (Not Null)
	 * @property UserAccount $CreatedByObject the value for the UserAccount object referenced by intCreatedBy (Not Null)
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class SamsAssetLogGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column sams_asset_log.asset_log_id
		 * @var integer intAssetLogId
		 */
		protected $intAssetLogId;
		const AssetLogIdDefault = null;


		/**
		 * Protected member variable that maps to the database column sams_asset_log.asset_id
		 * @var integer intAssetId
		 */
		protected $intAssetId;
		const AssetIdDefault = null;


		/**
		 * Protected member variable that maps to the database column sams_asset_log.created_by
		 * @var integer intCreatedBy
		 */
		protected $intCreatedBy;
		const CreatedByDefault = null;


		/**
		 * Protected member variable that maps to the database column sams_asset_log.creation_date
		 * @var QDateTime dttCreationDate
		 */
		protected $dttCreationDate;
		const CreationDateDefault = null;


		/**
		 * Protected member variable that maps to the database column sams_asset_log.log_qtype_id
		 * @var integer intLogQtypeId
		 */
		protected $intLogQtypeId;
		const LogQtypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column sams_asset_log.note
		 * @var string strNote
		 */
		protected $strNote;
		const NoteDefault = null;


		/**
		 * Protected array of virtual attributes for this object (e.g. extra/other calculated and/or non-object bound
		 * columns from the run-time database query result for this object).  Used by InstantiateDbRow and
		 * GetVirtualAttribute.
		 * @var string[] $__strVirtualAttributeArray
		 */
		protected $__strVirtualAttributeArray = array();

		/**
		 * Protected internal member variable that specifies whether or not this object is Restored from the database.
		 * Used by Save() to determine if Save() should perform a db UPDATE or INSERT.
		 * @var bool __blnRestored;
		 */
		protected $__blnRestored;




		///////////////////////////////
		// PROTECTED MEMBER OBJECTS
		///////////////////////////////

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column sams_asset_log.asset_id.
		 *
		 * NOTE: Always use the Asset property getter to correctly retrieve this Asset object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Asset objAsset
		 */
		protected $objAsset;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column sams_asset_log.created_by.
		 *
		 * NOTE: Always use the CreatedByObject property getter to correctly retrieve this UserAccount object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UserAccount objCreatedByObject
		 */
		protected $objCreatedByObject;





		///////////////////////////////
		// CLASS-WIDE LOAD AND COUNT METHODS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return QDatabaseBase reference to the Database object that can query this class
		 */
		public static function GetDatabase() {
			return QApplication::$Database[1];
		}

		/**
		 * Load a SamsAssetLog from PK Info
		 * @param integer $intAssetLogId
		 * @return SamsAssetLog
		 */
		public static function Load($intAssetLogId) {
			// Use QuerySingle to Perform the Query
			return SamsAssetLog::QuerySingle(
				QQ::Equal(QQN::SamsAssetLog()->AssetLogId, $intAssetLogId)
			);
		}

		/**
		 * Load all SamsAssetLogs
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SamsAssetLog[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call SamsAssetLog::QueryArray to perform the LoadAll query
			try {
				return SamsAssetLog::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all SamsAssetLogs
		 * @return int
		 */
		public static function CountAll() {
			// Call SamsAssetLog::QueryCount to perform the CountAll query
			return SamsAssetLog::QueryCount(QQ::All());
		}




		///////////////////////////////
		// QCODO QUERY-RELATED METHODS
		///////////////////////////////

		/**
		 * Internally called method to assist with calling Qcodo Query for this class
		 * on load methods.
		 * @param QQueryBuilder &$objQueryBuilder the QueryBuilder object that will be created
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with (sending in null will skip the PrepareStatement step)
		 * @param boolean $blnCountOnly only select a rowcount
		 * @return string the query statement
		 */
		protected static function BuildQueryStatement(&$objQueryBuilder, QQCondition $objConditions, $objOptionalClauses, $mixParameterArray, $blnCountOnly) {
			// Get the Database Object for this Class
			$objDatabase = SamsAssetLog::GetDatabase();

			// Create/Build out the QueryBuilder object with SamsAssetLog-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'sams_asset_log');
			SamsAssetLog::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('sams_asset_log');

			// Set "CountOnly" option (if applicable)
			if ($blnCountOnly)
				$objQueryBuilder->SetCountOnlyFlag();

			// Apply Any Conditions
			if ($objConditions)
				try {
					$objConditions->UpdateQueryBuilder($objQueryBuilder);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

			// Iterate through all the Optional Clauses (if any) and perform accordingly
			if ($objOptionalClauses) {
				if ($objOptionalClauses instanceof QQClause)
					$objOptionalClauses->UpdateQueryBuilder($objQueryBuilder);
				else if (is_array($objOptionalClauses))
					foreach ($objOptionalClauses as $objClause)
						$objClause->UpdateQueryBuilder($objQueryBuilder);
				else
					throw new QCallerException('Optional Clauses must be a QQClause object or an array of QQClause objects');
			}

			// Get the SQL Statement
			$strQuery = $objQueryBuilder->GetStatement();

			// Prepare the Statement with the Query Parameters (if applicable)
			if ($mixParameterArray) {
				if (is_array($mixParameterArray)) {
					if (count($mixParameterArray))
						$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

					// Ensure that there are no other Unresolved Named Parameters
					if (strpos($strQuery, chr(QQNamedValue::DelimiterCode) . '{') !== false)
						throw new QCallerException('Unresolved named parameters in the query');
				} else
					throw new QCallerException('Parameter Array must be an array of name-value parameter pairs');
			}

			// Return the Objects
			return $strQuery;
		}

		/**
		 * Static Qcodo Query method to query for a single SamsAssetLog object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SamsAssetLog the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SamsAssetLog::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new SamsAssetLog object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = SamsAssetLog::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) $objToReturn[] = $objItem;
				}

				if (count($objToReturn)) {
					// Since we only want the object to return, lets return the object and not the array.
					return $objToReturn[0];
				} else {
					return null;
				}
			} else {
				// No expands just return the first row
				$objDbRow = $objDbResult->GetNextRow();
				if (is_null($objDbRow)) return null;
				return SamsAssetLog::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of SamsAssetLog objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return SamsAssetLog[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SamsAssetLog::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return SamsAssetLog::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo query method to issue a query and get a cursor to progressively fetch its results.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return QDatabaseResultBase the cursor resource instance
		 */
		public static function QueryCursor(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the query statement
			try {
				$strQuery = SamsAssetLog::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
		
			// Return the results cursor
			$objDbResult->QueryBuilder = $objQueryBuilder;
			return $objDbResult;
		}

		/**
		 * Static Qcodo Query method to query for a count of SamsAssetLog objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = SamsAssetLog::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and return the row_count
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Figure out if the query is using GroupBy
			$blnGrouped = false;

			if ($objOptionalClauses) foreach ($objOptionalClauses as $objClause) {
				if ($objClause instanceof QQGroupBy) {
					$blnGrouped = true;
					break;
				}
			}

			if ($blnGrouped)
				// Groups in this query - return the count of Groups (which is the count of all rows)
				return $objDbResult->CountRows();
			else {
				// No Groups - return the sql-calculated count(*) value
				$strDbRow = $objDbResult->FetchRow();
				return QType::Cast($strDbRow[0], QType::Integer);
			}
		}

/*		public static function QueryArrayCached($strConditions, $mixParameterArray = null) {
			// Get the Database Object for this Class
			$objDatabase = SamsAssetLog::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'sams_asset_log_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with SamsAssetLog-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				SamsAssetLog::GetSelectFields($objQueryBuilder);
				SamsAssetLog::GetFromFields($objQueryBuilder);

				// Ensure the Passed-in Conditions is a string
				try {
					$strConditions = QType::Cast($strConditions, QType::String);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

				// Create the Conditions object, and apply it
				$objConditions = eval('return ' . $strConditions . ';');

				// Apply Any Conditions
				if ($objConditions)
					$objConditions->UpdateQueryBuilder($objQueryBuilder);

				// Get the SQL Statement
				$strQuery = $objQueryBuilder->GetStatement();

				// Save the SQL Statement in the Cache
				$objCache->SaveData($strQuery);
			}

			// Prepare the Statement with the Parameters
			if ($mixParameterArray)
				$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objDatabase->Query($strQuery);
			return SamsAssetLog::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this SamsAssetLog
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'sams_asset_log';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'asset_log_id', $strAliasPrefix . 'asset_log_id');
			$objBuilder->AddSelectItem($strTableName, 'asset_id', $strAliasPrefix . 'asset_id');
			$objBuilder->AddSelectItem($strTableName, 'created_by', $strAliasPrefix . 'created_by');
			$objBuilder->AddSelectItem($strTableName, 'creation_date', $strAliasPrefix . 'creation_date');
			$objBuilder->AddSelectItem($strTableName, 'log_qtype_id', $strAliasPrefix . 'log_qtype_id');
			$objBuilder->AddSelectItem($strTableName, 'note', $strAliasPrefix . 'note');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a SamsAssetLog from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this SamsAssetLog::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return SamsAssetLog
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the SamsAssetLog object
			$objToReturn = new SamsAssetLog();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'asset_log_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'asset_log_id'] : $strAliasPrefix . 'asset_log_id';
			$objToReturn->intAssetLogId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'asset_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'asset_id'] : $strAliasPrefix . 'asset_id';
			$objToReturn->intAssetId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'created_by', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'created_by'] : $strAliasPrefix . 'created_by';
			$objToReturn->intCreatedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'creation_date', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'creation_date'] : $strAliasPrefix . 'creation_date';
			$objToReturn->dttCreationDate = $objDbRow->GetColumn($strAliasName, 'DateTime');
			$strAliasName = array_key_exists($strAliasPrefix . 'log_qtype_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'log_qtype_id'] : $strAliasPrefix . 'log_qtype_id';
			$objToReturn->intLogQtypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'note', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'note'] : $strAliasPrefix . 'note';
			$objToReturn->strNote = $objDbRow->GetColumn($strAliasName, 'Blob');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'sams_asset_log__';

			// Check for Asset Early Binding
			$strAlias = $strAliasPrefix . 'asset_id__asset_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objAsset = Asset::InstantiateDbRow($objDbRow, $strAliasPrefix . 'asset_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for CreatedByObject Early Binding
			$strAlias = $strAliasPrefix . 'created_by__user_account_id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCreatedByObject = UserAccount::InstantiateDbRow($objDbRow, $strAliasPrefix . 'created_by__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of SamsAssetLogs from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return SamsAssetLog[]
		 */
		public static function InstantiateDbResult(QDatabaseResultBase $objDbResult, $strExpandAsArrayNodes = null, $strColumnAliasArray = null) {
			$objToReturn = array();
			
			if (!$strColumnAliasArray)
				$strColumnAliasArray = array();

			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;

			// Load up the return array with each row
			if ($strExpandAsArrayNodes) {
				$objLastRowItem = null;
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = SamsAssetLog::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = SamsAssetLog::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single SamsAssetLog object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return SamsAssetLog next row resulting from the query
		 */
		public static function InstantiateCursor(QDatabaseResultBase $objDbResult) {
			// If blank resultset, then return empty result
			if (!$objDbResult) return null;

			// If empty resultset, then return empty result
			$objDbRow = $objDbResult->GetNextRow();
			if (!$objDbRow) return null;

			// We need the Column Aliases
			$strColumnAliasArray = $objDbResult->QueryBuilder->ColumnAliasArray;
			if (!$strColumnAliasArray) $strColumnAliasArray = array();

			// Pull Expansions (if applicable)
			$strExpandAsArrayNodes = $objDbResult->QueryBuilder->ExpandAsArrayNodes;

			// Load up the return result with a row and return it
			return SamsAssetLog::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single SamsAssetLog object,
		 * by AssetLogId Index(es)
		 * @param integer $intAssetLogId
		 * @return SamsAssetLog
		*/
		public static function LoadByAssetLogId($intAssetLogId, $objOptionalClauses = null) {
			return SamsAssetLog::QuerySingle(
				QQ::Equal(QQN::SamsAssetLog()->AssetLogId, $intAssetLogId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of SamsAssetLog objects,
		 * by AssetId Index(es)
		 * @param integer $intAssetId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SamsAssetLog[]
		*/
		public static function LoadArrayByAssetId($intAssetId, $objOptionalClauses = null) {
			// Call SamsAssetLog::QueryArray to perform the LoadArrayByAssetId query
			try {
				return SamsAssetLog::QueryArray(
					QQ::Equal(QQN::SamsAssetLog()->AssetId, $intAssetId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SamsAssetLogs
		 * by AssetId Index(es)
		 * @param integer $intAssetId
		 * @return int
		*/
		public static function CountByAssetId($intAssetId, $objOptionalClauses = null) {
			// Call SamsAssetLog::QueryCount to perform the CountByAssetId query
			return SamsAssetLog::QueryCount(
				QQ::Equal(QQN::SamsAssetLog()->AssetId, $intAssetId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of SamsAssetLog objects,
		 * by LogQtypeId Index(es)
		 * @param integer $intLogQtypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SamsAssetLog[]
		*/
		public static function LoadArrayByLogQtypeId($intLogQtypeId, $objOptionalClauses = null) {
			// Call SamsAssetLog::QueryArray to perform the LoadArrayByLogQtypeId query
			try {
				return SamsAssetLog::QueryArray(
					QQ::Equal(QQN::SamsAssetLog()->LogQtypeId, $intLogQtypeId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SamsAssetLogs
		 * by LogQtypeId Index(es)
		 * @param integer $intLogQtypeId
		 * @return int
		*/
		public static function CountByLogQtypeId($intLogQtypeId, $objOptionalClauses = null) {
			// Call SamsAssetLog::QueryCount to perform the CountByLogQtypeId query
			return SamsAssetLog::QueryCount(
				QQ::Equal(QQN::SamsAssetLog()->LogQtypeId, $intLogQtypeId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of SamsAssetLog objects,
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SamsAssetLog[]
		*/
		public static function LoadArrayByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call SamsAssetLog::QueryArray to perform the LoadArrayByCreatedBy query
			try {
				return SamsAssetLog::QueryArray(
					QQ::Equal(QQN::SamsAssetLog()->CreatedBy, $intCreatedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count SamsAssetLogs
		 * by CreatedBy Index(es)
		 * @param integer $intCreatedBy
		 * @return int
		*/
		public static function CountByCreatedBy($intCreatedBy, $objOptionalClauses = null) {
			// Call SamsAssetLog::QueryCount to perform the CountByCreatedBy query
			return SamsAssetLog::QueryCount(
				QQ::Equal(QQN::SamsAssetLog()->CreatedBy, $intCreatedBy)
			, $objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this SamsAssetLog
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = SamsAssetLog::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `sams_asset_log` (
							`asset_id`,
							`created_by`,
							`creation_date`,
							`log_qtype_id`,
							`note`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intAssetId) . ',
							' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							' . $objDatabase->SqlVariable($this->intLogQtypeId) . ',
							' . $objDatabase->SqlVariable($this->strNote) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intAssetLogId = $objDatabase->InsertId('sams_asset_log', 'asset_log_id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`sams_asset_log`
						SET
							`asset_id` = ' . $objDatabase->SqlVariable($this->intAssetId) . ',
							`created_by` = ' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
							`creation_date` = ' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
							`log_qtype_id` = ' . $objDatabase->SqlVariable($this->intLogQtypeId) . ',
							`note` = ' . $objDatabase->SqlVariable($this->strNote) . '
						WHERE
							`asset_log_id` = ' . $objDatabase->SqlVariable($this->intAssetLogId) . '
					');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('UPDATE');
				}

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this SamsAssetLog
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intAssetLogId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this SamsAssetLog with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = SamsAssetLog::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sams_asset_log`
				WHERE
					`asset_log_id` = ' . $objDatabase->SqlVariable($this->intAssetLogId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all SamsAssetLogs
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = SamsAssetLog::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`sams_asset_log`');
		}

		/**
		 * Truncate sams_asset_log table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = SamsAssetLog::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `sams_asset_log`');
		}

		/**
		 * Reload this SamsAssetLog from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved SamsAssetLog object.');

			// Reload the Object
			$objReloaded = SamsAssetLog::Load($this->intAssetLogId);

			// Update $this's local variables to match
			$this->AssetId = $objReloaded->AssetId;
			$this->CreatedBy = $objReloaded->CreatedBy;
			$this->dttCreationDate = $objReloaded->dttCreationDate;
			$this->LogQtypeId = $objReloaded->LogQtypeId;
			$this->strNote = $objReloaded->strNote;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = SamsAssetLog::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `sams_asset_log` (
					`asset_log_id`,
					`asset_id`,
					`created_by`,
					`creation_date`,
					`log_qtype_id`,
					`note`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intAssetLogId) . ',
					' . $objDatabase->SqlVariable($this->intAssetId) . ',
					' . $objDatabase->SqlVariable($this->intCreatedBy) . ',
					' . $objDatabase->SqlVariable($this->dttCreationDate) . ',
					' . $objDatabase->SqlVariable($this->intLogQtypeId) . ',
					' . $objDatabase->SqlVariable($this->strNote) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intAssetLogId
		 * @return SamsAssetLog[]
		 */
		public static function GetJournalForId($intAssetLogId) {
			$objDatabase = SamsAssetLog::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM sams_asset_log WHERE asset_log_id = ' .
				$objDatabase->SqlVariable($intAssetLogId) . ' ORDER BY __sys_date');

			return SamsAssetLog::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return SamsAssetLog[]
		 */
		public function GetJournal() {
			return SamsAssetLog::GetJournalForId($this->intAssetLogId);
		}




		////////////////////
		// PUBLIC OVERRIDERS
		////////////////////

				/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'AssetLogId':
					// Gets the value for intAssetLogId (Read-Only PK)
					// @return integer
					return $this->intAssetLogId;

				case 'AssetId':
					// Gets the value for intAssetId (Not Null)
					// @return integer
					return $this->intAssetId;

				case 'CreatedBy':
					// Gets the value for intCreatedBy (Not Null)
					// @return integer
					return $this->intCreatedBy;

				case 'CreationDate':
					// Gets the value for dttCreationDate 
					// @return QDateTime
					return $this->dttCreationDate;

				case 'LogQtypeId':
					// Gets the value for intLogQtypeId (Not Null)
					// @return integer
					return $this->intLogQtypeId;

				case 'Note':
					// Gets the value for strNote (Not Null)
					// @return string
					return $this->strNote;


				///////////////////
				// Member Objects
				///////////////////
				case 'Asset':
					// Gets the value for the Asset object referenced by intAssetId (Not Null)
					// @return Asset
					try {
						if ((!$this->objAsset) && (!is_null($this->intAssetId)))
							$this->objAsset = Asset::Load($this->intAssetId);
						return $this->objAsset;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedByObject':
					// Gets the value for the UserAccount object referenced by intCreatedBy (Not Null)
					// @return UserAccount
					try {
						if ((!$this->objCreatedByObject) && (!is_null($this->intCreatedBy)))
							$this->objCreatedByObject = UserAccount::Load($this->intCreatedBy);
						return $this->objCreatedByObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////


				case '__Restored':
					return $this->__blnRestored;

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
				case 'AssetId':
					// Sets the value for intAssetId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objAsset = null;
						return ($this->intAssetId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreatedBy':
					// Sets the value for intCreatedBy (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						$this->objCreatedByObject = null;
						return ($this->intCreatedBy = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CreationDate':
					// Sets the value for dttCreationDate 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttCreationDate = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LogQtypeId':
					// Sets the value for intLogQtypeId (Not Null)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intLogQtypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Note':
					// Sets the value for strNote (Not Null)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strNote = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Asset':
					// Sets the value for the Asset object referenced by intAssetId (Not Null)
					// @param Asset $mixValue
					// @return Asset
					if (is_null($mixValue)) {
						$this->intAssetId = null;
						$this->objAsset = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Asset object
						try {
							$mixValue = QType::Cast($mixValue, 'Asset');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Asset object
						if (is_null($mixValue->AssetId))
							throw new QCallerException('Unable to set an unsaved Asset for this SamsAssetLog');

						// Update Local Member Variables
						$this->objAsset = $mixValue;
						$this->intAssetId = $mixValue->AssetId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'CreatedByObject':
					// Sets the value for the UserAccount object referenced by intCreatedBy (Not Null)
					// @param UserAccount $mixValue
					// @return UserAccount
					if (is_null($mixValue)) {
						$this->intCreatedBy = null;
						$this->objCreatedByObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a UserAccount object
						try {
							$mixValue = QType::Cast($mixValue, 'UserAccount');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED UserAccount object
						if (is_null($mixValue->UserAccountId))
							throw new QCallerException('Unable to set an unsaved CreatedByObject for this SamsAssetLog');

						// Update Local Member Variables
						$this->objCreatedByObject = $mixValue;
						$this->intCreatedBy = $mixValue->UserAccountId;

						// Return $mixValue
						return $mixValue;
					}
					break;

				default:
					try {
						return parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Lookup a VirtualAttribute value (if applicable).  Returns NULL if none found.
		 * @param string $strName
		 * @return string
		 */
		public function GetVirtualAttribute($strName) {
			if (array_key_exists($strName, $this->__strVirtualAttributeArray))
				return $this->__strVirtualAttributeArray[$strName];
			return null;
		}



		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="SamsAssetLog"><sequence>';
			$strToReturn .= '<element name="AssetLogId" type="xsd:int"/>';
			$strToReturn .= '<element name="Asset" type="xsd1:Asset"/>';
			$strToReturn .= '<element name="CreatedByObject" type="xsd1:UserAccount"/>';
			$strToReturn .= '<element name="CreationDate" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="LogQtypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="Note" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('SamsAssetLog', $strComplexTypeArray)) {
				$strComplexTypeArray['SamsAssetLog'] = SamsAssetLog::GetSoapComplexTypeXml();
				Asset::AlterSoapComplexTypeArray($strComplexTypeArray);
				UserAccount::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, SamsAssetLog::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new SamsAssetLog();
			if (property_exists($objSoapObject, 'AssetLogId'))
				$objToReturn->intAssetLogId = $objSoapObject->AssetLogId;
			if ((property_exists($objSoapObject, 'Asset')) &&
				($objSoapObject->Asset))
				$objToReturn->Asset = Asset::GetObjectFromSoapObject($objSoapObject->Asset);
			if ((property_exists($objSoapObject, 'CreatedByObject')) &&
				($objSoapObject->CreatedByObject))
				$objToReturn->CreatedByObject = UserAccount::GetObjectFromSoapObject($objSoapObject->CreatedByObject);
			if (property_exists($objSoapObject, 'CreationDate'))
				$objToReturn->dttCreationDate = new QDateTime($objSoapObject->CreationDate);
			if (property_exists($objSoapObject, 'LogQtypeId'))
				$objToReturn->intLogQtypeId = $objSoapObject->LogQtypeId;
			if (property_exists($objSoapObject, 'Note'))
				$objToReturn->strNote = $objSoapObject->Note;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, SamsAssetLog::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objAsset)
				$objObject->objAsset = Asset::GetSoapObjectFromObject($objObject->objAsset, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intAssetId = null;
			if ($objObject->objCreatedByObject)
				$objObject->objCreatedByObject = UserAccount::GetSoapObjectFromObject($objObject->objCreatedByObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCreatedBy = null;
			if ($objObject->dttCreationDate)
				$objObject->dttCreationDate = $objObject->dttCreationDate->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




		////////////////////////////////////////////////////////
		// METHODS for MANUAL QUERY SUPPORT (aka Beta 2 Queries)
		////////////////////////////////////////////////////////

		/**
		 * Internally called method to assist with SQL Query options/preferences for single row loaders.
		 * Any Load (single row) method can use this method to get the Database object.
		 * @param string $objDatabase reference to the Database object to be queried
		 */
		protected static function QueryHelper(&$objDatabase) {
			// Get the Database
			$objDatabase = QApplication::$Database[1];
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
		 * @param string $strExpandSelect reference to the Expand Select to be used in the SQL
		 * @param string $strExpandFrom reference to the Expand From to be used in the SQL
		 * @param array $objExpansionMap map of referenced columns to be immediately expanded via early-binding
		 * @param string $objDatabase reference to the Database object to be queried
		 */
		protected static function ArrayQueryHelper(&$strOrderBy, $strLimit, &$strLimitPrefix, &$strLimitSuffix, &$strExpandSelect, &$strExpandFrom, $objExpansionMap, &$objDatabase) {
			// Get the Database
			$objDatabase = QApplication::$Database[1];

			// Setup OrderBy and Limit Information (if applicable)
			$strOrderBy = $objDatabase->SqlSortByVariable($strOrderBy);
			$strLimitPrefix = $objDatabase->SqlLimitVariablePrefix($strLimit);
			$strLimitSuffix = $objDatabase->SqlLimitVariableSuffix($strLimit);

			// Setup QueryExpansion (if applicable)
			if ($objExpansionMap) {
				$objQueryExpansion = new QQueryExpansion('SamsAssetLog', 'sams_asset_log', $objExpansionMap);
				$strExpandSelect = $objQueryExpansion->GetSelectSql();
				$strExpandFrom = $objQueryExpansion->GetFromSql();
			} else {
				$strExpandSelect = null;
				$strExpandFrom = null;
			}
		}



		/**
		 * Internally called method to assist with early binding of objects
		 * on load methods.  Can only early-bind references that this class owns in the database.
		 * @param string $strParentAlias the alias of the parent (if any)
		 * @param string $strAlias the alias of this object
		 * @param array $objExpansionMap map of referenced columns to be immediately expanded via early-binding
		 * @param QueryExpansion an already instantiated QueryExpansion object (used as a utility object to assist with object expansion)
		 */
		public static function ExpandQuery($strParentAlias, $strAlias, $objExpansionMap, QQueryExpansion $objQueryExpansion) {
			if ($strAlias) {
				$objQueryExpansion->AddFromItem(sprintf('LEFT JOIN `sams_asset_log` AS `%s__%s` ON `%s`.`%s` = `%s__%s`.`asset_log_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`asset_log_id` AS `%s__%s__asset_log_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`asset_id` AS `%s__%s__asset_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`created_by` AS `%s__%s__created_by`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`creation_date` AS `%s__%s__creation_date`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`log_qtype_id` AS `%s__%s__log_qtype_id`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));
				$objQueryExpansion->AddSelectItem(sprintf('`%s__%s`.`note` AS `%s__%s__note`', $strParentAlias, $strAlias, $strParentAlias, $strAlias));

				$strParentAlias = $strParentAlias . '__' . $strAlias;
			}

			if (is_array($objExpansionMap))
				foreach ($objExpansionMap as $strKey=>$objValue) {
					switch ($strKey) {
						case 'asset_id':
							try {
								Asset::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						case 'created_by':
							try {
								UserAccount::ExpandQuery($strParentAlias, $strKey, $objValue, $objQueryExpansion);
								break;
							} catch (QCallerException $objExc) {
								$objExc->IncrementOffset();
								throw $objExc;
							}
						default:
							throw new QCallerException(sprintf('Unknown Object to Expand in %s: %s', $strParentAlias, $strKey));
					}
				}
		}




		////////////////////////////////////////
		// COLUMN CONSTANTS for OBJECT EXPANSION
		////////////////////////////////////////
		const ExpandAsset = 'asset_id';
		const ExpandCreatedByObject = 'created_by';

	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $AssetLogId
	 * @property-read QQNode $AssetId
	 * @property-read QQNodeAsset $Asset
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $LogQtypeId
	 * @property-read QQNode $Note
	 */
	class QQNodeSamsAssetLog extends QQNode {
		protected $strTableName = 'sams_asset_log';
		protected $strPrimaryKey = 'asset_log_id';
		protected $strClassName = 'SamsAssetLog';
		public function __get($strName) {
			switch ($strName) {
				case 'AssetLogId':
					return new QQNode('asset_log_id', 'AssetLogId', 'integer', $this);
				case 'AssetId':
					return new QQNode('asset_id', 'AssetId', 'integer', $this);
				case 'Asset':
					return new QQNodeAsset('asset_id', 'Asset', 'integer', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'CreatedByObject':
					return new QQNodeUserAccount('created_by', 'CreatedByObject', 'integer', $this);
				case 'CreationDate':
					return new QQNode('creation_date', 'CreationDate', 'QDateTime', $this);
				case 'LogQtypeId':
					return new QQNode('log_qtype_id', 'LogQtypeId', 'integer', $this);
				case 'Note':
					return new QQNode('note', 'Note', 'string', $this);

				case '_PrimaryKeyNode':
					return new QQNode('asset_log_id', 'AssetLogId', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}
	
	/**
	 * @property-read QQNode $AssetLogId
	 * @property-read QQNode $AssetId
	 * @property-read QQNodeAsset $Asset
	 * @property-read QQNode $CreatedBy
	 * @property-read QQNodeUserAccount $CreatedByObject
	 * @property-read QQNode $CreationDate
	 * @property-read QQNode $LogQtypeId
	 * @property-read QQNode $Note
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeSamsAssetLog extends QQReverseReferenceNode {
		protected $strTableName = 'sams_asset_log';
		protected $strPrimaryKey = 'asset_log_id';
		protected $strClassName = 'SamsAssetLog';
		public function __get($strName) {
			switch ($strName) {
				case 'AssetLogId':
					return new QQNode('asset_log_id', 'AssetLogId', 'integer', $this);
				case 'AssetId':
					return new QQNode('asset_id', 'AssetId', 'integer', $this);
				case 'Asset':
					return new QQNodeAsset('asset_id', 'Asset', 'integer', $this);
				case 'CreatedBy':
					return new QQNode('created_by', 'CreatedBy', 'integer', $this);
				case 'CreatedByObject':
					return new QQNodeUserAccount('created_by', 'CreatedByObject', 'integer', $this);
				case 'CreationDate':
					return new QQNode('creation_date', 'CreationDate', 'QDateTime', $this);
				case 'LogQtypeId':
					return new QQNode('log_qtype_id', 'LogQtypeId', 'integer', $this);
				case 'Note':
					return new QQNode('note', 'Note', 'string', $this);

				case '_PrimaryKeyNode':
					return new QQNode('asset_log_id', 'AssetLogId', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

?>