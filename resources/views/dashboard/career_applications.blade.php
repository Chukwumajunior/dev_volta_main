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
    showExportMenu: false
}" class="bg-[#fcfdfe] text-[#0a2540] overflow-hidden">

        <section class="relative pt-24 pb-12" style="background: linear-gradient(135deg, #fff 0%, #eef6ff 100%); border-bottom: 1px solid rgba(0, 112, 243, 0.1);">
            <div class="container max-w-7xl mx-auto px-4">
                <nav class="mb-4">
                    <ol class="flex items-center space-x-2 text-sm">
                        <li><a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-[#0070f3] transition">Systems</a></li>
                        <li class="text-gray-400">/</li>
                        <li class="text-[#0a2540] font-semibold">Talent Pipeline</li>
                    </ol>
                </nav>
                <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4">
                    <div>
                        <h1 class="text-3xl md:text-4xl font-extrabold mb-2">Career Applications</h1>
                        <p class="text-gray-600">Manage batch enrollments and specialized career track recruitment.</p>
                    </div>
                    <div class="text-left md:text-right">
                        <span class="inline-block bg-[#0070f3] text-white rounded-full px-4 py-2 text-sm font-semibold">Total: {{ $applications->total() }} Profiles</span>
                    </div>
                </div>
            </div>
        </section>

        <div class="container max-w-7xl mx-auto px-4 py-8">
            @if(session('success'))
                <div class="bg-green-50 border border-green-200 rounded-xl p-4 mb-5 flex items-center" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
                    <i class="bi bi-check-circle-fill text-green-600 mr-3"></i>
                    <span class="text-green-700">{{ session('success') }}</span>
                </div>
            @endif

            <div class="grid lg:grid-cols-12 gap-6">
                <!-- Left Sidebar -->
                <div class="lg:col-span-4 space-y-5">
                    <!-- Network Broadcast -->
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden">
                        <div class="px-5 py-4 bg-gray-50 border-b border-gray-100">
                            <h6 class="font-extrabold uppercase text-sm flex items-center"><i class="bi bi-megaphone mr-2 text-[#0070f3]"></i>Network Broadcast</h6>
                        </div>
                        <div class="p-5">
                            <form method="POST" action="{{ route('admin.messages.send') }}" @submit="$el.submit()">
                                @csrf
                                <div class="space-y-4">
                                    <div>
                                        <label class="block text-xs font-bold uppercase text-gray-500 mb-2">Recipient Protocol</label>
                                        <select name="recipient_type" x-model="recipientType" class="w-full px-3 py-2.5 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition bg-white">
                                            <option value="all">Global (All Students)</option>
                                            <option value="track">Track Specific</option>
                                            <option value="student">Direct (Single Student)</option>
                                        </select>
                                    </div>

                                    <div x-show="recipientType === 'track'" x-cloak x-transition>
                                        <label class="block text-xs font-bold uppercase text-gray-500 mb-2">Select Career Track</label>
                                        <select name="track_id" x-model="trackId" class="w-full px-3 py-2.5 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition bg-white">
                                            @foreach($tracks as $track)
                                                <option value="{{ $track->id }}">{{ $track->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div x-show="recipientType === 'student'" x-cloak x-transition>
                                        <label class="block text-xs font-bold uppercase text-gray-500 mb-2">User Email Address</label>
                                        <input type="email" name="student_email" x-model="studentEmail" class="w-full px-3 py-2.5 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition" placeholder="user@voltafrik.com">
                                    </div>

                                    <div>
                                        <label class="block text-xs font-bold uppercase text-gray-500 mb-2">Transmission Body</label>
                                        <textarea name="message" x-model="message" rows="4" class="w-full px-3 py-2.5 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition" placeholder="Enter message..." required></textarea>
                                    </div>

                                    <button type="submit" class="w-full bg-[#0070f3] hover:bg-blue-700 text-white font-bold py-3 rounded-full transition-all hover:-translate-y-1 shadow-md">
                                        Send Transmission
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Enrollment Window -->
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden">
                        <div class="px-5 py-4 bg-gray-50 border-b border-gray-100">
                            <h6 class="font-extrabold uppercase text-sm flex items-center"><i class="bi bi-calendar-event mr-2 text-[#0070f3]"></i>Enrollment Window</h6>
                        </div>
                        <div class="p-5">
                            <form action="{{ route('application-windows.store') }}" method="POST" @submit="$el.submit()">
                                @csrf
                                <div class="space-y-3">
                                    <div>
                                        <label class="block text-xs font-bold uppercase text-gray-500 mb-2">Batch ID</label>
                                        <input type="text" name="batch" class="w-full px-3 py-2.5 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition" placeholder="e.g., A" required>
                                    </div>
                                    <div class="grid grid-cols-2 gap-2">
                                        <div>
                                            <label class="block text-xs font-bold uppercase text-gray-500 mb-2">Open Date</label>
                                            <input type="date" name="start_date" class="w-full px-3 py-2.5 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition" required>
                                        </div>
                                        <div>
                                            <label class="block text-xs font-bold uppercase text-gray-500 mb-2">Close Date</label>
                                            <input type="date" name="end_date" class="w-full px-3 py-2.5 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="w-full border-2 border-[#0a2540] hover:bg-[#0a2540] hover:text-white font-bold py-3 rounded-full transition-all mt-2">
                                        Initialize Window
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Right Content - Applications Table -->
                <div class="lg:col-span-8">
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden">
                        <div class="px-5 py-4 bg-gray-50 border-b border-gray-100 flex flex-wrap gap-3 justify-between items-center">
                            <h6 class="font-extrabold uppercase text-sm">Application Ledger</h6>
                            <div class="flex gap-2">
                                <div class="relative" @click.away="showExportMenu = false">
                                    <button @click="showExportMenu = !showExportMenu" class="bg-green-600 hover:bg-green-700 text-white text-sm font-semibold px-4 py-2 rounded-full transition flex items-center gap-2">
                                        <i class="bi bi-file-earmark-excel"></i> Export
                                    </button>
                                    <div x-show="showExportMenu" x-cloak class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-xl border border-gray-200 py-2 z-20">
                                        <button @click="exportToExcel('current')" class="w-full text-left px-4 py-2 hover:bg-gray-50 text-sm">Current View</button>
                                        <button @click="exportToExcel('all')" class="w-full text-left px-4 py-2 hover:bg-gray-50 text-sm">All Applications</button>
                                    </div>
                                </div>
                                <form method="POST" action="{{ route('admin.careers.clearAll') }}" onsubmit="return confirm('CRITICAL: Purge all selected records?')">
                                    @csrf
                                    <input type="hidden" name="batch" value="{{ request('batch') }}">
                                    <button type="submit" class="border border-red-500 text-red-500 hover:bg-red-500 hover:text-white text-sm font-semibold px-4 py-2 rounded-full transition">
                                        Clear
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Filters -->
                        <div class="p-4 bg-gray-50 border-b border-gray-200">
                            <form method="GET" id="filterForm" class="grid grid-cols-1 md:grid-cols-4 gap-2">
                                <select name="batch" x-model="selectedBatch" class="px-3 py-2 rounded-xl border border-gray-200 text-sm">
                                    <option value="">Select Batch</option>
                                    @foreach(['A', 'B', 'C', 'D'] as $batch)
                                        <option value="{{ $batch }}">Batch {{ $batch }}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="email" x-model="filterEmail" class="px-3 py-2 rounded-xl border border-gray-200 text-sm" placeholder="Filter Email">
                                <input type="text" name="career" x-model="filterCareer" class="px-3 py-2 rounded-xl border border-gray-200 text-sm" placeholder="Career Track">
                                <button type="submit" class="bg-[#0070f3] hover:bg-blue-700 text-white text-sm font-semibold py-2 rounded-xl transition">
                                    Apply Filters
                                </button>
                            </form>
                        </div>

                        <!-- Table -->
                        <div class="overflow-x-auto">
                            <table id="applicationsTable" class="w-full text-sm">
                                <thead class="bg-[#eef6ff] text-[#0070f3] text-xs uppercase font-bold">
                                <tr>
                                    <th class="px-4 py-3 text-left">Applicant</th>
                                    <th class="px-4 py-3 text-left">Contact Path</th>
                                    <th class="px-4 py-3 text-left">Career Track</th>
                                    <th class="px-4 py-3 text-left">Batch</th>
                                    <th class="px-4 py-3 text-left">Fiscal Status</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                @forelse($applications as $app)
                                    <tr class="hover:bg-gray-50 transition">
                                        <td class="px-4 py-3">
                                            <a href="{{ route('admin.student.dashboard', $app->user_id) }}" class="font-bold text-[#0a2540] hover:text-[#0070f3] transition">
                                                {{ $app->first_name }} {{ $app->last_name }}
                                            </a>
                                            <div class="text-xs text-gray-500">{{ $app->gender }} | {{ $app->age }} yrs</div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <div class="text-sm">{{ $app->email }}</div>
                                            <div class="text-xs text-gray-500">{{ $app->number }}</div>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="inline-block bg-gray-100 text-gray-800 text-xs font-semibold px-3 py-1 rounded-full">{{ $app->career }}</span>
                                        </td>
                                        <td class="px-4 py-3 font-semibold">Batch {{ $app->batch }}</td>
                                        <td class="px-4 py-3">
                                            <button @click="openPaymentModal({{ $app->id }}, '{{ $app->first_name }} {{ $app->last_name }}', '{{ $app->paid }}')"
                                                    class="inline-block px-3 py-1.5 rounded-full text-xs font-bold transition hover:opacity-80"
                                                    :class="'{{ $app->paid }}' === 'Paid' ? 'bg-green-600 text-white' : 'bg-yellow-500 text-white'">
                                                {{ $app->paid }}
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-8 text-center text-gray-500">No active applications detected in the ledger.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="px-4 py-3 border-t border-gray-100">
                            {{ $applications->appends(request()->query())->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Payment Modal -->
        <div x-show="showPaymentModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4" @click.away="showPaymentModal = false">
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="bg-white rounded-2xl max-w-md w-full p-6 relative z-10 shadow-2xl" @click.stop>
                <div class="flex justify-between items-center mb-4">
                    <h5 class="text-xl font-extrabold">Verify Fiscal Transaction</h5>
                    <button @click="showPaymentModal = false" class="text-2xl">&times;</button>
                </div>
                <form method="POST" action="{{ route('admin.careers.updatePaid') }}" @submit="$el.submit()">
                    @csrf
                    <input type="hidden" name="id" x-model="paymentId">
                    <div class="space-y-4">
                        <p class="text-sm text-gray-600">Confirming payment status for: <span class="font-bold text-[#0a2540]" x-text="paymentName"></span></p>
                        <div>
                            <label class="block text-xs font-bold uppercase text-gray-500 mb-2">Verification Status</label>
                            <select name="paid" x-model="paymentStatus" class="w-full px-3 py-2.5 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition bg-white" required>
                                <option value="Pending">Pending</option>
                                <option value="Paid">Paid</option>
                                <option value="Failed">Failed</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-gray-500 mb-2">Confirmation Timestamp</label>
                            <input type="datetime-local" name="payment_confirmed_at" class="w-full px-3 py-2.5 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition" required>
                        </div>
                        <div class="flex gap-3 pt-2">
                            <button type="submit" class="flex-1 bg-[#0070f3] hover:bg-blue-700 text-white font-bold py-2.5 rounded-full transition">Commit Record</button>
                            <button type="button" @click="showPaymentModal = false" class="flex-1 border border-gray-300 hover:bg-gray-50 font-bold py-2.5 rounded-full transition">Cancel</button>
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
            const fileName = `E-VOLT_Applications_${type}_${date}.xlsx`;
            const wb = XLSX.utils.table_to_book(table, { sheet: "Applications" });
            XLSX.writeFile(wb, fileName);
        }

        document.addEventListener('alpine:init', () => {
            Alpine.data('dashboard', () => ({
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
            }));
        });
    </script>
@endsection
