<?php

$review = \App\Models\reviews::first();
if (!$review) {
    echo "No reviews found.\n";
    exit;
}

$request = Illuminate\Http\Request::create('/api/reviews/' . $review->id, 'PUT', [
    'rating' => 4,
    'comment' => 'This is a test comment 12345'
]);

$user = \App\Models\User::find($review->user_id);
if (!$user) {
    echo "Review user not found.\n";
    exit;
}

$request->setUserResolver(function () use ($user) {
    return $user;
});

$controller = app(\App\Http\Controllers\Api\ReviewApiController::class);
try {
    $response = $controller->update($request, $review->id);
    echo "Response status: " . $response->getStatusCode() . "\n";
    echo "Response content: " . $response->getContent() . "\n";
} catch (\Illuminate\Validation\ValidationException $e) {
    echo "Validation Error: \n";
    print_r($e->errors());
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . ":" . $e->getLine() . "\n";
    echo "Trace: " . $e->getTraceAsString() . "\n";
} catch (\Error $e) {
    echo "Fatal Error: " . $e->getMessage() . "\n";
    echo "File: " . $e->getFile() . ":" . $e->getLine() . "\n";
    echo "Trace: " . $e->getTraceAsString() . "\n";
}
