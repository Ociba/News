<?php

namespace App\Services;

use App\Models\Section;
use Illuminate\Support\Facades\Auth;

class SectionService
{
    public function getAllSections($withTrashed = false)
    {
        $query = Section::latest();

        if ($withTrashed) {
            $query->withTrashed();
        }

        return $query->get();
    }

    public function findSection(int $id)
    {
        return Section::findOrFail($id);
    }

    public function createSection(string $name)
    {
        return Section::create([
            'section_name' => $name,
            'created_by'   => Auth::id(),
        ]);
    }

    public function updateSection(int $id, string $name)
    {
        $section = $this->findSection($id);
        $section->update([
            'section_name' => $name,
        ]);

        return $section;
    }

    public function deleteSection(int $id)
    {
        $section = $this->findSection($id);
        return $section->delete();
    }

    public function restoreSection(int $id)
    {
        $section = Section::withTrashed()->findOrFail($id);
        return $section->restore();
    }

    public function forceDeleteSection(int $id)
    {
        $section = Section::withTrashed()->findOrFail($id);
        return $section->forceDelete();
    }
}
