<?php
/**
 * Markdown link renderer.
 *
 * @package   Blush
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2018 - 2022, Justin Tadlock
 * @link      https://github.com/blush-dev/framework
 * @license   https://opensource.org/licenses/MIT
 */

namespace Benlumia007\Alembic\Markdown;

use Benlumia007\Alembic\Tools\Str;
use League\CommonMark\Extension\CommonMark\Node\Inline\Link;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;

class LinkRenderer implements NodeRendererInterface {

	/**
	 * Renders the element.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  Node   $node
	 * @param  ChildNodeRendererInterface $childRenderer
	 */
        public function render( Node $node, ChildNodeRendererInterface $childRenderer ) {

                $url = $node->getUrl();

                if ( Str::startsWith( $url, '/' ) ) {
                        $url = Str::slashTrim( uri() ) . Str::slashBefore( $url );
                }

                $innerHtml = $childRenderer->renderNodes( $node->children() );

                $attr = $node->data['attributes'] ?? [];

                $attr['href'] = e( $url );

                if ( $title = $node->getTitle() ) {
                        $attr['title'] = e( $title );
                }

                return new HtmlElement( 'a', $attr, $innerHtml );
        }
}