<?php
/* Jison base parser */



class WikiLingo_Definition extends Jison_Base
{
	function __construct()
    {
        //Setup Parser
        
			$symbol0 = new Jison_ParserSymbol("accept", 0);
			$symbol1 = new Jison_ParserSymbol("end", 1);
			$symbol2 = new Jison_ParserSymbol("error", 2);
			$symbol3 = new Jison_ParserSymbol("wiki", 3);
			$symbol4 = new Jison_ParserSymbol("lines", 4);
			$symbol5 = new Jison_ParserSymbol("EOF", 5);
			$symbol6 = new Jison_ParserSymbol("line", 6);
			$symbol7 = new Jison_ParserSymbol("contents", 7);
			$symbol8 = new Jison_ParserSymbol("BLOCK_START", 8);
			$symbol9 = new Jison_ParserSymbol("BLOCK_END", 9);
			$symbol10 = new Jison_ParserSymbol("content", 10);
			$symbol11 = new Jison_ParserSymbol("CONTENT", 11);
			$symbol12 = new Jison_ParserSymbol("COMMENT", 12);
			$symbol13 = new Jison_ParserSymbol("NO_PARSE_START", 13);
			$symbol14 = new Jison_ParserSymbol("NO_PARSE_END", 14);
			$symbol15 = new Jison_ParserSymbol("PREFORMATTED_TEXT_START", 15);
			$symbol16 = new Jison_ParserSymbol("PREFORMATTED_TEXT_END", 16);
			$symbol17 = new Jison_ParserSymbol("DOUBLE_DYNAMIC_VAR", 17);
			$symbol18 = new Jison_ParserSymbol("SINGLE_DYNAMIC_VAR", 18);
			$symbol19 = new Jison_ParserSymbol("ARGUMENT_VAR", 19);
			$symbol20 = new Jison_ParserSymbol("HTML_TAG", 20);
			$symbol21 = new Jison_ParserSymbol("HORIZONTAL_BAR", 21);
			$symbol22 = new Jison_ParserSymbol("BOLD_START", 22);
			$symbol23 = new Jison_ParserSymbol("BOLD_END", 23);
			$symbol24 = new Jison_ParserSymbol("BOX_START", 24);
			$symbol25 = new Jison_ParserSymbol("BOX_END", 25);
			$symbol26 = new Jison_ParserSymbol("CENTER_START", 26);
			$symbol27 = new Jison_ParserSymbol("CENTER_END", 27);
			$symbol28 = new Jison_ParserSymbol("CODE_START", 28);
			$symbol29 = new Jison_ParserSymbol("CODE_END", 29);
			$symbol30 = new Jison_ParserSymbol("COLOR_START", 30);
			$symbol31 = new Jison_ParserSymbol("COLOR_END", 31);
			$symbol32 = new Jison_ParserSymbol("ITALIC_START", 32);
			$symbol33 = new Jison_ParserSymbol("ITALIC_END", 33);
			$symbol34 = new Jison_ParserSymbol("UNLINK_START", 34);
			$symbol35 = new Jison_ParserSymbol("UNLINK_END", 35);
			$symbol36 = new Jison_ParserSymbol("LINK_START", 36);
			$symbol37 = new Jison_ParserSymbol("LINK_END", 37);
			$symbol38 = new Jison_ParserSymbol("STRIKE_START", 38);
			$symbol39 = new Jison_ParserSymbol("STRIKE_END", 39);
			$symbol40 = new Jison_ParserSymbol("DOUBLE_DASH", 40);
			$symbol41 = new Jison_ParserSymbol("TABLE_START", 41);
			$symbol42 = new Jison_ParserSymbol("TABLE_END", 42);
			$symbol43 = new Jison_ParserSymbol("TITLE_BAR_START", 43);
			$symbol44 = new Jison_ParserSymbol("TITLE_BAR_END", 44);
			$symbol45 = new Jison_ParserSymbol("UNDERSCORE_START", 45);
			$symbol46 = new Jison_ParserSymbol("UNDERSCORE_END", 46);
			$symbol47 = new Jison_ParserSymbol("WIKI_LINK_START", 47);
			$symbol48 = new Jison_ParserSymbol("WIKI_LINK_END", 48);
			$symbol49 = new Jison_ParserSymbol("WIKI_LINK", 49);
			$symbol50 = new Jison_ParserSymbol("INLINE_PLUGIN_START", 50);
			$symbol51 = new Jison_ParserSymbol("INLINE_PLUGIN_PARAMETERS", 51);
			$symbol52 = new Jison_ParserSymbol("PLUGIN_START", 52);
			$symbol53 = new Jison_ParserSymbol("PLUGIN_PARAMETERS", 53);
			$symbol54 = new Jison_ParserSymbol("PLUGIN_END", 54);
			$symbol55 = new Jison_ParserSymbol("LINE_END", 55);
			$symbol56 = new Jison_ParserSymbol("FORCED_LINE_END", 56);
			$symbol57 = new Jison_ParserSymbol("CHAR", 57);
			$this->symbols[0] = $symbol0;
			$this->symbols["accept"] = $symbol0;
			$this->symbols[1] = $symbol1;
			$this->symbols["end"] = $symbol1;
			$this->symbols[2] = $symbol2;
			$this->symbols["error"] = $symbol2;
			$this->symbols[3] = $symbol3;
			$this->symbols["wiki"] = $symbol3;
			$this->symbols[4] = $symbol4;
			$this->symbols["lines"] = $symbol4;
			$this->symbols[5] = $symbol5;
			$this->symbols["EOF"] = $symbol5;
			$this->symbols[6] = $symbol6;
			$this->symbols["line"] = $symbol6;
			$this->symbols[7] = $symbol7;
			$this->symbols["contents"] = $symbol7;
			$this->symbols[8] = $symbol8;
			$this->symbols["BLOCK_START"] = $symbol8;
			$this->symbols[9] = $symbol9;
			$this->symbols["BLOCK_END"] = $symbol9;
			$this->symbols[10] = $symbol10;
			$this->symbols["content"] = $symbol10;
			$this->symbols[11] = $symbol11;
			$this->symbols["CONTENT"] = $symbol11;
			$this->symbols[12] = $symbol12;
			$this->symbols["COMMENT"] = $symbol12;
			$this->symbols[13] = $symbol13;
			$this->symbols["NO_PARSE_START"] = $symbol13;
			$this->symbols[14] = $symbol14;
			$this->symbols["NO_PARSE_END"] = $symbol14;
			$this->symbols[15] = $symbol15;
			$this->symbols["PREFORMATTED_TEXT_START"] = $symbol15;
			$this->symbols[16] = $symbol16;
			$this->symbols["PREFORMATTED_TEXT_END"] = $symbol16;
			$this->symbols[17] = $symbol17;
			$this->symbols["DOUBLE_DYNAMIC_VAR"] = $symbol17;
			$this->symbols[18] = $symbol18;
			$this->symbols["SINGLE_DYNAMIC_VAR"] = $symbol18;
			$this->symbols[19] = $symbol19;
			$this->symbols["ARGUMENT_VAR"] = $symbol19;
			$this->symbols[20] = $symbol20;
			$this->symbols["HTML_TAG"] = $symbol20;
			$this->symbols[21] = $symbol21;
			$this->symbols["HORIZONTAL_BAR"] = $symbol21;
			$this->symbols[22] = $symbol22;
			$this->symbols["BOLD_START"] = $symbol22;
			$this->symbols[23] = $symbol23;
			$this->symbols["BOLD_END"] = $symbol23;
			$this->symbols[24] = $symbol24;
			$this->symbols["BOX_START"] = $symbol24;
			$this->symbols[25] = $symbol25;
			$this->symbols["BOX_END"] = $symbol25;
			$this->symbols[26] = $symbol26;
			$this->symbols["CENTER_START"] = $symbol26;
			$this->symbols[27] = $symbol27;
			$this->symbols["CENTER_END"] = $symbol27;
			$this->symbols[28] = $symbol28;
			$this->symbols["CODE_START"] = $symbol28;
			$this->symbols[29] = $symbol29;
			$this->symbols["CODE_END"] = $symbol29;
			$this->symbols[30] = $symbol30;
			$this->symbols["COLOR_START"] = $symbol30;
			$this->symbols[31] = $symbol31;
			$this->symbols["COLOR_END"] = $symbol31;
			$this->symbols[32] = $symbol32;
			$this->symbols["ITALIC_START"] = $symbol32;
			$this->symbols[33] = $symbol33;
			$this->symbols["ITALIC_END"] = $symbol33;
			$this->symbols[34] = $symbol34;
			$this->symbols["UNLINK_START"] = $symbol34;
			$this->symbols[35] = $symbol35;
			$this->symbols["UNLINK_END"] = $symbol35;
			$this->symbols[36] = $symbol36;
			$this->symbols["LINK_START"] = $symbol36;
			$this->symbols[37] = $symbol37;
			$this->symbols["LINK_END"] = $symbol37;
			$this->symbols[38] = $symbol38;
			$this->symbols["STRIKE_START"] = $symbol38;
			$this->symbols[39] = $symbol39;
			$this->symbols["STRIKE_END"] = $symbol39;
			$this->symbols[40] = $symbol40;
			$this->symbols["DOUBLE_DASH"] = $symbol40;
			$this->symbols[41] = $symbol41;
			$this->symbols["TABLE_START"] = $symbol41;
			$this->symbols[42] = $symbol42;
			$this->symbols["TABLE_END"] = $symbol42;
			$this->symbols[43] = $symbol43;
			$this->symbols["TITLE_BAR_START"] = $symbol43;
			$this->symbols[44] = $symbol44;
			$this->symbols["TITLE_BAR_END"] = $symbol44;
			$this->symbols[45] = $symbol45;
			$this->symbols["UNDERSCORE_START"] = $symbol45;
			$this->symbols[46] = $symbol46;
			$this->symbols["UNDERSCORE_END"] = $symbol46;
			$this->symbols[47] = $symbol47;
			$this->symbols["WIKI_LINK_START"] = $symbol47;
			$this->symbols[48] = $symbol48;
			$this->symbols["WIKI_LINK_END"] = $symbol48;
			$this->symbols[49] = $symbol49;
			$this->symbols["WIKI_LINK"] = $symbol49;
			$this->symbols[50] = $symbol50;
			$this->symbols["INLINE_PLUGIN_START"] = $symbol50;
			$this->symbols[51] = $symbol51;
			$this->symbols["INLINE_PLUGIN_PARAMETERS"] = $symbol51;
			$this->symbols[52] = $symbol52;
			$this->symbols["PLUGIN_START"] = $symbol52;
			$this->symbols[53] = $symbol53;
			$this->symbols["PLUGIN_PARAMETERS"] = $symbol53;
			$this->symbols[54] = $symbol54;
			$this->symbols["PLUGIN_END"] = $symbol54;
			$this->symbols[55] = $symbol55;
			$this->symbols["LINE_END"] = $symbol55;
			$this->symbols[56] = $symbol56;
			$this->symbols["FORCED_LINE_END"] = $symbol56;
			$this->symbols[57] = $symbol57;
			$this->symbols["CHAR"] = $symbol57;

			$this->terminals = array(
					2=>&$symbol2,
					5=>&$symbol5,
					8=>&$symbol8,
					9=>&$symbol9,
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

			$table0 = new Jison_ParserState(0);
			$table1 = new Jison_ParserState(1);
			$table2 = new Jison_ParserState(2);
			$table3 = new Jison_ParserState(3);
			$table4 = new Jison_ParserState(4);
			$table5 = new Jison_ParserState(5);
			$table6 = new Jison_ParserState(6);
			$table7 = new Jison_ParserState(7);
			$table8 = new Jison_ParserState(8);
			$table9 = new Jison_ParserState(9);
			$table10 = new Jison_ParserState(10);
			$table11 = new Jison_ParserState(11);
			$table12 = new Jison_ParserState(12);
			$table13 = new Jison_ParserState(13);
			$table14 = new Jison_ParserState(14);
			$table15 = new Jison_ParserState(15);
			$table16 = new Jison_ParserState(16);
			$table17 = new Jison_ParserState(17);
			$table18 = new Jison_ParserState(18);
			$table19 = new Jison_ParserState(19);
			$table20 = new Jison_ParserState(20);
			$table21 = new Jison_ParserState(21);
			$table22 = new Jison_ParserState(22);
			$table23 = new Jison_ParserState(23);
			$table24 = new Jison_ParserState(24);
			$table25 = new Jison_ParserState(25);
			$table26 = new Jison_ParserState(26);
			$table27 = new Jison_ParserState(27);
			$table28 = new Jison_ParserState(28);
			$table29 = new Jison_ParserState(29);
			$table30 = new Jison_ParserState(30);
			$table31 = new Jison_ParserState(31);
			$table32 = new Jison_ParserState(32);
			$table33 = new Jison_ParserState(33);
			$table34 = new Jison_ParserState(34);
			$table35 = new Jison_ParserState(35);
			$table36 = new Jison_ParserState(36);
			$table37 = new Jison_ParserState(37);
			$table38 = new Jison_ParserState(38);
			$table39 = new Jison_ParserState(39);
			$table40 = new Jison_ParserState(40);
			$table41 = new Jison_ParserState(41);
			$table42 = new Jison_ParserState(42);
			$table43 = new Jison_ParserState(43);
			$table44 = new Jison_ParserState(44);
			$table45 = new Jison_ParserState(45);
			$table46 = new Jison_ParserState(46);
			$table47 = new Jison_ParserState(47);
			$table48 = new Jison_ParserState(48);
			$table49 = new Jison_ParserState(49);
			$table50 = new Jison_ParserState(50);
			$table51 = new Jison_ParserState(51);
			$table52 = new Jison_ParserState(52);
			$table53 = new Jison_ParserState(53);
			$table54 = new Jison_ParserState(54);
			$table55 = new Jison_ParserState(55);
			$table56 = new Jison_ParserState(56);
			$table57 = new Jison_ParserState(57);
			$table58 = new Jison_ParserState(58);
			$table59 = new Jison_ParserState(59);
			$table60 = new Jison_ParserState(60);
			$table61 = new Jison_ParserState(61);
			$table62 = new Jison_ParserState(62);
			$table63 = new Jison_ParserState(63);
			$table64 = new Jison_ParserState(64);
			$table65 = new Jison_ParserState(65);
			$table66 = new Jison_ParserState(66);
			$table67 = new Jison_ParserState(67);
			$table68 = new Jison_ParserState(68);
			$table69 = new Jison_ParserState(69);
			$table70 = new Jison_ParserState(70);
			$table71 = new Jison_ParserState(71);
			$table72 = new Jison_ParserState(72);
			$table73 = new Jison_ParserState(73);
			$table74 = new Jison_ParserState(74);
			$table75 = new Jison_ParserState(75);
			$table76 = new Jison_ParserState(76);
			$table77 = new Jison_ParserState(77);
			$table78 = new Jison_ParserState(78);
			$table79 = new Jison_ParserState(79);
			$table80 = new Jison_ParserState(80);
			$table81 = new Jison_ParserState(81);
			$table82 = new Jison_ParserState(82);
			$table83 = new Jison_ParserState(83);
			$table84 = new Jison_ParserState(84);
			$table85 = new Jison_ParserState(85);
			$table86 = new Jison_ParserState(86);
			$table87 = new Jison_ParserState(87);
			$table88 = new Jison_ParserState(88);
			$table89 = new Jison_ParserState(89);
			$table90 = new Jison_ParserState(90);
			$table91 = new Jison_ParserState(91);
			$table92 = new Jison_ParserState(92);

			$tableDefinition0 = array(
				
					3=>new Jison_ParserAction($this->none, $table1),
					4=>new Jison_ParserAction($this->none, $table2),
					5=>new Jison_ParserAction($this->shift, $table3),
					6=>new Jison_ParserAction($this->none, $table4),
					7=>new Jison_ParserAction($this->none, $table5),
					8=>new Jison_ParserAction($this->shift, $table6),
					10=>new Jison_ParserAction($this->none, $table7),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					15=>new Jison_ParserAction($this->shift, $table11),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					24=>new Jison_ParserAction($this->shift, $table18),
					26=>new Jison_ParserAction($this->shift, $table19),
					28=>new Jison_ParserAction($this->shift, $table20),
					30=>new Jison_ParserAction($this->shift, $table21),
					32=>new Jison_ParserAction($this->shift, $table22),
					34=>new Jison_ParserAction($this->shift, $table23),
					36=>new Jison_ParserAction($this->shift, $table24),
					38=>new Jison_ParserAction($this->shift, $table25),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					43=>new Jison_ParserAction($this->shift, $table28),
					45=>new Jison_ParserAction($this->shift, $table29),
					47=>new Jison_ParserAction($this->shift, $table30),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition1 = array(
				
					1=>new Jison_ParserAction($this->accept)
				);

			$tableDefinition2 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table1),
					5=>new Jison_ParserAction($this->shift, $table37),
					6=>new Jison_ParserAction($this->none, $table38),
					7=>new Jison_ParserAction($this->none, $table5),
					8=>new Jison_ParserAction($this->shift, $table6),
					10=>new Jison_ParserAction($this->none, $table7),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					15=>new Jison_ParserAction($this->shift, $table11),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					24=>new Jison_ParserAction($this->shift, $table18),
					26=>new Jison_ParserAction($this->shift, $table19),
					28=>new Jison_ParserAction($this->shift, $table20),
					30=>new Jison_ParserAction($this->shift, $table21),
					32=>new Jison_ParserAction($this->shift, $table22),
					34=>new Jison_ParserAction($this->shift, $table23),
					36=>new Jison_ParserAction($this->shift, $table24),
					38=>new Jison_ParserAction($this->shift, $table25),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					43=>new Jison_ParserAction($this->shift, $table28),
					45=>new Jison_ParserAction($this->shift, $table29),
					47=>new Jison_ParserAction($this->shift, $table30),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition3 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table3)
				);

