<?php

class WikiParser_StressTest extends PHPUnit_Framework_TestCase
{
	function testMessProvidedByJonny()
	{
		$content = <<<WIKI
{HTML()}<img style="margin-bottom: 10px" src="Web-Images/headers/Directory-Header_wide.jpg" border="0" />{HTML}{DIV(class="dark_acme1")}{DIV(class="wrapper")}{DIV(class="halffloat clearfix")}{DIV(class="box")}~tc~directory item photo~/tc~{\$f_130}

! {\$f_126}

{\$f_132}
Neighborhood: __{\$f_133}__
{DIV(class="clearfix contact_and_map")}{DIV(float="left", width="33%", class="contact_info")}
{\$f_134}{TRACKERITEMFIELD(trackerId=3,fieldId=135,test=1)}{\$f_135}{TRACKERITEMFIELD}
{\$f_136}, {\$f_137}
{\$f_139}

{\$f_128}
{\$f_140}

!!! {DIV(type="span",class="dark2headingB")}What's nearby?{DIV}
{\$f_149}
{SHARETHIS() /}
{DIV} || | | | | ~tc~Google Map~/tc~{\$f_150}|  || {DIV}

{DIV(class="clearfix galleries_and_articles")}{DIV(class="directory_box directory_photo_galleries")}
!!! {DIV(type="span",class="dark2headingA")}Related {DIV}{DIV(type="span",class="dark2headingB")}Articles{DIV}{DIV}
----
{FREETAGGED(type="article",sort_mode="created_asc",titles_only="y",maxRecords="5",h_level="5")}{FREETAGGED}
{DIV}
!!! {DIV(type="span",class="dark2headingA")}Related {DIV}{DIV(type="span",class="dark2headingB")}Wikis{DIV}
----
{FREETAGGED(type="wiki page",maxRecords="5",sort_mode="created_asc",titles_only="y",h_level="5")}{FREETAGGED}

{DIV}{DIV(class="box directory_box")}
!!! {DIV(type="span",class="dark2headingA")}Hot Spot{DIV} Directories {DIV(type="span",class="dark2headingB")}{\$f_126}{DIV}
----
{DIV(class="directory_item_menu")}
{\$f_188}{DIV}
{DIV(class="directory_item_events")}
!!! {DIV(type="span",class="dark2headingA")} {\$f_126} {DIV}{DIV(type="span",class="dark2headingB")}Events{DIV}
----
{TABS(name="user_tabset_01",tabs="July|Aug|Sept")}
{TRACKERLIST(trackerId="7",fields="218:193:201",sort="y",showceated="n",showlastmodif="n",showfieldname="y",showitemrank="n",status="o",filterfield=201:218,filtervalue="{{page}}:2010-07-%",silent="y")}{TRACKERLIST}
/////{TRACKERLIST(trackerId="7",fields="218:193:201",sort="y",showceated="n",showlastmodif="n",showfieldname="y",showitemrank="n",status="o",filterfield=201:218,filtervalue="{{page}}:2010-08-%",silent="y")}{TRACKERLIST}
/////{TRACKERLIST(trackerId="7",fields="218:193:201",sort="y",showceated="n",showlastmodif="n",showfieldname="y",showitemrank="n",status="o",filterfield=201:218,filtervalue="{{page}}:2010-09-%",silent="y")}{TRACKERLIST}
{TABS}
{DIV}
{DIV()}{DIV}
{DIV(class="directory_box twitterfeeds")}
!!! {DIV(type="span",class="dark2headingA")} {\$f_126} {DIV}{DIV(type="span",class="dark2headingB")}Twitter Feed{DIV}
{\$f_67}
{DIV}

{DIV(class="directory_box community")}
!!! {DIV(type="span",class="dark2headingA")}~tc~ {\$f_126} ~/tc~{DIV}~tc~{DIV(type="span",class="dark2headingB")}community{DIV}~/tc~
~tc~*{TRACKERITEMFIELD(trackerId=3,fieldId=145,test=1)}__Awards: __{\$f_145}{TRACKERITEMFIELD}
*{TRACKERITEMFIELD(trackerId=3,fieldId=144,test=1)}__Supportors of: __{\$f_144}{TRACKERITEMFIELD}
*{TRACKERITEMFIELD(trackerId=3,fieldId=148,test=1)}__Affiliations: __{\$f_148}{TRACKERITEMFIELD}
*__Reviews: __{\$f_75}~/tc~
{DIV}{DIV}{DIV}{DIV}{DIV}
WIKI;

		$matches = WikiParser_PluginMatcher::match($content);

		$this->assertGreaterThan(0, count($matches));
	}
}

