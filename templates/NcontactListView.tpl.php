<?php
	$this->assign('title','DIGITAL | Ncontacts');
	$this->assign('nav','ncontacts');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/ncontacts.js").wait(function(){
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
	<i class="icon-th-list"></i> Ncontacts
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="ncontactCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Id">Id<% if (page.orderBy == 'Id') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Call_">Call <% if (page.orderBy == 'Call_') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Company">Company<% if (page.orderBy == 'Company') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_CountyTaxcode">County Taxcode<% if (page.orderBy == 'CountyTaxcode') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_FederalTaxcode">Federal Taxcode<% if (page.orderBy == 'FederalTaxcode') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Identity">Identity<% if (page.orderBy == 'Identity') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Name">Name<% if (page.orderBy == 'Name') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_StateTaxcode">State Taxcode<% if (page.orderBy == 'StateTaxcode') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Uri">Uri<% if (page.orderBy == 'Uri') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Urla">Urla<% if (page.orderBy == 'Urla') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Institution">Institution<% if (page.orderBy == 'Institution') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('id')) %>">
				<td><%= _.escape(item.get('id') || '') %></td>
				<td><%= _.escape(item.get('call_') || '') %></td>
				<td><%= _.escape(item.get('company') || '') %></td>
				<td><%= _.escape(item.get('countyTaxcode') || '') %></td>
				<td><%= _.escape(item.get('federalTaxcode') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('identity') || '') %></td>
				<td><%= _.escape(item.get('name') || '') %></td>
				<td><%= _.escape(item.get('stateTaxcode') || '') %></td>
				<td><%= _.escape(item.get('uri') || '') %></td>
				<td><%= _.escape(item.get('urla') || '') %></td>
				<td><%= _.escape(item.get('institution') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="ncontactModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idInputContainer" class="control-group">
					<label class="control-label" for="id">Id</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="id"><%= _.escape(item.get('id') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="call_InputContainer" class="control-group">
					<label class="control-label" for="call_">Call </label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="call_" placeholder="Call " value="<%= _.escape(item.get('call_') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="companyInputContainer" class="control-group">
					<label class="control-label" for="company">Company</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="company" placeholder="Company" value="<%= _.escape(item.get('company') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="countyTaxcodeInputContainer" class="control-group">
					<label class="control-label" for="countyTaxcode">County Taxcode</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="countyTaxcode" placeholder="County Taxcode" value="<%= _.escape(item.get('countyTaxcode') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="federalTaxcodeInputContainer" class="control-group">
					<label class="control-label" for="federalTaxcode">Federal Taxcode</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="federalTaxcode" placeholder="Federal Taxcode" value="<%= _.escape(item.get('federalTaxcode') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="identityInputContainer" class="control-group">
					<label class="control-label" for="identity">Identity</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="identity" placeholder="Identity" value="<%= _.escape(item.get('identity') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="nameInputContainer" class="control-group">
					<label class="control-label" for="name">Name</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="name" placeholder="Name" value="<%= _.escape(item.get('name') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="stateTaxcodeInputContainer" class="control-group">
					<label class="control-label" for="stateTaxcode">State Taxcode</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="stateTaxcode" placeholder="State Taxcode" value="<%= _.escape(item.get('stateTaxcode') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="uriInputContainer" class="control-group">
					<label class="control-label" for="uri">Uri</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="uri" placeholder="Uri" value="<%= _.escape(item.get('uri') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="urlaInputContainer" class="control-group">
					<label class="control-label" for="urla">Urla</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="urla" placeholder="Urla" value="<%= _.escape(item.get('urla') || '') %>">
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
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteNcontactButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteNcontactButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Ncontact</button>
						<span id="confirmDeleteNcontactContainer" class="hide">
							<button id="cancelDeleteNcontactButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteNcontactButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="ncontactDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Ncontact
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="ncontactModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveNcontactButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="ncontactCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newNcontactButton" class="btn btn-primary">Add Ncontact</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
