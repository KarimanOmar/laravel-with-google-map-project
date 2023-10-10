@extends('layouts')

@section('create')


    <h2 class='text-center titleForm m-5' >Survey Form</h2>


    <div class='mx-auto' id="map"></div>
    <div class='container p-3'>
    <form class='card shadow-lg  mb-5  rounded p-5' action="{{route('farmlands.store')}}" method="post">
          @csrf
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
          <label class="form-label" for="form6Example1">First name</label>
        <input type="text" id="form6Example1" name='firstname' class="form-control" />
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
          <label class="form-label" for="form6Example2">Last name</label>
        <input type="text" id="form6Example2" name='lastname' class="form-control" />
      </div>
    </div>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
      <label class="form-label" for="form6Example3">Company name</label>
    <input type="text" id="form6Example3" name='companyname' class="form-control" />
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
      <label class="form-label" for="form6Example4">Address</label>
    <input type="text" id="form6Example4" name='address' class="form-control" />
  </div>

  <!-- Email input -->
  <div class="form-outline mb-4">
      <label class="form-label" for="form6Example5">Email</label>
    <input type="email" id="form6Example5" name='email' class="form-control" />
  </div>

  <!-- Number input -->
  <div class="form-outline mb-4">
      <label class="form-label" for="form6Example6">Phone</label>
    <input type="number" id="form6Example6" name='phone' class="form-control" />
  </div>

  <!-- Message input -->
  <div class="form-outline mb-4">
      <label class="form-label" for="form6Example7">Additional information</label>
    <textarea class="form-control" id="form6Example7" name='additionalinformation' rows="4"></textarea>
  </div>

  <!-- Checkbox -->
  <div class="form-check d-flex justify-content-center mb-4">
      <input class="form-check-input me-2" type="checkbox" value="" id="form6Example8" checked />
      <label class="form-check-label" for="form6Example8"> Create an account? </label>
  </div>
  <input type="hidden" id="form6ExampleLat" name='farmlandLat'   />
  <input type="hidden" id="form6ExampleLang" name='farmlandLng'   />
  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Place order</button>
</form>
</div>
    <!-- Hide controls until they are moved into the map. -->
    <div style="display: none">
      <div class="controls zoom-control">
        <button class="zoom-control-in" title="Zoom In">+</button>
        <button class="zoom-control-out" title="Zoom Out">−</button>
      </div>
      <div class="controls maptype-control maptype-control-is-map">
        <button class="maptype-control-map" title="Show road map">Map</button>
        <button
          class="maptype-control-satellite"
          title="Show satellite imagery"
        >
          Satellite
        </button>
      </div>
      <div class="controls fullscreen-control">
        <button title="Toggle Fullscreen">
          <div
            class="fullscreen-control-icon fullscreen-control-top-left"
          ></div>
          <div
            class="fullscreen-control-icon fullscreen-control-top-right"
          ></div>
          <div
            class="fullscreen-control-icon fullscreen-control-bottom-left"
          ></div>
          <div
            class="fullscreen-control-icon fullscreen-control-bottom-right"
          ></div>
        </button>
      </div>
    </div>

    @endsection
