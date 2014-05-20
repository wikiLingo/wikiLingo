<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 3/31/14
 * Time: 3:19 PM
 */

namespace WikiLingo\Plugin\Menu;

use WikiLingo;
use WikiLingo\Expression;
/**
 * Class Block
 * @package WikiLingo\Plugin\Outline
 */
class Block
{
    /**
     * @param Expression\Block $expression
     */
    public static function mutate(Expression\Block &$expression)
    {
        $container = $expression->expression;
        //setup default rendering delegates
        if ($container !== null) {
            array_pop($container->listItemRenderDelegate);

            /**
             * @param WikiLingo\Expression\BlockType\ListItem $listItem
             * @param WikiLingo\Renderer $renderer
             * @param WikiLingo\Parser $parser
             * @return string
             */
            $container->listItemRenderDelegate[] = function(&$listItem, &$renderer, &$parser) {
	            $li = $renderer->helper('li');
                $block = $listItem->block;
	            $content = null;

                if (isset($block)) {
	                $parsed = $block->parsed;
	                if ($parsed->childrenLength > 0) {
		                if ($parsed->children[0]->type == 'Content') {
			                $content = $renderer->helper('a');
			                $content->attributes['href'] = '#';
			                $content->attributes['onclick'] = 'return false;';
			                $li->children[] = $content;
		                }
	                }

	                $parent = ($content ?: $li);

                    if (!empty($block->renderedChildren)) {
                        $rendered = $block->renderedChildren;
	                    $parent->staticChildren[] = $rendered;
                    } else if (method_exists($block->expression, "render")) {
	                    $parent->staticChildren[] = $block->expression->render($renderer, $parser);
                    }
                }

	            if ($content != null) {
                    $li->staticChildren[] = $content->render();
	            }

                if (isset($listItem->children)) {
                    $li->staticChildren[] = $listItem->children->render($renderer, $parser);
                }

                return $li->render();
            };
        }
    }
} 