<?php

class WikiPlugin_expandingoutline_list extends JisonParser_Wiki_List
{
	public $parser;
	public $labelTracker = array();
	public $typeTracking = array();

	function __construct(JisonParser_Wiki_List &$parserList, $parser)
	{
		$this->stacks = $parserList->stacks;
		$this->index = $parserList->index;
		ini_set('error_reporting', E_ALL);
		ini_set('display_errors', 1);
		$this->parser = $parser;
	}

	public function toHtml()
	{
		if (empty($this->stacks)) return;

		$lists = array();

		foreach ($this->stacks as $key => &$stack) {
			$lists[$key] = '<table class="tikiListTable">';

			$this->labelTracker = array();
			$lists[$key] .= $this->toHtmlChildren($stack);

			$lists[$key] .= '</table>';
		}

		return $lists;
	}

	private function toHtmlChildren(&$stack, $tier = 0)
	{
		$result = '';

		if (!isset($stack)) {
			return $result;
		}

		$i = 0;
		for ($j = 0, $max = count($stack); $j < $max; $j++) {
			$list = $stack[$j];

			switch($list['type']) {
				case '*':
					$class = 'tikiListTableLabel';
					$i++;
					break;
				case '+':
					$class = 'tikiListTableBlank';
					break;
			}

			$this->labelTracker[] = $i;

			switch($list['type']) {
				case '*':
					$label = implode('.', $this->labelTracker);
					break;
				case '+':
					$label = '';
					break;
			}

			$trail = $this->labelTracker;
			$trail = implode('_', $trail);

			if (empty($list['content']) == false) {
				$nonExpanding = $this->groupNonExpanding($stack, $j);
				$children = $this->toHtmlChildren($stack[$j]['children'], $tier + 1);

				$item = '<tr>' .
					'<td id="" class="' . $class . ' tier' . $tier . '" data-trail="' . $trail . '" style="width:' . ((count($this->labelTracker) * 30) + 30) . 'px; text-align: right;">' .
						(empty($stack[$j]['children']) == false ? '<img class="listImg" src="img/toggle-expand-dark.png" data-altimg="img/toggle-collapse-dark.png" />' : '').
						$label .
					'</td>' .
					'<td class="tikiListTableItem">' . $list['content'] .'</td>' .
				'</tr>';

				if (!empty($nonExpanding)) {
					$item .= '<tr><td class="tier' . $tier . '"></td><td>' . $nonExpanding . '</td></tr>';
				}

				if (empty($children) == false) {
					$item .= '<tr class="parentTrail' . $trail . ' tikiListTableChild"><td colspan="2"><table>' . $children . '</table></td></tr>';
				}

				$result .= '<tr><td><table>' . $item . '</table></td></tr>';
			}

			array_pop($this->labelTracker);
		}

		return $result;
	}

	private function groupNonExpanding(&$stack, &$j)
	{
		$result = '';

		while (isset($stack[$j + 1]['type']) && $stack[$j + 1]['type'] == '+' && isset($stack[$j + 1]['content'])) {
			$j++;
			if (isset($stack[$j]['content'])) {
				$result .= $stack[$j]['content'] . '<br />';
			}
		}

		return $result;
	}
}
