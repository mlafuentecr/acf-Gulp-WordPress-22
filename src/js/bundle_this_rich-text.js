(function (wp) {
	//ICONS https://icon-sets.iconify.design/dashicons/minus/

	// BIG TITLE Este se cambio
	//Front end
	const rs_bigxl = function (props) {
		return wp.element.createElement(wp.editor.RichTextToolbarButton, {
			icon: 'heading',
			title: 'rs Title xl',
			onClick: function () {
				props.onChange(
					wp.richText.toggleFormat(props.value, {
						type: 'rs/titlexl',
					})
				);
			},
			isActive: props.isActive,
		});
	};

	//Backend
	wp.richText.registerFormatType('rs/titlexl', {
		title: ' rs Title xl',
		tagName: 'span',
		className: 'rs_title_xl',
		edit: rs_bigxl,
	});

	// SUBTITLE
	//Front end
	const rs_subtitle = function (props) {
		return wp.element.createElement(wp.editor.RichTextToolbarButton, {
			icon: 'heading',
			title: 'rs Subtitle',
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
		title: 'rs Subtitle',
		tagName: 'span',
		className: 'rs_subtitle',
		edit: rs_subtitle,
	});

	// LANGING PAGE
	//Front end
	const rs_Landing_small_title = function (props) {
		return wp.element.createElement(wp.editor.RichTextToolbarButton, {
			icon: 'heading',
			title: 'Landing comment',
			onClick: function () {
				props.onChange(
					wp.richText.toggleFormat(props.value, {
						type: 'rs/landingsmalltittle',
					})
				);
			},
			isActive: props.isActive,
		});
	};

	//Backend
	wp.richText.registerFormatType('rs/landingsmalltittle', {
		title: 'Landing comment',
		tagName: 'span',
		className: 'rs_lp_comment',
		edit: rs_Landing_small_title,
	});

	// LANDING COMMENT
	//Front end
	const rs_Landing_comment = function (props) {
		return wp.element.createElement(wp.editor.RichTextToolbarButton, {
			icon: 'heading',
			title: 'Landing small title',
			onClick: function () {
				props.onChange(
					wp.richText.toggleFormat(props.value, {
						type: 'rs/comment',
					})
				);
			},
			isActive: props.isActive,
		});
	};

	//Backend
	wp.richText.registerFormatType('rs/comment', {
		title: 'Landing small title',
		tagName: 'span',
		className: 'rs_comment',
		edit: rs_Landing_comment,
	});

	// LANDING COMMENT Author
	//Front end
	const rs_Landing_author_name = function (props) {
		return wp.element.createElement(wp.editor.RichTextToolbarButton, {
			icon: 'heading',
			title: 'Landing author name',
			onClick: function () {
				props.onChange(
					wp.richText.toggleFormat(props.value, {
						type: 'rs/author',
					})
				);
			},
			isActive: props.isActive,
		});
	};

	//Backend
	wp.richText.registerFormatType('rs/author', {
		title: 'Landing author name',
		tagName: 'span',
		className: 'rs_lp_author_name',
		edit: rs_Landing_author_name,
	});

	// LANDING COMMENT Position
	//Front end
	const rs_Landing_author_position = function (props) {
		return wp.element.createElement(wp.editor.RichTextToolbarButton, {
			icon: 'heading',
			title: 'Landing author position',
			onClick: function () {
				props.onChange(
					wp.richText.toggleFormat(props.value, {
						type: 'rs/position',
					})
				);
			},
			isActive: props.isActive,
		});
	};

	//Backend
	wp.richText.registerFormatType('rs/position', {
		title: 'Landing author position',
		tagName: 'span',
		className: 'rs_lp_author_position',
		edit: rs_Landing_author_position,
	});

	/*------------------------------------------*/
	//     RS CASE STUDY BUT WILL BE FOR ALL
	/*------------------------------------------*/

	// title_hero
	//SECTIO TITLE
	const rs_title_hero = function (props) {
		return wp.element.createElement(wp.editor.RichTextToolbarButton, {
			icon: 'heading',
			title: 'rs Title hero',
			onClick: function () {
				props.onChange(
					wp.richText.toggleFormat(props.value, {
						type: 'rs/titlehero',
					})
				);
			},
			isActive: props.isActive,
		});
	};
	wp.richText.registerFormatType('rs/titlehero', {
		title: 'rs Title hero',
		tagName: 'span',
		className: 'rs_title_hero',
		edit: rs_title_hero,
	});

	//SECTIO TITLE LARGE
	const rs_title_large = function (props) {
		return wp.element.createElement(wp.editor.RichTextToolbarButton, {
			icon: 'heading',
			title: 'rs Title large',
			onClick: function () {
				props.onChange(
					wp.richText.toggleFormat(props.value, {
						type: 'rs/titlelarge',
					})
				);
			},
			isActive: props.isActive,
		});
	};
	wp.richText.registerFormatType('rs/titlelarge', {
		title: 'rs Title large',
		tagName: 'span',
		className: 'rs_title_large',
		edit: rs_title_large,
	});

	//SECTIO TITLE LARGE
	const rs_title_medium = function (props) {
		return wp.element.createElement(wp.editor.RichTextToolbarButton, {
			icon: 'heading',
			title: 'rs Title medium',
			onClick: function () {
				props.onChange(
					wp.richText.toggleFormat(props.value, {
						type: 'rs/titlemedium',
					})
				);
			},
			isActive: props.isActive,
		});
	};
	wp.richText.registerFormatType('rs/titlemedium', {
		title: 'rs Title medium',
		tagName: 'span',
		className: 'rs_title_medium',
		edit: rs_title_medium,
	});

	//SECTIO TITLE Small
	const rs_title_small = function (props) {
		return wp.element.createElement(wp.editor.RichTextToolbarButton, {
			icon: 'heading',
			title: 'rs Title small',
			onClick: function () {
				props.onChange(
					wp.richText.toggleFormat(props.value, {
						type: 'rs/titlesmall',
					})
				);
			},
			isActive: props.isActive,
		});
	};
	wp.richText.registerFormatType('rs/titlesmall', {
		title: 'rs Title small',
		tagName: 'span',
		className: 'rs_title_small',
		edit: rs_title_small,
	});

	//SECTIO Body Large
	const rs_body_large = function (props) {
		return wp.element.createElement(wp.editor.RichTextToolbarButton, {
			icon: 'heading',
			title: 'rs Body Large',
			onClick: function () {
				props.onChange(
					wp.richText.toggleFormat(props.value, {
						type: 'rs/bodylarge',
					})
				);
			},
			isActive: props.isActive,
		});
	};
	wp.richText.registerFormatType('rs/bodylarge', {
		title: 'rs Body Large',
		tagName: 'span',
		className: 'rs_body_large',
		edit: rs_body_large,
	});

	//SECTIO Body medium
	const rs_body_medium = function (props) {
		return wp.element.createElement(wp.editor.RichTextToolbarButton, {
			icon: 'heading',
			title: 'rs Body Medium',
			onClick: function () {
				props.onChange(
					wp.richText.toggleFormat(props.value, {
						type: 'rs/bodymedium',
					})
				);
			},
			isActive: props.isActive,
		});
	};
	wp.richText.registerFormatType('rs/bodymedium', {
		title: 'rs Body Medium',
		tagName: 'span',
		className: 'rs_body_medium',
		edit: rs_body_medium,
	});

	//SECTIO Body medium
	const rs_label = function (props) {
		return wp.element.createElement(wp.editor.RichTextToolbarButton, {
			icon: 'heading',
			title: 'rs Label',
			onClick: function () {
				props.onChange(
					wp.richText.toggleFormat(props.value, {
						type: 'rs/label',
					})
				);
			},
			isActive: props.isActive,
		});
	};
	wp.richText.registerFormatType('rs/label', {
		title: 'rs Label',
		tagName: 'span',
		className: 'rs_label',
		edit: rs_label,
	});

	//SECTIO Highlighted phrase
	const rs_highlighted_phrase = function (props) {
		return wp.element.createElement(wp.editor.RichTextToolbarButton, {
			icon: 'heading',
			title: 'rs Highlighted phrase',
			onClick: function () {
				props.onChange(
					wp.richText.toggleFormat(props.value, {
						type: 'rs/highlighted',
					})
				);
			},
			isActive: props.isActive,
		});
	};
	wp.richText.registerFormatType('rs/highlighted', {
		title: 'rs Highlighted phrase',
		tagName: 'span',
		className: 'rs_highlighted_phrase',
		edit: rs_highlighted_phrase,
	});

	//SECTIO Highlighted circle
	const rs_circle = function (props) {
		return wp.element.createElement(wp.editor.RichTextToolbarButton, {
			icon: 'heading',
			title: 'rs Highlighted circle white',
			onClick: function () {
				props.onChange(
					wp.richText.toggleFormat(props.value, {
						type: 'rs/highlightedcircle',
					})
				);
			},
			isActive: props.isActive,
		});
	};
	wp.richText.registerFormatType('rs/highlightedcircle', {
		title: 'rs Highlighted circle white',
		tagName: 'span',
		className: 'rs_circle',
		edit: rs_circle,
	});

	//SECTIO Highlighted circle
	const rs_circle_yellow = function (props) {
		return wp.element.createElement(wp.editor.RichTextToolbarButton, {
			icon: 'heading',
			title: 'rs Highlighted circle yellow',
			onClick: function () {
				props.onChange(
					wp.richText.toggleFormat(props.value, {
						type: 'rs/highlightedcircleyellow',
					})
				);
			},
			isActive: props.isActive,
		});
	};
	wp.richText.registerFormatType('rs/highlightedcircleyellow', {
		title: 'rs Highlighted circle yellow',
		tagName: 'span',
		className: 'rs_circle_yellow',
		edit: rs_circle_yellow,
	});

	/*------------------------------------------*/
	//     RS rs_link_on
	/*------------------------------------------*/
	//Front end
	const rs_link_on = function (props) {
		return wp.element.createElement(wp.editor.RichTextToolbarButton, {
			icon: 'minus',
			title: 'rs underline link ',
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
		title: 'rs underline link ',
		tagName: 'span',
		className: 'rs_line_on',
		edit: rs_link_on,
	});

	/*------------------------------------------*/
	//     RS rs_link_on
	/*------------------------------------------*/
	//Front end
	const rs_link_on_yellow = function (props) {
		return wp.element.createElement(wp.editor.RichTextToolbarButton, {
			icon: 'minus',
			title: 'rs underline link yellow',
			onClick: function () {
				props.onChange(
					wp.richText.toggleFormat(props.value, {
						type: 'rs/underlineyellow',
					})
				);
			},
			isActive: props.isActive,
		});
	};

	//Backend
	wp.richText.registerFormatType('rs/underlineyellow', {
		title: 'rs underline link yellow',
		tagName: 'span',
		className: 'rs_link_on_yellow',
		edit: rs_link_on_yellow,
	});

	/*------------------------------------------*/
	//     RS rs_link_on
	/*------------------------------------------*/
	//Front end
	const rs_title_medium_underline = function (props) {
		return wp.element.createElement(wp.editor.RichTextToolbarButton, {
			icon: 'minus',
			title: 'rs underline title medium',
			onClick: function () {
				props.onChange(
					wp.richText.toggleFormat(props.value, {
						type: 'rs/titleunderline',
					})
				);
			},
			isActive: props.isActive,
		});
	};

	//Backend
	wp.richText.registerFormatType('rs/titleunderline', {
		title: 'rs underline title medium',
		tagName: 'span',
		className: 'rs_title_medium_underline',
		edit: rs_title_medium_underline,
	});
	//////////////////////////////////////////////////////
})(window.wp);
