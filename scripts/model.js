/**
 * backbone model definitions for DIGITAL
 */

/**
 * Use emulated HTTP if the server doesn't support PUT/DELETE or application/json requests
 */
Backbone.emulateHTTP = false;
Backbone.emulateJSON = false;

var model = {};

/**
 * long polling duration in miliseconds.  (5000 = recommended, 0 = disabled)
 * warning: setting this to a low number will increase server load
 */
model.longPollDuration = 0;

/**
 * whether to refresh the collection immediately after a model is updated
 */
model.reloadCollectionOnModelUpdate = true;


/**
 * a default sort method for sorting collection items.  this will sort the collection
 * based on the orderBy and orderDesc property that was used on the last fetch call
 * to the server. 
 */
model.AbstractCollection = Backbone.Collection.extend({
	totalResults: 0,
	totalPages: 0,
	currentPage: 0,
	pageSize: 0,
	orderBy: '',
	orderDesc: false,
	lastResponseText: null,
	lastRequestParams: null,
	collectionHasChanged: true,
	
	/**
	 * fetch the collection from the server using the same options and 
	 * parameters as the previous fetch
	 */
	refetch: function() {
		this.fetch({ data: this.lastRequestParams })
	},
	
	/* uncomment to debug fetch event triggers
	fetch: function(options) {
            this.constructor.__super__.fetch.apply(this, arguments);
	},
	// */
	
	/**
	 * client-side sorting baesd on the orderBy and orderDesc parameters that
	 * were used to fetch the data from the server.  Backbone ignores the
	 * order of records coming from the server so we have to sort them ourselves
	 */
	comparator: function(a,b) {
		
		var result = 0;
		var options = this.lastRequestParams;
		
		if (options && options.orderBy) {
			
			// lcase the first letter of the property name
			var propName = options.orderBy.charAt(0).toLowerCase() + options.orderBy.slice(1);
			var aVal = a.get(propName);
			var bVal = b.get(propName);
			
			if (isNaN(aVal) || isNaN(bVal)) {
				// treat comparison as case-insensitive strings
				aVal = aVal ? aVal.toLowerCase() : '';
				bVal = bVal ? bVal.toLowerCase() : '';
			} else {
				// treat comparision as a number
				aVal = Number(aVal);
				bVal = Number(bVal);
			}
			
			if (aVal < bVal) {
				result = options.orderDesc ? 1 : -1;
			} else if (aVal > bVal) {
				result = options.orderDesc ? -1 : 1;
			}
		}
		
		return result;

	},
	/**
	 * override parse to track changes and handle pagination
	 * if the server call has returned page data
	 */
	parse: function(response, options) {

		// the response is already decoded into object form, but it's easier to
		// compary the stringified version.  some earlier versions of backbone did
		// not include the raw response so there is some legacy support here
		var responseText = options && options.xhr ? options.xhr.responseText : JSON.stringify(response);
		this.collectionHasChanged = (this.lastResponseText != responseText);
		this.lastRequestParams = options ? options.data : undefined;
		
		// if the collection has changed then we need to force a re-sort because backbone will
		// only resort the data if a property in the model has changed
		if (this.lastResponseText && this.collectionHasChanged) this.sort({ silent:true });
		
		this.lastResponseText = responseText;
		
		var rows;

		if (response.currentPage) {
			rows = response.rows;
			this.totalResults = response.totalResults;
			this.totalPages = response.totalPages;
			this.currentPage = response.currentPage;
			this.pageSize = response.pageSize;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		} else {
			rows = response;
			this.totalResults = rows.length;
			this.totalPages = 1;
			this.currentPage = 1;
			this.pageSize = this.totalResults;
			this.orderBy = response.orderBy;
			this.orderDesc = response.orderDesc;
		}

		return rows;
	}
});

/**
 * Address Backbone Model
 */
model.AddressModel = Backbone.Model.extend({
	urlRoot: 'api/address',
	idAttribute: 'idaddress',
	idaddress: '',
	city: '',
	contact: '',
	street: '',
	number: '',
	complement: '',
	zipcode: '',
	otherinformation: '',
	defaults: {
		'idaddress': null,
		'city': '',
		'contact': '',
		'street': '',
		'number': '',
		'complement': '',
		'zipcode': '',
		'otherinformation': ''
	}
});

/**
 * Address Backbone Collection
 */
model.AddressCollection = model.AbstractCollection.extend({
	url: 'api/addresses',
	model: model.AddressModel
});

/**
 * City Backbone Model
 */
model.CityModel = Backbone.Model.extend({
	urlRoot: 'api/city',
	idAttribute: 'idcity',
	idcity: '',
	state: '',
	institution: '',
	citypublic: '',
	city: '',
	citycode: '',
	defaults: {
		'idcity': null,
		'state': '',
		'institution': '',
		'citypublic': '',
		'city': '',
		'citycode': ''
	}
});

/**
 * City Backbone Collection
 */
model.CityCollection = model.AbstractCollection.extend({
	url: 'api/cities',
	model: model.CityModel
});

/**
 * Contact Backbone Model
 */
model.ContactModel = Backbone.Model.extend({
	urlRoot: 'api/contact',
	idAttribute: 'idcontact',
	idcontact: '',
	institution: '',
	iditem: '',
	idexposition: '',
	idholder: '',
	idcreator: '',
	user: '',
	contactname: '',
	urla: '',
	contactcall: '',
	company: '',
	uri: '',
	identity: '',
	federaltaxcode: '',
	statetaxcode: '',
	countytaxcode: '',
	defaults: {
		'idcontact': null,
		'institution': '',
		'iditem': '',
		'idexposition': '',
		'idholder': '',
		'idcreator': '',
		'user': '',
		'contactname': '',
		'urla': '',
		'contactcall': '',
		'company': '',
		'uri': '',
		'identity': '',
		'federaltaxcode': '',
		'statetaxcode': '',
		'countytaxcode': ''
	}
});

