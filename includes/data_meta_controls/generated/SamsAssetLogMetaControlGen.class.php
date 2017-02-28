<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the SamsAssetLog class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single SamsAssetLog object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a SamsAssetLogMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read SamsAssetLog $SamsAssetLog the actual SamsAssetLog data class being edited
	 * property QLabel $AssetLogIdControl
	 * property-read QLabel $AssetLogIdLabel
	 * property QListBox $AssetIdControl
	 * property-read QLabel $AssetIdLabel
	 * property QListBox $CreatedByControl
	 * property-read QLabel $CreatedByLabel
	 * property QDateTimePicker $CreationDateControl
	 * property-read QLabel $CreationDateLabel
	 * property QListBox $LogQtypeIdControl
	 * property-read QLabel $LogQtypeIdLabel
	 * property QTextBox $NoteControl
	 * property-read QLabel $NoteLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class SamsAssetLogMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var SamsAssetLog objSamsAssetLog
		 * @access protected
		 */
		protected $objSamsAssetLog;

		/**
		 * @var QForm|QControl objParentObject
		 * @access protected
		 */
		protected $objParentObject;

		/**
		 * @var string  strTitleVerb
		 * @access protected
		 */
		protected $strTitleVerb;

		/**
		 * @var boolean blnEditMode
		 * @access protected
		 */
		protected $blnEditMode;

		// Controls that allow the editing of SamsAssetLog's individual data fields
        /**
         * @var QLabel lblAssetLogId;
         * @access protected
         */
		protected $lblAssetLogId;

        /**
         * @var QListBox lstAsset;
         * @access protected
         */
		protected $lstAsset;

        /**
         * @var QListBox lstCreatedByObject;
         * @access protected
         */
		protected $lstCreatedByObject;

        /**
         * @var QDateTimePicker calCreationDate;
         * @access protected
         */
		protected $calCreationDate;

        /**
         * @var QListBox lstLogQtype;
         * @access protected
         */
		protected $lstLogQtype;

        /**
         * @var QTextBox txtNote;
         * @access protected
         */
		protected $txtNote;


		// Controls that allow the viewing of SamsAssetLog's individual data fields
        /**
         * @var QLabel lblAssetId
         * @access protected
         */
		protected $lblAssetId;

        /**
         * @var QLabel lblCreatedBy
         * @access protected
         */
		protected $lblCreatedBy;

        /**
         * @var QLabel lblCreationDate
         * @access protected
         */
		protected $lblCreationDate;

        /**
         * @var QLabel lblLogQtypeId
         * @access protected
         */
		protected $lblLogQtypeId;

        /**
         * @var QLabel lblNote
         * @access protected
         */
		protected $lblNote;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * SamsAssetLogMetaControl to edit a single SamsAssetLog object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single SamsAssetLog object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SamsAssetLogMetaControl
		 * @param SamsAssetLog $objSamsAssetLog new or existing SamsAssetLog object
		 */
		 public function __construct($objParentObject, SamsAssetLog $objSamsAssetLog) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this SamsAssetLogMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked SamsAssetLog object
			$this->objSamsAssetLog = $objSamsAssetLog;

			// Figure out if we're Editing or Creating New
			if ($this->objSamsAssetLog->__Restored) {
				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		 }

		/**
		 * Static Helper Method to Create using PK arguments
		 * You must pass in the PK arguments on an object to load, or leave it blank to create a new one.
		 * If you want to load via QueryString or PathInfo, use the CreateFromQueryString or CreateFromPathInfo
		 * static helper methods.  Finally, specify a CreateType to define whether or not we are only allowed to 
		 * edit, or if we are also allowed to create a new one, etc.
		 * 
		 * @param mixed $objParentObject QForm or QPanel which will be using this SamsAssetLogMetaControl
		 * @param integer $intAssetLogId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing SamsAssetLog object creation - defaults to CreateOrEdit
 		 * @return SamsAssetLogMetaControl
		 */
		public static function Create($objParentObject, $intAssetLogId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intAssetLogId)) {
				$objSamsAssetLog = SamsAssetLog::Load($intAssetLogId);

				// SamsAssetLog was found -- return it!
				if ($objSamsAssetLog)
					return new SamsAssetLogMetaControl($objParentObject, $objSamsAssetLog);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a SamsAssetLog object with PK arguments: ' . $intAssetLogId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new SamsAssetLogMetaControl($objParentObject, new SamsAssetLog());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SamsAssetLogMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing SamsAssetLog object creation - defaults to CreateOrEdit
		 * @return SamsAssetLogMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAssetLogId = QApplication::PathInfo(0);
			return SamsAssetLogMetaControl::Create($objParentObject, $intAssetLogId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SamsAssetLogMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing SamsAssetLog object creation - defaults to CreateOrEdit
		 * @return SamsAssetLogMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intAssetLogId = QApplication::QueryString('intAssetLogId');
			return SamsAssetLogMetaControl::Create($objParentObject, $intAssetLogId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblAssetLogId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAssetLogId_Create($strControlId = null) {
			$this->lblAssetLogId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAssetLogId->Name = QApplication::Translate('Asset Log Id');
			if ($this->blnEditMode)
				$this->lblAssetLogId->Text = $this->objSamsAssetLog->AssetLogId;
			else
				$this->lblAssetLogId->Text = 'N/A';
			return $this->lblAssetLogId;
		}

		/**
		 * Create and setup QListBox lstAsset
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstAsset_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstAsset = new QListBox($this->objParentObject, $strControlId);
			$this->lstAsset->Name = QApplication::Translate('Asset');
			$this->lstAsset->Required = true;
			if (!$this->blnEditMode)
				$this->lstAsset->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objAssetCursor = Asset::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objAsset = Asset::InstantiateCursor($objAssetCursor)) {
				$objListItem = new QListItem($objAsset->__toString(), $objAsset->AssetId);
				if (($this->objSamsAssetLog->Asset) && ($this->objSamsAssetLog->Asset->AssetId == $objAsset->AssetId))
					$objListItem->Selected = true;
				$this->lstAsset->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstAsset;
		}

		/**
		 * Create and setup QLabel lblAssetId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAssetId_Create($strControlId = null) {
			$this->lblAssetId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAssetId->Name = QApplication::Translate('Asset');
			$this->lblAssetId->Text = ($this->objSamsAssetLog->Asset) ? $this->objSamsAssetLog->Asset->__toString() : null;
			$this->lblAssetId->Required = true;
			return $this->lblAssetId;
		}

		/**
		 * Create and setup QListBox lstCreatedByObject
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCreatedByObject_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCreatedByObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstCreatedByObject->Name = QApplication::Translate('Created By Object');
			$this->lstCreatedByObject->Required = true;
			if (!$this->blnEditMode)
				$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCreatedByObjectCursor = UserAccount::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCreatedByObject = UserAccount::InstantiateCursor($objCreatedByObjectCursor)) {
				$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
				if (($this->objSamsAssetLog->CreatedByObject) && ($this->objSamsAssetLog->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
					$objListItem->Selected = true;
				$this->lstCreatedByObject->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstCreatedByObject;
		}

		/**
		 * Create and setup QLabel lblCreatedBy
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCreatedBy_Create($strControlId = null) {
			$this->lblCreatedBy = new QLabel($this->objParentObject, $strControlId);
			$this->lblCreatedBy->Name = QApplication::Translate('Created By Object');
			$this->lblCreatedBy->Text = ($this->objSamsAssetLog->CreatedByObject) ? $this->objSamsAssetLog->CreatedByObject->__toString() : null;
			$this->lblCreatedBy->Required = true;
			return $this->lblCreatedBy;
		}

		/**
		 * Create and setup QDateTimePicker calCreationDate
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calCreationDate_Create($strControlId = null) {
			$this->calCreationDate = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calCreationDate->Name = QApplication::Translate('Creation Date');
			$this->calCreationDate->DateTime = $this->objSamsAssetLog->CreationDate;
			$this->calCreationDate->DateTimePickerType = QDateTimePickerType::DateTime;
			return $this->calCreationDate;
		}

		/**
		 * Create and setup QLabel lblCreationDate
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblCreationDate_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblCreationDate = new QLabel($this->objParentObject, $strControlId);
			$this->lblCreationDate->Name = QApplication::Translate('Creation Date');
			$this->strCreationDateDateTimeFormat = $strDateTimeFormat;
			$this->lblCreationDate->Text = sprintf($this->objSamsAssetLog->CreationDate) ? $this->objSamsAssetLog->CreationDate->__toString($this->strCreationDateDateTimeFormat) : null;
			return $this->lblCreationDate;
		}

		protected $strCreationDateDateTimeFormat;

		/**
		 * Create and setup QListBox lstLogQtype
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstLogQtype_Create($strControlId = null) {
			$this->lstLogQtype = new QListBox($this->objParentObject, $strControlId);
			$this->lstLogQtype->Name = QApplication::Translate('Log Qtype');
			$this->lstLogQtype->Required = true;

			$this->lstLogQtype->AddItems(SamsLogQtype::$NameArray, $this->objSamsAssetLog->LogQtypeId);
			return $this->lstLogQtype;
		}

		/**
		 * Create and setup QLabel lblLogQtypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLogQtypeId_Create($strControlId = null) {
			$this->lblLogQtypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblLogQtypeId->Name = QApplication::Translate('Log Qtype');
			$this->lblLogQtypeId->Text = ($this->objSamsAssetLog->LogQtypeId) ? SamsLogQtype::$NameArray[$this->objSamsAssetLog->LogQtypeId] : null;
			$this->lblLogQtypeId->Required = true;
			return $this->lblLogQtypeId;
		}

		/**
		 * Create and setup QTextBox txtNote
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtNote_Create($strControlId = null) {
			$this->txtNote = new QTextBox($this->objParentObject, $strControlId);
			$this->txtNote->Name = QApplication::Translate('Note');
			$this->txtNote->Text = $this->objSamsAssetLog->Note;
			$this->txtNote->Required = true;
			$this->txtNote->TextMode = QTextMode::MultiLine;
			return $this->txtNote;
		}

		/**
		 * Create and setup QLabel lblNote
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblNote_Create($strControlId = null) {
			$this->lblNote = new QLabel($this->objParentObject, $strControlId);
			$this->lblNote->Name = QApplication::Translate('Note');
			$this->lblNote->Text = $this->objSamsAssetLog->Note;
			$this->lblNote->Required = true;
			return $this->lblNote;
		}



		/**
		 * Refresh this MetaControl with Data from the local SamsAssetLog object.
		 * @param boolean $blnReload reload SamsAssetLog from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objSamsAssetLog->Reload();

			if ($this->lblAssetLogId) if ($this->blnEditMode) $this->lblAssetLogId->Text = $this->objSamsAssetLog->AssetLogId;

			if ($this->lstAsset) {
					$this->lstAsset->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstAsset->AddItem(QApplication::Translate('- Select One -'), null);
				$objAssetArray = Asset::LoadAll();
				if ($objAssetArray) foreach ($objAssetArray as $objAsset) {
					$objListItem = new QListItem($objAsset->__toString(), $objAsset->AssetId);
					if (($this->objSamsAssetLog->Asset) && ($this->objSamsAssetLog->Asset->AssetId == $objAsset->AssetId))
						$objListItem->Selected = true;
					$this->lstAsset->AddItem($objListItem);
				}
			}
			if ($this->lblAssetId) $this->lblAssetId->Text = ($this->objSamsAssetLog->Asset) ? $this->objSamsAssetLog->Asset->__toString() : null;

			if ($this->lstCreatedByObject) {
					$this->lstCreatedByObject->RemoveAllItems();
				if (!$this->blnEditMode)
					$this->lstCreatedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objCreatedByObjectArray = UserAccount::LoadAll();
				if ($objCreatedByObjectArray) foreach ($objCreatedByObjectArray as $objCreatedByObject) {
					$objListItem = new QListItem($objCreatedByObject->__toString(), $objCreatedByObject->UserAccountId);
					if (($this->objSamsAssetLog->CreatedByObject) && ($this->objSamsAssetLog->CreatedByObject->UserAccountId == $objCreatedByObject->UserAccountId))
						$objListItem->Selected = true;
					$this->lstCreatedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblCreatedBy) $this->lblCreatedBy->Text = ($this->objSamsAssetLog->CreatedByObject) ? $this->objSamsAssetLog->CreatedByObject->__toString() : null;

			if ($this->calCreationDate) $this->calCreationDate->DateTime = $this->objSamsAssetLog->CreationDate;
			if ($this->lblCreationDate) $this->lblCreationDate->Text = sprintf($this->objSamsAssetLog->CreationDate) ? $this->objSamsAssetLog->__toString($this->strCreationDateDateTimeFormat) : null;

			if ($this->lstLogQtype) $this->lstLogQtype->SelectedValue = $this->objSamsAssetLog->LogQtypeId;
			if ($this->lblLogQtypeId) $this->lblLogQtypeId->Text = ($this->objSamsAssetLog->LogQtypeId) ? SamsLogQtype::$NameArray[$this->objSamsAssetLog->LogQtypeId] : null;

			if ($this->txtNote) $this->txtNote->Text = $this->objSamsAssetLog->Note;
			if ($this->lblNote) $this->lblNote->Text = $this->objSamsAssetLog->Note;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC SAMSASSETLOG OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's SamsAssetLog instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveSamsAssetLog() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstAsset) $this->objSamsAssetLog->AssetId = $this->lstAsset->SelectedValue;
				if ($this->lstCreatedByObject) $this->objSamsAssetLog->CreatedBy = $this->lstCreatedByObject->SelectedValue;
				if ($this->calCreationDate) $this->objSamsAssetLog->CreationDate = $this->calCreationDate->DateTime;
				if ($this->lstLogQtype) $this->objSamsAssetLog->LogQtypeId = $this->lstLogQtype->SelectedValue;
				if ($this->txtNote) $this->objSamsAssetLog->Note = $this->txtNote->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the SamsAssetLog object
				$this->objSamsAssetLog->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's SamsAssetLog instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteSamsAssetLog() {
			$this->objSamsAssetLog->Delete();
		}		



		///////////////////////////////////////////////
		// PUBLIC GETTERS and SETTERS
		///////////////////////////////////////////////

		/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				// General MetaControlVariables
				case 'SamsAssetLog': return $this->objSamsAssetLog;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to SamsAssetLog fields -- will be created dynamically if not yet created
				case 'AssetLogIdControl':
					if (!$this->lblAssetLogId) return $this->lblAssetLogId_Create();
					return $this->lblAssetLogId;
				case 'AssetLogIdLabel':
					if (!$this->lblAssetLogId) return $this->lblAssetLogId_Create();
					return $this->lblAssetLogId;
				case 'AssetIdControl':
					if (!$this->lstAsset) return $this->lstAsset_Create();
					return $this->lstAsset;
				case 'AssetIdLabel':
					if (!$this->lblAssetId) return $this->lblAssetId_Create();
					return $this->lblAssetId;
				case 'CreatedByControl':
					if (!$this->lstCreatedByObject) return $this->lstCreatedByObject_Create();
					return $this->lstCreatedByObject;
				case 'CreatedByLabel':
					if (!$this->lblCreatedBy) return $this->lblCreatedBy_Create();
					return $this->lblCreatedBy;
				case 'CreationDateControl':
					if (!$this->calCreationDate) return $this->calCreationDate_Create();
					return $this->calCreationDate;
				case 'CreationDateLabel':
					if (!$this->lblCreationDate) return $this->lblCreationDate_Create();
					return $this->lblCreationDate;
				case 'LogQtypeIdControl':
					if (!$this->lstLogQtype) return $this->lstLogQtype_Create();
					return $this->lstLogQtype;
				case 'LogQtypeIdLabel':
					if (!$this->lblLogQtypeId) return $this->lblLogQtypeId_Create();
					return $this->lblLogQtypeId;
				case 'NoteControl':
					if (!$this->txtNote) return $this->txtNote_Create();
					return $this->txtNote;
				case 'NoteLabel':
					if (!$this->lblNote) return $this->lblNote_Create();
					return $this->lblNote;
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
			try {
				switch ($strName) {
					// Controls that point to SamsAssetLog fields
					case 'AssetLogIdControl':
						return ($this->lblAssetLogId = QType::Cast($mixValue, 'QControl'));
					case 'AssetIdControl':
						return ($this->lstAsset = QType::Cast($mixValue, 'QControl'));
					case 'CreatedByControl':
						return ($this->lstCreatedByObject = QType::Cast($mixValue, 'QControl'));
					case 'CreationDateControl':
						return ($this->calCreationDate = QType::Cast($mixValue, 'QControl'));
					case 'LogQtypeIdControl':
						return ($this->lstLogQtype = QType::Cast($mixValue, 'QControl'));
					case 'NoteControl':
						return ($this->txtNote = QType::Cast($mixValue, 'QControl'));
					default:
						return parent::__set($strName, $mixValue);
				}
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
	}
?>