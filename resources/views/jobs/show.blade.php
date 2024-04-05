<x-layout>
    <x-slot:heading>
        Job
    </x-slot:heading>
        <h2 class="font-bold text-lg">{{ $job['title']}}</h2>
        <p>This jobs pays is ${{ number_format($job['pay'], 2) }} USD/year</p>
</x-layout>