@extends('layouts.app')

@section('title', 'Voltademy | Student Learning Portal')

@section('body-content')
    <div x-data="{
    activeTab: 'overview',
    showPaymentModal: false,
    progressUpdate: { id: null, value: 0 }
}" class="bg-[#fcfdfe] text-[#0a2540] overflow-hidden">

        <section class="relative pt-24 pb-12" style="background: linear-gradient(135deg, #fff 0%, #eef6ff 100%); border-bottom: 1px solid rgba(0, 112, 243, 0.1);">
            <div class="container max-w-7xl mx-auto px-4">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                    <div>
                        <h4 class="text-[#0070f3] font-extrabold uppercase text-xs tracking-wider mb-2">Student Command Center</h4>
                        <h1 class="text-3xl md:text-4xl font-extrabold">Welcome back, {{ explode(' ', $student->name)[0] }}</h1>
                        <p class="text-gray-600">{{ $student->email }}</p>
                    </div>
                    <div>
                    <span class="inline-block bg-white text-[#0070f3] border border-gray-200 px-4 py-2 rounded-full text-sm font-semibold">
                        ID: VOLT-{{ str_pad($student->id, 4, '0', STR_PAD_LEFT) }}
                    </span>
                    </div>
                </div>
            </div>
        </section>

        <div class="container max-w-7xl mx-auto px-4 py-8">
            <!-- Stats Overview -->
            <div class="grid md:grid-cols-3 gap-5 mb-8">
                <div class="bg-white rounded-xl border border-gray-100 p-5 text-center shadow-sm hover:shadow-md transition">
                    <div class="text-[#0070f3] text-xs font-extrabold uppercase mb-2">Enrollment Status</div>
                    <h2 class="text-3xl font-black">{{ $careerApplications->count() }}</h2>
                    <div class="text-sm text-gray-500">Active Tracks</div>
                </div>
                <div class="bg-white rounded-xl border border-gray-100 p-5 text-center shadow-sm hover:shadow-md transition">
                    <div class="text-[#0070f3] text-xs font-extrabold uppercase mb-2">Average Progress</div>
                    <h2 class="text-3xl font-black">{{ round($careerApplications->avg('progress')) ?? 0 }}%</h2>
                    <div class="text-sm text-gray-500">Syllabus Completion</div>
                </div>
                <div class="bg-white rounded-xl border border-gray-100 p-5 text-center shadow-sm hover:shadow-md transition">
                    <div class="text-[#0070f3] text-xs font-extrabold uppercase mb-2">Verified Payments</div>
                    <h2 class="text-3xl font-black">₦{{ number_format($careerApplications->sum('paid')) }}</h2>
                    <div class="text-sm text-gray-500">Total Investment</div>
                </div>
            </div>

            @if($careerApplications->count())
                <!-- Tabs Navigation -->
                <div class="flex gap-2 mb-6 border-b border-gray-200">
                    <button @click="activeTab = 'overview'" class="px-4 py-2 font-semibold text-sm transition" :class="activeTab === 'overview' ? 'text-[#0070f3] border-b-2 border-[#0070f3]' : 'text-gray-500 hover:text-[#0070f3]'">Overview</button>
                    <button @click="activeTab = 'progress'" class="px-4 py-2 font-semibold text-sm transition" :class="activeTab === 'progress' ? 'text-[#0070f3] border-b-2 border-[#0070f3]' : 'text-gray-500 hover:text-[#0070f3]'">Progress Tracker</button>
                    <button @click="activeTab = 'messages'" class="px-4 py-2 font-semibold text-sm transition" :class="activeTab === 'messages' ? 'text-[#0070f3] border-b-2 border-[#0070f3]' : 'text-gray-500 hover:text-[#0070f3]'">Communications</button>
                </div>

                <!-- Overview Tab -->
                <div x-show="activeTab === 'overview'" x-cloak x-transition>
                    <div class="grid lg:grid-cols-2 gap-6">
                        <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden">
                            <div class="px-6 py-4 bg-gray-50 border-b border-gray-100">
                                <h5 class="font-extrabold uppercase text-sm flex items-center gap-2">
                                    <i class="bi bi-journal-bookmark-fill text-[#0070f3]"></i>
                                    Academic Progress Ledger
                                </h5>
                            </div>
                            <div class="p-5 space-y-4">
                                @foreach ($careerApplications as $career)
                                    <div class="border border-gray-100 rounded-xl p-4 hover:shadow-md transition">
                                        <div class="flex justify-between items-start mb-3">
                                            <div>
                                                <h6 class="font-bold">{{ $career->career }}</h6>
                                                <p class="text-xs text-gray-500">Batch {{ $career->batch ?? 'N/A' }} • Enrolled {{ \Carbon\Carbon::parse($career->created_at)->format('d M, Y') }}</p>
                                            </div>
                                            <span class="text-sm font-bold">₦{{ number_format($career->paid ?? 0) }}</span>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <div class="flex-1">
                                                <div class="flex justify-between text-xs mb-1">
                                                    <span class="font-semibold">Progress</span>
                                                    <span class="text-[#0070f3] font-bold">{{ $career->progress ?? 0 }}%</span>
                                                </div>
                                                <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                                                    <div class="h-full bg-gradient-to-r from-[#0070f3] to-cyan-400 rounded-full" style="width: {{ $career->progress ?? 0 }}%"></div>
                                                </div>
                                            </div>
                                            @if(($career->progress ?? 0) == 100)
                                                <i class="bi bi-patch-check-fill text-green-500 text-xl"></i>
                                            @endif
                                        </div>
                                        @if(!$career->paid)
                                            <div class="mt-3 flex justify-between items-center">
                                                <span class="text-xs bg-red-100 text-red-600 px-2 py-1 rounded-full">Payment Pending</span>
                                                <button @click="showPaymentModal = true" class="text-xs text-[#0070f3] font-semibold">Submit Receipt →</button>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Tuition Details -->
                        <div class="bg-[#0a2540] text-white rounded-2xl p-6 shadow-xl">
                            <h5 class="font-bold text-lg mb-4 flex items-center gap-2">
                                <i class="bi bi-bank2"></i>
                                Tuition Verification Details
                            </h5>
                            <div class="space-y-4">
                                <div>
                                    <label class="text-xs text-gray-400 uppercase block mb-1">Financial Institution</label>
                                    <div class="font-bold text-lg">Moniepoint</div>
                                </div>
                                <div>
                                    <label class="text-xs text-gray-400 uppercase block mb-1">Account Holder</label>
                                    <div class="font-bold">VOLTAFRIK TECHNOLOGIES ENTERPRISES</div>
                                </div>
                                <div>
                                    <label class="text-xs text-gray-400 uppercase block mb-1">Account Number</label>
                                    <div class="text-3xl font-black tracking-wider">6210666905</div>
                                </div>
                                <a href="https://wa.me/2349046282789" target="_blank" class="block bg-green-600 hover:bg-green-700 text-white font-bold text-center py-3 rounded-full transition-all hover:-translate-y-1 mt-4">
                                    <i class="bi bi-whatsapp mr-2"></i> Submit Receipt
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Progress Tracker Tab -->
                <div x-show="activeTab === 'progress'" x-cloak x-transition>
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden">
                        <div class="px-6 py-4 bg-gray-50 border-b border-gray-100">
                            <h5 class="font-extrabold uppercase text-sm">Detailed Progress Tracking</h5>
                        </div>
                        <div class="overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead class="bg-[#eef6ff] text-[#0070f3] text-xs uppercase font-bold">
                                <tr>
                                    <th class="px-5 py-3 text-left">Career Track</th>
                                    <th class="px-5 py-3 text-left">Enrolled</th>
                                    <th class="px-5 py-3 text-left">Fiscal Status</th>
                                    <th class="px-5 py-3 text-left">Current Milestone</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-100">
                                @foreach ($careerApplications as $career)
                                    <tr>
                                        <td class="px-5 py-3">
                                            <div class="font-bold">{{ $career->career }}</div>
                                            <div class="text-xs text-gray-500">Batch {{ $career->batch ?? 'N/A' }}</div>
                                        </td>
                                        <td class="px-5 py-3 text-sm">{{ \Carbon\Carbon::parse($career->created_at)->format('d M, Y') }}</td>
                                        <td class="px-5 py-3">
                                            <div class="font-bold">₦{{ number_format($career->paid ?? 0) }}</div>
                                            @if(!$career->paid)
                                                <span class="text-xs bg-red-100 text-red-600 px-2 py-0.5 rounded-full">Payment Pending</span>
                                            @endif
                                        </td>
                                        <td class="px-5 py-3 min-w-[200px]">
                                            <div class="flex items-center gap-3">
                                                <div class="flex-1">
                                                    <div class="flex justify-between text-xs mb-1">
                                                        <span class="font-semibold">{{ $career->progress ?? 0 }}%</span>
                                                        @if(auth()->user()->role === 'admin')
                                                            <button @click="progressUpdate = { id: {{ $career->id }}, value: {{ $career->progress ?? 0 }} }; $dispatch('open-progress-modal')" class="text-[#0070f3] text-xs hover:underline">Edit</button>
                                                        @endif
                                                    </div>
                                                    <div class="h-2 bg-gray-200 rounded-full overflow-hidden">
                                                        <div class="h-full bg-gradient-to-r from-[#0070f3] to-cyan-400 rounded-full" style="width: {{ $career->progress ?? 0 }}%"></div>
                                                    </div>
                                                </div>
                                                @if(($career->progress ?? 0) == 100)
                                                    <i class="bi bi-patch-check-fill text-green-500 text-lg"></i>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Messages Tab -->
                <div x-show="activeTab === 'messages'" x-cloak x-transition>
                    <div class="bg-white rounded-2xl border border-gray-100 shadow-lg overflow-hidden">
                        <div class="px-6 py-4 bg-gray-50 border-b border-gray-100">
                            <h5 class="font-extrabold uppercase text-sm flex items-center gap-2">
                                <i class="bi bi-chat-dots text-[#0070f3]"></i>
                                Internal Communications
                            </h5>
                        </div>
                        <div class="p-5 space-y-3 max-h-[500px] overflow-y-auto">
                            @if(!empty($messages))
                                @php $uniqueMessages = collect($messages)->unique('message')->values(); @endphp
                                @foreach($uniqueMessages as $msg)
                                    <div class="border-l-4 border-[#0070f3] bg-white rounded-r-xl p-4 shadow-sm hover:translate-x-1 transition">
                                        <div class="flex justify-between items-center mb-2">
                                            <span class="font-bold text-[#0070f3] text-sm">Mgt. Transmission</span>
                                            <span class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($msg['sent_at'])->format('d M, h:i A') }}</span>
                                        </div>
                                        <p class="text-sm text-gray-700">{{ $msg['message'] }}</p>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center py-8 text-gray-500">
                                    <i class="bi bi-mailbox text-4xl mb-3 block"></i>
                                    <p>No new transmissions found.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            @else
                <!-- No Enrollments -->
                <div class="bg-white rounded-2xl border border-gray-100 shadow-lg p-12 text-center">
                    <i class="bi bi-journals text-5xl text-gray-300 mb-4 block"></i>
                    <h4 class="text-2xl font-bold mb-2">No Active Enrollments</h4>
                    <p class="text-gray-600 mb-6">You are not currently registered for any E-VOLT technical tracks.</p>
                    <a href="/" class="inline-block bg-[#0070f3] hover:bg-blue-700 text-white font-bold px-8 py-3 rounded-full transition-all hover:-translate-y-1 shadow-lg">
                        Explore Courses
                    </a>
                </div>
            @endif
        </div>

        <!-- Payment Modal -->
        <div x-show="showPaymentModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4" @click.away="showPaymentModal = false">
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="bg-white rounded-2xl max-w-md w-full p-6 relative z-10 shadow-2xl" @click.stop>
                <div class="flex justify-between items-center mb-4">
                    <h5 class="text-xl font-extrabold">Submit Payment Receipt</h5>
                    <button @click="showPaymentModal = false" class="text-2xl">&times;</button>
                </div>
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold uppercase text-gray-500 mb-2">Transaction Reference</label>
                            <input type="text" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition" required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-gray-500 mb-2">Upload Receipt</label>
                            <input type="file" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition" accept="image/*,.pdf" required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold uppercase text-gray-500 mb-2">Amount Paid</label>
                            <input type="number" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition" placeholder="₦" required>
                        </div>
                        <button type="submit" class="w-full bg-[#0070f3] hover:bg-blue-700 text-white font-bold py-3 rounded-full transition mt-2">
                            Submit for Verification
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Progress Modal (Admin Only) -->
        @if(auth()->user()->role === 'admin')
            <div x-data="{ open: false }" @open-progress-modal.window="open = true" x-show="open" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4" @click.away="open = false">
                <div class="absolute inset-0 bg-black/50"></div>
                <div class="bg-white rounded-2xl max-w-md w-full p-6 relative z-10 shadow-2xl" @click.stop>
                    <div class="flex justify-between items-center mb-4">
                        <h5 class="text-xl font-extrabold">Update Milestone Progress</h5>
                        <button @click="open = false" class="text-2xl">&times;</button>
                    </div>
                    <form method="POST" action="{{ route('career.update.progress') }}">
                        @csrf
                        <input type="hidden" name="career_id" :value="progressUpdate.id">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-xs font-bold uppercase text-gray-500 mb-2">Percentage Completion (%)</label>
                                <input type="number" name="progress" x-model="progressUpdate.value" class="w-full px-4 py-2.5 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition" max="100" min="0" required>
                                <p class="text-xs text-gray-500 mt-2">Adjusting this will reflect on the student's dashboard immediately.</p>
                            </div>
                            <button type="submit" class="w-full bg-[#0070f3] hover:bg-blue-700 text-white font-bold py-3 rounded-full transition">
                                Commit Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection
