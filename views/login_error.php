

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, 
								initial-scale=1.0" />
	<link rel="stylesheet" href=
"https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: "poppins";
		}

		.bg_img {
			background: url(
'https://media.geeksforgeeks.org/wp-content/uploads/20240226131034/2142357.jpg');
			height: 400px;
			width: 100%;
			background-repeat: no-repeat;
			background-position: center;
			background-size: contain;
		}
	</style>
	<title>Document</title>
</head>

<body>
	<section class="py-5">
		<div class="d-flex justify-content-center 
					align-items-center flex-column 
					text-center w-100">
			<div class="bg_img w-50">
			</div>
			<div>
				<p class="display-4">You can't login please login with correct password</p>
				<a href="/users/login"
				class="text-white text-decoration-none px-4 py-3 
						bg-success d-inline-block mt-2 rounded">
					Login again
				</a>
			</div>
		</div>
	</section>
</body>

</html>
