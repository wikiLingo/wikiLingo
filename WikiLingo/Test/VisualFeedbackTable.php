<?php
namespace WikiLingo\Test;

use WikiLingo;

class VisualFeedbackTable
{
	public $name;
	public $source;
	public $expected;
	public $actual;

	public function __construct($name)
	{
		$this->name = $name;
	}

	public function setSource($source)
	{
		$this->source = $source;
		return $this;
	}

	public function setExpected($expected)
	{
		$this->expected = $expected;
		return $this;
	}

	public function setActual($actual)
	{
		$this->actual = $actual;
		return $this;
	}

	public function render()
	{
		$name = $this->name;
		$source = htmlentities($this->source);
		$actual = htmlentities($this->actual);
		$expected = htmlentities($this->expected);
		return <<<html
<h2 onclick='this.nextSibling.style.display = (this.nextSibling.style.display ? "" : "none")'><a>$name</a></h2><div style='overflow: auto; display: none;'>
	<table style='width: 100%;'>
		<colgroup>
			<col style="width: 33%; background-color: "/>
			<col style="width: 33%"/>
			<col style="width: 33%"/>
		</colgroup>
		<tbody>
			<tr>
				<th style="text-align: center;">Source</th>
				<th style="text-align: center;">Expected</th>
				<th style="text-align: center;">Actual</th>
			</tr>
			<tr>
				<td style="background-color: #F0F0F0;">
					<pre><code>$source</code></pre>
				</td>
				<td style="background-color: #F0F0F0;">
					<pre><code>$expected</code></pre>
				</td>
				<td style="background-color: #F0F0F0;">
					<pre><code>$actual</code></pre>
				</td>
			</tr>
		</tbody>
	</table>
</div>
html;
	}
} 