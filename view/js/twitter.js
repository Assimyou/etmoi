var twitter = function(){
	var t = $("#twitter");
	var hashtag = t.attr('data-tag');
	console.log(hashtag);

	var call = function(){
		$.post("ajax.php?twitter="+hashtag, function(data){
	        	var output = '';
	        	console.log(data)
	        	for (var i=0; i<data.statuses.length; i++) {
	        		var item = data.statuses[i];
	        		console.log(item);
		        	output += '<div class="comment group">'+
						'<figure><img src="'+item.user.profile_image_url+'" alt="'+item.user.name+'" /></figure>'+
						'<article>'+
							'<div class="date"></div>'+
							'<h2><a href="#">'+item.user.name+'</a></h2>'+
							'<div class="text">'+item.text+'</div>'+
						'</article>'+
					'</div>';
				};

				t.html(output);
	        },"json"
	    );
	}

	call();
	setInterval(call, 30000);
};

addLoadEvent(twitter);