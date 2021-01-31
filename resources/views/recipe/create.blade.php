<div class="container">
    <form action="/Recipe" enctype="multipart/form-data" method="post">
        @csrf

                <div class="row">
                <div class="row">
                    <h1>Create Recipe</h1>
                </div>

                <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label">Name</label>

                                <input id="name" type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                name="name" 
                                autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @enderror
                </div>

                <div class="form-group row">
                                <label for="ingredients" class="col-md-4 col-form-label">Ingredients</label>

                                <input id="ingredients" type="text" 
                                class="form-control @error('ingredients') is-invalid @enderror" 
                                name="ingredients" 
                                autofocus>

                                @if ($errors->has('ingredients'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ingredients') }}</strong>
                                    </span>
                                @enderror
                </div>

                <div class="row pt-4">
                    <button class="btn btn-primary ">Save Profile</button>
                </div>
            </div>
        </div>
    </form>
</div>