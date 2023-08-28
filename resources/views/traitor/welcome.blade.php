<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-white">
        <img src="{{ asset('img/loading.svg') }}" alt="loading">
        <p> M/Mme {{ $traitor->name }} </p>
        <p> Bienvenue sur traiteur local, votre compte est en attente de validation. </p>
        <p> Vous recevrez une notification par mail sous peu. </p>
        <a href="{{ url('/') }}"> Retour </a>
    </div>
</x-guest-layout>
