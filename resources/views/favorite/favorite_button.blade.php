@if (Auth::check() && Auth::id() !== $post->user_id)
    @if (Auth::user()->isFavorite($post->id))
        <form method="POST" action="{{ route('unfavorite', $post->id) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn blueBorder"><p class="text-danger border border-danger p-2 rounded-pill"><i class="fa-regular fa-thumbs-up fa-rotate-180 mr-2" style="color: #ff3848;"></i>いいね！を外す</p></button>
        </form>
    @else
        <form method="POST" action="{{ route('favorite', $post->id) }}">
            @csrf
            <button type="submit" class="btn blueBorder"><p class="text-white border p-2 rounded-pill"><i class="fa-regular fa-thumbs-up mr-2" style="color: #fcfcfc;"></i>いいね</p></button>
        </form>
    @endif
@endif