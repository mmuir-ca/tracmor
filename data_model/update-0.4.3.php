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
	
	
	// Create sams log qtype table
	$strQuery="
    CREATE TABLE IF NOT EXISTS `sams_log_qtype` (
      `log_qtype_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `name` varchar(50) NOT NULL,
      PRIMARY KEY (`log_qtype_id`),
      UNIQUE KEY `name` (`name`),
      UNIQUE KEY `log_qtype_id` (`log_qtype_id`)) 
    ENGINE=InnoDB";
	$objDatabase->NonQuery($strQuery);
	
	// Create sams_asset_log
	
	$strQuery="
	CREATE TABLE IF NOT EXISTS `sams_asset_log` (
      `asset_log_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
      `asset_id` int(10) unsigned NOT NULL,
      `created_by` int(10) unsigned NOT NULL,
      `creation_date` datetime DEFAULT NULL,
      `log_qtype_id` int(10) unsigned NOT NULL,
      `note` text NOT NULL,
      PRIMARY KEY (`asset_log_id`),
      UNIQUE KEY `asset_log_id` (`asset_log_id`),
      KEY `asset_transaction_fkindex1` (`asset_id`),
      KEY `asset_transaction_fkindex2` (`log_qtype_id`),
      KEY `asset_transaction_fkindex3` (`created_by`))  
    ENGINE=InnoDB";
	$objDatabase->NonQuery($strQuery);
	// Insert log types into sams_log_qtype
	$strQuery="
    INSERT INTO `sams_log_qtype` (`log_qtype_id`, `name`) VALUES
      (2, 'Quick Notes'),
      (1, 'Repair Log');";
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