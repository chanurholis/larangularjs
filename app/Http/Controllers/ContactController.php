<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        return response()->json([
            'error'    => false,
            'contacts' => Contact::all()
        ], 200);
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name'  => 'required',
            'phone' => 'required'
        ]);

        if ($validation->fails()) {
            return response()->json([
                'error'   => true,
                'message' => $validation->errors()
            ], 200);
        } else {
            $contact = new Contact();
            $contact->name = $request->input('name');
            $contact->phone = $request->input('phone');
            $contact->save();

            return response()->json([
                'error'   => false,
                'contact' => $contact
            ], 200);
        }
    }

    public function show($id)
    {
        $contact = Contact::find($id);

        if ($contact) {
            return response()->json([
                'error'   => false,
                'contact' => $contact
            ], 200);
        } else {
            return response()->json([
                'error'   => true,
                'message' => 'Record with id ' . $id . ' not found'
            ], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'name'  => 'required',
            'phone' => 'required'
        ]);

        if ($validation->fails()) {
            return response()->json([
                'error'   => true,
                'message' => $validation->errors()
            ], 200);
        } else {
            $contact = Contact::find($id);
            $contact->name = $request->input('name');
            $contact->phone = $request->input('phone');
            $contact->save();

            return response()->json([
                'error'   => false,
                'contact' => $contact
            ], 200);
        }
    }

    public function destroy($id)
    {
        $contact = Contact::find($id);

        if ($contact) {
            $contact->delete();

            return response()->json([
                'error'   => false,
                'message' => 'Contact record successfully deleted id ' . $id
            ], 200);
        } else {
            return response()->json([
                'error'   => true,
                'message' => 'Record with id ' . $id
            ], 404);
        }
    }
}
