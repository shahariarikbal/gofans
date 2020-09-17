<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\Education;
use App\Models\Skill;

class CommonController extends Controller
{
    /**
     * @authenticated
     * @response {
           * "success": true,
           * "data": [{
                * "id": 1,
                * "name": "Career Name"
            * }]
       * }
     */
    public function career()
    {
        $data = Career::select('id', 'name')->where('status', 1)->get();
        return response()->json(['success'=> true, 'data'=> $data]);
    }

    /**
     * @authenticated
     * @response {
           * "success": true,
           * "data": [{
                * "id": 1,
                * "name": "Edication Name"
            * }]
       * }
     */
    public function education()
    {
        $data = Education::select('id', 'name')->where('status', 1)->get();
        return response()->json(['success'=> true, 'data'=> $data]);
    }

    /**
     * @authenticated
     * @response {
           * "success": true,
           * "data": [{
                * "id": 1,
                * "name": "Skill Name"
            * }]
       * }
     */
    public function skill()
    {
        $data = Skill::select('id', 'name')->where('status', 1)->get();
        return response()->json(['success'=> true, 'data'=> $data]);
    }
}
