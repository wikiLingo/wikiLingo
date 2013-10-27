wikiLingo
=========

The Wiki Programming Language

wikiLingo is a fun and exciting new programming language that you DON'T HAVE TO LEARN!  It's fully wysiwyg (What You See Is What You Get) driven, for a complete visual web experience.  It has a powerful plugin architecture for implementing whatever functionality you want into your website.
If you'd like to learn what wikiLingo Looks like (ie, if you want to actually code it), lets start with a simple "html" plugin that displays "test" in bold:

```
{HTML()}
<b>Hi!</b>
{HTML}
```

##Syntax types
###Plugins
* Plugin with content body```{PLUGIN(parameter1="value" parameter2="value")}
...plugin body
{PLUGIN}
```
* Inline plugin```{plugin parameter1="value" parameter2="value}```

###Wiki syntax
wikiLingo also incorporates popular wiki syntax
* Bold - ```__Text__```
* Center - ```::Text::```
* Code - ```-+Text+-```
* Color - ```~~Color:Text~~```
* Text Comment - ```~tc~Text~/tc~```
* Forced Line - ```%%%```
* Header 1 - ```!Text```
* Header 2 - ```!!Text```
* Header 3 - ```!!!Text```
* Header 4 - ```!!!!Text```
* Header 5 - ```!!!!!Text```
* Header 6 - ```!!!!!!Text```
* Italic - ```''Text''```
* Not Parsed - ```~np~Text~/np~```
* Pre-Formatted Text - ```~pp~Text~/pp~```
* Strike - ```--Text--```
* Table - ```||Row 1, Column 1|Row 1, Column 2
Row 2, Column 1| Row 2, Column 2||```
* Title Bar - ```-=Text=-```
* Underscore - ```===Text===```

More to come!
