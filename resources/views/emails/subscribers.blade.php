@component('mail::message')
<x-mail::message>
# Introduction

Dear {{$email}},

Your Order Has Been PLaced. We will Deliver your order with in 2-4 working days.

{{--@component('mail::button', ['url' => '{{ route('myorders') }}'])
View Order
@endcomponent--}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
@endcomponent
