<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <style>
        .hidden {
            display: none;
        }
    </style>
    <title>Feed</title>
</head>

<body class="font-sans bg-gray-100">
    @include('user_profile_header', ['user' => $user])
    <div class="max-w-screen-md mt-5 mx-auto">
        <a href="{{ route('create_post') }}"
            class="bg-green-500 text-white font-semibold py-2 px-4 rounded-full mb-4 inline-block">Créer un post</a>
        @foreach($posts as $post)
        <div class="bg-white p-4 mb-4 rounded-md shadow-md">
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center">
                <img src="{{ $post->user->profile && $post->user->profile->photo ? asset('storage/' . $post->user->profile->photo) : asset('images/noprofile.png') }}" alt="User Picture" style="width: 3.20rem; height: 3.20rem;" class="object-cover mr-3 rounded-full cursor-pointer">                   
                 <p class="font-semibold">{{ $post->user->username }}</p>
                </div>
                @if (Auth::check() && $post->user_id === Auth::id())
                <div class="flex">
                    <a href="{{ route('edit_post', ['post' => $post]) }}"
                        class="bg-blue-500 text-white font-semibold py-1 px-2 rounded-full mr-2"><i
                            class="fas fa-edit"></i></a>
                    <a href="{{ route('delete_post', ['post' => $post]) }}"
                        class="bg-red-500 text-white font-semibold py-1 px-2 rounded-full"><i
                            class="fas fa-trash-alt"></i></a>
                </div>
                @endif
            </div>
            <p class="mb-4">{{ $post->content }}</p>
            @if($post->file_path)
            <img src="{{ asset('storage/' . $post->file_path) }}" alt="Uploaded File"
                class="w-full h-auto rounded-md mb-4">
            @endif
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                <button class="flex items-center text-green-500 font-semibold space-x-1 like-btn"
        data-post-id="{{ $post->id }}" data-user-id="{{ auth()->user()->id }}">
                        <span id="like-icon-{{ $post->id }}" class="like-icon"
                            data-liked="{{ $post->isLikedBy(auth()->user()) ? 'true' : 'false' }}">
                            @if ($post->isLikedBy(auth()->user()))
                            ❤️
                            @else
                            🤍
                            @endif
                        </span>
                        <span id="like-count-{{ $post->id }}" class="text-sm">{{ $post->likes }}</span>
                    </button>
                </div>
                <div class="flex items-center space-x-2">
                    <button class="flex items-center text-blue-500 font-semibold space-x-1 btn-toggle-comments">
                        <i class="far fa-comment"></i>
                        <span class="text-sm">{{ count($post->comments) }}</span>
                    </button>
                </div>
            </div>
            <form action="{{ route('comment_post', ['post' => $post]) }}" method="post"
                class="comment-form mt-3 hidden" id="comment-form-{{ $post->id }}">
                @csrf
                <div class="flex items-center space-x-2">
                    <textarea name="comment_content[]" id="comment_content"
                        class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500"
                        placeholder="Ajouter un commentaire..." required></textarea>
                    <button type="submit"
                        class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-full">Post</button>
                </div>
            </form>
            <div class="comments-section mt-3 hidden" id="comments-section-{{ $post->id }}">
    @foreach($post->comments as $comment)
        <div class="flex items-start mb-2" id="comment-{{ $comment->id }}">
            <img src="{{ $comment->user->profile && $comment->user->profile->photo ? asset('storage/' . $comment->user->profile->photo) : asset('images/noprofile.png') }}" alt="User Picture" style="width: 3.20rem; height: 3.20rem;" class="object-cover mr-3 rounded-full cursor-pointer">
            <div class="flex-1">
                <p class="text-sm" id="comment-content-{{ $comment->id }}">
                    <span class="font-semibold">{{ $comment->user->username }}:</span>
                    {{ $comment->content }}
                </p>
                @if (Auth::check() && $comment->user_id === Auth::id())
                    <div class="flex items-center space-x-2 mt-1">
                        <form action="{{ route('update_comment', ['comment' => $comment]) }}" method="post"
                            class="hidden" id="edit-comment-form-{{ $comment->id }}">
                            @csrf
                            <textarea name="comment_content"
                                class="w-full border border-gray-300 rounded p-2 focus:outline-none focus:border-blue-500"
                                required>{{ $comment->content }}</textarea>
                            <button type="submit"
                                class="bg-yellow-500 text-white font-semibold py-1 px-2 rounded-full">Valider</button>
                        </form>
                        <button id="edit-button-{{ $comment->id }}" onclick="toggleEditForm({{ $comment->id }})"
                            class="text-blue-500 font-semibold">Modifier</button>
                        <a href="{{ route('delete_comment', ['comment' => $comment]) }}"
                            class="text-red-500 font-semibold">Supprimer</a>
                    </div>
                @endif
            </div>
        </div>
    @endforeach
</div>
        </div>
        @endforeach
    </div>

<script>
    function toggleEditForm(commentId) {
        var commentContent = document.getElementById(`comment-content-${commentId}`);
        commentContent.classList.toggle('hidden');

        var editCommentForm = document.getElementById(`edit-comment-form-${commentId}`);
        editCommentForm.classList.toggle('hidden');

        var editButton = document.getElementById(`edit-button-${commentId}`);
        if (editButton) {
            editButton.innerText = editCommentForm.classList.contains('hidden') ? 'Edit' : 'Cancel';
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        var toggleButtons = document.querySelectorAll('.btn-toggle-comments');

        toggleButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var container = button.closest('.bg-white');
                var commentsSection = container.querySelector('.comments-section');
                var commentForm = container.querySelector('.comment-form');

                if (commentsSection && commentForm) {
                    commentsSection.classList.toggle('hidden');
                    commentForm.classList.toggle('hidden');
                }
            });
        });
    });
</script>

<script defer src="{{ asset('js/like.js') }}"></script></body>
<!-- <script defer src="{{ asset('js/comment.js') }}"></script></body> -->
   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>