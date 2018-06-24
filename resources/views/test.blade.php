<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <H1>Afinn sentiment Demo</H1>
    <p>Type here : <br>
        <textarea style="margin: 0px; width: 622px; height: 249px;" id="txt" ></textarea>
    </p>
<button id="butt">Calc</button>
<p id="score"></p>
<p id="comparative"></p>
<p id="wordlist"></p>

	<script src="{{asset('textmining/sketch.js')}}"></script>
    <script src="{{asset('textmining/p5.js')}}"></script>
    <script src="{{asset('textmining/p5.dom.js')}}"></script>
    <script src="{{asset('textmining/p5.sound.js')}}"></script>

</body>
</html>