			$tableDefinition4 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table4),
					5=>new Jison_ParserAction($this->reduce, $table4),
					8=>new Jison_ParserAction($this->reduce, $table4),
					11=>new Jison_ParserAction($this->reduce, $table4),
					12=>new Jison_ParserAction($this->reduce, $table4),
					13=>new Jison_ParserAction($this->reduce, $table4),
					15=>new Jison_ParserAction($this->reduce, $table4),
					17=>new Jison_ParserAction($this->reduce, $table4),
					18=>new Jison_ParserAction($this->reduce, $table4),
					19=>new Jison_ParserAction($this->reduce, $table4),
					20=>new Jison_ParserAction($this->reduce, $table4),
					21=>new Jison_ParserAction($this->reduce, $table4),
					22=>new Jison_ParserAction($this->reduce, $table4),
					24=>new Jison_ParserAction($this->reduce, $table4),
					26=>new Jison_ParserAction($this->reduce, $table4),
					28=>new Jison_ParserAction($this->reduce, $table4),
					30=>new Jison_ParserAction($this->reduce, $table4),
					32=>new Jison_ParserAction($this->reduce, $table4),
					34=>new Jison_ParserAction($this->reduce, $table4),
					36=>new Jison_ParserAction($this->reduce, $table4),
					38=>new Jison_ParserAction($this->reduce, $table4),
					40=>new Jison_ParserAction($this->reduce, $table4),
					41=>new Jison_ParserAction($this->reduce, $table4),
					43=>new Jison_ParserAction($this->reduce, $table4),
					45=>new Jison_ParserAction($this->reduce, $table4),
					47=>new Jison_ParserAction($this->reduce, $table4),
					49=>new Jison_ParserAction($this->reduce, $table4),
					50=>new Jison_ParserAction($this->reduce, $table4),
					52=>new Jison_ParserAction($this->reduce, $table4),
					55=>new Jison_ParserAction($this->reduce, $table4),
					56=>new Jison_ParserAction($this->reduce, $table4),
					57=>new Jison_ParserAction($this->reduce, $table4)
				);

			$tableDefinition5 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table6),
					5=>new Jison_ParserAction($this->reduce, $table6),
					8=>new Jison_ParserAction($this->reduce, $table6),
					10=>new Jison_ParserAction($this->none, $table39),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					15=>new Jison_ParserAction($this->shift, $table11),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					24=>new Jison_ParserAction($this->shift, $table18),
					26=>new Jison_ParserAction($this->shift, $table19),
					28=>new Jison_ParserAction($this->shift, $table20),
					30=>new Jison_ParserAction($this->shift, $table21),
					32=>new Jison_ParserAction($this->shift, $table22),
					34=>new Jison_ParserAction($this->shift, $table23),
					36=>new Jison_ParserAction($this->shift, $table24),
					38=>new Jison_ParserAction($this->shift, $table25),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					43=>new Jison_ParserAction($this->shift, $table28),
					45=>new Jison_ParserAction($this->shift, $table29),
					47=>new Jison_ParserAction($this->shift, $table30),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition6 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table9),
					5=>new Jison_ParserAction($this->reduce, $table9),
					7=>new Jison_ParserAction($this->none, $table41),
					8=>new Jison_ParserAction($this->reduce, $table9),
					9=>new Jison_ParserAction($this->shift, $table40),
					10=>new Jison_ParserAction($this->none, $table7),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					15=>new Jison_ParserAction($this->shift, $table11),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					24=>new Jison_ParserAction($this->shift, $table18),
					26=>new Jison_ParserAction($this->shift, $table19),
					28=>new Jison_ParserAction($this->shift, $table20),
					30=>new Jison_ParserAction($this->shift, $table21),
					32=>new Jison_ParserAction($this->shift, $table22),
					34=>new Jison_ParserAction($this->shift, $table23),
					36=>new Jison_ParserAction($this->shift, $table24),
					38=>new Jison_ParserAction($this->shift, $table25),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					43=>new Jison_ParserAction($this->shift, $table28),
					45=>new Jison_ParserAction($this->shift, $table29),
					47=>new Jison_ParserAction($this->shift, $table30),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition7 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table10),
					5=>new Jison_ParserAction($this->reduce, $table10),
					8=>new Jison_ParserAction($this->reduce, $table10),
					9=>new Jison_ParserAction($this->reduce, $table10),
					11=>new Jison_ParserAction($this->reduce, $table10),
					12=>new Jison_ParserAction($this->reduce, $table10),
					13=>new Jison_ParserAction($this->reduce, $table10),
					14=>new Jison_ParserAction($this->reduce, $table10),
					15=>new Jison_ParserAction($this->reduce, $table10),
					16=>new Jison_ParserAction($this->reduce, $table10),
					17=>new Jison_ParserAction($this->reduce, $table10),
					18=>new Jison_ParserAction($this->reduce, $table10),
					19=>new Jison_ParserAction($this->reduce, $table10),
					20=>new Jison_ParserAction($this->reduce, $table10),
					21=>new Jison_ParserAction($this->reduce, $table10),
					22=>new Jison_ParserAction($this->reduce, $table10),
					23=>new Jison_ParserAction($this->reduce, $table10),
					24=>new Jison_ParserAction($this->reduce, $table10),
					25=>new Jison_ParserAction($this->reduce, $table10),
					26=>new Jison_ParserAction($this->reduce, $table10),
					27=>new Jison_ParserAction($this->reduce, $table10),
					28=>new Jison_ParserAction($this->reduce, $table10),
					29=>new Jison_ParserAction($this->reduce, $table10),
					30=>new Jison_ParserAction($this->reduce, $table10),
					31=>new Jison_ParserAction($this->reduce, $table10),
					32=>new Jison_ParserAction($this->reduce, $table10),
					33=>new Jison_ParserAction($this->reduce, $table10),
					34=>new Jison_ParserAction($this->reduce, $table10),
					35=>new Jison_ParserAction($this->reduce, $table10),
					36=>new Jison_ParserAction($this->reduce, $table10),
					37=>new Jison_ParserAction($this->reduce, $table10),
					38=>new Jison_ParserAction($this->reduce, $table10),
					39=>new Jison_ParserAction($this->reduce, $table10),
					40=>new Jison_ParserAction($this->reduce, $table10),
					41=>new Jison_ParserAction($this->reduce, $table10),
					42=>new Jison_ParserAction($this->reduce, $table10),
					43=>new Jison_ParserAction($this->reduce, $table10),
					44=>new Jison_ParserAction($this->reduce, $table10),
					45=>new Jison_ParserAction($this->reduce, $table10),
					46=>new Jison_ParserAction($this->reduce, $table10),
					47=>new Jison_ParserAction($this->reduce, $table10),
					48=>new Jison_ParserAction($this->reduce, $table10),
					49=>new Jison_ParserAction($this->reduce, $table10),
					50=>new Jison_ParserAction($this->reduce, $table10),
					52=>new Jison_ParserAction($this->reduce, $table10),
					54=>new Jison_ParserAction($this->reduce, $table10),
					55=>new Jison_ParserAction($this->reduce, $table10),
					56=>new Jison_ParserAction($this->reduce, $table10),
					57=>new Jison_ParserAction($this->reduce, $table10)
				);

			$tableDefinition8 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table12),
					5=>new Jison_ParserAction($this->reduce, $table12),
					8=>new Jison_ParserAction($this->reduce, $table12),
					9=>new Jison_ParserAction($this->reduce, $table12),
					11=>new Jison_ParserAction($this->reduce, $table12),
					12=>new Jison_ParserAction($this->reduce, $table12),
					13=>new Jison_ParserAction($this->reduce, $table12),
					14=>new Jison_ParserAction($this->reduce, $table12),
					15=>new Jison_ParserAction($this->reduce, $table12),
					16=>new Jison_ParserAction($this->reduce, $table12),
					17=>new Jison_ParserAction($this->reduce, $table12),
					18=>new Jison_ParserAction($this->reduce, $table12),
					19=>new Jison_ParserAction($this->reduce, $table12),
					20=>new Jison_ParserAction($this->reduce, $table12),
					21=>new Jison_ParserAction($this->reduce, $table12),
					22=>new Jison_ParserAction($this->reduce, $table12),
					23=>new Jison_ParserAction($this->reduce, $table12),
					24=>new Jison_ParserAction($this->reduce, $table12),
					25=>new Jison_ParserAction($this->reduce, $table12),
					26=>new Jison_ParserAction($this->reduce, $table12),
					27=>new Jison_ParserAction($this->reduce, $table12),
					28=>new Jison_ParserAction($this->reduce, $table12),
					29=>new Jison_ParserAction($this->reduce, $table12),
					30=>new Jison_ParserAction($this->reduce, $table12),
					31=>new Jison_ParserAction($this->reduce, $table12),
					32=>new Jison_ParserAction($this->reduce, $table12),
					33=>new Jison_ParserAction($this->reduce, $table12),
					34=>new Jison_ParserAction($this->reduce, $table12),
					35=>new Jison_ParserAction($this->reduce, $table12),
					36=>new Jison_ParserAction($this->reduce, $table12),
					37=>new Jison_ParserAction($this->reduce, $table12),
					38=>new Jison_ParserAction($this->reduce, $table12),
					39=>new Jison_ParserAction($this->reduce, $table12),
					40=>new Jison_ParserAction($this->reduce, $table12),
					41=>new Jison_ParserAction($this->reduce, $table12),
					42=>new Jison_ParserAction($this->reduce, $table12),
					43=>new Jison_ParserAction($this->reduce, $table12),
					44=>new Jison_ParserAction($this->reduce, $table12),
					45=>new Jison_ParserAction($this->reduce, $table12),
					46=>new Jison_ParserAction($this->reduce, $table12),
					47=>new Jison_ParserAction($this->reduce, $table12),
					48=>new Jison_ParserAction($this->reduce, $table12),
					49=>new Jison_ParserAction($this->reduce, $table12),
					50=>new Jison_ParserAction($this->reduce, $table12),
					52=>new Jison_ParserAction($this->reduce, $table12),
					54=>new Jison_ParserAction($this->reduce, $table12),
					55=>new Jison_ParserAction($this->reduce, $table12),
					56=>new Jison_ParserAction($this->reduce, $table12),
					57=>new Jison_ParserAction($this->reduce, $table12)
				);

			$tableDefinition9 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table13),
					5=>new Jison_ParserAction($this->reduce, $table13),
					8=>new Jison_ParserAction($this->reduce, $table13),
					9=>new Jison_ParserAction($this->reduce, $table13),
					11=>new Jison_ParserAction($this->reduce, $table13),
					12=>new Jison_ParserAction($this->reduce, $table13),
					13=>new Jison_ParserAction($this->reduce, $table13),
					14=>new Jison_ParserAction($this->reduce, $table13),
					15=>new Jison_ParserAction($this->reduce, $table13),
					16=>new Jison_ParserAction($this->reduce, $table13),
					17=>new Jison_ParserAction($this->reduce, $table13),
					18=>new Jison_ParserAction($this->reduce, $table13),
					19=>new Jison_ParserAction($this->reduce, $table13),
					20=>new Jison_ParserAction($this->reduce, $table13),
					21=>new Jison_ParserAction($this->reduce, $table13),
					22=>new Jison_ParserAction($this->reduce, $table13),
					23=>new Jison_ParserAction($this->reduce, $table13),
					24=>new Jison_ParserAction($this->reduce, $table13),
					25=>new Jison_ParserAction($this->reduce, $table13),
					26=>new Jison_ParserAction($this->reduce, $table13),
					27=>new Jison_ParserAction($this->reduce, $table13),
					28=>new Jison_ParserAction($this->reduce, $table13),
					29=>new Jison_ParserAction($this->reduce, $table13),
					30=>new Jison_ParserAction($this->reduce, $table13),
					31=>new Jison_ParserAction($this->reduce, $table13),
					32=>new Jison_ParserAction($this->reduce, $table13),
					33=>new Jison_ParserAction($this->reduce, $table13),
					34=>new Jison_ParserAction($this->reduce, $table13),
					35=>new Jison_ParserAction($this->reduce, $table13),
					36=>new Jison_ParserAction($this->reduce, $table13),
					37=>new Jison_ParserAction($this->reduce, $table13),
					38=>new Jison_ParserAction($this->reduce, $table13),
					39=>new Jison_ParserAction($this->reduce, $table13),
					40=>new Jison_ParserAction($this->reduce, $table13),
					41=>new Jison_ParserAction($this->reduce, $table13),
					42=>new Jison_ParserAction($this->reduce, $table13),
					43=>new Jison_ParserAction($this->reduce, $table13),
					44=>new Jison_ParserAction($this->reduce, $table13),
					45=>new Jison_ParserAction($this->reduce, $table13),
					46=>new Jison_ParserAction($this->reduce, $table13),
					47=>new Jison_ParserAction($this->reduce, $table13),
					48=>new Jison_ParserAction($this->reduce, $table13),
					49=>new Jison_ParserAction($this->reduce, $table13),
					50=>new Jison_ParserAction($this->reduce, $table13),
					52=>new Jison_ParserAction($this->reduce, $table13),
					54=>new Jison_ParserAction($this->reduce, $table13),
					55=>new Jison_ParserAction($this->reduce, $table13),
					56=>new Jison_ParserAction($this->reduce, $table13),
					57=>new Jison_ParserAction($this->reduce, $table13)
				);

			$tableDefinition10 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table14),
					5=>new Jison_ParserAction($this->reduce, $table14),
					7=>new Jison_ParserAction($this->none, $table43),
					8=>new Jison_ParserAction($this->reduce, $table14),
					9=>new Jison_ParserAction($this->reduce, $table14),
					10=>new Jison_ParserAction($this->none, $table7),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					14=>new Jison_ParserAction($this->shift, $table42),
					15=>new Jison_ParserAction($this->shift, $table11),
					16=>new Jison_ParserAction($this->reduce, $table14),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					23=>new Jison_ParserAction($this->reduce, $table14),
					24=>new Jison_ParserAction($this->shift, $table18),
					25=>new Jison_ParserAction($this->reduce, $table14),
					26=>new Jison_ParserAction($this->shift, $table19),
					27=>new Jison_ParserAction($this->reduce, $table14),
					28=>new Jison_ParserAction($this->shift, $table20),
					29=>new Jison_ParserAction($this->reduce, $table14),
					30=>new Jison_ParserAction($this->shift, $table21),
					31=>new Jison_ParserAction($this->reduce, $table14),
					32=>new Jison_ParserAction($this->shift, $table22),
					33=>new Jison_ParserAction($this->reduce, $table14),
					34=>new Jison_ParserAction($this->shift, $table23),
					35=>new Jison_ParserAction($this->reduce, $table14),
					36=>new Jison_ParserAction($this->shift, $table24),
					37=>new Jison_ParserAction($this->reduce, $table14),
					38=>new Jison_ParserAction($this->shift, $table25),
					39=>new Jison_ParserAction($this->reduce, $table14),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					42=>new Jison_ParserAction($this->reduce, $table14),
					43=>new Jison_ParserAction($this->shift, $table28),
					44=>new Jison_ParserAction($this->reduce, $table14),
					45=>new Jison_ParserAction($this->shift, $table29),
					46=>new Jison_ParserAction($this->reduce, $table14),
					47=>new Jison_ParserAction($this->shift, $table30),
					48=>new Jison_ParserAction($this->reduce, $table14),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					54=>new Jison_ParserAction($this->reduce, $table14),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition11 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table17),
					5=>new Jison_ParserAction($this->reduce, $table17),
					7=>new Jison_ParserAction($this->none, $table45),
					8=>new Jison_ParserAction($this->reduce, $table17),
					9=>new Jison_ParserAction($this->reduce, $table17),
					10=>new Jison_ParserAction($this->none, $table7),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					14=>new Jison_ParserAction($this->reduce, $table17),
					15=>new Jison_ParserAction($this->shift, $table11),
					16=>new Jison_ParserAction($this->shift, $table44),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					23=>new Jison_ParserAction($this->reduce, $table17),
					24=>new Jison_ParserAction($this->shift, $table18),
					25=>new Jison_ParserAction($this->reduce, $table17),
					26=>new Jison_ParserAction($this->shift, $table19),
					27=>new Jison_ParserAction($this->reduce, $table17),
					28=>new Jison_ParserAction($this->shift, $table20),
					29=>new Jison_ParserAction($this->reduce, $table17),
					30=>new Jison_ParserAction($this->shift, $table21),
					31=>new Jison_ParserAction($this->reduce, $table17),
					32=>new Jison_ParserAction($this->shift, $table22),
					33=>new Jison_ParserAction($this->reduce, $table17),
					34=>new Jison_ParserAction($this->shift, $table23),
					35=>new Jison_ParserAction($this->reduce, $table17),
					36=>new Jison_ParserAction($this->shift, $table24),
					37=>new Jison_ParserAction($this->reduce, $table17),
					38=>new Jison_ParserAction($this->shift, $table25),
					39=>new Jison_ParserAction($this->reduce, $table17),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					42=>new Jison_ParserAction($this->reduce, $table17),
					43=>new Jison_ParserAction($this->shift, $table28),
					44=>new Jison_ParserAction($this->reduce, $table17),
					45=>new Jison_ParserAction($this->shift, $table29),
					46=>new Jison_ParserAction($this->reduce, $table17),
					47=>new Jison_ParserAction($this->shift, $table30),
					48=>new Jison_ParserAction($this->reduce, $table17),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					54=>new Jison_ParserAction($this->reduce, $table17),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition12 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table20),
					5=>new Jison_ParserAction($this->reduce, $table20),
					8=>new Jison_ParserAction($this->reduce, $table20),
					9=>new Jison_ParserAction($this->reduce, $table20),
					11=>new Jison_ParserAction($this->reduce, $table20),
					12=>new Jison_ParserAction($this->reduce, $table20),
					13=>new Jison_ParserAction($this->reduce, $table20),
					14=>new Jison_ParserAction($this->reduce, $table20),
					15=>new Jison_ParserAction($this->reduce, $table20),
					16=>new Jison_ParserAction($this->reduce, $table20),
					17=>new Jison_ParserAction($this->reduce, $table20),
					18=>new Jison_ParserAction($this->reduce, $table20),
					19=>new Jison_ParserAction($this->reduce, $table20),
					20=>new Jison_ParserAction($this->reduce, $table20),
					21=>new Jison_ParserAction($this->reduce, $table20),
					22=>new Jison_ParserAction($this->reduce, $table20),
					23=>new Jison_ParserAction($this->reduce, $table20),
					24=>new Jison_ParserAction($this->reduce, $table20),
					25=>new Jison_ParserAction($this->reduce, $table20),
					26=>new Jison_ParserAction($this->reduce, $table20),
					27=>new Jison_ParserAction($this->reduce, $table20),
					28=>new Jison_ParserAction($this->reduce, $table20),
					29=>new Jison_ParserAction($this->reduce, $table20),
					30=>new Jison_ParserAction($this->reduce, $table20),
					31=>new Jison_ParserAction($this->reduce, $table20),
					32=>new Jison_ParserAction($this->reduce, $table20),
					33=>new Jison_ParserAction($this->reduce, $table20),
					34=>new Jison_ParserAction($this->reduce, $table20),
					35=>new Jison_ParserAction($this->reduce, $table20),
					36=>new Jison_ParserAction($this->reduce, $table20),
					37=>new Jison_ParserAction($this->reduce, $table20),
					38=>new Jison_ParserAction($this->reduce, $table20),
					39=>new Jison_ParserAction($this->reduce, $table20),
					40=>new Jison_ParserAction($this->reduce, $table20),
					41=>new Jison_ParserAction($this->reduce, $table20),
					42=>new Jison_ParserAction($this->reduce, $table20),
					43=>new Jison_ParserAction($this->reduce, $table20),
					44=>new Jison_ParserAction($this->reduce, $table20),
					45=>new Jison_ParserAction($this->reduce, $table20),
					46=>new Jison_ParserAction($this->reduce, $table20),
					47=>new Jison_ParserAction($this->reduce, $table20),
					48=>new Jison_ParserAction($this->reduce, $table20),
					49=>new Jison_ParserAction($this->reduce, $table20),
					50=>new Jison_ParserAction($this->reduce, $table20),
					52=>new Jison_ParserAction($this->reduce, $table20),
					54=>new Jison_ParserAction($this->reduce, $table20),
					55=>new Jison_ParserAction($this->reduce, $table20),
					56=>new Jison_ParserAction($this->reduce, $table20),
					57=>new Jison_ParserAction($this->reduce, $table20)
				);

			$tableDefinition13 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table21),
					5=>new Jison_ParserAction($this->reduce, $table21),
					8=>new Jison_ParserAction($this->reduce, $table21),
					9=>new Jison_ParserAction($this->reduce, $table21),
					11=>new Jison_ParserAction($this->reduce, $table21),
					12=>new Jison_ParserAction($this->reduce, $table21),
					13=>new Jison_ParserAction($this->reduce, $table21),
					14=>new Jison_ParserAction($this->reduce, $table21),
					15=>new Jison_ParserAction($this->reduce, $table21),
					16=>new Jison_ParserAction($this->reduce, $table21),
					17=>new Jison_ParserAction($this->reduce, $table21),
					18=>new Jison_ParserAction($this->reduce, $table21),
					19=>new Jison_ParserAction($this->reduce, $table21),
					20=>new Jison_ParserAction($this->reduce, $table21),
					21=>new Jison_ParserAction($this->reduce, $table21),
					22=>new Jison_ParserAction($this->reduce, $table21),
					23=>new Jison_ParserAction($this->reduce, $table21),
					24=>new Jison_ParserAction($this->reduce, $table21),
					25=>new Jison_ParserAction($this->reduce, $table21),
					26=>new Jison_ParserAction($this->reduce, $table21),
					27=>new Jison_ParserAction($this->reduce, $table21),
					28=>new Jison_ParserAction($this->reduce, $table21),
					29=>new Jison_ParserAction($this->reduce, $table21),
					30=>new Jison_ParserAction($this->reduce, $table21),
					31=>new Jison_ParserAction($this->reduce, $table21),
					32=>new Jison_ParserAction($this->reduce, $table21),
					33=>new Jison_ParserAction($this->reduce, $table21),
					34=>new Jison_ParserAction($this->reduce, $table21),
					35=>new Jison_ParserAction($this->reduce, $table21),
					36=>new Jison_ParserAction($this->reduce, $table21),
					37=>new Jison_ParserAction($this->reduce, $table21),
					38=>new Jison_ParserAction($this->reduce, $table21),
					39=>new Jison_ParserAction($this->reduce, $table21),
					40=>new Jison_ParserAction($this->reduce, $table21),
					41=>new Jison_ParserAction($this->reduce, $table21),
					42=>new Jison_ParserAction($this->reduce, $table21),
					43=>new Jison_ParserAction($this->reduce, $table21),
					44=>new Jison_ParserAction($this->reduce, $table21),
					45=>new Jison_ParserAction($this->reduce, $table21),
					46=>new Jison_ParserAction($this->reduce, $table21),
					47=>new Jison_ParserAction($this->reduce, $table21),
					48=>new Jison_ParserAction($this->reduce, $table21),
					49=>new Jison_ParserAction($this->reduce, $table21),
					50=>new Jison_ParserAction($this->reduce, $table21),
					52=>new Jison_ParserAction($this->reduce, $table21),
					54=>new Jison_ParserAction($this->reduce, $table21),
					55=>new Jison_ParserAction($this->reduce, $table21),
					56=>new Jison_ParserAction($this->reduce, $table21),
					57=>new Jison_ParserAction($this->reduce, $table21)
				);

			$tableDefinition14 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table22),
					5=>new Jison_ParserAction($this->reduce, $table22),
					8=>new Jison_ParserAction($this->reduce, $table22),
					9=>new Jison_ParserAction($this->reduce, $table22),
					11=>new Jison_ParserAction($this->reduce, $table22),
					12=>new Jison_ParserAction($this->reduce, $table22),
					13=>new Jison_ParserAction($this->reduce, $table22),
					14=>new Jison_ParserAction($this->reduce, $table22),
					15=>new Jison_ParserAction($this->reduce, $table22),
					16=>new Jison_ParserAction($this->reduce, $table22),
					17=>new Jison_ParserAction($this->reduce, $table22),
					18=>new Jison_ParserAction($this->reduce, $table22),
					19=>new Jison_ParserAction($this->reduce, $table22),
					20=>new Jison_ParserAction($this->reduce, $table22),
					21=>new Jison_ParserAction($this->reduce, $table22),
					22=>new Jison_ParserAction($this->reduce, $table22),
					23=>new Jison_ParserAction($this->reduce, $table22),
					24=>new Jison_ParserAction($this->reduce, $table22),
					25=>new Jison_ParserAction($this->reduce, $table22),
					26=>new Jison_ParserAction($this->reduce, $table22),
					27=>new Jison_ParserAction($this->reduce, $table22),
					28=>new Jison_ParserAction($this->reduce, $table22),
					29=>new Jison_ParserAction($this->reduce, $table22),
					30=>new Jison_ParserAction($this->reduce, $table22),
					31=>new Jison_ParserAction($this->reduce, $table22),
					32=>new Jison_ParserAction($this->reduce, $table22),
					33=>new Jison_ParserAction($this->reduce, $table22),
					34=>new Jison_ParserAction($this->reduce, $table22),
					35=>new Jison_ParserAction($this->reduce, $table22),
					36=>new Jison_ParserAction($this->reduce, $table22),
					37=>new Jison_ParserAction($this->reduce, $table22),
					38=>new Jison_ParserAction($this->reduce, $table22),
					39=>new Jison_ParserAction($this->reduce, $table22),
					40=>new Jison_ParserAction($this->reduce, $table22),
					41=>new Jison_ParserAction($this->reduce, $table22),
					42=>new Jison_ParserAction($this->reduce, $table22),
					43=>new Jison_ParserAction($this->reduce, $table22),
					44=>new Jison_ParserAction($this->reduce, $table22),
					45=>new Jison_ParserAction($this->reduce, $table22),
					46=>new Jison_ParserAction($this->reduce, $table22),
					47=>new Jison_ParserAction($this->reduce, $table22),
					48=>new Jison_ParserAction($this->reduce, $table22),
					49=>new Jison_ParserAction($this->reduce, $table22),
					50=>new Jison_ParserAction($this->reduce, $table22),
					52=>new Jison_ParserAction($this->reduce, $table22),
					54=>new Jison_ParserAction($this->reduce, $table22),
					55=>new Jison_ParserAction($this->reduce, $table22),
					56=>new Jison_ParserAction($this->reduce, $table22),
					57=>new Jison_ParserAction($this->reduce, $table22)
				);

			$tableDefinition15 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table23),
					5=>new Jison_ParserAction($this->reduce, $table23),
					8=>new Jison_ParserAction($this->reduce, $table23),
					9=>new Jison_ParserAction($this->reduce, $table23),
					11=>new Jison_ParserAction($this->reduce, $table23),
					12=>new Jison_ParserAction($this->reduce, $table23),
					13=>new Jison_ParserAction($this->reduce, $table23),
					14=>new Jison_ParserAction($this->reduce, $table23),
					15=>new Jison_ParserAction($this->reduce, $table23),
					16=>new Jison_ParserAction($this->reduce, $table23),
					17=>new Jison_ParserAction($this->reduce, $table23),
					18=>new Jison_ParserAction($this->reduce, $table23),
					19=>new Jison_ParserAction($this->reduce, $table23),
					20=>new Jison_ParserAction($this->reduce, $table23),
					21=>new Jison_ParserAction($this->reduce, $table23),
					22=>new Jison_ParserAction($this->reduce, $table23),
					23=>new Jison_ParserAction($this->reduce, $table23),
					24=>new Jison_ParserAction($this->reduce, $table23),
					25=>new Jison_ParserAction($this->reduce, $table23),
					26=>new Jison_ParserAction($this->reduce, $table23),
					27=>new Jison_ParserAction($this->reduce, $table23),
					28=>new Jison_ParserAction($this->reduce, $table23),
					29=>new Jison_ParserAction($this->reduce, $table23),
					30=>new Jison_ParserAction($this->reduce, $table23),
					31=>new Jison_ParserAction($this->reduce, $table23),
					32=>new Jison_ParserAction($this->reduce, $table23),
					33=>new Jison_ParserAction($this->reduce, $table23),
					34=>new Jison_ParserAction($this->reduce, $table23),
					35=>new Jison_ParserAction($this->reduce, $table23),
					36=>new Jison_ParserAction($this->reduce, $table23),
					37=>new Jison_ParserAction($this->reduce, $table23),
					38=>new Jison_ParserAction($this->reduce, $table23),
					39=>new Jison_ParserAction($this->reduce, $table23),
					40=>new Jison_ParserAction($this->reduce, $table23),
					41=>new Jison_ParserAction($this->reduce, $table23),
					42=>new Jison_ParserAction($this->reduce, $table23),
					43=>new Jison_ParserAction($this->reduce, $table23),
					44=>new Jison_ParserAction($this->reduce, $table23),
					45=>new Jison_ParserAction($this->reduce, $table23),
					46=>new Jison_ParserAction($this->reduce, $table23),
					47=>new Jison_ParserAction($this->reduce, $table23),
					48=>new Jison_ParserAction($this->reduce, $table23),
					49=>new Jison_ParserAction($this->reduce, $table23),
					50=>new Jison_ParserAction($this->reduce, $table23),
					52=>new Jison_ParserAction($this->reduce, $table23),
					54=>new Jison_ParserAction($this->reduce, $table23),
					55=>new Jison_ParserAction($this->reduce, $table23),
					56=>new Jison_ParserAction($this->reduce, $table23),
					57=>new Jison_ParserAction($this->reduce, $table23)
				);

			$tableDefinition16 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table24),
					5=>new Jison_ParserAction($this->reduce, $table24),
					8=>new Jison_ParserAction($this->reduce, $table24),
					9=>new Jison_ParserAction($this->reduce, $table24),
					11=>new Jison_ParserAction($this->reduce, $table24),
					12=>new Jison_ParserAction($this->reduce, $table24),
					13=>new Jison_ParserAction($this->reduce, $table24),
					14=>new Jison_ParserAction($this->reduce, $table24),
					15=>new Jison_ParserAction($this->reduce, $table24),
					16=>new Jison_ParserAction($this->reduce, $table24),
					17=>new Jison_ParserAction($this->reduce, $table24),
					18=>new Jison_ParserAction($this->reduce, $table24),
					19=>new Jison_ParserAction($this->reduce, $table24),
					20=>new Jison_ParserAction($this->reduce, $table24),
					21=>new Jison_ParserAction($this->reduce, $table24),
					22=>new Jison_ParserAction($this->reduce, $table24),
					23=>new Jison_ParserAction($this->reduce, $table24),
					24=>new Jison_ParserAction($this->reduce, $table24),
					25=>new Jison_ParserAction($this->reduce, $table24),
					26=>new Jison_ParserAction($this->reduce, $table24),
					27=>new Jison_ParserAction($this->reduce, $table24),
					28=>new Jison_ParserAction($this->reduce, $table24),
					29=>new Jison_ParserAction($this->reduce, $table24),
					30=>new Jison_ParserAction($this->reduce, $table24),
					31=>new Jison_ParserAction($this->reduce, $table24),
					32=>new Jison_ParserAction($this->reduce, $table24),
					33=>new Jison_ParserAction($this->reduce, $table24),
					34=>new Jison_ParserAction($this->reduce, $table24),
					35=>new Jison_ParserAction($this->reduce, $table24),
					36=>new Jison_ParserAction($this->reduce, $table24),
					37=>new Jison_ParserAction($this->reduce, $table24),
					38=>new Jison_ParserAction($this->reduce, $table24),
					39=>new Jison_ParserAction($this->reduce, $table24),
					40=>new Jison_ParserAction($this->reduce, $table24),
					41=>new Jison_ParserAction($this->reduce, $table24),
					42=>new Jison_ParserAction($this->reduce, $table24),
					43=>new Jison_ParserAction($this->reduce, $table24),
					44=>new Jison_ParserAction($this->reduce, $table24),
					45=>new Jison_ParserAction($this->reduce, $table24),
					46=>new Jison_ParserAction($this->reduce, $table24),
					47=>new Jison_ParserAction($this->reduce, $table24),
					48=>new Jison_ParserAction($this->reduce, $table24),
					49=>new Jison_ParserAction($this->reduce, $table24),
					50=>new Jison_ParserAction($this->reduce, $table24),
					52=>new Jison_ParserAction($this->reduce, $table24),
					54=>new Jison_ParserAction($this->reduce, $table24),
					55=>new Jison_ParserAction($this->reduce, $table24),
					56=>new Jison_ParserAction($this->reduce, $table24),
					57=>new Jison_ParserAction($this->reduce, $table24)
				);

			$tableDefinition17 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table25),
					5=>new Jison_ParserAction($this->reduce, $table25),
					7=>new Jison_ParserAction($this->none, $table47),
					8=>new Jison_ParserAction($this->reduce, $table25),
					9=>new Jison_ParserAction($this->reduce, $table25),
					10=>new Jison_ParserAction($this->none, $table7),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					14=>new Jison_ParserAction($this->reduce, $table25),
					15=>new Jison_ParserAction($this->shift, $table11),
					16=>new Jison_ParserAction($this->reduce, $table25),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					23=>new Jison_ParserAction($this->shift, $table46),
					24=>new Jison_ParserAction($this->shift, $table18),
					25=>new Jison_ParserAction($this->reduce, $table25),
					26=>new Jison_ParserAction($this->shift, $table19),
					27=>new Jison_ParserAction($this->reduce, $table25),
					28=>new Jison_ParserAction($this->shift, $table20),
					29=>new Jison_ParserAction($this->reduce, $table25),
					30=>new Jison_ParserAction($this->shift, $table21),
					31=>new Jison_ParserAction($this->reduce, $table25),
					32=>new Jison_ParserAction($this->shift, $table22),
					33=>new Jison_ParserAction($this->reduce, $table25),
					34=>new Jison_ParserAction($this->shift, $table23),
					35=>new Jison_ParserAction($this->reduce, $table25),
					36=>new Jison_ParserAction($this->shift, $table24),
					37=>new Jison_ParserAction($this->reduce, $table25),
					38=>new Jison_ParserAction($this->shift, $table25),
					39=>new Jison_ParserAction($this->reduce, $table25),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					42=>new Jison_ParserAction($this->reduce, $table25),
					43=>new Jison_ParserAction($this->shift, $table28),
					44=>new Jison_ParserAction($this->reduce, $table25),
					45=>new Jison_ParserAction($this->shift, $table29),
					46=>new Jison_ParserAction($this->reduce, $table25),
					47=>new Jison_ParserAction($this->shift, $table30),
					48=>new Jison_ParserAction($this->reduce, $table25),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					54=>new Jison_ParserAction($this->reduce, $table25),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition18 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table28),
					5=>new Jison_ParserAction($this->reduce, $table28),
					7=>new Jison_ParserAction($this->none, $table49),
					8=>new Jison_ParserAction($this->reduce, $table28),
					9=>new Jison_ParserAction($this->reduce, $table28),
					10=>new Jison_ParserAction($this->none, $table7),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					14=>new Jison_ParserAction($this->reduce, $table28),
					15=>new Jison_ParserAction($this->shift, $table11),
					16=>new Jison_ParserAction($this->reduce, $table28),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					23=>new Jison_ParserAction($this->reduce, $table28),
					24=>new Jison_ParserAction($this->shift, $table18),
					25=>new Jison_ParserAction($this->shift, $table48),
					26=>new Jison_ParserAction($this->shift, $table19),
					27=>new Jison_ParserAction($this->reduce, $table28),
					28=>new Jison_ParserAction($this->shift, $table20),
					29=>new Jison_ParserAction($this->reduce, $table28),
					30=>new Jison_ParserAction($this->shift, $table21),
					31=>new Jison_ParserAction($this->reduce, $table28),
					32=>new Jison_ParserAction($this->shift, $table22),
					33=>new Jison_ParserAction($this->reduce, $table28),
					34=>new Jison_ParserAction($this->shift, $table23),
					35=>new Jison_ParserAction($this->reduce, $table28),
					36=>new Jison_ParserAction($this->shift, $table24),
					37=>new Jison_ParserAction($this->reduce, $table28),
					38=>new Jison_ParserAction($this->shift, $table25),
					39=>new Jison_ParserAction($this->reduce, $table28),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					42=>new Jison_ParserAction($this->reduce, $table28),
					43=>new Jison_ParserAction($this->shift, $table28),
					44=>new Jison_ParserAction($this->reduce, $table28),
					45=>new Jison_ParserAction($this->shift, $table29),
					46=>new Jison_ParserAction($this->reduce, $table28),
					47=>new Jison_ParserAction($this->shift, $table30),
					48=>new Jison_ParserAction($this->reduce, $table28),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					54=>new Jison_ParserAction($this->reduce, $table28),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition19 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table31),
					5=>new Jison_ParserAction($this->reduce, $table31),
					7=>new Jison_ParserAction($this->none, $table51),
					8=>new Jison_ParserAction($this->reduce, $table31),
					9=>new Jison_ParserAction($this->reduce, $table31),
					10=>new Jison_ParserAction($this->none, $table7),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					14=>new Jison_ParserAction($this->reduce, $table31),
					15=>new Jison_ParserAction($this->shift, $table11),
					16=>new Jison_ParserAction($this->reduce, $table31),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					23=>new Jison_ParserAction($this->reduce, $table31),
					24=>new Jison_ParserAction($this->shift, $table18),
					25=>new Jison_ParserAction($this->reduce, $table31),
					26=>new Jison_ParserAction($this->shift, $table19),
					27=>new Jison_ParserAction($this->shift, $table50),
					28=>new Jison_ParserAction($this->shift, $table20),
					29=>new Jison_ParserAction($this->reduce, $table31),
					30=>new Jison_ParserAction($this->shift, $table21),
					31=>new Jison_ParserAction($this->reduce, $table31),
					32=>new Jison_ParserAction($this->shift, $table22),
					33=>new Jison_ParserAction($this->reduce, $table31),
					34=>new Jison_ParserAction($this->shift, $table23),
					35=>new Jison_ParserAction($this->reduce, $table31),
					36=>new Jison_ParserAction($this->shift, $table24),
					37=>new Jison_ParserAction($this->reduce, $table31),
					38=>new Jison_ParserAction($this->shift, $table25),
					39=>new Jison_ParserAction($this->reduce, $table31),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					42=>new Jison_ParserAction($this->reduce, $table31),
					43=>new Jison_ParserAction($this->shift, $table28),
					44=>new Jison_ParserAction($this->reduce, $table31),
					45=>new Jison_ParserAction($this->shift, $table29),
					46=>new Jison_ParserAction($this->reduce, $table31),
					47=>new Jison_ParserAction($this->shift, $table30),
					48=>new Jison_ParserAction($this->reduce, $table31),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					54=>new Jison_ParserAction($this->reduce, $table31),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition20 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table34),
					5=>new Jison_ParserAction($this->reduce, $table34),
					7=>new Jison_ParserAction($this->none, $table53),
					8=>new Jison_ParserAction($this->reduce, $table34),
					9=>new Jison_ParserAction($this->reduce, $table34),
					10=>new Jison_ParserAction($this->none, $table7),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					14=>new Jison_ParserAction($this->reduce, $table34),
					15=>new Jison_ParserAction($this->shift, $table11),
					16=>new Jison_ParserAction($this->reduce, $table34),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					23=>new Jison_ParserAction($this->reduce, $table34),
					24=>new Jison_ParserAction($this->shift, $table18),
					25=>new Jison_ParserAction($this->reduce, $table34),
					26=>new Jison_ParserAction($this->shift, $table19),
					27=>new Jison_ParserAction($this->reduce, $table34),
					28=>new Jison_ParserAction($this->shift, $table20),
					29=>new Jison_ParserAction($this->shift, $table52),
					30=>new Jison_ParserAction($this->shift, $table21),
					31=>new Jison_ParserAction($this->reduce, $table34),
					32=>new Jison_ParserAction($this->shift, $table22),
					33=>new Jison_ParserAction($this->reduce, $table34),
					34=>new Jison_ParserAction($this->shift, $table23),
					35=>new Jison_ParserAction($this->reduce, $table34),
					36=>new Jison_ParserAction($this->shift, $table24),
					37=>new Jison_ParserAction($this->reduce, $table34),
					38=>new Jison_ParserAction($this->shift, $table25),
					39=>new Jison_ParserAction($this->reduce, $table34),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					42=>new Jison_ParserAction($this->reduce, $table34),
					43=>new Jison_ParserAction($this->shift, $table28),
					44=>new Jison_ParserAction($this->reduce, $table34),
					45=>new Jison_ParserAction($this->shift, $table29),
					46=>new Jison_ParserAction($this->reduce, $table34),
					47=>new Jison_ParserAction($this->shift, $table30),
					48=>new Jison_ParserAction($this->reduce, $table34),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					54=>new Jison_ParserAction($this->reduce, $table34),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition21 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table37),
					5=>new Jison_ParserAction($this->reduce, $table37),
					7=>new Jison_ParserAction($this->none, $table55),
					8=>new Jison_ParserAction($this->reduce, $table37),
					9=>new Jison_ParserAction($this->reduce, $table37),
					10=>new Jison_ParserAction($this->none, $table7),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					14=>new Jison_ParserAction($this->reduce, $table37),
					15=>new Jison_ParserAction($this->shift, $table11),
					16=>new Jison_ParserAction($this->reduce, $table37),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					23=>new Jison_ParserAction($this->reduce, $table37),
					24=>new Jison_ParserAction($this->shift, $table18),
					25=>new Jison_ParserAction($this->reduce, $table37),
					26=>new Jison_ParserAction($this->shift, $table19),
					27=>new Jison_ParserAction($this->reduce, $table37),
					28=>new Jison_ParserAction($this->shift, $table20),
					29=>new Jison_ParserAction($this->reduce, $table37),
					30=>new Jison_ParserAction($this->shift, $table21),
					31=>new Jison_ParserAction($this->shift, $table54),
					32=>new Jison_ParserAction($this->shift, $table22),
					33=>new Jison_ParserAction($this->reduce, $table37),
					34=>new Jison_ParserAction($this->shift, $table23),
					35=>new Jison_ParserAction($this->reduce, $table37),
					36=>new Jison_ParserAction($this->shift, $table24),
					37=>new Jison_ParserAction($this->reduce, $table37),
					38=>new Jison_ParserAction($this->shift, $table25),
					39=>new Jison_ParserAction($this->reduce, $table37),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					42=>new Jison_ParserAction($this->reduce, $table37),
					43=>new Jison_ParserAction($this->shift, $table28),
					44=>new Jison_ParserAction($this->reduce, $table37),
					45=>new Jison_ParserAction($this->shift, $table29),
					46=>new Jison_ParserAction($this->reduce, $table37),
					47=>new Jison_ParserAction($this->shift, $table30),
					48=>new Jison_ParserAction($this->reduce, $table37),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					54=>new Jison_ParserAction($this->reduce, $table37),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition22 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table40),
					5=>new Jison_ParserAction($this->reduce, $table40),
					7=>new Jison_ParserAction($this->none, $table57),
					8=>new Jison_ParserAction($this->reduce, $table40),
					9=>new Jison_ParserAction($this->reduce, $table40),
					10=>new Jison_ParserAction($this->none, $table7),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					14=>new Jison_ParserAction($this->reduce, $table40),
					15=>new Jison_ParserAction($this->shift, $table11),
					16=>new Jison_ParserAction($this->reduce, $table40),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					23=>new Jison_ParserAction($this->reduce, $table40),
					24=>new Jison_ParserAction($this->shift, $table18),
					25=>new Jison_ParserAction($this->reduce, $table40),
					26=>new Jison_ParserAction($this->shift, $table19),
					27=>new Jison_ParserAction($this->reduce, $table40),
					28=>new Jison_ParserAction($this->shift, $table20),
					29=>new Jison_ParserAction($this->reduce, $table40),
					30=>new Jison_ParserAction($this->shift, $table21),
					31=>new Jison_ParserAction($this->reduce, $table40),
					32=>new Jison_ParserAction($this->shift, $table22),
					33=>new Jison_ParserAction($this->shift, $table56),
					34=>new Jison_ParserAction($this->shift, $table23),
					35=>new Jison_ParserAction($this->reduce, $table40),
					36=>new Jison_ParserAction($this->shift, $table24),
					37=>new Jison_ParserAction($this->reduce, $table40),
					38=>new Jison_ParserAction($this->shift, $table25),
					39=>new Jison_ParserAction($this->reduce, $table40),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					42=>new Jison_ParserAction($this->reduce, $table40),
					43=>new Jison_ParserAction($this->shift, $table28),
					44=>new Jison_ParserAction($this->reduce, $table40),
					45=>new Jison_ParserAction($this->shift, $table29),
					46=>new Jison_ParserAction($this->reduce, $table40),
					47=>new Jison_ParserAction($this->shift, $table30),
					48=>new Jison_ParserAction($this->reduce, $table40),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					54=>new Jison_ParserAction($this->reduce, $table40),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition23 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table43),
					5=>new Jison_ParserAction($this->reduce, $table43),
					7=>new Jison_ParserAction($this->none, $table59),
					8=>new Jison_ParserAction($this->reduce, $table43),
					9=>new Jison_ParserAction($this->reduce, $table43),
					10=>new Jison_ParserAction($this->none, $table7),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					14=>new Jison_ParserAction($this->reduce, $table43),
					15=>new Jison_ParserAction($this->shift, $table11),
					16=>new Jison_ParserAction($this->reduce, $table43),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					23=>new Jison_ParserAction($this->reduce, $table43),
					24=>new Jison_ParserAction($this->shift, $table18),
					25=>new Jison_ParserAction($this->reduce, $table43),
					26=>new Jison_ParserAction($this->shift, $table19),
					27=>new Jison_ParserAction($this->reduce, $table43),
					28=>new Jison_ParserAction($this->shift, $table20),
					29=>new Jison_ParserAction($this->reduce, $table43),
					30=>new Jison_ParserAction($this->shift, $table21),
					31=>new Jison_ParserAction($this->reduce, $table43),
					32=>new Jison_ParserAction($this->shift, $table22),
					33=>new Jison_ParserAction($this->reduce, $table43),
					34=>new Jison_ParserAction($this->shift, $table23),
					35=>new Jison_ParserAction($this->shift, $table58),
					36=>new Jison_ParserAction($this->shift, $table24),
					37=>new Jison_ParserAction($this->reduce, $table43),
					38=>new Jison_ParserAction($this->shift, $table25),
					39=>new Jison_ParserAction($this->reduce, $table43),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					42=>new Jison_ParserAction($this->reduce, $table43),
					43=>new Jison_ParserAction($this->shift, $table28),
					44=>new Jison_ParserAction($this->reduce, $table43),
					45=>new Jison_ParserAction($this->shift, $table29),
					46=>new Jison_ParserAction($this->reduce, $table43),
					47=>new Jison_ParserAction($this->shift, $table30),
					48=>new Jison_ParserAction($this->reduce, $table43),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					54=>new Jison_ParserAction($this->reduce, $table43),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition24 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table46),
					5=>new Jison_ParserAction($this->reduce, $table46),
					7=>new Jison_ParserAction($this->none, $table61),
					8=>new Jison_ParserAction($this->reduce, $table46),
					9=>new Jison_ParserAction($this->reduce, $table46),
					10=>new Jison_ParserAction($this->none, $table7),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					14=>new Jison_ParserAction($this->reduce, $table46),
					15=>new Jison_ParserAction($this->shift, $table11),
					16=>new Jison_ParserAction($this->reduce, $table46),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					23=>new Jison_ParserAction($this->reduce, $table46),
					24=>new Jison_ParserAction($this->shift, $table18),
					25=>new Jison_ParserAction($this->reduce, $table46),
					26=>new Jison_ParserAction($this->shift, $table19),
					27=>new Jison_ParserAction($this->reduce, $table46),
					28=>new Jison_ParserAction($this->shift, $table20),
					29=>new Jison_ParserAction($this->reduce, $table46),
					30=>new Jison_ParserAction($this->shift, $table21),
					31=>new Jison_ParserAction($this->reduce, $table46),
					32=>new Jison_ParserAction($this->shift, $table22),
					33=>new Jison_ParserAction($this->reduce, $table46),
					34=>new Jison_ParserAction($this->shift, $table23),
					35=>new Jison_ParserAction($this->reduce, $table46),
					36=>new Jison_ParserAction($this->shift, $table24),
					37=>new Jison_ParserAction($this->shift, $table60),
					38=>new Jison_ParserAction($this->shift, $table25),
					39=>new Jison_ParserAction($this->reduce, $table46),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					42=>new Jison_ParserAction($this->reduce, $table46),
					43=>new Jison_ParserAction($this->shift, $table28),
					44=>new Jison_ParserAction($this->reduce, $table46),
					45=>new Jison_ParserAction($this->shift, $table29),
					46=>new Jison_ParserAction($this->reduce, $table46),
					47=>new Jison_ParserAction($this->shift, $table30),
					48=>new Jison_ParserAction($this->reduce, $table46),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					54=>new Jison_ParserAction($this->reduce, $table46),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition25 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table49),
					5=>new Jison_ParserAction($this->reduce, $table49),
					7=>new Jison_ParserAction($this->none, $table63),
					8=>new Jison_ParserAction($this->reduce, $table49),
					9=>new Jison_ParserAction($this->reduce, $table49),
					10=>new Jison_ParserAction($this->none, $table7),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					14=>new Jison_ParserAction($this->reduce, $table49),
					15=>new Jison_ParserAction($this->shift, $table11),
					16=>new Jison_ParserAction($this->reduce, $table49),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					23=>new Jison_ParserAction($this->reduce, $table49),
					24=>new Jison_ParserAction($this->shift, $table18),
					25=>new Jison_ParserAction($this->reduce, $table49),
					26=>new Jison_ParserAction($this->shift, $table19),
					27=>new Jison_ParserAction($this->reduce, $table49),
					28=>new Jison_ParserAction($this->shift, $table20),
					29=>new Jison_ParserAction($this->reduce, $table49),
					30=>new Jison_ParserAction($this->shift, $table21),
					31=>new Jison_ParserAction($this->reduce, $table49),
					32=>new Jison_ParserAction($this->shift, $table22),
					33=>new Jison_ParserAction($this->reduce, $table49),
					34=>new Jison_ParserAction($this->shift, $table23),
					35=>new Jison_ParserAction($this->reduce, $table49),
					36=>new Jison_ParserAction($this->shift, $table24),
					37=>new Jison_ParserAction($this->reduce, $table49),
					38=>new Jison_ParserAction($this->shift, $table25),
					39=>new Jison_ParserAction($this->shift, $table62),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					42=>new Jison_ParserAction($this->reduce, $table49),
					43=>new Jison_ParserAction($this->shift, $table28),
					44=>new Jison_ParserAction($this->reduce, $table49),
					45=>new Jison_ParserAction($this->shift, $table29),
					46=>new Jison_ParserAction($this->reduce, $table49),
					47=>new Jison_ParserAction($this->shift, $table30),
					48=>new Jison_ParserAction($this->reduce, $table49),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					54=>new Jison_ParserAction($this->reduce, $table49),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition26 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table52),
					5=>new Jison_ParserAction($this->reduce, $table52),
					8=>new Jison_ParserAction($this->reduce, $table52),
					9=>new Jison_ParserAction($this->reduce, $table52),
					11=>new Jison_ParserAction($this->reduce, $table52),
					12=>new Jison_ParserAction($this->reduce, $table52),
					13=>new Jison_ParserAction($this->reduce, $table52),
					14=>new Jison_ParserAction($this->reduce, $table52),
					15=>new Jison_ParserAction($this->reduce, $table52),
					16=>new Jison_ParserAction($this->reduce, $table52),
					17=>new Jison_ParserAction($this->reduce, $table52),
					18=>new Jison_ParserAction($this->reduce, $table52),
					19=>new Jison_ParserAction($this->reduce, $table52),
					20=>new Jison_ParserAction($this->reduce, $table52),
					21=>new Jison_ParserAction($this->reduce, $table52),
					22=>new Jison_ParserAction($this->reduce, $table52),
					23=>new Jison_ParserAction($this->reduce, $table52),
					24=>new Jison_ParserAction($this->reduce, $table52),
					25=>new Jison_ParserAction($this->reduce, $table52),
					26=>new Jison_ParserAction($this->reduce, $table52),
					27=>new Jison_ParserAction($this->reduce, $table52),
					28=>new Jison_ParserAction($this->reduce, $table52),
					29=>new Jison_ParserAction($this->reduce, $table52),
					30=>new Jison_ParserAction($this->reduce, $table52),
					31=>new Jison_ParserAction($this->reduce, $table52),
					32=>new Jison_ParserAction($this->reduce, $table52),
					33=>new Jison_ParserAction($this->reduce, $table52),
					34=>new Jison_ParserAction($this->reduce, $table52),
					35=>new Jison_ParserAction($this->reduce, $table52),
					36=>new Jison_ParserAction($this->reduce, $table52),
					37=>new Jison_ParserAction($this->reduce, $table52),
					38=>new Jison_ParserAction($this->reduce, $table52),
					39=>new Jison_ParserAction($this->reduce, $table52),
					40=>new Jison_ParserAction($this->reduce, $table52),
					41=>new Jison_ParserAction($this->reduce, $table52),
					42=>new Jison_ParserAction($this->reduce, $table52),
					43=>new Jison_ParserAction($this->reduce, $table52),
					44=>new Jison_ParserAction($this->reduce, $table52),
					45=>new Jison_ParserAction($this->reduce, $table52),
					46=>new Jison_ParserAction($this->reduce, $table52),
					47=>new Jison_ParserAction($this->reduce, $table52),
					48=>new Jison_ParserAction($this->reduce, $table52),
					49=>new Jison_ParserAction($this->reduce, $table52),
					50=>new Jison_ParserAction($this->reduce, $table52),
					52=>new Jison_ParserAction($this->reduce, $table52),
					54=>new Jison_ParserAction($this->reduce, $table52),
					55=>new Jison_ParserAction($this->reduce, $table52),
					56=>new Jison_ParserAction($this->reduce, $table52),
					57=>new Jison_ParserAction($this->reduce, $table52)
				);

			$tableDefinition27 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table53),
					5=>new Jison_ParserAction($this->reduce, $table53),
					7=>new Jison_ParserAction($this->none, $table65),
					8=>new Jison_ParserAction($this->reduce, $table53),
					9=>new Jison_ParserAction($this->reduce, $table53),
					10=>new Jison_ParserAction($this->none, $table7),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					14=>new Jison_ParserAction($this->reduce, $table53),
					15=>new Jison_ParserAction($this->shift, $table11),
					16=>new Jison_ParserAction($this->reduce, $table53),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					23=>new Jison_ParserAction($this->reduce, $table53),
					24=>new Jison_ParserAction($this->shift, $table18),
					25=>new Jison_ParserAction($this->reduce, $table53),
					26=>new Jison_ParserAction($this->shift, $table19),
					27=>new Jison_ParserAction($this->reduce, $table53),
					28=>new Jison_ParserAction($this->shift, $table20),
					29=>new Jison_ParserAction($this->reduce, $table53),
					30=>new Jison_ParserAction($this->shift, $table21),
					31=>new Jison_ParserAction($this->reduce, $table53),
					32=>new Jison_ParserAction($this->shift, $table22),
					33=>new Jison_ParserAction($this->reduce, $table53),
					34=>new Jison_ParserAction($this->shift, $table23),
					35=>new Jison_ParserAction($this->reduce, $table53),
					36=>new Jison_ParserAction($this->shift, $table24),
					37=>new Jison_ParserAction($this->reduce, $table53),
					38=>new Jison_ParserAction($this->shift, $table25),
					39=>new Jison_ParserAction($this->reduce, $table53),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					42=>new Jison_ParserAction($this->shift, $table64),
					43=>new Jison_ParserAction($this->shift, $table28),
					44=>new Jison_ParserAction($this->reduce, $table53),
					45=>new Jison_ParserAction($this->shift, $table29),
					46=>new Jison_ParserAction($this->reduce, $table53),
					47=>new Jison_ParserAction($this->shift, $table30),
					48=>new Jison_ParserAction($this->reduce, $table53),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					54=>new Jison_ParserAction($this->reduce, $table53),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition28 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table56),
					5=>new Jison_ParserAction($this->reduce, $table56),
					7=>new Jison_ParserAction($this->none, $table67),
					8=>new Jison_ParserAction($this->reduce, $table56),
					9=>new Jison_ParserAction($this->reduce, $table56),
					10=>new Jison_ParserAction($this->none, $table7),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					14=>new Jison_ParserAction($this->reduce, $table56),
					15=>new Jison_ParserAction($this->shift, $table11),
					16=>new Jison_ParserAction($this->reduce, $table56),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					23=>new Jison_ParserAction($this->reduce, $table56),
					24=>new Jison_ParserAction($this->shift, $table18),
					25=>new Jison_ParserAction($this->reduce, $table56),
					26=>new Jison_ParserAction($this->shift, $table19),
					27=>new Jison_ParserAction($this->reduce, $table56),
					28=>new Jison_ParserAction($this->shift, $table20),
					29=>new Jison_ParserAction($this->reduce, $table56),
					30=>new Jison_ParserAction($this->shift, $table21),
					31=>new Jison_ParserAction($this->reduce, $table56),
					32=>new Jison_ParserAction($this->shift, $table22),
					33=>new Jison_ParserAction($this->reduce, $table56),
					34=>new Jison_ParserAction($this->shift, $table23),
					35=>new Jison_ParserAction($this->reduce, $table56),
					36=>new Jison_ParserAction($this->shift, $table24),
					37=>new Jison_ParserAction($this->reduce, $table56),
					38=>new Jison_ParserAction($this->shift, $table25),
					39=>new Jison_ParserAction($this->reduce, $table56),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					42=>new Jison_ParserAction($this->reduce, $table56),
					43=>new Jison_ParserAction($this->shift, $table28),
					44=>new Jison_ParserAction($this->shift, $table66),
					45=>new Jison_ParserAction($this->shift, $table29),
					46=>new Jison_ParserAction($this->reduce, $table56),
					47=>new Jison_ParserAction($this->shift, $table30),
					48=>new Jison_ParserAction($this->reduce, $table56),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					54=>new Jison_ParserAction($this->reduce, $table56),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition29 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table59),
					5=>new Jison_ParserAction($this->reduce, $table59),
					7=>new Jison_ParserAction($this->none, $table69),
					8=>new Jison_ParserAction($this->reduce, $table59),
					9=>new Jison_ParserAction($this->reduce, $table59),
					10=>new Jison_ParserAction($this->none, $table7),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					14=>new Jison_ParserAction($this->reduce, $table59),
					15=>new Jison_ParserAction($this->shift, $table11),
					16=>new Jison_ParserAction($this->reduce, $table59),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					23=>new Jison_ParserAction($this->reduce, $table59),
					24=>new Jison_ParserAction($this->shift, $table18),
					25=>new Jison_ParserAction($this->reduce, $table59),
					26=>new Jison_ParserAction($this->shift, $table19),
					27=>new Jison_ParserAction($this->reduce, $table59),
					28=>new Jison_ParserAction($this->shift, $table20),
					29=>new Jison_ParserAction($this->reduce, $table59),
					30=>new Jison_ParserAction($this->shift, $table21),
					31=>new Jison_ParserAction($this->reduce, $table59),
					32=>new Jison_ParserAction($this->shift, $table22),
					33=>new Jison_ParserAction($this->reduce, $table59),
					34=>new Jison_ParserAction($this->shift, $table23),
					35=>new Jison_ParserAction($this->reduce, $table59),
					36=>new Jison_ParserAction($this->shift, $table24),
					37=>new Jison_ParserAction($this->reduce, $table59),
					38=>new Jison_ParserAction($this->shift, $table25),
					39=>new Jison_ParserAction($this->reduce, $table59),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					42=>new Jison_ParserAction($this->reduce, $table59),
					43=>new Jison_ParserAction($this->shift, $table28),
					44=>new Jison_ParserAction($this->reduce, $table59),
					45=>new Jison_ParserAction($this->shift, $table29),
					46=>new Jison_ParserAction($this->shift, $table68),
					47=>new Jison_ParserAction($this->shift, $table30),
					48=>new Jison_ParserAction($this->reduce, $table59),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					54=>new Jison_ParserAction($this->reduce, $table59),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition30 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table62),
					5=>new Jison_ParserAction($this->reduce, $table62),
					7=>new Jison_ParserAction($this->none, $table71),
					8=>new Jison_ParserAction($this->reduce, $table62),
					9=>new Jison_ParserAction($this->reduce, $table62),
					10=>new Jison_ParserAction($this->none, $table7),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					14=>new Jison_ParserAction($this->reduce, $table62),
					15=>new Jison_ParserAction($this->shift, $table11),
					16=>new Jison_ParserAction($this->reduce, $table62),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					23=>new Jison_ParserAction($this->reduce, $table62),
					24=>new Jison_ParserAction($this->shift, $table18),
					25=>new Jison_ParserAction($this->reduce, $table62),
					26=>new Jison_ParserAction($this->shift, $table19),
					27=>new Jison_ParserAction($this->reduce, $table62),
					28=>new Jison_ParserAction($this->shift, $table20),
					29=>new Jison_ParserAction($this->reduce, $table62),
					30=>new Jison_ParserAction($this->shift, $table21),
					31=>new Jison_ParserAction($this->reduce, $table62),
					32=>new Jison_ParserAction($this->shift, $table22),
					33=>new Jison_ParserAction($this->reduce, $table62),
					34=>new Jison_ParserAction($this->shift, $table23),
					35=>new Jison_ParserAction($this->reduce, $table62),
					36=>new Jison_ParserAction($this->shift, $table24),
					37=>new Jison_ParserAction($this->reduce, $table62),
					38=>new Jison_ParserAction($this->shift, $table25),
					39=>new Jison_ParserAction($this->reduce, $table62),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					42=>new Jison_ParserAction($this->reduce, $table62),
					43=>new Jison_ParserAction($this->shift, $table28),
					44=>new Jison_ParserAction($this->reduce, $table62),
					45=>new Jison_ParserAction($this->shift, $table29),
					46=>new Jison_ParserAction($this->reduce, $table62),
					47=>new Jison_ParserAction($this->shift, $table30),
					48=>new Jison_ParserAction($this->shift, $table70),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					54=>new Jison_ParserAction($this->reduce, $table62),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition31 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table65),
					5=>new Jison_ParserAction($this->reduce, $table65),
					8=>new Jison_ParserAction($this->reduce, $table65),
					9=>new Jison_ParserAction($this->reduce, $table65),
					11=>new Jison_ParserAction($this->reduce, $table65),
					12=>new Jison_ParserAction($this->reduce, $table65),
					13=>new Jison_ParserAction($this->reduce, $table65),
					14=>new Jison_ParserAction($this->reduce, $table65),
					15=>new Jison_ParserAction($this->reduce, $table65),
					16=>new Jison_ParserAction($this->reduce, $table65),
					17=>new Jison_ParserAction($this->reduce, $table65),
					18=>new Jison_ParserAction($this->reduce, $table65),
					19=>new Jison_ParserAction($this->reduce, $table65),
					20=>new Jison_ParserAction($this->reduce, $table65),
					21=>new Jison_ParserAction($this->reduce, $table65),
					22=>new Jison_ParserAction($this->reduce, $table65),
					23=>new Jison_ParserAction($this->reduce, $table65),
					24=>new Jison_ParserAction($this->reduce, $table65),
					25=>new Jison_ParserAction($this->reduce, $table65),
					26=>new Jison_ParserAction($this->reduce, $table65),
					27=>new Jison_ParserAction($this->reduce, $table65),
					28=>new Jison_ParserAction($this->reduce, $table65),
					29=>new Jison_ParserAction($this->reduce, $table65),
					30=>new Jison_ParserAction($this->reduce, $table65),
					31=>new Jison_ParserAction($this->reduce, $table65),
					32=>new Jison_ParserAction($this->reduce, $table65),
					33=>new Jison_ParserAction($this->reduce, $table65),
					34=>new Jison_ParserAction($this->reduce, $table65),
					35=>new Jison_ParserAction($this->reduce, $table65),
					36=>new Jison_ParserAction($this->reduce, $table65),
					37=>new Jison_ParserAction($this->reduce, $table65),
					38=>new Jison_ParserAction($this->reduce, $table65),
					39=>new Jison_ParserAction($this->reduce, $table65),
					40=>new Jison_ParserAction($this->reduce, $table65),
					41=>new Jison_ParserAction($this->reduce, $table65),
					42=>new Jison_ParserAction($this->reduce, $table65),
					43=>new Jison_ParserAction($this->reduce, $table65),
					44=>new Jison_ParserAction($this->reduce, $table65),
					45=>new Jison_ParserAction($this->reduce, $table65),
					46=>new Jison_ParserAction($this->reduce, $table65),
					47=>new Jison_ParserAction($this->reduce, $table65),
					48=>new Jison_ParserAction($this->reduce, $table65),
					49=>new Jison_ParserAction($this->reduce, $table65),
					50=>new Jison_ParserAction($this->reduce, $table65),
					52=>new Jison_ParserAction($this->reduce, $table65),
					54=>new Jison_ParserAction($this->reduce, $table65),
					55=>new Jison_ParserAction($this->reduce, $table65),
					56=>new Jison_ParserAction($this->reduce, $table65),
					57=>new Jison_ParserAction($this->reduce, $table65)
				);

			$tableDefinition32 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table66),
					5=>new Jison_ParserAction($this->reduce, $table66),
					8=>new Jison_ParserAction($this->reduce, $table66),
					9=>new Jison_ParserAction($this->reduce, $table66),
					11=>new Jison_ParserAction($this->reduce, $table66),
					12=>new Jison_ParserAction($this->reduce, $table66),
					13=>new Jison_ParserAction($this->reduce, $table66),
					14=>new Jison_ParserAction($this->reduce, $table66),
					15=>new Jison_ParserAction($this->reduce, $table66),
					16=>new Jison_ParserAction($this->reduce, $table66),
					17=>new Jison_ParserAction($this->reduce, $table66),
					18=>new Jison_ParserAction($this->reduce, $table66),
					19=>new Jison_ParserAction($this->reduce, $table66),
					20=>new Jison_ParserAction($this->reduce, $table66),
					21=>new Jison_ParserAction($this->reduce, $table66),
					22=>new Jison_ParserAction($this->reduce, $table66),
					23=>new Jison_ParserAction($this->reduce, $table66),
					24=>new Jison_ParserAction($this->reduce, $table66),
					25=>new Jison_ParserAction($this->reduce, $table66),
					26=>new Jison_ParserAction($this->reduce, $table66),
					27=>new Jison_ParserAction($this->reduce, $table66),
					28=>new Jison_ParserAction($this->reduce, $table66),
					29=>new Jison_ParserAction($this->reduce, $table66),
					30=>new Jison_ParserAction($this->reduce, $table66),
					31=>new Jison_ParserAction($this->reduce, $table66),
					32=>new Jison_ParserAction($this->reduce, $table66),
					33=>new Jison_ParserAction($this->reduce, $table66),
					34=>new Jison_ParserAction($this->reduce, $table66),
					35=>new Jison_ParserAction($this->reduce, $table66),
					36=>new Jison_ParserAction($this->reduce, $table66),
					37=>new Jison_ParserAction($this->reduce, $table66),
					38=>new Jison_ParserAction($this->reduce, $table66),
					39=>new Jison_ParserAction($this->reduce, $table66),
					40=>new Jison_ParserAction($this->reduce, $table66),
					41=>new Jison_ParserAction($this->reduce, $table66),
					42=>new Jison_ParserAction($this->reduce, $table66),
					43=>new Jison_ParserAction($this->reduce, $table66),
					44=>new Jison_ParserAction($this->reduce, $table66),
					45=>new Jison_ParserAction($this->reduce, $table66),
					46=>new Jison_ParserAction($this->reduce, $table66),
					47=>new Jison_ParserAction($this->reduce, $table66),
					48=>new Jison_ParserAction($this->reduce, $table66),
					49=>new Jison_ParserAction($this->reduce, $table66),
					50=>new Jison_ParserAction($this->reduce, $table66),
					51=>new Jison_ParserAction($this->shift, $table72),
					52=>new Jison_ParserAction($this->reduce, $table66),
					54=>new Jison_ParserAction($this->reduce, $table66),
					55=>new Jison_ParserAction($this->reduce, $table66),
					56=>new Jison_ParserAction($this->reduce, $table66),
					57=>new Jison_ParserAction($this->reduce, $table66)
				);

			$tableDefinition33 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table71),
					5=>new Jison_ParserAction($this->reduce, $table71),
					8=>new Jison_ParserAction($this->reduce, $table71),
					9=>new Jison_ParserAction($this->reduce, $table71),
					11=>new Jison_ParserAction($this->reduce, $table71),
					12=>new Jison_ParserAction($this->reduce, $table71),
					13=>new Jison_ParserAction($this->reduce, $table71),
					14=>new Jison_ParserAction($this->reduce, $table71),
					15=>new Jison_ParserAction($this->reduce, $table71),
					16=>new Jison_ParserAction($this->reduce, $table71),
					17=>new Jison_ParserAction($this->reduce, $table71),
					18=>new Jison_ParserAction($this->reduce, $table71),
					19=>new Jison_ParserAction($this->reduce, $table71),
					20=>new Jison_ParserAction($this->reduce, $table71),
					21=>new Jison_ParserAction($this->reduce, $table71),
					22=>new Jison_ParserAction($this->reduce, $table71),
					23=>new Jison_ParserAction($this->reduce, $table71),
					24=>new Jison_ParserAction($this->reduce, $table71),
					25=>new Jison_ParserAction($this->reduce, $table71),
					26=>new Jison_ParserAction($this->reduce, $table71),
					27=>new Jison_ParserAction($this->reduce, $table71),
					28=>new Jison_ParserAction($this->reduce, $table71),
					29=>new Jison_ParserAction($this->reduce, $table71),
					30=>new Jison_ParserAction($this->reduce, $table71),
					31=>new Jison_ParserAction($this->reduce, $table71),
					32=>new Jison_ParserAction($this->reduce, $table71),
					33=>new Jison_ParserAction($this->reduce, $table71),
					34=>new Jison_ParserAction($this->reduce, $table71),
					35=>new Jison_ParserAction($this->reduce, $table71),
					36=>new Jison_ParserAction($this->reduce, $table71),
					37=>new Jison_ParserAction($this->reduce, $table71),
					38=>new Jison_ParserAction($this->reduce, $table71),
					39=>new Jison_ParserAction($this->reduce, $table71),
					40=>new Jison_ParserAction($this->reduce, $table71),
					41=>new Jison_ParserAction($this->reduce, $table71),
					42=>new Jison_ParserAction($this->reduce, $table71),
					43=>new Jison_ParserAction($this->reduce, $table71),
					44=>new Jison_ParserAction($this->reduce, $table71),
					45=>new Jison_ParserAction($this->reduce, $table71),
					46=>new Jison_ParserAction($this->reduce, $table71),
					47=>new Jison_ParserAction($this->reduce, $table71),
					48=>new Jison_ParserAction($this->reduce, $table71),
					49=>new Jison_ParserAction($this->reduce, $table71),
					50=>new Jison_ParserAction($this->reduce, $table71),
					52=>new Jison_ParserAction($this->reduce, $table71),
					53=>new Jison_ParserAction($this->shift, $table73),
					54=>new Jison_ParserAction($this->reduce, $table71),
					55=>new Jison_ParserAction($this->reduce, $table71),
					56=>new Jison_ParserAction($this->reduce, $table71),
					57=>new Jison_ParserAction($this->reduce, $table71)
				);

			$tableDefinition34 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table72),
					5=>new Jison_ParserAction($this->reduce, $table72),
					8=>new Jison_ParserAction($this->reduce, $table72),
					9=>new Jison_ParserAction($this->reduce, $table72),
					11=>new Jison_ParserAction($this->reduce, $table72),
					12=>new Jison_ParserAction($this->reduce, $table72),
					13=>new Jison_ParserAction($this->reduce, $table72),
					14=>new Jison_ParserAction($this->reduce, $table72),
					15=>new Jison_ParserAction($this->reduce, $table72),
					16=>new Jison_ParserAction($this->reduce, $table72),
					17=>new Jison_ParserAction($this->reduce, $table72),
					18=>new Jison_ParserAction($this->reduce, $table72),
					19=>new Jison_ParserAction($this->reduce, $table72),
					20=>new Jison_ParserAction($this->reduce, $table72),
					21=>new Jison_ParserAction($this->reduce, $table72),
					22=>new Jison_ParserAction($this->reduce, $table72),
					23=>new Jison_ParserAction($this->reduce, $table72),
					24=>new Jison_ParserAction($this->reduce, $table72),
					25=>new Jison_ParserAction($this->reduce, $table72),
					26=>new Jison_ParserAction($this->reduce, $table72),
					27=>new Jison_ParserAction($this->reduce, $table72),
					28=>new Jison_ParserAction($this->reduce, $table72),
					29=>new Jison_ParserAction($this->reduce, $table72),
					30=>new Jison_ParserAction($this->reduce, $table72),
					31=>new Jison_ParserAction($this->reduce, $table72),
					32=>new Jison_ParserAction($this->reduce, $table72),
					33=>new Jison_ParserAction($this->reduce, $table72),
					34=>new Jison_ParserAction($this->reduce, $table72),
					35=>new Jison_ParserAction($this->reduce, $table72),
					36=>new Jison_ParserAction($this->reduce, $table72),
					37=>new Jison_ParserAction($this->reduce, $table72),
					38=>new Jison_ParserAction($this->reduce, $table72),
					39=>new Jison_ParserAction($this->reduce, $table72),
					40=>new Jison_ParserAction($this->reduce, $table72),
					41=>new Jison_ParserAction($this->reduce, $table72),
					42=>new Jison_ParserAction($this->reduce, $table72),
					43=>new Jison_ParserAction($this->reduce, $table72),
					44=>new Jison_ParserAction($this->reduce, $table72),
					45=>new Jison_ParserAction($this->reduce, $table72),
					46=>new Jison_ParserAction($this->reduce, $table72),
					47=>new Jison_ParserAction($this->reduce, $table72),
					48=>new Jison_ParserAction($this->reduce, $table72),
					49=>new Jison_ParserAction($this->reduce, $table72),
					50=>new Jison_ParserAction($this->reduce, $table72),
					52=>new Jison_ParserAction($this->reduce, $table72),
					54=>new Jison_ParserAction($this->reduce, $table72),
					55=>new Jison_ParserAction($this->reduce, $table72),
					56=>new Jison_ParserAction($this->reduce, $table72),
					57=>new Jison_ParserAction($this->reduce, $table72)
				);

			$tableDefinition35 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table73),
					5=>new Jison_ParserAction($this->reduce, $table73),
					8=>new Jison_ParserAction($this->reduce, $table73),
					9=>new Jison_ParserAction($this->reduce, $table73),
					11=>new Jison_ParserAction($this->reduce, $table73),
					12=>new Jison_ParserAction($this->reduce, $table73),
					13=>new Jison_ParserAction($this->reduce, $table73),
					14=>new Jison_ParserAction($this->reduce, $table73),
					15=>new Jison_ParserAction($this->reduce, $table73),
					16=>new Jison_ParserAction($this->reduce, $table73),
					17=>new Jison_ParserAction($this->reduce, $table73),
					18=>new Jison_ParserAction($this->reduce, $table73),
					19=>new Jison_ParserAction($this->reduce, $table73),
					20=>new Jison_ParserAction($this->reduce, $table73),
					21=>new Jison_ParserAction($this->reduce, $table73),
					22=>new Jison_ParserAction($this->reduce, $table73),
					23=>new Jison_ParserAction($this->reduce, $table73),
					24=>new Jison_ParserAction($this->reduce, $table73),
					25=>new Jison_ParserAction($this->reduce, $table73),
					26=>new Jison_ParserAction($this->reduce, $table73),
					27=>new Jison_ParserAction($this->reduce, $table73),
					28=>new Jison_ParserAction($this->reduce, $table73),
					29=>new Jison_ParserAction($this->reduce, $table73),
					30=>new Jison_ParserAction($this->reduce, $table73),
					31=>new Jison_ParserAction($this->reduce, $table73),
					32=>new Jison_ParserAction($this->reduce, $table73),
					33=>new Jison_ParserAction($this->reduce, $table73),
					34=>new Jison_ParserAction($this->reduce, $table73),
					35=>new Jison_ParserAction($this->reduce, $table73),
					36=>new Jison_ParserAction($this->reduce, $table73),
					37=>new Jison_ParserAction($this->reduce, $table73),
					38=>new Jison_ParserAction($this->reduce, $table73),
					39=>new Jison_ParserAction($this->reduce, $table73),
					40=>new Jison_ParserAction($this->reduce, $table73),
					41=>new Jison_ParserAction($this->reduce, $table73),
					42=>new Jison_ParserAction($this->reduce, $table73),
					43=>new Jison_ParserAction($this->reduce, $table73),
					44=>new Jison_ParserAction($this->reduce, $table73),
					45=>new Jison_ParserAction($this->reduce, $table73),
					46=>new Jison_ParserAction($this->reduce, $table73),
					47=>new Jison_ParserAction($this->reduce, $table73),
					48=>new Jison_ParserAction($this->reduce, $table73),
					49=>new Jison_ParserAction($this->reduce, $table73),
					50=>new Jison_ParserAction($this->reduce, $table73),
					52=>new Jison_ParserAction($this->reduce, $table73),
					54=>new Jison_ParserAction($this->reduce, $table73),
					55=>new Jison_ParserAction($this->reduce, $table73),
					56=>new Jison_ParserAction($this->reduce, $table73),
					57=>new Jison_ParserAction($this->reduce, $table73)
				);

			$tableDefinition36 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table74),
					5=>new Jison_ParserAction($this->reduce, $table74),
					8=>new Jison_ParserAction($this->reduce, $table74),
					9=>new Jison_ParserAction($this->reduce, $table74),
					11=>new Jison_ParserAction($this->reduce, $table74),
					12=>new Jison_ParserAction($this->reduce, $table74),
					13=>new Jison_ParserAction($this->reduce, $table74),
					14=>new Jison_ParserAction($this->reduce, $table74),
					15=>new Jison_ParserAction($this->reduce, $table74),
					16=>new Jison_ParserAction($this->reduce, $table74),
					17=>new Jison_ParserAction($this->reduce, $table74),
					18=>new Jison_ParserAction($this->reduce, $table74),
					19=>new Jison_ParserAction($this->reduce, $table74),
					20=>new Jison_ParserAction($this->reduce, $table74),
					21=>new Jison_ParserAction($this->reduce, $table74),
					22=>new Jison_ParserAction($this->reduce, $table74),
					23=>new Jison_ParserAction($this->reduce, $table74),
					24=>new Jison_ParserAction($this->reduce, $table74),
					25=>new Jison_ParserAction($this->reduce, $table74),
					26=>new Jison_ParserAction($this->reduce, $table74),
					27=>new Jison_ParserAction($this->reduce, $table74),
					28=>new Jison_ParserAction($this->reduce, $table74),
					29=>new Jison_ParserAction($this->reduce, $table74),
					30=>new Jison_ParserAction($this->reduce, $table74),
					31=>new Jison_ParserAction($this->reduce, $table74),
					32=>new Jison_ParserAction($this->reduce, $table74),
					33=>new Jison_ParserAction($this->reduce, $table74),
					34=>new Jison_ParserAction($this->reduce, $table74),
					35=>new Jison_ParserAction($this->reduce, $table74),
					36=>new Jison_ParserAction($this->reduce, $table74),
					37=>new Jison_ParserAction($this->reduce, $table74),
					38=>new Jison_ParserAction($this->reduce, $table74),
					39=>new Jison_ParserAction($this->reduce, $table74),
					40=>new Jison_ParserAction($this->reduce, $table74),
					41=>new Jison_ParserAction($this->reduce, $table74),
					42=>new Jison_ParserAction($this->reduce, $table74),
					43=>new Jison_ParserAction($this->reduce, $table74),
					44=>new Jison_ParserAction($this->reduce, $table74),
					45=>new Jison_ParserAction($this->reduce, $table74),
					46=>new Jison_ParserAction($this->reduce, $table74),
					47=>new Jison_ParserAction($this->reduce, $table74),
					48=>new Jison_ParserAction($this->reduce, $table74),
					49=>new Jison_ParserAction($this->reduce, $table74),
					50=>new Jison_ParserAction($this->reduce, $table74),
					52=>new Jison_ParserAction($this->reduce, $table74),
					54=>new Jison_ParserAction($this->reduce, $table74),
					55=>new Jison_ParserAction($this->reduce, $table74),
					56=>new Jison_ParserAction($this->reduce, $table74),
					57=>new Jison_ParserAction($this->reduce, $table74)
				);

			$tableDefinition37 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table2)
				);

			$tableDefinition38 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table5),
					5=>new Jison_ParserAction($this->reduce, $table5),
					8=>new Jison_ParserAction($this->reduce, $table5),
					11=>new Jison_ParserAction($this->reduce, $table5),
					12=>new Jison_ParserAction($this->reduce, $table5),
					13=>new Jison_ParserAction($this->reduce, $table5),
					15=>new Jison_ParserAction($this->reduce, $table5),
					17=>new Jison_ParserAction($this->reduce, $table5),
					18=>new Jison_ParserAction($this->reduce, $table5),
					19=>new Jison_ParserAction($this->reduce, $table5),
					20=>new Jison_ParserAction($this->reduce, $table5),
					21=>new Jison_ParserAction($this->reduce, $table5),
					22=>new Jison_ParserAction($this->reduce, $table5),
					24=>new Jison_ParserAction($this->reduce, $table5),
					26=>new Jison_ParserAction($this->reduce, $table5),
					28=>new Jison_ParserAction($this->reduce, $table5),
					30=>new Jison_ParserAction($this->reduce, $table5),
					32=>new Jison_ParserAction($this->reduce, $table5),
					34=>new Jison_ParserAction($this->reduce, $table5),
					36=>new Jison_ParserAction($this->reduce, $table5),
					38=>new Jison_ParserAction($this->reduce, $table5),
					40=>new Jison_ParserAction($this->reduce, $table5),
					41=>new Jison_ParserAction($this->reduce, $table5),
					43=>new Jison_ParserAction($this->reduce, $table5),
					45=>new Jison_ParserAction($this->reduce, $table5),
					47=>new Jison_ParserAction($this->reduce, $table5),
					49=>new Jison_ParserAction($this->reduce, $table5),
					50=>new Jison_ParserAction($this->reduce, $table5),
					52=>new Jison_ParserAction($this->reduce, $table5),
					55=>new Jison_ParserAction($this->reduce, $table5),
					56=>new Jison_ParserAction($this->reduce, $table5),
					57=>new Jison_ParserAction($this->reduce, $table5)
				);

			$tableDefinition39 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table11),
					5=>new Jison_ParserAction($this->reduce, $table11),
					8=>new Jison_ParserAction($this->reduce, $table11),
					9=>new Jison_ParserAction($this->reduce, $table11),
					11=>new Jison_ParserAction($this->reduce, $table11),
					12=>new Jison_ParserAction($this->reduce, $table11),
					13=>new Jison_ParserAction($this->reduce, $table11),
					14=>new Jison_ParserAction($this->reduce, $table11),
					15=>new Jison_ParserAction($this->reduce, $table11),
					16=>new Jison_ParserAction($this->reduce, $table11),
					17=>new Jison_ParserAction($this->reduce, $table11),
					18=>new Jison_ParserAction($this->reduce, $table11),
					19=>new Jison_ParserAction($this->reduce, $table11),
					20=>new Jison_ParserAction($this->reduce, $table11),
					21=>new Jison_ParserAction($this->reduce, $table11),
					22=>new Jison_ParserAction($this->reduce, $table11),
					23=>new Jison_ParserAction($this->reduce, $table11),
					24=>new Jison_ParserAction($this->reduce, $table11),
					25=>new Jison_ParserAction($this->reduce, $table11),
					26=>new Jison_ParserAction($this->reduce, $table11),
					27=>new Jison_ParserAction($this->reduce, $table11),
					28=>new Jison_ParserAction($this->reduce, $table11),
					29=>new Jison_ParserAction($this->reduce, $table11),
					30=>new Jison_ParserAction($this->reduce, $table11),
					31=>new Jison_ParserAction($this->reduce, $table11),
					32=>new Jison_ParserAction($this->reduce, $table11),
					33=>new Jison_ParserAction($this->reduce, $table11),
					34=>new Jison_ParserAction($this->reduce, $table11),
					35=>new Jison_ParserAction($this->reduce, $table11),
					36=>new Jison_ParserAction($this->reduce, $table11),
					37=>new Jison_ParserAction($this->reduce, $table11),
					38=>new Jison_ParserAction($this->reduce, $table11),
					39=>new Jison_ParserAction($this->reduce, $table11),
					40=>new Jison_ParserAction($this->reduce, $table11),
					41=>new Jison_ParserAction($this->reduce, $table11),
					42=>new Jison_ParserAction($this->reduce, $table11),
					43=>new Jison_ParserAction($this->reduce, $table11),
					44=>new Jison_ParserAction($this->reduce, $table11),
					45=>new Jison_ParserAction($this->reduce, $table11),
					46=>new Jison_ParserAction($this->reduce, $table11),
					47=>new Jison_ParserAction($this->reduce, $table11),
					48=>new Jison_ParserAction($this->reduce, $table11),
					49=>new Jison_ParserAction($this->reduce, $table11),
					50=>new Jison_ParserAction($this->reduce, $table11),
					52=>new Jison_ParserAction($this->reduce, $table11),
					54=>new Jison_ParserAction($this->reduce, $table11),
					55=>new Jison_ParserAction($this->reduce, $table11),
					56=>new Jison_ParserAction($this->reduce, $table11),
					57=>new Jison_ParserAction($this->reduce, $table11)
				);

			$tableDefinition40 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table7),
					5=>new Jison_ParserAction($this->reduce, $table7),
					8=>new Jison_ParserAction($this->reduce, $table7),
					11=>new Jison_ParserAction($this->reduce, $table7),
					12=>new Jison_ParserAction($this->reduce, $table7),
					13=>new Jison_ParserAction($this->reduce, $table7),
					15=>new Jison_ParserAction($this->reduce, $table7),
					17=>new Jison_ParserAction($this->reduce, $table7),
					18=>new Jison_ParserAction($this->reduce, $table7),
					19=>new Jison_ParserAction($this->reduce, $table7),
					20=>new Jison_ParserAction($this->reduce, $table7),
					21=>new Jison_ParserAction($this->reduce, $table7),
					22=>new Jison_ParserAction($this->reduce, $table7),
					24=>new Jison_ParserAction($this->reduce, $table7),
					26=>new Jison_ParserAction($this->reduce, $table7),
					28=>new Jison_ParserAction($this->reduce, $table7),
					30=>new Jison_ParserAction($this->reduce, $table7),
					32=>new Jison_ParserAction($this->reduce, $table7),
					34=>new Jison_ParserAction($this->reduce, $table7),
					36=>new Jison_ParserAction($this->reduce, $table7),
					38=>new Jison_ParserAction($this->reduce, $table7),
					40=>new Jison_ParserAction($this->reduce, $table7),
					41=>new Jison_ParserAction($this->reduce, $table7),
					43=>new Jison_ParserAction($this->reduce, $table7),
					45=>new Jison_ParserAction($this->reduce, $table7),
					47=>new Jison_ParserAction($this->reduce, $table7),
					49=>new Jison_ParserAction($this->reduce, $table7),
					50=>new Jison_ParserAction($this->reduce, $table7),
					52=>new Jison_ParserAction($this->reduce, $table7),
					55=>new Jison_ParserAction($this->reduce, $table7),
					56=>new Jison_ParserAction($this->reduce, $table7),
					57=>new Jison_ParserAction($this->reduce, $table7)
				);

			$tableDefinition41 = array(
				
					9=>new Jison_ParserAction($this->shift, $table74),
					10=>new Jison_ParserAction($this->none, $table39),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					15=>new Jison_ParserAction($this->shift, $table11),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					24=>new Jison_ParserAction($this->shift, $table18),
					26=>new Jison_ParserAction($this->shift, $table19),
					28=>new Jison_ParserAction($this->shift, $table20),
					30=>new Jison_ParserAction($this->shift, $table21),
					32=>new Jison_ParserAction($this->shift, $table22),
					34=>new Jison_ParserAction($this->shift, $table23),
					36=>new Jison_ParserAction($this->shift, $table24),
					38=>new Jison_ParserAction($this->shift, $table25),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					43=>new Jison_ParserAction($this->shift, $table28),
					45=>new Jison_ParserAction($this->shift, $table29),
					47=>new Jison_ParserAction($this->shift, $table30),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition42 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table15),
					5=>new Jison_ParserAction($this->reduce, $table15),
					8=>new Jison_ParserAction($this->reduce, $table15),
					9=>new Jison_ParserAction($this->reduce, $table15),
					11=>new Jison_ParserAction($this->reduce, $table15),
					12=>new Jison_ParserAction($this->reduce, $table15),
					13=>new Jison_ParserAction($this->reduce, $table15),
					14=>new Jison_ParserAction($this->reduce, $table15),
					15=>new Jison_ParserAction($this->reduce, $table15),
					16=>new Jison_ParserAction($this->reduce, $table15),
					17=>new Jison_ParserAction($this->reduce, $table15),
					18=>new Jison_ParserAction($this->reduce, $table15),
					19=>new Jison_ParserAction($this->reduce, $table15),
					20=>new Jison_ParserAction($this->reduce, $table15),
					21=>new Jison_ParserAction($this->reduce, $table15),
					22=>new Jison_ParserAction($this->reduce, $table15),
					23=>new Jison_ParserAction($this->reduce, $table15),
					24=>new Jison_ParserAction($this->reduce, $table15),
					25=>new Jison_ParserAction($this->reduce, $table15),
					26=>new Jison_ParserAction($this->reduce, $table15),
					27=>new Jison_ParserAction($this->reduce, $table15),
					28=>new Jison_ParserAction($this->reduce, $table15),
					29=>new Jison_ParserAction($this->reduce, $table15),
					30=>new Jison_ParserAction($this->reduce, $table15),
					31=>new Jison_ParserAction($this->reduce, $table15),
					32=>new Jison_ParserAction($this->reduce, $table15),
					33=>new Jison_ParserAction($this->reduce, $table15),
					34=>new Jison_ParserAction($this->reduce, $table15),
					35=>new Jison_ParserAction($this->reduce, $table15),
					36=>new Jison_ParserAction($this->reduce, $table15),
					37=>new Jison_ParserAction($this->reduce, $table15),
					38=>new Jison_ParserAction($this->reduce, $table15),
					39=>new Jison_ParserAction($this->reduce, $table15),
					40=>new Jison_ParserAction($this->reduce, $table15),
					41=>new Jison_ParserAction($this->reduce, $table15),
					42=>new Jison_ParserAction($this->reduce, $table15),
					43=>new Jison_ParserAction($this->reduce, $table15),
					44=>new Jison_ParserAction($this->reduce, $table15),
					45=>new Jison_ParserAction($this->reduce, $table15),
					46=>new Jison_ParserAction($this->reduce, $table15),
					47=>new Jison_ParserAction($this->reduce, $table15),
					48=>new Jison_ParserAction($this->reduce, $table15),
					49=>new Jison_ParserAction($this->reduce, $table15),
					50=>new Jison_ParserAction($this->reduce, $table15),
					52=>new Jison_ParserAction($this->reduce, $table15),
					54=>new Jison_ParserAction($this->reduce, $table15),
					55=>new Jison_ParserAction($this->reduce, $table15),
					56=>new Jison_ParserAction($this->reduce, $table15),
					57=>new Jison_ParserAction($this->reduce, $table15)
				);

			$tableDefinition43 = array(
				
					10=>new Jison_ParserAction($this->none, $table39),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					14=>new Jison_ParserAction($this->shift, $table75),
					15=>new Jison_ParserAction($this->shift, $table11),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					24=>new Jison_ParserAction($this->shift, $table18),
					26=>new Jison_ParserAction($this->shift, $table19),
					28=>new Jison_ParserAction($this->shift, $table20),
					30=>new Jison_ParserAction($this->shift, $table21),
					32=>new Jison_ParserAction($this->shift, $table22),
					34=>new Jison_ParserAction($this->shift, $table23),
					36=>new Jison_ParserAction($this->shift, $table24),
					38=>new Jison_ParserAction($this->shift, $table25),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					43=>new Jison_ParserAction($this->shift, $table28),
					45=>new Jison_ParserAction($this->shift, $table29),
					47=>new Jison_ParserAction($this->shift, $table30),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition44 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table18),
					5=>new Jison_ParserAction($this->reduce, $table18),
					8=>new Jison_ParserAction($this->reduce, $table18),
					9=>new Jison_ParserAction($this->reduce, $table18),
					11=>new Jison_ParserAction($this->reduce, $table18),
					12=>new Jison_ParserAction($this->reduce, $table18),
					13=>new Jison_ParserAction($this->reduce, $table18),
					14=>new Jison_ParserAction($this->reduce, $table18),
					15=>new Jison_ParserAction($this->reduce, $table18),
					16=>new Jison_ParserAction($this->reduce, $table18),
					17=>new Jison_ParserAction($this->reduce, $table18),
					18=>new Jison_ParserAction($this->reduce, $table18),
					19=>new Jison_ParserAction($this->reduce, $table18),
					20=>new Jison_ParserAction($this->reduce, $table18),
					21=>new Jison_ParserAction($this->reduce, $table18),
					22=>new Jison_ParserAction($this->reduce, $table18),
					23=>new Jison_ParserAction($this->reduce, $table18),
					24=>new Jison_ParserAction($this->reduce, $table18),
					25=>new Jison_ParserAction($this->reduce, $table18),
					26=>new Jison_ParserAction($this->reduce, $table18),
					27=>new Jison_ParserAction($this->reduce, $table18),
					28=>new Jison_ParserAction($this->reduce, $table18),
					29=>new Jison_ParserAction($this->reduce, $table18),
					30=>new Jison_ParserAction($this->reduce, $table18),
					31=>new Jison_ParserAction($this->reduce, $table18),
					32=>new Jison_ParserAction($this->reduce, $table18),
					33=>new Jison_ParserAction($this->reduce, $table18),
					34=>new Jison_ParserAction($this->reduce, $table18),
					35=>new Jison_ParserAction($this->reduce, $table18),
					36=>new Jison_ParserAction($this->reduce, $table18),
					37=>new Jison_ParserAction($this->reduce, $table18),
					38=>new Jison_ParserAction($this->reduce, $table18),
					39=>new Jison_ParserAction($this->reduce, $table18),
					40=>new Jison_ParserAction($this->reduce, $table18),
					41=>new Jison_ParserAction($this->reduce, $table18),
					42=>new Jison_ParserAction($this->reduce, $table18),
					43=>new Jison_ParserAction($this->reduce, $table18),
					44=>new Jison_ParserAction($this->reduce, $table18),
					45=>new Jison_ParserAction($this->reduce, $table18),
					46=>new Jison_ParserAction($this->reduce, $table18),
					47=>new Jison_ParserAction($this->reduce, $table18),
					48=>new Jison_ParserAction($this->reduce, $table18),
					49=>new Jison_ParserAction($this->reduce, $table18),
					50=>new Jison_ParserAction($this->reduce, $table18),
					52=>new Jison_ParserAction($this->reduce, $table18),
					54=>new Jison_ParserAction($this->reduce, $table18),
					55=>new Jison_ParserAction($this->reduce, $table18),
					56=>new Jison_ParserAction($this->reduce, $table18),
					57=>new Jison_ParserAction($this->reduce, $table18)
				);

			$tableDefinition45 = array(
				
					10=>new Jison_ParserAction($this->none, $table39),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					15=>new Jison_ParserAction($this->shift, $table11),
					16=>new Jison_ParserAction($this->shift, $table76),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					24=>new Jison_ParserAction($this->shift, $table18),
					26=>new Jison_ParserAction($this->shift, $table19),
					28=>new Jison_ParserAction($this->shift, $table20),
					30=>new Jison_ParserAction($this->shift, $table21),
					32=>new Jison_ParserAction($this->shift, $table22),
					34=>new Jison_ParserAction($this->shift, $table23),
					36=>new Jison_ParserAction($this->shift, $table24),
					38=>new Jison_ParserAction($this->shift, $table25),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					43=>new Jison_ParserAction($this->shift, $table28),
					45=>new Jison_ParserAction($this->shift, $table29),
					47=>new Jison_ParserAction($this->shift, $table30),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition46 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table26),
					5=>new Jison_ParserAction($this->reduce, $table26),
					8=>new Jison_ParserAction($this->reduce, $table26),
					9=>new Jison_ParserAction($this->reduce, $table26),
					11=>new Jison_ParserAction($this->reduce, $table26),
					12=>new Jison_ParserAction($this->reduce, $table26),
					13=>new Jison_ParserAction($this->reduce, $table26),
					14=>new Jison_ParserAction($this->reduce, $table26),
					15=>new Jison_ParserAction($this->reduce, $table26),
					16=>new Jison_ParserAction($this->reduce, $table26),
					17=>new Jison_ParserAction($this->reduce, $table26),
					18=>new Jison_ParserAction($this->reduce, $table26),
					19=>new Jison_ParserAction($this->reduce, $table26),
					20=>new Jison_ParserAction($this->reduce, $table26),
					21=>new Jison_ParserAction($this->reduce, $table26),
					22=>new Jison_ParserAction($this->reduce, $table26),
					23=>new Jison_ParserAction($this->reduce, $table26),
					24=>new Jison_ParserAction($this->reduce, $table26),
					25=>new Jison_ParserAction($this->reduce, $table26),
					26=>new Jison_ParserAction($this->reduce, $table26),
					27=>new Jison_ParserAction($this->reduce, $table26),
					28=>new Jison_ParserAction($this->reduce, $table26),
					29=>new Jison_ParserAction($this->reduce, $table26),
					30=>new Jison_ParserAction($this->reduce, $table26),
					31=>new Jison_ParserAction($this->reduce, $table26),
					32=>new Jison_ParserAction($this->reduce, $table26),
					33=>new Jison_ParserAction($this->reduce, $table26),
					34=>new Jison_ParserAction($this->reduce, $table26),
					35=>new Jison_ParserAction($this->reduce, $table26),
					36=>new Jison_ParserAction($this->reduce, $table26),
					37=>new Jison_ParserAction($this->reduce, $table26),
					38=>new Jison_ParserAction($this->reduce, $table26),
					39=>new Jison_ParserAction($this->reduce, $table26),
					40=>new Jison_ParserAction($this->reduce, $table26),
					41=>new Jison_ParserAction($this->reduce, $table26),
					42=>new Jison_ParserAction($this->reduce, $table26),
					43=>new Jison_ParserAction($this->reduce, $table26),
					44=>new Jison_ParserAction($this->reduce, $table26),
					45=>new Jison_ParserAction($this->reduce, $table26),
					46=>new Jison_ParserAction($this->reduce, $table26),
					47=>new Jison_ParserAction($this->reduce, $table26),
					48=>new Jison_ParserAction($this->reduce, $table26),
					49=>new Jison_ParserAction($this->reduce, $table26),
					50=>new Jison_ParserAction($this->reduce, $table26),
					52=>new Jison_ParserAction($this->reduce, $table26),
					54=>new Jison_ParserAction($this->reduce, $table26),
					55=>new Jison_ParserAction($this->reduce, $table26),
					56=>new Jison_ParserAction($this->reduce, $table26),
					57=>new Jison_ParserAction($this->reduce, $table26)
				);

			$tableDefinition47 = array(
				
					10=>new Jison_ParserAction($this->none, $table39),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					15=>new Jison_ParserAction($this->shift, $table11),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					23=>new Jison_ParserAction($this->shift, $table77),
					24=>new Jison_ParserAction($this->shift, $table18),
					26=>new Jison_ParserAction($this->shift, $table19),
					28=>new Jison_ParserAction($this->shift, $table20),
					30=>new Jison_ParserAction($this->shift, $table21),
					32=>new Jison_ParserAction($this->shift, $table22),
					34=>new Jison_ParserAction($this->shift, $table23),
					36=>new Jison_ParserAction($this->shift, $table24),
					38=>new Jison_ParserAction($this->shift, $table25),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					43=>new Jison_ParserAction($this->shift, $table28),
					45=>new Jison_ParserAction($this->shift, $table29),
					47=>new Jison_ParserAction($this->shift, $table30),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition48 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table29),
					5=>new Jison_ParserAction($this->reduce, $table29),
					8=>new Jison_ParserAction($this->reduce, $table29),
					9=>new Jison_ParserAction($this->reduce, $table29),
					11=>new Jison_ParserAction($this->reduce, $table29),
					12=>new Jison_ParserAction($this->reduce, $table29),
					13=>new Jison_ParserAction($this->reduce, $table29),
					14=>new Jison_ParserAction($this->reduce, $table29),
					15=>new Jison_ParserAction($this->reduce, $table29),
					16=>new Jison_ParserAction($this->reduce, $table29),
					17=>new Jison_ParserAction($this->reduce, $table29),
					18=>new Jison_ParserAction($this->reduce, $table29),
					19=>new Jison_ParserAction($this->reduce, $table29),
					20=>new Jison_ParserAction($this->reduce, $table29),
					21=>new Jison_ParserAction($this->reduce, $table29),
					22=>new Jison_ParserAction($this->reduce, $table29),
					23=>new Jison_ParserAction($this->reduce, $table29),
					24=>new Jison_ParserAction($this->reduce, $table29),
					25=>new Jison_ParserAction($this->reduce, $table29),
					26=>new Jison_ParserAction($this->reduce, $table29),
					27=>new Jison_ParserAction($this->reduce, $table29),
					28=>new Jison_ParserAction($this->reduce, $table29),
					29=>new Jison_ParserAction($this->reduce, $table29),
					30=>new Jison_ParserAction($this->reduce, $table29),
					31=>new Jison_ParserAction($this->reduce, $table29),
					32=>new Jison_ParserAction($this->reduce, $table29),
					33=>new Jison_ParserAction($this->reduce, $table29),
					34=>new Jison_ParserAction($this->reduce, $table29),
					35=>new Jison_ParserAction($this->reduce, $table29),
					36=>new Jison_ParserAction($this->reduce, $table29),
					37=>new Jison_ParserAction($this->reduce, $table29),
					38=>new Jison_ParserAction($this->reduce, $table29),
					39=>new Jison_ParserAction($this->reduce, $table29),
					40=>new Jison_ParserAction($this->reduce, $table29),
					41=>new Jison_ParserAction($this->reduce, $table29),
					42=>new Jison_ParserAction($this->reduce, $table29),
					43=>new Jison_ParserAction($this->reduce, $table29),
					44=>new Jison_ParserAction($this->reduce, $table29),
					45=>new Jison_ParserAction($this->reduce, $table29),
					46=>new Jison_ParserAction($this->reduce, $table29),
					47=>new Jison_ParserAction($this->reduce, $table29),
					48=>new Jison_ParserAction($this->reduce, $table29),
					49=>new Jison_ParserAction($this->reduce, $table29),
					50=>new Jison_ParserAction($this->reduce, $table29),
					52=>new Jison_ParserAction($this->reduce, $table29),
					54=>new Jison_ParserAction($this->reduce, $table29),
					55=>new Jison_ParserAction($this->reduce, $table29),
					56=>new Jison_ParserAction($this->reduce, $table29),
					57=>new Jison_ParserAction($this->reduce, $table29)
				);

			$tableDefinition49 = array(
				
					10=>new Jison_ParserAction($this->none, $table39),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					15=>new Jison_ParserAction($this->shift, $table11),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					24=>new Jison_ParserAction($this->shift, $table18),
					25=>new Jison_ParserAction($this->shift, $table78),
					26=>new Jison_ParserAction($this->shift, $table19),
					28=>new Jison_ParserAction($this->shift, $table20),
					30=>new Jison_ParserAction($this->shift, $table21),
					32=>new Jison_ParserAction($this->shift, $table22),
					34=>new Jison_ParserAction($this->shift, $table23),
					36=>new Jison_ParserAction($this->shift, $table24),
					38=>new Jison_ParserAction($this->shift, $table25),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					43=>new Jison_ParserAction($this->shift, $table28),
					45=>new Jison_ParserAction($this->shift, $table29),
					47=>new Jison_ParserAction($this->shift, $table30),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition50 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table32),
					5=>new Jison_ParserAction($this->reduce, $table32),
					8=>new Jison_ParserAction($this->reduce, $table32),
					9=>new Jison_ParserAction($this->reduce, $table32),
					11=>new Jison_ParserAction($this->reduce, $table32),
					12=>new Jison_ParserAction($this->reduce, $table32),
					13=>new Jison_ParserAction($this->reduce, $table32),
					14=>new Jison_ParserAction($this->reduce, $table32),
					15=>new Jison_ParserAction($this->reduce, $table32),
					16=>new Jison_ParserAction($this->reduce, $table32),
					17=>new Jison_ParserAction($this->reduce, $table32),
					18=>new Jison_ParserAction($this->reduce, $table32),
					19=>new Jison_ParserAction($this->reduce, $table32),
					20=>new Jison_ParserAction($this->reduce, $table32),
					21=>new Jison_ParserAction($this->reduce, $table32),
					22=>new Jison_ParserAction($this->reduce, $table32),
					23=>new Jison_ParserAction($this->reduce, $table32),
					24=>new Jison_ParserAction($this->reduce, $table32),
					25=>new Jison_ParserAction($this->reduce, $table32),
					26=>new Jison_ParserAction($this->reduce, $table32),
					27=>new Jison_ParserAction($this->reduce, $table32),
					28=>new Jison_ParserAction($this->reduce, $table32),
					29=>new Jison_ParserAction($this->reduce, $table32),
					30=>new Jison_ParserAction($this->reduce, $table32),
					31=>new Jison_ParserAction($this->reduce, $table32),
					32=>new Jison_ParserAction($this->reduce, $table32),
					33=>new Jison_ParserAction($this->reduce, $table32),
					34=>new Jison_ParserAction($this->reduce, $table32),
					35=>new Jison_ParserAction($this->reduce, $table32),
					36=>new Jison_ParserAction($this->reduce, $table32),
					37=>new Jison_ParserAction($this->reduce, $table32),
					38=>new Jison_ParserAction($this->reduce, $table32),
					39=>new Jison_ParserAction($this->reduce, $table32),
					40=>new Jison_ParserAction($this->reduce, $table32),
					41=>new Jison_ParserAction($this->reduce, $table32),
					42=>new Jison_ParserAction($this->reduce, $table32),
					43=>new Jison_ParserAction($this->reduce, $table32),
					44=>new Jison_ParserAction($this->reduce, $table32),
					45=>new Jison_ParserAction($this->reduce, $table32),
					46=>new Jison_ParserAction($this->reduce, $table32),
					47=>new Jison_ParserAction($this->reduce, $table32),
					48=>new Jison_ParserAction($this->reduce, $table32),
					49=>new Jison_ParserAction($this->reduce, $table32),
					50=>new Jison_ParserAction($this->reduce, $table32),
					52=>new Jison_ParserAction($this->reduce, $table32),
					54=>new Jison_ParserAction($this->reduce, $table32),
					55=>new Jison_ParserAction($this->reduce, $table32),
					56=>new Jison_ParserAction($this->reduce, $table32),
					57=>new Jison_ParserAction($this->reduce, $table32)
				);

			$tableDefinition51 = array(
				
					10=>new Jison_ParserAction($this->none, $table39),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					15=>new Jison_ParserAction($this->shift, $table11),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					24=>new Jison_ParserAction($this->shift, $table18),
					26=>new Jison_ParserAction($this->shift, $table19),
					27=>new Jison_ParserAction($this->shift, $table79),
					28=>new Jison_ParserAction($this->shift, $table20),
					30=>new Jison_ParserAction($this->shift, $table21),
					32=>new Jison_ParserAction($this->shift, $table22),
					34=>new Jison_ParserAction($this->shift, $table23),
					36=>new Jison_ParserAction($this->shift, $table24),
					38=>new Jison_ParserAction($this->shift, $table25),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					43=>new Jison_ParserAction($this->shift, $table28),
					45=>new Jison_ParserAction($this->shift, $table29),
					47=>new Jison_ParserAction($this->shift, $table30),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition52 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table35),
					5=>new Jison_ParserAction($this->reduce, $table35),
					8=>new Jison_ParserAction($this->reduce, $table35),
					9=>new Jison_ParserAction($this->reduce, $table35),
					11=>new Jison_ParserAction($this->reduce, $table35),
					12=>new Jison_ParserAction($this->reduce, $table35),
					13=>new Jison_ParserAction($this->reduce, $table35),
					14=>new Jison_ParserAction($this->reduce, $table35),
					15=>new Jison_ParserAction($this->reduce, $table35),
					16=>new Jison_ParserAction($this->reduce, $table35),
					17=>new Jison_ParserAction($this->reduce, $table35),
					18=>new Jison_ParserAction($this->reduce, $table35),
					19=>new Jison_ParserAction($this->reduce, $table35),
					20=>new Jison_ParserAction($this->reduce, $table35),
					21=>new Jison_ParserAction($this->reduce, $table35),
					22=>new Jison_ParserAction($this->reduce, $table35),
					23=>new Jison_ParserAction($this->reduce, $table35),
					24=>new Jison_ParserAction($this->reduce, $table35),
					25=>new Jison_ParserAction($this->reduce, $table35),
					26=>new Jison_ParserAction($this->reduce, $table35),
					27=>new Jison_ParserAction($this->reduce, $table35),
					28=>new Jison_ParserAction($this->reduce, $table35),
					29=>new Jison_ParserAction($this->reduce, $table35),
					30=>new Jison_ParserAction($this->reduce, $table35),
					31=>new Jison_ParserAction($this->reduce, $table35),
					32=>new Jison_ParserAction($this->reduce, $table35),
					33=>new Jison_ParserAction($this->reduce, $table35),
					34=>new Jison_ParserAction($this->reduce, $table35),
					35=>new Jison_ParserAction($this->reduce, $table35),
					36=>new Jison_ParserAction($this->reduce, $table35),
					37=>new Jison_ParserAction($this->reduce, $table35),
					38=>new Jison_ParserAction($this->reduce, $table35),
					39=>new Jison_ParserAction($this->reduce, $table35),
					40=>new Jison_ParserAction($this->reduce, $table35),
					41=>new Jison_ParserAction($this->reduce, $table35),
					42=>new Jison_ParserAction($this->reduce, $table35),
					43=>new Jison_ParserAction($this->reduce, $table35),
					44=>new Jison_ParserAction($this->reduce, $table35),
					45=>new Jison_ParserAction($this->reduce, $table35),
					46=>new Jison_ParserAction($this->reduce, $table35),
					47=>new Jison_ParserAction($this->reduce, $table35),
					48=>new Jison_ParserAction($this->reduce, $table35),
					49=>new Jison_ParserAction($this->reduce, $table35),
					50=>new Jison_ParserAction($this->reduce, $table35),
					52=>new Jison_ParserAction($this->reduce, $table35),
					54=>new Jison_ParserAction($this->reduce, $table35),
					55=>new Jison_ParserAction($this->reduce, $table35),
					56=>new Jison_ParserAction($this->reduce, $table35),
					57=>new Jison_ParserAction($this->reduce, $table35)
				);

			$tableDefinition53 = array(
				
					10=>new Jison_ParserAction($this->none, $table39),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					15=>new Jison_ParserAction($this->shift, $table11),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					24=>new Jison_ParserAction($this->shift, $table18),
					26=>new Jison_ParserAction($this->shift, $table19),
					28=>new Jison_ParserAction($this->shift, $table20),
					29=>new Jison_ParserAction($this->shift, $table80),
					30=>new Jison_ParserAction($this->shift, $table21),
					32=>new Jison_ParserAction($this->shift, $table22),
					34=>new Jison_ParserAction($this->shift, $table23),
					36=>new Jison_ParserAction($this->shift, $table24),
					38=>new Jison_ParserAction($this->shift, $table25),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					43=>new Jison_ParserAction($this->shift, $table28),
					45=>new Jison_ParserAction($this->shift, $table29),
					47=>new Jison_ParserAction($this->shift, $table30),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition54 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table38),
					5=>new Jison_ParserAction($this->reduce, $table38),
					8=>new Jison_ParserAction($this->reduce, $table38),
					9=>new Jison_ParserAction($this->reduce, $table38),
					11=>new Jison_ParserAction($this->reduce, $table38),
					12=>new Jison_ParserAction($this->reduce, $table38),
					13=>new Jison_ParserAction($this->reduce, $table38),
					14=>new Jison_ParserAction($this->reduce, $table38),
					15=>new Jison_ParserAction($this->reduce, $table38),
					16=>new Jison_ParserAction($this->reduce, $table38),
					17=>new Jison_ParserAction($this->reduce, $table38),
					18=>new Jison_ParserAction($this->reduce, $table38),
					19=>new Jison_ParserAction($this->reduce, $table38),
					20=>new Jison_ParserAction($this->reduce, $table38),
					21=>new Jison_ParserAction($this->reduce, $table38),
					22=>new Jison_ParserAction($this->reduce, $table38),
					23=>new Jison_ParserAction($this->reduce, $table38),
					24=>new Jison_ParserAction($this->reduce, $table38),
					25=>new Jison_ParserAction($this->reduce, $table38),
					26=>new Jison_ParserAction($this->reduce, $table38),
					27=>new Jison_ParserAction($this->reduce, $table38),
					28=>new Jison_ParserAction($this->reduce, $table38),
					29=>new Jison_ParserAction($this->reduce, $table38),
					30=>new Jison_ParserAction($this->reduce, $table38),
					31=>new Jison_ParserAction($this->reduce, $table38),
					32=>new Jison_ParserAction($this->reduce, $table38),
					33=>new Jison_ParserAction($this->reduce, $table38),
					34=>new Jison_ParserAction($this->reduce, $table38),
					35=>new Jison_ParserAction($this->reduce, $table38),
					36=>new Jison_ParserAction($this->reduce, $table38),
					37=>new Jison_ParserAction($this->reduce, $table38),
					38=>new Jison_ParserAction($this->reduce, $table38),
					39=>new Jison_ParserAction($this->reduce, $table38),
					40=>new Jison_ParserAction($this->reduce, $table38),
					41=>new Jison_ParserAction($this->reduce, $table38),
					42=>new Jison_ParserAction($this->reduce, $table38),
					43=>new Jison_ParserAction($this->reduce, $table38),
					44=>new Jison_ParserAction($this->reduce, $table38),
					45=>new Jison_ParserAction($this->reduce, $table38),
					46=>new Jison_ParserAction($this->reduce, $table38),
					47=>new Jison_ParserAction($this->reduce, $table38),
					48=>new Jison_ParserAction($this->reduce, $table38),
					49=>new Jison_ParserAction($this->reduce, $table38),
					50=>new Jison_ParserAction($this->reduce, $table38),
					52=>new Jison_ParserAction($this->reduce, $table38),
					54=>new Jison_ParserAction($this->reduce, $table38),
					55=>new Jison_ParserAction($this->reduce, $table38),
					56=>new Jison_ParserAction($this->reduce, $table38),
					57=>new Jison_ParserAction($this->reduce, $table38)
				);

			$tableDefinition55 = array(
				
					10=>new Jison_ParserAction($this->none, $table39),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					15=>new Jison_ParserAction($this->shift, $table11),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					24=>new Jison_ParserAction($this->shift, $table18),
					26=>new Jison_ParserAction($this->shift, $table19),
					28=>new Jison_ParserAction($this->shift, $table20),
					30=>new Jison_ParserAction($this->shift, $table21),
					31=>new Jison_ParserAction($this->shift, $table81),
					32=>new Jison_ParserAction($this->shift, $table22),
					34=>new Jison_ParserAction($this->shift, $table23),
					36=>new Jison_ParserAction($this->shift, $table24),
					38=>new Jison_ParserAction($this->shift, $table25),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					43=>new Jison_ParserAction($this->shift, $table28),
					45=>new Jison_ParserAction($this->shift, $table29),
					47=>new Jison_ParserAction($this->shift, $table30),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition56 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table41),
					5=>new Jison_ParserAction($this->reduce, $table41),
					8=>new Jison_ParserAction($this->reduce, $table41),
					9=>new Jison_ParserAction($this->reduce, $table41),
					11=>new Jison_ParserAction($this->reduce, $table41),
					12=>new Jison_ParserAction($this->reduce, $table41),
					13=>new Jison_ParserAction($this->reduce, $table41),
					14=>new Jison_ParserAction($this->reduce, $table41),
					15=>new Jison_ParserAction($this->reduce, $table41),
					16=>new Jison_ParserAction($this->reduce, $table41),
					17=>new Jison_ParserAction($this->reduce, $table41),
					18=>new Jison_ParserAction($this->reduce, $table41),
					19=>new Jison_ParserAction($this->reduce, $table41),
					20=>new Jison_ParserAction($this->reduce, $table41),
					21=>new Jison_ParserAction($this->reduce, $table41),
					22=>new Jison_ParserAction($this->reduce, $table41),
					23=>new Jison_ParserAction($this->reduce, $table41),
					24=>new Jison_ParserAction($this->reduce, $table41),
					25=>new Jison_ParserAction($this->reduce, $table41),
					26=>new Jison_ParserAction($this->reduce, $table41),
					27=>new Jison_ParserAction($this->reduce, $table41),
					28=>new Jison_ParserAction($this->reduce, $table41),
					29=>new Jison_ParserAction($this->reduce, $table41),
					30=>new Jison_ParserAction($this->reduce, $table41),
					31=>new Jison_ParserAction($this->reduce, $table41),
					32=>new Jison_ParserAction($this->reduce, $table41),
					33=>new Jison_ParserAction($this->reduce, $table41),
					34=>new Jison_ParserAction($this->reduce, $table41),
					35=>new Jison_ParserAction($this->reduce, $table41),
					36=>new Jison_ParserAction($this->reduce, $table41),
					37=>new Jison_ParserAction($this->reduce, $table41),
					38=>new Jison_ParserAction($this->reduce, $table41),
					39=>new Jison_ParserAction($this->reduce, $table41),
					40=>new Jison_ParserAction($this->reduce, $table41),
					41=>new Jison_ParserAction($this->reduce, $table41),
					42=>new Jison_ParserAction($this->reduce, $table41),
					43=>new Jison_ParserAction($this->reduce, $table41),
					44=>new Jison_ParserAction($this->reduce, $table41),
					45=>new Jison_ParserAction($this->reduce, $table41),
					46=>new Jison_ParserAction($this->reduce, $table41),
					47=>new Jison_ParserAction($this->reduce, $table41),
					48=>new Jison_ParserAction($this->reduce, $table41),
					49=>new Jison_ParserAction($this->reduce, $table41),
					50=>new Jison_ParserAction($this->reduce, $table41),
					52=>new Jison_ParserAction($this->reduce, $table41),
					54=>new Jison_ParserAction($this->reduce, $table41),
					55=>new Jison_ParserAction($this->reduce, $table41),
					56=>new Jison_ParserAction($this->reduce, $table41),
					57=>new Jison_ParserAction($this->reduce, $table41)
				);

			$tableDefinition57 = array(
				
					10=>new Jison_ParserAction($this->none, $table39),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					15=>new Jison_ParserAction($this->shift, $table11),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					24=>new Jison_ParserAction($this->shift, $table18),
					26=>new Jison_ParserAction($this->shift, $table19),
					28=>new Jison_ParserAction($this->shift, $table20),
					30=>new Jison_ParserAction($this->shift, $table21),
					32=>new Jison_ParserAction($this->shift, $table22),
					33=>new Jison_ParserAction($this->shift, $table82),
					34=>new Jison_ParserAction($this->shift, $table23),
					36=>new Jison_ParserAction($this->shift, $table24),
					38=>new Jison_ParserAction($this->shift, $table25),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					43=>new Jison_ParserAction($this->shift, $table28),
					45=>new Jison_ParserAction($this->shift, $table29),
					47=>new Jison_ParserAction($this->shift, $table30),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition58 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table44),
					5=>new Jison_ParserAction($this->reduce, $table44),
					8=>new Jison_ParserAction($this->reduce, $table44),
					9=>new Jison_ParserAction($this->reduce, $table44),
					11=>new Jison_ParserAction($this->reduce, $table44),
					12=>new Jison_ParserAction($this->reduce, $table44),
					13=>new Jison_ParserAction($this->reduce, $table44),
					14=>new Jison_ParserAction($this->reduce, $table44),
					15=>new Jison_ParserAction($this->reduce, $table44),
					16=>new Jison_ParserAction($this->reduce, $table44),
					17=>new Jison_ParserAction($this->reduce, $table44),
					18=>new Jison_ParserAction($this->reduce, $table44),
					19=>new Jison_ParserAction($this->reduce, $table44),
					20=>new Jison_ParserAction($this->reduce, $table44),
					21=>new Jison_ParserAction($this->reduce, $table44),
					22=>new Jison_ParserAction($this->reduce, $table44),
					23=>new Jison_ParserAction($this->reduce, $table44),
					24=>new Jison_ParserAction($this->reduce, $table44),
					25=>new Jison_ParserAction($this->reduce, $table44),
					26=>new Jison_ParserAction($this->reduce, $table44),
					27=>new Jison_ParserAction($this->reduce, $table44),
					28=>new Jison_ParserAction($this->reduce, $table44),
					29=>new Jison_ParserAction($this->reduce, $table44),
					30=>new Jison_ParserAction($this->reduce, $table44),
					31=>new Jison_ParserAction($this->reduce, $table44),
					32=>new Jison_ParserAction($this->reduce, $table44),
					33=>new Jison_ParserAction($this->reduce, $table44),
					34=>new Jison_ParserAction($this->reduce, $table44),
					35=>new Jison_ParserAction($this->reduce, $table44),
					36=>new Jison_ParserAction($this->reduce, $table44),
					37=>new Jison_ParserAction($this->reduce, $table44),
					38=>new Jison_ParserAction($this->reduce, $table44),
					39=>new Jison_ParserAction($this->reduce, $table44),
					40=>new Jison_ParserAction($this->reduce, $table44),
					41=>new Jison_ParserAction($this->reduce, $table44),
					42=>new Jison_ParserAction($this->reduce, $table44),
					43=>new Jison_ParserAction($this->reduce, $table44),
					44=>new Jison_ParserAction($this->reduce, $table44),
					45=>new Jison_ParserAction($this->reduce, $table44),
					46=>new Jison_ParserAction($this->reduce, $table44),
					47=>new Jison_ParserAction($this->reduce, $table44),
					48=>new Jison_ParserAction($this->reduce, $table44),
					49=>new Jison_ParserAction($this->reduce, $table44),
					50=>new Jison_ParserAction($this->reduce, $table44),
					52=>new Jison_ParserAction($this->reduce, $table44),
					54=>new Jison_ParserAction($this->reduce, $table44),
					55=>new Jison_ParserAction($this->reduce, $table44),
					56=>new Jison_ParserAction($this->reduce, $table44),
					57=>new Jison_ParserAction($this->reduce, $table44)
				);

			$tableDefinition59 = array(
				
					10=>new Jison_ParserAction($this->none, $table39),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					15=>new Jison_ParserAction($this->shift, $table11),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					24=>new Jison_ParserAction($this->shift, $table18),
					26=>new Jison_ParserAction($this->shift, $table19),
					28=>new Jison_ParserAction($this->shift, $table20),
					30=>new Jison_ParserAction($this->shift, $table21),
					32=>new Jison_ParserAction($this->shift, $table22),
					34=>new Jison_ParserAction($this->shift, $table23),
					35=>new Jison_ParserAction($this->shift, $table83),
					36=>new Jison_ParserAction($this->shift, $table24),
					38=>new Jison_ParserAction($this->shift, $table25),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					43=>new Jison_ParserAction($this->shift, $table28),
					45=>new Jison_ParserAction($this->shift, $table29),
					47=>new Jison_ParserAction($this->shift, $table30),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition60 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table47),
					5=>new Jison_ParserAction($this->reduce, $table47),
					8=>new Jison_ParserAction($this->reduce, $table47),
					9=>new Jison_ParserAction($this->reduce, $table47),
					11=>new Jison_ParserAction($this->reduce, $table47),
					12=>new Jison_ParserAction($this->reduce, $table47),
					13=>new Jison_ParserAction($this->reduce, $table47),
					14=>new Jison_ParserAction($this->reduce, $table47),
					15=>new Jison_ParserAction($this->reduce, $table47),
					16=>new Jison_ParserAction($this->reduce, $table47),
					17=>new Jison_ParserAction($this->reduce, $table47),
					18=>new Jison_ParserAction($this->reduce, $table47),
					19=>new Jison_ParserAction($this->reduce, $table47),
					20=>new Jison_ParserAction($this->reduce, $table47),
					21=>new Jison_ParserAction($this->reduce, $table47),
					22=>new Jison_ParserAction($this->reduce, $table47),
					23=>new Jison_ParserAction($this->reduce, $table47),
					24=>new Jison_ParserAction($this->reduce, $table47),
					25=>new Jison_ParserAction($this->reduce, $table47),
					26=>new Jison_ParserAction($this->reduce, $table47),
					27=>new Jison_ParserAction($this->reduce, $table47),
					28=>new Jison_ParserAction($this->reduce, $table47),
					29=>new Jison_ParserAction($this->reduce, $table47),
					30=>new Jison_ParserAction($this->reduce, $table47),
					31=>new Jison_ParserAction($this->reduce, $table47),
					32=>new Jison_ParserAction($this->reduce, $table47),
					33=>new Jison_ParserAction($this->reduce, $table47),
					34=>new Jison_ParserAction($this->reduce, $table47),
					35=>new Jison_ParserAction($this->reduce, $table47),
					36=>new Jison_ParserAction($this->reduce, $table47),
					37=>new Jison_ParserAction($this->reduce, $table47),
					38=>new Jison_ParserAction($this->reduce, $table47),
					39=>new Jison_ParserAction($this->reduce, $table47),
					40=>new Jison_ParserAction($this->reduce, $table47),
					41=>new Jison_ParserAction($this->reduce, $table47),
					42=>new Jison_ParserAction($this->reduce, $table47),
					43=>new Jison_ParserAction($this->reduce, $table47),
					44=>new Jison_ParserAction($this->reduce, $table47),
					45=>new Jison_ParserAction($this->reduce, $table47),
					46=>new Jison_ParserAction($this->reduce, $table47),
					47=>new Jison_ParserAction($this->reduce, $table47),
					48=>new Jison_ParserAction($this->reduce, $table47),
					49=>new Jison_ParserAction($this->reduce, $table47),
					50=>new Jison_ParserAction($this->reduce, $table47),
					52=>new Jison_ParserAction($this->reduce, $table47),
					54=>new Jison_ParserAction($this->reduce, $table47),
					55=>new Jison_ParserAction($this->reduce, $table47),
					56=>new Jison_ParserAction($this->reduce, $table47),
					57=>new Jison_ParserAction($this->reduce, $table47)
				);

			$tableDefinition61 = array(
				
					10=>new Jison_ParserAction($this->none, $table39),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					15=>new Jison_ParserAction($this->shift, $table11),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					24=>new Jison_ParserAction($this->shift, $table18),
					26=>new Jison_ParserAction($this->shift, $table19),
					28=>new Jison_ParserAction($this->shift, $table20),
					30=>new Jison_ParserAction($this->shift, $table21),
					32=>new Jison_ParserAction($this->shift, $table22),
					34=>new Jison_ParserAction($this->shift, $table23),
					36=>new Jison_ParserAction($this->shift, $table24),
					37=>new Jison_ParserAction($this->shift, $table84),
					38=>new Jison_ParserAction($this->shift, $table25),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					43=>new Jison_ParserAction($this->shift, $table28),
					45=>new Jison_ParserAction($this->shift, $table29),
					47=>new Jison_ParserAction($this->shift, $table30),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition62 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table50),
					5=>new Jison_ParserAction($this->reduce, $table50),
					8=>new Jison_ParserAction($this->reduce, $table50),
					9=>new Jison_ParserAction($this->reduce, $table50),
					11=>new Jison_ParserAction($this->reduce, $table50),
					12=>new Jison_ParserAction($this->reduce, $table50),
					13=>new Jison_ParserAction($this->reduce, $table50),
					14=>new Jison_ParserAction($this->reduce, $table50),
					15=>new Jison_ParserAction($this->reduce, $table50),
					16=>new Jison_ParserAction($this->reduce, $table50),
					17=>new Jison_ParserAction($this->reduce, $table50),
					18=>new Jison_ParserAction($this->reduce, $table50),
					19=>new Jison_ParserAction($this->reduce, $table50),
					20=>new Jison_ParserAction($this->reduce, $table50),
					21=>new Jison_ParserAction($this->reduce, $table50),
					22=>new Jison_ParserAction($this->reduce, $table50),
					23=>new Jison_ParserAction($this->reduce, $table50),
					24=>new Jison_ParserAction($this->reduce, $table50),
					25=>new Jison_ParserAction($this->reduce, $table50),
					26=>new Jison_ParserAction($this->reduce, $table50),
					27=>new Jison_ParserAction($this->reduce, $table50),
					28=>new Jison_ParserAction($this->reduce, $table50),
					29=>new Jison_ParserAction($this->reduce, $table50),
					30=>new Jison_ParserAction($this->reduce, $table50),
					31=>new Jison_ParserAction($this->reduce, $table50),
					32=>new Jison_ParserAction($this->reduce, $table50),
					33=>new Jison_ParserAction($this->reduce, $table50),
					34=>new Jison_ParserAction($this->reduce, $table50),
					35=>new Jison_ParserAction($this->reduce, $table50),
					36=>new Jison_ParserAction($this->reduce, $table50),
					37=>new Jison_ParserAction($this->reduce, $table50),
					38=>new Jison_ParserAction($this->reduce, $table50),
					39=>new Jison_ParserAction($this->reduce, $table50),
					40=>new Jison_ParserAction($this->reduce, $table50),
					41=>new Jison_ParserAction($this->reduce, $table50),
					42=>new Jison_ParserAction($this->reduce, $table50),
					43=>new Jison_ParserAction($this->reduce, $table50),
					44=>new Jison_ParserAction($this->reduce, $table50),
					45=>new Jison_ParserAction($this->reduce, $table50),
					46=>new Jison_ParserAction($this->reduce, $table50),
					47=>new Jison_ParserAction($this->reduce, $table50),
					48=>new Jison_ParserAction($this->reduce, $table50),
					49=>new Jison_ParserAction($this->reduce, $table50),
					50=>new Jison_ParserAction($this->reduce, $table50),
					52=>new Jison_ParserAction($this->reduce, $table50),
					54=>new Jison_ParserAction($this->reduce, $table50),
					55=>new Jison_ParserAction($this->reduce, $table50),
					56=>new Jison_ParserAction($this->reduce, $table50),
					57=>new Jison_ParserAction($this->reduce, $table50)
				);

			$tableDefinition63 = array(
				
					10=>new Jison_ParserAction($this->none, $table39),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					15=>new Jison_ParserAction($this->shift, $table11),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					24=>new Jison_ParserAction($this->shift, $table18),
					26=>new Jison_ParserAction($this->shift, $table19),
					28=>new Jison_ParserAction($this->shift, $table20),
					30=>new Jison_ParserAction($this->shift, $table21),
					32=>new Jison_ParserAction($this->shift, $table22),
					34=>new Jison_ParserAction($this->shift, $table23),
					36=>new Jison_ParserAction($this->shift, $table24),
					38=>new Jison_ParserAction($this->shift, $table25),
					39=>new Jison_ParserAction($this->shift, $table85),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					43=>new Jison_ParserAction($this->shift, $table28),
					45=>new Jison_ParserAction($this->shift, $table29),
					47=>new Jison_ParserAction($this->shift, $table30),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition64 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table54),
					5=>new Jison_ParserAction($this->reduce, $table54),
					8=>new Jison_ParserAction($this->reduce, $table54),
					9=>new Jison_ParserAction($this->reduce, $table54),
					11=>new Jison_ParserAction($this->reduce, $table54),
					12=>new Jison_ParserAction($this->reduce, $table54),
					13=>new Jison_ParserAction($this->reduce, $table54),
					14=>new Jison_ParserAction($this->reduce, $table54),
					15=>new Jison_ParserAction($this->reduce, $table54),
					16=>new Jison_ParserAction($this->reduce, $table54),
					17=>new Jison_ParserAction($this->reduce, $table54),
					18=>new Jison_ParserAction($this->reduce, $table54),
					19=>new Jison_ParserAction($this->reduce, $table54),
					20=>new Jison_ParserAction($this->reduce, $table54),
					21=>new Jison_ParserAction($this->reduce, $table54),
					22=>new Jison_ParserAction($this->reduce, $table54),
					23=>new Jison_ParserAction($this->reduce, $table54),
					24=>new Jison_ParserAction($this->reduce, $table54),
					25=>new Jison_ParserAction($this->reduce, $table54),
					26=>new Jison_ParserAction($this->reduce, $table54),
					27=>new Jison_ParserAction($this->reduce, $table54),
					28=>new Jison_ParserAction($this->reduce, $table54),
					29=>new Jison_ParserAction($this->reduce, $table54),
					30=>new Jison_ParserAction($this->reduce, $table54),
					31=>new Jison_ParserAction($this->reduce, $table54),
					32=>new Jison_ParserAction($this->reduce, $table54),
					33=>new Jison_ParserAction($this->reduce, $table54),
					34=>new Jison_ParserAction($this->reduce, $table54),
					35=>new Jison_ParserAction($this->reduce, $table54),
					36=>new Jison_ParserAction($this->reduce, $table54),
					37=>new Jison_ParserAction($this->reduce, $table54),
					38=>new Jison_ParserAction($this->reduce, $table54),
					39=>new Jison_ParserAction($this->reduce, $table54),
					40=>new Jison_ParserAction($this->reduce, $table54),
					41=>new Jison_ParserAction($this->reduce, $table54),
					42=>new Jison_ParserAction($this->reduce, $table54),
					43=>new Jison_ParserAction($this->reduce, $table54),
					44=>new Jison_ParserAction($this->reduce, $table54),
					45=>new Jison_ParserAction($this->reduce, $table54),
					46=>new Jison_ParserAction($this->reduce, $table54),
					47=>new Jison_ParserAction($this->reduce, $table54),
					48=>new Jison_ParserAction($this->reduce, $table54),
					49=>new Jison_ParserAction($this->reduce, $table54),
					50=>new Jison_ParserAction($this->reduce, $table54),
					52=>new Jison_ParserAction($this->reduce, $table54),
					54=>new Jison_ParserAction($this->reduce, $table54),
					55=>new Jison_ParserAction($this->reduce, $table54),
					56=>new Jison_ParserAction($this->reduce, $table54),
					57=>new Jison_ParserAction($this->reduce, $table54)
				);

			$tableDefinition65 = array(
				
					10=>new Jison_ParserAction($this->none, $table39),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					15=>new Jison_ParserAction($this->shift, $table11),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					24=>new Jison_ParserAction($this->shift, $table18),
					26=>new Jison_ParserAction($this->shift, $table19),
					28=>new Jison_ParserAction($this->shift, $table20),
					30=>new Jison_ParserAction($this->shift, $table21),
					32=>new Jison_ParserAction($this->shift, $table22),
					34=>new Jison_ParserAction($this->shift, $table23),
					36=>new Jison_ParserAction($this->shift, $table24),
					38=>new Jison_ParserAction($this->shift, $table25),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					42=>new Jison_ParserAction($this->shift, $table86),
					43=>new Jison_ParserAction($this->shift, $table28),
					45=>new Jison_ParserAction($this->shift, $table29),
					47=>new Jison_ParserAction($this->shift, $table30),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition66 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table57),
					5=>new Jison_ParserAction($this->reduce, $table57),
					8=>new Jison_ParserAction($this->reduce, $table57),
					9=>new Jison_ParserAction($this->reduce, $table57),
					11=>new Jison_ParserAction($this->reduce, $table57),
					12=>new Jison_ParserAction($this->reduce, $table57),
					13=>new Jison_ParserAction($this->reduce, $table57),
					14=>new Jison_ParserAction($this->reduce, $table57),
					15=>new Jison_ParserAction($this->reduce, $table57),
					16=>new Jison_ParserAction($this->reduce, $table57),
					17=>new Jison_ParserAction($this->reduce, $table57),
					18=>new Jison_ParserAction($this->reduce, $table57),
					19=>new Jison_ParserAction($this->reduce, $table57),
					20=>new Jison_ParserAction($this->reduce, $table57),
					21=>new Jison_ParserAction($this->reduce, $table57),
					22=>new Jison_ParserAction($this->reduce, $table57),
					23=>new Jison_ParserAction($this->reduce, $table57),
					24=>new Jison_ParserAction($this->reduce, $table57),
					25=>new Jison_ParserAction($this->reduce, $table57),
					26=>new Jison_ParserAction($this->reduce, $table57),
					27=>new Jison_ParserAction($this->reduce, $table57),
					28=>new Jison_ParserAction($this->reduce, $table57),
					29=>new Jison_ParserAction($this->reduce, $table57),
					30=>new Jison_ParserAction($this->reduce, $table57),
					31=>new Jison_ParserAction($this->reduce, $table57),
					32=>new Jison_ParserAction($this->reduce, $table57),
					33=>new Jison_ParserAction($this->reduce, $table57),
					34=>new Jison_ParserAction($this->reduce, $table57),
					35=>new Jison_ParserAction($this->reduce, $table57),
					36=>new Jison_ParserAction($this->reduce, $table57),
					37=>new Jison_ParserAction($this->reduce, $table57),
					38=>new Jison_ParserAction($this->reduce, $table57),
					39=>new Jison_ParserAction($this->reduce, $table57),
					40=>new Jison_ParserAction($this->reduce, $table57),
					41=>new Jison_ParserAction($this->reduce, $table57),
					42=>new Jison_ParserAction($this->reduce, $table57),
					43=>new Jison_ParserAction($this->reduce, $table57),
					44=>new Jison_ParserAction($this->reduce, $table57),
					45=>new Jison_ParserAction($this->reduce, $table57),
					46=>new Jison_ParserAction($this->reduce, $table57),
					47=>new Jison_ParserAction($this->reduce, $table57),
					48=>new Jison_ParserAction($this->reduce, $table57),
					49=>new Jison_ParserAction($this->reduce, $table57),
					50=>new Jison_ParserAction($this->reduce, $table57),
					52=>new Jison_ParserAction($this->reduce, $table57),
					54=>new Jison_ParserAction($this->reduce, $table57),
					55=>new Jison_ParserAction($this->reduce, $table57),
					56=>new Jison_ParserAction($this->reduce, $table57),
					57=>new Jison_ParserAction($this->reduce, $table57)
				);

			$tableDefinition67 = array(
				
					10=>new Jison_ParserAction($this->none, $table39),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					15=>new Jison_ParserAction($this->shift, $table11),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					24=>new Jison_ParserAction($this->shift, $table18),
					26=>new Jison_ParserAction($this->shift, $table19),
					28=>new Jison_ParserAction($this->shift, $table20),
					30=>new Jison_ParserAction($this->shift, $table21),
					32=>new Jison_ParserAction($this->shift, $table22),
					34=>new Jison_ParserAction($this->shift, $table23),
					36=>new Jison_ParserAction($this->shift, $table24),
					38=>new Jison_ParserAction($this->shift, $table25),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					43=>new Jison_ParserAction($this->shift, $table28),
					44=>new Jison_ParserAction($this->shift, $table87),
					45=>new Jison_ParserAction($this->shift, $table29),
					47=>new Jison_ParserAction($this->shift, $table30),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition68 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table60),
					5=>new Jison_ParserAction($this->reduce, $table60),
					8=>new Jison_ParserAction($this->reduce, $table60),
					9=>new Jison_ParserAction($this->reduce, $table60),
					11=>new Jison_ParserAction($this->reduce, $table60),
					12=>new Jison_ParserAction($this->reduce, $table60),
					13=>new Jison_ParserAction($this->reduce, $table60),
					14=>new Jison_ParserAction($this->reduce, $table60),
					15=>new Jison_ParserAction($this->reduce, $table60),
					16=>new Jison_ParserAction($this->reduce, $table60),
					17=>new Jison_ParserAction($this->reduce, $table60),
					18=>new Jison_ParserAction($this->reduce, $table60),
					19=>new Jison_ParserAction($this->reduce, $table60),
					20=>new Jison_ParserAction($this->reduce, $table60),
					21=>new Jison_ParserAction($this->reduce, $table60),
					22=>new Jison_ParserAction($this->reduce, $table60),
					23=>new Jison_ParserAction($this->reduce, $table60),
					24=>new Jison_ParserAction($this->reduce, $table60),
					25=>new Jison_ParserAction($this->reduce, $table60),
					26=>new Jison_ParserAction($this->reduce, $table60),
					27=>new Jison_ParserAction($this->reduce, $table60),
					28=>new Jison_ParserAction($this->reduce, $table60),
					29=>new Jison_ParserAction($this->reduce, $table60),
					30=>new Jison_ParserAction($this->reduce, $table60),
					31=>new Jison_ParserAction($this->reduce, $table60),
					32=>new Jison_ParserAction($this->reduce, $table60),
					33=>new Jison_ParserAction($this->reduce, $table60),
					34=>new Jison_ParserAction($this->reduce, $table60),
					35=>new Jison_ParserAction($this->reduce, $table60),
					36=>new Jison_ParserAction($this->reduce, $table60),
					37=>new Jison_ParserAction($this->reduce, $table60),
					38=>new Jison_ParserAction($this->reduce, $table60),
					39=>new Jison_ParserAction($this->reduce, $table60),
					40=>new Jison_ParserAction($this->reduce, $table60),
					41=>new Jison_ParserAction($this->reduce, $table60),
					42=>new Jison_ParserAction($this->reduce, $table60),
					43=>new Jison_ParserAction($this->reduce, $table60),
					44=>new Jison_ParserAction($this->reduce, $table60),
					45=>new Jison_ParserAction($this->reduce, $table60),
					46=>new Jison_ParserAction($this->reduce, $table60),
					47=>new Jison_ParserAction($this->reduce, $table60),
					48=>new Jison_ParserAction($this->reduce, $table60),
					49=>new Jison_ParserAction($this->reduce, $table60),
					50=>new Jison_ParserAction($this->reduce, $table60),
					52=>new Jison_ParserAction($this->reduce, $table60),
					54=>new Jison_ParserAction($this->reduce, $table60),
					55=>new Jison_ParserAction($this->reduce, $table60),
					56=>new Jison_ParserAction($this->reduce, $table60),
					57=>new Jison_ParserAction($this->reduce, $table60)
				);

			$tableDefinition69 = array(
				
					10=>new Jison_ParserAction($this->none, $table39),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					15=>new Jison_ParserAction($this->shift, $table11),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					24=>new Jison_ParserAction($this->shift, $table18),
					26=>new Jison_ParserAction($this->shift, $table19),
					28=>new Jison_ParserAction($this->shift, $table20),
					30=>new Jison_ParserAction($this->shift, $table21),
					32=>new Jison_ParserAction($this->shift, $table22),
					34=>new Jison_ParserAction($this->shift, $table23),
					36=>new Jison_ParserAction($this->shift, $table24),
					38=>new Jison_ParserAction($this->shift, $table25),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					43=>new Jison_ParserAction($this->shift, $table28),
					45=>new Jison_ParserAction($this->shift, $table29),
					46=>new Jison_ParserAction($this->shift, $table88),
					47=>new Jison_ParserAction($this->shift, $table30),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition70 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table63),
					5=>new Jison_ParserAction($this->reduce, $table63),
					8=>new Jison_ParserAction($this->reduce, $table63),
					9=>new Jison_ParserAction($this->reduce, $table63),
					11=>new Jison_ParserAction($this->reduce, $table63),
					12=>new Jison_ParserAction($this->reduce, $table63),
					13=>new Jison_ParserAction($this->reduce, $table63),
					14=>new Jison_ParserAction($this->reduce, $table63),
					15=>new Jison_ParserAction($this->reduce, $table63),
					16=>new Jison_ParserAction($this->reduce, $table63),
					17=>new Jison_ParserAction($this->reduce, $table63),
					18=>new Jison_ParserAction($this->reduce, $table63),
					19=>new Jison_ParserAction($this->reduce, $table63),
					20=>new Jison_ParserAction($this->reduce, $table63),
					21=>new Jison_ParserAction($this->reduce, $table63),
					22=>new Jison_ParserAction($this->reduce, $table63),
					23=>new Jison_ParserAction($this->reduce, $table63),
					24=>new Jison_ParserAction($this->reduce, $table63),
					25=>new Jison_ParserAction($this->reduce, $table63),
					26=>new Jison_ParserAction($this->reduce, $table63),
					27=>new Jison_ParserAction($this->reduce, $table63),
					28=>new Jison_ParserAction($this->reduce, $table63),
					29=>new Jison_ParserAction($this->reduce, $table63),
					30=>new Jison_ParserAction($this->reduce, $table63),
					31=>new Jison_ParserAction($this->reduce, $table63),
					32=>new Jison_ParserAction($this->reduce, $table63),
					33=>new Jison_ParserAction($this->reduce, $table63),
					34=>new Jison_ParserAction($this->reduce, $table63),
					35=>new Jison_ParserAction($this->reduce, $table63),
					36=>new Jison_ParserAction($this->reduce, $table63),
					37=>new Jison_ParserAction($this->reduce, $table63),
					38=>new Jison_ParserAction($this->reduce, $table63),
					39=>new Jison_ParserAction($this->reduce, $table63),
					40=>new Jison_ParserAction($this->reduce, $table63),
					41=>new Jison_ParserAction($this->reduce, $table63),
					42=>new Jison_ParserAction($this->reduce, $table63),
					43=>new Jison_ParserAction($this->reduce, $table63),
					44=>new Jison_ParserAction($this->reduce, $table63),
					45=>new Jison_ParserAction($this->reduce, $table63),
					46=>new Jison_ParserAction($this->reduce, $table63),
					47=>new Jison_ParserAction($this->reduce, $table63),
					48=>new Jison_ParserAction($this->reduce, $table63),
					49=>new Jison_ParserAction($this->reduce, $table63),
					50=>new Jison_ParserAction($this->reduce, $table63),
					52=>new Jison_ParserAction($this->reduce, $table63),
					54=>new Jison_ParserAction($this->reduce, $table63),
					55=>new Jison_ParserAction($this->reduce, $table63),
					56=>new Jison_ParserAction($this->reduce, $table63),
					57=>new Jison_ParserAction($this->reduce, $table63)
				);

			$tableDefinition71 = array(
				
					10=>new Jison_ParserAction($this->none, $table39),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					15=>new Jison_ParserAction($this->shift, $table11),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					24=>new Jison_ParserAction($this->shift, $table18),
					26=>new Jison_ParserAction($this->shift, $table19),
					28=>new Jison_ParserAction($this->shift, $table20),
					30=>new Jison_ParserAction($this->shift, $table21),
					32=>new Jison_ParserAction($this->shift, $table22),
					34=>new Jison_ParserAction($this->shift, $table23),
					36=>new Jison_ParserAction($this->shift, $table24),
					38=>new Jison_ParserAction($this->shift, $table25),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					43=>new Jison_ParserAction($this->shift, $table28),
					45=>new Jison_ParserAction($this->shift, $table29),
					47=>new Jison_ParserAction($this->shift, $table30),
					48=>new Jison_ParserAction($this->shift, $table89),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition72 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table67),
					5=>new Jison_ParserAction($this->reduce, $table67),
					8=>new Jison_ParserAction($this->reduce, $table67),
					9=>new Jison_ParserAction($this->reduce, $table67),
					11=>new Jison_ParserAction($this->reduce, $table67),
					12=>new Jison_ParserAction($this->reduce, $table67),
					13=>new Jison_ParserAction($this->reduce, $table67),
					14=>new Jison_ParserAction($this->reduce, $table67),
					15=>new Jison_ParserAction($this->reduce, $table67),
					16=>new Jison_ParserAction($this->reduce, $table67),
					17=>new Jison_ParserAction($this->reduce, $table67),
					18=>new Jison_ParserAction($this->reduce, $table67),
					19=>new Jison_ParserAction($this->reduce, $table67),
					20=>new Jison_ParserAction($this->reduce, $table67),
					21=>new Jison_ParserAction($this->reduce, $table67),
					22=>new Jison_ParserAction($this->reduce, $table67),
					23=>new Jison_ParserAction($this->reduce, $table67),
					24=>new Jison_ParserAction($this->reduce, $table67),
					25=>new Jison_ParserAction($this->reduce, $table67),
					26=>new Jison_ParserAction($this->reduce, $table67),
					27=>new Jison_ParserAction($this->reduce, $table67),
					28=>new Jison_ParserAction($this->reduce, $table67),
					29=>new Jison_ParserAction($this->reduce, $table67),
					30=>new Jison_ParserAction($this->reduce, $table67),
					31=>new Jison_ParserAction($this->reduce, $table67),
					32=>new Jison_ParserAction($this->reduce, $table67),
					33=>new Jison_ParserAction($this->reduce, $table67),
					34=>new Jison_ParserAction($this->reduce, $table67),
					35=>new Jison_ParserAction($this->reduce, $table67),
					36=>new Jison_ParserAction($this->reduce, $table67),
					37=>new Jison_ParserAction($this->reduce, $table67),
					38=>new Jison_ParserAction($this->reduce, $table67),
					39=>new Jison_ParserAction($this->reduce, $table67),
					40=>new Jison_ParserAction($this->reduce, $table67),
					41=>new Jison_ParserAction($this->reduce, $table67),
					42=>new Jison_ParserAction($this->reduce, $table67),
					43=>new Jison_ParserAction($this->reduce, $table67),
					44=>new Jison_ParserAction($this->reduce, $table67),
					45=>new Jison_ParserAction($this->reduce, $table67),
					46=>new Jison_ParserAction($this->reduce, $table67),
					47=>new Jison_ParserAction($this->reduce, $table67),
					48=>new Jison_ParserAction($this->reduce, $table67),
					49=>new Jison_ParserAction($this->reduce, $table67),
					50=>new Jison_ParserAction($this->reduce, $table67),
					52=>new Jison_ParserAction($this->reduce, $table67),
					54=>new Jison_ParserAction($this->reduce, $table67),
					55=>new Jison_ParserAction($this->reduce, $table67),
					56=>new Jison_ParserAction($this->reduce, $table67),
					57=>new Jison_ParserAction($this->reduce, $table67)
				);

			$tableDefinition73 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table70),
					5=>new Jison_ParserAction($this->reduce, $table70),
					7=>new Jison_ParserAction($this->none, $table90),
					8=>new Jison_ParserAction($this->reduce, $table70),
					9=>new Jison_ParserAction($this->reduce, $table70),
					10=>new Jison_ParserAction($this->none, $table7),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					14=>new Jison_ParserAction($this->reduce, $table70),
					15=>new Jison_ParserAction($this->shift, $table11),
					16=>new Jison_ParserAction($this->reduce, $table70),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					23=>new Jison_ParserAction($this->reduce, $table70),
					24=>new Jison_ParserAction($this->shift, $table18),
					25=>new Jison_ParserAction($this->reduce, $table70),
					26=>new Jison_ParserAction($this->shift, $table19),
					27=>new Jison_ParserAction($this->reduce, $table70),
					28=>new Jison_ParserAction($this->shift, $table20),
					29=>new Jison_ParserAction($this->reduce, $table70),
					30=>new Jison_ParserAction($this->shift, $table21),
					31=>new Jison_ParserAction($this->reduce, $table70),
					32=>new Jison_ParserAction($this->shift, $table22),
					33=>new Jison_ParserAction($this->reduce, $table70),
					34=>new Jison_ParserAction($this->shift, $table23),
					35=>new Jison_ParserAction($this->reduce, $table70),
					36=>new Jison_ParserAction($this->shift, $table24),
					37=>new Jison_ParserAction($this->reduce, $table70),
					38=>new Jison_ParserAction($this->shift, $table25),
					39=>new Jison_ParserAction($this->reduce, $table70),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					42=>new Jison_ParserAction($this->reduce, $table70),
					43=>new Jison_ParserAction($this->shift, $table28),
					44=>new Jison_ParserAction($this->reduce, $table70),
					45=>new Jison_ParserAction($this->shift, $table29),
					46=>new Jison_ParserAction($this->reduce, $table70),
					47=>new Jison_ParserAction($this->shift, $table30),
					48=>new Jison_ParserAction($this->reduce, $table70),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					54=>new Jison_ParserAction($this->shift, $table91),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition74 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table8),
					5=>new Jison_ParserAction($this->reduce, $table8),
					8=>new Jison_ParserAction($this->reduce, $table8),
					11=>new Jison_ParserAction($this->reduce, $table8),
					12=>new Jison_ParserAction($this->reduce, $table8),
					13=>new Jison_ParserAction($this->reduce, $table8),
					15=>new Jison_ParserAction($this->reduce, $table8),
					17=>new Jison_ParserAction($this->reduce, $table8),
					18=>new Jison_ParserAction($this->reduce, $table8),
					19=>new Jison_ParserAction($this->reduce, $table8),
					20=>new Jison_ParserAction($this->reduce, $table8),
					21=>new Jison_ParserAction($this->reduce, $table8),
					22=>new Jison_ParserAction($this->reduce, $table8),
					24=>new Jison_ParserAction($this->reduce, $table8),
					26=>new Jison_ParserAction($this->reduce, $table8),
					28=>new Jison_ParserAction($this->reduce, $table8),
					30=>new Jison_ParserAction($this->reduce, $table8),
					32=>new Jison_ParserAction($this->reduce, $table8),
					34=>new Jison_ParserAction($this->reduce, $table8),
					36=>new Jison_ParserAction($this->reduce, $table8),
					38=>new Jison_ParserAction($this->reduce, $table8),
					40=>new Jison_ParserAction($this->reduce, $table8),
					41=>new Jison_ParserAction($this->reduce, $table8),
					43=>new Jison_ParserAction($this->reduce, $table8),
					45=>new Jison_ParserAction($this->reduce, $table8),
					47=>new Jison_ParserAction($this->reduce, $table8),
					49=>new Jison_ParserAction($this->reduce, $table8),
					50=>new Jison_ParserAction($this->reduce, $table8),
					52=>new Jison_ParserAction($this->reduce, $table8),
					55=>new Jison_ParserAction($this->reduce, $table8),
					56=>new Jison_ParserAction($this->reduce, $table8),
					57=>new Jison_ParserAction($this->reduce, $table8)
				);

			$tableDefinition75 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table16),
					5=>new Jison_ParserAction($this->reduce, $table16),
					8=>new Jison_ParserAction($this->reduce, $table16),
					9=>new Jison_ParserAction($this->reduce, $table16),
					11=>new Jison_ParserAction($this->reduce, $table16),
					12=>new Jison_ParserAction($this->reduce, $table16),
					13=>new Jison_ParserAction($this->reduce, $table16),
					14=>new Jison_ParserAction($this->reduce, $table16),
					15=>new Jison_ParserAction($this->reduce, $table16),
					16=>new Jison_ParserAction($this->reduce, $table16),
					17=>new Jison_ParserAction($this->reduce, $table16),
					18=>new Jison_ParserAction($this->reduce, $table16),
					19=>new Jison_ParserAction($this->reduce, $table16),
					20=>new Jison_ParserAction($this->reduce, $table16),
					21=>new Jison_ParserAction($this->reduce, $table16),
					22=>new Jison_ParserAction($this->reduce, $table16),
					23=>new Jison_ParserAction($this->reduce, $table16),
					24=>new Jison_ParserAction($this->reduce, $table16),
					25=>new Jison_ParserAction($this->reduce, $table16),
					26=>new Jison_ParserAction($this->reduce, $table16),
					27=>new Jison_ParserAction($this->reduce, $table16),
					28=>new Jison_ParserAction($this->reduce, $table16),
					29=>new Jison_ParserAction($this->reduce, $table16),
					30=>new Jison_ParserAction($this->reduce, $table16),
					31=>new Jison_ParserAction($this->reduce, $table16),
					32=>new Jison_ParserAction($this->reduce, $table16),
					33=>new Jison_ParserAction($this->reduce, $table16),
					34=>new Jison_ParserAction($this->reduce, $table16),
					35=>new Jison_ParserAction($this->reduce, $table16),
					36=>new Jison_ParserAction($this->reduce, $table16),
					37=>new Jison_ParserAction($this->reduce, $table16),
					38=>new Jison_ParserAction($this->reduce, $table16),
					39=>new Jison_ParserAction($this->reduce, $table16),
					40=>new Jison_ParserAction($this->reduce, $table16),
					41=>new Jison_ParserAction($this->reduce, $table16),
					42=>new Jison_ParserAction($this->reduce, $table16),
					43=>new Jison_ParserAction($this->reduce, $table16),
					44=>new Jison_ParserAction($this->reduce, $table16),
					45=>new Jison_ParserAction($this->reduce, $table16),
					46=>new Jison_ParserAction($this->reduce, $table16),
					47=>new Jison_ParserAction($this->reduce, $table16),
					48=>new Jison_ParserAction($this->reduce, $table16),
					49=>new Jison_ParserAction($this->reduce, $table16),
					50=>new Jison_ParserAction($this->reduce, $table16),
					52=>new Jison_ParserAction($this->reduce, $table16),
					54=>new Jison_ParserAction($this->reduce, $table16),
					55=>new Jison_ParserAction($this->reduce, $table16),
					56=>new Jison_ParserAction($this->reduce, $table16),
					57=>new Jison_ParserAction($this->reduce, $table16)
				);

			$tableDefinition76 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table19),
					5=>new Jison_ParserAction($this->reduce, $table19),
					8=>new Jison_ParserAction($this->reduce, $table19),
					9=>new Jison_ParserAction($this->reduce, $table19),
					11=>new Jison_ParserAction($this->reduce, $table19),
					12=>new Jison_ParserAction($this->reduce, $table19),
					13=>new Jison_ParserAction($this->reduce, $table19),
					14=>new Jison_ParserAction($this->reduce, $table19),
					15=>new Jison_ParserAction($this->reduce, $table19),
					16=>new Jison_ParserAction($this->reduce, $table19),
					17=>new Jison_ParserAction($this->reduce, $table19),
					18=>new Jison_ParserAction($this->reduce, $table19),
					19=>new Jison_ParserAction($this->reduce, $table19),
					20=>new Jison_ParserAction($this->reduce, $table19),
					21=>new Jison_ParserAction($this->reduce, $table19),
					22=>new Jison_ParserAction($this->reduce, $table19),
					23=>new Jison_ParserAction($this->reduce, $table19),
					24=>new Jison_ParserAction($this->reduce, $table19),
					25=>new Jison_ParserAction($this->reduce, $table19),
					26=>new Jison_ParserAction($this->reduce, $table19),
					27=>new Jison_ParserAction($this->reduce, $table19),
					28=>new Jison_ParserAction($this->reduce, $table19),
					29=>new Jison_ParserAction($this->reduce, $table19),
					30=>new Jison_ParserAction($this->reduce, $table19),
					31=>new Jison_ParserAction($this->reduce, $table19),
					32=>new Jison_ParserAction($this->reduce, $table19),
					33=>new Jison_ParserAction($this->reduce, $table19),
					34=>new Jison_ParserAction($this->reduce, $table19),
					35=>new Jison_ParserAction($this->reduce, $table19),
					36=>new Jison_ParserAction($this->reduce, $table19),
					37=>new Jison_ParserAction($this->reduce, $table19),
					38=>new Jison_ParserAction($this->reduce, $table19),
					39=>new Jison_ParserAction($this->reduce, $table19),
					40=>new Jison_ParserAction($this->reduce, $table19),
					41=>new Jison_ParserAction($this->reduce, $table19),
					42=>new Jison_ParserAction($this->reduce, $table19),
					43=>new Jison_ParserAction($this->reduce, $table19),
					44=>new Jison_ParserAction($this->reduce, $table19),
					45=>new Jison_ParserAction($this->reduce, $table19),
					46=>new Jison_ParserAction($this->reduce, $table19),
					47=>new Jison_ParserAction($this->reduce, $table19),
					48=>new Jison_ParserAction($this->reduce, $table19),
					49=>new Jison_ParserAction($this->reduce, $table19),
					50=>new Jison_ParserAction($this->reduce, $table19),
					52=>new Jison_ParserAction($this->reduce, $table19),
					54=>new Jison_ParserAction($this->reduce, $table19),
					55=>new Jison_ParserAction($this->reduce, $table19),
					56=>new Jison_ParserAction($this->reduce, $table19),
					57=>new Jison_ParserAction($this->reduce, $table19)
				);

			$tableDefinition77 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table27),
					5=>new Jison_ParserAction($this->reduce, $table27),
					8=>new Jison_ParserAction($this->reduce, $table27),
					9=>new Jison_ParserAction($this->reduce, $table27),
					11=>new Jison_ParserAction($this->reduce, $table27),
					12=>new Jison_ParserAction($this->reduce, $table27),
					13=>new Jison_ParserAction($this->reduce, $table27),
					14=>new Jison_ParserAction($this->reduce, $table27),
					15=>new Jison_ParserAction($this->reduce, $table27),
					16=>new Jison_ParserAction($this->reduce, $table27),
					17=>new Jison_ParserAction($this->reduce, $table27),
					18=>new Jison_ParserAction($this->reduce, $table27),
					19=>new Jison_ParserAction($this->reduce, $table27),
					20=>new Jison_ParserAction($this->reduce, $table27),
					21=>new Jison_ParserAction($this->reduce, $table27),
					22=>new Jison_ParserAction($this->reduce, $table27),
					23=>new Jison_ParserAction($this->reduce, $table27),
					24=>new Jison_ParserAction($this->reduce, $table27),
					25=>new Jison_ParserAction($this->reduce, $table27),
					26=>new Jison_ParserAction($this->reduce, $table27),
					27=>new Jison_ParserAction($this->reduce, $table27),
					28=>new Jison_ParserAction($this->reduce, $table27),
					29=>new Jison_ParserAction($this->reduce, $table27),
					30=>new Jison_ParserAction($this->reduce, $table27),
					31=>new Jison_ParserAction($this->reduce, $table27),
					32=>new Jison_ParserAction($this->reduce, $table27),
					33=>new Jison_ParserAction($this->reduce, $table27),
					34=>new Jison_ParserAction($this->reduce, $table27),
					35=>new Jison_ParserAction($this->reduce, $table27),
					36=>new Jison_ParserAction($this->reduce, $table27),
					37=>new Jison_ParserAction($this->reduce, $table27),
					38=>new Jison_ParserAction($this->reduce, $table27),
					39=>new Jison_ParserAction($this->reduce, $table27),
					40=>new Jison_ParserAction($this->reduce, $table27),
					41=>new Jison_ParserAction($this->reduce, $table27),
					42=>new Jison_ParserAction($this->reduce, $table27),
					43=>new Jison_ParserAction($this->reduce, $table27),
					44=>new Jison_ParserAction($this->reduce, $table27),
					45=>new Jison_ParserAction($this->reduce, $table27),
					46=>new Jison_ParserAction($this->reduce, $table27),
					47=>new Jison_ParserAction($this->reduce, $table27),
					48=>new Jison_ParserAction($this->reduce, $table27),
					49=>new Jison_ParserAction($this->reduce, $table27),
					50=>new Jison_ParserAction($this->reduce, $table27),
					52=>new Jison_ParserAction($this->reduce, $table27),
					54=>new Jison_ParserAction($this->reduce, $table27),
					55=>new Jison_ParserAction($this->reduce, $table27),
					56=>new Jison_ParserAction($this->reduce, $table27),
					57=>new Jison_ParserAction($this->reduce, $table27)
				);

			$tableDefinition78 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table30),
					5=>new Jison_ParserAction($this->reduce, $table30),
					8=>new Jison_ParserAction($this->reduce, $table30),
					9=>new Jison_ParserAction($this->reduce, $table30),
					11=>new Jison_ParserAction($this->reduce, $table30),
					12=>new Jison_ParserAction($this->reduce, $table30),
					13=>new Jison_ParserAction($this->reduce, $table30),
					14=>new Jison_ParserAction($this->reduce, $table30),
					15=>new Jison_ParserAction($this->reduce, $table30),
					16=>new Jison_ParserAction($this->reduce, $table30),
					17=>new Jison_ParserAction($this->reduce, $table30),
					18=>new Jison_ParserAction($this->reduce, $table30),
					19=>new Jison_ParserAction($this->reduce, $table30),
					20=>new Jison_ParserAction($this->reduce, $table30),
					21=>new Jison_ParserAction($this->reduce, $table30),
					22=>new Jison_ParserAction($this->reduce, $table30),
					23=>new Jison_ParserAction($this->reduce, $table30),
					24=>new Jison_ParserAction($this->reduce, $table30),
					25=>new Jison_ParserAction($this->reduce, $table30),
					26=>new Jison_ParserAction($this->reduce, $table30),
					27=>new Jison_ParserAction($this->reduce, $table30),
					28=>new Jison_ParserAction($this->reduce, $table30),
					29=>new Jison_ParserAction($this->reduce, $table30),
					30=>new Jison_ParserAction($this->reduce, $table30),
					31=>new Jison_ParserAction($this->reduce, $table30),
					32=>new Jison_ParserAction($this->reduce, $table30),
					33=>new Jison_ParserAction($this->reduce, $table30),
					34=>new Jison_ParserAction($this->reduce, $table30),
					35=>new Jison_ParserAction($this->reduce, $table30),
					36=>new Jison_ParserAction($this->reduce, $table30),
					37=>new Jison_ParserAction($this->reduce, $table30),
					38=>new Jison_ParserAction($this->reduce, $table30),
					39=>new Jison_ParserAction($this->reduce, $table30),
					40=>new Jison_ParserAction($this->reduce, $table30),
					41=>new Jison_ParserAction($this->reduce, $table30),
					42=>new Jison_ParserAction($this->reduce, $table30),
					43=>new Jison_ParserAction($this->reduce, $table30),
					44=>new Jison_ParserAction($this->reduce, $table30),
					45=>new Jison_ParserAction($this->reduce, $table30),
					46=>new Jison_ParserAction($this->reduce, $table30),
					47=>new Jison_ParserAction($this->reduce, $table30),
					48=>new Jison_ParserAction($this->reduce, $table30),
					49=>new Jison_ParserAction($this->reduce, $table30),
					50=>new Jison_ParserAction($this->reduce, $table30),
					52=>new Jison_ParserAction($this->reduce, $table30),
					54=>new Jison_ParserAction($this->reduce, $table30),
					55=>new Jison_ParserAction($this->reduce, $table30),
					56=>new Jison_ParserAction($this->reduce, $table30),
					57=>new Jison_ParserAction($this->reduce, $table30)
				);

			$tableDefinition79 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table33),
					5=>new Jison_ParserAction($this->reduce, $table33),
					8=>new Jison_ParserAction($this->reduce, $table33),
					9=>new Jison_ParserAction($this->reduce, $table33),
					11=>new Jison_ParserAction($this->reduce, $table33),
					12=>new Jison_ParserAction($this->reduce, $table33),
					13=>new Jison_ParserAction($this->reduce, $table33),
					14=>new Jison_ParserAction($this->reduce, $table33),
					15=>new Jison_ParserAction($this->reduce, $table33),
					16=>new Jison_ParserAction($this->reduce, $table33),
					17=>new Jison_ParserAction($this->reduce, $table33),
					18=>new Jison_ParserAction($this->reduce, $table33),
					19=>new Jison_ParserAction($this->reduce, $table33),
					20=>new Jison_ParserAction($this->reduce, $table33),
					21=>new Jison_ParserAction($this->reduce, $table33),
					22=>new Jison_ParserAction($this->reduce, $table33),
					23=>new Jison_ParserAction($this->reduce, $table33),
					24=>new Jison_ParserAction($this->reduce, $table33),
					25=>new Jison_ParserAction($this->reduce, $table33),
					26=>new Jison_ParserAction($this->reduce, $table33),
					27=>new Jison_ParserAction($this->reduce, $table33),
					28=>new Jison_ParserAction($this->reduce, $table33),
					29=>new Jison_ParserAction($this->reduce, $table33),
					30=>new Jison_ParserAction($this->reduce, $table33),
					31=>new Jison_ParserAction($this->reduce, $table33),
					32=>new Jison_ParserAction($this->reduce, $table33),
					33=>new Jison_ParserAction($this->reduce, $table33),
					34=>new Jison_ParserAction($this->reduce, $table33),
					35=>new Jison_ParserAction($this->reduce, $table33),
					36=>new Jison_ParserAction($this->reduce, $table33),
					37=>new Jison_ParserAction($this->reduce, $table33),
					38=>new Jison_ParserAction($this->reduce, $table33),
					39=>new Jison_ParserAction($this->reduce, $table33),
					40=>new Jison_ParserAction($this->reduce, $table33),
					41=>new Jison_ParserAction($this->reduce, $table33),
					42=>new Jison_ParserAction($this->reduce, $table33),
					43=>new Jison_ParserAction($this->reduce, $table33),
					44=>new Jison_ParserAction($this->reduce, $table33),
					45=>new Jison_ParserAction($this->reduce, $table33),
					46=>new Jison_ParserAction($this->reduce, $table33),
					47=>new Jison_ParserAction($this->reduce, $table33),
					48=>new Jison_ParserAction($this->reduce, $table33),
					49=>new Jison_ParserAction($this->reduce, $table33),
					50=>new Jison_ParserAction($this->reduce, $table33),
					52=>new Jison_ParserAction($this->reduce, $table33),
					54=>new Jison_ParserAction($this->reduce, $table33),
					55=>new Jison_ParserAction($this->reduce, $table33),
					56=>new Jison_ParserAction($this->reduce, $table33),
					57=>new Jison_ParserAction($this->reduce, $table33)
				);

			$tableDefinition80 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table36),
					5=>new Jison_ParserAction($this->reduce, $table36),
					8=>new Jison_ParserAction($this->reduce, $table36),
					9=>new Jison_ParserAction($this->reduce, $table36),
					11=>new Jison_ParserAction($this->reduce, $table36),
					12=>new Jison_ParserAction($this->reduce, $table36),
					13=>new Jison_ParserAction($this->reduce, $table36),
					14=>new Jison_ParserAction($this->reduce, $table36),
					15=>new Jison_ParserAction($this->reduce, $table36),
					16=>new Jison_ParserAction($this->reduce, $table36),
					17=>new Jison_ParserAction($this->reduce, $table36),
					18=>new Jison_ParserAction($this->reduce, $table36),
					19=>new Jison_ParserAction($this->reduce, $table36),
					20=>new Jison_ParserAction($this->reduce, $table36),
					21=>new Jison_ParserAction($this->reduce, $table36),
					22=>new Jison_ParserAction($this->reduce, $table36),
					23=>new Jison_ParserAction($this->reduce, $table36),
					24=>new Jison_ParserAction($this->reduce, $table36),
					25=>new Jison_ParserAction($this->reduce, $table36),
					26=>new Jison_ParserAction($this->reduce, $table36),
					27=>new Jison_ParserAction($this->reduce, $table36),
					28=>new Jison_ParserAction($this->reduce, $table36),
					29=>new Jison_ParserAction($this->reduce, $table36),
					30=>new Jison_ParserAction($this->reduce, $table36),
					31=>new Jison_ParserAction($this->reduce, $table36),
					32=>new Jison_ParserAction($this->reduce, $table36),
					33=>new Jison_ParserAction($this->reduce, $table36),
					34=>new Jison_ParserAction($this->reduce, $table36),
					35=>new Jison_ParserAction($this->reduce, $table36),
					36=>new Jison_ParserAction($this->reduce, $table36),
					37=>new Jison_ParserAction($this->reduce, $table36),
					38=>new Jison_ParserAction($this->reduce, $table36),
					39=>new Jison_ParserAction($this->reduce, $table36),
					40=>new Jison_ParserAction($this->reduce, $table36),
					41=>new Jison_ParserAction($this->reduce, $table36),
					42=>new Jison_ParserAction($this->reduce, $table36),
					43=>new Jison_ParserAction($this->reduce, $table36),
					44=>new Jison_ParserAction($this->reduce, $table36),
					45=>new Jison_ParserAction($this->reduce, $table36),
					46=>new Jison_ParserAction($this->reduce, $table36),
					47=>new Jison_ParserAction($this->reduce, $table36),
					48=>new Jison_ParserAction($this->reduce, $table36),
					49=>new Jison_ParserAction($this->reduce, $table36),
					50=>new Jison_ParserAction($this->reduce, $table36),
					52=>new Jison_ParserAction($this->reduce, $table36),
					54=>new Jison_ParserAction($this->reduce, $table36),
					55=>new Jison_ParserAction($this->reduce, $table36),
					56=>new Jison_ParserAction($this->reduce, $table36),
					57=>new Jison_ParserAction($this->reduce, $table36)
				);

			$tableDefinition81 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table39),
					5=>new Jison_ParserAction($this->reduce, $table39),
					8=>new Jison_ParserAction($this->reduce, $table39),
					9=>new Jison_ParserAction($this->reduce, $table39),
					11=>new Jison_ParserAction($this->reduce, $table39),
					12=>new Jison_ParserAction($this->reduce, $table39),
					13=>new Jison_ParserAction($this->reduce, $table39),
					14=>new Jison_ParserAction($this->reduce, $table39),
					15=>new Jison_ParserAction($this->reduce, $table39),
					16=>new Jison_ParserAction($this->reduce, $table39),
					17=>new Jison_ParserAction($this->reduce, $table39),
					18=>new Jison_ParserAction($this->reduce, $table39),
					19=>new Jison_ParserAction($this->reduce, $table39),
					20=>new Jison_ParserAction($this->reduce, $table39),
					21=>new Jison_ParserAction($this->reduce, $table39),
					22=>new Jison_ParserAction($this->reduce, $table39),
					23=>new Jison_ParserAction($this->reduce, $table39),
					24=>new Jison_ParserAction($this->reduce, $table39),
					25=>new Jison_ParserAction($this->reduce, $table39),
					26=>new Jison_ParserAction($this->reduce, $table39),
					27=>new Jison_ParserAction($this->reduce, $table39),
					28=>new Jison_ParserAction($this->reduce, $table39),
					29=>new Jison_ParserAction($this->reduce, $table39),
					30=>new Jison_ParserAction($this->reduce, $table39),
					31=>new Jison_ParserAction($this->reduce, $table39),
					32=>new Jison_ParserAction($this->reduce, $table39),
					33=>new Jison_ParserAction($this->reduce, $table39),
					34=>new Jison_ParserAction($this->reduce, $table39),
					35=>new Jison_ParserAction($this->reduce, $table39),
					36=>new Jison_ParserAction($this->reduce, $table39),
					37=>new Jison_ParserAction($this->reduce, $table39),
					38=>new Jison_ParserAction($this->reduce, $table39),
					39=>new Jison_ParserAction($this->reduce, $table39),
					40=>new Jison_ParserAction($this->reduce, $table39),
					41=>new Jison_ParserAction($this->reduce, $table39),
					42=>new Jison_ParserAction($this->reduce, $table39),
					43=>new Jison_ParserAction($this->reduce, $table39),
					44=>new Jison_ParserAction($this->reduce, $table39),
					45=>new Jison_ParserAction($this->reduce, $table39),
					46=>new Jison_ParserAction($this->reduce, $table39),
					47=>new Jison_ParserAction($this->reduce, $table39),
					48=>new Jison_ParserAction($this->reduce, $table39),
					49=>new Jison_ParserAction($this->reduce, $table39),
					50=>new Jison_ParserAction($this->reduce, $table39),
					52=>new Jison_ParserAction($this->reduce, $table39),
					54=>new Jison_ParserAction($this->reduce, $table39),
					55=>new Jison_ParserAction($this->reduce, $table39),
					56=>new Jison_ParserAction($this->reduce, $table39),
					57=>new Jison_ParserAction($this->reduce, $table39)
				);

			$tableDefinition82 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table42),
					5=>new Jison_ParserAction($this->reduce, $table42),
					8=>new Jison_ParserAction($this->reduce, $table42),
					9=>new Jison_ParserAction($this->reduce, $table42),
					11=>new Jison_ParserAction($this->reduce, $table42),
					12=>new Jison_ParserAction($this->reduce, $table42),
					13=>new Jison_ParserAction($this->reduce, $table42),
					14=>new Jison_ParserAction($this->reduce, $table42),
					15=>new Jison_ParserAction($this->reduce, $table42),
					16=>new Jison_ParserAction($this->reduce, $table42),
					17=>new Jison_ParserAction($this->reduce, $table42),
					18=>new Jison_ParserAction($this->reduce, $table42),
					19=>new Jison_ParserAction($this->reduce, $table42),
					20=>new Jison_ParserAction($this->reduce, $table42),
					21=>new Jison_ParserAction($this->reduce, $table42),
					22=>new Jison_ParserAction($this->reduce, $table42),
					23=>new Jison_ParserAction($this->reduce, $table42),
					24=>new Jison_ParserAction($this->reduce, $table42),
					25=>new Jison_ParserAction($this->reduce, $table42),
					26=>new Jison_ParserAction($this->reduce, $table42),
					27=>new Jison_ParserAction($this->reduce, $table42),
					28=>new Jison_ParserAction($this->reduce, $table42),
					29=>new Jison_ParserAction($this->reduce, $table42),
					30=>new Jison_ParserAction($this->reduce, $table42),
					31=>new Jison_ParserAction($this->reduce, $table42),
					32=>new Jison_ParserAction($this->reduce, $table42),
					33=>new Jison_ParserAction($this->reduce, $table42),
					34=>new Jison_ParserAction($this->reduce, $table42),
					35=>new Jison_ParserAction($this->reduce, $table42),
					36=>new Jison_ParserAction($this->reduce, $table42),
					37=>new Jison_ParserAction($this->reduce, $table42),
					38=>new Jison_ParserAction($this->reduce, $table42),
					39=>new Jison_ParserAction($this->reduce, $table42),
					40=>new Jison_ParserAction($this->reduce, $table42),
					41=>new Jison_ParserAction($this->reduce, $table42),
					42=>new Jison_ParserAction($this->reduce, $table42),
					43=>new Jison_ParserAction($this->reduce, $table42),
					44=>new Jison_ParserAction($this->reduce, $table42),
					45=>new Jison_ParserAction($this->reduce, $table42),
					46=>new Jison_ParserAction($this->reduce, $table42),
					47=>new Jison_ParserAction($this->reduce, $table42),
					48=>new Jison_ParserAction($this->reduce, $table42),
					49=>new Jison_ParserAction($this->reduce, $table42),
					50=>new Jison_ParserAction($this->reduce, $table42),
					52=>new Jison_ParserAction($this->reduce, $table42),
					54=>new Jison_ParserAction($this->reduce, $table42),
					55=>new Jison_ParserAction($this->reduce, $table42),
					56=>new Jison_ParserAction($this->reduce, $table42),
					57=>new Jison_ParserAction($this->reduce, $table42)
				);

			$tableDefinition83 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table45),
					5=>new Jison_ParserAction($this->reduce, $table45),
					8=>new Jison_ParserAction($this->reduce, $table45),
					9=>new Jison_ParserAction($this->reduce, $table45),
					11=>new Jison_ParserAction($this->reduce, $table45),
					12=>new Jison_ParserAction($this->reduce, $table45),
					13=>new Jison_ParserAction($this->reduce, $table45),
					14=>new Jison_ParserAction($this->reduce, $table45),
					15=>new Jison_ParserAction($this->reduce, $table45),
					16=>new Jison_ParserAction($this->reduce, $table45),
					17=>new Jison_ParserAction($this->reduce, $table45),
					18=>new Jison_ParserAction($this->reduce, $table45),
					19=>new Jison_ParserAction($this->reduce, $table45),
					20=>new Jison_ParserAction($this->reduce, $table45),
					21=>new Jison_ParserAction($this->reduce, $table45),
					22=>new Jison_ParserAction($this->reduce, $table45),
					23=>new Jison_ParserAction($this->reduce, $table45),
					24=>new Jison_ParserAction($this->reduce, $table45),
					25=>new Jison_ParserAction($this->reduce, $table45),
					26=>new Jison_ParserAction($this->reduce, $table45),
					27=>new Jison_ParserAction($this->reduce, $table45),
					28=>new Jison_ParserAction($this->reduce, $table45),
					29=>new Jison_ParserAction($this->reduce, $table45),
					30=>new Jison_ParserAction($this->reduce, $table45),
					31=>new Jison_ParserAction($this->reduce, $table45),
					32=>new Jison_ParserAction($this->reduce, $table45),
					33=>new Jison_ParserAction($this->reduce, $table45),
					34=>new Jison_ParserAction($this->reduce, $table45),
					35=>new Jison_ParserAction($this->reduce, $table45),
					36=>new Jison_ParserAction($this->reduce, $table45),
					37=>new Jison_ParserAction($this->reduce, $table45),
					38=>new Jison_ParserAction($this->reduce, $table45),
					39=>new Jison_ParserAction($this->reduce, $table45),
					40=>new Jison_ParserAction($this->reduce, $table45),
					41=>new Jison_ParserAction($this->reduce, $table45),
					42=>new Jison_ParserAction($this->reduce, $table45),
					43=>new Jison_ParserAction($this->reduce, $table45),
					44=>new Jison_ParserAction($this->reduce, $table45),
					45=>new Jison_ParserAction($this->reduce, $table45),
					46=>new Jison_ParserAction($this->reduce, $table45),
					47=>new Jison_ParserAction($this->reduce, $table45),
					48=>new Jison_ParserAction($this->reduce, $table45),
					49=>new Jison_ParserAction($this->reduce, $table45),
					50=>new Jison_ParserAction($this->reduce, $table45),
					52=>new Jison_ParserAction($this->reduce, $table45),
					54=>new Jison_ParserAction($this->reduce, $table45),
					55=>new Jison_ParserAction($this->reduce, $table45),
					56=>new Jison_ParserAction($this->reduce, $table45),
					57=>new Jison_ParserAction($this->reduce, $table45)
				);

			$tableDefinition84 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table48),
					5=>new Jison_ParserAction($this->reduce, $table48),
					8=>new Jison_ParserAction($this->reduce, $table48),
					9=>new Jison_ParserAction($this->reduce, $table48),
					11=>new Jison_ParserAction($this->reduce, $table48),
					12=>new Jison_ParserAction($this->reduce, $table48),
					13=>new Jison_ParserAction($this->reduce, $table48),
					14=>new Jison_ParserAction($this->reduce, $table48),
					15=>new Jison_ParserAction($this->reduce, $table48),
					16=>new Jison_ParserAction($this->reduce, $table48),
					17=>new Jison_ParserAction($this->reduce, $table48),
					18=>new Jison_ParserAction($this->reduce, $table48),
					19=>new Jison_ParserAction($this->reduce, $table48),
					20=>new Jison_ParserAction($this->reduce, $table48),
					21=>new Jison_ParserAction($this->reduce, $table48),
					22=>new Jison_ParserAction($this->reduce, $table48),
					23=>new Jison_ParserAction($this->reduce, $table48),
					24=>new Jison_ParserAction($this->reduce, $table48),
					25=>new Jison_ParserAction($this->reduce, $table48),
					26=>new Jison_ParserAction($this->reduce, $table48),
					27=>new Jison_ParserAction($this->reduce, $table48),
					28=>new Jison_ParserAction($this->reduce, $table48),
					29=>new Jison_ParserAction($this->reduce, $table48),
					30=>new Jison_ParserAction($this->reduce, $table48),
					31=>new Jison_ParserAction($this->reduce, $table48),
					32=>new Jison_ParserAction($this->reduce, $table48),
					33=>new Jison_ParserAction($this->reduce, $table48),
					34=>new Jison_ParserAction($this->reduce, $table48),
					35=>new Jison_ParserAction($this->reduce, $table48),
					36=>new Jison_ParserAction($this->reduce, $table48),
					37=>new Jison_ParserAction($this->reduce, $table48),
					38=>new Jison_ParserAction($this->reduce, $table48),
					39=>new Jison_ParserAction($this->reduce, $table48),
					40=>new Jison_ParserAction($this->reduce, $table48),
					41=>new Jison_ParserAction($this->reduce, $table48),
					42=>new Jison_ParserAction($this->reduce, $table48),
					43=>new Jison_ParserAction($this->reduce, $table48),
					44=>new Jison_ParserAction($this->reduce, $table48),
					45=>new Jison_ParserAction($this->reduce, $table48),
					46=>new Jison_ParserAction($this->reduce, $table48),
					47=>new Jison_ParserAction($this->reduce, $table48),
					48=>new Jison_ParserAction($this->reduce, $table48),
					49=>new Jison_ParserAction($this->reduce, $table48),
					50=>new Jison_ParserAction($this->reduce, $table48),
					52=>new Jison_ParserAction($this->reduce, $table48),
					54=>new Jison_ParserAction($this->reduce, $table48),
					55=>new Jison_ParserAction($this->reduce, $table48),
					56=>new Jison_ParserAction($this->reduce, $table48),
					57=>new Jison_ParserAction($this->reduce, $table48)
				);

			$tableDefinition85 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table51),
					5=>new Jison_ParserAction($this->reduce, $table51),
					8=>new Jison_ParserAction($this->reduce, $table51),
					9=>new Jison_ParserAction($this->reduce, $table51),
					11=>new Jison_ParserAction($this->reduce, $table51),
					12=>new Jison_ParserAction($this->reduce, $table51),
					13=>new Jison_ParserAction($this->reduce, $table51),
					14=>new Jison_ParserAction($this->reduce, $table51),
					15=>new Jison_ParserAction($this->reduce, $table51),
					16=>new Jison_ParserAction($this->reduce, $table51),
					17=>new Jison_ParserAction($this->reduce, $table51),
					18=>new Jison_ParserAction($this->reduce, $table51),
					19=>new Jison_ParserAction($this->reduce, $table51),
					20=>new Jison_ParserAction($this->reduce, $table51),
					21=>new Jison_ParserAction($this->reduce, $table51),
					22=>new Jison_ParserAction($this->reduce, $table51),
					23=>new Jison_ParserAction($this->reduce, $table51),
					24=>new Jison_ParserAction($this->reduce, $table51),
					25=>new Jison_ParserAction($this->reduce, $table51),
					26=>new Jison_ParserAction($this->reduce, $table51),
					27=>new Jison_ParserAction($this->reduce, $table51),
					28=>new Jison_ParserAction($this->reduce, $table51),
					29=>new Jison_ParserAction($this->reduce, $table51),
					30=>new Jison_ParserAction($this->reduce, $table51),
					31=>new Jison_ParserAction($this->reduce, $table51),
					32=>new Jison_ParserAction($this->reduce, $table51),
					33=>new Jison_ParserAction($this->reduce, $table51),
					34=>new Jison_ParserAction($this->reduce, $table51),
					35=>new Jison_ParserAction($this->reduce, $table51),
					36=>new Jison_ParserAction($this->reduce, $table51),
					37=>new Jison_ParserAction($this->reduce, $table51),
					38=>new Jison_ParserAction($this->reduce, $table51),
					39=>new Jison_ParserAction($this->reduce, $table51),
					40=>new Jison_ParserAction($this->reduce, $table51),
					41=>new Jison_ParserAction($this->reduce, $table51),
					42=>new Jison_ParserAction($this->reduce, $table51),
					43=>new Jison_ParserAction($this->reduce, $table51),
					44=>new Jison_ParserAction($this->reduce, $table51),
					45=>new Jison_ParserAction($this->reduce, $table51),
					46=>new Jison_ParserAction($this->reduce, $table51),
					47=>new Jison_ParserAction($this->reduce, $table51),
					48=>new Jison_ParserAction($this->reduce, $table51),
					49=>new Jison_ParserAction($this->reduce, $table51),
					50=>new Jison_ParserAction($this->reduce, $table51),
					52=>new Jison_ParserAction($this->reduce, $table51),
					54=>new Jison_ParserAction($this->reduce, $table51),
					55=>new Jison_ParserAction($this->reduce, $table51),
					56=>new Jison_ParserAction($this->reduce, $table51),
					57=>new Jison_ParserAction($this->reduce, $table51)
				);

			$tableDefinition86 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table55),
					5=>new Jison_ParserAction($this->reduce, $table55),
					8=>new Jison_ParserAction($this->reduce, $table55),
					9=>new Jison_ParserAction($this->reduce, $table55),
					11=>new Jison_ParserAction($this->reduce, $table55),
					12=>new Jison_ParserAction($this->reduce, $table55),
					13=>new Jison_ParserAction($this->reduce, $table55),
					14=>new Jison_ParserAction($this->reduce, $table55),
					15=>new Jison_ParserAction($this->reduce, $table55),
					16=>new Jison_ParserAction($this->reduce, $table55),
					17=>new Jison_ParserAction($this->reduce, $table55),
					18=>new Jison_ParserAction($this->reduce, $table55),
					19=>new Jison_ParserAction($this->reduce, $table55),
					20=>new Jison_ParserAction($this->reduce, $table55),
					21=>new Jison_ParserAction($this->reduce, $table55),
					22=>new Jison_ParserAction($this->reduce, $table55),
					23=>new Jison_ParserAction($this->reduce, $table55),
					24=>new Jison_ParserAction($this->reduce, $table55),
					25=>new Jison_ParserAction($this->reduce, $table55),
					26=>new Jison_ParserAction($this->reduce, $table55),
					27=>new Jison_ParserAction($this->reduce, $table55),
					28=>new Jison_ParserAction($this->reduce, $table55),
					29=>new Jison_ParserAction($this->reduce, $table55),
					30=>new Jison_ParserAction($this->reduce, $table55),
					31=>new Jison_ParserAction($this->reduce, $table55),
					32=>new Jison_ParserAction($this->reduce, $table55),
					33=>new Jison_ParserAction($this->reduce, $table55),
					34=>new Jison_ParserAction($this->reduce, $table55),
					35=>new Jison_ParserAction($this->reduce, $table55),
					36=>new Jison_ParserAction($this->reduce, $table55),
					37=>new Jison_ParserAction($this->reduce, $table55),
					38=>new Jison_ParserAction($this->reduce, $table55),
					39=>new Jison_ParserAction($this->reduce, $table55),
					40=>new Jison_ParserAction($this->reduce, $table55),
					41=>new Jison_ParserAction($this->reduce, $table55),
					42=>new Jison_ParserAction($this->reduce, $table55),
					43=>new Jison_ParserAction($this->reduce, $table55),
					44=>new Jison_ParserAction($this->reduce, $table55),
					45=>new Jison_ParserAction($this->reduce, $table55),
					46=>new Jison_ParserAction($this->reduce, $table55),
					47=>new Jison_ParserAction($this->reduce, $table55),
					48=>new Jison_ParserAction($this->reduce, $table55),
					49=>new Jison_ParserAction($this->reduce, $table55),
					50=>new Jison_ParserAction($this->reduce, $table55),
					52=>new Jison_ParserAction($this->reduce, $table55),
					54=>new Jison_ParserAction($this->reduce, $table55),
					55=>new Jison_ParserAction($this->reduce, $table55),
					56=>new Jison_ParserAction($this->reduce, $table55),
					57=>new Jison_ParserAction($this->reduce, $table55)
				);

			$tableDefinition87 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table58),
					5=>new Jison_ParserAction($this->reduce, $table58),
					8=>new Jison_ParserAction($this->reduce, $table58),
					9=>new Jison_ParserAction($this->reduce, $table58),
					11=>new Jison_ParserAction($this->reduce, $table58),
					12=>new Jison_ParserAction($this->reduce, $table58),
					13=>new Jison_ParserAction($this->reduce, $table58),
					14=>new Jison_ParserAction($this->reduce, $table58),
					15=>new Jison_ParserAction($this->reduce, $table58),
					16=>new Jison_ParserAction($this->reduce, $table58),
					17=>new Jison_ParserAction($this->reduce, $table58),
					18=>new Jison_ParserAction($this->reduce, $table58),
					19=>new Jison_ParserAction($this->reduce, $table58),
					20=>new Jison_ParserAction($this->reduce, $table58),
					21=>new Jison_ParserAction($this->reduce, $table58),
					22=>new Jison_ParserAction($this->reduce, $table58),
					23=>new Jison_ParserAction($this->reduce, $table58),
					24=>new Jison_ParserAction($this->reduce, $table58),
					25=>new Jison_ParserAction($this->reduce, $table58),
					26=>new Jison_ParserAction($this->reduce, $table58),
					27=>new Jison_ParserAction($this->reduce, $table58),
					28=>new Jison_ParserAction($this->reduce, $table58),
					29=>new Jison_ParserAction($this->reduce, $table58),
					30=>new Jison_ParserAction($this->reduce, $table58),
					31=>new Jison_ParserAction($this->reduce, $table58),
					32=>new Jison_ParserAction($this->reduce, $table58),
					33=>new Jison_ParserAction($this->reduce, $table58),
					34=>new Jison_ParserAction($this->reduce, $table58),
					35=>new Jison_ParserAction($this->reduce, $table58),
					36=>new Jison_ParserAction($this->reduce, $table58),
					37=>new Jison_ParserAction($this->reduce, $table58),
					38=>new Jison_ParserAction($this->reduce, $table58),
					39=>new Jison_ParserAction($this->reduce, $table58),
					40=>new Jison_ParserAction($this->reduce, $table58),
					41=>new Jison_ParserAction($this->reduce, $table58),
					42=>new Jison_ParserAction($this->reduce, $table58),
					43=>new Jison_ParserAction($this->reduce, $table58),
					44=>new Jison_ParserAction($this->reduce, $table58),
					45=>new Jison_ParserAction($this->reduce, $table58),
					46=>new Jison_ParserAction($this->reduce, $table58),
					47=>new Jison_ParserAction($this->reduce, $table58),
					48=>new Jison_ParserAction($this->reduce, $table58),
					49=>new Jison_ParserAction($this->reduce, $table58),
					50=>new Jison_ParserAction($this->reduce, $table58),
					52=>new Jison_ParserAction($this->reduce, $table58),
					54=>new Jison_ParserAction($this->reduce, $table58),
					55=>new Jison_ParserAction($this->reduce, $table58),
					56=>new Jison_ParserAction($this->reduce, $table58),
					57=>new Jison_ParserAction($this->reduce, $table58)
				);

			$tableDefinition88 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table61),
					5=>new Jison_ParserAction($this->reduce, $table61),
					8=>new Jison_ParserAction($this->reduce, $table61),
					9=>new Jison_ParserAction($this->reduce, $table61),
					11=>new Jison_ParserAction($this->reduce, $table61),
					12=>new Jison_ParserAction($this->reduce, $table61),
					13=>new Jison_ParserAction($this->reduce, $table61),
					14=>new Jison_ParserAction($this->reduce, $table61),
					15=>new Jison_ParserAction($this->reduce, $table61),
					16=>new Jison_ParserAction($this->reduce, $table61),
					17=>new Jison_ParserAction($this->reduce, $table61),
					18=>new Jison_ParserAction($this->reduce, $table61),
					19=>new Jison_ParserAction($this->reduce, $table61),
					20=>new Jison_ParserAction($this->reduce, $table61),
					21=>new Jison_ParserAction($this->reduce, $table61),
					22=>new Jison_ParserAction($this->reduce, $table61),
					23=>new Jison_ParserAction($this->reduce, $table61),
					24=>new Jison_ParserAction($this->reduce, $table61),
					25=>new Jison_ParserAction($this->reduce, $table61),
					26=>new Jison_ParserAction($this->reduce, $table61),
					27=>new Jison_ParserAction($this->reduce, $table61),
					28=>new Jison_ParserAction($this->reduce, $table61),
					29=>new Jison_ParserAction($this->reduce, $table61),
					30=>new Jison_ParserAction($this->reduce, $table61),
					31=>new Jison_ParserAction($this->reduce, $table61),
					32=>new Jison_ParserAction($this->reduce, $table61),
					33=>new Jison_ParserAction($this->reduce, $table61),
					34=>new Jison_ParserAction($this->reduce, $table61),
					35=>new Jison_ParserAction($this->reduce, $table61),
					36=>new Jison_ParserAction($this->reduce, $table61),
					37=>new Jison_ParserAction($this->reduce, $table61),
					38=>new Jison_ParserAction($this->reduce, $table61),
					39=>new Jison_ParserAction($this->reduce, $table61),
					40=>new Jison_ParserAction($this->reduce, $table61),
					41=>new Jison_ParserAction($this->reduce, $table61),
					42=>new Jison_ParserAction($this->reduce, $table61),
					43=>new Jison_ParserAction($this->reduce, $table61),
					44=>new Jison_ParserAction($this->reduce, $table61),
					45=>new Jison_ParserAction($this->reduce, $table61),
					46=>new Jison_ParserAction($this->reduce, $table61),
					47=>new Jison_ParserAction($this->reduce, $table61),
					48=>new Jison_ParserAction($this->reduce, $table61),
					49=>new Jison_ParserAction($this->reduce, $table61),
					50=>new Jison_ParserAction($this->reduce, $table61),
					52=>new Jison_ParserAction($this->reduce, $table61),
					54=>new Jison_ParserAction($this->reduce, $table61),
					55=>new Jison_ParserAction($this->reduce, $table61),
					56=>new Jison_ParserAction($this->reduce, $table61),
					57=>new Jison_ParserAction($this->reduce, $table61)
				);

			$tableDefinition89 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table64),
					5=>new Jison_ParserAction($this->reduce, $table64),
					8=>new Jison_ParserAction($this->reduce, $table64),
					9=>new Jison_ParserAction($this->reduce, $table64),
					11=>new Jison_ParserAction($this->reduce, $table64),
					12=>new Jison_ParserAction($this->reduce, $table64),
					13=>new Jison_ParserAction($this->reduce, $table64),
					14=>new Jison_ParserAction($this->reduce, $table64),
					15=>new Jison_ParserAction($this->reduce, $table64),
					16=>new Jison_ParserAction($this->reduce, $table64),
					17=>new Jison_ParserAction($this->reduce, $table64),
					18=>new Jison_ParserAction($this->reduce, $table64),
					19=>new Jison_ParserAction($this->reduce, $table64),
					20=>new Jison_ParserAction($this->reduce, $table64),
					21=>new Jison_ParserAction($this->reduce, $table64),
					22=>new Jison_ParserAction($this->reduce, $table64),
					23=>new Jison_ParserAction($this->reduce, $table64),
					24=>new Jison_ParserAction($this->reduce, $table64),
					25=>new Jison_ParserAction($this->reduce, $table64),
					26=>new Jison_ParserAction($this->reduce, $table64),
					27=>new Jison_ParserAction($this->reduce, $table64),
					28=>new Jison_ParserAction($this->reduce, $table64),
					29=>new Jison_ParserAction($this->reduce, $table64),
					30=>new Jison_ParserAction($this->reduce, $table64),
					31=>new Jison_ParserAction($this->reduce, $table64),
					32=>new Jison_ParserAction($this->reduce, $table64),
					33=>new Jison_ParserAction($this->reduce, $table64),
					34=>new Jison_ParserAction($this->reduce, $table64),
					35=>new Jison_ParserAction($this->reduce, $table64),
					36=>new Jison_ParserAction($this->reduce, $table64),
					37=>new Jison_ParserAction($this->reduce, $table64),
					38=>new Jison_ParserAction($this->reduce, $table64),
					39=>new Jison_ParserAction($this->reduce, $table64),
					40=>new Jison_ParserAction($this->reduce, $table64),
					41=>new Jison_ParserAction($this->reduce, $table64),
					42=>new Jison_ParserAction($this->reduce, $table64),
					43=>new Jison_ParserAction($this->reduce, $table64),
					44=>new Jison_ParserAction($this->reduce, $table64),
					45=>new Jison_ParserAction($this->reduce, $table64),
					46=>new Jison_ParserAction($this->reduce, $table64),
					47=>new Jison_ParserAction($this->reduce, $table64),
					48=>new Jison_ParserAction($this->reduce, $table64),
					49=>new Jison_ParserAction($this->reduce, $table64),
					50=>new Jison_ParserAction($this->reduce, $table64),
					52=>new Jison_ParserAction($this->reduce, $table64),
					54=>new Jison_ParserAction($this->reduce, $table64),
					55=>new Jison_ParserAction($this->reduce, $table64),
					56=>new Jison_ParserAction($this->reduce, $table64),
					57=>new Jison_ParserAction($this->reduce, $table64)
				);

			$tableDefinition90 = array(
				
					10=>new Jison_ParserAction($this->none, $table39),
					11=>new Jison_ParserAction($this->shift, $table8),
					12=>new Jison_ParserAction($this->shift, $table9),
					13=>new Jison_ParserAction($this->shift, $table10),
					15=>new Jison_ParserAction($this->shift, $table11),
					17=>new Jison_ParserAction($this->shift, $table12),
					18=>new Jison_ParserAction($this->shift, $table13),
					19=>new Jison_ParserAction($this->shift, $table14),
					20=>new Jison_ParserAction($this->shift, $table15),
					21=>new Jison_ParserAction($this->shift, $table16),
					22=>new Jison_ParserAction($this->shift, $table17),
					24=>new Jison_ParserAction($this->shift, $table18),
					26=>new Jison_ParserAction($this->shift, $table19),
					28=>new Jison_ParserAction($this->shift, $table20),
					30=>new Jison_ParserAction($this->shift, $table21),
					32=>new Jison_ParserAction($this->shift, $table22),
					34=>new Jison_ParserAction($this->shift, $table23),
					36=>new Jison_ParserAction($this->shift, $table24),
					38=>new Jison_ParserAction($this->shift, $table25),
					40=>new Jison_ParserAction($this->shift, $table26),
					41=>new Jison_ParserAction($this->shift, $table27),
					43=>new Jison_ParserAction($this->shift, $table28),
					45=>new Jison_ParserAction($this->shift, $table29),
					47=>new Jison_ParserAction($this->shift, $table30),
					49=>new Jison_ParserAction($this->shift, $table31),
					50=>new Jison_ParserAction($this->shift, $table32),
					52=>new Jison_ParserAction($this->shift, $table33),
					54=>new Jison_ParserAction($this->shift, $table92),
					55=>new Jison_ParserAction($this->shift, $table34),
					56=>new Jison_ParserAction($this->shift, $table35),
					57=>new Jison_ParserAction($this->shift, $table36)
				);

			$tableDefinition91 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table69),
					5=>new Jison_ParserAction($this->reduce, $table69),
					8=>new Jison_ParserAction($this->reduce, $table69),
					9=>new Jison_ParserAction($this->reduce, $table69),
					11=>new Jison_ParserAction($this->reduce, $table69),
					12=>new Jison_ParserAction($this->reduce, $table69),
					13=>new Jison_ParserAction($this->reduce, $table69),
					14=>new Jison_ParserAction($this->reduce, $table69),
					15=>new Jison_ParserAction($this->reduce, $table69),
					16=>new Jison_ParserAction($this->reduce, $table69),
					17=>new Jison_ParserAction($this->reduce, $table69),
					18=>new Jison_ParserAction($this->reduce, $table69),
					19=>new Jison_ParserAction($this->reduce, $table69),
					20=>new Jison_ParserAction($this->reduce, $table69),
					21=>new Jison_ParserAction($this->reduce, $table69),
					22=>new Jison_ParserAction($this->reduce, $table69),
					23=>new Jison_ParserAction($this->reduce, $table69),
					24=>new Jison_ParserAction($this->reduce, $table69),
					25=>new Jison_ParserAction($this->reduce, $table69),
					26=>new Jison_ParserAction($this->reduce, $table69),
					27=>new Jison_ParserAction($this->reduce, $table69),
					28=>new Jison_ParserAction($this->reduce, $table69),
					29=>new Jison_ParserAction($this->reduce, $table69),
					30=>new Jison_ParserAction($this->reduce, $table69),
					31=>new Jison_ParserAction($this->reduce, $table69),
					32=>new Jison_ParserAction($this->reduce, $table69),
					33=>new Jison_ParserAction($this->reduce, $table69),
					34=>new Jison_ParserAction($this->reduce, $table69),
					35=>new Jison_ParserAction($this->reduce, $table69),
					36=>new Jison_ParserAction($this->reduce, $table69),
					37=>new Jison_ParserAction($this->reduce, $table69),
					38=>new Jison_ParserAction($this->reduce, $table69),
					39=>new Jison_ParserAction($this->reduce, $table69),
					40=>new Jison_ParserAction($this->reduce, $table69),
					41=>new Jison_ParserAction($this->reduce, $table69),
					42=>new Jison_ParserAction($this->reduce, $table69),
					43=>new Jison_ParserAction($this->reduce, $table69),
					44=>new Jison_ParserAction($this->reduce, $table69),
					45=>new Jison_ParserAction($this->reduce, $table69),
					46=>new Jison_ParserAction($this->reduce, $table69),
					47=>new Jison_ParserAction($this->reduce, $table69),
					48=>new Jison_ParserAction($this->reduce, $table69),
					49=>new Jison_ParserAction($this->reduce, $table69),
					50=>new Jison_ParserAction($this->reduce, $table69),
					52=>new Jison_ParserAction($this->reduce, $table69),
					54=>new Jison_ParserAction($this->reduce, $table69),
					55=>new Jison_ParserAction($this->reduce, $table69),
					56=>new Jison_ParserAction($this->reduce, $table69),
					57=>new Jison_ParserAction($this->reduce, $table69)
				);

			$tableDefinition92 = array(
				
					1=>new Jison_ParserAction($this->reduce, $table68),
					5=>new Jison_ParserAction($this->reduce, $table68),
					8=>new Jison_ParserAction($this->reduce, $table68),
					9=>new Jison_ParserAction($this->reduce, $table68),
					11=>new Jison_ParserAction($this->reduce, $table68),
					12=>new Jison_ParserAction($this->reduce, $table68),
					13=>new Jison_ParserAction($this->reduce, $table68),
					14=>new Jison_ParserAction($this->reduce, $table68),
					15=>new Jison_ParserAction($this->reduce, $table68),
					16=>new Jison_ParserAction($this->reduce, $table68),
					17=>new Jison_ParserAction($this->reduce, $table68),
					18=>new Jison_ParserAction($this->reduce, $table68),
					19=>new Jison_ParserAction($this->reduce, $table68),
					20=>new Jison_ParserAction($this->reduce, $table68),
					21=>new Jison_ParserAction($this->reduce, $table68),
					22=>new Jison_ParserAction($this->reduce, $table68),
					23=>new Jison_ParserAction($this->reduce, $table68),
					24=>new Jison_ParserAction($this->reduce, $table68),
					25=>new Jison_ParserAction($this->reduce, $table68),
					26=>new Jison_ParserAction($this->reduce, $table68),
					27=>new Jison_ParserAction($this->reduce, $table68),
					28=>new Jison_ParserAction($this->reduce, $table68),
					29=>new Jison_ParserAction($this->reduce, $table68),
					30=>new Jison_ParserAction($this->reduce, $table68),
					31=>new Jison_ParserAction($this->reduce, $table68),
					32=>new Jison_ParserAction($this->reduce, $table68),
					33=>new Jison_ParserAction($this->reduce, $table68),
					34=>new Jison_ParserAction($this->reduce, $table68),
					35=>new Jison_ParserAction($this->reduce, $table68),
					36=>new Jison_ParserAction($this->reduce, $table68),
					37=>new Jison_ParserAction($this->reduce, $table68),
					38=>new Jison_ParserAction($this->reduce, $table68),
					39=>new Jison_ParserAction($this->reduce, $table68),
					40=>new Jison_ParserAction($this->reduce, $table68),
					41=>new Jison_ParserAction($this->reduce, $table68),
					42=>new Jison_ParserAction($this->reduce, $table68),
					43=>new Jison_ParserAction($this->reduce, $table68),
					44=>new Jison_ParserAction($this->reduce, $table68),
					45=>new Jison_ParserAction($this->reduce, $table68),
					46=>new Jison_ParserAction($this->reduce, $table68),
					47=>new Jison_ParserAction($this->reduce, $table68),
					48=>new Jison_ParserAction($this->reduce, $table68),
					49=>new Jison_ParserAction($this->reduce, $table68),
					50=>new Jison_ParserAction($this->reduce, $table68),
					52=>new Jison_ParserAction($this->reduce, $table68),
					54=>new Jison_ParserAction($this->reduce, $table68),
					55=>new Jison_ParserAction($this->reduce, $table68),
					56=>new Jison_ParserAction($this->reduce, $table68),
					57=>new Jison_ParserAction($this->reduce, $table68)
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
					92=>$table92
				);

			$this->defaultActions = array(
				
					3=>new Jison_ParserAction($this->reduce, $table3),
					37=>new Jison_ParserAction($this->reduce, $table2)
				);

			$this->productions = array(
				
					0=>new Jison_ParserProduction($symbol0),
					1=>new Jison_ParserProduction($symbol3,1),
					2=>new Jison_ParserProduction($symbol3,2),
					3=>new Jison_ParserProduction($symbol3,1),
					4=>new Jison_ParserProduction($symbol4,1),
					5=>new Jison_ParserProduction($symbol4,2),
					6=>new Jison_ParserProduction($symbol6,1),
					7=>new Jison_ParserProduction($symbol6,2),
					8=>new Jison_ParserProduction($symbol6,3),
					9=>new Jison_ParserProduction($symbol6,1),
					10=>new Jison_ParserProduction($symbol7,1),
					11=>new Jison_ParserProduction($symbol7,2),
					12=>new Jison_ParserProduction($symbol10,1),
					13=>new Jison_ParserProduction($symbol10,1),
					14=>new Jison_ParserProduction($symbol10,1),
					15=>new Jison_ParserProduction($symbol10,2),
					16=>new Jison_ParserProduction($symbol10,3),
					17=>new Jison_ParserProduction($symbol10,1),
					18=>new Jison_ParserProduction($symbol10,2),
					19=>new Jison_ParserProduction($symbol10,3),
					20=>new Jison_ParserProduction($symbol10,1),
					21=>new Jison_ParserProduction($symbol10,1),
					22=>new Jison_ParserProduction($symbol10,1),
					23=>new Jison_ParserProduction($symbol10,1),
					24=>new Jison_ParserProduction($symbol10,1),
					25=>new Jison_ParserProduction($symbol10,1),
					26=>new Jison_ParserProduction($symbol10,2),
					27=>new Jison_ParserProduction($symbol10,3),
					28=>new Jison_ParserProduction($symbol10,1),
					29=>new Jison_ParserProduction($symbol10,2),
					30=>new Jison_ParserProduction($symbol10,3),
					31=>new Jison_ParserProduction($symbol10,1),
					32=>new Jison_ParserProduction($symbol10,2),
					33=>new Jison_ParserProduction($symbol10,3),
					34=>new Jison_ParserProduction($symbol10,1),
					35=>new Jison_ParserProduction($symbol10,2),
					36=>new Jison_ParserProduction($symbol10,3),
					37=>new Jison_ParserProduction($symbol10,1),
					38=>new Jison_ParserProduction($symbol10,2),
					39=>new Jison_ParserProduction($symbol10,3),
					40=>new Jison_ParserProduction($symbol10,1),
					41=>new Jison_ParserProduction($symbol10,2),
					42=>new Jison_ParserProduction($symbol10,3),
					43=>new Jison_ParserProduction($symbol10,1),
					44=>new Jison_ParserProduction($symbol10,2),
					45=>new Jison_ParserProduction($symbol10,3),
					46=>new Jison_ParserProduction($symbol10,1),
					47=>new Jison_ParserProduction($symbol10,2),
					48=>new Jison_ParserProduction($symbol10,3),
					49=>new Jison_ParserProduction($symbol10,1),
					50=>new Jison_ParserProduction($symbol10,2),
					51=>new Jison_ParserProduction($symbol10,3),
					52=>new Jison_ParserProduction($symbol10,1),
					53=>new Jison_ParserProduction($symbol10,1),
					54=>new Jison_ParserProduction($symbol10,2),
					55=>new Jison_ParserProduction($symbol10,3),
					56=>new Jison_ParserProduction($symbol10,1),
					57=>new Jison_ParserProduction($symbol10,2),
					58=>new Jison_ParserProduction($symbol10,3),
					59=>new Jison_ParserProduction($symbol10,1),
					60=>new Jison_ParserProduction($symbol10,2),
					61=>new Jison_ParserProduction($symbol10,3),
					62=>new Jison_ParserProduction($symbol10,1),
					63=>new Jison_ParserProduction($symbol10,2),
					64=>new Jison_ParserProduction($symbol10,3),
					65=>new Jison_ParserProduction($symbol10,1),
					66=>new Jison_ParserProduction($symbol10,1),
					67=>new Jison_ParserProduction($symbol10,2),
					68=>new Jison_ParserProduction($symbol10,4),
					69=>new Jison_ParserProduction($symbol10,3),
					70=>new Jison_ParserProduction($symbol10,2),
					71=>new Jison_ParserProduction($symbol10,1),
					72=>new Jison_ParserProduction($symbol10,1),
					73=>new Jison_ParserProduction($symbol10,1),
					74=>new Jison_ParserProduction($symbol10,1)
				);




        //Setup Lexer
        
			$this->rules = array(
				
					0=>"/^(?:$)/",
					1=>"/^(?:~\/np~)/",
					2=>"/^(?:~np~)/",
					3=>"/^(?:$)/",
					4=>"/^(?:~\/pp~)/",
					5=>"/^(?:~pp~)/",
					6=>"/^(?:~tc~((.|\n)+)~\/tc~)/",
					7=>"/^(?:[%][%](([0-9A-Za-z ]{3,}))[%][%])/",
					8=>"/^(?:[%](([0-9A-Za-z ]{3,}))[%])/",
					9=>"/^(?:\{\{(([0-9A-Za-z ]{3,}))([|](([0-9A-Za-z ]{3,})))?\}\})/",
					10=>"/^(?:\{rm\})/",
					11=>"/^(?:\{ELSE\})/",
					12=>"/^(?:((\n))(\{r2l\}|\{l2r\}))/",
					13=>"/^(?:(.+?\}))/",
					14=>"/^(?:\{([a-z_]+))/",
					15=>"/^(?:.*?\)\})/",
					16=>"/^(?:\{([A-Z_]+)\()/",
					17=>"/^(?:$)/",
					18=>"/^(?:\{([A-Z_]+)\})/",
					19=>"/^(?:$)/",
					20=>"/^(?:(?=((\n))))/",
					21=>"/^(?:((\n))(?=(([\!*#+;]))))/",
					22=>"/^(?:((\n)))/",
					23=>"/^(?:---)/",
					24=>"/^(?:%%%)/",
					25=>"/^(?:$)/",
					26=>"/^(?:[_][_])/",
					27=>"/^(?:[_][_])/",
					28=>"/^(?:$)/",
					29=>"/^(?:[\^])/",
					30=>"/^(?:[\^])/",
					31=>"/^(?:$)/",
					32=>"/^(?:[:][:])/",
					33=>"/^(?:[:][:])/",
					34=>"/^(?:$)/",
					35=>"/^(?:\+-)/",
					36=>"/^(?:-\+)/",
					37=>"/^(?:$)/",
					38=>"/^(?:[\~][\~])/",
					39=>"/^(?:[\~][\~])/",
					40=>"/^(?:$)/",
					41=>"/^(?:[']['])/",
					42=>"/^(?:[']['])/",
					43=>"/^(?:$)/",
					44=>"/^(?:(@np|\]\]|\]))/",
					45=>"/^(?:\[\[)/",
					46=>"/^(?:$)/",
					47=>"/^(?:\])/",
					48=>"/^(?:\[(?![ ]))/",
					49=>"/^(?:$)/",
					50=>"/^(?:[-][-])/",
					51=>"/^(?:[-][-](?![ ]|$))/",
					52=>"/^(?:[ ][-][-][ ])/",
					53=>"/^(?:$)/",
					54=>"/^(?:[|][|])/",
					55=>"/^(?:[|][|])/",
					56=>"/^(?:$)/",
					57=>"/^(?:[=][-])/",
					58=>"/^(?:[-][=])/",
					59=>"/^(?:$)/",
					60=>"/^(?:[=][=][=])/",
					61=>"/^(?:[=][=][=])/",
					62=>"/^(?:$)/",
					63=>"/^(?:\)\)|\(\()/",
					64=>"/^(?:\(\()/",
					65=>"/^(?:\)\))/",
					66=>"/^(?:\(((([a-z0-9-]+)))\()/",
					67=>"/^(?:(?:[ \n\t\r\,\;]|^)(([A-Z]{1,}[a-z_\-\x80-\xFF]{1,}){2,})(?=$|[ \n\t\r\,\;\.]))/",
					68=>"/^(?:&)/",
					69=>"/^(?:[<](.|\n)*?[>])/",
					70=>"/^(?:≤REAL_EOF≥)/",
					71=>"/^(?:≤REAL_LT≥(.|\n)*?≤REAL_GT≥)/",
					72=>"/^(?:(§[a-z0-9]{32}§))/",
					73=>"/^(?:(≤(.)+≥))/",
					74=>"/^(?:([A-Za-z0-9 .,?;]+))/",
					75=>"/^(?:(?!([{}\n_\^:\~'-|=\(\)\[\]*#+%<≤]))(((.?)))?(?=([{}\n_\^:\~'-|=\(\)\[\]*#+%<≤])))/",
					76=>"/^(?:([ ]+?))/",
					77=>"/^(?:(~bs~|~BS~))/",
					78=>"/^(?:(~hs~|~HS~))/",
					79=>"/^(?:(~amp~|~amp~))/",
					80=>"/^(?:(~ldq~|~LDQ~))/",
					81=>"/^(?:(~rdq~|~RDQ~))/",
					82=>"/^(?:(~lsq~|~LSQ~))/",
					83=>"/^(?:(~rsq~|~RSQ~))/",
					84=>"/^(?:(~c~|~C~))/",
					85=>"/^(?:~--~)/",
					86=>"/^(?:=>)/",
					87=>"/^(?:(~lt~|~LT~))/",
					88=>"/^(?:(~gt~|~GT~))/",
					89=>"/^(?:\{([0-9]+)\})/",
					90=>"/^(?:(.))/",
					91=>"/^(?:$)/"
				);

			$this->conditions = array(
				
					"np"=>new Jison_LexerConditions(array( 0,1,2,5,6,7,8,9,10,11,12,14,16,21,22,23,24,27,30,33,36,39,42,45,48,51,52,55,58,61,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91), true),
					"pp"=>new Jison_LexerConditions(array( 2,3,4,5,6,7,8,9,10,11,12,14,16,21,22,23,24,27,30,33,36,39,42,45,48,51,52,55,58,61,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91), true),
					"pluginStart"=>new Jison_LexerConditions(array( 2,5,6,7,8,9,10,11,12,14,15,16,21,22,23,24,27,30,33,36,39,42,45,48,51,52,55,58,61,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91), true),
					"plugin"=>new Jison_LexerConditions(array( 2,5,6,7,8,9,10,11,12,14,16,17,18,21,22,23,24,27,30,33,36,39,42,45,48,51,52,55,58,61,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91), true),
					"inlinePlugin"=>new Jison_LexerConditions(array( 2,5,6,7,8,9,10,11,12,13,14,16,21,22,23,24,27,30,33,36,39,42,45,48,51,52,55,58,61,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91), true),
					"line"=>new Jison_LexerConditions(array( 2,5,6,7,8,9,10,11,12,14,16,21,22,23,24,27,30,33,36,39,42,45,48,51,52,55,58,61,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91), true),
					"block"=>new Jison_LexerConditions(array( 2,5,6,7,8,9,10,11,12,14,16,19,20,21,22,23,24,27,30,33,36,39,42,45,48,51,52,55,58,61,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91), true),
					"bold"=>new Jison_LexerConditions(array( 2,5,6,7,8,9,10,11,12,14,16,21,22,23,24,25,26,27,30,33,36,39,42,45,48,51,52,55,58,61,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91), true),
					"box"=>new Jison_LexerConditions(array( 2,5,6,7,8,9,10,11,12,14,16,21,22,23,24,27,28,29,30,33,36,39,42,45,48,51,52,55,58,61,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91), true),
					"center"=>new Jison_LexerConditions(array( 2,5,6,7,8,9,10,11,12,14,16,21,22,23,24,27,30,31,32,33,36,39,42,45,48,51,52,55,58,61,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91), true),
					"code"=>new Jison_LexerConditions(array( 2,5,6,7,8,9,10,11,12,14,16,21,22,23,24,27,30,33,34,35,36,39,42,45,48,51,52,55,58,61,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91), true),
					"color"=>new Jison_LexerConditions(array( 2,5,6,7,8,9,10,11,12,14,16,21,22,23,24,27,30,33,36,37,38,39,42,45,48,51,52,55,58,61,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91), true),
					"italic"=>new Jison_LexerConditions(array( 2,5,6,7,8,9,10,11,12,14,16,21,22,23,24,27,30,33,36,39,40,41,42,45,48,51,52,55,58,61,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91), true),
					"unlink"=>new Jison_LexerConditions(array( 2,5,6,7,8,9,10,11,12,14,16,21,22,23,24,27,30,33,36,39,42,43,44,45,48,51,52,55,58,61,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91), true),
					"link"=>new Jison_LexerConditions(array( 2,5,6,7,8,9,10,11,12,14,16,21,22,23,24,27,30,33,36,39,42,45,46,47,48,51,52,55,58,61,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91), true),
					"strike"=>new Jison_LexerConditions(array( 2,5,6,7,8,9,10,11,12,14,16,21,22,23,24,27,30,33,36,39,42,45,48,49,50,51,52,55,58,61,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91), true),
					"table"=>new Jison_LexerConditions(array( 2,5,6,7,8,9,10,11,12,14,16,21,22,23,24,27,30,33,36,39,42,45,48,51,52,53,54,55,58,61,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91), true),
					"titleBar"=>new Jison_LexerConditions(array( 2,5,6,7,8,9,10,11,12,14,16,21,22,23,24,27,30,33,36,39,42,45,48,51,52,55,56,57,58,61,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91), true),
					"underscore"=>new Jison_LexerConditions(array( 2,5,6,7,8,9,10,11,12,14,16,21,22,23,24,27,30,33,36,39,42,45,48,51,52,55,58,59,60,61,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91), true),
					"wikiLink"=>new Jison_LexerConditions(array( 2,5,6,7,8,9,10,11,12,14,16,21,22,23,24,27,30,33,36,39,42,45,48,51,52,55,58,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91), true),
					"INITIAL"=>new Jison_LexerConditions(array( 2,5,6,7,8,9,10,11,12,14,16,21,22,23,24,27,30,33,36,39,42,45,48,51,52,55,58,61,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91), true)
				);



	    parent::__construct();
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
case 4:
        
            $thisS = $s[$o]->text;
        
    
