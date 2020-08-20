<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
		<div style = "width:50%;margin: 0 auto;border:1px solid red;">
			<form action = "{{ route('adminLogin')}}" method ="post">
				@csrf
				<input type="text" name="email">
				<input type="password" name="password">
				<button type="submit">Log in </button>
			</form>
			
		</div>
</body>
</html>