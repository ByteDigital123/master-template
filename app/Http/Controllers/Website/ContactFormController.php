<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Website\ContactForm\StoreContactFormRequest;
use App\Http\Requests\Website\ContactForm\UpdateContactFormRequest;
use App\Http\Resources\Website\ContactForm\ContactFormResource;
use App\Services\ContactFormService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactFormController extends Controller
{
    protected $service;

    public function __construct(ContactFormService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ContactFormResource::collection($this->service->getAll());
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
            return response()->success('This action has been completed successfully');
        }catch (\Exception $e){
            Log::info($e->getMessage());
            return response()->error('This action could not be completed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ContactFormResource($this->service->getById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateContactFormRequest $request)
    {
        $attributes = $request->all();

        return $this->service->update($id, $attributes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $attributes = $request->json()->all();

        return $this->service->delete($attributes);
    }

}
