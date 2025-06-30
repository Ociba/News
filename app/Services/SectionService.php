<?php

namespace App\Services;

use App\Models\Section;
use Illuminate\Support\Facades\Auth;

class SectionService
{
    public static function getAllSections($perPage)
    {
        return Section::latest()->paginate($perPage);
    }

    public function findSection(int $id)
    {
        return Section::findOrFail($id);
    }

    public static function createSection(string $section_name)
    {
        return Section::create([
            'section_name' => $section_name,
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
