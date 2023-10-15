@extends('admin.layouts.master')

@section('title')
    Create checklist
@endsection


@section('main-panel')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <h4 class="card-title mt-3 ms-3">Create a checklist</h4>
                <hr>
                <div class="card-body">

                    <form action="{{ route('checklist.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="appiontmentId">Appiontment id</label>
                            <input type="text" name="appiontment_id" class="form-control text-white" id="appiontmentId">
                            @error('appiontment_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Appliance name & price</label>

                            <div id="container">
                                <div class="name_price d-flex gap-1 my-2">
                                    <input type="text" name="appliance_name[]" class="form-control text-white"
                                        placeholder="name" multiple>
                                    <input type="text" name="appliance_price[]" class="form-control text-white"
                                        placeholder="price" multiple>
                                </div>
                            </div>
                            <a id="addBtn" class="btn btn-sm btn-success py-1 px-2 mt-2">+</a>
                        </div>



                        <button type="submit" class="btn btn-outline-primary me-2">Submit</button>
                        {{-- <a href="{{ route('subcategory.index') }}" class="btn btn-outline-danger me-2">Cancel</a> --}}
                    </form>

                    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
                        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
                    <script>
                        $(document).ready(function() {
                            $("#addBtn").click(function() {

                                var newInputDiv = `
                                                        <div class="name-price d-flex gap-1 my-2">
                                                            <input type="text" name="appliance_name[]" class="form-control text-white" placeholder="name" multiple>
                                                            <input type="text" name="appliance_price[]" class="form-control text-white" placeholder="price" multiple>
                                                            <a class="deleteBtn btn btn-danger"><i class="mdi mdi-delete-forever"></i></a>
                                                        </div>
                                                    `;

                                // Append the new elements to the container
                                $("#container").append(newInputDiv);
                            });

                            // Use event delegation to handle clicks on deleteBtn
                            $(document).on("click", ".deleteBtn", function() {
                                $(this).closest(".name-price").remove();
                            });

                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
