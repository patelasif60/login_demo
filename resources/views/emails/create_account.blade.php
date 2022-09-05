<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title></title>
</head>

<body style="padding: 0px; margin: 0px;" bgcolor="#eceef1">
<div id="mailsub">
	@if($type ==='employee')
		HI {{$data->first_name}} {{ $data->last_name}}. You employee account is in Created.<br/> You are choosing {{$data->company->name}} Comapny.
	@else
		HI {{$data->name}}. You company account is in Created.<br/>Your website name is {{$data->website}} and your Company Logo <br/><img src="{{$data->logo}}">.
 	@endif
</div>
</body>
</html>