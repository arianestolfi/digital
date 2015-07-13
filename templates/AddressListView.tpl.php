<?php
	$this->assign('title','DIGITAL | Addresses');
	$this->assign('nav','addresses');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/addresses.js").wait(function(){
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
	<i class="icon-th-list"></i> Addresses
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="addressCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Idaddress">Idaddress<% if (page.orderBy == 'Idaddress') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_City">City<% if (page.orderBy == 'City') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Contact">Contact<% if (page.orderBy == 'Contact') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Street">Street<% if (page.orderBy == 'Street') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Number">Number<% if (page.orderBy == 'Number') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Complement">Complement<% if (page.orderBy == 'Complement') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Zipcode">Zipcode<% if (page.orderBy == 'Zipcode') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Otherinformation">Otherinformation<% if (page.orderBy == 'Otherinformation') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>

			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idaddress')) %>">
				<td><%= _.escape(item.get('idaddress') || '') %></td>
				<td><%= _.escape(item.get('city') || '') %></td>
				<td><%= _.escape(item.get('contact') || '') %></td>
				<td><%= _.escape(item.get('street') || '') %></td>
				<td><%= _.escape(item.get('number') || '') %></td>
				<td><%= _.escape(item.get('complement') || '') %></td>
				<td><%= _.escape(item.get('zipcode') || '') %></td>
				<td><%= _.escape(item.get('otherinformation') || '') %></td>

			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="addressModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idaddressInputContainer" class="control-group">
					<label class="control-label" for="idaddress">Idaddress</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idaddress"><%= _.escape(item.get('idaddress') || '') %></span>
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
				<div id="contactInputContainer" class="control-group">
					<label class="control-label" for="contact">Contact</label>
					<div class="controls inline-inputs">
						<select id="contact" name="contact"></select>
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
				<div id="numberInputContainer" class="control-group">
					<label class="control-label" for="number">Number</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="number" placeholder="Number" value="<%= _.escape(item.get('number') || '') %>">
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
				<div id="zipcodeInputContainer" class="control-group">
					<label class="control-label" for="zipcode">Zipcode</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="zipcode" placeholder="Zipcode" value="<%= _.escape(item.get('zipcode') || '') %>">
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
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteAddressButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteAddressButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Address</button>
						<span id="confirmDeleteAddressContainer" class="hide">
							<button id="cancelDeleteAddressButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteAddressButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="addressDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Address
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="addressModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveAddressButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="addressCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newAddressButton" class="btn btn-primary">Add Address</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
