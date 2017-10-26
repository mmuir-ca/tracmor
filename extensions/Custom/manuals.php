<?php
/**
 *
 */

require_once ('../../includes/prepend.inc.php');
QApplication::Authenticate( 5 );

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set ( 'America/Vancouver' );

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');
	
	/** Include PHPExcel */
require_once dirname(__FILE__) . '../../Classes/PHPExcel.php';

function attachmentSort($a, $b){

	$aM = ""; $aC = ""; $bM = ""; $bC = "";
	switch($a->EntityQtypeId){
		case 1:
			$asset = Asset::Load($a->EntityId);
			if ($asset){
				$assetModel = AssetModel::Load($asset->AssetModelId);
				$aM = Manufacturer::Load($assetModel->ManufacturerId)->ShortDescription;
				$aC = Category::Load($assetModel->CategoryId)->ShortDescription;
			}
			break;
		case 2:
			$inventory = InventoryModel::Load($a->EntityId);
			if ($inventory){
				$aM = Manufacturer::Load($inventory->ManufacturerId)->ShortDescription;
				$aC = Category::Load($inventory->CategoryId)->ShortDescription;
			}
			break;
		case 4:
			$assetModelA = AssetModel::Load($a->EntityId);
			if ($assetModelA){
				$aM = Manufacturer::Load($assetModelA->ManufacturerId)->ShortDescription;
				$aC = Category::Load($assetModelA->CategoryId)->ShortDescription;
			}
			break;
		default:
			return -1;
	}
	switch($b->EntityQtypeId){
		case 1:
			$assetB = Asset::Load($b->EntityId);
			if ($assetB){
				$assetBModel = AssetModel::Load($assetB->AssetModelId);
				$bM = Manufacturer::Load($assetBModel->ManufacturerId)->ShortDescription;
				$bC = Category::Load($assetBModel->CategoryId)->ShortDescription;
			}
			break;
		case 2:
			$inventoryB = InventoryModel::Load($b->EntityId);
			if ($inventoryB){
				$bM = Manufacturer::Load($inventoryB->ManufacturerId)->ShortDescription;
				$bC = Category::Load($inventoryB->CategoryId)->ShortDescription;
			}
			break;
		case 4:
			$assetModelB = AssetModel::Load($b->EntityId);
			if ($assetModelB) {
				$bM = Manufacturer::Load($assetModelB->ManufacturerId)->ShortDescription;
				$bC = Category::Load($assetModelB->CategoryId)->ShortDescription;
			}
			break;
		default:
			return -1;
	}
	if ($aM < $bM) {
		return -1;
	}
	if ($aM > $bM) {
		return 1;
	}
	if ($aC < $bC) {
		return -1;
	}
	if ($aC > $bC) {
		return 1;
	}
	return 0;
}

	// Create new PHPExcel object
$objPHPExcel = new PHPExcel();
$objAttachments = Attachment::LoadAll(QQ::Clause(QQ::OrderBy(QQN::Attachment()->EntityId, true)));
	
	// Set document properties
$objPHPExcel->getProperties()->setCreator("PHPOffice")
	->setLastModifiedBy("SAMS")
	->setTitle("Manual List")
	->setSubject("Manual List")
	->setDescription("List of all manuals in SAMS")
	->setKeywords("manual list")
	->setCategory("Manual List");
	
	
	// Add some data
$objPHPExcel->setActiveSheetIndex(0)
	->setCellValue( 'A1', 'Manufacturer')
	->setCellValue( 'B1', 'Category')
	->setCellValue( 'C1', 'Model')
	->setCellValue( 'D1', 'Filename');
	
	$row = 2;
	if ($objAttachments){
		usort($objAttachments, 'attachmentSort');
		foreach($objAttachments as $item){
			$entityQtype = $item->EntityQtypeId;
			switch ($entityQtype){
				case 1: //Asset
					$asset = Asset::Load($item->EntityId);
					if ($asset){
						$assetModel = AssetModel::Load($asset->AssetModelId);
						$manu = Manufacturer::Load($assetModel->ManufacturerId);
						$cat = Category::Load($assetModel->CategoryId);
						$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue( 'A'.$row , $manu->ShortDescription)
						->setCellValue( 'B'.$row , $cat->ShortDescription)
						->setCellValue( 'C'.$row , $asset->AssetModel);
					}
					break;
				case 2: //Inventory
					$inventory = InventoryModel::Load($item->EntityId);
					$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue( 'C'.$row , $inventory);
					if ($inventory){
						$manu = Manufacturer::Load($inventory->ManufacturerId);
						$cat = Category::Load($inventory->CategoryId);
						$objPHPExcel->setActiveSheetIndex(0)
							->setCellValue( 'A'.$row , $manu->ShortDescription)
							->setCellValue( 'B'.$row , $cat->ShortDescription);
					}
					break;
				case 4: //AssetModel
					$assetModel = AssetModel::Load($item->EntityId);
					if ($assetModel){
						$manu = Manufacturer::Load($assetModel->ManufacturerId);
						$cat = Category::Load($assetModel->CategoryId);
						$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue( 'A'.$row , $manu->ShortDescription)
						->setCellValue( 'B'.$row , $cat->ShortDescription)
						->setCellValue( 'C'.$row , $assetModel);
					}

					break;
				default:
					break;
			}
			
			
			$objPHPExcel->getActiveSheet()
				->setCellValue('D'.$row, $item->Filename);
			$objPHPExcel->getActiveSheet()
				->getCell('D'.$row)->getHyperlink()->setUrl('./attachments/'.$item->TmpFilename);
			if ($row % 2  == 0){
				$objPHPExcel->getActiveSheet()->getStyle( 'A'.$row.':D'.$row)
					->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()
					->setARGB('FFF0F8FF');
			}
			
			$row++;
		}
	}
	$sheet = $objPHPExcel->getActiveSheet ();
	$sheet->getStyle ( 'A1:D1' )-> getFont ()->setBold(true)->setSize(18);
	$sheet->getStyle ( 'A1:D'.$row )-> getFont ()->setSize(14);
	$sheet->getStyle ( 'D1:D'.$row )-> getFont ()->setBold(true);
	$sheet->getColumnDimension ( 'A' )->setAutoSize ( true );
	$sheet->getColumnDimension ( 'B' )->setAutoSize ( true );
	$sheet->getColumnDimension ( 'C' )->setAutoSize ( true );
	$sheet->getColumnDimension ( 'D' )->setAutoSize ( true );
	
// Rename worksheet
	$sheet->setTitle('Manual List');
	
	
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);
	
	
// Redirect output to a client’s web browser (Excel)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="manuals.htm"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
	
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified	header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
	
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'HTML');
ob_end_clean();
$objWriter->save('php://output');
exit;

