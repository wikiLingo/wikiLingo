rangy.rangePrototype.insertNodeAtEnd = function(node) {
	var range = this.cloneRange();
	range.collapse(false);
	range.insertNode(node);
	range.detach();
	this.setEndAfter(node);
};

var
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
	var bubble = new WLBubble(window.expressionSyntaxes),

		//medium makes contenteditable behave
		medium = bubble.medium = new Medium({
			element: document.getElementById('editable'),
			mode: 'rich',
			placeholder: 'Your Article',
			cssClasses: [],
			attributes: {
				remove: []
			},
			tags: {
				paragraph: 'p',
				outerLevel: ['pre','blockquote', 'figure', 'hr', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'div', 'ul', 'strong', 'code', 'br', 'b'],
				innerLevel: ['a', 'b', 'u', 'i', 'img', 'div', 'strong', 'li', 'span', 'code', 'br']
			},
			modifiers: []
		}),
		updateSource = function() {
			var source = document.getElementById('editable').innerHTML;
			$.ajax({
				type: 'POST',
				dataType: 'json',
				url: 'reflect.php',
				data: {wikiLingo:true, w: source},
				success: function(result) {
					document.getElementById('editableSource').value = result.output;
				}
			});
		};

	document.body.appendChild(bubble.bubble);

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

	console.log(window.expressionSyntaxes);
});