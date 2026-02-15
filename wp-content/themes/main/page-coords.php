<html>
<head>
<script>
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
const place = urlParams.get('place').trim();
const coords = urlParams.get('coords').trim();
const mapUrl = 'https://www.google.com/maps/place/' + encodeURIComponent(place) + '/@' + coords + ',17z/';
window.location.replace(mapUrl);
</script>
</head>
<body></body>
</html>
