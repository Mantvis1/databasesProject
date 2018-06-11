<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Automobiliai</li>
</ul>
<div id="actions">
	<a href='index.php?module=<?php echo $module; ?>&action=create'>Naujas automobilis</a>
</div>
<div class="float-clear"></div>

<table class="listTable">
	<tr>
		<th>ID</th>
		<th>Valstybinis nr.</th>
		<th>Modelis</th>
		<th>Būsena</th>
		<th></th>
	</tr>
	<?php/*
		// suformuojame lentelę
		foreach($data as $key => $val) {
			echo
				"<tr>"
				. "</tr>";
		}*/
	?>
</table>

<?php
	include 'templates/paging.tpl.php';
?>