break;
case 5:
        
            $thisS = $s[$o-1]->text->addSibling($s[$o]->text);
        
    
break;
case 6:
        
            $thisS = $s[$o]->text;
        
    
break;
case 7:
	    
	        $thisS = $this->block($s[$o-1]);
        
	
break;
case 8:
        
            $thisS = $this->block($s[$o-2], $s[$o-1]);
        
    
break;
case 10:
	    
	        $thisS = $s[$o]->text;
	    
	
break;
case 11:
		
			if (isset($s[$o]->text)) {
		        $thisS = $s[$o-1]->text->addSibling($s[$o]);
		    }
        
	
break;
case 12:
	    
	        $thisS = $this->content($s[$o]);
	    
	
break;
case 13:
        
            $thisS = $this->comment($s[$o]);
        
    
break;
case 16:
        
            $thisS = $this->noParse($s[$o-1]);
        
    
break;
case 19:
        
            $thisS = $this->preFormattedText($s[$o-1]);
        
    
break;
case 20:
        
            $thisS = $this->doubleDynamicVar($s[$o]);
        
    
break;
case 21:
        
            $thisS = $this->singleDynamicVar($s[$o]);
        
     
break;
case 22:
        
            $thisS = $this->argumentVar($s[$o]);
        
    
break;
case 23:
        
            $thisS = $this->htmlTag($s[$o]);
        
    
