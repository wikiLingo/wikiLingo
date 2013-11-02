<?php
/**
 * Development utility to help keep types manageable to the developers while using IDE's, can be removed later
 * @namespace
 */
namespace Types
{
	use WikiLingo;
	use WikiLingo\Expression;
	use WikiLingo\Expression\Tensor;
	use WYSIWYGWikiLingo;

	class Type
	{
		public static function Block(Expression\Block &$obj)
		{
			return $obj;
		}

		public static function Flat(Tensor\Flat &$obj)
		{
			return $obj;
		}

		public static function Hierarchical(Tensor\Hierarchical &$obj)
		{
			return $obj;
		}

		public static function HierarchicalCollection(Tensor\HierarchicalCollection &$obj)
		{
			return $obj;
		}

		public static function Parsed(WikiLingo\Parsed &$obj)
		{
			return $obj;
		}

		public static function Element(WikiLingo\Renderer\Element &$obj)
		{
			return $obj;
		}

		public static function WYSIWYGElement(WYSIWYGWikiLingo\Expression\Element &$obj)
		{
			return $obj;
		}

		public static function Helper(WikiLingo\Renderer\Helper &$obj)
		{
			return $obj;
		}

		public static function WikiLingoParser(WikiLingo\Parser &$obj)
		{
			return $obj;
		}

		public static function DescriptionList(WikiLingo\Expression\DescriptionList &$obj)
		{
			return $obj;
		}
	}
}