/* description: parses a wikiLingo table markup to a table */
//option namespace:WikiLingo\ExpressionParser;
//option use:WikiLingo\Expression;
//
/* lexical grammar */
%lex

/* lexical states */
%s BOF PRE_QUOTE QUOTE STRING

/*begin lexing */
%%

/* quote handling */
<QUOTE>(\n) {
    //<QUOTE>(\n|"\n")
    return 'CHAR';
}
<QUOTE>("'"|'"')(?=<<EOF>>) {
    //<QUOTE>("'"|'"')(?=<<EOF>>)
    /*php
        $this->popState();
        return 'QUOTE_OFF';
    */
}
<QUOTE>('"'|"'") {
    //<QUOTE>('"'|'"')
    /*php
        if ($yytext == $this->quoteChar) {
            $this->popState();
            $this->begin('STRING');
            return 'QUOTE_OFF';
        } else {
            return 'CHAR';
        }
	*/
}
<QUOTE>(?=(|)) {
    //<QUOTE>(?=(|))
    /*php
        $this->popState();
        $this->begin('STRING');
        return 'CHAR';
	*/
}
<BOF>('"'|"'") {
    //<BOF>('"'|"'")
    /*php
        $this->popState();
        $this->quoteChar = $yytext->text;
        $this->begin('QUOTE');
        return 'QUOTE_ON';
	*/
}
<PRE_QUOTE>('"'|"'") {
    //<PRE_QUOTE>('"'|"'")
    /*php
        $this->quoteChar = $yytext->text;
        $this->popState();
        $this->begin('QUOTE');
        return 'QUOTE_ON';
	*/
}
("|")(?=('"'|"'")) {
    //("|")(?=('"'|"'"))
	/*php
        $this->begin('PRE_QUOTE');
        return 'COLUMN_STRING';
	*/
}
(\n|"\n")(?=('"'|"'")) {
    //(\n|"\n")(?=('"'|"'"))
    /*php
        $this->begin('PRE_QUOTE');
        return 'END_OF_LINE';
	*/
}
<QUOTE>([a-zA-Z0-9_ ]+|.) {
    //<QUOTE>([a-zA-Z0-9_]+|.)
    /*php
        return 'CHAR';
    */
}
/* end quote handling */


/*spreadsheet control characters*/
<STRING>(\n|"\n|") {
    //<STRING>(\n|"\n|")
	/*php
	    $this->popState();
	    return 'END_OF_LINE_WITH_EMPTY_NEXT_FIRST_COLUMN';
    */
}
<STRING>(\n\n) {
    //<STRING>(\n\n)
	/*php
	    $this->popState();
	    return 'END_OF_LINE_WITH_NO_COLUMNS';
    */
}
<STRING>(\n) {
    //<STRING>(\n)
    /*php
	    $this->popState();
	    return 'END_OF_LINE';
    */
}
<STRING>("|") {
    //<STRING>("|")
    /*php
        $this->popState();
        return 'COLUMN_STRING';
	*/
}
<STRING>([a-zA-Z0-9_ ]+|.) {
    //<STRING>([a-zA-Z0-9_ ]+|.)
    return 'CHAR';
}
<BOF> {
    //<BOF>
    /*php
        $this->popState();
    */
}
(\n\n) {
    //(\n\n)
    return 'END_OF_LINE_WITH_NO_COLUMNS';
}
(\t\n) {
    //(\t\n)
    return 'END_OF_LINE_WITH_EMPTY_COLUMN';
}
(\t) {
    //(\t)
    return 'COLUMN_EMPTY';
}
(\n) {
    //(\n)
    return 'END_OF_LINE';
}
([a-zA-Z0-9_ ]+|.) {
    //([a-zA-Z0-9_ ]+|.)
	/*php
	    $this->begin('STRING');
	    return 'CHAR';
    */
}
<<EOF>> {
    //<<EOF>>
    return 'EOF';
}

/* end lexing */
/lex


%start grid

%% /* language grammar */

grid :
	rows EOF {
		return $1;
	}
	| EOF {
	    /*php
		    return null;
        */
	}
;

