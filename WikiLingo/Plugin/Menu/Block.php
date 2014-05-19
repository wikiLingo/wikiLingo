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
                $a = $renderer->helper('a');

                $block = $listItem->block;

                if (isset($block)) {
                    if (!empty($block->renderedChildren)) {
                        $rendered = $block->renderedChildren;
                        $a->staticChildren[] = $rendered;
                    } else if (method_exists($block->expression, "render")) {
                        $a->staticChildren[] = $block->expression->render($renderer, $parser);
                    }
                }

                $li = $renderer->helper('li');
                $li->staticChildren[] = $a->render();

                if (isset($listItem->children)) {
                    $li->staticChildren[] = $listItem->children->render($renderer, $parser);
                }

                return $li->render();
            };
        }
    }
} 