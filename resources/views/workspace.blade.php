<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Workspace') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Stat Cards --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                {{-- Total Tasks --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center gap-4">
                    <div class="flex-shrink-0 w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">{{ __('Total Tasks') }}</p>
                        <p class="text-2xl font-semibold text-gray-900">24</p>
                    </div>
                </div>

                {{-- Completed Tasks --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center gap-4">
                    <div class="flex-shrink-0 w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">{{ __('Completed') }}</p>
                        <p class="text-2xl font-semibold text-gray-900">14</p>
                    </div>
                </div>

                {{-- Pending Tasks --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center gap-4">
                    <div class="flex-shrink-0 w-12 h-12 rounded-full bg-yellow-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-600" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6l4 2m6-2a10 10 0 11-20 0 10 10 0 0120 0z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">{{ __('Pending') }}</p>
                        <p class="text-2xl font-semibold text-gray-900">7</p>
                    </div>
                </div>

                {{-- Overdue Tasks --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex items-center gap-4">
                    <div class="flex-shrink-0 w-12 h-12 rounded-full bg-red-100 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">{{ __('Overdue') }}</p>
                        <p class="text-2xl font-semibold text-gray-900">3</p>
                    </div>
                </div>
            </div>

            {{-- Tasks Table --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800">{{ __('Recent Tasks') }}</h3>

                        <a href="#"
                            class="inline-flex items-center gap-1.5 px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            {{ __('Task') }}
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Task Name') }}</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Status') }}</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Due Date') }}</th>
                                    <th
                                        class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Completed On') }}</th>

                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                <tr>
                                    <td class="px-4 py-3 text-sm text-gray-900 whitespace-nowrap">Design landing page
                                        mockup</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">{{ __('Completed') }}</span>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-500 whitespace-nowrap">Aug 02, 2026</td>
                                    <td class="px-4 py-3 text-sm text-gray-500 whitespace-nowrap">6 days ago</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 text-sm text-gray-900 whitespace-nowrap">Set up database
                                        migrations</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">{{ __('Completed') }}</span>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-500 whitespace-nowrap">Aug 04, 2026</td>
                                    <td class="px-4 py-3 text-sm text-gray-500 whitespace-nowrap">5 minutes ago</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 text-sm text-gray-900 whitespace-nowrap">Implement
                                        authentication flow</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">{{ __('Pending') }}</span>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-500 whitespace-nowrap">Aug 10, 2026 &middot;
                                        2 days remaining</td>
                                    <td class="px-4 py-3 text-sm text-gray-400 whitespace-nowrap">&mdash;</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 text-sm text-gray-900 whitespace-nowrap">Write API
                                        documentation</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">{{ __('Pending') }}</span>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-500 whitespace-nowrap">Aug 12, 2026 &middot;
                                        4 days remaining</td>
                                    <td class="px-4 py-3 text-sm text-gray-400 whitespace-nowrap">&mdash;</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 text-sm text-gray-900 whitespace-nowrap">Fix responsive layout
                                        bugs</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">{{ __('Overdue') }}</span>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-red-600 whitespace-nowrap">Aug 05, 2026 &middot;
                                        3 days overdue</td>
                                    <td class="px-4 py-3 text-sm text-gray-400 whitespace-nowrap">&mdash;</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 text-sm text-gray-900 whitespace-nowrap">Prepare client
                                        presentation</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">{{ __('Overdue') }}</span>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-red-600 whitespace-nowrap">Aug 06, 2026 &middot;
                                        2 days overdue</td>
                                    <td class="px-4 py-3 text-sm text-gray-400 whitespace-nowrap">&mdash;</td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-3 text-sm text-gray-900 whitespace-nowrap">Plan Q3 roadmap</td>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">{{ __('Pending') }}</span>
                                    </td>
                                    <td class="px-4 py-3 text-sm text-gray-500 whitespace-nowrap">Aug 20, 2026 &middot;
                                        12 days remaining</td>
                                    <td class="px-4 py-3 text-sm text-gray-400 whitespace-nowrap">&mdash;</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
