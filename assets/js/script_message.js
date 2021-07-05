var counter_add = 5;
var html = "";


var temp_id = "";
var indeks = 0;


function updateRead() {
	const id_receiver = $('#messageBox').data("id_receiver");
	$.ajax({
		url: base + "home/updateReadMessage",
		method: "post",
		dataType: "json",
		data: {
			id_receiver: id_receiver,
		},
		success: function () {},
	});
}

$("#messageBox").animate({
	scrollTop: $('#messageBox>.col').height()
}, 0);

$(document).ready(function () {
	$('#sendMessage').on('click', function () {
		const id_receiver = $('#sendMessage').data("id_receiver");
		const content = valEditor.getData();
		$.ajax({
			url: base + "home/insertMessage",
			method: "post",
			dataType: "json",
			data: {
				content: content,
				id_receiver: id_receiver,
			},
		});
		valEditor.data.set('');
	});
	$('#messageBox').scroll(function () {
		if ($('#messageBox').scrollTop() == 0) {
			const id = $('#messageBox').data("id");
			const id_receiver = $('#messageBox').data("id_receiver");
			const id_scroll = $('.scrollContent').prop('id');
			$.ajax({
				url: base + "home/getMessageOld",
				method: "post",
				data: {
					id: id,
					id_receiver: id_receiver,
					offset: counter_add
				},
				dataType: "json",
				success: function (data) {
					$.each(data, function (i, dataContent) {
						if (dataContent.created_by == id_receiver) {
							html += '<div class="scrollContent mb-3 shadow-sm container" id="' + dataContent.id + '">';
							html += '<div class="p-2">' + dataContent.content + '</div>';
							html += '<span class="p-2 time-left">' + dataContent.created_at + '</span>';
							html += '</div>';
						} else if (dataContent.created_by == id) {
							html += `<div class="scrollContent mb-3 shadow-sm container darker" id="${dataContent.id}">`;
							html += '<div class="p-2">' + dataContent.content + '</div>';
							html += '<span class="p-2 time-right">' + dataContent.created_at + '</span>';
							html += '</div>';
						}
					});
					if (html) {
						$('#add-message').hide().prepend(html).fadeIn(1000);
						path = base + "home/messagePage/" + id_receiver + "/#" + id_scroll;
						window.location.replace(path);
					}
					html = "";
				},
			});
			counter_add = counter_add + 5;
		}
	});
	var htmlAlert = "";
	let pathChatBar = window.location.pathname;
	pathChatBar = pathChatBar.split('/');
	pathChatBar = pathChatBar[pathChatBar.length - 2];
	$(document.getElementById('idReceiver[' + pathChatBar + ']')).addClass('active');
	updateRead();
	setInterval(function () {
		const id = $('#messageBox').data("id");
		const id_receiver = $('#messageBox').data("id_receiver");
		$.ajax({
			url: base + "home/getMessageNew",
			method: "post",
			data: {
				id: id,
				id_receiver: id_receiver,
			},
			dataType: "json",
			success: function (response) {
				let countUnread = response.countUnread;
				let data = response.data;
				countUnread.forEach(function (data, i) {
					if (data.total > 0) {
						data.total = parseInt(data.total);
						$('#unread-message' + data.created_by).html(data.total);
					}
				});
				if (data.created_by == id_receiver) {
					html += `<div class="scrollContent mb-3 shadow-sm container" id="${data.id}">`;
					html += '<div class="p-2">' + data.content + '</div>';
					html += '<span class="p-2 time-left">' + data.created_at + '</span>';
					html += '</div>';
				} else if (data.created_by == id) {
					html += `<div class="scrollContent mb-3 shadow-sm container darker" id="${data.id}">`;
					html += '<div class="p-2">' + data.content + '</div>';
					html += '<span class="p-2 time-right">' + data.created_at + '</span>';
					html += '</div>';
				}
				if (data.id != temp_id && indeks != 0 && (data.created_by == id || data.created_by == id_receiver)) {
					$('#new-message').append(html);
					if (data.created_by == id_receiver && data.created_for == id) {
						htmlAlert += `<div class="alert alert-success" role="alert">`;
						htmlAlert += `Pesan Masuk!`;
						htmlAlert += `</div>`;
						$('#message-alert').hide().html(htmlAlert).fadeIn(1000);
					}
					if (data.created_by == id && data.created_for == id_receiver) {
						$("#messageBox").animate({
							scrollTop: $('#messageBox>.col').height()
						}, 0);
					}
				}
				if ($('#messageBox').scrollTop() + $('#messageBox').height() + 1 >= $('#messageBox>.col').height()) {
					updateRead();
					$('#message-alert').html("");
					countUnread.forEach(function (data, i) {
						$('#unread-message' + data.created_by).html("");
					});
				}
				htmlAlert = "";
				html = "";
				temp_id = data.id;
				indeks = 1;
			},
		});
	}, 100);
});
