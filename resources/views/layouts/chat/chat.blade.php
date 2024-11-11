@include('layouts.dashboard.header')
@include('layouts.dashboard.nav')
@include('layouts.dashboard.sideBar')


<div class="content-body">
    <div class="container-fluid">

        <link rel="stylesheet" href="{{ asset('chat') }}/chat.css">


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="chat-area">
                        <!-- chatlist -->
                        <div class="chatlist">
                            <div class="modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="chat-header">
                                        <div class="msg-search">
                                            <h2>Pesan</h2>
                                        </div>
                                    </div>
                                    @include('layouts.chat.sideBarChat', [
                                        'recentMessages' => $recentMessages,
                                    ])
                                </div>
                            </div>
                        </div>
                        @if ($receiver && $receiver->id)
                            <!-- chatbox -->
                            <div class="chatbox">
                                <div class="modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="msg-head">
                                            {{-- chat info --}}
                                            @include('layouts.chat.infoChat', ['receiver' => $receiver])

                                        </div>

                                        {{-- chat area --}}
                                        <div class="modal-body" id="chatBox">
                                            @include('layouts.chat.chatMessage', [
                                                'messages' => $messages,
                                                'auth_id' => Auth::user()->id,
                                            ])
                                        </div>

                                        <div class="send-box">
                                            @include('layouts.chat.chatInput', ['receiver' => $receiver])
                                        </div>
                                    @else
                                        <h3>Silahkan memilih pesan untuk memulai percakapan </h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>


@include('layouts.dashboard.footer')

@vite('resources/js/app.js')

<script type="module">
    const receiverId = "{{ $receiver->id ?? '' }}";

    Echo.private(`messanger.${receiverId}`)
        .listen('MessageSent', (e) => {
            console.log(e.message);
            let chatBox = document.getElementById('chatBox');
            chatBox.innerHTML += `<div>${e.message.content}</div>`;
        });
</script>
