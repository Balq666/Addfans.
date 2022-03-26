@extends('admin.layouts.app')
@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Creator
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Customer
                </th>
                <th scope="col" class="px-6 py-3">
                    Total Tax
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($taxes as $tax)
                <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        {{$tax->post->user->name}}
                    </th>
                    <td class="px-6 py-4">
                        {{$tax->post->title}}
                    </td>
                    <td class="px-6 py-4">
                        {{$tax->TotalCustomer}}
                    </td>
                    <td class="px-6 py-4">
                        {{$tax->total}}
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
