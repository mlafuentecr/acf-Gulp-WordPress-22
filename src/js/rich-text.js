(function (wp) {
	//ICONS https://icon-sets.iconify.design/dashicons/minus/
	/*------------------------------------------*/
	//     RS underline
	/*------------------------------------------*/
	//Front end
	var rs_underline = function (props) {
		return wp.element.createElement(wp.editor.RichTextToolbarButton, {
			icon: 'admin-customizer',
			title: 'rs underline',
			onClick: function () {
				props.onChange(
					wp.richText.toggleFormat(props.value, {
						type: 'mariolafuente/rich-text',
					})
				);
			},
		});
	};

	//Backend
	//	wp.richText.unregisterFormatType('core/underline'); remove the original underline
	wp.richText.registerFormatType('mariolafuente/rich-text', {
		title: 'rs underline',
		tagName: 'span',
		className: 'rs_underline',
		edit: rs_underline,
	});

	/*------------------------------------------*/
	//     RS underline
	/*------------------------------------------*/
	//Front end
	var rs_dash = function (props) {
		return wp.element.createElement(wp.editor.RichTextToolbarButton, {
			icon: 'minus',
			title: 'rs underline',
			onClick: function () {
				props.onChange(
					wp.richText.toggleFormat(props.value, {
						type: 'mariolafuente/underline',
					})
				);
			},
		});
	};

	//Backend
	wp.richText.registerFormatType('mariolafuente/underline', {
		title: 'rs underline',
		tagName: 'span',
		className: 'rs_dash',
		edit: rs_dash,
	});
})(window.wp);
