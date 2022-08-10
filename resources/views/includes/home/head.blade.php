<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!--fonts-->
		<link
			href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
			rel="stylesheet"
		/>
		<link
			href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&family=Montserrat:wght@100;200;300;400;500;600&display=swap"
			rel="stylesheet"
		/>
		<!-- font awesome -->
		<link
			rel="stylesheet"
			href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
			integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
			crossorigin="anonymous"
			referrerpolicy="no-referrer"
		/>

		<!--bootstrap-->
		<link rel="stylesheet" href="{{ asset('homeAssets/assets/css/bootstrap.css') }}" />
		<!-- css file -->
		<link rel="stylesheet" href="{{ asset('homeAssets/assets/css/main.css') }}" />
        @yield('css')
		<link rel="stylesheet" href="{{ asset('homeAssets/assets/css/responsive.css') }}" />


		<title>{{config('app.name')}}</title>
	</head>