break;
case 24:
		
		    $thisS = $this->hr();
        
	
break;
case 27:
		
		    $thisS = $this->bold($s[$o-1]);
        
	
break;
case 30:
		
		    $thisS = $this->box($s[$o-1]);
        
	
break;
case 33:
		
		    $thisS = $this->center($s[$o-1]);
        
	
break;
case 36:
		
		    $thisS = $this->code($s[$o-1]);
        
	
break;
case 39:
		
		    $thisS = $this->color($s[$o-1]);
        
	
break;
case 42:
		
		    $thisS = $this->italic($s[$o-1]);
        
	
break;
case 45:
		
		    $thisS = $this->unlink($s[$o-2], $s[$o-1], $s[$o]);
        
	
break;
case 48:
		
		    $thisS = $this->link($s[$o-2], $s[$o-1]);
        
	
break;
case 51:
		
		    $thisS = $this->strike($s[$o-1]);
        
	
break;
case 52:
        
            $thisS = $this->doubleDash();
        
    
break;
case 55:
		
		    $thisS = $this->tableParser($s[$o-1]);
        
	
break;
case 58:
		
		    $thisS = $this->titleBar($s[$o-1]);
        
	
break;
case 61:
		
		    $thisS = $this->underscore($s[$o-1]);
        
	
