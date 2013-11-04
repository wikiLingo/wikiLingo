<?php
namespace WikiLingo\Test;

use WikiLingo;

class VisualFeedbackTable
{
	public static $styled = false;
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
		$style = '';
		if (!self::$styled) {
			$style =
"<style>
	.fail .output {
		display: ;
	}
	.pass .output {
		display: none;
	}
	.output {
		overflow: auto;
	}
</style>";
			self::$styled = true;
		}
		return <<<html
$style
<h2 onclick='this.nextSibling.style.display = (this.nextSibling.style.display ? "" : "block")'><a>$name</a></h2><div class="output">
	<table style='width: 100%;'>
		<colgroup>
			<col style="width: 33%; background-color: "/>
			<col style="width: 33%"/>
			<col style="width: 33%"/>
		</colgroup>
		<tbody>
			<tr>
				<th style="text-align: center;">Source</th>
			</tr>
			<tr>
				<td style="background-color: #F0F0F0;" rowspan="2">
					<pre><code>$source</code></pre>
				</td>
				<td style="background-color: #F0F0F0;">
					Expected: <pre><code>$expected</code></pre>
				</td>
			</tr>
			<tr>
				<td style="background-color: #F0F0F0;">
					Actual: <pre><code>$actual</code></pre>
				</td>
			</tr>
		</tbody>
	</table>
</div>
html;
	}
} 