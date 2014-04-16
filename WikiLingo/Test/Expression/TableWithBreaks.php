<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class TableWithBreaks extends Base
{
	public function __construct(&$parser)
	{

		$this->source =
            "||Sample Tablerow1-col1|row1-col2%%%second line%%%third line|row1-col3row2-col1|row2-col2|row2-col3%%%second line||";

		$this->expected =
            "<table>" .
                "<tr>" .
                    "<td class='table-cell'>Sample Tablerow1-col1</td>".
                    "<td class='table-cell'>" .
                        "row1-col2<br/>" .
                        "second line<br/>" .
                        "third line" .
                    "</td>" .
                    "<td class='table-cell'>row1-col3row2-col1</td>" .
                    "<td class='table-cell'>row2-col2</td>" .
                    "<td class='table-cell'>" .
                        "row2-col3<br/>" .
                        "second line" .
                    "</td>" .
                "</tr>" .
            "</table>";
	}
}
