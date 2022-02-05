@extends('frontend.layouts.master')
@section('main-content')
<div class="login_area">
    <div class="logo">
        <a href="#"><img src="assets/media/images/logo.png" alt=""></a>
    </div>
    <div class="registration_content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="info_form">
                            <h2>New Account Registration</h2>
                            <div class="form-row">
                                <div class="form-group col-md-6 @error('first_name') has_error @enderror">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ old('first_name') }}">
                                    @error('first_name')
                                        <small>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 @error('last_name') has_error @enderror">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}">
                                    @error('last_name')
                                        <small>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 @error('email') has_error @enderror">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <small>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 @error('password') has_error @enderror">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password" value="{{ old('password') }}">
                                    @error('password')
                                        <small>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6 @error('password_confirmation') has_error @enderror">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" value="{{ old('password_confirmation') }}">
                                    @error('password_confirmation')
                                        <small>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 @error('phone') has_error @enderror">
                                    <label>Phone</label>
                                    <input id="phone" name="phone" type="tel" class="form-control" placeholder="Phone" value="{{ old('phone') }}">
                                    @error('phone')
                                        <small>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <h2>Address</h2>
                            <div class="form-row">
                                <div class="form-group col-md-6 @error('address') has_error @enderror">
                                    <label>Address</label>
                                    <input type="text" class="form-control" placeholder="Address" name="address" value="{{ old('address') }}">
                                    @error('address')
                                        <small>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 @error('city') has_error @enderror">
                                    <label>City</label>
                                    <input type="text" class="form-control" placeholder="City" name="city" value="{{ old('city') }}">
                                    @error('city')
                                        <small>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4 @error('country_id') has_error @enderror">
                                    <label>Country</label>
                                    <select class="form-control" name="country_id" id="country_id">
                                        <option>Country</option>
                                        @if($countries)
                                            @foreach($countries as $key => $country)
                                                <option value="{{ $country->id }}" data-index="{{ $key }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>{{ $country->sortname }} - {{ $country->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('country_id')
                                        <small>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 @error('state_id') has_error @enderror">
                                    <label>State</label>
                                    <select class="form-control" name="state_id" value="{{ old('state_id') }}" id="state_id">
                                        <option>State</option>
                                    </select>
                                    @error('state_id')
                                        <small>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4 @error('zipcode') has_error @enderror">
                                    <label>Zip Code</label>
                                    <input type="text" class="form-control" placeholder="Zip Code" name="zipcode" value="{{ old('zipcode') }}">
                                    @error('zipcode')
                                        <small>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>How did you hear about us?</label>
                                    <select class="form-control" name="hear_about_us" id="hear_about_us">
                                        <option>How did you hear about us?</option>
                                        <option value="google">Google</option>
                                        <option value="facebook">Facebook</option>
                                        <option value="others">Others</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label>Others</label>
                                    <input type="text" class="form-control d-none" placeholder="Others" id="hear_about_us_text" name="hear_about_us_text" value="{{ old('hear_about_us_text') }}">
                                </div>
                            </div>
                            <h2>Feedback about us</h2>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" id="" cols="10" rows="5" name="feedback" value="{{ old('feedback') }}"></textarea>
                                </div>
                            </div>
                            <h2>Terms & Conditions</h2>
                            <div class="form-row">
                                <div class="form-group col-md-12 @error('terms') has_error @enderror">
                                    <label for="terms" class="mt_10 ml_10">I hereby agree to have eyelash extensions applied to my natural lashes and consent to the placement and/or removal of the eyelash extensions by the certified professional.</label>
                                    <input type="checkbox" id="terms" name="terms" value="1">
                                    @error('terms')
                                        <small>
                                            <span>{{ $message }}</span>
                                        </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form_registration_btn d_flex_end mt_20 mb_20">
                            <button class="btn_common" type="submit">Create Account</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function(){
            var input = document.querySelector("#phone");
            window.intlTelInput(input, {
                separateDialCode: true,
                dropdownContainer: document.body
            });

            //control country and state
            let countries = <?php echo json_encode($countries); ?>;
            let state_id = '{{ old('state_id') }}';
            $('#country_id').change(function () {
                $('#state_id').html('<option value="">State</option>');
                let parent_id = $(this).val();
                if ($(this).val() != '' && $(this).val() != 'Country') {
                    let index = $(this).find(':selected').data('index');
                    let states = countries[index].states;
                    $.each(states, function (index, value) {
                        if (value.id == state_id)
                            $('#state_id').append('<option value="' + value.id + '" selected>' + value.name + '</option>');
                        else
                            $('#state_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
            $('#country_id').trigger('change');

            //Control hear about us
            $('#hear_about_us').change(function(){
                if($(this).find(':selected').val() == 'others'){
                    $('#hear_about_us_text').removeClass('d-none');
                }else{
                    $('#hear_about_us_text').addClass('d-none');
                }
            })
        })
    </script>
@endsection