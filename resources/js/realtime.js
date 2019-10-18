var pusher = new Pusher('abe0aa5a6fee1438c2df', {
    cluster: 'ap1',
    encrypted: true
});

var channel = pusher.subscribe('channel-notice-admin');

channel.bind('App\\Events\\RealTimeNoticeAdminNewRequestBook', addMessage);

function addMessage(data) {

    var tag = '<div class="app-notification__content">';
    tag += '<li>';
    tag += '<a class="app-notification__item bg bg-primary"';
    tag += 'href="#">';
    tag += '<span class="app-notification__icon">';
    tag += '<span class="fa-stack fa-lg">';
    tag += '<i class="fa fa-circle fa-stack-2x text-primary"></i>';
    tag += '<i class="fa fa-envelope fa-stack-1x fa-inverse"></i>';
    tag += '</span>';
    tag += '</span>';
    tag += '<div>';
    tag += '<p class="app-notification__message">';
    tag += '<b>';
    tag += data.message.sender;
    tag += '</b>';
    tag += 'sent you a request add new book';
    tag += ' <b><i>';
    tag += data.message.bookName;
    tag += '</i></b>';
    tag += '</p>';
    tag += '<p class="app-notification__meta">';
    tag += 'Now';
    tag += '</p>';
    tag += '</div>';
    tag += '</a>';
    tag += '</li>';
    tag += '</div>';

    $('#dropdown_notice').prepend(tag);

    var noticeNumber = parseInt($('.badge-danger').text());
    $('.badge-danger').html(noticeNumber + 1);

}