/**
 * Contact Backbone Collection
 */
model.ContactCollection = model.AbstractCollection.extend({
	url: 'api/contacts',
	model: model.ContactModel
});

/**
 * Country Backbone Model
 */
model.CountryModel = Backbone.Model.extend({
	urlRoot: 'api/country',
	idAttribute: 'idcountry',
	idcountry: '',
	country: '',
	countrycode: '',
	defaults: {
		'idcountry': null,
		'country': '',
		'countrycode': ''
	}
});

/**
 * Country Backbone Collection
 */
model.CountryCollection = model.AbstractCollection.extend({
	url: 'api/countries',
	model: model.CountryModel
});

/**
 * Creator Backbone Model
 */
model.CreatorModel = Backbone.Model.extend({
	urlRoot: 'api/creator',
	idAttribute: 'idcreator',
	idcreator: '',
	institution: '',
	type: '',
	name: '',
	notes: '',
	birthdate: '',
	deathdate: '',
	nationality: '',
	maincontact: '',
	defaults: {
		'idcreator': null,
		'institution': '',
		'type': '',
		'name': '',
		'notes': '',
		'birthdate': '',
		'deathdate': '',
		'nationality': '',
		'maincontact': ''
	}
});

/**
 * Creator Backbone Collection
 */
model.CreatorCollection = model.AbstractCollection.extend({
	url: 'api/creators',
	model: model.CreatorModel
});

/**
 * CreatorAwardHonour Backbone Model
 */
model.CreatorAwardHonourModel = Backbone.Model.extend({
	urlRoot: 'api/creatorawardhonour',
	idAttribute: 'id',
	id: '',
	description: '',
	grantedby: '',
	title: '',
	type: '',
	defaults: {
		'id': null,
		'description': '',
		'grantedby': '',
		'title': '',
		'type': ''
	}
});

/**
 * CreatorAwardHonour Backbone Collection
 */
model.CreatorAwardHonourCollection = model.AbstractCollection.extend({
	url: 'api/creatorawardhonours',
	model: model.CreatorAwardHonourModel
});

/**
 * CreatorContact Backbone Model
 */
model.CreatorContactModel = Backbone.Model.extend({
	urlRoot: 'api/creatorcontact',
	idAttribute: 'id',
	id: '',
	type: '',
	contact: '',
	creator: '',
	defaults: {
		'id': null,
		'type': '',
		'contact': '',
		'creator': ''
	}
});

/**
 * CreatorContact Backbone Collection
 */
model.CreatorContactCollection = model.AbstractCollection.extend({
	url: 'api/creatorcontacts',
	model: model.CreatorContactModel
});

/**
 * CreatorHistory Backbone Model
 */
model.CreatorHistoryModel = Backbone.Model.extend({
	urlRoot: 'api/creatorhistory',
	idAttribute: 'id',
	id: '',
	type: '',
	creator: '',
	history: '',
	defaults: {
		'id': null,
		'type': '',
		'creator': '',
		'history': ''
	}
});

/**
 * CreatorHistory Backbone Collection
 */
model.CreatorHistoryCollection = model.AbstractCollection.extend({
	url: 'api/creatorhistories',
	model: model.CreatorHistoryModel
});

/**
 * CreatorReference Backbone Model
 */
model.CreatorReferenceModel = Backbone.Model.extend({
	urlRoot: 'api/creatorreference',
	idAttribute: 'id',
	id: '',
	type: '',
	creator: '',
	reference: '',
	defaults: {
		'id': null,
		'type': '',
		'creator': '',
		'reference': ''
	}
});

/**
 * CreatorReference Backbone Collection
 */
model.CreatorReferenceCollection = model.AbstractCollection.extend({
	url: 'api/creatorreferences',
	model: model.CreatorReferenceModel
});

/**
 * Creatorname Backbone Model
 */
model.CreatornameModel = Backbone.Model.extend({
	urlRoot: 'api/creatorname',
	idAttribute: 'idcreatorname',
	idcreatorname: '',
	creator: '',
	naname: '',
	type: '',
	defaults: {
		'idcreatorname': null,
		'creator': '',
		'naname': '',
		'type': ''
	}
});

/**
 * Creatorname Backbone Collection
 */
model.CreatornameCollection = model.AbstractCollection.extend({
	url: 'api/creatornames',
	model: model.CreatornameModel
});

/**
 * Dimension Backbone Model
 */
model.DimensionModel = Backbone.Model.extend({
	urlRoot: 'api/dimension',
	idAttribute: 'id',
	id: '',
	unit: '',
	value: '',
	defaults: {
		'id': null,
		'unit': '',
		'value': ''
	}
});

/**
 * Dimension Backbone Collection
 */
model.DimensionCollection = model.AbstractCollection.extend({
	url: 'api/dimensions',
	model: model.DimensionModel
});

/**
 * Documentation Backbone Model
 */
model.DocumentationModel = Backbone.Model.extend({
	urlRoot: 'api/documentation',
	idAttribute: 'iddocumentation',
	iddocumentation: '',
	item: '',
	institution: '',
	type: '',
	description: '',
	notes: '',
	defaults: {
		'iddocumentation': null,
		'item': '',
		'institution': '',
		'type': '',
		'description': '',
		'notes': ''
	}
});

/**
 * Documentation Backbone Collection
 */
