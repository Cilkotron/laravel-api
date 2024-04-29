<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Support\Facades\Mail; 
use App\Mail\JobPosted;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->paginate(5);

        return view('jobs.index', ['jobs' => $jobs]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store()
    {
        // Auth 

        request()->validate([
            'title' => ['required', 'min:5'],
            'pay' => ['required']
        ]);

        $job = Job::create(
            [
                'title' => request('title'),
                'pay' => request('pay'),
                'employer_id' => 5
            ]
        );

        Mail::to($job->employer->user)->queue(new JobPosted($job)); 

        return redirect('/jobs');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function edit(Job $job)
    {

        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        //Auth 
        request()->validate([
            'title' => ['required', 'min:5'],
            'pay' => ['required']
        ]);

        $job->update([
            'title' => request('title'),
            'pay' => request('pay')
        ]);

        return redirect('jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        $job->delete();

        return redirect('jobs');
    }
}
