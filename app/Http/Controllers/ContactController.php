<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Services\ContactService;
use Illuminate\Http\Response;

class ContactController extends Controller
{
    /** @var ContactService */
    protected ContactService $contactService;

    /**
     * @param 
     * @return 
     */
    public function __construct(ContactService $contactService) 
    {
        $this->contactService = $contactService;
    }

    /**
     * Display a listing of the resource
     * 
     * @return Response
     */
    public function index(): Response
    {
        $contact = $this->contactService->getAllContacts();

        return $this->respond(true, $contact);
    }

    /**
     * Display the specified resource.
     *
     * @param  Content $content
     * @return Response
     */
    public function show(Contact $contact): Response
    {
        $contact = $this->contactService->getSpecifiedContact($contact);

        return $this->respond(true, $contact);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ContentRequest  $request
     * @return Response
     */
    public function store(ContactRequest $request): Response
    {
        $contact = $this->contactService->createContact($request->validated());

        return $this->respond(true, $contact, Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ContentRequest  $request
     * @param  Content $content
     * @return Response
     */
    public function update(ContactRequest $request, Contact $contact): Response
    {
        $contact = $this->contactService->updateContact($contact, $request->validated());

        return $this->respond(true, $contact); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Content $content
     * @return Response
     * @throws Exception
     */
    public function destroy(Contact $contact): Response
    {
        return $this->respond(
            $this->contactService->deleteContact($contact),
            [
                'id' => $contact->id
            ],
            Response::HTTP_NO_CONTENT
        );
    }
}
