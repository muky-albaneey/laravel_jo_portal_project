<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\JobListing;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobListingController extends Controller
{
    public function index()
    {
        $jobs = JobListing::with('employer')->latest()->paginate(5);
        return view(['jobs'=>$jobs]);
        // return view('jobs.index', ['jobs'=>$jobs]);
    }

    public function show(JobListing $job)
    {

        return view('jobs.show', ['job'=>$job]);
    }

    public function create()
    {
        return view('jobs.create');
    }
    public function store(User $user)
    {

        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required'],
        ]);


        $employer_id = Auth::user()->employer->id;

       $job = JobListing::create([
            'title'=> request('title'),
            'salary'=> request('salary'),
            'employer_id' =>$employer_id
        ]);

        Mail::to($job->employer->user)->queue(
            new JobPosted($job)
        );
        return redirect('/jobs');

    }


    public function edit(JobListing $job){

        // if(Auth::guest())
        // {
        //     return redirect('/login');
        // }

        // Gate::authorize('edit_gate', $job);  // OR WE CAN DENIES

        return view('jobs.edit',['job'=>$job]);
    }

    public function update(JobListing $job){


        request()->validate([
            'title'=>['required', 'min:3'],
            'salary'=>['required']
        ]);

        $job->title = request('title');
        $job->salary = request('salary');
        $job->save();


        // $job->update([
        //     'title'=>request('title'),
        //     'salary'=>request('salary')
        // ]);

        return redirect('/jobs');
    }

    public function destroy(JobListing $job)
    {
        Gate::authorize('edit_gate', $job);  // OR WE CAN DENIES
        $job->delete();

        return redirect('/jobs');
    }
}
