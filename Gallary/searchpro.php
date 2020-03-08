<?php
include('connection.php');
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($con, $_POST["query"]);
	$query = /* "call search('".$search."')";*/
	"SELECT * FROM upload 
	WHERE imagename LIKE '%".$search."%' ";
}
else
{
	$query = "
	SELECT * FROM upload ORDER BY upload_id";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th></th>
							
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output ?> .= '<img class="i" src="data:image/jpeg;base64,<?php echo base64_encode($row['image']) ?>">
		';
    <?php
    }
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>
<style>
.i{
width:200px;


}

</style>