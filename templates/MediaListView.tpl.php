<?php
	$this->assign('title','DIGITAL | Medias');
	$this->assign('nav','medias');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/medias.js").wait(function(){
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
	<i class="icon-th-list"></i> Medias
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="mediaCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Idmedia">Idmedia<% if (page.orderBy == 'Idmedia') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Idhistory">Idhistory<% if (page.orderBy == 'Idhistory') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Storage">Storage<% if (page.orderBy == 'Storage') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Iddocumentation">Iddocumentation<% if (page.orderBy == 'Iddocumentation') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Institution">Institution<% if (page.orderBy == 'Institution') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Idreference">Idreference<% if (page.orderBy == 'Idreference') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Mediatype">Mediatype<% if (page.orderBy == 'Mediatype') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Mediaurl">Mediaurl<% if (page.orderBy == 'Mediaurl') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Digitizationdate">Digitizationdate<% if (page.orderBy == 'Digitizationdate') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Digitizationresponsable">Digitizationresponsable<% if (page.orderBy == 'Digitizationresponsable') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Polarity">Polarity<% if (page.orderBy == 'Polarity') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Colorspace">Colorspace<% if (page.orderBy == 'Colorspace') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Iccprofile">Iccprofile<% if (page.orderBy == 'Iccprofile') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Xresolution">Xresolution<% if (page.orderBy == 'Xresolution') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Yresolution">Yresolution<% if (page.orderBy == 'Yresolution') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Thumbnail">Thumbnail<% if (page.orderBy == 'Thumbnail') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Digitizationequipment">Digitizationequipment<% if (page.orderBy == 'Digitizationequipment') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Format">Format<% if (page.orderBy == 'Format') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Ispublic">Ispublic<% if (page.orderBy == 'Ispublic') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Ordername">Ordername<% if (page.orderBy == 'Ordername') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Sent">Sent<% if (page.orderBy == 'Sent') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Exif">Exif<% if (page.orderBy == 'Exif') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Textual">Textual<% if (page.orderBy == 'Textual') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Sizemedia">Sizemedia<% if (page.orderBy == 'Sizemedia') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Nameoriginal">Nameoriginal<% if (page.orderBy == 'Nameoriginal') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Mainmedia">Mainmedia<% if (page.orderBy == 'Mainmedia') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Mediadir">Mediadir<% if (page.orderBy == 'Mediadir') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Thumbnaildir">Thumbnaildir<% if (page.orderBy == 'Thumbnaildir') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Thumbnailurl">Thumbnailurl<% if (page.orderBy == 'Thumbnailurl') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('idmedia')) %>">
				<td><%= _.escape(item.get('idmedia') || '') %></td>
				<td><%= _.escape(item.get('idhistory') || '') %></td>
				<td><%= _.escape(item.get('storage') || '') %></td>
				<td><%= _.escape(item.get('iddocumentation') || '') %></td>
				<td><%= _.escape(item.get('institution') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('idreference') || '') %></td>
				<td><%= _.escape(item.get('mediatype') || '') %></td>
				<td><%= _.escape(item.get('mediaurl') || '') %></td>
				<td><%if (item.get('digitizationdate')) { %><%= _date(app.parseDate(item.get('digitizationdate'))).format('MMM D, YYYY') %><% } else { %>NULL<% } %></td>
				<td><%= _.escape(item.get('digitizationresponsable') || '') %></td>
				<td><%= _.escape(item.get('polarity') || '') %></td>
				<td><%= _.escape(item.get('colorspace') || '') %></td>
				<td><%= _.escape(item.get('iccprofile') || '') %></td>
				<td><%= _.escape(item.get('xresolution') || '') %></td>
				<td><%= _.escape(item.get('yresolution') || '') %></td>
				<td><%= _.escape(item.get('thumbnail') || '') %></td>
				<td><%= _.escape(item.get('digitizationequipment') || '') %></td>
				<td><%= _.escape(item.get('format') || '') %></td>
				<td><%= _.escape(item.get('ispublic') || '') %></td>
				<td><%= _.escape(item.get('ordername') || '') %></td>
				<td><%= _.escape(item.get('sent') || '') %></td>
				<td><%= _.escape(item.get('exif') || '') %></td>
				<td><%= _.escape(item.get('textual') || '') %></td>
				<td><%= _.escape(item.get('sizemedia') || '') %></td>
				<td><%= _.escape(item.get('nameoriginal') || '') %></td>
				<td><%= _.escape(item.get('mainmedia') || '') %></td>
				<td><%= _.escape(item.get('mediadir') || '') %></td>
				<td><%= _.escape(item.get('thumbnaildir') || '') %></td>
				<td><%= _.escape(item.get('thumbnailurl') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="mediaModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="idmediaInputContainer" class="control-group">
					<label class="control-label" for="idmedia">Idmedia</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="idmedia"><%= _.escape(item.get('idmedia') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="idhistoryInputContainer" class="control-group">
					<label class="control-label" for="idhistory">Idhistory</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="idhistory" placeholder="Idhistory" value="<%= _.escape(item.get('idhistory') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="storageInputContainer" class="control-group">
					<label class="control-label" for="storage">Storage</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="storage" placeholder="Storage" value="<%= _.escape(item.get('storage') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="iddocumentationInputContainer" class="control-group">
					<label class="control-label" for="iddocumentation">Iddocumentation</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="iddocumentation" placeholder="Iddocumentation" value="<%= _.escape(item.get('iddocumentation') || '') %>">
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
				<div id="idreferenceInputContainer" class="control-group">
					<label class="control-label" for="idreference">Idreference</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="idreference" placeholder="Idreference" value="<%= _.escape(item.get('idreference') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="mediatypeInputContainer" class="control-group">
					<label class="control-label" for="mediatype">Mediatype</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="mediatype" placeholder="Mediatype" value="<%= _.escape(item.get('mediatype') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="mediaurlInputContainer" class="control-group">
					<label class="control-label" for="mediaurl">Mediaurl</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="mediaurl" placeholder="Mediaurl" value="<%= _.escape(item.get('mediaurl') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="digitizationdateInputContainer" class="control-group">
					<label class="control-label" for="digitizationdate">Digitizationdate</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="digitizationdate" type="text" value="<%= _date(app.parseDate(item.get('digitizationdate'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="digitizationresponsableInputContainer" class="control-group">
					<label class="control-label" for="digitizationresponsable">Digitizationresponsable</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="digitizationresponsable" placeholder="Digitizationresponsable" value="<%= _.escape(item.get('digitizationresponsable') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="polarityInputContainer" class="control-group">
					<label class="control-label" for="polarity">Polarity</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="polarity" placeholder="Polarity" value="<%= _.escape(item.get('polarity') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="colorspaceInputContainer" class="control-group">
					<label class="control-label" for="colorspace">Colorspace</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="colorspace" placeholder="Colorspace" value="<%= _.escape(item.get('colorspace') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="iccprofileInputContainer" class="control-group">
					<label class="control-label" for="iccprofile">Iccprofile</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="iccprofile" placeholder="Iccprofile" value="<%= _.escape(item.get('iccprofile') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="xresolutionInputContainer" class="control-group">
					<label class="control-label" for="xresolution">Xresolution</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="xresolution" placeholder="Xresolution" value="<%= _.escape(item.get('xresolution') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="yresolutionInputContainer" class="control-group">
					<label class="control-label" for="yresolution">Yresolution</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="yresolution" placeholder="Yresolution" value="<%= _.escape(item.get('yresolution') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="thumbnailInputContainer" class="control-group">
					<label class="control-label" for="thumbnail">Thumbnail</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="thumbnail" placeholder="Thumbnail" value="<%= _.escape(item.get('thumbnail') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="digitizationequipmentInputContainer" class="control-group">
					<label class="control-label" for="digitizationequipment">Digitizationequipment</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="digitizationequipment" placeholder="Digitizationequipment" value="<%= _.escape(item.get('digitizationequipment') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="formatInputContainer" class="control-group">
					<label class="control-label" for="format">Format</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="format" placeholder="Format" value="<%= _.escape(item.get('format') || '') %>">
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
				<div id="ordernameInputContainer" class="control-group">
					<label class="control-label" for="ordername">Ordername</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="ordername" placeholder="Ordername" value="<%= _.escape(item.get('ordername') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="sentInputContainer" class="control-group">
					<label class="control-label" for="sent">Sent</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="sent" placeholder="Sent" value="<%= _.escape(item.get('sent') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="exifInputContainer" class="control-group">
					<label class="control-label" for="exif">Exif</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="exif" rows="3"><%= _.escape(item.get('exif') || '') %></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="textualInputContainer" class="control-group">
					<label class="control-label" for="textual">Textual</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="textual" rows="3"><%= _.escape(item.get('textual') || '') %></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="sizemediaInputContainer" class="control-group">
					<label class="control-label" for="sizemedia">Sizemedia</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="sizemedia" placeholder="Sizemedia" value="<%= _.escape(item.get('sizemedia') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="nameoriginalInputContainer" class="control-group">
					<label class="control-label" for="nameoriginal">Nameoriginal</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="nameoriginal" placeholder="Nameoriginal" value="<%= _.escape(item.get('nameoriginal') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="mainmediaInputContainer" class="control-group">
					<label class="control-label" for="mainmedia">Mainmedia</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="mainmedia" placeholder="Mainmedia" value="<%= _.escape(item.get('mainmedia') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="mediadirInputContainer" class="control-group">
					<label class="control-label" for="mediadir">Mediadir</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="mediadir" placeholder="Mediadir" value="<%= _.escape(item.get('mediadir') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="thumbnaildirInputContainer" class="control-group">
					<label class="control-label" for="thumbnaildir">Thumbnaildir</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="thumbnaildir" placeholder="Thumbnaildir" value="<%= _.escape(item.get('thumbnaildir') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="thumbnailurlInputContainer" class="control-group">
					<label class="control-label" for="thumbnailurl">Thumbnailurl</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="thumbnailurl" placeholder="Thumbnailurl" value="<%= _.escape(item.get('thumbnailurl') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteMediaButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteMediaButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Media</button>
						<span id="confirmDeleteMediaContainer" class="hide">
							<button id="cancelDeleteMediaButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteMediaButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="mediaDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Media
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="mediaModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveMediaButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="mediaCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newMediaButton" class="btn btn-primary">Add Media</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
