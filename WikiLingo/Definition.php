<?php
/* Jison generated parser */
namespace WikiLingo;
use Exception;


use WikiLingo\Utilities;

class Definition extends Base
{
    public $symbols = array();
    public $terminals = array();
    public $productions = array();
    public $table = array();
    public $defaultActions = array();
    public $version = '0.3.12';
    public $debug = false;
    public $none = 0;
    public $shift = 1;
    public $reduce = 2;
    public $accept = 3;

    function trace()
    {

    }

    function __construct()
    {
        //Setup Parser
        
			$symbol0 = new ParserSymbol("accept", 0);
			$symbol1 = new ParserSymbol("end", 1);
			$symbol2 = new ParserSymbol("error", 2);
			$symbol3 = new ParserSymbol("wiki", 3);
			$symbol4 = new ParserSymbol("contents", 4);
			$symbol5 = new ParserSymbol("EOF", 5);
			$symbol6 = new ParserSymbol("content", 6);
			$symbol7 = new ParserSymbol("CONTENT", 7);
			$symbol8 = new ParserSymbol("COMMENT", 8);
			$symbol9 = new ParserSymbol("NO_PARSE", 9);
			$symbol10 = new ParserSymbol("PREFORMATTED_TEXT", 10);
			$symbol11 = new ParserSymbol("VARIABLE", 11);
			$symbol12 = new ParserSymbol("HTML_TAG", 12);
			$symbol13 = new ParserSymbol("HORIZONTAL_BAR", 13);
			$symbol14 = new ParserSymbol("BOLD_START", 14);
			$symbol15 = new ParserSymbol("BOLD_END", 15);
			$symbol16 = new ParserSymbol("CENTER_START", 16);
			$symbol17 = new ParserSymbol("CENTER_END", 17);
			$symbol18 = new ParserSymbol("CODE", 18);
			$symbol19 = new ParserSymbol("COLOR_START", 19);
			$symbol20 = new ParserSymbol("COLOR_END", 20);
			$symbol21 = new ParserSymbol("ITALIC_START", 21);
			$symbol22 = new ParserSymbol("ITALIC_END", 22);
			$symbol23 = new ParserSymbol("LINK_START", 23);
			$symbol24 = new ParserSymbol("LINK_END", 24);
			$symbol25 = new ParserSymbol("STRIKE_START", 25);
			$symbol26 = new ParserSymbol("STRIKE_END", 26);
			$symbol27 = new ParserSymbol("DOUBLE_DASH", 27);
			$symbol28 = new ParserSymbol("TABLE_START", 28);
			$symbol29 = new ParserSymbol("TABLE_END", 29);
			$symbol30 = new ParserSymbol("TITLE_BAR_START", 30);
			$symbol31 = new ParserSymbol("TITLE_BAR_END", 31);
			$symbol32 = new ParserSymbol("UNDERSCORE_START", 32);
			$symbol33 = new ParserSymbol("UNDERSCORE_END", 33);
			$symbol34 = new ParserSymbol("PAST_LINK_START", 34);
			$symbol35 = new ParserSymbol("PAST_LINK_END", 35);
			$symbol36 = new ParserSymbol("WIKI_LINK_START", 36);
			$symbol37 = new ParserSymbol("WIKI_LINK_END", 37);
			$symbol38 = new ParserSymbol("WIKI_LINK_TYPE_START", 38);
			$symbol39 = new ParserSymbol("WIKI_LINK_TYPE_END", 39);
			$symbol40 = new ParserSymbol("WIKI_UNLINK_START", 40);
			$symbol41 = new ParserSymbol("WIKI_UNLINK_END", 41);
			$symbol42 = new ParserSymbol("WORD_LINK", 42);
			$symbol43 = new ParserSymbol("INLINE_PLUGIN_START", 43);
			$symbol44 = new ParserSymbol("INLINE_PLUGIN_PARAMETERS", 44);
			$symbol45 = new ParserSymbol("PLUGIN_START", 45);
			$symbol46 = new ParserSymbol("PLUGIN_PARAMETERS", 46);
			$symbol47 = new ParserSymbol("PLUGIN_END", 47);
			$symbol48 = new ParserSymbol("LINE_END", 48);
			$symbol49 = new ParserSymbol("FORCED_LINE_END", 49);
			$symbol50 = new ParserSymbol("CHAR", 50);
			$symbol51 = new ParserSymbol("SPECIAL_CHAR", 51);
			$symbol52 = new ParserSymbol("WHITE_SPACE", 52);
			$symbol53 = new ParserSymbol("PRE_BLOCK_START", 53);
			$symbol54 = new ParserSymbol("BLOCK_START", 54);
			$symbol55 = new ParserSymbol("BLOCK_END", 55);
			$this->symbols[0] = $symbol0;
			$this->symbols["accept"] = $symbol0;
			$this->symbols[1] = $symbol1;
			$this->symbols["end"] = $symbol1;
			$this->symbols[2] = $symbol2;
			$this->symbols["error"] = $symbol2;
			$this->symbols[3] = $symbol3;
			$this->symbols["wiki"] = $symbol3;
			$this->symbols[4] = $symbol4;
			$this->symbols["contents"] = $symbol4;
			$this->symbols[5] = $symbol5;
			$this->symbols["EOF"] = $symbol5;
			$this->symbols[6] = $symbol6;
			$this->symbols["content"] = $symbol6;
			$this->symbols[7] = $symbol7;
			$this->symbols["CONTENT"] = $symbol7;
			$this->symbols[8] = $symbol8;
			$this->symbols["COMMENT"] = $symbol8;
			$this->symbols[9] = $symbol9;
			$this->symbols["NO_PARSE"] = $symbol9;
			$this->symbols[10] = $symbol10;
			$this->symbols["PREFORMATTED_TEXT"] = $symbol10;
			$this->symbols[11] = $symbol11;
			$this->symbols["VARIABLE"] = $symbol11;
			$this->symbols[12] = $symbol12;
			$this->symbols["HTML_TAG"] = $symbol12;
			$this->symbols[13] = $symbol13;
			$this->symbols["HORIZONTAL_BAR"] = $symbol13;
			$this->symbols[14] = $symbol14;
			$this->symbols["BOLD_START"] = $symbol14;
			$this->symbols[15] = $symbol15;
			$this->symbols["BOLD_END"] = $symbol15;
			$this->symbols[16] = $symbol16;
			$this->symbols["CENTER_START"] = $symbol16;
			$this->symbols[17] = $symbol17;
			$this->symbols["CENTER_END"] = $symbol17;
			$this->symbols[18] = $symbol18;
			$this->symbols["CODE"] = $symbol18;
			$this->symbols[19] = $symbol19;
			$this->symbols["COLOR_START"] = $symbol19;
			$this->symbols[20] = $symbol20;
			$this->symbols["COLOR_END"] = $symbol20;
			$this->symbols[21] = $symbol21;
			$this->symbols["ITALIC_START"] = $symbol21;
			$this->symbols[22] = $symbol22;
			$this->symbols["ITALIC_END"] = $symbol22;
			$this->symbols[23] = $symbol23;
			$this->symbols["LINK_START"] = $symbol23;
			$this->symbols[24] = $symbol24;
			$this->symbols["LINK_END"] = $symbol24;
			$this->symbols[25] = $symbol25;
			$this->symbols["STRIKE_START"] = $symbol25;
			$this->symbols[26] = $symbol26;
			$this->symbols["STRIKE_END"] = $symbol26;
			$this->symbols[27] = $symbol27;
			$this->symbols["DOUBLE_DASH"] = $symbol27;
			$this->symbols[28] = $symbol28;
			$this->symbols["TABLE_START"] = $symbol28;
			$this->symbols[29] = $symbol29;
			$this->symbols["TABLE_END"] = $symbol29;
			$this->symbols[30] = $symbol30;
			$this->symbols["TITLE_BAR_START"] = $symbol30;
			$this->symbols[31] = $symbol31;
			$this->symbols["TITLE_BAR_END"] = $symbol31;
			$this->symbols[32] = $symbol32;
			$this->symbols["UNDERSCORE_START"] = $symbol32;
			$this->symbols[33] = $symbol33;
			$this->symbols["UNDERSCORE_END"] = $symbol33;
			$this->symbols[34] = $symbol34;
			$this->symbols["PAST_LINK_START"] = $symbol34;
			$this->symbols[35] = $symbol35;
			$this->symbols["PAST_LINK_END"] = $symbol35;
			$this->symbols[36] = $symbol36;
			$this->symbols["WIKI_LINK_START"] = $symbol36;
			$this->symbols[37] = $symbol37;
			$this->symbols["WIKI_LINK_END"] = $symbol37;
			$this->symbols[38] = $symbol38;
			$this->symbols["WIKI_LINK_TYPE_START"] = $symbol38;
			$this->symbols[39] = $symbol39;
			$this->symbols["WIKI_LINK_TYPE_END"] = $symbol39;
			$this->symbols[40] = $symbol40;
			$this->symbols["WIKI_UNLINK_START"] = $symbol40;
			$this->symbols[41] = $symbol41;
			$this->symbols["WIKI_UNLINK_END"] = $symbol41;
			$this->symbols[42] = $symbol42;
			$this->symbols["WORD_LINK"] = $symbol42;
			$this->symbols[43] = $symbol43;
			$this->symbols["INLINE_PLUGIN_START"] = $symbol43;
			$this->symbols[44] = $symbol44;
			$this->symbols["INLINE_PLUGIN_PARAMETERS"] = $symbol44;
			$this->symbols[45] = $symbol45;
			$this->symbols["PLUGIN_START"] = $symbol45;
			$this->symbols[46] = $symbol46;
			$this->symbols["PLUGIN_PARAMETERS"] = $symbol46;
			$this->symbols[47] = $symbol47;
			$this->symbols["PLUGIN_END"] = $symbol47;
			$this->symbols[48] = $symbol48;
			$this->symbols["LINE_END"] = $symbol48;
			$this->symbols[49] = $symbol49;
			$this->symbols["FORCED_LINE_END"] = $symbol49;
			$this->symbols[50] = $symbol50;
			$this->symbols["CHAR"] = $symbol50;
			$this->symbols[51] = $symbol51;
			$this->symbols["SPECIAL_CHAR"] = $symbol51;
			$this->symbols[52] = $symbol52;
			$this->symbols["WHITE_SPACE"] = $symbol52;
			$this->symbols[53] = $symbol53;
			$this->symbols["PRE_BLOCK_START"] = $symbol53;
			$this->symbols[54] = $symbol54;
			$this->symbols["BLOCK_START"] = $symbol54;
			$this->symbols[55] = $symbol55;
			$this->symbols["BLOCK_END"] = $symbol55;

			$this->terminals = array(
					2=>&$symbol2,
					5=>&$symbol5,
					7=>&$symbol7,
					8=>&$symbol8,
					9=>&$symbol9,
					10=>&$symbol10,
					11=>&$symbol11,
					12=>&$symbol12,
					13=>&$symbol13,
					14=>&$symbol14,
					15=>&$symbol15,
					16=>&$symbol16,
					17=>&$symbol17,
					18=>&$symbol18,
					19=>&$symbol19,
					20=>&$symbol20,
					21=>&$symbol21,
					22=>&$symbol22,
					23=>&$symbol23,
					24=>&$symbol24,
					25=>&$symbol25,
					26=>&$symbol26,
					27=>&$symbol27,
					28=>&$symbol28,
					29=>&$symbol29,
					30=>&$symbol30,
					31=>&$symbol31,
					32=>&$symbol32,
					33=>&$symbol33,
					34=>&$symbol34,
					35=>&$symbol35,
					36=>&$symbol36,
					37=>&$symbol37,
					38=>&$symbol38,
					39=>&$symbol39,
					40=>&$symbol40,
					41=>&$symbol41,
					42=>&$symbol42,
					43=>&$symbol43,
					44=>&$symbol44,
					45=>&$symbol45,
					46=>&$symbol46,
					47=>&$symbol47,
					48=>&$symbol48,
					49=>&$symbol49,
					50=>&$symbol50,
					51=>&$symbol51,
					52=>&$symbol52,
					53=>&$symbol53,
					54=>&$symbol54,
					55=>&$symbol55
				);

			$table0 = new ParserState(0);
			$table1 = new ParserState(1);
			$table2 = new ParserState(2);
			$table3 = new ParserState(3);
			$table4 = new ParserState(4);
			$table5 = new ParserState(5);
			$table6 = new ParserState(6);
			$table7 = new ParserState(7);
			$table8 = new ParserState(8);
			$table9 = new ParserState(9);
			$table10 = new ParserState(10);
			$table11 = new ParserState(11);
			$table12 = new ParserState(12);
			$table13 = new ParserState(13);
			$table14 = new ParserState(14);
			$table15 = new ParserState(15);
			$table16 = new ParserState(16);
			$table17 = new ParserState(17);
			$table18 = new ParserState(18);
			$table19 = new ParserState(19);
			$table20 = new ParserState(20);
			$table21 = new ParserState(21);
			$table22 = new ParserState(22);
			$table23 = new ParserState(23);
			$table24 = new ParserState(24);
			$table25 = new ParserState(25);
			$table26 = new ParserState(26);
			$table27 = new ParserState(27);
			$table28 = new ParserState(28);
			$table29 = new ParserState(29);
			$table30 = new ParserState(30);
			$table31 = new ParserState(31);
			$table32 = new ParserState(32);
			$table33 = new ParserState(33);
			$table34 = new ParserState(34);
			$table35 = new ParserState(35);
			$table36 = new ParserState(36);
			$table37 = new ParserState(37);
			$table38 = new ParserState(38);
			$table39 = new ParserState(39);
			$table40 = new ParserState(40);
			$table41 = new ParserState(41);
			$table42 = new ParserState(42);
			$table43 = new ParserState(43);
			$table44 = new ParserState(44);
			$table45 = new ParserState(45);
			$table46 = new ParserState(46);
			$table47 = new ParserState(47);
			$table48 = new ParserState(48);
			$table49 = new ParserState(49);
			$table50 = new ParserState(50);
			$table51 = new ParserState(51);
			$table52 = new ParserState(52);
			$table53 = new ParserState(53);
			$table54 = new ParserState(54);
			$table55 = new ParserState(55);
			$table56 = new ParserState(56);
			$table57 = new ParserState(57);
			$table58 = new ParserState(58);
			$table59 = new ParserState(59);
			$table60 = new ParserState(60);
			$table61 = new ParserState(61);
			$table62 = new ParserState(62);
			$table63 = new ParserState(63);
			$table64 = new ParserState(64);
			$table65 = new ParserState(65);
			$table66 = new ParserState(66);
			$table67 = new ParserState(67);
			$table68 = new ParserState(68);
			$table69 = new ParserState(69);
			$table70 = new ParserState(70);
			$table71 = new ParserState(71);
			$table72 = new ParserState(72);
			$table73 = new ParserState(73);
			$table74 = new ParserState(74);
			$table75 = new ParserState(75);
			$table76 = new ParserState(76);
			$table77 = new ParserState(77);
			$table78 = new ParserState(78);
			$table79 = new ParserState(79);
			$table80 = new ParserState(80);
			$table81 = new ParserState(81);
			$table82 = new ParserState(82);
			$table83 = new ParserState(83);
			$table84 = new ParserState(84);
			$table85 = new ParserState(85);
			$table86 = new ParserState(86);

			$tableDefinition0 = array(
				
					3=>new ParserAction($this->none, $table1),
					4=>new ParserAction($this->none, $table2),
					5=>new ParserAction($this->shift, $table3),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					16=>new ParserAction($this->shift, $table13),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					21=>new ParserAction($this->shift, $table16),
					23=>new ParserAction($this->shift, $table17),
					25=>new ParserAction($this->shift, $table18),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					30=>new ParserAction($this->shift, $table21),
					32=>new ParserAction($this->shift, $table22),
					34=>new ParserAction($this->shift, $table23),
					36=>new ParserAction($this->shift, $table24),
					38=>new ParserAction($this->shift, $table25),
					40=>new ParserAction($this->shift, $table26),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35)
				);

			$tableDefinition1 = array(
				
					1=>new ParserAction($this->accept)
				);

