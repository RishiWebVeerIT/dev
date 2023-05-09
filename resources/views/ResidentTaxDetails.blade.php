@extends('layouts.master')
@section('page-title', $page_title)
@section('section')
    <div class="bg-light pd-60px">
        <form action="{{ route('resident.tax.details.save', $data->id) }}" method="post">
            @csrf
            <div class="row d-flex justify-content-between">
                <h3 class="mb-t-b-30">{{ lang('form.property_tax_information') }}</h3>
                <div class="col-md-2">
                    <label for="month_from"><span class="text-danger">*</span>Monthly/Yearly</label>
                    <select id="time" name="tax_type" class="form-control mb-3">
                        <option value="1" selected>Monthly</option>
                        <option value="2">Yearly</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3 year" style="display:none;">
                    <label for="year_from"><span class="text-danger">*</span>{{ lang('form.year_from') }}</label>
                    <input class="year_from form-control" id="year_from" name="year_from" style="width: 100%;"
                        type="text">
                </div>
                <div class="form-group col-md-3 year" style="display:none;">
                    <label for="year_to"><span class="text-danger">*</span>{{ lang('form.year_to') }}</label><small
                        style="display: none;" class="date-error text-danger">{{ lang('form.year_error') }}</small>
                    <input class="year_to form-control" name="year_to" id="year_to" style="width: 100%;" type="text">
                </div>

                <div class="form-group col-md-3 month" style="display:none;">
                    <label for="month_from"><span class="text-danger">*</span>{{ lang('form.month_from') }}</label>
                    <select id="month_from" name="month_from" class="form-control mb-3" required>
                        <option value=1>{{ lang('months.1') }}</option>
                        <option value=2>{{ lang('months.2') }}</option>
                        <option value=3>{{ lang('months.3') }}</option>
                        <option value=4>{{ lang('months.4') }}</option>
                        <option value=5>{{ lang('months.5') }}</option>
                        <option value=6>{{ lang('months.6') }}</option>
                        <option value=7>{{ lang('months.7') }}</option>
                        <option value=8>{{ lang('months.8') }}</option>
                        <option value=9>{{ lang('months.9') }}</option>
                        <option value=10>{{ lang('months.10') }}</option>
                        <option value=11>{{ lang('months.11') }}</option>
                        <option value=12>{{ lang('months.12') }}</option>
                    </select>
                </div>
                <div class="form-group col-md-3 month" style="display:none;">
                    <label for="month_to"><span class="text-danger">*</span>{{ lang('form.month_to') }}</label>
                    <select id="month_to" name="month_to" class="form-control mb-3" disabled>
                        <option value=1>{{ lang('months.1') }}</option>
                        <option value=2 selected>{{ lang('months.2') }}</option>
                        <option value=3>{{ lang('months.3') }}</option>
                        <option value=4>{{ lang('months.4') }}</option>
                        <option value=5>{{ lang('months.5') }}</option>
                        <option value=6>{{ lang('months.6') }}</option>
                        <option value=7>{{ lang('months.7') }}</option>
                        <option value=8>{{ lang('months.8') }}</option>
                        <option value=9>{{ lang('months.9') }}</option>
                        <option value=10>{{ lang('months.10') }}</option>
                        <option value=11>{{ lang('months.11') }}</option>
                        <option value=12>{{ lang('months.12') }}</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="plot_area"><span class="text-danger">*</span>{{ lang('form.plot_area') }}</label>
                    <input class="form-control" id="plot_area" name="plot_area" placeholder={{ lang('form.plot_area') }}
                        type="text" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')">
                </div>
                <div class="form-group col-md-3">
                    <label for="type_of_Property"><span
                            class="text-danger">*</span>{{ lang('form.types_of_property') }}</label>
                    <select id="type_of_Property" name="type_of_Property" class="form-control mb-3" required>
                        <option value={{ lang('form.residential') }}>{{ lang('form.residential') }}</option>
                        <option value={{ lang('form.residential') }}>{{ lang('form.residential') }}</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="uses_factor"><span class="text-danger">*</span>{{ lang('form.uses_factor') }}</label>
                    <select id="uses_factor" name="uses_factor" class="form-control mb-3" required>
                        <option value={{ lang('form.self_use') }}>{{ lang('form.self_use') }}</option>
                        <option value={{ lang('form.rental') }}>{{ lang('form.rental') }}</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="floor"><span class="text-danger">*</span>{{ lang('form.floor') }}</label>
                    <select id="floor" name="floor" class="form-control mb-3" required>
                        <option value="Ground">{{ lang('form.Ground') }}</option>
                        <option value={{ lang('form.1st-Floor') }}>{{ lang('form.1st-Floor') }}</option>
                        <option value={{ lang('form.2nd-Floor') }}>{{ lang('form.2nd-Floor') }}</option>
                        <option value={{ lang('form.3rd-Floor') }}>{{ lang('form.3rd-Floor') }}</option>
                        <option value={{ lang('form.4th-Floor') }}>{{ lang('form.4th-Floor') }}</option>
                        <option value={{ lang('form.5th-Floor') }}>{{ lang('form.5th-Floor') }}</option>
                        <option value={{ lang('form.6th-Floor') }}>{{ lang('form.6th-Floor') }}</option>
                        <option value={{ lang('form.7th-Floor') }}>{{ lang('form.7th-Floor') }}</option>
                        <option value={{ lang('form.8th-Floor') }}>{{ lang('form.8th-Floor') }}</option>
                        <option value={{ lang('form.9th-Floor') }}>{{ lang('form.9th-Floor') }}</option>
                        <option value={{ lang('form.10th-Floor') }}>{{ lang('form.10th-Floor') }}</option>
                        <option value={{ lang('form.11th-Floor') }}>{{ lang('form.11th-Floor') }}</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="construction"><span
                            class="text-danger">*</span>{{ lang('form.type_of_construction') }}</label>
                    <input type="text" name="construction_type" class="form-control mb-3"
                        placeholder={{ lang('form.type_of_construction') }} required>
                </div>
                <div class="form-group col-md-3">
                    <label for="area"><span class="text-danger">*</span>{{ lang('form.constructed_area') }}</label>
                    <input type="text" name="construction_area" id="constructed_area" class="form-control mb-3"
                        placeholder={{ lang('form.constructed_area') }}
                        onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="rate"><span class="text-danger">*</span>{{ lang('form.rate') }}</label><small
                        id="ca-error" class="text-danger"></small>
                    <input type="text" id="rate" name="rate" class="form-control mb-3"
                        placeholder={{ lang('form.rate') }} onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')"
                        required>
                </div>
                <div class="form-group col-md-3">
                    <label for="value">{{ lang('form.value') }}</label>
                    <input type="text" name="value" id="value" placeholder={{ lang('form.value') }}
                        class="form-control mb-3" readonly>
                </div>
                <div class="form-group col-md-3">
                    <label for="discount">{{ lang('form.discount') }} 10%</label>
                    <input type="text" name="discount" id="discount" placeholder={{ lang('form.discount') }}
                        class="form-control mb-3" readonly>
                </div>
                <div class="form-group col-md-3">
                    <label for="taxable_property">{{ lang('form.taxable-property') }}</label>
                    <input type="text" name="taxable_property" id="taxable_property"
                        placeholder={{ lang('form.taxable-property') }} class="form-control mb-3" readonly>
                </div>
            </div>
            <br><br>
            <button type="submit" class="btn btn-warning">{{ lang('form.add') }}</button>
        </form>
    </div>
    <div class="bg-light pd-60px mt-20">
        <form action="{{ route('resident.othertax.details.save', $data->id) }}" method="post">
            @csrf
            <div class="row d-flex justify-content-between">
                <h3 class="mb-t-b-30">{{ lang('form.other_taxes_information') }}</h3>
                <div class="col-md-2">
                    <label for="month_from"><span class="text-danger">*</span>Monthly/Yearly</label>
                    <select id="time2" name="tax_type" class="form-control mb-3">
                        <option value="1" selected>Monthly</option>
                        <option value="2">Yearly</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3 year2" style="display:none;">
                    <label for="year_from"><span class="text-danger">*</span>{{ lang('form.year_from') }}</label>
                    <input class="year_from form-control" id="year_from" name="year_from" style="width: 100%;"
                        type="text">
                </div>
                <div class="form-group col-md-3 year2" style="display:none;">
                    <label for="year_to"><span class="text-danger">*</span>{{ lang('form.year_to') }}</label><small
                        style="display: none;" class="date-error text-danger">{{ lang('form.year_error') }}</small>
                    <input class="year_to form-control" name="year_to" id="year_to" style="width: 100%;" type="text">
                </div>

                <div class="form-group col-md-3 month2" style="display:none;">
                    <label for="month_from"><span class="text-danger">*</span>{{ lang('form.month_from') }}</label>
                    <select id="month_from2" name="month_from" class="form-control mb-3" required>
                        <option value=1>{{ lang('months.1') }}</option>
                        <option value=2>{{ lang('months.2') }}</option>
                        <option value=3>{{ lang('months.3') }}</option>
                        <option value=4>{{ lang('months.4') }}</option>
                        <option value=5>{{ lang('months.5') }}</option>
                        <option value=6>{{ lang('months.6') }}</option>
                        <option value=7>{{ lang('months.7') }}</option>
                        <option value=8>{{ lang('months.8') }}</option>
                        <option value=9>{{ lang('months.9') }}</option>
                        <option value=10>{{ lang('months.10') }}</option>
                        <option value=11>{{ lang('months.11') }}</option>
                        <option value=12>{{ lang('months.12') }}</option>
                    </select>
                </div>
                <div class="form-group col-md-3 month2" style="display:none;">
                    <label for="month_to"><span class="text-danger">*</span>{{ lang('form.month_to') }}</label>
                    <select id="month_to2" name="month_to" class="form-control mb-3" disabled>
                        <option value=1>{{ lang('months.1') }}</option>
                        <option value=2 selected>{{ lang('months.2') }}</option>
                        <option value=3>{{ lang('months.3') }}</option>
                        <option value=4>{{ lang('months.4') }}</option>
                        <option value=5>{{ lang('months.5') }}</option>
                        <option value=6>{{ lang('months.6') }}</option>
                        <option value=7>{{ lang('months.7') }}</option>
                        <option value=8>{{ lang('months.8') }}</option>
                        <option value=9>{{ lang('months.9') }}</option>
                        <option value=10>{{ lang('months.10') }}</option>
                        <option value=11>{{ lang('months.11') }}</option>
                        <option value=12>{{ lang('months.12') }}</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="property_tax"><span class="text-danger">*</span>{{ lang('form.property_tax') }}</label>
                    <input type="text" id="property_tax" name="property_tax" class="form-control mb-3"
                        placeholder={{ lang('form.property_tax') }}
                        onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="consolidated_tax"><span
                            class="text-danger">*</span>{{ lang('form.consolidated_tax') }}</label>
                    <input type="text" id="consolidated_tax" name="consolidated_tax" class="form-control mb-3"
                        placeholder={{ lang('form.consolidated_tax') }}
                        onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="urban_dev_tax"><span
                            class="text-danger">*</span>{{ lang('form.urban_development_cess') }}</label>
                    <input type="text" name="urben_dev_tax" id="urban_dev_tax" class="form-control mb-3"
                        placeholder={{ lang('form.urban_development_cess') }}
                        onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="education_tax"><span
                            class="text-danger">*</span>{{ lang('form.education_cess') }}</label>
                    <input type="text" name="education_tax" id="education_tax" class="form-control mb-3"
                        placeholder={{ lang('form.education_cess') }}
                        onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="service_tax"><span class="text-danger">*</span>{{ lang('form.service_tax') }}</label>
                    <input type="text" name="service_tax" id="service_tax" class="form-control mb-3"
                        placeholder={{ lang('form.service_tax') }}
                        onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="water_tax"><span
                            class="text-danger">*</span>{{ lang('form.water_user_charges') }}</label>
                    <input type="text" name="water_tax" id="water_tax" class="form-control mb-3"
                        placeholder={{ lang('form.water_user_charges') }}
                        onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="garbade_fee"><span class="text-danger">*</span>{{ lang('form.garbage_fee') }}</label>
                    <input type="text" name="garbade_fee" class="form-control mb-3" id="garbage_fee"
                        placeholder={{ lang('form.garbage_fee') }}
                        onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="rebate"><span class="text-danger">*</span>{{ lang('form.rebate') }}</label>
                    <input type="text" name="rebate" class="form-control mb-3" id="rebate" placeholder={{ lang('form.rebate') }}
                        onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="surcharge_fee"><span class="text-danger">*</span>{{ lang('form.surcharge_fee') }}</label>
                    <input type="text" name="surcharge_fee" id="surcharge_fee" class="form-control mb-3"
                        placeholder={{ lang('form.surcharge_fee') }}
                        onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="advance_deposit">{{ lang('form.advance_deposit') }}</label>
                    <input type="text" name="advance_deposit" id="advance_deposit" id="advance_deposit" class="form-control mb-3"
                        placeholder="Advance Deposit">
                </div>
                <div class="form-group col-md-3">
                    <label for="total">{{ lang('form.total') }}</label>
                    <input type="text" readonly name="total" id="total" class="form-control mb-3"
                        placeholder={{ lang('form.total') }}>
                </div>
            </div>
            <br><br>
            <button type="submit" class="btn btn-warning">{{ lang('form.add') }}</button>
        </form>
    </div>

    <br><br>
    <h3>See Tax Details</h3>
    <div class="row col-sm-6 w-100">

        <div class="col-sm-6">
            <div class="card text-white" style="background: #642629;">
              <a href="{{route('yearly.tax.details',$data->id)}}">
                <div class="card-body text-center">
                <p class="card-text">{{lang('home.yearly')}}</p>
                </div>
            </a>
          </div>
        </div>

        <div class="col-sm-6">
            <div class="card text-white" style="background: #FAD85A;">
                <a href="{{route('monthly.tax.details',$data->id)}}">
                <div class="card-body text-center">
                <p class="card-text">{{lang('home.monthly')}}</p>
                </div>
            </a>
          </div>
        </div>

      </div>

