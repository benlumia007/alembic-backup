<?php

namespace Benlumia007\Alembic\Tools;

class Markdown extends \ParsedownExtra
{

	// Matches Markdown image definition
	private $MarkdownImageRegex = "~^!\[.*?\]\(.*?\)~";

	public function __construct () {
	    // Add blockFigure to non-exclusive handlers for text starting with !
	    $this->BlockTypes['!'][] = 'Figure';
	}

	protected function inlineLink( $Excerpt ) {

		$Link = parent::inlineLink($Excerpt);

		if ( ! empty( $Link['element']['attributes']['href'] ) ) {

			if ( Str::startsWith( $Link['element']['attributes']['href'], '/' ) ) {

				$Link['element']['attributes']['href'] =
					Str::slashTrim( uri() ) .
					Str::slashBefore( $Link['element']['attributes']['href'] );
			}
		}

		return $Link;
	}

	protected function blockFigure($Line) {

	    // If line does not match image def, don't handle it
	    if (1 !== preg_match($this->MarkdownImageRegex, $Line['text'])) {
		return;
	    }

	    //var_dump( $Line );

	    $InlineImage = $this->inlineImage($Line);
	    if (!isset($InlineImage)) {
		return;
	    }

	    // Lazy load images by default.
	    if ( empty( $InlineImage['element']['attributes']['loading'] ) ) {
		    $InlineImage['element']['attributes']['loading'] = 'lazy';
	    }

	    if ( ! empty( $InlineImage['element']['attributes']['class'] ) ) {
		    $classes = explode( ' ', $InlineImage['element']['attributes']['class'] );

		    $align = [
			    'alignnone',
			    'alignleft',
			    'alignright',
			    'aligncenter',
			    'alignwide',
			    'alignfull'
		    ];

		    foreach ( $classes as $key =>  $c ) {
			    if ( in_array( $c, $align, true ) ) {
				    unset( $classes[ $key ] );
				    $class = $c;
			    }
		    }

		    if ( ! empty( $classes ) ) {
		    	$InlineImage['element']['attributes']['class'] = join( ' ', $classes );
		} else {
			unset( $InlineImage['element']['attributes']['class'] );
		}
	    } else {
		    $class = 'alignnone';
	    }

	    // absolute urls.
	    if ( ! empty( $Link['element']['attributes']['src'] ) ) {

		    if ( Str::startsWith( $Link['element']['attributes']['src'], '/' ) ) {

			    $Link['element']['attributes']['src'] =
				    Str::slashTrim( uri() ) .
				    Str::slashBefore( $Link['element']['attributes']['src'] );
		    }
	    }


	    $FigureBlock = array(
		'element' => array(
		    'name' => 'figure',
		    'handler' => 'elements',
		    'text' => array(
			$InlineImage['element']
		),
		'attributes' => [
			'class' => 'post-thumbnail ' . $class
			]
		),
	    );

	    // Add figcaption if alt text set
	    if (!empty($InlineImage['element']['attributes']['title'])) {

		$InlineFigcaption = array(
		    'element' => array(
			'name' => 'figcaption',
			'text' => $InlineImage['element']['attributes']['title'],
			'attributes' => [
				'class' => 'wp-caption-text'
				]
		    ),
		);

		$FigureBlock['element']['text'][] = $InlineFigcaption['element'];
	    }

	    return $FigureBlock;
	}


}