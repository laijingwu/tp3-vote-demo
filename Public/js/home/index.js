$(document).ready(function() {
	var checkbox_all = true;
	var btn_vote = $('#btn-vote');
	function checkBtn() {
		var btn = true;
		$('.vote-checkbox').each(function() {
			var now_select = 0;
			var max_select = $(this).children('#maxSelect').val();
			var name = $(this).find('.vote-persection input:checkbox').eq(0).attr('name');
			$('.vote-checkbox').find("input[name='" + name + "']:checkbox").each(function() {
				if ($(this).prop("checked")) { 
					now_select++;
				}
			});
			if (now_select == 0) {//now_select < max_select) {
				btn = false;
			}
		});
		$('.vote-radio').each(function() {
			var name = $(this).find('.vote-persection input:radio').eq(0).attr('name');
			var val = $('.vote-radio').find('input:radio[name="' + name + '"]:checked').val();
            if (val == null){
                btn = false;
            }
		});
		if (btn == false) {
			return false;
		} else {
			return true;
		}
	}
	$('.vote-persection input:radio').click(function() {
	});
	$('.vote-persection input:checkbox').click(function() {
		checkbox_all = true;
		$('.vote-checkbox').each(function() {
			var name = $(this).find('.vote-persection input:checkbox').eq(0).attr('name');
			var max_select = $(this).children('#maxSelect').val();
			var now_select = 0;
			$('.vote-checkbox').find("input[name='" + name + "']:checkbox").each(function() {
				if ($(this).prop("checked")) { 
					now_select++;
				}
			});
			if (now_select > max_select) {
				var limit = $(this).children('#maxSelect').val();
				var voteName = $(this).children('#sectionName').val();
				swal({
					title: "已超出限选",
					text: voteName + "限选" + limit + "项",
					type: "error",
					confirmButtonText: '返回',
					confirmButtonColor: '#d9534f',
					closeOnConfirm: true
				},
				function(){
					swal("已超出限选", voteName + "限选" + limit + "项", "error");
				});
				checkbox_all = false;
			}
		});
		if (checkbox_all == false) {
			$(this).removeAttr('checked');
		}
	});
	$('#btn-vote').click(function() {
		if (checkBtn()) {
			$('#vote-form').submit();
		} else {
			swal({
				title: "投票不完整",
				text: null,
				type: "error",
				confirmButtonText: '返回',
				confirmButtonColor: '#d9534f',
				closeOnConfirm: true
			},
			function(){
				swal("投票不完整", null, "error");
			});
		}
	});
});