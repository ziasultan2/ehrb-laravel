<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Video Call</title>
    <link rel="stylesheet" href="{{url('agora.css')}}">
</head>
<body>
    <h1>
        Video Call<br><small style="font-size: 14pt;">Powered by Agora.io</small>
    </h1>
    <h4>Local video</h4>
    <div id="me"></div>
    <h4>Remote video</h4>
    <div id="remote-container">
    </div>
    <script src="https://cdn.agora.io/sdk/release/AgoraRTCSDK-3.4.0.js"></script>
    <script src="{{url('js/agora.js')}}"></script>
</body>
</html>