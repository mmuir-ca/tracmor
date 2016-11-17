<?php ?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=<?php _p(QApplication::$EncodingType); ?>" />
		<link rel="stylesheet" type="text/css" href="<?php print('../css/tracmor.css'); ?>"></link>
		<title>Packing List</title>
	</head>
	<body>

<?php $this->RenderBegin(); ?>
<div style="border:1px solid #000000;background-color:#AAAAAA;text-align:center;padding-top:0.03in;">
<strong style="color:#FFFFFF;font-size:11pt;">Commercial Invoice</strong>
</div>

<?php $this->lblExcel->Render();
$this->RenderEnd();
?>
	</body>
</html>
