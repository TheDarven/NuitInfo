<!DOCTYPE html>
<html lang="FR-fr">
	<head>
		<title><?= TITRE ?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="Language" content="FR-fr"/>
		<meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1; user-scalable=0; shrink-to-fit=no"/>

		<link href="<?= PATH_CSS ?>bootstrap.css" rel="stylesheet">
		<link href="<?= PATH_CSS ?>ficheCss.css" rel="stylesheet">
        <link href="<?= PATH_CSS ?>sweetalert.css" rel="stylesheet">

        <link href="<?= PATH_SCRIPTS ?>bootstrap.js">
        <link href="<?= PATH_SCRIPTS ?>jquery.js">
        <link href="<?= PATH_SCRIPTS ?>popper.js">

		<!-- Clarity -->
        <link rel="stylesheet" href="../../../Clarity/node_modules/@clr/icons/clr-icons.min.css">
        <script src="../../../Clarity/node_modules/@webcomponents/custom-elements/custom-elements.min.js"></script>
        <script src="../../../Clarity/node_modules/@clr/icons/clr-icons.min.js"></script>

	</head>
	<body>
		<!-- Menu -->
		<?php include(PATH_VIEWS.'menu.php'); ?>