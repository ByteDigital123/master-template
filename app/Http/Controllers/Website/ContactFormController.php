<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\ContactForm\StoreContactFormRequest;
use App\Services\ContactFormService;
use Illuminate\Support\Facades\Log;

class ContactFormController extends Controller
{
    protected $service;

    public function __construct(ContactFormService $service)
    {
        $this->service = $service;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactFormRequest $request)
    {
        $attributes = $request->all();

        try{
            $this->service->store($attributes);
            return response()->success('Contact form submitted successfully');
        }catch (\Exception $e){
            Log::info($e->getMessage());
            return response()->error('This action could not be completed ' . $e->getMessage());
        }
    }


}