model.DocumentationCollection = model.AbstractCollection.extend({
	url: 'api/documentations',
	model: model.DocumentationModel
});

/**
 * DocumentationMedia Backbone Model
 */
model.DocumentationMediaModel = Backbone.Model.extend({
	urlRoot: 'api/documentationmedia',
	idAttribute: 'id',
	id: '',
	documentationIddocumentation: '',
	mediasIdmedia: '',
	defaults: {
		'id': null,
		'documentationIddocumentation': '',
		'mediasIdmedia': ''
	}
});

/**
 * DocumentationMedia Backbone Collection
 */
model.DocumentationMediaCollection = model.AbstractCollection.extend({
	url: 'api/documentationmedias',
	model: model.DocumentationMediaModel
});

/**
 * Expoitem Backbone Model
 */
model.ExpoitemModel = Backbone.Model.extend({
	urlRoot: 'api/expoitem',
	idAttribute: 'id',
	id: '',
	item: '',
	exposition: '',
	type: '',
	defaults: {
		'id': null,
		'item': '',
		'exposition': '',
		'type': ''
	}
});

/**
 * Expoitem Backbone Collection
 */
model.ExpoitemCollection = model.AbstractCollection.extend({
	url: 'api/expoitems',
	model: model.ExpoitemModel
});

/**
 * Exposition Backbone Model
 */
model.ExpositionModel = Backbone.Model.extend({
	urlRoot: 'api/exposition',
	idAttribute: 'idexposition',
	idexposition: '',
	institution: '',
	location: '',
	curator: '',
	initialdate: '',
	enddate: '',
	description: '',
	notes: '',
	name: '',
	exposubtype: '',
	expotype: '',
	iscarriedbyotherinstitution: '',
	isinternational: '',
	otherinfo: '',
	defaults: {
		'idexposition': null,
		'institution': '',
		'location': '',
		'curator': '',
		'initialdate': '',
		'enddate': '',
		'description': '',
		'notes': '',
		'name': '',
		'exposubtype': '',
		'expotype': '',
		'iscarriedbyotherinstitution': '',
		'isinternational': '',
		'otherinfo': ''
	}
});

/**
 * Exposition Backbone Collection
 */
model.ExpositionCollection = model.AbstractCollection.extend({
	url: 'api/expositions',
	model: model.ExpositionModel
});

/**
 * ExpositionCreator Backbone Model
 */
model.ExpositionCreatorModel = Backbone.Model.extend({
	urlRoot: 'api/expositioncreator',
	idAttribute: 'id',
	id: '',
	attributed: '',
	location: '',
	type: '',
	creator: '',
	exposition: '',
	defaults: {
		'id': null,
		'attributed': '',
		'location': '',
		'type': '',
		'creator': '',
		'exposition': ''
	}
});

/**
 * ExpositionCreator Backbone Collection
 */
model.ExpositionCreatorCollection = model.AbstractCollection.extend({
	url: 'api/expositioncreators',
	model: model.ExpositionCreatorModel
});

/**
 * ExpositionDimension Backbone Model
 */
model.ExpositionDimensionModel = Backbone.Model.extend({
	urlRoot: 'api/expositiondimension',
	idAttribute: 'id',
	id: '',
	type: '',
	dimension: '',
	exposition: '',
	defaults: {
		'id': null,
		'type': '',
		'dimension': '',
		'exposition': ''
	}
});

/**
 * ExpositionDimension Backbone Collection
 */
model.ExpositionDimensionCollection = model.AbstractCollection.extend({
	url: 'api/expositiondimensions',
	model: model.ExpositionDimensionModel
});

/**
 * ExpositionHistory Backbone Model
 */
model.ExpositionHistoryModel = Backbone.Model.extend({
	urlRoot: 'api/expositionhistory',
	idAttribute: 'idhistory',
	idhistory: '',
	type: '',
	idexposition: '',
	history: '',
	defaults: {
		'idhistory': null,
		'type': '',
		'idexposition': '',
		'history': ''
	}
});

/**
 * ExpositionHistory Backbone Collection
 */
model.ExpositionHistoryCollection = model.AbstractCollection.extend({
	url: 'api/expositionhistories',
	model: model.ExpositionHistoryModel
});

/**
 * ExpositionPlacelocation Backbone Model
 */
model.ExpositionPlacelocationModel = Backbone.Model.extend({
	urlRoot: 'api/expositionplacelocation',
	idAttribute: 'id',
	id: '',
	type: '',
	contact: '',
	placelocation: '',
	exposition: '',
	defaults: {
		'id': null,
		'type': '',
		'contact': '',
		'placelocation': '',
		'exposition': ''
	}
});

/**
 * ExpositionPlacelocation Backbone Collection
 */
model.ExpositionPlacelocationCollection = model.AbstractCollection.extend({
	url: 'api/expositionplacelocations',
	model: model.ExpositionPlacelocationModel
});

/**
 * ExpositionReference Backbone Model
 */
model.ExpositionReferenceModel = Backbone.Model.extend({
	urlRoot: 'api/expositionreference',
	idAttribute: 'id',
	id: '',
	type: '',
	exposition: '',
	reference: '',
	defaults: {
		'id': null,
		'type': '',
		'exposition': '',
		'reference': ''
	}
});

/**
 * ExpositionReference Backbone Collection
 */
model.ExpositionReferenceCollection = model.AbstractCollection.extend({
	url: 'api/expositionreferences',
	model: model.ExpositionReferenceModel
});

/**
 * Fond Backbone Model
 */
