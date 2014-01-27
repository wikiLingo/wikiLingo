var WLPluginAssistant = (function(document, $, expressionSyntaxes, WLPluginEditor) {
	var assistants = [],
		hideAll,
		types = expressionSyntaxes['Plugin'].types,
		construct = function(el) {
			var me = this,
                $el = $(el),
				cl = el.getAttribute('id') + 'button',
				buttonDrag = this.button = document.createElement('img'),
				$buttonDrag = $(buttonDrag),
				buttonEdit = this.button = document.createElement('img'),
				$buttonEdit = $(buttonEdit);

			this.bindToEl(el);

            this.buttonDrag = buttonDrag
            this.buttonEdit = buttonEdit;

			buttonDrag.setAttribute('src', 'editor/img/arrow-move.png');
			buttonDrag.setAttribute('contenteditable', 'false');
			buttonDrag.className = cl + ' helper drag';
			buttonDrag.setAttribute('data-helper', 'true');

			$buttonDrag
				.on('dragstart', function() {
                    me.$el.detach();
                    $buttonDrag.fadeTo(0, 0);
                    $buttonEdit.detach();
				})
				.on('mouseover', function(e) {
                    me.$el.addClass('focused');
                    e.stopPropagation();
				})
				.on('mouseout', function() {
                    me.$el.removeClass('focused');
				});

			buttonDrag.ondragend = document.body.ondragend = function(e) {
                setTimeout(function() {
                    me.$el.removeClass('focused');
                    $buttonDrag
                        .detach()
                        .fadeTo(0, 1);

                    $('img.' + cl).filter(':visible')
                        .first()
                        .after(me.el)
                        .remove();

                    $el.change();
                }, 1);
			};

			buttonEdit.setAttribute('src', 'editor/img/cog.png');
			buttonEdit.setAttribute('contenteditable', 'false');
			buttonEdit.className = cl + ' helper edit';
			buttonEdit.setAttribute('data-helper', 'true');

			buttonEdit.onclick = function() {
                me.insert = me.replaceEl;
				me.assembleParametersFromEl();
			};
			$buttonEdit
				.on('dragstart', function(e) {
					e.preventDefault();
				})
				.on('mouseover', function(e) {
					me.$el.addClass('focused');
					e.stopPropagation();
				})
				.on('mouseout', function() {
					me.$el.removeClass('focused');
				});

			this.show = function() {
				this.hideAll();
				var pos = me.$el.position();
				$buttonDrag
					.insertBefore(me.$el)
					.css('left', (pos.left + 10) + 'px')
					.css('top', pos.top + 'px');

				$buttonEdit
					.insertBefore(me.$el)
					.css('left', (pos.left + 35) + 'px')
					.css('top', pos.top + 'px');
			};

			this.hide = function() {
				if (!me.el.unhidable) {
					$buttonDrag.detach();
					$buttonEdit.detach();
				}
			};

			assistants.push(this);
		};

	construct.prototype = {
		hideAll: hideAll = function() {
			for (var i = 0; i < assistants.length; i++) {
				assistants[i].hide();
			}
		},
		assembleParametersFromEl: function() {
			var me = this,
                $el = this.$el,
				parameters = decodeURIComponent($el.attr('data-plugin-parameters').replace(/[+]/g, ' ') + ''),
				existingParameters = (parameters ? JSON.parse(parameters) : {}),
				typeName = $el.attr('data-plugin-type'),
				type = types[typeName],
				wLPluginEditor = new WLPluginEditor(type, this.el.innerHTML),
				defaultParameters = wLPluginEditor.parameters,
				parametersOverride = {},
				parameterValue,

				i;

			for( i in defaultParameters ) {
				parametersOverride[i] = {
					label: defaultParameters[i].label,
					type: defaultParameters[i].type,
					value: (existingParameters[i] ? existingParameters[i] : defaultParameters[i].value)
				};
			}

			wLPluginEditor.ui(parametersOverride, function(html) {
                me.insert(html);
            });
		},
        replaceEl: function(newEl) {
            var firewall = document.createElement('div');
            firewall.innerHTML = newEl;
            var el = firewall.children[0];

            this.$el.after(el).remove();

            this.bindToEl(el);
        },
        bindToEl: function(el) {
            this.el = el;
            this.$el = $(el);
            el.onmouseover = this.onmouseover;
            el.assistant = this;
        },
        onmouseover: function(e) {
            this.assistant.show();
            e.stopPropagation();
        }
	};

	document.onkeydown = function() {
		hideAll();
	};

	return construct;
})(document, jQuery, expressionSyntaxes, WLPluginEditor);