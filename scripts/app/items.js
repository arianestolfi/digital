/**
 * View logic for Items
 */

/**
 * application logic specific to the Item listing page
 */
var page = {

	items: new model.ItemCollection(),
	collectionView: null,
	item: null,
	modelView: null,
	isInitialized: false,
	isInitializing: false,

	fetchParams: { filter: '', orderBy: '', orderDesc: '', page: 1 },
	fetchInProgress: false,
	dialogIsOpen: false,

	/**
	 *
	 */
	init: function() {
		// ensure initialization only occurs once
		if (page.isInitialized || page.isInitializing) return;
		page.isInitializing = true;

		if (!$.isReady && console) console.warn('page was initialized before dom is ready.  views may not render properly.');

		// make the new button clickable
		$("#newItemButton").click(function(e) {
			e.preventDefault();
			page.showDetailDialog();
		});

		// let the page know when the dialog is open
		$('#itemDetailDialog').on('show',function() {
			page.dialogIsOpen = true;
		});

		// when the model dialog is closed, let page know and reset the model view
		$('#itemDetailDialog').on('hidden',function() {
			$('#modelAlert').html('');
			page.dialogIsOpen = false;
		});

		// save the model when the save button is clicked
		$("#saveItemButton").click(function(e) {
			e.preventDefault();
			page.updateModel();
		});

		// initialize the collection view
		this.collectionView = new view.CollectionView({
			el: $("#itemCollectionContainer"),
			templateEl: $("#itemCollectionTemplate"),
			collection: page.items
		});

		// initialize the search filter
		$('#filter').change(function(obj) {
			page.fetchParams.filter = $('#filter').val();
			page.fetchParams.page = 1;
			page.fetchItems(page.fetchParams);
		});
		
		// make the rows clickable ('rendered' is a custom event, not a standard backbone event)
		this.collectionView.on('rendered',function(){

			// attach click handler to the table rows for editing
			$('table.collection tbody tr').click(function(e) {
				e.preventDefault();
				var m = page.items.get(this.id);
				page.showDetailDialog(m);
			});

			// make the headers clickable for sorting
 			$('table.collection thead tr th').click(function(e) {
 				e.preventDefault();
				var prop = this.id.replace('header_','');

				// toggle the ascending/descending before we change the sort prop
				page.fetchParams.orderDesc = (prop == page.fetchParams.orderBy && !page.fetchParams.orderDesc) ? '1' : '';
				page.fetchParams.orderBy = prop;
				page.fetchParams.page = 1;
 				page.fetchItems(page.fetchParams);
 			});

			// attach click handlers to the pagination controls
			$('.pageButton').click(function(e) {
				e.preventDefault();
				page.fetchParams.page = this.id.substr(5);
				page.fetchItems(page.fetchParams);
			});
			
			page.isInitialized = true;
			page.isInitializing = false;
		});

		// backbone docs recommend bootstrapping data on initial page load, but we live by our own rules!
		this.fetchItems({ page: 1 });

		// initialize the model view
		this.modelView = new view.ModelView({
			el: $("#itemModelContainer")
		});

		// tell the model view where it's template is located
		this.modelView.templateEl = $("#itemModelTemplate");

		if (model.longPollDuration > 0)	{
			setInterval(function () {

				if (!page.dialogIsOpen)	{
					page.fetchItems(page.fetchParams,true);
				}

			}, model.longPollDuration);
		}
	},

	/**
	 * Fetch the collection data from the server
	 * @param object params passed through to collection.fetch
	 * @param bool true to hide the loading animation
	 */
	fetchItems: function(params, hideLoader) {
		// persist the params so that paging/sorting/filtering will play together nicely
		page.fetchParams = params;

		if (page.fetchInProgress) {
			if (console) console.log('supressing fetch because it is already in progress');
		}

		page.fetchInProgress = true;

		if (!hideLoader) app.showProgress('loader');

		page.items.fetch({

			data: params,

			success: function() {

				if (page.items.collectionHasChanged) {
					// TODO: add any logic necessary if the collection has changed
					// the sync event will trigger the view to re-render
				}

				app.hideProgress('loader');
				page.fetchInProgress = false;
			},

			error: function(m, r) {
				app.appendAlert(app.getErrorMessage(r), 'alert-error',0,'collectionAlert');
				app.hideProgress('loader');
				page.fetchInProgress = false;
			}

		});
	},

	/**
	 * show the dialog for editing a model
	 * @param model
	 */
	showDetailDialog: function(m) {

		// show the modal dialog
		$('#itemDetailDialog').modal({ show: true });

		// if a model was specified then that means a user is editing an existing record
		// if not, then the user is creating a new record
		page.item = m ? m : new model.ItemModel();

		page.modelView.model = page.item;

		if (page.item.id == null || page.item.id == '') {
			// this is a new record, there is no need to contact the server
			page.renderModelView(false);
		} else {
			app.showProgress('modelLoader');

			// fetch the model from the server so we are not updating stale data
			page.item.fetch({

				success: function() {
					// data returned from the server.  render the model view
					page.renderModelView(true);
				},

				error: function(m, r) {
					app.appendAlert(app.getErrorMessage(r), 'alert-error',0,'modelAlert');
					app.hideProgress('modelLoader');
				}

			});
		}

	},

	/**
	 * Render the model template in the popup
	 * @param bool show the delete button
	 */
	renderModelView: function(showDeleteButton)	{
		page.modelView.render();

		app.hideProgress('modelLoader');

		// initialize any special controls
		try {
			$('.date-picker')
				.datepicker()
				.on('changeDate', function(ev){
					$('.date-picker').datepicker('hide');
				});
		} catch (error) {
			// this happens if the datepicker input.value isn't a valid date
			if (console) console.log('datepicker error: '+error.message);
		}
		
		$('.timepicker-default').timepicker({ defaultTime: 'value' });

		// populate the dropdown options for holder
		// TODO: load only the selected value, then fetch all options when the drop-down is clicked
		var holderValues = new model.HolderCollection();
		holderValues.fetch({
			success: function(c){
				var dd = $('#holder');
				dd.append('<option value=""></option>');
				c.forEach(function(item,index) {
					dd.append(app.getOptionHtml(
						item.get('idholder'),
						item.get('holder'), // TODO: change fieldname if the dropdown doesn't show the desired column
						page.item.get('holder') == item.get('idholder')
					));
				});
				
				if (!app.browserSucks()) {
					dd.combobox();
					$('div.combobox-container + span.help-inline').hide(); // TODO: hack because combobox is making the inline help div have a height
				}

			},
			error: function(collection,response,scope) {
				app.appendAlert(app.getErrorMessage(response), 'alert-error',0,'modelAlert');
			}
		});

		// populate the dropdown options for level
		// TODO: load only the selected value, then fetch all options when the drop-down is clicked
		var levelValues = new model.LevelCollection();
		levelValues.fetch({
			success: function(c){
				var dd = $('#level');
				dd.append('<option value=""></option>');
				c.forEach(function(item,index) {
					dd.append(app.getOptionHtml(
						item.get('idlevel'),
						item.get('type'), // TODO: change fieldname if the dropdown doesn't show the desired column
						page.item.get('level') == item.get('idlevel')
					));
				});
				
				if (!app.browserSucks()) {
					dd.combobox();
					$('div.combobox-container + span.help-inline').hide(); // TODO: hack because combobox is making the inline help div have a height
				}

			},
			error: function(collection,response,scope) {
				app.appendAlert(app.getErrorMessage(response), 'alert-error',0,'modelAlert');
			}
		});

		// populate the dropdown options for institution
		// TODO: load only the selected value, then fetch all options when the drop-down is clicked
		var institutionValues = new model.InstitutionCollection();
		institutionValues.fetch({
			success: function(c){
				var dd = $('#institution');
				dd.append('<option value=""></option>');
				c.forEach(function(item,index) {
					dd.append(app.getOptionHtml(
						item.get('idinstitution'),
						item.get('name'), // TODO: change fieldname if the dropdown doesn't show the desired column
						page.item.get('institution') == item.get('idinstitution')
					));
				});
				
				if (!app.browserSucks()) {
					dd.combobox();
					$('div.combobox-container + span.help-inline').hide(); // TODO: hack because combobox is making the inline help div have a height
				}

			},
			error: function(collection,response,scope) {
				app.appendAlert(app.getErrorMessage(response), 'alert-error',0,'modelAlert');
			}
		});


		if (showDeleteButton) {
			// attach click handlers to the delete buttons

			$('#deleteItemButton').click(function(e) {
				e.preventDefault();
				$('#confirmDeleteItemContainer').show('fast');
			});

			$('#cancelDeleteItemButton').click(function(e) {
				e.preventDefault();
				$('#confirmDeleteItemContainer').hide('fast');
			});

			$('#confirmDeleteItemButton').click(function(e) {
				e.preventDefault();
				page.deleteModel();
			});

		} else {
			// no point in initializing the click handlers if we don't show the button
			$('#deleteItemButtonContainer').hide();
		}
	},

	/**
	 * update the model that is currently displayed in the dialog
	 */
	updateModel: function() {
		// reset any previous errors
		$('#modelAlert').html('');
		$('.control-group').removeClass('error');
		$('.help-inline').html('');

		// if this is new then on success we need to add it to the collection
		var isNew = page.item.isNew();

		app.showProgress('modelLoader');

		page.item.save({

			'holder': $('select#holder').val(),
			'level': $('select#level').val(),
			'institution': $('select#institution').val(),
			'inventoryid': $('input#inventoryid').val(),
			'uritype': $('input#uritype').val(),
			'uri': $('input#uri').val(),
			'keywords': $('input#keywords').val(),
			'description': $('textarea#description').val(),
			'uidtype': $('input#uidtype').val(),
			'uid': $('input#uid').val(),
			'class': $('input#class').val(),
			'type': $('input#type').val(),
			'iseletronic': $('input#iseletronic').val(),
			'creationdate': $('input#creationdate').val(),
			'acquisitiondate': $('input#acquisitiondate').val(),
			'scopecontent': $('textarea#scopecontent').val(),
			'originalexistence': $('input#originalexistence').val(),
			'originallocation': $('input#originallocation').val(),
			'repositorycode': $('input#repositorycode').val(),
			'copyexistence': $('input#copyexistence').val(),
			'copylocation': $('input#copylocation').val(),
			'legalaccess': $('input#legalaccess').val(),
			'accesscondition': $('input#accesscondition').val(),
			'reproductionrights': $('input#reproductionrights').val(),
			'reproductionrightsdescription': $('textarea#reproductionrightsdescription').val(),
			'itemdate': $('input#itemdate').val(),
			'publishdate': $('input#publishdate').val(),
			'publisher': $('input#publisher').val(),
			'itematributes': $('textarea#itematributes').val(),
			'ispublic': $('input#ispublic').val(),
			'preliminaryrule': $('textarea#preliminaryrule').val(),
			'punctuation': $('input#punctuation').val(),
			'notes': $('textarea#notes').val(),
			'otherinformation': $('textarea#otherinformation').val(),
			'idfather': $('input#idfather').val(),
			'titledefault': $('input#titledefault').val(),
			'subitem': $('input#subitem').val(),
			'deletecomfirm': $('input#deletecomfirm').val(),
			'typeitem': $('input#typeitem').val(),
			'edition': $('input#edition').val(),
			'isexposed': $('input#isexposed').val(),
			'isoriginal': $('input#isoriginal').val(),
			'ispart': $('input#ispart').val(),
			'haspart': $('input#haspart').val(),
			'ispartof': $('input#ispartof').val(),
			'numberofcopies': $('input#numberofcopies').val(),
			'tobepublicin': $('input#tobepublicin').val(),
			'creationdateattributed': $('input#creationdateattributed').val(),
			'itemdateattributed': $('input#itemdateattributed').val(),
			'publishdateattributed': $('input#publishdateattributed').val(),
			'serachdump': $('textarea#serachdump').val(),
			'itemmediadir': $('input#itemmediadir').val()
		}, {
			wait: true,
			success: function(){
				$('#itemDetailDialog').modal('hide');
				setTimeout("app.appendAlert('Item was sucessfully " + (isNew ? "inserted" : "updated") + "','alert-success',3000,'collectionAlert')",500);
				app.hideProgress('modelLoader');

				// if the collection was initally new then we need to add it to the collection now
				if (isNew) { page.items.add(page.item) }

				if (model.reloadCollectionOnModelUpdate) {
					// re-fetch and render the collection after the model has been updated
					page.fetchItems(page.fetchParams,true);
				}
		},
			error: function(model,response,scope){

				app.hideProgress('modelLoader');

				app.appendAlert(app.getErrorMessage(response), 'alert-error',0,'modelAlert');

				try {
					var json = $.parseJSON(response.responseText);

					if (json.errors) {
						$.each(json.errors, function(key, value) {
							$('#'+key+'InputContainer').addClass('error');
							$('#'+key+'InputContainer span.help-inline').html(value);
							$('#'+key+'InputContainer span.help-inline').show();
						});
					}
				} catch (e2) {
					if (console) console.log('error parsing server response: '+e2.message);
				}
			}
		});
	},

	/**
	 * delete the model that is currently displayed in the dialog
	 */
	deleteModel: function()	{
		// reset any previous errors
		$('#modelAlert').html('');

		app.showProgress('modelLoader');

		page.item.destroy({
			wait: true,
			success: function(){
				$('#itemDetailDialog').modal('hide');
				setTimeout("app.appendAlert('The Item record was deleted','alert-success',3000,'collectionAlert')",500);
				app.hideProgress('modelLoader');

				if (model.reloadCollectionOnModelUpdate) {
					// re-fetch and render the collection after the model has been updated
					page.fetchItems(page.fetchParams,true);
				}
			},
			error: function(model,response,scope) {
				app.appendAlert(app.getErrorMessage(response), 'alert-error',0,'modelAlert');
				app.hideProgress('modelLoader');
			}
		});
	}
};

