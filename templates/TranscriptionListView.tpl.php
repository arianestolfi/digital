<?php
	$this->assign('title','DIGITAL | Transcriptions');
	$this->assign('nav','transcriptions');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/transcriptions.js").wait(function(){
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
	<i class="icon-th-list"></i> Transcriptions
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="transcriptionCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Idtranscription">Idtranscription<% if (page.orderBy == 'Idtranscription') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Iditem">Iditem<% if (page.orderBy == 'Iditem') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Idmedia">Idmedia<% if (page.orderBy == 'Idmedia') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Transcription">Transcription<% if (page.orderBy == 'Transcription') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Notes">Notes<% if (page.orderBy == 'Notes') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Language">Language<% if (page.orderBy == 'Language') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idtranscription')) %>">
				<td><%= _.escape(item.get('idtranscription') || '') %></td>
				<td><%= _.escape(item.get('iditem') || '') %></td>
				<td><%= _.escape(item.get('idmedia') || '') %></td>
				<td><%= _.escape(item.get('transcription') || '') %></td>
				<td><%= _.escape(item.get('notes') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('language') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="transcriptionModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idtranscriptionInputContainer" class="control-group">
					<label class="control-label" for="idtranscription">Idtranscription</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idtranscription"><%= _.escape(item.get('idtranscription') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="iditemInputContainer" class="control-group">
					<label class="control-label" for="iditem">Iditem</label>
					<div class="controls inline-inputs">
						<select id="iditem" name="iditem"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="idmediaInputContainer" class="control-group">
					<label class="control-label" for="idmedia">Idmedia</label>
					<div class="controls inline-inputs">
						<select id="idmedia" name="idmedia"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="transcriptionInputContainer" class="control-group">
					<label class="control-label" for="transcription">Transcription</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="transcription" rows="3"><%= _.escape(item.get('transcription') || '') %></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="notesInputContainer" class="control-group">
					<label class="control-label" for="notes">Notes</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="notes" placeholder="Notes" value="<%= _.escape(item.get('notes') || '') %>">
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
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteTranscriptionButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteTranscriptionButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Transcription</button>
						<span id="confirmDeleteTranscriptionContainer" class="hide">
							<button id="cancelDeleteTranscriptionButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteTranscriptionButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="transcriptionDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Transcription
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="transcriptionModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveTranscriptionButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="transcriptionCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newTranscriptionButton" class="btn btn-primary">Add Transcription</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
