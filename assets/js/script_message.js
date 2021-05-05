// $('.sendMessage').on('click', function () {
// 	var html_message_ready = "";
// 	$.ajax({
// 		url: base + "home/getMessagesInsert",
// 		method: "post",
// 		dataType: "json",
// 		success: function (data) {
// 			console.log(data);
// 			$.each(data.content, function (i, dataContent) {
// 				if (data.id == dataContent.id) {
// 					console.log("oke");
// 					html_message_ready += '<div class="mb-3 shadow-sm container">'
// 					html_message_ready += '<div class="p-2">' + dataContent.content + '</div>'
// 					html_message_ready += '<span class="p-2 time-left">' + dataContent.created_at + '</span>'
// 					html_message_ready += '</div>'
// 				} else if (data.id_kirim == dataContent.created_for) {
// 					console.log("eko");
// 					html_message_ready += '<div class="mb-3 shadow-sm container darker">'
// 					html_message_ready += '<div class="p-2">' + dataContent.content + '</div>'
// 					html_message_ready += '<span class="p-2 time-right">' + dataContent.created_at + '</span>'
// 					html_message_ready += '</div>'
// 				}
// 				$('#message-ready').hide().html(html_message_ready).fadeIn(500);
// 			});
// 		},
// 	});
// });

$('#messageBox').scrollTop($('#messageBox').height());

var counter_add = 0;
var html = "";
$('#messageBox').scroll(function () {
	html = "";
	if ($('#messageBox').scrollTop() == 0) {
		counter_add++;
		html += '<div class="mb-3 container">'
		html += '<p class="p-2">LOAD DATA GES' + counter_add + '</p>'
		html += '<span class="p-2 time-left">11:02</span>'
		html += '</div>'
		html += '<div class="mb-3 container darker">'
		html += '<p class="p-2">LOAD DATA</p>'
		html += '<span class="p-2 time-right">11:05</span>'
		html += '</div>'
		$('#add-message').hide().prepend(html).fadeIn(2000);

	}
});
