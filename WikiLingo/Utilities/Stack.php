<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 5/10/14
 * Time: 2:43 PM
 */

namespace WikiLingo\Utilities;


class Stack
{
	public $items = array();
	public $indexFirst = -1;
	public $indexLast = -1;
	public $length = 0;

	public function push($item)
	{
		$this->items[] = $item;
		$this->length++;
	}

	public function pop()
	{
		$this->length = max(0, $this->length - 1);

		return array_pop($this->items);
	}

	private function setFirstAndLast()
	{
		if ($this->length == 0) {
			$this->indexFirst = -1;
			$this->indexLast = -1;
		} else {
			$this->indexFirst = 0;
			$this->indexLast = $this->length - 1;
		}
	}

	public function first()
	{
		$this->setFirstAndLast();

		if ($this->indexFirst > -1) {
			return $this->items[$this->indexFirst];
		}

		return null;
	}

	public function last()
	{
		$this->setFirstAndLast();

		if ($this->indexLast > -1) {
			return $this->items[$this->indexLast];
		}

		return null;
	}
} 