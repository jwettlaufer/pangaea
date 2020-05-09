@foreach($comments as $comment)
   <div class="display-comment">
       <strong><a href="{{route('profile.show', $comment->user->id)}}">{{ $comment->user->name }}</a></strong>
       <p>{{ $comment->body }}</p>
       <a href="" id="reply"></a>
       <div id="app">
<!--
       <form method="post" action="{{ route('reply.add') }}">
           @csrf
           <div class="form-group">
               <input type="text" name="comment_body" class="form-control" />
               <div id="app">
               <input type="hidden" name="post_id" value="{{ $post_id }}" />
               <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
           </div>
           <div class="form-group">
               <input type="submit" class="btn btn-warning" value="Reply" />
           </div>
       </form> 
-->
            <comment-create-form v-model="comment" comment-url="{{ route('reply.add') }}"></comment-create-form>
            <Giphy v-on:image-clicked="imageClicked" />
       </div>
       <ul>
         @auth
         <li>
             <a href="{{route('comment.edit', $comment->id)}}" class="btn btn-primary">
               Edit Comment
             </a>
         </li>
         <li>
             <form action="{{route('comment.destroy', $comment->id)}}" method="post">
               @csrf
                 @method('DELETE')
                 <input type="submit" class="btn btn-danger" value="Delete Comment">
             </form>
         </li>
         @endauth
       </ul>
       @include('partials.comment_replies', ['comments' => $comment->replies])
   </div>
@endforeach
