<?php
	$this->assign('title','DIGITAL | Institutions');
	$this->assign('nav','institutions');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/institutions.js").wait(function(){
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
	<i class="icon-th-list"></i> Institutions
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="institutionCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Idinstitution">Idinstitution<% if (page.orderBy == 'Idinstitution') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Name">Name<% if (page.orderBy == 'Name') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Description">Description<% if (page.orderBy == 'Description') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Uri">Uri<% if (page.orderBy == 'Uri') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Otherinformation">Otherinformation<% if (page.orderBy == 'Otherinformation') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Code">Code<% if (page.orderBy == 'Code') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Timezone">Timezone<% if (page.orderBy == 'Timezone') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Thumbnail">Thumbnail<% if (page.orderBy == 'Thumbnail') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idinstitution')) %>">
				<td><%= _.escape(item.get('idinstitution') || '') %></td>
				<td><%= _.escape(item.get('name') || '') %></td>
				<td><%= _.escape(item.get('description') || '') %></td>
				<td><%= _.escape(item.get('uri') || '') %></td>
				<td><%= _.escape(item.get('otherinformation') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('code') || '') %></td>
				<td><%= _.escape(item.get('timezone') || '') %></td>
				<td><%= _.escape(item.get('thumbnail') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="institutionModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idinstitutionInputContainer" class="control-group">
					<label class="control-label" for="idinstitution">Idinstitution</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idinstitution"><%= _.escape(item.get('idinstitution') || '') %></span>
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
				<div id="descriptionInputContainer" class="control-group">
					<label class="control-label" for="description">Description</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="description" placeholder="Description" value="<%= _.escape(item.get('description') || '') %>">
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
				<div id="otherinformationInputContainer" class="control-group">
					<label class="control-label" for="otherinformation">Otherinformation</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="otherinformation" placeholder="Otherinformation" value="<%= _.escape(item.get('otherinformation') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="codeInputContainer" class="control-group">
					<label class="control-label" for="code">Code</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="code" placeholder="Code" value="<%= _.escape(item.get('code') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="timezoneInputContainer" class="control-group">
					<label class="control-label" for="timezone">Timezone</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="timezone" placeholder="Timezone" value="<%= _.escape(item.get('timezone') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="thumbnailInputContainer" class="control-group">
					<label class="control-label" for="thumbnail">Thumbnail</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="thumbnail" placeholder="Thumbnail" value="<%= _.escape(item.get('thumbnail') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteInstitutionButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteInstitutionButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Institution</button>
						<span id="confirmDeleteInstitutionContainer" class="hide">
							<button id="cancelDeleteInstitutionButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteInstitutionButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="institutionDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Institution
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="institutionModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveInstitutionButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="institutionCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newInstitutionButton" class="btn btn-primary">Add Institution</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
