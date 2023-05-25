@php use App\Models\Enums\AppointmentStatus; @endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">Upcoming Appointments</h1>
                        <p class="mt-2 text-sm text-gray-700">
                            A list of the upcoming appointments that need your action.
                        </p>
                    </div>

                </div>
                <div class="mt-8 flow-root">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                            Patient Name
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Ticket Number
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Status
                                        </th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Action</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    @forelse($appointments as $appointment)
                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                {{ $appointment->patient->name }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ $appointment->ticket_number }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                                @if($appointment->status === AppointmentStatus::PENDING->value)
                                                    <span class="inline-flex items-center rounded-md bg-orange-50 px-2
                                                    py-1 text-xs font-medium text-orange-700 ring-1 ring-inset
                                                    ring-orange-600/20">
                                                        {{AppointmentStatus::PENDING->value}}
                                                    </span>
                                                @elseif($appointment->status === AppointmentStatus::IN_PROGRESS->value)
                                                    <span class="inline-flex items-center rounded-md bg-blue-50 px-2
                                                    py-1 text-xs font-medium text-blue-700 ring-1 ring-inset
                                                    ring-blue-600/20">
                                                        {{AppointmentStatus::IN_PROGRESS->value}}
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center rounded-md bg-green-50 px-2
                                                py-1 text-xs font-medium text-green-700 ring-1 ring-inset
                                                ring-green-600/20">Done</span>
                                                @endif
                                            </td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <a href="{{ route('labtech.consult',$appointment->id) }}"
                                                   class="text-indigo-600
                                                hover:text-indigo-900">
                                                    See Patient
                                                    <span class="sr-only">See Patient</span>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">
                                                <div class="text-center mt-5 mb-5">
                                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none"
                                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                        <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                                                    </svg>
                                                    <h3 class="mt-2 text-sm font-semibold text-gray-900">No
                                                        upcoming appointments at the moment</h3>
                                                    <p class="mt-1 text-sm text-gray-500">We will automatically
                                                        refresh the feed once an appointment is made
                                                        .</p>
                                                </div>
                                            </td>
                                        </tr>

                                    @endforelse
                                    </tbody>
                                </table>
                                <div class="m-3">
                                    {{ $appointments->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="px-4 sm:px-6 lg:px-8 mt-10">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-gray-900">My Appointments</h1>
                        <p class="mt-2 text-sm text-gray-700">
                            A list of the appointments that I am working/worked on.
                        </p>
                    </div>

                </div>
                <div class="mt-8 flow-root">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                            Patient Name
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Ticket Number
                                        </th>
                                        <th scope="col"
                                            class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                            Status
                                        </th>
                                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                            <span class="sr-only">Action</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200 bg-white">
                                    @forelse($myappointments as $appointment)
                                        <tr>
                                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                                {{ $appointment->patient->name }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                {{ $appointment->ticket_number }}
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                                @if($appointment->status === AppointmentStatus::PENDING->value)
                                                    <span class="inline-flex items-center rounded-md bg-orange-50 px-2
                                                    py-1 text-xs font-medium text-orange-700 ring-1 ring-inset
                                                    ring-orange-600/20">
                                                        {{AppointmentStatus::PENDING->value}}
                                                    </span>
                                                @elseif($appointment->status === AppointmentStatus::IN_PROGRESS->value)
                                                    <span class="inline-flex items-center rounded-md bg-blue-50 px-2
                                                    py-1 text-xs font-medium text-blue-700 ring-1 ring-inset
                                                    ring-blue-600/20">
                                                        {{AppointmentStatus::IN_PROGRESS->value}}
                                                    </span>
                                                @else
                                                    <span class="inline-flex items-center rounded-md bg-green-50 px-2
                                                py-1 text-xs font-medium text-green-700 ring-1 ring-inset
                                                ring-green-600/20">Done</span>
                                                @endif
                                            </td>
                                            <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                                <a href="{{ route('labtech.consult',$appointment->id) }}"
                                                   class="text-indigo-600
                                                hover:text-indigo-900">
                                                    See Patient
                                                    <span class="sr-only">See Patient</span>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">
                                                <div class="text-center mt-5 mb-5">
                                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none"
                                                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                        <path vector-effect="non-scaling-stroke" stroke-linecap="round"
                                                              stroke-linejoin="round" stroke-width="2"
                                                              d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"/>
                                                    </svg>
                                                    <h3 class="mt-2 text-sm font-semibold text-gray-900">No
                                                        upcoming appointments at the moment</h3>
                                                    <p class="mt-1 text-sm text-gray-500">We will automatically
                                                        refresh the feed once an appointment is made
                                                        .</p>
                                                </div>
                                            </td>
                                        </tr>

                                    @endforelse
                                    </tbody>
                                </table>
                                <div class="m-3">
                                    {{ $appointments->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
