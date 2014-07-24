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
		public static function Block(Expression\Block $obj)
		{
			return $obj;
		}

		public static function ListContainer(Expression\BlockType\ListContainer $obj)
		{
			return $obj;
		}

		public static function Parsed(WikiLingo\Parsed $obj)
		{
			return $obj;
		}

		public static function Element(WikiLingo\Model\Element $obj)
		{
			return $obj;
		}

		public static function Events(\WikiLingo\Events $obj)
		{
			return $obj;
		}

		public static function WYSIWYGElement(WYSIWYGWikiLingo\Expression\Element $obj)
		{
			return $obj;
		}

		public static function Helper(WikiLingo\Model\Helper $obj)
		{
			return $obj;
		}

		public static function WikiLingoParser(WikiLingo\Parser $obj)
		{
			return $obj;
		}

		public static function WYSIWYGWikiLingoParser(WYSIWYGWikiLingo\Parser $obj)
		{
			return $obj;
		}

		public static function DescriptionList(WikiLingo\Expression\BlockType\DescriptionList $obj)
		{
			return $obj;
		}

		public static function Header(WikiLingo\Expression\BlockType\Header $obj)
		{
			return $obj;
		}

		public static function Scripts(WikiLingo\Utilities\Scripts $obj)
		{
			return $obj;
		}

		public static function classNameSimple($typeName)
		{
			$parts = explode('\\', $typeName);
			$type = array_pop($parts);
			return $type;
		}
	}
}