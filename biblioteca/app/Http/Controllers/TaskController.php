<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('name')->get();
        $tasks = Task::with('department')->orderBy('created_at', 'desc')->get();

        return view('tasks.index', compact('departments', 'tasks'));
    }

    public function storeDepartment(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:100|unique:departments,name',
            'manager' => 'required|string|min:3|max:100',
        ], [
            'name.required' => 'O nome do departamento é obrigatório.',
            'name.min' => 'O nome do departamento deve ter pelo menos 3 caracteres.',
            'name.unique' => 'Esse departamento já foi cadastrado.',
            'manager.required' => 'O nome do responsável é obrigatório.',
            'manager.min' => 'O responsável deve ter pelo menos 3 caracteres.',
        ]);

        Department::create([
            'name' => $request->name,
            'manager' => $request->manager,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Departamento cadastrado com sucesso!');
    }

    public function storeTask(Request $request)
    {
        $request->validate([
            'department_id' => 'required|exists:departments,id',
            'title' => 'required|string|min:5|max:100',
            'description' => 'required|string|min:10|max:500',
            'priority' => 'required|in:Baixa,Média,Alta',
            'due_date' => 'required|date|after_or_equal:today',
        ], [
            'department_id.required' => 'Selecione um departamento.',
            'department_id.exists' => 'Departamento inválido.',
            'title.required' => 'O título da tarefa é obrigatório.',
            'title.min' => 'O título deve ter pelo menos 5 caracteres.',
            'description.required' => 'A descrição é obrigatória.',
            'description.min' => 'A descrição deve ter pelo menos 10 caracteres.',
            'priority.required' => 'Selecione a prioridade.',
            'priority.in' => 'Prioridade inválida.',
            'due_date.required' => 'A data de entrega é obrigatória.',
            'due_date.after_or_equal' => 'A data não pode ser anterior a hoje.',
        ]);

        if ($request->priority === 'Alta' && strlen($request->description) < 20) {
            return back()
                ->withErrors([
                    'description' => 'Tarefas com prioridade Alta precisam de uma descrição com pelo menos 20 caracteres.'
                ])
                ->withInput();
        }

        Task::create([
            'department_id' => $request->department_id,
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'due_date' => $request->due_date,
            'completed' => false,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tarefa cadastrada com sucesso!');
    }
}