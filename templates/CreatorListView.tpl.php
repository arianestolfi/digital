<?php
	$this->assign('title','DIGITAL | Creators');
	$this->assign('nav','creators');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/creators.js").wait(function(){
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
	<i class="icon-th-list"></i> Creators
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="creatorCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Idcreator">Idcreator<% if (page.orderBy == 'Idcreator') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Institution">Institution<% if (page.orderBy == 'Institution') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Type">Type<% if (page.orderBy == 'Type') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Name">Name<% if (page.orderBy == 'Name') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Notes">Notes<% if (page.orderBy == 'Notes') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Birthdate">Birthdate<% if (page.orderBy == 'Birthdate') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Deathdate">Deathdate<% if (page.orderBy == 'Deathdate') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Nationality">Nationality<% if (page.orderBy == 'Nationality') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Maincontact">Maincontact<% if (page.orderBy == 'Maincontact') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idcreator')) %>">
				<td><%= _.escape(item.get('idcreator') || '') %></td>
				<td><%= _.escape(item.get('institution') || '') %></td>
				<td><%= _.escape(item.get('type') || '') %></td>
				<td><%= _.escape(item.get('name') || '') %></td>
				<td><%= _.escape(item.get('notes') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('birthdate') || '') %></td>
				<td><%= _.escape(item.get('deathdate') || '') %></td>
				<td><%= _.escape(item.get('nationality') || '') %></td>
				<td><%= _.escape(item.get('maincontact') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="creatorModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idcreatorInputContainer" class="control-group">
					<label class="control-label" for="idcreator">Idcreator</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idcreator"><%= _.escape(item.get('idcreator') || '') %></span>
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
				<div id="typeInputContainer" class="control-group">
					<label class="control-label" for="type">Type</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="type" placeholder="Type" value="<%= _.escape(item.get('type') || '') %>">
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
				<div id="notesInputContainer" class="control-group">
					<label class="control-label" for="notes">Notes</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="notes" rows="3"><%= _.escape(item.get('notes') || '') %></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="birthdateInputContainer" class="control-group">
					<label class="control-label" for="birthdate">Birthdate</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="birthdate" placeholder="Birthdate" value="<%= _.escape(item.get('birthdate') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="deathdateInputContainer" class="control-group">
					<label class="control-label" for="deathdate">Deathdate</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="deathdate" placeholder="Deathdate" value="<%= _.escape(item.get('deathdate') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="nationalityInputContainer" class="control-group">
					<label class="control-label" for="nationality">Nationality</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="nationality" placeholder="Nationality" value="<%= _.escape(item.get('nationality') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="maincontactInputContainer" class="control-group">
					<label class="control-label" for="maincontact">Maincontact</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="maincontact" placeholder="Maincontact" value="<%= _.escape(item.get('maincontact') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteCreatorButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteCreatorButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Creator</button>
						<span id="confirmDeleteCreatorContainer" class="hide">
							<button id="cancelDeleteCreatorButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteCreatorButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="creatorDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Creator
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="creatorModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveCreatorButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="creatorCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newCreatorButton" class="btn btn-primary">Add Creator</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