			$tableDefinition2 = array(
				
					1=>new ParserAction($this->reduce, $table1),
					5=>new ParserAction($this->shift, $table36),
					6=>new ParserAction($this->none, $table37),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					16=>new ParserAction($this->shift, $table13),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					21=>new ParserAction($this->shift, $table16),
					23=>new ParserAction($this->shift, $table17),
					25=>new ParserAction($this->shift, $table18),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					30=>new ParserAction($this->shift, $table21),
					32=>new ParserAction($this->shift, $table22),
					34=>new ParserAction($this->shift, $table23),
					36=>new ParserAction($this->shift, $table24),
					38=>new ParserAction($this->shift, $table25),
					40=>new ParserAction($this->shift, $table26),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35)
				);

			$tableDefinition3 = array(
				
					1=>new ParserAction($this->reduce, $table3)
				);

			$tableDefinition4 = array(
				
					1=>new ParserAction($this->reduce, $table4),
					5=>new ParserAction($this->reduce, $table4),
					7=>new ParserAction($this->reduce, $table4),
					8=>new ParserAction($this->reduce, $table4),
					9=>new ParserAction($this->reduce, $table4),
					10=>new ParserAction($this->reduce, $table4),
					11=>new ParserAction($this->reduce, $table4),
					12=>new ParserAction($this->reduce, $table4),
					13=>new ParserAction($this->reduce, $table4),
					14=>new ParserAction($this->reduce, $table4),
					15=>new ParserAction($this->reduce, $table4),
					16=>new ParserAction($this->reduce, $table4),
					17=>new ParserAction($this->reduce, $table4),
					18=>new ParserAction($this->reduce, $table4),
					19=>new ParserAction($this->reduce, $table4),
					20=>new ParserAction($this->reduce, $table4),
					21=>new ParserAction($this->reduce, $table4),
					22=>new ParserAction($this->reduce, $table4),
					23=>new ParserAction($this->reduce, $table4),
					24=>new ParserAction($this->reduce, $table4),
					25=>new ParserAction($this->reduce, $table4),
					26=>new ParserAction($this->reduce, $table4),
					27=>new ParserAction($this->reduce, $table4),
					28=>new ParserAction($this->reduce, $table4),
					29=>new ParserAction($this->reduce, $table4),
					30=>new ParserAction($this->reduce, $table4),
					31=>new ParserAction($this->reduce, $table4),
					32=>new ParserAction($this->reduce, $table4),
					33=>new ParserAction($this->reduce, $table4),
					34=>new ParserAction($this->reduce, $table4),
					35=>new ParserAction($this->reduce, $table4),
					36=>new ParserAction($this->reduce, $table4),
					37=>new ParserAction($this->reduce, $table4),
					38=>new ParserAction($this->reduce, $table4),
					39=>new ParserAction($this->reduce, $table4),
					40=>new ParserAction($this->reduce, $table4),
					41=>new ParserAction($this->reduce, $table4),
					42=>new ParserAction($this->reduce, $table4),
					43=>new ParserAction($this->reduce, $table4),
					45=>new ParserAction($this->reduce, $table4),
					47=>new ParserAction($this->reduce, $table4),
					48=>new ParserAction($this->reduce, $table4),
					49=>new ParserAction($this->reduce, $table4),
					50=>new ParserAction($this->reduce, $table4),
					51=>new ParserAction($this->reduce, $table4),
					52=>new ParserAction($this->reduce, $table4),
					53=>new ParserAction($this->reduce, $table4),
					55=>new ParserAction($this->reduce, $table4)
				);

			$tableDefinition5 = array(
				
					1=>new ParserAction($this->reduce, $table6),
					5=>new ParserAction($this->reduce, $table6),
					7=>new ParserAction($this->reduce, $table6),
					8=>new ParserAction($this->reduce, $table6),
					9=>new ParserAction($this->reduce, $table6),
					10=>new ParserAction($this->reduce, $table6),
					11=>new ParserAction($this->reduce, $table6),
					12=>new ParserAction($this->reduce, $table6),
					13=>new ParserAction($this->reduce, $table6),
					14=>new ParserAction($this->reduce, $table6),
					15=>new ParserAction($this->reduce, $table6),
					16=>new ParserAction($this->reduce, $table6),
					17=>new ParserAction($this->reduce, $table6),
					18=>new ParserAction($this->reduce, $table6),
					19=>new ParserAction($this->reduce, $table6),
					20=>new ParserAction($this->reduce, $table6),
					21=>new ParserAction($this->reduce, $table6),
					22=>new ParserAction($this->reduce, $table6),
					23=>new ParserAction($this->reduce, $table6),
					24=>new ParserAction($this->reduce, $table6),
					25=>new ParserAction($this->reduce, $table6),
					26=>new ParserAction($this->reduce, $table6),
					27=>new ParserAction($this->reduce, $table6),
					28=>new ParserAction($this->reduce, $table6),
					29=>new ParserAction($this->reduce, $table6),
					30=>new ParserAction($this->reduce, $table6),
					31=>new ParserAction($this->reduce, $table6),
					32=>new ParserAction($this->reduce, $table6),
					33=>new ParserAction($this->reduce, $table6),
					34=>new ParserAction($this->reduce, $table6),
					35=>new ParserAction($this->reduce, $table6),
					36=>new ParserAction($this->reduce, $table6),
					37=>new ParserAction($this->reduce, $table6),
					38=>new ParserAction($this->reduce, $table6),
					39=>new ParserAction($this->reduce, $table6),
					40=>new ParserAction($this->reduce, $table6),
					41=>new ParserAction($this->reduce, $table6),
					42=>new ParserAction($this->reduce, $table6),
					43=>new ParserAction($this->reduce, $table6),
					45=>new ParserAction($this->reduce, $table6),
					47=>new ParserAction($this->reduce, $table6),
					48=>new ParserAction($this->reduce, $table6),
					49=>new ParserAction($this->reduce, $table6),
					50=>new ParserAction($this->reduce, $table6),
					51=>new ParserAction($this->reduce, $table6),
					52=>new ParserAction($this->reduce, $table6),
					53=>new ParserAction($this->reduce, $table6),
					55=>new ParserAction($this->reduce, $table6)
				);

			$tableDefinition6 = array(
				
					1=>new ParserAction($this->reduce, $table7),
					5=>new ParserAction($this->reduce, $table7),
					7=>new ParserAction($this->reduce, $table7),
					8=>new ParserAction($this->reduce, $table7),
					9=>new ParserAction($this->reduce, $table7),
					10=>new ParserAction($this->reduce, $table7),
					11=>new ParserAction($this->reduce, $table7),
					12=>new ParserAction($this->reduce, $table7),
					13=>new ParserAction($this->reduce, $table7),
					14=>new ParserAction($this->reduce, $table7),
					15=>new ParserAction($this->reduce, $table7),
					16=>new ParserAction($this->reduce, $table7),
					17=>new ParserAction($this->reduce, $table7),
					18=>new ParserAction($this->reduce, $table7),
					19=>new ParserAction($this->reduce, $table7),
					20=>new ParserAction($this->reduce, $table7),
					21=>new ParserAction($this->reduce, $table7),
					22=>new ParserAction($this->reduce, $table7),
					23=>new ParserAction($this->reduce, $table7),
					24=>new ParserAction($this->reduce, $table7),
					25=>new ParserAction($this->reduce, $table7),
					26=>new ParserAction($this->reduce, $table7),
					27=>new ParserAction($this->reduce, $table7),
					28=>new ParserAction($this->reduce, $table7),
					29=>new ParserAction($this->reduce, $table7),
					30=>new ParserAction($this->reduce, $table7),
					31=>new ParserAction($this->reduce, $table7),
					32=>new ParserAction($this->reduce, $table7),
					33=>new ParserAction($this->reduce, $table7),
					34=>new ParserAction($this->reduce, $table7),
					35=>new ParserAction($this->reduce, $table7),
					36=>new ParserAction($this->reduce, $table7),
					37=>new ParserAction($this->reduce, $table7),
					38=>new ParserAction($this->reduce, $table7),
					39=>new ParserAction($this->reduce, $table7),
					40=>new ParserAction($this->reduce, $table7),
					41=>new ParserAction($this->reduce, $table7),
					42=>new ParserAction($this->reduce, $table7),
					43=>new ParserAction($this->reduce, $table7),
					45=>new ParserAction($this->reduce, $table7),
					47=>new ParserAction($this->reduce, $table7),
					48=>new ParserAction($this->reduce, $table7),
					49=>new ParserAction($this->reduce, $table7),
					50=>new ParserAction($this->reduce, $table7),
					51=>new ParserAction($this->reduce, $table7),
					52=>new ParserAction($this->reduce, $table7),
					53=>new ParserAction($this->reduce, $table7),
					55=>new ParserAction($this->reduce, $table7)
				);

			$tableDefinition7 = array(
				
					1=>new ParserAction($this->reduce, $table8),
					5=>new ParserAction($this->reduce, $table8),
					7=>new ParserAction($this->reduce, $table8),
					8=>new ParserAction($this->reduce, $table8),
					9=>new ParserAction($this->reduce, $table8),
					10=>new ParserAction($this->reduce, $table8),
					11=>new ParserAction($this->reduce, $table8),
					12=>new ParserAction($this->reduce, $table8),
					13=>new ParserAction($this->reduce, $table8),
					14=>new ParserAction($this->reduce, $table8),
					15=>new ParserAction($this->reduce, $table8),
					16=>new ParserAction($this->reduce, $table8),
					17=>new ParserAction($this->reduce, $table8),
					18=>new ParserAction($this->reduce, $table8),
					19=>new ParserAction($this->reduce, $table8),
					20=>new ParserAction($this->reduce, $table8),
					21=>new ParserAction($this->reduce, $table8),
					22=>new ParserAction($this->reduce, $table8),
					23=>new ParserAction($this->reduce, $table8),
					24=>new ParserAction($this->reduce, $table8),
					25=>new ParserAction($this->reduce, $table8),
					26=>new ParserAction($this->reduce, $table8),
					27=>new ParserAction($this->reduce, $table8),
					28=>new ParserAction($this->reduce, $table8),
					29=>new ParserAction($this->reduce, $table8),
					30=>new ParserAction($this->reduce, $table8),
					31=>new ParserAction($this->reduce, $table8),
					32=>new ParserAction($this->reduce, $table8),
					33=>new ParserAction($this->reduce, $table8),
					34=>new ParserAction($this->reduce, $table8),
					35=>new ParserAction($this->reduce, $table8),
					36=>new ParserAction($this->reduce, $table8),
					37=>new ParserAction($this->reduce, $table8),
					38=>new ParserAction($this->reduce, $table8),
					39=>new ParserAction($this->reduce, $table8),
					40=>new ParserAction($this->reduce, $table8),
					41=>new ParserAction($this->reduce, $table8),
					42=>new ParserAction($this->reduce, $table8),
					43=>new ParserAction($this->reduce, $table8),
					45=>new ParserAction($this->reduce, $table8),
					47=>new ParserAction($this->reduce, $table8),
					48=>new ParserAction($this->reduce, $table8),
					49=>new ParserAction($this->reduce, $table8),
					50=>new ParserAction($this->reduce, $table8),
					51=>new ParserAction($this->reduce, $table8),
					52=>new ParserAction($this->reduce, $table8),
					53=>new ParserAction($this->reduce, $table8),
					55=>new ParserAction($this->reduce, $table8)
				);

			$tableDefinition8 = array(
				
					1=>new ParserAction($this->reduce, $table9),
					5=>new ParserAction($this->reduce, $table9),
					7=>new ParserAction($this->reduce, $table9),
					8=>new ParserAction($this->reduce, $table9),
					9=>new ParserAction($this->reduce, $table9),
					10=>new ParserAction($this->reduce, $table9),
					11=>new ParserAction($this->reduce, $table9),
					12=>new ParserAction($this->reduce, $table9),
					13=>new ParserAction($this->reduce, $table9),
					14=>new ParserAction($this->reduce, $table9),
					15=>new ParserAction($this->reduce, $table9),
					16=>new ParserAction($this->reduce, $table9),
					17=>new ParserAction($this->reduce, $table9),
					18=>new ParserAction($this->reduce, $table9),
					19=>new ParserAction($this->reduce, $table9),
					20=>new ParserAction($this->reduce, $table9),
					21=>new ParserAction($this->reduce, $table9),
					22=>new ParserAction($this->reduce, $table9),
					23=>new ParserAction($this->reduce, $table9),
					24=>new ParserAction($this->reduce, $table9),
					25=>new ParserAction($this->reduce, $table9),
					26=>new ParserAction($this->reduce, $table9),
					27=>new ParserAction($this->reduce, $table9),
					28=>new ParserAction($this->reduce, $table9),
					29=>new ParserAction($this->reduce, $table9),
					30=>new ParserAction($this->reduce, $table9),
					31=>new ParserAction($this->reduce, $table9),
					32=>new ParserAction($this->reduce, $table9),
					33=>new ParserAction($this->reduce, $table9),
					34=>new ParserAction($this->reduce, $table9),
					35=>new ParserAction($this->reduce, $table9),
					36=>new ParserAction($this->reduce, $table9),
					37=>new ParserAction($this->reduce, $table9),
					38=>new ParserAction($this->reduce, $table9),
					39=>new ParserAction($this->reduce, $table9),
					40=>new ParserAction($this->reduce, $table9),
					41=>new ParserAction($this->reduce, $table9),
					42=>new ParserAction($this->reduce, $table9),
					43=>new ParserAction($this->reduce, $table9),
					45=>new ParserAction($this->reduce, $table9),
					47=>new ParserAction($this->reduce, $table9),
					48=>new ParserAction($this->reduce, $table9),
					49=>new ParserAction($this->reduce, $table9),
					50=>new ParserAction($this->reduce, $table9),
					51=>new ParserAction($this->reduce, $table9),
					52=>new ParserAction($this->reduce, $table9),
					53=>new ParserAction($this->reduce, $table9),
					55=>new ParserAction($this->reduce, $table9)
				);

			$tableDefinition9 = array(
				
					1=>new ParserAction($this->reduce, $table10),
					5=>new ParserAction($this->reduce, $table10),
					7=>new ParserAction($this->reduce, $table10),
					8=>new ParserAction($this->reduce, $table10),
					9=>new ParserAction($this->reduce, $table10),
					10=>new ParserAction($this->reduce, $table10),
					11=>new ParserAction($this->reduce, $table10),
					12=>new ParserAction($this->reduce, $table10),
					13=>new ParserAction($this->reduce, $table10),
					14=>new ParserAction($this->reduce, $table10),
					15=>new ParserAction($this->reduce, $table10),
					16=>new ParserAction($this->reduce, $table10),
					17=>new ParserAction($this->reduce, $table10),
					18=>new ParserAction($this->reduce, $table10),
					19=>new ParserAction($this->reduce, $table10),
					20=>new ParserAction($this->reduce, $table10),
					21=>new ParserAction($this->reduce, $table10),
					22=>new ParserAction($this->reduce, $table10),
					23=>new ParserAction($this->reduce, $table10),
					24=>new ParserAction($this->reduce, $table10),
					25=>new ParserAction($this->reduce, $table10),
					26=>new ParserAction($this->reduce, $table10),
					27=>new ParserAction($this->reduce, $table10),
					28=>new ParserAction($this->reduce, $table10),
					29=>new ParserAction($this->reduce, $table10),
					30=>new ParserAction($this->reduce, $table10),
					31=>new ParserAction($this->reduce, $table10),
					32=>new ParserAction($this->reduce, $table10),
					33=>new ParserAction($this->reduce, $table10),
					34=>new ParserAction($this->reduce, $table10),
					35=>new ParserAction($this->reduce, $table10),
					36=>new ParserAction($this->reduce, $table10),
					37=>new ParserAction($this->reduce, $table10),
					38=>new ParserAction($this->reduce, $table10),
					39=>new ParserAction($this->reduce, $table10),
					40=>new ParserAction($this->reduce, $table10),
					41=>new ParserAction($this->reduce, $table10),
					42=>new ParserAction($this->reduce, $table10),
					43=>new ParserAction($this->reduce, $table10),
					45=>new ParserAction($this->reduce, $table10),
					47=>new ParserAction($this->reduce, $table10),
					48=>new ParserAction($this->reduce, $table10),
					49=>new ParserAction($this->reduce, $table10),
					50=>new ParserAction($this->reduce, $table10),
					51=>new ParserAction($this->reduce, $table10),
					52=>new ParserAction($this->reduce, $table10),
					53=>new ParserAction($this->reduce, $table10),
					55=>new ParserAction($this->reduce, $table10)
				);

			$tableDefinition10 = array(
				
					1=>new ParserAction($this->reduce, $table11),
					5=>new ParserAction($this->reduce, $table11),
					7=>new ParserAction($this->reduce, $table11),
					8=>new ParserAction($this->reduce, $table11),
					9=>new ParserAction($this->reduce, $table11),
					10=>new ParserAction($this->reduce, $table11),
					11=>new ParserAction($this->reduce, $table11),
					12=>new ParserAction($this->reduce, $table11),
					13=>new ParserAction($this->reduce, $table11),
					14=>new ParserAction($this->reduce, $table11),
					15=>new ParserAction($this->reduce, $table11),
					16=>new ParserAction($this->reduce, $table11),
					17=>new ParserAction($this->reduce, $table11),
					18=>new ParserAction($this->reduce, $table11),
					19=>new ParserAction($this->reduce, $table11),
					20=>new ParserAction($this->reduce, $table11),
					21=>new ParserAction($this->reduce, $table11),
					22=>new ParserAction($this->reduce, $table11),
					23=>new ParserAction($this->reduce, $table11),
					24=>new ParserAction($this->reduce, $table11),
					25=>new ParserAction($this->reduce, $table11),
					26=>new ParserAction($this->reduce, $table11),
					27=>new ParserAction($this->reduce, $table11),
					28=>new ParserAction($this->reduce, $table11),
					29=>new ParserAction($this->reduce, $table11),
					30=>new ParserAction($this->reduce, $table11),
					31=>new ParserAction($this->reduce, $table11),
					32=>new ParserAction($this->reduce, $table11),
					33=>new ParserAction($this->reduce, $table11),
					34=>new ParserAction($this->reduce, $table11),
					35=>new ParserAction($this->reduce, $table11),
					36=>new ParserAction($this->reduce, $table11),
					37=>new ParserAction($this->reduce, $table11),
					38=>new ParserAction($this->reduce, $table11),
					39=>new ParserAction($this->reduce, $table11),
					40=>new ParserAction($this->reduce, $table11),
					41=>new ParserAction($this->reduce, $table11),
					42=>new ParserAction($this->reduce, $table11),
					43=>new ParserAction($this->reduce, $table11),
					45=>new ParserAction($this->reduce, $table11),
					47=>new ParserAction($this->reduce, $table11),
					48=>new ParserAction($this->reduce, $table11),
					49=>new ParserAction($this->reduce, $table11),
					50=>new ParserAction($this->reduce, $table11),
					51=>new ParserAction($this->reduce, $table11),
					52=>new ParserAction($this->reduce, $table11),
					53=>new ParserAction($this->reduce, $table11),
					55=>new ParserAction($this->reduce, $table11)
				);

			$tableDefinition11 = array(
				
					1=>new ParserAction($this->reduce, $table12),
					5=>new ParserAction($this->reduce, $table12),
					7=>new ParserAction($this->reduce, $table12),
					8=>new ParserAction($this->reduce, $table12),
					9=>new ParserAction($this->reduce, $table12),
					10=>new ParserAction($this->reduce, $table12),
					11=>new ParserAction($this->reduce, $table12),
					12=>new ParserAction($this->reduce, $table12),
					13=>new ParserAction($this->reduce, $table12),
					14=>new ParserAction($this->reduce, $table12),
					15=>new ParserAction($this->reduce, $table12),
					16=>new ParserAction($this->reduce, $table12),
					17=>new ParserAction($this->reduce, $table12),
					18=>new ParserAction($this->reduce, $table12),
					19=>new ParserAction($this->reduce, $table12),
					20=>new ParserAction($this->reduce, $table12),
					21=>new ParserAction($this->reduce, $table12),
					22=>new ParserAction($this->reduce, $table12),
					23=>new ParserAction($this->reduce, $table12),
					24=>new ParserAction($this->reduce, $table12),
					25=>new ParserAction($this->reduce, $table12),
					26=>new ParserAction($this->reduce, $table12),
					27=>new ParserAction($this->reduce, $table12),
					28=>new ParserAction($this->reduce, $table12),
					29=>new ParserAction($this->reduce, $table12),
					30=>new ParserAction($this->reduce, $table12),
					31=>new ParserAction($this->reduce, $table12),
					32=>new ParserAction($this->reduce, $table12),
					33=>new ParserAction($this->reduce, $table12),
					34=>new ParserAction($this->reduce, $table12),
					35=>new ParserAction($this->reduce, $table12),
					36=>new ParserAction($this->reduce, $table12),
					37=>new ParserAction($this->reduce, $table12),
					38=>new ParserAction($this->reduce, $table12),
					39=>new ParserAction($this->reduce, $table12),
					40=>new ParserAction($this->reduce, $table12),
					41=>new ParserAction($this->reduce, $table12),
					42=>new ParserAction($this->reduce, $table12),
					43=>new ParserAction($this->reduce, $table12),
					45=>new ParserAction($this->reduce, $table12),
					47=>new ParserAction($this->reduce, $table12),
					48=>new ParserAction($this->reduce, $table12),
					49=>new ParserAction($this->reduce, $table12),
					50=>new ParserAction($this->reduce, $table12),
					51=>new ParserAction($this->reduce, $table12),
					52=>new ParserAction($this->reduce, $table12),
					53=>new ParserAction($this->reduce, $table12),
					55=>new ParserAction($this->reduce, $table12)
				);

			$tableDefinition12 = array(
				
					1=>new ParserAction($this->reduce, $table13),
					4=>new ParserAction($this->none, $table38),
					5=>new ParserAction($this->reduce, $table13),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->shift, $table39),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table13),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table13),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table13),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table13),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table13),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table13),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table13),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table13),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table13),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table13),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table13),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table13),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table13),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table13)
				);

			$tableDefinition13 = array(
				
					1=>new ParserAction($this->reduce, $table17),
					4=>new ParserAction($this->none, $table40),
					5=>new ParserAction($this->reduce, $table17),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table17),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->shift, $table41),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table17),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table17),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table17),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table17),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table17),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table17),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table17),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table17),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table17),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table17),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table17),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table17),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table17)
				);

			$tableDefinition14 = array(
				
					1=>new ParserAction($this->reduce, $table21),
					5=>new ParserAction($this->reduce, $table21),
					7=>new ParserAction($this->reduce, $table21),
					8=>new ParserAction($this->reduce, $table21),
					9=>new ParserAction($this->reduce, $table21),
					10=>new ParserAction($this->reduce, $table21),
					11=>new ParserAction($this->reduce, $table21),
					12=>new ParserAction($this->reduce, $table21),
					13=>new ParserAction($this->reduce, $table21),
					14=>new ParserAction($this->reduce, $table21),
					15=>new ParserAction($this->reduce, $table21),
					16=>new ParserAction($this->reduce, $table21),
					17=>new ParserAction($this->reduce, $table21),
					18=>new ParserAction($this->reduce, $table21),
					19=>new ParserAction($this->reduce, $table21),
					20=>new ParserAction($this->reduce, $table21),
					21=>new ParserAction($this->reduce, $table21),
					22=>new ParserAction($this->reduce, $table21),
					23=>new ParserAction($this->reduce, $table21),
					24=>new ParserAction($this->reduce, $table21),
					25=>new ParserAction($this->reduce, $table21),
					26=>new ParserAction($this->reduce, $table21),
					27=>new ParserAction($this->reduce, $table21),
					28=>new ParserAction($this->reduce, $table21),
					29=>new ParserAction($this->reduce, $table21),
					30=>new ParserAction($this->reduce, $table21),
					31=>new ParserAction($this->reduce, $table21),
					32=>new ParserAction($this->reduce, $table21),
					33=>new ParserAction($this->reduce, $table21),
					34=>new ParserAction($this->reduce, $table21),
					35=>new ParserAction($this->reduce, $table21),
					36=>new ParserAction($this->reduce, $table21),
					37=>new ParserAction($this->reduce, $table21),
					38=>new ParserAction($this->reduce, $table21),
					39=>new ParserAction($this->reduce, $table21),
					40=>new ParserAction($this->reduce, $table21),
					41=>new ParserAction($this->reduce, $table21),
					42=>new ParserAction($this->reduce, $table21),
					43=>new ParserAction($this->reduce, $table21),
					45=>new ParserAction($this->reduce, $table21),
					47=>new ParserAction($this->reduce, $table21),
					48=>new ParserAction($this->reduce, $table21),
					49=>new ParserAction($this->reduce, $table21),
					50=>new ParserAction($this->reduce, $table21),
					51=>new ParserAction($this->reduce, $table21),
					52=>new ParserAction($this->reduce, $table21),
					53=>new ParserAction($this->reduce, $table21),
					55=>new ParserAction($this->reduce, $table21)
				);

			$tableDefinition15 = array(
				
					1=>new ParserAction($this->reduce, $table22),
					4=>new ParserAction($this->none, $table42),
					5=>new ParserAction($this->reduce, $table22),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table22),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table22),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->shift, $table43),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table22),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table22),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table22),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table22),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table22),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table22),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table22),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table22),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table22),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table22),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table22),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table22)
				);

			$tableDefinition16 = array(
				
					1=>new ParserAction($this->reduce, $table26),
					4=>new ParserAction($this->none, $table44),
					5=>new ParserAction($this->reduce, $table26),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table26),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table26),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table26),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->shift, $table45),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table26),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table26),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table26),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table26),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table26),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table26),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table26),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table26),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table26),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table26),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table26)
				);

			$tableDefinition17 = array(
				
					1=>new ParserAction($this->reduce, $table30),
					4=>new ParserAction($this->none, $table46),
					5=>new ParserAction($this->reduce, $table30),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table30),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table30),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table30),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table30),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->shift, $table47),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table30),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table30),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table30),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table30),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table30),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table30),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table30),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table30),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table30),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table30)
				);

			$tableDefinition18 = array(
				
					1=>new ParserAction($this->reduce, $table34),
					4=>new ParserAction($this->none, $table48),
					5=>new ParserAction($this->reduce, $table34),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table34),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table34),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table34),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table34),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table34),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->shift, $table49),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table34),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table34),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table34),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table34),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table34),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table34),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table34),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table34),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table34)
				);

			$tableDefinition19 = array(
				
					1=>new ParserAction($this->reduce, $table38),
					5=>new ParserAction($this->reduce, $table38),
					7=>new ParserAction($this->reduce, $table38),
					8=>new ParserAction($this->reduce, $table38),
					9=>new ParserAction($this->reduce, $table38),
					10=>new ParserAction($this->reduce, $table38),
					11=>new ParserAction($this->reduce, $table38),
					12=>new ParserAction($this->reduce, $table38),
					13=>new ParserAction($this->reduce, $table38),
					14=>new ParserAction($this->reduce, $table38),
					15=>new ParserAction($this->reduce, $table38),
					16=>new ParserAction($this->reduce, $table38),
					17=>new ParserAction($this->reduce, $table38),
					18=>new ParserAction($this->reduce, $table38),
					19=>new ParserAction($this->reduce, $table38),
					20=>new ParserAction($this->reduce, $table38),
					21=>new ParserAction($this->reduce, $table38),
					22=>new ParserAction($this->reduce, $table38),
					23=>new ParserAction($this->reduce, $table38),
					24=>new ParserAction($this->reduce, $table38),
					25=>new ParserAction($this->reduce, $table38),
					26=>new ParserAction($this->reduce, $table38),
					27=>new ParserAction($this->reduce, $table38),
					28=>new ParserAction($this->reduce, $table38),
					29=>new ParserAction($this->reduce, $table38),
					30=>new ParserAction($this->reduce, $table38),
					31=>new ParserAction($this->reduce, $table38),
					32=>new ParserAction($this->reduce, $table38),
					33=>new ParserAction($this->reduce, $table38),
					34=>new ParserAction($this->reduce, $table38),
					35=>new ParserAction($this->reduce, $table38),
					36=>new ParserAction($this->reduce, $table38),
					37=>new ParserAction($this->reduce, $table38),
					38=>new ParserAction($this->reduce, $table38),
					39=>new ParserAction($this->reduce, $table38),
					40=>new ParserAction($this->reduce, $table38),
					41=>new ParserAction($this->reduce, $table38),
					42=>new ParserAction($this->reduce, $table38),
					43=>new ParserAction($this->reduce, $table38),
					45=>new ParserAction($this->reduce, $table38),
					47=>new ParserAction($this->reduce, $table38),
					48=>new ParserAction($this->reduce, $table38),
					49=>new ParserAction($this->reduce, $table38),
					50=>new ParserAction($this->reduce, $table38),
					51=>new ParserAction($this->reduce, $table38),
					52=>new ParserAction($this->reduce, $table38),
					53=>new ParserAction($this->reduce, $table38),
					55=>new ParserAction($this->reduce, $table38)
				);

			$tableDefinition20 = array(
				
					1=>new ParserAction($this->reduce, $table39),
					4=>new ParserAction($this->none, $table50),
					5=>new ParserAction($this->reduce, $table39),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table39),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table39),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table39),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table39),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table39),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table39),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->shift, $table51),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table39),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table39),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table39),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table39),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table39),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table39),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table39),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table39)
				);

			$tableDefinition21 = array(
				
					1=>new ParserAction($this->reduce, $table43),
					4=>new ParserAction($this->none, $table52),
					5=>new ParserAction($this->reduce, $table43),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table43),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table43),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table43),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table43),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table43),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table43),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table43),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->shift, $table53),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table43),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table43),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table43),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table43),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table43),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table43),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table43)
				);

			$tableDefinition22 = array(
				
					1=>new ParserAction($this->reduce, $table47),
					4=>new ParserAction($this->none, $table54),
					5=>new ParserAction($this->reduce, $table47),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table47),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table47),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table47),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table47),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table47),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table47),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table47),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table47),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->shift, $table55),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table47),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table47),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table47),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table47),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table47),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table47)
				);

			$tableDefinition23 = array(
				
					1=>new ParserAction($this->reduce, $table51),
					4=>new ParserAction($this->none, $table56),
					5=>new ParserAction($this->reduce, $table51),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table51),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table51),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table51),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table51),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table51),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table51),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table51),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table51),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table51),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->shift, $table57),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table51),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table51),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table51),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table51),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table51)
				);

			$tableDefinition24 = array(
				
					1=>new ParserAction($this->reduce, $table55),
					4=>new ParserAction($this->none, $table58),
					5=>new ParserAction($this->reduce, $table55),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table55),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table55),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table55),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table55),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table55),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table55),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table55),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table55),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table55),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table55),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->shift, $table59),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table55),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table55),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table55),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table55)
				);

			$tableDefinition25 = array(
				
					1=>new ParserAction($this->reduce, $table59),
					4=>new ParserAction($this->none, $table60),
					5=>new ParserAction($this->reduce, $table59),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table59),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table59),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table59),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table59),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table59),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table59),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table59),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table59),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table59),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table59),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table59),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->shift, $table61),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table59),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table59),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table59)
				);

			$tableDefinition26 = array(
				
					1=>new ParserAction($this->reduce, $table63),
					4=>new ParserAction($this->none, $table62),
					5=>new ParserAction($this->reduce, $table63),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table63),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table63),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table63),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table63),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table63),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table63),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table63),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table63),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table63),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table63),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table63),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table63),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->shift, $table63),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table63),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table63)
				);

			$tableDefinition27 = array(
				
					1=>new ParserAction($this->reduce, $table67),
					5=>new ParserAction($this->reduce, $table67),
					7=>new ParserAction($this->reduce, $table67),
					8=>new ParserAction($this->reduce, $table67),
					9=>new ParserAction($this->reduce, $table67),
					10=>new ParserAction($this->reduce, $table67),
					11=>new ParserAction($this->reduce, $table67),
					12=>new ParserAction($this->reduce, $table67),
					13=>new ParserAction($this->reduce, $table67),
					14=>new ParserAction($this->reduce, $table67),
					15=>new ParserAction($this->reduce, $table67),
					16=>new ParserAction($this->reduce, $table67),
					17=>new ParserAction($this->reduce, $table67),
					18=>new ParserAction($this->reduce, $table67),
					19=>new ParserAction($this->reduce, $table67),
					20=>new ParserAction($this->reduce, $table67),
					21=>new ParserAction($this->reduce, $table67),
					22=>new ParserAction($this->reduce, $table67),
					23=>new ParserAction($this->reduce, $table67),
					24=>new ParserAction($this->reduce, $table67),
					25=>new ParserAction($this->reduce, $table67),
					26=>new ParserAction($this->reduce, $table67),
					27=>new ParserAction($this->reduce, $table67),
					28=>new ParserAction($this->reduce, $table67),
					29=>new ParserAction($this->reduce, $table67),
					30=>new ParserAction($this->reduce, $table67),
					31=>new ParserAction($this->reduce, $table67),
					32=>new ParserAction($this->reduce, $table67),
					33=>new ParserAction($this->reduce, $table67),
					34=>new ParserAction($this->reduce, $table67),
					35=>new ParserAction($this->reduce, $table67),
					36=>new ParserAction($this->reduce, $table67),
					37=>new ParserAction($this->reduce, $table67),
					38=>new ParserAction($this->reduce, $table67),
					39=>new ParserAction($this->reduce, $table67),
					40=>new ParserAction($this->reduce, $table67),
					41=>new ParserAction($this->reduce, $table67),
					42=>new ParserAction($this->reduce, $table67),
					43=>new ParserAction($this->reduce, $table67),
					45=>new ParserAction($this->reduce, $table67),
					47=>new ParserAction($this->reduce, $table67),
					48=>new ParserAction($this->reduce, $table67),
					49=>new ParserAction($this->reduce, $table67),
					50=>new ParserAction($this->reduce, $table67),
					51=>new ParserAction($this->reduce, $table67),
					52=>new ParserAction($this->reduce, $table67),
					53=>new ParserAction($this->reduce, $table67),
					55=>new ParserAction($this->reduce, $table67)
				);

			$tableDefinition28 = array(
				
					1=>new ParserAction($this->reduce, $table68),
					4=>new ParserAction($this->none, $table64),
					5=>new ParserAction($this->reduce, $table68),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table68),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table68),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table68),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table68),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table68),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table68),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table68),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table68),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table68),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table68),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table68),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table68),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table68),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					44=>new ParserAction($this->shift, $table65),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table68),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table68)
				);

			$tableDefinition29 = array(
				
					1=>new ParserAction($this->reduce, $table75),
					5=>new ParserAction($this->reduce, $table75),
					7=>new ParserAction($this->reduce, $table75),
					8=>new ParserAction($this->reduce, $table75),
					9=>new ParserAction($this->reduce, $table75),
					10=>new ParserAction($this->reduce, $table75),
					11=>new ParserAction($this->reduce, $table75),
					12=>new ParserAction($this->reduce, $table75),
					13=>new ParserAction($this->reduce, $table75),
					14=>new ParserAction($this->reduce, $table75),
					15=>new ParserAction($this->reduce, $table75),
					16=>new ParserAction($this->reduce, $table75),
					17=>new ParserAction($this->reduce, $table75),
					18=>new ParserAction($this->reduce, $table75),
					19=>new ParserAction($this->reduce, $table75),
					20=>new ParserAction($this->reduce, $table75),
					21=>new ParserAction($this->reduce, $table75),
					22=>new ParserAction($this->reduce, $table75),
					23=>new ParserAction($this->reduce, $table75),
					24=>new ParserAction($this->reduce, $table75),
					25=>new ParserAction($this->reduce, $table75),
					26=>new ParserAction($this->reduce, $table75),
					27=>new ParserAction($this->reduce, $table75),
					28=>new ParserAction($this->reduce, $table75),
					29=>new ParserAction($this->reduce, $table75),
					30=>new ParserAction($this->reduce, $table75),
					31=>new ParserAction($this->reduce, $table75),
					32=>new ParserAction($this->reduce, $table75),
					33=>new ParserAction($this->reduce, $table75),
					34=>new ParserAction($this->reduce, $table75),
					35=>new ParserAction($this->reduce, $table75),
					36=>new ParserAction($this->reduce, $table75),
					37=>new ParserAction($this->reduce, $table75),
					38=>new ParserAction($this->reduce, $table75),
					39=>new ParserAction($this->reduce, $table75),
					40=>new ParserAction($this->reduce, $table75),
					41=>new ParserAction($this->reduce, $table75),
					42=>new ParserAction($this->reduce, $table75),
					43=>new ParserAction($this->reduce, $table75),
					45=>new ParserAction($this->reduce, $table75),
					46=>new ParserAction($this->shift, $table66),
					47=>new ParserAction($this->reduce, $table75),
					48=>new ParserAction($this->reduce, $table75),
					49=>new ParserAction($this->reduce, $table75),
					50=>new ParserAction($this->reduce, $table75),
					51=>new ParserAction($this->reduce, $table75),
					52=>new ParserAction($this->reduce, $table75),
					53=>new ParserAction($this->reduce, $table75),
					55=>new ParserAction($this->reduce, $table75)
				);

			$tableDefinition30 = array(
				
					1=>new ParserAction($this->reduce, $table76),
					5=>new ParserAction($this->reduce, $table76),
					7=>new ParserAction($this->reduce, $table76),
					8=>new ParserAction($this->reduce, $table76),
					9=>new ParserAction($this->reduce, $table76),
					10=>new ParserAction($this->reduce, $table76),
					11=>new ParserAction($this->reduce, $table76),
					12=>new ParserAction($this->reduce, $table76),
					13=>new ParserAction($this->reduce, $table76),
					14=>new ParserAction($this->reduce, $table76),
					15=>new ParserAction($this->reduce, $table76),
					16=>new ParserAction($this->reduce, $table76),
					17=>new ParserAction($this->reduce, $table76),
					18=>new ParserAction($this->reduce, $table76),
					19=>new ParserAction($this->reduce, $table76),
					20=>new ParserAction($this->reduce, $table76),
					21=>new ParserAction($this->reduce, $table76),
					22=>new ParserAction($this->reduce, $table76),
					23=>new ParserAction($this->reduce, $table76),
					24=>new ParserAction($this->reduce, $table76),
					25=>new ParserAction($this->reduce, $table76),
					26=>new ParserAction($this->reduce, $table76),
					27=>new ParserAction($this->reduce, $table76),
					28=>new ParserAction($this->reduce, $table76),
					29=>new ParserAction($this->reduce, $table76),
					30=>new ParserAction($this->reduce, $table76),
					31=>new ParserAction($this->reduce, $table76),
					32=>new ParserAction($this->reduce, $table76),
					33=>new ParserAction($this->reduce, $table76),
					34=>new ParserAction($this->reduce, $table76),
					35=>new ParserAction($this->reduce, $table76),
					36=>new ParserAction($this->reduce, $table76),
					37=>new ParserAction($this->reduce, $table76),
					38=>new ParserAction($this->reduce, $table76),
					39=>new ParserAction($this->reduce, $table76),
					40=>new ParserAction($this->reduce, $table76),
					41=>new ParserAction($this->reduce, $table76),
					42=>new ParserAction($this->reduce, $table76),
					43=>new ParserAction($this->reduce, $table76),
					45=>new ParserAction($this->reduce, $table76),
					47=>new ParserAction($this->reduce, $table76),
					48=>new ParserAction($this->reduce, $table76),
					49=>new ParserAction($this->reduce, $table76),
					50=>new ParserAction($this->reduce, $table76),
					51=>new ParserAction($this->reduce, $table76),
					52=>new ParserAction($this->reduce, $table76),
					53=>new ParserAction($this->reduce, $table76),
					55=>new ParserAction($this->reduce, $table76)
				);

			$tableDefinition31 = array(
				
					1=>new ParserAction($this->reduce, $table77),
					5=>new ParserAction($this->reduce, $table77),
					7=>new ParserAction($this->reduce, $table77),
					8=>new ParserAction($this->reduce, $table77),
					9=>new ParserAction($this->reduce, $table77),
					10=>new ParserAction($this->reduce, $table77),
					11=>new ParserAction($this->reduce, $table77),
					12=>new ParserAction($this->reduce, $table77),
					13=>new ParserAction($this->reduce, $table77),
					14=>new ParserAction($this->reduce, $table77),
					15=>new ParserAction($this->reduce, $table77),
					16=>new ParserAction($this->reduce, $table77),
					17=>new ParserAction($this->reduce, $table77),
					18=>new ParserAction($this->reduce, $table77),
					19=>new ParserAction($this->reduce, $table77),
					20=>new ParserAction($this->reduce, $table77),
					21=>new ParserAction($this->reduce, $table77),
					22=>new ParserAction($this->reduce, $table77),
					23=>new ParserAction($this->reduce, $table77),
					24=>new ParserAction($this->reduce, $table77),
					25=>new ParserAction($this->reduce, $table77),
					26=>new ParserAction($this->reduce, $table77),
					27=>new ParserAction($this->reduce, $table77),
					28=>new ParserAction($this->reduce, $table77),
					29=>new ParserAction($this->reduce, $table77),
					30=>new ParserAction($this->reduce, $table77),
					31=>new ParserAction($this->reduce, $table77),
					32=>new ParserAction($this->reduce, $table77),
					33=>new ParserAction($this->reduce, $table77),
					34=>new ParserAction($this->reduce, $table77),
					35=>new ParserAction($this->reduce, $table77),
					36=>new ParserAction($this->reduce, $table77),
					37=>new ParserAction($this->reduce, $table77),
					38=>new ParserAction($this->reduce, $table77),
					39=>new ParserAction($this->reduce, $table77),
					40=>new ParserAction($this->reduce, $table77),
					41=>new ParserAction($this->reduce, $table77),
					42=>new ParserAction($this->reduce, $table77),
					43=>new ParserAction($this->reduce, $table77),
					45=>new ParserAction($this->reduce, $table77),
					47=>new ParserAction($this->reduce, $table77),
					48=>new ParserAction($this->reduce, $table77),
					49=>new ParserAction($this->reduce, $table77),
					50=>new ParserAction($this->reduce, $table77),
					51=>new ParserAction($this->reduce, $table77),
					52=>new ParserAction($this->reduce, $table77),
					53=>new ParserAction($this->reduce, $table77),
					55=>new ParserAction($this->reduce, $table77)
				);

			$tableDefinition32 = array(
				
					1=>new ParserAction($this->reduce, $table78),
					5=>new ParserAction($this->reduce, $table78),
					7=>new ParserAction($this->reduce, $table78),
					8=>new ParserAction($this->reduce, $table78),
					9=>new ParserAction($this->reduce, $table78),
					10=>new ParserAction($this->reduce, $table78),
					11=>new ParserAction($this->reduce, $table78),
					12=>new ParserAction($this->reduce, $table78),
					13=>new ParserAction($this->reduce, $table78),
					14=>new ParserAction($this->reduce, $table78),
					15=>new ParserAction($this->reduce, $table78),
					16=>new ParserAction($this->reduce, $table78),
					17=>new ParserAction($this->reduce, $table78),
					18=>new ParserAction($this->reduce, $table78),
					19=>new ParserAction($this->reduce, $table78),
					20=>new ParserAction($this->reduce, $table78),
					21=>new ParserAction($this->reduce, $table78),
					22=>new ParserAction($this->reduce, $table78),
					23=>new ParserAction($this->reduce, $table78),
					24=>new ParserAction($this->reduce, $table78),
					25=>new ParserAction($this->reduce, $table78),
					26=>new ParserAction($this->reduce, $table78),
					27=>new ParserAction($this->reduce, $table78),
					28=>new ParserAction($this->reduce, $table78),
					29=>new ParserAction($this->reduce, $table78),
					30=>new ParserAction($this->reduce, $table78),
					31=>new ParserAction($this->reduce, $table78),
					32=>new ParserAction($this->reduce, $table78),
					33=>new ParserAction($this->reduce, $table78),
					34=>new ParserAction($this->reduce, $table78),
					35=>new ParserAction($this->reduce, $table78),
					36=>new ParserAction($this->reduce, $table78),
					37=>new ParserAction($this->reduce, $table78),
					38=>new ParserAction($this->reduce, $table78),
					39=>new ParserAction($this->reduce, $table78),
					40=>new ParserAction($this->reduce, $table78),
					41=>new ParserAction($this->reduce, $table78),
					42=>new ParserAction($this->reduce, $table78),
					43=>new ParserAction($this->reduce, $table78),
					45=>new ParserAction($this->reduce, $table78),
					47=>new ParserAction($this->reduce, $table78),
					48=>new ParserAction($this->reduce, $table78),
					49=>new ParserAction($this->reduce, $table78),
					50=>new ParserAction($this->reduce, $table78),
					51=>new ParserAction($this->reduce, $table78),
					52=>new ParserAction($this->reduce, $table78),
					53=>new ParserAction($this->reduce, $table78),
					55=>new ParserAction($this->reduce, $table78)
				);

			$tableDefinition33 = array(
				
					1=>new ParserAction($this->reduce, $table79),
					5=>new ParserAction($this->reduce, $table79),
					7=>new ParserAction($this->reduce, $table79),
					8=>new ParserAction($this->reduce, $table79),
					9=>new ParserAction($this->reduce, $table79),
					10=>new ParserAction($this->reduce, $table79),
					11=>new ParserAction($this->reduce, $table79),
					12=>new ParserAction($this->reduce, $table79),
					13=>new ParserAction($this->reduce, $table79),
					14=>new ParserAction($this->reduce, $table79),
					15=>new ParserAction($this->reduce, $table79),
					16=>new ParserAction($this->reduce, $table79),
					17=>new ParserAction($this->reduce, $table79),
					18=>new ParserAction($this->reduce, $table79),
					19=>new ParserAction($this->reduce, $table79),
					20=>new ParserAction($this->reduce, $table79),
					21=>new ParserAction($this->reduce, $table79),
					22=>new ParserAction($this->reduce, $table79),
					23=>new ParserAction($this->reduce, $table79),
					24=>new ParserAction($this->reduce, $table79),
					25=>new ParserAction($this->reduce, $table79),
					26=>new ParserAction($this->reduce, $table79),
					27=>new ParserAction($this->reduce, $table79),
					28=>new ParserAction($this->reduce, $table79),
					29=>new ParserAction($this->reduce, $table79),
					30=>new ParserAction($this->reduce, $table79),
					31=>new ParserAction($this->reduce, $table79),
					32=>new ParserAction($this->reduce, $table79),
					33=>new ParserAction($this->reduce, $table79),
					34=>new ParserAction($this->reduce, $table79),
					35=>new ParserAction($this->reduce, $table79),
					36=>new ParserAction($this->reduce, $table79),
					37=>new ParserAction($this->reduce, $table79),
					38=>new ParserAction($this->reduce, $table79),
					39=>new ParserAction($this->reduce, $table79),
					40=>new ParserAction($this->reduce, $table79),
					41=>new ParserAction($this->reduce, $table79),
					42=>new ParserAction($this->reduce, $table79),
					43=>new ParserAction($this->reduce, $table79),
					45=>new ParserAction($this->reduce, $table79),
					47=>new ParserAction($this->reduce, $table79),
					48=>new ParserAction($this->reduce, $table79),
					49=>new ParserAction($this->reduce, $table79),
					50=>new ParserAction($this->reduce, $table79),
					51=>new ParserAction($this->reduce, $table79),
					52=>new ParserAction($this->reduce, $table79),
					53=>new ParserAction($this->reduce, $table79),
					55=>new ParserAction($this->reduce, $table79)
				);

			$tableDefinition34 = array(
				
					1=>new ParserAction($this->reduce, $table80),
					5=>new ParserAction($this->reduce, $table80),
					7=>new ParserAction($this->reduce, $table80),
					8=>new ParserAction($this->reduce, $table80),
					9=>new ParserAction($this->reduce, $table80),
					10=>new ParserAction($this->reduce, $table80),
					11=>new ParserAction($this->reduce, $table80),
					12=>new ParserAction($this->reduce, $table80),
					13=>new ParserAction($this->reduce, $table80),
					14=>new ParserAction($this->reduce, $table80),
					15=>new ParserAction($this->reduce, $table80),
					16=>new ParserAction($this->reduce, $table80),
					17=>new ParserAction($this->reduce, $table80),
					18=>new ParserAction($this->reduce, $table80),
					19=>new ParserAction($this->reduce, $table80),
					20=>new ParserAction($this->reduce, $table80),
					21=>new ParserAction($this->reduce, $table80),
					22=>new ParserAction($this->reduce, $table80),
					23=>new ParserAction($this->reduce, $table80),
					24=>new ParserAction($this->reduce, $table80),
					25=>new ParserAction($this->reduce, $table80),
					26=>new ParserAction($this->reduce, $table80),
					27=>new ParserAction($this->reduce, $table80),
					28=>new ParserAction($this->reduce, $table80),
					29=>new ParserAction($this->reduce, $table80),
					30=>new ParserAction($this->reduce, $table80),
					31=>new ParserAction($this->reduce, $table80),
					32=>new ParserAction($this->reduce, $table80),
					33=>new ParserAction($this->reduce, $table80),
					34=>new ParserAction($this->reduce, $table80),
					35=>new ParserAction($this->reduce, $table80),
					36=>new ParserAction($this->reduce, $table80),
					37=>new ParserAction($this->reduce, $table80),
					38=>new ParserAction($this->reduce, $table80),
					39=>new ParserAction($this->reduce, $table80),
					40=>new ParserAction($this->reduce, $table80),
					41=>new ParserAction($this->reduce, $table80),
					42=>new ParserAction($this->reduce, $table80),
					43=>new ParserAction($this->reduce, $table80),
					45=>new ParserAction($this->reduce, $table80),
					47=>new ParserAction($this->reduce, $table80),
					48=>new ParserAction($this->reduce, $table80),
					49=>new ParserAction($this->reduce, $table80),
					50=>new ParserAction($this->reduce, $table80),
					51=>new ParserAction($this->reduce, $table80),
					52=>new ParserAction($this->reduce, $table80),
					53=>new ParserAction($this->reduce, $table80),
					55=>new ParserAction($this->reduce, $table80)
				);

			$tableDefinition35 = array(
				
					1=>new ParserAction($this->reduce, $table85),
					5=>new ParserAction($this->reduce, $table85),
					7=>new ParserAction($this->reduce, $table85),
					8=>new ParserAction($this->reduce, $table85),
					9=>new ParserAction($this->reduce, $table85),
					10=>new ParserAction($this->reduce, $table85),
					11=>new ParserAction($this->reduce, $table85),
					12=>new ParserAction($this->reduce, $table85),
					13=>new ParserAction($this->reduce, $table85),
					14=>new ParserAction($this->reduce, $table85),
					15=>new ParserAction($this->reduce, $table85),
					16=>new ParserAction($this->reduce, $table85),
					17=>new ParserAction($this->reduce, $table85),
					18=>new ParserAction($this->reduce, $table85),
					19=>new ParserAction($this->reduce, $table85),
					20=>new ParserAction($this->reduce, $table85),
					21=>new ParserAction($this->reduce, $table85),
					22=>new ParserAction($this->reduce, $table85),
					23=>new ParserAction($this->reduce, $table85),
					24=>new ParserAction($this->reduce, $table85),
					25=>new ParserAction($this->reduce, $table85),
					26=>new ParserAction($this->reduce, $table85),
					27=>new ParserAction($this->reduce, $table85),
					28=>new ParserAction($this->reduce, $table85),
					29=>new ParserAction($this->reduce, $table85),
					30=>new ParserAction($this->reduce, $table85),
					31=>new ParserAction($this->reduce, $table85),
					32=>new ParserAction($this->reduce, $table85),
					33=>new ParserAction($this->reduce, $table85),
					34=>new ParserAction($this->reduce, $table85),
					35=>new ParserAction($this->reduce, $table85),
					36=>new ParserAction($this->reduce, $table85),
					37=>new ParserAction($this->reduce, $table85),
					38=>new ParserAction($this->reduce, $table85),
					39=>new ParserAction($this->reduce, $table85),
					40=>new ParserAction($this->reduce, $table85),
					41=>new ParserAction($this->reduce, $table85),
					42=>new ParserAction($this->reduce, $table85),
					43=>new ParserAction($this->reduce, $table85),
					45=>new ParserAction($this->reduce, $table85),
					47=>new ParserAction($this->reduce, $table85),
					48=>new ParserAction($this->reduce, $table85),
					49=>new ParserAction($this->reduce, $table85),
					50=>new ParserAction($this->reduce, $table85),
					51=>new ParserAction($this->reduce, $table85),
					52=>new ParserAction($this->reduce, $table85),
					53=>new ParserAction($this->reduce, $table85),
					54=>new ParserAction($this->shift, $table67),
					55=>new ParserAction($this->reduce, $table85)
				);

			$tableDefinition36 = array(
				
					1=>new ParserAction($this->reduce, $table2)
				);

			$tableDefinition37 = array(
				
					1=>new ParserAction($this->reduce, $table5),
					5=>new ParserAction($this->reduce, $table5),
					7=>new ParserAction($this->reduce, $table5),
					8=>new ParserAction($this->reduce, $table5),
					9=>new ParserAction($this->reduce, $table5),
					10=>new ParserAction($this->reduce, $table5),
					11=>new ParserAction($this->reduce, $table5),
					12=>new ParserAction($this->reduce, $table5),
					13=>new ParserAction($this->reduce, $table5),
					14=>new ParserAction($this->reduce, $table5),
					15=>new ParserAction($this->reduce, $table5),
					16=>new ParserAction($this->reduce, $table5),
					17=>new ParserAction($this->reduce, $table5),
					18=>new ParserAction($this->reduce, $table5),
					19=>new ParserAction($this->reduce, $table5),
					20=>new ParserAction($this->reduce, $table5),
					21=>new ParserAction($this->reduce, $table5),
					22=>new ParserAction($this->reduce, $table5),
					23=>new ParserAction($this->reduce, $table5),
					24=>new ParserAction($this->reduce, $table5),
					25=>new ParserAction($this->reduce, $table5),
					26=>new ParserAction($this->reduce, $table5),
					27=>new ParserAction($this->reduce, $table5),
					28=>new ParserAction($this->reduce, $table5),
					29=>new ParserAction($this->reduce, $table5),
					30=>new ParserAction($this->reduce, $table5),
					31=>new ParserAction($this->reduce, $table5),
					32=>new ParserAction($this->reduce, $table5),
					33=>new ParserAction($this->reduce, $table5),
					34=>new ParserAction($this->reduce, $table5),
					35=>new ParserAction($this->reduce, $table5),
					36=>new ParserAction($this->reduce, $table5),
					37=>new ParserAction($this->reduce, $table5),
					38=>new ParserAction($this->reduce, $table5),
					39=>new ParserAction($this->reduce, $table5),
					40=>new ParserAction($this->reduce, $table5),
					41=>new ParserAction($this->reduce, $table5),
					42=>new ParserAction($this->reduce, $table5),
					43=>new ParserAction($this->reduce, $table5),
					45=>new ParserAction($this->reduce, $table5),
					47=>new ParserAction($this->reduce, $table5),
					48=>new ParserAction($this->reduce, $table5),
					49=>new ParserAction($this->reduce, $table5),
					50=>new ParserAction($this->reduce, $table5),
					51=>new ParserAction($this->reduce, $table5),
					52=>new ParserAction($this->reduce, $table5),
					53=>new ParserAction($this->reduce, $table5),
					55=>new ParserAction($this->reduce, $table5)
				);

			$tableDefinition38 = array(
				
					1=>new ParserAction($this->reduce, $table14),
					5=>new ParserAction($this->reduce, $table14),
					6=>new ParserAction($this->none, $table37),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->shift, $table68),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table14),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table14),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table14),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table14),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table14),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table14),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table14),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table14),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table14),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table14),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table14),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table14),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table14),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table14)
				);

			$tableDefinition39 = array(
				
					1=>new ParserAction($this->reduce, $table15),
					5=>new ParserAction($this->reduce, $table15),
					7=>new ParserAction($this->reduce, $table15),
					8=>new ParserAction($this->reduce, $table15),
					9=>new ParserAction($this->reduce, $table15),
					10=>new ParserAction($this->reduce, $table15),
					11=>new ParserAction($this->reduce, $table15),
					12=>new ParserAction($this->reduce, $table15),
					13=>new ParserAction($this->reduce, $table15),
					14=>new ParserAction($this->reduce, $table15),
					15=>new ParserAction($this->reduce, $table15),
					16=>new ParserAction($this->reduce, $table15),
					17=>new ParserAction($this->reduce, $table15),
					18=>new ParserAction($this->reduce, $table15),
					19=>new ParserAction($this->reduce, $table15),
					20=>new ParserAction($this->reduce, $table15),
					21=>new ParserAction($this->reduce, $table15),
					22=>new ParserAction($this->reduce, $table15),
					23=>new ParserAction($this->reduce, $table15),
					24=>new ParserAction($this->reduce, $table15),
					25=>new ParserAction($this->reduce, $table15),
					26=>new ParserAction($this->reduce, $table15),
					27=>new ParserAction($this->reduce, $table15),
					28=>new ParserAction($this->reduce, $table15),
					29=>new ParserAction($this->reduce, $table15),
					30=>new ParserAction($this->reduce, $table15),
					31=>new ParserAction($this->reduce, $table15),
					32=>new ParserAction($this->reduce, $table15),
					33=>new ParserAction($this->reduce, $table15),
					34=>new ParserAction($this->reduce, $table15),
					35=>new ParserAction($this->reduce, $table15),
					36=>new ParserAction($this->reduce, $table15),
					37=>new ParserAction($this->reduce, $table15),
					38=>new ParserAction($this->reduce, $table15),
					39=>new ParserAction($this->reduce, $table15),
					40=>new ParserAction($this->reduce, $table15),
					41=>new ParserAction($this->reduce, $table15),
					42=>new ParserAction($this->reduce, $table15),
					43=>new ParserAction($this->reduce, $table15),
					45=>new ParserAction($this->reduce, $table15),
					47=>new ParserAction($this->reduce, $table15),
					48=>new ParserAction($this->reduce, $table15),
					49=>new ParserAction($this->reduce, $table15),
					50=>new ParserAction($this->reduce, $table15),
					51=>new ParserAction($this->reduce, $table15),
					52=>new ParserAction($this->reduce, $table15),
					53=>new ParserAction($this->reduce, $table15),
					55=>new ParserAction($this->reduce, $table15)
				);

			$tableDefinition40 = array(
				
					1=>new ParserAction($this->reduce, $table18),
					5=>new ParserAction($this->reduce, $table18),
					6=>new ParserAction($this->none, $table37),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table18),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->shift, $table69),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table18),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table18),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table18),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table18),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table18),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table18),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table18),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table18),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table18),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table18),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table18),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table18),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table18)
				);

			$tableDefinition41 = array(
				
					1=>new ParserAction($this->reduce, $table19),
					5=>new ParserAction($this->reduce, $table19),
					7=>new ParserAction($this->reduce, $table19),
					8=>new ParserAction($this->reduce, $table19),
					9=>new ParserAction($this->reduce, $table19),
					10=>new ParserAction($this->reduce, $table19),
					11=>new ParserAction($this->reduce, $table19),
					12=>new ParserAction($this->reduce, $table19),
					13=>new ParserAction($this->reduce, $table19),
					14=>new ParserAction($this->reduce, $table19),
					15=>new ParserAction($this->reduce, $table19),
					16=>new ParserAction($this->reduce, $table19),
					17=>new ParserAction($this->reduce, $table19),
					18=>new ParserAction($this->reduce, $table19),
					19=>new ParserAction($this->reduce, $table19),
					20=>new ParserAction($this->reduce, $table19),
					21=>new ParserAction($this->reduce, $table19),
					22=>new ParserAction($this->reduce, $table19),
					23=>new ParserAction($this->reduce, $table19),
					24=>new ParserAction($this->reduce, $table19),
					25=>new ParserAction($this->reduce, $table19),
					26=>new ParserAction($this->reduce, $table19),
					27=>new ParserAction($this->reduce, $table19),
					28=>new ParserAction($this->reduce, $table19),
					29=>new ParserAction($this->reduce, $table19),
					30=>new ParserAction($this->reduce, $table19),
					31=>new ParserAction($this->reduce, $table19),
					32=>new ParserAction($this->reduce, $table19),
					33=>new ParserAction($this->reduce, $table19),
					34=>new ParserAction($this->reduce, $table19),
					35=>new ParserAction($this->reduce, $table19),
					36=>new ParserAction($this->reduce, $table19),
					37=>new ParserAction($this->reduce, $table19),
					38=>new ParserAction($this->reduce, $table19),
					39=>new ParserAction($this->reduce, $table19),
					40=>new ParserAction($this->reduce, $table19),
					41=>new ParserAction($this->reduce, $table19),
					42=>new ParserAction($this->reduce, $table19),
					43=>new ParserAction($this->reduce, $table19),
					45=>new ParserAction($this->reduce, $table19),
					47=>new ParserAction($this->reduce, $table19),
					48=>new ParserAction($this->reduce, $table19),
					49=>new ParserAction($this->reduce, $table19),
					50=>new ParserAction($this->reduce, $table19),
					51=>new ParserAction($this->reduce, $table19),
					52=>new ParserAction($this->reduce, $table19),
					53=>new ParserAction($this->reduce, $table19),
					55=>new ParserAction($this->reduce, $table19)
				);

			$tableDefinition42 = array(
				
					1=>new ParserAction($this->reduce, $table23),
					5=>new ParserAction($this->reduce, $table23),
					6=>new ParserAction($this->none, $table37),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table23),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table23),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->shift, $table70),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table23),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table23),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table23),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table23),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table23),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table23),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table23),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table23),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table23),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table23),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table23),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table23)
				);

			$tableDefinition43 = array(
				
					1=>new ParserAction($this->reduce, $table24),
					5=>new ParserAction($this->reduce, $table24),
					7=>new ParserAction($this->reduce, $table24),
					8=>new ParserAction($this->reduce, $table24),
					9=>new ParserAction($this->reduce, $table24),
					10=>new ParserAction($this->reduce, $table24),
					11=>new ParserAction($this->reduce, $table24),
					12=>new ParserAction($this->reduce, $table24),
					13=>new ParserAction($this->reduce, $table24),
					14=>new ParserAction($this->reduce, $table24),
					15=>new ParserAction($this->reduce, $table24),
					16=>new ParserAction($this->reduce, $table24),
					17=>new ParserAction($this->reduce, $table24),
					18=>new ParserAction($this->reduce, $table24),
					19=>new ParserAction($this->reduce, $table24),
					20=>new ParserAction($this->reduce, $table24),
					21=>new ParserAction($this->reduce, $table24),
					22=>new ParserAction($this->reduce, $table24),
					23=>new ParserAction($this->reduce, $table24),
					24=>new ParserAction($this->reduce, $table24),
					25=>new ParserAction($this->reduce, $table24),
					26=>new ParserAction($this->reduce, $table24),
					27=>new ParserAction($this->reduce, $table24),
					28=>new ParserAction($this->reduce, $table24),
					29=>new ParserAction($this->reduce, $table24),
					30=>new ParserAction($this->reduce, $table24),
					31=>new ParserAction($this->reduce, $table24),
					32=>new ParserAction($this->reduce, $table24),
					33=>new ParserAction($this->reduce, $table24),
					34=>new ParserAction($this->reduce, $table24),
					35=>new ParserAction($this->reduce, $table24),
					36=>new ParserAction($this->reduce, $table24),
					37=>new ParserAction($this->reduce, $table24),
					38=>new ParserAction($this->reduce, $table24),
					39=>new ParserAction($this->reduce, $table24),
					40=>new ParserAction($this->reduce, $table24),
					41=>new ParserAction($this->reduce, $table24),
					42=>new ParserAction($this->reduce, $table24),
					43=>new ParserAction($this->reduce, $table24),
					45=>new ParserAction($this->reduce, $table24),
					47=>new ParserAction($this->reduce, $table24),
					48=>new ParserAction($this->reduce, $table24),
					49=>new ParserAction($this->reduce, $table24),
					50=>new ParserAction($this->reduce, $table24),
					51=>new ParserAction($this->reduce, $table24),
					52=>new ParserAction($this->reduce, $table24),
					53=>new ParserAction($this->reduce, $table24),
					55=>new ParserAction($this->reduce, $table24)
				);

			$tableDefinition44 = array(
				
					1=>new ParserAction($this->reduce, $table27),
					5=>new ParserAction($this->reduce, $table27),
					6=>new ParserAction($this->none, $table37),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table27),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table27),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table27),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->shift, $table71),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table27),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table27),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table27),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table27),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table27),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table27),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table27),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table27),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table27),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table27),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table27)
				);

			$tableDefinition45 = array(
				
					1=>new ParserAction($this->reduce, $table28),
					5=>new ParserAction($this->reduce, $table28),
					7=>new ParserAction($this->reduce, $table28),
					8=>new ParserAction($this->reduce, $table28),
					9=>new ParserAction($this->reduce, $table28),
					10=>new ParserAction($this->reduce, $table28),
					11=>new ParserAction($this->reduce, $table28),
					12=>new ParserAction($this->reduce, $table28),
					13=>new ParserAction($this->reduce, $table28),
					14=>new ParserAction($this->reduce, $table28),
					15=>new ParserAction($this->reduce, $table28),
					16=>new ParserAction($this->reduce, $table28),
					17=>new ParserAction($this->reduce, $table28),
					18=>new ParserAction($this->reduce, $table28),
					19=>new ParserAction($this->reduce, $table28),
					20=>new ParserAction($this->reduce, $table28),
					21=>new ParserAction($this->reduce, $table28),
					22=>new ParserAction($this->reduce, $table28),
					23=>new ParserAction($this->reduce, $table28),
					24=>new ParserAction($this->reduce, $table28),
					25=>new ParserAction($this->reduce, $table28),
					26=>new ParserAction($this->reduce, $table28),
					27=>new ParserAction($this->reduce, $table28),
					28=>new ParserAction($this->reduce, $table28),
					29=>new ParserAction($this->reduce, $table28),
					30=>new ParserAction($this->reduce, $table28),
					31=>new ParserAction($this->reduce, $table28),
					32=>new ParserAction($this->reduce, $table28),
					33=>new ParserAction($this->reduce, $table28),
					34=>new ParserAction($this->reduce, $table28),
					35=>new ParserAction($this->reduce, $table28),
					36=>new ParserAction($this->reduce, $table28),
					37=>new ParserAction($this->reduce, $table28),
					38=>new ParserAction($this->reduce, $table28),
					39=>new ParserAction($this->reduce, $table28),
					40=>new ParserAction($this->reduce, $table28),
					41=>new ParserAction($this->reduce, $table28),
					42=>new ParserAction($this->reduce, $table28),
					43=>new ParserAction($this->reduce, $table28),
					45=>new ParserAction($this->reduce, $table28),
					47=>new ParserAction($this->reduce, $table28),
					48=>new ParserAction($this->reduce, $table28),
					49=>new ParserAction($this->reduce, $table28),
					50=>new ParserAction($this->reduce, $table28),
					51=>new ParserAction($this->reduce, $table28),
					52=>new ParserAction($this->reduce, $table28),
					53=>new ParserAction($this->reduce, $table28),
					55=>new ParserAction($this->reduce, $table28)
				);

			$tableDefinition46 = array(
				
					1=>new ParserAction($this->reduce, $table31),
					5=>new ParserAction($this->reduce, $table31),
					6=>new ParserAction($this->none, $table37),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table31),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table31),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table31),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table31),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->shift, $table72),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table31),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table31),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table31),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table31),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table31),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table31),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table31),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table31),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table31),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table31)
				);

			$tableDefinition47 = array(
				
					1=>new ParserAction($this->reduce, $table32),
					5=>new ParserAction($this->reduce, $table32),
					7=>new ParserAction($this->reduce, $table32),
					8=>new ParserAction($this->reduce, $table32),
					9=>new ParserAction($this->reduce, $table32),
					10=>new ParserAction($this->reduce, $table32),
					11=>new ParserAction($this->reduce, $table32),
					12=>new ParserAction($this->reduce, $table32),
					13=>new ParserAction($this->reduce, $table32),
					14=>new ParserAction($this->reduce, $table32),
					15=>new ParserAction($this->reduce, $table32),
					16=>new ParserAction($this->reduce, $table32),
					17=>new ParserAction($this->reduce, $table32),
					18=>new ParserAction($this->reduce, $table32),
					19=>new ParserAction($this->reduce, $table32),
					20=>new ParserAction($this->reduce, $table32),
					21=>new ParserAction($this->reduce, $table32),
					22=>new ParserAction($this->reduce, $table32),
					23=>new ParserAction($this->reduce, $table32),
					24=>new ParserAction($this->reduce, $table32),
					25=>new ParserAction($this->reduce, $table32),
					26=>new ParserAction($this->reduce, $table32),
					27=>new ParserAction($this->reduce, $table32),
					28=>new ParserAction($this->reduce, $table32),
					29=>new ParserAction($this->reduce, $table32),
					30=>new ParserAction($this->reduce, $table32),
					31=>new ParserAction($this->reduce, $table32),
					32=>new ParserAction($this->reduce, $table32),
					33=>new ParserAction($this->reduce, $table32),
					34=>new ParserAction($this->reduce, $table32),
					35=>new ParserAction($this->reduce, $table32),
					36=>new ParserAction($this->reduce, $table32),
					37=>new ParserAction($this->reduce, $table32),
					38=>new ParserAction($this->reduce, $table32),
					39=>new ParserAction($this->reduce, $table32),
					40=>new ParserAction($this->reduce, $table32),
					41=>new ParserAction($this->reduce, $table32),
					42=>new ParserAction($this->reduce, $table32),
					43=>new ParserAction($this->reduce, $table32),
					45=>new ParserAction($this->reduce, $table32),
					47=>new ParserAction($this->reduce, $table32),
					48=>new ParserAction($this->reduce, $table32),
					49=>new ParserAction($this->reduce, $table32),
					50=>new ParserAction($this->reduce, $table32),
					51=>new ParserAction($this->reduce, $table32),
					52=>new ParserAction($this->reduce, $table32),
					53=>new ParserAction($this->reduce, $table32),
					55=>new ParserAction($this->reduce, $table32)
				);

			$tableDefinition48 = array(
				
					1=>new ParserAction($this->reduce, $table35),
					5=>new ParserAction($this->reduce, $table35),
					6=>new ParserAction($this->none, $table37),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table35),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table35),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table35),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table35),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table35),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->shift, $table73),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table35),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table35),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table35),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table35),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table35),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table35),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table35),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table35),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table35)
				);

			$tableDefinition49 = array(
				
					1=>new ParserAction($this->reduce, $table36),
					5=>new ParserAction($this->reduce, $table36),
					7=>new ParserAction($this->reduce, $table36),
					8=>new ParserAction($this->reduce, $table36),
					9=>new ParserAction($this->reduce, $table36),
					10=>new ParserAction($this->reduce, $table36),
					11=>new ParserAction($this->reduce, $table36),
					12=>new ParserAction($this->reduce, $table36),
					13=>new ParserAction($this->reduce, $table36),
					14=>new ParserAction($this->reduce, $table36),
					15=>new ParserAction($this->reduce, $table36),
					16=>new ParserAction($this->reduce, $table36),
					17=>new ParserAction($this->reduce, $table36),
					18=>new ParserAction($this->reduce, $table36),
					19=>new ParserAction($this->reduce, $table36),
					20=>new ParserAction($this->reduce, $table36),
					21=>new ParserAction($this->reduce, $table36),
					22=>new ParserAction($this->reduce, $table36),
					23=>new ParserAction($this->reduce, $table36),
					24=>new ParserAction($this->reduce, $table36),
					25=>new ParserAction($this->reduce, $table36),
					26=>new ParserAction($this->reduce, $table36),
					27=>new ParserAction($this->reduce, $table36),
					28=>new ParserAction($this->reduce, $table36),
					29=>new ParserAction($this->reduce, $table36),
					30=>new ParserAction($this->reduce, $table36),
					31=>new ParserAction($this->reduce, $table36),
					32=>new ParserAction($this->reduce, $table36),
					33=>new ParserAction($this->reduce, $table36),
					34=>new ParserAction($this->reduce, $table36),
					35=>new ParserAction($this->reduce, $table36),
					36=>new ParserAction($this->reduce, $table36),
					37=>new ParserAction($this->reduce, $table36),
					38=>new ParserAction($this->reduce, $table36),
					39=>new ParserAction($this->reduce, $table36),
					40=>new ParserAction($this->reduce, $table36),
					41=>new ParserAction($this->reduce, $table36),
					42=>new ParserAction($this->reduce, $table36),
					43=>new ParserAction($this->reduce, $table36),
					45=>new ParserAction($this->reduce, $table36),
					47=>new ParserAction($this->reduce, $table36),
					48=>new ParserAction($this->reduce, $table36),
					49=>new ParserAction($this->reduce, $table36),
					50=>new ParserAction($this->reduce, $table36),
					51=>new ParserAction($this->reduce, $table36),
					52=>new ParserAction($this->reduce, $table36),
					53=>new ParserAction($this->reduce, $table36),
					55=>new ParserAction($this->reduce, $table36)
				);

			$tableDefinition50 = array(
				
					1=>new ParserAction($this->reduce, $table40),
					5=>new ParserAction($this->reduce, $table40),
					6=>new ParserAction($this->none, $table37),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table40),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table40),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table40),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table40),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table40),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table40),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->shift, $table74),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table40),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table40),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table40),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table40),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table40),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table40),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table40),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table40)
				);

			$tableDefinition51 = array(
				
					1=>new ParserAction($this->reduce, $table41),
					5=>new ParserAction($this->reduce, $table41),
					7=>new ParserAction($this->reduce, $table41),
					8=>new ParserAction($this->reduce, $table41),
					9=>new ParserAction($this->reduce, $table41),
					10=>new ParserAction($this->reduce, $table41),
					11=>new ParserAction($this->reduce, $table41),
					12=>new ParserAction($this->reduce, $table41),
					13=>new ParserAction($this->reduce, $table41),
					14=>new ParserAction($this->reduce, $table41),
					15=>new ParserAction($this->reduce, $table41),
					16=>new ParserAction($this->reduce, $table41),
					17=>new ParserAction($this->reduce, $table41),
					18=>new ParserAction($this->reduce, $table41),
					19=>new ParserAction($this->reduce, $table41),
					20=>new ParserAction($this->reduce, $table41),
					21=>new ParserAction($this->reduce, $table41),
					22=>new ParserAction($this->reduce, $table41),
					23=>new ParserAction($this->reduce, $table41),
					24=>new ParserAction($this->reduce, $table41),
					25=>new ParserAction($this->reduce, $table41),
					26=>new ParserAction($this->reduce, $table41),
					27=>new ParserAction($this->reduce, $table41),
					28=>new ParserAction($this->reduce, $table41),
					29=>new ParserAction($this->reduce, $table41),
					30=>new ParserAction($this->reduce, $table41),
					31=>new ParserAction($this->reduce, $table41),
					32=>new ParserAction($this->reduce, $table41),
					33=>new ParserAction($this->reduce, $table41),
					34=>new ParserAction($this->reduce, $table41),
					35=>new ParserAction($this->reduce, $table41),
					36=>new ParserAction($this->reduce, $table41),
					37=>new ParserAction($this->reduce, $table41),
					38=>new ParserAction($this->reduce, $table41),
					39=>new ParserAction($this->reduce, $table41),
					40=>new ParserAction($this->reduce, $table41),
					41=>new ParserAction($this->reduce, $table41),
					42=>new ParserAction($this->reduce, $table41),
					43=>new ParserAction($this->reduce, $table41),
					45=>new ParserAction($this->reduce, $table41),
					47=>new ParserAction($this->reduce, $table41),
					48=>new ParserAction($this->reduce, $table41),
					49=>new ParserAction($this->reduce, $table41),
					50=>new ParserAction($this->reduce, $table41),
					51=>new ParserAction($this->reduce, $table41),
					52=>new ParserAction($this->reduce, $table41),
					53=>new ParserAction($this->reduce, $table41),
					55=>new ParserAction($this->reduce, $table41)
				);

			$tableDefinition52 = array(
				
					1=>new ParserAction($this->reduce, $table44),
					5=>new ParserAction($this->reduce, $table44),
					6=>new ParserAction($this->none, $table37),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table44),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table44),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table44),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table44),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table44),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table44),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table44),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->shift, $table75),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table44),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table44),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table44),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table44),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table44),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table44),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table44)
				);

			$tableDefinition53 = array(
				
					1=>new ParserAction($this->reduce, $table45),
					5=>new ParserAction($this->reduce, $table45),
					7=>new ParserAction($this->reduce, $table45),
					8=>new ParserAction($this->reduce, $table45),
					9=>new ParserAction($this->reduce, $table45),
					10=>new ParserAction($this->reduce, $table45),
					11=>new ParserAction($this->reduce, $table45),
					12=>new ParserAction($this->reduce, $table45),
					13=>new ParserAction($this->reduce, $table45),
					14=>new ParserAction($this->reduce, $table45),
					15=>new ParserAction($this->reduce, $table45),
					16=>new ParserAction($this->reduce, $table45),
					17=>new ParserAction($this->reduce, $table45),
					18=>new ParserAction($this->reduce, $table45),
					19=>new ParserAction($this->reduce, $table45),
					20=>new ParserAction($this->reduce, $table45),
					21=>new ParserAction($this->reduce, $table45),
					22=>new ParserAction($this->reduce, $table45),
					23=>new ParserAction($this->reduce, $table45),
					24=>new ParserAction($this->reduce, $table45),
					25=>new ParserAction($this->reduce, $table45),
					26=>new ParserAction($this->reduce, $table45),
					27=>new ParserAction($this->reduce, $table45),
					28=>new ParserAction($this->reduce, $table45),
					29=>new ParserAction($this->reduce, $table45),
					30=>new ParserAction($this->reduce, $table45),
					31=>new ParserAction($this->reduce, $table45),
					32=>new ParserAction($this->reduce, $table45),
					33=>new ParserAction($this->reduce, $table45),
					34=>new ParserAction($this->reduce, $table45),
					35=>new ParserAction($this->reduce, $table45),
					36=>new ParserAction($this->reduce, $table45),
					37=>new ParserAction($this->reduce, $table45),
					38=>new ParserAction($this->reduce, $table45),
					39=>new ParserAction($this->reduce, $table45),
					40=>new ParserAction($this->reduce, $table45),
					41=>new ParserAction($this->reduce, $table45),
					42=>new ParserAction($this->reduce, $table45),
					43=>new ParserAction($this->reduce, $table45),
					45=>new ParserAction($this->reduce, $table45),
					47=>new ParserAction($this->reduce, $table45),
					48=>new ParserAction($this->reduce, $table45),
					49=>new ParserAction($this->reduce, $table45),
					50=>new ParserAction($this->reduce, $table45),
					51=>new ParserAction($this->reduce, $table45),
					52=>new ParserAction($this->reduce, $table45),
					53=>new ParserAction($this->reduce, $table45),
					55=>new ParserAction($this->reduce, $table45)
				);

			$tableDefinition54 = array(
				
					1=>new ParserAction($this->reduce, $table48),
					5=>new ParserAction($this->reduce, $table48),
					6=>new ParserAction($this->none, $table37),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table48),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table48),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table48),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table48),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table48),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table48),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table48),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table48),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->shift, $table76),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table48),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table48),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table48),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table48),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table48),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table48)
				);

			$tableDefinition55 = array(
				
					1=>new ParserAction($this->reduce, $table49),
					5=>new ParserAction($this->reduce, $table49),
					7=>new ParserAction($this->reduce, $table49),
					8=>new ParserAction($this->reduce, $table49),
					9=>new ParserAction($this->reduce, $table49),
					10=>new ParserAction($this->reduce, $table49),
					11=>new ParserAction($this->reduce, $table49),
					12=>new ParserAction($this->reduce, $table49),
					13=>new ParserAction($this->reduce, $table49),
					14=>new ParserAction($this->reduce, $table49),
					15=>new ParserAction($this->reduce, $table49),
					16=>new ParserAction($this->reduce, $table49),
					17=>new ParserAction($this->reduce, $table49),
					18=>new ParserAction($this->reduce, $table49),
					19=>new ParserAction($this->reduce, $table49),
					20=>new ParserAction($this->reduce, $table49),
					21=>new ParserAction($this->reduce, $table49),
					22=>new ParserAction($this->reduce, $table49),
					23=>new ParserAction($this->reduce, $table49),
					24=>new ParserAction($this->reduce, $table49),
					25=>new ParserAction($this->reduce, $table49),
					26=>new ParserAction($this->reduce, $table49),
					27=>new ParserAction($this->reduce, $table49),
					28=>new ParserAction($this->reduce, $table49),
					29=>new ParserAction($this->reduce, $table49),
					30=>new ParserAction($this->reduce, $table49),
					31=>new ParserAction($this->reduce, $table49),
					32=>new ParserAction($this->reduce, $table49),
					33=>new ParserAction($this->reduce, $table49),
					34=>new ParserAction($this->reduce, $table49),
					35=>new ParserAction($this->reduce, $table49),
					36=>new ParserAction($this->reduce, $table49),
					37=>new ParserAction($this->reduce, $table49),
					38=>new ParserAction($this->reduce, $table49),
					39=>new ParserAction($this->reduce, $table49),
					40=>new ParserAction($this->reduce, $table49),
					41=>new ParserAction($this->reduce, $table49),
					42=>new ParserAction($this->reduce, $table49),
					43=>new ParserAction($this->reduce, $table49),
					45=>new ParserAction($this->reduce, $table49),
					47=>new ParserAction($this->reduce, $table49),
					48=>new ParserAction($this->reduce, $table49),
					49=>new ParserAction($this->reduce, $table49),
					50=>new ParserAction($this->reduce, $table49),
					51=>new ParserAction($this->reduce, $table49),
					52=>new ParserAction($this->reduce, $table49),
					53=>new ParserAction($this->reduce, $table49),
					55=>new ParserAction($this->reduce, $table49)
				);

			$tableDefinition56 = array(
				
					1=>new ParserAction($this->reduce, $table52),
					5=>new ParserAction($this->reduce, $table52),
					6=>new ParserAction($this->none, $table37),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table52),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table52),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table52),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table52),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table52),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table52),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table52),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table52),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table52),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->shift, $table77),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table52),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table52),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table52),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table52),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table52)
				);

			$tableDefinition57 = array(
				
					1=>new ParserAction($this->reduce, $table53),
					5=>new ParserAction($this->reduce, $table53),
					7=>new ParserAction($this->reduce, $table53),
					8=>new ParserAction($this->reduce, $table53),
					9=>new ParserAction($this->reduce, $table53),
					10=>new ParserAction($this->reduce, $table53),
					11=>new ParserAction($this->reduce, $table53),
					12=>new ParserAction($this->reduce, $table53),
					13=>new ParserAction($this->reduce, $table53),
					14=>new ParserAction($this->reduce, $table53),
					15=>new ParserAction($this->reduce, $table53),
					16=>new ParserAction($this->reduce, $table53),
					17=>new ParserAction($this->reduce, $table53),
					18=>new ParserAction($this->reduce, $table53),
					19=>new ParserAction($this->reduce, $table53),
					20=>new ParserAction($this->reduce, $table53),
					21=>new ParserAction($this->reduce, $table53),
					22=>new ParserAction($this->reduce, $table53),
					23=>new ParserAction($this->reduce, $table53),
					24=>new ParserAction($this->reduce, $table53),
					25=>new ParserAction($this->reduce, $table53),
					26=>new ParserAction($this->reduce, $table53),
					27=>new ParserAction($this->reduce, $table53),
					28=>new ParserAction($this->reduce, $table53),
					29=>new ParserAction($this->reduce, $table53),
					30=>new ParserAction($this->reduce, $table53),
					31=>new ParserAction($this->reduce, $table53),
					32=>new ParserAction($this->reduce, $table53),
					33=>new ParserAction($this->reduce, $table53),
					34=>new ParserAction($this->reduce, $table53),
					35=>new ParserAction($this->reduce, $table53),
					36=>new ParserAction($this->reduce, $table53),
					37=>new ParserAction($this->reduce, $table53),
					38=>new ParserAction($this->reduce, $table53),
					39=>new ParserAction($this->reduce, $table53),
					40=>new ParserAction($this->reduce, $table53),
					41=>new ParserAction($this->reduce, $table53),
					42=>new ParserAction($this->reduce, $table53),
					43=>new ParserAction($this->reduce, $table53),
					45=>new ParserAction($this->reduce, $table53),
					47=>new ParserAction($this->reduce, $table53),
					48=>new ParserAction($this->reduce, $table53),
					49=>new ParserAction($this->reduce, $table53),
					50=>new ParserAction($this->reduce, $table53),
					51=>new ParserAction($this->reduce, $table53),
					52=>new ParserAction($this->reduce, $table53),
					53=>new ParserAction($this->reduce, $table53),
					55=>new ParserAction($this->reduce, $table53)
				);

			$tableDefinition58 = array(
				
					1=>new ParserAction($this->reduce, $table56),
					5=>new ParserAction($this->reduce, $table56),
					6=>new ParserAction($this->none, $table37),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table56),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table56),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table56),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table56),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table56),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table56),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table56),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table56),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table56),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table56),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->shift, $table78),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table56),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table56),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table56),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table56)
				);

			$tableDefinition59 = array(
				
					1=>new ParserAction($this->reduce, $table57),
					5=>new ParserAction($this->reduce, $table57),
					7=>new ParserAction($this->reduce, $table57),
					8=>new ParserAction($this->reduce, $table57),
					9=>new ParserAction($this->reduce, $table57),
					10=>new ParserAction($this->reduce, $table57),
					11=>new ParserAction($this->reduce, $table57),
					12=>new ParserAction($this->reduce, $table57),
					13=>new ParserAction($this->reduce, $table57),
					14=>new ParserAction($this->reduce, $table57),
					15=>new ParserAction($this->reduce, $table57),
					16=>new ParserAction($this->reduce, $table57),
					17=>new ParserAction($this->reduce, $table57),
					18=>new ParserAction($this->reduce, $table57),
					19=>new ParserAction($this->reduce, $table57),
					20=>new ParserAction($this->reduce, $table57),
					21=>new ParserAction($this->reduce, $table57),
					22=>new ParserAction($this->reduce, $table57),
					23=>new ParserAction($this->reduce, $table57),
					24=>new ParserAction($this->reduce, $table57),
					25=>new ParserAction($this->reduce, $table57),
					26=>new ParserAction($this->reduce, $table57),
					27=>new ParserAction($this->reduce, $table57),
					28=>new ParserAction($this->reduce, $table57),
					29=>new ParserAction($this->reduce, $table57),
					30=>new ParserAction($this->reduce, $table57),
					31=>new ParserAction($this->reduce, $table57),
					32=>new ParserAction($this->reduce, $table57),
					33=>new ParserAction($this->reduce, $table57),
					34=>new ParserAction($this->reduce, $table57),
					35=>new ParserAction($this->reduce, $table57),
					36=>new ParserAction($this->reduce, $table57),
					37=>new ParserAction($this->reduce, $table57),
					38=>new ParserAction($this->reduce, $table57),
					39=>new ParserAction($this->reduce, $table57),
					40=>new ParserAction($this->reduce, $table57),
					41=>new ParserAction($this->reduce, $table57),
					42=>new ParserAction($this->reduce, $table57),
					43=>new ParserAction($this->reduce, $table57),
					45=>new ParserAction($this->reduce, $table57),
					47=>new ParserAction($this->reduce, $table57),
					48=>new ParserAction($this->reduce, $table57),
					49=>new ParserAction($this->reduce, $table57),
					50=>new ParserAction($this->reduce, $table57),
					51=>new ParserAction($this->reduce, $table57),
					52=>new ParserAction($this->reduce, $table57),
					53=>new ParserAction($this->reduce, $table57),
					55=>new ParserAction($this->reduce, $table57)
				);

			$tableDefinition60 = array(
				
					1=>new ParserAction($this->reduce, $table60),
					5=>new ParserAction($this->reduce, $table60),
					6=>new ParserAction($this->none, $table37),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table60),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table60),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table60),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table60),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table60),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table60),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table60),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table60),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table60),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table60),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table60),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->shift, $table79),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table60),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table60),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table60)
				);

			$tableDefinition61 = array(
				
					1=>new ParserAction($this->reduce, $table61),
					5=>new ParserAction($this->reduce, $table61),
					7=>new ParserAction($this->reduce, $table61),
					8=>new ParserAction($this->reduce, $table61),
					9=>new ParserAction($this->reduce, $table61),
					10=>new ParserAction($this->reduce, $table61),
					11=>new ParserAction($this->reduce, $table61),
					12=>new ParserAction($this->reduce, $table61),
					13=>new ParserAction($this->reduce, $table61),
					14=>new ParserAction($this->reduce, $table61),
					15=>new ParserAction($this->reduce, $table61),
					16=>new ParserAction($this->reduce, $table61),
					17=>new ParserAction($this->reduce, $table61),
					18=>new ParserAction($this->reduce, $table61),
					19=>new ParserAction($this->reduce, $table61),
					20=>new ParserAction($this->reduce, $table61),
					21=>new ParserAction($this->reduce, $table61),
					22=>new ParserAction($this->reduce, $table61),
					23=>new ParserAction($this->reduce, $table61),
					24=>new ParserAction($this->reduce, $table61),
					25=>new ParserAction($this->reduce, $table61),
					26=>new ParserAction($this->reduce, $table61),
					27=>new ParserAction($this->reduce, $table61),
					28=>new ParserAction($this->reduce, $table61),
					29=>new ParserAction($this->reduce, $table61),
					30=>new ParserAction($this->reduce, $table61),
					31=>new ParserAction($this->reduce, $table61),
					32=>new ParserAction($this->reduce, $table61),
					33=>new ParserAction($this->reduce, $table61),
					34=>new ParserAction($this->reduce, $table61),
					35=>new ParserAction($this->reduce, $table61),
					36=>new ParserAction($this->reduce, $table61),
					37=>new ParserAction($this->reduce, $table61),
					38=>new ParserAction($this->reduce, $table61),
					39=>new ParserAction($this->reduce, $table61),
					40=>new ParserAction($this->reduce, $table61),
					41=>new ParserAction($this->reduce, $table61),
					42=>new ParserAction($this->reduce, $table61),
					43=>new ParserAction($this->reduce, $table61),
					45=>new ParserAction($this->reduce, $table61),
					47=>new ParserAction($this->reduce, $table61),
					48=>new ParserAction($this->reduce, $table61),
					49=>new ParserAction($this->reduce, $table61),
					50=>new ParserAction($this->reduce, $table61),
					51=>new ParserAction($this->reduce, $table61),
					52=>new ParserAction($this->reduce, $table61),
					53=>new ParserAction($this->reduce, $table61),
					55=>new ParserAction($this->reduce, $table61)
				);

			$tableDefinition62 = array(
				
					1=>new ParserAction($this->reduce, $table64),
					5=>new ParserAction($this->reduce, $table64),
					6=>new ParserAction($this->none, $table37),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table64),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table64),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table64),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table64),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table64),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table64),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table64),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table64),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table64),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table64),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table64),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table64),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->shift, $table80),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table64),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table64)
				);

			$tableDefinition63 = array(
				
					1=>new ParserAction($this->reduce, $table65),
					5=>new ParserAction($this->reduce, $table65),
					7=>new ParserAction($this->reduce, $table65),
					8=>new ParserAction($this->reduce, $table65),
					9=>new ParserAction($this->reduce, $table65),
					10=>new ParserAction($this->reduce, $table65),
					11=>new ParserAction($this->reduce, $table65),
					12=>new ParserAction($this->reduce, $table65),
					13=>new ParserAction($this->reduce, $table65),
					14=>new ParserAction($this->reduce, $table65),
					15=>new ParserAction($this->reduce, $table65),
					16=>new ParserAction($this->reduce, $table65),
					17=>new ParserAction($this->reduce, $table65),
					18=>new ParserAction($this->reduce, $table65),
					19=>new ParserAction($this->reduce, $table65),
					20=>new ParserAction($this->reduce, $table65),
					21=>new ParserAction($this->reduce, $table65),
					22=>new ParserAction($this->reduce, $table65),
					23=>new ParserAction($this->reduce, $table65),
					24=>new ParserAction($this->reduce, $table65),
					25=>new ParserAction($this->reduce, $table65),
					26=>new ParserAction($this->reduce, $table65),
					27=>new ParserAction($this->reduce, $table65),
					28=>new ParserAction($this->reduce, $table65),
					29=>new ParserAction($this->reduce, $table65),
					30=>new ParserAction($this->reduce, $table65),
					31=>new ParserAction($this->reduce, $table65),
					32=>new ParserAction($this->reduce, $table65),
					33=>new ParserAction($this->reduce, $table65),
					34=>new ParserAction($this->reduce, $table65),
					35=>new ParserAction($this->reduce, $table65),
					36=>new ParserAction($this->reduce, $table65),
					37=>new ParserAction($this->reduce, $table65),
					38=>new ParserAction($this->reduce, $table65),
					39=>new ParserAction($this->reduce, $table65),
					40=>new ParserAction($this->reduce, $table65),
					41=>new ParserAction($this->reduce, $table65),
					42=>new ParserAction($this->reduce, $table65),
					43=>new ParserAction($this->reduce, $table65),
					45=>new ParserAction($this->reduce, $table65),
					47=>new ParserAction($this->reduce, $table65),
					48=>new ParserAction($this->reduce, $table65),
					49=>new ParserAction($this->reduce, $table65),
					50=>new ParserAction($this->reduce, $table65),
					51=>new ParserAction($this->reduce, $table65),
					52=>new ParserAction($this->reduce, $table65),
					53=>new ParserAction($this->reduce, $table65),
					55=>new ParserAction($this->reduce, $table65)
				);

			$tableDefinition64 = array(
				
					1=>new ParserAction($this->reduce, $table69),
					5=>new ParserAction($this->reduce, $table69),
					6=>new ParserAction($this->none, $table37),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table69),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table69),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table69),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table69),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table69),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table69),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table69),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table69),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table69),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table69),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table69),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table69),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table69),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table69),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table69)
				);

			$tableDefinition65 = array(
				
					1=>new ParserAction($this->reduce, $table70),
					5=>new ParserAction($this->reduce, $table70),
					7=>new ParserAction($this->reduce, $table70),
					8=>new ParserAction($this->reduce, $table70),
					9=>new ParserAction($this->reduce, $table70),
					10=>new ParserAction($this->reduce, $table70),
					11=>new ParserAction($this->reduce, $table70),
					12=>new ParserAction($this->reduce, $table70),
					13=>new ParserAction($this->reduce, $table70),
					14=>new ParserAction($this->reduce, $table70),
					15=>new ParserAction($this->reduce, $table70),
					16=>new ParserAction($this->reduce, $table70),
					17=>new ParserAction($this->reduce, $table70),
					18=>new ParserAction($this->reduce, $table70),
					19=>new ParserAction($this->reduce, $table70),
					20=>new ParserAction($this->reduce, $table70),
					21=>new ParserAction($this->reduce, $table70),
					22=>new ParserAction($this->reduce, $table70),
					23=>new ParserAction($this->reduce, $table70),
					24=>new ParserAction($this->reduce, $table70),
					25=>new ParserAction($this->reduce, $table70),
					26=>new ParserAction($this->reduce, $table70),
					27=>new ParserAction($this->reduce, $table70),
					28=>new ParserAction($this->reduce, $table70),
					29=>new ParserAction($this->reduce, $table70),
					30=>new ParserAction($this->reduce, $table70),
					31=>new ParserAction($this->reduce, $table70),
					32=>new ParserAction($this->reduce, $table70),
					33=>new ParserAction($this->reduce, $table70),
					34=>new ParserAction($this->reduce, $table70),
					35=>new ParserAction($this->reduce, $table70),
					36=>new ParserAction($this->reduce, $table70),
					37=>new ParserAction($this->reduce, $table70),
					38=>new ParserAction($this->reduce, $table70),
					39=>new ParserAction($this->reduce, $table70),
					40=>new ParserAction($this->reduce, $table70),
					41=>new ParserAction($this->reduce, $table70),
					42=>new ParserAction($this->reduce, $table70),
					43=>new ParserAction($this->reduce, $table70),
					45=>new ParserAction($this->reduce, $table70),
					47=>new ParserAction($this->reduce, $table70),
					48=>new ParserAction($this->reduce, $table70),
					49=>new ParserAction($this->reduce, $table70),
					50=>new ParserAction($this->reduce, $table70),
					51=>new ParserAction($this->reduce, $table70),
					52=>new ParserAction($this->reduce, $table70),
					53=>new ParserAction($this->reduce, $table70),
					55=>new ParserAction($this->reduce, $table70)
				);

			$tableDefinition66 = array(
				
					1=>new ParserAction($this->reduce, $table74),
					4=>new ParserAction($this->none, $table81),
					5=>new ParserAction($this->reduce, $table74),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table74),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table74),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table74),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table74),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table74),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table74),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table74),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table74),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table74),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table74),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table74),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table74),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table74),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->shift, $table82),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table74)
				);

			$tableDefinition67 = array(
				
					1=>new ParserAction($this->reduce, $table84),
					4=>new ParserAction($this->none, $table84),
					5=>new ParserAction($this->reduce, $table84),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table84),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table84),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table84),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table84),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table84),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table84),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table84),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table84),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table84),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table84),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table84),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table84),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table84),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table84),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->shift, $table83)
				);

			$tableDefinition68 = array(
				
					1=>new ParserAction($this->reduce, $table16),
					5=>new ParserAction($this->reduce, $table16),
					7=>new ParserAction($this->reduce, $table16),
					8=>new ParserAction($this->reduce, $table16),
					9=>new ParserAction($this->reduce, $table16),
					10=>new ParserAction($this->reduce, $table16),
					11=>new ParserAction($this->reduce, $table16),
					12=>new ParserAction($this->reduce, $table16),
					13=>new ParserAction($this->reduce, $table16),
					14=>new ParserAction($this->reduce, $table16),
					15=>new ParserAction($this->reduce, $table16),
					16=>new ParserAction($this->reduce, $table16),
					17=>new ParserAction($this->reduce, $table16),
					18=>new ParserAction($this->reduce, $table16),
					19=>new ParserAction($this->reduce, $table16),
					20=>new ParserAction($this->reduce, $table16),
					21=>new ParserAction($this->reduce, $table16),
					22=>new ParserAction($this->reduce, $table16),
					23=>new ParserAction($this->reduce, $table16),
					24=>new ParserAction($this->reduce, $table16),
					25=>new ParserAction($this->reduce, $table16),
					26=>new ParserAction($this->reduce, $table16),
					27=>new ParserAction($this->reduce, $table16),
					28=>new ParserAction($this->reduce, $table16),
					29=>new ParserAction($this->reduce, $table16),
					30=>new ParserAction($this->reduce, $table16),
					31=>new ParserAction($this->reduce, $table16),
					32=>new ParserAction($this->reduce, $table16),
					33=>new ParserAction($this->reduce, $table16),
					34=>new ParserAction($this->reduce, $table16),
					35=>new ParserAction($this->reduce, $table16),
					36=>new ParserAction($this->reduce, $table16),
					37=>new ParserAction($this->reduce, $table16),
					38=>new ParserAction($this->reduce, $table16),
					39=>new ParserAction($this->reduce, $table16),
					40=>new ParserAction($this->reduce, $table16),
					41=>new ParserAction($this->reduce, $table16),
					42=>new ParserAction($this->reduce, $table16),
					43=>new ParserAction($this->reduce, $table16),
					45=>new ParserAction($this->reduce, $table16),
					47=>new ParserAction($this->reduce, $table16),
					48=>new ParserAction($this->reduce, $table16),
					49=>new ParserAction($this->reduce, $table16),
					50=>new ParserAction($this->reduce, $table16),
					51=>new ParserAction($this->reduce, $table16),
					52=>new ParserAction($this->reduce, $table16),
					53=>new ParserAction($this->reduce, $table16),
					55=>new ParserAction($this->reduce, $table16)
				);

			$tableDefinition69 = array(
				
					1=>new ParserAction($this->reduce, $table20),
					5=>new ParserAction($this->reduce, $table20),
					7=>new ParserAction($this->reduce, $table20),
					8=>new ParserAction($this->reduce, $table20),
					9=>new ParserAction($this->reduce, $table20),
					10=>new ParserAction($this->reduce, $table20),
					11=>new ParserAction($this->reduce, $table20),
					12=>new ParserAction($this->reduce, $table20),
					13=>new ParserAction($this->reduce, $table20),
					14=>new ParserAction($this->reduce, $table20),
					15=>new ParserAction($this->reduce, $table20),
					16=>new ParserAction($this->reduce, $table20),
					17=>new ParserAction($this->reduce, $table20),
					18=>new ParserAction($this->reduce, $table20),
					19=>new ParserAction($this->reduce, $table20),
					20=>new ParserAction($this->reduce, $table20),
					21=>new ParserAction($this->reduce, $table20),
					22=>new ParserAction($this->reduce, $table20),
					23=>new ParserAction($this->reduce, $table20),
					24=>new ParserAction($this->reduce, $table20),
					25=>new ParserAction($this->reduce, $table20),
					26=>new ParserAction($this->reduce, $table20),
					27=>new ParserAction($this->reduce, $table20),
					28=>new ParserAction($this->reduce, $table20),
					29=>new ParserAction($this->reduce, $table20),
					30=>new ParserAction($this->reduce, $table20),
					31=>new ParserAction($this->reduce, $table20),
					32=>new ParserAction($this->reduce, $table20),
					33=>new ParserAction($this->reduce, $table20),
					34=>new ParserAction($this->reduce, $table20),
					35=>new ParserAction($this->reduce, $table20),
					36=>new ParserAction($this->reduce, $table20),
					37=>new ParserAction($this->reduce, $table20),
					38=>new ParserAction($this->reduce, $table20),
					39=>new ParserAction($this->reduce, $table20),
					40=>new ParserAction($this->reduce, $table20),
					41=>new ParserAction($this->reduce, $table20),
					42=>new ParserAction($this->reduce, $table20),
					43=>new ParserAction($this->reduce, $table20),
					45=>new ParserAction($this->reduce, $table20),
					47=>new ParserAction($this->reduce, $table20),
					48=>new ParserAction($this->reduce, $table20),
					49=>new ParserAction($this->reduce, $table20),
					50=>new ParserAction($this->reduce, $table20),
					51=>new ParserAction($this->reduce, $table20),
					52=>new ParserAction($this->reduce, $table20),
					53=>new ParserAction($this->reduce, $table20),
					55=>new ParserAction($this->reduce, $table20)
				);

			$tableDefinition70 = array(
				
					1=>new ParserAction($this->reduce, $table25),
					5=>new ParserAction($this->reduce, $table25),
					7=>new ParserAction($this->reduce, $table25),
					8=>new ParserAction($this->reduce, $table25),
					9=>new ParserAction($this->reduce, $table25),
					10=>new ParserAction($this->reduce, $table25),
					11=>new ParserAction($this->reduce, $table25),
					12=>new ParserAction($this->reduce, $table25),
					13=>new ParserAction($this->reduce, $table25),
					14=>new ParserAction($this->reduce, $table25),
					15=>new ParserAction($this->reduce, $table25),
					16=>new ParserAction($this->reduce, $table25),
					17=>new ParserAction($this->reduce, $table25),
					18=>new ParserAction($this->reduce, $table25),
					19=>new ParserAction($this->reduce, $table25),
					20=>new ParserAction($this->reduce, $table25),
					21=>new ParserAction($this->reduce, $table25),
					22=>new ParserAction($this->reduce, $table25),
					23=>new ParserAction($this->reduce, $table25),
					24=>new ParserAction($this->reduce, $table25),
					25=>new ParserAction($this->reduce, $table25),
					26=>new ParserAction($this->reduce, $table25),
					27=>new ParserAction($this->reduce, $table25),
					28=>new ParserAction($this->reduce, $table25),
					29=>new ParserAction($this->reduce, $table25),
					30=>new ParserAction($this->reduce, $table25),
					31=>new ParserAction($this->reduce, $table25),
					32=>new ParserAction($this->reduce, $table25),
					33=>new ParserAction($this->reduce, $table25),
					34=>new ParserAction($this->reduce, $table25),
					35=>new ParserAction($this->reduce, $table25),
					36=>new ParserAction($this->reduce, $table25),
					37=>new ParserAction($this->reduce, $table25),
					38=>new ParserAction($this->reduce, $table25),
					39=>new ParserAction($this->reduce, $table25),
					40=>new ParserAction($this->reduce, $table25),
					41=>new ParserAction($this->reduce, $table25),
					42=>new ParserAction($this->reduce, $table25),
					43=>new ParserAction($this->reduce, $table25),
					45=>new ParserAction($this->reduce, $table25),
					47=>new ParserAction($this->reduce, $table25),
					48=>new ParserAction($this->reduce, $table25),
					49=>new ParserAction($this->reduce, $table25),
					50=>new ParserAction($this->reduce, $table25),
					51=>new ParserAction($this->reduce, $table25),
					52=>new ParserAction($this->reduce, $table25),
					53=>new ParserAction($this->reduce, $table25),
					55=>new ParserAction($this->reduce, $table25)
				);

			$tableDefinition71 = array(
				
					1=>new ParserAction($this->reduce, $table29),
					5=>new ParserAction($this->reduce, $table29),
					7=>new ParserAction($this->reduce, $table29),
					8=>new ParserAction($this->reduce, $table29),
					9=>new ParserAction($this->reduce, $table29),
					10=>new ParserAction($this->reduce, $table29),
					11=>new ParserAction($this->reduce, $table29),
					12=>new ParserAction($this->reduce, $table29),
					13=>new ParserAction($this->reduce, $table29),
					14=>new ParserAction($this->reduce, $table29),
					15=>new ParserAction($this->reduce, $table29),
					16=>new ParserAction($this->reduce, $table29),
					17=>new ParserAction($this->reduce, $table29),
					18=>new ParserAction($this->reduce, $table29),
					19=>new ParserAction($this->reduce, $table29),
					20=>new ParserAction($this->reduce, $table29),
					21=>new ParserAction($this->reduce, $table29),
					22=>new ParserAction($this->reduce, $table29),
					23=>new ParserAction($this->reduce, $table29),
					24=>new ParserAction($this->reduce, $table29),
					25=>new ParserAction($this->reduce, $table29),
					26=>new ParserAction($this->reduce, $table29),
					27=>new ParserAction($this->reduce, $table29),
					28=>new ParserAction($this->reduce, $table29),
					29=>new ParserAction($this->reduce, $table29),
					30=>new ParserAction($this->reduce, $table29),
					31=>new ParserAction($this->reduce, $table29),
					32=>new ParserAction($this->reduce, $table29),
					33=>new ParserAction($this->reduce, $table29),
					34=>new ParserAction($this->reduce, $table29),
					35=>new ParserAction($this->reduce, $table29),
					36=>new ParserAction($this->reduce, $table29),
					37=>new ParserAction($this->reduce, $table29),
					38=>new ParserAction($this->reduce, $table29),
					39=>new ParserAction($this->reduce, $table29),
					40=>new ParserAction($this->reduce, $table29),
					41=>new ParserAction($this->reduce, $table29),
					42=>new ParserAction($this->reduce, $table29),
					43=>new ParserAction($this->reduce, $table29),
					45=>new ParserAction($this->reduce, $table29),
					47=>new ParserAction($this->reduce, $table29),
					48=>new ParserAction($this->reduce, $table29),
					49=>new ParserAction($this->reduce, $table29),
					50=>new ParserAction($this->reduce, $table29),
					51=>new ParserAction($this->reduce, $table29),
					52=>new ParserAction($this->reduce, $table29),
					53=>new ParserAction($this->reduce, $table29),
					55=>new ParserAction($this->reduce, $table29)
				);

			$tableDefinition72 = array(
				
					1=>new ParserAction($this->reduce, $table33),
					5=>new ParserAction($this->reduce, $table33),
					7=>new ParserAction($this->reduce, $table33),
					8=>new ParserAction($this->reduce, $table33),
					9=>new ParserAction($this->reduce, $table33),
					10=>new ParserAction($this->reduce, $table33),
					11=>new ParserAction($this->reduce, $table33),
					12=>new ParserAction($this->reduce, $table33),
					13=>new ParserAction($this->reduce, $table33),
					14=>new ParserAction($this->reduce, $table33),
					15=>new ParserAction($this->reduce, $table33),
					16=>new ParserAction($this->reduce, $table33),
					17=>new ParserAction($this->reduce, $table33),
					18=>new ParserAction($this->reduce, $table33),
					19=>new ParserAction($this->reduce, $table33),
					20=>new ParserAction($this->reduce, $table33),
					21=>new ParserAction($this->reduce, $table33),
					22=>new ParserAction($this->reduce, $table33),
					23=>new ParserAction($this->reduce, $table33),
					24=>new ParserAction($this->reduce, $table33),
					25=>new ParserAction($this->reduce, $table33),
					26=>new ParserAction($this->reduce, $table33),
					27=>new ParserAction($this->reduce, $table33),
					28=>new ParserAction($this->reduce, $table33),
					29=>new ParserAction($this->reduce, $table33),
					30=>new ParserAction($this->reduce, $table33),
					31=>new ParserAction($this->reduce, $table33),
					32=>new ParserAction($this->reduce, $table33),
					33=>new ParserAction($this->reduce, $table33),
					34=>new ParserAction($this->reduce, $table33),
					35=>new ParserAction($this->reduce, $table33),
					36=>new ParserAction($this->reduce, $table33),
					37=>new ParserAction($this->reduce, $table33),
					38=>new ParserAction($this->reduce, $table33),
					39=>new ParserAction($this->reduce, $table33),
					40=>new ParserAction($this->reduce, $table33),
					41=>new ParserAction($this->reduce, $table33),
					42=>new ParserAction($this->reduce, $table33),
					43=>new ParserAction($this->reduce, $table33),
					45=>new ParserAction($this->reduce, $table33),
					47=>new ParserAction($this->reduce, $table33),
					48=>new ParserAction($this->reduce, $table33),
					49=>new ParserAction($this->reduce, $table33),
					50=>new ParserAction($this->reduce, $table33),
					51=>new ParserAction($this->reduce, $table33),
					52=>new ParserAction($this->reduce, $table33),
					53=>new ParserAction($this->reduce, $table33),
					55=>new ParserAction($this->reduce, $table33)
				);

			$tableDefinition73 = array(
				
					1=>new ParserAction($this->reduce, $table37),
					5=>new ParserAction($this->reduce, $table37),
					7=>new ParserAction($this->reduce, $table37),
					8=>new ParserAction($this->reduce, $table37),
					9=>new ParserAction($this->reduce, $table37),
					10=>new ParserAction($this->reduce, $table37),
					11=>new ParserAction($this->reduce, $table37),
					12=>new ParserAction($this->reduce, $table37),
					13=>new ParserAction($this->reduce, $table37),
					14=>new ParserAction($this->reduce, $table37),
					15=>new ParserAction($this->reduce, $table37),
					16=>new ParserAction($this->reduce, $table37),
					17=>new ParserAction($this->reduce, $table37),
					18=>new ParserAction($this->reduce, $table37),
					19=>new ParserAction($this->reduce, $table37),
					20=>new ParserAction($this->reduce, $table37),
					21=>new ParserAction($this->reduce, $table37),
					22=>new ParserAction($this->reduce, $table37),
					23=>new ParserAction($this->reduce, $table37),
					24=>new ParserAction($this->reduce, $table37),
					25=>new ParserAction($this->reduce, $table37),
					26=>new ParserAction($this->reduce, $table37),
					27=>new ParserAction($this->reduce, $table37),
					28=>new ParserAction($this->reduce, $table37),
					29=>new ParserAction($this->reduce, $table37),
					30=>new ParserAction($this->reduce, $table37),
					31=>new ParserAction($this->reduce, $table37),
					32=>new ParserAction($this->reduce, $table37),
					33=>new ParserAction($this->reduce, $table37),
					34=>new ParserAction($this->reduce, $table37),
					35=>new ParserAction($this->reduce, $table37),
					36=>new ParserAction($this->reduce, $table37),
					37=>new ParserAction($this->reduce, $table37),
					38=>new ParserAction($this->reduce, $table37),
					39=>new ParserAction($this->reduce, $table37),
					40=>new ParserAction($this->reduce, $table37),
					41=>new ParserAction($this->reduce, $table37),
					42=>new ParserAction($this->reduce, $table37),
					43=>new ParserAction($this->reduce, $table37),
					45=>new ParserAction($this->reduce, $table37),
					47=>new ParserAction($this->reduce, $table37),
					48=>new ParserAction($this->reduce, $table37),
					49=>new ParserAction($this->reduce, $table37),
					50=>new ParserAction($this->reduce, $table37),
					51=>new ParserAction($this->reduce, $table37),
					52=>new ParserAction($this->reduce, $table37),
					53=>new ParserAction($this->reduce, $table37),
					55=>new ParserAction($this->reduce, $table37)
				);

			$tableDefinition74 = array(
				
					1=>new ParserAction($this->reduce, $table42),
					5=>new ParserAction($this->reduce, $table42),
					7=>new ParserAction($this->reduce, $table42),
					8=>new ParserAction($this->reduce, $table42),
					9=>new ParserAction($this->reduce, $table42),
					10=>new ParserAction($this->reduce, $table42),
					11=>new ParserAction($this->reduce, $table42),
					12=>new ParserAction($this->reduce, $table42),
					13=>new ParserAction($this->reduce, $table42),
					14=>new ParserAction($this->reduce, $table42),
					15=>new ParserAction($this->reduce, $table42),
					16=>new ParserAction($this->reduce, $table42),
					17=>new ParserAction($this->reduce, $table42),
					18=>new ParserAction($this->reduce, $table42),
					19=>new ParserAction($this->reduce, $table42),
					20=>new ParserAction($this->reduce, $table42),
					21=>new ParserAction($this->reduce, $table42),
					22=>new ParserAction($this->reduce, $table42),
					23=>new ParserAction($this->reduce, $table42),
					24=>new ParserAction($this->reduce, $table42),
					25=>new ParserAction($this->reduce, $table42),
					26=>new ParserAction($this->reduce, $table42),
					27=>new ParserAction($this->reduce, $table42),
					28=>new ParserAction($this->reduce, $table42),
					29=>new ParserAction($this->reduce, $table42),
					30=>new ParserAction($this->reduce, $table42),
					31=>new ParserAction($this->reduce, $table42),
					32=>new ParserAction($this->reduce, $table42),
					33=>new ParserAction($this->reduce, $table42),
					34=>new ParserAction($this->reduce, $table42),
					35=>new ParserAction($this->reduce, $table42),
					36=>new ParserAction($this->reduce, $table42),
					37=>new ParserAction($this->reduce, $table42),
					38=>new ParserAction($this->reduce, $table42),
					39=>new ParserAction($this->reduce, $table42),
					40=>new ParserAction($this->reduce, $table42),
					41=>new ParserAction($this->reduce, $table42),
					42=>new ParserAction($this->reduce, $table42),
					43=>new ParserAction($this->reduce, $table42),
					45=>new ParserAction($this->reduce, $table42),
					47=>new ParserAction($this->reduce, $table42),
					48=>new ParserAction($this->reduce, $table42),
					49=>new ParserAction($this->reduce, $table42),
					50=>new ParserAction($this->reduce, $table42),
					51=>new ParserAction($this->reduce, $table42),
					52=>new ParserAction($this->reduce, $table42),
					53=>new ParserAction($this->reduce, $table42),
					55=>new ParserAction($this->reduce, $table42)
				);

			$tableDefinition75 = array(
				
					1=>new ParserAction($this->reduce, $table46),
					5=>new ParserAction($this->reduce, $table46),
					7=>new ParserAction($this->reduce, $table46),
					8=>new ParserAction($this->reduce, $table46),
					9=>new ParserAction($this->reduce, $table46),
					10=>new ParserAction($this->reduce, $table46),
					11=>new ParserAction($this->reduce, $table46),
					12=>new ParserAction($this->reduce, $table46),
					13=>new ParserAction($this->reduce, $table46),
					14=>new ParserAction($this->reduce, $table46),
					15=>new ParserAction($this->reduce, $table46),
					16=>new ParserAction($this->reduce, $table46),
					17=>new ParserAction($this->reduce, $table46),
					18=>new ParserAction($this->reduce, $table46),
					19=>new ParserAction($this->reduce, $table46),
					20=>new ParserAction($this->reduce, $table46),
					21=>new ParserAction($this->reduce, $table46),
					22=>new ParserAction($this->reduce, $table46),
					23=>new ParserAction($this->reduce, $table46),
					24=>new ParserAction($this->reduce, $table46),
					25=>new ParserAction($this->reduce, $table46),
					26=>new ParserAction($this->reduce, $table46),
					27=>new ParserAction($this->reduce, $table46),
					28=>new ParserAction($this->reduce, $table46),
					29=>new ParserAction($this->reduce, $table46),
					30=>new ParserAction($this->reduce, $table46),
					31=>new ParserAction($this->reduce, $table46),
					32=>new ParserAction($this->reduce, $table46),
					33=>new ParserAction($this->reduce, $table46),
					34=>new ParserAction($this->reduce, $table46),
					35=>new ParserAction($this->reduce, $table46),
					36=>new ParserAction($this->reduce, $table46),
					37=>new ParserAction($this->reduce, $table46),
					38=>new ParserAction($this->reduce, $table46),
					39=>new ParserAction($this->reduce, $table46),
					40=>new ParserAction($this->reduce, $table46),
					41=>new ParserAction($this->reduce, $table46),
					42=>new ParserAction($this->reduce, $table46),
					43=>new ParserAction($this->reduce, $table46),
					45=>new ParserAction($this->reduce, $table46),
					47=>new ParserAction($this->reduce, $table46),
					48=>new ParserAction($this->reduce, $table46),
					49=>new ParserAction($this->reduce, $table46),
					50=>new ParserAction($this->reduce, $table46),
					51=>new ParserAction($this->reduce, $table46),
					52=>new ParserAction($this->reduce, $table46),
					53=>new ParserAction($this->reduce, $table46),
					55=>new ParserAction($this->reduce, $table46)
				);

			$tableDefinition76 = array(
				
					1=>new ParserAction($this->reduce, $table50),
					5=>new ParserAction($this->reduce, $table50),
					7=>new ParserAction($this->reduce, $table50),
					8=>new ParserAction($this->reduce, $table50),
					9=>new ParserAction($this->reduce, $table50),
					10=>new ParserAction($this->reduce, $table50),
					11=>new ParserAction($this->reduce, $table50),
					12=>new ParserAction($this->reduce, $table50),
					13=>new ParserAction($this->reduce, $table50),
					14=>new ParserAction($this->reduce, $table50),
					15=>new ParserAction($this->reduce, $table50),
					16=>new ParserAction($this->reduce, $table50),
					17=>new ParserAction($this->reduce, $table50),
					18=>new ParserAction($this->reduce, $table50),
					19=>new ParserAction($this->reduce, $table50),
					20=>new ParserAction($this->reduce, $table50),
					21=>new ParserAction($this->reduce, $table50),
					22=>new ParserAction($this->reduce, $table50),
					23=>new ParserAction($this->reduce, $table50),
					24=>new ParserAction($this->reduce, $table50),
					25=>new ParserAction($this->reduce, $table50),
					26=>new ParserAction($this->reduce, $table50),
					27=>new ParserAction($this->reduce, $table50),
					28=>new ParserAction($this->reduce, $table50),
					29=>new ParserAction($this->reduce, $table50),
					30=>new ParserAction($this->reduce, $table50),
					31=>new ParserAction($this->reduce, $table50),
					32=>new ParserAction($this->reduce, $table50),
					33=>new ParserAction($this->reduce, $table50),
					34=>new ParserAction($this->reduce, $table50),
					35=>new ParserAction($this->reduce, $table50),
					36=>new ParserAction($this->reduce, $table50),
					37=>new ParserAction($this->reduce, $table50),
					38=>new ParserAction($this->reduce, $table50),
					39=>new ParserAction($this->reduce, $table50),
					40=>new ParserAction($this->reduce, $table50),
					41=>new ParserAction($this->reduce, $table50),
					42=>new ParserAction($this->reduce, $table50),
					43=>new ParserAction($this->reduce, $table50),
					45=>new ParserAction($this->reduce, $table50),
					47=>new ParserAction($this->reduce, $table50),
					48=>new ParserAction($this->reduce, $table50),
					49=>new ParserAction($this->reduce, $table50),
					50=>new ParserAction($this->reduce, $table50),
					51=>new ParserAction($this->reduce, $table50),
					52=>new ParserAction($this->reduce, $table50),
					53=>new ParserAction($this->reduce, $table50),
					55=>new ParserAction($this->reduce, $table50)
				);

			$tableDefinition77 = array(
				
					1=>new ParserAction($this->reduce, $table54),
					5=>new ParserAction($this->reduce, $table54),
					7=>new ParserAction($this->reduce, $table54),
					8=>new ParserAction($this->reduce, $table54),
					9=>new ParserAction($this->reduce, $table54),
					10=>new ParserAction($this->reduce, $table54),
					11=>new ParserAction($this->reduce, $table54),
					12=>new ParserAction($this->reduce, $table54),
					13=>new ParserAction($this->reduce, $table54),
					14=>new ParserAction($this->reduce, $table54),
					15=>new ParserAction($this->reduce, $table54),
					16=>new ParserAction($this->reduce, $table54),
					17=>new ParserAction($this->reduce, $table54),
					18=>new ParserAction($this->reduce, $table54),
					19=>new ParserAction($this->reduce, $table54),
					20=>new ParserAction($this->reduce, $table54),
					21=>new ParserAction($this->reduce, $table54),
					22=>new ParserAction($this->reduce, $table54),
					23=>new ParserAction($this->reduce, $table54),
					24=>new ParserAction($this->reduce, $table54),
					25=>new ParserAction($this->reduce, $table54),
					26=>new ParserAction($this->reduce, $table54),
					27=>new ParserAction($this->reduce, $table54),
					28=>new ParserAction($this->reduce, $table54),
					29=>new ParserAction($this->reduce, $table54),
					30=>new ParserAction($this->reduce, $table54),
					31=>new ParserAction($this->reduce, $table54),
					32=>new ParserAction($this->reduce, $table54),
					33=>new ParserAction($this->reduce, $table54),
					34=>new ParserAction($this->reduce, $table54),
					35=>new ParserAction($this->reduce, $table54),
					36=>new ParserAction($this->reduce, $table54),
					37=>new ParserAction($this->reduce, $table54),
					38=>new ParserAction($this->reduce, $table54),
					39=>new ParserAction($this->reduce, $table54),
					40=>new ParserAction($this->reduce, $table54),
					41=>new ParserAction($this->reduce, $table54),
					42=>new ParserAction($this->reduce, $table54),
					43=>new ParserAction($this->reduce, $table54),
					45=>new ParserAction($this->reduce, $table54),
					47=>new ParserAction($this->reduce, $table54),
					48=>new ParserAction($this->reduce, $table54),
					49=>new ParserAction($this->reduce, $table54),
					50=>new ParserAction($this->reduce, $table54),
					51=>new ParserAction($this->reduce, $table54),
					52=>new ParserAction($this->reduce, $table54),
					53=>new ParserAction($this->reduce, $table54),
					55=>new ParserAction($this->reduce, $table54)
				);

			$tableDefinition78 = array(
				
					1=>new ParserAction($this->reduce, $table58),
					5=>new ParserAction($this->reduce, $table58),
					7=>new ParserAction($this->reduce, $table58),
					8=>new ParserAction($this->reduce, $table58),
					9=>new ParserAction($this->reduce, $table58),
					10=>new ParserAction($this->reduce, $table58),
					11=>new ParserAction($this->reduce, $table58),
					12=>new ParserAction($this->reduce, $table58),
					13=>new ParserAction($this->reduce, $table58),
					14=>new ParserAction($this->reduce, $table58),
					15=>new ParserAction($this->reduce, $table58),
					16=>new ParserAction($this->reduce, $table58),
					17=>new ParserAction($this->reduce, $table58),
					18=>new ParserAction($this->reduce, $table58),
					19=>new ParserAction($this->reduce, $table58),
					20=>new ParserAction($this->reduce, $table58),
					21=>new ParserAction($this->reduce, $table58),
					22=>new ParserAction($this->reduce, $table58),
					23=>new ParserAction($this->reduce, $table58),
					24=>new ParserAction($this->reduce, $table58),
					25=>new ParserAction($this->reduce, $table58),
					26=>new ParserAction($this->reduce, $table58),
					27=>new ParserAction($this->reduce, $table58),
					28=>new ParserAction($this->reduce, $table58),
					29=>new ParserAction($this->reduce, $table58),
					30=>new ParserAction($this->reduce, $table58),
					31=>new ParserAction($this->reduce, $table58),
					32=>new ParserAction($this->reduce, $table58),
					33=>new ParserAction($this->reduce, $table58),
					34=>new ParserAction($this->reduce, $table58),
					35=>new ParserAction($this->reduce, $table58),
					36=>new ParserAction($this->reduce, $table58),
					37=>new ParserAction($this->reduce, $table58),
					38=>new ParserAction($this->reduce, $table58),
					39=>new ParserAction($this->reduce, $table58),
					40=>new ParserAction($this->reduce, $table58),
					41=>new ParserAction($this->reduce, $table58),
					42=>new ParserAction($this->reduce, $table58),
					43=>new ParserAction($this->reduce, $table58),
					45=>new ParserAction($this->reduce, $table58),
					47=>new ParserAction($this->reduce, $table58),
					48=>new ParserAction($this->reduce, $table58),
					49=>new ParserAction($this->reduce, $table58),
					50=>new ParserAction($this->reduce, $table58),
					51=>new ParserAction($this->reduce, $table58),
					52=>new ParserAction($this->reduce, $table58),
					53=>new ParserAction($this->reduce, $table58),
					55=>new ParserAction($this->reduce, $table58)
				);

			$tableDefinition79 = array(
				
					1=>new ParserAction($this->reduce, $table62),
					5=>new ParserAction($this->reduce, $table62),
					7=>new ParserAction($this->reduce, $table62),
					8=>new ParserAction($this->reduce, $table62),
					9=>new ParserAction($this->reduce, $table62),
					10=>new ParserAction($this->reduce, $table62),
					11=>new ParserAction($this->reduce, $table62),
					12=>new ParserAction($this->reduce, $table62),
					13=>new ParserAction($this->reduce, $table62),
					14=>new ParserAction($this->reduce, $table62),
					15=>new ParserAction($this->reduce, $table62),
					16=>new ParserAction($this->reduce, $table62),
					17=>new ParserAction($this->reduce, $table62),
					18=>new ParserAction($this->reduce, $table62),
					19=>new ParserAction($this->reduce, $table62),
					20=>new ParserAction($this->reduce, $table62),
					21=>new ParserAction($this->reduce, $table62),
					22=>new ParserAction($this->reduce, $table62),
					23=>new ParserAction($this->reduce, $table62),
					24=>new ParserAction($this->reduce, $table62),
					25=>new ParserAction($this->reduce, $table62),
					26=>new ParserAction($this->reduce, $table62),
					27=>new ParserAction($this->reduce, $table62),
					28=>new ParserAction($this->reduce, $table62),
					29=>new ParserAction($this->reduce, $table62),
					30=>new ParserAction($this->reduce, $table62),
					31=>new ParserAction($this->reduce, $table62),
					32=>new ParserAction($this->reduce, $table62),
					33=>new ParserAction($this->reduce, $table62),
					34=>new ParserAction($this->reduce, $table62),
					35=>new ParserAction($this->reduce, $table62),
					36=>new ParserAction($this->reduce, $table62),
					37=>new ParserAction($this->reduce, $table62),
					38=>new ParserAction($this->reduce, $table62),
					39=>new ParserAction($this->reduce, $table62),
					40=>new ParserAction($this->reduce, $table62),
					41=>new ParserAction($this->reduce, $table62),
					42=>new ParserAction($this->reduce, $table62),
					43=>new ParserAction($this->reduce, $table62),
					45=>new ParserAction($this->reduce, $table62),
					47=>new ParserAction($this->reduce, $table62),
					48=>new ParserAction($this->reduce, $table62),
					49=>new ParserAction($this->reduce, $table62),
					50=>new ParserAction($this->reduce, $table62),
					51=>new ParserAction($this->reduce, $table62),
					52=>new ParserAction($this->reduce, $table62),
					53=>new ParserAction($this->reduce, $table62),
					55=>new ParserAction($this->reduce, $table62)
				);

			$tableDefinition80 = array(
				
					1=>new ParserAction($this->reduce, $table66),
					5=>new ParserAction($this->reduce, $table66),
					7=>new ParserAction($this->reduce, $table66),
					8=>new ParserAction($this->reduce, $table66),
					9=>new ParserAction($this->reduce, $table66),
					10=>new ParserAction($this->reduce, $table66),
					11=>new ParserAction($this->reduce, $table66),
					12=>new ParserAction($this->reduce, $table66),
					13=>new ParserAction($this->reduce, $table66),
					14=>new ParserAction($this->reduce, $table66),
					15=>new ParserAction($this->reduce, $table66),
					16=>new ParserAction($this->reduce, $table66),
					17=>new ParserAction($this->reduce, $table66),
					18=>new ParserAction($this->reduce, $table66),
					19=>new ParserAction($this->reduce, $table66),
					20=>new ParserAction($this->reduce, $table66),
					21=>new ParserAction($this->reduce, $table66),
					22=>new ParserAction($this->reduce, $table66),
					23=>new ParserAction($this->reduce, $table66),
					24=>new ParserAction($this->reduce, $table66),
					25=>new ParserAction($this->reduce, $table66),
					26=>new ParserAction($this->reduce, $table66),
					27=>new ParserAction($this->reduce, $table66),
					28=>new ParserAction($this->reduce, $table66),
					29=>new ParserAction($this->reduce, $table66),
					30=>new ParserAction($this->reduce, $table66),
					31=>new ParserAction($this->reduce, $table66),
					32=>new ParserAction($this->reduce, $table66),
					33=>new ParserAction($this->reduce, $table66),
					34=>new ParserAction($this->reduce, $table66),
					35=>new ParserAction($this->reduce, $table66),
					36=>new ParserAction($this->reduce, $table66),
					37=>new ParserAction($this->reduce, $table66),
					38=>new ParserAction($this->reduce, $table66),
					39=>new ParserAction($this->reduce, $table66),
					40=>new ParserAction($this->reduce, $table66),
					41=>new ParserAction($this->reduce, $table66),
					42=>new ParserAction($this->reduce, $table66),
					43=>new ParserAction($this->reduce, $table66),
					45=>new ParserAction($this->reduce, $table66),
					47=>new ParserAction($this->reduce, $table66),
					48=>new ParserAction($this->reduce, $table66),
					49=>new ParserAction($this->reduce, $table66),
					50=>new ParserAction($this->reduce, $table66),
					51=>new ParserAction($this->reduce, $table66),
					52=>new ParserAction($this->reduce, $table66),
					53=>new ParserAction($this->reduce, $table66),
					55=>new ParserAction($this->reduce, $table66)
				);

			$tableDefinition81 = array(
				
					1=>new ParserAction($this->reduce, $table71),
					5=>new ParserAction($this->reduce, $table71),
					6=>new ParserAction($this->none, $table37),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table71),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table71),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table71),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table71),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table71),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table71),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table71),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table71),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table71),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table71),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table71),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table71),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table71),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->shift, $table85),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->reduce, $table71)
				);

			$tableDefinition82 = array(
				
					1=>new ParserAction($this->reduce, $table73),
					5=>new ParserAction($this->reduce, $table73),
					7=>new ParserAction($this->reduce, $table73),
					8=>new ParserAction($this->reduce, $table73),
					9=>new ParserAction($this->reduce, $table73),
					10=>new ParserAction($this->reduce, $table73),
					11=>new ParserAction($this->reduce, $table73),
					12=>new ParserAction($this->reduce, $table73),
					13=>new ParserAction($this->reduce, $table73),
					14=>new ParserAction($this->reduce, $table73),
					15=>new ParserAction($this->reduce, $table73),
					16=>new ParserAction($this->reduce, $table73),
					17=>new ParserAction($this->reduce, $table73),
					18=>new ParserAction($this->reduce, $table73),
					19=>new ParserAction($this->reduce, $table73),
					20=>new ParserAction($this->reduce, $table73),
					21=>new ParserAction($this->reduce, $table73),
					22=>new ParserAction($this->reduce, $table73),
					23=>new ParserAction($this->reduce, $table73),
					24=>new ParserAction($this->reduce, $table73),
					25=>new ParserAction($this->reduce, $table73),
					26=>new ParserAction($this->reduce, $table73),
					27=>new ParserAction($this->reduce, $table73),
					28=>new ParserAction($this->reduce, $table73),
					29=>new ParserAction($this->reduce, $table73),
					30=>new ParserAction($this->reduce, $table73),
					31=>new ParserAction($this->reduce, $table73),
					32=>new ParserAction($this->reduce, $table73),
					33=>new ParserAction($this->reduce, $table73),
					34=>new ParserAction($this->reduce, $table73),
					35=>new ParserAction($this->reduce, $table73),
					36=>new ParserAction($this->reduce, $table73),
					37=>new ParserAction($this->reduce, $table73),
					38=>new ParserAction($this->reduce, $table73),
					39=>new ParserAction($this->reduce, $table73),
					40=>new ParserAction($this->reduce, $table73),
					41=>new ParserAction($this->reduce, $table73),
					42=>new ParserAction($this->reduce, $table73),
					43=>new ParserAction($this->reduce, $table73),
					45=>new ParserAction($this->reduce, $table73),
					47=>new ParserAction($this->reduce, $table73),
					48=>new ParserAction($this->reduce, $table73),
					49=>new ParserAction($this->reduce, $table73),
					50=>new ParserAction($this->reduce, $table73),
					51=>new ParserAction($this->reduce, $table73),
					52=>new ParserAction($this->reduce, $table73),
					53=>new ParserAction($this->reduce, $table73),
					55=>new ParserAction($this->reduce, $table73)
				);

			$tableDefinition83 = array(
				
					1=>new ParserAction($this->reduce, $table81),
					5=>new ParserAction($this->reduce, $table81),
					7=>new ParserAction($this->reduce, $table81),
					8=>new ParserAction($this->reduce, $table81),
					9=>new ParserAction($this->reduce, $table81),
					10=>new ParserAction($this->reduce, $table81),
					11=>new ParserAction($this->reduce, $table81),
					12=>new ParserAction($this->reduce, $table81),
					13=>new ParserAction($this->reduce, $table81),
					14=>new ParserAction($this->reduce, $table81),
					15=>new ParserAction($this->reduce, $table81),
					16=>new ParserAction($this->reduce, $table81),
					17=>new ParserAction($this->reduce, $table81),
					18=>new ParserAction($this->reduce, $table81),
					19=>new ParserAction($this->reduce, $table81),
					20=>new ParserAction($this->reduce, $table81),
					21=>new ParserAction($this->reduce, $table81),
					22=>new ParserAction($this->reduce, $table81),
					23=>new ParserAction($this->reduce, $table81),
					24=>new ParserAction($this->reduce, $table81),
					25=>new ParserAction($this->reduce, $table81),
					26=>new ParserAction($this->reduce, $table81),
					27=>new ParserAction($this->reduce, $table81),
					28=>new ParserAction($this->reduce, $table81),
					29=>new ParserAction($this->reduce, $table81),
					30=>new ParserAction($this->reduce, $table81),
					31=>new ParserAction($this->reduce, $table81),
					32=>new ParserAction($this->reduce, $table81),
					33=>new ParserAction($this->reduce, $table81),
					34=>new ParserAction($this->reduce, $table81),
					35=>new ParserAction($this->reduce, $table81),
					36=>new ParserAction($this->reduce, $table81),
					37=>new ParserAction($this->reduce, $table81),
					38=>new ParserAction($this->reduce, $table81),
					39=>new ParserAction($this->reduce, $table81),
					40=>new ParserAction($this->reduce, $table81),
					41=>new ParserAction($this->reduce, $table81),
					42=>new ParserAction($this->reduce, $table81),
					43=>new ParserAction($this->reduce, $table81),
					45=>new ParserAction($this->reduce, $table81),
					47=>new ParserAction($this->reduce, $table81),
					48=>new ParserAction($this->reduce, $table81),
					49=>new ParserAction($this->reduce, $table81),
					50=>new ParserAction($this->reduce, $table81),
					51=>new ParserAction($this->reduce, $table81),
					52=>new ParserAction($this->reduce, $table81),
					53=>new ParserAction($this->reduce, $table81),
					55=>new ParserAction($this->reduce, $table81)
				);

			$tableDefinition84 = array(
				
					1=>new ParserAction($this->reduce, $table83),
					5=>new ParserAction($this->reduce, $table83),
					6=>new ParserAction($this->none, $table37),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table7),
					10=>new ParserAction($this->shift, $table8),
					11=>new ParserAction($this->shift, $table9),
					12=>new ParserAction($this->shift, $table10),
					13=>new ParserAction($this->shift, $table11),
					14=>new ParserAction($this->shift, $table12),
					15=>new ParserAction($this->reduce, $table83),
					16=>new ParserAction($this->shift, $table13),
					17=>new ParserAction($this->reduce, $table83),
					18=>new ParserAction($this->shift, $table14),
					19=>new ParserAction($this->shift, $table15),
					20=>new ParserAction($this->reduce, $table83),
					21=>new ParserAction($this->shift, $table16),
					22=>new ParserAction($this->reduce, $table83),
					23=>new ParserAction($this->shift, $table17),
					24=>new ParserAction($this->reduce, $table83),
					25=>new ParserAction($this->shift, $table18),
					26=>new ParserAction($this->reduce, $table83),
					27=>new ParserAction($this->shift, $table19),
					28=>new ParserAction($this->shift, $table20),
					29=>new ParserAction($this->reduce, $table83),
					30=>new ParserAction($this->shift, $table21),
					31=>new ParserAction($this->reduce, $table83),
					32=>new ParserAction($this->shift, $table22),
					33=>new ParserAction($this->reduce, $table83),
					34=>new ParserAction($this->shift, $table23),
					35=>new ParserAction($this->reduce, $table83),
					36=>new ParserAction($this->shift, $table24),
					37=>new ParserAction($this->reduce, $table83),
					38=>new ParserAction($this->shift, $table25),
					39=>new ParserAction($this->reduce, $table83),
					40=>new ParserAction($this->shift, $table26),
					41=>new ParserAction($this->reduce, $table83),
					42=>new ParserAction($this->shift, $table27),
					43=>new ParserAction($this->shift, $table28),
					45=>new ParserAction($this->shift, $table29),
					47=>new ParserAction($this->reduce, $table83),
					48=>new ParserAction($this->shift, $table30),
					49=>new ParserAction($this->shift, $table31),
					50=>new ParserAction($this->shift, $table32),
					51=>new ParserAction($this->shift, $table33),
					52=>new ParserAction($this->shift, $table34),
					53=>new ParserAction($this->shift, $table35),
					55=>new ParserAction($this->shift, $table86)
				);

			$tableDefinition85 = array(
				
					1=>new ParserAction($this->reduce, $table72),
					5=>new ParserAction($this->reduce, $table72),
					7=>new ParserAction($this->reduce, $table72),
					8=>new ParserAction($this->reduce, $table72),
					9=>new ParserAction($this->reduce, $table72),
					10=>new ParserAction($this->reduce, $table72),
					11=>new ParserAction($this->reduce, $table72),
					12=>new ParserAction($this->reduce, $table72),
					13=>new ParserAction($this->reduce, $table72),
					14=>new ParserAction($this->reduce, $table72),
					15=>new ParserAction($this->reduce, $table72),
					16=>new ParserAction($this->reduce, $table72),
					17=>new ParserAction($this->reduce, $table72),
					18=>new ParserAction($this->reduce, $table72),
					19=>new ParserAction($this->reduce, $table72),
					20=>new ParserAction($this->reduce, $table72),
					21=>new ParserAction($this->reduce, $table72),
					22=>new ParserAction($this->reduce, $table72),
					23=>new ParserAction($this->reduce, $table72),
					24=>new ParserAction($this->reduce, $table72),
					25=>new ParserAction($this->reduce, $table72),
					26=>new ParserAction($this->reduce, $table72),
					27=>new ParserAction($this->reduce, $table72),
					28=>new ParserAction($this->reduce, $table72),
					29=>new ParserAction($this->reduce, $table72),
					30=>new ParserAction($this->reduce, $table72),
					31=>new ParserAction($this->reduce, $table72),
					32=>new ParserAction($this->reduce, $table72),
					33=>new ParserAction($this->reduce, $table72),
					34=>new ParserAction($this->reduce, $table72),
					35=>new ParserAction($this->reduce, $table72),
					36=>new ParserAction($this->reduce, $table72),
					37=>new ParserAction($this->reduce, $table72),
					38=>new ParserAction($this->reduce, $table72),
					39=>new ParserAction($this->reduce, $table72),
					40=>new ParserAction($this->reduce, $table72),
					41=>new ParserAction($this->reduce, $table72),
					42=>new ParserAction($this->reduce, $table72),
					43=>new ParserAction($this->reduce, $table72),
					45=>new ParserAction($this->reduce, $table72),
					47=>new ParserAction($this->reduce, $table72),
					48=>new ParserAction($this->reduce, $table72),
					49=>new ParserAction($this->reduce, $table72),
					50=>new ParserAction($this->reduce, $table72),
					51=>new ParserAction($this->reduce, $table72),
					52=>new ParserAction($this->reduce, $table72),
					53=>new ParserAction($this->reduce, $table72),
					55=>new ParserAction($this->reduce, $table72)
				);

			$tableDefinition86 = array(
				
					1=>new ParserAction($this->reduce, $table82),
					5=>new ParserAction($this->reduce, $table82),
					7=>new ParserAction($this->reduce, $table82),
					8=>new ParserAction($this->reduce, $table82),
					9=>new ParserAction($this->reduce, $table82),
					10=>new ParserAction($this->reduce, $table82),
					11=>new ParserAction($this->reduce, $table82),
					12=>new ParserAction($this->reduce, $table82),
					13=>new ParserAction($this->reduce, $table82),
					14=>new ParserAction($this->reduce, $table82),
					15=>new ParserAction($this->reduce, $table82),
					16=>new ParserAction($this->reduce, $table82),
					17=>new ParserAction($this->reduce, $table82),
					18=>new ParserAction($this->reduce, $table82),
					19=>new ParserAction($this->reduce, $table82),
					20=>new ParserAction($this->reduce, $table82),
					21=>new ParserAction($this->reduce, $table82),
					22=>new ParserAction($this->reduce, $table82),
					23=>new ParserAction($this->reduce, $table82),
					24=>new ParserAction($this->reduce, $table82),
					25=>new ParserAction($this->reduce, $table82),
					26=>new ParserAction($this->reduce, $table82),
					27=>new ParserAction($this->reduce, $table82),
					28=>new ParserAction($this->reduce, $table82),
					29=>new ParserAction($this->reduce, $table82),
					30=>new ParserAction($this->reduce, $table82),
					31=>new ParserAction($this->reduce, $table82),
					32=>new ParserAction($this->reduce, $table82),
					33=>new ParserAction($this->reduce, $table82),
					34=>new ParserAction($this->reduce, $table82),
					35=>new ParserAction($this->reduce, $table82),
					36=>new ParserAction($this->reduce, $table82),
					37=>new ParserAction($this->reduce, $table82),
					38=>new ParserAction($this->reduce, $table82),
					39=>new ParserAction($this->reduce, $table82),
					40=>new ParserAction($this->reduce, $table82),
					41=>new ParserAction($this->reduce, $table82),
					42=>new ParserAction($this->reduce, $table82),
					43=>new ParserAction($this->reduce, $table82),
					45=>new ParserAction($this->reduce, $table82),
					47=>new ParserAction($this->reduce, $table82),
					48=>new ParserAction($this->reduce, $table82),
					49=>new ParserAction($this->reduce, $table82),
					50=>new ParserAction($this->reduce, $table82),
					51=>new ParserAction($this->reduce, $table82),
					52=>new ParserAction($this->reduce, $table82),
					53=>new ParserAction($this->reduce, $table82),
					55=>new ParserAction($this->reduce, $table82)
				);

			$table0->setActions($tableDefinition0);
			$table1->setActions($tableDefinition1);
			$table2->setActions($tableDefinition2);
			$table3->setActions($tableDefinition3);
			$table4->setActions($tableDefinition4);
			$table5->setActions($tableDefinition5);
			$table6->setActions($tableDefinition6);
			$table7->setActions($tableDefinition7);
			$table8->setActions($tableDefinition8);
			$table9->setActions($tableDefinition9);
			$table10->setActions($tableDefinition10);
			$table11->setActions($tableDefinition11);
			$table12->setActions($tableDefinition12);
			$table13->setActions($tableDefinition13);
			$table14->setActions($tableDefinition14);
			$table15->setActions($tableDefinition15);
			$table16->setActions($tableDefinition16);
			$table17->setActions($tableDefinition17);
			$table18->setActions($tableDefinition18);
			$table19->setActions($tableDefinition19);
			$table20->setActions($tableDefinition20);
			$table21->setActions($tableDefinition21);
			$table22->setActions($tableDefinition22);
			$table23->setActions($tableDefinition23);
			$table24->setActions($tableDefinition24);
			$table25->setActions($tableDefinition25);
			$table26->setActions($tableDefinition26);
			$table27->setActions($tableDefinition27);
			$table28->setActions($tableDefinition28);
			$table29->setActions($tableDefinition29);
			$table30->setActions($tableDefinition30);
			$table31->setActions($tableDefinition31);
			$table32->setActions($tableDefinition32);
			$table33->setActions($tableDefinition33);
			$table34->setActions($tableDefinition34);
			$table35->setActions($tableDefinition35);
			$table36->setActions($tableDefinition36);
			$table37->setActions($tableDefinition37);
			$table38->setActions($tableDefinition38);
			$table39->setActions($tableDefinition39);
			$table40->setActions($tableDefinition40);
			$table41->setActions($tableDefinition41);
			$table42->setActions($tableDefinition42);
			$table43->setActions($tableDefinition43);
			$table44->setActions($tableDefinition44);
			$table45->setActions($tableDefinition45);
			$table46->setActions($tableDefinition46);
			$table47->setActions($tableDefinition47);
			$table48->setActions($tableDefinition48);
			$table49->setActions($tableDefinition49);
			$table50->setActions($tableDefinition50);
			$table51->setActions($tableDefinition51);
			$table52->setActions($tableDefinition52);
			$table53->setActions($tableDefinition53);
			$table54->setActions($tableDefinition54);
			$table55->setActions($tableDefinition55);
			$table56->setActions($tableDefinition56);
			$table57->setActions($tableDefinition57);
			$table58->setActions($tableDefinition58);
			$table59->setActions($tableDefinition59);
			$table60->setActions($tableDefinition60);
			$table61->setActions($tableDefinition61);
			$table62->setActions($tableDefinition62);
			$table63->setActions($tableDefinition63);
			$table64->setActions($tableDefinition64);
			$table65->setActions($tableDefinition65);
			$table66->setActions($tableDefinition66);
			$table67->setActions($tableDefinition67);
			$table68->setActions($tableDefinition68);
			$table69->setActions($tableDefinition69);
			$table70->setActions($tableDefinition70);
			$table71->setActions($tableDefinition71);
			$table72->setActions($tableDefinition72);
			$table73->setActions($tableDefinition73);
			$table74->setActions($tableDefinition74);
			$table75->setActions($tableDefinition75);
			$table76->setActions($tableDefinition76);
			$table77->setActions($tableDefinition77);
			$table78->setActions($tableDefinition78);
			$table79->setActions($tableDefinition79);
			$table80->setActions($tableDefinition80);
			$table81->setActions($tableDefinition81);
			$table82->setActions($tableDefinition82);
			$table83->setActions($tableDefinition83);
			$table84->setActions($tableDefinition84);
			$table85->setActions($tableDefinition85);
			$table86->setActions($tableDefinition86);

			$this->table = array(
				
					0=>$table0,
					1=>$table1,
					2=>$table2,
					3=>$table3,
					4=>$table4,
					5=>$table5,
					6=>$table6,
					7=>$table7,
					8=>$table8,
					9=>$table9,
					10=>$table10,
					11=>$table11,
					12=>$table12,
					13=>$table13,
					14=>$table14,
					15=>$table15,
					16=>$table16,
					17=>$table17,
					18=>$table18,
					19=>$table19,
					20=>$table20,
					21=>$table21,
					22=>$table22,
					23=>$table23,
					24=>$table24,
					25=>$table25,
					26=>$table26,
					27=>$table27,
					28=>$table28,
					29=>$table29,
					30=>$table30,
					31=>$table31,
					32=>$table32,
					33=>$table33,
					34=>$table34,
					35=>$table35,
					36=>$table36,
					37=>$table37,
					38=>$table38,
					39=>$table39,
					40=>$table40,
					41=>$table41,
					42=>$table42,
					43=>$table43,
					44=>$table44,
					45=>$table45,
					46=>$table46,
					47=>$table47,
					48=>$table48,
					49=>$table49,
					50=>$table50,
					51=>$table51,
					52=>$table52,
					53=>$table53,
					54=>$table54,
					55=>$table55,
					56=>$table56,
					57=>$table57,
					58=>$table58,
					59=>$table59,
					60=>$table60,
					61=>$table61,
					62=>$table62,
					63=>$table63,
					64=>$table64,
					65=>$table65,
					66=>$table66,
					67=>$table67,
					68=>$table68,
					69=>$table69,
					70=>$table70,
					71=>$table71,
					72=>$table72,
					73=>$table73,
					74=>$table74,
					75=>$table75,
					76=>$table76,
					77=>$table77,
					78=>$table78,
					79=>$table79,
					80=>$table80,
					81=>$table81,
					82=>$table82,
					83=>$table83,
					84=>$table84,
					85=>$table85,
					86=>$table86
				);

			$this->defaultActions = array(
				
					3=>new ParserAction($this->reduce, $table3),
					36=>new ParserAction($this->reduce, $table2)
				);

			$this->productions = array(
				
					0=>new ParserProduction($symbol0),
					1=>new ParserProduction($symbol3,1),
					2=>new ParserProduction($symbol3,2),
					3=>new ParserProduction($symbol3,1),
					4=>new ParserProduction($symbol4,1),
					5=>new ParserProduction($symbol4,2),
					6=>new ParserProduction($symbol6,1),
					7=>new ParserProduction($symbol6,1),
					8=>new ParserProduction($symbol6,1),
					9=>new ParserProduction($symbol6,1),
					10=>new ParserProduction($symbol6,1),
					11=>new ParserProduction($symbol6,1),
					12=>new ParserProduction($symbol6,1),
					13=>new ParserProduction($symbol6,1),
					14=>new ParserProduction($symbol6,2),
					15=>new ParserProduction($symbol6,2),
					16=>new ParserProduction($symbol6,3),
					17=>new ParserProduction($symbol6,1),
					18=>new ParserProduction($symbol6,2),
					19=>new ParserProduction($symbol6,2),
					20=>new ParserProduction($symbol6,3),
					21=>new ParserProduction($symbol6,1),
					22=>new ParserProduction($symbol6,1),
					23=>new ParserProduction($symbol6,2),
					24=>new ParserProduction($symbol6,2),
					25=>new ParserProduction($symbol6,3),
					26=>new ParserProduction($symbol6,1),
					27=>new ParserProduction($symbol6,2),
					28=>new ParserProduction($symbol6,2),
					29=>new ParserProduction($symbol6,3),
					30=>new ParserProduction($symbol6,1),
					31=>new ParserProduction($symbol6,2),
					32=>new ParserProduction($symbol6,2),
					33=>new ParserProduction($symbol6,3),
					34=>new ParserProduction($symbol6,1),
					35=>new ParserProduction($symbol6,2),
					36=>new ParserProduction($symbol6,2),
					37=>new ParserProduction($symbol6,3),
					38=>new ParserProduction($symbol6,1),
					39=>new ParserProduction($symbol6,1),
					40=>new ParserProduction($symbol6,2),
					41=>new ParserProduction($symbol6,2),
					42=>new ParserProduction($symbol6,3),
					43=>new ParserProduction($symbol6,1),
					44=>new ParserProduction($symbol6,2),
					45=>new ParserProduction($symbol6,2),
					46=>new ParserProduction($symbol6,3),
					47=>new ParserProduction($symbol6,1),
					48=>new ParserProduction($symbol6,2),
					49=>new ParserProduction($symbol6,2),
					50=>new ParserProduction($symbol6,3),
					51=>new ParserProduction($symbol6,1),
					52=>new ParserProduction($symbol6,2),
					53=>new ParserProduction($symbol6,2),
					54=>new ParserProduction($symbol6,3),
					55=>new ParserProduction($symbol6,1),
					56=>new ParserProduction($symbol6,2),
					57=>new ParserProduction($symbol6,2),
					58=>new ParserProduction($symbol6,3),
					59=>new ParserProduction($symbol6,1),
					60=>new ParserProduction($symbol6,2),
					61=>new ParserProduction($symbol6,2),
					62=>new ParserProduction($symbol6,3),
					63=>new ParserProduction($symbol6,1),
					64=>new ParserProduction($symbol6,2),
					65=>new ParserProduction($symbol6,2),
					66=>new ParserProduction($symbol6,3),
					67=>new ParserProduction($symbol6,1),
					68=>new ParserProduction($symbol6,1),
					69=>new ParserProduction($symbol6,2),
					70=>new ParserProduction($symbol6,2),
					71=>new ParserProduction($symbol6,3),
					72=>new ParserProduction($symbol6,4),
					73=>new ParserProduction($symbol6,3),
					74=>new ParserProduction($symbol6,2),
					75=>new ParserProduction($symbol6,1),
					76=>new ParserProduction($symbol6,1),
					77=>new ParserProduction($symbol6,1),
					78=>new ParserProduction($symbol6,1),
					79=>new ParserProduction($symbol6,1),
					80=>new ParserProduction($symbol6,1),
					81=>new ParserProduction($symbol6,3),
					82=>new ParserProduction($symbol6,4),
					83=>new ParserProduction($symbol6,3),
					84=>new ParserProduction($symbol6,2),
					85=>new ParserProduction($symbol6,1)
				);




        //Setup Lexer
        
			$this->rules = array(
				
					0=>"/\G(?:≤REAL_EOF≥)/",
					1=>"/\G(?:[<][!][-][-](.*?)[-][-][>])/",
					2=>"/\G(?:-~(.|\n)+?~-)/",
					3=>"/\G(?:~np~(.|\n)+?~\/np~)/",
					4=>"/\G(?:-\/(.|\n)*?\/-)/",
					5=>"/\G(?:~pp~(.|\n)*?~\/pp~)/",
					6=>"/\G(?:\/\*(.|\n)*?\*\/)/",
					7=>"/\G(?:~tc~(.|\n)*?~\/tc~)/",
					8=>"/\G(?:-\+(.|\n)*?\+-)/",
					9=>"/\G(?:[%](([0-9A-Za-z_-]{1,}))[%])/",
					10=>"/\G(?:$)/",
					11=>"/\G(?:([!*#;]+([-+](?=[-+]{2,})|[-+](?![-+]))?))/",
					12=>"/\G(?:(?=((\n))))/",
					13=>"/\G(?:$)/",
					14=>"/\G(?:((\n))(?=([!*#;]+([-+](?=[-+]{2,})|[-+](?![-+]))?)))/",
					15=>"/\G(?:(?!([!*#;]+([-+](?=[-+]{2,})|[-+](?![-+]))?)))/",
					16=>"/\G(?:(?=([!*#;]+([-+](?=[-+]{2,})|[-+](?![-+]))?)))/",
					17=>"/\G(?:((\n)))/",
					18=>"/\G(?:((.|\n)*?\}))/",
					19=>"/\G(?:\{([a-z0-9_]+)(\s)*)/",
					20=>"/\G(?:(.|\n)*?\)\})/",
					21=>"/\G(?:\{([A-Z0-9_]+)\((\s)*)/",
					22=>"/\G(?:$)/",
					23=>"/\G(?:\{([A-Z0-9_]+)\})/",
					24=>"/\G(?:$)/",
					25=>"/\G(?:[@][)])/",
					26=>"/\G(?:@FLP\(.+?\))/",
					27=>"/\G(?:---)/",
					28=>"/\G(?:%%%)/",
					29=>"/\G(?:[ ][-][-][ ])/",
					30=>"/\G(?:$)/",
					31=>"/\G(?:[_][_])/",
					32=>"/\G(?:[_][_])/",
					33=>"/\G(?:$)/",
					34=>"/\G(?:[:][:])/",
					35=>"/\G(?:[:][:])/",
					36=>"/\G(?:$)/",
					37=>"/\G(?:~~)/",
					38=>"/\G(?:~~)/",
					39=>"/\G(?:$)/",
					40=>"/\G(?:[']['])/",
					41=>"/\G(?:[']['])/",
					42=>"/\G(?:$)/",
					43=>"/\G(?:\])/",
					44=>"/\G(?:\[(?![ ]))/",
					45=>"/\G(?:$)/",
					46=>"/\G(?:--)/",
					47=>"/\G(?:--)/",
					48=>"/\G(?:$)/",
					49=>"/\G(?:[|][|])/",
					50=>"/\G(?:[|][|])/",
					51=>"/\G(?:$)/",
					52=>"/\G(?:[=][-])/",
					53=>"/\G(?:[-][=])/",
					54=>"/\G(?:$)/",
					55=>"/\G(?:[=][=][=])/",
					56=>"/\G(?:[=][=][=])/",
					57=>"/\G(?:$)/",
					58=>"/\G(?:\)\))/",
					59=>"/\G(?:\(\()/",
					60=>"/\G(?:\(\()/",
					61=>"/\G(?:$)/",
					62=>"/\G(?:\)\))/",
					63=>"/\G(?:\(((([a-z0-9-]+)))\()/",
					64=>"/\G(?:$)/",
					65=>"/\G(?:\)\))/",
					66=>"/\G(?:.)/",
					67=>"/\G(?:(([A-Z]{1,})([A-Za-z\-\x80-\xFF]{1,}))(?=$|[ \n\t\r\,\;\.]))/",
					68=>"/\G(?:&(?![ ]))/",
					69=>"/\G(?:<(?![a-zA-Z\/])|>)/",
					70=>"/\G(?:[<](.|\n)*?[>])/",
					71=>"/\G(?:≤REAL_EOF≥)/",
					72=>"/\G(?:(([A-Za-z0-9.,?;]+[ ]?|[&][ ])+))/",
					73=>"/\G(?:(?!([\@{}\n_\^:\~'-|=\(\)\[\]*#+%<≤ ]))(((.?)))?(?=([\@{}\n_\^:\~'-|=\(\)\[\]*#+%<≤ ])))/",
					74=>"/\G(?:(([ ])+))/",
					75=>"/\G(?:(.))/",
					76=>"/\G(?:$)/"
				);

			$this->conditions = array(
				
					"pastLink"=>new LexerConditions(array( 0,1,2,3,4,5,6,7,8,9,14,17,19,21,24,25,26,27,28,29,32,35,38,41,44,47,50,53,56,60,63,65,67,68,69,70,71,72,73,74,75,76), true),
					"wikiLink"=>new LexerConditions(array( 0,1,2,3,4,5,6,7,8,9,14,17,19,21,26,27,28,29,32,35,38,41,44,47,50,53,56,57,58,60,63,65,67,68,69,70,71,72,73,74,75,76), true),
					"wikiLinkType"=>new LexerConditions(array( 0,1,2,3,4,5,6,7,8,9,14,17,19,21,26,27,28,29,32,35,38,41,44,47,50,53,56,60,61,62,63,65,67,68,69,70,71,72,73,74,75,76), true),
					"wikiUnlink"=>new LexerConditions(array( 0,1,2,3,4,5,6,7,8,9,14,17,19,21,26,27,28,29,32,35,38,41,44,47,50,53,56,59,60,63,64,65,67,68,69,70,71,72,73,74,75,76), true),
					"line"=>new LexerConditions(array( 0,1,2,3,4,5,6,7,8,9,14,17,19,21,26,27,28,29,32,35,38,41,44,47,50,53,56,60,63,65,67,68,69,70,71,72,73,74,75,76), true),
					"preBlock"=>new LexerConditions(array( 0,1,2,3,4,5,6,7,8,9,11,14,17,19,21,26,27,28,29,32,35,38,41,44,47,50,53,56,60,63,65,67,68,69,70,71,72,73,74,75,76), true),
					"block"=>new LexerConditions(array( 0,1,2,3,4,5,6,7,8,9,10,12,13,14,17,19,21,26,27,28,29,32,35,38,41,44,47,50,53,56,60,63,65,67,68,69,70,71,72,73,74,75,76), true),
					"bold"=>new LexerConditions(array( 0,1,2,3,4,5,6,7,8,9,14,17,19,21,26,27,28,29,30,31,32,35,38,41,44,47,50,53,56,60,63,65,67,68,69,70,71,72,73,74,75,76), true),
					"center"=>new LexerConditions(array( 0,1,2,3,4,5,6,7,8,9,14,17,19,21,26,27,28,29,32,33,34,35,38,41,44,47,50,53,56,60,63,65,67,68,69,70,71,72,73,74,75,76), true),
					"color"=>new LexerConditions(array( 0,1,2,3,4,5,6,7,8,9,14,17,19,21,26,27,28,29,32,35,36,37,38,41,44,47,50,53,56,60,63,65,67,68,69,70,71,72,73,74,75,76), true),
					"italic"=>new LexerConditions(array( 0,1,2,3,4,5,6,7,8,9,14,17,19,21,26,27,28,29,32,35,38,39,40,41,44,47,50,53,56,60,63,65,67,68,69,70,71,72,73,74,75,76), true),
					"link"=>new LexerConditions(array( 0,1,2,3,4,5,6,7,8,9,14,17,19,21,26,27,28,29,32,35,38,41,42,43,44,47,50,53,56,60,63,65,67,68,69,70,71,72,73,74,75,76), true),
					"skip"=>new LexerConditions(array( 0,1,2,3,4,5,6,7,8,9,14,17,19,21,26,27,28,29,32,35,38,41,44,47,50,53,56,60,63,65,66,67,68,69,70,71,72,73,74,75,76), true),
					"strike"=>new LexerConditions(array( 0,1,2,3,4,5,6,7,8,9,14,17,19,21,26,27,28,29,32,35,38,41,44,45,46,47,50,53,56,60,63,65,67,68,69,70,71,72,73,74,75,76), true),
					"table"=>new LexerConditions(array( 0,1,2,3,4,5,6,7,8,9,14,17,19,21,26,27,28,29,32,35,38,41,44,47,48,49,50,53,56,60,63,65,67,68,69,70,71,72,73,74,75,76), true),
					"titleBar"=>new LexerConditions(array( 0,1,2,3,4,5,6,7,8,9,14,17,19,21,26,27,28,29,32,35,38,41,44,47,50,51,52,53,56,60,63,65,67,68,69,70,71,72,73,74,75,76), true),
					"underscore"=>new LexerConditions(array( 0,1,2,3,4,5,6,7,8,9,14,17,19,21,26,27,28,29,32,35,38,41,44,47,50,53,54,55,56,60,63,65,67,68,69,70,71,72,73,74,75,76), true),
					"pluginStart"=>new LexerConditions(array( 0,1,2,3,4,5,6,7,8,9,14,17,19,20,21,26,27,28,29,32,35,38,41,44,47,50,53,56,60,63,65,67,68,69,70,71,72,73,74,75,76), true),
					"plugin"=>new LexerConditions(array( 0,1,2,3,4,5,6,7,8,9,14,17,19,21,22,23,26,27,28,29,32,35,38,41,44,47,50,53,56,60,63,65,67,68,69,70,71,72,73,74,75,76), true),
					"inlinePlugin"=>new LexerConditions(array( 0,1,2,3,4,5,6,7,8,9,14,17,18,19,21,26,27,28,29,32,35,38,41,44,47,50,53,56,60,63,65,67,68,69,70,71,72,73,74,75,76), true),
					"BOF"=>new LexerConditions(array( 0,1,2,3,4,5,6,7,8,9,14,15,16,17,19,21,26,27,28,29,32,35,38,41,44,47,50,53,56,60,63,65,67,68,69,70,71,72,73,74,75,76), true),
					"INITIAL"=>new LexerConditions(array( 0,1,2,3,4,5,6,7,8,9,14,17,19,21,26,27,28,29,32,35,38,41,44,47,50,53,56,60,63,65,67,68,69,70,71,72,73,74,75,76), true)
				);


    }

    function parserPerformAction(&$thisS, &$yy, $yystate, &$s, $o)
    {
        


switch ($yystate) {
case 1:
 	    return $s[$o];
 	
break;
case 2:
        return $s[$o-1];
	
break;
case 3:
        return $s[$o];
    
break;
case 5:
	    
			$s[$o-1]->addContent($s[$o]);
        
	
break;
case 6:
	    
	        $s[$o]->setType('Content', $this);
	    
	
break;
case 7:
	    
			$s[$o]->setType('Comment', $this);
        
    
break;
case 8:
        
            $s[$o]->setType('NoParse', $this);
        
    
break;
case 9:
        
            $s[$o]->setType('PreFormattedText', $this);
        
    
break;
case 10:
        
            $s[$o]->setType('Variable', $this);
        
    
break;
case 11:
        
            $s[$o]->setType('Tag', $this);
        
    
break;
case 12:
        
		    $s[$o]->setType('HorizontalBar', $this);
        
	
break;
case 13:
        
            $s[$o]->setType('Content');
        
    
break;
case 14:
        
            $s[$o-1]->setType('Content', $this);
            $s[$o-1]->addContent($s[$o]);
        
    
break;
case 16:
        
		    $type =& $s[$o-2];
            $s[$o-1]->setParent($type);
            $type->setType('Bold', $this);
        
	
break;
case 18:
        
            $s[$o-1]->setType('Content', $this);
            $s[$o-1]->addContent($s[$o]);
        
    
break;
case 20:
        
		    $type =& $s[$o-2];
            $s[$o-1]->setParent($type);
            $type->setType('Center', $this);
        
	
break;
case 21:
        
		    $s[$o]->setType('Code', $this);
        
	
break;
case 23:
        
            $s[$o-1]->setType('Content', $this);
            $s[$o-1]->addContent($s[$o]);
        
    
break;
case 25:
	    
		    $type =& $s[$o-2];
            $s[$o-1]->setParent($type);
            $type->setType('Color', $this);
        
	
break;
case 27:
        
            $s[$o-1]->setType('Content', $this);
            $s[$o-1]->addContent($s[$o]);
        
    
break;
case 29:
	    
		    $type =& $s[$o-2];
            $s[$o-1]->setParent($type);
            $type->setType('Italic', $this);
        
	
break;
case 30:
        
            $s[$o]->setType('Content', $this);
        
    
break;
case 31:
        
            $s[$o-1]->setType('Content', $this);
            $s[$o-1]->addContent($s[$o]);
        
    
break;
case 33:
	    
		    //type already set

		    $type =& $s[$o-2];
            $s[$o-1]->setParent($type);
            $type->setType('Link', $this);
        
	
break;
case 35:
        
            $s[$o-1]->setType('Content', $this);
            $s[$o-1]->addContent($s[$o]);
        
    
break;
case 37:
	    
		    $type =& $s[$o-2];
            $s[$o-1]->setParent($type);
            $type->setType('Strike', $this);
        
	
break;
case 38:
        
            $s[$o]->setType('DoubleDash', $this);
        
    
break;
case 40:
        
            $s[$o-1]->setType('Content', $this);
            $s[$o-1]->addContent($s[$o]);
        
    
break;
case 42:
	    
		    $type =& $s[$o-2];
            $s[$o-1]->setParent($type);
            $type->setType('Table', $this);
        
	
break;
case 44:
        
            $s[$o-1]->setType('Content', $this);
            $s[$o-1]->addContent($s[$o]);
        
    
break;
case 46:
	    
			$type =& $s[$o-2];
            $s[$o-1]->setParent($type);
            $type->setType('TitleBar', $this);
        
	
break;
case 48:
        
            $s[$o-1]->setType('Content', $this);
            $s[$o-1]->addContent($s[$o]);
        
    
break;
case 50:
	    
		    $type =& $s[$o-2];
            $s[$o-1]->setParent($type);
            $type->setType('Underscore', $this);
        
	
break;
case 52:
        
            $s[$o-1]->setType('Content', $this);
            $s[$o-1]->addContent($s[$o]);
        
    
break;
case 54:
	    
            //Type already set
            $type =& $s[$o-2];
            $s[$o-1]->setParent($type);
            $type->setType('PastLink', $this);
        
    
break;
case 56:
        
            $s[$o-1]->setType('Content', $this);
            $s[$o-1]->addContent($s[$o]);
        
    
break;
case 58:
	    
			//Type already set
			$type =& $s[$o-2];
			$s[$o-1]->setParent($type);
			$type->setType('WikiLink', $this);
        
	
break;
case 60:
        
            $s[$o-1]->setType('Content', $this);
            $s[$o-1]->addContent($s[$o]);
        
    
break;
case 62:
	    
            //Type already set
            $type =& $s[$o-2];
            $s[$o-1]->setParent($type);
            $type->setType('WikiLinkType', $this);
        
    
break;
case 64:
        
            $s[$o-1]->setType('Content', $this);
            $s[$o-1]->addContent($s[$o]);
        
    
break;
case 66:
	    
            //Type already set
            $type =& $s[$o-2];
            $s[$o-1]->setParent($type);
            $type->setType('WikiUnlink', $this);
        
    
break;
case 67:
	    
            $type =& $s[$o];
            $type->addArgument($s[$o]);
            $type->setType('WordLink', $this);

        
    
break;
case 68:
        
            $type =& $s[$o];
            $type->setOption('NoBody', true);
            $type->setOption('Inline', true);
            $type->addContent($s[$o1]);
            $type->setType('InlinePlugin', $this);
        
    
break;
case 69:
        
            $type =& $s[$o-1];
            $type->setOption('NoBody', true);
            $type->setOption('Inline', true);
            $type->addContent($s[$o]);
            $type->setType('InlinePlugin', $this);
        
    
break;
case 70:
	    
 		    $type =& $s[$o-1];
            $type->setOption('NoBody', true);
            $type->setOption('Inline', true);
            $type->addArgument($s[$o]);
            $type->setType('InlinePlugin', $this);
        
 	
break;
case 71:
 	    
            $s[$o-2]->setType('Content', $this);
            $s[$o-1]->setType('Content', $this);
            $s[$o-1]->addContent($s[$o]);
            $s[$o-2]->addContent($s[$o-1]);
        

 	
break;
case 72:
	    
 		    $type =& $s[$o-3];
 		    $type->addArgument($s[$o-2]);
 		    $s[$o-1]->setParent($type);
 		    $type->stateEnd = $s[$o];
 		    $type->setType('Plugin', $this);
        
 	
break;
case 73:
	    
            $type =& $s[$o-2];
            $type->addArgument($s[$o-1]);
            $type->addArgument($s[$o]);
            $type->stateEnd = $s[$o];
            $type->setType('Plugin', $this);
        
     
break;
case 76:
        
            $s[$o]->setType('Line', $this);
        
    
break;
case 77:
        
            $s[$o]->setType('ForcedLine', $this);
        
    
break;
case 78:
        
            $s[$o]->setType('Char', $this);
        
    
break;
case 79:
        
            $s[$o]->setType('SpecialChar', $this);
        
    
break;
case 80:
        
            $s[$o]->setType('WhiteSpace', $this);
        
    
break;
case 81:
        
	        $s[$o-2]->setOption('Empty', 'true');
	        $s[$o-2]->setType('Block', $this);
	    
	
break;
case 82:
	    
			$type = $s[$o-3];
			$type->addArgument($s[$o-2]);
			$type->addArgument($s[$o-1]);
			$s[$o-1]->setParent($type);
			$type->setType('Block', $this);
		
    
break;
case 83:
        
            $type = $s[$o-2];
            $type->addArgument($s[$o-1]);
            $type->addArgument($s[$o]);
            $s[$o]->setParent($type);
            $type->setType('Block', $this);
        
    
break;
}

    }

    function parserLex()
    {
        $token = $this->lexerLex(); // $end = 1

        if (isset($token)) {
            return $token;
        }

        return $this->symbols["end"];
    }

    function parseError($str = "", ParserError $hash = null)
    {
        throw new Exception($str);
    }

    function lexerError($str = "", LexerError $hash = null)
    {
        throw new Exception($str);
    }

    function parse($input)
    {
        if (empty($this->table)) {
            throw new Exception("Empty Table");
        }
        $this->eof = new ParserSymbol("Eof", 1);
        $firstAction = new ParserAction(0, $this->table[0]);
        $firstCachedAction = new ParserCachedAction($firstAction);
        $stack = array($firstCachedAction);
        $stackCount = 1;
        $vstack = array(null);
        $vstackCount = 1;
        $yy = null;
        $_yy = null;
        $recovering = 0;
        $symbol = null;
        $action = null;
        $errStr = "";
        $preErrorSymbol = null;
        $state = null;

        $this->setInput($input);

        while (true) {
            // retrieve state number from top of stack
            $state = $stack[$stackCount - 1]->action->state;
            // use default actions if available
            if ($state != null && isset($this->defaultActions[$state->index])) {
                $action = $this->defaultActions[$state->index];
            } else {
                if (empty($symbol) == true) {
                    $symbol = $this->parserLex();
                }
                // read action for current state and first input
                if (isset($state) && isset($state->actions[$symbol->index])) {
                    //$action = $this->table[$state][$symbol];
                    $action = $state->actions[$symbol->index];
                } else {
                    $action = null;
                }
            }

            if ($action == null) {
                if ($recovering == 0) {
                    // Report error
                    $expected = array();
                    foreach($this->table[$state->index]->actions as $p => $item) {
                        if (!empty($this->terminals[$p]) && $p > 2) {
                            $expected[] = $this->terminals[$p]->name;
                        }
                    }

                    $errStr = "Parse error on line " . ($this->yy->lineNo + 1) . ":\n" . $this->showPosition() . "\nExpecting " . implode(", ", $expected) . ", got '" . (isset($this->terminals[$symbol->index]) ? $this->terminals[$symbol->index]->name : 'NOTHING') . "'";

                    $this->parseError($errStr, new ParserError($this->match, $state, $symbol, $this->yy->lineNo, $this->yy->loc, $expected));
                }
            }

            if ($state === null || $action === null) {
                break;
            }

            switch ($action->action) {
                case 1:
                    // shift
                    //$this->shiftCount++;
                    $stack[] = new ParserCachedAction($action, $symbol);
                    $stackCount++;

                    $vstack[] = clone($this->yy);
                    $vstackCount++;

                    $symbol = "";
                    if ($preErrorSymbol == null) { // normal execution/no error
                        $yy = clone($this->yy);
                        if ($recovering > 0) $recovering--;
                    } else { // error just occurred, resume old look ahead f/ before error
                        $symbol = $preErrorSymbol;
                        $preErrorSymbol = null;
                    }
                    break;

                case 2:
                    // reduce
                    $len = $this->productions[$action->state->index]->len;
                    // perform semantic action
                    $_yy = $vstack[$vstackCount - $len];// default to $S = $1
                    // default location, uses first token for firsts, last for lasts

                    if (isset($this->ranges)) {
                        //TODO: add ranges
                    }

                    $r = $this->parserPerformAction($_yy->text, $yy, $action->state->index, $vstack, $vstackCount - 1);

                    if (isset($r)) {
                        return $r;
                    }

                    // pop off stack
                    while ($len > 0) {
                        $len--;

                        array_pop($stack);
                        $stackCount--;

                        array_pop($vstack);
                        $vstackCount--;
                    }

                    if (is_null($_yy))
                    {
                        $vstack[] = new Parsed();
                    }
                    else
                    {
                        $vstack[] = $_yy;
                    }
                    $vstackCount++;

                    $nextSymbol = $this->productions[$action->state->index]->symbol;
                    // goto new state = table[STATE][NONTERMINAL]
                    $nextState = $stack[$stackCount - 1]->action->state;
                    $nextAction = $nextState->actions[$nextSymbol->index];

                    $stack[] = new ParserCachedAction($nextAction, $nextSymbol);
                    $stackCount++;

                    break;

                case 3:
                    // accept
                    return true;
            }

        }

        return true;
    }


    /* Jison generated lexer */
    public $eof;
    public $yy = null;
    public $match = "";
    public $conditionStack = array();
    public $conditionStackCount = 0;
    public $rules = array();
    public $conditions = array();
    public $done = false;
    public $less;
    public $more;
	public $input;
    public $offset;
    public $ranges;
    public $flex = false;

    function setInput($input)
    {
        $this->input = new InputReader($input);
        $this->more = $this->less = $this->done = false;
        $this->yy = new Parsed();
        $this->conditionStack = array('INITIAL');
        $this->conditionStackCount = 1;

        if (isset($this->ranges)) {
            $loc = $this->yy->loc = new ParserLocation();
            $loc->Range(new ParserRange(0, 0));
        } else {
            $this->yy->loc = new ParserLocation();
        }
        $this->offset = 0;
    }

    function input()
    {
        $ch = $this->input->ch();
        $this->yy->text .= $ch;
        $this->yy->leng++;
        $this->offset++;
        $this->match .= $ch;
        $lines = preg_match("/(?:\r\n?|\n).*/", $ch);
        if (count($lines) > 0) {
            $this->yy->lineNo++;
            $this->yy->lastLine++;
        } else {
            $this->yy->loc->lastColumn++;
        }
        if (isset($this->ranges)) {
            $this->yy->loc->range->y++;
        }

        return $ch;
    }

    function unput($ch)
    {
        $len = strlen($ch);
        $lines = explode("/(?:\r\n?|\n)/", $ch);
        $linesCount = count($lines);

        $this->input->unCh($len);
        $this->yy->text = substr($this->yy->text, 0, $len - 1);
        //$this->yylen -= $len;
        $this->offset -= $len;
        $oldLines = explode("/(?:\r\n?|\n)/", $this->match);
        $oldLinesCount = count($oldLines);
        $this->match = substr($this->match, 0, strlen($this->match) - 1);

        if (($linesCount - 1) > 0) $this->yy->lineNo -= $linesCount - 1;
        $r = $this->yy->loc->range;
        $oldLinesLength = (isset($oldLines[$oldLinesCount - $linesCount]) ? strlen($oldLines[$oldLinesCount - $linesCount]) : 0);

        $this->yy->loc = new ParserLocation(
            $this->yy->loc->firstLine,
            $this->yy->lineNo,
            $this->yy->loc->firstColumn,
            $this->yy->loc->firstLine,
            (empty($lines) ?
                ($linesCount == $oldLinesCount ? $this->yy->loc->firstColumn : 0) + $oldLinesLength :
                $this->yy->loc->firstColumn - $len)
        );

        if (isset($this->ranges)) {
            $this->yy->loc->range = array($r[0], $r[0] + $this->yy->leng - $len);
        }
    }

    function more()
    {
        $this->more = true;
    }

    function pastInput()
    {
	    $matched = $this->input->toString();
        $past = substr($matched, 0, strlen($matched) - strlen($this->match));
        return (strlen($past) > 20 ? '...' : '') . preg_replace("/\n/", "", substr($past, -20));
    }

    function upcomingInput()
    {
        $next = $this->match;
        if (strlen($next) < 20) {
            $next .= substr($this->input->toString(), 0, 20 - strlen($next));
        }
        return preg_replace("/\n/", "", substr($next, 0, 20) . (strlen($next) > 20 ? '...' : ''));
    }

    function showPosition()
    {
        $pre = $this->pastInput();

        $c = '';
        for($i = 0, $preLength = strlen($pre); $i < $preLength; $i++) {
            $c .= '-';
        }

        return $pre . $this->upcomingInput() . "\n" . $c . "^";
    }

    function next()
    {
        if ($this->done == true) {
            return $this->eof;
        }

        if ($this->input->done) {
            $this->done = true;
        }

        if ($this->more == false) {
            $this->yy->text = '';
            $this->match = '';
        }

        $rules = $this->currentRules();
        for ($i = 0, $j = count($rules); $i < $j; $i++) {
	        $tempMatch = $this->input->match($this->rules[$rules[$i]]);
            if ($tempMatch && (empty($match) || count($tempMatch[0]) > count($match[0]))) {
                $match = $tempMatch;
                $index = $i;
                if (isset($this->flex) && $this->flex == false) {
                    break;
                }
            }
        }
        if ( $match ) {
            $matchCount = strlen($match[0]);
            $lineCount = preg_match("/(?:\r\n?|\n).*/", $match[0], $lines);
            $line = ($lines ? $lines[$lineCount - 1] : false);
            $this->yy->lineNo += $lineCount;

            $this->yy->loc = new ParserLocation(
                $this->yy->loc->lastLine,
                $this->yy->lineNo + 1,
                $this->yy->loc->lastColumn,
                ($line ?
                    count($line) - preg_match("/\r?\n?/", $line, $na) :
                    $this->yy->loc->lastColumn + $matchCount
                )
            );


            $this->yy->text .= $match[0];
            $this->match .= $match[0];
            $this->matches = $match;

            $this->yy->leng = strlen($this->yy->text);
            if (isset($this->ranges)) {
                $this->yy->loc->range = new ParserRange($this->offset, $this->offset += $this->yy->leng);
            }
            $this->more = false;
	        $this->input->addMatch($match[0]);
            $ruleIndex = $rules[$index];
            $nextCondition = $this->conditionStack[$this->conditionStackCount - 1];

            $token = $this->lexerPerformAction($ruleIndex, $nextCondition);

            if ($this->done == true && !$this->input->done) {
                $this->done = false;
            }

            if (empty($token) == false) {
                return $this->symbols[
                    $token
                ];
            } else {
                return null;
            }
        }

        if ($this->input->done) {
            return $this->eof;
        } else {
            $this->lexerError("Lexical error on line " . ($this->yy->lineNo + 1) . ". Unrecognized text.\n" . $this->showPosition(), new LexerError("", -1, $this->yy->lineNo));
            return null;
        }
    }

    function lexerLex()
    {
        $r = $this->next();

        while (is_null($r) && !$this->done) {
            $r = $this->next();
        }

        return $r;
    }

    function begin($condition)
    {
        $this->conditionStackCount++;
        $this->conditionStack[] = $condition;
    }

    function popState()
    {
        $this->conditionStackCount--;
        return array_pop($this->conditionStack);
    }

    function currentRules()
    {
        $peek = $this->conditionStack[$this->conditionStackCount - 1];
        return $this->conditions[$peek]->rules;
    }

    function LexerPerformAction($avoidingNameCollisions, $YY_START = null)
    {
        


switch($avoidingNameCollisions) {
case 0:
break;
case 1:
    return 12;

break;
case 2:
    
		$this->yy->text = substr($this->yy->text, 2, -2);
	

    return 9;

break;
case 3:
    
		$this->yy->text = substr($this->yy->text, 4, -5);
	

    return 9;

break;
case 4:
    
        $this->yy->text = substr($this->yy->text, 2, -2);
    
    return 10;

break;
case 5:
    
        $this->yy->text = substr($this->yy->text, 4, -5);
    
    return 10;

break;
case 6:
    
		$this->yy->text = substr($this->yy->text, 2, -2);
	
    return 8;

break;
case 7:
    
		$this->yy->text = substr($this->yy->text, 4, -5);
	
    return 8;

break;
case 8:
    
		$this->yy->text = substr($this->yy->text, 2, -2);
	
    return 18;

break;
case 9:
    
        if ($this->isContent()) return 'CONTENT';
    

    return 'VARIABLE';

break;
case 10:
    
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 11:
    
		$this->popState();
		$this->begin('block');
	

	return 54;

break;
case 12:
    
        //returns block end
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
    

    return 'BLOCK_END';

break;
case 13:
    
        $this->popState();
    

    return 5;

break;
case 14:
    
        if ($this->isContent()) return 'CONTENT';
        $this->begin('preBlock');
    

    return 'PRE_BLOCK_START';

break;
case 15:
    
        $this->popState();
    

break;
case 16:
    
        $this->popState();
        $this->begin('preBlock');
    

    return 53;

break;
case 17:
    
        if ($this->isContent() || !empty($this->tableStack)) return 'CONTENT';
    

    return 'LINE_END';

break;
case 18:
    
        $this->popState();
    

    return 44;

break;
case 19:
    
        $this->begin('inlinePlugin');
    

    return 43;

break;
case 20:
    
        $this->popState();
        $this->begin('plugin');
    

    return 46;

break;
case 21:
    
        $this->begin('pluginStart');
        $this->stackPlugin($this->yy->text);
    

    return 45;

break;
case 22:
    
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 23:
    
        $name = end($this->pluginStack);
        if (substr($this->yy->text, 1, -1) == $name && $this->pluginStackCount > 0) {
            $this->popState();
            $this->pluginStackCount--;
            array_pop($this->pluginStack);
            return 'PLUGIN_END';
        }
    

    return 'CONTENT';

break;
case 24:
    
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 25:
    
		$this->popState();
	

	return 35;

break;
case 26:
    
		if ($this->isContent()) return 'CONTENT';
		$this->begin('pastLink');
	

	return 'PAST_LINK_START';

break;
case 27:
    
        if ($this->isContent()) return 'CONTENT';
    

    return 'HORIZONTAL_BAR';

break;
case 28:
    
        if ($this->isContent()) return 'CONTENT';
    

    return 'FORCED_LINE_END';

break;
case 29:
     return 27;
 
break;
case 30:
    
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 31:
    
        $this->popState();
    

    return 15;

break;
case 32:
    
        if ($this->isContent()) return 'CONTENT';
        $this->begin('bold');
    

    return 'BOLD_START';

break;
case 33:
    
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 34:
    
        $this->popState();
    

    return 17;

break;
case 35:
    
        if ($this->isContent()) return 'CONTENT';
        $this->begin('center');
    

    return 'CENTER_START';

break;
case 36:
    
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 37:
    
        $this->popState();
    

    return 20;

break;
case 38:
    
        if ($this->isContent()) return 'CONTENT';
        $this->begin('color');
    

    return 'COLOR_START';

break;
case 39:
    
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 40:
    
        $this->popState();
    

    return 22;

break;
case 41:
    
        if ($this->isContent()) return 'CONTENT';
        $this->begin('italic');
    

    return 'ITALIC_START';

break;
case 42:
    
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 43:
    
        $this->linkStack = false;
        $this->popState();
    

    return 24;

break;
case 44:
    
        if ($this->isContent()) return 'CONTENT';
        $this->linkStack = true;
        $this->begin('link');
    

    return 'LINK_START';

break;
case 45:
   
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 46:
    
        $this->popState();
    

    return 26;

break;
case 47:
    
        if ($this->isContent()) return 'CONTENT';
        $this->begin('strike');
    

    return 'STRIKE_START';

break;
case 48:
   
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 49:
    
        if ($this->isContent()) return 'CONTENT';
        $this->popState();
        array_pop($this->tableStack);
    

    return 'TABLE_END';

break;
case 50:
    
        if ($this->isContent()) return 'CONTENT';
        $this->begin('table');
        $this->tableStack[] = true;
    

    return 'TABLE_START';

break;
case 51:
   
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 52:
    
        $this->popState();
    

    return 31;

break;
case 53:
    
        if ($this->isContent()) return 'CONTENT';
        $this->begin('titleBar');
    

    return 'TITLE_BAR_START';

break;
case 54:
   
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 55:
    
        if ($this->isContent()) return 7;
        $this->popState();
    

    return 'UNDERSCORE_END';

break;
case 56:
    
        if ($this->isContent()) return 'CONTENT';
        $this->begin('underscore');
    

    return 'UNDERSCORE_START';

break;
case 57:
   
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 58:
    
        if ($this->isContent(array('linkStack'))) return 7;
        $this->linkStack = false;
        $this->popState();
    

    return 'WIKI_LINK_END';

break;
case 59:
    
        if ($this->isContent(array('linkStack'))) return 7;
        $this->linkStack = false;
        $this->popState();
    

    return 'WIKI_UNLINK_END';

break;
case 60:
    
        if ($this->isContent()) return 'CONTENT';
        $this->linkStack = true;
        $this->begin('wikiLink');
    

    return 'WIKI_LINK_START';

break;
case 61:
   
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 62:
    
        if ($this->isContent(array('linkStack'))) return 7;
        $this->linkStack = false;
        $this->popState();
    

    return 'WIKI_LINK_TYPE_END';

break;
case 63:
    
        if ($this->isContent()) return 'CONTENT';
        $this->linkStack = true;
        $this->begin('wikiLinkType');
        $this->yy->text = substr($this->yy->text, 1, -1);
    

    return 'WIKI_LINK_TYPE_START';

break;
case 64:
   
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 65:
    
        if ($this->isContent()) return 'CONTENT';
        $this->linkStack = true;
        $this->begin('wikiUnlink');
    

    return 'WIKI_UNLINK_START';

break;
case 66:
    
		$this->popState();
	

	return 7;

break;
case 67:
    
        if ($this->isContent()) return 'CONTENT';

        $isLink = false;
        $this->events->triggerExpressionWordLinkExists($this->yy->text, $isLink);

        if ($isLink) {
            return 'WORD_LINK';
        } else {
            $this->unput($this->yy->text);
            $this->begin('skip');
        }
    

break;
case 68:
    return 50;

break;
case 69:
	
	
		if ($this->isContent()) return 'CONTENT';
	

	return 'SPECIAL_CHAR';

break;
case 70:
    
        //html tag
        return 12;
    

break;
case 71:
break;
case 72:return 7;
break;
case 73:return 7;
break;
case 74:
    
		if ($this->isContent()) return 'CONTENT';
		return 'WHITE_SPACE';
	

break;
case 75:return 7;
break;
case 76:return 5;
break;
}

    }
}

