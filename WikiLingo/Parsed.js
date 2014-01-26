
window.WikiLingo = (window.WikiLingo || {});

WikiLingo.Parsed = (function() {
    var Construct = function(type, text, stateEnd) {
        this.type = type;
        this.text = text;
        this.stateEnd = stateEnd || null;
        this.render = null;
        this.firstSibling = null;
        this.siblingIndex = 0;
        this.lineIndex = 0;
        this.lineLength = 0;
        this.stateEnd = null;
        this.depth = 0;
        this.throwExceptions = true;
        this.lines = [];

        this.siblings = [];
        this.arguments = [];
        this.options = [];
        this.parent = null;
        this.children = [];
        this.expression = null;
        this.expressionPermissible = true;
        this.expressionSetter = null;
        this.cousins = [];
    };

    Construct.prototype = {
        /**
         * @param line
         */
        addLine: function (line)
        {
            this.lineLength++;
            line.lineIndex = this.lineLength;

            line.parent = this;
            this.lines[this.lineLength] = line;

            return this;
        },

        /**
         * @return null|Parsed
         */
        previousLine: function ()
        {
            var lineIndex = this.lineIndex - 1,
                line;
            if (lineIndex == 0) {
                return null;
            }
            line = this.parent.lines[lineIndex];
            return line;
        },

        /**
         * @return null|Parsed
         */
        nextLine: function ()
        {
            var lineIndex = this.lineIndex + 1;
            if (lineIndex > this.parent.lineLength) {
                return null;
            }
            return this.parent.lines[this.lineIndex + 1];
        },

        /**
         * @param sibling
         */
        addContent: function (sibling)
        {
            this.siblings.push(sibling);
            sibling.firstSibling = this;

            return this;
        },

        /**
         * @return null|Parsed
         */
        previousSibling: function ()
        {
            var siblingIndex = this.siblingIndex - 1;
            if (this.siblings.length < 0) {
                return null;
            }

            if (this.parent.children[siblingIndex]) {
                return this.parent.children[siblingIndex];
            }

            if (siblingIndex == 0) {
                return this.firstSibling;
            }

            if (this.firstSibling.siblings[siblingIndex - 1]) {
                return this.firstSibling.siblings[siblingIndex - 1];
            }

            return null;
        },

        /**
         * @return null|Parsed
         */
        nextSibling: function ()
        {
            var siblingIndex = this.siblingIndex + 1;
            if (siblingIndex > this.parent.siblings.length) {
                return null;
            }
            return this.siblings[siblingIndex];
        },

        /**
         * @param argument
         */
        addArgument: function (argument)
        {
            this.arguments.push(argument);
            return this;
        },

        /**
         * @param type
         * @param text
         * @param stateEnd
         */
        setType: function (type, text, stateEnd)
        {
            this.type = type;
            this.text = text;
            this.stateEnd = stateEnd || null;
            this.setExpression();
            return this;
        },


        /**
         * @param key
         * @param value
         */
        setOption: function (key, value)
        {
            this.options[key] = value;
            return this;
        },

        /**
         * @param parent
         */
        setParent: function (parent)
        {
            parent.addChild(this);

            while (this.siblings.length > 0) {
                this.siblings.shift().setParent(parent);
            }

            return this;
        },




        /**
         * @param child
         */
        addChild: function (child)
        {
            child.parent = this;
            this.children.push(child);

            return this;
        },

        /**
         *
         */
        removeChildren: function ()
        {
            this.children = [];

            return this;
        },



        /**
         *
         */
        setExpression: function ()
        {
            this.expressionSetter.apply(this);
        },



        /**
         * @param cousin
         */
        addCousin: function (cousin)
        {
            this.cousins.push(cousin);
        }


        /**
         * @return string
         */
        /*render: function ()
        {
            var syntax;
            if (!this.expressionPermissible) {
                return;
            }

            //children are directly part of the family as a visible child
            var renderedChildren = '',
                renderedCousins = '',
                i,
                rendered = '',
                renderedSiblings = '',
                renderedLines = '';

            if (this.children.length > 0) {

                //detect if it is a syntax parent
                var addedDepth = 0,
                    isParent;

                if (
                    this.expression.isParent)
                    && (isParent = this.expression.isParent) == true) {
                    addedDepth = 1;
                }

                i = this.children.length;
                while (i--) {
                    this.children[i].depth += this.depth + addedDepth;
                    $renderedChildren += this.children[i].render();
                }
            }

            i = this.cousins.length;
            while (i--) {
                renderedCousins += this.cousins[i].render();
            }

            this.expression.renderedChildren = renderedChildren;
            if (this.expression && this.expression['render']) {
                rendered = this.expression.render(this);
            }

            //siblings are directly part of the family as a visible sibling
            i = this.siblings.length;
            while (i--) {
               renderedSiblings += this.sibling[i].render();
                if (this.parent !== null) {
                    this.parent.children.push(this.sibling[i]);
                }
            }

            i = this.lines.length;
            while (i--) {
                renderedLines += this.render(this.lines[i]);
            }

            return rendered + renderedSiblings + renderedLines + renderedCousins;
        }*/
    };

    return Construct;
})();