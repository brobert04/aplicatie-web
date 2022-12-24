<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">

            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            <p>Doar o secundă... Inainte de a continua, te-am ruga să-ți verifici contul folosind link-ul primit pe adresa de email utilizată la înregistrare.</p>
            <br>
            <p>
                Dacă nu îl găsești, te rugăm să verifici și folder-ul de spam. :)
            </p>
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                Link-ul pentru verificarea contului a fost trimis :)
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-primary-button>
                        Retrimite email-ul de verificare
                    </x-primary-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Anulează
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
