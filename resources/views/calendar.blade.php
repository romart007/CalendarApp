<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title></title>

	<script src="{{ asset('js/app.js') }}" defer></script>
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

<div id="app" class="container-fluid">
	<!-- <div class="col-md-5">
		<event-form></event-form>
	</div>
	<div class="col-md-7">
		<event-list @update-calendar="updateCalendar()"></event-list>
	</div> -->

	<calendar></calendar>
</div>

</body>
</html>