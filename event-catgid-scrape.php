<?php
/*
@Notes, this script makes a curl req/res to the calendar cat, loads the html into memory
then jQuery scrapes the event listings, adds css classes, and renders to the browser.
**********
@Compatibily, this script only works for sites that are on Module Version 2.0
**********
@Support, this script is currently runs in "UNSUPPORTED" mode.
**********
*/

//CURL SETTINGS
$session = curl_init();
curl_setopt($session, CURLOPT_URL, 'http://business.fwchamber.org/events/catgid/6?template=0');
curl_setopt($session, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($session, CURLOPT_HTTPGET, 1);
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_HTTPHEADER, array('Accept: text/html', 'Content-Type: text/html'));
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
curl_setopt($session, CURLOPT_SSL_VERIFYPEER, false);

//CURL REQUEST AND RESPONSE
$response = curl_exec($session);
curl_close($session);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Page Title Here</title>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var curl = $("div#cm_events_list fieldset div table tbody").html();
		$("#pre").html('<table class="row-table">'+curl+'</table>');
		$("#pre tr").attr("class", "row-item");
	});
</script>

<style>
table.row-table {
	width: 100%;
	background-color: #f4f4f4;
}

td {
	padding: 5px;
	border-bottom: 1px dashed #444;
}
</style>
</head>
<body>
	<div id="pre"><?= $response; ?></div>
</body>
</html>