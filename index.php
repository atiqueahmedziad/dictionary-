<?php
?>
<html>
<head>
<script type="text/javascript">underscore-min.js</script>
<script type="text/javascript">jquery-1.11.1.js</script>
<script>
$.getJSON("js/data/test.json").done(function(res){
	var id=0;

	words = _.chain(res)
	.map(function(meaning, word){
		console.log('started '+word);

		var startDate = new Date();
		var totalCommas = meaning.match(/,/g).length;
		console.log('commas '+totalCommas);

		//fix ,,,, problem
		_.times(totalCommas, function(){
			meaning = meaning.replace(",,", ",\"\",");
		});

		//fix [, problem
		meaning = meaning.replace("[,", "[\"\",");

		meaning = JSON.parse(meaning);

		var endDate = new Date();
		var timeTook = endDate - startDate ;
		console.log("completed "+word + " in "+ timeTook + " mili seconds");

		return meaning.name = word, meaning.id=id++, meaning;
	}).toArray().value();
});
</script>
</head>
<body>
</body>
</html>
<?
?>
