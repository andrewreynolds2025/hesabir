@extends('layouts.app')

@section('content')
<div class="flex flex-col gap-6">
    <div class="w-full flex flex-col md:flex-row gap-6">
        <div class="flex-1 bg-white rounded-xl p-6 shadow text-center">
            <h2 class="text-2xl font-bold text-primary mb-2">خلاصه مالی</h2>
            <div class="flex flex-row justify-between items-center mt-6 text-lg">
                <div class="w-1/3">
                    <span class="block text-gray-600">درآمد کل</span>
                    <span class="block text-2xl font-bold text-green-600 mt-2">۱۲,۳۰۰,۰۰۰</span>
                </div>
                <div class="w-1/3">
                    <span class="block text-gray-600">هزینه کل</span>
                    <span class="block text-2xl font-bold text-red-600 mt-2">۶,۸۰۰,۰۰۰</span>
                </div>
                <div class="w-1/3">
                    <span class="block text-gray-600">مانده</span>
                    <span class="block text-2xl font-bold text-blue-600 mt-2">۵,۵۰۰,۰۰۰</span>
                </div>
            </div>
        </div>
        <div class="flex-1 bg-white rounded-xl p-6 shadow text-center">
            <h2 class="text-2xl font-bold text-accent mb-2">اعلان‌ها</h2>
            <ul class="text-right mt-6">
                <li class="mb-2 text-gray-700"><i class="fa fa-check-circle text-green-500 mr-1"></i> پرداخت قسط امروز انجام شد</li>
                <li class="mb-2 text-gray-700"><i class="fa fa-exclamation-triangle text-yellow-500 mr-1"></i> سررسید چک فردا</li>
                <li class="text-gray-700"><i class="fa fa-info-circle text-blue-500 mr-1"></i> گزارش مالی هفته گذشته آماده است</li>
            </ul>
        </div>
    </div>
    <div class="w-full bg-white rounded-xl p-6 shadow mt-2">
        <h2 class="text-xl font-bold text-dark mb-4">نمودار گردش مالی (دمو)</h2>
        <img src="https://quickchart.io/chart?c={type:'bar',data:{labels:['فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور'],datasets:[{label:'درآمد',data:[12,9,8,14,10,7]},{label:'هزینه',data:[6,7,4,8,5,6]}]}}" alt="نمودار مالی" class="w-full max-w-lg mx-auto" />
    </div>
</div>
@endsection
