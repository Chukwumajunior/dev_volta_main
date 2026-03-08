@extends('layouts.app')

@section('title', 'Admin | Applications')

@section('body-content')

    <style>
        :root {
            --ev-blue: #0070f3;
            --ev-light-blue: #eef6ff;
            --ev-text: #0a2540;
        }

        body { background-color: #fcfdfe; color: var(--ev-text); }

        .admin-hero {
            padding: 100px 0 40px;
            background: linear-gradient(135deg, #fff 0%, var(--ev-light-blue) 100%);
            border-bottom: 1px solid rgba(0, 112, 243, 0.1);
        }

        .stat-pill {
            background: white;
            padding: 10px 20px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            display: inline-flex;
            align-items: center;
            margin-right: 10px;
        }

        .admin-card {
            background: white;
            border-radius: 24px;
            border: 1px solid #edf2f7;
            box-shadow: 0 10px 30px rgba(10, 37, 64, 0.04);
            overflow: hidden;
            margin-bottom: 30px;
        }

        .card-header-ev {
            background: #f8fafc;
            padding: 20px 30px;
            border-bottom: 1px solid #edf2f7;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .ev-table thead {
            background: var(--ev-light-blue);
            color: var(--ev-blue);
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
        }

        .ev-table th, .ev-table td {
            padding: 15px 20px;
            vertical-align: middle;
            border-color: #f1f5f9;
        }

        .msg-item {
            border-left: 4px solid var(--ev-blue);
            margin-bottom: 15px;
            background: #fff;
            transition: 0.3s;
        }

        .msg-item:hover { transform: translateX(5px); }

        .btn-ev {
            border-radius: 100px;
            padding: 8px 20px;
            font-weight: 600;
            font-size: 0.85rem;
        }
    </style>

    <section class="admin-hero">
        <div class="container">
            <div class="d-flex justify-content-between align-items-end">
                <div>
                    <h1 class="fw-900 mb-2">Systems Control Center</h1>
                    <div class="stat-pill"><i class="bi bi-chat-dots me-2 text-primary"></i> {{ count($messages) }} Messages</div>
                    <div class="stat-pill"><i class="bi bi-people me-2 text-primary"></i> {{ count($users) }} Users</div>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('blog.create') }}" class="btn btn-primary btn-ev shadow-sm">
                        <i class="bi bi-plus-lg me-1"></i> New Post
                    </a>
                    <a href="{{ route('admin.careers') }}" class="btn btn-outline-dark btn-ev">
                        <i class="bi bi-briefcase me-1"></i> Applications
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-5">
        @if ($errors->any())
            <div class="alert alert-danger rounded-4 border-0 shadow-sm mb-5 p-4">
                <h6 class="fw-bold">System Alerts:</h6>
                <ul class="mb-0 small">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="admin-card">
            <div class="card-header-ev">
                <h5 class="mb-0 fw-800 text-uppercase" style="letter-spacing: 1px;">User Directory</h5>
                <div class="d-flex gap-2">
                    <input type="text" id="userSearch" class="form-control form-control-sm rounded-pill px-3" placeholder="Search Identity...">
                    <select id="roleFilter" class="form-select form-select-sm rounded-pill">
                        <option value="">All Roles</option>
                        <option value="admin">Admin</option>
                        <option value="writer">Writer</option>
                        <option value="student">Student</option>
                        <option value="guest">Guest</option>
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table ev-table mb-0" id="usersTable">
                    <thead>
                    <tr>
                        <th>Identity</th>
                        <th>Contact</th>
                        <th>Authorization Role</th>
                        <th class="text-end">Operations</th>
                    </tr>
                    </thead>
                    <tbody id="usersBody">
                    @foreach($users as $user)
                        <tr data-role="{{ $user->role }}" data-name="{{ strtolower($user->name) }}" data-email="{{ strtolower($user->email) }}">
                            <td>
                                <div class="fw-bold">
                                    @if($user->role === 'student')
                                        <a href="{{ route('admin.student.dashboard', $user->id) }}" class="text-primary">{{ $user->name }}</a>
                                    @else
                                        {{ $user->name }}
                                    @endif
                                </div>
                                <small class="text-muted">ID: {{ $user->id }}</small>
                            </td>
                            <td>
                                <div class="small">{{ $user->email }}</div>
                                <div class="small text-muted">{{ $user->phone }}</div>
                            </td>
                            <td>
                                <select class="form-select form-select-sm role-select rounded-pill" data-user-id="{{ $user->id }}">
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="writer" {{ $user->role == 'writer' ? 'selected' : '' }}>Writer</option>
                                    <option value="guest" {{ $user->role == 'guest' ? 'selected' : '' }}>Guest</option>
                                    <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Student</option>
                                </select>
                            </td>
                            <td class="text-end">
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger p-0" onclick="return confirm('Terminate user access?')">
                                        <i class="bi bi-trash3"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-3 text-center border-top">
                <button id="toggleUsers" class="btn btn-link text-decoration-none fw-bold small">LOAD ADDITIONAL USERS</button>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <div class="col-lg-4">
                <div class="admin-card p-4 h-100">
                    <h6 class="fw-800 text-uppercase mb-4">Provision New User</h6>
                    <form action="{{ route('store_users') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="small fw-bold">Full Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold">Email Address</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="small fw-bold">Role Assignment</label>
                            <select class="form-select" name="role" required>
                                <option value="writer">Writer</option>
                                <option value="guest">Guest</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 btn-ev">Provision Asset</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="admin-card p-4 h-100 bg-light">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="fw-800 text-uppercase mb-0">Communication Inbox</h6>
                        <input type="text" id="messageSearchInput" class="form-control form-control-sm w-50 rounded-pill" placeholder="Filter messages...">
                    </div>
                    <div id="searchResults" class="overflow-auto" style="max-height: 400px;">
                        @foreach ($messages as $message)
                            <div class="p-3 rounded-4 msg-item shadow-sm mb-3">
                                <div class="d-flex justify-content-between">
                                    <h6 class="fw-bold mb-1">{{ $message->name }}</h6>
                                    <small class="text-muted">{{ $message->email }}</small>
                                    <small class="text-muted">{{ $message->number }}</small>
                                </div>
                                <p class="small text-muted mb-2">{{ $message->message }}</p>
                                <form action="{{ route('contact.destroy', $message->id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-link text-danger btn-sm p-0 text-decoration-none" onclick="return confirm('Archive message?')">Archive</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="admin-card">
            <div class="card-header-ev">
                <h5 class="mb-0 fw-800 text-uppercase">Content Deployment Panel</h5>
                <div class="d-flex gap-2 w-50">
                    <input type="text" id="searchInput" class="form-control form-control-sm rounded-pill px-3" placeholder="Filter Posts...">
                    <select id="postType" class="form-select form-select-sm rounded-pill">
                        <option value="">All Types</option>
                        @foreach ($all_posts->pluck('type')->unique() as $type)
                            <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="p-3 bg-light border-bottom small text-muted">
                Total Assets: <strong>{{ count($all_posts) }}</strong> | Active Filter: <strong id="filteredPosts">0</strong>
            </div>
            <div class="table-responsive">
                <table class="table ev-table mb-0">
                    <thead>
                    <tr>
                        <th>Author</th>
                        <th>Deployment Title</th>
                        <th>Classification</th>
                        <th>Status Date</th>
                        <th class="text-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody id="tableBody">
                    @foreach ($all_posts as $post)
                        <tr data-type="{{ $post->type }}" data-category="{{ $post->category }}" data-title="{{ strtolower($post->title) }}">
                            <td><span class="badge bg-light text-dark fw-bold">{{ $post->username }}</span></td>
                            <td><a href="{{ route('blog.show', $post->slug) }}" class="fw-bold text-dark">{{ $post->title }}</a></td>
                            <td>
                                <div class="small fw-bold">{{ ucfirst($post->type) }}</div>
                                <div class="text-muted x-small">{{ ucfirst($post->category) }}</div>
                            </td>
                            <td class="small text-muted">{{ $post->created_at->format('d M, Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('blog.edit', $post->id) }}" class="btn btn-link p-0 text-warning me-2"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('blog.destroy', $post->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-link p-0 text-danger" onclick="return confirm('Delete post?')"><i class="bi bi-trash3"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="p-3 text-center border-top">
                <button id="togglePosts" class="btn btn-link text-decoration-none fw-bold small">VIEW MORE ASSETS</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const postRows = Array.from(document.querySelectorAll("#tableBody tr"));
            const userRows = Array.from(document.querySelectorAll("#usersBody tr"));
            const messageItems = document.querySelectorAll("#searchResults .msg-item");

            const searchInput = document.getElementById("searchInput");
            const postType = document.getElementById("postType");
            const userSearch = document.getElementById("userSearch");
            const roleFilter = document.getElementById("roleFilter");
            const messageSearchInput = document.getElementById("messageSearchInput");
            const filteredCounter = document.getElementById("filteredPosts");

            const togglePostsBtn = document.getElementById("togglePosts");
            const toggleUsersBtn = document.getElementById("toggleUsers");

            let visiblePostCount = 10;
            let visibleUserCount = 10;

            function filterPosts() {
                const query = searchInput.value.toLowerCase();
                const type = postType.value;
                let visible = 0;

                postRows.forEach((row) => {
                    const matchesQuery = row.dataset.title.includes(query);
                    const matchesType = !type || row.dataset.type === type;
                    const shouldShow = matchesQuery && matchesType;

                    if (shouldShow && visible < visiblePostCount) {
                        row.style.display = "";
                        visible++;
                    } else {
                        row.style.display = "none";
                    }
                });
                filteredCounter.textContent = visible;
            }

            function filterUsers() {
                const query = userSearch.value.toLowerCase();
                const role = roleFilter.value;
                let visible = 0;

                userRows.forEach((row) => {
                    const matchesQuery = row.dataset.name.includes(query) || row.dataset.email.includes(query);
                    const matchesRole = !role || row.dataset.role === role;
                    const shouldShow = matchesQuery && matchesRole;

                    if (shouldShow && visible < visibleUserCount) {
                        row.style.display = "";
                        visible++;
                    } else {
                        row.style.display = "none";
                    }
                });
            }

            searchInput.addEventListener("input", filterPosts);
            postType.addEventListener("change", filterPosts);
            userSearch.addEventListener("input", filterUsers);
            roleFilter.addEventListener("change", filterUsers);
            messageSearchInput.addEventListener("input", () => {
                const keyword = messageSearchInput.value.toLowerCase();
                messageItems.forEach(item => {
                    item.style.display = item.innerText.toLowerCase().includes(keyword) ? "" : "none";
                });
            });

            togglePostsBtn.addEventListener("click", () => { visiblePostCount += 10; filterPosts(); });
            toggleUsersBtn.addEventListener("click", () => { visibleUserCount += 10; filterUsers(); });

            document.querySelectorAll(".role-select").forEach(select => {
                select.addEventListener("change", function () {
                    const userId = this.dataset.userId;
                    const newRole = this.value;
                    fetch(`/update-role/${userId}`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                        },
                        body: JSON.stringify({ role: newRole })
                    }).then(r => r.json()).then(d => alert(d.message)).catch(e => alert("Update Error"));
                });
            });

            filterPosts();
            filterUsers();
        });
    </script>

@endsection
