<form action="{{ route('chat.store', $receiver->id ?? null) }}" method="POST">
    @csrf
    <input type="text" name="message" class="form-control" aria-label="message…" placeholder="tuliskan Pesan" value="{{ old('message') }}">
    <button type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i> Kirim</button>
    @error('message')
        <span class="text-red-500">{{ $message }}</span>
    @enderror
</form>