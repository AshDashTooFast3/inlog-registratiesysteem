<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black dark:text-black leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Sluiten"></button>
        </div>
        <meta http-equiv="refresh" content="3; url={{ route('praktijkmanagement.userroles') }}">
    @elseif (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Sluiten"></button>
        </div>
        <meta http-equiv="refresh" content="3; url={{ route('praktijkmanagement.userroles') }}">
    @endif

    <div class="py-12">
        <div class="max-w-xl mx-auto bg-white rounded-lg shadow-md p-8">
            @foreach ($user as $us)
                <form method="POST" action="{{ route('praktijkmanagement.update', $us->Id) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        <label for="InputName" class="form-label font-semibold">Naam</label>
                        <input name="name" type="text" class="form-control border rounded px-3 py-2 mt-1" id="InputName" aria-describedby="nameHelp"
                            value="{{ old('name', $us->name) }}">
                    </div>

                    <div class="mb-6">
                        <label for="InputDescription" class="form-label font-semibold">Email</label>
                        <input name="email" type="email" class="form-control border rounded px-3 py-2 mt-1" id="InputDescription" aria-describedby="descriptionHelp"
                            value="{{ old('email', $us->email) }}">
                    </div>

                    <div class="mb-6">
                        <label for="InputRolename" class="form-label font-semibold">Gebruikersrol</label>
                        <select name="rolename" class="form-select border rounded px-3 py-2 mt-1" aria-label="InputRolename">
                            @foreach ($userroles as $userrole)
                                <option value="{{ $userrole->rolename }}" @selected($userrole->rolename == $us->rolename)>
                                    {{ $userrole->rolename }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-between items-center mt-8">
                        <button type="submit" class="btn btn-primary px-4 py-2 rounded">Opslaan</button>
                        <a href="{{ route('praktijkmanagement.index') }}" class="btn btn-secondary px-4 py-2 rounded">Annuleren</a>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
</x-app-layout>