<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class EmployeeController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'http://dummy.restapiexample.com/api/v1/']);
    }

    // Create new employee
    public function create(Request $request)
    {
        $response = $this->client->post('create', [
            'json' => $request->all()
        ]);

        return response()->json(json_decode($response->getBody()), $response->getStatusCode());
    }

    // Get all employees
    public function index()
    {
        $response = $this->client->get('employees');
        return response()->json(json_decode($response->getBody()), $response->getStatusCode());
    }

    // Get employee detail by ID
    public function show($id)
    {
        $response = $this->client->get("employee/{$id}");
        return response()->json(json_decode($response->getBody()), $response->getStatusCode());
    }

    // Update employee by ID
    public function update(Request $request, $id)
    {
        $response = $this->client->put("update/{$id}", [
            'json' => $request->all()
        ]);

        return response()->json(json_decode($response->getBody()), $response->getStatusCode());
    }

    // Delete employee by ID
    public function destroy($id)
    {
        $response = $this->client->delete("delete/{$id}");
        return response()->json(json_decode($response->getBody()), $response->getStatusCode());
    }
}