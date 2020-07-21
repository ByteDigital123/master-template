<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\EmailVerification\StoreEmailVerificationRequest;
use App\Http\Requests\Api\EmailVerification\UpdateEmailVerificationRequest;
use App\Http\Resources\Api\EmailVerification\EmailVerificationResource;
use App\Http\SearchFilters\Api\EmailVerification\EmailVerificationSearch;
use App\Models\EmailVerification;
use App\Services\EmailVerificationService;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{

    protected $service;

    public function __construct(EmailVerificationService $service)
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
        $this->authorize('list', EmailVerification::class);
        return EmailVerificationResource::collection(EmailVerificationSearch::apply($request));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmailVerificationRequest $request)
    {
        $this->authorize('create', EmailVerification::class);

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
        $this->authorize('view', EmailVerification::class);
        return new EmailVerificationResource($this->service->getById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateEmailVerificationRequest $request)
    {
        $this->authorize('update', EmailVerification::class);

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
        $this->authorize('delete', EmailVerification::class);

        $attributes = $request->json()->all();

        return $this->service->delete($attributes);
    }

}
