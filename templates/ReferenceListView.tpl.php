<?php
	$this->assign('title','DIGITAL | References');
	$this->assign('nav','references');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/references.js").wait(function(){
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
	<i class="icon-th-list"></i> References
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="referenceCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Idreference">Idreference<% if (page.orderBy == 'Idreference') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Item">Item<% if (page.orderBy == 'Item') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Institution">Institution<% if (page.orderBy == 'Institution') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Creator">Creator<% if (page.orderBy == 'Creator') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Referencetype">Referencetype<% if (page.orderBy == 'Referencetype') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Referencetitle">Referencetitle<% if (page.orderBy == 'Referencetitle') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Referencedescription">Referencedescription<% if (page.orderBy == 'Referencedescription') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Referenceauthor">Referenceauthor<% if (page.orderBy == 'Referenceauthor') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Referencetext">Referencetext<% if (page.orderBy == 'Referencetext') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Otherinformations">Otherinformations<% if (page.orderBy == 'Otherinformations') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idreference')) %>">
				<td><%= _.escape(item.get('idreference') || '') %></td>
				<td><%= _.escape(item.get('item') || '') %></td>
				<td><%= _.escape(item.get('institution') || '') %></td>
				<td><%= _.escape(item.get('creator') || '') %></td>
				<td><%= _.escape(item.get('referencetype') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('referencetitle') || '') %></td>
				<td><%= _.escape(item.get('referencedescription') || '') %></td>
				<td><%= _.escape(item.get('referenceauthor') || '') %></td>
				<td><%= _.escape(item.get('referencetext') || '') %></td>
				<td><%= _.escape(item.get('otherinformations') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="referenceModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idreferenceInputContainer" class="control-group">
					<label class="control-label" for="idreference">Idreference</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idreference"><%= _.escape(item.get('idreference') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="itemInputContainer" class="control-group">
					<label class="control-label" for="item">Item</label>
					<div class="controls inline-inputs">
						<select id="item" name="item"></select>
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
				<div id="creatorInputContainer" class="control-group">
					<label class="control-label" for="creator">Creator</label>
					<div class="controls inline-inputs">
						<select id="creator" name="creator"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="referencetypeInputContainer" class="control-group">
					<label class="control-label" for="referencetype">Referencetype</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="referencetype" placeholder="Referencetype" value="<%= _.escape(item.get('referencetype') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="referencetitleInputContainer" class="control-group">
					<label class="control-label" for="referencetitle">Referencetitle</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="referencetitle" placeholder="Referencetitle" value="<%= _.escape(item.get('referencetitle') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="referencedescriptionInputContainer" class="control-group">
					<label class="control-label" for="referencedescription">Referencedescription</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="referencedescription" placeholder="Referencedescription" value="<%= _.escape(item.get('referencedescription') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="referenceauthorInputContainer" class="control-group">
					<label class="control-label" for="referenceauthor">Referenceauthor</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="referenceauthor" placeholder="Referenceauthor" value="<%= _.escape(item.get('referenceauthor') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="referencetextInputContainer" class="control-group">
					<label class="control-label" for="referencetext">Referencetext</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="referencetext" rows="3"><%= _.escape(item.get('referencetext') || '') %></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="otherinformationsInputContainer" class="control-group">
					<label class="control-label" for="otherinformations">Otherinformations</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="otherinformations" rows="3"><%= _.escape(item.get('otherinformations') || '') %></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteReferenceButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteReferenceButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Reference</button>
						<span id="confirmDeleteReferenceContainer" class="hide">
							<button id="cancelDeleteReferenceButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteReferenceButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="referenceDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Reference
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="referenceModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveReferenceButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="referenceCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newReferenceButton" class="btn btn-primary">Add Reference</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
