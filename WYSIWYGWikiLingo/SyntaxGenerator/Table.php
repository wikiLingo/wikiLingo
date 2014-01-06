<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

/**
 * Class Table
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class Table extends Base
{
    /**
     * @return string
     */
    public function generate()
    {
	    $rows = array();
	    foreach($this->children as $row) {
		    $columns = array();
		    foreach($row->children as $column) {
			    $columns[] = $column->expression->renderedChildren;
		    }
		    $rows[] = implode('|', $columns);
	    }

        return '||' . implode("\n", $rows) . '||';
    }
}