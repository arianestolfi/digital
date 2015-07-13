<?php
	$this->assign('title','DIGITAL | Itemdescriptions');
	$this->assign('nav','itemdescriptions');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/itemdescriptions.js").wait(function(){
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
	<i class="icon-th-list"></i> Itemdescriptions
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="itemdescriptionCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Id">Id<% if (page.orderBy == 'Id') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Item">Item<% if (page.orderBy == 'Item') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Abstracttext">Abstracttext<% if (page.orderBy == 'Abstracttext') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Accrual">Accrual<% if (page.orderBy == 'Accrual') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Appraisaldesstructionschedulling">Appraisaldesstructionschedulling<% if (page.orderBy == 'Appraisaldesstructionschedulling') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Arrangement">Arrangement<% if (page.orderBy == 'Arrangement') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Broadcastmethod">Broadcastmethod<% if (page.orderBy == 'Broadcastmethod') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Era">Era<% if (page.orderBy == 'Era') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Fromcorporate">Fromcorporate<% if (page.orderBy == 'Fromcorporate') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Frompersonal">Frompersonal<% if (page.orderBy == 'Frompersonal') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Geographiccoodnates">Geographiccoodnates<% if (page.orderBy == 'Geographiccoodnates') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Geographicname">Geographicname<% if (page.orderBy == 'Geographicname') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Label">Label<% if (page.orderBy == 'Label') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Language">Language<% if (page.orderBy == 'Language') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Mediapresentation">Mediapresentation<% if (page.orderBy == 'Mediapresentation') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Movement">Movement<% if (page.orderBy == 'Movement') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Other">Other<% if (page.orderBy == 'Other') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Period">Period<% if (page.orderBy == 'Period') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Periodicity">Periodicity<% if (page.orderBy == 'Periodicity') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Preservationstatus">Preservationstatus<% if (page.orderBy == 'Preservationstatus') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Scope">Scope<% if (page.orderBy == 'Scope') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Style">Style<% if (page.orderBy == 'Style') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Subject">Subject<% if (page.orderBy == 'Subject') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Tableofcontents">Tableofcontents<% if (page.orderBy == 'Tableofcontents') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Targetaudience">Targetaudience<% if (page.orderBy == 'Targetaudience') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Tocorporate">Tocorporate<% if (page.orderBy == 'Tocorporate') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Topersonal">Topersonal<% if (page.orderBy == 'Topersonal') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('id')) %>">
				<td><%= _.escape(item.get('id') || '') %></td>
				<td><%= _.escape(item.get('item') || '') %></td>
				<td><%= _.escape(item.get('abstracttext') || '') %></td>
				<td><%= _.escape(item.get('accrual') || '') %></td>
				<td><%= _.escape(item.get('appraisaldesstructionschedulling') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('arrangement') || '') %></td>
				<td><%= _.escape(item.get('broadcastmethod') || '') %></td>
				<td><%= _.escape(item.get('era') || '') %></td>
				<td><%= _.escape(item.get('fromcorporate') || '') %></td>
				<td><%= _.escape(item.get('frompersonal') || '') %></td>
				<td><%= _.escape(item.get('geographiccoodnates') || '') %></td>
				<td><%= _.escape(item.get('geographicname') || '') %></td>
				<td><%= _.escape(item.get('label') || '') %></td>
				<td><%= _.escape(item.get('language') || '') %></td>
				<td><%= _.escape(item.get('mediapresentation') || '') %></td>
				<td><%= _.escape(item.get('movement') || '') %></td>
				<td><%= _.escape(item.get('other') || '') %></td>
				<td><%= _.escape(item.get('period') || '') %></td>
				<td><%= _.escape(item.get('periodicity') || '') %></td>
				<td><%= _.escape(item.get('preservationstatus') || '') %></td>
				<td><%= _.escape(item.get('scope') || '') %></td>
				<td><%= _.escape(item.get('style') || '') %></td>
				<td><%= _.escape(item.get('subject') || '') %></td>
				<td><%= _.escape(item.get('tableofcontents') || '') %></td>
				<td><%= _.escape(item.get('targetaudience') || '') %></td>
				<td><%= _.escape(item.get('tocorporate') || '') %></td>
				<td><%= _.escape(item.get('topersonal') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="itemdescriptionModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idInputContainer" class="control-group">
					<label class="control-label" for="id">Id</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="id"><%= _.escape(item.get('id') || '') %></span>
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
				<div id="abstracttextInputContainer" class="control-group">
					<label class="control-label" for="abstracttext">Abstracttext</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="abstracttext" placeholder="Abstracttext" value="<%= _.escape(item.get('abstracttext') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="accrualInputContainer" class="control-group">
					<label class="control-label" for="accrual">Accrual</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="accrual" placeholder="Accrual" value="<%= _.escape(item.get('accrual') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="appraisaldesstructionschedullingInputContainer" class="control-group">
					<label class="control-label" for="appraisaldesstructionschedulling">Appraisaldesstructionschedulling</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="appraisaldesstructionschedulling" placeholder="Appraisaldesstructionschedulling" value="<%= _.escape(item.get('appraisaldesstructionschedulling') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="arrangementInputContainer" class="control-group">
					<label class="control-label" for="arrangement">Arrangement</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="arrangement" placeholder="Arrangement" value="<%= _.escape(item.get('arrangement') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="broadcastmethodInputContainer" class="control-group">
					<label class="control-label" for="broadcastmethod">Broadcastmethod</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="broadcastmethod" placeholder="Broadcastmethod" value="<%= _.escape(item.get('broadcastmethod') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="eraInputContainer" class="control-group">
					<label class="control-label" for="era">Era</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="era" placeholder="Era" value="<%= _.escape(item.get('era') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="fromcorporateInputContainer" class="control-group">
					<label class="control-label" for="fromcorporate">Fromcorporate</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="fromcorporate" placeholder="Fromcorporate" value="<%= _.escape(item.get('fromcorporate') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="frompersonalInputContainer" class="control-group">
					<label class="control-label" for="frompersonal">Frompersonal</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="frompersonal" placeholder="Frompersonal" value="<%= _.escape(item.get('frompersonal') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="geographiccoodnatesInputContainer" class="control-group">
					<label class="control-label" for="geographiccoodnates">Geographiccoodnates</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="geographiccoodnates" placeholder="Geographiccoodnates" value="<%= _.escape(item.get('geographiccoodnates') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="geographicnameInputContainer" class="control-group">
					<label class="control-label" for="geographicname">Geographicname</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="geographicname" placeholder="Geographicname" value="<%= _.escape(item.get('geographicname') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="labelInputContainer" class="control-group">
					<label class="control-label" for="label">Label</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="label" placeholder="Label" value="<%= _.escape(item.get('label') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="languageInputContainer" class="control-group">
					<label class="control-label" for="language">Language</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="language" placeholder="Language" value="<%= _.escape(item.get('language') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="mediapresentationInputContainer" class="control-group">
					<label class="control-label" for="mediapresentation">Mediapresentation</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="mediapresentation" placeholder="Mediapresentation" value="<%= _.escape(item.get('mediapresentation') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="movementInputContainer" class="control-group">
					<label class="control-label" for="movement">Movement</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="movement" placeholder="Movement" value="<%= _.escape(item.get('movement') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="otherInputContainer" class="control-group">
					<label class="control-label" for="other">Other</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="other" placeholder="Other" value="<%= _.escape(item.get('other') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="periodInputContainer" class="control-group">
					<label class="control-label" for="period">Period</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="period" placeholder="Period" value="<%= _.escape(item.get('period') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="periodicityInputContainer" class="control-group">
					<label class="control-label" for="periodicity">Periodicity</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="periodicity" placeholder="Periodicity" value="<%= _.escape(item.get('periodicity') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="preservationstatusInputContainer" class="control-group">
					<label class="control-label" for="preservationstatus">Preservationstatus</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="preservationstatus" placeholder="Preservationstatus" value="<%= _.escape(item.get('preservationstatus') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="scopeInputContainer" class="control-group">
					<label class="control-label" for="scope">Scope</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="scope" placeholder="Scope" value="<%= _.escape(item.get('scope') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="styleInputContainer" class="control-group">
					<label class="control-label" for="style">Style</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="style" placeholder="Style" value="<%= _.escape(item.get('style') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="subjectInputContainer" class="control-group">
					<label class="control-label" for="subject">Subject</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="subject" placeholder="Subject" value="<%= _.escape(item.get('subject') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="tableofcontentsInputContainer" class="control-group">
					<label class="control-label" for="tableofcontents">Tableofcontents</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="tableofcontents" placeholder="Tableofcontents" value="<%= _.escape(item.get('tableofcontents') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="targetaudienceInputContainer" class="control-group">
					<label class="control-label" for="targetaudience">Targetaudience</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="targetaudience" placeholder="Targetaudience" value="<%= _.escape(item.get('targetaudience') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="tocorporateInputContainer" class="control-group">
					<label class="control-label" for="tocorporate">Tocorporate</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="tocorporate" placeholder="Tocorporate" value="<%= _.escape(item.get('tocorporate') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="topersonalInputContainer" class="control-group">
					<label class="control-label" for="topersonal">Topersonal</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="topersonal" placeholder="Topersonal" value="<%= _.escape(item.get('topersonal') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteItemdescriptionButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteItemdescriptionButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Itemdescription</button>
						<span id="confirmDeleteItemdescriptionContainer" class="hide">
							<button id="cancelDeleteItemdescriptionButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteItemdescriptionButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="itemdescriptionDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Itemdescription
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="itemdescriptionModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveItemdescriptionButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="itemdescriptionCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newItemdescriptionButton" class="btn btn-primary">Add Itemdescription</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
