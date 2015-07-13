<?php
	$this->assign('title','DIGITAL | Physicaldescriptions');
	$this->assign('nav','physicaldescriptions');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/physicaldescriptions.js").wait(function(){
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
	<i class="icon-th-list"></i> Physicaldescriptions
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="physicaldescriptionCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Id">Id<% if (page.orderBy == 'Id') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Item">Item<% if (page.orderBy == 'Item') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Apexiso">Apexiso<% if (page.orderBy == 'Apexiso') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Arabicpagenumbering">Arabicpagenumbering<% if (page.orderBy == 'Arabicpagenumbering') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Asaiso">Asaiso<% if (page.orderBy == 'Asaiso') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<th id="header_Boundtype">Boundtype<% if (page.orderBy == 'Boundtype') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Color">Color<% if (page.orderBy == 'Color') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Colorsystem">Colorsystem<% if (page.orderBy == 'Colorsystem') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Columnnumber">Columnnumber<% if (page.orderBy == 'Columnnumber') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Compressionmethod">Compressionmethod<% if (page.orderBy == 'Compressionmethod') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Contentcolor">Contentcolor<% if (page.orderBy == 'Contentcolor') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Contentextent">Contentextent<% if (page.orderBy == 'Contentextent') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Contentfinishing">Contentfinishing<% if (page.orderBy == 'Contentfinishing') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Contentsubstract">Contentsubstract<% if (page.orderBy == 'Contentsubstract') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Contenttype">Contenttype<% if (page.orderBy == 'Contenttype') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Covercolor">Covercolor<% if (page.orderBy == 'Covercolor') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Coverfinishing">Coverfinishing<% if (page.orderBy == 'Coverfinishing') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Coversubstract">Coversubstract<% if (page.orderBy == 'Coversubstract') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Defaultapplication">Defaultapplication<% if (page.orderBy == 'Defaultapplication') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Dustjacketcolor">Dustjacketcolor<% if (page.orderBy == 'Dustjacketcolor') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Dustjacketfinishing">Dustjacketfinishing<% if (page.orderBy == 'Dustjacketfinishing') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Dustjacketsubstract">Dustjacketsubstract<% if (page.orderBy == 'Dustjacketsubstract') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Endpaper">Endpaper<% if (page.orderBy == 'Endpaper') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Exif">Exif<% if (page.orderBy == 'Exif') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Format">Format<% if (page.orderBy == 'Format') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Framerate">Framerate<% if (page.orderBy == 'Framerate') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Hasdustjacket">Hasdustjacket<% if (page.orderBy == 'Hasdustjacket') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Hassound">Hassound<% if (page.orderBy == 'Hassound') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Hasspecialfold">Hasspecialfold<% if (page.orderBy == 'Hasspecialfold') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Iscompressed">Iscompressed<% if (page.orderBy == 'Iscompressed') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Lengthtxt">Lengthtxt<% if (page.orderBy == 'Lengthtxt') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Master">Master<% if (page.orderBy == 'Master') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Media">Media<% if (page.orderBy == 'Media') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Mediasupport">Mediasupport<% if (page.orderBy == 'Mediasupport') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Movements">Movements<% if (page.orderBy == 'Movements') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Other">Other<% if (page.orderBy == 'Other') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Projectionmode">Projectionmode<% if (page.orderBy == 'Projectionmode') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Romanpage">Romanpage<% if (page.orderBy == 'Romanpage') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Sizetxt">Sizetxt<% if (page.orderBy == 'Sizetxt') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Soundsystem">Soundsystem<% if (page.orderBy == 'Soundsystem') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Specialfold">Specialfold<% if (page.orderBy == 'Specialfold') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Specialpagenumebring">Specialpagenumebring<% if (page.orderBy == 'Specialpagenumebring') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Technique">Technique<% if (page.orderBy == 'Technique') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Timecode">Timecode<% if (page.orderBy == 'Timecode') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Tinting">Tinting<% if (page.orderBy == 'Tinting') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Titlepage">Titlepage<% if (page.orderBy == 'Titlepage') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Totaltime">Totaltime<% if (page.orderBy == 'Totaltime') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Type">Type<% if (page.orderBy == 'Type') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Writingformat">Writingformat<% if (page.orderBy == 'Writingformat') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('id')) %>">
				<td><%= _.escape(item.get('id') || '') %></td>
				<td><%= _.escape(item.get('item') || '') %></td>
				<td><%= _.escape(item.get('apexiso') || '') %></td>
				<td><%= _.escape(item.get('arabicpagenumbering') || '') %></td>
				<td><%= _.escape(item.get('asaiso') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
				<td><%= _.escape(item.get('boundtype') || '') %></td>
				<td><%= _.escape(item.get('color') || '') %></td>
				<td><%= _.escape(item.get('colorsystem') || '') %></td>
				<td><%= _.escape(item.get('columnnumber') || '') %></td>
				<td><%= _.escape(item.get('compressionmethod') || '') %></td>
				<td><%= _.escape(item.get('contentcolor') || '') %></td>
				<td><%= _.escape(item.get('contentextent') || '') %></td>
				<td><%= _.escape(item.get('contentfinishing') || '') %></td>
				<td><%= _.escape(item.get('contentsubstract') || '') %></td>
				<td><%= _.escape(item.get('contenttype') || '') %></td>
				<td><%= _.escape(item.get('covercolor') || '') %></td>
				<td><%= _.escape(item.get('coverfinishing') || '') %></td>
				<td><%= _.escape(item.get('coversubstract') || '') %></td>
				<td><%= _.escape(item.get('defaultapplication') || '') %></td>
				<td><%= _.escape(item.get('dustjacketcolor') || '') %></td>
				<td><%= _.escape(item.get('dustjacketfinishing') || '') %></td>
				<td><%= _.escape(item.get('dustjacketsubstract') || '') %></td>
				<td><%= _.escape(item.get('endpaper') || '') %></td>
				<td><%= _.escape(item.get('exif') || '') %></td>
				<td><%= _.escape(item.get('format') || '') %></td>
				<td><%= _.escape(item.get('framerate') || '') %></td>
				<td><%= _.escape(item.get('hasdustjacket') || '') %></td>
				<td><%= _.escape(item.get('hassound') || '') %></td>
				<td><%= _.escape(item.get('hasspecialfold') || '') %></td>
				<td><%= _.escape(item.get('iscompressed') || '') %></td>
				<td><%= _.escape(item.get('lengthtxt') || '') %></td>
				<td><%= _.escape(item.get('master') || '') %></td>
				<td><%= _.escape(item.get('media') || '') %></td>
				<td><%= _.escape(item.get('mediasupport') || '') %></td>
				<td><%= _.escape(item.get('movements') || '') %></td>
				<td><%= _.escape(item.get('other') || '') %></td>
				<td><%= _.escape(item.get('projectionmode') || '') %></td>
				<td><%= _.escape(item.get('romanpage') || '') %></td>
				<td><%= _.escape(item.get('sizetxt') || '') %></td>
				<td><%= _.escape(item.get('soundsystem') || '') %></td>
				<td><%= _.escape(item.get('specialfold') || '') %></td>
				<td><%= _.escape(item.get('specialpagenumebring') || '') %></td>
				<td><%= _.escape(item.get('technique') || '') %></td>
				<td><%= _.escape(item.get('timecode') || '') %></td>
				<td><%= _.escape(item.get('tinting') || '') %></td>
				<td><%= _.escape(item.get('titlepage') || '') %></td>
				<td><%= _.escape(item.get('totaltime') || '') %></td>
				<td><%= _.escape(item.get('type') || '') %></td>
				<td><%= _.escape(item.get('writingformat') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="physicaldescriptionModelTemplate">
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
				<div id="apexisoInputContainer" class="control-group">
					<label class="control-label" for="apexiso">Apexiso</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="apexiso" placeholder="Apexiso" value="<%= _.escape(item.get('apexiso') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="arabicpagenumberingInputContainer" class="control-group">
					<label class="control-label" for="arabicpagenumbering">Arabicpagenumbering</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="arabicpagenumbering" placeholder="Arabicpagenumbering" value="<%= _.escape(item.get('arabicpagenumbering') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="asaisoInputContainer" class="control-group">
					<label class="control-label" for="asaiso">Asaiso</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="asaiso" placeholder="Asaiso" value="<%= _.escape(item.get('asaiso') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="boundtypeInputContainer" class="control-group">
					<label class="control-label" for="boundtype">Boundtype</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="boundtype" placeholder="Boundtype" value="<%= _.escape(item.get('boundtype') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="colorInputContainer" class="control-group">
					<label class="control-label" for="color">Color</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="color" placeholder="Color" value="<%= _.escape(item.get('color') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="colorsystemInputContainer" class="control-group">
					<label class="control-label" for="colorsystem">Colorsystem</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="colorsystem" placeholder="Colorsystem" value="<%= _.escape(item.get('colorsystem') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="columnnumberInputContainer" class="control-group">
					<label class="control-label" for="columnnumber">Columnnumber</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="columnnumber" placeholder="Columnnumber" value="<%= _.escape(item.get('columnnumber') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="compressionmethodInputContainer" class="control-group">
					<label class="control-label" for="compressionmethod">Compressionmethod</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="compressionmethod" placeholder="Compressionmethod" value="<%= _.escape(item.get('compressionmethod') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="contentcolorInputContainer" class="control-group">
					<label class="control-label" for="contentcolor">Contentcolor</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="contentcolor" placeholder="Contentcolor" value="<%= _.escape(item.get('contentcolor') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="contentextentInputContainer" class="control-group">
					<label class="control-label" for="contentextent">Contentextent</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="contentextent" placeholder="Contentextent" value="<%= _.escape(item.get('contentextent') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="contentfinishingInputContainer" class="control-group">
					<label class="control-label" for="contentfinishing">Contentfinishing</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="contentfinishing" placeholder="Contentfinishing" value="<%= _.escape(item.get('contentfinishing') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="contentsubstractInputContainer" class="control-group">
					<label class="control-label" for="contentsubstract">Contentsubstract</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="contentsubstract" placeholder="Contentsubstract" value="<%= _.escape(item.get('contentsubstract') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="contenttypeInputContainer" class="control-group">
					<label class="control-label" for="contenttype">Contenttype</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="contenttype" placeholder="Contenttype" value="<%= _.escape(item.get('contenttype') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="covercolorInputContainer" class="control-group">
					<label class="control-label" for="covercolor">Covercolor</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="covercolor" placeholder="Covercolor" value="<%= _.escape(item.get('covercolor') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="coverfinishingInputContainer" class="control-group">
					<label class="control-label" for="coverfinishing">Coverfinishing</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="coverfinishing" placeholder="Coverfinishing" value="<%= _.escape(item.get('coverfinishing') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="coversubstractInputContainer" class="control-group">
					<label class="control-label" for="coversubstract">Coversubstract</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="coversubstract" placeholder="Coversubstract" value="<%= _.escape(item.get('coversubstract') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="defaultapplicationInputContainer" class="control-group">
					<label class="control-label" for="defaultapplication">Defaultapplication</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="defaultapplication" placeholder="Defaultapplication" value="<%= _.escape(item.get('defaultapplication') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="dustjacketcolorInputContainer" class="control-group">
					<label class="control-label" for="dustjacketcolor">Dustjacketcolor</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="dustjacketcolor" placeholder="Dustjacketcolor" value="<%= _.escape(item.get('dustjacketcolor') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="dustjacketfinishingInputContainer" class="control-group">
					<label class="control-label" for="dustjacketfinishing">Dustjacketfinishing</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="dustjacketfinishing" placeholder="Dustjacketfinishing" value="<%= _.escape(item.get('dustjacketfinishing') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="dustjacketsubstractInputContainer" class="control-group">
					<label class="control-label" for="dustjacketsubstract">Dustjacketsubstract</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="dustjacketsubstract" placeholder="Dustjacketsubstract" value="<%= _.escape(item.get('dustjacketsubstract') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="endpaperInputContainer" class="control-group">
					<label class="control-label" for="endpaper">Endpaper</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="endpaper" placeholder="Endpaper" value="<%= _.escape(item.get('endpaper') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="exifInputContainer" class="control-group">
					<label class="control-label" for="exif">Exif</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="exif" placeholder="Exif" value="<%= _.escape(item.get('exif') || '') %>">
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
				<div id="framerateInputContainer" class="control-group">
					<label class="control-label" for="framerate">Framerate</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="framerate" placeholder="Framerate" value="<%= _.escape(item.get('framerate') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="hasdustjacketInputContainer" class="control-group">
					<label class="control-label" for="hasdustjacket">Hasdustjacket</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="hasdustjacket" placeholder="Hasdustjacket" value="<%= _.escape(item.get('hasdustjacket') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="hassoundInputContainer" class="control-group">
					<label class="control-label" for="hassound">Hassound</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="hassound" placeholder="Hassound" value="<%= _.escape(item.get('hassound') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="hasspecialfoldInputContainer" class="control-group">
					<label class="control-label" for="hasspecialfold">Hasspecialfold</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="hasspecialfold" placeholder="Hasspecialfold" value="<%= _.escape(item.get('hasspecialfold') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="iscompressedInputContainer" class="control-group">
					<label class="control-label" for="iscompressed">Iscompressed</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="iscompressed" placeholder="Iscompressed" value="<%= _.escape(item.get('iscompressed') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="lengthtxtInputContainer" class="control-group">
					<label class="control-label" for="lengthtxt">Lengthtxt</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="lengthtxt" placeholder="Lengthtxt" value="<%= _.escape(item.get('lengthtxt') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="masterInputContainer" class="control-group">
					<label class="control-label" for="master">Master</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="master" placeholder="Master" value="<%= _.escape(item.get('master') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="mediaInputContainer" class="control-group">
					<label class="control-label" for="media">Media</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="media" placeholder="Media" value="<%= _.escape(item.get('media') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="mediasupportInputContainer" class="control-group">
					<label class="control-label" for="mediasupport">Mediasupport</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="mediasupport" placeholder="Mediasupport" value="<%= _.escape(item.get('mediasupport') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="movementsInputContainer" class="control-group">
					<label class="control-label" for="movements">Movements</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="movements" placeholder="Movements" value="<%= _.escape(item.get('movements') || '') %>">
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
				<div id="projectionmodeInputContainer" class="control-group">
					<label class="control-label" for="projectionmode">Projectionmode</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="projectionmode" placeholder="Projectionmode" value="<%= _.escape(item.get('projectionmode') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="romanpageInputContainer" class="control-group">
					<label class="control-label" for="romanpage">Romanpage</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="romanpage" placeholder="Romanpage" value="<%= _.escape(item.get('romanpage') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="sizetxtInputContainer" class="control-group">
					<label class="control-label" for="sizetxt">Sizetxt</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="sizetxt" placeholder="Sizetxt" value="<%= _.escape(item.get('sizetxt') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="soundsystemInputContainer" class="control-group">
					<label class="control-label" for="soundsystem">Soundsystem</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="soundsystem" placeholder="Soundsystem" value="<%= _.escape(item.get('soundsystem') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="specialfoldInputContainer" class="control-group">
					<label class="control-label" for="specialfold">Specialfold</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="specialfold" placeholder="Specialfold" value="<%= _.escape(item.get('specialfold') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="specialpagenumebringInputContainer" class="control-group">
					<label class="control-label" for="specialpagenumebring">Specialpagenumebring</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="specialpagenumebring" placeholder="Specialpagenumebring" value="<%= _.escape(item.get('specialpagenumebring') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="techniqueInputContainer" class="control-group">
					<label class="control-label" for="technique">Technique</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="technique" placeholder="Technique" value="<%= _.escape(item.get('technique') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="timecodeInputContainer" class="control-group">
					<label class="control-label" for="timecode">Timecode</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="timecode" placeholder="Timecode" value="<%= _.escape(item.get('timecode') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="tintingInputContainer" class="control-group">
					<label class="control-label" for="tinting">Tinting</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="tinting" placeholder="Tinting" value="<%= _.escape(item.get('tinting') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="titlepageInputContainer" class="control-group">
					<label class="control-label" for="titlepage">Titlepage</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="titlepage" placeholder="Titlepage" value="<%= _.escape(item.get('titlepage') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="totaltimeInputContainer" class="control-group">
					<label class="control-label" for="totaltime">Totaltime</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="totaltime" placeholder="Totaltime" value="<%= _.escape(item.get('totaltime') || '') %>">
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
				<div id="writingformatInputContainer" class="control-group">
					<label class="control-label" for="writingformat">Writingformat</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="writingformat" placeholder="Writingformat" value="<%= _.escape(item.get('writingformat') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deletePhysicaldescriptionButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deletePhysicaldescriptionButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Physicaldescription</button>
						<span id="confirmDeletePhysicaldescriptionContainer" class="hide">
							<button id="cancelDeletePhysicaldescriptionButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeletePhysicaldescriptionButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="physicaldescriptionDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Physicaldescription
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="physicaldescriptionModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="savePhysicaldescriptionButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="physicaldescriptionCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newPhysicaldescriptionButton" class="btn btn-primary">Add Physicaldescription</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