break;
case 64:
		
		    $thisS = $this->link($s[$o-2]->text['type'], $s[$o-1]);
        
	
break;
case 65:
        
            $thisS = $this->link('word', $s[$o]);
        
    
break;
case 67:
 		
 		    $thisS = $this->plugin($s[$o-1], $s[$o]);
        
 	
break;
case 68:
 	    
 		    $thisS = $this->plugin($s[$o-3], $s[$o-2], $s[$o], $s[$o-1]);
        
 	
break;
case 69:
  		
            $thisS = $this->plugin($s[$o-2], $s[$o-1], $s[$o]);
        
     
break;
case 72:
        
            $thisS = $this->line($s[$o]);
        
    
break;
case 73:
        
            $thisS = $this->forcedLineEnd();
        
    
break;
case 74:
        
            $thisS = $this->char($s[$o]->text);
        
    
break;
}

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
	    
		    if ($this->npStack != true) return 11;
		    $this->popState();
		    $this->npStack = false;
		    $this->yy->text = $this->noParse($this->yy->text);
        

		return 14;
	
break;
case 2:
	    
		    if ($this->isContent()) return 11;
		    $this->begin('np');
		    $this->npStack = true;
        

		return 13;
	
break;
case 3:
	    
            $this->conditionStackCount = 0;
            $this->conditionStack = array();
        

        return 5;
	
