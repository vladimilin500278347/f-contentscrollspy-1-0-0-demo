<?php
// 15/01/2023/
// BACKEND FIELDS

/* A simple table of content generator which automatically generates a list of internal anchor links pointing to the corresponding page sections within the document.
 * The generated toc supports h1 - h6 headling elements and automatically highlights the active anchor link when scrolling through page sections.
 * Ideal for generating a sticky navigation for content-heavy webpages or one page scroll websites to improve user experience and boost search engine rankings.
*/

class fieldContentscrollspy extends cmsFormField
{

	public $title = 'Content scrollspy';

	public $sql = 'TINYINT(1) UNSIGNED NULL DEFAULT 1';

	public $filter_type = 'str';

	public function getOptions()
	{

		return [
			//--------------------------------------------------------------------------------------
			new fieldString( 'headtext', [
				'title'   => LANG_CONTENTSCROLLSPY_HEADTEXT_PANEL,
				'hint'    => LANG_CONTENTSCROLLSPY_HEADTEXT_PANEL_HINT,
				'default' => 'Оглавление',
				'rules'   => array (
					array ( 'required' )
				)
			] ),
			//--------------------------------------------------------------------------------------
			new fieldString( 'target', [
				'title'   => LANG_CONTENTSCROLLSPY_TARGET,
				'hint'    => LANG_CONTENTSCROLLSPY_TARGET_HINT,
				'default' => 'article',
				'rules'   => array (
					array ( 'required' )
				)
			] ),
			//--------------------------------------------------------------------------------------

		];
	}

	public function parse( $value )
	{

		$headtext            = $this->getOption( 'headtext' );

		$template = cmsTemplate::getInstance();
		$template->addJS( 'templates/modern/widgets/contentscrollspy/js/toctoc.min.js' );
		$template->addCSS( 'templates/modern/widgets/contentscrollspy/css/toctoc.min.css' );

		$toctoc = '<div id="toctoc"></div>';

		include_once($template->getTemplateFileName( 'assets/fields/template/contentscrollspy' ));

		return $toctoc;

	}

	public function applyFilter( $model, $value )
	{
		return $model->filterLike( $this->name, "%{$value}%" );
	}

	public function store( $value, $is_submitted, $old_value = null )
	{
		return strip_tags( $value );
	}

}
