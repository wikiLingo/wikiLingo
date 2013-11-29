var WikiLingoBubble = (function(d, w, m) {
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
            tempStyleElement;

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
                highlightedHtml = me.getHighlightedHtml();
                console.log(highlightedHtml);
                //check if we need to remove style
                if (highlightedHtml.elements) {
                    for(var i in highlightedHtml.elements) {
                        var element = highlightedHtml.elements[i];
                        if (element) {
                            if (element.attributes) {
                                if (element.attributes['data-type']) {
                                    if (element.attributes['data-type'].value.split('\\').pop() == this.expression.name) {
                                        element.parentNode.removeChild(element);
                                        d.execCommand('insertHTML', false, element.innerHTML);
                                        return false;
                                    }
                                }
                            }
                        }
                    }
                }
                firewall.innerHTML = this.expression.example;
                tempStyleElement = firewall.children[0];
                tempStyleElement.setAttribute('id', 'bubbleInserted');

                d.execCommand('insertHTML', false, firewall.innerHTML);
                tempStyleElement.removeAttribute('id');
                tempStyleElement = d.getElementById('bubbleInserted');
                tempStyleElement.innerHTML = highlightedHtml;
                tempStyleElement.removeAttribute('id');
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
        point.innerText = '&#x25BE;';
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
                s.top = ((high.boundary.top - 5 + window.pageYOffset) - 45) + "px";
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
        },
        getHighlightedHtml: function() {
            var html = "";
            if (typeof window.getSelection != "undefined") {
                var sel = window.getSelection();
                if (sel.rangeCount) {
                    var container = document.createElement("div");
                    for (var i = 0, len = sel.rangeCount; i < len; ++i) {
                        container.appendChild(sel.getRangeAt(i).cloneContents());
                    }
                    html = new String(container.innerHTML);
                    html.elements = [sel.focusNode.parentNode, sel.focusNode.nextSibling, sel.focusNode.previousSibling, sel.anchorNode.nextSibling];
                }
            } else if (typeof document.selection != "undefined") {
                if (document.selection.type == "Text") {
                    html = document.selection.createRange().htmlText;
                }
            }
            return html;
        }
    };

    return construct;
})(document, window, Math);