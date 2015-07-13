<?php
	$this->assign('title','DIGITAL | Nhistories');
	$this->assign('nav','nhistories');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/nhistories.js").wait(function(){
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
	<i class="icon-th-list"></i> Nhistories
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="nhistoryCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Idhistory">Idhistory<% if (page.orderBy == 'Idhistory') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Actor">Actor<% if (page.orderBy == 'Actor') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Cost">Cost<% if (page.orderBy == 'Cost') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Date">Date<% if (page.orderBy == 'Date') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Description">Description<% if (page.orderBy == 'Description') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Ispublic">Ispublic<% if (page.orderBy == 'Ispublic') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Institution">Institution<% if (page.orderBy == 'Institution') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idhistory')) %>">
				<td><%= _.escape(item.get('idhistory') || '') %></td>
				<td><%= _.escape(item.get('actor') || '') %></td>
				<td><%= _.escape(item.get('cost') || '') %></td>
				<td><%= _.escape(item.get('date') || '') %></td>
				<td><%= _.escape(item.get('description') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('ispublic') || '') %></td>
				<td><%= _.escape(item.get('institution') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="nhistoryModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idhistoryInputContainer" class="control-group">
					<label class="control-label" for="idhistory">Idhistory</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idhistory"><%= _.escape(item.get('idhistory') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="actorInputContainer" class="control-group">
					<label class="control-label" for="actor">Actor</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="actor" placeholder="Actor" value="<%= _.escape(item.get('actor') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="costInputContainer" class="control-group">
					<label class="control-label" for="cost">Cost</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="cost" placeholder="Cost" value="<%= _.escape(item.get('cost') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="dateInputContainer" class="control-group">
					<label class="control-label" for="date">Date</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="date" placeholder="Date" value="<%= _.escape(item.get('date') || '') %>">
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
				<div id="ispublicInputContainer" class="control-group">
					<label class="control-label" for="ispublic">Ispublic</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="ispublic" placeholder="Ispublic" value="<%= _.escape(item.get('ispublic') || '') %>">
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
		<form id="deleteNhistoryButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteNhistoryButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Nhistory</button>
						<span id="confirmDeleteNhistoryContainer" class="hide">
							<button id="cancelDeleteNhistoryButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteNhistoryButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="nhistoryDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Nhistory
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="nhistoryModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveNhistoryButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="nhistoryCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newNhistoryButton" class="btn btn-primary">Add Nhistory</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
