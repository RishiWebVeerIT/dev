@extends('layouts.master')
@section('page-title',$page_title)
@section('section')
<table class="table table-bordered data-table-show">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Aadhar no.</th>
            <th scope="col">Mobile no.</th>
            <th scope="col">Old Property ID</th>
            <th scope="col">New Property ID</th>
            <th scope="col">Address</th>
            <th scope="col">Status</th>
            <th scope="col">Edit</th>
        </tr>
    </thead>
    <tbody>
        @forelse($resident as $data)
        <tr>
            <td>{{$data->firstname.' '.$data->middlename.' '.$data->lastname}}</td>
            <td>{{$data->email}}</td>
            <td>{{$data->aadhar_no}}</td>
            <td>{{$data->mobile_no}}</td>
            <td>{{$data->old_property_id}}</td>
            <td>{{$data->new_property_id}}</td>
            <td>{{$data->address->address.' '.$data->address->city.' '.$data->address->zip.' Jilla :'.$data->address->jila.' Taluka :'.$data->address->taluka.' Zone :'.$data->address->zone.' Ward :'.$data->address->ward.', '.$data->address->state.', '.$data->address->country}}</td>
            <td>@if($data->status == 0)
                Inactive
                @else
                Active
            @endif</td>
            <td>
                <a href="{{ route('edit_resident',$data->id) }}" class="icon-btn ml-1" data-original-title="@lang('Edit')">
                    <i class="la la-edit"></i>
                </a>
            </td>

        </tr>
        @empty
        <h4>$empty_message</h4>
        @endforelse
    </tbody>
</table>
@endsection
