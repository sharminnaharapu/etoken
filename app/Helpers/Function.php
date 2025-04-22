<?php
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

function slugify($text) {
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    // trim
    $text = trim($text, '-');
    // remove duplicate -
    $text = preg_replace('~-+~', '-', $text);
    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}

function slugData($text) {
    // replace non letter or digits by -
    $text = preg_replace('~[^\pL\d]+~u', '_', $text);
    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);
    // trim
    $text = trim($text, '_');
    // remove duplicate -
    $text = preg_replace('~-+~', '_', $text);

// lowercase
    if (empty($text)) {
        return 'n-a';
    }

    return $text;
}

function gender() {
    return [
        'male'   => 'Male',
        'female' => 'Female',
        'other'  => 'Other',
    ];
}

function badgeStatus($status) {

    switch ($status) {
    case 'pending':
    case 'inactive':
    case 'unpaid':
    case 'due':
    case 'Urgent':
    case 'notgiven':
        return 'warning';
    case 'active':
    case 'delivered':
    case 'send':
    case 'processe':
    case 'confirm':
    case 'refunded':
    case 'refund':
    case 'Normal':
    case 'given':
    case 'continued':
        return 'primary';
    case 'cancel':
    case 'rejected':
    case 'block':
    case 'Veryurgent':
    case 'veryurgent':
    case 'discontinued':
        return 'danger';
    case 'receive':
    case 'confirmed':
    case 'collected':
    case 'complete':
    case 'authorize':
    case 'done':
    case 'paid':
        return 'success';
    case 'in':
        return 'incolor';
    case 'out':
        return 'outcolor';
    }

}

function replaceamount($date) {
    return str_replace(',', '', $date);
}

function datefirmet($date) {
    return $date ? date('Y-m-d h:i:s a', strtotime($date)) : '';
}

function dateformet($date) {
    return $date ? date('Y-m-d h:i:s a', strtotime($date)) : '';
}

function timeformet($date) {
    return $date ? date('h:i a', strtotime($date)) : '';
}

function onlaydate($date) {
    return $date ? date('Y-m-d', strtotime($date)) : '';
}

function paginateData($items, $perPage, $currentPage) {
    $currentPage = $currentPage ?: 1;
    $pagedData   = $items instanceof Collection ? $items : Collection::make($items);
    return new LengthAwarePaginator(
        $pagedData->forPage($currentPage, $perPage),
        $pagedData->count(),
        $perPage,
        Paginator::resolveCurrentPage(),
        ['path' => Paginator::resolveCurrentPath()]
    );
}

function findMiddleDate($startDate, $endDate) {

    $startDateTime = Carbon::parse($startDate);
    $endDateTime   = Carbon::parse($endDate);

// Generate the range of dates
    $dateRange   = [];
    $currentDate = $startDateTime->copy();

    while ($currentDate->lte($endDateTime)) {
        $dateRange[] = $currentDate->toDateString();
        $currentDate->addDay();
    }

    return $dateRange;
}
