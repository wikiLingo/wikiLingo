var WikiLingoBubble = (function(d, w, m, rangy) {
    if (!String.prototype.trim) {
        String.prototype.trim = function(){
            return this.replace(/^\s+|\s+$/g, '');
        };
    }

    if (!Element.prototype.preventSelection) {
        Element.prototype.preventSelection = function() {
            this.onmousedown = function() {
                return false;
            };
        };
    }

    var construct = function(expressions) {
        var me = this,
            container = d.createElement('div'),
            bubble = d.createElement('ul'),
            i,
            j,
            e,
            button,
            point = d.createElement('div'),
            firewall = d.createElement('div'),
            highlightedHtml,
            tempStyleElement,
	        factory = this.factory = d.createElement('div');

	    factory.createElement = function(e) {
		    this.innerHTML = e.example;
		    if (this.children[0].innerHTML === 'expression') {
			    this.children[0].innerHTML = '';
		    }
		    return this.children[0];
	    };
        container.className = 'wikiLingo-container';
        container.appendChild(bubble);
        bubble.className = 'wikiLingo-bubble';
        this.bubble = bubble;
        this.expressions = expressions;
        this.buttons = [];
        this.groups = {};

        for (i in expressions) {
            e = expressions[i];
            e.example = decodeURIComponent(e.example).replace(/[+]/g, ' ');
            button = d.createElement('li');
            button.onmousedown = function() {
	            var element = factory.createElement(this.expression),
		            attributes = {},
		            i;

	            if (element.children.length == 0) {
		            for (i = 0; i < element.attributes.length; i++) {
			            attributes[element.attributes[i].name] = element.attributes[i].value;
		            }

		            for (i in this.expression.extraAttributes) {
			            attributes[i] = this.expression.extraAttributes[i];
		            }

		            var applier = (rangy.createCssClassApplier(element.className, {
			            wikiLingoTypeName: e.name,
			            elementTagName: element.tagName.toLowerCase(),
			            elementAttributes: attributes
		            }));

		            applier.toggleSelection();
	            } else {
		            d.execCommand('insertHTML', false, this.expression.example);
	            }

                return false;
            }
            button.innerHTML = e.icon;
            button.className = e.iconClass;
            button.setAttribute('title', i);
            button.expression = e;
            this.buttons.push(button);

            if (!this.groups[e.group]) {
                this.groups[e.group] = [];
            }
            this.groups[e.group].push(button);
        }

        this.appendGroup('plugins', true);
        this.appendGroup('common');
        this.appendGroup('header', true);
        this.appendGroup('link', true);
        this.appendGroup('main');
        this.appendGroup('misc', true);

        point.className = 'wikiLingo-bubble-point';
        point.innerHTML = '&#9662;';
        container.appendChild(point);

        this.container = container;
    };

    construct.prototype = {
        appendGroup : function(group, minimize) {
            var j, parentContainer, parent;
            if (this.groups[group]) {
                if (minimize) {
                    parentContainer = this.groups[group].shift();
                    this.bubble.appendChild(parentContainer)
                    parent = d.createElement('ul');
                    parent.className = 'wikiLingo-bubble-minimize';
                    parentContainer.appendChild(parent);
                } else {
                    parent = this.bubble;
                }
                for (j in this.groups[group]) {
                    parent.appendChild(this.groups[group][j]);
                }
                this.groups[group] = null;
            }
        },
        goToSelection : function()
        {
            var high = this.getHighlighted(),
                c = this.container,
                b = this.bubble,
                s = c.style;

            if (high.range.startOffset === high.range.endOffset || !high.text) {
                c.className = 'wikiLingo-container hide';
            } else {
                s.display = 'inline-block';
                c.className = 'wikiLingo-container show';
                s.top = ((high.boundary.top - 5 + window.pageYOffset) - 40) + "px";
                s.left = ((high.boundary.left + (high.boundary.width / 2))  - (c.clientWidth / 2)) + "px";
            }
        },
        getHighlighted: function() {
            var selection = w.getSelection(),
                range = selection.getRangeAt(0);
            return {
                selection : selection,
                range : selection.getRangeAt(0),
                text : range.toString().trim(),
                boundary : range.getBoundingClientRect()
            };
        }
    };

    return construct;
})(document, window, Math, rangy);