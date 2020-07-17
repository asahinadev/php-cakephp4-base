<?php
/**
 * @var \App\View\AppView $this
 */
use Cake\Core\Configure;
use Cake\Error\Debugger;

$this->layout = 'error';

if (Configure::read('debug')) :
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error500.php');

    $this->start('file');

else :
    ?>

<div class="container">
	<div class="bg-light p-5 rounded mt-3">
		<h1><?= h($message) ?></h1>
		<p class="lead"><?= __d('cake', 'Error') ?></p>
    	<?= h($message) ?>
	</div>
</div>

<?php endif;?>


