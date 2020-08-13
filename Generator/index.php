<html ng-app="myApp">
<head>
	<meta charset="utf-8">

	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Dashboard Generate</title>

	<link href="style.css" rel="stylesheet">
	<script src="./js/jquery.min.js"></script>
	<script src="./js/angular.min.js"></script>
	<script>angular.module("myApp", []);</script>
	<script src="generater.js"></script>
	<style type="text/css">
		.no-skin .nav-list>li>a {
			white-space: nowrap;
			text-overflow: ellipsis;
			overflow: hidden;
		}
		body{max-width: 1440px;}
	</style>
</head>
<body class="no-skin" ng-controller="generateAll">
	<div style="width: 20%;margin-top: 50px;float: left;">
		<fieldset class="">
			<legend class="bg-primary" style="margin: 0;">
				<svg width="1.5rem" height="1.5rem" viewBox="0 0 16 16" class="bi bi-award" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" d="M9.669.864L8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193l-1.51-.229L8 1.126l-1.355.702-1.51.229-.684 1.365-1.086 1.072L3.614 6l-.25 1.506 1.087 1.072.684 1.365 1.51.229L8 10.874l1.356-.702 1.509-.229.684-1.365 1.086-1.072L12.387 6l.248-1.506-1.086-1.072-.684-1.365z"/>
					<path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z"/>
				</svg> Generator
			</legend>
			<nav>
				<ul style="margin: 0;">
					<li ng-repeat="table in tableList | filter: findTable" class="">
						<a href="javascript:0;" ng-click="setTable(table);" title='{{ table.TABLE_COMMENT ? table.TABLE_NAME+" ("+table.TABLE_COMMENT+")" : table.TABLE_NAME }}'>
							 {{table.TABLE_NAME}} {{ table.TABLE_COMMENT ? " ("+table.TABLE_COMMENT+")" : "" }}
						</a>
					</li>
				</ul>
			</nav>
		</fieldset>
	</div>

	<div style="width: 80%;margin-top: 50px;float: left;" ng-show="tableInstance">
		<fieldset class="">
			<legend style="margin: 0;">
				{{ tableInstance.TABLE_COMMENT ? tableInstance.TABLE_COMMENT : tableInstance.TABLE_NAME }}
				<small>{{ tableInstance.TABLE_NAME }}</small>
			</legend>
			

			<div class="text-center" ng-show="!foderInstance">
				<button class="btn btn-warning btn-lg mx-auto" ng-click="createForder(tableInstance);">สร้างโฟลเดอร์ 
					{{ tableInstance.TABLE_NAME }} {{ tableInstance.TABLE_COMMENT ? " ("+tableInstance.TABLE_COMMENT+")" : "" }}
				</button>
			</div>
			<table border="1" width="100%" ng-show="foderInstance">
				<thead class="text-danger">
					<th>Function</th>
					<th>Filename</th>
					<th>Path</th>
					<th class="text-center"><i class="material-icons">settings</i></th>
					<!-- <th>Salary</th> -->
				</thead>
				<tbody>

					<tr ng-repeat="fileInstance in functioninstance" onmouseover="this.style.background='antiquewhite';" onmouseout="this.style.background='none';"> 
						<!-- Function -->
						<td>{{ fileInstance.path }} {{ fileInstance.file }} 
							{{ tableInstance.TABLE_COMMENT ? tableInstance.TABLE_COMMENT : tableInstance.TABLE_NAME }}
							{{ fileInstance.suc }}
						</td>

						<!-- Filename -->
						<td>{{ fileInstance.file }}</td>
						
						<!-- Path -->
						<td>

							{ROOT_PROJECT} / app / {{ tableInstance.TABLE_NAME }} / {{ fileInstance.path }} 
							/ {{ fileInstance.file }}

						</td>

						<!-- button -->
						<td align="center">
							<button ng-show="foderInstance.indexOf(fileInstance.file)<0" class="btn btn-info btn-xs" ng-click="createFile(tableInstance, fileInstance);setTable(tableInstance);">
								Genedate File
							</button>

							<button ng-show="foderInstance.indexOf(fileInstance.file)>=0" class="btn {{btncon ? '' : 'btn-warning'}} btn-xs" ng-click="btncon=true;" ng-disabled="btncon">
								Overwrite File
							</button>

							<div class="btn-group" role="group" aria-label="Basic example" ng-show="btncon">
								<button type="button" class="btn btn-danger" ng-click="createFile(tableInstance, fileInstance);setTable(tableInstance);btncon=false;">Yes</button>
								<button type="button" class="btn btn-secondary" ng-click="btncon=false;">no</button>
							</div>
						</td>
					</tr>

				</tbody>
			</table>

		</fieldset>
	</div>

</body>
</html>
