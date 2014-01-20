var
	WLPlugin = function(el) {
		if (el.getAttribute('data-draggable') == 'true') {
			new WLPluginAssistant(el, this);
		}
	},
	color = function(element) {
		var newColor = prompt('What color?', element.style['color']);
		if (newColor) {
			element.style['color'] = newColor
		}
	},
	table = function(element) {

	};

$(function() {
	//bubble is the contenteditable toolbar, it is very simple and instantiated here
	var
        editable = document.getElementById('editable'),
        bubble = new WLBubble(window.expressionSyntaxes, editable),
		//medium makes contenteditable behave
		medium = bubble.medium = new Medium({
			element: editable,
			mode: 'rich',
			placeholder: 'Your Article',
			cssClasses: [],
			attributes: {
				remove: []
			},
			tags: {
				paragraph: 'p',
				outerLevel: ['pre','blockquote', 'figure', 'hr', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'ul', 'strong', 'code', 'br', 'b', 'span'],
				innerLevel: ['a', 'b', 'u', 'i', 'img', 'div', 'strong', 'li', 'span', 'code', 'br']
			},
			modifiers: []
		}),
		updateSource = function() {
            var source = document.getElementById('editable').innerHTML,
                editableSource = document.getElementById('editableSource');
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'reflect.php',
                data: {wikiLingo:true, w: source},
                success: function(result) {
                    editableSource.value = result.output;
                }
            });
		},
		updateWYSIWYG = function() {
            var source = document.getElementById('editableSource').value,
                editable = document.getElementById('editable');
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'reflect.php',
                data: {w: source, wysiwyg:true},
                success: function(result) {
                    editable.innerHTML = result.output;
                    window.wLPlugins = result.plugins;

                    $('body')
                        .append(result.css)
                        .append(result.script)
                        .trigger('resetWLPlugins');
                }
            });
		};

	document.onmouseup = function() {
		bubble.goToSelection();
	};

	$('#editable')
		.on('focus', function() {
			this.before = this.innerHTML;
			return this;
		})
		.on('blur keyup paste input', function() {
			var $this = $(this);
			if (this.before !== this.innerHTML) {
				this.before = this.innerHTML;
				setTimeout(function() {
					$this.trigger('change');
				}, 10);
			}
			return this;
		})
		.on('change', updateSource);

	$('#editableSource')
		.on('change', updateWYSIWYG);


	$('body')
		.on('resetWLPlugins', function() {
			for(var i = 0; i < wLPlugins.length; i++) {
				new WLPlugin(document.getElementById(wLPlugins[i]));
			}
		})
		.trigger('resetWLPlugins');


    bubble.staticToTop();

	console.log(window.expressionSyntaxes);
});