break;
case 4:
	    
		    if ($this->ppStack != true) return 11;
		    $this->popState();
		    $this->ppStack = false;
		    $this->yy->text = $this->preFormattedText($this->yy->text);
        

		return 16;
	
break;
case 5:
	    
		    if ($this->isContent()) return 11;
		    $this->begin('pp');
		    $this->ppStack = true;
        

		return 15;
	
break;
case 6:return 12;
break;
case 7:
	    
            if ($this->isContent()) return 11;
        

		return 17;
	
break;
case 8:
	    
            if ($this->isContent()) return 11;
        

		return 18;
	
break;
case 9:
	    
            if ($this->isContent(array('linkStack'))) return 11;
        

        return 19;
    
break;
case 10:return 57;
break;
case 11:return 11;
break;
case 12:
	    
            if ($this->isContent()) return 11;
            $this->begin('block');
        

        return 8;
	
break;
case 13:
		
			$this->popState();
			return 51;
		
	
break;
case 14:
	    
            $this->begin('inlinePlugin');
		

		return 50;
	
break;
case 15:
        
            $this->popState();
            $this->begin('plugin');
            return 53;
        
    
break;
case 16:
	    
		    $this->begin('pluginStart');
		    $this->stackPlugin($this->yy->text);
	        return 52;
		
	
