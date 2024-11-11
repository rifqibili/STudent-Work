<div class="modal-body">
    <!-- chat-list -->
    <div class="chat-lists">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="Open"
                role="tabpanel" aria-labelledby="Open-tab">
                <!-- chat-list -->
                <div class="chat-list">
                    @foreach ($recentMessages as $user)
                    <a href="{{ route('chat.index', $user['user_id']) }}" class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img class=" rounded-circle"
                            src="{{asset ('storage/gambar/user/' .$user['foto'])}}"
                            alt="user img" width="60px">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h3>{{$user ['name']}}</h3>
                            <p>{{$user ['role']}}</p>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>