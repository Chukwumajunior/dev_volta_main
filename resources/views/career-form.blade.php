@extends('layouts.app')

@section('title', 'Enrollment Protocol | Voltademy')

@section('body-content')
    <div x-data="enrollmentForm()" x-init="init" @keydown.escape="showModal = false" class="bg-[#fcfdfe] text-[#0a2540]">
        <section class="pt-28 pb-16 text-white" style="background: linear-gradient(135deg, rgba(10, 37, 64, 0.9) 0%, rgba(0, 112, 243, 0.8) 100%), url('{{ asset('assets/img/contact-page-title-bg.jpg') }}') center/cover no-repeat;">
            <div class="container max-w-7xl mx-auto px-4 text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold mb-2 text-white">Technical Track Enrollment</h1>
                <p class="text-gray-200">Initialize your professional trajectory within the E-VOLT ecosystem.</p>
            </div>
        </section>

        <div class="container max-w-7xl mx-auto px-4 mb-20">
            <div class="max-w-4xl mx-auto">
                @if($errors->any())
                    <div class="bg-red-50 border border-red-200 rounded-2xl p-4 mb-6 shadow-sm" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
                        <ul class="text-sm font-semibold text-red-600 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="bg-white rounded-3xl border border-gray-100 shadow-xl p-8 md:p-10 -mt-16 relative z-10">
                    <form method="POST" action="{{ route('career.submit') }}" @submit.prevent="validateForm">
                        @csrf

                        <div class="space-y-8">
                            <div>
                                <span class="text-[#0070f3] font-extrabold text-xs uppercase tracking-wider block border-b-2 border-[#eef6ff] pb-2 mb-6">Personal Identity Profile</span>
                                <div class="grid md:grid-cols-2 gap-5">
                                    <div>
                                        <label class="font-bold text-xs uppercase tracking-wide text-gray-600 block mb-2">Given Name</label>
                                        <input type="text" name="first_name" x-model="form.first_name" @blur="validateField('first_name')" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition" placeholder="First Name" required>
                                        <template x-if="errors.first_name">
                                            <span class="text-red-500 text-xs font-bold mt-1 block" x-text="errors.first_name"></span>
                                        </template>
                                    </div>
                                    <div>
                                        <label class="font-bold text-xs uppercase tracking-wide text-gray-600 block mb-2">Surname</label>
                                        <input type="text" name="last_name" x-model="form.last_name" @blur="validateField('last_name')" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition" placeholder="Last Name" required>
                                        <template x-if="errors.last_name">
                                            <span class="text-red-500 text-xs font-bold mt-1 block" x-text="errors.last_name"></span>
                                        </template>
                                    </div>
                                    <div>
                                        <label class="font-bold text-xs uppercase tracking-wide text-gray-600 block mb-2">Communication Email</label>
                                        <input type="email" name="email" x-model="form.email" @blur="validateField('email')" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition" placeholder="example@voltafrik.com" required>
                                        <template x-if="errors.email">
                                            <span class="text-red-500 text-xs font-bold mt-1 block" x-text="errors.email"></span>
                                        </template>
                                    </div>
                                    <div>
                                        <label class="font-bold text-xs uppercase tracking-wide text-gray-600 block mb-2">Mobile Contact</label>
                                        <input type="text" name="number" x-model="form.number" @blur="validateField('number')" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition" placeholder="+234..." required>
                                        <template x-if="errors.number">
                                            <span class="text-red-500 text-xs font-bold mt-1 block" x-text="errors.number"></span>
                                        </template>
                                    </div>
                                    <div>
                                        <label class="font-bold text-xs uppercase tracking-wide text-gray-600 block mb-2">Gender</label>
                                        <select name="gender" x-model="form.gender" @change="validateField('gender')" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition bg-white" required>
                                            <option value="">Select</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                        <template x-if="errors.gender">
                                            <span class="text-red-500 text-xs font-bold mt-1 block" x-text="errors.gender"></span>
                                        </template>
                                    </div>
                                    <div>
                                        <label class="font-bold text-xs uppercase tracking-wide text-gray-600 block mb-2">Current Age</label>
                                        <input type="number" name="age" x-model="form.age" @blur="validateField('age')" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition" min="15" required>
                                        <template x-if="errors.age">
                                            <span class="text-red-500 text-xs font-bold mt-1 block" x-text="errors.age"></span>
                                        </template>
                                    </div>
                                    <div>
                                        <label class="font-bold text-xs uppercase tracking-wide text-gray-600 block mb-2">Residential City</label>
                                        <input type="text" name="residential_city" x-model="form.residential_city" @blur="validateField('residential_city')" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition" placeholder="City, Country" required>
                                        <template x-if="errors.residential_city">
                                            <span class="text-red-500 text-xs font-bold mt-1 block" x-text="errors.residential_city"></span>
                                        </template>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <span class="text-[#0070f3] font-extrabold text-xs uppercase tracking-wider block border-b-2 border-[#eef6ff] pb-2 mb-6">Career Track & Status</span>
                                <div class="grid md:grid-cols-2 gap-5">
                                    <div>
                                        <label class="font-bold text-xs uppercase tracking-wide text-gray-600 block mb-2">Employment Classification</label>
                                        <select name="employment_status" x-model="form.employment_status" @change="validateField('employment_status')" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition bg-white" required>
                                            <option value="">Select Status</option>
                                            <option value="Student">Student</option>
                                            <option value="Unemployed">Unemployed</option>
                                            <option value="Employed">Employed</option>
                                            <option value="Freelancer">Freelancer</option>
                                        </select>
                                        <template x-if="errors.employment_status">
                                            <span class="text-red-500 text-xs font-bold mt-1 block" x-text="errors.employment_status"></span>
                                        </template>
                                    </div>
                                    <div>
                                        <label class="font-bold text-xs uppercase tracking-wide text-gray-600 block mb-2">Primary Career Track</label>
                                        <select name="career" x-model="form.career" @change="validateField('career')" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-[#0070f3] focus:ring-4 focus:ring-blue-100 outline-none transition bg-white" required>
                                            <option value="">Select Specialization</option>
                                            @foreach ($tracks as $track)
                                                <option value="{{ $track }}">{{ $track }}</option>
                                            @endforeach
                                        </select>
                                        <template x-if="errors.career">
                                            <span class="text-red-500 text-xs font-bold mt-1 block" x-text="errors.career"></span>
                                        </template>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center pt-4">
                                <div class="bg-gray-50 rounded-2xl p-4 mb-6 border-l-4 border-[#0070f3] text-left">
                                    <i class="bi bi-info-circle text-[#0070f3] mr-2"></i>
                                    <span class="text-sm font-bold text-gray-600">{{ $note }}</span>
                                </div>
                                <button type="button" @click="openModal" class="bg-[#0070f3] hover:bg-blue-700 text-white font-bold px-12 py-4 rounded-full uppercase tracking-wider transition-all hover:-translate-y-1 shadow-lg hover:shadow-xl">Submit Application</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div x-show="showModal" x-cloak class="fixed inset-0 z-50 flex items-center justify-center p-4" @click.away="showModal = false">
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="bg-white rounded-2xl max-w-md w-full p-6 relative z-10 shadow-2xl" @click.stop>
                <div class="text-right">
                    <button @click="showModal = false" class="text-2xl">&times;</button>
                </div>
                <div class="text-center py-4">
                    <i class="bi bi-file-earmark-check text-[#0070f3] text-5xl mb-4"></i>
                    <h5 class="font-extrabold text-xl mb-3">Data Confirmation</h5>
                    <p class="text-gray-600 text-sm mb-4">By proceeding, you acknowledge that all provided data is accurate and you agree to the <a href="terms-&-conditions" target="_blank" class="text-[#0070f3] font-bold hover:underline">Voltademy Enrollment Terms</a>.</p>
                    <div class="space-y-3">
                        <button @click="submitForm" class="w-full bg-[#0070f3] hover:bg-blue-700 text-white font-bold py-3 rounded-full transition">Confirm & Initialize</button>
                        <button @click="showModal = false" class="w-full text-sm text-gray-500 hover:text-gray-700 transition">Revise Details</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function enrollmentForm() {
            return {
                form: {
                    first_name: '{{ old('first_name') }}',
                    last_name: '{{ old('last_name') }}',
                    email: '{{ old('email') }}',
                    number: '{{ old('number') }}',
                    gender: '{{ old('gender') }}',
                    age: '{{ old('age') }}',
                    residential_city: '{{ old('residential_city') }}',
                    employment_status: '{{ old('employment_status') }}',
                    career: '{{ old('career') }}'
                },
                errors: {},
                showModal: false,
                validateField(field) {
                    this.errors[field] = '';
                    const value = this.form[field];
                    if (!value || value.trim === '') {
                        this.errors[field] = 'This field is required';
                    }
                    if (field === 'email' && value && !/^\S+@\S+\.\S+$/.test(value)) {
                        this.errors[field] = 'Invalid email format';
                    }
                    if (field === 'age' && value && parseInt(value) < 15) {
                        this.errors[field] = 'Minimum age is 15 years';
                    }
                },
                validateForm() {
                    this.errors = {};
                    Object.keys(this.form).forEach(key => {
                        this.validateField(key);
                    });
                    const hasErrors = Object.values(this.errors).some(e => e && e.length > 0);
                    if (!hasErrors) {
                        this.openModal();
                    }
                },
                openModal() {
                    this.validateForm();
                    const hasErrors = Object.values(this.errors).some(e => e && e.length > 0);
                    if (!hasErrors) {
                        this.showModal = true;
                    }
                },
                submitForm() {
                    document.querySelector('form').submit();
                }
            }
        }
    </script>
@endsection
