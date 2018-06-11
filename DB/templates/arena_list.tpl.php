<ul id="pagePath">
	<li><a href="index.php">Pradžia</a></li>
	<li>Sutartys</li>
</ul>
<table class="listTable">
    <tr>
        <th>Nr.</th>
        <th>Pavadinimas</th>
        <th>Talpa</th>
    </tr>
    <?php
        foreach ($data as $key => $value){
            echo 
            "<tr>"
            ."<td>{$value['id']}</td>"
            ."</tr>";
        }
    ?>
    
    <?php
    	include 'templates/paging.tpl.php';
    ?>
</table>