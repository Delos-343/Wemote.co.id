<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChatIndex</title>

    <!-- Java Script -->
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Styles -->
        <style>
            body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
            height: 100vh; /* Use full height of the viewport */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .chat {
            width: 80%; /* Adjust the width as needed */
            max-width: 800px; /* Set a maximum width for larger screens */
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .top {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }

        .top img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .top p {
            font-weight: bold;
            margin: 0;
        }

        .top small {
            color: #4CAF50;
        }

        .messages {
            padding: 10px;
            max-height: 300px;
            overflow-y: auto;
        }

        .messages .message {
            margin-bottom: 10px;
            padding: 8px;
            background-color: #f2f2f2;
            border-radius: 8px;
        }

        .left.message img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .left.message p {
            margin: 0;
        }

        .bottom {
            padding: 10px;
            border-top: 1px solid #ccc;
            display: flex;
            align-items: center;
        }

        .bottom form {
            display: flex;
            flex-grow: 1;
        }

        .bottom input {
            flex-grow: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 10px;
        }

        .bottom button {
            padding: 8px 12px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="chat">
    <div class="top">
        <img src="https://cdn.discordapp.com/attachments/934661338934943774/1174260261461430282/image.png?ex=6566f217&is=65547d17&hm=3a3f18c07efb6fa7d61f479a660eafd1d2c2e478c01f11a7e44758e2ffa501b8&" alt="Avatar">
    <div>
        <p>William George Dunford</p>
        <small>Online</small>
    </div>
</div>
    <div class="messages">
        @include('receive', ['message' => "Hello friend"])
    </div>
    <div class="bottom">
        <form>
            <input type="text" id="message" name="message" placeholder="Your message goes here" autocomplete="off">
            <button type="submit">Send</button>
        </form>
    </div>
</div>  
</body>
<script>
    const pusher  = new Pusher('{{config('broadcasting.connections.pusher.key')}}', {cluster: 'eu'});
    const channel = pusher.subscribe('public');

    channel.bind('chat', function (data){
        $.post("/receive", {
            _token: '{{csrf_token()}}',
            message: data.message,
        })
            .done(function (res){
                $(".messages > .message").last().after(res);
                $(document).scrollTop($(document).height());
            });
    });

    $("form").submit(function (event) {
    event.preventDefault();
    $.ajax({
      url:     "/broadcast",
      method:  'POST',
      headers: {
        'X-Socket-Id': pusher.connection.socket_id
      },
      data:    {
        _token:  '{{csrf_token()}}',
        message: $("form #message").val(),
      }
    }).done(function (res) {
      $(".messages > .message").last().after(res);
      $("form #message").val('');
      $(document).scrollTop($(document).height());
    });
  });
</script>
</html>