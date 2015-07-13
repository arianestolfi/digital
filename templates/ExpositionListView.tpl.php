<?php
	$this->assign('title','DIGITAL | Expositions');
	$this->assign('nav','expositions');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/expositions.js").wait(function(){
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
	<i class="icon-th-list"></i> Expositions
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="expositionCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Idexposition">Idexposition<% if (page.orderBy == 'Idexposition') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Institution">Institution<% if (page.orderBy == 'Institution') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Location">Location<% if (page.orderBy == 'Location') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Curator">Curator<% if (page.orderBy == 'Curator') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Initialdate">Initialdate<% if (page.orderBy == 'Initialdate') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Enddate">Enddate<% if (page.orderBy == 'Enddate') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Description">Description<% if (page.orderBy == 'Description') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Notes">Notes<% if (page.orderBy == 'Notes') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Name">Name<% if (page.orderBy == 'Name') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Exposubtype">Exposubtype<% if (page.orderBy == 'Exposubtype') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Expotype">Expotype<% if (page.orderBy == 'Expotype') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Iscarriedbyotherinstitution">Iscarriedbyotherinstitution<% if (page.orderBy == 'Iscarriedbyotherinstitution') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Isinternational">Isinternational<% if (page.orderBy == 'Isinternational') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Otherinfo">Otherinfo<% if (page.orderBy == 'Otherinfo') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idexposition')) %>">
				<td><%= _.escape(item.get('idexposition') || '') %></td>
				<td><%= _.escape(item.get('institution') || '') %></td>
				<td><%= _.escape(item.get('location') || '') %></td>
				<td><%= _.escape(item.get('curator') || '') %></td>
				<td><%= _.escape(item.get('initialdate') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('enddate') || '') %></td>
				<td><%= _.escape(item.get('description') || '') %></td>
				<td><%= _.escape(item.get('notes') || '') %></td>
				<td><%= _.escape(item.get('name') || '') %></td>
				<td><%= _.escape(item.get('exposubtype') || '') %></td>
				<td><%= _.escape(item.get('expotype') || '') %></td>
				<td><%= _.escape(item.get('iscarriedbyotherinstitution') || '') %></td>
				<td><%= _.escape(item.get('isinternational') || '') %></td>
				<td><%= _.escape(item.get('otherinfo') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="expositionModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idexpositionInputContainer" class="control-group">
					<label class="control-label" for="idexposition">Idexposition</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idexposition"><%= _.escape(item.get('idexposition') || '') %></span>
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
				<div id="locationInputContainer" class="control-group">
					<label class="control-label" for="location">Location</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="location" placeholder="Location" value="<%= _.escape(item.get('location') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="curatorInputContainer" class="control-group">
					<label class="control-label" for="curator">Curator</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="curator" rows="3"><%= _.escape(item.get('curator') || '') %></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="initialdateInputContainer" class="control-group">
					<label class="control-label" for="initialdate">Initialdate</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="initialdate" placeholder="Initialdate" value="<%= _.escape(item.get('initialdate') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="enddateInputContainer" class="control-group">
					<label class="control-label" for="enddate">Enddate</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="enddate" placeholder="Enddate" value="<%= _.escape(item.get('enddate') || '') %>">
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
				<div id="notesInputContainer" class="control-group">
					<label class="control-label" for="notes">Notes</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="notes" rows="3"><%= _.escape(item.get('notes') || '') %></textarea>
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
				<div id="exposubtypeInputContainer" class="control-group">
					<label class="control-label" for="exposubtype">Exposubtype</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="exposubtype" placeholder="Exposubtype" value="<%= _.escape(item.get('exposubtype') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="expotypeInputContainer" class="control-group">
					<label class="control-label" for="expotype">Expotype</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="expotype" placeholder="Expotype" value="<%= _.escape(item.get('expotype') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="iscarriedbyotherinstitutionInputContainer" class="control-group">
					<label class="control-label" for="iscarriedbyotherinstitution">Iscarriedbyotherinstitution</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="iscarriedbyotherinstitution" placeholder="Iscarriedbyotherinstitution" value="<%= _.escape(item.get('iscarriedbyotherinstitution') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="isinternationalInputContainer" class="control-group">
					<label class="control-label" for="isinternational">Isinternational</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="isinternational" placeholder="Isinternational" value="<%= _.escape(item.get('isinternational') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="otherinfoInputContainer" class="control-group">
					<label class="control-label" for="otherinfo">Otherinfo</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="otherinfo" placeholder="Otherinfo" value="<%= _.escape(item.get('otherinfo') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteExpositionButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteExpositionButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Exposition</button>
						<span id="confirmDeleteExpositionContainer" class="hide">
							<button id="cancelDeleteExpositionButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteExpositionButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="expositionDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Exposition
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="expositionModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveExpositionButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="expositionCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newExpositionButton" class="btn btn-primary">Add Exposition</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
