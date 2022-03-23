@extends('admin.layouts.app')
@section('content')
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    User
                </th>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Total report
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)
                <tr class="border-b dark:bg-gray-800 dark:border-gray-700 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        {{$report->post->user->name}}
                    </th>
                    <td class="px-6 py-4">
                        {{$report->post->title}}
                    </td>
                    <td class="px-6 py-4">
                        {{$report->total}}
                    </td>
                    <td class="px-6 py-4 text-right">
                        @if ($report->total > 30 && $report->post->report_code_id != 4)
                        <a href="/admin/dashboard/report/{{$report->post->slug}}">takedown</a>
                        @elseif($report->total < 30 && $report->post->report_code_id != 4)
                        <p>you cann't takedown this post</p>
                        @elseif($report->total > 30 && $report->post->report_code_id == 4)
                        <p>a post has takedown</p>
                        @endif
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