model.FondModel = Backbone.Model.extend({
	urlRoot: 'api/fond',
	idAttribute: 'idfond',
	idfond: '',
	institution: '',
	fond: '',
	description: '',
	otherinformation: '',
	countitem: '',
	type: '',
	defaults: {
		'idfond': null,
		'institution': '',
		'fond': '',
		'description': '',
		'otherinformation': '',
		'countitem': '',
		'type': ''
	}
});

/**
 * Fond Backbone Collection
 */
model.FondCollection = model.AbstractCollection.extend({
	url: 'api/fonds',
	model: model.FondModel
});

/**
 * FondLevel Backbone Model
 */
model.FondLevelModel = Backbone.Model.extend({
	urlRoot: 'api/fondlevel',
	idAttribute: 'idfondlevel',
	idfondlevel: '',
	fondIdfond: '',
	levelsIdlevel: '',
	defaults: {
		'idfondlevel': null,
		'fondIdfond': '',
		'levelsIdlevel': ''
	}
});

/**
 * FondLevel Backbone Collection
 */
model.FondLevelCollection = model.AbstractCollection.extend({
	url: 'api/fondlevels',
	model: model.FondLevelModel
});

/**
 * History Backbone Model
 */
model.HistoryModel = Backbone.Model.extend({
	urlRoot: 'api/history',
	idAttribute: 'id',
	id: '',
	type: '',
	description: '',
	date: '',
	actor: '',
	item: '',
	institution: '',
	idexposition: '',
	cost: '',
	creator: '',
	ispublic: '',
	defaults: {
		'id': null,
		'type': '',
		'description': '',
		'date': '',
		'actor': '',
		'item': '',
		'institution': '',
		'idexposition': '',
		'cost': '',
		'creator': '',
		'ispublic': ''
	}
});

/**
 * History Backbone Collection
 */
model.HistoryCollection = model.AbstractCollection.extend({
	url: 'api/histories',
	model: model.HistoryModel
});

/**
 * HistoryMedia Backbone Model
 */
model.HistoryMediaModel = Backbone.Model.extend({
	urlRoot: 'api/historymedia',
	idAttribute: 'id',
	id: '',
	historyIdhistory: '',
	mediasIdmedia: '',
	defaults: {
		'id': null,
		'historyIdhistory': '',
		'mediasIdmedia': ''
	}
});

/**
 * HistoryMedia Backbone Collection
 */
model.HistoryMediaCollection = model.AbstractCollection.extend({
	url: 'api/historymedias',
	model: model.HistoryMediaModel
});

/**
 * Holder Backbone Model
 */
model.HolderModel = Backbone.Model.extend({
	urlRoot: 'api/holder',
	idAttribute: 'idholder',
	idholder: '',
	institution: '',
	holder: '',
	notes: '',
	defaults: {
		'idholder': null,
		'institution': '',
		'holder': '',
		'notes': ''
	}
});

/**
 * Holder Backbone Collection
 */
model.HolderCollection = model.AbstractCollection.extend({
	url: 'api/holders',
	model: model.HolderModel
});

/**
 * Infobjectfond Backbone Model
 */
model.InfobjectfondModel = Backbone.Model.extend({
	urlRoot: 'api/infobjectfond',
	idAttribute: 'id',
	id: '',
	fond: '',
	item: '',
	defaults: {
		'id': null,
		'fond': '',
		'item': ''
	}
});

/**
 * Infobjectfond Backbone Collection
 */
model.InfobjectfondCollection = model.AbstractCollection.extend({
	url: 'api/infobjectfonds',
	model: model.InfobjectfondModel
});

/**
 * Institution Backbone Model
 */
model.InstitutionModel = Backbone.Model.extend({
	urlRoot: 'api/institution',
	idAttribute: 'idinstitution',
	idinstitution: '',
	name: '',
	description: '',
	uri: '',
	otherinformation: '',
	code: '',
	timezone: '',
	thumbnail: '',
	defaults: {
		'idinstitution': null,
		'name': '',
		'description': '',
		'uri': '',
		'otherinformation': '',
		'code': '',
		'timezone': '',
		'thumbnail': ''
	}
});

/**
 * Institution Backbone Collection
 */
model.InstitutionCollection = model.AbstractCollection.extend({
	url: 'api/institutions',
	model: model.InstitutionModel
});

/**
 * InstitutionMedia Backbone Model
 */
model.InstitutionMediaModel = Backbone.Model.extend({
	urlRoot: 'api/institutionmedia',
	idAttribute: 'id',
	id: '',
	institutionIdinstitution: '',
	mediasIdmedia: '',
	defaults: {
		'id': null,
		'institutionIdinstitution': '',
		'mediasIdmedia': ''
	}
});

/**
 * InstitutionMedia Backbone Collection
 */
model.InstitutionMediaCollection = model.AbstractCollection.extend({
	url: 'api/institutionmedias',
	model: model.InstitutionMediaModel
});

/**
 * Item Backbone Model
 */
