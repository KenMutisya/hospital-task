@php use App\Models\Enums\BloodGroups;use App\Models\Enums\Gender; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create A new Patient') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="space-y-10 divide-y divide-gray-900/10">

                <div class="grid grid-cols-1 gap-x-8 gap-y-8 pt-10 md:grid-cols-3">
                    <div class="px-4 sm:px-0">
                        <h2 class="text-base font-semibold leading-7 text-gray-900">Patient Information</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Provide this patient's information.</p>
                    </div>

                    <form class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2"
                          method="POST" action="{{ route('patient.store') }}">
                        @csrf
                        <div class="px-4 py-6 sm:p-8">
                            <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                <div class="sm:col-span-3">
                                    <label for="first_name" class="block text-sm font-medium leading-6 text-gray-900">First
                                        name</label>
                                    <div class="mt-2">
                                        <input type="text" name="first_name" id="first_name"
                                               autocomplete="given-name"
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="last_name" class="block text-sm font-medium leading-6 text-gray-900">Last
                                        name</label>
                                    <div class="mt-2">
                                        <input type="text" name="last_name" id="last_name" autocomplete="family-name"
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="phone_number" class="block text-sm font-medium leading-6
                                    text-gray-900">Phone Number</label>
                                    <div class="mt-2">
                                        <input type="text" name="phone_number" id="phone_number"
                                               autocomplete="tel"
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="email" class="block text-sm font-medium leading-6
                                    text-gray-900">Email Address</label>
                                    <div class="mt-2">
                                        <input type="text" name="email" id="email" autocomplete="email"
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="blood_group" class="block text-sm font-medium leading-6
                                    text-gray-900">Blood Group</label>
                                    <div class="mt-2">
                                        <select id="blood_group" name="blood_group"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                            <option value="" disabled selected>Selected Blood Group</option>
                                            @foreach(BloodGroups::cases() as $bloodGroup)
                                                <option value="{{ $bloodGroup->value }}">{{$bloodGroup->value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="sex" class="block text-sm font-medium leading-6
                                    text-gray-900">Gender</label>
                                    <div class="mt-2">
                                        <select id="sex" name="sex" autocomplete="sex"
                                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                            <option value="" disabled selected>Select a Gender</option>
                                            @foreach(Gender::cases() as $gender)
                                                <option value="{{ $gender->value }}">{{$gender->value}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="date_of_birth" class="block text-sm font-medium leading-6
                                    text-gray-900">Date of Birth</label>
                                    <div class="mt-2">
                                        <input type="date" name="date_of_birth" id="date_of_birth"
                                               autocomplete="bday"
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                                <div class="sm:col-span-3">
                                    <label for="address" class="block text-sm font-medium leading-6
                                    text-gray-900">Address</label>
                                    <div class="mt-2">
                                        <input type="text" name="address" id="address" autocomplete="street-address"
                                               class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
                            <a href="{{ route('receptionist.dashboard') }}" class="text-sm font-semibold leading-6
                            text-gray-900">Cancel</a>
                            <button type="submit"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Save
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
