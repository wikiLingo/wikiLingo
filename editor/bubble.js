var WLBubble = (function(document, window, $, rangy, Math, ui) {

	var floatingClassNameHide = 'wl-bubble wl-hide',
        floatingClassNameShow = 'wl-bubble wl-show',
        staticClassName = 'wl-bubble wl-bubble-static',

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

    var construct = function(expressions, element) {
	        var me = this,
                $element = $(this.element = element),
                floatingBubble = this.floatingBubble = document.createElement('nav'),
                floatingBubbleInner = this.floatingBubbleInner = document.createElement('ul'),
                staticBubble = this.staticBubble = document.createElement('nav'),
                staticBubbleInner = this.staticBubbleInner = document.createElement('ul'),
	            i,
                j,
	            e,
	            button,
                typeContainer,
                typePicker,
	            point = document.createElement('div'),
		        factory = this.factory = document.createElement('div'),
                selection;

            // Listen for the event.
            $element
                .on('blur', function (e) {
                    if (e.target.isPartOfBubble) {
                        selection = rangy.saveSelection();
                    } else {
                        selection = null;
                    }
                })
                .on('mousedown', function (e) {
                    staticBubble.style.top = Math.max(e.pageY - staticBubble.clientHeight, staticBubble.origTop) + 'px';
            });

		    factory.createElement = function(e) {
			    this.innerHTML = e.example;
			    if (this.children[0].innerHTML === 'expression') {
				    this.children[0].innerHTML = '';
			    }
			    return this.children[0];
		    };
            floatingBubble.appendChild(floatingBubbleInner);
            floatingBubble.className = floatingClassNameHide;

            staticBubble.className = staticClassName;
            staticBubble.appendChild(staticBubbleInner);
            staticBubble.onmouseenter = function() {
                $element.addClass('wl-focused');
            };
            staticBubble.onmouseleave = function() {
                $element.removeClass('wl-focused');
            };

	        this.expressions = expressions;
	        this.buttons = [];
	        this.groups = {};
		    this.plugins = {};

	        for (i in expressions) {
	            e = expressions[i];
	            e.example = decodeURIComponent(e.example).replace(/[+]/g, ' ');
	            button = document.createElement('li');
                button.isPartOfBubble = true;
                if (e.example) {

                    if (ui[i]) {
                        button.SyntaxGenerator = ui[i];
                    }

                    button.onmousedown = function(e) {
                        var expression = e.target.expression,
                            element = factory.createElement(expression),
	                        after = null,
                            attributes = {},
                            j;
                        if (selection) {
                            rangy.restoreSelection(selection);
                            selection = null;
                        }
                        element.isPartOfBubble = true;

                        if (element.children.length == 0) {
                            for (j = 0; j < element.attributes.length; j++) {
                                attributes[element.attributes[j].name] = element.attributes[j].value;
                            }

                            for (j in expression.extraAttributes) {
                                attributes[j] = expression.extraAttributes[j];
                            }

                            if (this.SyntaxGenerator) {
                                var syntaxGenerator = new this.SyntaxGenerator(element, attributes, expression);
                                element = syntaxGenerator.element();
                                attributes = syntaxGenerator.attributes();
	                            after = function() {
	                                syntaxGenerator.after();
                                };
                            }

                            var applier = (rangy.createCssClassApplier(element.className, {
                                wikiLingoTypeName: e.name,
                                elementTagName: element.tagName.toLowerCase(),
                                elementAttributes: attributes
                            }));

                            applier.toggleSelection();

	                        if (after) {
		                        after();
	                        }
                        } else {
                            document.execCommand('insertHTML', false, expression.example);
                        }

                        stop(e);
                    };
                }

	            button.innerHTML = e.icon;
	            button.className = e.iconClass;
	            button.setAttribute('title', e.label);
	            button.expression = e;

                if (e.types) {
                    typeContainer = document.createElement('ul');
                    typeContainer.isPartOfBubble = true;
                    typeContainer.className = 'wl-bubble-static';
                    for (j in e.types) {
                        if (e.types[j].draggable === false) {
                            continue;
                        }
                        typePicker = document.createElement('li');
                        typePicker.isPartOfBubble = true;
                        typePicker.innerHTML = e.types[j].label;
	                    if (ui[i]) {
                            typePicker.expressionType = e.types[j];
		                    typePicker.expressionTypeName = j;
		                    typePicker.SyntaxGenerator = ui[i];
		                    typePicker.onmousedown = function(e) {
			                    var target = e.target,
                                    syntaxGenerator = new target.SyntaxGenerator(target.expressionTypeName, target.expressionType, 'true');

			                    syntaxGenerator.render(function(output) {
				                    element.medium.insertHtml(output);
				                    me.hide();
			                    });

			                    stop(e);
		                    };
		                    typePicker.onmouseup = stop;
	                    }
                        typeContainer.appendChild(typePicker);
                    }
                    button.appendChild(typeContainer);
                }

	            this.buttons.push(button);

	            if (!this.groups[e.group]) {
	                this.groups[e.group] = [];
	            }
	            this.groups[e.group].push(button);
	        }

	        this.appendGroup(staticBubbleInner, 'plugins', true);
	        this.appendGroup(floatingBubbleInner, 'font');
	        this.appendGroup(floatingBubbleInner, 'common');
	        this.appendGroup(floatingBubbleInner, 'header', true);
	        this.appendGroup(floatingBubbleInner, 'link', true);
	        this.appendGroup(floatingBubbleInner, 'main');
	        this.appendGroup(floatingBubbleInner, 'misc', true);

	        point.className = 'wl-bubble-point';
	        point.innerHTML = '&#9662;';
            floatingBubble.insertBefore(point, floatingBubble.firstChild);

            document.body.appendChild(floatingBubble);
            document.body.appendChild(staticBubble);
	    },
		types = this.types = {};

    construct.prototype = {
        appendGroup : function(defaultParent, group, minimize) {
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
                    defaultParent.appendChild(parentContainer);
                    parentContainer.appendChild(
                        parent = document.createElement('ul')
                    );
                } else {
                    parent = defaultParent;
                }

                for (i in this.groups[group]) {
                    parent.appendChild(this.groups[group][i]);
                }

                this.groups[group] = null;
            }
        },
	    hide: function() {
		    this.floatingBubble.className = floatingClassNameHide;
	    },
        goToSelection : function()
        {
            var high = this.getHighlighted(),
                b = this.floatingBubble,
                s = b.style;

	        if (high) {
	            if (high.range.startOffset === high.range.endOffset || !high.text) {
	                b.className = floatingClassNameHide;
	            } else {
	                s.display = 'inline-block';
	                b.className = floatingClassNameShow;
	                s.top = ((high.boundary.top - 5 + window.pageYOffset) - 65) + "px";
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
        },
        staticToTop: function() {
            var pos = $(this.element).offset(),
                style = this.staticBubble.style,
                height = this.staticBubble.clientHeight,
                width = this.staticBubble.clientWidth;

            this.staticBubble.origTop = pos.top;

            style.position = 'absolute';
            style.top = pos.top + 'px';
            style.left = (pos.left - width - 1) + 'px';
        }
    };

    return construct;
})(document, window, jQuery, rangy, Math, WLExpressionUI);
