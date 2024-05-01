document.addEventListener('DOMContentLoaded', function () {
    const likeButtons = document.querySelectorAll('.like-btn');
    likeButtons.forEach(button => {
        button.addEventListener('click', function () {
            const postId = this.getAttribute('data-post-id');
            const userId = this.getAttribute('data-user-id');
            toggleLikeButton(postId, userId);
        });
    });
});

function toggleLikeButton(postId, userId) {
    const likeIcon = document.getElementById(`like-icon-${postId}`);
    const likeCount = document.getElementById(`like-count-${postId}`);
    const isLiked = likeIcon.getAttribute('data-liked') === 'true';

    if (!isLiked) {
        likeIcon.innerText = '❤️';
        likeIcon.setAttribute('data-liked', 'true');
        likeCount.innerText = parseInt(likeCount.innerText) + 1;

        localStorage.setItem(`liked_${postId}_${userId}`, 'true');
    } else {
        likeIcon.innerText = '🤍';
        likeIcon.setAttribute('data-liked', 'false');
        likeCount.innerText = parseInt(likeCount.innerText) - 1;

        localStorage.removeItem(`liked_${postId}_${userId}`);
    }

    const formData = new FormData();
    formData.append('post_id', postId);
    formData.append('user_id', userId);
    formData.append('action', isLiked ? 'dislike' : 'like');

    fetch(`/like_post_ajax/${postId}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: formData,
    })
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }
        return response.text();
    })
    .then(data => {
        console.log('Response:', data);
    })
    .catch(error => {
        console.error('Error:', error.message);
        if (!isLiked) {
            likeIcon.innerText = '🤍';
            likeIcon.setAttribute('data-liked', 'false');
            likeCount.innerText = parseInt(likeCount.innerText) + 1;
            localStorage.removeItem(`liked_${postId}_${userId}`);
        } else {
            likeIcon.innerText = '❤️';
            likeIcon.setAttribute('data-liked', 'true');
            likeCount.innerText = parseInt(likeCount.innerText) - 1;
            localStorage.setItem(`liked_${postId}_${userId}`, 'true');
        }
    });
}

document.addEventListener('DOMContentLoaded', function () {
    const likeButtons = document.querySelectorAll('.like-btn');
    likeButtons.forEach(button => {
        const postId = button.getAttribute('data-post-id');
        const userId = button.getAttribute('data-user-id');
        const isLiked = localStorage.getItem(`liked_${postId}_${userId}`) === 'true';

        if (isLiked) {
            const likeIcon = document.getElementById(`like-icon-${postId}`);
            likeIcon.innerText = '❤️';
            likeIcon.setAttribute('data-liked', 'true');
        }
    });
});