@php use App\Models\Enums\AppointmentStatus; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Patient') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex">
                <div class="w-1/2">
                    <div class="lg:col-start-3 lg:row-end-1">
                        <h2 class="sr-only">Summary</h2>
                        <div class="rounded-lg bg-gray-50 shadow-sm ring-1 ring-gray-900/5">
                            <dl class="flex flex-wrap">
                                <div class="flex-auto pl-6 pt-6 px-6">
                                    <dt class="text-sm font-semibold leading-6 text-gray-900">Patient Information</dt>
                                </div>
                                <div class="mt-6 flex w-full flex-none gap-x-4 border-t border-gray-900/5 px-6 pt-6">
                                    <dt class="flex-none">
                                        <span class="sr-only">Client</span>
                                        <svg class="h-6 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                             aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-5.5-2.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zM10 12a5.99 5.99 0 00-4.793 2.39A6.483 6.483 0 0010 16.5a6.483 6.483 0 004.793-2.11A5.99 5.99 0 0010 12z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </dt>
                                    <dd class="text-sm font-medium leading-6 text-gray-900">
                                        {{ $appointment->patient->name }}
                                    </dd>
                                </div>
                                <div class="mt-4 flex w-full flex-none gap-x-4 px-6">
                                    <dt class="flex-none">
                                        <span class="sr-only">Due date</span>
                                        <svg class="h-6 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                             aria-hidden="true">
                                            <path d="M5.25 12a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H6a.75.75 0 01-.75-.75V12zM6 13.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V14a.75.75 0 00-.75-.75H6zM7.25 12a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H8a.75.75 0 01-.75-.75V12zM8 13.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V14a.75.75 0 00-.75-.75H8zM9.25 10a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H10a.75.75 0 01-.75-.75V10zM10 11.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V12a.75.75 0 00-.75-.75H10zM9.25 14a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H10a.75.75 0 01-.75-.75V14zM12 9.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V10a.75.75 0 00-.75-.75H12zM11.25 12a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H12a.75.75 0 01-.75-.75V12zM12 13.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V14a.75.75 0 00-.75-.75H12zM13.25 10a.75.75 0 01.75-.75h.01a.75.75 0 01.75.75v.01a.75.75 0 01-.75.75H14a.75.75 0 01-.75-.75V10zM14 11.25a.75.75 0 00-.75.75v.01c0 .414.336.75.75.75h.01a.75.75 0 00.75-.75V12a.75.75 0 00-.75-.75H14z"/>
                                            <path fill-rule="evenodd"
                                                  d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </dt>
                                    <dd class="text-sm leading-6 text-gray-500">
                                        <time datetime="{{ $appointment->patient->date_of_birth }}">
                                            {{ $appointment->patient->date_of_birth }}
                                            <small>({{ $appointment->patient->date_of_birth?->diffInYears() }}years
                                                old)</small>
                                        </time>
                                    </dd>
                                </div>
                                <div class="mt-4 flex w-full flex-none gap-x-4 px-6">
                                    <dt class="flex-none">
                                        <span class="sr-only">Status</span>
                                        <svg class="h-6 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                             aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                  d="M2.5 4A1.5 1.5 0 001 5.5V6h18v-.5A1.5 1.5 0 0017.5 4h-15zM19 8.5H1v6A1.5 1.5 0 002.5 16h15a1.5 1.5 0 001.5-1.5v-6zM3 13.25a.75.75 0 01.75-.75h1.5a.75.75 0 010 1.5h-1.5a.75.75 0 01-.75-.75zm4.75-.75a.75.75 0 000 1.5h3.5a.75.75 0 000-1.5h-3.5z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </dt>
                                    <dd class="text-sm leading-6 text-gray-500">{{ $appointment->patient->phone_number }}</dd>
                                </div>
                            </dl>
                            <div class="mt-6 border-t border-gray-900/5 px-6 py-6">
                                <a href="{{ route('doctor.labreport',$appointment) }}" class="text-sm font-semibold leading-6
                                text-gray-900">Request Lab
                                    Report
                                    <span aria-hidden="true">&rarr;</span></a>
                            </div>
                        </div>
                    </div>

                    @foreach($labreports as $report)
                        <div class="mt-10">
                            <div class="overflow-hidden rounded-lg bg-white shadow">
                                <div class="px-4 py-5 sm:px-6">
                                    Lab Report {{ $report->status }}
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                                    {{ $report->diagonsis }}
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>
                <div class="w-1/2 ml-6">

                    <form action="{{ route('doctor.store') }}" method="POST">
                        @csrf
                        <div>
                            <label for="comment" class="block text-sm font-medium leading-6 text-gray-900">Diagnosis</label>
                            <div class="mt-2">
                            <textarea rows="4" name="comment" id="comment"
                                      class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                            </div>
                        </div>

                        <div class="mt-5">
                            <label for="comment" class="block text-sm font-medium leading-6
                        text-gray-900">Prescription</label>
                            <div class="mt-2">
                            <textarea rows="4" name="comment" id="comment"
                                      class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                            </div>
                        </div>

                        <div class="mt-3 flex justify-end">
                            <button type="button"
                                    class="inline-flex items-center gap-x-1.5 rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                Generate Medical Report &nbsp;
                                <svg class="-mr-0.5 h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
