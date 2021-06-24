<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Models\Checklist;
use App\Models\Task;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TaskController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTaskRequest $request
     * @param Checklist $checklist
     * @return RedirectResponse
     */
    public function store(StoreTaskRequest $request, Checklist $checklist): RedirectResponse
    {
        $checklist->tasks()->create($request->validated());

        return redirect()->route('admin.checklist_groups.checklists.edit', [
            $checklist->checklist_group_id, $checklist
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Checklist $checklist
     * @param Task $task
     * @return Application|Factory|View
     */
    public function edit(Checklist $checklist, Task $task)
    {
        return view('admin.tasks.edit', compact('checklist', 'task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreTaskRequest $request
     * @param Checklist $checklist
     * @param Task $task
     * @return RedirectResponse
     */
    public function update(StoreTaskRequest $request, Checklist $checklist, Task $task): RedirectResponse
    {
        $task->update($request->validated());

        return redirect()->route('admin.checklist_groups.checklists.edit', [
            $checklist->checklist_group_id, $checklist
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Checklist $checklist
     * @param Task $task
     * @return RedirectResponse
     */
    public function destroy(Checklist $checklist, Task $task): RedirectResponse
    {
        $task->delete();

        return redirect()->route('admin.checklist_groups.checklists.edit', [
            $checklist->checklist_group_id, $checklist
        ]);
    }
}
