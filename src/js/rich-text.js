(function (wp) {
	//ICONS https://icon-sets.iconify.design/dashicons/minus/

	/*------------------------------------------*/
	//     RS rs_link_on
	/*------------------------------------------*/
	//Front end
	var rs_link_on = function (props) {
		return wp.element.createElement(wp.editor.RichTextToolbarButton, {
			icon: 'minus',
			title: 'rs link line on',
			onClick: function () {
				props.onChange(
					wp.richText.toggleFormat(props.value, {
						type: 'rs/underline',
					})
				);
			},
			isActive: props.isActive,
		});
	};

	//Backend
	wp.richText.registerFormatType('rs/underline', {
		title: 'rs link with line ',
		tagName: 'span',
		className: 'rs_line_on',
		edit: rs_link_on,
	});

	// BIG TITLE
	//Front end
	var rs_subtitle = function (props) {
		return wp.element.createElement(wp.editor.RichTextToolbarButton, {
			icon: 'heading',
			title: 'rs big Title',
			onClick: function () {
				props.onChange(
					wp.richText.toggleFormat(props.value, {
						type: 'rs/bigtitle',
					})
				);
			},
			isActive: props.isActive,
		});
	};

	//Backend
	wp.richText.registerFormatType('rs/bigtitle', {
		title: 'rs big title',
		tagName: 'span',
		className: 'text-big',
		edit: rs_subtitle,
	});

	// SUBTITLE
	//Front end
	var rs_subtitle = function (props) {
		return wp.element.createElement(wp.editor.RichTextToolbarButton, {
			icon: 'heading',
			title: 'rs subtitle',
			onClick: function () {
				props.onChange(
					wp.richText.toggleFormat(props.value, {
						type: 'rs/subtitle',
					})
				);
			},
			isActive: props.isActive,
		});
	};

	//Backend
	wp.richText.registerFormatType('rs/subtitle', {
		title: 'rs subtitle',
		tagName: 'span',
		className: 'rs_subtitle',
		edit: rs_subtitle,
	});
})(window.wp);
