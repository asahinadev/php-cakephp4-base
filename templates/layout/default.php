<!DOCTYPE html>
<html lang="ja" class="h-100">
<head>
<?php
/**
 *
 * @var \App\View\AppView $this
 */
?>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= $this->fetch('title') ?></title>
<link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
<?php
echo $this->Html->meta('icon');
echo $this->fetch('meta');
echo $this->Html->css([
    'bootstrap5/bootstrap.min',
    'fontawesome5/all.min',
    'common'
]);
echo $this->fetch('css');
echo $this->Html->script([
    'bootstrap5/bootstrap.min'
]);
echo $this->fetch('script');
?>
<meta name="theme-color" content="#7952b3">
<style>
.bd-placeholder-img {
	font-size: 1.125rem;
	text-anchor: middle;
	-webkit-user-select: none;
	-moz-user-select: none;
	-ms-user-select: none;
	user-select: none;
}

@media ( min-width : 768px) {
	.bd-placeholder-img-lg {
		font-size: 3.5rem;
	}
}

/* Custom page CSS
-------------------------------------------------- */
/* Not required for template or sticky footer method. */
body {
	padding: 60px 15px 0;
}
</style>

</head>
<body class="d-flex flex-column h-100">

	<header>
		<!-- Fixed navbar -->
		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-primary">
			<div class="container-fluid">
				<a class="navbar-brand" href="#"><?= $this->fetch('title') ?></a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarCollapse">
				<?php
    echo $this->Html->nestedList(
        [
            $this->Html->link("HOME", "/", [
                "class" => "nav-link",
                "id" => "HOME"
            ]),
            $this->Html->link("USER", "/users", [
                "class" => "nav-link",
                "id" => "USER"
            ]),
        ], [
            "class" => "navbar-nav mr-auto mb-2 mb-md-0"
        ], [
            "class" => "nav-item"
        ])?>
					<form class="d-flex form-outline">
						<button class="btn btn-danger btn-sm" type="submit">Login</button>
					</form>
				</div>
			</div>
		</nav>
	</header>

	<!-- Begin page content -->
	<main class="flex-shrink-0">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
	</main>

	<footer class="footer mt-auto py-3 bg-light">
		<div class="container"></div>
	</footer>

</body>
</html>

