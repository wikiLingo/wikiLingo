<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class Table extends Base
{
	public function __construct()
	{

		$this->source =
            "||r1c1|r1c2\n" .
            "r2c1|r2c2||";

		$this->expected =
            "<table>" .
                "<tr>" .
                    "<td>r1c1</td>" .
                    "<td>r1c2</td>" .
                "</tr>" .
                "<tr>" .
                    "<td>r2c1</td>" .
                    "<td>r2c2</td>" .
                "</tr>" .
            "</table>";


	}
}
