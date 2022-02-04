(function (wp) {
	//ICONS https://icon-sets.iconify.design/dashicons/minus/
	/*------------------------------------------*/
	//     RS underline
	/*------------------------------------------*/
	//Front end
	// var rs_underline = function (props) {
	// 	return wp.element.createElement(wp.editor.RichTextToolbarButton, {
	// 		icon: 'admin-customizer',
	// 		title: 'rs underline',
	// 		onClick: function () {
	// 			props.onChange(
	// 				wp.richText.toggleFormat(props.value, {
	// 					type: 'mariolafuente/rich-text',
	// 				})
	// 			);
	// 		},
	// 	});
	// };

	// //Backend
	// //	wp.richText.unregisterFormatType('core/underline'); remove the original underline
	// wp.richText.registerFormatType('mariolafuente/rich-text', {
	// 	title: 'rs underline',
	// 	tagName: 'span',
	// 	className: 'rs_underline',
	// 	edit: rs_underline,
	// });

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
						type: 'mariolafuente/underline',
					})
				);
			},
		});
	};

	//Backend
	wp.richText.registerFormatType('mariolafuente/underline', {
		title: 'rs link line on',
		tagName: 'span',
		className: 'rs_line_on',
		edit: rs_link_on,
	});
})(window.wp);
