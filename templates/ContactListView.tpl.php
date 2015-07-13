<?php
	$this->assign('title','DIGITAL | Contacts');
	$this->assign('nav','contacts');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/contacts.js").wait(function(){
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
	<i class="icon-th-list"></i> Contacts
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="contactCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Idcontact">Idcontact<% if (page.orderBy == 'Idcontact') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Institution">Institution<% if (page.orderBy == 'Institution') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Iditem">Iditem<% if (page.orderBy == 'Iditem') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Idexposition">Idexposition<% if (page.orderBy == 'Idexposition') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Idholder">Idholder<% if (page.orderBy == 'Idholder') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>

				<th id="header_Idcreator">Idcreator<% if (page.orderBy == 'Idcreator') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_User">User<% if (page.orderBy == 'User') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Contactname">Contactname<% if (page.orderBy == 'Contactname') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Urla">Urla<% if (page.orderBy == 'Urla') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Contactcall">Contactcall<% if (page.orderBy == 'Contactcall') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Company">Company<% if (page.orderBy == 'Company') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Uri">Uri<% if (page.orderBy == 'Uri') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Identity">Identity<% if (page.orderBy == 'Identity') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Federaltaxcode">Federaltaxcode<% if (page.orderBy == 'Federaltaxcode') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Statetaxcode">Statetaxcode<% if (page.orderBy == 'Statetaxcode') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Countytaxcode">Countytaxcode<% if (page.orderBy == 'Countytaxcode') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>

			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idcontact')) %>">
				<td><%= _.escape(item.get('idcontact') || '') %></td>
				<td><%= _.escape(item.get('institution') || '') %></td>
				<td><%= _.escape(item.get('iditem') || '') %></td>
				<td><%= _.escape(item.get('idexposition') || '') %></td>
				<td><%= _.escape(item.get('idholder') || '') %></td>
				<td><%= _.escape(item.get('idcreator') || '') %></td>
				<td><%= _.escape(item.get('user') || '') %></td>
				<td><%= _.escape(item.get('contactname') || '') %></td>
				<td><%= _.escape(item.get('urla') || '') %></td>
				<td><%= _.escape(item.get('contactcall') || '') %></td>
				<td><%= _.escape(item.get('company') || '') %></td>
				<td><%= _.escape(item.get('uri') || '') %></td>
				<td><%= _.escape(item.get('identity') || '') %></td>
				<td><%= _.escape(item.get('federaltaxcode') || '') %></td>
				<td><%= _.escape(item.get('statetaxcode') || '') %></td>
				<td><%= _.escape(item.get('countytaxcode') || '') %></td>

			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="contactModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idcontactInputContainer" class="control-group">
					<label class="control-label" for="idcontact">Idcontact</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idcontact"><%= _.escape(item.get('idcontact') || '') %></span>
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
				<div id="iditemInputContainer" class="control-group">
					<label class="control-label" for="iditem">Iditem</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="iditem" placeholder="Iditem" value="<%= _.escape(item.get('iditem') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="idexpositionInputContainer" class="control-group">
					<label class="control-label" for="idexposition">Idexposition</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="idexposition" placeholder="Idexposition" value="<%= _.escape(item.get('idexposition') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="idholderInputContainer" class="control-group">
					<label class="control-label" for="idholder">Idholder</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="idholder" placeholder="Idholder" value="<%= _.escape(item.get('idholder') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="idcreatorInputContainer" class="control-group">
					<label class="control-label" for="idcreator">Idcreator</label>
					<div class="controls inline-inputs">
						<select id="idcreator" name="idcreator"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="userInputContainer" class="control-group">
					<label class="control-label" for="user">User</label>
					<div class="controls inline-inputs">
						<select id="user" name="user"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="contactnameInputContainer" class="control-group">
					<label class="control-label" for="contactname">Contactname</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="contactname" placeholder="Contactname" value="<%= _.escape(item.get('contactname') || '') %>">
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
				<div id="contactcallInputContainer" class="control-group">
					<label class="control-label" for="contactcall">Contactcall</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="contactcall" placeholder="Contactcall" value="<%= _.escape(item.get('contactcall') || '') %>">
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
				<div id="uriInputContainer" class="control-group">
					<label class="control-label" for="uri">Uri</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="uri" placeholder="Uri" value="<%= _.escape(item.get('uri') || '') %>">
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
				<div id="federaltaxcodeInputContainer" class="control-group">
					<label class="control-label" for="federaltaxcode">Federaltaxcode</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="federaltaxcode" placeholder="Federaltaxcode" value="<%= _.escape(item.get('federaltaxcode') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="statetaxcodeInputContainer" class="control-group">
					<label class="control-label" for="statetaxcode">Statetaxcode</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="statetaxcode" placeholder="Statetaxcode" value="<%= _.escape(item.get('statetaxcode') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="countytaxcodeInputContainer" class="control-group">
					<label class="control-label" for="countytaxcode">Countytaxcode</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="countytaxcode" placeholder="Countytaxcode" value="<%= _.escape(item.get('countytaxcode') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteContactButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteContactButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Contact</button>
						<span id="confirmDeleteContactContainer" class="hide">
							<button id="cancelDeleteContactButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteContactButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="contactDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Contact
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="contactModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveContactButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="contactCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newContactButton" class="btn btn-primary">Add Contact</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