class ParserLocation
{
    public $firstLine = 1;
    public $lastLine = 0;
    public $firstColumn = 1;
    public $lastColumn = 0;
    public $range;

    public function __construct($firstLine = 1, $lastLine = 0, $firstColumn = 1, $lastColumn = 0)
    {
        $this->firstLine = $firstLine;
        $this->lastLine = $lastLine;
        $this->firstColumn = $firstColumn;
        $this->lastColumn = $lastColumn;
    }

    public function Range($range)
    {
        $this->range = $range;
    }

    public function __clone()
    {
        return new ParserLocation($this->firstLine, $this->lastLine, $this->firstColumn, $this->lastColumn);
    }
}

class ParserValue
{
    public $leng = 0;
    public $loc;
    public $lineNo = 0;
    public $text;

    function __clone() {
        $clone = new ParserValue();
        $clone->leng = $this->leng;
        if (isset($this->loc)) {
            $clone->loc = clone $this->loc;
        }
        $clone->lineNo = $this->lineNo;
        $clone->text = $this->text;
        return $clone;
    }
}

class LexerConditions
{
    public $rules;
    public $inclusive;

    function __construct($rules, $inclusive)
    {
        $this->rules = $rules;
        $this->inclusive = $inclusive;
    }
}

class ParserProduction
{
    public $len = 0;
    public $symbol;

