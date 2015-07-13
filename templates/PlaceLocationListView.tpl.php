<?php
	$this->assign('title','DIGITAL | PlaceLocations');
	$this->assign('nav','placelocations');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/placelocations.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});
		
		// hack for IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>

<div class="container">

<h1>
	<i class="icon-th-list"></i> PlaceLocations
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="placeLocationCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Id">Id<% if (page.orderBy == 'Id') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Complement">Complement<% if (page.orderBy == 'Complement') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Latituded">Latituded<% if (page.orderBy == 'Latituded') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Local">Local<% if (page.orderBy == 'Local') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Longitude">Longitude<% if (page.orderBy == 'Longitude') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Number">Number<% if (page.orderBy == 'Number') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Otherinformation">Otherinformation<% if (page.orderBy == 'Otherinformation') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Street">Street<% if (page.orderBy == 'Street') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Type">Type<% if (page.orderBy == 'Type') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Zipcode">Zipcode<% if (page.orderBy == 'Zipcode') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_City">City<% if (page.orderBy == 'City') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Country">Country<% if (page.orderBy == 'Country') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Institution">Institution<% if (page.orderBy == 'Institution') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_State">State<% if (page.orderBy == 'State') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('id')) %>">
				<td><%= _.escape(item.get('id') || '') %></td>
				<td><%= _.escape(item.get('complement') || '') %></td>
				<td><%= _.escape(item.get('latituded') || '') %></td>
				<td><%= _.escape(item.get('local') || '') %></td>
				<td><%= _.escape(item.get('longitude') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('number') || '') %></td>
				<td><%= _.escape(item.get('otherinformation') || '') %></td>
				<td><%= _.escape(item.get('street') || '') %></td>
				<td><%= _.escape(item.get('type') || '') %></td>
				<td><%= _.escape(item.get('zipcode') || '') %></td>
				<td><%= _.escape(item.get('city') || '') %></td>
				<td><%= _.escape(item.get('country') || '') %></td>
				<td><%= _.escape(item.get('institution') || '') %></td>
				<td><%= _.escape(item.get('state') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="placeLocationModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idInputContainer" class="control-group">
					<label class="control-label" for="id">Id</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="id"><%= _.escape(item.get('id') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="complementInputContainer" class="control-group">
					<label class="control-label" for="complement">Complement</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="complement" placeholder="Complement" value="<%= _.escape(item.get('complement') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="latitudedInputContainer" class="control-group">
					<label class="control-label" for="latituded">Latituded</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="latituded" placeholder="Latituded" value="<%= _.escape(item.get('latituded') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="localInputContainer" class="control-group">
					<label class="control-label" for="local">Local</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="local" placeholder="Local" value="<%= _.escape(item.get('local') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="longitudeInputContainer" class="control-group">
					<label class="control-label" for="longitude">Longitude</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="longitude" placeholder="Longitude" value="<%= _.escape(item.get('longitude') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="numberInputContainer" class="control-group">
					<label class="control-label" for="number">Number</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="number" placeholder="Number" value="<%= _.escape(item.get('number') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="otherinformationInputContainer" class="control-group">
					<label class="control-label" for="otherinformation">Otherinformation</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="otherinformation" placeholder="Otherinformation" value="<%= _.escape(item.get('otherinformation') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="streetInputContainer" class="control-group">
					<label class="control-label" for="street">Street</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="street" placeholder="Street" value="<%= _.escape(item.get('street') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="typeInputContainer" class="control-group">
					<label class="control-label" for="type">Type</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="type" placeholder="Type" value="<%= _.escape(item.get('type') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="zipcodeInputContainer" class="control-group">
					<label class="control-label" for="zipcode">Zipcode</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="zipcode" placeholder="Zipcode" value="<%= _.escape(item.get('zipcode') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="cityInputContainer" class="control-group">
					<label class="control-label" for="city">City</label>
					<div class="controls inline-inputs">
						<select id="city" name="city"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="countryInputContainer" class="control-group">
					<label class="control-label" for="country">Country</label>
					<div class="controls inline-inputs">
						<select id="country" name="country"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="institutionInputContainer" class="control-group">
					<label class="control-label" for="institution">Institution</label>
					<div class="controls inline-inputs">
						<select id="institution" name="institution"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="stateInputContainer" class="control-group">
					<label class="control-label" for="state">State</label>
					<div class="controls inline-inputs">
						<select id="state" name="state"></select>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deletePlaceLocationButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deletePlaceLocationButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete PlaceLocation</button>
						<span id="confirmDeletePlaceLocationContainer" class="hide">
							<button id="cancelDeletePlaceLocationButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeletePlaceLocationButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="placeLocationDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit PlaceLocation
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="placeLocationModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="savePlaceLocationButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="placeLocationCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newPlaceLocationButton" class="btn btn-primary">Add PlaceLocation</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
