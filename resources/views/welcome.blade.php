<h1>O my Laravel </h1>
<p>Here We are...</p>

<a href="/demoroute">first page</a>

<br>
{{-- here href name should be the route name i.e demoroute from web.php file not view file name i.e first.blade.php --}}


<a href="{{route('demo')}}">second page</a><br>
{{-- route's name demo is provided from the web page --}}
<p>News Links Here</p>
<a href="{{route('sports')}}">sports news</a><br>
<a href="{{route('international')}}">international news</a><br>
<a href="{{route('national')}}">national news</a><br>
