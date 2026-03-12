@extends('layouts.app')

@section('title', 'Control Center | Applications')

@section('body-content')
    <div x-data="{
        recipientType: 'all',
        trackId: '',
        studentEmail: '',
        message: '',
        selectedBatch: '{{ request('batch') }}',
        filterEmail: '{{ request('email') }}',
        filterCareer: '{{ request('career') }}',
        showExportMenu: false,
        showPaymentModal: false,
        paymentId: '',
        paymentName: '',
        paymentStatus: 'Pending',

        openPaymentModal(id, name, status) {
            this.paymentId = id;
            this.paymentName = name;
            this.paymentStatus = status;
            this.showPaymentModal = true;
        }
    }" class="bg-[#fcfdfe] text-[#0a2540] min-h-screen">

        <div class="pt-20 pb-6 bg-gradient-to-br from-white to-[#eef6ff] border-b border-blue-100/50">
            <div class="px-4 max-w-7xl mx-auto">
                <div class="flex items-center gap-2 text-sm mb-4 overflow-x-auto whitespace-nowrap pb-1">
                    <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-[#0070f3]">Dashboard</a>
                    <span class="text-gray-400">/</span>
                    <span class="text-[#0a2540] font-semibold">Applications</span>
                </div>

                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end gap-4">
                    <div>
                        <h1 class="text-2xl sm:text-3xl md:text-4xl font-extrabold mb-2">Career Applications</h1>
                        <p class="text-gray-600 text-sm sm:text-base">Manage batch enrollments and specialized career track recruitment.</p>
                    </div>
                    <div class="w-full sm:w-auto">
                        <span class="inline-block bg-[#0070f3] text-white rounded-full px-4 py-2 text-sm font-semibold w-full sm:w-auto text-center">Total: {{ $applications->total() }} Profiles</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="px-4 py-6 max-w-7xl mx-auto">
            @if(session('success'))
                <div class="bg-green-50 border border-green-200 rounded-xl p-4 mb-5 flex items-center" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
                    <span class="text-green-700 text-sm">{{ session('success') }}</span>
                </div>
            @endif

            <div class="flex flex-col lg:flex-row gap-6">
                <div class="w-full lg:w-1/3 space-y-5">
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-lg">
                        <div class="px-4 py-3 bg-gray-50 border-b border-gray-100">
                            <h6 class="font-extrabold text-xs flex items-center"><span class="mr-2 text-[#0070f3]">📢</span>NETWORK BROADCAST</h6>
                        </div>
                        <div class="p-4">
                            <form method="POST" action="{{ route('admin.messages.send') }}" @submit="$el.submit()">
                                @csrf
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-xs font-bold text-gray-500 mb-1">RECIPIENT PROTOCOL</label>
                                        <select name="recipient_type" x-model="recipientType" class="w-full px-3 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none bg-white text-sm">
                                            <option value="all">Global (All Students)</option>
                                            <option value="track">Track Specific</option>
                                            <option value="student">Direct (Single Student)</option>
                                        </select>
                                    </div>

                                    <div x-show="recipientType === 'track'" x-cloak>
                                        <label class="block text-xs font-bold text-gray-500 mb-1">SELECT CAREER TRACK</label>
                                        <select name="track_id" x-model="trackId" class="w-full px-3 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none bg-white text-sm">
                                            @foreach($tracks as $track)
                                                <option value="{{ $track->id }}">{{ $track->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div x-show="recipientType === 'student'" x-cloak>
                                        <label class="block text-xs font-bold text-gray-500 mb-1">USER EMAIL</label>
                                        <input type="email" name="student_email" x-model="studentEmail" class="w-full px-3 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none text-sm" placeholder="user@voltafrik.com">
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold text-gray-500 mb-1">TRANSMISSION BODY</label>
                                        <textarea name="message" x-model="message" rows="4" class="w-full px-3 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none text-sm" placeholder="Enter message..." required></textarea>
                                    </div>

                                    <button type="submit" class="w-full bg-[#0070f3] hover:bg-blue-700 text-white font-bold py-3 rounded-full active:scale-95 transition text-sm">
                                        SEND TRANSMISSION
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="bg-white rounded-2xl border border-gray-100 shadow-lg">
                        <div class="px-4 py-3 bg-gray-50 border-b border-gray-100">
                            <h6 class="font-extrabold text-xs flex items-center"><span class="mr-2 text-[#0070f3]">📅</span>ENROLLMENT WINDOW</h6>
                        </div>
                        <div class="p-4">
                            <form action="{{ route('application-windows.store') }}" method="POST" @submit="$el.submit()">
                                @csrf
                                <div class="space-y-3">
                                    <div>
                                        <label class="block text-xs font-bold text-gray-500 mb-1">BATCH ID</label>
                                        <input type="text" name="batch" class="w-full px-3 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none text-sm" placeholder="e.g., A" required>
                                    </div>
                                    <div class="flex flex-col sm:flex-row gap-2">
                                        <div class="w-full sm:w-1/2">
                                            <label class="block text-xs font-bold text-gray-500 mb-1">OPEN DATE</label>
                                            <input type="date" name="start_date" class="w-full px-3 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none text-sm" required>
                                        </div>
                                        <div class="w-full sm:w-1/2">
                                            <label class="block text-xs font-bold text-gray-500 mb-1">CLOSE DATE</label>
                                            <input type="date" name="end_date" class="w-full px-3 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none text-sm" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="w-full border-2 border-[#0a2540] hover:bg-[#0a2540] hover:text-white font-bold py-3 rounded-full active:scale-95 transition text-sm mt-2">
                                        INITIALIZE WINDOW
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-2/3">
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden">
                        <div class="px-4 py-3 bg-gray-50 border-b border-gray-100">
                            <div class="flex flex-col sm:flex-row gap-3 justify-between items-start sm:items-center">
                                <h6 class="font-extrabold text-xs">APPLICATION LEDGER</h6>
                                <div class="flex gap-2 w-full sm:w-auto">
                                    <div class="relative flex-1 sm:flex-initial" @click.away="showExportMenu = false">
                                        <button @click="showExportMenu = !showExportMenu" class="w-full sm:w-auto bg-green-600 hover:bg-green-700 text-white text-sm font-semibold px-4 py-2 rounded-full flex items-center justify-center gap-2">
                                            <span>📊</span> EXPORT
                                        </button>
                                        <div x-show="showExportMenu" x-cloak class="absolute right-0 left-0 sm:left-auto mt-2 bg-white rounded-xl shadow-xl border border-gray-200 py-2 z-20">
                                            <button @click="exportToExcel('current')" class="w-full text-left px-4 py-2 hover:bg-gray-50 text-sm">Current View</button>
                                            <button @click="exportToExcel('all')" class="w-full text-left px-4 py-2 hover:bg-gray-50 text-sm">All Applications</button>
                                        </div>
                                    </div>
                                    <form method="POST" action="{{ route('admin.careers.clearAll') }}" onsubmit="return confirm('Purge all selected records?')" class="flex-1 sm:flex-initial">
                                        @csrf
                                        <input type="hidden" name="batch" value="{{ request('batch') }}">
                                        <button type="submit" class="w-full border border-red-500 text-red-500 hover:bg-red-500 hover:text-white text-sm font-semibold px-4 py-2 rounded-full">
                                            CLEAR
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="p-4 bg-gray-50 border-b border-gray-200">
                            <form method="GET" id="filterForm" class="flex flex-col sm:flex-row gap-2">
                                <select name="batch" x-model="selectedBatch" class="w-full sm:flex-1 px-3 py-3 rounded-xl border border-gray-200 text-sm bg-white">
                                    <option value="">Select Batch</option>
                                    @foreach(['A', 'B', 'C', 'D'] as $batch)
                                        <option value="{{ $batch }}">Batch {{ $batch }}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="email" x-model="filterEmail" class="w-full sm:flex-1 px-3 py-3 rounded-xl border border-gray-200 text-sm" placeholder="Filter Email">
                                <input type="text" name="career" x-model="filterCareer" class="w-full sm:flex-1 px-3 py-3 rounded-xl border border-gray-200 text-sm" placeholder="Career Track">
                                <button type="submit" class="w-full sm:w-auto bg-[#0070f3] hover:bg-blue-700 text-white text-sm font-semibold px-6 py-3 rounded-xl">
                                    APPLY
                                </button>
                            </form>
                        </div>

                        <div class="overflow-x-auto">
                            <table id="applicationsTable" class="w-full text-sm min-w-[600px]">
                                <thead class="bg-[#eef6ff] text-[#0070f3] text-xs font-bold">
                                <tr>
                                    <th class="px-3 py-3 text-left">APPLICANT</th>
                                    <th class="px-3 py-3 text-left">CONTACT</th>
                                    <th class="px-3 py-3 text-left">TRACK</th>
                                    <th class="px-3 py-3 text-left">BATCH</th>
                                    <th class="px-3 py-3 text-left">STATUS</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                @forelse($applications as $app)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-3 py-3">
                                            <a href="{{ route('admin.student.dashboard', $app->user_id) }}" class="font-bold text-[#0a2540] hover:text-[#0070f3] block text-sm">
                                                {{ $app->first_name }} {{ $app->last_name }}
                                            </a>
                                            <span class="text-xs text-gray-500">{{ $app->gender }} | {{ $app->age }}y</span>
                                        </td>
                                        <td class="px-3 py-3">
                                            <div class="text-sm truncate max-w-[150px]">{{ $app->email }}</div>
                                            <div class="text-xs text-gray-500">{{ $app->number }}</div>
                                        </td>
                                        <td class="px-3 py-3">
                                            <span class="inline-block bg-gray-100 text-gray-800 text-xs font-semibold px-2 py-1 rounded-full">{{ $app->career }}</span>
                                        </td>
                                        <td class="px-3 py-3 font-semibold text-sm">B{{ $app->batch }}</td>
                                        <td class="px-3 py-3">
                                            <button @click="openPaymentModal({{ $app->id }}, '{{ $app->first_name }} {{ $app->last_name }}', '{{ $app->paid }}')"
                                                    class="w-full sm:w-auto px-3 py-1.5 rounded-full text-xs font-bold text-white"
                                                    :class="'{{ $app->paid }}' === 'Paid' ? 'bg-green-600' : 'bg-yellow-500'">
                                                {{ $app->paid }}
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-3 py-8 text-center text-gray-500 text-sm">No active applications detected.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="px-4 py-3 border-t border-gray-100">
                            {{ $applications->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="showPaymentModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4" @click.away="showPaymentModal = false">
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="bg-white rounded-2xl w-full max-w-md mx-4 p-5 relative z-10 shadow-2xl">
                <div class="flex justify-between items-center mb-4">
                    <h5 class="text-lg font-extrabold">Verify Payment</h5>
                    <button @click="showPaymentModal = false" class="text-2xl leading-none">&times;</button>
                </div>
                <form method="POST" action="{{ route('admin.careers.updatePaid') }}" @submit="$el.submit()">
                    @csrf
                    <input type="hidden" name="id" x-model="paymentId">
                    <div class="space-y-4">
                        <p class="text-sm">Student: <span class="font-bold" x-text="paymentName"></span></p>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 mb-1">STATUS</label>
                            <select name="paid" x-model="paymentStatus" class="w-full px-3 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none bg-white text-sm" required>
                                <option value="Pending">Pending</option>
                                <option value="Paid">Paid</option>
                                <option value="Failed">Failed</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-500 mb-1">CONFIRMATION DATE</label>
                            <input type="datetime-local" name="payment_confirmed_at" class="w-full px-3 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none text-sm" required>
                        </div>
                        <div class="flex flex-col sm:flex-row gap-2 pt-2">
                            <button type="submit" class="w-full bg-[#0070f3] hover:bg-blue-700 text-white font-bold py-3 rounded-full text-sm">CONFIRM</button>
                            <button type="button" @click="showPaymentModal = false" class="w-full border border-gray-300 hover:bg-gray-50 font-bold py-3 rounded-full text-sm">CANCEL</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script>
        function exportToExcel(type) {
            const table = document.getElementById("applicationsTable");
            const date = new Date().toISOString().split('T')[0];
            XLSX.writeFile(XLSX.utils.table_to_book(table), `E-VOLT_Applications_${type}_${date}.xlsx`);
        }
    </script>
@endsection
