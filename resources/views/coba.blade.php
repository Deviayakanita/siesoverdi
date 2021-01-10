<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<div>
		<h3>devia cantik</h3>
		<h1>{{$coba1}}</h1>
		<ul>
			@foreach($coba2 as $coba2)
			<li>
				{{$coba2}}
			</li>
			@endforeach
		</ul>
	</div>
</body>
</html>