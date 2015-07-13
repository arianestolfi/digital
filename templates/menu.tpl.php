<div id="menucodigo">revistas</div>

<div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="./">DIGITAL</a>
                <div class="nav-collapse collapse">
                    <ul class="nav">
                    </ul>

                    <ul class="nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Geográficos<b class="caret"></b></a>

                            <ul class="dropdown-menu">
                                <li <?php if ($this->nav=='addresses') { echo 'class="active"'; } ?>><a href="./addresses">Addresses</a></li>
                                <li <?php if ($this->nav=='cities') { echo 'class="active"'; } ?>><a href="./cities">Cities</a></li>
                                <li <?php if ($this->nav=='countries') { echo 'class="active"'; } ?>><a href="./countries">Countries</a></li>
                                <li <?php if ($this->nav=='placelocations') { echo 'class="active"'; } ?>><a href="./placelocations">PlaceLocations</a></li>
                                <li <?php if ($this->nav=='states') { echo 'class="active"'; } ?>><a href="./states">States</a></li>
                                <li <?php if ($this->nav=='timezoneses') { echo 'class="active"'; } ?>><a href="./timezoneses">Timezoneses</a></li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pessoas<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li <?php if ($this->nav=='contacts') { echo 'class="active"'; } ?>><a href="./contacts">Contacts</a></li>
                                <li <?php if ($this->nav=='creators') { echo 'class="active"'; } ?>><a href="./creators">Creators</a></li>
                                <li <?php if ($this->nav=='creatorawardhonours') { echo 'class="active"'; } ?>><a href="./creatorawardhonours">CreatorAwardHonours</a></li>
                                <li <?php if ($this->nav=='creatorcontacts') { echo 'class="active"'; } ?>><a href="./creatorcontacts">CreatorContacts</a></li>
                                <li <?php if ($this->nav=='creatorhistories') { echo 'class="active"'; } ?>><a href="./creatorhistories">CreatorHistories</a></li>
                                <li <?php if ($this->nav=='creatorreferences') { echo 'class="active"'; } ?>><a href="./creatorreferences">CreatorReferences</a></li>
                                <li <?php if ($this->nav=='creatornames') { echo 'class="active"'; } ?>><a href="./creatornames">Creatornames</a></li>
                                <li <?php if ($this->nav=='holders') { echo 'class="active"'; } ?>><a href="./holders">Holders</a></li>
                                <li <?php if ($this->nav=='roles') { echo 'class="active"'; } ?>><a href="./roles">Roles</a></li>
                                <li <?php if ($this->nav=='users') { echo 'class="active"'; } ?>><a href="./users">Users</a></li>
                                <li <?php if ($this->nav=='userroles') { echo 'class="active"'; } ?>><a href="./userroles">Userroles</a></li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Globais<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li <?php if ($this->nav=='institutions') { echo 'class="active"'; } ?>><a href="./institutions">Institutions</a></li>
                                <li <?php if ($this->nav=='fonds') { echo 'class="active"'; } ?>><a href="./fonds">Fonds</a></li>
                                <li <?php if ($this->nav=='fondlevels') { echo 'class="active"'; } ?>><a href="./fondlevels">FondLevels</a></li>
                                <li <?php if ($this->nav=='institutionmedias') { echo 'class="active"'; } ?>><a href="./institutionmedias">InstitutionMedias</a></li>
                                <li <?php if ($this->nav=='levels') { echo 'class="active"'; } ?>><a href="./levels">Levels</a></li>
                                <li <?php if ($this->nav=='infobjectfonds') { echo 'class="active"'; } ?>><a href="./infobjectfonds">Infobjectfonds</a></li>

                            </ul>
                        </li>
                    </ul>
                    <ul class="nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Exposições<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li <?php if ($this->nav=='expoitems') { echo 'class="active"'; } ?>><a href="./expoitems">Expoitems</a></li>
                                <li <?php if ($this->nav=='expositions') { echo 'class="active"'; } ?>><a href="./expositions">Expositions</a></li>
                                <li <?php if ($this->nav=='expositioncreators') { echo 'class="active"'; } ?>><a href="./expositioncreators">ExpositionCreators</a></li>
                                <li <?php if ($this->nav=='expositiondimensions') { echo 'class="active"'; } ?>><a href="./expositiondimensions">ExpositionDimensions</a></li>
                                <li <?php if ($this->nav=='expositionhistories') { echo 'class="active"'; } ?>><a href="./expositionhistories">ExpositionHistories</a></li>
                                <li <?php if ($this->nav=='expositionplacelocations') { echo 'class="active"'; } ?>><a href="./expositionplacelocations">ExpositionPlacelocations</a></li>
                                <li <?php if ($this->nav=='expositionreferences') { echo 'class="active"'; } ?>><a href="./expositionreferences">ExpositionReferences</a></li>
                            </ul>
                        </li>
                    </ul>
                    
                    
 <!--                   <ul class="nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Items<b class="caret"></b></a>
                            <ul class="dropdown-menu">

                            </ul>
                        </li>
                    </ul>-->
                    
                    <ul class="nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Items <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li <?php if ($this->nav=='items') { echo 'class="active"'; } ?>><a href="./items">Items</a></li>
                                <li <?php if ($this->nav=='medias') { echo 'class="active"'; } ?>><a href="./medias">Medias</a></li>
                                <li <?php if ($this->nav=='itemmedias') { echo 'class="active"'; } ?>><a href="./itemmedias">ItemMedias</a></li>
                                <li <?php if ($this->nav=='dimensions') { echo 'class="active"'; } ?>><a href="./dimensions">Dimensions</a></li>
                                <li <?php if ($this->nav=='documentations') { echo 'class="active"'; } ?>><a href="./documentations">Documentations</a></li>
                                <li <?php if ($this->nav=='documentationmedias') { echo 'class="active"'; } ?>><a href="./documentationmedias">DocumentationMedias</a></li>
                                <li <?php if ($this->nav=='histories') { echo 'class="active"'; } ?>><a href="./histories">Histories</a></li>
                                <li <?php if ($this->nav=='historymedias') { echo 'class="active"'; } ?>><a href="./historymedias">HistoryMedias</a></li>
                                <li <?php if ($this->nav=='itemcreators') { echo 'class="active"'; } ?>><a href="./itemcreators">Itemcreators</a></li>
                                <li <?php if ($this->nav=='itemdescriptions') { echo 'class="active"'; } ?>><a href="./itemdescriptions">Itemdescriptions</a></li>
                                <li <?php if ($this->nav=='itemdimensions') { echo 'class="active"'; } ?>><a href="./itemdimensions">Itemdimensions</a></li>
                                <li <?php if ($this->nav=='iteminscriptions') { echo 'class="active"'; } ?>><a href="./iteminscriptions">Iteminscriptions</a></li>
                                <li <?php if ($this->nav=='ncontacts') { echo 'class="active"'; } ?>><a href="./ncontacts">Ncontacts</a></li>
                                <li <?php if ($this->nav=='nhistories') { echo 'class="active"'; } ?>><a href="./nhistories">Nhistories</a></li>
                                <li <?php if ($this->nav=='nreferences') { echo 'class="active"'; } ?>><a href="./nreferences">Nreferences</a></li>
                                <li <?php if ($this->nav=='physicaldescriptions') { echo 'class="active"'; } ?>><a href="./physicaldescriptions">Physicaldescriptions</a></li>
                                <li <?php if ($this->nav=='references') { echo 'class="active"'; } ?>><a href="./references">References</a></li>
                                <li <?php if ($this->nav=='referencemedias') { echo 'class="active"'; } ?>><a href="./referencemedias">ReferenceMedias</a></li>
                                <li <?php if ($this->nav=='searches') { echo 'class="active"'; } ?>><a href="./searches">Searches</a></li>
                                <li <?php if ($this->nav=='storages') { echo 'class="active"'; } ?>><a href="./storages">Storages</a></li>
                                <li <?php if ($this->nav=='storagemedias') { echo 'class="active"'; } ?>><a href="./storagemedias">StorageMedias</a></li>
                                <li <?php if ($this->nav=='titles') { echo 'class="active"'; } ?>><a href="./titles">Titles</a></li>
                                <li <?php if ($this->nav=='transcriptions') { echo 'class="active"'; } ?>><a href="./transcriptions">Transcriptions</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav pull-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-lock"></i> Login <i class="caret"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="./loginform">Login</a></li>
                                <li class="divider"></li>
                                <li><a href="./secureuser">Example User Page <i class="icon-lock"></i></a></li>
                                <li><a href="./secureadmin">Example Admin Page <i class="icon-lock"></i></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </div>
    </div>