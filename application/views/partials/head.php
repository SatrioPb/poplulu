	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title><?= $title ?></title>
	<style>
		.input-group {
			position: relative !important;
			width: 100% !important;
		}

		/* Style for the file input itself */
		.form-control[type="file"] {
			height: auto !important;
			padding: 0rem !important;
			border-radius: 0.25rem !important;
		}

		/* Style for the "Choose file" label */
		.input-group-text {
			border-radius: 0 0.25rem 0.25rem 0 !important;
		}

		.form-control[type="file"]::-webkit-file-upload-button {
			background: #9b0060;
			color: #fff;
			border: none;
			padding: 0.375rem 0.75rem;
			border-radius: 0rem 0rem 0 0;
			cursor: pointer;
		}

		.form-control[type="file"]::-webkit-file-upload-button:hover {
			background: #9b0060;
			/* Darker shade on hover */
		}
	</style>
	<link href="<?= base_url('sb-admin') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="<?= base_url('sb-admin') ?>/css/sb-admin-2.min.css" rel="stylesheet">
	<link href="<?= base_url('sb-admin') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">