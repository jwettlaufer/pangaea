@foreach($comments as $comment)
<div class="display-comment">
    <strong><a href="{{route('profile.show', $comment->user->id)}}">{{ $comment->user->name }}</a></strong>
    <section>
        @if($comment->is_gif == TRUE )
        <div>
            <img src="{{ $comment->body }}">
        </div>
        @else
        <p>
            {{ $comment->body }}
        </p>
        @endif
    </section>
    <ul class="comment-buttons">
        @auth
        <li>
            <a href="{{route('comment.edit', $comment->id)}}" class="btn btn-primary btn-sm">
                Edit Comment
            </a>
        </li>
        <li>
            <form action="{{route('comment.destroy', $comment->id)}}" method="post">
                @csrf
                @method('DELETE')
                <input type="submit" class="btn btn-danger btn-sm" value="Delete Comment">
            </form>
        </li>
        @endauth
    </ul>
    <a href="#" id="reply"></a>
    <!--
    <form method="post" action="{{ route('reply.add') }}">
        @csrf
        <div class="form-group">
            <input type="text" name="comment_body" class="form-control" />
            <div id="app">
                <input type="hidden" name="post" value="{{ $post_id }}" />
                <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-warning btn-sm" value="Reply" />
            </div>
    </form>
-->
    <reply-create-form comment-url="{{route('reply.add')}}" comment-id="$comment->$id" post-id="{{ $post->id }}" v-model="body">
        @csrf
    </reply-create-form>
<!--
    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseGiphy">
        Giphy Search
    </button>
        <div class="collapse" id="collapseGiphy">
            <Giphy v-on:image-clicked="imageClicked" />
        </div>
-->
    @include('partials.comment_replies', ['comments' => $comment->replies])
    <hr>
</div>
@endforeach