model.ItemModel = Backbone.Model.extend({
	urlRoot: 'api/item',
	idAttribute: 'iditem',
	iditem: '',
	holder: '',
	level: '',
	institution: '',
	inventoryid: '',
	uritype: '',
	uri: '',
	keywords: '',
	description: '',
	uidtype: '',
	uid: '',
	class: '',
	type: '',
	iseletronic: '',
	creationdate: '',
	acquisitiondate: '',
	scopecontent: '',
	originalexistence: '',
	originallocation: '',
	repositorycode: '',
	copyexistence: '',
	copylocation: '',
	legalaccess: '',
	accesscondition: '',
	reproductionrights: '',
	reproductionrightsdescription: '',
	itemdate: '',
	publishdate: '',
	publisher: '',
	itematributes: '',
	ispublic: '',
	preliminaryrule: '',
	punctuation: '',
	notes: '',
	otherinformation: '',
	idfather: '',
	titledefault: '',
	subitem: '',
	deletecomfirm: '',
	typeitem: '',
	edition: '',
	isexposed: '',
	isoriginal: '',
	ispart: '',
	haspart: '',
	ispartof: '',
	numberofcopies: '',
	tobepublicin: '',
	creationdateattributed: '',
	itemdateattributed: '',
	publishdateattributed: '',
	serachdump: '',
	itemmediadir: '',
	defaults: {
		'iditem': null,
		'holder': '',
		'level': '',
		'institution': '',
		'inventoryid': '',
		'uritype': '',
		'uri': '',
		'keywords': '',
		'description': '',
		'uidtype': '',
		'uid': '',
		'class': '',
		'type': '',
		'iseletronic': '',
		'creationdate': '',
		'acquisitiondate': '',
		'scopecontent': '',
		'originalexistence': '',
		'originallocation': '',
		'repositorycode': '',
		'copyexistence': '',
		'copylocation': '',
		'legalaccess': '',
		'accesscondition': '',
		'reproductionrights': '',
		'reproductionrightsdescription': '',
		'itemdate': '',
		'publishdate': '',
		'publisher': '',
		'itematributes': '',
		'ispublic': '',
		'preliminaryrule': '',
		'punctuation': '',
		'notes': '',
		'otherinformation': '',
		'idfather': '',
		'titledefault': '',
		'subitem': '',
		'deletecomfirm': '',
		'typeitem': '',
		'edition': '',
		'isexposed': '',
		'isoriginal': '',
		'ispart': '',
		'haspart': '',
		'ispartof': '',
		'numberofcopies': '',
		'tobepublicin': new Date(),
		'creationdateattributed': '',
		'itemdateattributed': '',
		'publishdateattributed': '',
		'serachdump': '',
		'itemmediadir': ''
	}
});

/**
 * Item Backbone Collection
 */
model.ItemCollection = model.AbstractCollection.extend({
	url: 'api/items',
	model: model.ItemModel
});

/**
 * ItemMedia Backbone Model
 */
model.ItemMediaModel = Backbone.Model.extend({
	urlRoot: 'api/itemmedia',
	idAttribute: 'id',
	id: '',
	itemIditem: '',
	mediasIdmedia: '',
	defaults: {
		'id': null,
		'itemIditem': '',
		'mediasIdmedia': ''
	}
});

/**
 * ItemMedia Backbone Collection
 */
model.ItemMediaCollection = model.AbstractCollection.extend({
	url: 'api/itemmedias',
	model: model.ItemMediaModel
});

/**
 * Itemcreator Backbone Model
 */
model.ItemcreatorModel = Backbone.Model.extend({
	urlRoot: 'api/itemcreator',
	idAttribute: 'iditemcreator',
	iditemcreator: '',
	item: '',
	creator: '',
	type: '',
	location: '',
	attributed: '',
	defaults: {
		'iditemcreator': null,
		'item': '',
		'creator': '',
		'type': '',
		'location': '',
		'attributed': ''
	}
});

/**
 * Itemcreator Backbone Collection
 */
model.ItemcreatorCollection = model.AbstractCollection.extend({
	url: 'api/itemcreators',
	model: model.ItemcreatorModel
});

/**
 * Itemdescription Backbone Model
 */
model.ItemdescriptionModel = Backbone.Model.extend({
	urlRoot: 'api/itemdescription',
	idAttribute: 'id',
	id: '',
	item: '',
	abstracttext: '',
	accrual: '',
	appraisaldesstructionschedulling: '',
	arrangement: '',
	broadcastmethod: '',
	era: '',
	fromcorporate: '',
	frompersonal: '',
	geographiccoodnates: '',
	geographicname: '',
	label: '',
	language: '',
	mediapresentation: '',
	movement: '',
	other: '',
	period: '',
	periodicity: '',
	preservationstatus: '',
	scope: '',
	style: '',
	subject: '',
	tableofcontents: '',
	targetaudience: '',
	tocorporate: '',
	topersonal: '',
	defaults: {
		'id': null,
		'item': '',
		'abstracttext': '',
		'accrual': '',
		'appraisaldesstructionschedulling': '',
		'arrangement': '',
		'broadcastmethod': '',
		'era': '',
		'fromcorporate': '',
		'frompersonal': '',
		'geographiccoodnates': '',
		'geographicname': '',
		'label': '',
		'language': '',
		'mediapresentation': '',
		'movement': '',
		'other': '',
		'period': '',
		'periodicity': '',
		'preservationstatus': '',
		'scope': '',
		'style': '',
		'subject': '',
		'tableofcontents': '',
		'targetaudience': '',
		'tocorporate': '',
		'topersonal': ''
	}
});

/**
 * Itemdescription Backbone Collection
 */
model.ItemdescriptionCollection = model.AbstractCollection.extend({
	url: 'api/itemdescriptions',
	model: model.ItemdescriptionModel
});

/**
 * Itemdimension Backbone Model
 */
model.ItemdimensionModel = Backbone.Model.extend({
	urlRoot: 'api/itemdimension',
	idAttribute: 'id',
	id: '',
	item: '',
	dimensiontype: '',
	dimensionunit: '',
	dimensionvalue: '',
	defaults: {
		'id': null,
		'item': '',
		'dimensiontype': '',
		'dimensionunit': '',
		'dimensionvalue': ''
	}
});

/**
 * Itemdimension Backbone Collection
 */
