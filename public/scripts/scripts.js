$(document).ready(function() {
	$('.hoverable').mouseenter(function() {
		var id_elem = $(this).data('id-elem');
    var id = $(this).data(id_elem);
		$('.hoverable').each(function() {
			if ($(this).data(id_elem) == id) {
        $(this).addClass('selected');
			}
		});
	});

	$('.hoverable').mouseleave(function() {
		var id_elem = $(this).data('id-elem');
    var id = $(this).data(id_elem);
		$('.hoverable').each(function() {
			if ($(this).data(id_elem) == id) {
				$(this).removeClass('selected');
			}
		});
	});

	bindSelectableCards();
	bindRemoteActions();	
	$('.selectable').bind("contentchange", bindSelectableCards);

	$('.search').submit(function(e) {
		e.preventDefault();
		var obj = this;
		var myData = Object();
		var params = $(this).find('input[name=search_params]').val().split(" ");
		for (var i in params) {
			var split = params[i].split('-');
			myData[split[0]] = split[1];
		}

		if ($(this).hasClass('search-users')) {
			var searchType = 'user';
		} else if ($(this).hasClass('search-teams')) {
			var searchType = 'team';
		} else {
			var searchType = 'user';
		}	
		
		$.ajax({
			url: "/" + searchType + "/search/" + $(this).find('input[name=search]').val(),
			data: myData,
			type: "GET",
			dataType: "html",
			success: function(data) {
				$(obj).nextAll('.results:first').html(data).trigger('contentchange');
			}
		});

	});

	bindSelectableButtons();		
	
	$('.unread').click(function() {
		var obj = this;
		var id = $(obj).data('nid');
		$.ajax({
			type: "POST",
			url: "/notification/"+id+"/mark",
			dataType: "json",
			success: function(data) {
				if (!data.status) {
					$(obj).removeClass('unread').addClass('read');
				}
			}, 
			error: function(jqxhr) {
				console.log(jqxhr);
			}
		});
	});
		
});

function bindRemoteActions() { //TODO refactor for more general case
	$('.remoteAction').unbind('click');
	$('.remoteAction').click(function() {
		var obj = this;

		$.ajax({
			url: $(this).data('remote-url'),
			dataType: "json",
			method: "POST",
			data: {
				user_id: $(this).data('user-id'),
				role_id: $(this).data('role-id')
			},
			success: function(data) {
				if (data.status) {
					return false;
				}
				
				bindRemoteCallback(obj);
			},
			error: function(jqxhr) {
				alert("There was an error! " + jqxhr.responseJSON.error.message);
        console.log(jqxhr);
				// TODO handle	
			}
		});
	});
}

function bindSelectableButtons() {
	$('.selectMany').unbind('click');
	$('.selectMany').click(function() {
		var obj = this;
		var selected = $(obj).prevAll('.selectable:first').find('.selected');
		var result = gatherSelected(selected);

		if (result.length < 1) {
			$(obj).nextAll('.error:first').show('fast').html("You must select at least one");
			return;
		} else {
			$(obj).nextAll('.error:first').hide('fast').html("");
		}

		selectManyAction(selected, obj);
	});

	$('button.selectOne').unbind('click');
	$('button.selectOne').click(function() {
		var obj = this;
		if ($(this).parent().hasClass('pure-control-panel')) {
			var selected = $(obj).parent().prevAll('.selectable:first').find('.selected');
		} else {
			var selected = $(obj).prevAll('.selectable:first').find('.selected');
		}
		var result = gatherSelected(selected);
		$(this).next('.error').hide('fast').html("");
		if (result.length > 1) {
			$(this).next('.error').show('fast').html("You can only select one entity");
			return;
		}
		if (result.length == 0) {
			$(this).next('.error').show('fast').html('You must select someone');
			return;
		}
		selectOneAction(selected, obj);

	});

}
function dispError(obj, message) {
	$(obj).nextAll('.error:first').show('fast').html(message);
}
function bindSelectableCards() {
	$('.selectable').find('.pure-card').unbind('click');
	$('.selectable').find('.pure-card').click(function() {
		if ($(this).hasClass('selected')) {
			$(this).removeClass('selected');
		} else {
			if ($(this).parents('.selectable:first').hasClass('selectOne')) {
				deselect($(this).parents('.selectable:first').find('.pure-card'));
			}
			$(this).addClass('selected');
		}
	});
}

function deselect(loc) {
	loc.each(function(i) {
		if ($(loc[i]).hasClass('selected')) {
			$(loc[i]).removeClass('selected');
		}
	});
}

function gatherSelected(loc) {
	var result = Array();
	loc.each(function(i) {
		result.push(getId($(loc[i]).attr('class').split(" ")));
	});
	return result;

}

function getId(arr) {
	for ( var i in arr) {
		if (arr[i].substring(1,3) == 'id') {
			return (arr[i].substring(3, arr[i].length))
		}
	}
}

