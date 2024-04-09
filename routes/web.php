<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view(
        'home'
    );
});
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->paginate(5);
    return view(
        'jobs.index',
        ['jobs' => $jobs]

    );
});
Route::get('/jobs/create', function () {
    return view(
        'jobs.create'
    );
});
Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:5'],
        'pay' => ['required']
    ]);
    Job::create(
        [
            'title' => request('title'),
            'pay' => request('pay'),
            'employer_id' => 5
        ]
    );
    return redirect('/jobs');
});

Route::get('/jobs/{id}', function ($id) {
    return view(
        'jobs.show',
        ['job' => Job::findOrFail($id)]
    );
});

// Edit 
Route::get('/jobs/{id}/edit', function ($id) {
    return view(
        'jobs.edit',
        ['job' => Job::findOrFail($id)]
    );
});

// Update 
Route::patch('/jobs/{id}', function ($id) {
    request()->validate([
        'title' => ['required', 'min:5'],
        'pay' => ['required']
    ]);
    $job = Job::findOrFail($id); 
    $job->update([
        'title' => request('title'),
        'pay' => request('pay')
    ]);
    return redirect('jobs/' . $id); 
});

// Delete
Route::delete('/jobs/{id}', function ($id) {
    Job::findOrFail($id)->delete(); 
    return redirect('jobs'); 
});

Route::get('/contact', function () {
    return view('contact');
});
