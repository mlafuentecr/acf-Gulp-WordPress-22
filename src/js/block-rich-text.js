(function (wp) {
	const special_Underline = function (props) {
		return wp.element.createElement(wp.editor.RichTextToolbarButton, {
			icon: 'editor-underline',
			title: 'Special Underline',
			onClick: function () {
				props.onChange(wp.richText.toggleFormat(props.value, { type: 'special-underline/output' }));
			},
			isActive: props.isActive,
		});
	};

	wp.richText.registerFormatType('special-underline/output', {
		title: 'Special Underline',
		tagName: 'span',
		className: 'special-Underline',
		edit: special_Underline,
	});
})(window.wp);