break;
case 17:
	    
            $this->conditionStackCount = 0;
            $this->conditionStack = array();
        

        return 5;
	
break;
case 18:
	    
            $name = end($this->pluginStack);
            if (substr($this->yy->text, 1, -1) == $name && $this->pluginStackCount > 0) {
				$this->popState();
				$this->pluginStackCount--;
				array_pop($this->pluginStack);
				return 54;
            }
		

		return 11;
	
break;
case 19:
	    
            $this->conditionStackCount = 0;
            $this->conditionStack = array();
        

        return 5;
	
break;
case 20:
		
		    if ($this->isContent()) return 11;
		    $this->popState();
        


		return 9;
	
break;
case 21:
    	
            if ($this->isContent()) return 11;
            $this->begin('block');
        

        return 8;
	
break;
case 22:
		
		    if ($this->isContent() || !empty($this->tableStack)) return 11;
        

		return 55;
	
break;
case 23:
		
            if ($this->isContent()) return 11;
        

        return 21;
	
break;
case 24:
		
            if ($this->isContent()) return 11;
        

        return 56;
	
break;
case 25:
		
            $this->conditionStackCount = 0;
            $this->conditionStack = array();
        

        return 5;
	
break;
case 26:
	    
		    if ($this->isContent()) return 11;
		    $this->popState();
        

		return 23;
	
