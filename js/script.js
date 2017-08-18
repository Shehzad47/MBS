$(function() {

	$('#msg_post').click(function() {

		var content = $('#post_content').val();
		content = content.replace(/\n/g, '<br>');		// alert(content);

		if (content.length > 0) {
			$("#post_content").val("");
			$("#new_post_content").text(content);
			$.ajax({

				type : 'POST',
				url  : 'update.php',
				data: ({content: content , act: "upload-post"}),
				success : function()
				{
					$.ajax({

						type : 'GET',
						url  : 'post.php',
						success : function(res)
						{
							$('#post-area').html(res) ;
							$('#post-area div:first-child').addClass('w3-animate-opacity');
							// select_ca();
						},
						fail : function(err)
						{
							console.log(err);
						}
					}); //End of Inner -Ajax
				}
			}); //End of Ajax

		}

	});



	function select_ts(){
		var y = $(".ts");
		for (var i = 0; i < y.length; i++) {
			var ts_id = y[i].id;
			update_ts(ts_id);
		}
	}
	setInterval(function(){select_ts();}, 60000);


	function select_ca(){
		var y = $(".ca");
		for (var i = 0; i < y.length; i++) {
			var ca_id = y[i].id;
			update_ca(ca_id);
		}
	}
	// select_ca();
}); //End Of Document Ready Function


$(document).on('click','.deleteButton',function(){
	var id= Number( $(this).attr('id').match(/\d+/) );

	var post_id = id;
	var post = "#post_"+id;

	$(post).fadeOut(300, function() {
		$.ajax({
			type : 'POST',
			url  : 'update.php',
			data: ({id : post_id, act : "rem-post"}),
			success : function()
			{
				$.ajax({
					type : 'GET',
					url  : 'post.php',
					success : function(res)
					{
						$('#post-area').html(res) ;
					}
				}); //End of Inner Ajax
			}
		}); //End of Ajax
	});
});

$(document).on('click','.addCmnt',function(){
	var id= Number( $(this).siblings('i.like').attr('id').match(/\d+/) );
	$("#comment_box_"+id).focus();
});

$(document).on('click','.delC',function(){

	var id= Number( $(this).attr('id').match(/\d+/) );
	var cmnt = "#comment_"+id;

	$(cmnt).fadeOut(300, function() {
		$.ajax({
			type : 'GET',
			url  : 'update.php?act=rem_comment&id='+id,
			success : function()
			{
				update_ca($(cmnt).parent().attr('id'));
			}
		}); //End of Ajax
	});
});


$(document).on('keydown','.addComment',function(e){
	var id = $(this).attr('id').match(/\d+/);
	var p_id = Number(id);
	var comment_box = '#comment_box_'+id;
	var content = $(comment_box).text();

	if (e.which === 13 && e.shiftKey !== true) {

		content = content.replace(/\s\s+/g, ' ').replace(/\n/g, '<br>');
		if (content.length > 0  ) {

			$.ajax({

				type : 'POST',
				url  : 'update.php',
				data: ({
					content: content,
					id: p_id,
					act: "add_cmnt"
				}),
				success : function()
				{
					update_ca("comment_area_"+id, true);
				}
			}); //End of Ajax
		}
		return false;
	}
});

$(document).on('click','.like',function(){
		// alert($(this).text());
	var id= Number( $(this).attr('id').match(/\d+/) );
	if ($(this).hasClass('comment')) {
		var like_area = "#cla_"+id;
		var operand = "comment";
		var cmt = $(this);
		// if ($(this).text() == "Like") $(this).text("Unlike");
		// else $(this).text("Like") ;
	}
	if ($(this).hasClass('post')) {
		var operand = "post";
		var like_area = "#pla_"+id;
		if ($(this).hasClass('w3-text-theme')) {
			$(this).removeClass('w3-text-theme');
			$(this).addClass('w3-text-grey');
		}
		else {
			$(this).removeClass('w3-text-grey');
			$(this).addClass('w3-text-theme');
		}
	}
	// alert(like_area);
		$.ajax({

			type : 'POST',
			url  : 'update.php',
			data: ({
				id : id,
				operand : operand,
				act : "add_like"
			}),
			success : function()
			{
				$(like_area).load(location.href + " "+like_area);
				if (cmt) {
					if (cmt.text() == "Like") cmt.text("Unlike");
					else cmt.text("Like") ;
				}
			}
		}); //End of Ajax
	// });
});


function update_ts(ts_id){
	if (ts_id.charAt(0) == 'p') {
		var id = ts_id.match(/\d+/);
		ts_id = "#"+ts_id;
		var url = 'update.php?act=update_ts&ts=p&id='+id ;
	}
	if (ts_id.charAt(0) == 'c') {
		var id = ts_id.match(/\d+/);
		ts_id = "#"+ts_id;
		var url = 'update.php?act=update_ts&ts=c&id='+id ;
	}
	$.ajax({

		type : 'GET',
		url  : url,
		success : function(res)
		{
			$(ts_id).html(res) ;
		}
	}); //End of Ajax
}

function update_ca(ca_id, focused = false){
	var id = Number(ca_id.match(/\d+/));

	ca_id = "#"+ca_id;
	$.ajax({

		type : 'POST',
		url  : 'update.php',
		data: ({
			id: id,
			act: "update_ca"
		}),

		success : function(res)
		{
			$(ca_id).html(res) ;
			if (focused == true) $("#comment_box_"+id).focus();
		}
	}); //End of Ajax
}



