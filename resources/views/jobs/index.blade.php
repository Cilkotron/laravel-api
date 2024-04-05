<x-layout>
    <x-slot:heading>
        Jobs
    </x-slot:heading>
    <h3>Jobs list</h3>
    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a class="block px-4 py-6 border border-gray-200 rounded-lg" href="jobs/{{ $job['id'] }}">
                <div class="font-bold text-blue-500 text-sm">{{ $job->employer->name }}</div>
                <div><strong>{{ $job['title'] }}:</strong> Pays: ${{ number_format($job['pay'], 2) }} USD</div>
            </a>
        @endforeach
        <div>
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout>
