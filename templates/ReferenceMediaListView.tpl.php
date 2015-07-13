<?php
	$this->assign('title','DIGITAL | ReferenceMedias');
	$this->assign('nav','referencemedias');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/referencemedias.js").wait(function(){
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
	<i class="icon-th-list"></i> ReferenceMedias
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="referenceMediaCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_IdRefMedia">Id Ref Media<% if (page.orderBy == 'IdRefMedia') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_ReferenceIdreference">Reference Idreference<% if (page.orderBy == 'ReferenceIdreference') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_MediasIdmedia">Medias Idmedia<% if (page.orderBy == 'MediasIdmedia') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idRefMedia')) %>">
				<td><%= _.escape(item.get('idRefMedia') || '') %></td>
				<td><%= _.escape(item.get('referenceIdreference') || '') %></td>
				<td><%= _.escape(item.get('mediasIdmedia') || '') %></td>
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="referenceMediaModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idRefMediaInputContainer" class="control-group">
					<label class="control-label" for="idRefMedia">Id Ref Media</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idRefMedia"><%= _.escape(item.get('idRefMedia') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="referenceIdreferenceInputContainer" class="control-group">
					<label class="control-label" for="referenceIdreference">Reference Idreference</label>
					<div class="controls inline-inputs">
						<select id="referenceIdreference" name="referenceIdreference"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="mediasIdmediaInputContainer" class="control-group">
					<label class="control-label" for="mediasIdmedia">Medias Idmedia</label>
					<div class="controls inline-inputs">
						<select id="mediasIdmedia" name="mediasIdmedia"></select>
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteReferenceMediaButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteReferenceMediaButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete ReferenceMedia</button>
						<span id="confirmDeleteReferenceMediaContainer" class="hide">
							<button id="cancelDeleteReferenceMediaButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteReferenceMediaButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="referenceMediaDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit ReferenceMedia
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="referenceMediaModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveReferenceMediaButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="referenceMediaCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newReferenceMediaButton" class="btn btn-primary">Add ReferenceMedia</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