model.ItemdimensionCollection = model.AbstractCollection.extend({
	url: 'api/itemdimensions',
	model: model.ItemdimensionModel
});

/**
 * Iteminscription Backbone Model
 */
model.IteminscriptionModel = Backbone.Model.extend({
	urlRoot: 'api/iteminscription',
	idAttribute: 'd',
	d: '',
	tem: '',
	nscriptiontype: '',
	nscriptiondescription: '',
	nscriptionlocation: '',
	defaults: {
		'd': null,
		'tem': '',
		'nscriptiontype': '',
		'nscriptiondescription': '',
		'nscriptionlocation': ''
	}
});

/**
 * Iteminscription Backbone Collection
 */
model.IteminscriptionCollection = model.AbstractCollection.extend({
	url: 'api/iteminscriptions',
	model: model.IteminscriptionModel
});

/**
 * Level Backbone Model
 */
model.LevelModel = Backbone.Model.extend({
	urlRoot: 'api/level',
	idAttribute: 'idlevel',
	idlevel: '',
	fond: '',
	institution: '',
	type: '',
	level: '',
	countitem: '',
	levelcol: '',
	defaults: {
		'idlevel': null,
		'fond': '',
		'institution': '',
		'type': '',
		'level': '',
		'countitem': '',
		'levelcol': ''
	}
});

/**
 * Level Backbone Collection
 */
model.LevelCollection = model.AbstractCollection.extend({
	url: 'api/levels',
	model: model.LevelModel
});

/**
 * Media Backbone Model
 */
model.MediaModel = Backbone.Model.extend({
	urlRoot: 'api/media',
	idAttribute: 'idmedia',
	idmedia: '',
	idhistory: '',
	storage: '',
	iddocumentation: '',
	institution: '',
	idreference: '',
	mediatype: '',
	mediaurl: '',
	digitizationdate: '',
	digitizationresponsable: '',
	polarity: '',
	colorspace: '',
	iccprofile: '',
	xresolution: '',
	yresolution: '',
	thumbnail: '',
	digitizationequipment: '',
	format: '',
	ispublic: '',
	ordername: '',
	sent: '',
	exif: '',
	textual: '',
	sizemedia: '',
	nameoriginal: '',
	mainmedia: '',
	mediadir: '',
	thumbnaildir: '',
	thumbnailurl: '',
	defaults: {
		'idmedia': null,
		'idhistory': '',
		'storage': '',
		'iddocumentation': '',
		'institution': '',
		'idreference': '',
		'mediatype': '',
		'mediaurl': '',
		'digitizationdate': new Date(),
		'digitizationresponsable': '',
		'polarity': '',
		'colorspace': '',
		'iccprofile': '',
		'xresolution': '',
		'yresolution': '',
		'thumbnail': '',
		'digitizationequipment': '',
		'format': '',
		'ispublic': '',
		'ordername': '',
		'sent': '',
		'exif': '',
		'textual': '',
		'sizemedia': '',
		'nameoriginal': '',
		'mainmedia': '',
		'mediadir': '',
		'thumbnaildir': '',
		'thumbnailurl': ''
	}
});

/**
 * Media Backbone Collection
 */
model.MediaCollection = model.AbstractCollection.extend({
	url: 'api/medias',
	model: model.MediaModel
});

/**
 * Ncontact Backbone Model
 */
model.NcontactModel = Backbone.Model.extend({
	urlRoot: 'api/ncontact',
	idAttribute: 'id',
	id: '',
	call_: '',
	company: '',
	countyTaxcode: '',
	federalTaxcode: '',
	identity: '',
	name: '',
	stateTaxcode: '',
	uri: '',
	urla: '',
	institution: '',
	defaults: {
		'id': null,
		'call_': '',
		'company': '',
		'countyTaxcode': '',
		'federalTaxcode': '',
		'identity': '',
		'name': '',
		'stateTaxcode': '',
		'uri': '',
		'urla': '',
		'institution': ''
	}
});

/**
 * Ncontact Backbone Collection
 */
model.NcontactCollection = model.AbstractCollection.extend({
	url: 'api/ncontacts',
	model: model.NcontactModel
});

/**
 * Nhistory Backbone Model
 */
model.NhistoryModel = Backbone.Model.extend({
	urlRoot: 'api/nhistory',
	idAttribute: 'idhistory',
	idhistory: '',
	actor: '',
	cost: '',
	date: '',
	description: '',
	ispublic: '',
	institution: '',
	defaults: {
		'idhistory': null,
		'actor': '',
		'cost': '',
		'date': '',
		'description': '',
		'ispublic': '',
		'institution': ''
	}
});

/**
 * Nhistory Backbone Collection
 */
model.NhistoryCollection = model.AbstractCollection.extend({
	url: 'api/nhistories',
	model: model.NhistoryModel
});

/**
 * Nreference Backbone Model
 */
model.NreferenceModel = Backbone.Model.extend({
	urlRoot: 'api/nreference',
	idAttribute: 'id',
	id: '',
	author: '',
	description: '',
	otherInformation: '',
	text: '',
	title: '',
	institution: '',
	defaults: {
		'id': null,
		'author': '',
		'description': '',
		'otherInformation': '',
		'text': '',
		'title': '',
		'institution': ''
	}
});

/**
 * Nreference Backbone Collection
 */
model.NreferenceCollection = model.AbstractCollection.extend({
	url: 'api/nreferences',
	model: model.NreferenceModel
});

/**
 * Physicaldescription Backbone Model
 */
