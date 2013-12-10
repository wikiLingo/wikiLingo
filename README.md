wikiLingo
=========

The Wiki Programming Language

<a href="http://visop-dev.com/repo/download/wikiLingo.zip">Download Pre Alpha</a>

wikiLingo is a fun and exciting new programming language that you DON'T HAVE TO LEARN!  It's fully wysiwyg (What You See Is What You Get) driven, for a complete visual web experience.  It has a powerful plugin architecture for implementing whatever functionality you want into your website.
If you'd like to learn what wikiLingo Looks like (ie, if you want to actually code it), lets start with something simple, like a tabs interface:

```
{TABS()}
	{TAB(title="Tab 1 Title")}
		I'm the content in tab 1 ;).
	{TAB}
	{TAB(title="Tab 2 Title")}
		I'm the content in tab 2 :P.
	{TAB}
{TABS}
```

The above creates 2 tabs, it injects the css and javascript that is needed to generate the whole interface on demand!  Cool!

##Syntax types
###Plugins
* Plugin with content body
```
{PLUGIN(parameter1="value" parameter2="value")}
...plugin body
{PLUGIN}
```
* Inline plugin
```
{plugin parameter1="value" parameter2="value}
```

###Wiki syntax
wikiLingo also incorporates popular wiki syntax
* Bold -
```
__Text__
```
* Center -
```
::Text::
```
* Code -
```
-+Text+-
```
* Color -
```
~~Color:Text~~
```
* Text Comment -
```
~tc~Text~/tc~
```
* Forced Line -
```
%%%
```
* Header 1 -
```
!Text
```
* Header 2 -
```
!!Text
```
* Header 3 -
```
!!!Text
```
* Header 4 -
```
!!!!Text
```
* Header 5 -
```
!!!!!Text
```
* Header 6 -
```
!!!!!!Text
```
* Italic -
```
''Text''
```
* Not Parsed -
```
~np~Text~/np~
```
* Lists (Unordered) -
```
*Item
*Item
**Item at 1 indent
******************** Item at whatever indent I want ;)
**Item
```
* Lists (Ordered) -
```
#Item 1.1
#Item 1.2
##Item 2.1
####################Item N.1
##Item 2.2
```
* Pre-Formatted Text -
```
~pp~Text~/pp~
```
* Strike -
```
--Text--
```
* Table -
```
||Row 1, Column 1|Row 1, Column 2
Row 2, Column 1| Row 2, Column 2||
```
* Title Bar -
```
-=Text=-
```
* Underscore -
```
===Text===
```
* Variable
```
{{VarName}}
```

More to come!
