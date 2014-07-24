<?php
namespace WikiLingo\Test;

use WikiLingo;

/**
 * Class VisualFeedbackTable
 * @package WikiLingo\Test
 */
class VisualFeedbackTable
{
	public static $styled = false;
	public $name;
	public $source;
	public $expected;
	public $actual;
    public $lexerErrors = null;
    public $parserErrors = null;
    public $fail = true;

    /**
     * @param $name
     */
    public function __construct($name)
	{
		$this->name = $name;
	}

    /**
     * @param $source
     * @return $this
     */
    public function setSource($source)
	{
		$this->source = $source;
		return $this;
	}

    /**
     * @param $expected
     * @return $this
     */
    public function setExpected($expected)
	{
		$this->expected = $expected;
		return $this;
	}

    /**
     * @param $actual
     * @return $this
     */
    public function setActual($actual)
	{
        if ($actual === $this->expected) {
            $this->fail = false;
        }
		$this->actual = $actual;
		return $this;
	}

    /**
     * @param $lexerErrors
     * @param $parserErrors
     * @return $this
     */
    public function setErrors($lexerErrors = array(), $parserErrors = array())
    {
        $this->lexerErrors = htmlentities(implode($lexerErrors, "\n"));
        $this->parserErrors = htmlentities(implode($parserErrors, "\n"));
        return $this;
    }

    /**
     * @return string
     */
    public function render()
	{
		$name = $this->name;
		$source = htmlentities($this->source);
		$actual = htmlentities($this->actual);
		$expected = htmlentities($this->expected);
        $errors = "";

        if (!empty($this->lexerErrors)) {
            $errors .= "<tr><td>Lexer Errors: <pre><code>$this->lexerErrors</code></pre></td></tr>";
        }

        if (!empty($this->parserErrors)) {
            $errors .= "<tr><td>Parser Errors: <pre><code>$this->parserErrors</code></pre></td></tr>";
        }
        $class = $this->fail ? 'fail' : '';
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
<h2 class="$class" onclick='this.nextSibling.style.display = (this.nextSibling.style.display ? "" : "block")'><a>$name</a></h2><div class="output">
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
			$errors
		</tbody>
	</table>
</div>
html;
	}
} 