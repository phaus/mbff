<html><head><title>position</title>

</head><body bgcolor="#000000" text="#ffffff">

<?

	

$planetx=$HTTP_POST_VARS['sonne_x']-1;
$planety=$HTTP_POST_VARS['sonne_y']-1;

$x_anz=$HTTP_POST_VARS['x'];
$y_anz=$HTTP_POST_VARS['y'];

$temp_top=$HTTP_POST_VARS['top'];
$temp_left=$HTTP_POST_VARS['left'];

$planet_top=$planety*40-15+$temp_top;
$planet_left=$planetx*80+18+$temp_left;


for($y_zaehler=1;$y_zaehler<=$y_anz;$y_zaehler++)
{
	$temp_left=$HTTP_POST_VARS['left'];

	for($x_zaehler=1;$x_zaehler<=$x_anz;$x_zaehler++)
	{
	echo "<div style=\"position:absolute; top: $temp_top; left: $temp_left; z-index:1;\">";
	echo "<img src=\"square.gif\" width=\"82\" height=\"41\" alt=\"square\" border=\"0\">";
	echo "</div>";

	$temp_left=$temp_left+80;
	}

$temp_top=$temp_top+40;

echo "<div style=\"position:absolute; top: $planet_top; left: $planet_left; z-index:2;\">";
echo "<img src=\"sonne.gif\" width=\"45\" height=\"45\" alt=\"sonne\" border=\"0\">";
echo "</div>";
}
?>
	

</body></html>