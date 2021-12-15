<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
use App\Http\Resources\ContactResourceCollection;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ContactService
{
    /** @var Contact */
    protected $contact;

    public function __construct(Contact $contact) 
    {
        $this->contact = $contact;
    }

    /**
     * @param 
     * @return 
     */
    public function getAllContacts(): ResourceCollection
    {
        $contacts = $this->contact->paginate();

        return new ContactResourceCollection($contacts);
    }

    /**
     * @param Contact $contact
     * @return JsonResource
     */
    public function getSpecifiedContact(Contact $contact): JsonResource
    {


        return new ContactResource($contact);
    }

    /**
     * @param 
     * @return 
     */
    public function createContact(array $request): JsonResource 
    {
        $contact = $this->contact->create($request);

        return new ContactResource($contact);
    }

    /**
     * @param 
     * @return 
     */
    public function updateContact(Contact $contact, array $request): JsonResource
    {
        $contact->update($request);

        return new ContactResource($contact);
    }

    /**
     * @param 
     * @return 
     */
    public function deleteContact(Contact $contact): bool 
    {
        return $contact->delete();
    }
}
