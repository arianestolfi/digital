<?php
	$this->assign('title','DIGITAL | Storages');
	$this->assign('nav','storages');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/storages.js").wait(function(){
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
	<i class="icon-th-list"></i> Storages
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="storageCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Idstorage">Idstorage<% if (page.orderBy == 'Idstorage') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Host">Host<% if (page.orderBy == 'Host') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Local">Local<% if (page.orderBy == 'Local') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Username">Username<% if (page.orderBy == 'Username') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Password">Password<% if (page.orderBy == 'Password') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Folder">Folder<% if (page.orderBy == 'Folder') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Urlftp">Urlftp<% if (page.orderBy == 'Urlftp') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Urlhttp">Urlhttp<% if (page.orderBy == 'Urlhttp') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Ipaddress">Ipaddress<% if (page.orderBy == 'Ipaddress') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Full">Full<% if (page.orderBy == 'Full') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Usedspace">Usedspace<% if (page.orderBy == 'Usedspace') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Diskcapacity">Diskcapacity<% if (page.orderBy == 'Diskcapacity') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Institution">Institution<% if (page.orderBy == 'Institution') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Defaultstorage">Defaultstorage<% if (page.orderBy == 'Defaultstorage') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Port">Port<% if (page.orderBy == 'Port') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Status">Status<% if (page.orderBy == 'Status') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idstorage')) %>">
				<td><%= _.escape(item.get('idstorage') || '') %></td>
				<td><%= _.escape(item.get('host') || '') %></td>
				<td><%= _.escape(item.get('local') || '') %></td>
				<td><%= _.escape(item.get('username') || '') %></td>
				<td><%= _.escape(item.get('password') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('folder') || '') %></td>
				<td><%= _.escape(item.get('urlftp') || '') %></td>
				<td><%= _.escape(item.get('urlhttp') || '') %></td>
				<td><%= _.escape(item.get('ipaddress') || '') %></td>
				<td><%= _.escape(item.get('full') || '') %></td>
				<td><%= _.escape(item.get('usedspace') || '') %></td>
				<td><%= _.escape(item.get('diskcapacity') || '') %></td>
				<td><%= _.escape(item.get('institution') || '') %></td>
				<td><%= _.escape(item.get('defaultstorage') || '') %></td>
				<td><%= _.escape(item.get('port') || '') %></td>
				<td><%= _.escape(item.get('status') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="storageModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idstorageInputContainer" class="control-group">
					<label class="control-label" for="idstorage">Idstorage</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idstorage"><%= _.escape(item.get('idstorage') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="hostInputContainer" class="control-group">
					<label class="control-label" for="host">Host</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="host" placeholder="Host" value="<%= _.escape(item.get('host') || '') %>">
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
				<div id="usernameInputContainer" class="control-group">
					<label class="control-label" for="username">Username</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="username" placeholder="Username" value="<%= _.escape(item.get('username') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="passwordInputContainer" class="control-group">
					<label class="control-label" for="password">Password</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="password" placeholder="Password" value="<%= _.escape(item.get('password') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="folderInputContainer" class="control-group">
					<label class="control-label" for="folder">Folder</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="folder" placeholder="Folder" value="<%= _.escape(item.get('folder') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="urlftpInputContainer" class="control-group">
					<label class="control-label" for="urlftp">Urlftp</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="urlftp" placeholder="Urlftp" value="<%= _.escape(item.get('urlftp') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="urlhttpInputContainer" class="control-group">
					<label class="control-label" for="urlhttp">Urlhttp</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="urlhttp" placeholder="Urlhttp" value="<%= _.escape(item.get('urlhttp') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="ipaddressInputContainer" class="control-group">
					<label class="control-label" for="ipaddress">Ipaddress</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="ipaddress" placeholder="Ipaddress" value="<%= _.escape(item.get('ipaddress') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="fullInputContainer" class="control-group">
					<label class="control-label" for="full">Full</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="full" placeholder="Full" value="<%= _.escape(item.get('full') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="usedspaceInputContainer" class="control-group">
					<label class="control-label" for="usedspace">Usedspace</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="usedspace" placeholder="Usedspace" value="<%= _.escape(item.get('usedspace') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="diskcapacityInputContainer" class="control-group">
					<label class="control-label" for="diskcapacity">Diskcapacity</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="diskcapacity" placeholder="Diskcapacity" value="<%= _.escape(item.get('diskcapacity') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="institutionInputContainer" class="control-group">
					<label class="control-label" for="institution">Institution</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="institution" placeholder="Institution" value="<%= _.escape(item.get('institution') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="defaultstorageInputContainer" class="control-group">
					<label class="control-label" for="defaultstorage">Defaultstorage</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="defaultstorage" placeholder="Defaultstorage" value="<%= _.escape(item.get('defaultstorage') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="portInputContainer" class="control-group">
					<label class="control-label" for="port">Port</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="port" placeholder="Port" value="<%= _.escape(item.get('port') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="statusInputContainer" class="control-group">
					<label class="control-label" for="status">Status</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="status" placeholder="Status" value="<%= _.escape(item.get('status') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteStorageButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteStorageButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Storage</button>
						<span id="confirmDeleteStorageContainer" class="hide">
							<button id="cancelDeleteStorageButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteStorageButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="storageDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Storage
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="storageModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveStorageButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="storageCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newStorageButton" class="btn btn-primary">Add Storage</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
