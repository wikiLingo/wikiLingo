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
			$symbol8 = new ParserSymbol("COMMENT_START", 8);
			$symbol9 = new ParserSymbol("COMMENT_END", 9);
			$symbol10 = new ParserSymbol("NO_PARSE_START", 10);
			$symbol11 = new ParserSymbol("NO_PARSE_END", 11);
			$symbol12 = new ParserSymbol("PREFORMATTED_TEXT_START", 12);
			$symbol13 = new ParserSymbol("PREFORMATTED_TEXT_END", 13);
			$symbol14 = new ParserSymbol("DOUBLE_DYNAMIC_VAR", 14);
			$symbol15 = new ParserSymbol("SINGLE_DYNAMIC_VAR", 15);
			$symbol16 = new ParserSymbol("ARGUMENT_VAR", 16);
			$symbol17 = new ParserSymbol("HTML_TAG", 17);
			$symbol18 = new ParserSymbol("HORIZONTAL_BAR", 18);
			$symbol19 = new ParserSymbol("BOLD_START", 19);
			$symbol20 = new ParserSymbol("BOLD_END", 20);
			$symbol21 = new ParserSymbol("BOX_START", 21);
			$symbol22 = new ParserSymbol("BOX_END", 22);
			$symbol23 = new ParserSymbol("CENTER_START", 23);
			$symbol24 = new ParserSymbol("CENTER_END", 24);
			$symbol25 = new ParserSymbol("CODE_START", 25);
			$symbol26 = new ParserSymbol("CODE_END", 26);
			$symbol27 = new ParserSymbol("COLOR_START", 27);
			$symbol28 = new ParserSymbol("COLOR_END", 28);
			$symbol29 = new ParserSymbol("ITALIC_START", 29);
			$symbol30 = new ParserSymbol("ITALIC_END", 30);
			$symbol31 = new ParserSymbol("UNLINK_START", 31);
			$symbol32 = new ParserSymbol("UNLINK_END", 32);
			$symbol33 = new ParserSymbol("LINK_START", 33);
			$symbol34 = new ParserSymbol("LINK_END", 34);
			$symbol35 = new ParserSymbol("STRIKE_START", 35);
			$symbol36 = new ParserSymbol("STRIKE_END", 36);
			$symbol37 = new ParserSymbol("DOUBLE_DASH", 37);
			$symbol38 = new ParserSymbol("TABLE_START", 38);
			$symbol39 = new ParserSymbol("TABLE_END", 39);
			$symbol40 = new ParserSymbol("TITLE_BAR_START", 40);
			$symbol41 = new ParserSymbol("TITLE_BAR_END", 41);
			$symbol42 = new ParserSymbol("UNDERSCORE_START", 42);
			$symbol43 = new ParserSymbol("UNDERSCORE_END", 43);
			$symbol44 = new ParserSymbol("WIKI_LINK_START", 44);
			$symbol45 = new ParserSymbol("WIKI_LINK_END", 45);
			$symbol46 = new ParserSymbol("WIKI_LINK", 46);
			$symbol47 = new ParserSymbol("INLINE_PLUGIN_START", 47);
			$symbol48 = new ParserSymbol("INLINE_PLUGIN_PARAMETERS", 48);
			$symbol49 = new ParserSymbol("PLUGIN_START", 49);
			$symbol50 = new ParserSymbol("PLUGIN_PARAMETERS", 50);
			$symbol51 = new ParserSymbol("PLUGIN_END", 51);
			$symbol52 = new ParserSymbol("LINE_END", 52);
			$symbol53 = new ParserSymbol("FORCED_LINE_END", 53);
			$symbol54 = new ParserSymbol("CHAR", 54);
			$symbol55 = new ParserSymbol("PRE_BLOCK_START", 55);
			$symbol56 = new ParserSymbol("BLOCK_START", 56);
			$symbol57 = new ParserSymbol("BLOCK_END", 57);
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
			$this->symbols["COMMENT_START"] = $symbol8;
			$this->symbols[9] = $symbol9;
			$this->symbols["COMMENT_END"] = $symbol9;
			$this->symbols[10] = $symbol10;
			$this->symbols["NO_PARSE_START"] = $symbol10;
			$this->symbols[11] = $symbol11;
			$this->symbols["NO_PARSE_END"] = $symbol11;
			$this->symbols[12] = $symbol12;
			$this->symbols["PREFORMATTED_TEXT_START"] = $symbol12;
			$this->symbols[13] = $symbol13;
			$this->symbols["PREFORMATTED_TEXT_END"] = $symbol13;
			$this->symbols[14] = $symbol14;
			$this->symbols["DOUBLE_DYNAMIC_VAR"] = $symbol14;
			$this->symbols[15] = $symbol15;
			$this->symbols["SINGLE_DYNAMIC_VAR"] = $symbol15;
			$this->symbols[16] = $symbol16;
			$this->symbols["ARGUMENT_VAR"] = $symbol16;
			$this->symbols[17] = $symbol17;
			$this->symbols["HTML_TAG"] = $symbol17;
			$this->symbols[18] = $symbol18;
			$this->symbols["HORIZONTAL_BAR"] = $symbol18;
			$this->symbols[19] = $symbol19;
			$this->symbols["BOLD_START"] = $symbol19;
			$this->symbols[20] = $symbol20;
			$this->symbols["BOLD_END"] = $symbol20;
			$this->symbols[21] = $symbol21;
			$this->symbols["BOX_START"] = $symbol21;
			$this->symbols[22] = $symbol22;
			$this->symbols["BOX_END"] = $symbol22;
			$this->symbols[23] = $symbol23;
			$this->symbols["CENTER_START"] = $symbol23;
			$this->symbols[24] = $symbol24;
			$this->symbols["CENTER_END"] = $symbol24;
			$this->symbols[25] = $symbol25;
			$this->symbols["CODE_START"] = $symbol25;
			$this->symbols[26] = $symbol26;
			$this->symbols["CODE_END"] = $symbol26;
			$this->symbols[27] = $symbol27;
			$this->symbols["COLOR_START"] = $symbol27;
			$this->symbols[28] = $symbol28;
			$this->symbols["COLOR_END"] = $symbol28;
			$this->symbols[29] = $symbol29;
			$this->symbols["ITALIC_START"] = $symbol29;
			$this->symbols[30] = $symbol30;
			$this->symbols["ITALIC_END"] = $symbol30;
			$this->symbols[31] = $symbol31;
			$this->symbols["UNLINK_START"] = $symbol31;
			$this->symbols[32] = $symbol32;
			$this->symbols["UNLINK_END"] = $symbol32;
			$this->symbols[33] = $symbol33;
			$this->symbols["LINK_START"] = $symbol33;
			$this->symbols[34] = $symbol34;
			$this->symbols["LINK_END"] = $symbol34;
			$this->symbols[35] = $symbol35;
			$this->symbols["STRIKE_START"] = $symbol35;
			$this->symbols[36] = $symbol36;
			$this->symbols["STRIKE_END"] = $symbol36;
			$this->symbols[37] = $symbol37;
			$this->symbols["DOUBLE_DASH"] = $symbol37;
			$this->symbols[38] = $symbol38;
			$this->symbols["TABLE_START"] = $symbol38;
			$this->symbols[39] = $symbol39;
			$this->symbols["TABLE_END"] = $symbol39;
			$this->symbols[40] = $symbol40;
			$this->symbols["TITLE_BAR_START"] = $symbol40;
			$this->symbols[41] = $symbol41;
			$this->symbols["TITLE_BAR_END"] = $symbol41;
			$this->symbols[42] = $symbol42;
			$this->symbols["UNDERSCORE_START"] = $symbol42;
			$this->symbols[43] = $symbol43;
			$this->symbols["UNDERSCORE_END"] = $symbol43;
			$this->symbols[44] = $symbol44;
			$this->symbols["WIKI_LINK_START"] = $symbol44;
			$this->symbols[45] = $symbol45;
			$this->symbols["WIKI_LINK_END"] = $symbol45;
			$this->symbols[46] = $symbol46;
			$this->symbols["WIKI_LINK"] = $symbol46;
			$this->symbols[47] = $symbol47;
			$this->symbols["INLINE_PLUGIN_START"] = $symbol47;
			$this->symbols[48] = $symbol48;
			$this->symbols["INLINE_PLUGIN_PARAMETERS"] = $symbol48;
			$this->symbols[49] = $symbol49;
			$this->symbols["PLUGIN_START"] = $symbol49;
			$this->symbols[50] = $symbol50;
			$this->symbols["PLUGIN_PARAMETERS"] = $symbol50;
			$this->symbols[51] = $symbol51;
			$this->symbols["PLUGIN_END"] = $symbol51;
			$this->symbols[52] = $symbol52;
			$this->symbols["LINE_END"] = $symbol52;
			$this->symbols[53] = $symbol53;
			$this->symbols["FORCED_LINE_END"] = $symbol53;
			$this->symbols[54] = $symbol54;
			$this->symbols["CHAR"] = $symbol54;
			$this->symbols[55] = $symbol55;
			$this->symbols["PRE_BLOCK_START"] = $symbol55;
			$this->symbols[56] = $symbol56;
			$this->symbols["BLOCK_START"] = $symbol56;
			$this->symbols[57] = $symbol57;
			$this->symbols["BLOCK_END"] = $symbol57;

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
					55=>&$symbol55,
					56=>&$symbol56,
					57=>&$symbol57
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
			$table87 = new ParserState(87);
			$table88 = new ParserState(88);
			$table89 = new ParserState(89);
			$table90 = new ParserState(90);
			$table91 = new ParserState(91);
			$table92 = new ParserState(92);
			$table93 = new ParserState(93);
			$table94 = new ParserState(94);
			$table95 = new ParserState(95);

			$tableDefinition0 = array(
				
					3=>new ParserAction($this->none, $table1),
					4=>new ParserAction($this->none, $table2),
					5=>new ParserAction($this->shift, $table3),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					10=>new ParserAction($this->shift, $table7),
					12=>new ParserAction($this->shift, $table8),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					21=>new ParserAction($this->shift, $table15),
					23=>new ParserAction($this->shift, $table16),
					25=>new ParserAction($this->shift, $table17),
					27=>new ParserAction($this->shift, $table18),
					29=>new ParserAction($this->shift, $table19),
					31=>new ParserAction($this->shift, $table20),
					33=>new ParserAction($this->shift, $table21),
					35=>new ParserAction($this->shift, $table22),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					40=>new ParserAction($this->shift, $table25),
					42=>new ParserAction($this->shift, $table26),
					44=>new ParserAction($this->shift, $table27),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34)
				);

			$tableDefinition1 = array(
				
					1=>new ParserAction($this->accept)
				);

			$tableDefinition2 = array(
				
					1=>new ParserAction($this->reduce, $table1),
					5=>new ParserAction($this->shift, $table35),
					6=>new ParserAction($this->none, $table36),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					10=>new ParserAction($this->shift, $table7),
					12=>new ParserAction($this->shift, $table8),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					21=>new ParserAction($this->shift, $table15),
					23=>new ParserAction($this->shift, $table16),
					25=>new ParserAction($this->shift, $table17),
					27=>new ParserAction($this->shift, $table18),
					29=>new ParserAction($this->shift, $table19),
					31=>new ParserAction($this->shift, $table20),
					33=>new ParserAction($this->shift, $table21),
					35=>new ParserAction($this->shift, $table22),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					40=>new ParserAction($this->shift, $table25),
					42=>new ParserAction($this->shift, $table26),
					44=>new ParserAction($this->shift, $table27),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34)
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
					44=>new ParserAction($this->reduce, $table4),
					45=>new ParserAction($this->reduce, $table4),
					46=>new ParserAction($this->reduce, $table4),
					47=>new ParserAction($this->reduce, $table4),
					49=>new ParserAction($this->reduce, $table4),
					51=>new ParserAction($this->reduce, $table4),
					52=>new ParserAction($this->reduce, $table4),
					53=>new ParserAction($this->reduce, $table4),
					54=>new ParserAction($this->reduce, $table4),
					55=>new ParserAction($this->reduce, $table4),
					57=>new ParserAction($this->reduce, $table4)
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
					44=>new ParserAction($this->reduce, $table6),
					45=>new ParserAction($this->reduce, $table6),
					46=>new ParserAction($this->reduce, $table6),
					47=>new ParserAction($this->reduce, $table6),
					49=>new ParserAction($this->reduce, $table6),
					51=>new ParserAction($this->reduce, $table6),
					52=>new ParserAction($this->reduce, $table6),
					53=>new ParserAction($this->reduce, $table6),
					54=>new ParserAction($this->reduce, $table6),
					55=>new ParserAction($this->reduce, $table6),
					57=>new ParserAction($this->reduce, $table6)
				);

			$tableDefinition6 = array(
				
					1=>new ParserAction($this->reduce, $table7),
					4=>new ParserAction($this->none, $table38),
					5=>new ParserAction($this->reduce, $table7),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table37),
					10=>new ParserAction($this->shift, $table7),
					11=>new ParserAction($this->reduce, $table7),
					12=>new ParserAction($this->shift, $table8),
					13=>new ParserAction($this->reduce, $table7),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					20=>new ParserAction($this->reduce, $table7),
					21=>new ParserAction($this->shift, $table15),
					22=>new ParserAction($this->reduce, $table7),
					23=>new ParserAction($this->shift, $table16),
					24=>new ParserAction($this->reduce, $table7),
					25=>new ParserAction($this->shift, $table17),
					26=>new ParserAction($this->reduce, $table7),
					27=>new ParserAction($this->shift, $table18),
					28=>new ParserAction($this->reduce, $table7),
					29=>new ParserAction($this->shift, $table19),
					30=>new ParserAction($this->reduce, $table7),
					31=>new ParserAction($this->shift, $table20),
					32=>new ParserAction($this->reduce, $table7),
					33=>new ParserAction($this->shift, $table21),
					34=>new ParserAction($this->reduce, $table7),
					35=>new ParserAction($this->shift, $table22),
					36=>new ParserAction($this->reduce, $table7),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					39=>new ParserAction($this->reduce, $table7),
					40=>new ParserAction($this->shift, $table25),
					41=>new ParserAction($this->reduce, $table7),
					42=>new ParserAction($this->shift, $table26),
					43=>new ParserAction($this->reduce, $table7),
					44=>new ParserAction($this->shift, $table27),
					45=>new ParserAction($this->reduce, $table7),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					51=>new ParserAction($this->reduce, $table7),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34),
					57=>new ParserAction($this->reduce, $table7)
				);

			$tableDefinition7 = array(
				
					1=>new ParserAction($this->reduce, $table10),
					4=>new ParserAction($this->none, $table40),
					5=>new ParserAction($this->reduce, $table10),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->reduce, $table10),
					10=>new ParserAction($this->shift, $table7),
					11=>new ParserAction($this->shift, $table39),
					12=>new ParserAction($this->shift, $table8),
					13=>new ParserAction($this->reduce, $table10),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					20=>new ParserAction($this->reduce, $table10),
					21=>new ParserAction($this->shift, $table15),
					22=>new ParserAction($this->reduce, $table10),
					23=>new ParserAction($this->shift, $table16),
					24=>new ParserAction($this->reduce, $table10),
					25=>new ParserAction($this->shift, $table17),
					26=>new ParserAction($this->reduce, $table10),
					27=>new ParserAction($this->shift, $table18),
					28=>new ParserAction($this->reduce, $table10),
					29=>new ParserAction($this->shift, $table19),
					30=>new ParserAction($this->reduce, $table10),
					31=>new ParserAction($this->shift, $table20),
					32=>new ParserAction($this->reduce, $table10),
					33=>new ParserAction($this->shift, $table21),
					34=>new ParserAction($this->reduce, $table10),
					35=>new ParserAction($this->shift, $table22),
					36=>new ParserAction($this->reduce, $table10),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					39=>new ParserAction($this->reduce, $table10),
					40=>new ParserAction($this->shift, $table25),
					41=>new ParserAction($this->reduce, $table10),
					42=>new ParserAction($this->shift, $table26),
					43=>new ParserAction($this->reduce, $table10),
					44=>new ParserAction($this->shift, $table27),
					45=>new ParserAction($this->reduce, $table10),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					51=>new ParserAction($this->reduce, $table10),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34),
					57=>new ParserAction($this->reduce, $table10)
				);

			$tableDefinition8 = array(
				
					1=>new ParserAction($this->reduce, $table13),
					4=>new ParserAction($this->none, $table42),
					5=>new ParserAction($this->reduce, $table13),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->reduce, $table13),
					10=>new ParserAction($this->shift, $table7),
					11=>new ParserAction($this->reduce, $table13),
					12=>new ParserAction($this->shift, $table8),
					13=>new ParserAction($this->shift, $table41),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					20=>new ParserAction($this->reduce, $table13),
					21=>new ParserAction($this->shift, $table15),
					22=>new ParserAction($this->reduce, $table13),
					23=>new ParserAction($this->shift, $table16),
					24=>new ParserAction($this->reduce, $table13),
					25=>new ParserAction($this->shift, $table17),
					26=>new ParserAction($this->reduce, $table13),
					27=>new ParserAction($this->shift, $table18),
					28=>new ParserAction($this->reduce, $table13),
					29=>new ParserAction($this->shift, $table19),
					30=>new ParserAction($this->reduce, $table13),
					31=>new ParserAction($this->shift, $table20),
					32=>new ParserAction($this->reduce, $table13),
					33=>new ParserAction($this->shift, $table21),
					34=>new ParserAction($this->reduce, $table13),
					35=>new ParserAction($this->shift, $table22),
					36=>new ParserAction($this->reduce, $table13),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					39=>new ParserAction($this->reduce, $table13),
					40=>new ParserAction($this->shift, $table25),
					41=>new ParserAction($this->reduce, $table13),
					42=>new ParserAction($this->shift, $table26),
					43=>new ParserAction($this->reduce, $table13),
					44=>new ParserAction($this->shift, $table27),
					45=>new ParserAction($this->reduce, $table13),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					51=>new ParserAction($this->reduce, $table13),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34),
					57=>new ParserAction($this->reduce, $table13)
				);

			$tableDefinition9 = array(
				
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
					44=>new ParserAction($this->reduce, $table16),
					45=>new ParserAction($this->reduce, $table16),
					46=>new ParserAction($this->reduce, $table16),
					47=>new ParserAction($this->reduce, $table16),
					49=>new ParserAction($this->reduce, $table16),
					51=>new ParserAction($this->reduce, $table16),
					52=>new ParserAction($this->reduce, $table16),
					53=>new ParserAction($this->reduce, $table16),
					54=>new ParserAction($this->reduce, $table16),
					55=>new ParserAction($this->reduce, $table16),
					57=>new ParserAction($this->reduce, $table16)
				);

			$tableDefinition10 = array(
				
					1=>new ParserAction($this->reduce, $table17),
					5=>new ParserAction($this->reduce, $table17),
					7=>new ParserAction($this->reduce, $table17),
					8=>new ParserAction($this->reduce, $table17),
					9=>new ParserAction($this->reduce, $table17),
					10=>new ParserAction($this->reduce, $table17),
					11=>new ParserAction($this->reduce, $table17),
					12=>new ParserAction($this->reduce, $table17),
					13=>new ParserAction($this->reduce, $table17),
					14=>new ParserAction($this->reduce, $table17),
					15=>new ParserAction($this->reduce, $table17),
					16=>new ParserAction($this->reduce, $table17),
					17=>new ParserAction($this->reduce, $table17),
					18=>new ParserAction($this->reduce, $table17),
					19=>new ParserAction($this->reduce, $table17),
					20=>new ParserAction($this->reduce, $table17),
					21=>new ParserAction($this->reduce, $table17),
					22=>new ParserAction($this->reduce, $table17),
					23=>new ParserAction($this->reduce, $table17),
					24=>new ParserAction($this->reduce, $table17),
					25=>new ParserAction($this->reduce, $table17),
					26=>new ParserAction($this->reduce, $table17),
					27=>new ParserAction($this->reduce, $table17),
					28=>new ParserAction($this->reduce, $table17),
					29=>new ParserAction($this->reduce, $table17),
					30=>new ParserAction($this->reduce, $table17),
					31=>new ParserAction($this->reduce, $table17),
					32=>new ParserAction($this->reduce, $table17),
					33=>new ParserAction($this->reduce, $table17),
					34=>new ParserAction($this->reduce, $table17),
					35=>new ParserAction($this->reduce, $table17),
					36=>new ParserAction($this->reduce, $table17),
					37=>new ParserAction($this->reduce, $table17),
					38=>new ParserAction($this->reduce, $table17),
					39=>new ParserAction($this->reduce, $table17),
					40=>new ParserAction($this->reduce, $table17),
					41=>new ParserAction($this->reduce, $table17),
					42=>new ParserAction($this->reduce, $table17),
					43=>new ParserAction($this->reduce, $table17),
					44=>new ParserAction($this->reduce, $table17),
					45=>new ParserAction($this->reduce, $table17),
					46=>new ParserAction($this->reduce, $table17),
					47=>new ParserAction($this->reduce, $table17),
					49=>new ParserAction($this->reduce, $table17),
					51=>new ParserAction($this->reduce, $table17),
					52=>new ParserAction($this->reduce, $table17),
					53=>new ParserAction($this->reduce, $table17),
					54=>new ParserAction($this->reduce, $table17),
					55=>new ParserAction($this->reduce, $table17),
					57=>new ParserAction($this->reduce, $table17)
				);

			$tableDefinition11 = array(
				
					1=>new ParserAction($this->reduce, $table18),
					5=>new ParserAction($this->reduce, $table18),
					7=>new ParserAction($this->reduce, $table18),
					8=>new ParserAction($this->reduce, $table18),
					9=>new ParserAction($this->reduce, $table18),
					10=>new ParserAction($this->reduce, $table18),
					11=>new ParserAction($this->reduce, $table18),
					12=>new ParserAction($this->reduce, $table18),
					13=>new ParserAction($this->reduce, $table18),
					14=>new ParserAction($this->reduce, $table18),
					15=>new ParserAction($this->reduce, $table18),
					16=>new ParserAction($this->reduce, $table18),
					17=>new ParserAction($this->reduce, $table18),
					18=>new ParserAction($this->reduce, $table18),
					19=>new ParserAction($this->reduce, $table18),
					20=>new ParserAction($this->reduce, $table18),
					21=>new ParserAction($this->reduce, $table18),
					22=>new ParserAction($this->reduce, $table18),
					23=>new ParserAction($this->reduce, $table18),
					24=>new ParserAction($this->reduce, $table18),
					25=>new ParserAction($this->reduce, $table18),
					26=>new ParserAction($this->reduce, $table18),
					27=>new ParserAction($this->reduce, $table18),
					28=>new ParserAction($this->reduce, $table18),
					29=>new ParserAction($this->reduce, $table18),
					30=>new ParserAction($this->reduce, $table18),
					31=>new ParserAction($this->reduce, $table18),
					32=>new ParserAction($this->reduce, $table18),
					33=>new ParserAction($this->reduce, $table18),
					34=>new ParserAction($this->reduce, $table18),
					35=>new ParserAction($this->reduce, $table18),
					36=>new ParserAction($this->reduce, $table18),
					37=>new ParserAction($this->reduce, $table18),
					38=>new ParserAction($this->reduce, $table18),
					39=>new ParserAction($this->reduce, $table18),
					40=>new ParserAction($this->reduce, $table18),
					41=>new ParserAction($this->reduce, $table18),
					42=>new ParserAction($this->reduce, $table18),
					43=>new ParserAction($this->reduce, $table18),
					44=>new ParserAction($this->reduce, $table18),
					45=>new ParserAction($this->reduce, $table18),
					46=>new ParserAction($this->reduce, $table18),
					47=>new ParserAction($this->reduce, $table18),
					49=>new ParserAction($this->reduce, $table18),
					51=>new ParserAction($this->reduce, $table18),
					52=>new ParserAction($this->reduce, $table18),
					53=>new ParserAction($this->reduce, $table18),
					54=>new ParserAction($this->reduce, $table18),
					55=>new ParserAction($this->reduce, $table18),
					57=>new ParserAction($this->reduce, $table18)
				);

			$tableDefinition12 = array(
				
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
					44=>new ParserAction($this->reduce, $table19),
					45=>new ParserAction($this->reduce, $table19),
					46=>new ParserAction($this->reduce, $table19),
					47=>new ParserAction($this->reduce, $table19),
					49=>new ParserAction($this->reduce, $table19),
					51=>new ParserAction($this->reduce, $table19),
					52=>new ParserAction($this->reduce, $table19),
					53=>new ParserAction($this->reduce, $table19),
					54=>new ParserAction($this->reduce, $table19),
					55=>new ParserAction($this->reduce, $table19),
					57=>new ParserAction($this->reduce, $table19)
				);

			$tableDefinition13 = array(
				
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
					44=>new ParserAction($this->reduce, $table20),
					45=>new ParserAction($this->reduce, $table20),
					46=>new ParserAction($this->reduce, $table20),
					47=>new ParserAction($this->reduce, $table20),
					49=>new ParserAction($this->reduce, $table20),
					51=>new ParserAction($this->reduce, $table20),
					52=>new ParserAction($this->reduce, $table20),
					53=>new ParserAction($this->reduce, $table20),
					54=>new ParserAction($this->reduce, $table20),
					55=>new ParserAction($this->reduce, $table20),
					57=>new ParserAction($this->reduce, $table20)
				);

			$tableDefinition14 = array(
				
					1=>new ParserAction($this->reduce, $table21),
					4=>new ParserAction($this->none, $table44),
					5=>new ParserAction($this->reduce, $table21),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->reduce, $table21),
					10=>new ParserAction($this->shift, $table7),
					11=>new ParserAction($this->reduce, $table21),
					12=>new ParserAction($this->shift, $table8),
					13=>new ParserAction($this->reduce, $table21),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					20=>new ParserAction($this->shift, $table43),
					21=>new ParserAction($this->shift, $table15),
					22=>new ParserAction($this->reduce, $table21),
					23=>new ParserAction($this->shift, $table16),
					24=>new ParserAction($this->reduce, $table21),
					25=>new ParserAction($this->shift, $table17),
					26=>new ParserAction($this->reduce, $table21),
					27=>new ParserAction($this->shift, $table18),
					28=>new ParserAction($this->reduce, $table21),
					29=>new ParserAction($this->shift, $table19),
					30=>new ParserAction($this->reduce, $table21),
					31=>new ParserAction($this->shift, $table20),
					32=>new ParserAction($this->reduce, $table21),
					33=>new ParserAction($this->shift, $table21),
					34=>new ParserAction($this->reduce, $table21),
					35=>new ParserAction($this->shift, $table22),
					36=>new ParserAction($this->reduce, $table21),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					39=>new ParserAction($this->reduce, $table21),
					40=>new ParserAction($this->shift, $table25),
					41=>new ParserAction($this->reduce, $table21),
					42=>new ParserAction($this->shift, $table26),
					43=>new ParserAction($this->reduce, $table21),
					44=>new ParserAction($this->shift, $table27),
					45=>new ParserAction($this->reduce, $table21),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					51=>new ParserAction($this->reduce, $table21),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34),
					57=>new ParserAction($this->reduce, $table21)
				);

			$tableDefinition15 = array(
				
					1=>new ParserAction($this->reduce, $table24),
					4=>new ParserAction($this->none, $table46),
					5=>new ParserAction($this->reduce, $table24),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->reduce, $table24),
					10=>new ParserAction($this->shift, $table7),
					11=>new ParserAction($this->reduce, $table24),
					12=>new ParserAction($this->shift, $table8),
					13=>new ParserAction($this->reduce, $table24),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					20=>new ParserAction($this->reduce, $table24),
					21=>new ParserAction($this->shift, $table15),
					22=>new ParserAction($this->shift, $table45),
					23=>new ParserAction($this->shift, $table16),
					24=>new ParserAction($this->reduce, $table24),
					25=>new ParserAction($this->shift, $table17),
					26=>new ParserAction($this->reduce, $table24),
					27=>new ParserAction($this->shift, $table18),
					28=>new ParserAction($this->reduce, $table24),
					29=>new ParserAction($this->shift, $table19),
					30=>new ParserAction($this->reduce, $table24),
					31=>new ParserAction($this->shift, $table20),
					32=>new ParserAction($this->reduce, $table24),
					33=>new ParserAction($this->shift, $table21),
					34=>new ParserAction($this->reduce, $table24),
					35=>new ParserAction($this->shift, $table22),
					36=>new ParserAction($this->reduce, $table24),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					39=>new ParserAction($this->reduce, $table24),
					40=>new ParserAction($this->shift, $table25),
					41=>new ParserAction($this->reduce, $table24),
					42=>new ParserAction($this->shift, $table26),
					43=>new ParserAction($this->reduce, $table24),
					44=>new ParserAction($this->shift, $table27),
					45=>new ParserAction($this->reduce, $table24),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					51=>new ParserAction($this->reduce, $table24),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34),
					57=>new ParserAction($this->reduce, $table24)
				);

			$tableDefinition16 = array(
				
					1=>new ParserAction($this->reduce, $table27),
					4=>new ParserAction($this->none, $table48),
					5=>new ParserAction($this->reduce, $table27),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->reduce, $table27),
					10=>new ParserAction($this->shift, $table7),
					11=>new ParserAction($this->reduce, $table27),
					12=>new ParserAction($this->shift, $table8),
					13=>new ParserAction($this->reduce, $table27),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					20=>new ParserAction($this->reduce, $table27),
					21=>new ParserAction($this->shift, $table15),
					22=>new ParserAction($this->reduce, $table27),
					23=>new ParserAction($this->shift, $table16),
					24=>new ParserAction($this->shift, $table47),
					25=>new ParserAction($this->shift, $table17),
					26=>new ParserAction($this->reduce, $table27),
					27=>new ParserAction($this->shift, $table18),
					28=>new ParserAction($this->reduce, $table27),
					29=>new ParserAction($this->shift, $table19),
					30=>new ParserAction($this->reduce, $table27),
					31=>new ParserAction($this->shift, $table20),
					32=>new ParserAction($this->reduce, $table27),
					33=>new ParserAction($this->shift, $table21),
					34=>new ParserAction($this->reduce, $table27),
					35=>new ParserAction($this->shift, $table22),
					36=>new ParserAction($this->reduce, $table27),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					39=>new ParserAction($this->reduce, $table27),
					40=>new ParserAction($this->shift, $table25),
					41=>new ParserAction($this->reduce, $table27),
					42=>new ParserAction($this->shift, $table26),
					43=>new ParserAction($this->reduce, $table27),
					44=>new ParserAction($this->shift, $table27),
					45=>new ParserAction($this->reduce, $table27),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					51=>new ParserAction($this->reduce, $table27),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34),
					57=>new ParserAction($this->reduce, $table27)
				);

			$tableDefinition17 = array(
				
					1=>new ParserAction($this->reduce, $table30),
					4=>new ParserAction($this->none, $table50),
					5=>new ParserAction($this->reduce, $table30),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->reduce, $table30),
					10=>new ParserAction($this->shift, $table7),
					11=>new ParserAction($this->reduce, $table30),
					12=>new ParserAction($this->shift, $table8),
					13=>new ParserAction($this->reduce, $table30),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					20=>new ParserAction($this->reduce, $table30),
					21=>new ParserAction($this->shift, $table15),
					22=>new ParserAction($this->reduce, $table30),
					23=>new ParserAction($this->shift, $table16),
					24=>new ParserAction($this->reduce, $table30),
					25=>new ParserAction($this->shift, $table17),
					26=>new ParserAction($this->shift, $table49),
					27=>new ParserAction($this->shift, $table18),
					28=>new ParserAction($this->reduce, $table30),
					29=>new ParserAction($this->shift, $table19),
					30=>new ParserAction($this->reduce, $table30),
					31=>new ParserAction($this->shift, $table20),
					32=>new ParserAction($this->reduce, $table30),
					33=>new ParserAction($this->shift, $table21),
					34=>new ParserAction($this->reduce, $table30),
					35=>new ParserAction($this->shift, $table22),
					36=>new ParserAction($this->reduce, $table30),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					39=>new ParserAction($this->reduce, $table30),
					40=>new ParserAction($this->shift, $table25),
					41=>new ParserAction($this->reduce, $table30),
					42=>new ParserAction($this->shift, $table26),
					43=>new ParserAction($this->reduce, $table30),
					44=>new ParserAction($this->shift, $table27),
					45=>new ParserAction($this->reduce, $table30),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					51=>new ParserAction($this->reduce, $table30),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34),
					57=>new ParserAction($this->reduce, $table30)
				);

			$tableDefinition18 = array(
				
					1=>new ParserAction($this->reduce, $table33),
					4=>new ParserAction($this->none, $table52),
					5=>new ParserAction($this->reduce, $table33),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->reduce, $table33),
					10=>new ParserAction($this->shift, $table7),
					11=>new ParserAction($this->reduce, $table33),
					12=>new ParserAction($this->shift, $table8),
					13=>new ParserAction($this->reduce, $table33),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					20=>new ParserAction($this->reduce, $table33),
					21=>new ParserAction($this->shift, $table15),
					22=>new ParserAction($this->reduce, $table33),
					23=>new ParserAction($this->shift, $table16),
					24=>new ParserAction($this->reduce, $table33),
					25=>new ParserAction($this->shift, $table17),
					26=>new ParserAction($this->reduce, $table33),
					27=>new ParserAction($this->shift, $table18),
					28=>new ParserAction($this->shift, $table51),
					29=>new ParserAction($this->shift, $table19),
					30=>new ParserAction($this->reduce, $table33),
					31=>new ParserAction($this->shift, $table20),
					32=>new ParserAction($this->reduce, $table33),
					33=>new ParserAction($this->shift, $table21),
					34=>new ParserAction($this->reduce, $table33),
					35=>new ParserAction($this->shift, $table22),
					36=>new ParserAction($this->reduce, $table33),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					39=>new ParserAction($this->reduce, $table33),
					40=>new ParserAction($this->shift, $table25),
					41=>new ParserAction($this->reduce, $table33),
					42=>new ParserAction($this->shift, $table26),
					43=>new ParserAction($this->reduce, $table33),
					44=>new ParserAction($this->shift, $table27),
					45=>new ParserAction($this->reduce, $table33),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					51=>new ParserAction($this->reduce, $table33),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34),
					57=>new ParserAction($this->reduce, $table33)
				);

			$tableDefinition19 = array(
				
					1=>new ParserAction($this->reduce, $table36),
					4=>new ParserAction($this->none, $table54),
					5=>new ParserAction($this->reduce, $table36),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->reduce, $table36),
					10=>new ParserAction($this->shift, $table7),
					11=>new ParserAction($this->reduce, $table36),
					12=>new ParserAction($this->shift, $table8),
					13=>new ParserAction($this->reduce, $table36),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					20=>new ParserAction($this->reduce, $table36),
					21=>new ParserAction($this->shift, $table15),
					22=>new ParserAction($this->reduce, $table36),
					23=>new ParserAction($this->shift, $table16),
					24=>new ParserAction($this->reduce, $table36),
					25=>new ParserAction($this->shift, $table17),
					26=>new ParserAction($this->reduce, $table36),
					27=>new ParserAction($this->shift, $table18),
					28=>new ParserAction($this->reduce, $table36),
					29=>new ParserAction($this->shift, $table19),
					30=>new ParserAction($this->shift, $table53),
					31=>new ParserAction($this->shift, $table20),
					32=>new ParserAction($this->reduce, $table36),
					33=>new ParserAction($this->shift, $table21),
					34=>new ParserAction($this->reduce, $table36),
					35=>new ParserAction($this->shift, $table22),
					36=>new ParserAction($this->reduce, $table36),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					39=>new ParserAction($this->reduce, $table36),
					40=>new ParserAction($this->shift, $table25),
					41=>new ParserAction($this->reduce, $table36),
					42=>new ParserAction($this->shift, $table26),
					43=>new ParserAction($this->reduce, $table36),
					44=>new ParserAction($this->shift, $table27),
					45=>new ParserAction($this->reduce, $table36),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					51=>new ParserAction($this->reduce, $table36),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34),
					57=>new ParserAction($this->reduce, $table36)
				);

			$tableDefinition20 = array(
				
					1=>new ParserAction($this->reduce, $table39),
					4=>new ParserAction($this->none, $table56),
					5=>new ParserAction($this->reduce, $table39),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->reduce, $table39),
					10=>new ParserAction($this->shift, $table7),
					11=>new ParserAction($this->reduce, $table39),
					12=>new ParserAction($this->shift, $table8),
					13=>new ParserAction($this->reduce, $table39),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					20=>new ParserAction($this->reduce, $table39),
					21=>new ParserAction($this->shift, $table15),
					22=>new ParserAction($this->reduce, $table39),
					23=>new ParserAction($this->shift, $table16),
					24=>new ParserAction($this->reduce, $table39),
					25=>new ParserAction($this->shift, $table17),
					26=>new ParserAction($this->reduce, $table39),
					27=>new ParserAction($this->shift, $table18),
					28=>new ParserAction($this->reduce, $table39),
					29=>new ParserAction($this->shift, $table19),
					30=>new ParserAction($this->reduce, $table39),
					31=>new ParserAction($this->shift, $table20),
					32=>new ParserAction($this->shift, $table55),
					33=>new ParserAction($this->shift, $table21),
					34=>new ParserAction($this->reduce, $table39),
					35=>new ParserAction($this->shift, $table22),
					36=>new ParserAction($this->reduce, $table39),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					39=>new ParserAction($this->reduce, $table39),
					40=>new ParserAction($this->shift, $table25),
					41=>new ParserAction($this->reduce, $table39),
					42=>new ParserAction($this->shift, $table26),
					43=>new ParserAction($this->reduce, $table39),
					44=>new ParserAction($this->shift, $table27),
					45=>new ParserAction($this->reduce, $table39),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					51=>new ParserAction($this->reduce, $table39),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34),
					57=>new ParserAction($this->reduce, $table39)
				);

			$tableDefinition21 = array(
				
					1=>new ParserAction($this->reduce, $table43),
					4=>new ParserAction($this->none, $table58),
					5=>new ParserAction($this->reduce, $table43),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->reduce, $table43),
					10=>new ParserAction($this->shift, $table7),
					11=>new ParserAction($this->reduce, $table43),
					12=>new ParserAction($this->shift, $table8),
					13=>new ParserAction($this->reduce, $table43),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					20=>new ParserAction($this->reduce, $table43),
					21=>new ParserAction($this->shift, $table15),
					22=>new ParserAction($this->reduce, $table43),
					23=>new ParserAction($this->shift, $table16),
					24=>new ParserAction($this->reduce, $table43),
					25=>new ParserAction($this->shift, $table17),
					26=>new ParserAction($this->reduce, $table43),
					27=>new ParserAction($this->shift, $table18),
					28=>new ParserAction($this->reduce, $table43),
					29=>new ParserAction($this->shift, $table19),
					30=>new ParserAction($this->reduce, $table43),
					31=>new ParserAction($this->shift, $table20),
					32=>new ParserAction($this->reduce, $table43),
					33=>new ParserAction($this->shift, $table21),
					34=>new ParserAction($this->shift, $table57),
					35=>new ParserAction($this->shift, $table22),
					36=>new ParserAction($this->reduce, $table43),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					39=>new ParserAction($this->reduce, $table43),
					40=>new ParserAction($this->shift, $table25),
					41=>new ParserAction($this->reduce, $table43),
					42=>new ParserAction($this->shift, $table26),
					43=>new ParserAction($this->reduce, $table43),
					44=>new ParserAction($this->shift, $table27),
					45=>new ParserAction($this->reduce, $table43),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					51=>new ParserAction($this->reduce, $table43),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34),
					57=>new ParserAction($this->reduce, $table43)
				);

			$tableDefinition22 = array(
				
					1=>new ParserAction($this->reduce, $table46),
					4=>new ParserAction($this->none, $table60),
					5=>new ParserAction($this->reduce, $table46),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->reduce, $table46),
					10=>new ParserAction($this->shift, $table7),
					11=>new ParserAction($this->reduce, $table46),
					12=>new ParserAction($this->shift, $table8),
					13=>new ParserAction($this->reduce, $table46),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					20=>new ParserAction($this->reduce, $table46),
					21=>new ParserAction($this->shift, $table15),
					22=>new ParserAction($this->reduce, $table46),
					23=>new ParserAction($this->shift, $table16),
					24=>new ParserAction($this->reduce, $table46),
					25=>new ParserAction($this->shift, $table17),
					26=>new ParserAction($this->reduce, $table46),
					27=>new ParserAction($this->shift, $table18),
					28=>new ParserAction($this->reduce, $table46),
					29=>new ParserAction($this->shift, $table19),
					30=>new ParserAction($this->reduce, $table46),
					31=>new ParserAction($this->shift, $table20),
					32=>new ParserAction($this->reduce, $table46),
					33=>new ParserAction($this->shift, $table21),
					34=>new ParserAction($this->reduce, $table46),
					35=>new ParserAction($this->shift, $table22),
					36=>new ParserAction($this->shift, $table59),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					39=>new ParserAction($this->reduce, $table46),
					40=>new ParserAction($this->shift, $table25),
					41=>new ParserAction($this->reduce, $table46),
					42=>new ParserAction($this->shift, $table26),
					43=>new ParserAction($this->reduce, $table46),
					44=>new ParserAction($this->shift, $table27),
					45=>new ParserAction($this->reduce, $table46),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					51=>new ParserAction($this->reduce, $table46),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34),
					57=>new ParserAction($this->reduce, $table46)
				);

			$tableDefinition23 = array(
				
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
					44=>new ParserAction($this->reduce, $table49),
					45=>new ParserAction($this->reduce, $table49),
					46=>new ParserAction($this->reduce, $table49),
					47=>new ParserAction($this->reduce, $table49),
					49=>new ParserAction($this->reduce, $table49),
					51=>new ParserAction($this->reduce, $table49),
					52=>new ParserAction($this->reduce, $table49),
					53=>new ParserAction($this->reduce, $table49),
					54=>new ParserAction($this->reduce, $table49),
					55=>new ParserAction($this->reduce, $table49),
					57=>new ParserAction($this->reduce, $table49)
				);

			$tableDefinition24 = array(
				
					1=>new ParserAction($this->reduce, $table50),
					4=>new ParserAction($this->none, $table62),
					5=>new ParserAction($this->reduce, $table50),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->reduce, $table50),
					10=>new ParserAction($this->shift, $table7),
					11=>new ParserAction($this->reduce, $table50),
					12=>new ParserAction($this->shift, $table8),
					13=>new ParserAction($this->reduce, $table50),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					20=>new ParserAction($this->reduce, $table50),
					21=>new ParserAction($this->shift, $table15),
					22=>new ParserAction($this->reduce, $table50),
					23=>new ParserAction($this->shift, $table16),
					24=>new ParserAction($this->reduce, $table50),
					25=>new ParserAction($this->shift, $table17),
					26=>new ParserAction($this->reduce, $table50),
					27=>new ParserAction($this->shift, $table18),
					28=>new ParserAction($this->reduce, $table50),
					29=>new ParserAction($this->shift, $table19),
					30=>new ParserAction($this->reduce, $table50),
					31=>new ParserAction($this->shift, $table20),
					32=>new ParserAction($this->reduce, $table50),
					33=>new ParserAction($this->shift, $table21),
					34=>new ParserAction($this->reduce, $table50),
					35=>new ParserAction($this->shift, $table22),
					36=>new ParserAction($this->reduce, $table50),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					39=>new ParserAction($this->shift, $table61),
					40=>new ParserAction($this->shift, $table25),
					41=>new ParserAction($this->reduce, $table50),
					42=>new ParserAction($this->shift, $table26),
					43=>new ParserAction($this->reduce, $table50),
					44=>new ParserAction($this->shift, $table27),
					45=>new ParserAction($this->reduce, $table50),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					51=>new ParserAction($this->reduce, $table50),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34),
					57=>new ParserAction($this->reduce, $table50)
				);

			$tableDefinition25 = array(
				
					1=>new ParserAction($this->reduce, $table53),
					4=>new ParserAction($this->none, $table64),
					5=>new ParserAction($this->reduce, $table53),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->reduce, $table53),
					10=>new ParserAction($this->shift, $table7),
					11=>new ParserAction($this->reduce, $table53),
					12=>new ParserAction($this->shift, $table8),
					13=>new ParserAction($this->reduce, $table53),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					20=>new ParserAction($this->reduce, $table53),
					21=>new ParserAction($this->shift, $table15),
					22=>new ParserAction($this->reduce, $table53),
					23=>new ParserAction($this->shift, $table16),
					24=>new ParserAction($this->reduce, $table53),
					25=>new ParserAction($this->shift, $table17),
					26=>new ParserAction($this->reduce, $table53),
					27=>new ParserAction($this->shift, $table18),
					28=>new ParserAction($this->reduce, $table53),
					29=>new ParserAction($this->shift, $table19),
					30=>new ParserAction($this->reduce, $table53),
					31=>new ParserAction($this->shift, $table20),
					32=>new ParserAction($this->reduce, $table53),
					33=>new ParserAction($this->shift, $table21),
					34=>new ParserAction($this->reduce, $table53),
					35=>new ParserAction($this->shift, $table22),
					36=>new ParserAction($this->reduce, $table53),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					39=>new ParserAction($this->reduce, $table53),
					40=>new ParserAction($this->shift, $table25),
					41=>new ParserAction($this->shift, $table63),
					42=>new ParserAction($this->shift, $table26),
					43=>new ParserAction($this->reduce, $table53),
					44=>new ParserAction($this->shift, $table27),
					45=>new ParserAction($this->reduce, $table53),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					51=>new ParserAction($this->reduce, $table53),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34),
					57=>new ParserAction($this->reduce, $table53)
				);

			$tableDefinition26 = array(
				
					1=>new ParserAction($this->reduce, $table56),
					4=>new ParserAction($this->none, $table66),
					5=>new ParserAction($this->reduce, $table56),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->reduce, $table56),
					10=>new ParserAction($this->shift, $table7),
					11=>new ParserAction($this->reduce, $table56),
					12=>new ParserAction($this->shift, $table8),
					13=>new ParserAction($this->reduce, $table56),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					20=>new ParserAction($this->reduce, $table56),
					21=>new ParserAction($this->shift, $table15),
					22=>new ParserAction($this->reduce, $table56),
					23=>new ParserAction($this->shift, $table16),
					24=>new ParserAction($this->reduce, $table56),
					25=>new ParserAction($this->shift, $table17),
					26=>new ParserAction($this->reduce, $table56),
					27=>new ParserAction($this->shift, $table18),
					28=>new ParserAction($this->reduce, $table56),
					29=>new ParserAction($this->shift, $table19),
					30=>new ParserAction($this->reduce, $table56),
					31=>new ParserAction($this->shift, $table20),
					32=>new ParserAction($this->reduce, $table56),
					33=>new ParserAction($this->shift, $table21),
					34=>new ParserAction($this->reduce, $table56),
					35=>new ParserAction($this->shift, $table22),
					36=>new ParserAction($this->reduce, $table56),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					39=>new ParserAction($this->reduce, $table56),
					40=>new ParserAction($this->shift, $table25),
					41=>new ParserAction($this->reduce, $table56),
					42=>new ParserAction($this->shift, $table26),
					43=>new ParserAction($this->shift, $table65),
					44=>new ParserAction($this->shift, $table27),
					45=>new ParserAction($this->reduce, $table56),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					51=>new ParserAction($this->reduce, $table56),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34),
					57=>new ParserAction($this->reduce, $table56)
				);

			$tableDefinition27 = array(
				
					1=>new ParserAction($this->reduce, $table59),
					4=>new ParserAction($this->none, $table68),
					5=>new ParserAction($this->reduce, $table59),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->reduce, $table59),
					10=>new ParserAction($this->shift, $table7),
					11=>new ParserAction($this->reduce, $table59),
					12=>new ParserAction($this->shift, $table8),
					13=>new ParserAction($this->reduce, $table59),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					20=>new ParserAction($this->reduce, $table59),
					21=>new ParserAction($this->shift, $table15),
					22=>new ParserAction($this->reduce, $table59),
					23=>new ParserAction($this->shift, $table16),
					24=>new ParserAction($this->reduce, $table59),
					25=>new ParserAction($this->shift, $table17),
					26=>new ParserAction($this->reduce, $table59),
					27=>new ParserAction($this->shift, $table18),
					28=>new ParserAction($this->reduce, $table59),
					29=>new ParserAction($this->shift, $table19),
					30=>new ParserAction($this->reduce, $table59),
					31=>new ParserAction($this->shift, $table20),
					32=>new ParserAction($this->reduce, $table59),
					33=>new ParserAction($this->shift, $table21),
					34=>new ParserAction($this->reduce, $table59),
					35=>new ParserAction($this->shift, $table22),
					36=>new ParserAction($this->reduce, $table59),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					39=>new ParserAction($this->reduce, $table59),
					40=>new ParserAction($this->shift, $table25),
					41=>new ParserAction($this->reduce, $table59),
					42=>new ParserAction($this->shift, $table26),
					43=>new ParserAction($this->reduce, $table59),
					44=>new ParserAction($this->shift, $table27),
					45=>new ParserAction($this->shift, $table67),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					51=>new ParserAction($this->reduce, $table59),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34),
					57=>new ParserAction($this->reduce, $table59)
				);

			$tableDefinition28 = array(
				
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
					44=>new ParserAction($this->reduce, $table62),
					45=>new ParserAction($this->reduce, $table62),
					46=>new ParserAction($this->reduce, $table62),
					47=>new ParserAction($this->reduce, $table62),
					49=>new ParserAction($this->reduce, $table62),
					51=>new ParserAction($this->reduce, $table62),
					52=>new ParserAction($this->reduce, $table62),
					53=>new ParserAction($this->reduce, $table62),
					54=>new ParserAction($this->reduce, $table62),
					55=>new ParserAction($this->reduce, $table62),
					57=>new ParserAction($this->reduce, $table62)
				);

			$tableDefinition29 = array(
				
					1=>new ParserAction($this->reduce, $table63),
					5=>new ParserAction($this->reduce, $table63),
					7=>new ParserAction($this->reduce, $table63),
					8=>new ParserAction($this->reduce, $table63),
					9=>new ParserAction($this->reduce, $table63),
					10=>new ParserAction($this->reduce, $table63),
					11=>new ParserAction($this->reduce, $table63),
					12=>new ParserAction($this->reduce, $table63),
					13=>new ParserAction($this->reduce, $table63),
					14=>new ParserAction($this->reduce, $table63),
					15=>new ParserAction($this->reduce, $table63),
					16=>new ParserAction($this->reduce, $table63),
					17=>new ParserAction($this->reduce, $table63),
					18=>new ParserAction($this->reduce, $table63),
					19=>new ParserAction($this->reduce, $table63),
					20=>new ParserAction($this->reduce, $table63),
					21=>new ParserAction($this->reduce, $table63),
					22=>new ParserAction($this->reduce, $table63),
					23=>new ParserAction($this->reduce, $table63),
					24=>new ParserAction($this->reduce, $table63),
					25=>new ParserAction($this->reduce, $table63),
					26=>new ParserAction($this->reduce, $table63),
					27=>new ParserAction($this->reduce, $table63),
					28=>new ParserAction($this->reduce, $table63),
					29=>new ParserAction($this->reduce, $table63),
					30=>new ParserAction($this->reduce, $table63),
					31=>new ParserAction($this->reduce, $table63),
					32=>new ParserAction($this->reduce, $table63),
					33=>new ParserAction($this->reduce, $table63),
					34=>new ParserAction($this->reduce, $table63),
					35=>new ParserAction($this->reduce, $table63),
					36=>new ParserAction($this->reduce, $table63),
					37=>new ParserAction($this->reduce, $table63),
					38=>new ParserAction($this->reduce, $table63),
					39=>new ParserAction($this->reduce, $table63),
					40=>new ParserAction($this->reduce, $table63),
					41=>new ParserAction($this->reduce, $table63),
					42=>new ParserAction($this->reduce, $table63),
					43=>new ParserAction($this->reduce, $table63),
					44=>new ParserAction($this->reduce, $table63),
					45=>new ParserAction($this->reduce, $table63),
					46=>new ParserAction($this->reduce, $table63),
					47=>new ParserAction($this->reduce, $table63),
					48=>new ParserAction($this->shift, $table69),
					49=>new ParserAction($this->reduce, $table63),
					51=>new ParserAction($this->reduce, $table63),
					52=>new ParserAction($this->reduce, $table63),
					53=>new ParserAction($this->reduce, $table63),
					54=>new ParserAction($this->reduce, $table63),
					55=>new ParserAction($this->reduce, $table63),
					57=>new ParserAction($this->reduce, $table63)
				);

			$tableDefinition30 = array(
				
					1=>new ParserAction($this->reduce, $table68),
					5=>new ParserAction($this->reduce, $table68),
					7=>new ParserAction($this->reduce, $table68),
					8=>new ParserAction($this->reduce, $table68),
					9=>new ParserAction($this->reduce, $table68),
					10=>new ParserAction($this->reduce, $table68),
					11=>new ParserAction($this->reduce, $table68),
					12=>new ParserAction($this->reduce, $table68),
					13=>new ParserAction($this->reduce, $table68),
					14=>new ParserAction($this->reduce, $table68),
					15=>new ParserAction($this->reduce, $table68),
					16=>new ParserAction($this->reduce, $table68),
					17=>new ParserAction($this->reduce, $table68),
					18=>new ParserAction($this->reduce, $table68),
					19=>new ParserAction($this->reduce, $table68),
					20=>new ParserAction($this->reduce, $table68),
					21=>new ParserAction($this->reduce, $table68),
					22=>new ParserAction($this->reduce, $table68),
					23=>new ParserAction($this->reduce, $table68),
					24=>new ParserAction($this->reduce, $table68),
					25=>new ParserAction($this->reduce, $table68),
					26=>new ParserAction($this->reduce, $table68),
					27=>new ParserAction($this->reduce, $table68),
					28=>new ParserAction($this->reduce, $table68),
					29=>new ParserAction($this->reduce, $table68),
					30=>new ParserAction($this->reduce, $table68),
					31=>new ParserAction($this->reduce, $table68),
					32=>new ParserAction($this->reduce, $table68),
					33=>new ParserAction($this->reduce, $table68),
					34=>new ParserAction($this->reduce, $table68),
					35=>new ParserAction($this->reduce, $table68),
					36=>new ParserAction($this->reduce, $table68),
					37=>new ParserAction($this->reduce, $table68),
					38=>new ParserAction($this->reduce, $table68),
					39=>new ParserAction($this->reduce, $table68),
					40=>new ParserAction($this->reduce, $table68),
					41=>new ParserAction($this->reduce, $table68),
					42=>new ParserAction($this->reduce, $table68),
					43=>new ParserAction($this->reduce, $table68),
					44=>new ParserAction($this->reduce, $table68),
					45=>new ParserAction($this->reduce, $table68),
					46=>new ParserAction($this->reduce, $table68),
					47=>new ParserAction($this->reduce, $table68),
					49=>new ParserAction($this->reduce, $table68),
					50=>new ParserAction($this->shift, $table70),
					51=>new ParserAction($this->reduce, $table68),
					52=>new ParserAction($this->reduce, $table68),
					53=>new ParserAction($this->reduce, $table68),
					54=>new ParserAction($this->reduce, $table68),
					55=>new ParserAction($this->reduce, $table68),
					57=>new ParserAction($this->reduce, $table68)
				);

			$tableDefinition31 = array(
				
					1=>new ParserAction($this->reduce, $table69),
					5=>new ParserAction($this->reduce, $table69),
					7=>new ParserAction($this->reduce, $table69),
					8=>new ParserAction($this->reduce, $table69),
					9=>new ParserAction($this->reduce, $table69),
					10=>new ParserAction($this->reduce, $table69),
					11=>new ParserAction($this->reduce, $table69),
					12=>new ParserAction($this->reduce, $table69),
					13=>new ParserAction($this->reduce, $table69),
					14=>new ParserAction($this->reduce, $table69),
					15=>new ParserAction($this->reduce, $table69),
					16=>new ParserAction($this->reduce, $table69),
					17=>new ParserAction($this->reduce, $table69),
					18=>new ParserAction($this->reduce, $table69),
					19=>new ParserAction($this->reduce, $table69),
					20=>new ParserAction($this->reduce, $table69),
					21=>new ParserAction($this->reduce, $table69),
					22=>new ParserAction($this->reduce, $table69),
					23=>new ParserAction($this->reduce, $table69),
					24=>new ParserAction($this->reduce, $table69),
					25=>new ParserAction($this->reduce, $table69),
					26=>new ParserAction($this->reduce, $table69),
					27=>new ParserAction($this->reduce, $table69),
					28=>new ParserAction($this->reduce, $table69),
					29=>new ParserAction($this->reduce, $table69),
					30=>new ParserAction($this->reduce, $table69),
					31=>new ParserAction($this->reduce, $table69),
					32=>new ParserAction($this->reduce, $table69),
					33=>new ParserAction($this->reduce, $table69),
					34=>new ParserAction($this->reduce, $table69),
					35=>new ParserAction($this->reduce, $table69),
					36=>new ParserAction($this->reduce, $table69),
					37=>new ParserAction($this->reduce, $table69),
					38=>new ParserAction($this->reduce, $table69),
					39=>new ParserAction($this->reduce, $table69),
					40=>new ParserAction($this->reduce, $table69),
					41=>new ParserAction($this->reduce, $table69),
					42=>new ParserAction($this->reduce, $table69),
					43=>new ParserAction($this->reduce, $table69),
					44=>new ParserAction($this->reduce, $table69),
					45=>new ParserAction($this->reduce, $table69),
					46=>new ParserAction($this->reduce, $table69),
					47=>new ParserAction($this->reduce, $table69),
					49=>new ParserAction($this->reduce, $table69),
					51=>new ParserAction($this->reduce, $table69),
					52=>new ParserAction($this->reduce, $table69),
					53=>new ParserAction($this->reduce, $table69),
					54=>new ParserAction($this->reduce, $table69),
					55=>new ParserAction($this->reduce, $table69),
					57=>new ParserAction($this->reduce, $table69)
				);

			$tableDefinition32 = array(
				
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
					44=>new ParserAction($this->reduce, $table70),
					45=>new ParserAction($this->reduce, $table70),
					46=>new ParserAction($this->reduce, $table70),
					47=>new ParserAction($this->reduce, $table70),
					49=>new ParserAction($this->reduce, $table70),
					51=>new ParserAction($this->reduce, $table70),
					52=>new ParserAction($this->reduce, $table70),
					53=>new ParserAction($this->reduce, $table70),
					54=>new ParserAction($this->reduce, $table70),
					55=>new ParserAction($this->reduce, $table70),
					57=>new ParserAction($this->reduce, $table70)
				);

			$tableDefinition33 = array(
				
					1=>new ParserAction($this->reduce, $table71),
					5=>new ParserAction($this->reduce, $table71),
					7=>new ParserAction($this->reduce, $table71),
					8=>new ParserAction($this->reduce, $table71),
					9=>new ParserAction($this->reduce, $table71),
					10=>new ParserAction($this->reduce, $table71),
					11=>new ParserAction($this->reduce, $table71),
					12=>new ParserAction($this->reduce, $table71),
					13=>new ParserAction($this->reduce, $table71),
					14=>new ParserAction($this->reduce, $table71),
					15=>new ParserAction($this->reduce, $table71),
					16=>new ParserAction($this->reduce, $table71),
					17=>new ParserAction($this->reduce, $table71),
					18=>new ParserAction($this->reduce, $table71),
					19=>new ParserAction($this->reduce, $table71),
					20=>new ParserAction($this->reduce, $table71),
					21=>new ParserAction($this->reduce, $table71),
					22=>new ParserAction($this->reduce, $table71),
					23=>new ParserAction($this->reduce, $table71),
					24=>new ParserAction($this->reduce, $table71),
					25=>new ParserAction($this->reduce, $table71),
					26=>new ParserAction($this->reduce, $table71),
					27=>new ParserAction($this->reduce, $table71),
					28=>new ParserAction($this->reduce, $table71),
					29=>new ParserAction($this->reduce, $table71),
					30=>new ParserAction($this->reduce, $table71),
					31=>new ParserAction($this->reduce, $table71),
					32=>new ParserAction($this->reduce, $table71),
					33=>new ParserAction($this->reduce, $table71),
					34=>new ParserAction($this->reduce, $table71),
					35=>new ParserAction($this->reduce, $table71),
					36=>new ParserAction($this->reduce, $table71),
					37=>new ParserAction($this->reduce, $table71),
					38=>new ParserAction($this->reduce, $table71),
					39=>new ParserAction($this->reduce, $table71),
					40=>new ParserAction($this->reduce, $table71),
					41=>new ParserAction($this->reduce, $table71),
					42=>new ParserAction($this->reduce, $table71),
					43=>new ParserAction($this->reduce, $table71),
					44=>new ParserAction($this->reduce, $table71),
					45=>new ParserAction($this->reduce, $table71),
					46=>new ParserAction($this->reduce, $table71),
					47=>new ParserAction($this->reduce, $table71),
					49=>new ParserAction($this->reduce, $table71),
					51=>new ParserAction($this->reduce, $table71),
					52=>new ParserAction($this->reduce, $table71),
					53=>new ParserAction($this->reduce, $table71),
					54=>new ParserAction($this->reduce, $table71),
					55=>new ParserAction($this->reduce, $table71),
					57=>new ParserAction($this->reduce, $table71)
				);

			$tableDefinition34 = array(
				
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
					44=>new ParserAction($this->reduce, $table76),
					45=>new ParserAction($this->reduce, $table76),
					46=>new ParserAction($this->reduce, $table76),
					47=>new ParserAction($this->reduce, $table76),
					49=>new ParserAction($this->reduce, $table76),
					51=>new ParserAction($this->reduce, $table76),
					52=>new ParserAction($this->reduce, $table76),
					53=>new ParserAction($this->reduce, $table76),
					54=>new ParserAction($this->reduce, $table76),
					55=>new ParserAction($this->reduce, $table76),
					56=>new ParserAction($this->shift, $table71),
					57=>new ParserAction($this->reduce, $table76)
				);

			$tableDefinition35 = array(
				
					1=>new ParserAction($this->reduce, $table2)
				);

			$tableDefinition36 = array(
				
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
					44=>new ParserAction($this->reduce, $table5),
					45=>new ParserAction($this->reduce, $table5),
					46=>new ParserAction($this->reduce, $table5),
					47=>new ParserAction($this->reduce, $table5),
					49=>new ParserAction($this->reduce, $table5),
					51=>new ParserAction($this->reduce, $table5),
					52=>new ParserAction($this->reduce, $table5),
					53=>new ParserAction($this->reduce, $table5),
					54=>new ParserAction($this->reduce, $table5),
					55=>new ParserAction($this->reduce, $table5),
					57=>new ParserAction($this->reduce, $table5)
				);

			$tableDefinition37 = array(
				
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
					44=>new ParserAction($this->reduce, $table8),
					45=>new ParserAction($this->reduce, $table8),
					46=>new ParserAction($this->reduce, $table8),
					47=>new ParserAction($this->reduce, $table8),
					49=>new ParserAction($this->reduce, $table8),
					51=>new ParserAction($this->reduce, $table8),
					52=>new ParserAction($this->reduce, $table8),
					53=>new ParserAction($this->reduce, $table8),
					54=>new ParserAction($this->reduce, $table8),
					55=>new ParserAction($this->reduce, $table8),
					57=>new ParserAction($this->reduce, $table8)
				);

			$tableDefinition38 = array(
				
					6=>new ParserAction($this->none, $table36),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->shift, $table72),
					10=>new ParserAction($this->shift, $table7),
					12=>new ParserAction($this->shift, $table8),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					21=>new ParserAction($this->shift, $table15),
					23=>new ParserAction($this->shift, $table16),
					25=>new ParserAction($this->shift, $table17),
					27=>new ParserAction($this->shift, $table18),
					29=>new ParserAction($this->shift, $table19),
					31=>new ParserAction($this->shift, $table20),
					33=>new ParserAction($this->shift, $table21),
					35=>new ParserAction($this->shift, $table22),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					40=>new ParserAction($this->shift, $table25),
					42=>new ParserAction($this->shift, $table26),
					44=>new ParserAction($this->shift, $table27),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34)
				);

			$tableDefinition39 = array(
				
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
					44=>new ParserAction($this->reduce, $table11),
					45=>new ParserAction($this->reduce, $table11),
					46=>new ParserAction($this->reduce, $table11),
					47=>new ParserAction($this->reduce, $table11),
					49=>new ParserAction($this->reduce, $table11),
					51=>new ParserAction($this->reduce, $table11),
					52=>new ParserAction($this->reduce, $table11),
					53=>new ParserAction($this->reduce, $table11),
					54=>new ParserAction($this->reduce, $table11),
					55=>new ParserAction($this->reduce, $table11),
					57=>new ParserAction($this->reduce, $table11)
				);

			$tableDefinition40 = array(
				
					6=>new ParserAction($this->none, $table36),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					10=>new ParserAction($this->shift, $table7),
					11=>new ParserAction($this->shift, $table73),
					12=>new ParserAction($this->shift, $table8),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					21=>new ParserAction($this->shift, $table15),
					23=>new ParserAction($this->shift, $table16),
					25=>new ParserAction($this->shift, $table17),
					27=>new ParserAction($this->shift, $table18),
					29=>new ParserAction($this->shift, $table19),
					31=>new ParserAction($this->shift, $table20),
					33=>new ParserAction($this->shift, $table21),
					35=>new ParserAction($this->shift, $table22),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					40=>new ParserAction($this->shift, $table25),
					42=>new ParserAction($this->shift, $table26),
					44=>new ParserAction($this->shift, $table27),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34)
				);

			$tableDefinition41 = array(
				
					1=>new ParserAction($this->reduce, $table14),
					5=>new ParserAction($this->reduce, $table14),
					7=>new ParserAction($this->reduce, $table14),
					8=>new ParserAction($this->reduce, $table14),
					9=>new ParserAction($this->reduce, $table14),
					10=>new ParserAction($this->reduce, $table14),
					11=>new ParserAction($this->reduce, $table14),
					12=>new ParserAction($this->reduce, $table14),
					13=>new ParserAction($this->reduce, $table14),
					14=>new ParserAction($this->reduce, $table14),
					15=>new ParserAction($this->reduce, $table14),
					16=>new ParserAction($this->reduce, $table14),
					17=>new ParserAction($this->reduce, $table14),
					18=>new ParserAction($this->reduce, $table14),
					19=>new ParserAction($this->reduce, $table14),
					20=>new ParserAction($this->reduce, $table14),
					21=>new ParserAction($this->reduce, $table14),
					22=>new ParserAction($this->reduce, $table14),
					23=>new ParserAction($this->reduce, $table14),
					24=>new ParserAction($this->reduce, $table14),
					25=>new ParserAction($this->reduce, $table14),
					26=>new ParserAction($this->reduce, $table14),
					27=>new ParserAction($this->reduce, $table14),
					28=>new ParserAction($this->reduce, $table14),
					29=>new ParserAction($this->reduce, $table14),
					30=>new ParserAction($this->reduce, $table14),
					31=>new ParserAction($this->reduce, $table14),
					32=>new ParserAction($this->reduce, $table14),
					33=>new ParserAction($this->reduce, $table14),
					34=>new ParserAction($this->reduce, $table14),
					35=>new ParserAction($this->reduce, $table14),
					36=>new ParserAction($this->reduce, $table14),
					37=>new ParserAction($this->reduce, $table14),
					38=>new ParserAction($this->reduce, $table14),
					39=>new ParserAction($this->reduce, $table14),
					40=>new ParserAction($this->reduce, $table14),
					41=>new ParserAction($this->reduce, $table14),
					42=>new ParserAction($this->reduce, $table14),
					43=>new ParserAction($this->reduce, $table14),
					44=>new ParserAction($this->reduce, $table14),
					45=>new ParserAction($this->reduce, $table14),
					46=>new ParserAction($this->reduce, $table14),
					47=>new ParserAction($this->reduce, $table14),
					49=>new ParserAction($this->reduce, $table14),
					51=>new ParserAction($this->reduce, $table14),
					52=>new ParserAction($this->reduce, $table14),
					53=>new ParserAction($this->reduce, $table14),
					54=>new ParserAction($this->reduce, $table14),
					55=>new ParserAction($this->reduce, $table14),
					57=>new ParserAction($this->reduce, $table14)
				);

			$tableDefinition42 = array(
				
					6=>new ParserAction($this->none, $table36),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					10=>new ParserAction($this->shift, $table7),
					12=>new ParserAction($this->shift, $table8),
					13=>new ParserAction($this->shift, $table74),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					21=>new ParserAction($this->shift, $table15),
					23=>new ParserAction($this->shift, $table16),
					25=>new ParserAction($this->shift, $table17),
					27=>new ParserAction($this->shift, $table18),
					29=>new ParserAction($this->shift, $table19),
					31=>new ParserAction($this->shift, $table20),
					33=>new ParserAction($this->shift, $table21),
					35=>new ParserAction($this->shift, $table22),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					40=>new ParserAction($this->shift, $table25),
					42=>new ParserAction($this->shift, $table26),
					44=>new ParserAction($this->shift, $table27),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34)
				);

			$tableDefinition43 = array(
				
					1=>new ParserAction($this->reduce, $table22),
					5=>new ParserAction($this->reduce, $table22),
					7=>new ParserAction($this->reduce, $table22),
					8=>new ParserAction($this->reduce, $table22),
					9=>new ParserAction($this->reduce, $table22),
					10=>new ParserAction($this->reduce, $table22),
					11=>new ParserAction($this->reduce, $table22),
					12=>new ParserAction($this->reduce, $table22),
					13=>new ParserAction($this->reduce, $table22),
					14=>new ParserAction($this->reduce, $table22),
					15=>new ParserAction($this->reduce, $table22),
					16=>new ParserAction($this->reduce, $table22),
					17=>new ParserAction($this->reduce, $table22),
					18=>new ParserAction($this->reduce, $table22),
					19=>new ParserAction($this->reduce, $table22),
					20=>new ParserAction($this->reduce, $table22),
					21=>new ParserAction($this->reduce, $table22),
					22=>new ParserAction($this->reduce, $table22),
					23=>new ParserAction($this->reduce, $table22),
					24=>new ParserAction($this->reduce, $table22),
					25=>new ParserAction($this->reduce, $table22),
					26=>new ParserAction($this->reduce, $table22),
					27=>new ParserAction($this->reduce, $table22),
					28=>new ParserAction($this->reduce, $table22),
					29=>new ParserAction($this->reduce, $table22),
					30=>new ParserAction($this->reduce, $table22),
					31=>new ParserAction($this->reduce, $table22),
					32=>new ParserAction($this->reduce, $table22),
					33=>new ParserAction($this->reduce, $table22),
					34=>new ParserAction($this->reduce, $table22),
					35=>new ParserAction($this->reduce, $table22),
					36=>new ParserAction($this->reduce, $table22),
					37=>new ParserAction($this->reduce, $table22),
					38=>new ParserAction($this->reduce, $table22),
					39=>new ParserAction($this->reduce, $table22),
					40=>new ParserAction($this->reduce, $table22),
					41=>new ParserAction($this->reduce, $table22),
					42=>new ParserAction($this->reduce, $table22),
					43=>new ParserAction($this->reduce, $table22),
					44=>new ParserAction($this->reduce, $table22),
					45=>new ParserAction($this->reduce, $table22),
					46=>new ParserAction($this->reduce, $table22),
					47=>new ParserAction($this->reduce, $table22),
					49=>new ParserAction($this->reduce, $table22),
					51=>new ParserAction($this->reduce, $table22),
					52=>new ParserAction($this->reduce, $table22),
					53=>new ParserAction($this->reduce, $table22),
					54=>new ParserAction($this->reduce, $table22),
					55=>new ParserAction($this->reduce, $table22),
					57=>new ParserAction($this->reduce, $table22)
				);

			$tableDefinition44 = array(
				
					6=>new ParserAction($this->none, $table36),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					10=>new ParserAction($this->shift, $table7),
					12=>new ParserAction($this->shift, $table8),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					20=>new ParserAction($this->shift, $table75),
					21=>new ParserAction($this->shift, $table15),
					23=>new ParserAction($this->shift, $table16),
					25=>new ParserAction($this->shift, $table17),
					27=>new ParserAction($this->shift, $table18),
					29=>new ParserAction($this->shift, $table19),
					31=>new ParserAction($this->shift, $table20),
					33=>new ParserAction($this->shift, $table21),
					35=>new ParserAction($this->shift, $table22),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					40=>new ParserAction($this->shift, $table25),
					42=>new ParserAction($this->shift, $table26),
					44=>new ParserAction($this->shift, $table27),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34)
				);

			$tableDefinition45 = array(
				
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
					44=>new ParserAction($this->reduce, $table25),
					45=>new ParserAction($this->reduce, $table25),
					46=>new ParserAction($this->reduce, $table25),
					47=>new ParserAction($this->reduce, $table25),
					49=>new ParserAction($this->reduce, $table25),
					51=>new ParserAction($this->reduce, $table25),
					52=>new ParserAction($this->reduce, $table25),
					53=>new ParserAction($this->reduce, $table25),
					54=>new ParserAction($this->reduce, $table25),
					55=>new ParserAction($this->reduce, $table25),
					57=>new ParserAction($this->reduce, $table25)
				);

			$tableDefinition46 = array(
				
					6=>new ParserAction($this->none, $table36),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					10=>new ParserAction($this->shift, $table7),
					12=>new ParserAction($this->shift, $table8),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					21=>new ParserAction($this->shift, $table15),
					22=>new ParserAction($this->shift, $table76),
					23=>new ParserAction($this->shift, $table16),
					25=>new ParserAction($this->shift, $table17),
					27=>new ParserAction($this->shift, $table18),
					29=>new ParserAction($this->shift, $table19),
					31=>new ParserAction($this->shift, $table20),
					33=>new ParserAction($this->shift, $table21),
					35=>new ParserAction($this->shift, $table22),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					40=>new ParserAction($this->shift, $table25),
					42=>new ParserAction($this->shift, $table26),
					44=>new ParserAction($this->shift, $table27),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34)
				);

			$tableDefinition47 = array(
				
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
					44=>new ParserAction($this->reduce, $table28),
					45=>new ParserAction($this->reduce, $table28),
					46=>new ParserAction($this->reduce, $table28),
					47=>new ParserAction($this->reduce, $table28),
					49=>new ParserAction($this->reduce, $table28),
					51=>new ParserAction($this->reduce, $table28),
					52=>new ParserAction($this->reduce, $table28),
					53=>new ParserAction($this->reduce, $table28),
					54=>new ParserAction($this->reduce, $table28),
					55=>new ParserAction($this->reduce, $table28),
					57=>new ParserAction($this->reduce, $table28)
				);

			$tableDefinition48 = array(
				
					6=>new ParserAction($this->none, $table36),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					10=>new ParserAction($this->shift, $table7),
					12=>new ParserAction($this->shift, $table8),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					21=>new ParserAction($this->shift, $table15),
					23=>new ParserAction($this->shift, $table16),
					24=>new ParserAction($this->shift, $table77),
					25=>new ParserAction($this->shift, $table17),
					27=>new ParserAction($this->shift, $table18),
					29=>new ParserAction($this->shift, $table19),
					31=>new ParserAction($this->shift, $table20),
					33=>new ParserAction($this->shift, $table21),
					35=>new ParserAction($this->shift, $table22),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					40=>new ParserAction($this->shift, $table25),
					42=>new ParserAction($this->shift, $table26),
					44=>new ParserAction($this->shift, $table27),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34)
				);

			$tableDefinition49 = array(
				
					1=>new ParserAction($this->reduce, $table31),
					5=>new ParserAction($this->reduce, $table31),
					7=>new ParserAction($this->reduce, $table31),
					8=>new ParserAction($this->reduce, $table31),
					9=>new ParserAction($this->reduce, $table31),
					10=>new ParserAction($this->reduce, $table31),
					11=>new ParserAction($this->reduce, $table31),
					12=>new ParserAction($this->reduce, $table31),
					13=>new ParserAction($this->reduce, $table31),
					14=>new ParserAction($this->reduce, $table31),
					15=>new ParserAction($this->reduce, $table31),
					16=>new ParserAction($this->reduce, $table31),
					17=>new ParserAction($this->reduce, $table31),
					18=>new ParserAction($this->reduce, $table31),
					19=>new ParserAction($this->reduce, $table31),
					20=>new ParserAction($this->reduce, $table31),
					21=>new ParserAction($this->reduce, $table31),
					22=>new ParserAction($this->reduce, $table31),
					23=>new ParserAction($this->reduce, $table31),
					24=>new ParserAction($this->reduce, $table31),
					25=>new ParserAction($this->reduce, $table31),
					26=>new ParserAction($this->reduce, $table31),
					27=>new ParserAction($this->reduce, $table31),
					28=>new ParserAction($this->reduce, $table31),
					29=>new ParserAction($this->reduce, $table31),
					30=>new ParserAction($this->reduce, $table31),
					31=>new ParserAction($this->reduce, $table31),
					32=>new ParserAction($this->reduce, $table31),
					33=>new ParserAction($this->reduce, $table31),
					34=>new ParserAction($this->reduce, $table31),
					35=>new ParserAction($this->reduce, $table31),
					36=>new ParserAction($this->reduce, $table31),
					37=>new ParserAction($this->reduce, $table31),
					38=>new ParserAction($this->reduce, $table31),
					39=>new ParserAction($this->reduce, $table31),
					40=>new ParserAction($this->reduce, $table31),
					41=>new ParserAction($this->reduce, $table31),
					42=>new ParserAction($this->reduce, $table31),
					43=>new ParserAction($this->reduce, $table31),
					44=>new ParserAction($this->reduce, $table31),
					45=>new ParserAction($this->reduce, $table31),
					46=>new ParserAction($this->reduce, $table31),
					47=>new ParserAction($this->reduce, $table31),
					49=>new ParserAction($this->reduce, $table31),
					51=>new ParserAction($this->reduce, $table31),
					52=>new ParserAction($this->reduce, $table31),
					53=>new ParserAction($this->reduce, $table31),
					54=>new ParserAction($this->reduce, $table31),
					55=>new ParserAction($this->reduce, $table31),
					57=>new ParserAction($this->reduce, $table31)
				);

			$tableDefinition50 = array(
				
					6=>new ParserAction($this->none, $table36),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					10=>new ParserAction($this->shift, $table7),
					12=>new ParserAction($this->shift, $table8),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					21=>new ParserAction($this->shift, $table15),
					23=>new ParserAction($this->shift, $table16),
					25=>new ParserAction($this->shift, $table17),
					26=>new ParserAction($this->shift, $table78),
					27=>new ParserAction($this->shift, $table18),
					29=>new ParserAction($this->shift, $table19),
					31=>new ParserAction($this->shift, $table20),
					33=>new ParserAction($this->shift, $table21),
					35=>new ParserAction($this->shift, $table22),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					40=>new ParserAction($this->shift, $table25),
					42=>new ParserAction($this->shift, $table26),
					44=>new ParserAction($this->shift, $table27),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34)
				);

			$tableDefinition51 = array(
				
					1=>new ParserAction($this->reduce, $table34),
					5=>new ParserAction($this->reduce, $table34),
					7=>new ParserAction($this->reduce, $table34),
					8=>new ParserAction($this->reduce, $table34),
					9=>new ParserAction($this->reduce, $table34),
					10=>new ParserAction($this->reduce, $table34),
					11=>new ParserAction($this->reduce, $table34),
					12=>new ParserAction($this->reduce, $table34),
					13=>new ParserAction($this->reduce, $table34),
					14=>new ParserAction($this->reduce, $table34),
					15=>new ParserAction($this->reduce, $table34),
					16=>new ParserAction($this->reduce, $table34),
					17=>new ParserAction($this->reduce, $table34),
					18=>new ParserAction($this->reduce, $table34),
					19=>new ParserAction($this->reduce, $table34),
					20=>new ParserAction($this->reduce, $table34),
					21=>new ParserAction($this->reduce, $table34),
					22=>new ParserAction($this->reduce, $table34),
					23=>new ParserAction($this->reduce, $table34),
					24=>new ParserAction($this->reduce, $table34),
					25=>new ParserAction($this->reduce, $table34),
					26=>new ParserAction($this->reduce, $table34),
					27=>new ParserAction($this->reduce, $table34),
					28=>new ParserAction($this->reduce, $table34),
					29=>new ParserAction($this->reduce, $table34),
					30=>new ParserAction($this->reduce, $table34),
					31=>new ParserAction($this->reduce, $table34),
					32=>new ParserAction($this->reduce, $table34),
					33=>new ParserAction($this->reduce, $table34),
					34=>new ParserAction($this->reduce, $table34),
					35=>new ParserAction($this->reduce, $table34),
					36=>new ParserAction($this->reduce, $table34),
					37=>new ParserAction($this->reduce, $table34),
					38=>new ParserAction($this->reduce, $table34),
					39=>new ParserAction($this->reduce, $table34),
					40=>new ParserAction($this->reduce, $table34),
					41=>new ParserAction($this->reduce, $table34),
					42=>new ParserAction($this->reduce, $table34),
					43=>new ParserAction($this->reduce, $table34),
					44=>new ParserAction($this->reduce, $table34),
					45=>new ParserAction($this->reduce, $table34),
					46=>new ParserAction($this->reduce, $table34),
					47=>new ParserAction($this->reduce, $table34),
					49=>new ParserAction($this->reduce, $table34),
					51=>new ParserAction($this->reduce, $table34),
					52=>new ParserAction($this->reduce, $table34),
					53=>new ParserAction($this->reduce, $table34),
					54=>new ParserAction($this->reduce, $table34),
					55=>new ParserAction($this->reduce, $table34),
					57=>new ParserAction($this->reduce, $table34)
				);

			$tableDefinition52 = array(
				
					6=>new ParserAction($this->none, $table36),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					10=>new ParserAction($this->shift, $table7),
					12=>new ParserAction($this->shift, $table8),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					21=>new ParserAction($this->shift, $table15),
					23=>new ParserAction($this->shift, $table16),
					25=>new ParserAction($this->shift, $table17),
					27=>new ParserAction($this->shift, $table18),
					28=>new ParserAction($this->shift, $table79),
					29=>new ParserAction($this->shift, $table19),
					31=>new ParserAction($this->shift, $table20),
					33=>new ParserAction($this->shift, $table21),
					35=>new ParserAction($this->shift, $table22),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					40=>new ParserAction($this->shift, $table25),
					42=>new ParserAction($this->shift, $table26),
					44=>new ParserAction($this->shift, $table27),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34)
				);

			$tableDefinition53 = array(
				
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
					44=>new ParserAction($this->reduce, $table37),
					45=>new ParserAction($this->reduce, $table37),
					46=>new ParserAction($this->reduce, $table37),
					47=>new ParserAction($this->reduce, $table37),
					49=>new ParserAction($this->reduce, $table37),
					51=>new ParserAction($this->reduce, $table37),
					52=>new ParserAction($this->reduce, $table37),
					53=>new ParserAction($this->reduce, $table37),
					54=>new ParserAction($this->reduce, $table37),
					55=>new ParserAction($this->reduce, $table37),
					57=>new ParserAction($this->reduce, $table37)
				);

			$tableDefinition54 = array(
				
					6=>new ParserAction($this->none, $table36),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					10=>new ParserAction($this->shift, $table7),
					12=>new ParserAction($this->shift, $table8),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					21=>new ParserAction($this->shift, $table15),
					23=>new ParserAction($this->shift, $table16),
					25=>new ParserAction($this->shift, $table17),
					27=>new ParserAction($this->shift, $table18),
					29=>new ParserAction($this->shift, $table19),
					30=>new ParserAction($this->shift, $table80),
					31=>new ParserAction($this->shift, $table20),
					33=>new ParserAction($this->shift, $table21),
					35=>new ParserAction($this->shift, $table22),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					40=>new ParserAction($this->shift, $table25),
					42=>new ParserAction($this->shift, $table26),
					44=>new ParserAction($this->shift, $table27),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34)
				);

			$tableDefinition55 = array(
				
					1=>new ParserAction($this->reduce, $table40),
					5=>new ParserAction($this->reduce, $table40),
					7=>new ParserAction($this->reduce, $table40),
					8=>new ParserAction($this->reduce, $table40),
					9=>new ParserAction($this->reduce, $table40),
					10=>new ParserAction($this->reduce, $table40),
					11=>new ParserAction($this->reduce, $table40),
					12=>new ParserAction($this->reduce, $table40),
					13=>new ParserAction($this->reduce, $table40),
					14=>new ParserAction($this->reduce, $table40),
					15=>new ParserAction($this->reduce, $table40),
					16=>new ParserAction($this->reduce, $table40),
					17=>new ParserAction($this->reduce, $table40),
					18=>new ParserAction($this->reduce, $table40),
					19=>new ParserAction($this->reduce, $table40),
					20=>new ParserAction($this->reduce, $table40),
					21=>new ParserAction($this->reduce, $table40),
					22=>new ParserAction($this->reduce, $table40),
					23=>new ParserAction($this->reduce, $table40),
					24=>new ParserAction($this->reduce, $table40),
					25=>new ParserAction($this->reduce, $table40),
					26=>new ParserAction($this->reduce, $table40),
					27=>new ParserAction($this->reduce, $table40),
					28=>new ParserAction($this->reduce, $table40),
					29=>new ParserAction($this->reduce, $table40),
					30=>new ParserAction($this->reduce, $table40),
					31=>new ParserAction($this->reduce, $table40),
					32=>new ParserAction($this->reduce, $table40),
					33=>new ParserAction($this->reduce, $table40),
					34=>new ParserAction($this->reduce, $table40),
					35=>new ParserAction($this->reduce, $table40),
					36=>new ParserAction($this->reduce, $table40),
					37=>new ParserAction($this->reduce, $table40),
					38=>new ParserAction($this->reduce, $table40),
					39=>new ParserAction($this->reduce, $table40),
					40=>new ParserAction($this->reduce, $table40),
					41=>new ParserAction($this->reduce, $table40),
					42=>new ParserAction($this->reduce, $table40),
					43=>new ParserAction($this->reduce, $table40),
					44=>new ParserAction($this->reduce, $table40),
					45=>new ParserAction($this->reduce, $table40),
					46=>new ParserAction($this->reduce, $table40),
					47=>new ParserAction($this->reduce, $table40),
					49=>new ParserAction($this->reduce, $table40),
					51=>new ParserAction($this->reduce, $table40),
					52=>new ParserAction($this->reduce, $table40),
					53=>new ParserAction($this->reduce, $table40),
					54=>new ParserAction($this->reduce, $table40),
					55=>new ParserAction($this->reduce, $table40),
					57=>new ParserAction($this->reduce, $table40)
				);

			$tableDefinition56 = array(
				
					5=>new ParserAction($this->shift, $table81),
					6=>new ParserAction($this->none, $table36),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					10=>new ParserAction($this->shift, $table7),
					12=>new ParserAction($this->shift, $table8),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					21=>new ParserAction($this->shift, $table15),
					23=>new ParserAction($this->shift, $table16),
					25=>new ParserAction($this->shift, $table17),
					27=>new ParserAction($this->shift, $table18),
					29=>new ParserAction($this->shift, $table19),
					31=>new ParserAction($this->shift, $table20),
					32=>new ParserAction($this->shift, $table82),
					33=>new ParserAction($this->shift, $table21),
					35=>new ParserAction($this->shift, $table22),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					40=>new ParserAction($this->shift, $table25),
					42=>new ParserAction($this->shift, $table26),
					44=>new ParserAction($this->shift, $table27),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34)
				);

			$tableDefinition57 = array(
				
					1=>new ParserAction($this->reduce, $table44),
					5=>new ParserAction($this->reduce, $table44),
					7=>new ParserAction($this->reduce, $table44),
					8=>new ParserAction($this->reduce, $table44),
					9=>new ParserAction($this->reduce, $table44),
					10=>new ParserAction($this->reduce, $table44),
					11=>new ParserAction($this->reduce, $table44),
					12=>new ParserAction($this->reduce, $table44),
					13=>new ParserAction($this->reduce, $table44),
					14=>new ParserAction($this->reduce, $table44),
					15=>new ParserAction($this->reduce, $table44),
					16=>new ParserAction($this->reduce, $table44),
					17=>new ParserAction($this->reduce, $table44),
					18=>new ParserAction($this->reduce, $table44),
					19=>new ParserAction($this->reduce, $table44),
					20=>new ParserAction($this->reduce, $table44),
					21=>new ParserAction($this->reduce, $table44),
					22=>new ParserAction($this->reduce, $table44),
					23=>new ParserAction($this->reduce, $table44),
					24=>new ParserAction($this->reduce, $table44),
					25=>new ParserAction($this->reduce, $table44),
					26=>new ParserAction($this->reduce, $table44),
					27=>new ParserAction($this->reduce, $table44),
					28=>new ParserAction($this->reduce, $table44),
					29=>new ParserAction($this->reduce, $table44),
					30=>new ParserAction($this->reduce, $table44),
					31=>new ParserAction($this->reduce, $table44),
					32=>new ParserAction($this->reduce, $table44),
					33=>new ParserAction($this->reduce, $table44),
					34=>new ParserAction($this->reduce, $table44),
					35=>new ParserAction($this->reduce, $table44),
					36=>new ParserAction($this->reduce, $table44),
					37=>new ParserAction($this->reduce, $table44),
					38=>new ParserAction($this->reduce, $table44),
					39=>new ParserAction($this->reduce, $table44),
					40=>new ParserAction($this->reduce, $table44),
					41=>new ParserAction($this->reduce, $table44),
					42=>new ParserAction($this->reduce, $table44),
					43=>new ParserAction($this->reduce, $table44),
					44=>new ParserAction($this->reduce, $table44),
					45=>new ParserAction($this->reduce, $table44),
					46=>new ParserAction($this->reduce, $table44),
					47=>new ParserAction($this->reduce, $table44),
					49=>new ParserAction($this->reduce, $table44),
					51=>new ParserAction($this->reduce, $table44),
					52=>new ParserAction($this->reduce, $table44),
					53=>new ParserAction($this->reduce, $table44),
					54=>new ParserAction($this->reduce, $table44),
					55=>new ParserAction($this->reduce, $table44),
					57=>new ParserAction($this->reduce, $table44)
				);

			$tableDefinition58 = array(
				
					6=>new ParserAction($this->none, $table36),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					10=>new ParserAction($this->shift, $table7),
					12=>new ParserAction($this->shift, $table8),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					21=>new ParserAction($this->shift, $table15),
					23=>new ParserAction($this->shift, $table16),
					25=>new ParserAction($this->shift, $table17),
					27=>new ParserAction($this->shift, $table18),
					29=>new ParserAction($this->shift, $table19),
					31=>new ParserAction($this->shift, $table20),
					33=>new ParserAction($this->shift, $table21),
					34=>new ParserAction($this->shift, $table83),
					35=>new ParserAction($this->shift, $table22),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					40=>new ParserAction($this->shift, $table25),
					42=>new ParserAction($this->shift, $table26),
					44=>new ParserAction($this->shift, $table27),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34)
				);

			$tableDefinition59 = array(
				
					1=>new ParserAction($this->reduce, $table47),
					5=>new ParserAction($this->reduce, $table47),
					7=>new ParserAction($this->reduce, $table47),
					8=>new ParserAction($this->reduce, $table47),
					9=>new ParserAction($this->reduce, $table47),
					10=>new ParserAction($this->reduce, $table47),
					11=>new ParserAction($this->reduce, $table47),
					12=>new ParserAction($this->reduce, $table47),
					13=>new ParserAction($this->reduce, $table47),
					14=>new ParserAction($this->reduce, $table47),
					15=>new ParserAction($this->reduce, $table47),
					16=>new ParserAction($this->reduce, $table47),
					17=>new ParserAction($this->reduce, $table47),
					18=>new ParserAction($this->reduce, $table47),
					19=>new ParserAction($this->reduce, $table47),
					20=>new ParserAction($this->reduce, $table47),
					21=>new ParserAction($this->reduce, $table47),
					22=>new ParserAction($this->reduce, $table47),
					23=>new ParserAction($this->reduce, $table47),
					24=>new ParserAction($this->reduce, $table47),
					25=>new ParserAction($this->reduce, $table47),
					26=>new ParserAction($this->reduce, $table47),
					27=>new ParserAction($this->reduce, $table47),
					28=>new ParserAction($this->reduce, $table47),
					29=>new ParserAction($this->reduce, $table47),
					30=>new ParserAction($this->reduce, $table47),
					31=>new ParserAction($this->reduce, $table47),
					32=>new ParserAction($this->reduce, $table47),
					33=>new ParserAction($this->reduce, $table47),
					34=>new ParserAction($this->reduce, $table47),
					35=>new ParserAction($this->reduce, $table47),
					36=>new ParserAction($this->reduce, $table47),
					37=>new ParserAction($this->reduce, $table47),
					38=>new ParserAction($this->reduce, $table47),
					39=>new ParserAction($this->reduce, $table47),
					40=>new ParserAction($this->reduce, $table47),
					41=>new ParserAction($this->reduce, $table47),
					42=>new ParserAction($this->reduce, $table47),
					43=>new ParserAction($this->reduce, $table47),
					44=>new ParserAction($this->reduce, $table47),
					45=>new ParserAction($this->reduce, $table47),
					46=>new ParserAction($this->reduce, $table47),
					47=>new ParserAction($this->reduce, $table47),
					49=>new ParserAction($this->reduce, $table47),
					51=>new ParserAction($this->reduce, $table47),
					52=>new ParserAction($this->reduce, $table47),
					53=>new ParserAction($this->reduce, $table47),
					54=>new ParserAction($this->reduce, $table47),
					55=>new ParserAction($this->reduce, $table47),
					57=>new ParserAction($this->reduce, $table47)
				);

			$tableDefinition60 = array(
				
					6=>new ParserAction($this->none, $table36),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					10=>new ParserAction($this->shift, $table7),
					12=>new ParserAction($this->shift, $table8),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					21=>new ParserAction($this->shift, $table15),
					23=>new ParserAction($this->shift, $table16),
					25=>new ParserAction($this->shift, $table17),
					27=>new ParserAction($this->shift, $table18),
					29=>new ParserAction($this->shift, $table19),
					31=>new ParserAction($this->shift, $table20),
					33=>new ParserAction($this->shift, $table21),
					35=>new ParserAction($this->shift, $table22),
					36=>new ParserAction($this->shift, $table84),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					40=>new ParserAction($this->shift, $table25),
					42=>new ParserAction($this->shift, $table26),
					44=>new ParserAction($this->shift, $table27),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34)
				);

			$tableDefinition61 = array(
				
					1=>new ParserAction($this->reduce, $table51),
					5=>new ParserAction($this->reduce, $table51),
					7=>new ParserAction($this->reduce, $table51),
					8=>new ParserAction($this->reduce, $table51),
					9=>new ParserAction($this->reduce, $table51),
					10=>new ParserAction($this->reduce, $table51),
					11=>new ParserAction($this->reduce, $table51),
					12=>new ParserAction($this->reduce, $table51),
					13=>new ParserAction($this->reduce, $table51),
					14=>new ParserAction($this->reduce, $table51),
					15=>new ParserAction($this->reduce, $table51),
					16=>new ParserAction($this->reduce, $table51),
					17=>new ParserAction($this->reduce, $table51),
					18=>new ParserAction($this->reduce, $table51),
					19=>new ParserAction($this->reduce, $table51),
					20=>new ParserAction($this->reduce, $table51),
					21=>new ParserAction($this->reduce, $table51),
					22=>new ParserAction($this->reduce, $table51),
					23=>new ParserAction($this->reduce, $table51),
					24=>new ParserAction($this->reduce, $table51),
					25=>new ParserAction($this->reduce, $table51),
					26=>new ParserAction($this->reduce, $table51),
					27=>new ParserAction($this->reduce, $table51),
					28=>new ParserAction($this->reduce, $table51),
					29=>new ParserAction($this->reduce, $table51),
					30=>new ParserAction($this->reduce, $table51),
					31=>new ParserAction($this->reduce, $table51),
					32=>new ParserAction($this->reduce, $table51),
					33=>new ParserAction($this->reduce, $table51),
					34=>new ParserAction($this->reduce, $table51),
					35=>new ParserAction($this->reduce, $table51),
					36=>new ParserAction($this->reduce, $table51),
					37=>new ParserAction($this->reduce, $table51),
					38=>new ParserAction($this->reduce, $table51),
					39=>new ParserAction($this->reduce, $table51),
					40=>new ParserAction($this->reduce, $table51),
					41=>new ParserAction($this->reduce, $table51),
					42=>new ParserAction($this->reduce, $table51),
					43=>new ParserAction($this->reduce, $table51),
					44=>new ParserAction($this->reduce, $table51),
					45=>new ParserAction($this->reduce, $table51),
					46=>new ParserAction($this->reduce, $table51),
					47=>new ParserAction($this->reduce, $table51),
					49=>new ParserAction($this->reduce, $table51),
					51=>new ParserAction($this->reduce, $table51),
					52=>new ParserAction($this->reduce, $table51),
					53=>new ParserAction($this->reduce, $table51),
					54=>new ParserAction($this->reduce, $table51),
					55=>new ParserAction($this->reduce, $table51),
					57=>new ParserAction($this->reduce, $table51)
				);

			$tableDefinition62 = array(
				
					6=>new ParserAction($this->none, $table36),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					10=>new ParserAction($this->shift, $table7),
					12=>new ParserAction($this->shift, $table8),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					21=>new ParserAction($this->shift, $table15),
					23=>new ParserAction($this->shift, $table16),
					25=>new ParserAction($this->shift, $table17),
					27=>new ParserAction($this->shift, $table18),
					29=>new ParserAction($this->shift, $table19),
					31=>new ParserAction($this->shift, $table20),
					33=>new ParserAction($this->shift, $table21),
					35=>new ParserAction($this->shift, $table22),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					39=>new ParserAction($this->shift, $table85),
					40=>new ParserAction($this->shift, $table25),
					42=>new ParserAction($this->shift, $table26),
					44=>new ParserAction($this->shift, $table27),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34)
				);

			$tableDefinition63 = array(
				
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
					44=>new ParserAction($this->reduce, $table54),
					45=>new ParserAction($this->reduce, $table54),
					46=>new ParserAction($this->reduce, $table54),
					47=>new ParserAction($this->reduce, $table54),
					49=>new ParserAction($this->reduce, $table54),
					51=>new ParserAction($this->reduce, $table54),
					52=>new ParserAction($this->reduce, $table54),
					53=>new ParserAction($this->reduce, $table54),
					54=>new ParserAction($this->reduce, $table54),
					55=>new ParserAction($this->reduce, $table54),
					57=>new ParserAction($this->reduce, $table54)
				);

			$tableDefinition64 = array(
				
					6=>new ParserAction($this->none, $table36),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					10=>new ParserAction($this->shift, $table7),
					12=>new ParserAction($this->shift, $table8),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					21=>new ParserAction($this->shift, $table15),
					23=>new ParserAction($this->shift, $table16),
					25=>new ParserAction($this->shift, $table17),
					27=>new ParserAction($this->shift, $table18),
					29=>new ParserAction($this->shift, $table19),
					31=>new ParserAction($this->shift, $table20),
					33=>new ParserAction($this->shift, $table21),
					35=>new ParserAction($this->shift, $table22),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					40=>new ParserAction($this->shift, $table25),
					41=>new ParserAction($this->shift, $table86),
					42=>new ParserAction($this->shift, $table26),
					44=>new ParserAction($this->shift, $table27),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34)
				);

			$tableDefinition65 = array(
				
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
					44=>new ParserAction($this->reduce, $table57),
					45=>new ParserAction($this->reduce, $table57),
					46=>new ParserAction($this->reduce, $table57),
					47=>new ParserAction($this->reduce, $table57),
					49=>new ParserAction($this->reduce, $table57),
					51=>new ParserAction($this->reduce, $table57),
					52=>new ParserAction($this->reduce, $table57),
					53=>new ParserAction($this->reduce, $table57),
					54=>new ParserAction($this->reduce, $table57),
					55=>new ParserAction($this->reduce, $table57),
					57=>new ParserAction($this->reduce, $table57)
				);

			$tableDefinition66 = array(
				
					6=>new ParserAction($this->none, $table36),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					10=>new ParserAction($this->shift, $table7),
					12=>new ParserAction($this->shift, $table8),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					21=>new ParserAction($this->shift, $table15),
					23=>new ParserAction($this->shift, $table16),
					25=>new ParserAction($this->shift, $table17),
					27=>new ParserAction($this->shift, $table18),
					29=>new ParserAction($this->shift, $table19),
					31=>new ParserAction($this->shift, $table20),
					33=>new ParserAction($this->shift, $table21),
					35=>new ParserAction($this->shift, $table22),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					40=>new ParserAction($this->shift, $table25),
					42=>new ParserAction($this->shift, $table26),
					43=>new ParserAction($this->shift, $table87),
					44=>new ParserAction($this->shift, $table27),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34)
				);

			$tableDefinition67 = array(
				
					1=>new ParserAction($this->reduce, $table60),
					5=>new ParserAction($this->reduce, $table60),
					7=>new ParserAction($this->reduce, $table60),
					8=>new ParserAction($this->reduce, $table60),
					9=>new ParserAction($this->reduce, $table60),
					10=>new ParserAction($this->reduce, $table60),
					11=>new ParserAction($this->reduce, $table60),
					12=>new ParserAction($this->reduce, $table60),
					13=>new ParserAction($this->reduce, $table60),
					14=>new ParserAction($this->reduce, $table60),
					15=>new ParserAction($this->reduce, $table60),
					16=>new ParserAction($this->reduce, $table60),
					17=>new ParserAction($this->reduce, $table60),
					18=>new ParserAction($this->reduce, $table60),
					19=>new ParserAction($this->reduce, $table60),
					20=>new ParserAction($this->reduce, $table60),
					21=>new ParserAction($this->reduce, $table60),
					22=>new ParserAction($this->reduce, $table60),
					23=>new ParserAction($this->reduce, $table60),
					24=>new ParserAction($this->reduce, $table60),
					25=>new ParserAction($this->reduce, $table60),
					26=>new ParserAction($this->reduce, $table60),
					27=>new ParserAction($this->reduce, $table60),
					28=>new ParserAction($this->reduce, $table60),
					29=>new ParserAction($this->reduce, $table60),
					30=>new ParserAction($this->reduce, $table60),
					31=>new ParserAction($this->reduce, $table60),
					32=>new ParserAction($this->reduce, $table60),
					33=>new ParserAction($this->reduce, $table60),
					34=>new ParserAction($this->reduce, $table60),
					35=>new ParserAction($this->reduce, $table60),
					36=>new ParserAction($this->reduce, $table60),
					37=>new ParserAction($this->reduce, $table60),
					38=>new ParserAction($this->reduce, $table60),
					39=>new ParserAction($this->reduce, $table60),
					40=>new ParserAction($this->reduce, $table60),
					41=>new ParserAction($this->reduce, $table60),
					42=>new ParserAction($this->reduce, $table60),
					43=>new ParserAction($this->reduce, $table60),
					44=>new ParserAction($this->reduce, $table60),
					45=>new ParserAction($this->reduce, $table60),
					46=>new ParserAction($this->reduce, $table60),
					47=>new ParserAction($this->reduce, $table60),
					49=>new ParserAction($this->reduce, $table60),
					51=>new ParserAction($this->reduce, $table60),
					52=>new ParserAction($this->reduce, $table60),
					53=>new ParserAction($this->reduce, $table60),
					54=>new ParserAction($this->reduce, $table60),
					55=>new ParserAction($this->reduce, $table60),
					57=>new ParserAction($this->reduce, $table60)
				);

			$tableDefinition68 = array(
				
					6=>new ParserAction($this->none, $table36),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					10=>new ParserAction($this->shift, $table7),
					12=>new ParserAction($this->shift, $table8),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					21=>new ParserAction($this->shift, $table15),
					23=>new ParserAction($this->shift, $table16),
					25=>new ParserAction($this->shift, $table17),
					27=>new ParserAction($this->shift, $table18),
					29=>new ParserAction($this->shift, $table19),
					31=>new ParserAction($this->shift, $table20),
					33=>new ParserAction($this->shift, $table21),
					35=>new ParserAction($this->shift, $table22),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					40=>new ParserAction($this->shift, $table25),
					42=>new ParserAction($this->shift, $table26),
					44=>new ParserAction($this->shift, $table27),
					45=>new ParserAction($this->shift, $table88),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34)
				);

			$tableDefinition69 = array(
				
					1=>new ParserAction($this->reduce, $table64),
					5=>new ParserAction($this->reduce, $table64),
					7=>new ParserAction($this->reduce, $table64),
					8=>new ParserAction($this->reduce, $table64),
					9=>new ParserAction($this->reduce, $table64),
					10=>new ParserAction($this->reduce, $table64),
					11=>new ParserAction($this->reduce, $table64),
					12=>new ParserAction($this->reduce, $table64),
					13=>new ParserAction($this->reduce, $table64),
					14=>new ParserAction($this->reduce, $table64),
					15=>new ParserAction($this->reduce, $table64),
					16=>new ParserAction($this->reduce, $table64),
					17=>new ParserAction($this->reduce, $table64),
					18=>new ParserAction($this->reduce, $table64),
					19=>new ParserAction($this->reduce, $table64),
					20=>new ParserAction($this->reduce, $table64),
					21=>new ParserAction($this->reduce, $table64),
					22=>new ParserAction($this->reduce, $table64),
					23=>new ParserAction($this->reduce, $table64),
					24=>new ParserAction($this->reduce, $table64),
					25=>new ParserAction($this->reduce, $table64),
					26=>new ParserAction($this->reduce, $table64),
					27=>new ParserAction($this->reduce, $table64),
					28=>new ParserAction($this->reduce, $table64),
					29=>new ParserAction($this->reduce, $table64),
					30=>new ParserAction($this->reduce, $table64),
					31=>new ParserAction($this->reduce, $table64),
					32=>new ParserAction($this->reduce, $table64),
					33=>new ParserAction($this->reduce, $table64),
					34=>new ParserAction($this->reduce, $table64),
					35=>new ParserAction($this->reduce, $table64),
					36=>new ParserAction($this->reduce, $table64),
					37=>new ParserAction($this->reduce, $table64),
					38=>new ParserAction($this->reduce, $table64),
					39=>new ParserAction($this->reduce, $table64),
					40=>new ParserAction($this->reduce, $table64),
					41=>new ParserAction($this->reduce, $table64),
					42=>new ParserAction($this->reduce, $table64),
					43=>new ParserAction($this->reduce, $table64),
					44=>new ParserAction($this->reduce, $table64),
					45=>new ParserAction($this->reduce, $table64),
					46=>new ParserAction($this->reduce, $table64),
					47=>new ParserAction($this->reduce, $table64),
					49=>new ParserAction($this->reduce, $table64),
					51=>new ParserAction($this->reduce, $table64),
					52=>new ParserAction($this->reduce, $table64),
					53=>new ParserAction($this->reduce, $table64),
					54=>new ParserAction($this->reduce, $table64),
					55=>new ParserAction($this->reduce, $table64),
					57=>new ParserAction($this->reduce, $table64)
				);

			$tableDefinition70 = array(
				
					1=>new ParserAction($this->reduce, $table67),
					4=>new ParserAction($this->none, $table89),
					5=>new ParserAction($this->reduce, $table67),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->reduce, $table67),
					10=>new ParserAction($this->shift, $table7),
					11=>new ParserAction($this->reduce, $table67),
					12=>new ParserAction($this->shift, $table8),
					13=>new ParserAction($this->reduce, $table67),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					20=>new ParserAction($this->reduce, $table67),
					21=>new ParserAction($this->shift, $table15),
					22=>new ParserAction($this->reduce, $table67),
					23=>new ParserAction($this->shift, $table16),
					24=>new ParserAction($this->reduce, $table67),
					25=>new ParserAction($this->shift, $table17),
					26=>new ParserAction($this->reduce, $table67),
					27=>new ParserAction($this->shift, $table18),
					28=>new ParserAction($this->reduce, $table67),
					29=>new ParserAction($this->shift, $table19),
					30=>new ParserAction($this->reduce, $table67),
					31=>new ParserAction($this->shift, $table20),
					32=>new ParserAction($this->reduce, $table67),
					33=>new ParserAction($this->shift, $table21),
					34=>new ParserAction($this->reduce, $table67),
					35=>new ParserAction($this->shift, $table22),
					36=>new ParserAction($this->reduce, $table67),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					39=>new ParserAction($this->reduce, $table67),
					40=>new ParserAction($this->shift, $table25),
					41=>new ParserAction($this->reduce, $table67),
					42=>new ParserAction($this->shift, $table26),
					43=>new ParserAction($this->reduce, $table67),
					44=>new ParserAction($this->shift, $table27),
					45=>new ParserAction($this->reduce, $table67),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					51=>new ParserAction($this->shift, $table90),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34),
					57=>new ParserAction($this->reduce, $table67)
				);

			$tableDefinition71 = array(
				
					1=>new ParserAction($this->reduce, $table75),
					4=>new ParserAction($this->none, $table92),
					5=>new ParserAction($this->reduce, $table75),
					6=>new ParserAction($this->none, $table4),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					9=>new ParserAction($this->reduce, $table75),
					10=>new ParserAction($this->shift, $table7),
					11=>new ParserAction($this->reduce, $table75),
					12=>new ParserAction($this->shift, $table8),
					13=>new ParserAction($this->reduce, $table75),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					20=>new ParserAction($this->reduce, $table75),
					21=>new ParserAction($this->shift, $table15),
					22=>new ParserAction($this->reduce, $table75),
					23=>new ParserAction($this->shift, $table16),
					24=>new ParserAction($this->reduce, $table75),
					25=>new ParserAction($this->shift, $table17),
					26=>new ParserAction($this->reduce, $table75),
					27=>new ParserAction($this->shift, $table18),
					28=>new ParserAction($this->reduce, $table75),
					29=>new ParserAction($this->shift, $table19),
					30=>new ParserAction($this->reduce, $table75),
					31=>new ParserAction($this->shift, $table20),
					32=>new ParserAction($this->reduce, $table75),
					33=>new ParserAction($this->shift, $table21),
					34=>new ParserAction($this->reduce, $table75),
					35=>new ParserAction($this->shift, $table22),
					36=>new ParserAction($this->reduce, $table75),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					39=>new ParserAction($this->reduce, $table75),
					40=>new ParserAction($this->shift, $table25),
					41=>new ParserAction($this->reduce, $table75),
					42=>new ParserAction($this->shift, $table26),
					43=>new ParserAction($this->reduce, $table75),
					44=>new ParserAction($this->shift, $table27),
					45=>new ParserAction($this->reduce, $table75),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					51=>new ParserAction($this->reduce, $table75),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34),
					57=>new ParserAction($this->shift, $table91)
				);

			$tableDefinition72 = array(
				
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
					44=>new ParserAction($this->reduce, $table9),
					45=>new ParserAction($this->reduce, $table9),
					46=>new ParserAction($this->reduce, $table9),
					47=>new ParserAction($this->reduce, $table9),
					49=>new ParserAction($this->reduce, $table9),
					51=>new ParserAction($this->reduce, $table9),
					52=>new ParserAction($this->reduce, $table9),
					53=>new ParserAction($this->reduce, $table9),
					54=>new ParserAction($this->reduce, $table9),
					55=>new ParserAction($this->reduce, $table9),
					57=>new ParserAction($this->reduce, $table9)
				);

			$tableDefinition73 = array(
				
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
					44=>new ParserAction($this->reduce, $table12),
					45=>new ParserAction($this->reduce, $table12),
					46=>new ParserAction($this->reduce, $table12),
					47=>new ParserAction($this->reduce, $table12),
					49=>new ParserAction($this->reduce, $table12),
					51=>new ParserAction($this->reduce, $table12),
					52=>new ParserAction($this->reduce, $table12),
					53=>new ParserAction($this->reduce, $table12),
					54=>new ParserAction($this->reduce, $table12),
					55=>new ParserAction($this->reduce, $table12),
					57=>new ParserAction($this->reduce, $table12)
				);

			$tableDefinition74 = array(
				
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
					44=>new ParserAction($this->reduce, $table15),
					45=>new ParserAction($this->reduce, $table15),
					46=>new ParserAction($this->reduce, $table15),
					47=>new ParserAction($this->reduce, $table15),
					49=>new ParserAction($this->reduce, $table15),
					51=>new ParserAction($this->reduce, $table15),
					52=>new ParserAction($this->reduce, $table15),
					53=>new ParserAction($this->reduce, $table15),
					54=>new ParserAction($this->reduce, $table15),
					55=>new ParserAction($this->reduce, $table15),
					57=>new ParserAction($this->reduce, $table15)
				);

			$tableDefinition75 = array(
				
					1=>new ParserAction($this->reduce, $table23),
					5=>new ParserAction($this->reduce, $table23),
					7=>new ParserAction($this->reduce, $table23),
					8=>new ParserAction($this->reduce, $table23),
					9=>new ParserAction($this->reduce, $table23),
					10=>new ParserAction($this->reduce, $table23),
					11=>new ParserAction($this->reduce, $table23),
					12=>new ParserAction($this->reduce, $table23),
					13=>new ParserAction($this->reduce, $table23),
					14=>new ParserAction($this->reduce, $table23),
					15=>new ParserAction($this->reduce, $table23),
					16=>new ParserAction($this->reduce, $table23),
					17=>new ParserAction($this->reduce, $table23),
					18=>new ParserAction($this->reduce, $table23),
					19=>new ParserAction($this->reduce, $table23),
					20=>new ParserAction($this->reduce, $table23),
					21=>new ParserAction($this->reduce, $table23),
					22=>new ParserAction($this->reduce, $table23),
					23=>new ParserAction($this->reduce, $table23),
					24=>new ParserAction($this->reduce, $table23),
					25=>new ParserAction($this->reduce, $table23),
					26=>new ParserAction($this->reduce, $table23),
					27=>new ParserAction($this->reduce, $table23),
					28=>new ParserAction($this->reduce, $table23),
					29=>new ParserAction($this->reduce, $table23),
					30=>new ParserAction($this->reduce, $table23),
					31=>new ParserAction($this->reduce, $table23),
					32=>new ParserAction($this->reduce, $table23),
					33=>new ParserAction($this->reduce, $table23),
					34=>new ParserAction($this->reduce, $table23),
					35=>new ParserAction($this->reduce, $table23),
					36=>new ParserAction($this->reduce, $table23),
					37=>new ParserAction($this->reduce, $table23),
					38=>new ParserAction($this->reduce, $table23),
					39=>new ParserAction($this->reduce, $table23),
					40=>new ParserAction($this->reduce, $table23),
					41=>new ParserAction($this->reduce, $table23),
					42=>new ParserAction($this->reduce, $table23),
					43=>new ParserAction($this->reduce, $table23),
					44=>new ParserAction($this->reduce, $table23),
					45=>new ParserAction($this->reduce, $table23),
					46=>new ParserAction($this->reduce, $table23),
					47=>new ParserAction($this->reduce, $table23),
					49=>new ParserAction($this->reduce, $table23),
					51=>new ParserAction($this->reduce, $table23),
					52=>new ParserAction($this->reduce, $table23),
					53=>new ParserAction($this->reduce, $table23),
					54=>new ParserAction($this->reduce, $table23),
					55=>new ParserAction($this->reduce, $table23),
					57=>new ParserAction($this->reduce, $table23)
				);

			$tableDefinition76 = array(
				
					1=>new ParserAction($this->reduce, $table26),
					5=>new ParserAction($this->reduce, $table26),
					7=>new ParserAction($this->reduce, $table26),
					8=>new ParserAction($this->reduce, $table26),
					9=>new ParserAction($this->reduce, $table26),
					10=>new ParserAction($this->reduce, $table26),
					11=>new ParserAction($this->reduce, $table26),
					12=>new ParserAction($this->reduce, $table26),
					13=>new ParserAction($this->reduce, $table26),
					14=>new ParserAction($this->reduce, $table26),
					15=>new ParserAction($this->reduce, $table26),
					16=>new ParserAction($this->reduce, $table26),
					17=>new ParserAction($this->reduce, $table26),
					18=>new ParserAction($this->reduce, $table26),
					19=>new ParserAction($this->reduce, $table26),
					20=>new ParserAction($this->reduce, $table26),
					21=>new ParserAction($this->reduce, $table26),
					22=>new ParserAction($this->reduce, $table26),
					23=>new ParserAction($this->reduce, $table26),
					24=>new ParserAction($this->reduce, $table26),
					25=>new ParserAction($this->reduce, $table26),
					26=>new ParserAction($this->reduce, $table26),
					27=>new ParserAction($this->reduce, $table26),
					28=>new ParserAction($this->reduce, $table26),
					29=>new ParserAction($this->reduce, $table26),
					30=>new ParserAction($this->reduce, $table26),
					31=>new ParserAction($this->reduce, $table26),
					32=>new ParserAction($this->reduce, $table26),
					33=>new ParserAction($this->reduce, $table26),
					34=>new ParserAction($this->reduce, $table26),
					35=>new ParserAction($this->reduce, $table26),
					36=>new ParserAction($this->reduce, $table26),
					37=>new ParserAction($this->reduce, $table26),
					38=>new ParserAction($this->reduce, $table26),
					39=>new ParserAction($this->reduce, $table26),
					40=>new ParserAction($this->reduce, $table26),
					41=>new ParserAction($this->reduce, $table26),
					42=>new ParserAction($this->reduce, $table26),
					43=>new ParserAction($this->reduce, $table26),
					44=>new ParserAction($this->reduce, $table26),
					45=>new ParserAction($this->reduce, $table26),
					46=>new ParserAction($this->reduce, $table26),
					47=>new ParserAction($this->reduce, $table26),
					49=>new ParserAction($this->reduce, $table26),
					51=>new ParserAction($this->reduce, $table26),
					52=>new ParserAction($this->reduce, $table26),
					53=>new ParserAction($this->reduce, $table26),
					54=>new ParserAction($this->reduce, $table26),
					55=>new ParserAction($this->reduce, $table26),
					57=>new ParserAction($this->reduce, $table26)
				);

			$tableDefinition77 = array(
				
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
					44=>new ParserAction($this->reduce, $table29),
					45=>new ParserAction($this->reduce, $table29),
					46=>new ParserAction($this->reduce, $table29),
					47=>new ParserAction($this->reduce, $table29),
					49=>new ParserAction($this->reduce, $table29),
					51=>new ParserAction($this->reduce, $table29),
					52=>new ParserAction($this->reduce, $table29),
					53=>new ParserAction($this->reduce, $table29),
					54=>new ParserAction($this->reduce, $table29),
					55=>new ParserAction($this->reduce, $table29),
					57=>new ParserAction($this->reduce, $table29)
				);

			$tableDefinition78 = array(
				
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
					44=>new ParserAction($this->reduce, $table32),
					45=>new ParserAction($this->reduce, $table32),
					46=>new ParserAction($this->reduce, $table32),
					47=>new ParserAction($this->reduce, $table32),
					49=>new ParserAction($this->reduce, $table32),
					51=>new ParserAction($this->reduce, $table32),
					52=>new ParserAction($this->reduce, $table32),
					53=>new ParserAction($this->reduce, $table32),
					54=>new ParserAction($this->reduce, $table32),
					55=>new ParserAction($this->reduce, $table32),
					57=>new ParserAction($this->reduce, $table32)
				);

			$tableDefinition79 = array(
				
					1=>new ParserAction($this->reduce, $table35),
					5=>new ParserAction($this->reduce, $table35),
					7=>new ParserAction($this->reduce, $table35),
					8=>new ParserAction($this->reduce, $table35),
					9=>new ParserAction($this->reduce, $table35),
					10=>new ParserAction($this->reduce, $table35),
					11=>new ParserAction($this->reduce, $table35),
					12=>new ParserAction($this->reduce, $table35),
					13=>new ParserAction($this->reduce, $table35),
					14=>new ParserAction($this->reduce, $table35),
					15=>new ParserAction($this->reduce, $table35),
					16=>new ParserAction($this->reduce, $table35),
					17=>new ParserAction($this->reduce, $table35),
					18=>new ParserAction($this->reduce, $table35),
					19=>new ParserAction($this->reduce, $table35),
					20=>new ParserAction($this->reduce, $table35),
					21=>new ParserAction($this->reduce, $table35),
					22=>new ParserAction($this->reduce, $table35),
					23=>new ParserAction($this->reduce, $table35),
					24=>new ParserAction($this->reduce, $table35),
					25=>new ParserAction($this->reduce, $table35),
					26=>new ParserAction($this->reduce, $table35),
					27=>new ParserAction($this->reduce, $table35),
					28=>new ParserAction($this->reduce, $table35),
					29=>new ParserAction($this->reduce, $table35),
					30=>new ParserAction($this->reduce, $table35),
					31=>new ParserAction($this->reduce, $table35),
					32=>new ParserAction($this->reduce, $table35),
					33=>new ParserAction($this->reduce, $table35),
					34=>new ParserAction($this->reduce, $table35),
					35=>new ParserAction($this->reduce, $table35),
					36=>new ParserAction($this->reduce, $table35),
					37=>new ParserAction($this->reduce, $table35),
					38=>new ParserAction($this->reduce, $table35),
					39=>new ParserAction($this->reduce, $table35),
					40=>new ParserAction($this->reduce, $table35),
					41=>new ParserAction($this->reduce, $table35),
					42=>new ParserAction($this->reduce, $table35),
					43=>new ParserAction($this->reduce, $table35),
					44=>new ParserAction($this->reduce, $table35),
					45=>new ParserAction($this->reduce, $table35),
					46=>new ParserAction($this->reduce, $table35),
					47=>new ParserAction($this->reduce, $table35),
					49=>new ParserAction($this->reduce, $table35),
					51=>new ParserAction($this->reduce, $table35),
					52=>new ParserAction($this->reduce, $table35),
					53=>new ParserAction($this->reduce, $table35),
					54=>new ParserAction($this->reduce, $table35),
					55=>new ParserAction($this->reduce, $table35),
					57=>new ParserAction($this->reduce, $table35)
				);

			$tableDefinition80 = array(
				
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
					44=>new ParserAction($this->reduce, $table38),
					45=>new ParserAction($this->reduce, $table38),
					46=>new ParserAction($this->reduce, $table38),
					47=>new ParserAction($this->reduce, $table38),
					49=>new ParserAction($this->reduce, $table38),
					51=>new ParserAction($this->reduce, $table38),
					52=>new ParserAction($this->reduce, $table38),
					53=>new ParserAction($this->reduce, $table38),
					54=>new ParserAction($this->reduce, $table38),
					55=>new ParserAction($this->reduce, $table38),
					57=>new ParserAction($this->reduce, $table38)
				);

			$tableDefinition81 = array(
				
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
					44=>new ParserAction($this->reduce, $table41),
					45=>new ParserAction($this->reduce, $table41),
					46=>new ParserAction($this->reduce, $table41),
					47=>new ParserAction($this->reduce, $table41),
					49=>new ParserAction($this->reduce, $table41),
					51=>new ParserAction($this->reduce, $table41),
					52=>new ParserAction($this->reduce, $table41),
					53=>new ParserAction($this->reduce, $table41),
					54=>new ParserAction($this->reduce, $table41),
					55=>new ParserAction($this->reduce, $table41),
					57=>new ParserAction($this->reduce, $table41)
				);

			$tableDefinition82 = array(
				
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
					44=>new ParserAction($this->reduce, $table42),
					45=>new ParserAction($this->reduce, $table42),
					46=>new ParserAction($this->reduce, $table42),
					47=>new ParserAction($this->reduce, $table42),
					49=>new ParserAction($this->reduce, $table42),
					51=>new ParserAction($this->reduce, $table42),
					52=>new ParserAction($this->reduce, $table42),
					53=>new ParserAction($this->reduce, $table42),
					54=>new ParserAction($this->reduce, $table42),
					55=>new ParserAction($this->reduce, $table42),
					57=>new ParserAction($this->reduce, $table42)
				);

			$tableDefinition83 = array(
				
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
					44=>new ParserAction($this->reduce, $table45),
					45=>new ParserAction($this->reduce, $table45),
					46=>new ParserAction($this->reduce, $table45),
					47=>new ParserAction($this->reduce, $table45),
					49=>new ParserAction($this->reduce, $table45),
					51=>new ParserAction($this->reduce, $table45),
					52=>new ParserAction($this->reduce, $table45),
					53=>new ParserAction($this->reduce, $table45),
					54=>new ParserAction($this->reduce, $table45),
					55=>new ParserAction($this->reduce, $table45),
					57=>new ParserAction($this->reduce, $table45)
				);

			$tableDefinition84 = array(
				
					1=>new ParserAction($this->reduce, $table48),
					5=>new ParserAction($this->reduce, $table48),
					7=>new ParserAction($this->reduce, $table48),
					8=>new ParserAction($this->reduce, $table48),
					9=>new ParserAction($this->reduce, $table48),
					10=>new ParserAction($this->reduce, $table48),
					11=>new ParserAction($this->reduce, $table48),
					12=>new ParserAction($this->reduce, $table48),
					13=>new ParserAction($this->reduce, $table48),
					14=>new ParserAction($this->reduce, $table48),
					15=>new ParserAction($this->reduce, $table48),
					16=>new ParserAction($this->reduce, $table48),
					17=>new ParserAction($this->reduce, $table48),
					18=>new ParserAction($this->reduce, $table48),
					19=>new ParserAction($this->reduce, $table48),
					20=>new ParserAction($this->reduce, $table48),
					21=>new ParserAction($this->reduce, $table48),
					22=>new ParserAction($this->reduce, $table48),
					23=>new ParserAction($this->reduce, $table48),
					24=>new ParserAction($this->reduce, $table48),
					25=>new ParserAction($this->reduce, $table48),
					26=>new ParserAction($this->reduce, $table48),
					27=>new ParserAction($this->reduce, $table48),
					28=>new ParserAction($this->reduce, $table48),
					29=>new ParserAction($this->reduce, $table48),
					30=>new ParserAction($this->reduce, $table48),
					31=>new ParserAction($this->reduce, $table48),
					32=>new ParserAction($this->reduce, $table48),
					33=>new ParserAction($this->reduce, $table48),
					34=>new ParserAction($this->reduce, $table48),
					35=>new ParserAction($this->reduce, $table48),
					36=>new ParserAction($this->reduce, $table48),
					37=>new ParserAction($this->reduce, $table48),
					38=>new ParserAction($this->reduce, $table48),
					39=>new ParserAction($this->reduce, $table48),
					40=>new ParserAction($this->reduce, $table48),
					41=>new ParserAction($this->reduce, $table48),
					42=>new ParserAction($this->reduce, $table48),
					43=>new ParserAction($this->reduce, $table48),
					44=>new ParserAction($this->reduce, $table48),
					45=>new ParserAction($this->reduce, $table48),
					46=>new ParserAction($this->reduce, $table48),
					47=>new ParserAction($this->reduce, $table48),
					49=>new ParserAction($this->reduce, $table48),
					51=>new ParserAction($this->reduce, $table48),
					52=>new ParserAction($this->reduce, $table48),
					53=>new ParserAction($this->reduce, $table48),
					54=>new ParserAction($this->reduce, $table48),
					55=>new ParserAction($this->reduce, $table48),
					57=>new ParserAction($this->reduce, $table48)
				);

			$tableDefinition85 = array(
				
					1=>new ParserAction($this->reduce, $table52),
					5=>new ParserAction($this->reduce, $table52),
					7=>new ParserAction($this->reduce, $table52),
					8=>new ParserAction($this->reduce, $table52),
					9=>new ParserAction($this->reduce, $table52),
					10=>new ParserAction($this->reduce, $table52),
					11=>new ParserAction($this->reduce, $table52),
					12=>new ParserAction($this->reduce, $table52),
					13=>new ParserAction($this->reduce, $table52),
					14=>new ParserAction($this->reduce, $table52),
					15=>new ParserAction($this->reduce, $table52),
					16=>new ParserAction($this->reduce, $table52),
					17=>new ParserAction($this->reduce, $table52),
					18=>new ParserAction($this->reduce, $table52),
					19=>new ParserAction($this->reduce, $table52),
					20=>new ParserAction($this->reduce, $table52),
					21=>new ParserAction($this->reduce, $table52),
					22=>new ParserAction($this->reduce, $table52),
					23=>new ParserAction($this->reduce, $table52),
					24=>new ParserAction($this->reduce, $table52),
					25=>new ParserAction($this->reduce, $table52),
					26=>new ParserAction($this->reduce, $table52),
					27=>new ParserAction($this->reduce, $table52),
					28=>new ParserAction($this->reduce, $table52),
					29=>new ParserAction($this->reduce, $table52),
					30=>new ParserAction($this->reduce, $table52),
					31=>new ParserAction($this->reduce, $table52),
					32=>new ParserAction($this->reduce, $table52),
					33=>new ParserAction($this->reduce, $table52),
					34=>new ParserAction($this->reduce, $table52),
					35=>new ParserAction($this->reduce, $table52),
					36=>new ParserAction($this->reduce, $table52),
					37=>new ParserAction($this->reduce, $table52),
					38=>new ParserAction($this->reduce, $table52),
					39=>new ParserAction($this->reduce, $table52),
					40=>new ParserAction($this->reduce, $table52),
					41=>new ParserAction($this->reduce, $table52),
					42=>new ParserAction($this->reduce, $table52),
					43=>new ParserAction($this->reduce, $table52),
					44=>new ParserAction($this->reduce, $table52),
					45=>new ParserAction($this->reduce, $table52),
					46=>new ParserAction($this->reduce, $table52),
					47=>new ParserAction($this->reduce, $table52),
					49=>new ParserAction($this->reduce, $table52),
					51=>new ParserAction($this->reduce, $table52),
					52=>new ParserAction($this->reduce, $table52),
					53=>new ParserAction($this->reduce, $table52),
					54=>new ParserAction($this->reduce, $table52),
					55=>new ParserAction($this->reduce, $table52),
					57=>new ParserAction($this->reduce, $table52)
				);

			$tableDefinition86 = array(
				
					1=>new ParserAction($this->reduce, $table55),
					5=>new ParserAction($this->reduce, $table55),
					7=>new ParserAction($this->reduce, $table55),
					8=>new ParserAction($this->reduce, $table55),
					9=>new ParserAction($this->reduce, $table55),
					10=>new ParserAction($this->reduce, $table55),
					11=>new ParserAction($this->reduce, $table55),
					12=>new ParserAction($this->reduce, $table55),
					13=>new ParserAction($this->reduce, $table55),
					14=>new ParserAction($this->reduce, $table55),
					15=>new ParserAction($this->reduce, $table55),
					16=>new ParserAction($this->reduce, $table55),
					17=>new ParserAction($this->reduce, $table55),
					18=>new ParserAction($this->reduce, $table55),
					19=>new ParserAction($this->reduce, $table55),
					20=>new ParserAction($this->reduce, $table55),
					21=>new ParserAction($this->reduce, $table55),
					22=>new ParserAction($this->reduce, $table55),
					23=>new ParserAction($this->reduce, $table55),
					24=>new ParserAction($this->reduce, $table55),
					25=>new ParserAction($this->reduce, $table55),
					26=>new ParserAction($this->reduce, $table55),
					27=>new ParserAction($this->reduce, $table55),
					28=>new ParserAction($this->reduce, $table55),
					29=>new ParserAction($this->reduce, $table55),
					30=>new ParserAction($this->reduce, $table55),
					31=>new ParserAction($this->reduce, $table55),
					32=>new ParserAction($this->reduce, $table55),
					33=>new ParserAction($this->reduce, $table55),
					34=>new ParserAction($this->reduce, $table55),
					35=>new ParserAction($this->reduce, $table55),
					36=>new ParserAction($this->reduce, $table55),
					37=>new ParserAction($this->reduce, $table55),
					38=>new ParserAction($this->reduce, $table55),
					39=>new ParserAction($this->reduce, $table55),
					40=>new ParserAction($this->reduce, $table55),
					41=>new ParserAction($this->reduce, $table55),
					42=>new ParserAction($this->reduce, $table55),
					43=>new ParserAction($this->reduce, $table55),
					44=>new ParserAction($this->reduce, $table55),
					45=>new ParserAction($this->reduce, $table55),
					46=>new ParserAction($this->reduce, $table55),
					47=>new ParserAction($this->reduce, $table55),
					49=>new ParserAction($this->reduce, $table55),
					51=>new ParserAction($this->reduce, $table55),
					52=>new ParserAction($this->reduce, $table55),
					53=>new ParserAction($this->reduce, $table55),
					54=>new ParserAction($this->reduce, $table55),
					55=>new ParserAction($this->reduce, $table55),
					57=>new ParserAction($this->reduce, $table55)
				);

			$tableDefinition87 = array(
				
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
					44=>new ParserAction($this->reduce, $table58),
					45=>new ParserAction($this->reduce, $table58),
					46=>new ParserAction($this->reduce, $table58),
					47=>new ParserAction($this->reduce, $table58),
					49=>new ParserAction($this->reduce, $table58),
					51=>new ParserAction($this->reduce, $table58),
					52=>new ParserAction($this->reduce, $table58),
					53=>new ParserAction($this->reduce, $table58),
					54=>new ParserAction($this->reduce, $table58),
					55=>new ParserAction($this->reduce, $table58),
					57=>new ParserAction($this->reduce, $table58)
				);

			$tableDefinition88 = array(
				
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
					44=>new ParserAction($this->reduce, $table61),
					45=>new ParserAction($this->reduce, $table61),
					46=>new ParserAction($this->reduce, $table61),
					47=>new ParserAction($this->reduce, $table61),
					49=>new ParserAction($this->reduce, $table61),
					51=>new ParserAction($this->reduce, $table61),
					52=>new ParserAction($this->reduce, $table61),
					53=>new ParserAction($this->reduce, $table61),
					54=>new ParserAction($this->reduce, $table61),
					55=>new ParserAction($this->reduce, $table61),
					57=>new ParserAction($this->reduce, $table61)
				);

			$tableDefinition89 = array(
				
					6=>new ParserAction($this->none, $table36),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					10=>new ParserAction($this->shift, $table7),
					12=>new ParserAction($this->shift, $table8),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					21=>new ParserAction($this->shift, $table15),
					23=>new ParserAction($this->shift, $table16),
					25=>new ParserAction($this->shift, $table17),
					27=>new ParserAction($this->shift, $table18),
					29=>new ParserAction($this->shift, $table19),
					31=>new ParserAction($this->shift, $table20),
					33=>new ParserAction($this->shift, $table21),
					35=>new ParserAction($this->shift, $table22),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					40=>new ParserAction($this->shift, $table25),
					42=>new ParserAction($this->shift, $table26),
					44=>new ParserAction($this->shift, $table27),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					51=>new ParserAction($this->shift, $table93),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34)
				);

			$tableDefinition90 = array(
				
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
					44=>new ParserAction($this->reduce, $table66),
					45=>new ParserAction($this->reduce, $table66),
					46=>new ParserAction($this->reduce, $table66),
					47=>new ParserAction($this->reduce, $table66),
					49=>new ParserAction($this->reduce, $table66),
					51=>new ParserAction($this->reduce, $table66),
					52=>new ParserAction($this->reduce, $table66),
					53=>new ParserAction($this->reduce, $table66),
					54=>new ParserAction($this->reduce, $table66),
					55=>new ParserAction($this->reduce, $table66),
					57=>new ParserAction($this->reduce, $table66)
				);

			$tableDefinition91 = array(
				
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
					44=>new ParserAction($this->reduce, $table72),
					45=>new ParserAction($this->reduce, $table72),
					46=>new ParserAction($this->reduce, $table72),
					47=>new ParserAction($this->reduce, $table72),
					49=>new ParserAction($this->reduce, $table72),
					51=>new ParserAction($this->reduce, $table72),
					52=>new ParserAction($this->reduce, $table72),
					53=>new ParserAction($this->reduce, $table72),
					54=>new ParserAction($this->reduce, $table72),
					55=>new ParserAction($this->reduce, $table72),
					57=>new ParserAction($this->reduce, $table72)
				);

			$tableDefinition92 = array(
				
					5=>new ParserAction($this->shift, $table95),
					6=>new ParserAction($this->none, $table36),
					7=>new ParserAction($this->shift, $table5),
					8=>new ParserAction($this->shift, $table6),
					10=>new ParserAction($this->shift, $table7),
					12=>new ParserAction($this->shift, $table8),
					14=>new ParserAction($this->shift, $table9),
					15=>new ParserAction($this->shift, $table10),
					16=>new ParserAction($this->shift, $table11),
					17=>new ParserAction($this->shift, $table12),
					18=>new ParserAction($this->shift, $table13),
					19=>new ParserAction($this->shift, $table14),
					21=>new ParserAction($this->shift, $table15),
					23=>new ParserAction($this->shift, $table16),
					25=>new ParserAction($this->shift, $table17),
					27=>new ParserAction($this->shift, $table18),
					29=>new ParserAction($this->shift, $table19),
					31=>new ParserAction($this->shift, $table20),
					33=>new ParserAction($this->shift, $table21),
					35=>new ParserAction($this->shift, $table22),
					37=>new ParserAction($this->shift, $table23),
					38=>new ParserAction($this->shift, $table24),
					40=>new ParserAction($this->shift, $table25),
					42=>new ParserAction($this->shift, $table26),
					44=>new ParserAction($this->shift, $table27),
					46=>new ParserAction($this->shift, $table28),
					47=>new ParserAction($this->shift, $table29),
					49=>new ParserAction($this->shift, $table30),
					52=>new ParserAction($this->shift, $table31),
					53=>new ParserAction($this->shift, $table32),
					54=>new ParserAction($this->shift, $table33),
					55=>new ParserAction($this->shift, $table34),
					57=>new ParserAction($this->shift, $table94)
				);

			$tableDefinition93 = array(
				
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
					44=>new ParserAction($this->reduce, $table65),
					45=>new ParserAction($this->reduce, $table65),
					46=>new ParserAction($this->reduce, $table65),
					47=>new ParserAction($this->reduce, $table65),
					49=>new ParserAction($this->reduce, $table65),
					51=>new ParserAction($this->reduce, $table65),
					52=>new ParserAction($this->reduce, $table65),
					53=>new ParserAction($this->reduce, $table65),
					54=>new ParserAction($this->reduce, $table65),
					55=>new ParserAction($this->reduce, $table65),
					57=>new ParserAction($this->reduce, $table65)
				);

			$tableDefinition94 = array(
				
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
					44=>new ParserAction($this->reduce, $table73),
					45=>new ParserAction($this->reduce, $table73),
					46=>new ParserAction($this->reduce, $table73),
					47=>new ParserAction($this->reduce, $table73),
					49=>new ParserAction($this->reduce, $table73),
					51=>new ParserAction($this->reduce, $table73),
					52=>new ParserAction($this->reduce, $table73),
					53=>new ParserAction($this->reduce, $table73),
					54=>new ParserAction($this->reduce, $table73),
					55=>new ParserAction($this->reduce, $table73),
					57=>new ParserAction($this->reduce, $table73)
				);

			$tableDefinition95 = array(
				
					1=>new ParserAction($this->reduce, $table74),
					5=>new ParserAction($this->reduce, $table74),
					7=>new ParserAction($this->reduce, $table74),
					8=>new ParserAction($this->reduce, $table74),
					9=>new ParserAction($this->reduce, $table74),
					10=>new ParserAction($this->reduce, $table74),
					11=>new ParserAction($this->reduce, $table74),
					12=>new ParserAction($this->reduce, $table74),
					13=>new ParserAction($this->reduce, $table74),
					14=>new ParserAction($this->reduce, $table74),
					15=>new ParserAction($this->reduce, $table74),
					16=>new ParserAction($this->reduce, $table74),
					17=>new ParserAction($this->reduce, $table74),
					18=>new ParserAction($this->reduce, $table74),
					19=>new ParserAction($this->reduce, $table74),
					20=>new ParserAction($this->reduce, $table74),
					21=>new ParserAction($this->reduce, $table74),
					22=>new ParserAction($this->reduce, $table74),
					23=>new ParserAction($this->reduce, $table74),
					24=>new ParserAction($this->reduce, $table74),
					25=>new ParserAction($this->reduce, $table74),
					26=>new ParserAction($this->reduce, $table74),
					27=>new ParserAction($this->reduce, $table74),
					28=>new ParserAction($this->reduce, $table74),
					29=>new ParserAction($this->reduce, $table74),
					30=>new ParserAction($this->reduce, $table74),
					31=>new ParserAction($this->reduce, $table74),
					32=>new ParserAction($this->reduce, $table74),
					33=>new ParserAction($this->reduce, $table74),
					34=>new ParserAction($this->reduce, $table74),
					35=>new ParserAction($this->reduce, $table74),
					36=>new ParserAction($this->reduce, $table74),
					37=>new ParserAction($this->reduce, $table74),
					38=>new ParserAction($this->reduce, $table74),
					39=>new ParserAction($this->reduce, $table74),
					40=>new ParserAction($this->reduce, $table74),
					41=>new ParserAction($this->reduce, $table74),
					42=>new ParserAction($this->reduce, $table74),
					43=>new ParserAction($this->reduce, $table74),
					44=>new ParserAction($this->reduce, $table74),
					45=>new ParserAction($this->reduce, $table74),
					46=>new ParserAction($this->reduce, $table74),
					47=>new ParserAction($this->reduce, $table74),
					49=>new ParserAction($this->reduce, $table74),
					51=>new ParserAction($this->reduce, $table74),
					52=>new ParserAction($this->reduce, $table74),
					53=>new ParserAction($this->reduce, $table74),
					54=>new ParserAction($this->reduce, $table74),
					55=>new ParserAction($this->reduce, $table74),
					57=>new ParserAction($this->reduce, $table74)
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
			$table87->setActions($tableDefinition87);
			$table88->setActions($tableDefinition88);
			$table89->setActions($tableDefinition89);
			$table90->setActions($tableDefinition90);
			$table91->setActions($tableDefinition91);
			$table92->setActions($tableDefinition92);
			$table93->setActions($tableDefinition93);
			$table94->setActions($tableDefinition94);
			$table95->setActions($tableDefinition95);

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
					86=>$table86,
					87=>$table87,
					88=>$table88,
					89=>$table89,
					90=>$table90,
					91=>$table91,
					92=>$table92,
					93=>$table93,
					94=>$table94,
					95=>$table95
				);

			$this->defaultActions = array(
				
					3=>new ParserAction($this->reduce, $table3),
					35=>new ParserAction($this->reduce, $table2)
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
					8=>new ParserProduction($symbol6,2),
					9=>new ParserProduction($symbol6,3),
					10=>new ParserProduction($symbol6,1),
					11=>new ParserProduction($symbol6,2),
					12=>new ParserProduction($symbol6,3),
					13=>new ParserProduction($symbol6,1),
					14=>new ParserProduction($symbol6,2),
					15=>new ParserProduction($symbol6,3),
					16=>new ParserProduction($symbol6,1),
					17=>new ParserProduction($symbol6,1),
					18=>new ParserProduction($symbol6,1),
					19=>new ParserProduction($symbol6,1),
					20=>new ParserProduction($symbol6,1),
					21=>new ParserProduction($symbol6,1),
					22=>new ParserProduction($symbol6,2),
					23=>new ParserProduction($symbol6,3),
					24=>new ParserProduction($symbol6,1),
					25=>new ParserProduction($symbol6,2),
					26=>new ParserProduction($symbol6,3),
					27=>new ParserProduction($symbol6,1),
					28=>new ParserProduction($symbol6,2),
					29=>new ParserProduction($symbol6,3),
					30=>new ParserProduction($symbol6,1),
					31=>new ParserProduction($symbol6,2),
					32=>new ParserProduction($symbol6,3),
					33=>new ParserProduction($symbol6,1),
					34=>new ParserProduction($symbol6,2),
					35=>new ParserProduction($symbol6,3),
					36=>new ParserProduction($symbol6,1),
					37=>new ParserProduction($symbol6,2),
					38=>new ParserProduction($symbol6,3),
					39=>new ParserProduction($symbol6,1),
					40=>new ParserProduction($symbol6,2),
					41=>new ParserProduction($symbol6,3),
					42=>new ParserProduction($symbol6,3),
					43=>new ParserProduction($symbol6,1),
					44=>new ParserProduction($symbol6,2),
					45=>new ParserProduction($symbol6,3),
					46=>new ParserProduction($symbol6,1),
					47=>new ParserProduction($symbol6,2),
					48=>new ParserProduction($symbol6,3),
					49=>new ParserProduction($symbol6,1),
					50=>new ParserProduction($symbol6,1),
					51=>new ParserProduction($symbol6,2),
					52=>new ParserProduction($symbol6,3),
					53=>new ParserProduction($symbol6,1),
					54=>new ParserProduction($symbol6,2),
					55=>new ParserProduction($symbol6,3),
					56=>new ParserProduction($symbol6,1),
					57=>new ParserProduction($symbol6,2),
					58=>new ParserProduction($symbol6,3),
					59=>new ParserProduction($symbol6,1),
					60=>new ParserProduction($symbol6,2),
					61=>new ParserProduction($symbol6,3),
					62=>new ParserProduction($symbol6,1),
					63=>new ParserProduction($symbol6,1),
					64=>new ParserProduction($symbol6,2),
					65=>new ParserProduction($symbol6,4),
					66=>new ParserProduction($symbol6,3),
					67=>new ParserProduction($symbol6,2),
					68=>new ParserProduction($symbol6,1),
					69=>new ParserProduction($symbol6,1),
					70=>new ParserProduction($symbol6,1),
					71=>new ParserProduction($symbol6,1),
					72=>new ParserProduction($symbol6,3),
					73=>new ParserProduction($symbol6,4),
					74=>new ParserProduction($symbol6,4),
					75=>new ParserProduction($symbol6,2),
					76=>new ParserProduction($symbol6,1)
				);




        //Setup Lexer
        
			$this->rules = array(
				
					0=>"/^(?:$)/",
					1=>"/^(?:~\/np~)/",
					2=>"/^(?:~np~)/",
					3=>"/^(?:$)/",
					4=>"/^(?:~\/pp~)/",
					5=>"/^(?:~pp~)/",
					6=>"/^(?:$)/",
					7=>"/^(?:~\/tc~)/",
					8=>"/^(?:~tc~)/",
					9=>"/^(?:[%][%](([0-9A-Za-z ]{3,}))[%][%])/",
					10=>"/^(?:[%](([0-9A-Za-z ]{3,}))[%])/",
					11=>"/^(?:\{\{(([0-9A-Za-z ]{3,}))([|](([0-9A-Za-z ]{3,})))?\}\})/",
					12=>"/^(?:\{rm\})/",
					13=>"/^(?:((\n))(\{r2l\}|\{l2r\}))/",
					14=>"/^(?:(.+?\}|\}))/",
					15=>"/^(?:\{([a-z_]+))/",
					16=>"/^(?:.*?\)\})/",
					17=>"/^(?:\{([A-Z_]+)\()/",
					18=>"/^(?:$)/",
					19=>"/^(?:\{([A-Z_]+)\})/",
					20=>"/^(?:$)/",
					21=>"/^(?:(([\!*#+;]+)))/",
					22=>"/^(?:(?=((\n))))/",
					23=>"/^(?:$)/",
					24=>"/^(?:((\n))(?=(([\!*#+;]+))))/",
					25=>"/^(?:(?=(([\!*#+;]+))))/",
					26=>"/^(?:((\n)))/",
					27=>"/^(?:---)/",
					28=>"/^(?:%%%)/",
					29=>"/^(?:$)/",
					30=>"/^(?:[_][_])/",
					31=>"/^(?:[_][_])/",
					32=>"/^(?:$)/",
					33=>"/^(?:[\^])/",
					34=>"/^(?:[\^])/",
					35=>"/^(?:$)/",
					36=>"/^(?:[:][:])/",
					37=>"/^(?:[:][:])/",
					38=>"/^(?:$)/",
					39=>"/^(?:\+-)/",
					40=>"/^(?:-\+)/",
					41=>"/^(?:$)/",
					42=>"/^(?:[\~][\~])/",
					43=>"/^(?:[\~][\~])/",
					44=>"/^(?:$)/",
					45=>"/^(?:[']['])/",
					46=>"/^(?:[']['])/",
					47=>"/^(?:$)/",
					48=>"/^(?:(@np|\]\]|\]))/",
					49=>"/^(?:\[\[)/",
					50=>"/^(?:$)/",
					51=>"/^(?:\])/",
					52=>"/^(?:\[(?![ ]))/",
					53=>"/^(?:$)/",
					54=>"/^(?:[-][-])/",
					55=>"/^(?:[-][-](?![ ]|$))/",
					56=>"/^(?:[ ][-][-][ ])/",
					57=>"/^(?:$)/",
					58=>"/^(?:[|][|])/",
					59=>"/^(?:[|][|])/",
					60=>"/^(?:$)/",
					61=>"/^(?:[=][-])/",
					62=>"/^(?:[-][=])/",
					63=>"/^(?:$)/",
					64=>"/^(?:[=][=][=])/",
					65=>"/^(?:[=][=][=])/",
					66=>"/^(?:$)/",
					67=>"/^(?:\)\)|\(\()/",
					68=>"/^(?:\(\()/",
					69=>"/^(?:\)\))/",
					70=>"/^(?:\(((([a-z0-9-]+)))\()/",
					71=>"/^(?:(?:[ \n\t\r\,\;]|^)(([A-Z]{1,}[a-z_\-\x80-\xFF]{1,}){2,})(?=$|[ \n\t\r\,\;\.]))/",
					72=>"/^(?:&)/",
					73=>"/^(?:[<](.|\n)*?[>])/",
					74=>"/^(?:≤REAL_EOF≥)/",
					75=>"/^(?:≤REAL_LT≥(.|\n)*?≤REAL_GT≥)/",
					76=>"/^(?:(§[a-z0-9]{32}§))/",
					77=>"/^(?:(≤(.)+≥))/",
					78=>"/^(?:([A-Za-z0-9 .,?;]+))/",
					79=>"/^(?:(?!([{}\n_\^:\~'-|=\(\)\[\]*#+%<≤]))(((.?)))?(?=([{}\n_\^:\~'-|=\(\)\[\]*#+%<≤])))/",
					80=>"/^(?:([ ]+?))/",
					81=>"/^(?:(~bs~|~BS~))/",
					82=>"/^(?:(~hs~|~HS~))/",
					83=>"/^(?:(~amp~|~amp~))/",
					84=>"/^(?:(~ldq~|~LDQ~))/",
					85=>"/^(?:(~rdq~|~RDQ~))/",
					86=>"/^(?:(~lsq~|~LSQ~))/",
					87=>"/^(?:(~rsq~|~RSQ~))/",
					88=>"/^(?:(~c~|~C~))/",
					89=>"/^(?:~--~)/",
					90=>"/^(?:=>)/",
					91=>"/^(?:(~lt~|~LT~))/",
					92=>"/^(?:(~gt~|~GT~))/",
					93=>"/^(?:\{([0-9]+)\})/",
					94=>"/^(?:(.))/",
					95=>"/^(?:$)/"
				);

			$this->conditions = array(
				
					"BOF"=>new LexerConditions(array( 2,5,8,9,10,11,12,13,15,17,24,25,26,27,28,31,34,37,40,43,46,49,52,55,56,59,62,65,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95), true),
					"np"=>new LexerConditions(array( 0,1,2,5,8,9,10,11,12,13,15,17,24,26,27,28,31,34,37,40,43,46,49,52,55,56,59,62,65,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95), true),
					"pp"=>new LexerConditions(array( 2,3,4,5,8,9,10,11,12,13,15,17,24,26,27,28,31,34,37,40,43,46,49,52,55,56,59,62,65,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95), true),
					"tc"=>new LexerConditions(array( 2,5,6,7,8,9,10,11,12,13,15,17,24,26,27,28,31,34,37,40,43,46,49,52,55,56,59,62,65,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95), true),
					"pluginStart"=>new LexerConditions(array( 2,5,8,9,10,11,12,13,15,16,17,24,26,27,28,31,34,37,40,43,46,49,52,55,56,59,62,65,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95), true),
					"plugin"=>new LexerConditions(array( 2,5,8,9,10,11,12,13,15,17,18,19,24,26,27,28,31,34,37,40,43,46,49,52,55,56,59,62,65,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95), true),
					"inlinePlugin"=>new LexerConditions(array( 2,5,8,9,10,11,12,13,14,15,17,24,26,27,28,31,34,37,40,43,46,49,52,55,56,59,62,65,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95), true),
					"line"=>new LexerConditions(array( 2,5,8,9,10,11,12,13,15,17,24,26,27,28,31,34,37,40,43,46,49,52,55,56,59,62,65,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95), true),
					"preBlock"=>new LexerConditions(array( 2,5,8,9,10,11,12,13,15,17,21,24,26,27,28,31,34,37,40,43,46,49,52,55,56,59,62,65,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95), true),
					"block"=>new LexerConditions(array( 2,5,8,9,10,11,12,13,15,17,20,22,23,24,26,27,28,31,34,37,40,43,46,49,52,55,56,59,62,65,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95), true),
					"preBlockEnd"=>new LexerConditions(array( 2,5,8,9,10,11,12,13,15,17,24,26,27,28,31,34,37,40,43,46,49,52,55,56,59,62,65,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95), true),
					"bold"=>new LexerConditions(array( 2,5,8,9,10,11,12,13,15,17,24,26,27,28,29,30,31,34,37,40,43,46,49,52,55,56,59,62,65,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95), true),
					"box"=>new LexerConditions(array( 2,5,8,9,10,11,12,13,15,17,24,26,27,28,31,32,33,34,37,40,43,46,49,52,55,56,59,62,65,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95), true),
					"center"=>new LexerConditions(array( 2,5,8,9,10,11,12,13,15,17,24,26,27,28,31,34,35,36,37,40,43,46,49,52,55,56,59,62,65,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95), true),
					"code"=>new LexerConditions(array( 2,5,8,9,10,11,12,13,15,17,24,26,27,28,31,34,37,38,39,40,43,46,49,52,55,56,59,62,65,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95), true),
					"color"=>new LexerConditions(array( 2,5,8,9,10,11,12,13,15,17,24,26,27,28,31,34,37,40,41,42,43,46,49,52,55,56,59,62,65,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95), true),
					"italic"=>new LexerConditions(array( 2,5,8,9,10,11,12,13,15,17,24,26,27,28,31,34,37,40,43,44,45,46,49,52,55,56,59,62,65,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95), true),
					"unlink"=>new LexerConditions(array( 2,5,8,9,10,11,12,13,15,17,24,26,27,28,31,34,37,40,43,46,47,48,49,52,55,56,59,62,65,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95), true),
					"link"=>new LexerConditions(array( 2,5,8,9,10,11,12,13,15,17,24,26,27,28,31,34,37,40,43,46,49,50,51,52,55,56,59,62,65,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95), true),
					"strike"=>new LexerConditions(array( 2,5,8,9,10,11,12,13,15,17,24,26,27,28,31,34,37,40,43,46,49,52,53,54,55,56,59,62,65,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95), true),
					"table"=>new LexerConditions(array( 2,5,8,9,10,11,12,13,15,17,24,26,27,28,31,34,37,40,43,46,49,52,55,56,57,58,59,62,65,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95), true),
					"titleBar"=>new LexerConditions(array( 2,5,8,9,10,11,12,13,15,17,24,26,27,28,31,34,37,40,43,46,49,52,55,56,59,60,61,62,65,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95), true),
					"underscore"=>new LexerConditions(array( 2,5,8,9,10,11,12,13,15,17,24,26,27,28,31,34,37,40,43,46,49,52,55,56,59,62,63,64,65,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95), true),
					"wikiLink"=>new LexerConditions(array( 2,5,8,9,10,11,12,13,15,17,24,26,27,28,31,34,37,40,43,46,49,52,55,56,59,62,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95), true),
					"INITIAL"=>new LexerConditions(array( 2,5,8,9,10,11,12,13,15,17,24,26,27,28,31,34,37,40,43,46,49,52,55,56,59,62,65,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95), true)
				);


    }

    function parserPerformAction(&$thisS, &$yy, $yystate, &$s, $o)
    {
        
/* this == yyval */


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
case 9:
        
			$type =& $s[$o-2];
			$typeChild =& $s[$o-1];
			$typeChild->setParent($type);
            $type->setType('Comment', $this);
        
    
break;
case 12:
        
            $type =& $s[$o-2];
            $typeChild =& $s[$o-1];
            $typeChild->setParent($type);
            $type->setType('NoParse', $this);
        
    
break;
case 15:
        
            $type =& $s[$o-2];
            $typeChild =& $s[$o-1];
            $typeChild->setParent($type);
            $type->setType('PreFormattedText', $this);
        
    
break;
case 16:
         
            $type =& $s[$o];
            $type->setOption('Double', true);
            $type->setType('DynamicVariable', $this);
        
    
break;
case 17:
        
            $s[$o]->setType('DynamicVariable', $this);
        
     
break;
case 18:
        
            $s[$o]->setType('ArgumentVariable', $this);
        
    
break;
case 19:
        
            $s[$o]->setType('Tag', $this);
        
    
break;
case 20:
		
		    $s[$o]->setType('Row', $this);
        
	
break;
case 23:
		
		    $type =& $s[$o-2];
            $typeChild =& $s[$o-1];
            $typeChild->setParent($type);
            $type->setType('Bold', $this);
        
	
break;
case 26:
		
		    $type =& $s[$o-2];
            $typeChild =& $s[$o-1];
            $typeChild->setParent($type);
            $type->setType('Box', $this);
        
	
break;
case 29:
		
		    $type =& $s[$o-2];
            $typeChild =& $s[$o-1];
            $typeChild->setParent($type);
            $type->setType('Center', $this);
        
	
break;
case 32:
		
		    $type =& $s[$o-2];
            $typeChild =& $s[$o-1];
            $typeChild->setParent($type);
            $type->setType('Code', $this);
        
	
break;
case 35:
		
		    $type =& $s[$o-2];
            $typeChild =& $s[$o-1];
            $typeChild->setParent($type);
            $type->setType('Color', $this);
        
	
break;
case 38:
		
		    $type =& $s[$o-2];
            $typeChild =& $s[$o-1];
            $typeChild->setParent($type);
            $type->setType('Italic', $this);
        
	
break;
case 42:
		
		    $type =& $s[$o-2];
            $typeChild =& $s[$o-1];
            $typeChild->setParent($type);
            $type->setType('Unlink', $this);
        
	
break;
case 45:
		
		    //type already set

		    $type =& $s[$o-2];
            $typeChild =& $s[$o-1];
            $typeChild->setParent($type);
            $type->setType('Link', $this);
        
	
break;
case 48:
		
		    $type =& $s[$o-2];
            $typeChild =& $s[$o-1];
            $typeChild->setParent($type);
            $type->setType('Strike', $this);
        
	
break;
case 49:
        
            $s[$o]->setType('DoubleDash', $this);
        
    
break;
case 52:
		
		    $type =& $s[$o-2];
            $typeChild =& $s[$o-1];
            $typeChild->setParent($type);
            $type->setType('Table', $this);
        
	
break;
case 55:
		
			$type =& $s[$o-2];
			$typeChild =& $s[$o-1];
            $typeChild->setParent($type);
            $type->setType('TitleBar', $this);
        
	
break;
case 58:
		
		    $type =& $s[$o-2];
		    $typeChild =& $s[$o-1];
            $typeChild->setParent($type);
            $type->setType('Underscore', $this);
        
	
break;
case 61:
		
			//Type already set
			$type =& $s[$o-2];
			$typeChild =& $s[$o-1];
			$typeChild->setParent($type);
			$type->setType('WikiLink', $this);
        
	
break;
case 62:
        
            $type =& $s[$o];
            $type->addArgument($s[$o]);
            $type->setType('WordLink', $this);

        
    
break;
case 64:
 		
 		    $type =& $s[$o-1];
            $type->setOption('NoBody', true);
            $type->setOption('Inline', true);
            $type->addArgument($s[$o]);
            $type->setType('InlinePlugin', $this);
        
 	
break;
case 65:
 	    
 		    $type =& $s[$o-3];
 		    $type->addArgument($s[$o-2]);

 		    $typeChild = $s[$o-1];
 		    $typeChild->setParent($type);
 		    $type->setType('Plugin', $this);
        
 	
break;
case 66:
  	    
            $type =& $s[$o-2];
            $type->addArgument($s[$o-1]);
            $type->addArgument($s[$o]);
            $type->setType('Plugin', $this);
        
     
break;
case 69:
        
            $s[$o]->setType('Line', $this);
        
    
break;
case 70:
        
            $s[$o]->setType('ForcedLine', $this);
        
    
break;
case 71:
        
            $s[$o]->setType('Char', $this);
        
    
break;
case 72:
        
	        $s[$o-2]->setOption('Empty', 'true');
	        $s[$o-2]->setType('Block', $this);
	    
	
break;
case 73:
        
			$type = $s[$o-3];
			$type->addArgument($s[$o-2]);
			$type->addArgument($s[$o-1]);

			$typeChild =& $s[$o-1];
			$typeChild->setParent($type);
			$type->setType('Block', $this);
		
    
break;
case 74:
        
            $type = $s[$o-3];
            $type->addArgument($s[$o-2]);
            $type->addArgument($s[$o-1]);

            $typeChild =& $s[$o-1];
            $typeChild->setParent($type);
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
    public $matched = "";
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
        $this->input = $input;
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
        $ch = $this->input[0];
        $this->yy->text .= $ch;
        $this->yy->leng++;
        $this->offset++;
        $this->match .= $ch;
        $this->matched .= $ch;
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

        $this->input = array_slice($this->input, 1);
        return $ch;
    }

    function unput($ch)
    {
        $len = strlen($ch);
        $lines = explode("/(?:\r\n?|\n)/", $ch);
        $linesCount = count($lines);

        $this->input = $ch . $this->input;
        $this->yy->text = substr($this->yy->text, 0, $len - 1);
        //$this->yylen -= $len;
        $this->offset -= $len;
        $oldLines = explode("/(?:\r\n?|\n)/", $this->match);
        $oldLinesCount = count($oldLines);
        $this->match = substr($this->match, 0, strlen($this->match) - 1);
        $this->matched = substr($this->matched, 0, strlen($this->matched) - 1);

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
        $past = substr($this->matched, 0, strlen($this->matched) - strlen($this->match));
        return (strlen($past) > 20 ? '...' : '') . preg_replace("/\n/", "", substr($past, -20));
    }

    function upcomingInput()
    {
        $next = $this->match;
        if (strlen($next) < 20) {
            $next .= substr($this->input, 0, 20 - strlen($next));
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

        if (empty($this->input)) {
            $this->done = true;
        }

        if ($this->more == false) {
            $this->yy->text = '';
            $this->match = '';
        }

        $rules = $this->currentRules();
        for ($i = 0, $j = count($rules); $i < $j; $i++) {
            preg_match($this->rules[$rules[$i]], $this->input, $tempMatch);
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
            $this->matched .= $match[0];

            $this->yy->leng = strlen($this->yy->text);
            if (isset($this->ranges)) {
                $this->yy->loc->range = new ParserRange($this->offset, $this->offset += $this->yy->leng);
            }
            $this->more = false;
            $this->input = substr($this->input, $matchCount, strlen($this->input));
            $ruleIndex = $rules[$index];
            $nextCondition = $this->conditionStack[$this->conditionStackCount - 1];

            $token = $this->lexerPerformAction($ruleIndex, $nextCondition);

            if ($this->done == true && empty($this->input) == false) {
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

        if (empty($this->input)) {
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
        

;
switch($avoidingNameCollisions) {
case 0:
    
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 1:
    
        if ($this->npStack != true) return 7;
        $this->popState();
        $this->npStack = false;
    

    return 11;

break;
case 2:
    
        if ($this->isContent()) return 7;
        $this->begin('np');
        $this->npStack = true;
    

    return 10;

break;
case 3:
    
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 4:
    
        if ($this->ppStack != true) return 7;
        $this->popState();
        $this->ppStack = false;
    

    return 13;

break;
case 5:
    
        if ($this->isContent()) return 7;
        $this->begin('pp');
        $this->ppStack = true;
    

    return 12;

break;
case 6:
    
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 7:
    
        if ($this->tcStack != true) return 7;
        $this->popState();
        $this->tcStack = false;
    

    return 9;

break;
case 8:
    
        if ($this->isContent()) return 7;
        $this->begin('tc');
        $this->tcStack = true;
    

    return 8;

break;
case 9:
    
        if ($this->isContent()) return 7;
    

    return 14;

break;
case 10:
    
        if ($this->isContent()) return 7;
    

    return 15;

break;
case 11:
    
        if ($this->isContent(array('linkStack'))) return 7;
    

    return 16;

break;
case 12:
    return 54;

break;
case 13:
    
        if ($this->isContent()) return 7;
        $this->begin('preBlock');
    

    return 56;

break;
case 14:
    
        $this->popState();
        return 48;
    

break;
case 15:
    
        $this->begin('inlinePlugin');
    

    return 47;

break;
case 16:
    
        $this->popState();
        $this->begin('plugin');
        return 50;
    

break;
case 17:
    
        $this->begin('pluginStart');
        $this->stackPlugin($this->yy->text);
        return 49;
    

break;
case 18:
    
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 19:
    
        $name = end($this->pluginStack);
        if (substr($this->yy->text, 1, -1) == $name && $this->pluginStackCount > 0) {
            $this->popState();
            $this->pluginStackCount--;
            array_pop($this->pluginStack);
            return 51;
        }
    

    return 7;

break;
case 20:
    
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 21:
	
		$this->popState();
		$this->begin('block');
		return 56;
	

break;
case 22:
    
        //returns block end
        if ($this->isContent()) return 7;
        $this->popState();
    


    return 57;

break;
case 23:
    
        $this->popState();
        return 5;
    

break;
case 24:
    
        if ($this->isContent()) return 7;
        $this->begin('preBlock');
    

    return 55;

break;
case 25:
    
        $this->popState();
        if ($this->isContent()) return 7;
        $this->begin('preBlock');
    

    return 55;

break;
case 26:
    
        if ($this->isContent() || !empty($this->tableStack)) return 7;
    

    return 52;

break;
case 27:
    
        if ($this->isContent()) return 7;
    

    return 18;

break;
case 28:
    
        if ($this->isContent()) return 7;
    

    return 53;

break;
case 29:
    
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 30:
    
        if ($this->isContent()) return 7;
        $this->popState();
    

    return 20;

break;
case 31:
    
        if ($this->isContent()) return 7;
        $this->begin('bold');
    

    return 19;

break;
case 32:
    
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 33:
    
        if ($this->isContent()) return 7;
        $this->popState();
    

    return 22;

break;
case 34:
    
        if ($this->isContent()) return 7;
        $this->begin('box');
    

    return 21;

break;
case 35:
    
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 36:
    
        if ($this->isContent()) return 7;
        $this->popState();
    


    return 24;

break;
case 37:
    
        if ($this->isContent()) return 7;
        $this->begin('center');
    

    return 23;

break;
case 38:
    
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 39:
    
        if ($this->isContent()) return 7;
        $this->popState();
    

    return 26;

break;
case 40:
    
        if ($this->isContent()) return 7;
        $this->begin('code');
    

    return 25;

break;
case 41:
    
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 42:
    
        if ($this->isContent()) return 7;
        $this->popState();
    

    return 28;

break;
case 43:
    
        if ($this->isContent()) return 7;
        $this->begin('color');
    

    return 27;

break;
case 44:
    
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 45:
    
        if ($this->isContent()) return 7;
        $this->popState();
    

    return 30;

break;
case 46:
    
        if ($this->isContent()) return 7;
        $this->begin('italic');
    

    return 29;

break;
case 47:
    
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 48:
    
        if ($this->isContent(array('linkStack'))) return 7;
        $this->popState();
    

    return 32;

break;
case 49:
    
        if ($this->isContent()) return 7;
        $this->begin('unlink');
    

    return 31;

break;
case 50:
    
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 51:
    
        if ($this->isContent(array('linkStack'))) return 7;
        $this->linkStack = false;
        $this->popState();
    

    return 34;

break;
case 52:
    
        if ($this->isContent()) return 7;
        $this->linkStack = true;
        $this->begin('link');
        $this->yy->text = 'external';
    

    return 33;

break;
case 53:
    
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 54:
    
        if ($this->isContent()) return 7;
        $this->popState();
    

    return 36;

break;
case 55:
    
        if ($this->isContent()) return 7;
        $this->begin('strike');
    

    return 35;

break;
case 56:
    return 37;

break;
case 57:
    
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 58:
   
        if ($this->isContent()) return 7;
        $this->popState();
        array_pop($this->tableStack);
    

    return 39;

break;
case 59:
    
        if ($this->isContent()) return 7;
        $this->begin('table');
        $this->tableStack[] = true;
    

    return 38;

break;
case 60:
    
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 61:
    
        if ($this->isContent()) return 7;
        $this->popState();
    

    return 41;

break;
case 62:
    
        if ($this->isContent()) return 7;
        $this->begin('titleBar');
    

    return 40;

break;
case 63:
    
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 64:
    
        if ($this->isContent()) return 7;
        $this->popState();
    

    return 43;

break;
case 65:
    
        if ($this->isContent()) return 7;
        $this->begin('underscore');
    

    return 42;

break;
case 66:
    
        $this->conditionStackCount = 0;
        $this->conditionStack = array();
    

    return 5;

break;
case 67:
    
        if ($this->isContent(array('linkStack'))) return 7;
        $this->linkStack = false;
        $this->popState();
    

    return 45;

break;
case 68:
    
        if ($this->isContent()) return 7;
        $this->linkStack = true;
        $this->begin('wikiLink');
        $this->yy->text = array('type' => 'wiki', 'syntax' => $this->yy->text);
    

    return 44;

break;
case 69:
    
        if ($this->isContent()) return 7;
        $this->linkStack = true;
        $this->begin('wikiLink');
        $this->yy->text = array('type' => 'np', 'syntax' => $this->yy->text);
    

    return 44;

break;
case 70:
    
        if ($this->isContent()) return 7;
        $this->linkStack = true;
        $this->begin('wikiLink');
        $this->yy->text = array('syntax' => $this->yy->text, 'type' => substr($this->yy->text, 1, -1));
    

    return 44;

break;
case 71:
    
        if ($this->isContent()) return 7;
    

    return 46;

break;
case 72:
    return 54;

break;
case 73:
    
        if (Utilities\Html::isTag($this->yy->text)) {
            return 17;
        }
        $tag = $this->yy->text;
        $this->yy->text = $this->yy->text{0};
        $this->unput(substr($tag, 1));
        return 7;
    

break;
case 74:
break;
case 75:return 17;
break;
case 76:return 7;
break;
case 77:return 7;
break;
case 78:return 7;
break;
case 79:return 7;
break;
case 80:return 7;
break;
case 81:return 54;
break;
case 82:return 54;
break;
case 83:return 54;
break;
case 84:return 54;
break;
case 85:return 54;
break;
case 86:return 54;
break;
case 87:return 54;
break;
case 88:return 54;
break;
case 89:return 54;
break;
case 90:return 54;
break;
case 91:return 54;
break;
case 92:return 54;
break;
case 93:return 54;
break;
case 94:return 7;
break;
case 95:return 5;
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