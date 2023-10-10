<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Farmland;

class FarmlandsController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function create()
    {
        $initialMarkers = [
            [
                'position' => [
                    'lat' => 28.625485,
                    'lng' => 79.821091
                ],
                'label' => [ 'color' => 'white', 'text' => 'P1' ],
                'draggable' => true
            ],
            [
                'position' => [
                    'lat' => 28.625293,
                    'lng' => 79.817926
                ],
                'label' => [ 'color' => 'white', 'text' => 'P2' ],
                'draggable' => false
            ],
            [
                'position' => [
                    'lat' => 28.625182,
                    'lng' => 79.81464
                ],
                'label' => [ 'color' => 'white', 'text' => 'P3' ],
                'draggable' => true
            ]
        ];
        return view('create', compact('initialMarkers'));
    }
    public function index()
    {
        return view('index');
    }
    public function show($farmland)
    {
        $farmlands = Farmland::all();
        // dd($farmlands);

        return view('show', [ 'farmlands' => $farmlands ]);
    }
    public function store(Request $requestObjet)
    {
        $initialMarkers =
        [
            [
                'position' => [
                    'lat' => 28.625485,
                    'lng' => 79.821091
                ],
                'label' => [ 'color' => 'white', 'text' => 'P1' ],
                'draggable' => true
            ],
            [
                'position' => [
                    'lat' => 28.625293,
                    'lng' => 79.817926
                ],
                'label' => [ 'color' => 'white', 'text' => 'P2' ],
                'draggable' => false
            ],
            [
                'position' => [
                    'lat' => 28.625182,
                    'lng' => 79.81464
                ],
                'label' => [ 'color' => 'white', 'text' => 'P3' ],
                'draggable' => true
                ]
            ];
            $data = $requestObjet->all();
            // dd($data);
            Farmland::create([
                'additionalinformation' => $data['additionalinformation'],
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'companyname' => $data['companyname'],
                'address' => $data['address'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'farmlandLat' => $data['farmlandLat'],
                'farmlandLng' => $data['farmlandLng'],
            ]);

            return redirect()->route('farmlands.show',1);
        }
}
