<?php
	$this->assign('title','DIGITAL | Items');
	$this->assign('nav','items');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/items.js").wait(function(){
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
	<i class="icon-th-list"></i> Items
	<span id=loader class="loader progress progress-striped active"><span class="bar"></span></span>
	<span class='input-append pull-right searchContainer'>
		<input id='filter' type="text" placeholder="Search..." />
		<button class='btn add-on'><i class="icon-search"></i></button>
	</span>
</h1>

	<!-- underscore template for the collection -->
	<script type="text/template" id="itemCollectionTemplate">
		<table class="collection table table-bordered table-hover">
		<thead>
			<tr>
				<th id="header_Iditem">Iditem<% if (page.orderBy == 'Iditem') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Holder">Holder<% if (page.orderBy == 'Holder') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Level">Level<% if (page.orderBy == 'Level') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Institution">Institution<% if (page.orderBy == 'Institution') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Inventoryid">Inventoryid<% if (page.orderBy == 'Inventoryid') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>

				<th id="header_Uritype">Uritype<% if (page.orderBy == 'Uritype') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Uri">Uri<% if (page.orderBy == 'Uri') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Keywords">Keywords<% if (page.orderBy == 'Keywords') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Description">Description<% if (page.orderBy == 'Description') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Uidtype">Uidtype<% if (page.orderBy == 'Uidtype') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Uid">Uid<% if (page.orderBy == 'Uid') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Class">Class<% if (page.orderBy == 'Class') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Type">Type<% if (page.orderBy == 'Type') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
                <th id="header_Iseletronic">Iseletronic<% if (page.orderBy == 'Iseletronic') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Creationdate">Creationdate<% if (page.orderBy == 'Creationdate') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Acquisitiondate">Acquisitiondate<% if (page.orderBy == 'Acquisitiondate') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Scopecontent">Scopecontent<% if (page.orderBy == 'Scopecontent') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Originalexistence">Originalexistence<% if (page.orderBy == 'Originalexistence') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Originallocation">Originallocation<% if (page.orderBy == 'Originallocation') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Repositorycode">Repositorycode<% if (page.orderBy == 'Repositorycode') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Copyexistence">Copyexistence<% if (page.orderBy == 'Copyexistence') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Copylocation">Copylocation<% if (page.orderBy == 'Copylocation') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Legalaccess">Legalaccess<% if (page.orderBy == 'Legalaccess') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Accesscondition">Accesscondition<% if (page.orderBy == 'Accesscondition') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Reproductionrights">Reproductionrights<% if (page.orderBy == 'Reproductionrights') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Reproductionrightsdescription">Reproductionrightsdescription<% if (page.orderBy == 'Reproductionrightsdescription') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Itemdate">Itemdate<% if (page.orderBy == 'Itemdate') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Publishdate">Publishdate<% if (page.orderBy == 'Publishdate') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Publisher">Publisher<% if (page.orderBy == 'Publisher') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Itematributes">Itematributes<% if (page.orderBy == 'Itematributes') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Ispublic">Ispublic<% if (page.orderBy == 'Ispublic') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Preliminaryrule">Preliminaryrule<% if (page.orderBy == 'Preliminaryrule') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Punctuation">Punctuation<% if (page.orderBy == 'Punctuation') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Notes">Notes<% if (page.orderBy == 'Notes') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Otherinformation">Otherinformation<% if (page.orderBy == 'Otherinformation') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Idfather">Idfather<% if (page.orderBy == 'Idfather') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Titledefault">Titledefault<% if (page.orderBy == 'Titledefault') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Subitem">Subitem<% if (page.orderBy == 'Subitem') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Deletecomfirm">Deletecomfirm<% if (page.orderBy == 'Deletecomfirm') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Typeitem">Typeitem<% if (page.orderBy == 'Typeitem') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Edition">Edition<% if (page.orderBy == 'Edition') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Isexposed">Isexposed<% if (page.orderBy == 'Isexposed') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Isoriginal">Isoriginal<% if (page.orderBy == 'Isoriginal') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Ispart">Ispart<% if (page.orderBy == 'Ispart') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Haspart">Haspart<% if (page.orderBy == 'Haspart') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Ispartof">Ispartof<% if (page.orderBy == 'Ispartof') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Numberofcopies">Numberofcopies<% if (page.orderBy == 'Numberofcopies') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Tobepublicin">Tobepublicin<% if (page.orderBy == 'Tobepublicin') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Creationdateattributed">Creationdateattributed<% if (page.orderBy == 'Creationdateattributed') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Itemdateattributed">Itemdateattributed<% if (page.orderBy == 'Itemdateattributed') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Publishdateattributed">Publishdateattributed<% if (page.orderBy == 'Publishdateattributed') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Serachdump">Serachdump<% if (page.orderBy == 'Serachdump') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
				<th id="header_Itemmediadir">Itemmediadir<% if (page.orderBy == 'Itemmediadir') { %> <i class='icon-arrow-<%= page.orderDesc ? 'up' : 'down' %>' /><% } %></th>