    public function __construct($symbol, $len = 0)
    {
        $this->symbol = $symbol;
        $this->len = $len;
    }
}

class ParserCachedAction
{
    public $action;
    public $symbol;

    function __construct($action, $symbol = null)
    {
        $this->action = $action;
        $this->symbol = $symbol;
    }
}

class ParserAction
{
    public $action;
    public $state;
    public $symbol;

    function __construct($action, &$state = null, &$symbol = null)
    {
        $this->action = $action;
        $this->state = $state;
        $this->symbol = $symbol;
    }
}

class ParserSymbol
{
    public $name;
    public $index = -1;
    public $symbols = array();
    public $symbolsByName = array();

    function __construct($name, $index)
    {
        $this->name = $name;
        $this->index = $index;
    }

    public function addAction($a)
    {
        $this->symbols[$a->index] = $this->symbolsByName[$a->name] = $a;
    }
}

class ParserError
{
    public $text;
    public $state;
    public $symbol;
    public $lineNo;
    public $loc;
    public $expected;

    function __construct($text, $state, $symbol, $lineNo, $loc, $expected)
    {
        $this->text = $text;
        $this->state = $state;
        $this->symbol = $symbol;
        $this->lineNo = $lineNo;
        $this->loc = $loc;
        $this->expected = $expected;
    }
}

