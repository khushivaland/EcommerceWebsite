
<div class="container">	
	<h2>Create Ajax Pagination with PHP and MySQL</h2>
	<?php
	$per_page = 5;
	$sql = "SELECT * FROM `products`";
	$result = mysqli_query($mysqli, $sql);
	$count = mysqli_num_rows($result);
	$pages = ceil($count/$per_page)
	?>		
	<div id="content_container"></div>
	<div class="pagination">
		<ul id="paginate">
			<?php		
			for($i=1; $i<=$pages; $i++)	{
				echo '<li id="'.$i.'">'.$i.'</li>';
			}
			?>
		</ul>
	</div>
</div>