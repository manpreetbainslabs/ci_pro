<html>
<head>
	<title>Temp convert</title>
</head>
<body>
 	<?php echo form_open('tempconvert/convert'); ?>
 	<table cellpadding="2" cellspacing='2' border="0">
 		<tr>
	 		<td>Temp</td>
	 		<td><input type="text" name="temp" value=""></td>
 		</tr>
 		<tr>
	 		<td>Type</td>
	 		<td><input type="radio" name="ctype" value="ctof">C to F <br><input type="radio" name="ctype" value="ftoc">F to C <br></td>
 		</tr>
 		<tr>
	 		<td>Result</td>
	 		<td><?php echo isset($result) ? $result : ''; ?></td>
 		</tr>
 		<tr>
	 		<td>&nbsp</td>
	 		<td><input type="submit" value="Submit"></td>
 		</tr>

 	</table>
 	<?php echo form_close(); ?>
</body>
</html>
