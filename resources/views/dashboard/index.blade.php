@extends('layouts.app')

@section('title', 'Admin | Control Center')

@section('body-content')
    <div x-data="{
    activeTab: 'users',
    searchPosts: '',
    searchUsers: '',
    searchMessages: '',
    postTypeFilter: '',
    roleFilter: '',
    visiblePosts: 10,
    visibleUsers: 10,
    showUserModal: false,
    newUser: { name: '', email: '', phone: '', role: 'writer' }
}" class="bg-[#fcfdfe] text-[#0a2540] overflow-hidden">

        <section class="relative pt-24 pb-12" style="background: linear-gradient(135deg, #fff 0%, #eef6ff 100%); border-bottom: 1px solid rgba(0, 112, 243, 0.1);">
            <div class="container max-w-7xl mx-auto px-4">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
                    <div>
                        <h1 class="text-3xl md:text-4xl font-extrabold mb-4">Admin Dashboard</h1>
                        <div class="flex flex-wrap gap-3">
                            <div class="bg-white px-4 py-2 rounded-xl border border-gray-200 flex items-center gap-2">
                                <i class="bi bi-chat-dots text-[#0070f3]"></i>
                                <span class="font-semibold">{{ count($messages) }} Messages</span>
                            </div>
                            <div class="bg-white px-4 py-2 rounded-xl border border-gray-200 flex items-center gap-2">
                                <i class="bi bi-people text-[#0070f3]"></i>
                                <span class="font-semibold">{{ count($users) }} Users</span>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <a href="{{ route('blog.create') }}" class="bg-[#0070f3] hover:bg-blue-700 text-white font-semibold px-5 py-2.5 rounded-full transition flex items-center gap-2 shadow-md">
                            <i class="bi bi-plus-lg"></i> New Post
                        </a>
                        <a href="{{ route('admin.careers') }}" class="border-2 border-[#0a2540] hover:bg-[#0a2540] hover:text-white font-semibold px-5 py-2.5 rounded-full transition flex items-center gap-2">
                            <i class="bi bi-briefcase"></i> Applications
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <div class="container max-w-7xl mx-auto px-4 py-8">
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6">
                    <h6 class="font-bold text-red-800 mb-2">Please fix these errors:</h6>
                    <ul class="text-sm text-red-600 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="flex gap-2 mb-6 border-b border-gray-200">
                <button @click="activeTab = 'users'" class="px-5 py-3 font-semibold transition" :class="activeTab === 'users' ? 'text-[#0070f3] border-b-2 border-[#0070f3]' : 'text-gray-500 hover:text-[#0070f3]'">Users</button>
                <button @click="activeTab = 'content'" class="px-5 py-3 font-semibold transition" :class="activeTab === 'content' ? 'text-[#0070f3] border-b-2 border-[#0070f3]' : 'text-gray-500 hover:text-[#0070f3]'">Posts</button>
                <button @click="activeTab = 'messages'" class="px-5 py-3 font-semibold transition" :class="activeTab === 'messages' ? 'text-[#0070f3] border-b-2 border-[#0070f3]' : 'text-gray-500 hover:text-[#0070f3]'">Messages</button>
            </div>

            <div x-show="activeTab === 'users'" x-cloak x-transition>
                <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden">
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-100 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                        <h5 class="font-extrabold uppercase text-sm">All Users</h5>
                        <div class="flex flex-wrap gap-3 w-full md:w-auto">
                            <input type="text" x-model="searchUsers" class="px-4 py-2 rounded-full border border-gray-200 text-sm flex-grow md:flex-grow-0 md:w-64" placeholder="Search by name or email...">
                            <select x-model="roleFilter" class="px-4 py-2 rounded-full border border-gray-200 text-sm bg-white">
                                <option value="">All Roles</option>
                                <option value="admin">Admin</option>
                                <option value="writer">Writer</option>
                                <option value="student">Student</option>
                                <option value="guest">Guest</option>
                            </select>
                            <button @click="showUserModal = true" class="bg-[#0070f3] hover:bg-blue-700 text-white px-4 py-2 rounded-full text-sm font-semibold transition flex items-center gap-2">
                                <i class="bi bi-plus-lg"></i> Add User
                            </button>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-[#eef6ff] text-[#0070f3] text-xs uppercase font-bold">
                            <tr>
                                <th class="px-5 py-3 text-left">Name</th>
                                <th class="px-5 py-3 text-left">Contact</th>
                                <th class="px-5 py-3 text-left">Role</th>
                                <th class="px-5 py-3 text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                            @foreach($users as $user)
                                <tr x-show="(searchUsers === '' || '{{ strtolower($user->name) }}'.includes(searchUsers.toLowerCase()) || '{{ strtolower($user->email) }}'.includes(searchUsers.toLowerCase())) && (roleFilter === '' || '{{ $user->role }}' === roleFilter)" x-transition>
                                    <td class="px-5 py-3">
                                        <div class="font-bold">
                                            @if($user->role === 'student')
                                                <a href="{{ route('admin.student.dashboard', $user->id) }}" class="text-[#0070f3] hover:underline">{{ $user->name }}</a>
                                            @else
                                                {{ $user->name }}
                                            @endif
                                        </div>
                                        <div class="text-xs text-gray-500">ID: {{ $user->id }}</div>
                                    </td>
                                    <td class="px-5 py-3">
                                        <div>{{ $user->email }}</div>
                                        <div class="text-xs text-gray-500">{{ $user->phone }}</div>
                                    </td>
                                    <td class="px-5 py-3">
                                        <select @change="updateRole({{ $user->id }}, $event.target.value)" class="px-3 py-1.5 rounded-full border border-gray-200 text-sm bg-white">
                                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="writer" {{ $user->role == 'writer' ? 'selected' : '' }}>Writer</option>
                                            <option value="guest" {{ $user->role == 'guest' ? 'selected' : '' }}>Guest</option>
                                            <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Student</option>
                                        </select>
                                    </td>
                                    <td class="px-5 py-3 text-right">
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline" @submit.prevent="if(confirm('Delete this user?')) $el.submit()">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="px-5 py-3 text-center border-t border-gray-100">
                        <button @click="visibleUsers += 10" class="text-[#0070f3] font-semibold text-sm hover:underline">Show More Users</button>
                    </div>
                </div>
            </div>

            <div x-show="activeTab === 'content'" x-cloak x-transition>
                <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden">
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-100 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                        <h5 class="font-extrabold uppercase text-sm">All Posts</h5>
                        <div class="flex flex-wrap gap-3 w-full md:w-auto">
                            <input type="text" x-model="searchPosts" class="px-4 py-2 rounded-full border border-gray-200 text-sm flex-grow md:flex-grow-0 md:w-64" placeholder="Search posts...">
                            <select x-model="postTypeFilter" class="px-4 py-2 rounded-full border border-gray-200 text-sm bg-white">
                                <option value="">All Types</option>
                                @foreach ($all_posts->pluck('type')->unique() as $type)
                                    <option value="{{ $type }}">{{ ucfirst($type) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="px-5 py-3 bg-gray-50 border-b border-gray-100 text-sm text-gray-600">
                        Total Posts: <strong>{{ count($all_posts) }}</strong>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-[#eef6ff] text-[#0070f3] text-xs uppercase font-bold">
                            <tr>
                                <th class="px-5 py-3 text-left">Author</th>
                                <th class="px-5 py-3 text-left">Title</th>
                                <th class="px-5 py-3 text-left">Type</th>
                                <th class="px-5 py-3 text-left">Category</th>
                                <th class="px-5 py-3 text-left">Section</th>
                                <th class="px-5 py-3 text-left">Date</th>
                                <th class="px-5 py-3 text-right">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                            @foreach ($all_posts as $post)
                                <tr x-show="(searchPosts === '' || '{{ strtolower($post->title) }}'.includes(searchPosts.toLowerCase())) && (postTypeFilter === '' || '{{ $post->type }}' === postTypeFilter)" x-transition>
                                    <td class="px-5 py-3">
                                        <span class="inline-block bg-gray-100 text-gray-800 font-semibold px-3 py-1 rounded-full text-xs">{{ $post->username }}</span>
                                    </td>
                                    <td class="px-5 py-3">
                                        <a href="{{ route('blog.show', $post->slug) }}" class="font-bold text-[#0a2540] hover:text-[#0070f3] transition">{{ $post->title }}</a>
                                    </td>
                                    <td class="px-5 py-3 text-xs">{{ ucfirst($post->type) }}</td>
                                    <td class="px-5 py-3 text-xs">{{ ucfirst($post->category) }}</td>
                                    <td class="px-5 py-3 text-xs">{{ ucfirst($post->section) }}</td>
                                    <td class="px-5 py-3 text-xs text-gray-500">{{ $post->created_at->format('d M, Y') }}</td>
                                    <td class="px-5 py-3 text-right">
                                        <a href="{{ route('blog.edit', $post->id) }}" class="text-yellow-600 hover:text-yellow-800 mr-3">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('blog.destroy', $post->id) }}" method="POST" class="inline" @submit.prevent="if(confirm('Delete this post?')) $el.submit()">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="px-5 py-3 text-center border-t border-gray-100">
                        <button @click="visiblePosts += 10" class="text-[#0070f3] font-semibold text-sm hover:underline">Show More Posts</button>
                    </div>
                </div>
            </div>

            <div x-show="activeTab === 'messages'" x-cloak x-transition>
                <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden">
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-100">
                        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                            <h5 class="font-extrabold uppercase text-sm">Contact Messages</h5>
                            <input type="text" x-model="searchMessages" class="px-4 py-2 rounded-full border border-gray-200 text-sm w-full md:w-64" placeholder="Search messages...">
                        </div>
                    </div>
                    <div class="p-5 space-y-3 max-h-[500px] overflow-y-auto">
                        @foreach ($messages as $message)
                            <div x-show="searchMessages === '' || '{{ strtolower($message->name) }} {{ strtolower($message->email) }} {{ strtolower($message->message) }}'.includes(searchMessages.toLowerCase())"
                                 class="p-4 rounded-xl border-l-4 border-[#0070f3] bg-white shadow-sm hover:translate-x-1 transition">
                                <div class="flex flex-wrap justify-between gap-2 mb-2">
                                    <h6 class="font-bold">{{ $message->name }}</h6>
                                    <div class="text-xs text-gray-500 flex gap-3">
                                        <span>{{ $message->email }}</span>
                                        <span>{{ $message->number }}</span>
                                    </div>
                                </div>
                                <p class="text-sm text-gray-600 mb-3">{{ $message->message }}</p>
                                <form action="{{ route('contact.destroy', $message->id) }}" method="POST" @submit.prevent="if(confirm('Delete this message?')) $el.submit()">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-xs text-red-500 hover:text-red-700 font-semibold">Delete</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div x-show="showUserModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4" @click.away="showUserModal = false">
                <div class="absolute inset-0 bg-black/50"></div>
                <div class="bg-white rounded-2xl max-w-md w-full p-6 relative z-10 shadow-2xl" @click.stop>
                    <div class="flex justify-between items-center mb-4">
                        <h5 class="text-xl font-extrabold">Add New User</h5>
                        <button @click="showUserModal = false" class="text-2xl">&times;</button>
                    </div>
                    <form action="{{ route('store_users') }}" method="POST" @submit="$el.submit()">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs font-bold uppercase text-gray-500 mb-2">Full Name</label>
                                <input type="text" name="name" x-model="newUser.name" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition" required>
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase text-gray-500 mb-2">Email Address</label>
                                <input type="email" name="email" x-model="newUser.email" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition" required>
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase text-gray-500 mb-2">Phone Number</label>
                                <input type="tel" name="phone" x-model="newUser.phone" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition" required>
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase text-gray-500 mb-2">Role</label>
                                <select name="role" x-model="newUser.role" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition bg-white" required>
                                    <option value="writer">Writer</option>
                                    <option value="guest">Guest</option>
                                    <option value="writer">Admin</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-xs font-bold uppercase text-gray-500 mb-2">Password</label>
                                <input type="text" name="password" x-model="newUser.password" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition" required>
                            </div>
                            <button type="submit" class="w-full bg-[#0070f3] hover:bg-blue-700 text-white font-bold py-3 rounded-full transition mt-2">
                                Add User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateRole(userId, newRole) {
            fetch(`/update-role/${userId}`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
                },
                body: JSON.stringify({ role: newRole })
            })
                .then(r => r.json())
                .then(d => alert(d.message))
                .catch(e => alert("Update Error"));
        }
    </script>
@endsection