model.PhysicaldescriptionModel = Backbone.Model.extend({
	urlRoot: 'api/physicaldescription',
	idAttribute: 'id',
	id: '',
	item: '',
	apexiso: '',
	arabicpagenumbering: '',
	asaiso: '',
	boundtype: '',
	color: '',
	colorsystem: '',
	columnnumber: '',
	compressionmethod: '',
	contentcolor: '',
	contentextent: '',
	contentfinishing: '',
	contentsubstract: '',
	contenttype: '',
	covercolor: '',
	coverfinishing: '',
	coversubstract: '',
	defaultapplication: '',
	dustjacketcolor: '',
	dustjacketfinishing: '',
	dustjacketsubstract: '',
	endpaper: '',
	exif: '',
	format: '',
	framerate: '',
	hasdustjacket: '',
	hassound: '',
	hasspecialfold: '',
	iscompressed: '',
	lengthtxt: '',
	master: '',
	media: '',
	mediasupport: '',
	movements: '',
	other: '',
	projectionmode: '',
	romanpage: '',
	sizetxt: '',
	soundsystem: '',
	specialfold: '',
	specialpagenumebring: '',
	technique: '',
	timecode: '',
	tinting: '',
	titlepage: '',
	totaltime: '',
	type: '',
	writingformat: '',
	defaults: {
		'id': null,
		'item': '',
		'apexiso': '',
		'arabicpagenumbering': '',
		'asaiso': '',
		'boundtype': '',
		'color': '',
		'colorsystem': '',
		'columnnumber': '',
		'compressionmethod': '',
		'contentcolor': '',
		'contentextent': '',
		'contentfinishing': '',
		'contentsubstract': '',
		'contenttype': '',
		'covercolor': '',
		'coverfinishing': '',
		'coversubstract': '',
		'defaultapplication': '',
		'dustjacketcolor': '',
		'dustjacketfinishing': '',
		'dustjacketsubstract': '',
		'endpaper': '',
		'exif': '',
		'format': '',
		'framerate': '',
		'hasdustjacket': '',
		'hassound': '',
		'hasspecialfold': '',
		'iscompressed': '',
		'lengthtxt': '',
		'master': '',
		'media': '',
		'mediasupport': '',
		'movements': '',
		'other': '',
		'projectionmode': '',
		'romanpage': '',
		'sizetxt': '',
		'soundsystem': '',
		'specialfold': '',
		'specialpagenumebring': '',
		'technique': '',
		'timecode': '',
		'tinting': '',
		'titlepage': '',
		'totaltime': '',
		'type': '',
		'writingformat': ''
	}
});

/**
 * Physicaldescription Backbone Collection
 */
model.PhysicaldescriptionCollection = model.AbstractCollection.extend({
	url: 'api/physicaldescriptions',
	model: model.PhysicaldescriptionModel
});

/**
 * PlaceLocation Backbone Model
 */
model.PlaceLocationModel = Backbone.Model.extend({
	urlRoot: 'api/placelocation',
	idAttribute: 'id',
	id: '',
	complement: '',
	latituded: '',
	local: '',
	longitude: '',
	number: '',
	otherinformation: '',
	street: '',
	type: '',
	zipcode: '',
	city: '',
	country: '',
	institution: '',
	state: '',
	defaults: {
		'id': null,
		'complement': '',
		'latituded': '',
		'local': '',
		'longitude': '',
		'number': '',
		'otherinformation': '',
		'street': '',
		'type': '',
		'zipcode': '',
		'city': '',
		'country': '',
		'institution': '',
		'state': ''
	}
});

/**
 * PlaceLocation Backbone Collection
 */
model.PlaceLocationCollection = model.AbstractCollection.extend({
	url: 'api/placelocations',
	model: model.PlaceLocationModel
});

/**
 * Reference Backbone Model
 */
model.ReferenceModel = Backbone.Model.extend({
	urlRoot: 'api/reference',
	idAttribute: 'idreference',
	idreference: '',
	item: '',
	institution: '',
	creator: '',
	referencetype: '',
	referencetitle: '',
	referencedescription: '',
	referenceauthor: '',
	referencetext: '',
	otherinformations: '',
	defaults: {
		'idreference': null,
		'item': '',
		'institution': '',
		'creator': '',
		'referencetype': '',
		'referencetitle': '',
		'referencedescription': '',
		'referenceauthor': '',
		'referencetext': '',
		'otherinformations': ''
	}
});

/**
 * Reference Backbone Collection
 */
model.ReferenceCollection = model.AbstractCollection.extend({
	url: 'api/references',
	model: model.ReferenceModel
});

/**
 * ReferenceMedia Backbone Model
 */
model.ReferenceMediaModel = Backbone.Model.extend({
	urlRoot: 'api/referencemedia',
	idAttribute: 'idRefMedia',
	idRefMedia: '',
	referenceIdreference: '',
	mediasIdmedia: '',
	defaults: {
		'idRefMedia': null,
		'referenceIdreference': '',
		'mediasIdmedia': ''
	}
});

/**
 * ReferenceMedia Backbone Collection
 */
model.ReferenceMediaCollection = model.AbstractCollection.extend({
	url: 'api/referencemedias',
	model: model.ReferenceMediaModel
});

/**
 * Role Backbone Model
 */
model.RoleModel = Backbone.Model.extend({
	urlRoot: 'api/role',
	idAttribute: 'idrole',
	idrole: '',
	name: '',
	institution: '',
	defaults: {
		'idrole': null,
		'name': '',
		'institution': ''
	}
});

/**
 * Role Backbone Collection
 */
model.RoleCollection = model.AbstractCollection.extend({
	url: 'api/roles',
	model: model.RoleModel
});

/**
 * Search Backbone Model
 */
