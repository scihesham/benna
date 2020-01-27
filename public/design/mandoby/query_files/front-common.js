/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ 4:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(5);


/***/ }),

/***/ 5:
/***/ (function(module, exports) {

(function (w, $) {

	// categories owl slider
	w.beginOwlSlider = function (html) {
		var categoriesPortal = $('.categories-portals'),
		    catSlide,
		    catFilters = $('.cats-filter li a');

		catSlide = categoriesPortal.owlCarousel({
			rtl: true,
			autoplay: true,
			autoplaySpeed: 1600,
			autoplayTimeout: 6000,
			autoplayHoverPause: true,
			loop: true,
			center: true,
			margin: 30,
			navSpeed: 1200,
			dragSpeed: 1200,
			dragEndSpeed: 1200,
			nav: true,
			responsive: {
				320: {
					items: 1,
					stagePadding: 20
				},
				420: {
					items: 1,
					stagePadding: 20
				},
				640: {
					items: 3,
					stagePadding: 20
				},
				1250: {
					items: 3,
					stagePadding: 20
				},
				1251: {
					items: 5,
					stagePadding: -40
				}
			},
			navText: ["<i class='zm-icon zm-caret-right'></i>", "<i class='zm-icon zm-caret-left'></i>"],
			onInitialized: function onInitialized(e) {
				var idx = e.item.index,
				    owlItem = categoriesPortal.find('.owl-item');
				owlItem.eq(idx - 1).addClass('centered');
				owlItem.eq(idx + 1).addClass('centered');
			}
		});
		catSlide.on('translate.owl.carousel', function (e) {
			var idx = e.item.index,
			    owlItem = categoriesPortal.find('.owl-item');
			owlItem.removeClass('centered');
			owlItem.eq(idx - 1).addClass('centered');
			owlItem.eq(idx + 1).addClass('centered');
		});
		catFilters.on('click', function () {
			var $this = $(this);
			if ($this.parent().hasClass('active') || categoriesPortal.hasClass('loading-content')) {
				return null;
			}
			$this.parent().addClass('active').siblings().removeClass('active').parents('.tf--holder').prepend('<div class="loading-scene animated fadeIn"><span></span><span></span><span></span></div>');
			categoriesPortal.addClass('loading-content');

			setTimeout(function () {
				$this.parents('.tf--holder').find('.loading-scene').remove();
				categoriesPortal.removeClass('loading-content');
			}, 1500);
		});
	};

	// offers owlslider
	w.beginOfferOwlSlider = function () {
		var offerCompaniesList = $('.companies-list');

		offerCompaniesList.owlCarousel({
			rtl: true,
			loop: false,
			autoWidth: true,
			items: 4,
			margin: 10,
			navSpeed: 600,
			dragSpeed: 600,
			dragEndSpeed: 600,
			nav: true,
			navText: ["<i class='zm-icon zm-caret-right'></i>", "<i class='zm-icon zm-caret-left'></i>"]
		});

		offerCompaniesList.on('click', '.owl-item', function (e) {
			var carousel = offerCompaniesList.data('owl.carousel'),
			    target = $(e.target),
			    $this = $(this);
			if (target.is('button')) {
				offerCompaniesList.trigger('remove.owl.carousel', carousel.relative($this.index())).trigger('refresh.owl.carousel');
			}
			e.preventDefault();
		});
	};

	// selected companies in search page slider
	w.beginSearchOwlSlider = function () {
		$('.companies-selected-list').owlCarousel({
			rtl: true,
			loop: false,
			autoWidth: true,
			items: 4,
			margin: 10,
			navSpeed: 600,
			dragSpeed: 600,
			dragEndSpeed: 600,
			nav: true,
			navText: ["<i class='zm-icon zm-caret-right'></i>", "<i class='zm-icon zm-caret-left'></i>"]
		});
	};

	// semantic calendar
	w.beginSemanticCalendar = function () {
		var subStart = $('.ui.calendar.featured-from'),
		    subEnd = $('.ui.calendar.featured-to'),
		    subStartOption = {
			endCalendar: subEnd
		},
		    subEndOption = {
			startCalendar: subStart
		},
		    offerDateOptions = {
			className: {
				calendar: 'popup-calendar'
			},
			formatter: {
				date: function date(_date, settings) {
					if (!_date) return '';
					var day = _date.getDate();
					var month = _date.getMonth() + 1;
					var year = _date.getFullYear();
					return year + '-' + month + '-' + day;
				}
			},
			type: 'date',
			firstDayOfWeek: 6,
			text: {
				days: ['Ø£', 'Ø§Ø«', 'Ø«', 'Ø£Ø±', 'Ø®', 'Ø¬', 'Ø³'],
				months: ['ÙŠÙ†Ø§ÙŠØ±', 'ÙØ¨Ø±Ø§ÙŠØ±', 'Ù…Ø§Ø±Ø³', 'Ø§Ø¨Ø±ÙŠÙ„', 'Ù…Ø§ÙŠÙˆ', 'ÙŠÙˆÙ†ÙŠÙˆ', 'ÙŠÙˆÙ„ÙŠÙˆ', 'Ø§ØºØ³Ø·Ø³', 'Ø³Ø¨ØªÙ…Ø¨Ø±', 'Ø§ÙƒØªÙˆØ¨Ø±', 'Ù†ÙˆÙÙ…Ø¨Ø±', 'Ø¯ÙŠØ³Ù…Ø¨Ø±'],
				monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
				today: 'Ø§Ù„ÙŠÙˆÙ…',
				now: 'Ø§Ù„Ø¢Ù†',
				am: 'Øµ',
				pm: 'Ù…'
			}
		};

		console.log(subStart);
		subStart.calendar($.extend(offerDateOptions, subStartOption));
		subEnd.calendar($.extend(offerDateOptions, subEndOption));
	};

	// add to favorites
	var favoriteAction = {
		init: function init() {
			var that = this;

			that.prepare(that);
		},
		prepare: function prepare(that) {
			$('.add-to-favorite').on('click', that.ajax);
		},
		ajax: function ajax() {
			var that = $(this),
			    id = that.data('id');

			$.ajax({
				url: w.Laravel.url + '/favorites',
				method: 'POST',
				data: {
					model_id: id,
					_token: w.Laravel.csrfToken
				},
				success: function success(response) {
					toastr.success(response.message);
				},
				error: function error() {
					setTimeout(function () {
						that.text('Ø¥Ø¶Ø§ÙØ© Ù„Ù„Ù…ÙØ¶Ù„Ø©').removeClass('faved');
					}, 700);
				}
			});
		}

		// too many tags
	};var tagsTooMany = {
		init: function init() {
			var that = this;

			that.prepare(that);
			that.event(that);
		},
		prepare: function prepare(that) {
			that.tagsDom = $('.tags-too-many');
		},
		event: function event(that) {
			$.each(that.tagsDom, function (i, v) {
				var $that = $(this),
				    count = $that.data('count'),
				    not = $that.find('a.not'),
				    length = $that.find('a').not('.not').length;

				if (length > count) {
					var index = count - 1;
					$that.find('a:gt(' + index + ')').not('.not').hide().addClass('more-tags');
					not.text(length - count + '+').on('click', that.show);
				} else {
					not.hide();
				}
			});
		},
		show: function show(e) {
			e.preventDefault();
			var $not = $(this),
			    hiddenItems = $not.parent().find('.more-tags');

			hiddenItems.fadeIn(1500);
			$not.fadeOut(500);
		}

		// add loading icons to ajax icons
	};w.ajaxBtn = {
		init: function init() {
			var that = this;
			that.prepare(that);

			if (!that.checkExist(that)) return;

			that.append(that);
			that.event(that);
		},
		prepare: function prepare(that) {
			that.btn = $('.ajax-btn');
		},
		checkExist: function checkExist(that) {
			return that.btn.length > 0;
		},
		append: function append(that) {
			that.btn.each(function () {
				if (!$(this).hasClass('ld-ext-left')) $(this).addClass('ld-ext-left').append('<div class="ld ld-ring ld-spin"></div>');
			});
		},
		event: function event(that) {
			that.btn.each(function () {
				$(this).on('click', function () {
					$(this).addClass('disabled loading-ajax');
				});
			});
		}

		// load sub countries 
	};w.parentChildDropdown = {
		init: function init() {
			var that = this;

			that.prepare(that);
			that.events(that);
		},
		prepare: function prepare(that) {
			that.parent = $('.parent-ajax');
			that.parentField = that.parent.find('input[type=hidden]');

			if (that.parentField.length > 1) that.parentField.each(function (i, item) {
				if ($(this).val()) that.beforeSendToAjax($(this), that);
			});else if (that.parentField.val()) that.beforeSendToAjax(that.parentField, that);
		},
		beforeSendToAjax: function beforeSendToAjax($that, that, eventType) {
			var type = $that.data('child'),
			    child = $that.data('child-class');

			that.childContainer = $('.' + child);

			if (eventType == 'change') that.childContainer.find('input[type=hidden]').val('');

			that.ajaxAction($that.val(), type, child, that);
		},
		events: function events(that) {
			that.parentField.on('change', function () {
				that.beforeSendToAjax($(this), that, 'change');
			});
		},
		ajaxAction: function ajaxAction(value, type, child, that) {
			$.ajax({
				url: w.Laravel.url + '/api/' + type + '/list',
				method: 'GET',
				data: {
					'parent': value
				},
				success: function success(response) {
					that.childContainer = $('.' + child);
					that.loadChild(response.data, that);
					$('.ui.dropdown.' + child).dropdown();
				}
			});
		},
		loadChild: function loadChild(data, that) {
			// console.log(that.childContainer)
			var subMenuChild = that.childContainer.find('.scrolling.menu, .sub-menu').html('');
			$.each(data, function (i, v) {
				subMenuChild.append('<div class="item" data-value="' + v.name + '">' + v.name + '</div>');
			});
		}

		// handle delete companies from quotation request modal 
	};w.deleteOfferChosenCompany = function () {
		var deleteBtn = $('.companies-to .btn-close');
		if (deleteBtn.length) {
			deleteBtn.each(function () {
				$(this).on('click', function (e) {
					var $this = $(this);
					$this.parents('li').addClass('animated fadeOut');
					setTimeout(function () {
						$this.parents('li').remove();
					}, 350);
					e.preventDefault();
				});
			});
		}
	};

	w.startUploaderPlugin = function () {
		var modal = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;
		var types = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'image/png|image/jpeg';
		var btnTitle = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 'Ø§Ø±ÙÙ‚ ØµÙˆØ±Ø©';

		var uploader = $('#uploader-file');
		if (uploader.length) {
			uploader.uploaderGallery({
				title: 'Ø¹Ø¯Ø¯ Ø§Ù„ØµÙˆØ± Ø§Ù„Ù…Ø³Ù…ÙˆØ­ Ø¨Ù‡ : 4 Ù…Ù„ÙØ§Øª',
				classes: "bena-uploader",
				showbtn: true,
				btnClasses: "btn-upload-attachments",
				btnTitle: btnTitle,
				thumbClasses: "",
				thumbDeleteIcon: "",
				thumbDeleteBtnClass: "",
				thumbImgClasses: "",
				thumbPrevHtml: "", // html before image tag
				thumbNextHtml: "", // html after image tag
				totalNumber: 4,
				maxFileSize: 2000,
				// mime types allowed
				mimetypes: types,
				// mimetypes: '|application/pdf',
				onAdding: function onAdding(total, currentLength) {

					if (total == currentLength) {
						w.showToastAlert(w.Laravel.max_files_message, 'error');
						return false;
					}
					return true;
				}, // on files added 

				// on file exceed size
				onFileExceedSize: function onFileExceedSize(filename) {
					w.showToastAlert('Ù„Ù‚Ø¯ ØªØ¹Ø¯Ù‰ (' + filename + ') Ø§Ù„Ù…Ø³Ø§Ø­Ù‡ Ø§Ù„Ù…Ø³Ù…ÙˆØ­ Ø¨Ù‡Ø§ (' + this.maxFileSize + ' KB)', 'error');
				},

				afterEachLoad: function afterEachLoad() {
					modal.modal('refresh');
				},
				// submit action
				submitFormTrigger: true,
				ajaxSubmit: w.submitModalForm
			});
		}
	};

	// show toast 
	w.showToastAlert = function (text, type) {
		$.toast({
			heading: '',
			text: text,
			textAlign: 'right',
			showHideTransition: 'fade',
			icon: type,
			allowToastClose: false,
			position: 'top-left',
			loader: false,
			hideAfter: 3000
		});
	};

	// handle quotation modal 
	w.quotationModal = function (modal, companies) {
		var content = modal.find('.content');

		if (companies.length <= 0) {
			toastr.error(w.Laravel.select_company_first_message);
			return;
		}

		$.ajax({
			url: w.Laravel.url + '/orders/create',
			data: {
				company: companies
			},
			method: 'GET',
			success: function success(response) {
				content.html(response.html);
				modal.modal('show');

				// close modal
				modal.find('.btn-cancel').on('click', function () {
					modal.modal('hide');
				});

				// remove company from modal 
				w.deleteOfferChosenCompany();

				// begin applying uploader plugin
				var uploaderFile = content.find('input.uploader-file');

				if (uploaderFile.length) {
					uploaderFile.uploaderGallery({
						title: 'Ø£Ùˆ Ø³Ø­Ø¨ Ø§Ù„Ù…Ù„ÙØ§Øª Ø¥Ù„Ù‰ Ù‡Ù†Ø§',
						classes: "",
						showbtn: true,
						btnClasses: "btn-upload-attachments zm-icon zm-upload",
						btnTitle: 'Ø§Ø±ÙØ¹ Ù…Ù„ÙØ§Øª Ù…Ø±ÙÙ‚Ø©',
						thumbClasses: "",
						thumbDeleteIcon: "",
						thumbDeleteBtnClass: "",
						thumbImgClasses: "",
						thumbPrevHtml: "", // html before image tag
						thumbNextHtml: "", // html after image tag
						totalNumber: 4,
						// mime types allowed
						mimetypes: "image/png|image/jpeg",
						onAdding: function onAdding(total, currentLength) {

							if (total == currentLength) {
								toastr.error(w.Laravel.max_files_message);
								return false;
							}
							return true;
						},
						// submit action
						submitFormTrigger: true,
						ajaxSubmit: w.submitModalForm
					});
				}
			}
		});
	};

	// submit modal form 
	w.submitModalForm = function (e) {
		e.preventDefault();

		var that = $(this),
		    modal = that.closest('.modal'),
		    message = that.find('.edit-confirm-msg, .confirm-msg'),
		    formUrl = that.attr('action'),
		    form = new FormData(that[0]);

		if (that.hasClass('ajax')) return;

		// append files if exist
		$.each(e.data.files, function (i, v) {
			form.append("photos[]", v);
		});

		$.ajax({
			url: formUrl,
			data: form,
			processData: false,
			contentType: false,
			type: 'post',
			beforeSend: function beforeSend() {
				that.find('.error').removeClass('error').find('small').remove();
				that.addClass('ajax');
			},
			success: function success(response) {
				message.html("<i class='zm-icon zm-check'></i>" + response.message).show();

				setTimeout(function () {
					modal.modal('hide');
				}, 1000);
			},
			error: function error(data) {
				var errors = data.responseJSON;

				$.each(errors, function (i, v) {
					var name = i.indexOf('.') > -1 ? i.split('.')[0] : i; // to handle error array 
					that.find('[name="' + name + '"]').closest('.field').addClass('error').append('<small>' + v + '</small>');;
				});

				w.showToastAlert(w.Laravel.fields_error, 'error');
			},
			complete: function complete() {
				that.removeClass('ajax');
			}
		});
	};

	// validate email
	w.validateEmail = function (sEmail) {
		var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
		if (filter.test(sEmail)) return true;else return false;
	};

	// submit form 
	w.submitForm = function () {
		$('.ajax-form-submittion').on('submit', function (e) {
			e.preventDefault();
			var that = $(this),
			    message = that.find('.confirm-msg'),
			    formUrl = that.attr('action'),
			    formtp = that.attr('method'),
			    form = new FormData(that[0]);

			if (that.hasClass('ajax')) return;

			$.ajax({
				url: formUrl,
				type: formtp,
				processData: false,
				contentType: false,
				data: form,
				beforeSend: function beforeSend() {
					that.find('.error').removeClass('error').find('small').remove();
					that.addClass('ajax');
				},
				success: function success(response) {
					that.find('input,textarea').not("[name=_token]").val('');
				},
				error: function error(data) {
					var errors = data.responseJSON;

					$.each(errors.errors, function (i, v) {
						console.log(i);
						that.find('[name="' + i + '"]').closest('.field').addClass('error').append('<small>' + v + '</small>');
					});

					w.showToastAlert(w.Laravel.fields_error, 'error');
				},
				complete: function complete() {
					that.removeClass('ajax');
				}
			});
		});
	};

	// handle add multiple fields in registration page (Phones & socials)
	w.registrationOptions = function () {
		var dynamicEntries = $('.field.dynamic-numbers');

		dynamicEntries.each(function () {
			var addBtn = $(this).find('.btn.btn-add-cn'),
			    parent = addBtn.parent(),
			    contactInput = $(this).find('.input-field'),
			    entriesList = $(this).find('ul');
			addBtn.hide();
			contactInput.keyup(function () {
				if ($(this).val() == '') {
					addBtn.removeClass('fadeIn').addClass('fadeOut').hide();
				} else {
					addBtn.removeClass('fadeOut').addClass('fadeIn').show();
				}
			});
			addBtn.on('click', function (e) {

				if ($('#branch').length) $('#branch').modal('refresh');

				if (!contactInput.val().length > 0) {
					return false;
				} else {
					var entryVal = contactInput.val().toString();
					contactInput.val('').focus();

					var type = $(this).data('type');
					var inputName = type == 'social' ? type + '[' + $(this).parent().find('[name=socail_type]').val() + ']' : type + '[]';
					var newEntry = '<li class="animated fadeInLeft"><button class="zm-icon zm-close delete-entry"></button><span><input type="hidden" name="' + inputName + '" value="' + entryVal + '">' + entryVal + '</span></li>';
					entriesList.append(newEntry);
					e.preventDefault();
					// --------------------
					deleteMe();
					if ($('.registration-steps').length) {
						$('.registration-steps').trigger('refresh.owl.carousel');
					}
				}
			});
			deleteMe();
			function deleteMe() {
				entriesList.children('li').each(function () {
					$(this).find('button.delete-entry').click(function (e) {
						var $this = $(this);
						e.preventDefault();
						$this.parent('li').removeClass('fadeInLeft').addClass('fadeOut').animate({
							marginLeft: 0,
							width: 0
						}, 300);
						setTimeout(function () {
							$this.parent().remove();
						}, 300);
						if ($('.registration-steps').length) {
							setTimeout(function () {
								$('.registration-steps').trigger('refresh.owl.carousel');
							}, 300);
						}
					});
				});
			}
		});

		w.delImage();
	};

	// close modal
	w.closeModalBtn = function (modal) {
		$('.cancel-modal').on('click', function (e) {
			e.preventDefault();
			modal.modal('hide');
		});
	};

	// delete attachment for governmental image uploader
	w.delImage = function () {
		$('.delete-uc').on('click', function () {
			$this = $(this);
			console.log('deleting uploaded file!');
			$this.parent().removeClass('fadeIn').addClass('fadeOutLeft');
			setTimeout(function () {
				$this.parent().remove();
			}, 500);
			return false;
		});
	};

	$(document).ready(function () {
		// check if favorites exist
		if ($('.add-to-favorite').length > 0) favoriteAction.init();

		// tags too many
		if ($('.tags-too-many').length > 0) tagsTooMany.init();

		w.submitForm();

		// unauthorized click
		$('.unauthorized').on('click', function (e) {
			e.preventDefault();
			e.stopImmediatePropagation();

			w.showToastAlert(w.Laravel.unauthorized_message, 'warning');
		});

		// handle quotation request modal
		$('.quotation-modal-array').on('click', function (e) {
			e.preventDefault();
			var modal = $('.offer-req'),
			    companies = [];
			$.each($("input[name='quotation-requ-check']:checked"), function () {
				companies.push($(this).val());
			});
			// load modal by ajax to make it globally used
			w.quotationModal(modal, companies);
		});

		// add loading icon to button
		w.ajaxBtn.init();

		// handle countries & cities
		w.parentChildDropdown.init();

		// display session messages
		if ($('.ajax-message').length > 0) {
			var ajaxMessage = $('.ajax-message'),
			    type = ajaxMessage.data('type');

			w.showToastAlert($('.ajax-message').text(), type);
		}

		// fix arabic numbers
		$('.engilsh-number-only').numeric({ allowEmpty: true, live: true });
	});

	// catch all ajax errors
	$(document).ajaxError(function (event, request, settings) {
		var errors = request.responseJSON;

		if (request.status == 401) w.showToastAlert(w.Laravel.unauthorized_message, 'warning');else if (request.status == 403) w.showToastAlert(w.Laravel.not_allowed_message, 'warning');
	});

	// catch all ajax send 
	$(document).ajaxStart(function () {
		$('.loading-ajax').addClass('running disabled').prop('disabled', true);
	});

	// catch all ajax complete
	$(document).ajaxComplete(function () {
		$('.loading-ajax').removeClass('running disabled loading-ajax').prop('disabled', false);

		ajaxBtn.init();
	});
})(window, jQuery);

/***/ })

/******/ });