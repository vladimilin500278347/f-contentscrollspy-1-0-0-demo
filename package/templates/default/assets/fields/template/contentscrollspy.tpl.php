<?php

/**
 * Created by PhpStorm.
 * Mail: vladimilin500278347@gmail.com
 * Date: 15.01.2023
 * // TODO:
 *
 */
$template = cmsTemplate::getInstance();

ob_start(); ?>

<script>
	$(document).ready(function () {
		$.toctoc({
			headText: "<?php echo empty( $this->options[ 'headtext' ] ) ? 'Оглавление' : ($this->options[ 'headtext' ]); ?>",
			target: "<?php echo empty( $this->options[ 'target' ] ) ? 'article' : ($this->options[ 'target' ]); ?>",
			smooth: true
		});

	});
</script>';

<?php $template->addBottom( ob_get_clean() ); ?>
