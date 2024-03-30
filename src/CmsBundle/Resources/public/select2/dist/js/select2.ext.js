$(document).ready(function () {
	function arr_diff(a1, a2) {
		var a = [], diff = [];
		for (var i = 0; i < a1.length; i++) {
			a[a1[i]] = true;
		}
		for (var i = 0; i < a2.length; i++) {
			if (a[a2[i]]) {
				delete a[a2[i]];
			} else {
				a[a2[i]] = true;
			}
		}
		for (var k in a) {
			diff.push(k);
		}
		return diff;
	}
	function formatResult(state) {
		if (!state.id) {
			var btn = $('<div class="text-right"><button id="all-branch" style="margin-right: 10px;" class="btn btn-default">Select All</button><button id="clear-branch" class="btn btn-default">Clear All</button></div>')
			return btn;
		}

		branch_all.push(state.id);
		var id = 'state' + state.id;
		var checkbox = $('<div class="checkbox"><input id="' + id + '" type="checkbox" ' + (state.selected ? 'checked' : '') + '><label for="checkbox1">' + state.text + '</label></div>', {id: id});
		return checkbox;
	}
	$("select.multiple").each(function(){
		let branch_all = [];

		let optionSelect2 = {
			templateResult: formatResult,
			closeOnSelect: false,
			width: '100%',
			allowClear: true,
			placeholder: "Select a state",
		};

		let $select2 = $(this).select2(optionSelect2);
				
		var scrollTop;

		$select2.on("select2:selecting", function (event) {
			var $pr = $('#' + event.params.args.data._resultId).parent();
			scrollTop = $pr.prop('scrollTop');
		});

		$select2.on("select2:select", function (event) {
			$(window).scroll();
			
			if($('#' + event.params.data._resultId).length == 0)return;
			var $pr = $('#' + event.params.data._resultId).parent();
			$pr.prop('scrollTop', scrollTop);

			$(this).val().map(function (index) {
				$("#state" + index).prop('checked', true);
			});
		});

		$select2.on("select2:unselecting", function (event) {
			var $pr = $('#' + event.params.args.data._resultId).parent();
			scrollTop = $pr.prop('scrollTop');
		});

		$select2.on("select2:unselect", function (event) {
			$(window).scroll();

			var $pr = $('#' + event.params.data._resultId).parent();
			$pr.prop('scrollTop', scrollTop);

			var branch = $(this).val() ? $(this).val() : [];
			var branch_diff = arr_diff(branch_all, branch);
			branch_diff.map(function (index) {
				$("#state" + index).prop('checked', false);
			});
			if(branch_diff.length == 0){
				$select2.children().removeAttr('selected');
			}
		});
	});
});