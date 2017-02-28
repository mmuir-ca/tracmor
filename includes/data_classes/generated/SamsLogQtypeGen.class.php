<?php
	/**
	 * The SamsLogQtype class defined here contains
	 * code for the SamsLogQtype enumerated type.  It represents
	 * the enumerated values found in the "sams_log_qtype" table
	 * in the database.
	 * 
	 * To use, you should use the SamsLogQtype subclass which
	 * extends this SamsLogQtypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the SamsLogQtype class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class SamsLogQtypeGen extends QBaseClass {
		const RepairLog = 1;
		const QuickNotes = 2;

		const MaxId = 2;

		public static $NameArray = array(
			1 => 'Repair Log',
			2 => 'Quick Notes');

		public static $TokenArray = array(
			1 => 'RepairLog',
			2 => 'QuickNotes');

		public static function ToString($intSamsLogQtypeId) {
			switch ($intSamsLogQtypeId) {
				case 1: return 'Repair Log';
				case 2: return 'Quick Notes';
				default:
					throw new QCallerException(sprintf('Invalid intSamsLogQtypeId: %s', $intSamsLogQtypeId));
			}
		}

		public static function ToToken($intSamsLogQtypeId) {
			switch ($intSamsLogQtypeId) {
				case 1: return 'RepairLog';
				case 2: return 'QuickNotes';
				default:
					throw new QCallerException(sprintf('Invalid intSamsLogQtypeId: %s', $intSamsLogQtypeId));
			}
		}

	}
?>