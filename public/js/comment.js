document.addEventListener('DOMContentLoaded', function () {
    // Function to handle adding a new comment
    function addComment(postId, content) {
        fetch(`/comment_post/${postId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ comment_content: content }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Handle the response data as needed
                console.log(data);
                // You can update the UI with the new comment data here
            } else {
                console.error(data.message);
            }
        });
    }

    // Function to handle updating a comment
    function updateComment(commentId, content) {
        fetch(`/update_comment/${commentId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({ comment_content: content }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Handle the response data as needed
                console.log(data);
                // You can update the UI with the updated comment data here
            } else {
                console.error(data.message);
            }
        });
    }

    // Function to handle deleting a comment
    function deleteComment(commentId) {
        fetch(`/delete_comment/${commentId}`, {
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Handle the response data as needed
                console.log(data);
                // You can update the UI to remove the deleted comment here
            } else {
                console.error(data.message);
            }
        });
    }

    // ... existing code ...

    // Event listeners for adding, updating, and deleting comments
    document.addEventListener('submit', function (event) {
        if (event.target.classList.contains('comment-form')) {
            event.preventDefault();
            const postId = event.target.getAttribute('data-post-id');
            const content = event.target.querySelector('textarea').value;
            addComment(postId, content);
        }
    });

    document.addEventListener('click', function (event) {
        if (event.target.classList.contains('btn-edit-comment')) {
            event.preventDefault();
            const commentId = event.target.getAttribute('data-comment-id');
            const content = prompt('Enter new comment content:');
            if (content !== null) {
                updateComment(commentId, content);
            }
        } else if (event.target.classList.contains('btn-delete-comment')) {
            event.preventDefault();
            const commentId = event.target.getAttribute('data-comment-id');
            deleteComment(commentId);
        }
    });
});