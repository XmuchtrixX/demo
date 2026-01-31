<?php

namespace App\Http\Controllers;


use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ApplicationController extends Controller
{

    public function index()
    {
        $applications = Application::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('applications.index', compact('applications'));
    }

    public function create()
    {
        return view('applications.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'course' => 'required|string|in:Основы алгоритмизации и программирования,Основы веб-дизайна,Основы проектирования баз данных',
            'date' => 'required|date_format:d.m.Y',
            'pay' => 'required|in:cash,phone',
        ]);

        Application::create([
            'user_id' => Auth::id(),
            'course' => $request->course,
            'date' => \Carbon\Carbon::createFromFormat('d.m.Y', $request->date),
            'pay' => $request->pay,
            'status' => 'new'
        ]);

        return redirect()->route('applications.index')
            ->with('success', 'Заявка успешно создана');
    }



}
