<x-layout>
    <x-slot:heading>
        Edit Job
    </x-slot:heading>
    <form method="POST" action="/jobs/{{ $job->id }}">
        @csrf
        @method('PATCH')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <label for="job-title" class="block text-sm font-medium leading-6 text-gray-900">Job Title</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600 sm:max-w-md">
                                <input type="text" name="title" id="job-title"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 px-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    value="{{ $job->title }}" placeholder="Job Title">
                            </div>
                            @error('title')
                                <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="sm:col-span-4">
                        <label for="job-pay" class="block text-sm font-medium leading-6 text-gray-900">Job
                            Salary</label>
                        <div class="mt-2">
                            <div
                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-blue-600 sm:max-w-md">
                                <input type="number" name="pay" id="job-pay"
                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 px-2 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                    value="{{ $job->pay }}" placeholder="Job Salary">
                            </div>
                            @error('pay')
                                <p class="text-red-500 text-xs font-semibold mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-between gap-x-6">
            <div class="flex items-center">
                <button form="delete-job-form" class="text-red-600 text-sm font-semibold">Delete</button>
            </div>
            <div class="flex items-center gap-x-6">
                <a href="/jobs/{{ $job->id }}" type="button"
                    class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
                <button 
                    type="submit"
                    class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600">
                Update</button>
            </div>
        </div>
    </form>
    <form action="/jobs/{{ $job->id}}" method="POST" id="delete-job-form" class="hidden">
        @csrf
        @method('DELETE')
    </form>

</x-layout>
