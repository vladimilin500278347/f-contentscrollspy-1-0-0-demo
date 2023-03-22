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

	public function getOptions ()
	{

		return [
			//--------------------------------------------------------------------------------------
			new fieldString( 'borderwidth', [
					'title'   => LANG_CONTENTSCROLLSPY_BORDERWIDTH,
					'hint'    => LANG_CONTENTSCROLLSPY_BORDERWIDTH_HINT,
					'default' => '1px',
					'rules'   => array (
						array ( 'required' ),
					),
				] ),
			new fieldString( 'bordercolor', [
				'title'   => LANG_CONTENTSCROLLSPY_BORDERCOLOR,
				'hint'    => LANG_CONTENTSCROLLSPY_BORDERCOLOR_HINT,
				'default' => '#777',
				'rules'   => array (
					array ( 'required' ),
				),
			] ),
			new fieldString( 'borderstyle', [
				'title'   => LANG_CONTENTSCROLLSPY_BORDERSTYLE,
				'hint'    => LANG_CONTENTSCROLLSPY_BORDERSTYLE_HINT,
				'default' => 'solid',
				'rules'   => array (
					array ( 'required' ),
				),
			] ),
			//--------------------------------------------------------------------------------------
			new fieldString( 'headbackgroundcolor', [
				'title'   => LANG_CONTENTSCROLLSPY_HEADBACKGROUNDCOLOR,
				'hint'    => LANG_CONTENTSCROLLSPY_HEADBACKGROUNDCOLOR_HINT,
				'default' => '#26a69a',
				'rules'   => array (
					array ( 'required' ),
				),
			] ),
			new fieldString( 'headtextcolor', [
				'title'   => LANG_CONTENTSCROLLSPY_HEADTEXTCOLOR,
				'hint'    => LANG_CONTENTSCROLLSPY_HEADTEXTCOLOR_HINT,
				'default' => '#fff',
				'rules'   => array (
					array ( 'required' ),
				),
			] ),
			new fieldString( 'headlinkcolor', [
				'title'   => LANG_CONTENTSCROLLSPY_HEADLINKCOLOR,
				'hint'    => LANG_CONTENTSCROLLSPY_HEADLINKCOLOR_HINT,
				'default' => '#add8e6',
				'rules'   => array (
					array ( 'required' ),
				),
			] ),
			//--------------------------------------------------------------------------------------
			new fieldString( 'headtext', [
				'title'   => LANG_CONTENTSCROLLSPY_HEADTEXT_PANEL,
				'hint'    => LANG_CONTENTSCROLLSPY_HEADTEXT_PANEL_HINT,
				'default' => 'Оглавление',
				'rules'   => array (
					array ( 'required' ),
				),
			] ),
			//--------------------------------------------------------------------------------------
			new fieldString( 'headlinktext', [
				'title'   => LANG_CONTENTSCROLLSPY_HEADLINKTEXT,
				'hint'    => LANG_CONTENTSCROLLSPY_HEADLINKTEXT_HINT,
				'default' => "'open', ' close'",
				'rules'   => array (
					array ( 'required' ),
				),
			] ),
			//--------------------------------------------------------------------------------------
			new fieldString( 'target', [
				'title'   => LANG_CONTENTSCROLLSPY_TARGET,
				'hint'    => LANG_CONTENTSCROLLSPY_TARGET_HINT,
				'default' => 'article',
				'rules'   => array (
					array ( 'required' ),
				),
			] ),
			//--------------------------------------------------------------------------------------
			new fieldString( 'bodybackgroundcolor', [
				'title'   => LANG_CONTENTSCROLLSPY_BODYBACKGROUNDCOLOR,
				'hint'    => LANG_CONTENTSCROLLSPY_BODYBACKGROUNDCOLOR_HINT,
				'default' => '#f5f5f5',
				'rules'   => array (
					array ( 'required' ),
				),
			] ),
			new fieldString( 'bodylinkcolor', [
				'title'   => LANG_CONTENTSCROLLSPY_BODYLINKCOLOR,
				'hint'    => LANG_CONTENTSCROLLSPY_BODYLINKCOLOR_HINT,
				'default' => '#0d6efd',
				'rules'   => array (
					array ( 'required' ),
				),
			] ),
			//--------------------------------------------------------------------------------------

		];
	}

	public function parse ( $value )
	{

		$borderwidth         = $this->getOption ( 'borderwidth' );
		$bordercolor         = $this->getOption ( 'bordercolor' );
		$borderstyle         = $this->getOption ( 'borderstyle' );
		$headbackgroundcolor = $this->getOption ( 'headbackgroundcolor' );
		$headtextcolor       = $this->getOption ( 'headtextcolor' );
		$headlinkcolor       = $this->getOption ( 'headlinkcolor' );
		$headtext            = $this->getOption ( 'headtext' );
		$headlinktext        = $this->getOption ( 'headlinktext' );
		$bodybackgroundcolor = $this->getOption ( 'bodybackgroundcolor' );
		$bodylinkcolor       = $this->getOption ( 'bodylinkcolor' );

		$template = cmsTemplate::getInstance ();
		$template->addJS ( 'templates/modern/widgets/contentscrollspy/js/toctoc.min.js' );
		$template->addCSS ( 'templates/modern/widgets/contentscrollspy/css/toctoc.min.css' );

		$toctoc = '<div id="toctoc"></div>';

		include_once ( $template->getTemplateFileName ( 'assets/fields/template/contentscrollspy' ) );

		return $toctoc;

	}

	public function applyFilter ( $model, $value )
	{
		return $model->filterLike ( $this->name, "%{$value}%" );
	}

	public function store ( $value, $is_submitted, $old_value = null )
	{
		return strip_tags ( $value );
	}

}
