<?php
/*
 * This script updates a Tracmor database to version 0.4.3
 */
require_once('../includes/prepend.inc.php');

$objDatabase = QApplication::$Database[1];
// Check if this script has already been run
$objDbResult = $objDatabase->Query("SELECT `version` FROM `_version`");
$arrRecord = $objDbResult->FetchArray();
if ($arrRecord['version'] == '0.4.3') {
	echo('This script has already been run! Exiting...');
	exit;
}

// Put the following in a transaction and rollback if there are any problems
try {
	$objDatabase->TransactionBegin();
	
	
	// Add user_account.active_flag
	$strQuery = "ALTER TABLE `contact` ADD COLUMN `active_flag` BIT(1) NOT NULL DEFAULT b'0' AFTER `description`;";
	$objDatabase->NonQuery($strQuery);
	
	// Set version
	$strQuery = "UPDATE `_version` SET `version`='0.4.3';";
	$objDatabase->NonQuery($strQuery);
	
	$objDatabase->TransactionCommit();
	echo('Update successful!');
	
} catch (Exception $objExc) {
	// Something went wrong
	$objDatabase->TransactionRollback();
	echo('Update failed!');
}