model.SearchModel = Backbone.Model.extend({
	urlRoot: 'api/search',
	idAttribute: 'idsearch',
	idsearch: '',
	user: '',
	name: '',
	info: '',
	type: '',
	datecreate: '',
	defaults: {
		'idsearch': null,
		'user': '',
		'name': '',
		'info': '',
		'type': '',
		'datecreate': new Date()
	}
});

/**
 * Search Backbone Collection
 */
model.SearchCollection = model.AbstractCollection.extend({
	url: 'api/searches',
	model: model.SearchModel
});

/**
 * State Backbone Model
 */
model.StateModel = Backbone.Model.extend({
	urlRoot: 'api/state',
	idAttribute: 'idstate',
	idstate: '',
	country: '',
	state: '',
	statecode: '',
	defaults: {
		'idstate': null,
		'country': '',
		'state': '',
		'statecode': ''
	}
});

/**
 * State Backbone Collection
 */
model.StateCollection = model.AbstractCollection.extend({
	url: 'api/states',
	model: model.StateModel
});

/**
 * Storage Backbone Model
 */
model.StorageModel = Backbone.Model.extend({
	urlRoot: 'api/storage',
	idAttribute: 'idstorage',
	idstorage: '',
	host: '',
	local: '',
	username: '',
	password: '',
	folder: '',
	urlftp: '',
	urlhttp: '',
	ipaddress: '',
	full: '',
	usedspace: '',
	diskcapacity: '',
	institution: '',
	defaultstorage: '',
	port: '',
	status: '',
	defaults: {
		'idstorage': null,
		'host': '',
		'local': '',
		'username': '',
		'password': '',
		'folder': '',
		'urlftp': '',
		'urlhttp': '',
		'ipaddress': '',
		'full': '',
		'usedspace': '',
		'diskcapacity': '',
		'institution': '',
		'defaultstorage': '',
		'port': '',
		'status': ''
	}
});

/**
 * Storage Backbone Collection
 */
model.StorageCollection = model.AbstractCollection.extend({
	url: 'api/storages',
	model: model.StorageModel
});

/**
 * StorageMedia Backbone Model
 */
model.StorageMediaModel = Backbone.Model.extend({
	urlRoot: 'api/storagemedia',
	idAttribute: 'id',
	id: '',
	storageIdstorage: '',
	mediasIdmedia: '',
	defaults: {
		'id': null,
		'storageIdstorage': '',
		'mediasIdmedia': ''
	}
});

/**
 * StorageMedia Backbone Collection
 */
model.StorageMediaCollection = model.AbstractCollection.extend({
	url: 'api/storagemedias',
	model: model.StorageMediaModel
});

/**
 * Timezones Backbone Model
 */
model.TimezonesModel = Backbone.Model.extend({
	urlRoot: 'api/timezones',
	idAttribute: 'idtimezone',
	idtimezone: '',
	name: '',
	defaults: {
		'idtimezone': null,
		'name': ''
	}
});

/**
 * Timezones Backbone Collection
 */
model.TimezonesCollection = model.AbstractCollection.extend({
	url: 'api/timezoneses',
	model: model.TimezonesModel
});

/**
 * Title Backbone Model
 */
model.TitleModel = Backbone.Model.extend({
	urlRoot: 'api/title',
	idAttribute: 'idtitle',
	idtitle: '',
	name: '',
	value: '',
	item: '',
	institution: '',
	defaulttitle: '',
	defaults: {
		'idtitle': null,
		'name': '',
		'value': '',
		'item': '',
		'institution': '',
		'defaulttitle': ''
	}
});

/**
 * Title Backbone Collection
 */
model.TitleCollection = model.AbstractCollection.extend({
	url: 'api/titles',
	model: model.TitleModel
});

/**
 * Transcription Backbone Model
 */
model.TranscriptionModel = Backbone.Model.extend({
	urlRoot: 'api/transcription',
	idAttribute: 'idtranscription',
	idtranscription: '',
	iditem: '',
	idmedia: '',
	transcription: '',
	notes: '',
	language: '',
	defaults: {
		'idtranscription': null,
		'iditem': '',
		'idmedia': '',
		'transcription': '',
		'notes': '',
		'language': ''
	}
});

/**
 * Transcription Backbone Collection
 */
model.TranscriptionCollection = model.AbstractCollection.extend({
	url: 'api/transcriptions',
	model: model.TranscriptionModel
});

/**
 * User Backbone Model
 */
model.UserModel = Backbone.Model.extend({
	urlRoot: 'api/user',
	idAttribute: 'iduser',
	iduser: '',
	institution: '',
	fullname: '',
	username: '',
	password: '',
	notes: '',
	code: '',
	timezone: '',
	lastlogin: '',
	status: '',
	admin: '',
	defaults: {
		'iduser': null,
		'institution': '',
		'fullname': '',
		'username': '',
		'password': '',
		'notes': '',
		'code': '',
		'timezone': '',
		'lastlogin': '',
		'status': '',
		'admin': ''
	}
});

/**
 * User Backbone Collection
 */
model.UserCollection = model.AbstractCollection.extend({
	url: 'api/users',
	model: model.UserModel
});

/**
 * Userrole Backbone Model
 */
model.UserroleModel = Backbone.Model.extend({
	urlRoot: 'api/userrole',
	idAttribute: 'iduserrole',
	iduserrole: '',
	user: '',
	role: '',
	defaults: {
		'iduserrole': null,
		'user': '',
		'role': ''
	}
});

/**
 * Userrole Backbone Collection
 */
model.UserroleCollection = model.AbstractCollection.extend({
	url: 'api/userroles',
	model: model.UserroleModel
});

