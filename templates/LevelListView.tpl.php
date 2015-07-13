<?php
	$this->assign('title','DIGITAL | Levels');
	$this->assign('nav','levels');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/levels.js").wait(function(){
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
	<i class="icon-th-list"></i> Levels
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="levelCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Idlevel">Idlevel<% if (page.orderBy == 'Idlevel') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Fond">Fond<% if (page.orderBy == 'Fond') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Institution">Institution<% if (page.orderBy == 'Institution') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Type">Type<% if (page.orderBy == 'Type') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Level">Level<% if (page.orderBy == 'Level') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Countitem">Countitem<% if (page.orderBy == 'Countitem') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Levelcol">Levelcol<% if (page.orderBy == 'Levelcol') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idlevel')) %>">
				<td><%= _.escape(item.get('idlevel') || '') %></td>
				<td><%= _.escape(item.get('fond') || '') %></td>
				<td><%= _.escape(item.get('institution') || '') %></td>
				<td><%= _.escape(item.get('type') || '') %></td>
				<td><%= _.escape(item.get('level') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('countitem') || '') %></td>
				<td><%= _.escape(item.get('levelcol') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="levelModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idlevelInputContainer" class="control-group">
					<label class="control-label" for="idlevel">Idlevel</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idlevel"><%= _.escape(item.get('idlevel') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="fondInputContainer" class="control-group">
					<label class="control-label" for="fond">Fond</label>
					<div class="controls inline-inputs">
						<select id="fond" name="fond"></select>
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
				<div id="levelInputContainer" class="control-group">
					<label class="control-label" for="level">Level</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="level" placeholder="Level" value="<%= _.escape(item.get('level') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="countitemInputContainer" class="control-group">
					<label class="control-label" for="countitem">Countitem</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="countitem" placeholder="Countitem" value="<%= _.escape(item.get('countitem') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="levelcolInputContainer" class="control-group">
					<label class="control-label" for="levelcol">Levelcol</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="levelcol" placeholder="Levelcol" value="<%= _.escape(item.get('levelcol') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteLevelButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteLevelButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Level</button>
						<span id="confirmDeleteLevelContainer" class="hide">
							<button id="cancelDeleteLevelButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteLevelButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="levelDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Level
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="levelModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveLevelButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="levelCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newLevelButton" class="btn btn-primary">Add Level</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