class LexerError
{
    public $text;
    public $token;
    public $lineNo;

    public function __construct($text, $token, $lineNo)
    {
        $this->text = $text;
        $this->token = $token;
        $this->lineNo = $lineNo;
    }
}

class ParserState
{
    public $index;
    public $actions = array();

    function __construct($index)
    {
        $this->index = $index;
    }

    public function setActions(&$actions)
    {
        $this->actions = $actions;
    }
}

class ParserRange
{
    public $x;
    public $y;

    function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
}

class InputReader
{
	public $done = false;
	public $input;
	public $length;
	public $matches = array();
	public $position = 0;

	public function __construct($input)
	{
		$this->input = $input;
		$this->length = strlen($input);
	}

	public function addMatch($match) {
		$this->matches[] = $match;
		$this->position += strlen($match);
		$this->done = ($this->position >= $this->length);
	}

    public function ch()
	{
		$ch = $this->input{$this->position};
		$this->addMatch($ch);
		return $ch;
	}

	public function unCh($chLength)
	{
		$this->position -= $chLength;
		$this->position = max(0, $this->position);
		$this->done = ($this->position >= $this->length);
	}

	public function substring($start, $end) {
		$start = ($start != 0 ? $this->position + $start : $this->position);
		$end = ($end != 0 ? $start + $end : $this->length);
		return substr($this->input, $start, $end);
	}

	public function match($rule) {
		if (preg_match($rule, $this->input, $match, null, $this->position)) {
			return $match;
		}
		return null;
	}

    public function toString()
	{
        return implode('', $this->matches);
    }
}