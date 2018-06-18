<div id = "divDBMgmt" class = "ui container" style = "padding-top : 6rem;">
	<div class = "ui stackable equal width grid">
		<div class = "row">
			<div class = "eight wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Backup database</h5>

					<form id = "frmBackupDB" class = "ui small form">
						<div class = "field">
							<label>Save to:</label>
							<input type = "text" id = "txtBackupDBFileDir" name = "txtBackupDBFileDir" placeholder = "e.g. C:/path/to/selected/directory" required>
						</div>

						<div class = "field">
							<label>SQL file name:</label>
							<input type = "text" id = "txtBackupDBFileName" name = "txtBackupDBFileName" placeholder = "e.g. dump_20171108-1300" required>
						</div>

						<button type = "submit" id = "btnBackupDB" name = "btnBackupDB" class = "ui small secondary button">Backup</button>
					</form>

					<div class="ui fluid warning icon message">
						<i class="warning icon"></i>
						<div class="header">Heads up</div>
						<ul class = "list">
							<li>Please use '/' instead of '\' for your file directory.</li>
							<li>Do not include the file extension .sql anymore for your file name.</li>
						</ul>
					</div>
				</div>
			</div>

			<div class = "eight wide column">
				<div class = "ui small text segment">
					<h5 class = "ui header">Restore database</h5>
					<form action="../../process/restoreDB.php" method="POST" enctype="multipart/form-data" class = "ui small form">
						<div class = "field">
							<label>Database file (.sql):</label>
							<input type="file" accept=".sql" name="sql" id="sql" required/>
						</div>
						<button type="submit" name="restore" class = "ui small secondary button">Restore</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>