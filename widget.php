<?php
require('layout/header.php');
?>
<div class="container widget">
	<section>
		<h1 class="title"></h1>
		<h2 class="subtitle"></h2>
		<div class="imgWrap"></div>
		<div class="description"></div>
		<form id="businessSearch">
			<input type="text" placeholder="Search business by keyword">
			<button>Search</button>
            <div class="clear"></div>
		</form>
        <a href="http://local.sj-r.com/#add_business">Add Your business here &#43;</a>
        <a href="http://www.wesgabbard.com">More attractions &gt;</a>
	</section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
$(document).ready(function(){ 
	$.ajax({
        type: 'GET',
        url: 'http://widget.local.sj-r.com/widget/json/featured_business_list', 
        data: {
        include_ads: '1',
        limit: '1',
        level: '1'
        },
        dataType: 'jsonp'
    }).done(function(data){
        console.log(data);
        var business = data[0];
        var compName = business.name;
        var cat = business.category;
        var img = business.image;
        var imgSplit = img.split('>');
        var imgUrl = imgSplit[0];
        var desc = business.description;
        var link = business.link;
        $('.title').text(compName);
        $('.subtitle').html('<a href="'+link+'">'+cat+'</a>');
        $('.imgWrap').html('<img src='+imgUrl+'%3E.jpg />');
        $('.description').html(desc);

    });
});
</script>
<?php
require('layout/footer.php');
?>