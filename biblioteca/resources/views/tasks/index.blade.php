<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #eef2ff, #f8fafc);
            min-height: 100vh;
        }

        .main-card {
            border: none;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .title-area {
            background: linear-gradient(135deg, #1e3a8a, #2563eb);
            color: white;
            border-radius: 18px 18px 0 0;
            padding: 25px;
        }

        .badge-priority {
            font-size: 0.85rem;
            padding: 8px 12px;
            border-radius: 999px;
        }

        .priority-alta {
            background-color: #dc2626;
            color: white;
        }

        .priority-media {
            background-color: #f59e0b;
            color: white;
        }

        .priority-baixa {
            background-color: #16a34a;
            color: white;
        }

        .section-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.06);
        }

        .table thead th {
            background-color: #1e293b;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="main-card bg-white">
            <div class="title-area">
                <h1 class="mb-1">Sistema de Tarefas</h1>
                <p class="mb-0">Cadastro de departamentos e tarefas com validações</p>
            </div>

            <div class="p-4">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="card section-card">
                            <div class="card-body">
                                <h4 class="mb-3">Cadastrar Departamento</h4>

                                <form action="{{ route('departments.store') }}" method="POST">
                                    @csrf

                                    <div class="mb-3">
                                        <label class="form-label">Nome do departamento</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Responsável</label>
                                        <input type="text" name="manager" class="form-control @error('manager') is-invalid @enderror" value="{{ old('manager') }}">
                                        @error('manager')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100">Salvar Departamento</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card section-card">
                            <div class="card-body">
                                <h4 class="mb-3">Cadastrar Tarefa</h4>

                                <form action="{{ route('tasks.store') }}" method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Título</label>
                                            <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                                            @error('title')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Departamento</label>
                                            <select name="department_id" class="form-select @error('department_id') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                @foreach($departments as $department)
                                                    <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                                        {{ $department->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('department_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Descrição</label>
                                        <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Prioridade</label>
                                            <select name="priority" class="form-select @error('priority') is-invalid @enderror">
                                                <option value="">Selecione</option>
                                                <option value="Baixa" {{ old('priority') == 'Baixa' ? 'selected' : '' }}>Baixa</option>
                                                <option value="Média" {{ old('priority') == 'Média' ? 'selected' : '' }}>Média</option>
                                                <option value="Alta" {{ old('priority') == 'Alta' ? 'selected' : '' }}>Alta</option>
                                            </select>
                                            @error('priority')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Prazo</label>
                                            <input type="date" name="due_date" class="form-control @error('due_date') is-invalid @enderror" value="{{ old('due_date') }}">
                                            @error('due_date')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success w-100">Salvar Tarefa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card section-card mt-4">
                    <div class="card-body">
                        <h4 class="mb-3">Tarefas Cadastradas</h4>

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Título</th>
                                        <th>Departamento</th>
                                        <th>Responsável</th>
                                        <th>Prioridade</th>
                                        <th>Prazo</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($tasks as $task)
                                        <tr>
                                            <td>{{ $task->id }}</td>
                                            <td>{{ $task->title }}</td>
                                            <td>{{ $task->department->name }}</td>
                                            <td>{{ $task->department->manager }}</td>
                                            <td>
                                                @if($task->priority == 'Alta')
                                                    <span class="badge badge-priority priority-alta">Alta</span>
                                                @elseif($task->priority == 'Média')
                                                    <span class="badge badge-priority priority-media">Média</span>
                                                @else
                                                    <span class="badge badge-priority priority-baixa">Baixa</span>
                                                @endif
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') }}</td>
                                            <td>
                                                @if($task->completed)
                                                    <span class="badge bg-success">Concluída</span>
                                                @else
                                                    <span class="badge bg-secondary">Pendente</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Nenhuma tarefa cadastrada ainda.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>