<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container d-flex justify-content-center">
                        <div class="col-md-8">

                            <h2 class="my-3">{{ $title }}</h2>

                            <table class="table table-striped table-bordered align-middle shadow-sm">
                                <thead>
                                    <tr>
                                        <th>Datum laatst ingelogd</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            {{ $user->last_login_at ? \Carbon\Carbon::parse($user->last_login_at)->format('d-m-Y') : 'Never' }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>