@endsection

@section('nav_bredcrumb')
    <a href="{{ route('resident.tax.landscape.reciept', $data->id) }}" role="banner"
        class="btn btn btn-outline-warning">{{ lang('form.print') }}</a>
@endsection

@push('script')
    <script>
        $('.year_from').datepicker({
            minViewMode: 2,
            format: '01/04/yyyy'
        });
        $('.year_to').datepicker({
            minViewMode: 2,
            format: '31/03/yyyy'
        });
        let year_from;
        let value;
        $(document).click(function() {
            year_from = $('#year_from').val();
            value = !year_from == '';
            if (value) {
                let year_to = $('#year_to').val();
                if (year_from < year_to) {
                    $('.date-error').hide();
                } else {
                    $('.date-error').show();
                }
            }
        });
        // dateFormat: "yy-mm-dd"
        $('#rate').keyup(function() {
            $rate_value = $(this).val();
            constuctedArea = $('#constructed_area').val();
            value = constuctedArea == '';
            if (value) {
                $('#ca-error').text(' Fill first Constructed area field');
            } else {
                $('#ca-error').text('');
                $value_value = (constuctedArea * $rate_value);
                $('#value').val($value_value);

                $discounted_value = (($value_value / 100) * 10);
                $('#discount').val($discounted_value);

                $taxable_amount = ($value_value - $discounted_value);

                $('#taxable_property').val($taxable_amount);
            }

        });

        $('#time').click(function() {
            $type = $('#time option:selected').val();
            if ($type == "1") {
                $('.month').show();
                $('.year').hide();
            } else if ($type == "2") {
                $('.year').show();
                $('.month').hide();
            } else {
                $('.year').hide();
                $('.month').hide();
            }
        });

        $('#time2').click(function() {
            $type2 = $('#time2 option:selected').val();
            if ($type2 == "1") {
                $('.month2').show();
                $('.year2').hide();
            } else if ($type2 == "2") {
                $('.year2').show();
                $('.month2').hide();
            } else {
                $('.year2').hide();
                $('.month2').hide();
            }
        });

        $('#month_from2').change(function(event){
            $mont_from2val = $('#month_from2 option:selected').val();
            $num = Number($mont_from2val)
            if($num <= 11){
                $nexrVal = $num + 1;
                console.log($nexrVal);
                $("#month_to2").val($nexrVal);
            }else if($num == 12){
                $nexrVal = 1;
                console.log($nexrVal);
                $("#month_to2").val($nexrVal);
            }

        })
        $('#month_from').change(function(event){
            $mont_fromval = $('#month_from option:selected').val();
            $num1 = Number($mont_fromval)
            if($num1 <= 11){
                $nexrVal1 = $num1 + 1;

                $("#month_to").val($nexrVal1);
            }else if($num1 == 12){
                $nexrVal1 = 1;

                $("#month_to").val($nexrVal1);
            }

        })

        $('input').keyup(function() {
         $ptax = Number($('#property_tax').val());
         $ctax = Number($('#consolidated_tax').val());
         $udtax = Number($('#urban_dev_tax').val());
         $servtax = Number($('#service_tax').val());
         $edutax = Number($('#education_tax').val());
         $watertax = Number($('#water_tax').val());
         $gtax = Number($('#garbage_fee').val());
         $rebet = Number($('#rebate').val());
         $stax = Number($('#surcharge_fee').val());
         $deposit = Number($('#advance_deposit').val());

            $total = $ptax + $ctax + $udtax + $servtax + $edutax + $watertax + $gtax + $rebet + $stax + $deposit ;
            $("#total").val($total);

        });

    </script>
@endpush
