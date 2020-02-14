<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ContactForm\StoreContactFormRequest;
use App\Http\Requests\Api\ContactForm\UpdateContactFormRequest;
use App\Http\Resources\Api\ContactForm\ContactFormResource;
use App\Http\SearchFilters\Api\ContactForm\ContactFormSearch;
use App\Models\ContactForm;
use App\Services\ContactFormService;
use Illuminate\Http\Request;

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
    public function index(Request $request)
    {
        $this->authorize('list', ContactForm::class);
        return ContactFormResource::collection(ContactFormSearch::apply($request));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactFormRequest $request)
    {
        $this->authorize('create', ContactForm::class);

        $attributes = $request->all();

        return $this->service->create($attributes);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', ContactForm::class);
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
        $this->authorize('update', ContactForm::class);

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
        $this->authorize('delete', ContactForm::class);

        $attributes = $request->json()->all();

        return $this->service->delete($attributes);
    }

}