break;
case 27:
		
		    if ($this->isContent()) return 11;
		    $this->begin('bold');
        

		return 22;
	
break;
case 28:
		
            $this->conditionStackCount = 0;
            $this->conditionStack = array();
        

        return 5;
	
break;
case 29:
		
		    if ($this->isContent()) return 11;
		    $this->popState();
        

		return 25;
	
break;
case 30:
	    
		    if ($this->isContent()) return 11;
		    $this->begin('box');
        


		return 24;
	
break;
case 31:
		
            $this->conditionStackCount = 0;
            $this->conditionStack = array();
        

        return 5;
	
break;
case 32:
	    
		    if ($this->isContent()) return 11;
		    $this->popState();
        


		return 27;
	
break;
case 33:
		
		    if ($this->isContent()) return 11;
		    $this->begin('center');
        

		return 26;
	
break;
case 34:
		
            $this->conditionStackCount = 0;
            $this->conditionStack = array();
        

        return 5;
	
break;
case 35:
	    
		    if ($this->isContent()) return 11;
		    $this->popState();
        

		return 29;
	
break;
case 36:
		
		    if ($this->isContent()) return 11;
		    $this->begin('code');
        

		return 28;
	
break;
case 37:
		
            $this->conditionStackCount = 0;
            $this->conditionStack = array();
        

        return 5;
	
break;
case 38:
		
		    if ($this->isContent()) return 11;
		    $this->popState();
        

		return 31;
	
break;
case 39:
		
		    if ($this->isContent()) return 11;
		    $this->begin('color');
        

		return 30;
	
break;
case 40:
	    
            $this->conditionStackCount = 0;
            $this->conditionStack = array();
        

        return 5;
	
break;
case 41:
	    
		    if ($this->isContent()) return 11;
		    $this->popState();
        

		return 33;
	
break;
case 42:
	    
		    if ($this->isContent()) return 11;
		    $this->begin('italic');
		

		return 32;
	
break;
case 43:
		
            $this->conditionStackCount = 0;
            $this->conditionStack = array();
        

        return 5;
	
break;
case 44:
	    
		    if ($this->isContent(array('linkStack'))) return 11;
		    $this->popState();
        

		return 35;
	
break;
case 45:
		
		    if ($this->isContent()) return 11;
		    $this->begin('unlink');
        

		return 34;
	
break;
case 46:
		
		    $this->conditionStackCount = 0;
		    $this->conditionStack = array();
        

		return 5;
	
break;
case 47:
		
		    if ($this->isContent(array('linkStack'))) return 11;
            $this->linkStack = false;
            $this->popState();
        

		return 37;
	
break;
case 48:
	    
		    if ($this->isContent()) return 11;
            $this->linkStack = true;
            $this->begin('link');
            $this->yy->text = 'external';
        

		return 36;
	
break;
case 49:
	    
            $this->conditionStackCount = 0;
            $this->conditionStack = array();
        

        return 5;
	
break;
case 50:
		
		    if ($this->isContent()) return 11;
		    $this->popState();
        

		return 39;
	
break;
case 51:
	    
		    if ($this->isContent()) return 11;
		    $this->begin('strike');
        

		return 38;
	
break;
case 52:
        return 40;
	
break;
case 53:
	    
		    $this->conditionStackCount = 0;
		    $this->conditionStack = array();
        

		return 5;
	
break;
case 54:
		
		    if ($this->isContent()) return 11;
            $this->popState();
            array_pop($this->tableStack);
		

		return 42;
	
break;
case 55:
		
		    if ($this->isContent()) return 11;
		    $this->begin('table');
		    $this->tableStack[] = true;
        

		return 41;
	
break;
case 56:
		
            $this->conditionStackCount = 0;
            $this->conditionStack = array();
        

        return 5;
	
break;
case 57:
		
		    if ($this->isContent()) return 11;
		    $this->popState();
        

		return 44;
	
break;
case 58:
		
		    if ($this->isContent()) return 11;
		    $this->begin('titleBar');
		

		return 43;
	
break;
case 59:
		
		    $this->conditionStackCount = 0;
		    $this->conditionStack = array();
        

		return 5;
	
break;
case 60:
	    
		    if ($this->isContent()) return 11;
		    $this->popState();
        

		return 46;
	
break;
case 61:
		
		    if ($this->isContent()) return 11;
    		$this->begin('underscore');
        

		return 45;
	
break;
case 62:
		
		    $this->conditionStackCount = 0;
		    $this->conditionStack = array();
        

		return 5;
	
break;
case 63:
		
		    if ($this->isContent(array('linkStack'))) return 11;
		    $this->linkStack = false;
		    $this->popState();
		

		return 48;
	
break;
case 64:
		
		    if ($this->isContent()) return 11;
            $this->linkStack = true;
            $this->begin('wikiLink');
            $this->yy->text = array('type' => 'wiki', 'syntax' => $this->yy->text);
        

		return 47;
	
break;
case 65:
		
		    if ($this->isContent()) return 11;
		    $this->linkStack = true;
		    $this->begin('wikiLink');
		    $this->yy->text = array('type' => 'np', 'syntax' => $this->yy->text);
        

		return 47;
	
break;
case 66:
		
		    if ($this->isContent()) return 11;
            $this->linkStack = true;
            $this->begin('wikiLink');
            $this->yy->text = array('syntax' => $this->yy->text, 'type' => substr($this->yy->text, 1, -1));
		

		return 47;
	
break;
case 67:
	    
		    if ($this->isContent()) return 11;
        

		return 49;
	
break;
case 68:return 57;
break;
case 69:
		
		    if (JisonParser_Html_Handler::isHtmlTag($this->yy->text)) {
		        return 20;
		    }
		    $tag = $this->yy->text;
		    $this->yy->text = $this->yy->text{0};
		    $this->unput(substr($tag, 1));
		    return 11;
		
	
break;
case 70:
break;
case 71:return 20;
break;
case 72:return 11;
break;
case 73:return 11;
break;
case 74:return 11;
break;
case 75:return 11;
break;
case 76:return 11;
break;
case 77:return 57;
break;
case 78:return 57;
break;
case 79:return 57;
break;
case 80:return 57;
break;
case 81:return 57;
break;
case 82:return 57;
break;
case 83:return 57;
break;
case 84:return 57;
break;
case 85:return 57;
break;
case 86:return 57;
break;
case 87:return 57;
break;
case 88:return 57;
break;
case 89:return 57;
break;
case 90:return 11;
break;
case 91:return 5;
break;
}

	}
}
