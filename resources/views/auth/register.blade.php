<x-guest-layout>
    <div class="flex justify-center mb-4">
        <x-primary-button class="mr-2" onclick="redirectToLogin('admin')">Admin</x-primary-button>
        <x-primary-button class="mr-2" onclick="redirectToLogin('medecin')">Medecin</x-primary-button>
        <x-primary-button onclick="setRole('patient')">Patient</x-primary-button>
    </div>

    <form method="POST" action="{{ route('register') }}" id="registerForm">
        @csrf

        <!-- Role -->
        <input type="hidden" name="role" id="role">

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Role-specific fields for Patient -->
        <div id="patientFields" class="mt-4" style="display: none;">
            <!-- Date de Naissance -->
            <div class="mt-4">
                <x-input-label for="dateNaissance" :value="__('Date of Birth')" />
                <x-text-input id="dateNaissance" class="block mt-1 w-full" type="date" name="dateNaissance" :value="old('dateNaissance')" required />
                <x-input-error :messages="$errors->get('dateNaissance')" class="mt-2" />
            </div>

            <!-- Genre -->
            <div class="mt-4">
                <x-input-label for="genre" :value="__('Gender')" />
                <select id="genre" name="genre" class="block mt-1 w-full" required>
                    <option value="">{{ __('Select Gender') }}</option>
                    <option value="male">{{ __('Masculin') }}</option>
                    <option value="female">{{ __('Féminin') }}</option>
                </select>
                <x-input-error :messages="$errors->get('genre')" class="mt-2" />
            </div>

            <!-- Adresse -->
            <div class="mt-4">
                <x-input-label for="adresse" :value="__('Address')" />
                <x-text-input id="adresse" class="block mt-1 w-full" type="text" name="adresse" :value="old('adresse')" required />
                <x-input-error :messages="$errors->get('adresse')" class="mt-2" />
            </div>

            <!-- Téléphone -->
            <div class="mt-4">
                <x-input-label for="telephone" :value="__('Phone')" />
                <x-text-input id="telephone" class="block mt-1 w-full" type="tel" name="telephone" :value="old('telephone')" required />
                <x-input-error :messages="$errors->get('telephone')" class="mt-2" />
            </div>

            <!-- Numéro de Sécurité Sociale -->
            <div class="mt-4">
                <x-input-label for="numero_securite_sociale" :value="__('Social Security Number')" />
                <x-text-input id="numero_securite_sociale" class="block mt-1 w-full" type="text" name="numero_securite_sociale" :value="old('numero_securite_sociale')" required />
                <x-input-error :messages="$errors->get('numero_securite_sociale')" class="mt-2" />
            </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button type="submit" class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<script>
    function setRole(role) {
        console.log("Role sélectionné :", role);
        document.getElementById('role').value = role;

        // Hide all role-specific fields initially
        document.getElementById('patientFields').style.display = 'none';

        // Show fields based on selected role
        if (role === 'patient') {
            document.getElementById('patientFields').style.display = 'block';
        }
    }

    function redirectToLogin(role) {
        window.location.href = "{{ route('login') }}";
    }
</script>
