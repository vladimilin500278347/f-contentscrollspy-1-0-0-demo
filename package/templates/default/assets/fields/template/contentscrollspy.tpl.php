<?php

/**
 * Created by PhpStorm.
 * Mail: vladimilin500278347@gmail.com
 * Date: 15.01.2023
 * // TODO:
 *
 */
$template = cmsTemplate::getInstance ();

ob_start (); ?>

<script>
	$(document).ready(function () {
		$.toctoc({
			borderWidth: "<?php echo empty( $this->options[ 'borderwidth' ] ) ? '1px' : ($this->options[ 'borderwidth' ]); ?>",
			borderColor: "<?php echo empty( $this->options[ 'bordercolor' ] ) ? '#777' : ($this->options[ 'bordercolor' ]); ?>",
			borderStyle: "<?php echo empty( $this->options[ 'borderstyle' ] ) ? 'solid' : ($this->options[ 'borderstyle' ]); ?>",
			headBackgroundColor: "<?php echo empty( $this->options[ 'headbackgroundcolor' ] ) ? '#26a69a' : ($this->options[ 'headbackgroundcolor' ]); ?>",
			headTextColor: "<?php echo empty( $this->options[ 'headtextcolor' ] ) ? '#fff' : ($this->options[ 'headtextcolor' ]); ?>",
			headLinkColor: "<?php echo empty( $this->options[ 'headlinkcolor' ] ) ? '#add8e6' : ($this->options[ 'headlinkcolor' ]); ?>",
			headText: "<?php echo empty( $this->options[ 'headtext' ] ) ? 'Оглавление' : ($this->options[ 'headtext' ]); ?>",
			headLinkText: [<?php echo $this->options[ 'headlinktext' ]; ?>],
			target: "<?php echo empty( $this->options[ 'target' ] ) ? 'article' : ($this->options[ 'target' ]); ?>",
			bodyBackgroundColor: "<?php echo empty( $this->options[ 'bodybackgroundcolor' ] ) ? '#f5f5f5' : ($this->options[ 'bodybackgroundcolor' ]); ?>",
			bodyLinkColor: "<?php echo empty( $this->options[ 'bodylinkcolor' ] ) ? '#0d6efd' : ($this->options[ 'bodylinkcolor' ]); ?>",
			smooth: true
		});

	});
</script>';

<?php $template->addBottom ( ob_get_clean () ); ?>
