<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class Table extends Base
{
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