{/* <script>
    // Existing searchPosts function
    function searchPosts() {
        const searchInput = document.getElementById('postSearch').value.toLowerCase();
        const posts = document.querySelectorAll('.blog-post');

        posts.forEach(post => {
            const title = post.getAttribute('data-title');
            const content = post.getAttribute('data-content');

            if (title.includes(searchInput) || content.includes(searchInput)) {
                post.style.display = ''; // Show post
            } else {
                post.style.display = 'none'; // Hide post
            }
        });
    }

    // New function to filter posts by category
    function filterPosts(category) {
        const posts = document.querySelectorAll('.blog-post');

        posts.forEach(post => {
            const postCategory = post.getAttribute('data-category'); // Assuming you have a data-category attribute

            if (category === 'all' || postCategory === category) {
                post.style.display = ''; // Show post
            } else {
                post.style.display = 'none'; // Hide post
            }
        });
    }

    // Like button functionality remains the same
    document.querySelectorAll('.like-button').forEach(button => {
        button.addEventListener('click', function() {
            const postId = this.getAttribute('data-id');
            const likeCountElement = this.querySelector('.like-count');

            fetch(`/blog/${postId}/like`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const newCount = parseInt(likeCountElement.innerText) + 1;
                    likeCountElement.innerText = newCount;
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
 */}
