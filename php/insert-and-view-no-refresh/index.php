<!DOCTYPE html>
<html>
<head>
	<title>save and display data from DB without refresh</title>
	<link rel="stylesheet" href="includes/style.css">
	<script src="includes/jquery.min.js"></script>
	<script>
	$(function() {
		$("#posts").submit(function() {
			var txt = $("#txt").val();
			var title = $("#title").val();
			var dataString = 'txt=' + txt + '&title=' + title;//if txt is empty it will send empty string						
			
			$("#loader").show();
			$("#loader").fadeIn(300).html('<span class="loading">Loading..</span>');
			
			$.ajax({
				type: "POST",
				url: "action.php",
				data: dataString,
				cache: true,
				success: function(html){
					$("#loader").after(html);
					$("#loader").hide();
				}  
			});
			
			return false;
		});
	});
	</script>

</head>

<body>
	<div id="wrapper">	
		<form method="post" id="posts" action="">
			*Insert title: <input type="text" name="title" id="title" required><br>
			 Insert description: <textarea name="txt" id="txt" ></textarea><br>
			<input type="submit" value="Post Your Text" name="submit" class="btnSubmit">
		</form>
		<div id="loader"></div>
	</div>
</body>
</html>