rows :
	row {
	    //row
		/*php
		    $$ = new TableRows($1);
        */
	}
	| END_OF_LINE {
	    //END_OF_LINE
	    /*php
            $$ = new TableRows();
        */
	}
	| END_OF_LINE_WITH_EMPTY_NEXT_FIRST_COLUMN {
	    //END_OF_LINE_WITH_EMPTY_NEXT_FIRST_COLUMN
	    /*php
	        $$ = new TableColumn();
        */
	}
	| END_OF_LINE_WITH_NO_COLUMNS {
	    //END_OF_LINE_WITH_NO_COLUMNS
	    /*php
	        $$ = new TableColumn();
        */
	}
    | END_OF_LINE_WITH_EMPTY_COLUMN {
        //END_OF_LINE_WITH_EMPTY_COLUMN
        /*php
            $$ = new TableColumn();
        */
    }
    | rows END_OF_LINE {
        //rows END_OF_LINE
        /*php
            $$ = $1;
        */
    }
    | rows END_OF_LINE_WITH_EMPTY_NEXT_FIRST_COLUMN {
        //rows END_OF_LINE_WITH_EMPTY_NEXT_FIRST_COLUMN
        /*php
            $1->text->addRow(new TableRow());
        */
    }
    | rows END_OF_LINE_WITH_NO_COLUMNS {
        //rows END_OF_LINE_WITH_NO_COLUMNS
        /*php
            $1->text->addRow(new TableRow());
        */
    }
    | rows END_OF_LINE_WITH_EMPTY_COLUMN {
        //rows END_OF_LINE_WITH_EMPTY_COLUMN
        /*php
            $1->text->rows[$1->length - 1]->addColumn(new TableColumn());
        */
    }
    | rows END_OF_LINE row {
        //rows END_OF_LINE row
        /*php
            $1->text->addRow($3);
        */
    }
    | rows END_OF_LINE_WITH_EMPTY_NEXT_FIRST_COLUMN row {
        //rows END_OF_LINE_WITH_EMPTY_NEXT_FIRST_COLUMN row
        /*php
            $3->text->addColumn(new TableColumn());
            $1->text->addRow($3);
        */
    }
    | rows END_OF_LINE_WITH_NO_COLUMNS row {
        //rows END_OF_LINE_WITH_NO_COLUMNS row
        /*php
            $1->text->addRow(new TableRow());
            $1->text->addRow($3);
        */
    }
    | rows END_OF_LINE_WITH_EMPTY_COLUMN row {
        //rows END_OF_LINE_WITH_EMPTY_COLUMN row
        /*php
            $1->text->rows[$1->length - 1]->addColumn(new TableColumn());
            $1->text->addRow($3);
        */
    }
;

row :
	string {
	    //string
	    /*php
		    $$ = new TableRow($1);
        */
	}

	//scenario where we have an empty column, which needs treated like a ''
	| COLUMN_EMPTY {
	    //COLUMN_EMPTY
	    /*php
		    $$ = new TableColumn();
        */
	}
    | row COLUMN_EMPTY {
        //row COLUMN_EMPTY
        /*php
            $1->text->addColumn(new TableColumn());
        */
    }
    | row COLUMN_EMPTY string {
        //row COLUMN_EMPTY string
        /*php
            $1->text->addColumn(new TableColumn());
            $1->text->addColumn($3);
        */
    }

    //scenario where we have 2 values separated by a column, in this case the column is ignored
    | COLUMN_STRING {
        //COLUMN_STRING
    }
    | row COLUMN_STRING {
        //row COLUMN_STRING
    }
    | row COLUMN_STRING string {
        //row COLUMN_STRING string
        /*php
            $1->text->addColumn($3);
        */
    }
;

string :
	CHAR {
	    //CHAR
	    /*php
		    $$ = new TableColumn($1);
        */
	}
	| string CHAR {
	    //string CHAR
	    /*php
		    $1->append($2);
        */
	}
	| QUOTE_ON string QUOTE_OFF {
	    //QUOTE_ON string QUOTE_OFF
        $$ = new TableColumn($2);
    }
;