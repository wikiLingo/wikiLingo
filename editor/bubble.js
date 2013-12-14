var WLBubble = (function(d, w, m, rangy) {
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
	            bubble = this.bubble = d.createElement('nav'),
	            ul = this.ul = d.createElement('ul'),
	            i,
                j,
	            e,
	            button,
                typeContainer,
                typePicker,
	            point = d.createElement('div'),
		        factory = this.factory = d.createElement('div');

		    factory.createElement = function(e) {
			    this.innerHTML = e.example;
			    if (this.children[0].innerHTML === 'expression') {
				    this.children[0].innerHTML = '';
			    }
			    return this.children[0];
		    };
	        bubble.className = 'wikiLingo-bubble';
            bubble.appendChild(ul);
	        bubble.className = 'wikiLingo-bubble';
	        this.expressions = expressions;
	        this.buttons = [];
	        this.groups = {};
		    this.plugins = {};

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
	            };
	            button.innerHTML = e.icon;
	            button.className = e.iconClass;
	            button.setAttribute('title', e.label);
	            button.expression = e;

                if (e.types.length > 0) {
                    typeContainer = d.createElement('ul');
                    for (j = 0; j < e.types.length; j++) {
                        if (e.types[j].draggable === false) {
                            continue;
                        }
                        typePicker = d.createElement('li');
                        typePicker.innerHTML = e.types[j].label;
                        console.log(typePicker);
                        typeContainer.appendChild(typePicker);
                    }
                    button.appendChild(typeContainer);
                    console.log(button);
                }

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
	        bubble.insertBefore(point, bubble.firstChild);
	    },
		types = this.types = {};

    construct.prototype = {
        appendGroup : function(group, minimize) {
            var i,
                parentContainer,
                parent,
                type;

            if (this.groups[group]) {
                if (minimize) {
                    parentContainer = this.groups[group].shift();
	                for (i in parentContainer.expression.types) {
		                type = parentContainer.expression.types[i];
		                types[type.name] = type;
	                }
                    this.ul.appendChild(parentContainer);
                    parent = d.createElement('ul');
                    parentContainer.appendChild(parent);
                } else {
                    parent = this.ul;
                }
                for (i in this.groups[group]) {
                    parent.appendChild(this.groups[group][i]);
                }

                this.groups[group] = null;
            }
        },
        goToSelection : function()
        {
            var high = this.getHighlighted(),
                b = this.bubble,
                s = b.style;

	        if (high) {
	            if (high.range.startOffset === high.range.endOffset || !high.text) {
	                b.className = 'wikiLingo-bubble hide';
	            } else {
	                s.display = 'inline-block';
	                b.className = 'wikiLingo-bubble show';
	                s.top = ((high.boundary.top - 5 + window.pageYOffset) - 80) + "px";
	                s.left = ((high.boundary.left + (high.boundary.width / 2))  - (b.clientWidth / 2)) + "px";
	            }
	        }
        },
        getHighlighted: function() {
            var selection = w.getSelection(),
                range = (selection.anchorNode ? selection.getRangeAt(0) : false);

	        if (!range) {
		        return null;
	        }

            return {
                selection : selection,
                range : range,
                text : range.toString().trim(),
                boundary : range.getBoundingClientRect()
            };
        }
    };

    return construct;
})(document, window, Math, rangy);