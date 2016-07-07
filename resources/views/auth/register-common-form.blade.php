<form class="form-horizontal" role="form">
    <!-- Team Name -->
    @if (Flare::usesTeams())
        <div class="form-group" :class="{'has-error': registerForm.errors.has('team')}" v-if=" ! invitation">
            <label class="col-md-4 control-label">Team Name</label>

            <div class="col-md-6">
                <input type="name" class="form-control" name="team" v-model="registerForm.team" autofocus>

                <span class="help-block" v-show="registerForm.errors.has('team')">
                    @{{ registerForm.errors.get('team') }}
                </span>
            </div>
        </div>
    @endif

    <!-- Name -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('name')}">
        <label class="col-md-4 control-label">Name</label>

        <div class="col-md-6">
            <input type="name" class="form-control" name="name" v-model="registerForm.name" autofocus>

            <span class="help-block" v-show="registerForm.errors.has('name')">
                @{{ registerForm.errors.get('name') }}
            </span>
        </div>
    </div>

    <!-- E-Mail Address -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('email')}">
        <label class="col-md-4 control-label">E-Mail Address</label>

        <div class="col-md-6">
            <input type="email" class="form-control" name="email" v-model="registerForm.email">

            <span class="help-block" v-show="registerForm.errors.has('email')">
                @{{ registerForm.errors.get('email') }}
            </span>
        </div>
    </div>

    <!-- Password -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('password')}">
        <label class="col-md-4 control-label">Password</label>

        <div class="col-md-6">
            <input type="password" class="form-control" name="password" v-model="registerForm.password">

            <span class="help-block" v-show="registerForm.errors.has('password')">
                @{{ registerForm.errors.get('password') }}
            </span>
        </div>
    </div>

    <!-- Password Confirmation -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('password_confirmation')}">
        <label class="col-md-4 control-label">Confirm Password</label>

        <div class="col-md-6">
            <input type="password" class="form-control" name="password_confirmation" v-model="registerForm.password_confirmation">

            <span class="help-block" v-show="registerForm.errors.has('password_confirmation')">
                @{{ registerForm.errors.get('password_confirmation') }}
            </span>
        </div>
    </div>

    <!-- Business Name -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('business_name')}">
        <label class="col-md-4 control-label">Business Name</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="business_name" v-model="registerForm.business_name">

            <span class="help-block" v-show="registerForm.errors.has('business_name')">
                @{{ registerForm.errors.get('Business Name') }}
            </span>
        </div>
    </div>

    <!-- Address -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('address')}">
        <label class="col-md-4 control-label">Address</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="address" v-model="registerForm.address">

            <span class="help-block" v-show="registerForm.errors.has('address')">
                @{{ registerForm.errors.get('address') }}
            </span>
        </div>
    </div>

    <!-- Address Line 2 -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('address_line_2')}">
        <label class="col-md-4 control-label">Address Line 2</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="address_line_2" v-model="registerForm.address_line_2">
    
            <span class="help-block" v-show="registerForm.errors.has('address_line_2')">
                @{{ registerForm.errors.get('address_line_2') }}
            </span>
        </div>
    </div>

    <!-- City -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('city')}">
        <label class="col-md-4 control-label">City</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="city" v-model="registerForm.city">
    
            <span class="help-block" v-show="registerForm.errors.has('city')">
                @{{ registerForm.errors.get('city') }}
            </span>
        </div>
    </div>

    <!-- State -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('state')}">
        <label class="col-md-4 control-label">State</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="state" v-model="registerForm.state">

            <span class="help-block" v-show="registerForm.errors.has('state')">
                @{{ registerForm.errors.get('state') }}
            </span>
        </div>
    </div>

    <!-- Zip Code -->
    <div class="form-group" :class="{'has-error': registerForm.errors.has('zip')}">
        <label class="col-md-4 control-label">Zip Code</label>

        <div class="col-md-6">
            <input type="text" class="form-control" name="zip" v-model="registerForm.zip">

            <span class="help-block" v-show="registerForm.errors.has('zip')">
                @{{ registerForm.errors.get('zip') }}
            </span>
        </div>
    </div>

    <!-- Country -->
    <div class="form-group" :class="{'has-error': form.errors.has('country')}">
        <label class="col-md-4 control-label">Country</label>

        <div class="col-sm-6">
            <select class="form-control" v-model="form.country">
                @foreach (app(FCLLA\Flare\Repositories\Geography\CountryRepository::class)->all() as $key => $country)
                    <option value="{{ $key }}">{{ $country }}</option>
                @endforeach
            </select>

        <span class="help-block" v-show="form.errors.has('country')">
            @{{ form.errors.get('country') }}
        </span>
        </div>
    </div>

    <!-- Terms And Conditions -->
    <div v-if=" ! selectedPlan || selectedPlan.price == 0">
        <div class="form-group" :class="{'has-error': registerForm.errors.has('terms')}">
            <div class="col-md-6 col-md-offset-4">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="terms" v-model="registerForm.terms">
                        I Accept The <a href="/terms" target="_blank">Terms Of Service</a>
                    </label>

                    <span class="help-block" v-show="registerForm.errors.has('terms')">
                        @{{ registerForm.errors.get('terms') }}
                    </span>
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <button class="btn btn-primary" @click.prevent="register" :disabled="registerForm.busy">
                    <span v-if="registerForm.busy">
                        <i class="fa fa-btn fa-spinner fa-spin"></i>Registering
                    </span>

                    <span v-else>
                        <i class="fa fa-btn fa-check-circle"></i>Register
                    </span>
                </button>
            </div>
        </div>
    </div>
</form>
