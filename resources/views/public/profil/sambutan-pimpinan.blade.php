<x-layout>
    <x-section-hero title="Sambutan Pimpinan" description="Sambutan Pimpinan Pondok Pesantren Nurul Iman Sindangkerta" />
    <section class="py-8">
        <div class="container">
            <img src="{{ asset('storage/images/pimpinan_pondok3.jpg') }}"
                alt="{{ config('common.home.speech.grand-sheikh') }}" class="rounded-lg w-full md:w-80 mx-auto">
            <h3 class="mt-1 text-center text-lg font-semibold text-gray-600">
                {{ config('common.home.speech.grand-sheikh') }}
            </h3>
            <br>
            <div class="max-w-2xl mx-auto">
                <p class="text-center mb-2 text-gray-500 font-semibold italic">Assalamualaikum Warahmatullahi Wabarakatuh
                </p>
                <p class="text-center mb-2 text-emerald-700 italic"><q>{{ config('common.common.moto2') }}</q></p>
                @foreach (config('common.home.speech.speech') as $paragraph)
                    <p class="mb-2 text-gray-500 leading-relaxed">{{ $paragraph }}</p>
                @endforeach
            </div>
        </div>
    </section>
</x-layout>
