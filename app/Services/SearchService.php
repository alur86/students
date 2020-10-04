<?php

namespace App\Services;
use App\Models\Group;
use App\Http\Requests\GroupCreateRequest;

class SearchService
{
    public function search(GroupCreateRequest $request)
    {
      
        $result = '';
        $query = $request->input('query');
        if($query) {
          $result = Group::where('group_number', 'like','%'.$query.'%')
                                      ->orWhere('course' 'like','%'.$query.'%')->paginate(10);
      
        }

        return $result;
    }
}