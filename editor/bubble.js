var WLBubble = (function(document, window, medium, rangy) {

	var classNameHide = 'wikiLingo-bubble hide',
		classNameShow = 'wikiLingo-bubble show',
		stop = function(e) {
			e.preventDefault();
			e.stopPropagation();
		};

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
	            bubble = this.bubble = document.createElement('nav'),
	            ul = this.ul = document.createElement('ul'),
	            i,
                j,
	            e,
	            button,
                typeContainer,
                typePicker,
	            point = document.createElement('div'),
		        factory = this.factory = document.createElement('div');

		    factory.createElement = function(e) {
			    this.innerHTML = e.example;
			    if (this.children[0].innerHTML === 'expression') {
				    this.children[0].innerHTML = '';
			    }
			    return this.children[0];
		    };
            bubble.appendChild(ul);
	        bubble.className = classNameHide;
	        this.expressions = expressions;
	        this.buttons = [];
	        this.groups = {};
		    this.plugins = {};

	        for (i in expressions) {
	            e = expressions[i];
	            e.example = decodeURIComponent(e.example).replace(/[+]/g, ' ');
	            button = document.createElement('li');
	            button.onmousedown = function(e) {
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
			            document.execCommand('insertHTML', false, this.expression.example);
		            }

		            stop(e);
	            };
	            button.innerHTML = e.icon;
	            button.className = e.iconClass;
	            button.setAttribute('title', e.label);
	            button.expression = e;

                if (e.types) {
                    typeContainer = document.createElement('ul');
                    for (j in e.types) {
                        if (e.types[j].draggable === false) {
                            continue;
                        }
                        typePicker = document.createElement('li');
                        typePicker.innerHTML = e.types[j].label;
	                    if (window['wL' + i]) {
		                    typePicker.expressionType = e.types[j];
		                    typePicker.ExpressionEditor = window['WL' + i];
		                    typePicker.onmousedown = function(e) {
			                    var editor = new this.ExpressionEditor(this.expressionType);
			                    if (this.expressionType.parameters) {
				                    editor.ui();
			                    }

			                    me.hide();
			                    stop(e);
		                    };
		                    typePicker.onmouseup = stop;
	                    }
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
	        this.appendGroup('font');
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
                    parent = document.createElement('ul');
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
	    hide: function() {
		    this.bubble.className = classNameHide;
	    },
        goToSelection : function()
        {
            var high = this.getHighlighted(),
                b = this.bubble,
                s = b.style;

	        if (high) {
	            if (high.range.startOffset === high.range.endOffset || !high.text) {
	                b.className = classNameHide;
	            } else {
	                s.display = 'inline-block';
	                b.className = classNameShow;
	                s.top = ((high.boundary.top - 5 + window.pageYOffset) - 80) + "px";
	                s.left = ((high.boundary.left + (high.boundary.width / 2))  - (b.clientWidth / 2)) + "px";
	            }
	        }
        },
        getHighlighted: function() {
            var selection = window.getSelection(),
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