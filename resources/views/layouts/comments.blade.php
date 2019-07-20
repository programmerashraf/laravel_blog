<div class="pt-5">
    <h3 class="mb-5">{{$post->comments->count()}} Comments</h3>
    <ul class="comment-list">
        @foreach($post->comments as $comment)
        <li class="comment">
            <div class="vcard">
                <img src="{{ url(config("defaults.image")) }}" alt="Image placeholder">
            </div>
            <div class="comment-body">
                <h3>{{$comment->username}}</h3>
                <div class="meta">{{$comment->created_at}}</div>
                <p>
                    {{ $comment->content }}
                </p>
            </div>
        </li>
        @endforeach
    </ul>
    <!-- END comment-list -->

    <div class="comment-form-wrap pt-5">
        <h3 class="mb-5">Leave a comment</h3>
        <form action="/comment/create" class="p-5 bg-light" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" class="form-control" id="name" name="username" required>
            </div>
            <div class="form-group">
                <label for="content">Comment</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control" required></textarea>
            </div>
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <div class="form-group">
                <input type="submit" value="Post Comment" class="btn btn-primary">
            </div>
        </form>
    </div>
</div>