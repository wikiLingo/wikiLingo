<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 3/31/14
 * Time: 3:19 PM
 */

namespace WikiLingo\Plugin\Outline;

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
            array_pop($container->listItemCollectionRenderDelegate);
            array_pop($container->listItemRenderDelegate);

            /**
             * @param WikiLingo\Expression\BlockType\ListItemCollection $listItems
             * @param WikiLingo\Renderer $renderer
             * @param WikiLingo\Parser $parser
             * @return string
             */
            $container->listItemCollectionRenderDelegate[] = function($listItems, &$renderer, &$parser) {
                $element = $renderer->helper('div');
                foreach($listItems as $listItem)
                {
                    $element->staticChildren[] = $listItem->render($renderer, $parser);
                }
                return $element->render();
            };

            /**
             * @param WikiLingo\Expression\BlockType\ListItem $listItem
             * @param WikiLingo\Renderer $renderer
             * @param WikiLingo\Parser $parser
             * @return string
             */
            $container->listItemRenderDelegate[] = function(&$listItem, &$renderer, &$parser) {
                $table = $renderer->helper('table');
                $table->children[] = $tbody = $renderer->helper('tbody');
                $tbody->children[] = $tr = $renderer->helper('tr');
                $tr->children[] = $tdLeadingSpace = $renderer->helper('td');
                $tr->children[] = $tdBullet = $renderer->helper('td');
                $tr->children[] = $tdNumber = $renderer->helper('td');
                $tr->children[] = $tdContent = $renderer->helper('td');

                $block = $listItem->block;

                if ($block->blank) {
                    $table->classes[] = 'empty';
                }

                if (isset($block)) {
                    if (!empty($block->renderedChildren)) {
                        $tdContent->staticChildren[] = $block->renderedChildren;
                    } else if (method_exists($block->expression, "render")) {
                        $tdContent->staticChildren[] = $block->expression->render($renderer, $parser);
                    }
                }

                if (isset($listItem->children)) {
                    $table->staticChildren[] = $listItem->children->render($renderer, $parser);
                }

                return $table->render();
            };
        }
    }
} 