-->
			</tr>
		</thead>
		<tbody>
		<% items.each(function(item) { %>
			<tr id="<%= _.escape(item.get('iditem')) %>">
				<td><%= _.escape(item.get('iditem') || '') %></td>
				<td><%= _.escape(item.get('holder') || '') %></td>
				<td><%= _.escape(item.get('level') || '') %></td>
				<td><%= _.escape(item.get('institution') || '') %></td>
				<td><%= _.escape(item.get('inventoryid') || '') %></td>

				<td><%= _.escape(item.get('uritype') || '') %></td>
				<td><%= _.escape(item.get('uri') || '') %></td>
				<td><%= _.escape(item.get('keywords') || '') %></td>
				<td><%= _.escape(item.get('description') || '') %></td>
				<td><%= _.escape(item.get('uidtype') || '') %></td>
				<td><%= _.escape(item.get('uid') || '') %></td>
				<td><%= _.escape(item.get('class') || '') %></td>
				<td><%= _.escape(item.get('type') || '') %></td>
<!-- UNCOMMENT TO SHOW ADDITIONAL COLUMNS
                <td><%= _.escape(item.get('iseletronic') || '') %></td>
				<td><%= _.escape(item.get('creationdate') || '') %></td>
				<td><%= _.escape(item.get('acquisitiondate') || '') %></td>
				<td><%= _.escape(item.get('scopecontent') || '') %></td>
				<td><%= _.escape(item.get('originalexistence') || '') %></td>
				<td><%= _.escape(item.get('originallocation') || '') %></td>
				<td><%= _.escape(item.get('repositorycode') || '') %></td>
				<td><%= _.escape(item.get('copyexistence') || '') %></td>
				<td><%= _.escape(item.get('copylocation') || '') %></td>
				<td><%= _.escape(item.get('legalaccess') || '') %></td>
				<td><%= _.escape(item.get('accesscondition') || '') %></td>
				<td><%= _.escape(item.get('reproductionrights') || '') %></td>
				<td><%= _.escape(item.get('reproductionrightsdescription') || '') %></td>
				<td><%= _.escape(item.get('itemdate') || '') %></td>
				<td><%= _.escape(item.get('publishdate') || '') %></td>
				<td><%= _.escape(item.get('publisher') || '') %></td>
				<td><%= _.escape(item.get('itematributes') || '') %></td>
				<td><%= _.escape(item.get('ispublic') || '') %></td>
				<td><%= _.escape(item.get('preliminaryrule') || '') %></td>
				<td><%= _.escape(item.get('punctuation') || '') %></td>
				<td><%= _.escape(item.get('notes') || '') %></td>
				<td><%= _.escape(item.get('otherinformation') || '') %></td>
				<td><%= _.escape(item.get('idfather') || '') %></td>
				<td><%= _.escape(item.get('titledefault') || '') %></td>
				<td><%= _.escape(item.get('subitem') || '') %></td>
				<td><%= _.escape(item.get('deletecomfirm') || '') %></td>
				<td><%= _.escape(item.get('typeitem') || '') %></td>
				<td><%= _.escape(item.get('edition') || '') %></td>
				<td><%= _.escape(item.get('isexposed') || '') %></td>
				<td><%= _.escape(item.get('isoriginal') || '') %></td>
				<td><%= _.escape(item.get('ispart') || '') %></td>
				<td><%= _.escape(item.get('haspart') || '') %></td>
				<td><%= _.escape(item.get('ispartof') || '') %></td>
				<td><%= _.escape(item.get('numberofcopies') || '') %></td>
				<td><%if (item.get('tobepublicin')) { %><%= _date(app.parseDate(item.get('tobepublicin'))).format('MMM D, YYYY') %><% } else { %>NULL<% } %></td>
				<td><%= _.escape(item.get('creationdateattributed') || '') %></td>
				<td><%= _.escape(item.get('itemdateattributed') || '') %></td>
				<td><%= _.escape(item.get('publishdateattributed') || '') %></td>
				<td><%= _.escape(item.get('serachdump') || '') %></td>
				<td><%= _.escape(item.get('itemmediadir') || '') %></td>
-->
			</tr>
		<% }); %>
		</tbody>
		</table>

		<%=  view.getPaginationHtml(page) %>
	</script>

	<!-- underscore template for the model -->
	<script type="text/template" id="itemModelTemplate">
		<form class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div id="iditemInputContainer" class="control-group">
					<label class="control-label" for="iditem">Iditem</label>
					<div class="controls inline-inputs">
						<span class="input-xlarge uneditable-input" id="iditem"><%= _.escape(item.get('iditem') || '') %></span>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="holderInputContainer" class="control-group">
					<label class="control-label" for="holder">Holder</label>
					<div class="controls inline-inputs">
						<select id="holder" name="holder"></select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="levelInputContainer" class="control-group">
					<label class="control-label" for="level">Level</label>
					<div class="controls inline-inputs">
						<select id="level" name="level"></select>
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
				<div id="inventoryidInputContainer" class="control-group">
					<label class="control-label" for="inventoryid">Inventoryid</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="inventoryid" placeholder="Inventoryid" value="<%= _.escape(item.get('inventoryid') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="uritypeInputContainer" class="control-group">
					<label class="control-label" for="uritype">Uritype</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="uritype" placeholder="Uritype" value="<%= _.escape(item.get('uritype') || '') %>">
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
				<div id="keywordsInputContainer" class="control-group">
					<label class="control-label" for="keywords">Keywords</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="keywords" placeholder="Keywords" value="<%= _.escape(item.get('keywords') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="descriptionInputContainer" class="control-group">
					<label class="control-label" for="description">Description</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="description" rows="3"><%= _.escape(item.get('description') || '') %></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="uidtypeInputContainer" class="control-group">
					<label class="control-label" for="uidtype">Uidtype</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="uidtype" placeholder="Uidtype" value="<%= _.escape(item.get('uidtype') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="uidInputContainer" class="control-group">
					<label class="control-label" for="uid">Uid</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="uid" placeholder="Uid" value="<%= _.escape(item.get('uid') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="classInputContainer" class="control-group">
					<label class="control-label" for="class">Class</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="class" placeholder="Class" value="<%= _.escape(item.get('class') || '') %>">
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
				<div id="iseletronicInputContainer" class="control-group">
					<label class="control-label" for="iseletronic">Iseletronic</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="iseletronic" placeholder="Iseletronic" value="<%= _.escape(item.get('iseletronic') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="creationdateInputContainer" class="control-group">
					<label class="control-label" for="creationdate">Creationdate</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="creationdate" placeholder="Creationdate" value="<%= _.escape(item.get('creationdate') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="acquisitiondateInputContainer" class="control-group">
					<label class="control-label" for="acquisitiondate">Acquisitiondate</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="acquisitiondate" placeholder="Acquisitiondate" value="<%= _.escape(item.get('acquisitiondate') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="scopecontentInputContainer" class="control-group">
					<label class="control-label" for="scopecontent">Scopecontent</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="scopecontent" rows="3"><%= _.escape(item.get('scopecontent') || '') %></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="originalexistenceInputContainer" class="control-group">
					<label class="control-label" for="originalexistence">Originalexistence</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="originalexistence" placeholder="Originalexistence" value="<%= _.escape(item.get('originalexistence') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="originallocationInputContainer" class="control-group">
					<label class="control-label" for="originallocation">Originallocation</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="originallocation" placeholder="Originallocation" value="<%= _.escape(item.get('originallocation') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="repositorycodeInputContainer" class="control-group">
					<label class="control-label" for="repositorycode">Repositorycode</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="repositorycode" placeholder="Repositorycode" value="<%= _.escape(item.get('repositorycode') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="copyexistenceInputContainer" class="control-group">
					<label class="control-label" for="copyexistence">Copyexistence</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="copyexistence" placeholder="Copyexistence" value="<%= _.escape(item.get('copyexistence') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="copylocationInputContainer" class="control-group">
					<label class="control-label" for="copylocation">Copylocation</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="copylocation" placeholder="Copylocation" value="<%= _.escape(item.get('copylocation') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="legalaccessInputContainer" class="control-group">
					<label class="control-label" for="legalaccess">Legalaccess</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="legalaccess" placeholder="Legalaccess" value="<%= _.escape(item.get('legalaccess') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="accessconditionInputContainer" class="control-group">
					<label class="control-label" for="accesscondition">Accesscondition</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="accesscondition" placeholder="Accesscondition" value="<%= _.escape(item.get('accesscondition') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="reproductionrightsInputContainer" class="control-group">
					<label class="control-label" for="reproductionrights">Reproductionrights</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="reproductionrights" placeholder="Reproductionrights" value="<%= _.escape(item.get('reproductionrights') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="reproductionrightsdescriptionInputContainer" class="control-group">
					<label class="control-label" for="reproductionrightsdescription">Reproductionrightsdescription</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="reproductionrightsdescription" rows="3"><%= _.escape(item.get('reproductionrightsdescription') || '') %></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="itemdateInputContainer" class="control-group">
					<label class="control-label" for="itemdate">Itemdate</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="itemdate" placeholder="Itemdate" value="<%= _.escape(item.get('itemdate') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="publishdateInputContainer" class="control-group">
					<label class="control-label" for="publishdate">Publishdate</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="publishdate" placeholder="Publishdate" value="<%= _.escape(item.get('publishdate') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="publisherInputContainer" class="control-group">
					<label class="control-label" for="publisher">Publisher</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="publisher" placeholder="Publisher" value="<%= _.escape(item.get('publisher') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="itematributesInputContainer" class="control-group">
					<label class="control-label" for="itematributes">Itematributes</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="itematributes" rows="3"><%= _.escape(item.get('itematributes') || '') %></textarea>
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
				<div id="preliminaryruleInputContainer" class="control-group">
					<label class="control-label" for="preliminaryrule">Preliminaryrule</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="preliminaryrule" rows="3"><%= _.escape(item.get('preliminaryrule') || '') %></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="punctuationInputContainer" class="control-group">
					<label class="control-label" for="punctuation">Punctuation</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="punctuation" placeholder="Punctuation" value="<%= _.escape(item.get('punctuation') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="notesInputContainer" class="control-group">
					<label class="control-label" for="notes">Notes</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="notes" rows="3"><%= _.escape(item.get('notes') || '') %></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="otherinformationInputContainer" class="control-group">
					<label class="control-label" for="otherinformation">Otherinformation</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="otherinformation" rows="3"><%= _.escape(item.get('otherinformation') || '') %></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="idfatherInputContainer" class="control-group">
					<label class="control-label" for="idfather">Idfather</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="idfather" placeholder="Idfather" value="<%= _.escape(item.get('idfather') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="titledefaultInputContainer" class="control-group">
					<label class="control-label" for="titledefault">Titledefault</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="titledefault" placeholder="Titledefault" value="<%= _.escape(item.get('titledefault') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="subitemInputContainer" class="control-group">
					<label class="control-label" for="subitem">Subitem</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="subitem" placeholder="Subitem" value="<%= _.escape(item.get('subitem') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="deletecomfirmInputContainer" class="control-group">
					<label class="control-label" for="deletecomfirm">Deletecomfirm</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="deletecomfirm" placeholder="Deletecomfirm" value="<%= _.escape(item.get('deletecomfirm') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="typeitemInputContainer" class="control-group">
					<label class="control-label" for="typeitem">Typeitem</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="typeitem" placeholder="Typeitem" value="<%= _.escape(item.get('typeitem') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="editionInputContainer" class="control-group">
					<label class="control-label" for="edition">Edition</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="edition" placeholder="Edition" value="<%= _.escape(item.get('edition') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="isexposedInputContainer" class="control-group">
					<label class="control-label" for="isexposed">Isexposed</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="isexposed" placeholder="Isexposed" value="<%= _.escape(item.get('isexposed') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="isoriginalInputContainer" class="control-group">
					<label class="control-label" for="isoriginal">Isoriginal</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="isoriginal" placeholder="Isoriginal" value="<%= _.escape(item.get('isoriginal') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="ispartInputContainer" class="control-group">
					<label class="control-label" for="ispart">Ispart</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="ispart" placeholder="Ispart" value="<%= _.escape(item.get('ispart') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="haspartInputContainer" class="control-group">
					<label class="control-label" for="haspart">Haspart</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="haspart" placeholder="Haspart" value="<%= _.escape(item.get('haspart') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="ispartofInputContainer" class="control-group">
					<label class="control-label" for="ispartof">Ispartof</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="ispartof" placeholder="Ispartof" value="<%= _.escape(item.get('ispartof') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="numberofcopiesInputContainer" class="control-group">
					<label class="control-label" for="numberofcopies">Numberofcopies</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="numberofcopies" placeholder="Numberofcopies" value="<%= _.escape(item.get('numberofcopies') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="tobepublicinInputContainer" class="control-group">
					<label class="control-label" for="tobepublicin">Tobepublicin</label>
					<div class="controls inline-inputs">
						<div class="input-append date date-picker" data-date-format="yyyy-mm-dd">
							<input id="tobepublicin" type="text" value="<%= _date(app.parseDate(item.get('tobepublicin'))).format('YYYY-MM-DD') %>" />
							<span class="add-on"><i class="icon-calendar"></i></span>
						</div>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="creationdateattributedInputContainer" class="control-group">
					<label class="control-label" for="creationdateattributed">Creationdateattributed</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="creationdateattributed" placeholder="Creationdateattributed" value="<%= _.escape(item.get('creationdateattributed') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="itemdateattributedInputContainer" class="control-group">
					<label class="control-label" for="itemdateattributed">Itemdateattributed</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="itemdateattributed" placeholder="Itemdateattributed" value="<%= _.escape(item.get('itemdateattributed') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="publishdateattributedInputContainer" class="control-group">
					<label class="control-label" for="publishdateattributed">Publishdateattributed</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="publishdateattributed" placeholder="Publishdateattributed" value="<%= _.escape(item.get('publishdateattributed') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="serachdumpInputContainer" class="control-group">
					<label class="control-label" for="serachdump">Serachdump</label>
					<div class="controls inline-inputs">
						<textarea class="input-xlarge" id="serachdump" rows="3"><%= _.escape(item.get('serachdump') || '') %></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
				<div id="itemmediadirInputContainer" class="control-group">
					<label class="control-label" for="itemmediadir">Itemmediadir</label>
					<div class="controls inline-inputs">
						<input type="text" class="input-xlarge" id="itemmediadir" placeholder="Itemmediadir" value="<%= _.escape(item.get('itemmediadir') || '') %>">
						<span class="help-inline"></span>
					</div>
				</div>
			</fieldset>
		</form>

		<!-- delete button is is a separate form to prevent enter key from triggering a delete -->
		<form id="deleteItemButtonContainer" class="form-horizontal" onsubmit="return false;">
			<fieldset>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button id="deleteItemButton" class="btn btn-mini btn-danger"><i class="icon-trash icon-white"></i> Delete Item</button>
						<span id="confirmDeleteItemContainer" class="hide">
							<button id="cancelDeleteItemButton" class="btn btn-mini">Cancel</button>
							<button id="confirmDeleteItemButton" class="btn btn-mini btn-danger">Confirm</button>
						</span>
					</div>
				</div>
			</fieldset>
		</form>
	</script>

	<!-- modal edit dialog -->
	<div class="modal hide fade" id="itemDetailDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>
				<i class="icon-edit"></i> Edit Item
				<span id="modelLoader" class="loader progress progress-striped active"><span class="bar"></span></span>
			</h3>
		</div>
		<div class="modal-body">
			<div id="modelAlert"></div>
			<div id="itemModelContainer"></div>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" >Cancel</button>
			<button id="saveItemButton" class="btn btn-primary">Save Changes</button>
		</div>
	</div>

	<div id="collectionAlert"></div>
	
	<div id="itemCollectionContainer" class="collectionContainer">
	</div>

	<p id="newButtonContainer" class="buttonContainer">
		<button id="newItemButton" class="btn btn-primary">Add Item</button>
	</p>

</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
