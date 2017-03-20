$('input#name-submit').on('click', function() {
	var name = $('input#name').val();
	$.post('includes/fetch.php', {name: name}, function(data) {
		$('div#name-data').text(data);
	});
});


function showUser(act) {
	$.post('includes/fetch.php', {act: act}, function(data) {
		$('div#employee-list').html(data);
	});
};

function showMonth(emp) {
	$.post('includes/fetch.php', {emp: emp}, function(data) {
		$('div#month-list').html(data);
	});
};

function showDay(mth) {
	$.post('includes/fetch.php', {mth: mth}, function(data) {
		$('div#day-list').html(data);
	});
};


function showFree(day) {
	$.post('includes/fetch.php', {day: day}, function(data) {
		$('div#hour-list').html(data);
	});
};


function showOver(hr) {
	$.post('includes/fetch.php', {hr: hr}, function(data) {
		$('div#button').html(data);
	});
};


function buttonClick() {
	$.post('includes/fetch.php', {button: 1}, function(data) {
		$('div#info').html(data);
	});
};

function showStatsAct(act) {
	$.post('includes/stats.php', {act: act}, function(data) {
		$('div#activity').html(data);
	});
};

function showStatsEmp(emp) {
	$.post('includes/stats.php', {emp: emp}, function(data) {
		$('div#employee').html(data);
	});
};


